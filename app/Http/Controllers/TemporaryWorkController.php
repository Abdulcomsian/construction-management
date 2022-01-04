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
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->latest()->paginate(20);
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereIn('created_by', $ids)->latest()->paginate(20);
            } else {
                if ($user->hasRole(['supervisor', 'scaffolder'])) {
                    $users = User::select('id')->where('company_id', auth()->user()->company_id)->get();
                    foreach ($users as $u) {
                        $ids[] = $u->id;
                    }
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereIn('created_by', $ids)->latest()->paginate(20);
                } else {
                    $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->where('created_by', $user->id)->latest()->paginate(20);
                }
            }

            //work for datatable
            return view('dashboard.temporary_works.index', compact('temporary_works'));
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
            return view('dashboard.temporary_works.create', compact('projects'));
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
            $count = TemporaryWork::where('project_id', $request->project_id)->count();
            $count = $count + 1;
            $twc_id_no = $request->projno . '-' . strtoupper(substr($request->company, 0, 2)) . '-00' . $count;
            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'projaddress', 'signed', 'images', 'namesign', 'signtype', 'projno', 'projname');
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
            if (auth()->user()->hasRole('admin')) {
                $all_inputs['created_by'] = $request->company_id;
            }
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
        $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->where(['project_id' => $id, 'tempid' => $tempid])->get();
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
        $commetns = TemporaryWorkComment::where(['user_id' => $request->id, 'temporary_work_id' => $request->temporary_work_id])->get();
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
                $twc_id_no = $twc_id_no . '-' . ++$data[3];
            } else {
                $twc_id_no = $twc_id_no . '-A';
            }
            $project = Project::with('company')->where('id', $tempdata->project_id)->first();
            return view('dashboard.temporary_works.permit', compact('project', 'tempid', 'twc_id_no'));
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
            $all_inputs  = $request->except('_token', 'signtype1', 'signtype', 'signed', 'signed1', 'projno', 'projname', 'date', 'type', 'permitid', 'images', 'namesign1', 'namesign');
            $all_inputs['created_by'] = auth()->user()->id;
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

                // $image_links = $this->permitfiles($request, $permitload->id);
                $pdf = PDF::loadView('layouts.pdf.permit_load', ['data' => $request->all(), 'image_name' => $image_name, 'image_name1' => $image_name1]);
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
                Notification::route('mail', 'admin@example.com')->notify(new PermitNotification($notify_admins_msg));
                toastSuccess('Permit ' . $msg . ' sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
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
                if ($diff_in_days > 7) {
                    $class = "background:gray";
                }
                $status = '';
                $button = '';
                if ($permit->status == 1) {
                    $status = "Open";
                    $button = '<a class="btn btn-primary" href="' . route("permit.renew", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Renew</a>';
                    if (isset($request->type)) {
                        $button = '<a class="btn btn-primary" href="' . route("permit.unload", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Unload</a>';
                    }
                } elseif ($permit->status == 0 || $permit->status == 4) {
                    $status = "Closed";
                } elseif ($permit->status == 3) {
                    $status = "Unloaded";
                }
                $list .= '<tr style="' . $class . '"><td><a target="_blank" href="pdf/' . $permit->ped_url . '">Pdf Link</a></td><td>' . $permit->created_at->todatestring() . '</td><td>Permit Load</td><td>' .  $status . '</td><td>' . $button . '</td></tr>';
            }
        }
        if (count($scaffold) > 0) {
            $current =  \Carbon\Carbon::now();
            foreach ($scaffold as $permit) {
                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                $diff_in_days = $to->diffInDays($current);
                $class = '';
                if ($diff_in_days > 7) {
                    $class = "background:gray";
                }
                $status = '';
                $button = '';
                if ($permit->status == 1) {
                    $status = "Open";
                    $button = '<a class="btn btn-primary" href="#"><span class="fa fa-plus-square"></span>Unload</a>';
                    if (isset($request->type)) {
                        $button = '<a class="btn btn-primary" href="' . route("permit.unload", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Unload</a>';
                    }
                } elseif ($permit->status == 0) {
                    $status = "Closed";
                }
                $list .= '<tr style="' . $class . '"><td><a target="_blank" href="pdf/' . $permit->ped_url . '">Pdf Link</a></td><td>' . $permit->created_at->todatestring() . '</td><td>Scaffold</td><td>' .  $status . '</td><td>' . $button . '</td></tr>';
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
        return view('dashboard.temporary_works.permit-renew', compact('project', 'tempid', 'permitdata', 'twc_id_no'));
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
            $all_inputs  = $request->except('_token',  'signtype1', 'signtype', 'signed', 'signed1', 'projno', 'projname', 'date', 'permitid', 'images', 'namesign1', 'namesign');
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
                    'subject' => 'Scaffold PDF',
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
                Notification::route('mail', 'admin@example.com')->notify(new PermitNotification($notify_admins_msg));
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
                $str = (int)preg_replace('/\D/', '', $data[3]);
                $str = ++$str;
                $twc_id_no = $twc_id_no . '-S' . $str;
            } else {
                $twc_id_no = $twc_id_no . '-S1';
            }
            $project = Project::with('company')->where('id', $tempdata->project_id)->first();
            return view('dashboard.temporary_works.scaffolding', compact('project', 'tempid', 'twc_id_no'));
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
        try {
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
            $all_inputs  = $request->except('_token', 'signtype', 'signed', 'namesign', 'projno', 'projname', 'no', 'action_date', 'desc_actions', 'date');
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
            //save data in scaffolign model
            $scaffolding = Scaffolding::create($all_inputs);
            if ($scaffolding) {
                $model = new CheckAndComment();
                $model->radio_checks = $check_radios;
                $model->comments = $check_comments;
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

                //pdf work here
                $pdf = PDF::loadView('layouts.pdf.scaffolding', ['data' => $request->all(), 'image_name' => $image_name, 'check_radios' => $check_radios, 'check_comments' => $check_comments]);
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
                Notification::route('mail', 'admin@example.com')->notify(new PermitNotification($notify_admins_msg));
                toastSuccess('Scaffolding Created Successfully');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //search tempwork
    public function tempwork_search(Request $request)
    {
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->whereIn('created_by', $ids)->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
            } else {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits')->where('created_by', $user->id)->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
            }

            //work for datatable
            return view('dashboard.temporary_works.index', compact('temporary_works'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }


    // Temporary work attachment to send email

    public function tempwork_send_attach($id)
    {
        try {
            $data = TemporaryWork::with('temp_work_images', 'uploadfile')->find($id);
            Notification::route('mail', 'basitawan.abdul@gmail.com')->notify(new TempAttachmentNotifications($data));
            toastSuccess('Attachements sent successfully!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
}
