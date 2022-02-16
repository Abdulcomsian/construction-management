<?php

namespace App\Http\Controllers;

use App\Models\AttachSpeComment;
use App\Models\Folder;
use App\Models\Project;
use App\Models\ScopeOfDesign;
use App\Models\TemporaryWork;
use App\Models\TemporayWorkImage;
use App\Models\DesignRequirementLevelOne;
use App\Models\User;
use App\Models\TempWorkUploadFiles;
use App\Models\TemporaryWorkComment;
use App\Models\PermitLoad;
use App\Models\PermitLoadImages;
use App\Models\Scaffolding;
use App\Models\CheckAndComment;
use App\Models\CommentsAction;
use App\Models\Tempworkshare;
use App\Models\ScaffoldLoadImages;
use App\Notifications\PermitNotification;
use App\Notifications\TempAttachmentNotifications;
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
use App\Exports\TemporyWorkExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Auth;

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
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->whereIn('created_by', $ids)->latest()->paginate(20);
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                if ($user->hasRole(['supervisor', 'scaffolder'])) {
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->whereHas('project', function ($q) use ($ids) {
                        $q->whereIn('project_id', $ids);
                    })->latest()->paginate(20);
                    $projects = Project::with('company')->whereIn('id', $ids)->get();
                } else {
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->where('created_by', $user->id)->latest()->paginate(20);
                    $projects = Project::with('company')->whereIn('id', $ids)->get();
                }
            }
            //work for datatable
            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //All shared tempory work
    public function shared_temporarywork()
    {
        $user = auth()->user();
       try {
            if ($user->hasRole('admin')) {
                $tempidds = DB::table('tempworkshares')->get();
                $users = [];
                $ids = [];
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare','project', 'uploadfile', 'comments', 'permits', 'scaffold')->whereIn('id', $ids)->latest()->paginate(20);
            } elseif ($user->hasRole('company')) {
                $user = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($user as $u) {
                    $uids[] = $u->id;
                }
                $uids[] = Auth::user()->id;
                $tempidds = DB::table('tempworkshares')->whereIn('user_id', $uids)->get();
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare','project', 'uploadfile', 'comments', 'permits', 'scaffold')->whereIn('id', $ids)->latest()->paginate(20);
            } else {
                $tempidds = DB::table('tempworkshares')->where('user_id', $user->id)->get();
                $users = [];
                $ids = [];
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare','project', 'uploadfile', 'comments', 'permits', 'scaffold')->whereIn('id', $ids)->latest()->paginate(20);
            }
            //dd($temporary_works);
            //work for datatable
            return view('dashboard.temporary_works.shared', compact('temporary_works', 'users'));
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
        if (auth()->user()->hasRole([['supervisor', 'scaffolder']])) {
            toastError('the temporary works coordinator is the only appointed person who can create a design brief. If you require access, please contact your management team to request access for you');
            return Redirect::back();
        }
        //abort_if(auth()->user()->hasRole(['supervisor', 'scaffolder']), 403);
        try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole(['company'])) {
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            }
            return view('dashboard.temporary_works.create', compact('projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //manually desing breif form for old data
    public function create1()
    {
        abort_if(auth()->user()->hasRole(['supervisor', 'scaffolder']), 403);
        try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole(['company'])) {
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            }
            return view('dashboard.temporary_works.create1', compact('projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //manually design brief form store 
    public function store1(Request $request)
    {
        Validations::storeManuallyTemporaryWork($request);
        try {
            $all_inputs  = $request->except('_token', 'pdf', 'projaddress', 'projno', 'projname', 'dcc_returned', 'drawing', 'dcc', 'design_returned');
            $all_inputs['created_by'] = auth()->user()->id;
            //work for qrcode
            $j = HelperFunctions::generatetempid($request->project_id);
            $all_inputs['tempid'] = $j;
            if ($file = $request->file('pdf')) {
                $path = public_path('pdf');
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $filename);
                $all_inputs['ped_url'] = $filename;
            }
            $temporary_work = TemporaryWork::create($all_inputs);
            if ($temporary_work) {
                $filePath = HelperFunctions::temporaryworkuploadPath();
                // dd($filePath);
                $file = $request->file('drawing');
                #uploading drawing
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $model = new TempWorkUploadFiles();
                $model->file_name = $imagename;
                $model->file_type = 1;
                $model->created_at = $request->design_returned;
                $model->temporary_work_id = $temporary_work->id;
                $model->save();

                #uploading DCC
                $file = $request->file('dcc');

                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $model = new TempWorkUploadFiles();
                $model->file_name = $imagename;
                $model->file_type = 2;
                $model->created_at = $request->dcc_returned;
                $model->temporary_work_id = $temporary_work->id;
                $model->save();
            }
            if ($temporary_work) {
                toastSuccess('Temporary Work successfully added!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
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
            $attachcomments = [];
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'comment')) {
                    $data = null;
                    $data1 = null;
                    $data = [
                        $key => $request->$key
                    ];
                    $attachcomments = array_merge($attachcomments, $data);
                    unset($request[$key]);
                }
            }

            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'projaddress', 'signed', 'images', 'namesign', 'signtype', 'projno', 'projname');
            //upload signature here
            $image_name = '';
            if ($request->signtype == 1) {
                $image_name = $request->namesign;
            } else {
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);
            }
            // $image_name = HelperFunctions::savesignature($request);
            $all_inputs['signature'] = $image_name;
            $all_inputs['created_by'] = auth()->user()->id;
            if (auth()->user()->hasRole('admin')) {
                $all_inputs['created_by'] = $request->company_id;
            }
            //work for qrcode
            $j = HelperFunctions::generatetempid($request->project_id);
            $all_inputs['tempid'] = $j;
            $twc_id_no = HelperFunctions::generatetwcid($request->projno, $request->company, $request->project_id);
            $all_inputs['twc_id_no'] = $twc_id_no;
            $temporary_work = TemporaryWork::create($all_inputs);
            if ($temporary_work) {
                ScopeOfDesign::create(array_merge($scope_of_design, ['temporary_work_id' => $temporary_work->id]));
                Folder::create(array_merge($folder_attachements, ['temporary_work_id' => $temporary_work->id]));
                AttachSpeComment::create(array_merge($attachcomments, ['temporary_work_id' => $temporary_work->id]));
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

                //work for pdf
                $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $request->all(), 'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => $twc_id_no, 'comments' => $attachcomments]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporary_work->id);
                $model->ped_url = $filename;
                $model->save();
                //send mail to admin
                $notify_admins_msg = [
                    'greeting' => 'Temporary Work Pdf',
                    'subject' => 'Temporary Work PDF',
                    'body' => [
                        'company' => $request->company,
                        'filename' => $filename,
                        'links' => '',
                        'name' => 'TemporaryWork',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                Notification::route('mail', 'hani@ctworks.co.uk')->notify(new TemporaryWorkNotification($notify_admins_msg));
                Notification::route('mail', $request->twc_email)->notify(new TemporaryWorkNotification($notify_admins_msg));
                Notification::route('mail', $request->designer_company_email)->notify(new TemporaryWorkNotification($notify_admins_msg));
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
            $temporaryWork->delete();
            toastSuccess('Temporary Work Delete Successfully!!');
            return Redirect::back();
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
        $scantempwork = 'scantempwork';
        $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->where(['project_id' => $id, 'tempid' => $tempid])->get();
        return view('dashboard.temporary_works.index_user', compact('temporary_works', 'scantempwork'));
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
    public function temp_savetwname(Request $request)
    {
        try {
            $model = TemporaryWork::find($request->temp_work_id);
            $model->tw_name = $request->tw_name;
            // dd($model);
            if ($model->save()) {
                toastSuccess('TW Name Save sucessfully!');
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
        if (isset($request->id)) {
            $commetns = TemporaryWorkComment::where(['user_id' => $request->id, 'temporary_work_id' => $request->temporary_work_id])->get();
        } else {
            $commetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id])->get();
        }
        if (count($commetns) > 0) {
            $table = '<table class="table table-hover"><thead style="height:80px"><tr><th style="width:120px;">S-no</th><th>Comment</th><th style="width:120px;">Date</th></tr></thead><tbody>';
            $i = 1;
            foreach ($commetns as $comment) {
                $date_comment = date("d-m-Y", strtotime($comment->created_at->todatestring()));
                $table .= '<tr><td>' . $i . '</td><td>' . $comment->comment . '</td><td>' . $date_comment  . '</td></tr>';
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

    //load permit to laod view
    public function permit_load(Request $request)
    {
        $tempid = \Crypt::decrypt($request->temp_work_id);
        try {
            $tempdata = TemporaryWork::find($tempid);
            $twc_id_no = $tempdata->twc_id_no;
            $permitdata = PermitLoad::where(['temporary_work_id' => $tempid])->where('status', '!=', 3)->where('status', '!=', 4)->orderBy('id', 'desc')->first();
            if ($permitdata) {
                $data = explode("-", $permitdata->permit_no);
                if (isset($data[3])) {
                    $twc_id_no = $twc_id_no . '-' . ++$data[3];
                } elseif (isset($data[2])) {

                    $twc_id_no = $twc_id_no . '-' . ++$data[2];
                } elseif (isset($data[1])) {

                    $twc_id_no = $twc_id_no . '-' . ++$data[1];
                }
            } else {
                $twc_id_no = $twc_id_no . '-A';
            }
            $project = Project::with('company')->where('id', $tempdata->project_id)->first();
            return view('dashboard.temporary_works.permit', compact('project', 'tempid', 'twc_id_no', 'tempdata'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //save permit
    public function permit_save(Request $request)
    {
        Validations::storepermitload($request);
        try {
            $all_inputs  = $request->except('_token', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed', 'signed1', 'projno', 'projname', 'date', 'type', 'permitid', 'images', 'namesign1', 'namesign');
            $all_inputs['created_by'] = auth()->user()->id;
            //first person signature and name
            $image_name1 = '';
            if ($request->principle_contractor == 1) {
                $all_inputs['name1'] = $request->name1;
                $all_inputs['job_title1'] = $request->job_title1;
                if ($request->signtype1 == 1) {
                    $all_inputs['signature1'] = $request->namesign1;
                } else {
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed1);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name1 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name1;
                    file_put_contents($file, $image_base64);
                    $all_inputs['signature1'] = $image_name1;
                }
            }
            //second person signature and name
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
            $permitload = PermitLoad::create($all_inputs);
            if ($permitload) {
                //make status 0 if permit is 
                $msg = "Load";
                if (isset($request->type)) {
                    PermitLoad::find($request->permitid)->update(['status' => 0]);
                    $msg = "Renew";
                }
                //save permit images

                $image_links = $this->permitfiles($request, $permitload->id);
                //  dd($image_links);
                $pdf = PDF::loadView('layouts.pdf.permit_load', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'image_name1' => $image_name1]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitload->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);

                $notify_admins_msg = [
                    'greeting' => 'Scaffolding Pdf',
                    'subject' => 'Permit Load PDF',
                    'body' => [

                        'text' => 'A Permit to ' . $msg . ' has been completed for the temporary works as per the attached document.',
                        'filename' => $filename,
                        'links' =>  '',
                        'name' => 'Permit Load',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                # Notification::route('mail', 'hani.thaher@gmail.com')->notify(new PermitNotification($notify_admins_msg));
                Notification::route('mail', $request->twc_email)->notify(new PermitNotification($notify_admins_msg));
                # Notification::route('mail', $request->designer_company_email)->notify(new PermitNotification($notify_admins_msg));
                toastSuccess('Permit ' . $msg . ' sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            exit;
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function permit_get(Request $request)
    {
        $tempid = \Crypt::decrypt($request->id);
        $permited = PermitLoad::where(['temporary_work_id' => $tempid])->latest()->get();
        $scaffold = Scaffolding::where(['temporary_work_id' => $tempid])->latest()->get();
        $list = '';
        if (count($permited) > 0) {
            $current =  \Carbon\Carbon::now();
            foreach ($permited as $permit) {
                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                $diff_in_days = $to->diffInDays($current);
                $class = '';
                $color = '';
                $status = '';
                $button = '';
                $days = (7 - $diff_in_days);
                if ($permit->status == 1) {
                    $status = "Open";
                    $button = '<a class="btn btn-primary" href="' . route("permit.renew", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Renew</a>';
                    if (isset($request->type)) {
                        $button = '<a class="btn btn-primary" href="' . route("permit.unload", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Unload</a>';
                    }
                    if ($diff_in_days > 7) {
                        $class = "background:gray";
                        $color = "text-danger";
                    }
                } elseif ($permit->status == 0 || $permit->status == 4) {
                    $status = "Closed";
                } elseif ($permit->status == 3) {
                    $status = "Unloaded";
                }
                $path = config('app.url');
                if (isset($request->scanuser)) {
                    $button = '';
                }
                if (isset($request->shared)) {
                    $button = '';
                }
                $list .= '<tr style="' . $class . '"><td><a target="_blank" href="' . $path . 'pdf/' . $permit->ped_url . '">Pdf Link</a></td><td>' . $permit->permit_no . '</td><td class="' . $color . '">' . $days . ' days </td><td>Permit Load</td><td>' .  $status . '</td><td>' . $button . '</td></tr>';
            }
            $list .= '<hr>';
        }
        if (count($scaffold) > 0) {
            $current =  \Carbon\Carbon::now();
            foreach ($scaffold as $permit) {
                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                $diff_in_days = $to->diffInDays($current);
                $class = '';
                $color = '';
                $days =  (7 -  $diff_in_days);
                $status = '';
                $button = '';
                if ($permit->status == 1) {
                    $status = "Open";
                    if ($request->type == "unload") {
                        $button = '<a class="confirm unload btn btn-primary" href="' . route("scaffold.close", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Unload</a>';
                    } else {
                        $button = '<a class="btn btn-primary" href="' . route("scaffold.unload", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Renew</a>';
                    }
                    if ($diff_in_days > 7) {
                        $class = "background:gray";
                        $color = "text-danger";
                    }
                } elseif ($permit->status == 0 || $permit->status == 4) {
                    $status = "Closed";
                } elseif ($permit->status == 3) {
                    $status = "Unloaded";
                }
                $path = config('app.url');
                if (isset($request->scanuser)) {
                    $button = '';
                }
                if (isset($request->shared)) {
                    $button = '';
                }
                $list .= '<tr style="' . $class . '"><td><a target="_blank"href="' . $path . 'pdf/' . $permit->ped_url . '">Pdf Link</a></td><td>' . $permit->permit_no . '</td><td class="' . $color . '">' .  $days . ' days</td><td>Scaffold</td><td>' .  $status . '</td><td>' . $button . '</td></tr>';
            }
        }
        echo $list;
    }

    //permit renew
    public function permit_renew($id)
    {
        $permitid =  \Crypt::decrypt($id);
        $permitdata = PermitLoad::find($permitid);
        $tempid = $permitdata->temporary_work_id;
        $tempdata = TemporaryWork::find($tempid);
        $data = explode("-", $permitdata->permit_no);
        $lastkey = count($data) - 1;
        $lastindex = end($data);
        if (preg_match("/[R]/", $lastindex)) {
            $str = (int)preg_replace('/\D/', '', $lastindex);
            $str = ++$str;
            $data[$lastkey] = 'R' . $str;
            $twc_id_no = implode('-', $data);
        } else {
            $twc_id_no = $permitdata->permit_no . '-R1';
        }
        $project = Project::with('company')->where('id', $permitdata->project_id)->first();
        return view('dashboard.temporary_works.permit-renew', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata'));
    }

    //permit unlaod
    public function permit_unload($id)
    {
        try {
            $permitid =  \Crypt::decrypt($id);
            $permitdata = PermitLoad::find($permitid);
            $tempid = $permitdata->temporary_work_id;
            $tempdata = TemporaryWork::select('twc_id_no')->find($tempid);
            $twc_id_no = $permitdata->permit_no;
            $project = Project::with('company')->where('id', $permitdata->project_id)->first();
            return view('dashboard.temporary_works.permit-unload', compact('project', 'tempid', 'permitdata', 'twc_id_no'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //permit unload save
    public function permit_unload_save(Request $request)
    {
        Validations::storepermitunload($request);
        try {
            $all_inputs  = $request->except('_token', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed', 'signed1', 'projno', 'projname', 'date', 'permitid', 'images', 'namesign1', 'namesign');
            $all_inputs['created_by'] = auth()->user()->id;
            $image_name1 = '';
            if (isset($request->signtype1)) {
                if ($request->signtype1 == 1) {
                    $all_inputs['signature1'] = $request->namesign1;
                } else {
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed1);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name1 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name1;
                    file_put_contents($file, $image_base64);
                    $all_inputs['signature1'] = $image_name1;
                }
            }
            //for 2
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
            $all_inputs['status'] = 4;
            $all_inputs['created_by'] = auth()->user()->id;
            $permitload = PermitLoad::create($all_inputs);
            if ($permitload) {
                //make status 0 if permit is 
                PermitLoad::find($request->permitid)->update(['status' => 3]);
                //upload permit unload files
                $image_links = $this->permitfiles($request, $permitload->id);
                $pdf = PDF::loadView('layouts.pdf.permit_unload', ['data' => $request->all(), 'image_name' => $image_name, 'image_name1' => $image_name1]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitload->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);
                $notify_admins_msg = [
                    'greeting' => 'Permit Unload Pdf',
                    'subject' => 'Permit Unload PDF',
                    'body' => [
                        'text' => 'A Permit to unload for the temporary works  has been completed as per the attached document. ',
                        'filename' => $filename,
                        'links' =>  '',
                        'name' => 'Permit Unload',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                #  Notification::route('mail', 'hani.thaher@gmail.com')->notify(new PermitNotification($notify_admins_msg));
                Notification::route('mail', $request->twc_email)->notify(new PermitNotification($notify_admins_msg));
                #   Notification::route('mail', $request->designer_company_email)->notify(new PermitNotification($notify_admins_msg));
                toastSuccess('Permit Unloaded sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //save permit files
    public function permitfiles($request, $id)
    {
        $image_links = [];
        if (isset($request->images) && $request->file('images')) {
            $filePath = HelperFunctions::temporaryworkImagePath();
            $files = $request->file('images');
            foreach ($files  as $key => $file) {
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $model = new PermitLoadImages();
                $model->fileName = $imagename;
                $model->permit_load_id = $id;
                $model->save();
                $image_links[] = $imagename;
            }
        }
        return $image_links;
    }
    public function scaffolding_load(Request $request)
    {
        $tempid = \Crypt::decrypt($request->temp_work_id);
        try {
            $tempdata = TemporaryWork::find($tempid);
            $twc_id_no = $tempdata->twc_id_no;
            $permitdata = Scaffolding::where(['temporary_work_id' => $tempid])->orderBy('id', 'desc')->first();
            if ($permitdata) {
                $data = explode("-", $permitdata->permit_no);
                if (isset($data[3])) {
                    $str = (int)preg_replace('/\D/', '', $data[3]);
                } elseif (isset($data[2])) {
                    $str = (int)preg_replace('/\D/', '', $data[2]);
                } elseif (isset($data[1])) {
                    $str = (int)preg_replace('/\D/', '', $data[1]);
                }
                $str = ++$str;
                $twc_id_no = $twc_id_no . '-S' . $str;
            } else {
                $twc_id_no = $twc_id_no . '-S1';
            }
            $project = Project::with('company')->where('id', $tempdata->project_id)->first();
            return view('dashboard.temporary_works.scaffolding', compact('project', 'tempid', 'twc_id_no', 'tempdata'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //save scaffolding
    public function scaffolding_save(Request $request)
    {
        //pdf work here
        Validations::storescaffolding($request);
        // try {
        $check_radios = [];
        foreach ($request->keys() as $key) {
            if (Str::contains($key, 'radio')) {
                $data = null;
                $data = [
                    $key => $request->$key
                ];
                $check_radios = array_merge($check_radios, $data);
                unset($request[$key]);
            }
        }
        $check_comments = [];
        foreach ($request->keys() as $key) {
            if (Str::contains($key, 'comment')) {
                $data = null;
                $data = [
                    $key => $request->$key
                ];
                $check_comments = array_merge($check_comments, $data);
                unset($request[$key]);
            }
        }

        // dd($request->file('even_stable_image'));
        $check_images = [];
        foreach ($request->keys() as $key) {

            if (Str::contains($key, 'image')) {
                $data = null;
                $filePath = HelperFunctions::scaffoldImagePath();
                $file = $request->file($key);
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $data = [
                    $key => $imagename
                ];
                $check_images = array_merge($check_images, $data);
                unset($request[$key]);
            }
        }
        // dd($check_images['ev en_stable_image']);
        $all_inputs  = $request->only('temporary_work_id', 'project_id', 'drawing_no', 'type', 'twc_name', 'loadclass', 'permit_no', 'drawing_title', 'tws_name', 'ms_ra_no', 'location_temp_work', 'description_structure', 'equipment_materials', 'equipment_materials_desc', 'workmanship', 'workmanship_desc', 'drawings_design', 'drawings_design_desc', 'loading_limit', 'loading_limit_desc', 'inspected_by', 'job_title', 'company', 'Scaff_tag_signed', 'carry_out_inspection', 'signature', 'created_by');

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
        $all_inputs['type'] = 'load';
        //save data in scaffolign model
        if (isset($request->type) && $request->type == "scaffoldunload") {
            $all_inputs['status'] = 1;
            Scaffolding::find($request->id)->update(['status' => 3]);
        }
        // dd($all_inputs);
        $scaffolding = Scaffolding::create($all_inputs);
        if ($scaffolding) {
            $model = new CheckAndComment();
            $model->radio_checks = $check_radios;
            $model->comments = $check_comments;
            $model->images = $check_images;
            $model->scaffolding_id = $scaffolding->id;
            $model->save();
            //end
            if ($request->no) {
                for ($i = 0; $i < count($request->no); $i++) {
                    $model = new CommentsAction();
                    $model->scaffolding_id = $scaffolding->id;
                    $model->no = $request['no'][$i];
                    $model->comments_actions = $request['desc_actions'][$i];
                    $model->action_date = $request['action_date'][$i];
                    $model->save();
                }
            }

            //work for images
            $image_links = $this->scaffoldfiles($request, $scaffolding->id);

            //pdf work here
            $pdf = PDF::loadView('layouts.pdf.scaffolding', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'check_radios' => $check_radios, 'check_comments' => $check_comments, 'check_images' => $check_images]);
            $path = public_path('pdf');
            $filename = rand() . '.pdf';
            $model = Scaffolding::find($scaffolding->id);
            $model->ped_url = $filename;
            $model->save();
            $pdf->save($path . '/' . $filename);
            $notify_admins_msg = [
                'greeting' => 'Scaffolding Pdf',
                'subject' => 'Scaffold PDF',
                'body' => [
                    'text' => 'A Permit to load has been completed for the scaffolding  as per the attached document.',
                    'filename' => $filename,
                    'links' =>  '',
                    'name' => 'scaffold',
                ],
                'thanks_text' => 'Thanks For Using our site',
                'action_text' => '',
                'action_url' => '',
            ];

            //mail send to admin here
            #  Notification::route('mail', 'hani.thaher@gmail.com')->notify(new PermitNotification($notify_admins_msg));
            Notification::route('mail', $request->twc_email)->notify(new PermitNotification($notify_admins_msg));
            # Notification::route('mail', $request->designer_company_email)->notify(new PermitNotification($notify_admins_msg));
            toastSuccess('Scaffolding Created Successfully');
            return redirect()->route('temporary_works.index');
        }
        // } catch (\Exception $exception) {
        //     toastError('Something went wrong, try again!');
        //     return Redirect::back();
        // }
    }

    //save scaffold images
    public function scaffoldfiles($request, $id)
    {
        $image_links = [];
        if (isset($request->images) && $request->file('images')) {
            $filePath = HelperFunctions::temporaryworkImagePath();
            $files = $request->file('images');
            foreach ($files  as $key => $file) {
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $model = new ScaffoldLoadImages();
                $model->fileName = $imagename;
                $model->scaffolding_id = $id;
                $model->save();
                $image_links[] = $imagename;
            }
        }
        return $image_links;
    }

    //search tempwork
    public function tempwork_search(Request $request)
    {
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereIn('created_by', $ids)->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            } else {
                if ($user->hasRole(['supervisor', 'scaffolder'])) {
                    $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                    $ids = [];
                    foreach ($project_idds as $id) {
                        $ids[] = $id->project_id;
                    }
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereHas('project', function ($q) use ($ids) {
                        $q->whereIn('id', $ids);
                    })->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                    $projects = Project::with('company')->whereIn('id', $ids)->get();
                } else {
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->where('created_by', $user->id)->latest()->paginate(20);
                    $projects = Project::with('company')->where('id', $user->id)->get();
                }
            }

            //work for datatable
            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //temp work search according to projects
    public function tempwork_project_search(Request $request)
    {
        //dd($request->all());
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereIn('project_id', $request->projects)->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereIn('project_id', $request->projects)->whereIn('created_by', $ids)->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            } else {
                if ($user->hasRole(['supervisor', 'scaffolder'])) {
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereIn('project_id', $request->projects)->latest()->paginate(20);
                    $projects = Project::with('company')->whereIn('id', $request->projects)->get();
                } else {
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->where('created_by', $user->id)->latest()->paginate(20);
                    $projects = Project::with('company')->where('id', $user->id)->get();
                }
            }

            //work for datatable
            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }


    // Temporary work attachment to send email

    public function tempwork_send_attach($id)
    {
        try {
            $data = TemporaryWork::with('temp_work_images', 'uploadfile', 'permits', 'scaffold')->find($id);
            Notification::route('mail', 'hani@ctworks.co.uk')->notify(new TempAttachmentNotifications($data));
            toastSuccess('Attachements sent successfully!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function scaffolding_close($id)
    {
        try {
            $scaffoldid =  \Crypt::decrypt($id);
            $scaffolddata = Scaffolding::find($scaffoldid);
            Scaffolding::find($scaffoldid)->update(['status' => 4]);

            return Redirect::back();
        } catch (\Exception $exception) {

            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //Scaffolod unlaod
    public function scaffolding_unload($id)
    {
        try {
            $scaffoldid =  \Crypt::decrypt($id);
            $scaffolddata = Scaffolding::find($scaffoldid);
            $tempid = $scaffolddata->temporary_work_id;
            $data = explode("-", $scaffolddata->permit_no);
            $lastkey = count($data) - 1;
            $lastindex = end($data);
            if (preg_match("/[R]/", $lastindex)) {
                $str = (int)preg_replace('/\D/', '', $lastindex);
                $str = ++$str;
                $data[$lastkey] = 'R' . $str;
                $twc_id_no = implode('-', $data);
            } else {
                $twc_id_no = $scaffolddata->permit_no . '-R1';
            }
            // $twc_id_no = $scaffolddata->permit_no;
            $project = Project::with('company')->where('id', $scaffolddata->project_id)->first();
            $checkAndComments = CheckAndComment::find($scaffoldid);
            return view('dashboard.temporary_works.scaffold-unload', compact('project', 'checkAndComments', 'tempid', 'scaffolddata', 'twc_id_no'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }


    //cron job for permit expire
    public function cron_permit()
    {

        $date = \Carbon\Carbon::today()->subDays(7);
        $notify_admins_msg = [
            'greeting' => 'Permit Expire',
            'subject' => 'Permit Load Expire',
            'body' => [
                'text' => 'You have an open job, Please close it or unload it.',
                'filename' => '',
                'links' =>  '',
                'name' => '',
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];
        PermitLoad::with('user')->where('status', 1)->where('created_at', '<', $date)->chunk(100, function ($permits) use ($notify_admins_msg) {
            foreach ($permits as $permit) {
                $notify_admins_msg['body']['filename'] = $permit->ped_url;
                Notification::route('mail', $permit->user->email ?? 'hani.thaher@gmail.com')->notify(new PermitNotification($notify_admins_msg));
            }
        });

        $notify_admins_msg = [
            'greeting' => 'Scaffold Expire',
            'subject' => 'Scaffold Load Expire',
            'body' => [
                'text' => 'You have an open job, Please close it or unload it.',
                'filename' => '',
                'links' =>  '',
                'name' => '',
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];
        Scaffolding::where('status', 1)->where('created_at', '<', $date)->chunk(100, function ($permits) use ($notify_admins_msg) {
            foreach ($permits as $permit) {
                $notify_admins_msg['body']['filename'] = $permit->ped_url;
                Notification::route('mail', $permit->user->email ?? 'admin@example.com')->notify(new PermitNotification($notify_admins_msg));
            }
        });
    }

    //export to excel
    public function export_excel()
    {
        return  Excel::download(new TemporyWorkExport, 'temp.xlsx');
    }

    //share temporary work
    public function Tempwork_share(Request $request)
    {
        try {
            $tempid = Crypt::decrypt($request->tempid);
            $condition = $request->condition;
            $useremail = $request->useremail;
            if (isset($request->commentsandother)) {
                $commentsandother = 1;
            } else {
                $commentsandother = 0;
            }

            if ($tempid == "" && $condition == "" && $useremail == "") {
                toastError('Please Fill All field');
                return Redirect::back();
            } else {
                $user = auth()->user();
                $projectid = HelperFunctions::getProjectid($tempid);
                if ($user->hasRole('admin')) {
                    HelperFunctions::sharetemwork($useremail, $condition, $tempid, $projectid, $commentsandother);
                } elseif ($user->hasRole('company')) {
                    $checkproject = Project::where(['id' => $projectid, 'company_id' => $user->id])->first();
                    if ($checkproject) {
                        HelperFunctions::sharetemwork($useremail, $condition, $tempid, $projectid, $commentsandother);
                    }
                } elseif ($user->hasRole('user')) {
                    $checkproject = DB::table('users_has_projects')->where(['project_id' => $projectid, 'user_id' => $user->id])->first();
                    if ($checkproject) {
                        HelperFunctions::sharetemwork($useremail, $condition, $tempid, $projectid, $commentsandother);
                    }
                }
                toastSuccess('TempWork Share Successfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //delete shared temporary work
    public function Delete_shared_temp(Request $request)
    {
        try {
            Tempworkshare::where(['temporary_work_id' => $request->id, 'user_id' => $request->user_id])->delete();
            toastSuccess('Temporary share  Work Delete Successfully!!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
}
