<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use App\Utils\Validations;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AdminDesignerNotification;
use App\Notifications\PasswordResetNotification;
use App\Notifications\AdminDesignerNomination;
use App\Notifications\notifyDesignChecker;
use App\Notifications\AddExtraPriceNotification;
use App\Notifications\AdminDesignerAppointmentNotification;
use App\Notifications\InvoiceNotification;
use App\Models\{Nomination,NominationExperience,NominationCompetence,
                Project,EstimatorDesignerList,TemporaryWork,CompanyProfile,
                EstimatorDesignerListTask, PaymentDetail, ProfileOtherDocuments,Invoice, ChangeEmailHistory, 
                ExtraPrice, DesignBriefStatus,
            };
use Carbon\Carbon;
use App\Notifications\Nominations;
use App\Utils\HelperFunctions;
use DB;
use Auth;
use Notification;
use PDF;
use App\Notifications\CreateNomination;
use Crypt;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use App\Models\NominationQualification;
use App\Models\NominationCourses;

class AdminDesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $data = User::with('companyProfile','desingerSelected')->role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->latest()->get();
        
        abort_if(!$user->hasAnyRole(['admin','company']), 403);
        try {
            if ($request->ajax()) {
                $data = User::with('companyProfile')->role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->latest()->get();
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->addColumn('status',function ($data) use ($user){
                        $checkbox = '';
                        $check_status = '';
                        if(isset($data->desingerSelected))
                        {
                            $check_status = 'checked';
                        }
                        $checkbox .= '<div class="form-check form-switch"><input class="form-check-input select_designer" type="checkbox" id="'.$data->id.'" name="select_designer" value="'.$data->id.'" '.$check_status.'><label class="form-check-label" for="mySwitch"></label></div>';
                      return $checkbox;
                    })
                    ->addColumn('action', function ($data) use ($user) {
                        $btn = '';

                        if($data->companyProfile) {

                            $btn .='<a href="' . url('company-profile', $data->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank" title="Company Profile">
                                      <i class="fa fa-user"></i> 
                                   </a>';
                           
                        }
                        
                        
                        

                        if ($user->hasRole(['admin'])) {
                            $btn .= '<div class="d-flex">
                                <a href="' . route('adminDesigner.edit', $data->id) .'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                </a>
                                <form method="POST" action="'. route('adminDesigner.destroy', $data->id).'"  id="form_' . $data->id . '" >
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
                    ->rawColumns(['status','action'])
                    ->make(true);
            }

             return view('dashboard.adminDesigners.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function getExtraPricing($id){
        try{
            $pricingTable = '';
            $i = 1;
            $extrapricing = ExtraPrice::where('temporary_work_id', $id)->get();
            if(isset($extrapricing) && count($extrapricing) > 0){
                foreach($extrapricing as $pricing){
                    $pricingTable .= '
                        <input type="hidden" name="temporary_work_id" id="temp_id" value="'.$id.'">
                        <tr>
                            <td>'.$i.'</td>
                            <td>£'.$pricing->price.'</td>
                            <td style="text-wrap: wrap;">'.$pricing->description .'</td>
                    ';

                    if($pricing->client_comment !== null){
                        $pricingTable .= '
                            <td style="text-wrap: wrap;">'.$pricing->client_comment.'</td>
                        ';
                    }else{
                        $pricingTable .= '
                            <td> <textarea name="client_comment" id="clientPricingComment" cols="20" rows="5" placeholder="Please enter your reason why you will approve or reject this pricing" required></textarea></td>
                        ';
                    }

                    if($pricing->status == '2'){ // means accepted
                        $pricingTable .= '
                            <td class="d-flex justify-content-center"><p class="green" style="color: white; border-radius: 10%; width: 75%; margin-bottom: 0px;">Approved</p></td>
                        ';
                    }elseif($pricing->status == '1'){ // means rejected
                        $pricingTable .= ' 
                            <td class="d-flex justify-content-center"><p class="red" style="color: white; border-radius: 10%; width: 75%; margin-bottom: 0px;">Rejected</p></td>
                        ';
                    }else{
                        $pricingTable .='
                            <td>
                            <select class="form-control" name="pricing_status" id="changeStatusValue" data="'.$pricing->id.'">
                                <option value="">Update Status</option>
                                <option value="approve">Approve Pricing</option>
                                <option value="reject">Reject Pricing</option>
                            </select>
                            </td>
                        ';
                    }

                    $pricingTable .= '
                    </tr>
                    ';

                    $i++;
                }
            }

            return response()->json([
                'pricingTable' => $pricingTable,
            ]);
        }catch(\Exception $e){
            dd($e->getMessage(), $e->getLine());
        }
    }

    //awarded estiamtor
    public function awardedEstimator()
    {

        try
        {
            $record=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>0])->pluck('temporary_work_id');
            $awarded=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>Auth::user()->id,'estimatorApprove'=>1])->pluck('temporary_work_id');
            $estimatorWork=TemporaryWork::with('designer')->with('project.company')->whereIn('id',$record)->get();
            // $AwardedEstimators=TemporaryWork::with('designer.quotationSum','designerQuote','project.company' , 'comments', 'designerAssign','checkerAssign')
            // ->whereIn('id',$awarded)
            // ->orWhere('created_by', Auth::user()->id)
            // ->where('work_status', 'publish')
            // ->get();

            // $AwardedEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments', 'designerAssign', 'checkerAssign')
            // ->whereIn('id', $awarded)
            // ->where('work_status', 'publish')
            // ->get();
            $AwardedEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments', 'designerAssign', 'checkerAssign')
            ->whereIn('id', $awarded)
            ->where('work_status', 'publish')
            ->get();
        
        if (HelperFunctions::isAdminDesigner(Auth::user())) {
            $previousAdminDesignerEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments', 'designerAssign', 'checkerAssign')
                ->whereIn('id', $AwardedEstimators->pluck('id'))
                ->get();
        
            $AwardedEstimators = $AwardedEstimators->merge($previousAdminDesignerEstimators);
        }
        
            // // Remove the condition ->orWhere('created_by', Auth::user()->id)

            if (HelperFunctions::isAdminDesigner(Auth::user())) {
                $adminDesignerEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments', 'designerAssign', 'checkerAssign')
                    ->where('work_status', 'publish')
                    ->get();

                $AwardedEstimators = $AwardedEstimators->merge($adminDesignerEstimators);
            }
            $users = User::role(['designer', 'Design Checker', 'Designer and Design Checker'])->where('di_designer_id', auth()->user()->id)->get();
            $projectIds = [];
            foreach($AwardedEstimators as $awards)
            {
                if($awards->project_id !== null){
                    $projectIds[] = $awards->project->id;
                }
            }
            $projectIds = array_unique($projectIds);

            $projects = Project::with('company')->whereIn('id' , $projectIds )->get();
            $scantempwork = '';
             return view('test-designer',compact('estimatorWork','AwardedEstimators', 'scantempwork' , 'projects', 'users'));
            
         }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
    }

    public function awardedEstimatorModal(Request $request)
    {
        $loggedInUser = Auth::user();
        $designer = false;
        $checker = false;
        $checkerData = null;
        if (HelperFunctions::isChildDesigner($loggedInUser)) {
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')->withSum('estimatorDesignerListTasks as task_completed', 'completed')
            ->where('temporary_work_id', $request->temporary_work_id)
            ->where(function ($query) use ($loggedInUser) {
                $query->where(function ($subquery) use ($loggedInUser) {
                    $subquery->where('type', 'designers')
                        ->where('user_id', $loggedInUser->id);
                })
                ->orWhere(function ($subquery) use ($loggedInUser) {
                    $subquery->where('type', 'checker')
                        ->where('user_id', $loggedInUser->id);
                });
            })
            ->first();
        
        $designer = $estimatorDesigner && $estimatorDesigner->type === 'designers';
        $checker = $estimatorDesigner && $estimatorDesigner->type === 'checker';
        }
        elseif (HelperFunctions::isChildAdminDesigner($loggedInUser)) {
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')->withSum('estimatorDesignerListTasks as task_completed', 'completed')
            ->where('temporary_work_id', $request->temporary_work_id)
            ->where(function ($query) use ($loggedInUser) {
                $query->where(function ($subquery) use ($loggedInUser) {
                    $subquery->where('type', 'designers')
                        ->where('user_id', $loggedInUser->id);
                })
                ->orWhere(function ($subquery) use ($loggedInUser) {
                    $subquery->where('type', 'checker')
                        ->where('user_id', $loggedInUser->id);
                });
            })
            ->first();
        
        $designer = $estimatorDesigner && $estimatorDesigner->type === 'designers';
        $checker = $estimatorDesigner && $estimatorDesigner->type === 'checker';
        } else {
            // Admin Designer
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')->withSum('estimatorDesignerListTasks as task_completed', 'completed')
                // ->whereHas('Estimator', function ($query) use ($loggedInUser) {
                //     $query->where('created_by', $loggedInUser->id);
                // })
                ->where('type','designers')
                ->where('temporary_work_id', $request->temporary_work_id)
                ->first();
            $checkerData = EstimatorDesignerList::with('estimatorDesignerListTasks')
                // ->whereHas('Estimator', function ($query) use ($loggedInUser) {
                //     $query->where('created_by', $loggedInUser->id);
                // })
                ->where('type','checker')
                ->where('temporary_work_id', $request->temporary_work_id)
                ->first();
                // dd($estimatorDesigner);
        }
        return view('dashboard.designer.designer_table',['estimatorDesigner' => $estimatorDesigner, 'designer' => $designer, 'checker' => $checker,'checkerData'=>$checkerData]);
    }

    public function awardedEstimatorModalChecker(Request $request)
    {
        $loggedInUser = Auth::user();
        // dd($loggedInUser);
        $checker = false;
        if (HelperFunctions::isChildDesigner($loggedInUser)){
            // Child Designer
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')
                ->where([
                    'temporary_work_id' => $request->temporary_work_id,
                    'type' => 'checker',
                    // 'user_id' => $loggedInUser->id
                ])
                ->first();
            $checker = ($estimatorDesigner->user_id == $loggedInUser->id) ? true : false ;
            dd($checker);
        } else {
            // Admin Designer
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')
                ->whereHas('Estimator', function ($query) use ($loggedInUser) {
                    $query->where('created_by', $loggedInUser->id);
                })
                ->where('type','checker')
                ->where('temporary_work_id', $request->temporary_work_id)
                ->first();
        }

        return view('dashboard.designer.checker_table',['estimatorDesigner' => $estimatorDesigner, 'checker' => $checker]);
    }


    public function allocatedDesignerModal(Request $request)
    {
        $loggedInUser = Auth::user();
        if($loggedInUser->di_designer_id == null){
            $users = User::where('di_designer_id',$loggedInUser->id)->get();
        }else{
            $AdminDesigner = Auth::user()->di_designer_id;
            $users = User::where('di_designer_id', $AdminDesigner)->get();
        }
        $estimatorDesigner = TemporaryWork::with('designerAssign','designerAssign.user')->findorfail($request->temporary_work_id);
        $estimatorChecker = TemporaryWork::with('checkerAssign','checkerAssign.user')->findorfail($request->temporary_work_id);
        // Prepare the data to be passed to the view
        $data = [
            'loggedInUser' => $loggedInUser,
            'estimatorDesigner' => $estimatorDesigner,
            'estimatorChecker' => $estimatorChecker,
            'users' => $users,
            'temporary_work_id' => $request->temporary_work_id,
        ];
        return view('components.assign_project',$data);
    }

    public function storeAwardedEstimatorHours(Request $request, $id)
    {
        try
        {
            $estimator_designer_list = EstimatorDesignerList::find($id);
            // dd($estimator_designer_list->email);
            $designer_tasks = new EstimatorDesignerListTask();
            $designer_tasks->estimator_designer_list_id = $id;
            $designer_tasks->date = $request->date;
            $designer_tasks->hours = $request->hours;
            $designer_tasks->completed = $request->completed;
            $designer_tasks->task = $request->task;
            $designer_tasks->status = $request->status;

            // sending email to design checker if the status is completed or design check
            if($request->status == 'completed' || $request->status == 'Design Check'){
                Notification::route('mail', $estimator_designer_list->email ?? '')->notify(new notifyDesignChecker());
            }
            // $designer_tasks->user_id = Auth::user()->id;
            $designer_tasks->save();
            if($estimator_designer_list->type == 'designers')
            {
                HelperFunctions::EmailHistory(
                    $estimator_designer_list->email,
                    'Designer',
                    $estimator_designer_list ->temporary_work_id,
                    $request->completed.'% '.'Task Completed by Designer',
                    'designer'
                );
            }else
            {
                HelperFunctions::EmailHistory(
                    $estimator_designer_list->email,
                    'Design Checker',
                    $estimator_designer_list ->temporary_work_id,
                    $request->completed.'% '.'Task Completed by Design Checker',
                    'checker'
                );
            }
          
            toastSuccess('Designer tasks saved successfully!');
            return Redirect::back();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }


    public function create()
    {
        return view('dashboard.adminDesigners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        Validations::storeAdminDesigner($request);
        
        try {
            $all_inputs = $request->except('_token', 'role');
            $all_inputs['password'] = Hash::make($request->password);
            $all_inputs['email_verified_at'] = now();
            $all_inputs['added_by'] = Auth::user()->id;

            if (Auth::user()->hasRole(['designer', 'Design Checker', 'Designer and Design Checker'])) {
                $all_inputs['admin_designer'] = $request->has('admin_designer') ? 1 : null;
                $all_inputs['di_designer_id'] = Auth::user()->id;
            }

            $all_inputs['nomination'] = $request->nomination == 1 ? 1 : 0;

            $all_inputs['view_price'] = $request->has('view_price') ? 1 : null;
            $admin = Auth::user()->hasRole('admin');
            if($admin){ //if super admin is creating this user, this means it is admin designer so view price must be 1 for admin user;
                $all_inputs['view_price'] =1;
            }
            $user = User::create($all_inputs);
            $user->assignRole($request->role);

            // Password reset link send to designer
            $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            if ($request->nomination == 1) {
                Notification::route('mail', $user->email ?? '')->notify(new AdminDesignerNotification($user));
            }

            DB::commit();
            toastSuccess('User successfully added!');

            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('adminDesigner.index');
            } else {
                return redirect()->route('adminDesigner.designerList');
            }
        } catch (\Exception $exception) {
            DB::rollback();
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::role(['designer','Design Checker','Designer and Design Checker'])
                ->where('id', $id)
                ->first();
            return view('dashboard.adminDesigners.edit', compact('user'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validations::updateAdminDesigner($request, $id);

        try {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->admin_designer = $request->has('admin_designer') ? 1 : null;
            $user->view_price = $request->has('view_price') ? 1 : null;
            $user->save();
            // dd($request->role);
            $user->syncRoles($request->role);
            toastSuccess('Designer Updated Successfully');
            return redirect()->back();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            toastSuccess('Designer Deleted Successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong');
            return Redirect::back();
        }
    }

    //create nomination form
    public function createNomination($id)
    {
        $userid= \Crypt::decrypt($id);
        $user = User::findorfail($userid);
        // dd("sss");
        $nomination=Nomination::where(['user_id'=>$userid])->first();
        return view('dashboard.adminDesigners.createNomination',compact('nomination','user'));
    }

    //save notimation
    public function saveNomination(Request $request,$id)
    {
        DB::beginTransaction();
        try {
            $user=User::with('userCompany')->find($id);
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
                $image_type_png = $image_type[1] ?? '';
                $image_base64 = base64_decode($image[1] ?? '');
                $image_name = uniqid() . '.' . $image_type_png;
                $file = $folderPath . $image_name;
                file_put_contents($file, $image_base64);
            }
            //upload cv
            $cv='';
            if ($request->file('cv')) {
                $filePath = HelperFunctions::nominationCvPath();
                $file = $request->file('cv');
                $cv = HelperFunctions::saveFile(null, $file, $filePath);
            }
            $all_inputs=[
                'nominated_person'=>$request->nominated_person,
                'nominated_role'=>$request->nominated_role,
                'nominated_person_employer'=>$request->nominated_person_employer,
                'description_of_role'=>$request->description_of_role,
                'Description_limits_authority'=>$request->Description_limits_authority,
                'signature'=>$image_name,
                'user_id'=>$user->id,
                'cv'=>$cv,
            ];

            $nomination=Nomination::create($all_inputs);
            if($nomination)
            {

                $images=[];
                $qimages=[];
                $qualificationscount=0;
               //nomination qualifications
               for($i=0;$i<count($request->qualification);$i++)
               {
                   if($request->qualification[$i])
                   {
                       $model=new NominationQualification();
                       if ($request->file('qualification_file')) {
                           $filePath = HelperFunctions::nominationqualificationpath();
                           $file = $request->file('qualification_file');
                       
                           if(isset($file[$i]))
                           {
                           $imagename = HelperFunctions::saveFile(null, $file[$i], $filePath);
                           $model->qualification_certificate=$imagename;
                           $images[]=$imagename;
                           $qimages[]=$imagename;
                           $qualificationscount++;
                           }
                       
                       
                       }
                       if(isset($request->qualifications_ids[$i]))
                       {  
                           $file = $request->file('qualification_file');
                           if(!isset($file[$i]))
                           {
                               $get_qualification = NominationQualification::where('id',$request->qualifications_ids[$i])->first();
                               if(isset($get_qualification->qualification_certificate))
                               {
                                   $model->qualification_certificate = $get_qualification->qualification_certificate;
                                   $images[]=public_path($get_qualification->qualification_certificate);
                                   $qimages[]=public_path($get_qualification->qualification_certificate);
                                   $qualificationscount++;
   
                               }
                           }
                        
                       }
                      
                       $model->qualification=$request->qualification[$i];
                       $model->date=$request->qualification_date[$i];
                       $model->nomination_id=$nomination->id;
                       $model->save();
                   }
                   
               }

               //nomination courses
               $cimages=[];
               for($i=0;$i<count($request->course);$i++)
               {
                   if($request->course[$i])
                   {
                      $model=new NominationCourses();
                       if ($request->file('course_file')) {
                           $filePath = HelperFunctions::nominationcoursepath();
                           $file = $request->file('course_file');
                           if(isset($file[$i]))
                           {
                           $imagename = HelperFunctions::saveFile(null, $file[$i], $filePath);
                           $model->course_certificate=$imagename;
                           $images[]=$imagename;
                           $cimages[]=$imagename;
                           }
                        
                       
                       }
                       if(isset($request->course_ids[$i]))
                       {
                           $file = $request->file('course_file');
                           if(!isset($file[$i]))
                           {
                               $get_course = NominationCourses::where('id',$request->course_ids[$i])->first();
                               if(isset($get_course->course_certificate))
                               {
                                   $model->course_certificate = $get_course->course_certificate;
                                   $images[]=public_path($get_course->course_certificate);
                                   $qimages[]=public_path($get_course->course_certificate);
                                   $qualificationscount++;
   
                               }
                           }  
                         
                       }
                       $model->course=$request->course[$i];
                       $model->date=$request->course_date[$i];
                       $model->nomination_id=$nomination->id;
                       $model->save(); 
                   }
                   
               }

                //nomination experience
                for($i=0;$i<count($request->project_title);$i++)
                {
                    if($request->project_title[$i])
                    {
                        $model=new NominationExperience();
                        $model->project_title=$request->project_title[$i];
                        $model->role=$request->project_role[$i];
                        $model->description_involvment=$request->desc_of_involvement[$i];
                        $model->nomination_id=$nomination->id;
                        $model->save();
                    }
                    
                }

                //nomination competence
                $siteestablishment=[
                        'Temporary_offices'=>$request->Temporary_offices,
                        'Sign_boards'=>$request->Sign_boards,
                        'Hoardings'=>$request->Hoardings,
                        'Access_gantries'=>$request->Access_gantries,
                        'Fuel_storage'=>$request->Fuel_storage,
                        'Temporary_roads'=>$request->Temporary_roads,
                        'Barriers'=>$request->Barriers,
                        'Welfare_facilities'=>$request->Welfare_facilities,
                        'Precast_facilities'=>$request->Precast_facilities,
                        'Access_bridges'=>$request->Access_bridges,
                ];

                $Access_scaffolding=[
                        'Tube_fitting'=>$request->Tube_fitting,
                        'System_scaffolding'=>$request->System_scaffolding,
                        'System_staircases'=>$request->System_staircases,
                        'Temporary_roofs'=>$request->Temporary_roofs,
                        'Loading_bays'=>$request->Loading_bays,
                        'Chute_support'=>$request->Chute_support,
                        'Mobile_towers'=>$request->Mobile_towers,
                        'Edge_protection'=>$request->Edge_protection,
                        'Suspension_systems'=>$request->Suspension_systems,
                ];

                $Formwork_falsework=[
                        'Formwork'=>$request->Formwork,
                        'Falsework'=>$request->Falsework,
                        'Back_propping'=>$request->Back_propping,
                        'Support_systems'=>$request->Support_systems,
                ];

                $Construction_plant=[
                        'Crane_supports_foundations'=>$request->Crane_supports_foundations,
                        'Hoist_ties_foundations'=>$request->Hoist_ties_foundations,
                        'Mast_climbers_foundations'=>$request->Mast_climbers_foundations,
                        'Mobile_crane_foundations'=>$request->Mobile_crane_foundations,
                        'MPiling_mats_working-platforms'=>$request->Piling_mats_working_platforms,
                        'Lifting_handling_devices'=>$request->Lifting_handling_devices,
                ];


                $Excavation_earthworks=[
                        'Excavation_support'=>$request->Excavation_support,
                        'Cofferdams'=>$request->Cofferdams,
                        'Embankment_bunds'=>$request->Embankment_bunds,
                        'Ground_anchor_soil_nailing'=>$request->Ground_anchor_soil_nailing,
                        'Open_excavations'=>$request->Open_excavations,
                        'Dewatering'=>$request->Dewatering,
                ];

                $Structural_stability=[
                        'Existing_structures_during_construction'=>$request->Existing_structures_during_construction,
                        'New_structures_during_construction'=>$request->New_structures_during_construction,
                        'Structural_steelwork_erection'=>$request->Structural_steelwork_erection,
                        'Needling'=>$request->Needling,
                        'Temporary_underpinning'=>$request->Temporary_underpinning,
                        'Façade_system'=>$request->Façade_system,
                ];

                $Permanent_works=[
                        'Partial_permanent_support_conditions'=>$request->Partial_permanent_support_conditions,
                        'Demolitions'=>$request->Demolitions,
                        
                ];
                $model=new NominationCompetence();
                $model->Site_establishment=$siteestablishment;
                $model->Access_scaffolding= $Access_scaffolding;
                $model->Formwork_falsework=$Formwork_falsework;
                $model->Construction_plant=$Construction_plant;
                $model->Excavation_earthworks=$Excavation_earthworks;
                $model->Structural_stability=$Structural_stability;
                $model->Permanent_works=$Permanent_works;
                $model->nomination_id =$nomination->id;
                $model->save();

                // dd($user);
                User::find($user->id)->update(['user_notify'=>1]);
                // $user=User::find($user->id);
                // $user->project=$request->project;
                // $company=User::find($user->company_id);


                // $model=new NominationComment();
                // $model->email=$user->email;
                // $model->comment="User has submitted Nominatin form"; //to company ".$company->email."
                // $model->type="Nomination";
                // $model->send_date=date('Y-m-d H:i:s');
                // // $model->read_date=date('Y-m-d');
                // $model->user_id=$user->id;
                // $model->project_id=$request->project;
                // $model->nomination_id=$nomination->id;
                // $model->save();

                //pdf wok
                $pdf = PDF::loadView('layouts.pdf.adminDiDesignerNomination',['data'=>$request->all(),'signature'=>$image_name,'images'=>$images,'qimages'=>$qimages,'cimages'=>$cimages, 'user'=>$user,'qualificationscount'=>$qualificationscount, 'cv'=>$cv]);
                    $path = public_path('pdf');
                    $filename =rand().'nomination.pdf';
                    $pdf->save($path . '/' . $filename);

                Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                Notification::route('mail',$user->userDiCompany->email ?? '')->notify(new AdminDesignerNomination($user));
                DB::commit();
                toastSuccess('Nomination Form save successfully!');
                return back();
            }
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return back();
        }
    }

    //edit nomination
    public function editNomination($id)
    {
        try 
        {
            $nominationid= \Crypt::decrypt($id);
            $nomination=Nomination::find($nominationid);
            $qualifications=NominationQualification::where('nomination_id', $nomination->id)->get();
            $experience=NominationExperience::where('nomination_id',$nomination->id)->get();
            $courses=NominationCourses::where('nomination_id',$nomination->id)->get();
            $competence=NominationCompetence::where('nomination_id', $nomination->id)->first();
            $user=User::find($nomination->user_id);
            return view('dashboard.adminDesigners.editNomination',compact('user','nomination','qualifications','courses','experience','competence'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return back();
        }
    }
    //
    public function updateNomination(Request $request,$id)
    {
        // dd(Auth::user()->id);
         DB::beginTransaction();
        try {
            $nomination = Nomination::find($id);
            $user=User::find($nomination->user_id);
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
            //upload cv
            $cv='';
            if ($request->file('cv')) {
                $filePath = HelperFunctions::nominationCvPath();
                $file = $request->file('cv');
                $cv = HelperFunctions::saveFile(null, $file, $filePath);
            }
            $all_inputs=[
                'nominated_person'=>$request->nominated_person,
                'nominated_role'=>$request->nominated_role,
                'nominated_person_employer'=>$request->nominated_person_employer,
                'description_of_role'=>$request->description_of_role,
                'Description_limits_authority'=>$request->Description_limits_authority,
                'signature'=>$image_name,
                'user_id'=>$user->id,
                'status'=>0,
                'cv'=>$cv,

            ];

               Nomination::find($id)->update($all_inputs);
               $nomination=Nomination::find($id);
            if($nomination)
            {
                //nomination experience
                for($i=0;$i<count($request->project_title);$i++)
                {
                    if(isset($request->experience_ids[$i]))
                    {
                         $model=NominationExperience::where('id',$request->experience_ids[$i])->first();
                    }
                    else{
                         $model=new NominationExperience();
                    }
                   
                    $model->project_title=$request->project_title[$i];
                    $model->role=$request->project_role[$i];
                    $model->description_involvment=$request->desc_of_involvement[$i];
                    $model->nomination_id=$nomination->id;
                    $model->save();
                }

                //nomination competence
                $siteestablishment=[
                        'Temporary_offices'=>$request->Temporary_offices,
                        'Sign_boards'=>$request->Sign_boards,
                        'Hoardings'=>$request->Hoardings,
                        'Access_gantries'=>$request->Access_gantries,
                        'Fuel_storage'=>$request->Fuel_storage,
                        'Temporary_roads'=>$request->Temporary_roads,
                        'Barriers'=>$request->Barriers,
                        'Welfare_facilities'=>$request->Welfare_facilities,
                        'Precast_facilities'=>$request->Precast_facilities,
                        'Access_bridges'=>$request->Access_bridges,
                ];

                $Access_scaffolding=[
                        'Tube_fitting'=>$request->Tube_fitting,
                        'System_scaffolding'=>$request->System_scaffolding,
                        'System_staircases'=>$request->System_staircases,
                        'Temporary_roofs'=>$request->Temporary_roofs,
                        'Loading_bays'=>$request->Loading_bays,
                        'Chute_support'=>$request->Chute_support,
                        'Mobile_towers'=>$request->Mobile_towers,
                        'Edge_protection'=>$request->Edge_protection,
                        'Suspension_systems'=>$request->Suspension_systems,
                ];

                $Formwork_falsework=[
                        'Formwork'=>$request->Formwork,
                        'Falsework'=>$request->Falsework,
                        'Back_propping'=>$request->Back_propping,
                        'Support_systems'=>$request->Support_systems,
                ];

                $Construction_plant=[
                        'Crane_supports_foundations'=>$request->Crane_supports_foundations,
                        'Hoist_ties_foundations'=>$request->Hoist_ties_foundations,
                        'Mast_climbers_foundations'=>$request->Mast_climbers_foundations,
                        'Mobile_crane_foundations'=>$request->Mobile_crane_foundations,
                        'MPiling_mats_working-platforms'=>$request->Piling_mats_working_platforms,
                        'Lifting_handling_devices'=>$request->Lifting_handling_devices,
                ];


                $Excavation_earthworks=[
                        'Excavation_support'=>$request->Excavation_support,
                        'Cofferdams'=>$request->Cofferdams,
                        'Embankment_bunds'=>$request->Embankment_bunds,
                        'Ground_anchor_soil_nailing'=>$request->Ground_anchor_soil_nailing,
                        'Open_excavations'=>$request->Open_excavations,
                        'Dewatering'=>$request->Dewatering,
                ];

                $Structural_stability=[
                        'Existing_structures_during_construction'=>$request->Existing_structures_during_construction,
                        'New_structures_during_construction'=>$request->New_structures_during_construction,
                        'Structural_steelwork_erection'=>$request->Structural_steelwork_erection,
                        'Needling'=>$request->Needling,
                        'Temporary_underpinning'=>$request->Temporary_underpinning,
                        'Façade_system'=>$request->Façade_system,
                ];

                $Permanent_works=[
                        'Partial_permanent_support_conditions'=>$request->Partial_permanent_support_conditions,
                        'Demolitions'=>$request->Demolitions,
                        
                ];


                $model=NominationCompetence::where('nomination_id',$nomination->id)->first();
                $model->Site_establishment=$siteestablishment;
                $model->Access_scaffolding= $Access_scaffolding;
                $model->Formwork_falsework=$Formwork_falsework;
                $model->Construction_plant=$Construction_plant;
                $model->Excavation_earthworks=$Excavation_earthworks;
                $model->Structural_stability=$Structural_stability;
                $model->Permanent_works=$Permanent_works;
                $model->nomination_id =$nomination->id;
                $model->save();

                $user->nomination_status=0;
                $user->user_notify=1;
                $user->save();
               $pdf = PDF::loadView('layouts.pdf.adminDiDesignerNomination',['data'=>$request->all(),'signature'=>$image_name,'user'=>$user,'cv'=>$cv]);
                    $path = public_path('pdf');
                    $filename =rand().'nomination.pdf';
                    @unlink($nomination->pdf_url);
                    $pdf->save($path . '/' . $filename);
                     
                    Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                    Notification::route('mail',$user->userDiCompany->email ?? '')->notify(new AdminDesignerNomination($user));
                    // dd("rrrr");
                    DB::commit();
                    toastSuccess('Nomination Form updated successfully!');
                    return redirect()->to('adminDesigner/create-nomination/'.Crypt::encrypt($user->id)); 

            }

        } catch (\Exception $exception) {
                DB::rollback();
                dd($exception->getMessage(),$exception->getLine());
                toastError($exception->getMessage());
                return back();
            
        }
    }
    //create profile or build profile
    public function createProfile($id)
    {
        $companyProfile=CompanyProfile::where(['user_id'=>Auth::user()->id])->first();
        // dd(auth()->user());
        return view('dashboard.adminDesigners.createProfile',compact('companyProfile'));
    }

    //save profile
    public function saveProfile(Request $request)
    {
        try {
            $all_inputs = $request->except('_token','logo','company_cv','indemnity_insurance','images','other_doucuments_name','other_doucuments_document','bank','sort_code','account_number','swiftbic','iban');
            if ($request->file('logo')) {
                $filePath  = 'uploads/designercompany/logo/';
                $file = $request->file('logo');
                $all_inputs['logo'] = HelperFunctions::saveFile(null, $file, $filePath);            
            }
            if ($request->file('company_cv')) {
                $filePath  = 'uploads/designercompany/cv/';
                $file = $request->file('company_cv');
                $all_inputs['company_cv'] = HelperFunctions::saveFile(null, $file, $filePath);            
            }
            if ($request->file('indemnity_insurance')) {
                $filePath  = 'uploads/designercompany/insurance/';
                $file = $request->file('indemnity_insurance');
                $all_inputs['indemnity_insurance'] = HelperFunctions::saveFile(null, $file, $filePath);            
            }
            if(isset($request->nomination_link_check))
            {
                $all_inputs['nomination_link_check']=1;
            }

            $all_inputs['user_id']=Auth::user()->id;
            $companyProfile=CompanyProfile::create($all_inputs);
            //mew work for documents upload
            $names = $request->input('other_doucuments_name');
            $files = $request->file('other_doucuments_document');
            if($request->hasFile('other_doucuments_document'))
            {

                foreach ($files as $index => $file) {
                    // Validate the uploaded file
                    if($names[$index] =="" )
                    {
                        $request->validate([
                        'file' => 'required|file|mimes:jpeg,png,gif,pdf,doc,docx|max:2048',
                        ]);
                    }
    
                    $filePath  = 'uploads/designercompany/others/';
                    $filename = HelperFunctions::saveFile(null, $file, $filePath);
                    $name = $names[$index];
                    ProfileOtherDocuments::create([
                        'name'=>$name,
                        'file'=>$filename,
                        'company_profile_id'=>$companyProfile->id,
                    ]);
                    
                }
            }

            $payment_detail = new PaymentDetail();
            $payment_detail->user_id = Auth::user()->id;
            $payment_detail->bank = $request->bank;
            $payment_detail->sort_code = $request->sort_code;
            $payment_detail->account_number = $request->account_number;
            $payment_detail->swiftbic = $request->swiftbic;
            $payment_detail->iban = $request->iban;
            $payment_detail->company_profile_id = $companyProfile->id;
            $payment_detail->save();
            toastSuccess('Company Profile Created successfully');
            return redirect()->back();
            
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            dd($exception->getMessage(),$exception->getFile(),$exception->getLine());
            return Redirect::back();
        }
    }

    //delete company docs
    public function deleteCompnayDocs(Request $request)
    {
        $data=ProfileOtherDocuments::find($request->id);
         @unlink($data->file);
         $res=ProfileOtherDocuments::find($request->id)->delete();
        if($res)
        {
            
             
                 echo "success";
             
            
        }
        else
        {
            echo "error";
        }

    }

    //edit profile
    public function editProfile($id)
    {
        $editProfile=CompanyProfile::with('otherdocs','payment_detail')->find($id);
        return view('dashboard.adminDesigners.editProfile',compact('editProfile'));
    }

    //update Profile
    public function updateProfile(Request $request,$editProfile)
    {
        $editProfile=companyProfile::find($editProfile);
        try {
            $all_inputs = $request->except('_token','logo','company_cv','indemnity_insurance','images','preloaded','other_doucuments_name','other_doucuments_document','bank','sort_code','account_number','swiftbic','iban');
            if ($request->file('logo')) {
                $filePath  = 'uploads/designercompany/logo/';
                $file = $request->file('logo');
                $all_inputs['logo'] = HelperFunctions::saveFile($editProfile->logo, $file, $filePath);            
            }
            if ($request->file('company_cv')) {
                $filePath  = 'uploads/designercompany/cv/';
                $file = $request->file('company_cv');
                $all_inputs['company_cv'] = HelperFunctions::saveFile($editProfile->company_cv, $file, $filePath);            
            }
            if ($request->file('indemnity_insurance')) {
                $filePath  = 'uploads/designercompany/insurance/';
                $file = $request->file('indemnity_insurance');
                $all_inputs['indemnity_insurance'] = HelperFunctions::saveFile($editProfile->indemnity_insurance, $file, $filePath);            
            }
            if(isset($request->nomination_link_check))
            {
                $all_inputs['nomination_link_check']=1;
            }
            //work for upload images here
            // $image_links = [];
            // if ($request->file('images')) {
            //     $filePath  = 'uploads/designercompany/others/';
            //     $files = $request->file('images');
            //     foreach ($files  as $key => $file) {
            //         $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            //         $image_links[] = $imagename;
            //     }
                
            // }
            // if($request->preloaded)
            // {
            //     foreach($request->preloaded as $pload)
            //     {
            //         $path = parse_url($pload, PHP_URL_PATH);
            //         $image_links[]=$path;
            //     }
            // }
            // $all_inputs['other_files']=json_encode($image_links);
            $all_inputs['user_id']=Auth::user()->id;
            CompanyProfile::find($editProfile->id)->update($all_inputs);
            //mew work for documents upload
            $names = $request->input('other_doucuments_name');
            $files = $request->file('other_doucuments_document');

            if($request->hasFile('other_doucuments_document'))
            {
                foreach ($files as $index => $file) {
                    // Validate the uploaded file
                    if($names[$index] =="" )
                    {
                        $request->validate([
                        'file' => 'required|file|mimes:jpeg,png,gif,pdf,doc,docx|max:2048',
                        ]);
                    }
    
                    $filePath  = 'uploads/designercompany/others/';
                    $filename = HelperFunctions::saveFile(null, $file, $filePath);
                    $name = $names[$index];
                    ProfileOtherDocuments::create([
                        'name'=>$name,
                        'file'=>$filename,
                        'company_profile_id'=>$editProfile->id,
                    ]);
                    
                }
            }
            $payment_detail = PaymentDetail::where('company_profile_id',$editProfile->id)->first();
            $payment_detail = new PaymentDetail();
            $payment_detail->user_id = Auth::user()->id;;
            $payment_detail->company_profile_id = $editProfile->id;
            $payment_detail->bank = $request->bank;
            $payment_detail->sort_code = $request->sort_code;
            $payment_detail->account_number = $request->account_number;
            $payment_detail->swiftbic = $request->swiftbic;
            $payment_detail->iban = $request->iban;
            $payment_detail->save();
            toastSuccess('Company Profile Updated successfully');
            return redirect()->back();
            
        } catch (\Exception $exception) {
            dd($exception->getMessage(), $exception->getLine());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    //admin designer list
    public function designerList(Request $request)
    {
        $user = auth()->user();                        
        abort_if(!$user->hasRole(['designer','Design Checker','Designer and Design Checker']), 403);
        try {

            if ($request->ajax()) {
                if ($user->hasRole(['designer','Design Checker','Designer and Design Checker'])) {
                    // $data = User::role(['designer','Design Checker','Designer and Design Checker'])->where('di_designer_id',auth()->user()->id)->get();
                    $userData = User::where('id', auth()->user()->id)->get();

                    $data = User::role(['designer', 'Design Checker', 'Designer and Design Checker'])->where('di_designer_id', auth()->user()->id)->get();

                    $data = $userData->merge($data);
                }
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->addColumn('action', function ($data) use ($user) {
                         $btn ='';
                         $class='';
                         if($data->user_notify==2){
                            $class='greenBgBlink';
                        }
                        elseif($data->user_notify==3)
                        {
                            $class='yellowBgBlink';
                        }
                        elseif($data->user_notify)
                        {
                            $class='redBgBlink';
                        }else{
                            $class='';
                        }
                        if ($user->hasRole(['designer','Design Checker','Designer and Design Checker'])) {
                            
                            $btn .= '<div class="d-flex">
                                <a href="' . route('adminDesigner.edit', $data->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                </a>
                                <form method="POST" action="' . route('adminDesigner.destroy', $data->id) . '"  id="form_' . $data->id . '" >
                                    ' . method_field('Delete') . csrf_field() . '

                                    <button type="submit" id="' . $data->id . '" class="confirm1 btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                       
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                        
                                    </button>
                                </form>
                                <a href="'.url('adminDesigner/designer-details',Crypt::encrypt($data->id)).'" class="btn btn-icon '.$class.'"><i class="fa fa-eye"></i></a>
                                </div>
                                ';
                        }
                        return $btn;
                     })
                    ->rawColumns(['action'])
                    ->make(true);
            }

             return view('dashboard.adminDesigners.designerList');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
    //designer details by id
    public function designerDetails($id)
    {
        $userid= \Crypt::decrypt($id);
        $userNomination=Nomination::where(['user_id'=>$userid])->first();
        $User=User::find($userid);
        $User->user_notify=0;
        $User->save();
        return view('dashboard.adminDesigners.designer-details',compact('userNomination','User'));
    }
    //nominations tatus
    public function nominationStatus(Request $request)
    {
         DB::beginTransaction();
           try
           {
            $user=User::with('userDiCompany')->find($request->userid);
            if($request->status==1)
            {
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

                $all_inputs=[
                    'print_name1'=>Auth::user()->name ?? $user->name,
                    'job_title1'=>Auth::user()->job_title ?? $user->job_title,
                    'signature1'=>$image_name,
                    'status'=>1,
                    'nomination_approve_reject_date'=>date('Y-m-d H:i:s')

                ];
                Nomination::find($request->nominationid)->update($all_inputs);
                $nomination=Nomination::find($request->nominationid);
                $experience=NominationExperience::where('nomination_id',$request->nominationid)->get();
                $competence=NominationCompetence::where('nomination_id',$request->nominationid)->first();
                $pdf = PDF::loadView('layouts.pdf.adminDiDesignerAprrove',['nomination'=>$nomination,'experience'=>$experience,'competence'=>$competence,'user'=>$user]);
                    $path = public_path('pdf');
                    $filename =rand().'nomination.pdf';
                    $pdf->save($path . '/' . $filename);
                @unlink($nomination->pdf_url);
                Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                $status='Approved';
                Notification::route('mail',$user->email ?? '')->notify(new AdminDesignerNomination($user,$status,$nomination));  
            }
            else{
                 Nomination::find($request->nominationid)->update(['status'=>2,'nomination_approve_reject_date'=>date('Y-m-d H:i:s')]);
                 $nomination=Nomination::find($request->nominationid);
                 $status='Rejected';
                Notification::route('mail',$user->email ?? '')->notify(new AdminDesignerNomination($user,$status,$nomination)); 
            }
            DB::commit();
            toastSuccess('status changed successfully');
            return Redirect::back();
         } catch (\Exception $exception) {
            DB::rollback();
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
    }
    //create Appointment
    public function createAppointment($id)
    {
        $userid= \Crypt::decrypt($id);
        $nomination=Nomination::where(['user_id'=>$userid])->first();
        $user=User::find($userid);
        if($nomination && $nomination->status==1)
        {
            return view('dashboard.adminDesigners.createAppointment',compact('user','nomination'));
        }
        else
        {
            toastError('Wait for nomination approve');
            return Redirect::back();
        }
    }
    //save appointment
    public function saveAppointment(Request $request)
    {
       DB::beginTransaction();
       try
       {
            $user=User::with('userDiCompany')->find($request->user_id);
            $nomination=Nomination::find($request->nominationId);
            //upload signature here
            $image_name = '';
            if ($request->signtype == 1) {
                $image_name = $request->namesign;
            }elseif($request->pdfsigntype == 1) {
                $folderPath = public_path('temporary/signature/');
                $file = $request->file('pdfsign');
                $filename = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($folderPath, $filename);
                $image_name = $filename;
            }else{
            $folderPath = public_path('temporary/signature/');
            $image = explode(";base64,", $request->signed);
            $image_type = explode("image/", $image[0]);
            $image_type_png = $image_type[1];
            $image_base64 = base64_decode($image[1]);
            $image_name = uniqid() . '.' . $image_type_png;
            $file = $folderPath . $image_name;
            file_put_contents($file, $image_base64);
            }
            
            $pdf = PDF::loadView('layouts.pdf.designerAppointment',['user'=>$user,'signature'=>$image_name,'nomination'=>$nomination,'data'=>$request->all()]); 
            $path = public_path('pdf');
            $filename =$user->id.'appointment.pdf';
            @unlink($path . '/' . $filename);
            $pdf->save($path . '/' . $filename);
            Nomination::find($request->nominationId)->update([
                'appointment_pdf'=>$filename,
                'appointment_signature'=>$image_name,
                'appointment_date'=>$request->date,
            ]);
            User::find($user->id)->update([
                'user_notify'=>2
             ]);
            Notification::route('mail',$user->userDiCompany->email ?? '')->notify(new AdminDesignerAppointmentNotification($user));
            DB::commit();
            toastSuccess('Appointment Saved successfully');
            return redirect('adminDesigner/create-nomination/'.Crypt::encrypt($user->id));
        } catch (\Exception $exception) {
            DB::rollback();
            toastError('Something went wrong, try again!' );
            return Redirect::back();
        }
       
    }


    // default awarded jobs
    public function getAwardedJob()
    {
        try
        {
            // getting the last element of url
            $url = url()->current();
            $path = parse_url($url, PHP_URL_PATH);
            $segments = explode('/', rtrim($path, '/'));
            $lastSegment = end($segments);
            $tempWorkProjects = '';
            $tempWorkClients = '';


            if(auth()->user()->admin_designer == null && auth()->user()->di_designer_id != null )
            {
                $parent_id = auth()->user()->id;
            }
            elseif(HelperFunctions::isPromotedAdminDesigner(Auth::user()))
            {
                $parent_id = auth()->user()->di_designer_id;
            }
             else{
                $parent_id = auth()->user()->id;
            }
            $record=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>$parent_id,'estimatorApprove'=>0])->pluck('temporary_work_id');
            $awarded=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>$parent_id,'estimatorApprove'=>1])->pluck('temporary_work_id');
            $estimatorWork=TemporaryWork::with('designer')->with('project.company')->whereIn('id',$record)->get();
            $AwardedEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments',
            'designerAssign', 'checkerAssign','designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks' , 'creator.userCompany','invoice')
            ->whereIn('id', $awarded)
            ->where('work_status', 'publish')
            ->latest()
            ->withCount('uploadfile')
            ->get();
            // if(HelperFunctions::isPromotedAdminDesigner(Auth::user()))
            // {
            //     $promoted_parent_id = auth()->user()->id;
            //     $promotedRecord=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>$promoted_parent_id,'estimatorApprove'=>0])->pluck('temporary_work_id');
            //     $promotedAwarded=EstimatorDesignerList::where(['user_id'=>$promoted_parent_id,'estimatorApprove'=>1])->pluck('temporary_work_id');
            //     $promotedEstimatorWork=TemporaryWork::with('designer')->with('project.company')->whereIn('id',$promotedAwarded)->get();
            //     $promotedAwardedEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments',
            //     'designerAssign', 'checkerAssign','designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks' , 'creator.userCompany')
            //     ->whereIn('id', $promotedAwarded)
            //     ->where('work_status', 'publish')
            //     ->latest()
            //     ->get();
            //     $AwardedEstimators = $AwardedEstimators->merge($promotedAwardedEstimators);
            // }

            // if(HelperFunctions::isAdminDesigner(Auth::user()))
            // {
            //     $admin_parent_id = auth()->user()->id;
            //     $adminRecord=EstimatorDesignerList::select('temporary_work_id')->where(['user_id'=>$admin_parent_id,'estimatorApprove'=>0])->pluck('temporary_work_id');
            //     $adminAwarded=EstimatorDesignerList::where(['user_id'=>$admin_parent_id,'estimatorApprove'=>1])->pluck('temporary_work_id');
            //     $adminEstimatorWork=TemporaryWork::with('designer')->with('project.company')->whereIn('id',$adminAwarded)->get();
            //     $adminAwardedEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments',
            //     'designerAssign', 'checkerAssign','designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks' , 'creator.userCompany')
            //     ->whereIn('id', $adminAwarded)
            //     ->where('work_status', 'publish')
            //     ->latest()
            //     ->get();
            //     $AwardedEstimators = $AwardedEstimators->merge($adminAwardedEstimators);
            // }

        
            // if (HelperFunctions::isPromotedAdminDesigner(Auth::user())) {
            //     $previousAdminDesignerEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments', 
            //     'designerAssign', 'checkerAssign', 'designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks')
            //         ->whereIn('id', $AwardedEstimators->pluck('id'))
            //         ->get();
            
            //     $AwardedEstimators = $AwardedEstimators->merge($previousAdminDesignerEstimators);
            // }
        
            // // Remove the condition ->orWhere('created_by', Auth::user()->id)
         if(auth()->user()->admin_designer == null && auth()->user()->di_designer_id != null )
            {
                $parent_id = auth()->user()->id;
            }
            elseif(HelperFunctions::isPromotedAdminDesigner(Auth::user()))
            {
                $parent_id = auth()->user()->di_designer_id;

            }
             else{
                $parent_id = auth()->user()->id;
            }
            $all_admin = User::where('di_designer_id',$parent_id)->where('admin_designer', 1)->pluck('id')->toArray();
            $all_admin = [...$all_admin , $parent_id];
            if (HelperFunctions::isAdminDesigner(Auth::user()) || HelperFunctions::isPromotedAdminDesigner(Auth::user())) {
                // $adminDesignerEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments',
                // 'designerAssign', 'checkerAssign', 'designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks','invoice', 'getExtraPricePending', 'getExtraPriceRejected', 'getExtraPriceAccepted', 'designBriefStatus')
                //     ->whereIn('created_by', $all_admin)
                //     ->orWhere('created_by',$parent_id)
                //     ->where('work_status', 'publish')
                //     ->latest()
                //     ->withCount('uploadfile')
                //     ->get();

                
                if($lastSegment == "awarded-jobs"){
                    $adminDesignerEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments',
                    'designerAssign', 'checkerAssign', 'designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks','invoice', 'getExtraPricePending', 'getExtraPriceRejected', 'getExtraPriceAccepted')
                    ->where(function($query) {
                        $query->whereDoesntHave('designBriefStatus', function($q) {
                            $q->whereIn('status', [1, 2]);
                        })->orWhereDoesntHave('designBriefStatus');
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();

                    // fetching projects for filter
                    $tempWorkProjects = TemporaryWork::where(function($query) {
                        $query->whereDoesntHave('designBriefStatus', function($q) {
                            $q->whereIn('status', [1, 2]);
                        })->orWhereDoesntHave('designBriefStatus');
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();

                    // fetching clients for filter
                    $tempWorkClients = TemporaryWork::where(function($query) {
                        $query->whereDoesntHave('designBriefStatus', function($q) {
                            $q->whereIn('status', [1, 2]);
                        })->orWhereDoesntHave('designBriefStatus');
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();
                }elseif($lastSegment == "completed"){
                    $adminDesignerEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments',
                    'designerAssign', 'checkerAssign', 'designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks','invoice', 'getExtraPricePending', 'getExtraPriceRejected', 'getExtraPriceAccepted')
                    ->whereHas('designBriefStatus' , function($query){
                        $query->where('status' , 1);
                    })
                    ->where(function($query) {
                        $query->whereDoesntHave('designBriefStatus', function($q) {
                            $q->whereIn('status', [0, 2]);
                        })->orWhereDoesntHave('designBriefStatus');
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();

                    // fetching projects for filter
                    $tempWorkProjects = TemporaryWork::whereHas('designBriefStatus' , function($query){
                        $query->where('status' , 1);
                    })
                    ->where(function($query) {
                        $query->whereDoesntHave('designBriefStatus', function($q) {
                            $q->whereIn('status', [0, 2]);
                        })->orWhereDoesntHave('designBriefStatus');
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();

                    // fetching clients for filter 
                    $tempWorkClients = TemporaryWork::whereHas('designBriefStatus' , function($query){
                        $query->where('status' , 1);
                    })
                    ->where(function($query) {
                        $query->whereDoesntHave('designBriefStatus', function($q) {
                            $q->whereIn('status', [0, 2]);
                        })->orWhereDoesntHave('designBriefStatus');
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();

                }elseif($lastSegment == "paid"){
                    $adminDesignerEstimators = TemporaryWork::with('designer.quotationSum', 'designerQuote', 'project.company', 'comments',
                    'designerAssign', 'checkerAssign', 'designerAssign.estimatorDesignerListTasks', 'checkerAssign.estimatorDesignerListTasks','invoice', 'getExtraPricePending', 'getExtraPriceRejected', 'getExtraPriceAccepted')
                    ->whereHas('designBriefStatus' , function($query){
                        $query->where('status' , 2);
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();

                    // fetching projects for filter
                    $tempWorkProjects = TemporaryWork::whereHas('designBriefStatus' , function($query){
                        $query->where('status' , 2);
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();

                    // fetching clients for filter
                    $tempWorkClients = TemporaryWork::whereHas('designBriefStatus' , function($query){
                        $query->where('status' , 2);
                    })
                    ->whereIn('created_by', $all_admin)
                    ->where('work_status' , 'publish')
                    ->withCount('uploadfile')
                    ->orderBy('id' , 'desc')
                    ->get();
                }
                $AwardedEstimators = $AwardedEstimators->merge($adminDesignerEstimators);
            }
            // dd($AwardedEstimators);

            $users = User::role(['designer', 'Design Checker', 'Designer and Design Checker'])->where('di_designer_id', auth()->user()->id)->get();
            $projectIds = [];
            foreach($AwardedEstimators as $awards)
            {
                if($awards->project_id !== null){
                    $projectIds[] = $awards->project->id;
                }
            }
            $projectIds = array_unique($projectIds);
            $projects = Project::with('company')->whereIn('id' , $projectIds )->get();
            $scantempwork = '';
            // Check in the designer Certificate
            if($lastSegment == "awarded-jobs"){
                return view('dashboard.adminDesigners.awarded-jobs',compact('estimatorWork','AwardedEstimators', 'scantempwork' , 'projects', 'users', 'tempWorkProjects', 'tempWorkClients'));
            }elseif($lastSegment == "completed"){
                return view('dashboard.adminDesigners.completed-awarded-jobs',compact('estimatorWork','AwardedEstimators', 'scantempwork' , 'projects', 'users', 'tempWorkProjects', 'tempWorkClients'));
            }elseif($lastSegment == "paid"){
                return view('dashboard.adminDesigners.paid-awarded-jobs',compact('estimatorWork','AwardedEstimators', 'scantempwork' , 'projects', 'users', 'tempWorkProjects', 'tempWorkClients'));
            }
            
         }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
            // dd($exception->getMessage(), $exception->getLine());
         }
    }

    // for filter through project
    public function adminDeignerSearchProject(Request $request){
        try{
            // for the awarded-jobs
            $client = $request->clients;
            $project = $request->projects;
            if(!isset($client) && !isset($project)){
                toastError("Please Select at least one filter");
                return redirect()->back();
            }
            $queryData = TemporaryWork::query();
            $queryData->when($project !== null, function($query) use ($project){
                $query->where('projno', $project);
            });
            $queryData->when($client !== null, function($query) use ($client){
                $query->where('client_name', $client);
            });

            $AwardedEstimators = $queryData->get();
            $scantempwork = '';

            if(auth()->user()->admin_designer == null && auth()->user()->di_designer_id != null )
            {
                $parent_id = auth()->user()->id;
            }
            elseif(HelperFunctions::isPromotedAdminDesigner(Auth::user()))
            {
                $parent_id = auth()->user()->di_designer_id;

            }
            else{
                $parent_id = auth()->user()->id;
            }
            $all_admin = User::where('di_designer_id',$parent_id)->where('admin_designer', 1)->pluck('id')->toArray();
            $all_admin = [...$all_admin , $parent_id];
            

            // fetching projects for filter
            $tempWorkProjects = TemporaryWork::where(function($query) {
                $query->whereDoesntHave('designBriefStatus', function($q) {
                    $q->whereIn('status', [1, 2]);
                })->orWhereDoesntHave('designBriefStatus');
            })
            ->whereIn('created_by', $all_admin)
            ->where('work_status' , 'publish')
            ->withCount('uploadfile')
            ->orderBy('id' , 'desc')
            ->get();

            // fetching clients for filter
            $tempWorkClients = TemporaryWork::where(function($query) {
                $query->whereDoesntHave('designBriefStatus', function($q) {
                    $q->whereIn('status', [1, 2]);
                })->orWhereDoesntHave('designBriefStatus');
            })
            ->whereIn('created_by', $all_admin)
            ->where('work_status' , 'publish')
            ->withCount('uploadfile')
            ->orderBy('id' , 'desc')
            ->get();
            return view('dashboard.adminDesigners.awarded-jobs', compact('AwardedEstimators', 'scantempwork', 'tempWorkProjects', 'tempWorkClients'));
        }catch(\Exception $e){
            dd($e->getMessage(), $e->getLine());
        }
        
    }
    // changing status
    public function changeDesignStatus(Request $request){
        // dd($request->all());
        try{
            $status = $request->move_design_brief;
            if($status == 'completed'){
                $status = 1;
            }elseif($status == 'paid'){
                $status = 2;
            }

            $changeStatus = new DesignBriefStatus();
            $changeStatus->temporary_work_id = $request->temporary_work_id;
            $changeStatus->status = $status;
            if($changeStatus->save()){
                toastSuccess("Design Brief moved succesfully");
                return Redirect::back();
            }
        }catch(\Exception $e){
            dd($e->getMessage(), $e->getLine());
        }
    }

    public function getPricingComment(Request $request){
        $clientComment = ExtraPrice::where('id', $request->pricingId)->first();
        if(isset($clientComment)){
            return response()->json(['clientComment' => $clientComment, "status"=>true], 200);
        }else{
            return response()->json(["msg"=> "No pricing found", "status"=>false], 400);
        }
    }
    public function invoices(){
        $user = Auth::user();
        $invoices = Invoice::where('admindesigner_id',Auth::id())->paginate(10);
        return view('dashboard.adminDesigners.invoices',['user'=>$user,'invoices'=>$invoices]);
    }

    // extra price functions
    public function storeExtraPrice(Request $request){
        try{
            $request->validate([
                'price' => 'required',
            ],[
                'price.required' => "This field is required",
            ]);
            $adminDesigner_id = Auth::user()->id;
            $extraPrice = new ExtraPrice();
            $extraPrice->temporary_work_id = $request->temporary_work_id;
            $extraPrice->price = $request->price;
            $extraPrice->description = $request->description;
            $extraPrice->adminDesigner_id = $adminDesigner_id;
            if($extraPrice->save()){
                // Storing History of that event
                $chm= new ChangeEmailHistory(); 
                $chm->email=Auth::user()->email;
                $chm->type ='Extra Price';
                $chm->foreign_idd=$request->temporary_work_id;
                $chm->message='Extra Price created';
                $chm->save();
                // sending email to the client
                $temporaryWorkData = TemporaryWork::where('id', $request->temporary_work_id)->first();
                $clientEmail = $temporaryWorkData->client_email;
                Notification::route("mail", $clientEmail)->notify(new AddExtraPriceNotification($request->temporary_work_id, $clientEmail, 'Designer'));
                toastSuccess("Extra price added");
                return Redirect::back();
            }
        }catch(\Exception $e){
            dd($e->getMessage(), $e->getLine());
        }
    }


    public function generateinvoice(){
            $user = Auth::user();
            $userCompany = isset($user->companyProfile->company_name) ? $user->companyProfile->company_name : ''; 
            $countInvoice = Invoice::where('admindesigner_id',Auth::id())->count();
            $userCompany = explode(" ", $userCompany);
            $first = isset($userCompany[0],) ? strtoupper(substr($userCompany[0], 0,1)) : '';
            $second = isset($userCompany[1],) ? strtoupper(substr($userCompany[1], 0,1)) : '';
            $third = isset($userCompany[2],) ? strtoupper(substr($userCompany[2], 0,1)) : '';
            $companyShorts=$first.$second.$third;
            $invoice_number = $countInvoice + 1;
            $invoice_number = sprintf("%03d", $invoice_number);
            $invoice_number  = !empty($companyShorts) ? $companyShorts.'-'.$invoice_number : 'INV-'.$invoice_number;  
            return view('dashboard.adminDesigners.manage_invoice',['user'=>$user,'invoice_number'=>$invoice_number]);
    }   
    
    public function saveinvoice(Request $request){
        // dd($request->all());
        $request->validate([
            'date' => 'required|date',
            'date_of_payment' => 'required|date', //|after_or_equal:date
            'send_email' => 'required|email',
        ]);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();

        $tableData = [];
        $user = Auth::user();
        // dd($user->companyProfile);
        for($i=0; $i<count($request->item); $i++){
            $tableData[] = [
                'item' => $request->item[$i],
                'description' => $request->description[$i],
                'quantity' => $request->quantity[$i],
                'unitPrice' => $request->price[$i],
                'amountGBP' => $request->amount[$i],
            ];
        }

        $data =[
            'tax_invoice' => $request->tax_invoice,
            'sender_email' => $request->send_email,
            'invoice_number' => $request->invoice_number,
            'payment_status' => 'Unpaid',
            'date_of_payment' => $request->date_of_payment,
            'date' => $request->date,
            'number' => $request->number,
            'reference' => $request->reference,
            'date' => $request->date,
            'bank' => $request->bank,
            'sort_code' => $request->sort_code,
            'account_no' => $request->account_no,
            'swiftbic' => $request->swiftbic,
            'iban' => $request->iban,
            'subtotal' => $request->subtotal,
            'totalvat' => $request->totalvat,
            'total_gbp' => $request->total_gbp,
        ];
        

        // Pass the table data to the Word blade file
        $html = View::make('word', compact('tableData','data','user'))->render();

        // $html = View::make('word')->render();
        // Save file
        $fileName = $request->invoice_number.".docx";
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($fileName);
          
        //saving the invoice data of designer
        $generate_invoice =  new Invoice;
        $generate_invoice->invoice_number = $request->invoice_number;
        $generate_invoice->file_name = $fileName;
        $generate_invoice->temporary_work_id = $request->temporary_work_id;
        $generate_invoice->date_of_payment = $request->date_of_payment;
        $generate_invoice->send_email = $request->send_email;
        $generate_invoice->status = 'Unpaid';
        $generate_invoice->admindesigner_id  = Auth::id();
        $generate_invoice->save();

        $chm= new ChangeEmailHistory();
        $chm->email= $request->send_email;
        $chm->type ='Invoice';
        $chm->foreign_idd=$request->temporary_work_id ?? '';
        $chm->message='Invoice Generated';
        // $chm->status = 2;
        // $chm->user_type = 'checker';
        $chm->save();

        response()->download(public_path($fileName));
        if($request->send_email)
        {
            $invoice_notify_msg = [
                'greeting' => 'Hello',
                'subject' => isset($user->companyProfile->company_name) ? 'Invoice | '.$user->companyProfile->company_name : 'Invoice',
                'body' => [
                     'message'=>'please find the attached Invoice.',
                    'invoice_number' => $request->invoice_number,
                    'attachfile' => $fileName,
                    'designer_company' => $user->companyProfile->company_name ?? '',
                    'type'=>1,
                    'invoiceId' => $generate_invoice->id ?? '',
                ],
                'thanks_text' => 'Thanks For Using our site',
            ];
            Notification::route('mail',  $request->send_email ?? '')->notify(new InvoiceNotification($invoice_notify_msg));
        }
        toastSuccess('Invoice Generated Successfully');
        return redirect()->route('invoices');
    }

    public function updateinvoicestatus(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = $request->status;
         if($invoice->save())
         {
            if($request->status == 'Paid'){
                $chm= new ChangeEmailHistory();
                $chm->email= Auth::user()->email;
                $chm->type ='Invoice';
                $chm->foreign_idd=$invoice->temporary_work_id;
                $chm->message='Payment status changed to paid';
                // $chm->status = 2;
                // $chm->user_type = 'checker';
                $chm->save();
            }else{
                $chm= new ChangeEmailHistory();
                $chm->email= Auth::user()->email;
                $chm->type ='Invoice';
                $chm->foreign_idd=$invoice->temporary_work_id;
                $chm->message='Payment status changed to unpaid';
                // $chm->status = 2;
                // $chm->user_type = 'checker';
                $chm->save();
            }
            toastSuccess('Invoice Status Successfully Updated');
         }
        return redirect()->back();
    }

    public function updatePaymentStatus(Request $request){
        $invoice_id = $request->invoice_id;
        $invoice = Invoice::find($invoice_id);
        $invoice->status = $request->status;
        if($invoice->save()){
            if($request->status == 'Paid'){
                $chm= new ChangeEmailHistory();
                $chm->email= Auth::user()->email;
                $chm->type ='Invoice';
                $chm->foreign_idd=$invoice->temporary_work_id;
                $chm->message='Payment status changed to paid';
                // $chm->status = 2;
                // $chm->user_type = 'checker';
                $chm->save();
            }else{
                $chm= new ChangeEmailHistory();
                $chm->email= Auth::user()->email;
                $chm->type ='Invoice';
                $chm->foreign_idd=$invoice->temporary_work_id;
                $chm->message='Payment status changed to unpaid';
                // $chm->status = 2;
                // $chm->user_type = 'checker';
                $chm->save();
            }
            toastSuccess('Invoice Status Updated Successfully');
        }
        return redirect()->back();
    }
    public function invoicepaymentreminder($id)
    {
        $id = \Crypt::decrypt($id);
        return view('dashboard.adminDesigners.receiver_invoice_details',compact('id'));
    }
    public function saveinvoicepaymentproof(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'invoice_payment_details' => 'required',
            'attachfile' => 'required|file',
        ]);
        $invoiceDetails = Invoice::with('userDetails')->find($id);
        if($request->file('attachfile'))
        {
            $filePath  = "invoices/invoice-receipts/";
            $public_path = public_path($filePath);
            $file = $request->file('attachfile');
            File::isDirectory($public_path) or File::makeDirectory($public_path, 0777, true, true);
            $filename = 'receipt'.'-'.$invoiceDetails->id.'-'.time() . rand(10000, 99999) . '.' .$file->getClientOriginalExtension();
            $file->move($public_path, $filename);
            $attachDoc = $filePath.$filename;
        }
        $invoice_notify_msg = [
            'greeting' => 'Hello',
            'subject' => 'Invoice Receipt Details',
            'body' => [
                'message'=>$request->invoice_payment_details,
                'invoice_number' => $invoiceDetails->invoice_number,
                'attachfile' => $attachDoc,
                'designer_company' => $invoiceDetails->userDetails->companyProfile->company_name ?? '',
                'type'=>0,
                'invoiceId' => $invoiceDetails->id ?? '',
            ],
            'thanks_text' => 'Thanks For Using our site',
        ];
        Notification::route('mail',  $invoiceDetails->userDetails->email ?? '')->notify(new InvoiceNotification($invoice_notify_msg));
        toastSuccess('Payment Details Sent Successfully');
        return redirect()->back();
    }

    public function saveManualInvoice(Request $request){
            // dd($request->all());
            $request->validate([
                'date' => 'required|date',
                'date_of_payment' => 'required|date|after_or_equal:date',
                'send_email' => 'required|email',
                'invoice_number' => 'required',
                'payment_status' => 'required'
            ]
        );
        try {
            if($request->file('attachfile')){
                $file = $request->file('attachfile');
                $filename = 'invoices/manual_invoices/' . rand(). '.' . $file->getClientOriginalExtension();
                $path = public_path('invoices/manual_invoices/');
                $file->move($path, $filename);
            }

            $user = Auth::user();

            //saving the invoice data of designer
            $generate_invoice =  new Invoice;
            $generate_invoice->invoice_number = $request->invoice_number;
            if($request->hasFile('attachfile')){
                $generate_invoice->file_name = $filename;
            }
            $generate_invoice->temporary_work_id = $request->temporary_work_id;
            $generate_invoice->date_of_payment = $request->date_of_payment;
            $generate_invoice->send_email = $request->send_email;
            if($request->payment_status == 'paid'){
                $generate_invoice->status = 'Paid';
            }else{
                $generate_invoice->status = 'Unpaid';
            }
            $generate_invoice->admindesigner_id  = Auth::id();
            $generate_invoice->save();

            $chm= new ChangeEmailHistory();
            $chm->email= $request->send_email;
            $chm->type ='Invoice';
            $chm->foreign_idd=$request->temporary_work_id ?? '';
            $chm->message='Invoice Generated';
            // $chm->status = 2;
            // $chm->user_type = 'checker';
            $chm->save();

            $invoice_notify_msg = [
                'greeting' => 'Hello',
                'subject' => 'Invoice Receipt Details',
                'body' => [
                    'message'=>'Client uploaded a Manual Invoice',
                    'invoice_number' => $request->invoice_number,
                    'attachfile' => $filename,
                    'designer_company' => $user->companyProfile->company_name ?? '',
                    'type'=>1,
                    'invoiceId' => $generate_invoice->id ?? '',
                ],
                'thanks_text' => 'Thanks For Using our site',
            ];
            Notification::route('mail',  $request->send_email)->notify(new InvoiceNotification($invoice_notify_msg));

            toastSuccess('Payment Details Sent Successfully');
            return redirect()->back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
}
