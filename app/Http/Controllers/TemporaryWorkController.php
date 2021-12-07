<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Project;
use App\Models\ScopeOfDesign;
use App\Models\TemporaryWork;
use App\Models\TemporayWorkImage;
use App\Models\DesignRequirementLevelOne;
use App\Models\User;
use App\Models\TempWorkUploadFiles;
use App\Models\TemporaryWorkComment;
use App\Utils\Validations;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Crypt;
use Notification;
use App\Notifications\TemporaryWorkNotification;
use App\Utils\HelperFunctions;
use DB;
use PDF;



class TemporaryWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments')->whereIn('created_by', $ids)->latest()->get();
            } else {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments')->where('created_by', $user->id)->latest()->get();
            }
            $temporary_works_count = TemporaryWork::count();
            return view('dashboard.temporary_works.index', compact('temporary_works', 'temporary_works_count'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole(['company'])) {
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                $projects = DB::table('projects')
                    ->join('users_has_projects', 'projects.id', '=', 'users_has_projects.project_id')
                    ->join('users', 'users.company_id', '=', 'projects.company_id')
                    ->where('users_has_projects.user_id', auth()->user()->id)
                    ->get();
            }
            $desogmreqlevlone = DesignRequirementLevelOne::get();
            return view('dashboard.temporary_works.create', compact('projects', 'desogmreqlevlone'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validations::storeTemporaryWork($request);
        try {
            $scope_of_design = [];
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'sod')) {
                    $data = null;
                    $data = [
                        Str::replace('_sod', '', $key) => $request->$key
                    ];
                    $scope_of_design = array_merge($scope_of_design, $data);
                    unset($request[$key]);
                }
            }
            $folder_attachements = [];
            $folder_attachements_pdf = [];
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'folder')) {
                    $data = null;
                    $data1 = null;
                    $data = [
                        Str::replace('_folder', '', $key) => $request->$key
                    ];
                    $mykey = Str::replace('_folder', '', $key);
                    if (isset($request->$mykey)) {
                        $data1 = [
                            $request->$mykey => $request->$key
                        ];
                        $folder_attachements_pdf = array_merge($folder_attachements_pdf, $data1);
                    }
                    $folder_attachements = array_merge($folder_attachements, $data);
                    unset($request[$key]);
                }
            }
            $count = TemporaryWork::where('project_id', $request->project_id)->count();
            $count = $count + 1;
            $twc_id_no = $request->projno . '-' . ucfirst(substr($request->company, 0, 2)) . '-00' . $count;
            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token', 'projaddress', 'signed', 'images', 'namesign', 'signtype', 'projno', 'projname');
            //upload signature here
            $image_name = '';
            if ($request->signtype == 1) {
                $all_inputs['signature'] = $request->namesign;
            } else {
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);
                $all_inputs['signature'] = $image_name;
            }
            $all_inputs['created_by'] = auth()->user()->id;
            //work for qrcode
            $check = TemporaryWork::where('project_id', $request->project_id)->orderBy('id', 'desc')->first();
            if ($check) {
                $j = $check->tempid + 1;
            } else {
                $j = 1;
            }
            $all_inputs['tempid'] = $j;
            $all_inputs['twc_id_no'] = $twc_id_no;
            $temporary_work = TemporaryWork::create($all_inputs);
            if ($temporary_work) {
                ScopeOfDesign::create(array_merge($scope_of_design, ['temporary_work_id' => $temporary_work->id]));
                Folder::create(array_merge($folder_attachements, ['temporary_work_id' => $temporary_work->id]));
                //work for upload images here
                $image_links = [];
                if ($request->file('images')) {
                    $filePath = HelperFunctions::temporaryworkImagePath();
                    $files = $request->file('images');
                    foreach ($files  as $key => $file) {
                        $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                        $model = new TemporayWorkImage();
                        $model->image = $imagename;
                        $model->temporary_work_id = $temporary_work->id;
                        $model->save();
                        $image_links[] = $imagename;
                    }
                }
                $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $request->all(), 'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' =>  $folder_attachements_pdf, 'imagelinks' => $image_links]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                //send mail to admin
                $notify_admins_msg = [
                    'greeting' => 'Temporary Work Pdf',
                    'subject' => 'Temporary Work PDF',
                    'body' => [
                        'booking' => 'Temporary Work Details',
                        'filename' => $filename,
                        'links' => $image_links,
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                Notification::route('mail', 'admin@example.com')->notify(new TemporaryWorkNotification($notify_admins_msg));
                Notification::route('mail', $request->twc_email)->notify(new TemporaryWorkNotification($notify_admins_msg));
                //Notification::send($admin, new TemporaryWorkNotification($notify_admins_msg));
            }
            toastSuccess('Temporary Work successfully added!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function show(TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function edit(TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //upload file and drawings
    public function temp_file_uplaod(Request $request)
    {
        try {
            $filePath = HelperFunctions::temporaryworkuploadPath();
            $file = $request->file('file');
            $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            $model = new TempWorkUploadFiles();
            $model->file_name = $imagename;
            $model->file_type = $request->type;
            $model->temporary_work_id = $request->tempworkid;
            if ($model->save()) {
                return response()->json(['success' =>  $imagename]);
            }
        } catch (\Exception $exception) {
            return response()->json(['error' =>  $imagename]);
        }
    }

    //load scan file against temporary work
    public function load_scan_temporarywork(Request $request, $id)
    {
        $tempid = Crypt::decryptString($request->temp);
        $temporary_works = TemporaryWork::with('project', 'uploadfile')->where(['project_id' => $id, 'tempid' => $tempid])->get();
        return view('dashboard.temporary_works.index_user', compact('temporary_works'));
    }

    //save comments against temp work
    public function temp_savecomment(Request $request)
    {
        Validations::storeComment($request);
        try {
            $model = new TemporaryWorkComment();
            $model->comment = $request->comment;
            $model->temporary_work_id = $request->temp_work_id;
            $model->user_id = auth()->user()->id;
            if ($model->save()) {
                toastSuccess('Comment Save sucessfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
    //get commetns
    public function get_comments(Request $request)
    {
        $commetns = TemporaryWorkComment::where('user_id', $request->id)->get();
        if (count($commetns) > 0) {
            $table = '<table class="table table-hover"><thead style="height:80px"><tr><th>S-no</th><th>Comment</th><th>Date</th></tr></thead><tbody>';
            $i = 1;
            foreach ($commetns as $comment) {
                $table .= '<tr><td>' . $i . '</td><td>' . $comment->comment . '</td><td>' . $comment->created_at->todatestring()  . '</td></tr>';
                $i++;
            }
            $table .= '</tbody></table>';
            echo $table;
        } else {
            echo '';
        }
    }
    //get file dates upload 
    public function file_upload_dates(Request $request)
    {
        $filetype = $request->file_type;
        $tempid = $request->tempid;
        $data = TempWorkUploadFiles::where(['file_type' => $filetype, 'temporary_work_id' => $tempid])->get();
        $list = '';
        if (count($data) > 0) {
            $i = 1;
            foreach ($data as $d) {
                $list .= '<tr><td>' . $i . '</td><td>' . $d->created_at->todatestring() . '</td></tr>';
                $i++;
            }
        }
        echo $list;
    }

    public function Unset($request)
    {
        unset($request['list_of_attachments']);
        unset($request['reports_including_site_investigations']);
        unset($request['existing_ground_conditions']);
        unset($request['preferred_non_preferred_methods']);
        unset($request['access_limitations']);
        unset($request['back_propping']);
        unset($request['limitations_on_temporary_works_design']);
        unset($request['details_of_any_hazards']);
        unset($request['3rd_party_requirements']);
        return $request;
    }
}
