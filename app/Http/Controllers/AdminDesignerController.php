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
use App\Notifications\AdminDesignerAppointmentNotification;
use App\Models\{Nomination,NominationExperience,NominationCompetence,Project,EstimatorDesignerList,TemporaryWork,CompanyProfile,EstimatorDesignerListTask,ProfileOtherDocuments};
use Carbon\Carbon;
use App\Utils\HelperFunctions;
use DB;
use Auth;
use Notification;
use PDF;

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

        $data = User::with('companyProfile')->role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->latest()->get();
        // dd($data);
        
        abort_if(!$user->hasAnyRole(['admin','company']), 403);
        try {
            if ($request->ajax()) {
                $data = User::with('companyProfile')->role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->latest()->get();
                return Datatables::of($data)
                    ->removeColumn('id')
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
                    ->rawColumns(['action'])
                    ->make(true);
            }

             return view('dashboard.adminDesigners.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
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
            $AwardedEstimators=TemporaryWork::with('designer.quotationSum','designerQuote','project.company' , 'comments', 'designerAssign','checkerAssign')
            ->whereIn('id',$awarded)
            ->orWhere('created_by', Auth::user()->id)
            ->where('work_status', 'publish')
            ->get();
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
        if ($loggedInUser->di_designer_id !== null) {
            // Child Designer
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')
                ->where([
                    'temporary_work_id' => $request->temporary_work_id,
                    'type' => 'designer',
                    // 'user_id' => $loggedInUser->id
                ])
                ->first();
            $designer = ($estimatorDesigner->user_id == $loggedInUser->id) ? true : false;    
        } else {
            // Admin Designer
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')
                ->whereHas('Estimator', function ($query) use ($loggedInUser) {
                    $query->where('created_by', $loggedInUser->id);
                })
                ->where('type','designer')
                ->where('temporary_work_id', $request->temporary_work_id)
                ->first();
        }
        return view('dashboard.designer.designer_table',['estimatorDesigner' => $estimatorDesigner, 'designer' => $designer]);
    }

    public function awardedEstimatorModalChecker(Request $request)
    {

        $loggedInUser = Auth::user();
        $checker = false;
        if ($loggedInUser->di_designer_id !== null) {
            // Child Designer
            $estimatorDesigner = EstimatorDesignerList::with('estimatorDesignerListTasks')
                ->where([
                    'temporary_work_id' => $request->temporary_work_id,
                    'type' => 'checker',
                    // 'user_id' => $loggedInUser->id
                ])
                ->first();
            $checker = ($estimatorDesigner->user_id == $loggedInUser->id) ? true : false ;
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
        $users = User::where('di_designer_id',$loggedInUser->id)->get();
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
            $designer_tasks = new EstimatorDesignerListTask();
            $designer_tasks->estimator_designer_list_id = $id;
            $designer_tasks->date = $request->date;
            $designer_tasks->hours = $request->hours;
            $designer_tasks->completed = $request->completed;
            $designer_tasks->task = $request->task;
            // $designer_tasks->user_id = Auth::user()->id;
            $designer_tasks->save();
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
        Validations::storeAdminDesigner($request);
        try {
            $userprojectdata=[];
            $all_inputs = $request->except('_token', 'role');
            $all_inputs['password'] = Hash::make($request->password);
            $all_inputs['email_verified_at'] = now();
            $all_inputs['added_by']=Auth::user()->id;
            if(Auth::user()->hasRole(['designer','Design Checker','Designer and Design Checker']))
            {
                $all_inputs['di_designer_id']=Auth::user()->id;
            }
            $user = User::create($all_inputs);
            $user->assignRole($request->role);

            //password reset link send to designer 
            $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
            DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
            Notification::route('mail', $request->email)->notify(new PasswordResetNotification($token,$request->email));
            if(Auth::user()->hasRole('admin'))
            {
                //Notification::route('mail',$user->email ?? '')->notify(new AdminDesignerNotification($user));
            }
            else{
                Notification::route('mail',$user->email ?? '')->notify(new AdminDesignerNotification($user));
            }
            
            toastSuccess('User successfully added!');
            if(Auth::user()->hasRole('admin'))
            {
                return redirect()->route('adminDesigner.index');
            }
            else
            {
                return redirect()->route('adminDesigner.designerList');
            }
            
        } catch (\Exception $exception) {
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
            $all_inputs = $request->except('_token', '_method');

            User::find($id)->update([
                'name' => $all_inputs['name'],
                'email' => $all_inputs['email'],
            ]);
            toastSuccess('Designer Updated Successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong');
            return Redirect::back();
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
        $nomination=Nomination::where(['user_id'=>Auth::user()->id])->first();

        return view('dashboard.adminDesigners.createNomination',compact('nomination'));
    }

    //save notimation
    public function saveNomination(Request $request,$id)
    {
        DB::beginTransaction();
        try {
            $user=User::with('userCompany')->find(Auth::user()->id);
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
                'cv'=>$cv,
            ];

            $nomination=Nomination::create($all_inputs);
            if($nomination)
            {
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

                //pdf wok
                $pdf = PDF::loadView('layouts.pdf.adminDiDesignerNomination',['data'=>$request->all(),'signature'=>$image_name,'user'=>$user,'cv'=>$cv]);
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
            $experience=NominationExperience::where('nomination_id',$nomination->id)->get();
            $competence=NominationCompetence::where('nomination_id', $nomination->id)->first();
            $user=User::find($nomination->user_id);
            return view('dashboard.adminDesigners.editNomination',compact('user','nomination','experience','competence'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return back();
        }
    }
    //
    public function updateNomination(Request $request,$id)
    {
         DB::beginTransaction();
        try {
            $user=User::find(Auth::user()->id);
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

                $user=User::find(Auth::user()->id);
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
                    DB::commit();
                    toastSuccess('Nomination Form updated successfully!');
                    return redirect()->to('adminDesigner/create-nomination/'.$user->id); 

            }

        } catch (\Exception $exception) {
                DB::rollback();
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
            $all_inputs = $request->except('_token','logo','company_cv','indemnity_insurance','images','other_doucuments_name','other_doucuments_document');
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

            
            //work for upload images here
            // $image_links = [];
            // if ($request->file('images')) {
            //     $filePath  = 'uploads/designercompany/others/';
            //     $files = $request->file('images');
            //     foreach ($files  as $key => $file) {
            //         $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            //         $image_links[] = $imagename;
            //     }
            //     $all_inputs['other_files']=json_encode($image_links);
            // }
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
            toastSuccess('Company Profile Created successfully');
            return redirect()->back();
            
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
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
        $editProfile=CompanyProfile::with('otherdocs')->find($id);
        return view('dashboard.adminDesigners.editProfile',compact('editProfile'));
    }

    //update Profile
    public function updateProfile(Request $request,$editProfile)
    {
        $editProfile=companyProfile::find($editProfile);
        try {
            $all_inputs = $request->except('_token','logo','company_cv','indemnity_insurance','images','preloaded','other_doucuments_name','other_doucuments_document');
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

            toastSuccess('Company Profile Updated successfully');
            return redirect()->back();
            
        } catch (\Exception $exception) {
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
                        if($data->user_notify==1)
                        {
                            $class='redBgBlink';
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
                                <a href="'.url('adminDesigner/designer-details',$data->id).'" class="btn btn-icon '.$class.'"><i class="fa fa-eye"></i></a>
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
        $userNomination=Nomination::where(['user_id'=>$id])->first();
        $User=User::find($id);
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
                    'print_name1'=>Auth::user()->name,
                    'job_title1'=>Auth::user()->job_title,
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
                Notification::route('mail',$user->email ?? '')->notify(new AdminDesignerNomination($user,$status));  
            }
            else{
                 Nomination::find($request->nominationid)->update(['status'=>2,'nomination_approve_reject_date'=>date('Y-m-d H:i:s')]);
                 $nomination=Nomination::find($request->nominationid);
                 $status='Rejected';
                Notification::route('mail',$user->email ?? '')->notify(new AdminDesignerNomination($user,$status)); 
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
        $nomination=Nomination::where(['user_id'=>Auth::user()->id])->first();
        $user=User::find($id);
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
    //    try
    //    {
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
                'user_notify'=>1
             ]);
            Notification::route('mail',$user->userDiCompany->email ?? '')->notify(new AdminDesignerAppointmentNotification($user));
            DB::commit();
            toastSuccess('Appointment Saved successfully');
            return redirect('adminDesigner/create-nomination/'.$user->id);
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     toastError('Something went wrong, try again!' );
        //     return Redirect::back();
        // }
       
    }
}
