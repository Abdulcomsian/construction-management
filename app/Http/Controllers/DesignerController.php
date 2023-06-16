<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryWork;
use App\Models\PermitLoad;
use App\Models\TempWorkUploadFiles;
use App\Models\TemporaryWorkComment;
use App\Models\PermitComments;
use App\Utils\HelperFunctions;
use App\Models\User;
use App\Models\TemporaryWorkRejected;
use App\Models\ShareDrawing;
use App\Models\DrawingComment;
use App\Models\ChangeEmailHistory;
use App\Models\ScopeOfDesign;
use App\Models\Folder;
use App\Models\AttachSpeComment;
use App\Models\{Project,DesignerQuotation,EstimatorDesignerList,AdditionalInformation, JobAssign};
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DesignUpload;
use App\Notifications\PermitNotification;
use App\Notifications\ShareDrawingNotification;
use App\Notifications\DrawingCommentNotification;
use App\Notifications\EstimatorNotification;
use App\Notifications\EstimationClientNotification;
use App\Notifications\EstimationPriceRejectedNotification;
// use App\Notifications\TemporaryWorkNotification;
use App\Utils\Validations;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Facades\DB;
use App\Notifications\{DesignerAwarded,TemporaryWorkNotification};
use Illuminate\Support\Str;
use PDF;


class DesignerController extends Controller
{

    public function testDesigner() {

            $awarded=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>1])->pluck('temporary_work_id');
            $AwardedEstimators=TemporaryWork::with('project.company')->whereIn('id',$awarded)->orWhere('created_by', Auth::user()->id)->get();
            return view('dashboard.designer.awarded-estimator',compact('AwardedEstimators'));
    }

    //here we will make desinger user curd operation 
    public function desginerView()
    {
        // dd("here now");
        try
        {
            $record=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>0])->pluck('temporary_work_id');
            $awarded=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>1])->pluck('temporary_work_id');
            $estimatorWork=TemporaryWork::with('designer')->with('project.company')->whereIn('id',$record)->get();
            
            $AwardedEstimators=TemporaryWork::with('designer.quotationSum')->with('project.company')->whereIn('id',$awarded)->get();
            // dd($AwardedEstimators);
             return view('dashboard.designer.designer_supplier_view',compact('estimatorWork','AwardedEstimators'));
            
         }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
    }

    //Project Assign
    public function projectAssign(){
        $data['designers'] = User::role(['designer', 'Design Checker', 'Designer and Design Checker'])->where('di_designer_id', auth()->user()->id)->get();
        $awarded=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>1])->pluck('temporary_work_id');
        $data['AwardedEstimators']=TemporaryWork::with('designer.quotationSum')->with('project.company')->whereIn('id',$awarded)->get();
        return view('projectAssign',$data);
    }


    public function storeProjectAssign(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $temporary_work = TemporaryWork::findorfail($id);
            if ($request->designer) {
                $designer = User::findOrFail($request->designer);
                $job_assign = new EstimatorDesignerList();
                $job_assign->temporary_work_id = $id;
                $job_assign->user_id = $designer->id;
                $job_assign->type = 'designer';
                $job_assign->start_date = $request->designer_start_date;
                $job_assign->end_date = $request->designer_end_date;
                $job_assign->email = $designer->email;
                $job_assign->estimatorApprove = 1;
                $code=random_int(100000, 999999);
                $job_assign->code = $code;
                if ($job_assign->save()) {
                    //send mail to admin
                $notify_admins_msg = [
                    'greeting' => 'Temporary Work Pdf',
                    'subject' => 'TWP – Design Brief Review -'.$temporary_work->projname . '-' .$temporary_work->projno,
                    'body' => [
                        'company' => $temporary_work->company,
                        'filename' => $temporary_work->ped_url,
                        'links' => '',
                        'name' => $temporary_work->ped_url,
                        'designer' => '123',
                        'pc_twc' => '',

                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                    Notification::route('mail', $designer->email)->notify(new TemporaryWorkNotification($notify_admins_msg, $id, $designer->email, $is_check = true));

                    // Notification::route('mail', $designer->email)->notify(new DesignerAwarded($id, $designer->email, $code));
                }
            }

            if ($request->checker) {
                $checker = User::findOrFail($request->checker);
                $job_assign = new EstimatorDesignerList();
                $job_assign->temporary_work_id = $id;
                $job_assign->user_id = $checker->id;
                $job_assign->type = 'checker';
                $job_assign->start_date = $request->checker_start_date;
                $job_assign->end_date = $request->checker_end_date;
                $job_assign->email = $checker->email;
                $job_assign->estimatorApprove = 1;
                $code=random_int(100000, 999999);
                $job_assign->code = $code;
                if ($job_assign->save()) {
                    //send mail to admin
                    $notify_admins_msg = [
                        'greeting' => 'Temporary Work Pdf',
                        'subject' => 'TWP – Design Brief Review -'.$temporary_work->projname . '-' .$request->projno,
                        'body' => [
                            'company' => $temporary_work->company,
                            'filename' => $temporary_work->ped_url,
                            'links' => '',
                            'name' =>  'this is new job assigned',
                            'designer' => '123',
                            'pc_twc' => '',

                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => '',
                        'action_url' => '',
                    ];
                    // Notification::route('mail', $list)->notify(new EstimationClientNotification($notify_msg, $temporary_work->id, $list,$informationRequired,$additionalInformation,$mainFile,'Designer'));
                    Notification::route('mail', $checker->email)->notify(new TemporaryWorkNotification($notify_admins_msg, $id, $checker->email, $is_check = true));
                }
            }
            $temporary_work = TemporaryWork::find($id);
            $temporary_work->designer_company_email	= $designer->email;
            $temporary_work->desinger_email_2	= $checker->email;
            $temporary_work->save();
            DB::commit();

            toastSuccess('Project assigned successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception->getMessage());
            toastError($exception->getMessage());
            return redirect()->back();
        }
    }


    //list designer
    public function List(Request $request)
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin', 'company']), 403);
        try {
            if ($request->ajax()) {
                if ($user->hasRole('admin')) {
                    $data = User::role(['designer'])->latest()->get();
                } elseif ($user->hasRole('company')) {
                    $data = User::role(['designer'])->with('usernomination')->where('company_id', auth()->user()->id)->get();
                }
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->addColumn('company', function ($data) {
                        return $data->userCompany->name;
                    })
                    ->addColumn('action', function ($data) use ($user) {
                         $btn ='';
                        if ($user->hasRole(['admin','company'])) {
                            $btn .= '<div class="d-flex">
                                <a href="' . route('designer.edit', $data->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                </a>
                                <form method="POST" action="' . route('designer.destroy', $data->id) . '"  id="form_' . $data->id . '" >
                                    ' . method_field('Delete') . csrf_field() . '

                                    <button type="submit" id="' . $data->id . '" class="confirm1 btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                        <!--end::Svg Icon-->
                                    </button>
                                </form></div>
                                ';
                        }
                        return $btn;
                     })
                    ->rawColumns(['action'])
                    ->make(true);
            }

             return view('dashboard.designer.list');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
       
    }
    //create form 
    public function Create()
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin','company']), 403);
        try {
            $companies = User::role('company')->latest()->get();
            return view('dashboard.designer.create', compact('companies'));
        } catch (\Exception $exception) {
        }

    }
    //save designer
    public function Save(Request $request)
    {
        Validations::storeDesigner($request);
        try {
            $userprojectdata=[];
            $all_inputs = $request->except('_token', 'role','description_of_role','Description_limits_authority','authority_issue_permit');
            $nomination_status=0;
            if($request->nomination==1)
            {
                $all_inputs['nomination']=1;
            }
            $all_inputs['password'] = Hash::make($request->password);
            $all_inputs['email_verified_at'] = now();
            $user = User::create($all_inputs);
            $user->project= $all_inputs['projects'][0];
            //Assigned role to user. role is already created during seeder
            $user->assignRole($request->role);
            //Add projects for user
            $user->userProjects()->syncWithPivotValues($all_inputs['projects'],['nomination'=>$request->nomination,'description_of_role' => $request->description_of_role,'Description_limits_authority'=>$request->Description_limits_authority,'authority_issue_permit'=>$request->authority_issue_permit]);
            

            if($user->userCompany->nomination==1 && $request->nomination==1)
            {
                $model= new NominationComment();
                $model->email=Auth::user()->email;
                $model->comment="Admin/Company send nomination form to ".$user->email."";
                $model->type="Nomination";
                $model->send_date=date('Y-m-d H:i:s');
                $model->user_id=$user->id;
                $model->save();
                Notification::route('mail',$user->email ?? '')->notify(new Nominations($user));
            }

            //password reset link send to designer 
            $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
            DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
            Notification::route('mail', $request->email)->notify(new PasswordResetNotification($token,$request->email));
            toastSuccess('User successfully added!');
            return redirect()->route('designer.list');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    //edit designer
    public function Edit($id)
    {
       try {
            $user = User::role(['designer'])
                ->with(['userProjects', 'userCompany'])
                ->where('id', $id)
                ->first();
            $company_projects = $user->userCompany->companyProjects ?? [];
            $user_projects = $user->userProjects->pluck('id')->toarray();
            $companies = User::role('company')->latest()->get();
            return view('dashboard.designer.edit', compact('user_projects', 'user', 'companies', 'company_projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return back();
        }
    }

    //update designer
    public function Update(Request $request, User $user)
    {
        Validations::updateDesigner($request, $user->id);
        try {
            $all_inputs = $request->except('_token', '_method');
            if($request->nomination==1)
            {
                $all_inputs['nomination']=1;
                 Notification::route('mail',$user->email ?? '')->notify(new Nominations($user));
            }
            else
            {
                $all_inputs['nomination']=0;
            }
            $user->update([
                'name' => $all_inputs['name'],
                'email' => $all_inputs['email'],
                'company_id' => $all_inputs['company_id'],
                'nomination'=> $all_inputs['nomination'],
            ]);
            $user->syncRoles($request->role);
            toastSuccess('Profile Updated Successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something Went Wrong!');
            return Redirect::back();
        }
    }

    //destroy
    public function Destroy(User $user)
    {
         try {
            $user->delete();
            toastSuccess('Designer deleted successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }





    // opern routes work here work for supplier and esigner page where he can upload designe and files
    //=============================End=============================================================
    public function index($id)
    {
        if(!isset($_GET['mail']))
        {
            abort(403);
        }
        $mail=$_GET['mail'];
        
        $id = \Crypt::decrypt($id);
        $tempdata=TemporaryWork::select('designer_company_name', 'designer_company_email', 'desinger_company_name2', 'desinger_email_2')->find($id);
        if($mail==$tempdata->designer_company_email)
        {
            ChangeEmailHistory::where(['foreign_idd'=>$id,'type'=>'Designer Company'])->orderBy('id','desc')->update(['status'=>1]);
        }
        if($mail==$tempdata->desinger_email_2)
        {
            ChangeEmailHistory::where(['foreign_idd'=>$id,'type'=>'Designer Checker'])->orderBy('id','desc')->update(['status'=>1]);
        }
        
        $DesignerUploads = TempWorkUploadFiles::where(['file_type' => 1, 'temporary_work_id' => $id,'created_by'=>$mail])->orderBy('id','desc')->get();
        $Designerchecks = TempWorkUploadFiles::where(['file_type' => 2, 'temporary_work_id' => $id,'created_by'=>$mail])->get();
        $riskassessment = TempWorkUploadFiles::where(['temporary_work_id' => $id,'created_by'=>$mail])->whereIn('file_type',[5,6])->get();
        $twd_name = TemporaryWork::select('twc_name')->where('id', $id)->first();
        $comments=TemporaryWorkComment::where(['temporary_work_id'=> $id])->whereIn('type', ['normal', 'twctodesigner'])->get();
        return view('dashboard.designer.index', compact('DesignerUploads', 'id', 'twd_name','Designerchecks','mail','comments','riskassessment','tempdata'));
        
    }
    public function store(Request $request)
    {  
         try { 
            $tempworkdata = TemporaryWork::with('project:name,no,id')->find($request->tempworkid);
            if(isset($request->twd_name)){
                $tempworkdata->tw_name=$request->twd_name;
            }
            $tempworkdata->save();
            $createdby = User::find($tempworkdata->created_by);
            $filePath = HelperFunctions::temporaryworkuploadPath();
            $model = new TempWorkUploadFiles(); 
            
             if(isset($request->designermail))
            {
                $model->created_by = $request->designermail;
            }else if(isset($request->mail)){
                $model->created_by = $request->mail;
            }
            else{
                $model->created_by =Auth::user()->email;
            }
            if($request->mail == $tempworkdata->desinger_email_2){
                $model->comments = 1;
            }else if($request->mail == $tempworkdata->designer_company_email){
                $model->comments = 2;
            }
            $model->twd_name = $request->checkeremail;

            if (isset($request->designcheckfile)) {
                $file = $request->file('designcheckfile');
                $ext = $request->file('designcheckfile')->extension();
                $proj_name = $tempworkdata->project->name ?? '';
                $proj_no = $tempworkdata->project->no ?? '';
                $subject = 'TWP– Design Check Certificate Uploaded - '. $proj_name . '-' . $proj_no;
                $text = $model->created_by.' has uploaded a design check certificate to the Temporary Works Portal.';
                $file_type = 2;
                 $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                 $model->file_name = $imagename;
            } else {
                $file_type = 1;
                if($request->file('file'))
                {
                    $file = $request->file('file');
                    $imagename = HelperFunctions::saveFile(null, $file[0], $filePath);
                    $model->file_name = $imagename;
                }
                $proj_name = $tempworkdata->project->name ?? '';
                $proj_no = $tempworkdata->project->no ?? '';
                $subject = 'TWP – Design/Drawing Uploaded-' . $proj_name . '-' . $proj_no;
                $text =$model->created_by .' has uploaded a new drawing to the Temporary Works Portal.';
                $model->comments = $request->comments;
                $model->twd_name = $request->twd_name;
                $model->drawing_title = $request->drawing_title;
                if(isset($request->status))
                {
                    if($request->status==1)
                    {
                        
                        $model->preliminary_approval = 1;
                        $model->construction = 2;
                        $model->drawing_number = $request->drawing_number.'-P'.$request->drawing_postfix_no;
                    }
                    else{
                        $model->preliminary_approval = 2;
                        $model->construction = 1;
                        $model->drawing_number = $request->drawing_number.'-C'.$request->drawing_postfix_no;
                    }
                }
                else{
                    $model->preliminary_approval = $request->preliminary_approval;
                    $model->construction = $request->construction;
                }
                
                
               
            }
            
            
            $model->file_type = $file_type;
            $model->temporary_work_id = $tempworkdata->id;
            if ($model->save()) {
                //
                $chm= new ChangeEmailHistory();
                $chm->email=$tempworkdata->twc_email;
                $chm->type ='Design Upload';
                $chm->foreign_idd=$tempworkdata->id;
                $chm->message='Designer Uploaded Design';
                $chm->status = 2;
                $chm->save();
                $selectedEmails = $request->input('emails');
                if(!$selectedEmails){
                    $notify_admins_msg = [
                        'greeting' => 'Designer Upload Document',
                        'subject' => $subject,
                        'body' => [
                            'text' => $text,
                            'company'=>$tempworkdata->company,
                            // 'filename' => '29625684.pdf',
                            'filename' => $tempworkdata->ped_url,
                            'links' =>  '',
                            'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                            'ext' => '',
                            'filetype'=>$file_type,
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => '',
                        'action_url' => '',
                    ];
                    Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));
                } else{
                    foreach ($selectedEmails as $email) {
                        $notify_admins_msg['greeting'] = 'Designer Upload Document';
                        $notify_admins_msg['subject'] = $subject;
                        $notify_admins_msg['body']['text'] = $text;
                        $notify_admins_msg['body']['company'] = $tempworkdata->company;
                        $notify_admins_msg['body']['filename'] = $tempworkdata->ped_url;
                        $notify_admins_msg['body']['name'] = $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                        $notify_admins_msg['body']['filetype'] = $file_type;
                    
                        Notification::route('mail', $email)->notify(new DesignUpload($notify_admins_msg));
                    }
                }
                
                    
                // Notification::route('mail',  $createdby->email ?? '')->notify(new DesignUpload($notify_admins_msg));
                toastSuccess('Designer Uploaded Successfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function get_desings(Request $request)
    {
        $tempworkid = $request->tempworkid;
    
        $designearray=[];
        $ramsno=TemporaryWork::select('rams_no','designer_company_email','desinger_email_2','project_id')->find($tempworkid);
        // dd($ramsno);
        $designearray[0]=$ramsno->designer_company_email;
        if($ramsno->desinger_email_2)
        {
        $designearray[1]=$ramsno->desinger_email_2;
        }
        $list='';
        $path = config('app.url');
        
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('company') || auth()->user()->hasRole('user')) {
               
               if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('company') )
               {
                $company=Project::find($ramsno->project_id);
                $coordinators = User::role('user')->select('email')->where('company_id',$company->company_id)->get();
                $registerupload= TempWorkUploadFiles::with('comment')->where(function ($query) use($coordinators){
                       $query->whereIn('created_by',$coordinators)
                       ->orWhere('created_by',auth()->user()->email);
                      })->where(['file_type'=>1,'temporary_work_id' => $tempworkid])->orderBy('id','desc')->get();
               }
               else{
                $registerupload= TempWorkUploadFiles::with('comment')->where(function ($query){
                       $query->where(['created_by'=>auth()->user()->email])
                       ->orWhere('created_by','hani.thaher@gmail.com');
                       })->where(['file_type'=>1,'temporary_work_id' => $tempworkid])->orderBy('id','desc')->get();
               }
               
               if($registerupload)
                {
                    $list.="<h3>TWC Uploaded</h3>";            
                    $list .= '<table class="table " style="border-radius: 8px; overflow: hidden;"><thead style="background: #07D564"><tr>';
                    $list .= '<th style="color: white !important;">No</th>';
                    $list .= '<th style="color: white !important;">Drawing No</th>';
                    $list .= '<th style="color: white !important;">Comments</th>';
                    $list .= '<th style="color: white !important;">Designer Name</th><th style="color: white !important;">Drawing Title</th><th style="color: white !important;">Preliminary / For approval</th><th style="color: white !important;">For Construction Drawing</th><th style="color: white !important;">Action</th>';
                    $list .= '</tr></thead><tbody>';
                     $i = 1;
                     $background='';
                     $userList = []; 
                            
                     $checksamenodesign='';
                    foreach ($registerupload as $uploads) {
                        $papproval = 'No';
                        $construction = 'No';
                        $dno=explode('-',$uploads->drawing_number);
                        $drawinglastno=$dno[sizeof($dno)-1];
                        $sliced = array_slice($dno, 0, -1);
                        $string = implode("-", $sliced);

                        $remove_p_c =  ltrim(ltrim($drawinglastno, 'P') , 'C');
                        $fullString=$string.$remove_p_c;
                        if(!in_array($fullString,$userList))
                        {
                            $userList[] = $fullString;

                            $background = $uploads->preliminary_approval==1 ? '#FAFF0099' : '#3A7DFF38'; 
                        
                        }else{
                            $background = "";
                        }
                        if ($uploads->preliminary_approval == 1) {
                            
                            $papproval = 'Yes';
                        } elseif ($uploads->construction == 1) {
                            $construction = 'Yes';
                        }

                        $list .= '<tr class="clickable-row cursor-pointer" data-href="' . $path . $uploads->file_name . '" style="background:' . $background . '">';
                        $list .= '<td>' . $i . '</td>';
                        $list .= '<td>' . $uploads->drawing_number . '</td>';
                        $list .= '<td>' . $uploads->comments . '</td>';
                        $list .= '<td>' . $uploads->twd_name . '</td>';
                        $list .= '<td>' . $uploads->drawing_title . '</td>';
                        $list .= '<td>' . $papproval . '</td>';
                        $list .= '<td>' . $construction . '</td>';
                        if ($construction == 'Yes') {
                            $list .= '<td style="display:flex">
                                 <a class="btn btn-primary btn-small" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" title="Share Design Brief" data-email="'.$ramsno->desinger_email_2.'" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt" ></i></button>&nbsp;
                                 <button class="btn btn-danger btn-small drawingreply" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                                 <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                    <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                    <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                     <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                    <button style="font-size:8px" type="button" class="btn btn-primary btn-small openpermitform" id="' . $uploads->id . '">Open Permit</button>
                                </form>
                                </td>';
                        } else {
                            $list .= '<td style="display:flex">
                                 <a class="btn btn-primary btn-small" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" title="Share Design Brief"  data-email="'.$ramsno->desinger_email_2.'" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>
                                 &nbsp;
                                 <button class="btn btn-danger btn-small drawingreply" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                                 <form method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                    <input type="hidden" name="rams_no" value'.$ramsno->rams_no.'/>
                                    <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                    <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                     <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                   
                                </form>
                                </td>';
                        }
                        $list .= '</tr>';
                        if(count($uploads->comment)>0)
                        {
                            $j=1;

                            foreach($uploads->comment as $comment)
                            {
                                 $reply='';
                                 $replydate='';
                                if(isset($comment->drawing_reply[0]))
                                {
                                    $reply=$comment->drawing_reply[0];
                                }
                                if(isset($comment->reply_date[0]))
                                {
                                    $replydate=date("d-m-Y H:i", strtotime($comment->reply_date[0]));
                                }
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
                                $list .='<tr>';
                                $list .='<td>'.$i.'-'.$j.'</td>';
                                $list .='<td>Comment/Reply</td>';
                                $list .='<td colspan="5" style="max-width:30px;overflow-x:scroll;">'.$comment->sender_email.'<br><b>'.$comment->drawing_comment.'</b><br>'.date('d-m-Y H:i',strtotime($comment->created_at)).'</td>';
                                $list .='<td colspan="5">'.$comment->reply_email.'<br><b>'.$reply.'</b><br>'.$image.'<br>'.$replydate.'</td>';
                                $list .='</tr>';
                                $j++;

                            }
                            
                        }
                        $i++;
                    }
                    $list .= '</tbody></table>';
                }
        }

        
        for($j=0;$j<count($designearray);$j++)
        {
            $DesignerUploads = TempWorkUploadFiles::with('comment')->where(['temporary_work_id' => $tempworkid, 'file_type' => 1,'created_by'=>$designearray[$j]])->orderBy('id','desc')->get();            
            $i = 1;
            if($DesignerUploads)
            {
                if($j==0)
                {
                    $list.="<h3>Designer Company</h3>";
                }
                else{
                     $list.="<h3>Designer checker Company</h3>";
                }
                
                $list .= '<table class="table table-hover"><thead><tr>';
                $list .= '<table class="table" style="border-radius: 8px; overflow: hidden;"><thead><tr style="background: #07D564">';
                $list .= '<th style="color: white !important;">No</th>';
                $list .= '<th style="color: white !important;">Drawing No</th>';
                $list .= '<th style="color: white !important;">Comments</th>';
                $list .= '<th style="color: white !important;">Designer Name</th><th style="color: white !important;">Drawing Title</th><th style="color: white !important;">Preliminary / For approval</th><th style="color: white !important;">For Construction Drawing</th><th style="color: white !important;">Action</th>';
                    $list .= '</tr></thead><tbody>';
                $list .= '</tr></thead><tbody>';
                $background='';
                
                $userList=[];
                foreach ($DesignerUploads as $uploads) {
                    $papproval = 'No';
                    $construction = 'No';
                     $dno=explode('-',$uploads->drawing_number);
                        $drawinglastno=$dno[sizeof($dno)-1];
                        $sliced = array_slice($dno, 0, -1);
                        $string = implode("-", $sliced);

                        $remove_p_c =  ltrim(ltrim($drawinglastno, 'P') , 'C');
                        $fullString=$string.$remove_p_c;
                        if(!in_array($fullString,$userList))
                        {
                            $userList[] = $fullString;

                            $background = $uploads->preliminary_approval==1 ? '#FAFF0099' : '#3A7DFF38'; 
                        
                        }else{
                            $background = "";
                        }
                        if ($uploads->preliminary_approval == 1) {
                            
                            $papproval = 'Yes';
                        } elseif ($uploads->construction == 1) {
                            $construction = 'Yes';
                        }

                    $list .= '<tr class="clickable-row cursor-pointer" data-href="' . $path . $uploads->file_name . '" style="background:' . $background . '">';
                    $list .= '<td style="text-align: center; vertical-align: middle;">' . $i . '</td>';
                    $list .= '<td style="text-align: center; vertical-align: middle;">' . $uploads->drawing_number . '</td>';
                    $list .= '<td style="text-align: center; vertical-align: middle;">' . $uploads->comments . '</td>';
                    $list .= '<td style="text-align: center; vertical-align: middle;">' . $uploads->twd_name . '</td>';
                    $list .= '<td style="text-align: center; vertical-align: middle;">' . $uploads->drawing_title . '</td>';
                    $list .= '<td style="text-align: center; vertical-align: middle;">' . $papproval . '</td>';
                    $list .= '<td style="text-align: center; vertical-align: middle;">' . $construction . '</td>';
                    if ($construction == 'Yes') {
                        $list .= '<td style="display:flex">
                             <a style="padding: 10px; background: #F9F9F9;margin: 5px;" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn drawingshare" style="padding: 10px; background: #F9F9F9;margin: 5px;" title="Share Design Brief"  data-email="'.$ramsno->desinger_email_2.'" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>&nbsp;
                             <button class="drawingreply" style="padding: 10px !important; border: none; background: #F9F9F9;margin: 5px;" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                             <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                 <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                <button style="font-size:8px; padding: 10px; background: #F9F9F9;margin: 5px;"" type="button" class="btn  openpermitform"  id="' . $uploads->id . '">Open Permit</button>
                            </form>
                            </td>';
                    } else {
                        $list .= '<td style="display:flex">
                             <a style="padding: 10px; background: #F9F9F9;margin: 5px;" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn  drawingshare" style="padding: 10px; background: #F9F9F9;margin: 5px;" title="Share Design Brief"  data-email="'.$ramsno->desinger_email_2.'" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>&nbsp;
                             <button class="drawingreply" style="padding: 10px; background: #F9F9F9;margin: 5px; border: none;" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                             <form method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                <input type="hidden" name="rams_no" value'.$ramsno->rams_no.'/>
                                <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                 <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                               
                            </form>
                            </td>';
                    }
                    $list .= '</tr>';
                    if(count($uploads->comment)>0)
                    {
                        $k=1;

                        foreach($uploads->comment as $comment)
                        {
                             $reply='';
                             $replydate='';
                            if(isset($comment->drawing_reply[0]))
                            {
                                $reply=$comment->drawing_reply[0];
                            }
                            if(isset($comment->reply_date[0]))
                            {
                                $replydate=date("d-m-Y H:i", strtotime($comment->reply_date[0]));
                            }
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
                            $list .='<tr background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), rgba(7, 213, 100, 0.5);>';
                            $list .='<td style="text-align: center; ">'.$i.'-'.$k.'</td>';
                            $list .='<td style="text-align: center; font-weight: bold;">Comment/Reply:</td>';
                            $list .='<td colspan="5" style="max-width:30px;overflow-x:scroll;">'.$comment->sender_email.'<br><b>'.$comment->drawing_comment.'</b><br>'.date('d-m-Y H:i',strtotime($comment->created_at)).'</td>';
                            $list .='<td colspan="5">'.$comment->reply_email.'<br><b>'.$reply.'</b><br>'.$image.'<br>'.$replydate.'</td>';
                            $list .='</tr>';
                            $k++;

                        }
                        
                    }
                    $i++;
                }
                $list .= '</tbody></table>';
            }
        }
        
        echo $list;
    }

//duplicated get_desings for fetching twd names
    public function get_designersinfo(Request $request)
    {
        $tempworkid = $request->tempworkid;
        $designearray=[];
        $ramsno=TemporaryWork::select('rams_no','designer_company_email','desinger_email_2','project_id')->find($tempworkid);
        // dd($ramsno);
        $designearray[0]=$ramsno->designer_company_email;
    
        if($ramsno->desinger_email_2)
        {
        $designearray[1]=$ramsno->desinger_email_2;
        }
        $list='';
        $path = config('app.url');
        
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('company') || auth()->user()->hasRole('user')) {
               
              
              
                $registerupload= TempWorkUploadFiles::with('comment')->where(function ($query){
                       $query->where(['created_by'=>auth()->user()->email])
                       ->orWhere('created_by','hani.thaher@gmail.com');
                       })->where(['file_type'=>1,'temporary_work_id' => $tempworkid])->orderBy('id','desc')->get();
              
               
            //    if($registerupload)
            //     {
            //         $list.="<h3>TWC Uploaded</h3>";            
            //         $list .= '<table class="table " style="border-radius: 8px; overflow: hidden;"><thead style="background: #07D564"><tr>';
                    
            //         $list .= '<th style="color: white !important;">Designer Name</th>';
            //         $list .= '</tr></thead><tbody>';
            //          $i = 1;
            //          $background='';
            //          $userList = []; 
                            
            //          $checksamenodesign='';
            //         foreach ($registerupload as $uploads) {
            //             $papproval = 'No';
            //             $construction = 'No';
            //             $dno=explode('-',$uploads->drawing_number);
            //             $drawinglastno=$dno[sizeof($dno)-1];
            //             $sliced = array_slice($dno, 0, -1);
            //             $string = implode("-", $sliced);

            //             $remove_p_c =  ltrim(ltrim($drawinglastno, 'P') , 'C');
            //             $fullString=$string.$remove_p_c;
            //             if(!in_array($fullString,$userList))
            //             {
            //                 $userList[] = $fullString;

            //                 $background = $uploads->preliminary_approval==1 ? '#FAFF0099' : '#3A7DFF38'; 
                        
            //             }else{
            //                 $background = "";
            //             }
            //             if ($uploads->preliminary_approval == 1) {
                            
            //                 $papproval = 'Yes';
            //             } elseif ($uploads->construction == 1) {
            //                 $construction = 'Yes';
            //             }

            //             $list .= '<tr class="clickable-row cursor-pointer" data-href="' . $path . $uploads->file_name . '" style="background:' . $background . '">';
                        
            //             $list .= '<td>' . $uploads->twd_name . '</td>';
                        
            //             $list .= '</tr>';
                      
            //             $i++;
            //         }
            //         $list .= '</tbody></table>';
            //     }
        }

        
        // for($j=0;$j<count($designearray);$j++)
        // {
        //     $DesignerUploads = TempWorkUploadFiles::with('comment')->where(['temporary_work_id' => $tempworkid, 'file_type' => 1, 'created_by'=>$designearray[$j]])->orderBy('id','desc')->get();  
        //     // dd($DesignerUploads);          
        //     $i = 1;
        //     if($DesignerUploads)
        //     {
        //         if($j==0)
        //         {
        //             $list.="<h3>Designer Company</h3>";
        //         }
        //         else{
        //              $list.="<h3 style='margin-top:15px;'>Designer checker Company</h3>";
        //         }
                
        //         $list .= '<table class="table table-hover"><thead><tr>';
        //         $list .= '<table class="table" style="border-radius: 8px; overflow: hidden;"><thead><tr style="background: #07D564">';
               
        //         $list .= '<th style="color: white !important;">Designer Name</th>';
        //         $list .= '<th style="color: white !important;">Design Checker Name</th>';
        //         $list .= '</tr></thead><tbody>';
        //         $list .= '</tr></thead><tbody>';
        //         $background='';
                
        //         $userList=[];
        //         foreach ($DesignerUploads as $uploads) {
                  

        //             $list .= '<tr class=""  style="background:' . $background . '">';
        //             // if($uploads->file_type==1){
        //             //     $list .= '<td style="text-align: left; vertical-align: middle;">' . $uploads->twd_name . '</td>';
        //             // }else{
        //             //     $list .= '<td style="text-align: left; vertical-align: middle;"></td>';
        //             // }
        //             // if($uploads->file_type==2){
        //             //     $list .= '<td style="text-align: left; vertical-align: middle;">' . $uploads->twd_name . '</td>';
        //             // }else{
        //             //     $list .= '<td style="text-align: left; vertical-align: middle;"></td>';
        //             // }
        //             $list .= '<td style="text-align: left; vertical-align: middle;">' . $uploads->twd_name . '</td>';
        //             $list .= '<td style="text-align: left; vertical-align: middle;"></td>';
        //             $list .= '</tr>';
        //             // if(count($uploads->comment)>0)
        //             // {
        //             //     $k=1;

        //             //     foreach($uploads->comment as $comment)
        //             //     {
        //             //          $reply='';
        //             //          $replydate='';
        //             //         if(isset($comment->drawing_reply[0]))
        //             //         {
        //             //             $reply=$comment->drawing_reply[0];
        //             //         }
        //             //         if(isset($comment->reply_date[0]))
        //             //         {
        //             //             $replydate=date("d-m-Y H:i", strtotime($comment->reply_date[0]));
        //             //         }
        //             //          $image = '';
        //             //             if (isset($comment->reply_image[0])) {
        //             //                 $n = strrpos($comment->reply_image[0], '.');
        //             //                 $ext = substr($comment->reply_image[0], $n + 1);
        //             //                 if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
        //             //                     $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '"><img src="' . $path . $comment->reply_image[0] . '" width="50px" height="50px"/></a>';
        //             //                 } else {
        //             //                     $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '">View File</a>';
        //             //                 }
        //             //             }
        //             //         $list .='<tr background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), rgba(7, 213, 100, 0.5);>';
        //             //         $list .='<td style="text-align: center; ">'.$i.'-'.$k.'</td>';
        //             //         $list .='<td style="text-align: center; font-weight: bold;">Comment/Reply:</td>';
        //             //         $list .='<td colspan="5" style="max-width:30px;overflow-x:scroll;">'.$comment->sender_email.'<br><b>'.$comment->drawing_comment.'</b><br>'.date('d-m-Y H:i',strtotime($comment->created_at)).'</td>';
        //             //         $list .='<td colspan="5">'.$comment->reply_email.'<br><b>'.$reply.'</b><br>'.$image.'<br>'.$replydate.'</td>';
        //             //         $list .='</tr>';
        //             //         $k++;

        //             //     }
                        
        //             // }
        //             $i++;
        //         }
        //         $list .= '</tbody></table>';
        //     }
        // }

            $DesignerUploads = TempWorkUploadFiles::with('comment')->where(['temporary_work_id' => $tempworkid, 'file_type' => 1, 'created_by'=>$designearray[0]])->orderBy('id','desc')->get();  
            // dd($DesignerUploads);          
            $i = 1;
            if($DesignerUploads)
            {
               
                    $list.="<h3>Designer Company</h3>";
                
                
                $list .= '<table class="table table-hover"><thead><tr>';
                $list .= '<table class="table" style="border-radius: 8px; overflow: hidden;"><thead><tr style="background: #07D564">';
               
                $list .= '<th style="color: white !important;">Designer Name</th>';
                $list .= '</tr></thead><tbody>';
                $list .= '</tr></thead><tbody>';
                $background='';
                
                $userList=[];
                foreach ($DesignerUploads as $uploads) {
                  

                    $list .= '<tr class=""  style="background:' . $background . '">';
                   
                    $list .= '<td style="text-align: left; vertical-align: middle;">' . $uploads->twd_name . '</td>';
                    $list .= '<td style="text-align: left; vertical-align: middle;"></td>';
                    $list .= '</tr>';
                
                }
                $list .= '</tbody></table>';
            }
            //Design checker for designer company
            $DesignerUploads = TempWorkUploadFiles::with('comment')->where(['temporary_work_id' => $tempworkid, 'file_type' => 2, 'created_by'=>$designearray[0], 'comments'=>2])->orderBy('id','desc')->get();  
            // dd($DesignerUploads);          
            $i = 1;
            if($DesignerUploads)
            {
               
            
                
                $list .= '<table class="table table-hover"><thead><tr>';
                $list .= '<table class="table" style="border-radius: 8px; overflow: hidden;"><thead><tr style="background: #07D564">';
               
                $list .= '<th style="color: white !important;">Design Checker Name</th>';
                $list .= '</tr></thead><tbody>';
                $list .= '</tr></thead><tbody>';
                $background='';
                
                $userList=[];
                foreach ($DesignerUploads as $uploads) {
                    $list .= '<tr class=""  style="background:' . $background . '">';
                   
                    $list .= '<td style="text-align: left; vertical-align: middle;">' . $uploads->twd_name . '</td>';
                    $list .= '<td style="text-align: left; vertical-align: middle;"></td>';
                    $list .= '</tr>';
                
                }
                $list .= '</tbody></table>';
            }
        if(count($designearray)>1){
            //designer for Design checker company
            $DesignerUploads = TempWorkUploadFiles::with('comment')->where(['temporary_work_id' => $tempworkid, 'file_type' => 1, 'created_by'=>$designearray[1]])->orderBy('id','desc')->get();  
            // dd($DesignerUploads);          
            $i = 1;
            if($DesignerUploads)
            {
                    $list.="<h3 style='margin-top:20px;'>Design Checker Company</h3>";
                $list .= '<table class="table table-hover"><thead><tr>';
                $list .= '<table class="table" style="border-radius: 8px; overflow: hidden;"><thead><tr style="background: #07D564">';
               
                $list .= '<th style="color: white !important;">Designer Name</th>';
                $list .= '</tr></thead><tbody>';
                $list .= '</tr></thead><tbody>';
                $background='';
                
                $userList=[];
                foreach ($DesignerUploads as $uploads) {
                    $list .= '<tr class=""  style="background:' . $background . '">';
                    $list .= '<td style="text-align: left; vertical-align: middle;">' . $uploads->twd_name . '</td>';
                    $list .= '<td style="text-align: left; vertical-align: middle;"></td>';
                    $list .= '</tr>';
                    
                }
                $list .= '</tbody></table>';
            }

              //Design checker for Design checker company
              $DesignerUploads = TempWorkUploadFiles::with('comment')->where(['temporary_work_id' => $tempworkid, 'file_type' => 2, 'created_by'=>$designearray[1], 'comments'=>1])->orderBy('id','desc')->get();  
              // dd($DesignerUploads);          
              $i = 1;
              if($DesignerUploads)
              {
                  $list .= '<table class="table table-hover"><thead><tr>';
                  $list .= '<table class="table" style="border-radius: 8px; overflow: hidden;"><thead><tr style="background: #07D564">';
                 
                  $list .= '<th style="color: white !important;">Design Checker Name</th>';
                  $list .= '</tr></thead><tbody>';
                  $list .= '</tr></thead><tbody>';
                  $background='';
                  
                  $userList=[];
                  foreach ($DesignerUploads as $uploads) {
                      $list .= '<tr class=""  style="background:' . $background . '">';
                      $list .= '<td style="text-align: left; vertical-align: middle;">' . $uploads->twd_name . '</td>';
                      $list .= '<td style="text-align: left; vertical-align: middle;"></td>';
                      $list .= '</tr>';
                      
                  }
                  $list .= '</tbody></table>';
              }
        }
        echo $list;
    }

    //PC TWC EMAIL WORK HERE
    public function pc_index($id)
    {
        $id = \Crypt::decrypt($id);
        ChangeEmailHistory::where(['foreign_idd'=>$id,'type'=>'Design Brief'])->orderBy('id','desc')->limit(1)->update(['status'=>1]);
        $tempworkdetail = TemporaryWork::find($id);
        $comments=TemporaryWorkComment::where(['temporary_work_id'=>$id,'type'=>'pc'])->get();
        $rejectedcomments=TemporaryWorkRejected::where(['temporary_work_id'=>$id])->get();
        //dd($rejectedcomments);
        return view('dashboard.designer.pc_index', compact('tempworkdetail','comments','rejectedcomments'));
    }

    //approved or reject
    public function pc_store(Request $request)
    {
        try {
            $tempworkdata = TemporaryWork::with('project')->find($request->tempworkid);
            $createdby = User::find($tempworkdata->created_by);
            TemporaryWork::find($request->tempworkid)->update([
                'status' => $request->status,
            ]);
            if ($request->status == 2) {
                $model = new TemporaryWorkComment();
                $model->comment = $request->comments;
                $model->temporary_work_id = $request->tempworkid;
                $model->type = 'pc';
                if ($model->save()) {
                    $rejectedmodel= TemporaryWorkRejected::where('temporary_work_id',$request->tempworkid)->orderBy('id','desc')->limit(1)->first();

                    $rejectedmodel->temporary_work_id=$request->tempworkid;
                    $rejectedmodel->comment=$request->comments;
                    $rejectedmodel->rejected_by=$tempworkdata->pc_twc_email;
                    $rejectedmodel->pdf_url=$tempworkdata->ped_url;
                    $rejectedmodel->updated_at=date('Y-m-d H:i:s');
                    $rejectedmodel->save();
                    //
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->twc_email;
                    $chm->type ='Design Brief Rejected';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Design Breif Rejected by Pc Twc';
                    $chm->status=2;
                    $chm->save();

                    $subject = 'TWP – Design Brief Rejected - ' . $tempworkdata->project->name . '-' . $tempworkdata->project->no;
                    $text = ' The Principal Contractors Temporary Coordinator has rejected your design. Please follow the link below to amend your submission: ';
                    $notify_admins_msg = [
                        'greeting' => 'Design Brief Rejected',
                        'subject' => $subject,
                        'body' => [
                            'text' => $text,
                            'filename' => $tempworkdata->ped_url,
                            'links' =>  '',
                            'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                            'ext' => '',
                            'comments'=>$request->comments,
                            'type'=>'desingbrief',
                            'company'=>$tempworkdata->company,
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => '',
                        'action_url' => '',
                    ];
                    // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new DesignUpload($notify_admins_msg));
                    Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));

                    toastSuccess('Design Brief Rejected Successfully!');
                    return Redirect::back();
                }
            } else {
                $model = new TemporaryWorkComment();
                $model->comment = $request->comments;
                $model->temporary_work_id = $request->tempworkid;
                $model->type = 'pc';
                if ($model->save()) {
                    $rejectedmodel= TemporaryWorkRejected::where('temporary_work_id',$request->tempworkid)->orderBy('id','desc')->limit(1)->first();

                    $rejectedmodel->temporary_work_id=$request->tempworkid;
                    $rejectedmodel->comment=$request->comments;
                    $rejectedmodel->rejected_by=$tempworkdata->pc_twc_email;
                    $rejectedmodel->pdf_url=$tempworkdata->ped_url;
                    $rejectedmodel->updated_at=date('Y-m-d H:i:s');
                    $rejectedmodel->save();
                    //
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->twc_email;
                    $chm->type ='Design Brief Accepted';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Design Breif Approved by Pc Twc';
                    $chm->status=2;
                    $chm->save();
                }
                $subject = 'TWP – Design Brief Accepted - ' . $tempworkdata->project->name . '-' . $tempworkdata->project->no;
                $text = "We have attached the accepted PDF design brief for  ". $tempworkdata->company .". The design brief includes relevant documents as links.";
               
                $notify_admins_msg = [
                    'greeting' => 'Design Brief Accepted',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'company'=>$tempworkdata->company,
                        'filename' => $tempworkdata->ped_url,
                        'links' =>  '',
                        'designer' => '',
                        'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                        'ext' => '',
                        'id'=>$request->tempworkid,
                        'type'=>'desingbrief',
                        'company'=>$tempworkdata->company,
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];

                // Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new DesignUpload($notify_admins_msg));

                Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));

                if($tempworkdata->designer_company_email)
                {
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->designer_company_email;
                    $chm->type ='Designer Company';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Email send to Designer Company';
                    $chm->save();
                   $notify_admins_msg['body']['designer'] = 'designer1';
                   Notification::route('mail',  $tempworkdata->designer_company_email ?? '')->notify(new DesignUpload($notify_admins_msg,$tempworkdata->designer_company_email)); 
                }
                if($tempworkdata->desinger_email_2)
                {
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->desinger_email_2;
                    $chm->type ='Designer Checker';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Email send to Designer Checker';
                    $chm->save();
                   $notify_admins_msg['body']['designer'] = 'designer1';
                   Notification::route('mail',  $tempworkdata->desinger_email_2 ?? '')->notify(new DesignUpload($notify_admins_msg,$tempworkdata->desinger_email_2)); 
                }
                

                toastSuccess('Design Brief Accepted Successfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function pc_permit_index($id)
    {
        $id = \Crypt::decrypt($id);
        $permitload = PermitLoad::find($id);
        $commetns = PermitComments::where(['permit_load_id' => $id])->latest()->get();
        return view('dashboard.designer.pc_permit_index', compact('permitload','commetns'));
    }
    
    public function pc_permit_unload_index($id)
    {
        $id = \Crypt::decrypt($id);
        // dd($id);
        $permitload = PermitLoad::find($id);
        $commetns = PermitComments::where(['permit_load_id' => $id])->latest()->get();
        return view('dashboard.designer.pc_permit_unload_index', compact('permitload','commetns'));
    }

    public function pc_permit_store(Request $request)
    {
        try {
            $permitdata = PermitLoad::find($request->permitid);
            //new code starts here
            $otherPermits = PermitLoad::where('permit_no' , $permitdata->permit_no)->where('id' , '!=' ,  $request->permitid)->get()->pluck('id')->toArray();
            //new code ends here
            
            $createdby = User::find($permitdata->created_by);
            PermitLoad::find($request->permitid)->update([
                'status' => $request->status,
            ]);
            if ($request->status == 5) {
                $model = new PermitComments();
                $model->comment = $request->comments;
                $model->permit_load_id = $request->permitid;
                $model->save();
                $subject = 'Permit Load Rejected ';
                $text = ' Welcome to the online Temporary Works Portal.Permit Load Rejected by PC TWC.';
                $msg = 'Permit Load Rejected Successfully!';
            } else {
                $subject = 'Permit Load Accepted';
                $text = ' Welcome to the online Temporary Works Portal.Permit Load Accepted by PC TWC.';
                $msg = 'Permit Load Accepted Successfully!';
            }
            $notify_admins_msg = [
                'greeting' => 'Permit Load Rejected',
                'subject' => $subject,
                'body' => [
                    'text' => $text,
                    'filename' => $permitdata->ped_url,
                    'links' =>  '',
                    'pc_twc' => '',
                    'id' => '',
                    'name' => 'Permit Load',
                ],
                'thanks_text' => 'Thanks For Using our site',
                'action_text' => '',
                'action_url' => '',
            ];


            $twc_email = TemporaryWork::select('twc_email')->find($permitdata->temporary_work_id);
            //new code starts here
            if($request->status == 3 && sizeof($otherPermits) > 0)
            {
                PermitLoad::whereIn('id' , $otherPermits)->update(['status' => 4]);
            }
            //new code ends here
            Notification::route('mail',  $twc_email->twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
            //Notification::route('mail',  $createdby->email ?? '')->notify(new PermitNotification($notify_admins_msg));
            toastSuccess($msg);
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function get_rejected_designbrief(Request $request)
    {
        $id=\Crypt::decrypt($request->tempid);
        $tempdata=TemporaryWork::select(['twc_id_no','status','pc_twc_email'])->find($id);
        $rejected=TemporaryWorkRejected::where(['temporary_work_id'=>$id])->get();
        $list='';
        $array=[];
        $status='';
        $i=1;
        $path = config('app.url');
        $acceptance_date='';
        
        foreach($rejected as $rej)
        {
            $rejdate='';
            if($rej->acceptance_date)
            {
                $acceptance_date=date('H:i d-m-Y',strtotime($rej->acceptance_date));
            }
            if($rej->comment != null)
            {
                $rejdate=date('H:i d-m-Y',strtotime($rej->updated_at));
            }
            $list .='<tr><td>'.$i.'</td><td>'.$tempdata->pc_twc_email.'<br>'.$acceptance_date.'</td><td>'.$rej->comment.'<br>'.$rejdate.'</td><td><a href='.$path.'pdf/'.$rej->pdf_url.'>PDF</a></td><td><a  href='.route('temporary_works.edit',$id).' target="_blank" style="padding: 3px !important;border-radius: 4px;background: #50cd89; font-size: 12px;" class="btn btn-primary p-2 m-1"><i class="fa fa-edit" aria-hidden="true"></i></a></td></tr>';
            $i++;
        }
        $array['list']=$list;
        $array['brief']=$tempdata->twc_id_no;
        $status='Accepted';
        if($tempdata->status == 0)
        {
           $status="Pending";
        }
        if($tempdata->status== 2)
        {
            $status='Rejected';
        }
        $array['status']=$status;
       echo json_encode($array);
    }

    public function share_drawing(Request $request)
    {
       
        $id=$request->id;
        $email=$request->email;
        $model= new ShareDrawing();
        $model->email=$email;
        $model->temp_work_upload_files_id=$id;
        $check=0;
        if(isset($request->commentcheckbox)){
            $check=1;
        }
        if($model->save())
        {
            $Userdata = User::where(['email' => $email])->first();
            if($Userdata){
                $user_reg =0; //if user is not on platofmr then he wont see link in view.
                Notification::route('mail',$email)->notify(new ShareDrawingNotification($id,$check, $user_reg));
            }else{
                $user_reg =1;
                Notification::route('mail',$email)->notify(new ShareDrawingNotification($id,$check, $user_reg));
            }
            // Notification::route('mail',$email)->notify(new ShareDrawingNotification($id,$check));
            toastSuccess('Drawing Shared Successfully!');
            return Redirect::back();
        }
    }

    public function get_share_drawing(Request $request)
    {
        $id=$request->id;
        $sharedrawings=ShareDrawing::where('temp_work_upload_files_id',$id)->get();
        $list='';
        $i=1;
        foreach($sharedrawings as $share)
        {
            $list.='<tr><td>'.$i.'</td><td>'.$share->email.'</td><td>'.date("d-m-Y", strtotime($share->created_at)).'</td></tr>';
        }
        return $list;
    }

    public function reply_drawing(Request $request)
    {
        $comments=DrawingComment::find($request->id);
        $createdby=TempWorkUploadFiles::select(['created_by','temporary_work_id'])->find($request->drawingid);
        $replyarray=[];
        if (is_array($comments->drawing_reply)) 
        {
                foreach ($comments->drawing_reply as $dt) {
                    $replyarray[] = $dt;
                }
        }
        $replyarray[]=$request->reply;
        if (is_array( $comments->reply_date)) {
                foreach ($comments->reply_date as $dt) {
                    $reply_date[] = $dt;
                }
            }
        $reply_date[] = date('Y-m-d H:i:s');

        $arrayimage = [];
            if (is_array($comments->reply_image)) {
                foreach ($comments->reply_image as $img) {
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
            

        $comments->update(['drawing_reply'=>$replyarray,'reply_date'=>$reply_date,'reply_image'=>$arrayimage,'reply_email'=>Auth::user()->email]);
        $chm= new ChangeEmailHistory();
        $chm->email=$createdby->created_by;
        $chm->type ='Design Reply';
        $chm->foreign_idd=$createdby->temporary_work_id;
        $chm->message='Twc reply to Comment';
        $chm->status= 2;
        $chm->save();
         Notification::route('mail', $createdby->created_by)->notify(new DrawingCommentNotification($request->reply,'reply',$createdby->created_by,$createdby->temporary_work_id));
        toastSuccess('Reply send  Successfully!');
        return Redirect::back();
        
    }

    public function get_reply_drawing(Request $request)
    {
        $id=$request->id;
        $drawings=DrawingComment::where('temp_work_upload_files_id',$id)->get();
        $list='';
        $i=1;
         $path = config('app.url');
        foreach($drawings as $x => $comment)
        {
            //reply 
            $replylist = '';
            $reply='';
                $k = 1;
                 $none='';
                 $replyemail='';
                  $image = '';
                if ($comment->drawing_reply) {
                    $none='display:none;';
                    // for ($j = 0; $j < count($comment->drawing_reply); $j++) {
                        if ($comment->drawing_reply[0]) {
                            
                           
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
                                $date = date("d-m-Y", strtotime($comment->reply_date[0]));
                            }
                            $reply=$comment->drawing_reply[0];

                            // $replylist .= '<tr style="background:#08d56478;margin-top:1px"><td>R</td><td style="max-width:300px;overflow-x:scroll">' .$comment->reply_email.'<br>'. $comment->drawing_reply[$j] . '</td><td>'. $image . '<br>' . $date . '</td><td>' . $comment->created_at . '</td></tr><br>';
                            $replyemail=$comment->reply_email;
                            $k++;
                        }
                   // }
                }
               
                if (Auth::user()->email==$comment->sender_email) 
                {
                    $none='display:none;';
                }
            $list.='<tr style="padding:5px"><td>'.$i.'</td><td style="max-width:300px;overflow-x:scroll">'.$comment->sender_email.'<br>'.$comment->drawing_comment.'<br'.date('d-m-Y',strtotime($comment->created_at)).'</td><td>'. $replyemail.'<br>'.$reply.'<br>'. $image.'<form style="'. $none.'" method="post" action="' . route("drawing.reply") . '" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                                   <input type="hidden" name="id" value="' . $comment->id . '"/>
                                   <input type="hidden" name="drawingid" value="'.$id.'" />
                                   <textarea style="width: 100%" type="text" class="replay" name="reply" style="float:left"></textarea>
                                    <div class="submmitBtnDiv">
                                        <input style="width:50%;margin-top:20px;float:left" type="file" name="replyfile" />
                                        <button class="btn btn-primary replay-comment" style="font-size:10px;margin-top:10px;float:right;">submit</button>
                                    </div>
                                </form></td><td>'.$comment->created_at.'</td></tr>'.$replylist.'';
            $i++;
        }
        return $list;
    }

    public function drawing_comment(Request $request)
    {
        $tempdata=TemporaryWork::select('twc_email')->find($request->tempid);
        $model= new DrawingComment();
        $model->drawing_comment=$request->comment;
        $model->temp_work_upload_files_id=$request->drawingid;
        $model->sender_email=$request->mail;
        if($model->save())
        {
                $chm = new ChangeEmailHistory();
                $chm->email=$tempdata->twc_email;
                $chm->type ='Design Comment';
                $chm->foreign_idd=$request->tempid;
                $chm->status = 2;
                $chm->message='Designer Company Added Comment';
                $chm->save();
            Notification::route('mail',$tempdata->twc_email)->notify(new DrawingCommentNotification($request->comment,'question','',$request->tempid));
            toastSuccess('Comment Added  Successfully!');
            return Redirect::back();
        }

    }

    //twc drawing comment
    public function twc_drawing_comment(Request $request)
    {
        
        $temp_work_id=TempWorkUploadFiles::find($request->drawingid);
        $tempdata=TemporaryWork::select('twc_email')->find($temp_work_id->temporary_work_id);
        $model= new DrawingComment();
        $model->drawing_comment=$request->commment;
        $model->temp_work_upload_files_id=$request->drawingid;
        $model->sender_email=$tempdata->twc_email;
        if($model->save())
        {
            $chm= new ChangeEmailHistory();
            $chm->email=$temp_work_id->created_by;
            $chm->type ='Designer Company';
            $chm->foreign_idd=$temp_work_id->temporary_work_id;
            $chm->message='Twc Added Comment';
            $chm->save();
            Notification::route('mail', $temp_work_id->created_by)->notify(new DrawingCommentNotification($request->commment,'twcquestion',$temp_work_id->created_by,$temp_work_id->temporary_work_id));
            toastSuccess('Comment Added  Successfully!');
            return Redirect::back();
        }
    }

    public function risk_assessment_store(Request $request)
    {
        $model= new TempWorkUploadFiles();
        $tempworkdata=TemporaryWork::with('project:name,no,id')->find($request->tempworkid);
        $model->file_type=$request->type;
        $model->created_by=$request->designermail;
        $filePath = HelperFunctions::temporaryworkuploadPath();
        if (isset($request->riskassesmentfile)) {
            $file = $request->file('riskassesmentfile');
            $ext = $request->file('riskassesmentfile')->extension();
            $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            $model->file_name=$imagename;
         }
         $model->temporary_work_id=$request->tempworkid;
        if($model->save())
        {
            $subject = 'TWP– Risk Assessment Uploaded -  ' . $tempworkdata->project->name . '-' . $tempworkdata->project->no;
            $text = $request->designermail.' has uploaded a risk assessment to the Temporary Works Portal.';
            if($request->type==6)
            {
                $subject = 'TWP– Calculation/Design Notes Uploaded -  ' . $tempworkdata->project->name . '-' . $tempworkdata->project->no;
                $text = $request->designermail.' has uploaded new calculations/design notes to the Temporary Works Portal.';
            }
             
                
            $notify_admins_msg = [
                    'greeting' => 'Designer Upload Document',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'company'=>$tempworkdata->company,
                        'filename' => $tempworkdata->ped_url,
                        'links' =>  '',
                        'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                        'ext' => '',
                        'filetype'=>$request->type,
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));
            toastSuccess('Risk Assessment Uploaded Successfully!');
            return Redirect::back();
        }
   }

   public function get_assessment(Request $request)
   {
     $riskassessment=TempWorkUploadFiles::where(['temporary_work_id'=>$request->id])->whereIn('file_type',[5,6])->get();
     $list='';
     $i=1;
     $path = config('app.url');
     foreach($riskassessment as $risk){
        if($risk->file_type=="5")
        {
            $type="Risk Assessment";
        }
        if($risk->file_type=="6")
        {
            $type='Calculations';
        }
        $list.='<tr><td>'.$i.'</td><td>'.$risk->created_by.'</td><td>'.$type.'</td><td> <a  href="' . $path . $risk->file_name . '" target="_blank">View</a></td><td>'.date('d-m-Y H:i:s',strtotime($risk->created_at)).'</td></tr>';
        $i++;
     }
     return $list;
   }

   public function update_drawing_checker(Request $request){
        try{
        $id=$request->id;
        $tempworkid=TempWorkUploadFiles::select('temporary_work_id')->find($id);
        TemporaryWork::find($tempworkid->temporary_work_id)->update([
                'desinger_email_2' => $request->email,
            ]);
            toastSuccess('Design Checker Updated');
            return Redirect::back();
        }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
   }
   public function share_drawing_checker(Request $request)
   {
     $id=$request->id;
     $tempworkid=TempWorkUploadFiles::select('temporary_work_id')->find($id);
    // $tempdata=TemporaryWork::select('desinger_email_2')->find($tempworkid->temporary_work_id);
      $tempdata=TemporaryWork::find($tempworkid->temporary_work_id);
     
      if($tempdata->desinger_email_2)
     {
        // commenting code that was earlier work as per clients requirement, it was written by obaid
        $exist=TempWorkUploadFiles::where(['share_id'=> $id,'created_by'=>$tempdata->desinger_email_2])->count();
        if($exist>0)
        {
            Notification::route('mail',$tempdata->desinger_email_2)->notify(new ShareDrawingNotification($id));
             toastSuccess('Drawing Shared Again!');
             return Redirect::back();
        }
        else{
        //     $model= TempWorkUploadFiles::find($id);
        //     $newmodel=$model->replicate();
        //     $newmodel->created_by=$tempdata->desinger_email_2;
        //     $newmodel->share_id=$id;
        //    $newmodel->save();
        // Above lines are commented because client has asked that drawing should remain with current designer and checker should upload his own separate drawing after looking at current one.
        // dd($tempdata->desinger_email_2);
            // Notification::route('mail',$email)->notify(new ShareDrawingNotification($id,$check, $user_reg));
            $user_reg=0;
            Notification::route('mail',$tempdata->desinger_email_2)->notify(new ShareDrawingNotification($id, null, $user_reg));
            toastSuccess('Drawing Share Successfully!');
            return Redirect::back();
        } 

        // $notify_admins_msg = [
        //     'greeting' => 'Temporary Work Pdf',
        //     'subject' => 'TWP – Design Brief Review -'.$tempdata->projname . '-' .$tempdata->projno,
        //     'body' => [
        //         'company' => $tempdata->company,
        //         'filename' => $tempdata->ped_url,
        //         'links' => '',
        //         'name' =>  $tempdata->design_requirement_text . '-' . $tempdata->twc_id_no,
        //         'designer' => '',
        //         'pc_twc' => '',

        //     ],
        //     'thanks_text' => 'Thanks For Using our site',
        //     'action_text' => '',
        //     'action_url' => '',
        // ];
       
        //     $notify_admins_msg['body']['designer'] = 'designer1';
        //     $cmh= new ChangeEmailHistory();
        //     $cmh->email=$tempdata->desinger_email_2;
        //     $cmh->type ='Designer Checker';
        //     $cmh->foreign_idd=$tempdata->id;
        //     $cmh->message='Email send to Designer Checker';
        //     $cmh->save();
        //     Notification::route('mail', $tempdata->desinger_email_2)->notify(new TemporaryWorkNotification($notify_admins_msg, $tempdata->id, $tempdata->desinger_email_2));
        //     toastSuccess('Drawing Share Successfully!');
        //     return Redirect::back();
        // dd($notify_admins_msg);
     }
     else{
        toastSuccess('Design Chcecker Not found!!!');
        return Redirect::back();
     }
   }


   //change emails
   public function change_email(Request $request)
   {
      $id=\Crypt::decrypt($request->id);
      $model=TemporaryWork::find($id);
      //send mail to admin
        $notify_admins_msg = [
            'greeting' => 'Temporary Work Pdf',
            'subject' => $model->design_requirement_text . '-' . $model->twc_id_no,
            'body' => [
                'company' => $model->company,
                'filename' => $model->ped_url,
                'links' => '',
                'name' =>  $model->design_requirement_text . '-' . $model->twc_id_no,
                'designer' => '',
                'pc_twc' => '',
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];
        //for design brief approved
        $subject = 'Design Brief Accepted ' . $model->design_requirement_text . '-' .$model->twc_id_no;
        $text = ' Welcome to the online Temporary Works Portal.Design Brief Accepted by PC TWC.';
        $notify_admins_msgg = [
                    'greeting' => 'Design Brief Accepted',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                         'company' => $model->company,
                        'filename' => $model->ped_url,
                        'links' =>  '',
                        'designer' => '',
                        'name' => $model->design_requirement_text . '-' . $model->twc_id_no,
                        'ext' => '',
                        'id'=>$id,
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
      if($request->pc_twc_email)
      {
        $chm= new ChangeEmailHistory();
        $chm->email=$request->pc_twc_email;
        $chm->type ='Design Brief';
        $chm->foreign_idd=$id;
        if($chm->save())
        {
            $notify_admins_msg['body']['pc_twc'] = '1';
            Notification::route('mail', $request->pc_twc_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $id));
        }
        $model->pc_twc_email=$request->pc_twc_email;
      }
      if($request->d_email)
      {
        $chm= new ChangeEmailHistory();
        $chm->email=$request->d_email;
        $chm->type ='Designer Company';
        $chm->foreign_idd=$id;
        if($chm->save())
        {
            $notify_admins_msgg['body']['designer'] = 'designer1';
             Notification::route('mail',  $request->d_email)->notify(new DesignUpload($notify_admins_msgg,$request->d_email)); 
        }
        $model->designer_company_email=$request->d_email;
      }
      if($request->dc_email)
      {
        $chm= new ChangeEmailHistory();
        $chm->email=$request->dc_email;
        $chm->type ='Designer Checker';
        $chm->foreign_idd=$id;
        if($chm->save())
        {
            $notify_admins_msgg['body']['designer'] = 'designer1';
            Notification::route('mail',$request->dc_email)->notify(new DesignUpload($notify_admins_msgg,$request->dc_email)); 
        }
        $model->desinger_email_2=$request->dc_email;
      }
      if($model->save())
      {
         toastSuccess('Emails Changed Successfully');
         return Redirect::back();
      }

   }

   public function estimator(){
     try
     {
         $record=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>0])->pluck('temporary_work_id');
         $awarded=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>1])->pluck('temporary_work_id');
         $estimatorWork=TemporaryWork::with('designer', 'additionalInformation.unreadComment' ,'additionalInformation.jobComment')->with('project.company')
         ->whereIn('id',$record)
         ->orWhere('created_by', Auth::user()->id)
         ->whereIn('work_status', ['draft','pending'])
         ->get();
         
         $AwardedEstimators=TemporaryWork::with('designer.quotationSum')->with('project.company')->whereIn('id',$awarded)->get();
        //  $AwardedEstimators=TemporaryWork::with('designer.quotationSum')->with('project.company')
        //  ->whereIn('id',$awarded)
        //  ->orWhere('created_by', Auth::user()->id)
        //  ->where('work_status', 'draft')
        //  ->get();
          return view('dashboard.estimator.estimator',compact('estimatorWork','AwardedEstimators'));
         
      }catch (\Exception $exception) {
         toastError('Something went wrong, try again!');
         return Redirect::back();
      }
   }
   public function editEstimation($id){
    $temporary_work = TemporaryWork::with('designerQuote','additionalInformation')->findorfail($id);
    return view('dashboard.estimator.edit_estimation',['temporary_work' => $temporary_work]);
   }

   public function updateEstimation(Request $request, $id){
        try
        {
            $temporary_work = TemporaryWork::findOrFail($id); // Assuming you have the $id of the record you want to update
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'signed', 'images','pdfphoto','approval','req_type','req_name','req_check','req_notes','designers','suppliers','designer_company_emails','supplier_company_emails','action', 'price', 'description', 'date', 'information_required' ,'additional_information' , 'additional_information_file');
            $informationRequired = $request->information_required;
            if($informationRequired == "on")
            {
                if(is_null($request->additional_information) || empty($request->additional_information))
                {
                    toastError("Please insert additionalInformation");
                    return Redirect::back();
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
            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'signed', 'images','pdfphoto','approval','req_type','req_name','req_check','req_notes','designers','suppliers','designer_company_emails','supplier_company_emails','action', 'price', 'description', 'date', 'information_required' ,'additional_information' , 'additional_information_file');
            $image_name = '';
            $all_inputs['signature'] = $image_name;
            $all_inputs['created_by'] = auth()->user()->id;
            //work for qrcode
            $all_inputs['status'] = '0';
            //photo work here
            if ($request->photo) {
                $filePath = HelperFunctions::designbriefphotopath();
                $file = $request->file('photo');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['photo'] = $imagename;
            }
            $categorylabel=explode("-",$request->design_requirement_text);
            $all_inputs['category_label']=$categorylabel[0];
            $all_inputs['estimator']=1;
            $all_inputs['work_status']=$request->work_status;
            $all_inputs['estimator_serial_no']= HelperFunctions::generateEstimatorSerial();
            // $all_inputs['work_status'] = $informationRequired == "on" ? "draft" : "publish";
            $all_inputs['admin_designer_email'] = Auth::user()->email;
            $temporary_work->update($all_inputs);
             // Delete existing designer_quote records
             $temporary_work->designerQuote()->delete();

             // Create new designer_quote records with updated values
             $designerQuotes = [];
             for ($i = 0; $i < count($request->price); $i++) {
                if(!isset($request->price[$i]) || is_null($request->price[$i]) )
                {
                    continue;
                }
                 $designerQuotes[] = [
                     'price' => $request->price[$i],
                     'description' => $request->description[$i],
                     'date' => $request->date[$i],
                     'email' => $request->client_email,
                     'temporary_work_id' => $request->id,
                 ];
             }
            $temporary_work->designerQuote()->createMany($designerQuotes);

            $temporaryWorkId = $temporary_work->id;
            $additionalInformation = $request->additional_information;
            $mainFile =null;

            if($informationRequired == "on")
            {
                if($request->hasFile('additional_information_file'))
                {
                    $file = $request->file('additional_information_file');
                    $fileName = $file->getClientOriginalName();
                    $mainFile = time().'-'.$fileName;
                    $file->move(public_path('uploads/additional_information') , $mainFile);
                }

                AdditionalInformation::create([
                    "temporary_work_id" => $temporaryWorkId,
                    "more_details" => $additionalInformation,
                    "file_path" => $mainFile
                ]);

            }
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
                // dd("eeee");
                $pdf = PDF::loadView('layouts.pdf.estimator', ['data' => $request->all(), 'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => '', 'comments' => $attachcomments]);
                $path = public_path('estimatorPdf');
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporary_work->id);
                $model->ped_url = $filename;
                $model->save();
                //send mail to admin
                $notify_msg = [
                    'greeting' => 'Estimator Work Pdf',
                    'subject' => 'Estimator Work -'.$request->projname . '-' .$request->projno,
                    'body' => [
                        'company' => $request->company,
                        'filename' => $filename,
                        'links' => '',
                        'name' =>  $request->projname . '-' . $request->projno,

                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                $list = $request->client_email;
                Notification::route('mail', $list)->notify(new EstimationClientNotification($notify_msg, $temporary_work->id, $list,$informationRequired,$additionalInformation,$mainFile,'Designer'));
                
            toastSuccess("Data updated successfully!");
            return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return Redirect::back();
        }
   }

   public function showPricing(Request $request){
        $temporary_work = TemporaryWork::with('designerQuote')->findOrFail($request->input('id'));
        return view('dashboard.modals.pricing', ['title' => 'Temporary Work Detail', 'temporary_work' => $temporary_work]);
   }

   public function approvePricing(Request $request){
        $temporary_work = TemporaryWork::findorfail($request->temporary_work_id);
        $image_name = '';
        //upload signature here
        if($request->payment == 'approve'){
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
        }

       
        // $image_name = HelperFunctions::savesignature($request);
        $temporary_work->signature = $image_name;
        $status = 'draft';
        if($request->payment == 'approve'){
            $status = 'publish';
        } else{
            $status = 'pending';
        }
        $temporary_work->work_status = $status;
        $temporary_work->save();
        $note = $request->payment_note;
        if($temporary_work->work_status == 'pending'){
            Notification::route('mail', $temporary_work->admin_designer_email)->notify(new EstimationPriceRejectedNotification($note,$temporary_work));
        }

        return redirect()->back()->with("success" , "Payment Terms Added Successfully");
        // return redirect(route('estimator_list'));
   }

   public function addEstimator(){
      return view('dashboard.estimator.add_estimator');
   }

   public function change_email_history(Request $request)
   {
     $id=\Crypt::decrypt($request->id);
     $changedemailhistory=ChangeEmailHistory::where('foreign_idd',$id)->get();
     $list='';
     $i=1;
     foreach($changedemailhistory as $history)
     {
        if($history->status==1)
        {
            $status="Read";
            $rdate=$history->updated_at;
        }
        elseif($history->status==0)
        {
             $status="Unread";
             $rdate='';
        }
        else{
             $status="";
             $rdate=$history->updated_at;
        }

        $cdate = date('d-m-Y H:m', strtotime($history->created_at));
        $rdate = date('d-m-Y H:m', strtotime($rdate));

        if(date('d-m-Y', strtotime($cdate)) == "01-01-1970"){
            $cdate ='';
        }
        if(date('d-m-Y', strtotime($rdate)) == "01-01-1970"){
            $rdate ='';
        }
        $list.='<tr>';
        $list.='<td style="text-align: center;">'.$i.'</td>';
        $list.='<td style="text-align: center;">'.$history->email.'</td>';
        $list.='<td style="text-align: center;">'.$history->type.'</td>';
        $list.='<td style="text-align: center;">'.$status.'</td>';
         $list.='<td style="text-align: center;">'.$history->message.'</td>';
        $list.='<td style="text-align: center;">'.$cdate.'</td>
        <td>'.$rdate.'</td></tr>';
        $i++;
     }
     echo $list;
   }


   public function Designdelte($id)
   {
        try{
        DrawingComment::where('temp_work_upload_files_id',$id)->delete();
        TempWorkUploadFiles::find($id)->delete();
        toastSuccess('Designer Deleted Successfully');
        return Redirect::back();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
   }

   public function storeEstimation(Request $request)
   {
    // Validations::storeEstimatorWork($request);
    try {
            $informationRequired = $request->information_required;
            if($informationRequired == "on")
            {
                if(is_null($request->additional_information) || empty($request->additional_information))
                {
                    toastError("Please insert additionalInformation");
                    return Redirect::back();
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
            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token', 'company_id', 'signed', 'images','pdfphoto','approval','req_type','req_name','req_check','req_notes','designers','suppliers','designer_company_emails','supplier_company_emails','action', 'price', 'description', 'date', 'information_required' ,'additional_information' , 'additional_information_file');
            // dd($all_inputs);
            $image_name = '';
            $all_inputs['signature'] = $image_name;
            $all_inputs['created_by'] = auth()->user()->id;
            //work for qrcode
            $all_inputs['status'] = '0';
            //photo work here
            if ($request->photo) {
                $filePath = HelperFunctions::designbriefphotopath();
                $file = $request->file('photo');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['photo'] = $imagename;
            }
            $categorylabel=explode("-",$request->design_requirement_text);
            $all_inputs['category_label']=$categorylabel[0];
            $all_inputs['estimator']=1;
            $all_inputs['work_status']=$request->work_status;
            $all_inputs['estimator_serial_no']= HelperFunctions::generateEstimatorSerial();
            // $all_inputs['work_status'] = $informationRequired == "on" ? "draft" : "publish";
            $all_inputs['admin_designer_email'] = Auth::user()->email;
            $temporary_work = TemporaryWork::create($all_inputs);
            for($i=0;$i<count($request->price);$i++)
            {
                if(!isset($request->price[$i]) || is_null($request->price[$i]) )
                {
                    continue;
                }
                $model=new DesignerQuotation;
                $model->price=$request->price[$i];
                $model->description=$request->description[$i];
                $model->date=$request->date[$i];
                // $model->estimator_designer_list_id=$request->estimator_designer_id;
                $model->email=$request->client_email;
                $model->temporary_work_id=$temporary_work->id;
                $model->save();
            }

            $temporaryWorkId = $temporary_work->id;
            $additionalInformation = $request->additional_information;
            $mainFile =null;

            if($informationRequired == "on")
            {
                if($request->hasFile('additional_information_file'))
                {
                    $file = $request->file('additional_information_file');
                    $fileName = $file->getClientOriginalName();
                    $mainFile = time().'-'.$fileName;
                    $file->move(public_path('uploads/additional_information') , $mainFile);
                }

                AdditionalInformation::create([
                    "temporary_work_id" => $temporaryWorkId,
                    "more_details" => $additionalInformation,
                    "file_path" => $mainFile
                ]);

            }
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
                $pdf = PDF::loadView('layouts.pdf.estimator', ['data' => $request->all(), 'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => '', 'comments' => $attachcomments]);
                $path = public_path('estimatorPdf');
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporary_work->id);
                $model->ped_url = $filename;
                $model->save();
                //send mail to admin
                $notify_msg = [
                    'greeting' => 'Estimator Work Pdf',
                    'subject' => 'Estimator Work -'.$request->projname . '-' .$request->projno,
                    'body' => [
                        'company' => $request->company,
                        'filename' => $filename,
                        'links' => '',
                        'name' =>  $request->projname . '-' . $request->projno,

                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                $list = $request->client_email;
                Notification::route('mail', $list)->notify(new EstimationClientNotification($notify_msg, $temporary_work->id, $list,$informationRequired,$additionalInformation,$mainFile,'Designer'));
                // Notification::route('mail', $list[0])->notify(new EstimatorNotification($notify_msg, $temporary_work_id,$list[0],$code));

                // //work for designer email list==============  
                // $this->saveDesignerSupplier($request->designer_company_emails,$request->designers,$request->action,$notify_msg,$temporary_work->id,'Designer');
                // //work for supplier email list=============
                // $this->saveDesignerSupplier($request->supplier_company_emails,$request->suppliers,$request->action,$notify_msg,$temporary_work->id,'Supplier');
            }
            toastSuccess('Estimator Brief successfully added!');
            return redirect()->route('estimator_list');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError($exception->getMessage());
            return Redirect::back();
        }
   
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

    //send email to desinger and save in database
    public function saveDesignerSupplier($emails,$designers_or_suppliers,$action,$notify_msg,$temporary_work_id,$type)
    {
            
            $email_list1=[];
            $email_list2=[];
            if(!empty($emails))
            {
                $email_list1=explode(",",$emails);
            }
            if($designers_or_suppliers)
            {
                $email_list2=$designers_or_suppliers;
            }
            $finalList=array_merge($email_list1,$email_list2);
            foreach($finalList as $list)
            {
                $list=explode('-',$list);
                $code=random_int(100000, 999999);
                EstimatorDesignerList::create([
                    'email'=>$list[0],
                    'temporary_work_id'=>$temporary_work_id,
                    'code'=>$code,
                    'type'=>$type,
                    'user_id'=>$list[1] ?? NULL,
                ]);
                if($action=="Save & Email")
                {
                    Notification::route('mail', $list[0])->notify(new EstimatorNotification($notify_msg, $temporary_work_id,$list[0],$code));
                    
                }
                
            }
    }
    
    public function calendar(Request $request)
    {
        try {
            $user = Auth::user();
            $users = User::where('di_designer_id', $user->id)->get();

            // Apply filters
            $checkerId = $request->input('checker_id');
            $designerId = $request->input('designer_id');

            $jobs = TemporaryWork::with('checkerAssign', 'designerAssign', 'checkerAssign.user', 'designerAssign.user', 'designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks')
                ->where('created_by', $user->id);

            // Apply checker filter
            if (!empty($checkerId)) {
                $jobs->whereHas('checkerAssign', function ($query) use ($checkerId) {
                    $query->where('user_id', $checkerId);
                });
            }

            // Apply designer filter
            if (!empty($designerId)) {
                $jobs->whereHas('designerAssign', function ($query) use ($designerId) {
                    $query->where('user_id', $designerId);
                });
            }

            $jobs = $jobs->get();
            $events = [];

            foreach ($jobs as $job) {
                if ($job->designerAssign && $job->checkerAssign) {
                    $color = self::getRandomColor(); // Generate a random color for each event
                    $designer_task = $job->designerAssign->estimatorDesignerListTasks->last()->completed ?? '0';
                    $checker_task = $job->checkerAssign->estimatorDesignerListTasks->last()->completed ?? '0';
                    // Associate the checker with the job if checker is selected
                    // if (!empty($designerId)) {
                        $designer_details = 'Project Name: ' . $job->projname . ', Designer Name: ' . $job->designerAssign->user->name . ', Designer Task Completed: ' . $designer_task . '%';

                        $events[] = [
                            'title' => $designer_details,
                            'start' => $job->designerAssign->start_date ?? '',
                            'end' => $job->designerAssign->end_date ?? '',
                            'color' => $color,
                        ];
                    // }

                    // Associate the designer with the job if designer is selected
                    // if (!empty($checkerId)) {
                        $checker_details = 'Project Name: ' . $job->projname . ', Checker Name: ' . $job->checkerAssign->user->name . ', Checker Task Completed: ' . $checker_task . '%';

                        $events[] = [
                            'title' => $checker_details,
                            'start' => $job->checkerAssign->start_date ?? '',
                            'end' => $job->checkerAssign->end_date ?? '',
                            'color' => $color,
                        ];
                    // }
                }
            }

            return view('dashboard.calendar.index', compact('events', 'users'));

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError($exception->getMessage());
            return redirect()->back();
        }
    }

    public function getRandomColor() {
        $letters = '0123456789ABCDEF';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $letters[rand(0, 15)];
        }
        return $color;
    }

}
