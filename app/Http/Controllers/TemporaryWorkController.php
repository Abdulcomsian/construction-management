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
use App\Models\TemporaryWorkRejected;
use App\Models\ScaffoldLoadImages;
use App\Models\ChangeEmailHistory;
use App\Notifications\PermitNotification;
use App\Notifications\TempAttachmentNotifications;
use App\Notifications\CommentsNotification;
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
use App\Models\PermitComments;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Auth;

class TemporaryWorkController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->latest()->paginate(20);
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                    $q->whereIn('project_id', $ids);
                })->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            }
            //work for datatable
            $scantempwork = '';

            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects', 'scantempwork'));
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
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('id', $ids)->latest()->paginate(20);
                $projects_id = Tempworkshare::select('project_id')->groupBy('project_id')->get();
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
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
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('id', $ids)->latest()->paginate(20);
                $projects_id = Tempworkshare::select('project_id')->where('user_id', $user->id)->groupBy('project_id')->get();
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
            } else {
                $tempidds = DB::table('tempworkshares')->where('user_id', $user->id)->get();
                $users = [];
                $ids = [];
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('id', $ids)->latest()->paginate(20);

                $projects_id = Tempworkshare::select('project_id')->where('user_id', $user->id)->groupBy('project_id')->get();
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
            }
            //dd($temporary_works);
            $scantempwork = 'sharedview';
            //work for datatable
            return view('dashboard.temporary_works.shared', compact('temporary_works', 'users', 'scantempwork', 'projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    public function create()
    {
        if (auth()->user()->hasRole([['supervisor', 'scaffolder']])) {
            toastError('the temporary works coordinator is the only appointed person who can create a design brief. If you require access, please contact your management team to request access for you');
            return Redirect::back();
        }

        if (auth()->user()->hasRole([['user']]) && Auth::user()->userCompany->nomination == 1) {
           if(Auth::user()->nomination == 1 && Auth::user()->nomination_status == 0)
            {
                toastError('You can no create temporary work until your nomination form appprove thanks ');
                  return Redirect::back();
            }
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
                if(auth()->user()->nomination==1 && auth()->user()->nomination_status==1)
                {
                    $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                    $ids = [];
                    foreach ($project_idds as $id) {
                        $ids[] = $id->project_id;
                    }
                    $projects = Project::with('company')->whereIn('id', $ids)->get();
                }
                else
                {
                     toastError('You can no create temporary work until your nomination form appprove thanks ');
                      return Redirect::back();
                }
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
                if ($request->file('drawing')) {
                    $file = $request->file('drawing');
                    #uploading drawing
                    $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                    $model = new TempWorkUploadFiles();
                    $model->file_name = $imagename;
                    $model->file_type = 1;
                    $model->created_at = $request->design_required_by_date;
                    $model->temporary_work_id = $temporary_work->id;
                    $model->created_by = Auth::user()->email;
                    $model->save();
                }

                #uploading DCC
                if ($request->file('dcc')) {
                    $file = $request->file('dcc');
                    $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                    $model = new TempWorkUploadFiles();
                    $model->file_name = $imagename;
                    $model->file_type = 2;
                    $model->created_at = $request->dcc_returned;
                    $model->temporary_work_id = $temporary_work->id;
                    $model->save();
                }
            }
            if ($temporary_work) {
                toastSuccess('Temporary Work successfully added!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            //dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //store desing brief
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
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'projaddress', 'signed', 'images', 'namesign', 'signtype', 'pdfsigntype', 'pdfphoto', 'projno', 'projname', 'approval');
            //upload signature here
            $image_name = '';
            if ($request->signtype == 1) {
                $image_name = $request->namesign;
            } elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
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
            if (isset($request->approval)) {
                $all_inputs['status'] = '0';
            } else {
                $all_inputs['status'] = '1';
            }

            //photo work here
            if ($request->photo) {
                $filePath = HelperFunctions::designbriefphotopath();
                $file = $request->file('photo');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['photo'] = $imagename;
            }
            $categorylabel=explode("-",$request->design_requirement_text);
            $all_inputs['category_label']=$categorylabel[0];
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
                if (isset($request->approval)) {
                    TemporaryWorkRejected::create([
                        'temporary_work_id' => $temporary_work->id,
                        'acceptance_date' => date('Y-m-d H:i:s'),
                        'pdf_url' => $filename,
                        'email' => Auth::user()->email,
                    ]);

                    //changing email history
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->pc_twc_email;
                    $cmh->type ='Design Brief';
                    $cmh->foreign_idd=$temporary_work->id;
                    $cmh->message='Email sent for approval';
                    $cmh->save();
                }
                //send mail to admin
                $notify_admins_msg = [
                    'greeting' => 'Temporary Work Pdf',
                    'subject' => $model->design_requirement_text . '-' . $model->twc_id_no,
                    'body' => [
                        'company' => $request->company,
                        'filename' => $filename,
                        'links' => '',
                        'name' =>  $model->design_requirement_text . '-' . $model->twc_id_no,
                        'designer' => '',
                        'pc_twc' => '',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];

                //when desing is not apporoved email is only send to twc approval
                if (isset($request->approval)) {
                    $notify_admins_msg['body']['pc_twc'] = '1';
                    Notification::route('mail', $request->pc_twc_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id));
                } else {
                    //send email to admin
                    Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id));

                    //send to twc email
                    Notification::route('mail', $request->twc_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id));

                    //designer
                    if ($request->designer_company_email) {
                        $notify_admins_msg['body']['designer'] = 'designer1';
                         //changing email history
                        $cmh= new ChangeEmailHistory();
                        $cmh->email=$request->designer_company_email;
                        $cmh->type ='Designer Company';
                        $cmh->foreign_idd=$temporary_work->id;
                        $cmh->message='Email send to Desinger Company';
                        $cmh->save();
                        Notification::route('mail', $request->designer_company_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id, $request->designer_company_email));
                    }

                    //designer email second
                    if ($request->desinger_email_2) {
                        $notify_admins_msg['body']['designer'] = 'designer1';
                        $cmh= new ChangeEmailHistory();
                        $cmh->email=$request->desinger_email_2;
                        $cmh->type ='Designer Checker';
                        $cmh->foreign_idd=$temporary_work->id;
                        $cmh->message='Email send to Desinger Checker';
                        $cmh->save();
                        Notification::route('mail', $request->desinger_email_2)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id, $request->desinger_email_2));
                    }
                }
            }
            toastSuccess('Temporary Work successfully added!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    public function show(TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    public function edit(TemporaryWork $temporaryWork)
    {
        if (auth()->user()->hasRole([['supervisor', 'scaffolder']])) {
            toastError('the temporary works coordinator is the only appointed person who can create a design brief. If you require access, please contact your management team to request access for you');
            return Redirect::back();
        }

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
            $temporaryWork = TemporaryWork::with('scopdesign', 'folder', 'attachspeccomment', 'temp_work_images')->where('id', $temporaryWork->id)->first();
            $selectedproject = Project::with('company')->find($temporaryWork->project_id);
            return view('dashboard.temporary_works.edit', compact('temporaryWork', 'projects', 'selectedproject'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //update design brief
    public function update(Request $request, TemporaryWork $temporaryWork)
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
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'projaddress', 'signed', 'images', 'preloaded', 'namesign', 'signtype','pdfsigntype', 'pdfphoto','projno', 'projname', 'approval');
            //upload signature here
            //upload signature here
            $image_name = '';
            if ($request->signtype == 1) {
                $image_name = $request->namesign;
            } elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
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
            $all_inputs['signature'] = $image_name;
            $all_inputs['created_by'] = auth()->user()->id;
            if (auth()->user()->hasRole('admin')) {
                $all_inputs['created_by'] = $request->company_id;
            }
            //work for qrcode
            $j = HelperFunctions::generatetempid($request->project_id);
            $all_inputs['tempid'] = $j;
            if (isset($request->approval)) {
                $all_inputs['status'] = '0';
            } else {
                $all_inputs['status'] = '1';
            }
            $categorylabel=explode("-",$request->design_requirement_text);
            $all_inputs['category_label']=$categorylabel[0];
            $temporary_work = TemporaryWork::find($temporaryWork->id)->update($all_inputs);
            if ($temporary_work) {
                ScopeOfDesign::where('temporary_work_id', $temporaryWork->id)->update(array_merge($scope_of_design, ['temporary_work_id' => $temporaryWork->id]));
                Folder::where('temporary_work_id', $temporaryWork->id)->update(array_merge($folder_attachements, ['temporary_work_id' => $temporaryWork->id]));
                AttachSpeComment::where('temporary_work_id', $temporaryWork->id)->update(array_merge($attachcomments, ['temporary_work_id' => $temporaryWork->id]));

                //work for upload images here
                $image_links = [];
                if ($request->preloaded) {
                    $oldimages = TemporayWorkImage::where('temporary_work_id', $temporaryWork->id)->whereNotIn('image', $request->preloaded)->get();

                    foreach ($oldimages as $oldimg) {
                        @unlink($oldimg->image);
                    }
                }
                TemporayWorkImage::where('temporary_work_id', $temporaryWork->id)->delete();
                if ($request->file('images')) {
                    $filePath = HelperFunctions::temporaryworkImagePath();
                    $files = $request->file('images');
                    foreach ($files  as $key => $file) {
                        $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                        $model = new TemporayWorkImage();
                        $model->image = $imagename;
                        $model->temporary_work_id = $temporaryWork->id;
                        $model->save();
                        $image_links[] = $imagename;
                    }
                }
                if ($request->preloaded) {
                    foreach ($request->preloaded as $img) {
                        $model = new TemporayWorkImage();
                        $model->image =  $img;
                        $model->temporary_work_id = $temporaryWork->id;
                        $model->save();
                        $image_links[] = $img;
                    }
                }

                //work for pdf

                $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $request->all(), 'image_name' => $temporaryWork->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => $request->twc_id_no, 'comments' => $attachcomments]);
                $path = public_path('pdf');
                @unlink($path . '/' . $temporaryWork->ped_url);
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporaryWork->id);
                $model->ped_url = $filename;
                $model->save();
                if (isset($request->approval)) {
                    TemporaryWorkRejected::create([
                        'temporary_work_id' => $temporaryWork->id,
                        'acceptance_date' => date('Y-m-d H:i:s'),
                        'pdf_url' => $filename,
                        'email' => Auth::user()->email,
                    ]);

                     //changing email history
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->pc_twc_email;
                    $cmh->type ='Design Brief';
                    $cmh->foreign_idd=$temporaryWork->id;
                    $cmh->save();
                }
                //send mail to admin
                $notify_admins_msg = [
                    'greeting' => 'Temporary Work Pdf',
                    'subject' => $model->design_requirement_text . '-' . $model->twc_id_no,
                    'body' => [
                        'company' => $request->company,
                        'filename' => $filename,
                        'links' => '',
                        'name' =>  $model->design_requirement_text . '-' . $model->twc_id_no,
                        'designer' => '',
                        'pc_twc' => '',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];

                if (isset($request->approval)) {
                    $notify_admins_msg['body']['designer'] = '';
                    $notify_admins_msg['body']['pc_twc'] = '1';
                    Notification::route('mail', $request->pc_twc_email ?? '')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id));
                } else {
                    Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id));
                    Notification::route('mail', $request->twc_email ?? '')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id));
                    //designer
                    if ($request->designer_company_email) {
                        $notify_admins_msg['body']['designer'] = 'designer1';
                        Notification::route('mail', $request->designer_company_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id, $request->designer_company_email));
                    }

                    //designer email second
                    if ($request->desinger_email_2) {
                        $notify_admins_msg['body']['designer'] = 'designer1';
                        Notification::route('mail', $request->desinger_email_2)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id, $request->desinger_email_2));
                    }
                }
            }
            toastSuccess('Temporary Work successfully Updated!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //delete design brief
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
                if (isset($request->rams_no) && $request->type == 3) {

                    TemporaryWork::find($request->tempworkid)->update(['rams_no' => $request->rams_no]);
                }
                return response()->json(['success' =>  $imagename]);
            }
        } catch (\Exception $exception) {
            return response()->json(['error' =>  $imagename]);
        }
    }
    //load scan file against temporary work
    public function load_scan_temporarywork(Request $request, $id)
    {
        $tempid =$request->temp;
        $dtempid = Crypt::decryptString($request->temp);
        $temporary_works = TemporaryWork::where(['project_id' => $id, 'tempid' => $dtempid])->first();
        $temporary_work_id=$temporary_works->id;
        $scantempwork = 'scantempwork';
        return view('dashboard.temporary_works.temporarywork-scan', compact('tempid','id','temporary_work_id','scantempwork'));
    }

    //show scan temporary work code here
    public function show_scan_temporarywork(Request $request,$id)
    {
        $tempid = Crypt::decryptString($request->temp);
        $scantempwork = 'scantempwork';
        $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments','scancomment','permits', 'scaffold')->where(['project_id' => $id, 'tempid' => $tempid])->get();
        return view('dashboard.temporary_works.index_user', compact('temporary_works', 'scantempwork'));
    }
    //save comments against temp work
    public function temp_savecomment(Request $request)
    {
        Validations::storeComment($request);
        try {
            //get twc email
            $tempdata = TemporaryWork::select('twc_email', 'design_requirement_text', 'twc_id_no')->find($request->temp_work_id);
            $model = new TemporaryWorkComment();
            $model->comment = $request->comment;
            $model->temporary_work_id = $request->temp_work_id;
            $model->user_id = auth()->user()->id ?? NULL;
            $model->sender_email = $request->mail ?? NULL;
            $model->sender_name = $request->sender_name ?? NULL;
            $model->status = $request->status ?? '0';
            if ($request->file('image')) {
                $filePath = HelperFunctions::temporaryworkcommentPath();
                $file = $request->file('image');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $model->image = $imagename;
            }
            if (isset($request->type) && $request->type == 'scan') {
                $model->type = 'scan';
            }
            if (isset($request->type) && $request->type == 'twc') {
                $model->type = 'twc';
                $twc="twc";
            }
            if ($model->save()) {
                if(!isset($twc))
                {
                  Notification::route('mail', $tempdata->twc_email)->notify(new CommentsNotification($request->comment, 'question', $request->temp_work_id,'',$request->type ?? ''));
                 }

                toastSuccess('Comment submitted successfully');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function temp_savecommentreplay(Request $request)
    {
        try {
            $commentid = $request->commentid;
            $tempid = $request->tempid;
            $data = TemporaryWorkComment::select('replay', 'reply_image', 'reply_date', 'sender_email')->find($commentid);
            $array = [];
            $reply_date = [];
            if (is_array($data->replay)) {
                foreach ($data->replay as $dt) {
                    $array[] = $dt;
                }
            }
            $array[] = $request->replay;

            if (is_array($data->reply_date)) {
                foreach ($data->reply_date as $dt) {
                    $reply_date[] = $dt;
                }
            }
            $reply_date[] = date('Y-m-d H:i:s');

            $arrayimage = [];
            if (is_array($data->reply_image)) {
                foreach ($data->reply_image as $img) {
                    $arrayimage[] = $img;
                }
            }
            if ($request->file('replyfile')) {
                $filePath = HelperFunctions::temporaryworkcommentPath();
                $file = $request->file('replyfile');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $arrayimage[] = $imagename;
            } else {
                $arrayimage[] = null;
            }
            $scan = '';
            if (isset($request->scan)) {
                $scan = 'scan';
            }
            $res = TemporaryWorkComment::find($commentid)->update([
                'replay' => $array,
                'reply_image' => $arrayimage,
                'reply_date' => $reply_date,
                'reply_email' => Auth::user()->email,
            ]);
            if ($res) {
                Notification::route('mail',  $data->sender_email)->notify(new CommentsNotification($request->replay, 'reply', $tempid, $data->sender_email, $scan));
                toastSuccess('Thank you for your reply');
                return Redirect::back();
            } else {
                toastError('Something went wrong, try again');
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
            if ($model->save()) {
                toastSuccess('TW Name Save sucessfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
    //update commetns status
    public function comments_status(Request $request)
    {
        $status = $request->text;
        if ($status == "Pending") {
            $commentmodel = TemporaryWorkComment::find($request->commentid);
            $commentmodel->status = 1;
            if ($commentmodel->save()) {
                return "success";
            } else {
                return 'false';
            }
        } else {
            $commentmodel = TemporaryWorkComment::find($request->commentid);
            $commentmodel->status = 0;
            if ($commentmodel->save()) {
                return "success";
            } else {
                return 'false';
            }
        }
    }
    //get commetns
    public function get_comments(Request $request)
    {
        $table = '';
        $tabletwc='';
        $path = config('app.url');
        if ($request->type == 'normal') {
            $commetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'normal'])->get();
            $twccommetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'twc'])->get();
        } elseif ($request->type == 'pc') {
            $commetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'pc'])->get();
        } elseif ($request->type == 'permit') {
            $permit_id = \Crypt::decrypt($request->permit_id);
            $commetns = PermitComments::where(['permit_load_id' =>  $permit_id])->latest()->get();
        } elseif ($request->type == 'scan' || $request->type == 'qscan') {
            $temporary_work_id = $request->temporary_work_id;
            $commetns = TemporaryWorkComment::where(['temporary_work_id' => $temporary_work_id, 'type' => 'scan'])->get();
        }
        //twc comments here
        if (isset($twccommetns) && count($twccommetns) > 0) {
            $tabletwc.= '<table class="table table-hover" style="border-collapse:separate;border-spacing:0 5px;"><thead style="height:80px"><tr><th>No</th><th>Twc Comment</th><th style="width:120px;">Date</th><th></th></tr></thead><tbody>';
            $i = 1;
            foreach ($twccommetns as $comment) {
                 $tabletwc .= '<tr style="background:white">
                               <td>' . $i . '</td><td>' . $comment->comment . '</td>
                               <td>' . date("d-m-Y H:i:s", strtotime($comment->created_at)) . '</td>
                           </tr>';
                $i++;
            }
             $tabletwc .= '</tbody></table>';
        }
        if (count($commetns) > 0) {
            if ($request->type == "permit" || $request->type == 'pc' || $request->type == "qscan") {
                $table.= '<table class="table table-hover" style="border-collapse:separate;border-spacing:0 5px;"><thead style="height:80px"><tr><th style="width:120px;">No</th><th style="width:35%;">Comment</th><th></th><th style="width:120px;">Date</th><th></th></tr></thead><tbody>';
            } else {
                $table .= '<table class="table table-hover" style="border-collapse:separate;border-spacing:0 5px;"><thead style="height:80px"><tr><th style="width:10%;">No</th><th style="width:35%;">Designer Comment</th><th style="width:40%">TWC Reply</th><th></th><th style="width:25%;">Date</th></tr></thead><tbody>';
            }

            $i = 1;
            foreach ($commetns as $comment) {
                 $image = '';
                  $date = '';
                $colour = 'white';
                $a = '';
                $status = '';
                $input = '';
                if (isset($request->type) && $request->type == 'scan' || $request->type == 'qscan') {
                    $input = '<input type="hidden" name="scan" value="scan" />';
                    if ($comment->status==0) {
                        $colour = "green";
                    } elseif($comment->status==1) {
                        $colour = '#6A5ACD';
                    }elseif($comment->status==2){
                        $colour="red";
                    }
                    if ($comment->image) {
                        $n = strrpos($comment->image, '.');
                        $ext = substr($comment->image, $n + 1);
                        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                            $a = '<a target="_blank" href="' . $path . $comment->image . '"><img width="50px" height="50px" src=' . $path . $comment->image . ' ></a>';
                        } else {
                            $a = '<a target="_blank" href="' . $path . $comment->image . '">Attach File</a>';
                        }
                    }
                }

                $list = '';
                $k = 1;
                $formorreply='';
                $none='';
                if ($comment->replay) {
                    $none='display:none;';
                  
                    // for ($j = 0; $j < count($comment->replay); $j++) {
                        if ($comment->replay[0]) {
                            $image = '';
                            if (isset($comment->reply_image[0])) {
                                $n = strrpos($comment->reply_image[0], '.');
                                $ext = substr($comment->reply_image[0], $n + 1);
                                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                                    $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '"><img src="' . $path . $comment->reply_image[0] . '" width="50px" height="50px"/></a>';
                                } else {
                                    $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '">View File</a>';
                                }
                            }
                            $date = '';
                            if (isset($comment->reply_date[0])) {
                                $date = date("H:i d-m-Y", strtotime($comment->reply_date[0]));
                            }
                            // $list .= '<tr style="background:#08d56478;margin-top:1px"><td>R</td><td>' . $comment->replay[0] . '</td><td>' . $comment->reply_email . '<br>' . $image . '<br>' . $date . '</td><td></td><td>' .  date("d-m-Y", strtotime($comment->reply_date[0])) . '</td></tr><br>';
                            $k++;
                        }
                    //}
                        $formorreply=$comment->reply_email. '<br>'. $comment->replay[0].'<br>' . $image . '<br>' . $date;
                }

                $date_comment = date("d-m-Y", strtotime($comment->created_at->todatestring()));
                if ($request->type != "permit" && $request->type != 'pc' && $request->type != 'qscan' && $comment->type != 'twc') {

                    $table .= '<tr style="background:' . $colour . '">
                               <td>' . $i . '</td><td>'.$comment->sender_name.'<br>'. $comment->sender_email . '<br>' . $comment->comment . '<br>' . date('H:i d-m-Y', strtotime($comment->created_at)) . '</td>
                               <td style=" flex-direction: column;">
                               '.$formorreply.'
                                <form style="'.$none.'"  method="post" action="' . route("temporarywork.storecommentreplay") . '" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                                   <input type="hidden" name="tempid" value="' . $request->temporary_work_id . '"/>
                                   <textarea style="width: 100%" type="text" class="replay" name="replay" style="float:left" placeholder="Add comment here..."></textarea>
                                    <div class="submmitBtnDiv">
                                        <input style="width:50%;margin-top:20px;float:left" type="file" name="replyfile" />
                                        <input type="hidden" name="commentid" value="' . $comment->id . '"/>
                                        ' . $input . '
                                        <button class="btn btn-primary replay-comment" style="font-size:10px;margin-top:10px;float:right;">submit</button>
                                    </div>

                                </form>

                               </td>

                               <td>' . $a . '</td>
                               <td>' . $date_comment . '</td>
                           </tr>' . $list . '';
                } else {
                    $table .= '<tr style="background:' . $colour . '">
                               <td>' . $i . '</td><td>' . $comment->comment . '</td>
                               <td>' . $a . '</td>
                               <td>' . $date_comment  . '</td>
                           </tr>' . $list . '';
                }

                $i++;
            }

            $table .= '</tbody></table>';
            
        } 
        echo  json_encode(array('comment'=>$table,'twccomment'=>$tabletwc));
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
    //unset keys
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
            $permitdata = PermitLoad::where(['temporary_work_id' => $tempid])->where('status', '!=', 3)->orderBy('id', 'desc')->first();
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
            $latestuploadfile = TempWorkUploadFiles::where('file_type', 1)->orderBy('id', 'desc')->limit(1)->first();
            return view('dashboard.temporary_works.permit', compact('project', 'tempid', 'twc_id_no', 'tempdata', 'latestuploadfile'));
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
            $all_inputs  = $request->except('_token', 'approval', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed','pdfsigntype','pdfphoto','signed1', 'projno', 'projname', 'date', 'type', 'permitid', 'images', 'namesign1', 'namesign', 'design_requirement_text');
            $all_inputs['created_by'] = auth()->user()->id;
            //first person signature and name
            $image_name1 = '';
            if ($request->principle_contractor == 1) {
                $all_inputs['name1'] = $request->name1;
                $all_inputs['job_title1'] = $request->job_title1;
                //old work =================================================
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
            } elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
                $all_inputs['signature'] = $image_name;
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
            //old work
            /*if ($request->signtype == 1) {
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
            }*/
            $all_inputs['created_by'] = auth()->user()->id;
            if (isset($request->approval)) {
                $all_inputs['status'] = 2;
            }
            $permitload = PermitLoad::create($all_inputs);
            if ($permitload) {
                //make status 0 if permit is 

                $msg = " Attached in the i-Works web portal for your attention is a PDF permit to load which has been created by " . $request->company . " Ltd (" . $request->design_requirement_text . ").";
                $message = "Load";
                if (isset($request->type)) {
                    PermitLoad::find($request->permitid)->update(['status' => 0]);
                    $msg = "Attached in the i-Works web portal for your attention is a PDF permit to load Renew by " . $request->company . " Ltd (" . $request->design_requirement_text . ").";
                    $message = "Renew";
                }

                //save permit image
                $image_links = $this->permitfiles($request, $permitload->id);
                $pdf = PDF::loadView('layouts.pdf.permit_load', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'image_name1' => $image_name1]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitload->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);

                $notify_admins_msg = [
                    'greeting' => 'Permit Pdf',
                    'subject' => $request->design_requirement_text . '-' . $request->permit_no,
                    'body' => [
                        'text' => $msg,
                        'filename' => $filename,
                        'links' =>  '',
                        'pc_twc' => '',
                        'id' => $permitload->id,
                        'name' => 'Permit Load',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];

                if (isset($request->approval)) {
                    $notify_admins_msg['body']['pc_twc'] = '1';
                    Notification::route('mail', $request->pc_twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
                } else {
                    //send email to coordinator
                    // $coordinatoremail = User::select('email')->whereHas(
                    //     'roles',
                    //     function ($q) {
                    //         $q->where('name', 'user');
                    //     }
                    // )->where('company_id', $request->companyid)->first();
                    // Notification::route('mail', $coordinatoremail->email ?? '')->notify(new PermitNotification($notify_admins_msg));
                    Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new PermitNotification($notify_admins_msg));
                    Notification::route('mail', $request->twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
                    // Notification::route('mail', auth()->user()->email ?? '')->notify(new PermitNotification($notify_admins_msg));
                }
                toastSuccess('Permit ' . $message . ' sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //get all permits and loads in modal
    public function permit_get(Request $request)
    {
        $tempid = \Crypt::decrypt($request->id);
         if (isset($request->type)) {
           $permited = PermitLoad::where(['temporary_work_id' => $tempid])->where('status','!=',4)->where('status','!=',0)->latest()->get();
            $scaffold = Scaffolding::where(['temporary_work_id' => $tempid])->where('status','!=',4)->where('status','!=',0)->latest()->get();
         }else{
             $permited = PermitLoad::where(['temporary_work_id' => $tempid])->where('status','!=',3)->latest()->get();
             $scaffold = Scaffolding::where(['temporary_work_id' => $tempid])->latest()->get();
         }
       
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
                        $button = '<a style="line-height:15px;height: 50px;margin: 4px 0;" class="btn btn-primary" href="' . route("permit.renew", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Renew</a>';
                        if (isset($request->type)) {
                            $button = '
                            <div>
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a style="line-height:15px;height: 50px;margin: 4px 0;" class="" href="' . route("permit.unload", \Crypt::encrypt($permit->id)) . '" ><span class="fa fa-plus-square" ></span> Unload</a>
                                        <a class="confirm1 dropdown-item" href="' . route("permit.close", \Crypt::encrypt($permit->id)) . '" data-text="ARE YOU SURE?">Close</a>
                                      </div>
                                    </div>
                            ';
                        }
                        if ($diff_in_days > 7) {
                            $class = "background:gray";
                            $color = "text-danger";
                        }
                    } elseif ($permit->status == 0 ) {
                        $status = "Closed";
                    } elseif($permit->status == 4)
                    {
                        $status = "Unloaded";
                    }
                    elseif ($permit->status == 3) {
                        $status = "Unloaded";
                    } elseif ($permit->status == 2) {
                        $status = "Pending";
                    } elseif ($permit->status == 5) {
                        $status = "<span class='permit-rejected  cursor-pointer btn btn-danger ' style='font-size: 13px;width: 70px;border-radius:8px; height: 20px;line-height: 0px;' data-id='" . \Crypt::encrypt($permit->id) . "'>DNL</span> &nbsp; <a href=" . route("permit.edit", \Crypt::encrypt($permit->id)) . "><i style='font-size:20px;' class='fa fa-edit'></i></a>";
                    }
                    $path = config('app.url');
                    if (isset($request->scanuser)) {
                        $button = '';
                    }
                    if (isset($request->shared)) {
                        $button = '';
                    }
                    if (auth()->user()->hasRole('scaffolder')) {
                        $button = '';
                    }
                    $list .= '<tr style="' . $class . '"><td><a style="    height: 50px;line-height: 15px;" target="_blank" href="' . $path . 'pdf/' . $permit->ped_url . '">' . $request->desc . '</a></td><td>' . $permit->permit_no . '</td><td class="' . $color . '">' . $days . ' days </td><td>Permit Load</td><td>' .  $status . '</td><td style="height: 48px;line-height: 15px;">' . $button . '</td></tr>';
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
                        $button = '<a  style="    height: 50px;line-height: 15px;" class="confirm1 unload btn btn-primary" href="' . route("scaffold.close", \Crypt::encrypt($permit->id)) . '" data-text="You have selected Permit of scaffolding to be closed. ARE YOU SURE?."><span class="fa fa-plus-square"></span> close</a>';
                    } else {
                        $button = '<a  style="    height: 50px;line-height: 15px;" class="btn btn-primary" href="' . route("scaffold.unload", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Renew</a>';
                    }
                    if ($diff_in_days > 7) {
                        $class = "background:gray";
                        $color = "text-danger";
                    }
                } elseif ($permit->status == 0) {
                    $status = "Closed";
                } elseif ($permit->status == 3 ||  $permit->status == 4) {
                    $status = "Unloaded";
                }
                $path = config('app.url');
                if (isset($request->scanuser)) {
                    $button = '';
                }
                if (isset($request->shared)) {
                    $button = '';
                }
                $list .= '<tr style="height: 50px;line-height: 15px;' . $class . '"><td><a target="_blank"href="' . $path . 'pdf/' . $permit->ped_url . '">' . $request->desc . '</a></td><td>' . $permit->permit_no . '</td><td class="' . $color . '">' .  $days . ' days</td><td>Scaffold</td><td>' .  $status . '</td><td>' . $button . '</td></tr>';
            }
        }
        echo $list;
    }
    //work for permit edit and update
    public function permit_edit($id)
    {
        $permitid =  \Crypt::decrypt($id);
        $permitdata = PermitLoad::find($permitid);
        $tempid = $permitdata->temporary_work_id;
        $tempdata = TemporaryWork::find($tempid);
        $twc_id_no = $permitdata->permit_no;

        $project = Project::with('company')->where('id', $permitdata->project_id)->first();
        return view('dashboard.temporary_works.permit-edit', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata'));
    }
    //permit update
    public function permit_update(Request $request)
    {
        Validations::storepermitload($request);
        $permitdata = PermitLoad::find($request->permitid);
        try {
            $all_inputs  = $request->except('_token', 'approval', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed', 'signed1', 'projno', 'projname', 'date', 'type', 'permitid', 'images', 'namesign1', 'namesign', 'design_requirement_text');
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
                    @unlink($folderPath . $permitdata->signature1);
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
                @unlink($folderPath . $permitdata->signature);
                file_put_contents($file, $image_base64);
                $all_inputs['signature'] = $image_name;
            }
            $all_inputs['created_by'] = auth()->user()->id;
            if (!isset($request->approval)) {
                $all_inputs['status'] = 1;
            }
            $permitload = PermitLoad::find($permitdata->id)->update($all_inputs);
            if ($permitload) {
                //make status 0 if permit is 
                $msg = "Welcome to the online i-works Portal. Attached is a PDF permit to load created by " . $request->company . " Ltd. (" . $request->design_requirement_text . "), for your attention";
                //save permit image
                $image_links = $this->permitfiles($request, $permitdata->id);
                $pdf = PDF::loadView('layouts.pdf.permit_load', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'image_name1' => $image_name1]);
                $path = public_path('pdf');
                @unlink($path . $permitdata->ped_url);
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitdata->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);

                $notify_admins_msg = [
                    'greeting' => 'Permit Pdf',
                    'subject' => $request->design_requirement_text . '-' . $request->permit_no,
                    'body' => [
                        'text' => $msg,
                        'filename' => $filename,
                        'links' =>  '',
                        'pc_twc' => '',
                        'id' => $permitdata->id,
                        'name' => 'Permit Load',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];

                if (isset($request->approval)) {
                    $notify_admins_msg['body']['pc_twc'] = '1';
                    Notification::route('mail', $request->pc_twc_email)->notify(new PermitNotification($notify_admins_msg));
                } else {
                    //send email to coordinator
                    // $coordinatoremail = User::select('email')->whereHas(
                    //     'roles',
                    //     function ($q) {
                    //         $q->where('name', 'user');
                    //     }
                    // )->where('company_id', $request->companyid)->first();
                    // Notification::route('mail', $coordinatoremail->email ?? '')->notify(new PermitNotification($notify_admins_msg));
                    Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new PermitNotification($notify_admins_msg));
                    Notification::route('mail', $request->twc_email)->notify(new PermitNotification($notify_admins_msg));
                }
                toastSuccess('Permit Updatd sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
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
            $tempdata = TemporaryWork::select(['twc_email', 'twc_id_no', 'designer_company_email', 'design_requirement_text'])->find($tempid);
            $twc_id_no = $permitdata->permit_no;
            $project = Project::with('company')->where('id', $permitdata->project_id)->first();
            return view('dashboard.temporary_works.permit-unload', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata'));
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
            $all_inputs  = $request->except('_token', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed','pdfsigntype','pdfphoto','signed1', 'projno', 'projname', 'date', 'permitid', 'images', 'namesign1', 'namesign', 'design_requirement_text');
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
            } elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
                $all_inputs['signature'] = $image_name;
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
            $all_inputs['status'] = 3;
            $all_inputs['created_by'] = auth()->user()->id;
            $permitload = PermitLoad::create($all_inputs);
            if ($permitload) {
                //make status 0 if permit is 
                PermitLoad::find($request->permitid)->update(['status' => 4]);
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
                    'subject' => $request->design_requirement_text . '-' . $request->permit_no,
                    'body' => [
                        'text' => 'Attached in the i-Works web portal for your attention is a PDF permit to unload created by ' . $request->company . ' Ltd (' . $request->design_requirement_text . ').',
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
            $latestuploadfile = TempWorkUploadFiles::where('file_type', 1)->orderBy('id', 'desc')->limit(1)->first();
            return view('dashboard.temporary_works.scaffolding', compact('project', 'tempid', 'twc_id_no', 'tempdata', 'latestuploadfile'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //save scaffolding
    public function scaffolding_save(Request $request)
    {
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
            $check_images = [];
            foreach ($request->keys() as $key) {

                if (Str::contains($key, 'image')) {
                    if ($key != "images") {
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
            }
            // dd($check_images['ev en_stable_image']);
            $all_inputs  = $request->only('temporary_work_id', 'project_id', 'drawing_no', 'type', 'twc_name', 'loadclass', 'permit_no', 'drawing_title', 'tws_name', 'ms_ra_no', 'location_temp_work', 'description_structure', 'equipment_materials', 'equipment_materials_desc', 'workmanship', 'workmanship_desc', 'drawings_design', 'drawings_design_desc', 'loading_limit', 'loading_limit_desc', 'inspected_by', 'job_title', 'company', 'Scaff_tag_signed', 'carry_out_inspection', 'signature', 'created_by');

            $image_name = '';
            if ($request->signtype == 1) {
                $all_inputs['signature'] = $request->namesign;
            } elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
                $all_inputs['signature'] = $image_name;
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
            // if ($request->signtype == 1) {
            //     $all_inputs['signature'] = $request->namesign;
            // } else {
            //     $folderPath = public_path('temporary/signature/');
            //     $image = explode(";base64,", $request->signed);
            //     $image_type = explode("image/", $image[0]);
            //     $image_type_png = $image_type[1];
            //     $image_base64 = base64_decode($image[1]);
            //     $image_name = uniqid() . '.' . $image_type_png;
            //     $file = $folderPath . $image_name;
            //     file_put_contents($file, $image_base64);
            //     $all_inputs['signature'] = $image_name;
            // }

            $all_inputs['created_by'] = auth()->user()->id;
            $all_inputs['type'] = 'load';
            //save data in scaffolign model
            if (isset($request->type) && $request->type == "scaffoldunload") {
                $all_inputs['status'] = 1;
                Scaffolding::find($request->id)->update(['status' => 3]);
            }
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
                $design_requirement_text = TemporaryWork::select('company','design_requirement_text')->find($request->temporary_work_id);
                //pdf work here
                $pdf = PDF::loadView('layouts.pdf.scaffolding', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'check_radios' => $check_radios, 'check_comments' => $check_comments, 'check_images' => $check_images, 'design_requirement_text' => $design_requirement_text->design_requirement_text]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $model = Scaffolding::find($scaffolding->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);
                $notify_admins_msg = [
                    'greeting' => 'Scaffolding Pdf',
                    'subject' => $request->drawing_title . '-' . $request->permit_no,
                    'body' => [
                        'text' => 'Thank you for completing a Scaffolding Permit to Load for '.$design_requirement_text->company.' Ltd in the i-Works web portal.',
                        'filename' => $filename,
                        'links' =>  '',
                        'name' => 'scaffold',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];

                //send email to coordinator
                $coordinatoremail = User::select('email')->whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'user');
                    }
                )->where('company_id', $request->companyid)->first();

                Notification::route('mail', $coordinatoremail->email ?? '')->notify(new PermitNotification($notify_admins_msg));

                Notification::route('mail', $request->twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
                # Notification::route('mail', $request->designer_company_email)->notify(new PermitNotification($notify_admins_msg));
                toastSuccess('Scaffolding Created Successfully');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
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
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                    $q->whereIn('id', $ids);
                })->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();

                //coordinator query
                // $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->where('created_by', $user->id)->latest()->paginate(20);
            }
             $scantempwork = '';
            //work for datatable
            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects','scantempwork'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //temp work search according to projects
    public function tempwork_project_search(Request $request)
    {
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('project_id', $request->projects)->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('project_id', $request->projects)->whereIn('created_by', $ids)->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('project_id', $request->projects)->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            }
            $scantempwork = '';
            //work for datatable
            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects', 'scantempwork'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //sharedtemp work search according to projects
    public function shared_tempwork_project_search(Request $request)
    {

        $user = auth()->user();
        if(isset($request->projects ))
        {
            $projectids=$request->projects;
        }
        else{
            $projectids=[];
        }
        try {
            if ($user->hasRole('admin')) {
                if(isset($request->company))
                {
                    $projectdata=Project::select('id')->where('company_id',$request->company)->first();
                    $projectids[]=$projectdata->id;
                }
                $tempidds = DB::table('tempworkshares')->whereIn('project_id', $projectids)->get();
                $users = [];
                $ids = [];
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('id', $ids)->latest()->paginate(20);
                $projects_id = Tempworkshare::select('project_id')->groupBy('project_id')->get();
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
            } elseif ($user->hasRole('company')) {
                if(isset($request->company))
                {
                    $projectdata=Project::select('id')->where('company_id',$request->company)->first();
                    $projectids[]=$projectdata->id;
                }
                $tempidds = DB::table('tempworkshares')->whereIn('project_id', $projectids)->where('user_id', $user->id)->get();
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('id', $ids)->latest()->paginate(20);
                $projects_id = Tempworkshare::select('project_id')->where('user_id', $user->id)->groupBy('project_id')->get();
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
            } else {
                
                if(isset($request->company))
                {
                    $projectdata=Project::select('id')->where('company_id',$request->company)->first();
                    $projectids[]=$projectdata->id;
                }
                $tempidds = DB::table('tempworkshares')->whereIn('project_id', $projectids)->where('user_id', $user->id)->get();
                $users = [];
                $ids = [];
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('id', $ids)->latest()->paginate(20);

                $projects_id = Tempworkshare::select('project_id')->where('user_id', $user->id)->groupBy('project_id')->get();
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
            }
            $scantempwork = 'sharedview';
            return view('dashboard.temporary_works.shared', compact('temporary_works', 'users', 'scantempwork', 'projects'));
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
            Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new TempAttachmentNotifications($data));
            toastSuccess('Attachements sent successfully!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    // scafolding close
    public function scaffolding_close($id)
    {
        try {
            $scaffoldid =  \Crypt::decrypt($id);
            $scaffolddata = Scaffolding::find($scaffoldid);
            Scaffolding::find($scaffoldid)->update(['status' => 0]);
            return Redirect::back();
        } catch (\Exception $exception) {

            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }


    public function permit_close($id)
    {
        try {
            $permitid =  \Crypt::decrypt($id);
            $permitdata = PermitLoad::find($permitid);
           PermitLoad::find($permitid)->update(['status' => 0]);
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
                'text' => 'Welcome to the online i-works Portal. your permit to load for (description of TWS top part) has expired. If the structure is still in use, please renew the permit to load. If the structure has been removed , not in use and not supporting any other element, please close permit.',
                'filename' => '',
                'links' =>  '',
                'name' => '',
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];
        PermitLoad::with('user', 'tempwork')->where('status', 1)->where('created_at', '<', $date)->chunk(100, function ($permits) use ($notify_admins_msg) {
            foreach ($permits as $permit) {
                $notify_admins_msg['body']['filename'] = $permit->ped_url;
                $notify_admins_msg['body']['text'] = str_replace("description of TWS top part", $permit->tempwork->design_requirement_text, $notify_admins_msg['body']['text']);
                Notification::route('mail', $permit->user->email ?? 'ctwcoordinator@gmail.com')->notify(new PermitNotification($notify_admins_msg));
            }
        });

        $notify_admins_msg = [
            'greeting' => 'Scaffold Expire',
            'subject' => 'Scaffold Load Expire',
            'body' => [
                'text' => 'Welcome to the online i-works Portal. your permit to load for (description of TWS top part) has expired. If the structure is still in use, please renew the permit to load. If the structure has been removed , not in use and not supporting any other element, please close permit.',
                'filename' => '',
                'links' =>  '',
                'name' => '',
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];
        Scaffolding::with('user', 'tempwork')->where('status', 1)->where('created_at', '<', $date)->chunk(100, function ($permits) use ($notify_admins_msg) {
            foreach ($permits as $permit) {
                $notify_admins_msg['body']['filename'] = $permit->ped_url;
                $notify_admins_msg['body']['text'] = str_replace("description of TWS top part", $permit->tempwork->design_requirement_text, $notify_admins_msg['body']['text']);
                Notification::route('mail', $permit->user->email ?? 'hani.thaher@gmail.com')->notify(new PermitNotification($notify_admins_msg));
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
            dd($exception->getMessage());
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
    //upload photo
    public function temp_photo_uplaod(Request $request)
    {
        if(!isset($request->file))
        {
             toastError('Please Select File');
             return Redirect::back();
        }
        //work for upload images here
        if ($request->file('file')) {
            $filePath = HelperFunctions::temporaryworkImagePath();
            $files = $request->file('file');
            foreach ($files  as $key => $file) {
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $model = new TemporayWorkImage();
                $model->image = $imagename;
                $model->temporary_work_id =$request->temp_work_id;
                $model->save();
            }
            toastSuccess('Document Upload Successfully!!');
            return Redirect::back();
        }
    }
    //get photo
    public function get_temp_photo(Request $request)
    {
        
        $path = config('app.url');
        $data=TemporayWorkImage::where('temporary_work_id',$request->id)->get();
        //echo"<pre>";print_r($data);exit;
        $list='';
        if(count($data)>0)
        {
            $list.='<table class="table"><thead><tr><th>#NO</th><th>File</th></tr></thead><tbody>';
            foreach($data as $key => $dt)
            {
                $key++;
                $list.='<tr><td>'.$key.'</td><td><a href='. $path . $dt->image .' target="_blank">'.$dt->image.'</a></td></tr>';
            }
            $list.='</tbody></table>';
            
        }
        
        echo $list;exit;
    }
}
