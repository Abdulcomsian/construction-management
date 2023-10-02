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
use App\Models\Nomination;
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
use App\Mail\PermitUnloadMail;
use App\Models\DesignerCompanyEmail;
use App\Models\PdfFilesHistory;
use App\Models\ProjectBlock;
use App\Models\Signature;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class TemporaryWorkController extends Controller
{
    public function testIndex()
    {

        if(auth::user()->hasRole('estimator'))
        {
            return redirect('Estimator/estimator');
        }
        if(Auth::user()->hasRole(['designer','supplier','Design Checker','Designer and Design Checker']))
        {
            return redirect('designer/designer');
        }
        $user = User::with('userCompany')->find(Auth::user()->id);
        $status=[0,1,2,3];
        if(isset($_GET['status']))
        {
            if($_GET['status']=="pending")
            {
                $status=[1];
            }
            if($_GET['status']=="completed")
            {
                $status=[3];
            }
        }
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $nominations=[];
                $users=[];
            } elseif ($user->hasRole('company')) {
                $users = User::select(['id','name'])->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $projects = Project::with('company')->where('company_id', $user->id)->get();
                $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
               
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                    $q->whereIn('project_id', $ids);
                })->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                $nominations=[];
                $users=[];
                if($user->hasRole('user'))
                {
                    $users = User::select(['id','name'])->where('company_id', $user->userCompany->id)->get();
                    $ids = [];
                    foreach ($users as $u) {
                        $ids[] = $u->id;
                    }
                     $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
                }
            }
            //work for datatable
            $scantempwork = '';
            return view('test', compact('temporary_works', 'projects', 'scantempwork','nominations','users'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    public function index()
    {
        $assignedBlocks = [];
        $block = '';
        if(isset($_GET['block']))
        {
            $block = $_GET['block'];
        }
        if(auth::user()->hasRole('estimator'))
        {
            return redirect('Estimator/estimator');
        }
        if(Auth::user()->hasRole(['designer','supplier','Design Checker','Designer and Design Checker']) && !auth::user()->company_id)
        {
            return redirect('designer/designer');
        }
        $user = User::with('userCompany')->find(Auth::user()->id);
        $status=[0,1,2,3];
        if(isset($_GET['status']))
        {
            if($_GET['status']=="pending")
            {
                $status=[1];
            }
            if($_GET['status']=="completed")
            {
                $status=[3];
            }
        }
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('pdfFilesDesignBrief', 'project', 'uploadfile', 'uploadedemails', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits', 'unloadpermits_draft', 'closedpermits','riskassesment')->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $nominations=[];
                $users=[];
                $tot_emails = [];
                foreach ($temporary_works as $temporary_work) {
                    // dd($temporary_work->unloadpermits_draft);

                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());

                    $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                }
            } elseif ($user->hasRole('company')) {
                $users = User::select(['id','name'])->where('company_id', $user->id)->get();
                $ids = [];
                $tot_emails = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $users = User::select(['id','name'])->where('company_id', $user->id)->get();
                $ids = [];
                $tot_emails = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());

                    $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                }
                $projects = Project::with('company')->where('company_id', $user->id)->get();
                $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
               
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                $tot_emails = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                    $q->whereIn('project_id', $ids);
                })->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());
                    $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                }
                
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                $nominations=[];
                $users=[];
                if($user->hasRole('user'))
                {
                    $users = User::select(['id','name'])->where('company_id', $user->userCompany->id)->get();
                    $ids = [];
                    foreach ($users as $u) {
                        $ids[] = $u->id;
                    }
                     $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
                }
                // dd($tot_emails);
            }
           
            //work for datatable
            $scantempwork = '';
            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects','assignedBlocks', 'scantempwork','nominations','users','block', 'tot_emails'));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function testIndexHere()
    {
        if(auth::user()->hasRole('estimator'))
        {
            return redirect('Estimator/estimator');
        }
        if(Auth::user()->hasRole(['designer','supplier','Design Checker','Designer and Design Checker']))
        {
            return redirect('designer/designer');
        }
        $user = User::with('userCompany')->find(Auth::user()->id);
        $status=[0,1,2,3];
        if(isset($_GET['status']))
        {
            if($_GET['status']=="pending")
            {
                $status=[1];
            }
            if($_GET['status']=="completed")
            {
                $status=[3];
            }
        }
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with( 'designer' , 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $nominations=[];
                $users=[];
            } elseif ($user->hasRole('company')) {
                $users = User::select(['id','name'])->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with( 'designer' , 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $projects = Project::with('company')->where('company_id', $user->id)->get();
                $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
               
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $temporary_works = TemporaryWork::with( 'designer' , 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                    $q->whereIn('project_id', $ids);
                })->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                $nominations=[];
                $users=[];
                if($user->hasRole('user'))
                {
                    $users = User::select(['id','name'])->where('company_id', $user->userCompany->id)->get();
                    $ids = [];
                    foreach ($users as $u) {
                        $ids[] = $u->id;
                    }
                     $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
                }
            }
            //work for datatable
            $scantempwork = '';
            return view('dashboard.temporary_works.index', compact('temporary_works', 'projects', 'scantempwork','nominations','users'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //All shared tempory work
    public function shared_temporarywork()
    {
        if(auth::user()->hasRole('estimator'))
        {
            return redirect('Estimator/estimator');
        }
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
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('id', $ids)->where(['estimator'=>0])->latest()->paginate(20);
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
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('id', $ids)->latest()->where(['estimator'=>0])->paginate(20);
                $projects_id = Tempworkshare::select('project_id')->where('user_id', Auth::user()->id)->groupBy('project_id')->get(); //remove $user->id
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
            } else {
                $tempidds = DB::table('tempworkshares')->where('user_id', $user->id)->get();
                $users = [];
                $ids = [];
                foreach ($tempidds as $u) {
                    $ids[] = $u->temporary_work_id;
                    $users[] = $u->user_id;
                }
                $temporary_works = TemporaryWork::with('tempshare', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('id', $ids)->latest()->where(['estimator'=>0])->paginate(20);

                $projects_id = Tempworkshare::select('project_id')->where('user_id', $user->id)->groupBy('project_id')->get();
                $projects = Project::with('company')->whereIn('id', $projects_id)->get();
            }
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
        if (auth()->user()->hasRole([['supervisor','visitor','scaffolder']])) {
            toastError('the temporary works coordinator is the only appointed person who can create a design brief. If you require access, please contact your management team to request access for you');
            return Redirect::back();
        }

        // if (auth()->user()->hasRole([['user']]) && Auth::user()->userCompany->nomination == 1) {
        //    if(Auth::user()->nomination == 1 && Auth::user()->nomination_status !=1)
        //     {
        //         toastError('You can no create temporary work until your nomination form appprove thanks ');
        //           return Redirect::back();
        //     }
        // }
        //abort_if(auth()->user()->hasRole(['supervisor', 'visitor', 'scaffolder']), 403);
        try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole(['company'])) {
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                  $project_idds = DB::table('users_has_projects')->where(['user_id'=>$user->id])->get();
                    $ids = [];
                    foreach ($project_idds as $id) {
                        if($id->nomination==1 && $id->nomination_status==1)
                        {
                            $ids[] = $id->project_id;
                        }
                        if($id->nomination==2)
                        {
                            $ids[] = $id->project_id;
                        }
                        
                    }
                    $projects = Project::with('company')->whereIn('id', $ids)->get();  
            }
            return view('dashboard.temporary_works.create', compact('projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function create2()
    {
        if (auth()->user()->hasRole([['supervisor', 'visitor', 'scaffolder']])) {
            toastError('the temporary works coordinator is the only appointed person who can create a design brief. If you require access, please contact your management team to request access for you');
            return Redirect::back();
        }

        // if (auth()->user()->hasRole([['user']]) && Auth::user()->userCompany->nomination == 1) {
        //    if(Auth::user()->nomination == 1 && Auth::user()->nomination_status !=1)
        //     {
        //         toastError('You can no create temporary work until your nomination form appprove thanks ');
        //           return Redirect::back();
        //     }
        // }
        //abort_if(auth()->user()->hasRole(['supervisor', 'visitor', 'scaffolder']), 403);
        try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
            } elseif ($user->hasRole(['company'])) {
                $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                  $project_idds = DB::table('users_has_projects')->where(['user_id'=>$user->id])->get();
                    $ids = [];
                    foreach ($project_idds as $id) {
                        if($id->nomination==1 && $id->nomination_status==1)
                        {
                            $ids[] = $id->project_id;
                        }
                        if($id->nomination==2)
                        {
                            $ids[] = $id->project_id;
                        }
                        
                    }
                    $projects = Project::with('company')->whereIn('id', $ids)->get();  
            }
            return view('dashboard.temporary_works.create2', compact('projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //manually desing breif form for old data
    public function create1()
    {
        abort_if(auth()->user()->hasRole(['supervisor', 'visitor', 'scaffolder']), 403);
        // if (auth()->user()->hasRole([['user']]) && Auth::user()->userCompany->nomination == 1) {
        //    if(Auth::user()->nomination == 1 && Auth::user()->nomination_status != 1)
        //     {
        //         toastError('You can not create temporary work until your nomination form appproval thanks ');
        //           return Redirect::back();
        //     }
        // }
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
                        if($id->nomination==1 && $id->nomination_status==1)
                        {
                            $ids[] = $id->project_id;
                        }
                        if($id->nomination==2)
                        {
                            $ids[] = $id->project_id;
                        }
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
            $all_inputs  = $request->except('_token', 'pdf', 'projaddress', 'projno', 'projname', 'dcc_returned', 'drawing', 'dcc','design_returned','drawing_number','drawing_title');
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
                    $model->construction=1;
                    $model->drawing_number=$request->drawing_number;
                    $model->drawing_title=$request->drawing_title;
                    $model->save();
                }
                $notify_admins_msg = [
                    'greeting' => 'Temporary Work Pdf',
                    'subject' => 'TWP – Design Brief Review -'.$request->projname . '-' .$request->projno,
                    'body' => [
                        'company' => $request->company,
                        'filename' => $filename,
                        'links' => '',
                        'name' =>  $request->design_requirement_text . '-' . $request->twc_id_no,
                        'designer' => '',
                        'pc_twc' => '',

                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
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

            if ($request->desinger_email_2) {
                $notify_admins_msg['body']['designer'] = 'designer1';
                
                HelperFunctions::EmailHistory(
                    $request->desinger_email_2,
                    'Design Checker',
                    $temporary_work->id,
                    'Email sent to Design Checker'
                );
                Notification::route('mail', $request->desinger_email_2)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id, $request->desinger_email_2));
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
        DB::beginTransaction();
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
            $all_inputs  = $request->except('_token','DrawCheck','files' ,'date','companyid', 'company_id', 'projaddress', 'signed', 'images', 'namesign','namesign3','signtype', 'signtype3', 'signtype4', 'signtype5', 'namesign4', 'namesign5', 'pdfsigntype', 'pdfphoto', 'projno', 'projname', 'approval','req_type','req_name','req_check','req_notes', 'name3', 'job_title3', 'company3', 'companyid3', 'signed3', 'namesign3', 'date3', 'name4', 'job_title4', 'company4', 'companyid4', 'signed4', 'namesign4', 'date4', 'name5', 'job_title5', 'company5', 'companyid5', 'signed5', 'namesign5', 'date5', 'action', 'permitdata_status');
            
            //if design req details is exist
            
            if(isset($request->req_name))
            {
                $desing_req_details=[];
                foreach($request->req_name as $key => $req)
                {
                    $desing_req_details[]=['name'=>$req,'check'=>isset($request->req_check[$key]) ? 'Y':'N','note'=>$request->req_notes[$key]];
                }

                $all_inputs['desing_req_details']=json_encode($desing_req_details);

            }
            $all_inputs['designer_company_email'] = $request->designer_company_email[0];
            //upload signature here
            $image_name = '';
            if ($request->signtype == 1) {
                $image_name = $request->namesign;
                $signature_type = 'name_sign';
            } elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
                $signature_type = 'pdf';
            } else {
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);
                $signature_type = 'draw';
            }

            //third person signature and name
            $image_name3 = '';
            if ($request->signtype3 == 1) {
                $signature3 = $request->namesign3;
            } elseif($request->signed3 != HelperFunctions::defaultSign() && $request->signed3 != "") { 
                $name3 = $request->name3;
                $job_title3 = $request->job_title3;
                $company3 = $request->company3;
                $date3 = $request->date3;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed3);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name3 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name3;
                file_put_contents($file, $image_base64);
                $signature3 = $image_name3; 
            }
            //fourth person signature and name
            $image_name4 = '';
            if ($request->signtype4 == 1) {
                $signature4 = $request->namesign4;
            } elseif($request->signed4 != HelperFunctions::defaultSign() && $request->signed4 != "") { 
                $name4 = $request->name4;
                $job_title4 = $request->job_title4;
                $company4 = $request->company4;
                $date4 = $request->date4;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed4);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name4 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name4;
                file_put_contents($file, $image_base64);
                $signature4 = $image_name4; 
            }

            //fifth person signature and name
            $image_name5 = '';
            if ($request->signtype5 == 1) {
                $signature5 = $request->namesign5;
            } elseif($request->signed5 != HelperFunctions::defaultSign() && $request->signed5 != "") { 
                $name5 = $request->name5;
                $job_title5 = $request->job_title5;
                $company5 = $request->company5;
                $date5 = $request->date5;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed5);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name5 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name5;
                file_put_contents($file, $image_base64);
                $signature5 = $image_name5; 
            }            


            // $all_inputs['description_temporary_work_required'] = $content;
            $all_inputs['signature'] = $image_name;
            $all_inputs['signature_type'] = $signature_type;
            $all_inputs['created_by'] = auth()->user()->id;

            //design description starts here
            // dd($request->all());
            $designDocument = $request->description_temporary_work_required;
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($designDocument, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors(false);
            $images = $dom->getElementsByTagName('img');

            foreach($images as $item => $image){
                $data = $image->getAttribute("src");
                $styles = $image->getAttribute("style");
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= time().$item.'.png';
                $path = public_path().'/temporary/signature/' . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', 'temporary/signature/'.$image_name);
                $image->setAttribute('max-width' , '100% !important;');
                $image->setAttribute('width' , $styles);
                $image->setAttribute('height' , 'auto');
                $image->removeAttribute("style");
            }
            $content = $dom->saveHTML();
            $all_inputs['description_temporary_work_required'] = $content;


            //design description ends here




            // $request->description = $content;
            // dd($request->all());
            // dd($request->all());
            if (auth()->user()->hasRole('admin')) {
                $all_inputs['created_by'] = $request->company_id;
            }
            //work for qrcode
            $j = HelperFunctions::generatetempid($request->project_id);
            $all_inputs['tempid'] = $j;
            if($request->twc_id_no)
            {
                $twc_id_no = $request->twc_id_no;
            } else{
                $twc_id_no = HelperFunctions::generatetwcid($request->projno, $request->company, $request->project_id);
            }

            $all_inputs['twc_id_no'] = $twc_id_no;
            if (isset($request->approval)) {
                $all_inputs['status'] = '0';
            } else {
                $all_inputs['status'] = '1';
            }

            //photo work here
            if ($request->file('photo')) {
                $filePath = HelperFunctions::designbriefphotopath();
                $file = $request->file('photo');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['photo'] = $imagename;
            }
            $categorylabel=explode("-",$request->design_requirement_text);
            $all_inputs['category_label']=$categorylabel[0];
            $temporary_work = TemporaryWork::create($all_inputs);
            if(isset($signature3))
            {
                $signature3_record = new Signature([
                    'name' => $name3,
                    'job_title' => $job_title3,
                    'company' => $company3,
                    'date' => $date3,
                    'signatureable_type' => get_class($temporary_work),  
                    'signature' => $signature3, 
                    'signatureable_id' => $temporary_work->id             
                ]);
    
                $temporary_work->signatures()->save($signature3_record);
            }

            if(isset($signature4))
            {
                $signature4_record = new Signature([
                    'name' => $name4,
                    'job_title' => $job_title4,
                    'company' => $company4,
                    'date' => $date4,
                    'signatureable_type' => get_class($temporary_work),  
                    'signature' => $signature4, 
                    'signatureable_id' => $temporary_work->id             
                ]);
    
                $temporary_work->signatures()->save($signature4_record);
            }

            if(isset($signature5))
            {
                $signature5_record = new Signature([
                    'name' => $name5,
                    'job_title' => $job_title5,
                    'company' => $company5,
                    'date' => $date5,
                    'signatureable_type' => get_class($temporary_work),  
                    'signature' => $signature5, 
                    'signatureable_id' => $temporary_work->id             
                ]);
    
                $temporary_work->signatures()->save($signature5_record);
            }
            if ($temporary_work) {
                //2 means READ / UNREAD status is EMPTY
              

                $chm= new ChangeEmailHistory();
                $chm->email=Auth::user()->email;
                $chm->type ='Design Brief';
                $chm->foreign_idd=$temporary_work->id;
                $chm->message='New Design Brief Created';
                $chm->status = 2;
                // $chm->user_type = 'checker';
                $chm->save();

                ScopeOfDesign::create(array_merge($scope_of_design, ['temporary_work_id' => $temporary_work->id]));
                Folder::create(array_merge($folder_attachements, ['temporary_work_id' => $temporary_work->id]));
                AttachSpeComment::create(array_merge($attachcomments, ['temporary_work_id' => $temporary_work->id]));
                

                //work for upload images here
                $image_links = [];
                // if($imagename){
                //     $image_links[]=$imagename;
                // }
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
                // dd($content);
                // dd($request->all());
                // dd($content);
                $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $request->all(),  'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => $twc_id_no, 'comments' => $attachcomments , "description" => $content, 'image_name3' => $image_name3, 'image_name4' => $image_name4, 'image_name5' => $image_name5, 'company3' => $request->company3, 'company4' => $request->company4, 'company5' => $request->company5, 'date3'=>$request->date3, 'date4'=>$request->date4, 'date5'=>$request->date5]);
                
                // dd("now here");
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporary_work->id);
                $model->ped_url = $filename;
                $model->save();
                if(!$request->approval){
                    HelperFunctions::PdfFilesHistory($filename, $temporary_work->id, 'design_brief', $twc_id_no);
                }
                if (isset($request->approval)) {
                    TemporaryWorkRejected::create([
                        'temporary_work_id' => $temporary_work->id,
                        'acceptance_date' => date('Y-m-d H:i:s'),
                        'pdf_url' => $filename,
                        'email' => Auth::user()->email,
                    ]);

                    //changing email history
                    // $cmh= new ChangeEmailHistory();
                    // $cmh->email=$request->pc_twc_email;
                    // $cmh->type ='Design Brief';
                    // $cmh->foreign_idd=$temporary_work->id;
                    // $cmh->message='Design Brief sent for approval';
                    // $cmh->save();
                    HelperFunctions::EmailHistory(
                        $request->pc_twc_email,
                        'Design Brief',
                        $temporary_work->id,
                        'Design Brief sent for approval'
                    );
                }
            
            }
            if ($temporary_work && is_array($request->designer_company_email)) {
                $emails = $request->designer_company_email;
            
                // Remove the first email from the array
                array_shift($emails);
            
                foreach ($emails as $email) {
                    $company_email = new DesignerCompanyEmail();
                    $company_email->temporary_work_id = $temporary_work->id;
                    $company_email->email = $email;
                    $company_email->save();
                }
            }
            DB::commit();
                //send mail to admin
                $notify_admins_msg = [
                    'greeting' => 'Temporary Work Pdf',
                    'subject' => 'TWP – Design Brief Review -'.$request->projname . '-' .$request->projno,
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
                    // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id));
                    // HelperFunctions::EmailHistory(
                    //     $request->twc_email,
                    //     'Design Brief',
                    //     $temporary_work->id,
                    //     'Design Brief Sent to TWC'
                    // );
                    //send to twc email
                    Notification::route('mail', $request->twc_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id));

                    //designer
                    if ($request->designer_company_email) {
                        foreach($request->designer_company_email as $email){

                            $notify_admins_msg['body']['designer'] = 'designer1';
                            
                            HelperFunctions::EmailHistory(
                                $email,
                                'Design Company',
                                $temporary_work->id,
                                'Email sent to Designer Company'
                            );
                            Notification::route('mail', $email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id, $email));
                        }
                   
                    }

                    //designer email second
                    if ($request->desinger_email_2) {
                        $notify_admins_msg['body']['designer'] = 'designer1';
                        
                        HelperFunctions::EmailHistory(
                            $request->desinger_email_2,
                            'Design Checker',
                            $temporary_work->id,
                            'Email sent to Designer Checker'
                        );
                        Notification::route('mail', $request->desinger_email_2)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporary_work->id, $request->desinger_email_2));
                    }
                }
            toastSuccess('Temporary Work successfully added!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            if($exception->getLine()==459){
                DB::commit();
                toastError('Email could not be sent because of attachment size.');
                return Redirect::back();
            }else{
                DB::rollback();
            }
            dd($exception->getMessage(), $exception->getLine());
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
        if (auth()->user()->hasRole([['supervisor', 'visitor', 'scaffolder']])) {
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
            $temporaryWork = TemporaryWork::with('designerCompanyEmails','scopdesign', 'folder', 'attachspeccomment', 'temp_work_images', 'signatures')->where('id', $temporaryWork->id)->first();
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
        DB::beginTransaction();
        Validations::storeTemporaryWork($request);
        try {
            $temporary_work = TemporaryWork::find($temporaryWork->id);

            if(!$request->approval){
                $pdf_history = PdfFilesHistory::where([['tempwork_id', $temporaryWork->id],['type','design_brief']])->count();
                if($pdf_history == 0){
                    HelperFunctions::PdfFilesHistory($temporaryWork->ped_url, $temporaryWork->id, 'design_brief', $temporaryWork->twc_id_no);
                }
            }
            
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
               //design description starts here
            // dd($request->all());
            $designDocument = $request->description_temporary_work_required;
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            @$dom->loadHtml($designDocument, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors(false);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $item => $image){
                $data = $image->getAttribute("src");
            // dd($data);

            //     dd($data)(;
            $image_explode = explode(';', $data);
            if(count($image_explode) == 2){
                list($type, $data) = [$image_explode[0] , $image_explode[1]];
                list(, $data)      = explode(',', $data);
            }else{
                continue;
            }
            
                // list($type, $data) = explode(';', $data);
                // list(, $data)      = explode(',', $data);
    

                $imgeData = base64_decode($data);
                $image_name= time().$item.'.png';
                $path = public_path().'/temporary/signature/' . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', 'temporary/signature/'.$image_name);
                $image->setAttribute('width' , "120");
                $image->setAttribute('height' , "120");
                $image->removeAttribute("style");
            }
            $content = $dom->saveHTML();
            $all_inputs['description_temporary_work_required'] = $content;


             //unset all keys 

            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token', 'files', 'unload_images', 'date','companyid', 'company_id', 'projaddress', 'signed', 'images', 'preloaded', 'namesign', 'signtype','pdfsigntype', 'pdfphoto','projno', 'projname', 'approval', 'req_type', 'req_name', 'req_check', 'req_notes', 'name3', 'job_title3', 'company3', 'date3','companyid3', 'signed3', 'namesign3', 'name4','date4', 'job_title4', 'company4', 'companyid4', 'signed4', 'namesign4', 'name5', 'job_title5', 'company5','date5', 'companyid5', 'signed5', 'namesign5','action','temp_work_image');
            
            //photo work here
            if ($request->file('photo')) {
                //del old image
                if($temporary_work->photo)
                {
                    $fileData = $temporary_work->photo;
                    $path = public_path($fileData);
                    @unlink($path);
                }
                $filePath = HelperFunctions::designbriefphotopath();
                $file = $request->file('photo');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['photo'] = $imagename;
            }
           
          

            //if design req details is exist
            
            if(isset($request->req_name))
            {
                $desing_req_details=[];
                foreach($request->req_name as $key => $req)
                {
                    $desing_req_details[]=['name'=>$req,'check'=>isset($request->req_check[$key]) ? 'Y':'N','note'=>$request->req_notes[$key]];
                }

                $all_inputs['desing_req_details']=json_encode($desing_req_details);

            }
            $all_inputs['designer_company_email'] = $request->designer_company_email[0];

            // for fetching signature from database
            //upload signature here
            $image_name = '';
            if(!$temporary_work->signature){
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
            } }
            else{
                $image_name = $temporary_work->signature;
                // $all_inputs['signature'] = $image_name; 
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

            //third person signature and name
            $image_name3 = '';
            if(!isset($temporary_work->signatures[0]) && empty($temporary_work->signatures[0]->signature)){
            // if(!$permitload->signatures[0]->name){
                if ($request->signtype3 == 1) {
                    $signature3 = $request->namesign3;
                } elseif($request->name3) {
                    $name3 = $request->name3;
                    $job_title3 = $request->job_title3;
                    $company3 = $request->company3;
                    $date3 = $request->date3;
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed3);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name3 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name3;
                    file_put_contents($file, $image_base64);
                    $signature3 = $image_name3; 
                } 
            } else{
                $name3 = $temporary_work->signatures[0]->name;
                $job_title3 = $temporary_work->signatures[0]->job_title;
                $company3 = $temporary_work->signatures[0]->company;
                $date3 = $temporary_work->signatures[0]->date;
                $image_name3 = $temporary_work->signatures[0]->signature;
                $signature3 = $image_name3; 
            }

            //fourth person signature and name
            $image_name4 = '';
            if(!isset($temporary_work->signatures[1]) && empty($temporary_work->signatures[1]->signature)){
            // if(!$permitload->signatures[0]->name){
                if ($request->signtype4 == 1) {
                    $signature4 = $request->namesign4;
                } elseif($request->name4) { 
                    $name4 = $request->name4;
                    $job_title4 = $request->job_title4;
                    $company4 = $request->company4;
                    $date4 = $request->date4;
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed4);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name4 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name4;
                    file_put_contents($file, $image_base64);
                    $signature4 = $image_name4; 
                }
            } else{
                $name4 = $temporary_work->signatures[1]->name;
                $job_title4 = $temporary_work->signatures[1]->job_title;
                $company4 = $temporary_work->signatures[1]->company;
                $date4 = $temporary_work->signatures[1]->date;
                $image_name4 = $temporary_work->signatures[1]->signature;
                $signature4 = $image_name4; 
            }

            //fifth person signature and name
            $image_name5 = '';
            if(!isset($temporary_work->signatures[2]) && empty($temporary_work->signatures[2]->signature)){
            // if(!$permitload->signatures[0]->name){
                if ($request->signtype5 == 1) {
                    $signature4 = $request->namesign5;
                } elseif($request->name5) { 
                    $name5 = $request->name5;
                    $job_title5 = $request->job_title5;
                    $company5 = $request->company5;
                    $date5 = $request->date5;
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed5);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name5 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name5;
                    file_put_contents($file, $image_base64);
                    $signature5 = $image_name5; 
                }
            } else{
                $name5 = $temporary_work->signatures[2]->name;
                $job_title5 = $temporary_work->signatures[2]->job_title;
                $company5 = $temporary_work->signatures[2]->company;
                $date5 = $temporary_work->signatures[2]->date;
                $image_name5 = $temporary_work->signatures[2]->signature;
                $signature5 = $image_name5; 
            }
            $temporary_work->signatures()->delete();

            // $temporary_work = TemporaryWork::find($temporaryWork->id)->update($all_inputs);

            $temporary_work->update($all_inputs);


            if($request->name3)
            {
                $signature3_record = new Signature([
                    'name' => $name3,
                    'job_title' => $job_title3,
                    'company' => $company3,
                    'date' => $date3,
                    'signatureable_type' => get_class($temporary_work),  
                    'signature' => $signature3, 
                    'signatureable_id' => $temporary_work->id             
                ]);
    
                $temporary_work->signatures()->save($signature3_record);
            }

            if($request->name4)
            {
                $signature4_record = new Signature([
                    'name' => $name4,
                    'job_title' => $job_title4,
                    'company' => $company4,
                    'date' => $date4,
                    'signatureable_type' => get_class($temporary_work),  
                    'signature' => $signature4, 
                    'signatureable_id' => $temporary_work->id             
                ]);
    
                $temporary_work->signatures()->save($signature4_record);
            }

            if($request->name5)
            {
                $signature5_record = new Signature([
                    'name' => $name5,
                    'job_title' => $job_title5,
                    'company' => $company5,
                    'date' => $date5,
                    'signatureable_type' => get_class($temporary_work),  
                    'signature' => $signature5, 
                    'signatureable_id' => $temporary_work->id             
                ]);
    
                $temporary_work->signatures()->save($signature5_record);
            }


            if ($temporary_work) {
                HelperFunctions::EmailHistory(
                    Auth::user()->email,
                    'Design Brief',
                    $temporaryWork->id,
                    'Design Brief Updated',
                    Null,
                    2 //2 means READ / UNREAD status is EMPTY
                );

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
                // TemporayWorkImage::where('temporary_work_id', $temporaryWork->id)->delete();
                 //fetching previously stored attachments
                 $image_links = [];
                 foreach($temporaryWork->temp_work_images as $image){
                     $image_links[]=$image->image;
                 }
                 //fetching new uploaded attachments
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
                $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $request->all(), 'image_name' => $temporaryWork->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => $request->twc_id_no, 'comments' => $attachcomments, "description" => $content,'image_name3' => $image_name3, 'image_name4' => $image_name4, 'image_name5' => $image_name5, 'company3' => $request->company3, 'company4' => $request->company4, 'company5' => $request->company5, 'date3'=>$request->date3, 'date4'=>$request->date4, 'date5'=>$request->date5]);
                $path = public_path('pdf');
                if (isset($request->approval)) {
                    @unlink($path . '/' . $temporaryWork->ped_url);
                }
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporaryWork->id);
                $model->ped_url = $filename;
                $model->save();
                if(!$request->approval || !$temporaryWork->status == 2){
                $count = $model->pdfFilesDesignBrief->count();
                $twc_id_no = $request->twc_id_no.'-'.$count++;
                HelperFunctions::PdfFilesHistory($filename, $temporaryWork->id, 'design_brief', $twc_id_no);
                }
                if (isset($request->approval)) {
                    TemporaryWorkRejected::create([
                        'temporary_work_id' => $temporaryWork->id,
                        'acceptance_date' => date('Y-m-d H:i:s'),
                        'pdf_url' => $filename,
                        'email' => Auth::user()->email,
                    ]);

                    HelperFunctions::EmailHistory(
                        $request->pc_twc_email,
                        'Design Brief',
                        $temporaryWork->id,
                        'Design Brief sent for approval',
                    );
                } 
             
            }
            if ($temporary_work && is_array($request->designer_company_email)) {
                $designerCompanyEmails = DesignerCompanyEmail::where('temporary_work_id', $temporaryWork->id)->get();

                if ($designerCompanyEmails->count() > 0) {
                    $designerCompanyEmails->each(function ($companyEmail) {
                        $companyEmail->delete();
                    });
                }

                $emails = $request->designer_company_email;
            
                // Remove the first email from the array
                array_shift($emails);
            
                foreach ($emails as $email) {
                    $company_email = new DesignerCompanyEmail();
                    $company_email->temporary_work_id = $temporaryWork->id;
                    $company_email->email = $email;
                    $company_email->save();
                }
            }
            DB::commit();
               //send mail to admin
               $notify_admins_msg = [
                'greeting' => 'Temporary Work Pdf',
                'subject' => 'TWP – Design Brief Review - '.$request->projname . '-' . $request->projno,
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
                // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id));
                Notification::route('mail', $request->twc_email ?? '')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id));
                //designer
                if ($request->designer_company_email) {
                    foreach($request->designer_company_email as $email){
                        if ($request->designer_company_email) {
                            $notify_admins_msg['body']['designer'] = 'designer1';
                            Notification::route('mail', $email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id, $email));
                        }
                    }
                }

                //designer email second
                if ($request->desinger_email_2) {
                    $notify_admins_msg['body']['designer'] = 'designer1';
                    Notification::route('mail', $request->desinger_email_2)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork->id, $request->desinger_email_2));
                }
            }
            toastSuccess('Temporary Work successfully Updated!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception->getMessage(), $exception->getLine());
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
    
    //delete Temporary work images in both Temporary work table and Temporary work images table
    public function deleteTemporaryWorkImage(Request $request){
        
        if($request->type == 'temp_work')
        {
            $fileData = TemporaryWork::findorfail($request->filename_id);
            $filePath = public_path($fileData->photo); // Replace with the actual file path
            if (file_exists($filePath)) {
                unlink($filePath);
                $fileData->photo = ''; // Delete the file
                $fileData->save();
                return response()->json(['message' => 'File deleted successfully']);
            }
        }
        if($request->type == 'temp_work_image')
        {
            $fileData = TemporayWorkImage::findorfail($request->filename_id);
            $filePath = public_path($fileData->image); // Replace with the actual file path
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the file
                $fileData->delete();
                return response()->json(['message' => 'File deleted successfully']);
            }
        }
       

    return response()->json(['message' => 'File not found'], 404);  
  

   }
    //get rams
    public function get_rams(Request $request)
    {
        try { 
            $data = TempWorkUploadFiles::where(['temporary_work_id' => $request->tempworkid])->get();
            $list = '';
            $app_url = env('APP_URL');
            $list.= '<table class="table table-hover" style="border-collapse:separate;border-spacing:0 5px;"><thead style="height:80px"><tr><th>No</th><th>RAMS File</th><th style="width:120px;">Date</th></tr></thead><tbody>';
            if (count($data) > 0) {
                $i = 1;
                foreach ($data as $d) {
                    $list .= '<tr style="text-align:center;"><td>' . $i . '</td><td><a target="_blank" href="'. $app_url . '/' .$d->file_name .'">RAMS'. $i . '</a></td><td>' . $d->created_at->todatestring() . '</td></tr>';
                    $i++;
                }
            }
            $list .= '</tbody></table>';
            echo $list;
        } catch (\Exception $exception) { return "2";
            return response()->json(['error' =>  $exception->getline()]);
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

            if($request->queriesccemails)
            { $cc_emails = HelperFunctions::ccEmails($request->queriesccemails);}
             else
             {$cc_emails = [];}
     
            $tempdata = TemporaryWork::select('twc_email', 'design_requirement_text', 'twc_id_no', 'designer_company_email', 'client_email')->find($request->temp_work_id);

            if($tempdata->designer_company_email == $request->mail)
            {
                $designer_company_emails = DesignerCompanyEmail::where('temporary_work_id',$request->temp_work_id)->get();
                if($designer_company_emails)
                {
                    foreach($designer_company_emails as $designer_company_email)
                    {
                        array_push($cc_emails,trim($designer_company_email->email));
                    }
                }
            } else {
                $designer_company_emails = DesignerCompanyEmail::where('temporary_work_id',$request->temp_work_id)->where('email','!=',$request->mail)->get();
                if($designer_company_emails)
                {
                    foreach($designer_company_emails as $designer_company_email)
                    {
                        array_push($cc_emails,trim($designer_company_email->email));
                    }
                }
                array_push($cc_emails,trim($tempdata->designer_company_email));

            }
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
            }else{$imagename = '';}
            if (isset($request->type) && $request->type == 'scan') {
                $model->type = 'scan';
            }
            if (isset($request->type) && $request->type == 'client') {
                $model->type = 'client';
            }
            if (isset($request->type) && $request->type == 'twc') {
                $model->type = 'twc';
                $twc="twc";

                $cmh= new ChangeEmailHistory();
                $cmh->email=Auth::user()->email;
                $cmh->type ='Notes added';
                $cmh->status =2;
                $cmh->foreign_idd=$request->temp_work_id;
                $cmh->message='Notes added by ' . Auth::user()->email;
                // $chm->user_type = 'designer';
                $cmh->save();
            }
            if (isset($request->type) && $request->type == 'twctodesigner') {
                $model->type = 'twctodesigner';
                $twc="twctodesigner";
                //Adding mail history
                $cmh= new ChangeEmailHistory();
                $cmh->email=$tempdata->designer_company_email;
                $cmh->type ='TWC to Designer';
                $cmh->foreign_idd=$request->temp_work_id;
                $cmh->message='Comment added for Designer by '. $tempdata->twc_email;
                // $chm->user_type = 'designer';
                $cmh->save();
            }
            // if ($model->save()) {
            //     $email = $tempdata->twc_email;
            //     $type = 'question';
            //     $client_email= '';
            //     if($model->type == 'client'){
            //         $email = $tempdata->client_email;
            //         $client_email = $tempdata->client_email;
            //         $type= 'client';
            //     }
            //     if(!isset($twc))
            //     {
            //       Notification::route('mail', $email)->notify(new CommentsNotification($request->comment, $type, $request->temp_work_id,$client_email,$request->type ?? '','Designer'));
            //     }

            //     toastSuccess('Comment submitted successfully');
            //     return Redirect::back();
            // }

            if ($model->save()) {
                if (isset($request->type) && $request->type == 'client') {
                    $client_email= '';
                    if($model->type == 'client'){
                        $email = $tempdata->client_email;
                        $client_email = $tempdata->client_email;
                        $type= 'client';
                    }
                  //COde for sendign email to cleint on admin designer module, comment for now
                  Notification::route('mail', $email)->notify(new CommentsNotification($request->comment, $type, $request->temp_work_id,$client_email,$request->type ?? '','Designer',$cc_emails, $imagename));
                }else if(!isset($twc))
                {
                    if($request->type=="designertotwc"){
                        $cmh= new ChangeEmailHistory();
                        $cmh->email=$tempdata->twc_email;
                        $cmh->type ='Designer to TWC';
                        $cmh->foreign_idd=$request->temp_work_id;
                        $cmh->message='Query Posted by Designer ' . $request->mail;
                        $cmh->user_type = 'designer';
                        $cmh->save();
                    }   
                    
                  Notification::route('mail', $tempdata->twc_email)->notify(new CommentsNotification($request->comment, 'question', $request->temp_work_id, $tempdata->twc_email ,$request->type ?? '','',$cc_emails,$imagename));
                 }else if($twc=="twctodesigner"){
                   
                    Notification::route('mail', $tempdata->designer_company_email)->notify(new CommentsNotification($request->comment, 'comment', $request->temp_work_id, $tempdata->designer_company_email ,'test','',$cc_emails));

                    $designerCompanyEmails = DesignerCompanyEmail::where('temporary_work_id', $request->temp_work_id)->get();
                   foreach($designerCompanyEmails as $designeremail){
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$designeremail->email;
                    $cmh->type ='TWC to Designer';
                    $cmh->foreign_idd=$request->temp_work_id;
                    $cmh->message='Comment added for Designer by ' . $tempdata->twc_email;
                    $cmh->save();
                        Notification::route('mail', $designeremail->email)->notify(new CommentsNotification($request->comment, 'comment', $request->temp_work_id, $designeremail->email ,'test'));
                   }
                 }

                toastSuccess('Comment submitted successfully');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function temp_savecommentreplay(Request $request)
    {
        // dd($request->tempid);
        try {
            $commentid = $request->commentid;
            $tempid = $request->tempid;
            $data = TemporaryWorkComment::select('replay', 'reply_image', 'reply_date', 'sender_email')->find($commentid);
            $tempdata = TemporaryWork::select( 'designer_company_email')->find($tempid);
            $array = [];
            $cc_emails = [];
            if($tempdata->designer_company_email == $data->sender_email)
            {
                $designer_company_emails = DesignerCompanyEmail::where('temporary_work_id',$tempid)->get();
                if($designer_company_emails)
                {
                    foreach($designer_company_emails as $designer_company_email)
                    {
                        array_push($cc_emails,trim($designer_company_email->email));
                    }
                }
            } else {
                $designer_company_emails = DesignerCompanyEmail::where('temporary_work_id',$tempid)->where('email','!=',$data->sender_email)->get();
                if($designer_company_emails)
                {
                    foreach($designer_company_emails as $designer_company_email)
                    {
                        array_push($cc_emails,trim($designer_company_email->email));
                    }
                }
                array_push($cc_emails,trim($tempdata->designer_company_email));

            }
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
                $cmh= new ChangeEmailHistory();
                        $cmh->email=$data->sender_email;
                        $cmh->type ='Comment Replied';
                        $cmh->foreign_idd=$tempid;
                        $cmh->message='Comment Replied by ' . Auth::user()->email;
                        $cmh->user_type = 'designer';
                        $cmh->save();
                Notification::route('mail',  $data->sender_email)->notify(new CommentsNotification($request->replay, 'reply', $tempid, $data->sender_email, $scan,'',$cc_emails));
                // Notification::route('mail', $tempdata->designer_company_email)->notify(new CommentsNotification($request->comment, 'comment', $request->temp_work_id,'','test'));
                toastSuccess('Thank you for your reply');
                return Redirect::back();
            } else {
                toastError('Something went wrong, try again');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
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
     //get emails
    public function get_emails(Request $request)
    {
        $table = '';
        // echo $request->temporary_work_id;
        $data = TempWorkUploadFiles::where(['temporary_work_id' => $request->temporary_work_id, 'file_type'=>4])->get();
        // $commetns = TemporaryWork::with('uploadfile')::where(['temporary_work_id' => $request->temporary_work_id])->get();
        $list = '';
        $app_url = env('APP_URL');
        $list.= '<table class="table table-hover" style="border-collapse:separate;border-spacing:0 5px;"><thead style=""><tr><th>No</th><th>Emails File</th><th style="width:120px;">Date</th></tr></thead><tbody>';
        if (count($data) > 0) {
            $i = 1;
            foreach ($data as $d) {
                $list .= '<tr style="text-align:center;"><td>' . $i . '</td><td><a target="_blank" href="'. $app_url . '/' .$d->file_name .'">E'. $i . '</a></td><td>' . $d->created_at->todatestring() . '</td></tr>';
                $i++;
            }
        }
        $list .= '</tbody></table>';
        echo $list;
    }
    //get commetns
    public function get_comments(Request $request)
    {
        // dd($request);
        $table = '';
        $tabletwc='';
        $tabletwcdesigner='';
        $client_table = '';
        $path = config('app.url');
        if ($request->type == 'normal') {
            $commetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'normal'])->get();
            $twccommetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'twc'])->get();
            $twcdesigncommetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'twctodesigner'])->get();
            // $twclientcomments = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'client'])->get();
        } elseif($request->type == 'client'){ 
            $commetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'normal'])->get();
            $twccommetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'twc'])->get();
            $twcdesigncommetns = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'twctodesigner'])->get();
            $twclientcomments = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'client'])->get(); 
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
            $tabletwc.= '<table class="table"  style="border-radius: 8px; overflow: hidden;"><thead style="height:60px;background: #07D564;"><tr><th style="color: white !important;background: #07D564 !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">No</th><th style="color: white !important;background: #07D564 !important; font-size: 16px !important; font-weight: 600 !important; text-align: left">Twc Comment</th><th style="width:120px;color: white !important;background: #07D564 !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">Date</th><th style="background: #07D564 !important;"></th></tr></thead><tbody>';
            $i = 1;
            foreach ($twccommetns as $comment) { 
                 $tabletwc .= '<tr style="background:white">
                               <td style="padding-right: 35px !important; padding-top: 12px !important;">' . $i . '</td><td style="padding: 11px !important;text-align:start !important; white-space: pre-wrap;">' . $comment->comment . '</td>
                               <td style="padding: 11px !important">' . date("d-m-Y H:i:s", strtotime($comment->created_at)) . '</td>
                           </tr>';
                $i++;
            }
             $tabletwc .= '</tbody></table>';
        }
        if (isset($twcdesigncommetns) && count($twcdesigncommetns) > 0) {
            
            $tabletwcdesigner.= '<table class="table"  style="border-radius: 8px; overflow: hidden;"><thead  style="height:60px;background: #07D564 !important;"><tr><th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">No</th><th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left">Twc Messages to Designer</th><th style="width:120px;color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">Date</th><th></th></tr></thead><tbody>';
            $i = 1;
            foreach ($twcdesigncommetns as $comment) { 
                 $tabletwcdesigner .= '<tr style="background:white">
                               <td style="padding: 11px !important">' . $i . '</td><td style="padding: 11px !important;white-space: pre-wrap;">' . $comment->comment . '</td>
                               <td style="padding: 11px !important">' . date("d-m-Y H:i:s", strtotime($comment->created_at)) . '</td>
                           </tr>';
                $i++;
            }
             $tabletwcdesigner .= '</tbody></table>';
        }
        
        if (isset($commetns) && count($commetns) > 0) {
            if ($request->type == "permit" || $request->type == 'pc' || $request->type == "qscan") {
                $table.= '<table class="table" style="border-collapse:separate;border-spacing:0 5px;"><thead  style="height:80px;background: #07D564 ;  "><tr><th style="width:120px;">No</th><th style="width:35%;">Comment</th><th></th><th style="width:120px;">Date</th><th></th></tr></thead><tbody>';
            } else {
                $table .= '<table class="table commentsTable" style="border-radius: 8px; overflow:hidden;"><thead  style="height:60px;background: #07D564 ;"><tr><th style="width:10%;background: #07D564 !important; text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">No</th><th style="width:35%;text-align:left;color:white !important;background: #07D564 !important; font-weight: 600 !important; font-size:16px !important">Designer Comment</th><th style="width:40%;text-align:left;color:white !important;background: #07D564 !important; font-weight: 600 !important; font-size:16px !important">TWC Reply  </th></tr></thead><tbody>';
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
                if (isset($request->type) && $request->type == 'normal') {
                    $input = '<input type="hidden" name="scan" value="scan" />';
                    if ($comment->image) {
                        $n = strrpos($comment->image, '.');
                        $ext = substr($comment->image, $n + 1);
                        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                            $a = '<a target="_blank" href="' . $path . $comment->image . '"><img width="50px" height="50px" src=' . $path . $comment->image . ' ></a>';
                        } else {
                              
                            $a = '<a target="_blank" href="' . $path . $comment->image . '">Download File</a>';
                        }
                    }
                }
                $list = '';
                $k = 1;
                $formorreply='';
                $none='';
                if ($comment->replay) {
                    $none='display:block;';
                    // $none='display:none;';
                  
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
                               <td>' . $i . '</td><td style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), rgba(7, 213, 100, 0.5);

                               ">'. '<span style="font-weight: 600; font-size: 16px; margin-right:5px">Comment:</span>'. '<span style="font-size:16px; white-space:pre-wrap;">'.$comment->comment.'</span>' .$comment->sender_name.'<br>'. '<div style="display:flex; justify-content: space-between;"><span style="color: #9D9D9D">'.$comment->sender_email .'</span><span style="color: #9D9D9D">'. date('H:i d-m-Y', strtotime($comment->created_at)) . '</span></div><span style="color: #3A7DFF; font-size: 14px; font-weight: 400;">'.$a.'</span></td>
                               <td style=" flex-direction: column;  padding-left: 15px !important;white-space:pre-wrap;">
                               '.$formorreply.'
                                <form style="'.$none.'"  method="post" action="' . route("temporarywork.storecommentreplay") . '" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                                   <input type="hidden" name="tempid" value="' . $request->temporary_work_id . '"/>
                                   <textarea type="text" class="replay" name="replay" style="padding-left:5px; padding-top:5px; width: 100%;float:left;     background-color: #f5f8fa;border-color: #f5f8fa;color: #5e6278;transition: color .2s ease,background-color .2s ease;" placeholder="Add comment here..."></textarea>
                                    <div class="submmitBtnDiv">
                                        <input style="width:100%;margin-top:20px;float:left; background-color: #f5f8fa;border-color: #f5f8fa;color: #5e6278;margin-top:0px !important; transition: color .2s ease,background-color .2s ease;" type="file" name="replyfile" />
                                        <input type="hidden" name="commentid" value="' . $comment->id . '"/>
                                        ' . $input . '
                                        
                                    </div>
                                    <button class="btn btn-primary replay-comment" style="font-size:14px;margin-top:10px;float:right;">submit</button>
                                </form>

                               </td>
                           </tr>' . $list . '';
                } else {
                    
                    $table .= '<tr style="background:' . $colour . '">
                               <td style="white-space:pre-wrap;">' . $i . '</td><td>' . $comment->comment . '</td>
                               <td>' . $a . '</td>
                               <td>' . $date_comment  . '</td>
                           </tr>' . $list . '';
                }

                $i++;
            }

            $table .= '</tbody></table>';
            
        } 
        // if (isset($twclientcomments) && count($commetns) > 0) {
        //     if ($request->type == "permit" || $request->type == 'pc' || $request->type == "qscan") {
        //         $client_table.= '<table class="table" style="border-collapse:separate;border-spacing:0 5px;"><thead style="height:80px"><tr><th style="width:120px;">No</th><th style="width:35%;">Comment</th><th></th><th style="width:120px;">Date</th><th></th></tr></thead><tbody>';
        //     } else {
        //         $client_table .= '<table class="table commentsTable" style="border-radius: 8px; overflow:hidden;"><thead style="height:60px;background: #07D564;"><tr><th style="width:10%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">No</th><th style="width:35%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">Designer Comment</th><th style="width:40%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">TWC Reply</th></tr></thead><tbody>';
        //     }

        //     $i = 1;
        //     foreach ($commetns as $comment) {
        //          $image = '';
        //           $date = '';
        //         $colour = 'white';
        //         $a = '';
        //         $status = '';
        //         $input = '';
        //         if (isset($request->type) && $request->type == 'scan' || $request->type == 'qscan') {
        //             $input = '<input type="hidden" name="scan" value="scan" />';
        //             if ($comment->status==0) {
        //                 $colour = "green";
        //             } elseif($comment->status==1) {
        //                 $colour = '#6A5ACD';
        //             }elseif($comment->status==2){
        //                 $colour="red";
        //             }
        //             if ($comment->image) {
        //                 $n = strrpos($comment->image, '.');
        //                 $ext = substr($comment->image, $n + 1);
        //                 if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
        //                     $a = '<a target="_blank" href="' . $path . $comment->image . '"><img width="50px" height="50px" src=' . $path . $comment->image . ' ></a>';
        //                 } else {
        //                     $a = '<a target="_blank" href="' . $path . $comment->image . '">Attach File</a>';
        //                 }
        //             }
        //         }
        //         if (isset($request->type) && $request->type == 'normal') {
        //             $input = '<input type="hidden" name="scan" value="scan" />';
        //             if ($comment->image) {
        //                 $n = strrpos($comment->image, '.');
        //                 $ext = substr($comment->image, $n + 1);
        //                 if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
        //                     $a = '<a target="_blank" href="' . $path . $comment->image . '"><img width="50px" height="50px" src=' . $path . $comment->image . ' ></a>';
        //                 } else {
                              
        //                     $a = '<a target="_blank" href="' . $path . $comment->image . '">Download File</a>';
        //                 }
        //             }
        //         }
        //         $list = '';
        //         $k = 1;
        //         $formorreply='';
        //         $none='';
        //         if ($comment->replay) {
        //             $none='display:block;';
        //             // $none='display:none;';
                  
        //             // for ($j = 0; $j < count($comment->replay); $j++) {
        //                 if ($comment->replay[0]) {
        //                     $image = '';
        //                     if (isset($comment->reply_image[0])) {
        //                         $n = strrpos($comment->reply_image[0], '.');
        //                         $ext = substr($comment->reply_image[0], $n + 1);
        //                         if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
        //                             $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '"><img src="' . $path . $comment->reply_image[0] . '" width="50px" height="50px"/></a>';
        //                         } else {
        //                             $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '">View File</a>';
        //                         }
        //                     }
        //                     $date = '';
        //                     if (isset($comment->reply_date[0])) {
        //                         $date = date("H:i d-m-Y", strtotime($comment->reply_date[0]));
        //                     }
        //                     // $list .= '<tr style="background:#08d56478;margin-top:1px"><td>R</td><td>' . $comment->replay[0] . '</td><td>' . $comment->reply_email . '<br>' . $image . '<br>' . $date . '</td><td></td><td>' .  date("d-m-Y", strtotime($comment->reply_date[0])) . '</td></tr><br>';
        //                     $k++;
        //                 }
        //             //}
        //                 $formorreply=$comment->reply_email. '<br>'. $comment->replay[0].'<br>' . $image . '<br>' . $date;
        //         }

        //         $date_comment = date("d-m-Y", strtotime($comment->created_at->todatestring()));
        //         if ($request->type != "permit" && $request->type != 'pc' && $request->type != 'qscan' && $comment->type != 'twc') {

        //             $client_table .= '<tr style="background:' . $colour . '">
        //                        <td>' . $i . '</td><td style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), rgba(7, 213, 100, 0.5);

        //                        ">'. '<span style="font-weight: 600; font-size: 16px; margin-right:5px">Comment:</span>'. '<span style="font-size:16px">'.$comment->comment.'</span>' .$comment->sender_name.'<br>'. '<div style="display:flex; justify-content: space-between;"><span style="color: #9D9D9D">'.$comment->sender_email .'</span><span style="color: #9D9D9D">'. date('H:i d-m-Y', strtotime($comment->created_at)) . '</span></div><span style="color: #3A7DFF; font-size: 14px; font-weight: 400;">'.$a.'</span></td>
        //                        <td style=" flex-direction: column;">
        //                        '.$formorreply.'
        //                         <form style="'.$none.'"  method="post" action="' . route("temporarywork.storecommentreplay") . '" enctype="multipart/form-data">
        //                            <input type="hidden" name="_token" value="' . csrf_token() . '"/>
        //                            <input type="hidden" name="tempid" value="' . $request->temporary_work_id . '"/>
        //                            <textarea style="width: 100%" type="text" class="replay" name="replay" style="float:left" placeholder="Add comment here..."></textarea>
        //                             <div class="submmitBtnDiv">
        //                                 <input style="width:50%;margin-top:20px;float:left" type="file" name="replyfile" />
        //                                 <input type="hidden" name="commentid" value="' . $comment->id . '"/>
        //                                 ' . $input . '
        //                                 <button class="btn btn-primary replay-comment" style="font-size:10px;margin-top:10px;float:right;">submit</button>
        //                             </div>

        //                         </form>

        //                        </td>
        //                    </tr>' . $list . '';
        //         } else {
                    
        //             $client_table .= '<tr style="background:' . $colour . '">
        //                        <td>' . $i . '</td><td>' . $comment->comment . '</td>
        //                        <td>' . $a . '</td>
        //                        <td>' . $date_comment  . '</td>
        //                    </tr>' . $list . '';
        //         }

        //         $i++;
        //     }

        //     $client_table .= '</tbody></table>';
            
        // } 
        if (isset($twclientcomments) && count($twclientcomments) > 0) {

                $client_table .= '<table class="table commentsTable" style="border-radius: 8px; overflow:hidden;"><thead id="check" style="height:60px;"><tr><th style="width:10%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important;background: #07D564 !important;">No</th><th style="width:35%;text-align:left;color:white !important;background: #07D564 !important; font-weight: 600 !important; font-size:16px !important">Designer Comment</th><th style="width:40%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important;background: #07D564 !important">Client Reply</th></tr></thead><tbody>';

            $i = 1;
            foreach ($twclientcomments as $comment) {
                 $image = '';
                  $date = '';
                $colour = 'white';
                $a = '';
                $input = '';
                $list = '';
                $k = 1;
                $formorreply='';
                $none='';
                if ($comment->replay) {
                    $none='display:block;';
                    // $none='display:none;';
                  
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
                if ($request->type == 'client') {
                    $client_table .= '<tr style="background:' . $colour . '">
                               <td>' . $i . '</td><td style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), rgba(7, 213, 100, 0.5);

                               ">'. '<span style="font-weight: 600; font-size: 16px; margin-right:5px">Comment:</span>'. '<span style="font-size:16px; white-space:pre-wrap;">'.$comment->comment.'</span>' .$comment->sender_name.'<br>'. '<div style="display:flex; justify-content: space-between;"><span style="color: #9D9D9D">'.$comment->sender_email .'</span><span style="color: #9D9D9D">'. date('H:i d-m-Y', strtotime($comment->created_at)) . '</span></div><span style="color: #3A7DFF; font-size: 14px; font-weight: 400;">'.$a.'</span></td>
                               <td style=" flex-direction: column;">
                               '.$formorreply.'
                               </td>
                           </tr>' . $list . '';
                } else {
                    
                    $client_table .= '<tr style="background:' . $colour . '">
                               <td>' . $i . '</td><td>' . $comment->comment . '</td>
                               <td>' . $a . '</td>
                               <td>' . $date_comment  . '</td>
                           </tr>' . $list . '';
                }

                $i++;
            }

            $client_table .= '</tbody></table>';
            
        }

        echo  json_encode(array('comment'=>$table,'twccomment'=>$tabletwc, 'twcdesigner'=>$tabletwcdesigner, 'twclientcomments' => $client_table));
    }

    // Add this method to your controller


 

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
            $project = Project::with('company','blocks')->where('id', $tempdata->project_id)->first();
            $latestuploadfile = TempWorkUploadFiles::where('file_type', 1)->orderBy('id', 'desc')->limit(1)->first();
            $temporary_work_files = TempWorkUploadfiles::where([['file_type', 1],['temporary_work_id',$tempid]])->orderBy('id', 'desc')->get();
            return view('dashboard.temporary_works.permit', compact('project', 'tempid', 'twc_id_no', 'tempdata', 'latestuploadfile', 'temporary_work_files'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function test_permit_load(Request $request)
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
            return view('test-permit', compact('project', 'tempid', 'twc_id_no', 'tempdata', 'latestuploadfile'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    
    
    //save permit
    public function permit_save(Request $request)
    {
        DB::beginTransaction();
        Validations::storepermitload($request);
        try {
            $all_inputs  = $request->except('_token', 'approval', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed','pdfsigntype','pdfphoto','signed1', 'projno', 'projname', 'date', 'type', 'permitid', 'images', 'namesign1', 'namesign', 'design_requirement_text', 'company1','drawing','drawing_option','custom_drawing','design_upload','name3', 'job_title3', 'company3', 'companyid3', 'signed3', 'namesign3', 'name4', 'job_title4', 'company4', 'companyid4', 'signed4', 'namesign4', 'name5', 'job_title5', 'company5', 'companyid5', 'signed5', 'namesign5','date3','date4', 'date5','action', 'permitdata_status','draft_status');            
            $all_inputs['created_by'] = auth()->user()->id;
            $all_inputs['custom_drawing'] = '';
            $all_inputs['design_upload'] = '';
            if($request->action == 'draft'){
                $all_inputs['draft_status'] = '1';
            } else{
                $all_inputs['draft_status'] = '0';
            }
            if($request->design_upload){
                $designUpload = implode(', ', $request->design_upload);
                $all_inputs['design_upload'] = $designUpload;
            }
            $all_inputs['file_minimum_concrete'] = '';
            $file_minimum_concrete ='';
            if($request->minimum_concrete == 1){
                if ($request->file('file_minimum_concrete')) {
                    $filePath  = 'permits_upload/';
                    $file = $request->file('file_minimum_concrete');
                    $all_inputs['file_minimum_concrete'] = HelperFunctions::saveFile(null, $file, $filePath);
                    $file_minimum_concrete = $all_inputs['file_minimum_concrete'] ?? '';
                }
            }else{
                $file_minimum_concrete = $all_inputs['file_minimum_concrete'] ?? '';
                $all_inputs['description_minimum_concrete'] = "";
            }
            //first person signature and name
            $image_name1 = '';
            if ($request->principle_contractor == 1) { 
                $all_inputs['name1'] = $request->name1;
                $all_inputs['job_title1'] = $request->job_title1;
                $all_inputs['company1'] = $request->company1;
                $all_inputs['date1'] = $request->date1;
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
            //third person signature and name
            $image_name3 = '';
        if($request->signed3!=NULL){
            if ($request->signtype3 == 1) {
                $signature3 = $request->namesign3;
            } elseif($request->signed3 != HelperFunctions::defaultSign()) { 
                $name3 = $request->name3;
                $job_title3 = $request->job_title3;
                $company3 = $request->company3;
                $date3 = $request->date3;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed3);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name3 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name3;
                file_put_contents($file, $image_base64);
                $signature3 = $image_name3; 
            }
        }
            //fourth person signature and name
            $image_name4 = '';

        // if($request->signtype4!=NULL){
            if ($request->signtype4 == 1) {
                $signature4 = $request->namesign4;
            } elseif($request->signed4 != HelperFunctions::defaultSign()) { 
                
        
        $name4 = $request->name4;

                $job_title4 = $request->job_title4;
                $company4 = $request->company4;
                $date4 = $request->date4;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed4);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name4 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name4;
                file_put_contents($file, $image_base64);
                $signature4 = $image_name4; 
            }
        // }
            //fifth person signature and name
            $image_name5 = '';
        // if($request->signtype5!=NULL){
            if ($request->signtype5 == 1) {
                $signature4 = $request->namesign5;
            } elseif($request->signed5 != HelperFunctions::defaultSign()) { 
                $name5 = $request->name5;
                $job_title5 = $request->job_title5;
                $company5 = $request->company5;
                $date5 = $request->date5;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed5);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name5 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name5;
                file_put_contents($file, $image_base64);
                $signature5 = $image_name5; 
            }
        // }
            $all_inputs['created_by'] = auth()->user()->id;
            if (isset($request->approval)) {
                $all_inputs['status'] = 2;
            }
            $permitload = PermitLoad::create($all_inputs);  
            if($request->name3 && $request->signed3 != HelperFunctions::defaultSign())
            {
                $signature3_record = new Signature([
                    'name' => $name3,
                    'job_title' => $job_title3,
                    'company' => $company3,
                    'date' => $date3,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature3, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature3_record);
            }

            if($request->name4 && $request->signed4 != HelperFunctions::defaultSign())
            {
                $signature4_record = new Signature([
                    'name' => $name4,
                    'job_title' => $job_title4,
                    'company' => $company4,
                    'date' => $date4,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature4, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature4_record);
            }

            if($request->name5 && $request->signed5 != HelperFunctions::defaultSign())
            {
                $signature5_record = new Signature([
                    'name' => $name5,
                    'job_title' => $job_title5,
                    'company' => $company5,
                    'date' => $date5,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature5, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature5_record);
            }
            if ($permitload) {
                //make status 0 if permit is 
                $msg= Auth::user()->name .' has uploaded a permit to load to the Temporary Works Portal.';
                // $msg = " Attached in the i-Works web portal for your attention is a PDF permit to load which has been created by " . $request->company . " Ltd (" . $request->design_requirement_text . ").";
                $message = "Load";
                $actiontext="View Permit";
                if (isset($request->type)) {
                    PermitLoad::find($request->permitid)->update(['status' => 0]);
                    $msg= Auth::user()->name .' has renewed a permit to load.';
                    // $msg = "Attached in the i-Works web portal for your attention is a PDF permit to load Renew by " . $request->company . " Ltd (" . $request->design_requirement_text . ").";
                    $message = "Renew";
                    $actiontext="View Permit Renewal";
                }
                
                //save permit image
                $pojectdata=Project::select('name','no')->find($request->project_id);
                $image_links = $this->permitfiles($request, $permitload->id); 
                $pdf = PDF::loadView('layouts.pdf.permit_load', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'image_name1' => $image_name1, 'image_name3' => $image_name3, 'image_name4' => $image_name4, 'image_name5' => $image_name5, 'company1' => $request->company1, 'company3' => $request->company3, 'company4' => $request->company4, 'company5' => $request->company5, 'date1'=>$request->date1, 'date3'=>$request->date3, 'date4'=>$request->date4, 'date5'=>$request->date5,'file_minimum_concrete' => $file_minimum_concrete]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitload->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);

                 DB::commit();
                if($request->action != 'draft'){
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Load';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to Load created';
                    $cmh->save();
                    $notify_admins_msg = [
                        'greeting' => 'Permit to Load',
                        'subject' => 'TWP– Permit to Load - '.$pojectdata->name . '-' . $pojectdata->no,
                        'body' => [
                            'text' => $msg,
                            'filename' => $filename,
                            'links' =>  '',
                            'pc_twc' => '',
                            'id' => $permitload->id,
                            'name' => 'Permit Load',
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => $actiontext,
                        'action_url' => '',
                    ];
                    
                    // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new PermitNotification($notify_admins_msg));
                    Notification::route('mail', $request->twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));

                    if (isset($request->approval)) {
                        $cmh= new ChangeEmailHistory();
                        $cmh->email=$request->pc_twc_email;
                        $cmh->type ='Permit to Load';
                        $cmh->status =2;
                        $cmh->foreign_idd=$request->temporary_work_id;
                        $cmh->message='Permit to Load sent for PC TWC Approval';
                        $cmh->save();
                    $notify_admins_msg['body']['pc_twc'] = '1';
                        Notification::route('mail', $request->pc_twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
                    } 
                }else{
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Load created (Draft)';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to Load created as Draft';
                    $cmh->save();
                }

                DB::commit();
                toastSuccess('Permit ' . $message . ' sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception->getMessage(), $exception->getLine());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //get all permits and loads in modal
    public function permit_get(Request $request)
    {
        $tempid = \Crypt::decrypt($request->id);
        $unload_permit = true;
        //  if (isset($request->type)) {
        //    $permited = PermitLoad::where(['temporary_work_id' => $tempid])->where('status','!=',4)->where('status','!=',0)->latest()->get();
        //     $scaffold = Scaffolding::where(['temporary_work_id' => $tempid])->where('status','!=',4)->where('status','!=',0)->latest()->get();
        //  }else{
        //      $permited = PermitLoad::where(['temporary_work_id' => $tempid])->whereNotIn('status',[ 3  ])->latest()->get();
        //     //  $permited = PermitLoad::where(['temporary_work_id' => $tempid])->whereNotIn('status',[ 3 , 2 ])->latest()->get(); //Nomans code for not showing pending permit.
        //      $scaffold = Scaffolding::where(['temporary_work_id' => $tempid])->latest()->get();
        //  }
        if (isset($request->type)) {
            $permited = PermitLoad::with('blocks')->where(['temporary_work_id' => $tempid])->where('status','!=',4)->where('status','!=',0)->where('status','!=',7)->where('status','!=',9)->latest()->get();
             $scaffold = Scaffolding::where(['temporary_work_id' => $tempid])->where('status','!=',4)->where('status','!=',0)->latest()->get();
          }else{
              $permited = PermitLoad::with('blocks')->where(['temporary_work_id' => $tempid])->where('status','!=',3)->where('status','!=',6)->latest()->get();
              $scaffold = Scaffolding::where(['temporary_work_id' => $tempid])->latest()->get();
          }
        $list = '';
        if (count($permited) > 0) {
            $current =  \Carbon\Carbon::now();
            foreach ($permited as $permit) {
                if(isset($request->type)){
                    if (($permit->draft_status == '1')) {
                        if($permit->status == 3 || $permit->status == 6){
                            $unload_permit = true;
                        } else{
                            $unload_permit = false;
                        }
                    } else{
                        if($permit->status == 3 || $permit->status == 6 || $permit->status == 1){
                            $unload_permit = true;
                         } else{
                            $unload_permit = false;
                        }
                    }
                    if($unload_permit == false){
                        continue;
                    }  
                }
                              
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                    $diff_in_days = $to->diffInDays($current);
                    $class = '';
                    $color = '';
                    $status = '';
                    $button = '';
                    $dnl_status = '';
                    $days = (7 - $diff_in_days);
                    if ($permit->draft_status == '1') {
                        $status = "Draft";
                    }elseif ($permit->status == 1 || $permit->status == 9) {
                        $status = "Open";
                        $button = '<a style="line-height:15px;height: 50px;margin: 4px 0;" class="btn btn-primary" href="' . route("permit.renew", \Crypt::encrypt($permit->id)) . '"><span class="fa fa-plus-square"></span> Renew</a>';
                        if (isset($request->type)) {
                            $button = '
                            <div>
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                                </button>
                                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                <div class="d-flex flex-column justify-content-start">
                                <a class="dropdown-item" href="' . route("permit.unload", \Crypt::encrypt($permit->id)) . '" ><span class="fa fa-plus-square" ></span> Unload</a>
                                <a class="confirm1 dropdown-item" href="' . route("permit.close", \Crypt::encrypt($permit->id)) . '" data-text="ARE YOU SURE?"><span class="fa fa-minus-square" ></span> Close</a>
                                </div>
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
                        $status = "<span class='permit-rejected  cursor-pointer btn btn-danger ' style='font-size: 13px;width: 70px;border-radius:8px; height: 20px;line-height: 0px;' data-id='" . \Crypt::encrypt($permit->id) . "'>DNL</span>";
                    }elseif ($permit->status == 6) {
                        $status = "Pending";
                    }elseif ($permit->status == 7) {
                        $status = "Pending";
                    }
                    if (($permit->status ==3 || $permit->status ==6) && $permit->draft_status == '1') {
                        $dnl_status = "<a href=" . route("permit.unload.edit", \Crypt::encrypt($permit->id)) . "><i style='text-align:center; font-size:20px;' class='fa fa-edit'></i></a>";
                    }else if ($permit->status == 5 || $permit->draft_status == '1') {
                        $dnl_status = "<a href=" . route("permit.edit", \Crypt::encrypt($permit->id)) . "><i style='text-align:center; font-size:20px;' class='fa fa-edit'></i></a>";
                    }
                    // if ($permit->status == 2 || $permit->status == 6 || $permit->status == 7) {
                        // if ($permit->draft_status == 1) {
                        //     $dnl_status = "<a href=" . route("permit.edit", \Crypt::encrypt($permit->id)) . "><i style='text-align:center; font-size:20px;' class='fa fa-edit'></i></a>";
                        // }
                    // }

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
                   $block_id = isset($permit->blocks) ? $permit->blocks->title : '';
                    $date = empty($permit->updated_at) ? date('d-m-Y', strtotime($permit->created_at)) : date('d-m-Y', strtotime($permit->updated_at)) ;
                    $time = empty($permit->updated_at) ? date('H:i:s',strtotime($permit->created_at)) : date('H:i:s',strtotime($permit->updated_at));
                    $list .= '<tr data-permit-id="'.$permit->id.'" style="' . $class . '"><td style="text-align:center"><a style="    height: 50px;line-height: 15px;" target="_blank" href="' . $path . 'pdf/' . $permit->ped_url . '">' . $request->desc . '</a></td><td  style="text-align:center">' . $permit->permit_no . '</td><td  style="text-align:center" class="' . $color . '">' . $days . ' days </td><td  style="text-align:center">Permit Load</td><td  style="text-align:center">'. $permit->location_temp_work .'</td><td  style="text-align:center">'. $block_id .'</td><td  style="text-align:center">'. $date .'<br>'.$time.'</td><td  style="text-align:center">' .  $status . '</td><td style="height: 48px;line-height: 15px;text-align:center;">' . $dnl_status . $button . '</td>/tr>';
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
                $list .= '<tr data-permit-id="'.$permit->id.'" style="height: 50px;line-height: 15px;' . $class . '"><td><a target="_blank"href="' . $path . 'pdf/' . $permit->ped_url . '">' . $request->desc . '</a></td><td>' . $permit->permit_no . '</td><td class="' . $color . '">' .  $days . ' days</td><td>Scaffold</td><td>' .  $status . '</td><td>' . $button . '</td></tr>';
            }
        }
        echo $list;
    }
    //work for permit edit and update
    public function permit_edit($id)
    {
        $permitid =  \Crypt::decrypt($id);
        $permitdata = PermitLoad::with('permitLoadImages','signatures','blocks')->find($permitid);
        $tempid = $permitdata->temporary_work_id;
        $tempdata = TemporaryWork::find($tempid);
        $twc_id_no = $permitdata->permit_no;

        $project = Project::with('company')->where('id', $permitdata->project_id)->first();
        $temporary_work_files = TempWorkUploadfiles::where([['file_type', 1],['temporary_work_id',$tempid]])->orderBy('id', 'desc')->get();
        return view('dashboard.temporary_works.permit-edit', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata', 'temporary_work_files'));
    }
    //permit update
    public function permit_update(Request $request)
    {
        DB::beginTransaction();
        Validations::storepermitload($request);
        $permitload = PermitLoad::with('permitLoadImages','signatures')->find($request->permitid);
        try {
            $all_inputs  = $request->except('_token', 'approval', 'load_images', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed', 'pdfsigntype','pdfphoto', 'signed1', 'projno', 'projname', 'date', 'type', 'permitid', 'images', 'namesign1', 'namesign', 'design_requirement_text', 'company1', 'drawing','drawing_option','custom_drawing','design_upload', 'name3', 'job_title3', 'company3', 'companyid3', 'signed3', 'namesign3', 'name4', 'job_title4', 'company4', 'companyid4', 'signed4', 'namesign4', 'name5', 'job_title5', 'company5', 'companyid5', 'signed5', 'namesign5','date2','date3','date4', 'date5', 'action', 'permitdata_status');      
            $all_inputs['created_by'] = auth()->user()->id;
            $all_inputs['custom_drawing'] = '';
            $all_inputs['design_upload'] = '';
            if($request->design_upload){
                $designUpload = implode(', ', $request->design_upload);
                $all_inputs['design_upload'] = $designUpload;
            }
            $all_inputs['file_minimum_concrete'] = '';
            $file_minimum_concrete ='';
            if($request->minimum_concrete == 1){
                if ($request->file('file_minimum_concrete')) {
                    $filePath  = 'permits_upload/';
                    $file = $request->file('file_minimum_concrete');
                    $old_path = $permitload->file_minimum_concrete;
                    $all_inputs['file_minimum_concrete'] = HelperFunctions::saveFile($old_path, $file, $filePath);
                    $file_minimum_concrete = $all_inputs['file_minimum_concrete'];
                }
            }else{
                $file_minimum_concrete = '';
            }
            // if($request->action == 'draft'){
            //     $all_inputs['status'] = 8;
            // }

            //first person signature and name
            $image_name1 = '';
            if ($request->principle_contractor == 1) {
                if(!$permitload->signature){

                    $all_inputs['name1'] = $request->name1;
                    $all_inputs['job_title1'] = $request->job_title1;
                    if ($request->signtype1 == 1) {
                        $all_inputs['signature1'] = $request->namesign1;
                        $all_inputs['name1'] = $request->name1;
                        $all_inputs['job_title1'] = $request->job_title1;
                        $all_inputs['company1'] = $request->company1; //this should be company1
                        $all_inputs['date1'] = $request->date2; //this should be company1
                    } else {

                        $folderPath = public_path('temporary/signature/');
                        $image = explode(";base64,", $request->signed1);
                        $image_type = explode("image/", $image[0]);
                        $image_type_png = $image_type[1];
                        $image_base64 = base64_decode($image[1]);
                        $image_name1 = uniqid() . '.' . $image_type_png;
                        $file = $folderPath . $image_name1;
                        @unlink($folderPath . $permitload->signature1);
                        file_put_contents($file, $image_base64);
                        $all_inputs['signature1'] = $image_name1;

                        $all_inputs['name1'] = $request->name1;
                        $all_inputs['job_title1'] = $request->job_title1;
                        $all_inputs['company1'] = $request->company1; //this should be company1
                        $all_inputs['date1'] = $request->date2; //this should be company1
                    }
                } else {
                    $all_inputs['name1'] = $request->name1;
                    $all_inputs['date1'] = $request->date2;
                    $all_inputs['company1'] = $request->company1;
                    $all_inputs['job_title1'] = $request->job_title1;
                    $image_name1 = $permitload->signature1;
                    $all_inputs['signature1'] = $image_name1; 
                }
            } 

            //second person signature and name
            $image_name = '';
            if(!$permitload->signature){

                if ($request->signtype == 1) {
                    $all_inputs['signature'] = $request->namesign;
                    $all_inputs['name'] = $request->name;
                    $all_inputs['job_title'] = $request->job_title;
                    $all_inputs['company'] = $request->company; 
                } else {
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name;
                    @unlink($folderPath . $permitload->signature);
                    file_put_contents($file, $image_base64);
                    $all_inputs['signature'] = $image_name;
                    $all_inputs['name'] = $request->name;
                    $all_inputs['job_title'] = $request->job_title;
                    $all_inputs['company'] = $request->company; 
                }
            } else{
                $all_inputs['name'] = $request->name;
                $all_inputs['job_title'] = $request->job_title;
                $all_inputs['company'] = $request->company;
                $all_inputs['date'] = $request->date;
                $image_name = $permitload->signature;
                $all_inputs['signature'] = $image_name; 
            }
         
            //third person signature and name
            $image_name3 = '';
            if(!isset($permitload->signatures[0]) && empty($permitload->signatures[0]->signature)){
            // if(!$permitload->signatures[0]->name){
                if ($request->signtype3 == 1) {
                    $signature3 = $request->namesign3;
                } elseif($request->name3) {
                    $name3 = $request->name3;
                    $job_title3 = $request->job_title3;
                    $company3 = $request->company3;
                    $date3 = $request->date3;
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed3);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name3 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name3;
                    file_put_contents($file, $image_base64);
                    $signature3 = $image_name3; 
                } 
            } else{
                $name3 = $permitload->signatures[0]->name;
                $job_title3 = $permitload->signatures[0]->job_title;
                $company3 = $permitload->signatures[0]->company;
                $date3 = $permitload->signatures[0]->date;
                $image_name3 = $permitload->signatures[0]->signature;
                $signature3 = $image_name3; 
            }
            // dd("yyyy");
            
            // $signature_exist = $permitload->signatures[0] ?? null;
            // if(!empty($signature_exist)){
            //     if(empty($permitload->signatures[0]->signature)){
            //         if ($request->signtype3 == 1) {
            //             $signature3 = $request->namesign3;
            //         } elseif($request->name3) {
            //             $name3 = $request->name3;
            //             $job_title3 = $request->job_title3;
            //             $company3 = $request->company3;
            //             $date3 = $request->date3;
            //             $folderPath = public_path('temporary/signature/');
            //             $image = explode(";base64,", $request->signed3);
            //             $image_type = explode("image/", $image[0]);
            //             $image_type_png = $image_type[1];
            //             $image_base64 = base64_decode($image[1]);
            //             $image_name3 = uniqid() . '.' . $image_type_png;
            //             $file = $folderPath . $image_name3;
            //             file_put_contents($file, $image_base64);
            //             $signature3 = $image_name3; 
            //         } 
            //     } else{
            //         $name3 = $permitload->signatures[0]->name;
            //         $job_title3 = $permitload->signatures[0]->job_title;
            //         $company3 = $permitload->signatures[0]->company;
            //         $date3 = $permitload->signatures[0]->date;
            //         $image_name3 = $permitload->signatures[0]->signature;
            //         $signature3 = $image_name3; 
            //     }
            // }
            //fourth person signature and name
            $image_name4 = '';
            if(!isset($permitload->signatures[1]) && empty($permitload->signatures[1]->signature)){
            // if(!$permitload->signatures[0]->name){
                if ($request->signtype4 == 1) {
                    $signature4 = $request->namesign4;
                } elseif($request->name4) { 
                    $name4 = $request->name4;
                    $job_title4 = $request->job_title4;
                    $company4 = $request->company4;
                    $date4 = $request->date4;
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed4);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name4 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name4;
                    file_put_contents($file, $image_base64);
                    $signature4 = $image_name4; 
                }
            } else{
                $name4 = $permitload->signatures[1]->name;
                $job_title4 = $permitload->signatures[1]->job_title;
                $company4 = $permitload->signatures[1]->company;
                $date4 = $permitload->signatures[1]->date;
                $image_name4 = $permitload->signatures[1]->signature;
                $signature4 = $image_name4; 
            }

            //fifth person signature and name
            $image_name5 = '';
            if(!isset($permitload->signatures[2]) && empty($permitload->signatures[2]->signature)){
            // if(!$permitload->signatures[0]->name){
                if ($request->signtype5 == 1) {
                    $signature4 = $request->namesign5;
                } elseif($request->name5) { 
                    $name5 = $request->name5;
                    $job_title5 = $request->job_title5;
                    $company5 = $request->company5;
                    $date5 = $request->date5;
                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed5);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name5 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name5;
                    file_put_contents($file, $image_base64);
                    $signature5 = $image_name5; 
                }
            } else{
                $name5 = $permitload->signatures[2]->name;
                $job_title5 = $permitload->signatures[2]->job_title;
                $company5 = $permitload->signatures[2]->company;
                $date5 = $permitload->signatures[2]->date;
                $image_name5 = $permitload->signatures[2]->signature;
                $signature5 = $image_name5; 
            }

            $all_inputs['created_by'] = auth()->user()->id;
            if (!isset($request->approval)) {
                $all_inputs['status'] = 1;
            }
            if($request->action == 'draft'){
                $all_inputs['draft_status'] = '1';
            } else{
                $all_inputs['draft_status'] = '0';
            }
            $permitload->signatures()->delete();
            // dd($all_inputs);

            $permitload->update($all_inputs);
            
            
            if($request->name3)
            {
                $signature3_record = new Signature([
                    'name' => $name3,
                    'job_title' => $job_title3,
                    'company' => $company3,
                    'date' => $date3,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature3, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature3_record);
            }
            
            if($request->name4)
            {
                $signature4_record = new Signature([
                    'name' => $name4,
                    'job_title' => $job_title4,
                    'company' => $company4,
                    'date' => $date4,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature4, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature4_record);
            }

            if($request->name5)
            {
                $signature5_record = new Signature([
                    'name' => $name5,
                    'job_title' => $job_title5,
                    'company' => $company5,
                    'date' => $date5,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature5, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature5_record);
            }
            $pojectdata=Project::select('name','no')->find($request->project_id);
            if ($permitload) {
                //make status 0 if permit is 
                 $msg= Auth::user()->name .' has uploaded a permit to load to the Temporary Works Portal.';
                //save permit image
                $image_links = $this->permitfiles($request, $permitload->id);
                // dd($permitload->permitLoadImages);
                $pdf = PDF::loadView('layouts.pdf.permit_load', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'image_name1' => $image_name1, 'image_name3' => $image_name3, 'image_name4' => $image_name4, 'image_name5' => $image_name5, 'company1' => $request->company1, 'company3' => $request->company3, 'company4' => $request->company4, 'company5' => $request->company5, 'date1'=>$request->date1, 'date3'=>$request->date3, 'date4'=>$request->date4, 'date5'=>$request->date5, 'file_minimum_concrete' => $file_minimum_concrete,'old_permit_images' => $permitload->permitLoadImages]);
                $path = public_path('pdf');
                @unlink($path . $permitload->ped_url);
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitload->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);
                DB::commit();

                
                if($request->action != 'draft'){
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Load';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to Load Updated';
                    $cmh->save();
                    $notify_admins_msg = [
                        'greeting' => 'Permit Pdf',
                        'subject' => 'TWP– Permit to Load - '.$pojectdata->name . '-' . $pojectdata->no,
                        'body' => [
                            'text' => $msg,
                            'filename' => $filename,
                            'links' =>  '',
                            'pc_twc' => '',
                            'id' => $permitload->id,
                            'name' => 'Permit Load',
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => 'View Permit',
                        'action_url' => '',
                    ];

                    if (isset($request->approval)) {
                        $cmh= new ChangeEmailHistory();
                        $cmh->email=$request->pc_twc_email;
                        $cmh->type ='Permit to Load';
                        $cmh->status =2;
                        $cmh->foreign_idd=$request->temporary_work_id;
                        $cmh->message='Permit to Load sent for PC TWC Approval';
                        $cmh->save();

                        $notify_admins_msg['body']['pc_twc'] = '1';
                        Notification::route('mail', $request->pc_twc_email)->notify(new PermitNotification($notify_admins_msg));
                    } else {
                        // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new PermitNotification($notify_admins_msg));
                        Notification::route('mail', $request->twc_email)->notify(new PermitNotification($notify_admins_msg));
                    }
                }else{
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Load Update (Draft)';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to Load Update as Draft';
                    $cmh->save();
                }
                toastSuccess('Permit Updatd sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception->getMessage(), $exception->getLine()); 
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
    //permit renew
    public function permit_renew_test($id)
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
        return view('dashboard.temporary_works.permit-renew-test', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata'));
    }
    //permit unlaod
    public function delete_permit_image(Request $request)
    {
        $fileData = PermitLoadImages::find($request->filename_id);
        $filePath = public_path($fileData->fileName); // Replace with the actual file path
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file
            $fileData->delete();
            return response()->json(['message' => 'File deleted successfully']);
        }

        return response()->json(['message' => 'File not found'], 404);  
    }
    public function permit_unload($id)
    {
        try {
            $permitid =  \Crypt::decrypt($id);
            $permitdata = PermitLoad::find($permitid);
            $tempid = $permitdata->temporary_work_id;
            $tempdata = TemporaryWork::select(['twc_email', 'twc_id_no', 'designer_company_email', 'design_requirement_text'])->find($tempid);
            $twc_id_no = $permitdata->permit_no;
            $project = Project::with('company')->where('id', $permitdata->project_id)->first();
            $temporary_work_files = TempWorkUploadfiles::where([['file_type', 1],['temporary_work_id',$tempid]])->orderBy('id', 'desc')->get();
            return view('dashboard.temporary_works.permit-unload', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata', 'temporary_work_files'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function permit_unload_edit($id) {
        try {
            $permitid =  \Crypt::decrypt($id);
            $permitdata = PermitLoad::with('permitLoadImages','signatures')->find($permitid);
            $tempid = $permitdata->temporary_work_id;
            $tempdata = TemporaryWork::select(['twc_email', 'twc_id_no', 'designer_company_email', 'design_requirement_text'])->find($tempid);
            $twc_id_no = $permitdata->permit_no;
            $project = Project::with('company')->where('id', $permitdata->project_id)->first();
            $temporary_work_files = TempWorkUploadfiles::where([['file_type', 1],['temporary_work_id',$tempid]])->orderBy('id', 'desc')->get();
            return view('dashboard.temporary_works.permit-unload-edit', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata', 'temporary_work_files'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
        // return view('dashboard.temporary_works.permit-unload-edit');
    }
    public function permit_unload_test($id)
    {
        try {
            $permitid =  \Crypt::decrypt($id);
            $permitdata = PermitLoad::find($permitid);
            $tempid = $permitdata->temporary_work_id;
            $tempdata = TemporaryWork::select(['twc_email', 'twc_id_no', 'designer_company_email', 'design_requirement_text'])->find($tempid);
            $twc_id_no = $permitdata->permit_no;
            $project = Project::with('company')->where('id', $permitdata->project_id)->first();
            return view('permit_unload_test', compact('project', 'tempid', 'permitdata', 'twc_id_no', 'tempdata'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //permit unload save
    public function permit_unload_save(Request $request)
    {
        DB::beginTransaction();
        Validations::storepermitunload($request);
        try {
            $all_inputs  = $request->except('_token', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed','pdfsigntype','pdfphoto','signed1', 'projno', 'projname', 'date', 'permitid', 'images', 'namesign1', 'namesign', 'design_requirement_text', 'approavalEmailReq', 'approval_PC', 'company1','companyid1', 'pdfsigntype1', 'date1', 'date2','drawing','drawing_option','custom_drawing','design_upload', 'name3', 'job_title3', 'company3', 'companyid3', 'signed3', 'namesign3', 'name4', 'job_title4', 'company4', 'companyid4', 'signed4', 'namesign4', 'name5', 'job_title5', 'company5', 'companyid5', 'signed5', 'namesign5','date3','date4', 'date5','action', 'permitdata_status','draft_status');
            $all_inputs['created_by'] = auth()->user()->id;
            $all_inputs['custom_drawing'] = '';
            $all_inputs['design_upload'] = '';
            if($request->design_upload){
                $designUpload = implode(', ', $request->design_upload);
                $all_inputs['design_upload'] = $designUpload;
            }
            if($request->action == 'draft'){
                $all_inputs['draft_status'] = '1';
            } else{
                $all_inputs['draft_status'] = '0';
            }
            if($request->design_upload){
                $designUpload = implode(', ', $request->design_upload);
                $all_inputs['design_upload'] = $designUpload;
            }

            $image_name1 = '';
            
            
            if ($request->signtype1 == 1) {
                $all_inputs['signature1'] = $request->namesign1;
                $all_inputs['name'] = $request->name;
                $all_inputs['job_title'] = $request->job_title;
                $all_inputs['company'] = $request->company;
            $all_inputs['name'] = $request->name;
            }elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto1');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name1 = $filename;
                $all_inputs['signature'] = $image_name1;
                $all_inputs['name'] = $request->name;
                $all_inputs['job_title'] = $request->job_title;
                $all_inputs['company'] = $request->company;
            }else{
                $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed1);
                    $image_type = explode("image/", $image[0]);
                    
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name1 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name1;
                    file_put_contents($file, $image_base64);
                    $all_inputs['signature1'] = $image_name1;
                    $all_inputs['name'] = $request->name;
                    $all_inputs['job_title'] = $request->job_title;
                    $all_inputs['company'] = $request->company;
            }
            
            //for 2
            $image_name = '';
            if ($request->signtype == 1) {
                $all_inputs['signature'] = $request->namesign;
                $all_inputs['name1'] = $request->name1;
                $all_inputs['job_title1'] = $request->job_title1;
                $all_inputs['company1'] = $request->company1; //this should be company1
            } elseif ($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfphoto');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
                $all_inputs['signature'] = $image_name;
                $all_input['pc_twc_email'] = $request->pc_twc_email;
                $all_inputs['name1'] = $request->name1;
                $all_inputs['job_title1'] = $request->job_title1;
                $all_inputs['company1'] = $request->company1; //this should be company1
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
               $all_inputs['name1'] = $request->name1;
                $all_inputs['job_title1'] = $request->job_title1;
                $all_inputs['company1'] = $request->company1; //this should be company1
            }

            //third person signature and name
            $image_name3 = '';
            if ($request->signtype3 == 1) {
                $signature3 = $request->namesign3;
            } elseif($request->signed3 != HelperFunctions::defaultSign()) { 
                $name3 = $request->name3;
                $job_title3 = $request->job_title3;
                $company3 = $request->company3;
                $date3 = $request->date3;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed3);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name3 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name3;
                file_put_contents($file, $image_base64);
                $signature3 = $image_name3; 
            }

            //fourth person signature and name
            $image_name4 = '';
            if ($request->signtype4 == 1) {
                $signature4 = $request->namesign4;
            } elseif($request->signed4 != HelperFunctions::defaultSign()) { 
                $name4 = $request->name4;
                $job_title4 = $request->job_title4;
                $company4 = $request->company4;
                $date4 = $request->date4;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed4);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name4 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name4;
                file_put_contents($file, $image_base64);
                $signature4 = $image_name4; 
            }

            //fifth person signature and name
            $image_name5 = '';
            if ($request->signtype5 == 1) {
                $signature4 = $request->namesign5;
            } elseif($request->signed5 != HelperFunctions::defaultSign()) { 
                $name5 = $request->name5;
                $job_title5 = $request->job_title5;
                $company5 = $request->company5;
                $date5 = $request->date5;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed5);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name5 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name5;
                file_put_contents($file, $image_base64);
                $signature5 = $image_name5; 
            }
            // $all_inputs['status'] = 3;
            // $all_inputs['status'] = $request->principle_contractor == 1 ? 2 : 3;
            $all_inputs['status'] = $request->principle_contractor == 1 ? 6 : 3;
            
            $all_inputs['mix_design_detail'] = $request->mix_design_detail;
            $all_inputs['unique_ref_no'] = $request->unique_ref_no;
            $all_inputs['age_cube'] = $request->age_cube;
            $all_inputs['compressive_strength'] = $request->compressive_strength;
            $all_inputs['method_curing'] = $request->method_curing;
            $all_inputs['twc_control_pts'] = $request->twc_control_pts;
            $all_inputs['back_propping'] = $request->back_propping;
            $all_inputs['comments'] = $request->comments;
            $all_inputs['location_temp_work'] = $request->location_temp_work;
            $all_inputs['description_structure'] = $request->description_structure;
            $all_inputs['ms_ra_no'] = $request->ms_ra_no;

            $all_inputs['created_by'] = auth()->user()->id;
            if($request->principle_contractor==null){$request->principle_contractor=0;}
            $data['principle_contractor'] = $request->approval_PC;
            $all_inputs['principle_contractor'] = $request->approval_PC;

            $permitload = PermitLoad::create($all_inputs);
            if($request->name3 && $request->signed3 != HelperFunctions::defaultSign())
            {
                $signature3_record = new Signature([
                    'name' => $name3,
                    'job_title' => $job_title3,
                    'company' => $company3,
                    'date' => $date3,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature3, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature3_record);
            }

            if($request->name4 && $request->signed4 != HelperFunctions::defaultSign())
            {
                $signature4_record = new Signature([
                    'name' => $name4,
                    'job_title' => $job_title4,
                    'company' => $company4,
                    'date' => $date4,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature4, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature4_record);
            }

            if($request->name5 && $request->signed5 != HelperFunctions::defaultSign())
            {
                $signature5_record = new Signature([
                    'name' => $name5,
                    'job_title' => $job_title5,
                    'company' => $company5,
                    'date' => $date5,
                    'signatureable_type' => get_class($permitload),  
                    'signature' => $signature5, 
                    'signatureable_id' => $permitload->id             
                ]);
    
                $permitload->signatures()->save($signature5_record);
            }
            
            if ($permitload) {
                //make status 0 if permit is 
                // $request->principle_contractor == 1 ? PermitLoad::where( 'id' , $request->permitid)->update(['status' => 1]) :  PermitLoad::where( 'id' , $request->permitid)->update(['status' => 4]);
                if($request->action != 'draft' && $request->principle_contractor != 1){
                $request->principle_contractor == 1 ? PermitLoad::where( 'id' , $request->permitid)->update(['status' => 7]) :  PermitLoad::where( 'id' , $request->permitid)->update(['status' => 4]);

                // $request->principle_contractor == 1 ? PermitLoad::where( 'id' , $permit_load_orig->id)->update(['status' => 7]) :  PermitLoad::where( 'id' , $permit_load_orig)->update(['status' => 4]);
                }else{
                    PermitLoad::where( 'id' , $request->permitid)->update(['status' => 9]);
                }
                //upload permit unload files
                // dd("here" , $request->permitid , $permitload->id);
                $image_links = $this->permitfiles($request, $permitload->id);
                $request->merge(['name' => $request->name1 , 'job_title' => $request->job_title1]);
                $pdf = PDF::loadView('layouts.pdf.permit_unload', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'image_name1' => $image_name1, 'principle_contractor' => $request->approval_PC, 'date1'=>$request->date1, 'date2'=>$request->date2, 'image_name3' => $image_name3, 'image_name4' => $image_name4, 'image_name5' => $image_name5, 'company1' => $request->company1, 'company3' => $request->company3, 'company4' => $request->company4, 'company5' => $request->company5, 'date1'=>$request->date1, 'date3'=>$request->date3, 'date4'=>$request->date4, 'date5'=>$request->date5]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitload->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);
                DB::commit();
                
                if($request->action != 'draft'){
                    $notify_admins_msg = [
                        'greeting' => 'Permit Unload Pdf',
                        'subject' => $request->projname . '-' . $request->projno,
                        'body' => [
                            'text' => ''.Auth::user()->name.' has issued a permit to offload.',
                            'id' => $permitload->id,
                            'filename' => $filename,
                            'links' =>  '',
                            'allowed_permit' => 0,
                            'name' => 'Permit Unload',
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => 'View Permit',
                        'action_url' => '',
                    ];
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Unload';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to unload Created';
                    $cmh->save();
                    if($request->principle_contractor == 1)
                    {
                        // $pojectdata=Project::select('name','no')->find($request->project_id);
                        $url = route('pc.permit.unload.approved',Crypt::encrypt($permitload->id));
                        $msg= Auth::user()->name .' has renewed a permit to unload.';
                        Mail::to($request->pc_twc_email)->send(new PermitUnloadMail($request->name1 , $url , $msg ));
                        
                    }else{
                       
                        Notification::route('mail', $request->twc_email)->notify(new PermitNotification($notify_admins_msg));
                    }
                }else{
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Unload (Draft)';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to unload saved as Draft';
                    $cmh->save();
                }
                DB::commit();
                toastSuccess('Permit Unloaded sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception->getMessage(), $exception->getLine()); 
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    public function permit_unload_update(Request $request)
    {
        DB::beginTransaction();
        Validations::updatepermitunload($request);
        $permitload = PermitLoad::with('signatures')->find($request->permitid);
        $permit_load_orig = PermitLoad::where('permit_no', $permitload->permit_no)->first();
        try {
            $all_inputs  = $request->except('_token','unload_images', 'twc_email', 'designer_company_email', 'companyid', 'signtype1', 'signtype', 'signed','pdfsigntype','pdfphoto','signed1', 'projno', 'projname', 'date', 'permitid', 'images', 'namesign1', 'namesign', 'design_requirement_text', 'approavalEmailReq', 'approval_PC', 'company1','companyid1', 'pdfsigntype1', 'date1', 'date2','drawing','drawing_option','custom_drawing','design_upload', 'name3', 'job_title3', 'company3', 'companyid3', 'signed3', 'namesign3', 'name4', 'job_title4', 'company4', 'companyid4', 'signed4', 'namesign4', 'name5', 'job_title5', 'company5', 'companyid5', 'signed5', 'namesign5','date3','date4', 'date5','action', 'permitdata_status','draft_status');
            $all_inputs['created_by'] = auth()->user()->id;
            $all_inputs['custom_drawing'] = '';
            $all_inputs['design_upload'] = '';
            if($request->design_upload){
                $designUpload = implode(', ', $request->design_upload);
                $all_inputs['design_upload'] = $designUpload;
            }

            if($request->action == 'draft'){
                $all_inputs['draft_status'] = '1';
            } else{
                $all_inputs['draft_status'] = '0';
            }   
        //first person signature and name
        $image_name1 = '';
        if ($request->principle_contractor == 1) {
            if(!$permitload->signature){

                
                if ($request->signtype1 == 1) {
                    $all_inputs['signature1'] = $request->namesign1;
                    $all_inputs['name1'] = $request->name1;
                    $all_inputs['job_title1'] = $request->job_title1;
                    $all_inputs['company1'] = $request->company1; //this should be company1
                } else {

                    $folderPath = public_path('temporary/signature/');
                    $image = explode(";base64,", $request->signed1);
                    $image_type = explode("image/", $image[0]);
                    $image_type_png = $image_type[1];
                    $image_base64 = base64_decode($image[1]);
                    $image_name1 = uniqid() . '.' . $image_type_png;
                    $file = $folderPath . $image_name1;
                    @unlink($folderPath . $permitload->signature1);
                    file_put_contents($file, $image_base64);
                    $all_inputs['signature1'] = $image_name1;
                    $all_inputs['name1'] = $request->name1;
                    $all_inputs['job_title1'] = $request->job_title1;
                    $all_inputs['company1'] = $request->company1; //this should be company1
                }
            } else {
                $all_inputs['name1'] = $request->name1;
                $all_inputs['job_title1'] = $request->job_title1;
                $image_name1 = $permitload->signature1;
                $all_inputs['signature1'] = $image_name1; 
            }
        } 

        //second person signature and name
        $image_name = '';
        if(!$permitload->signature){

            if ($request->signtype == 1) {
                $all_inputs['signature'] = $request->namesign;
                $all_inputs['name1'] = $request->name;
                $all_inputs['job_title1'] = $request->job_title;
                $all_inputs['company'] = $request->company; 
            } else {
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name;
                @unlink($folderPath . $permitload->signature);
                file_put_contents($file, $image_base64);
                $all_inputs['signature'] = $image_name;
                $all_inputs['name1'] = $request->name;
                $all_inputs['job_title1'] = $request->job_title;
                $all_inputs['company'] = $request->company; 
            }
        } else{
            $all_inputs['name'] = $request->name;
            $all_inputs['job_title'] = $request->job_title;
            $image_name = $permitload->signature;
            $all_inputs['signature'] = $image_name; 
        }

        //third person signature and name
        $image_name3 = '';
        if(!isset($permitload->signatures[0]) && empty($permitload->signatures[0]->signature)){
        // if(!$permitload->signatures[0]->name){
            if ($request->signtype3 == 1) {
                $signature3 = $request->namesign3;
            } elseif($request->name3) {
                $name3 = $request->name3;
                $job_title3 = $request->job_title3;
                $company3 = $request->company3;
                $date3 = $request->date3;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed3);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name3 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name3;
                file_put_contents($file, $image_base64);
                $signature3 = $image_name3; 
            } 
        } else{
            $name3 = $permitload->signatures[0]->name;
            $job_title3 = $permitload->signatures[0]->job_title;
            $company3 = $permitload->signatures[0]->company;
            $date3 = $permitload->signatures[0]->date;
            $image_name3 = $permitload->signatures[0]->signature;
            $signature3 = $image_name3; 
        }
        // dd("yyyy");
        
        // $signature_exist = $permitload->signatures[0] ?? null;
        // if(!empty($signature_exist)){
        //     if(empty($permitload->signatures[0]->signature)){
        //         if ($request->signtype3 == 1) {
        //             $signature3 = $request->namesign3;
        //         } elseif($request->name3) {
        //             $name3 = $request->name3;
        //             $job_title3 = $request->job_title3;
        //             $company3 = $request->company3;
        //             $date3 = $request->date3;
        //             $folderPath = public_path('temporary/signature/');
        //             $image = explode(";base64,", $request->signed3);
        //             $image_type = explode("image/", $image[0]);
        //             $image_type_png = $image_type[1];
        //             $image_base64 = base64_decode($image[1]);
        //             $image_name3 = uniqid() . '.' . $image_type_png;
        //             $file = $folderPath . $image_name3;
        //             file_put_contents($file, $image_base64);
        //             $signature3 = $image_name3; 
        //         } 
        //     } else{
        //         $name3 = $permitload->signatures[0]->name;
        //         $job_title3 = $permitload->signatures[0]->job_title;
        //         $company3 = $permitload->signatures[0]->company;
        //         $date3 = $permitload->signatures[0]->date;
        //         $image_name3 = $permitload->signatures[0]->signature;
        //         $signature3 = $image_name3; 
        //     }
        // }
        //fourth person signature and name
        $image_name4 = '';
        if(!isset($permitload->signatures[1]) && empty($permitload->signatures[1]->signature)){
        // if(!$permitload->signatures[0]->name){
            if ($request->signtype4 == 1) {
                $signature4 = $request->namesign4;
            } elseif($request->name4) { 
                $name4 = $request->name4;
                $job_title4 = $request->job_title4;
                $company4 = $request->company4;
                $date4 = $request->date4;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed4);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name4 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name4;
                file_put_contents($file, $image_base64);
                $signature4 = $image_name4; 
            }
        } else{
            $name4 = $permitload->signatures[1]->name;
            $job_title4 = $permitload->signatures[1]->job_title;
            $company4 = $permitload->signatures[1]->company;
            $date4 = $permitload->signatures[1]->date;
            $image_name4 = $permitload->signatures[1]->signature;
            $signature4 = $image_name4; 
        }

        //fifth person signature and name
        $image_name5 = '';
        if(!isset($permitload->signatures[2]) && empty($permitload->signatures[2]->signature)){
        // if(!$permitload->signatures[0]->name){
            if ($request->signtype5 == 1) {
                $signature4 = $request->namesign5;
            } elseif($request->name5) { 
                $name5 = $request->name5;
                $job_title5 = $request->job_title5;
                $company5 = $request->company5;
                $date5 = $request->date5;
                $folderPath = public_path('temporary/signature/');
                $image = explode(";base64,", $request->signed5);
                $image_type = explode("image/", $image[0]);
                $image_type_png = $image_type[1];
                $image_base64 = base64_decode($image[1]);
                $image_name5 = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name5;
                file_put_contents($file, $image_base64);
                $signature5 = $image_name5; 
            }
        } else{
            $name5 = $permitload->signatures[2]->name;
            $job_title5 = $permitload->signatures[2]->job_title;
            $company5 = $permitload->signatures[2]->company;
            $date5 = $permitload->signatures[2]->date;
            $image_name5 = $permitload->signatures[2]->signature;
            $signature5 = $image_name5; 
        }

        $all_inputs['created_by'] = auth()->user()->id;
        if (!isset($request->approval)) {
            $all_inputs['status'] = 1;
        }
        if($request->action == 'draft'){
            $all_inputs['draft_status'] = '1';
        } else{
            $all_inputs['draft_status'] = '0';
        }
        $permitload->signatures()->delete();
        // dd($all_inputs);
        if($request->draft_status != "1"){ //if pc twc is not 1 (yes) then it should status otherwise status should remain as it is
            $all_inputs['status'] = $request->principle_contractor == 1 ? 6 : 3;
        }
        $all_inputs['mix_design_detail'] = $request->mix_design_detail;
        $all_inputs['unique_ref_no'] = $request->unique_ref_no;
        $all_inputs['age_cube'] = $request->age_cube;
        $all_inputs['compressive_strength'] = $request->compressive_strength;
        $all_inputs['method_curing'] = $request->method_curing;
        $all_inputs['twc_control_pts'] = $request->twc_control_pts;
        $all_inputs['back_propping'] = $request->back_propping;
        $all_inputs['comments'] = $request->comments;
        $all_inputs['location_temp_work'] = $request->location_temp_work;
        $all_inputs['description_structure'] = $request->description_structure;
        $all_inputs['ms_ra_no'] = $request->ms_ra_no;

        $all_inputs['created_by'] = auth()->user()->id;
        $permitload->update($all_inputs);

        if($request->name3)
        {
            $signature3_record = new Signature([
                'name' => $name3,
                'job_title' => $job_title3,
                'company' => $company3,
                'date' => $date3,
                'signatureable_type' => get_class($permitload),  
                'signature' => $signature3, 
                'signatureable_id' => $permitload->id             
            ]);

            $permitload->signatures()->save($signature3_record);
        }
        
        if($request->name4)
        {
            $signature4_record = new Signature([
                'name' => $name4,
                'job_title' => $job_title4,
                'company' => $company4,
                'date' => $date4,
                'signatureable_type' => get_class($permitload),  
                'signature' => $signature4, 
                'signatureable_id' => $permitload->id             
            ]);

            $permitload->signatures()->save($signature4_record);
        }

        if($request->name5)
        {
            $signature5_record = new Signature([
                'name' => $name5,
                'job_title' => $job_title5,
                'company' => $company5,
                'date' => $date5,
                'signatureable_type' => get_class($permitload),  
                'signature' => $signature5, 
                'signatureable_id' => $permitload->id             
            ]);

            $permitload->signatures()->save($signature5_record);
        }

            if($request->principle_contractor==null){$request->principle_contractor=0;}
            $data['principle_contractor'] = $request->approval_PC;
            if ($permitload) {
                //make status 0 if permit is 
                // $request->principle_contractor == 1 ? PermitLoad::where( 'id' , $request->permitid)->update(['status' => 1]) :  PermitLoad::where( 'id' , $request->permitid)->update(['status' => 4]);

                if($request->action != 'draft' && $request->principle_contractor != 1){ //added this check because, if unloaded permit is saved as draft then it shouldnot update value of main open permit, open permit should remain open
                $request->principle_contractor == 1 ? PermitLoad::where( 'id' , $permit_load_orig->id)->update(['status' => 7]) :  PermitLoad::where( 'id' , $permit_load_orig)->update(['status' => 4]);
                // $request->principle_contractor == 1 ? PermitLoad::where( 'id' , $request->permitid)->update(['status' => 7]) :  PermitLoad::where( 'id' , $request->permitid)->update(['status' => 4]); //this code was in permit unload save function. we were passing permitid in request, but now in permit unload update function we are passing id of draft permit, whereas we need to update id of open permit.
                }else if($request->action != 'draft' && $request->principle_contractor == 1){

                }else{
                    //    PermitLoad::where( 'id' , $request->permitid)->update(['status' => 9]);
                    PermitLoad::where( 'id' , $request->permitid)->update(['status' => 3]); 
                }
                //upload permit unload files
                // dd("here" , $request->permitid , $permitload->id);
                $image_links = $this->permitfiles($request, $permitload->id);
                $request->merge(['name' => $request->name1 , 'job_title' => $request->job_title1]);
                // dd($image_name,$image_name1,$image_name3);
                $pdf = PDF::loadView('layouts.pdf.permit_unload', ['data' => $request->all(), 'image_links' => $image_links, 'image_name' => $image_name, 'image_name1' => $image_name1, 'principle_contractor' => $request->approval_PC, 'date1'=>$request->date1, 'date2'=>$request->date2, 'image_name3' => $image_name3, 'image_name4' => $image_name4, 'image_name5' => $image_name5, 'company1' => $request->company1, 'company3' => $request->company3, 'company4' => $request->company4, 'company5' => $request->company5, 'date1'=>$request->date1, 'date3'=>$request->date3, 'date4'=>$request->date4, 'date5'=>$request->date5, 'old_permit_images' => $permitload->permitLoadImages]);
                $path = public_path('pdf');
                $filename = rand() . '.pdf';
                $model = PermitLoad::find($permitload->id);
                $model->ped_url = $filename;
                $model->save();
                $pdf->save($path . '/' . $filename);
                DB::commit();
                if($request->action != 'draft'){
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Unload';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to unload Created';
                    $cmh->save();

                    $notify_admins_msg = [
                        'greeting' => 'Permit Unload Pdf',
                        'subject' => $request->projname . '-' . $request->projno,
                        'body' => [
                            'text' => ''.Auth::user()->name.' has issued a permit to offload.',
                            'id' => $permitload->id,
                            'filename' => $filename,
                            'links' =>  '',
                            'allowed_permit' => 0,
                            'name' => 'Permit Unload',
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => 'View Permit',
                        'action_url' => '',
                    ];
                    
                    if($request->principle_contractor == 1)
                    {
                        // $pojectdata=Project::select('name','no')->find($request->project_id);
                        $url = route('pc.permit.unload.approved',Crypt::encrypt($permitload->id));
                        $msg= Auth::user()->name .' has renewed a permit to unload.';
                        Mail::to($request->pc_twc_email)->send(new PermitUnloadMail($request->name1 , $url , $msg ));
                        
                    }else{
                        Notification::route('mail', $request->twc_email)->notify(new PermitNotification($notify_admins_msg));
                    }
                }else{
                    $cmh= new ChangeEmailHistory();
                    $cmh->email=$request->twc_email;
                    $cmh->type ='Permit to Unload (Draft)';
                    $cmh->status =2;
                    $cmh->foreign_idd=$request->temporary_work_id;
                    $cmh->message='Permit to unload saved as Draft';
                    $cmh->save();
                }
                DB::commit();
                toastSuccess('Permit Unloaded Updated sucessfully!');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception->getMessage(), $exception->getLine()); 
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
                    'action_text' => 'View Permit',
                    'action_url' => '',
                ];

                //send email to coordinator
                $coordinatoremail = User::select('email')->whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'user');
                    }
                )->where('company_id', $request->companyid)->first();
                $cmh= new ChangeEmailHistory();
                $cmh->email=$request->twc_email;
                $cmh->type ='Scafolding Permit';
                $cmh->status =2;
                $cmh->foreign_idd=$request->temporary_work_id;
                $cmh->message='Scafolding Permit Created';
                $cmh->save();
                Notification::route('mail', $coordinatoremail->email ?? '')->notify(new PermitNotification($notify_admins_msg));

                Notification::route('mail', $request->twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
                # Notification::route('mail', $request->designer_company_email)->notify(new PermitNotification($notify_admins_msg));
                toastSuccess('Scaffolding Created Successfully');
                return redirect()->route('temporary_works.index');
            }
        } catch (\Exception $exception) { dd($exception->getMessage());
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
        $assignedBlocks = [];
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());
                }
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $nominations=[];
                $users=[];
            } elseif ($user->hasRole('company')) {
                
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());
                }
                $projects = Project::with('company')->where('company_id', $user->id)->get();
                $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                    $q->whereIn('id', $ids);
                })->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());
                }
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                $nominations=[];
                $users=[];
                if($user->hasRole('user'))
                {
                    $users = User::select(['id','appointment_pdf','name'])->where('company_id', $user->userCompany->id)->get();
                    $ids = [];
                    foreach ($users as $u) {
                        $ids[] = $u->id;
                    }
                     $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
                }
                //coordinator query
                // $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'permits', 'scaffold')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->where('created_by', $user->id)->latest()->paginate(20);
            }
             $scantempwork = '';
            //work for datatable
            return view('dashboard.temporary_works.index', compact('users','nominations','temporary_works', 'projects','scantempwork','assignedBlocks'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //temp work search according to projects
    public function tempwork_project_search(Request $request)
    {
        $user = auth()->user();
        $tot_emails = [];
        $assignedBlocks = [];
        $block = '';
        if(isset($_GET['block']))
        {
            $block = $_GET['block'];
        }
        if(auth::user()->hasRole('estimator'))
        {
            return redirect('Estimator/estimator');
        }
        if(Auth::user()->hasRole(['designer','supplier','Design Checker','Designer and Design Checker']) && !auth::user()->company_id)
        {
            return redirect('designer/designer');
        }
        $user = User::with('userCompany')->find(Auth::user()->id);
        $status=[0,1,2,3];
        if(isset($_GET['status']))
        {
            if($_GET['status']=="pending")
            {
                $status=[1];
            }
            if($_GET['status']=="completed")
            {
                $status=[3];
            }
        }
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('project_id', $request->projects)->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());
                    $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                }
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $tot_emails = [];
                $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                
                $nominations=[];
                $users=[];
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('project_id', $request->projects)->whereIn('created_by', $ids)->whereIn('status',$status)->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());
                    $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                }
                $tot_emails = [];
                $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                // $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                //     $q->whereIn('project_id', $ids);
                // })->whereIn('status',$status)->where(['estimator'=>0])->latest()->paginate(20);
                $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('project_id', $request->projects)->whereIn('status',$status)->latest()->paginate(20);
                foreach ($temporary_works as $temporary_work) {
                    $permit_loads = PermitLoad::where('temporary_work_id', $temporary_work->id)
                        ->pluck('block_id')
                        ->toArray();

                    $blocks = ProjectBlock::whereIn('id', $permit_loads)->get();
                    $assignedBlocks = array_merge($assignedBlocks, $blocks->toArray());
                    $tot_emails[] = TempWorkUploadFiles::where(['temporary_work_id' => $temporary_work->id, 'file_type'=>4])->count();
                }
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                $nominations=[];
                $users=[];
                if($user->hasRole('user'))
                {
                    $users = User::select(['id','name'])->where('company_id', $user->userCompany->id)->get();
                    $ids = [];
                    foreach ($users as $u) {
                        $ids[] = $u->id;
                    }
                     $nominations=Nomination::with('user')->whereIn('user_id',$ids)->get();
                }

            }
            $scantempwork = '';
            //work for datatable
            return view('dashboard.temporary_works.index', compact('users','nominations','temporary_works','projects','scantempwork','assignedBlocks', 'tot_emails'));
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
            // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new TempAttachmentNotifications($data));
            // toastSuccess('Attachments sent successfully!');
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
            $pojectdata=Project::select('name','no')->find($permitdata->project_id);
            PermitLoad::find($permitid)->update(['status' => 0]);
            $notify_admins_msg = [
                    'greeting' => 'Permit to Closed',
                    'subject' => 'TWP– Permit to Load Closure - '.$pojectdata->name . '-' . $pojectdata->no,
                    'body' => [
                        'text' => ''.Auth::user()->name.' has closed a permit to load. You can view details in the Temporary Works Portal.',
                        'filename' => $permitdata->ped_url,
                        'links' =>  '',
                        'pc_twc' => '',
                        'id' => $permitdata->id,
                        'name' => 'Permit-close',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => 'View Closed Permit',
                    'action_url' => '',
                ];
            // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new PermitNotification($notify_admins_msg));
            Notification::route('mail', $request->twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
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
                'text' => 'Welcome to the Temporary Works Portal. your permit to load for (description of TWS top part) has expired. If the structure is still in use, please renew the permit to load. If the structure has been removed , not in use and not supporting any other element, please close permit.',
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
                'text' => 'Welcome to the online Temporary Works Portal. your permit to load for (description of TWS top part) has expired. If the structure is still in use, please renew the permit to load. If the structure has been removed , not in use and not supporting any other element, please close permit.',
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

    //cron job for design brief desing remainings 3 days or 7 days
    public function cron_design()
    {

        $current =  \Carbon\Carbon::now();
        $notify_msg = [
            'greeting' => 'Design Upload notificaton',
            'subject' => 'Design Upload Expire Notification',
            'body' => [
                'text' => 'Welcome to the online Temporary Works Portal. there is #days days  left for the design to be completed with construction issue as well as the design check certificate.',
                'filename' => '',
                'links' =>  '',
                'name' => '',
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];
        //get all design breifs who have not submiteed ye design
        $temp_design_data=TemporaryWork::whereDoesntHave('checkdesignuploadfile', function ($q) {
                $q->where('file_type',1);
             })->where('status',1)->chunk(50, function ($tempwork) use ($notify_msg,$current) {
            foreach ($tempwork as $temp) {
                $notify_msg['body']['filename'] = $temp->ped_url;
                
                //check date difference
                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $temp->design_required_by_date);
                $diff_in_days = $to->diffInDays($current);
                if($diff_in_days >= 3 && $diff_in_days <= 3)
                {
                     $notify_msg['body']['text'] = str_replace("#days",'3', $notify_msg['body']['text']);
                     Notification::route('mail',$temp->twc_email)->notify(new PermitNotification($notify_msg,'tempwork'));
                     Notification::route('mail',$temp->designer_company_email)->notify(new PermitNotification($notify_msg,'tempwork'));
                }

                if($diff_in_days > 5 && $diff_in_days < 8)
                {
                    $notify_msg['body']['text'] = str_replace("#days",'7', $notify_msg['body']['text']);
                    Notification::route('mail',$temp->twc_email)->notify(new PermitNotification($notify_msg,'tempwork'));
                    Notification::route('mail',$temp->designer_company_email)->notify(new PermitNotification($notify_msg,'tempwork'));
                }
                
               
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
        // echo"<pre>";print_r($data);exit;
        $list='';
        if(count($data)>0)
        {
            $list.='<table class="table"><thead><tr><th>#NO</th><th>File</th><th>Date</th></tr></thead><tbody>';
            foreach($data as $key => $dt)
            {
                $key++;
                $list.='<tr><td style="text-align:center;">'.$key.'</td><td style="text-align:center"><a href='. $path . $dt->image .' target="_blank">'.$dt->image.'</a></td><td style="text-align:center"> ' . $dt->created_at .'</td></tr>';
            }
            $list.='</tbody></table>';
            
        }
        
        echo $list;exit;
    }

    //temp work completed
    public function temp_completed(Request $request)
    {
        try {
         $id=\Crypt::decrypt($request->id);
         $tempwork=TemporaryWork::find($id)->update(['status'=>$request->status]);
         return response()->json(['message' => 'Completd'], 201); 
         } catch (\Exception $exception) {
            return response()->json(['message' => 'Something Went Wrong!'], 500); 
         }
    }

    public function deleteDrawingFile(Request $request)
    {
        if($request->type == 'concrete'){
            $permit_load = PermitLoad::find($request->permit_id);
            $permit_load->file_minimum_concrete = null;
            $permit_load->save();
            return response()->json(['message' => 'File deleted successfully']);
        } else{

            $filename = $request->input('filename');
            $filePath = public_path($filename);
            if ($request->permit_id) {
                $permit_load = PermitLoad::find($request->permit_id);
                $images = explode(',', $permit_load->design_upload);
            
                // Check if $filename exists in $images array
                $key = array_search($filename, $images);
            
                if ($key !== false) {
                    // Remove $filename from $images array
                    unset($images[$key]);
            
                    // Update the database column with the modified $images array
                    $permit_load->design_upload = implode(',', $images);
                    $permit_load->save();
                }   
            }     
            // Check if the file exists
            if (file_exists($filePath)) {
                // Delete the file
                unlink($filePath);
    
                // You can also delete the file from the database if necessary
                // Example: YourFileModel::where('filename', $filename)->delete();
                
                return response()->json(['message' => 'File deleted successfully']);
            }
        }

        return response()->json(['message' => 'File not found'], 404);
    }

    public function getReportsData(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $type = $request->type;
        $assignedBlocks = [];
        $block = '';

        if(auth::user()->hasRole('estimator'))
        {
            return redirect('Estimator/estimator');
        }
        if(Auth::user()->hasRole(['designer','supplier','Design Checker','Designer and Design Checker']) && !auth::user()->company_id)
        {
            return redirect('designer/designer');
        }

        $user = User::with('userCompany')->find(Auth::user()->id);
        $status=[0,1,2,3];
        try {
            if ($user->hasRole('admin')) {
                // $temporary_works = TemporaryWork::with('pdfFilesDesignBrief', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','riskassesment')->whereIn('status',$status)->where(['estimator'=>0]) ->where(function ($query) use ($start_date, $end_date) {
                //     $query->where('created_at', '>=', $start_date)
                //           ->where('created_at', '<=', $end_date);
                // })->latest()->get();

                $query = TemporaryWork::with('pdfFilesDesignBrief', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign', 'unloadpermits', 'closedpermits', 'riskassesment')
                ->whereIn('status', $status)
                ->where(['estimator' => 0])
                ->latest();
                if ($start_date !== null) {
                    $query->where('created_at', '>=', $start_date);
                }
            
                if ($end_date !== null) {
                    $query->where('created_at', '<=', $end_date);
                }            
    
                $temporary_works = $query->get();
                // dd($temporary_works);

            } elseif ($user->hasRole('company')) {
                $users = User::select(['id','name'])->where('company_id', $user->id)->get();
                $ids = [];
                $tot_emails = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                // $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->whereIn('status',$status)->where(['estimator'=>0])->where(function ($query) use ($start_date, $end_date) {
                //     $query->where('created_at', '>=', $start_date)
                //           ->where('created_at', '<=', $end_date);
                // })->latest()->get();   
                $query = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->whereIn('status',$status)->where(['estimator'=>0])->latest();

                if ($start_date !== null) {
                    $query->where('created_at', '>=', $start_date);
                }
            
                if ($end_date !== null) {
                    $query->where('created_at', '<=', $end_date);
                }            
    

                $temporary_works = $query->get();

            } else {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                $tot_emails = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                // $temporary_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                //     $q->whereIn('project_id', $ids);
                // })->whereIn('status',$status)->where(['estimator'=>0])->where(function ($query) use ($start_date, $end_date) {
                //     $query->where('created_at', '>=', $start_date)
                //           ->where('created_at', '<=', $end_date);
                // })->latest()->get();

                $query = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
                    $q->whereIn('project_id', $ids);
                })->whereIn('status',$status)->where(['estimator'=>0])->latest();

                if ($start_date !== null) {
                    $query->where('created_at', '>=', $start_date);
                }
            
                if ($end_date !== null) {
                    $query->where('created_at', '<=', $end_date);
                }            
    

                $temporary_works = $query->get();
            }
            
            //permit to load
            // $permited = PermitLoad::where('status','!=',3)->where('status','!=',6)->where(function ($query) use ($start_date, $end_date) {
            //     $query->where('created_at', '>=', $start_date)
            //           ->where('created_at', '<=', $end_date);
            // })->latest()->get();
            $permit_query = PermitLoad::where('status','!=',3)->where('status','!=',6)->latest();
            if ($start_date !== null) {
                $permit_query->where('created_at', '>=', $start_date);
            }
        
            if ($end_date !== null) {
                $permit_query->where('created_at', '<=', $end_date);
            }            

            $permited = $permit_query->get();
            
            //permit to unload
            // $permit_unload = PermitLoad::where('status','!=',4)->where('status','!=',0)->where('status','!=',7)->where(function ($query) use ($start_date, $end_date) {
            //     $query->where('created_at', '>=', $start_date)
            //           ->where('created_at', '<=', $end_date);
            // })->latest()->get();

            $permit_unload_query = PermitLoad::where('status','!=',4)->where('status','!=',0)->where('status','!=',7)->latest();
            if ($start_date !== null) {
                $permit_unload_query->where('created_at', '>=', $start_date);
            }
        
            if ($end_date !== null) {
                $permit_unload_query->where('created_at', '<=', $end_date);
            }  
            $permit_unload = $permit_unload_query->get();
            
            return view('dashboard.temporary_works.report', compact('temporary_works','permited','permit_unload'));
        } catch (\Exception $exception) {
            dd($exception->getMessage(), $exception->getLine());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function exportCsv(Request $request)
    {
        try {
            // Define the CSV file name
            $fileName = 'exported_data.csv';

            // Generate the CSV file
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );
            $path = public_path('test.csv');
            $handle = fopen($path, 'w');

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $filter_type = $request->type;
            if($filter_type == 'all' || $filter_type == 'design_brief')
            {
                if(auth::user()->hasRole('estimator'))
                {
                    return redirect('Estimator/estimator');
                }
                if(Auth::user()->hasRole(['designer','supplier','Design Checker','Designer and Design Checker']) && !auth::user()->company_id)
                {
                    return redirect('designer/designer');
                }

                $user = User::with('userCompany')->find(Auth::user()->id);
                $status=[0,1,2,3];
                
                if ($user->hasRole('admin')) {

                    $query = TemporaryWork::with('pdfFilesDesignBrief', 'project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign', 'unloadpermits', 'closedpermits', 'riskassesment')
                    ->whereIn('status', $status)
                    ->where(['estimator' => 0])
                    ->latest();
                    if ($start_date !== null) {
                        $query->where('created_at', '>=', $start_date);
                    }
                
                    if ($end_date !== null) {
                        $query->where('created_at', '<=', $end_date);
                    }            

                    $temporary_works = $query->get();
                    // dd($temporary_works);

                } elseif ($user->hasRole('company')) {
                    $users = User::select(['id','name'])->where('company_id', $user->id)->get();
                    $ids = [];
                    $tot_emails = [];
                    foreach ($users as $u) {
                        $ids[] = $u->id;
                    }
                    $ids[] = $user->id; 
                    $query = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereIn('created_by', $ids)->whereIn('status',$status)->where(['estimator'=>0])->latest();

                    if ($start_date !== null) {
                        $query->where('created_at', '>=', $start_date);
                    }
                
                    if ($end_date !== null) {
                        $query->where('created_at', '<=', $end_date);
                    }            


                    $temporary_works = $query->get();

                } else {
                    $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                    $ids = [];
                    $tot_emails = [];
                    foreach ($project_idds as $id) {
                        $ids[] = $id->project_id;
                    }

                    $query = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits','designbrief_history')->whereHas('project', function ($q) use ($ids) {
                        $q->whereIn('project_id', $ids);
                    })->whereIn('status',$status)->where(['estimator'=>0])->latest();

                    if ($start_date !== null) {
                        $query->where('created_at', '>=', $start_date);
                    }
                
                    if ($end_date !== null) {
                        $query->where('created_at', '<=', $end_date);
                    }            


                    $temporary_works = $query->get();
                }
                //design brief file export


                // Add CSV headers
                fputcsv($handle, [
                    'Design Brief'
                ]);

                // Add data rows
                foreach ($temporary_works as $item) {
                    
                    if(isset($item->designbrief_history))
                    {
                        $design_brief_files = [];
                        foreach($item->designbrief_history as $pdf_file)
                        {
                            $design_brief_files[] = asset('pdf'.'/'.$pdf_file->pdf_name);
                        }
                        $design_brief_files = implode(', ', $design_brief_files);
                    }
                    else 
                    {
                        $design_brief_files = [];
                    }
                    $value = explode('-', $item->design_requirement_text);
                    fputcsv($handle, [
                        $item->created_at,
                        $item->twc_id_no,
                        $item->design_issued_date,
                        $value[1],
                        $design_brief_files,
                    ]);
                }
            }
            
            //permitload query
            if($filter_type == 'all' || $filter_type == 'permit_load'){
                $permit_query = PermitLoad::where('status','!=',3)->where('status','!=',6)->latest();
                if ($start_date !== null) {
                    $permit_query->where('created_at', '>=', $start_date);
                }
            
                if ($end_date !== null) {
                    $permit_query->where('created_at', '<=', $end_date);
                }            

                $permited = $permit_query->get();

                // Add CSV headers
                fputcsv($handle, [
                    'Permit Load'
                ]);

                // Add data rows
                $current =  \Carbon\Carbon::now();
                foreach ($permited as $permit) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                                                $diff_in_days = $to->diffInDays($current);
                                                $color = '';
                                                $status = '';
                                                $days = (7 - $diff_in_days);
                    if ($permit->draft_status == '1') {
                        $status = "Draft";
                    }elseif ($permit->status == '1') {
                        $status = "Open";
                    } elseif ($permit->status == 0 ) {
                        $status = "Closed";
                    } elseif($permit->status == 4)
                    {
                        $status = "Unloaded";
                    } elseif ($permit->status == 3) {
                        $status = "Unloaded";
                    } elseif ($permit->status == 2) {
                        $status = "Pending";
                    } elseif ($permit->status == 5) {
                        $status = "<span class='permit-rejected  cursor-pointer btn btn-danger ' style='font-size: 13px;width: 70px;border-radius:8px; height: 20px;line-height: 0px;' data-id='" . \Crypt::encrypt($permit->id) . "'>DNL</span>";
                    }elseif ($permit->status == 6) {
                        $status = "Pending";
                    }elseif ($permit->status == 7) {
                        $status = "Pending";
                    }
                    elseif ($permit->status == 9) {
                        $status = "Open";
                    }
                    $permit_pdf =asset('pdf'.'/'.$permit->ped_url) ;
                    fputcsv($handle, [
                        $permit->created_at,
                        $permit->tempwork->design_requirement_text,
                        $permit->permit_no,
                        $days.' days',
                        $permit->location_temp_work,
                        $status,
                        $permit_pdf,
                    ]);
                }
            }
                
            //permit unload query
            if($filter_type == 'all' || $filter_type == 'permit_unload'){

                $permit_unload_query = PermitLoad::where('status','!=',4)->where('status','!=',0)->where('status','!=',7)->latest();
                if ($start_date !== null) {
                    $permit_unload_query->where('created_at', '>=', $start_date);
                }
            
                if ($end_date !== null) {
                    $permit_unload_query->where('created_at', '<=', $end_date);
                }  
                $permit_unload = $permit_unload_query->get();

                // Add CSV headers
                fputcsv($handle, [
                    'Permit to Unload'
                ]);

                // Add data rows
                $current =  \Carbon\Carbon::now();
                foreach ($permit_unload as $permit) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                                                $diff_in_days = $to->diffInDays($current);
                                                $color = '';
                                                $status = '';
                                                $days = (7 - $diff_in_days);
                    if (($permit->draft_status == '1')) {
                        if($permit->status == 3 || $permit->status == 6){
                            $unload_permit = true;
                        } else{
                            $unload_permit = false;
                        }
                    } else{
                        if($permit->status == 3 || $permit->status == 6 || $permit->status == 1){
                            $unload_permit = true;
                        } else{
                            $unload_permit = false;
                        }
                    }
                    if($unload_permit == false){
                        continue;
                    }  
                    if ($permit->draft_status == '1') {
                        $status = "Draft";
                    }elseif ($permit->status == '1') {
                        $status = "Open";
                    } elseif ($permit->status == 0 ) {
                        $status = "Closed";
                    } elseif($permit->status == 4)
                    {
                        $status = "Unloaded";
                    } elseif ($permit->status == 3) {
                        $status = "Unloaded";
                    } elseif ($permit->status == 2) {
                        $status = "Pending";
                    } elseif ($permit->status == 5) {
                        $status = "Rejected";
                    }elseif ($permit->status == 6) {
                        $status = "Pending";
                    }elseif ($permit->status == 7) {
                        $status = "Pending";
                    }
                    $permit_pdf = $permit_pdf =asset('pdf'.'/'.$permit->ped_url) ;
                    fputcsv($handle, [
                        $permit->created_at,
                        $permit->tempwork->design_requirement_text,
                        $permit->permit_no,
                        $days.' days',
                        $permit->location_temp_work,
                        $status,
                        $permit_pdf,
                        
                    ]);
                }

            }
                fclose($handle);

            // Create the headers for the response.
            $headers = [
                'Content-Type' => 'text/csv',
            ];
            // Return a Laravel response that initiates the download of the generated CSV file.
            return response()->download($path, 'test.csv', $headers);
        } catch (\Exception $exception) {
            dd($exception->getMessage(), $exception->getLine());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
        
    }
    //insert communication
    public function insert_communication(Request $request)
    {
        try {
            $chm= new ChangeEmailHistory();
            $chm->email=Auth::user()->email;
            $chm->type ='Drawing Viewed';
            $chm->foreign_idd=$request->tempwork_id;
            $chm->message='Drawing number ' . $request->drawing_no . ' has been viewed';
            $chm->status = 2;
            // $chm->user_type = 'checker';
            $chm->save();
            return response()->json(['message' => 'Communication inserted'], 200); 
         } catch (\Exception $exception) {
            return response()->json(['message' => 'Something Went Wrong!'], 500); 
         }
    }
}
