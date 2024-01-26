<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomination;
use App\Models\NominationCourses;
use App\Models\NominationQualification;
use App\Models\NominationExperience;
use App\Models\NominationCompetence;
use App\Models\CompanyProfile;
use App\Notifications\NominatinCompanyEmail;
use App\Notifications\DatabaseNotification;
use App\Models\User;
use App\Models\NominationComment;
use App\Models\NominationExtra;
use App\Models\Project;
use App\Models\ReviewRating;
use App\Utils\HelperFunctions;
use PDF;
use Notification;
use Redirect;
use DB;
use App\Notifications\ResendNomination;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Crypt;
class HomeController extends Controller
{
    // nomination form
    public function nomination_form($id)
    {
        try 
        {
           

            $userdata=explode(' ',$id);
            $userid= \Crypt::decrypt($userdata[0]);
            $projectid=\Crypt::decrypt($userdata[1]);
            $user=User::with('userCompany')->find($userid);
            //check if already nomination is submited
            $nomination=Nomination::with('projectt')->where(['user_id'=>$userid,'project'=>$projectid])->first();
            $latest_nomination = Nomination::with('projectt')->where('user_id',$userid)->latest()->first();
// dd($nomination->id);
            // dd($user);
          

            if($nomination)
            {
                $model=new NominationComment();
                $model=NominationComment::find(['project_id'=>$projectid, 'user_id'=>$user->id, 'nomination_id'=>$nomination->id]);
                if(!$model){
                    $model->email=$user->email;
                    $model->comment="User has Clicked on Nomination from email";
                    $model->type="Nomination Read";
                    // $model->send_date=date('Y-m-d H:i:s');
                    $model->read_date=date('Y-m-d  H:i:s');
                    $model->user_id=$user->id;
                    $model->project_id=$projectid;
                    $model->nomination_id=$nomination->id;
                    $model->save();
                }
                 return view('nomination',compact('nomination','user'));
            }elseif($latest_nomination)
            {
                $user=User::with('userCompany')->find($latest_nomination->user_id);
                $project_data= DB::table('users_has_projects')->where(['user_id'=>$userid,'project_id'=>$projectid])->first();
                $projects = Project::with('company')->where('id', $project_data->project_id)->get();
                $courses=NominationCourses::where('nomination_id',$latest_nomination->id)->get();
                $qualifications=NominationQualification::where('nomination_id', $latest_nomination->id)->get();
                $experience=NominationExperience::where('nomination_id',$latest_nomination->id)->get();
                $competence=NominationCompetence::where('nomination_id', $latest_nomination->id)->first();
                return view('nomination',compact('latest_nomination','user','projects','project_data','courses','qualifications','experience','competence'));
            }
            else{
                $project_data= DB::table('users_has_projects')->where(['user_id'=>$user->id,'project_id'=>$projectid])->first();
                $projects = Project::with('company')->where('id', $project_data->project_id)->get();
                return view('nomination',compact('user','projects','project_data'));
             }
        } catch (\Exception $exception) {
            dd($exception->getMessage());

            toastError('Something went wrong, try again!');
            return back();
        }
    }

    //
    public function nomination_formm($id)
    {
       $userid= \Crypt::decrypt($id);
       $project='';
       if(isset($_GET['project']))
       {
        $project=$_GET['project'];
       }
       $user=User::find($userid);

       $commentsdata=NominationComment::find(['project_id'=>\Crypt::decrypt($project)]);
       if(!$commentsdata){
            $model=new NominationComment();
            $model->email=$user->email;
            $model->comment="User Read the email";
            $model->type="Nomination";
            $model->read_date=date('Y-m-d H:i:s');
            $model->user_id=$userid;
            $model->project_id=\Crypt::decrypt($project);
            $model->save();
       }
       $userdata=$id.' '.$project;
       return Redirect::route('nomination-form',$userdata);
       
    }

    public function resend_nomination_form($user_id,$project_id)
    {
  
        try{
            $nomination = Nomination::where(['project'=>$project_id,'user_id'=>$user_id])->first();
            $user = User::find($user_id);
            $user->nominationId = $nomination->id;
            $url = url('Nomination/nomination-edit',Crypt::encrypt($nomination->id));
            Notification::route('mail',$user->email ?? '')->notify(new ResendNomination($user,$url));
            toastSuccess('status changed successfully');
            return Redirect::back();
         } catch (\Exception $exception) {
            DB::rollback();
            toastError($exception->getMessage());
            return back();
        }
    }
    //save nomination form
    public function nomination_save(Request $request)
    {//
         DB::beginTransaction();
         try {
            $user=User::with('userCompany')->find($request->user_id);
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
            $projectdata=Project::find($request->project);

            //upload cv
            $cv='';
            if ($request->file('cv')) {
                $filePath = HelperFunctions::nominationCvPath();
                $file = $request->file('cv');
                $cv = HelperFunctions::saveFile(null, $file, $filePath);
            }
            if(isset($request->latest_cv))
            {
                $file = $request->file('cv');
                if(!isset($file)) {
                    $cv = $request->latest_cv;
                }
            }
            $all_inputs=[
                'project'=>$request->project,
                'project_manager'=>$request->project_manager,
                'nominated_person'=>$request->nominated_person,
                'nominated_role'=>$request->nominated_role,
                'nominated_person_employer'=>$request->nominated_person_employer,
                'description_of_role'=>$request->description_of_role,
                'Description_limits_authority'=>$request->Description_limits_authority,
                'authority_issue_permit'=>$request->authority_issue_permit,
                'print_name'=>$request->print_name,
                'job_title'=>$request->job_title,
                'signature'=>$image_name,
                'print_name1'=>$request->print_name1,
                'job_title1'=>$request->job_title1,
                'signature1'=>$request->signature1,
                'user_id'=>$request->user_id,
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

                User::find($request->user_id)->update(['user_notify'=>1]);
                $user=User::find($request->user_id);
                $user->project=$request->project;
                $company=User::find($user->company_id);


                $model=new NominationComment();
                $model->email=$user->email;
                $model->comment="User has submitted Nominatin form"; //to company ".$company->email."
                $model->type="Nomination";
                $model->send_date=date('Y-m-d H:i:s');
                // $model->read_date=date('Y-m-d');
                $model->user_id=$user->id;
                $model->project_id=$request->project;
                $model->nomination_id=$nomination->id;
                $model->save();

               $pdf = PDF::loadView('layouts.pdf.nomination',['data'=>$request->all(),'signature'=>$image_name,'project_no'=>$projectdata->no,'images'=>$images,'qimages'=>$qimages,'cimages'=>$cimages,'user'=>$user,'company'=>$company,'qualificationscount'=>$qualificationscount,'cv'=>$cv]);
                    $path = public_path('pdf');
                    $filename =rand().'nomination.pdf';
                    $pdf->save($path . '/' . $filename);
                    //merge pdf files
                    $pdf = PDFMerger::init();
                    $pdf->addPDF($path . '/' . $filename, 'all');
                     //nomination courses
                    foreach($images as $img)
                    {
                         $n = strrpos($img, '.');
                         $ext=substr($img, $n+1);
                         if($ext=='pdf')
                         {  
                           $pdf->addPDF($img, 'all');   
                         }
                    }

                    $pdf->merge();
                    $pdf->save($path . '/' . $filename);
                   

                    Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename,$user));
                    // $company->notify(new DatabaseNotification($user,'Nomination Form submitted by user'));
                    DB::commit();
                    toastSuccess('Nomination Form save successfully!');
                    return back();


            }

        } catch (\Exception $exception) {
             if($exception->getMessage()=="This PDF document is encrypted and cannot be processed with FPDI.")
            {
                 $pdf->save($path . '/' . $filename);
                 Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename,$user));
                    DB::commit();
                      toastSuccess('Nomination Form save successfully!');
                    return back();

            }elseif($exception->getMessage()=="This PDF document probably uses a compression technique which is not supported by the free parser shipped with FPDI. (See https://www.setasign.com/fpdi-pdf-parser for more details)")
            {
                $pdf->save($path . '/' . $filename);
                 Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename,$user));
                    DB::commit();
                    toastSuccess('Nomination Form save successfully!');
                    return back();
            }
            else{
                DB::rollback();
                toastError($exception->getMessage());
                return back();
            }
            
        }
    }



    //edit nomination ofrm
    public function nomination_edit($id)
    {
        try 
        {
            $nominationid= \Crypt::decrypt($id);
            $nomination=Nomination::find($nominationid);
            $user=User::with('userCompany')->find($nomination->user_id);
            $projectdata = DB::table('users_has_projects')->where(['user_id'=>$user->id,'project_id'=>$nomination->project])->first();
            $projects = Project::with('company')->where('id', $projectdata->project_id)->get();
            $courses=NominationCourses::where('nomination_id',$nomination->id)->get();
            $qualifications=NominationQualification::where('nomination_id', $nomination->id)->get();
            $experience=NominationExperience::where('nomination_id',$nomination->id)->get();
            $competence=NominationCompetence::where('nomination_id', $nomination->id)->first();
            return view('nomination_edit',compact('user','projects','nomination','courses','qualifications','experience','competence'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return back();
        }
    }

    //update nominations
    public function nomination_update(Request $request)
    {
        DB::beginTransaction();
        try {
            $user=User::with('userCompany')->find($request->user_id);
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
            $projectdata=Project::find($request->project);
            //upload cv
            $cv='';
            if ($request->file('cv')) {
                $filePath = HelperFunctions::nominationCvPath();
                $file = $request->file('cv');
                $cv = HelperFunctions::saveFile(null, $file, $filePath);
            }
            if($cv==''){
                $all_inputs=[
                    'project'=>$request->project,
                    'project_manager'=>$request->project_manager,
                    'nominated_person'=>$request->nominated_person,
                    'nominated_role'=>$request->nominated_role,
                    'nominated_person_employer'=>$request->nominated_person_employer,
                    'description_of_role'=>$request->description_of_role,
                    'Description_limits_authority'=>$request->Description_limits_authority,
                    'authority_issue_permit'=>$request->authority_issue_permit,
                    'print_name'=>$request->print_name,
                    'job_title'=>$request->job_title,
                    'signature'=>$image_name,
                    'print_name1'=>$request->print_name1,
                    'job_title1'=>$request->job_title1,
                    'signature1'=>$request->signature1,
                    'user_id'=>$request->user_id,
                    'status'=>0,
                ];
            }else{
                $all_inputs=[
                    'project'=>$request->project,
                    'project_manager'=>$request->project_manager,
                    'nominated_person'=>$request->nominated_person,
                    'nominated_role'=>$request->nominated_role,
                    'nominated_person_employer'=>$request->nominated_person_employer,
                    'description_of_role'=>$request->description_of_role,
                    'Description_limits_authority'=>$request->Description_limits_authority,
                    'authority_issue_permit'=>$request->authority_issue_permit,
                    'print_name'=>$request->print_name,
                    'job_title'=>$request->job_title,
                    'signature'=>$image_name,
                    'print_name1'=>$request->print_name1,
                    'job_title1'=>$request->job_title1,
                    'signature1'=>$request->signature1,
                    'user_id'=>$request->user_id,
                    'status'=>0,
                    'cv'=>$cv,
    
                ];
            }
            

               Nomination::where(['user_id'=>$request->user_id,'project'=>$request->project])->update($all_inputs);
               $nomination=Nomination::with('projectt')->where(['user_id'=>$request->user_id,'project'=>$request->project])->first();
            if($nomination)
            {
                 $images=[];
                 $qimages=[];
                //nomination qualifications
                for($i=0;$i<count($request->qualification);$i++)
                {
                    if($request->qualification[$i])
                    {
                        if(isset($request->qualifications_ids[$i]))
                        {
                        $model=NominationQualification::where('id',$request->qualifications_ids[$i])->first();
                        }
                        else{
                            $model= new NominationQualification();
                        }
                        if($_FILES['qualification_file']['name'][$i]!=""){
                        // if ($request->file('qualification_file')) {
                            $filePath = HelperFunctions::nominationqualificationpath();
                            $file = $request->file('qualification_file');
                            if(isset($file[$i]))
                            {
                            $imagename = HelperFunctions::saveFile(null, $file[$i], $filePath);
                            $model->qualification_certificate=$imagename;
                            $images[]=$imagename;
                            $qimages[]=$imagename;
                            }
                        
                        }
                        else
                        {
                            $images[]=$model->qualification_certificate;
                            $qimages[]=$model->qualification_certificate;
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
                        if(isset($request->course_ids[$i]))
                        {
                            $model=NominationCourses::where('id',$request->course_ids[$i])->first();
                        }
                        else{
                            $model= new NominationCourses();
                        }
                        if($_FILES['course_file']['name'][$i]!=""){
                        // if ($request->file('course_file')) {
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
                        else
                        {
                            $images[]= $model->course_certificate;
                            $cimages[]=$model->course_certificate;
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


                $user=User::find($request->user_id);
                $user->nomination_status=0;
                $user->user_notify=1;
                $user->save();
                $user->project=$request->project;
                $company=User::find($user->company_id);


                $model=new NominationComment();
                $model->email=$user->email;
                $model->comment="User has Updated the nomination form";  //to company ".$company->email."
                $model->type="Nomination";
                $model->send_date=date('Y-m-d H:i:s');
                // $model->read_date=date('Y-m-d');
                $model->user_id=$user->id;
                $model->project_id=$request->project;
                $model->nomination_id=$nomination->id;
                $model->save();
               $pdf = PDF::loadView('layouts.pdf.nomination',['data'=>$request->all(),'signature'=>$image_name,'project_name'=>$projectdata->name, 'project_no'=>$projectdata->no,'images'=>$images,'qimages'=>$qimages,'cimages'=>$cimages,'user'=>$user,'company'=>$company,'cv'=>$cv]);
                    $path = public_path('pdf');
                    $filename =uniqid().'-nomination.pdf';
                    // @unlink($nomination->pdf_url);
                    $pdf->save($path . '/' . $filename);
                     
                    //merge pdf files
                    $pdf = PDFMerger::init();
                    $pdf->addPDF($path . '/' . $filename, 'all');
                     //nomination courses
                    foreach($images as $img)
                    {
                         $n = strrpos($img, '.');
                         $ext=substr($img, $n+1);
                         if($ext=='pdf')
                         {
                            
                                  $pdf->addPDF($img, 'all'); 
                             
                            
                         }
                       
                    }
                    $pdf->merge();
                    $pdf->save($path . '/' . $filename);
                  
                   if(empty($nomination->pdf_url))
                   {
                    Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                   }
                   else{
                    $nomination_extras = new NominationExtra();
                    $nomination_extras->fileName = $filename;
                    $nomination_extras->nomination_id = $nomination->id;
                    $nomination_extras->save();
                   }
                   $nomination_extras = NominationExtra::where('nomination_id',$nomination->id)->get();
                    // Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename,$user));

                    DB::commit();
                    
                    // $model=new NominationComment();
                    // $model->email=$user->email;
                    // $model->comment="User has Updated Nomination form";
                    // $model->type="Nomination Updated";
                    // // $model->send_date=date('Y-m-d H:i:s');
                    // $model->read_date=date('Y-m-d  H:i:s');
                    // $model->user_id=$user->id;
                    // $model->project_id=$request->project;
                    // $model->nomination_id=$nomination->id;
                    // $model->save();

                    toastSuccess('Nomination Form updated successfully!');
                    $id=\Crypt::encrypt($user->id);
                    return view('nomination',compact('nomination','id','user', 'nomination_extras'));

            }

        } catch (\Exception $exception) {
            
            if($exception->getMessage()=="This PDF document is encrypted and cannot be processed with FPDI.")
            {
                
                 $pdf->save($path . '/' . $filename);
                  Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename,$user));
                    DB::commit();
                      toastSuccess('Nomination Form save successfully!');
                    return back();

            }elseif($exception->getMessage()=="This PDF document probably uses a compression technique which is not supported by the free parser shipped with FPDI. (See https://www.setasign.com/fpdi-pdf-parser for more details)")
            {
                $pdf->save($path . '/' . $filename);
                 Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename,$user));
                    DB::commit();
                      toastSuccess('Nomination Form save successfully!');
                    return back();
            }
            else{
                DB::rollback();
                toastError($exception->getMessage());
                return back();
            }
            
            
        }
    }

    public function nomination_get_comments(Request $request)
    {
        $id=$request->Userid;
        $projectId=$request->project;
        $ncomments=NominationComment::where(['user_id'=>$id,'project_id'=>$projectId])->get();
        $list='';
        $i=1;
        foreach($ncomments as $comment)
        {
            $list.="<tr><td>".$i."</td><td>".$comment->email."</td><td>".$comment->comment."</td>";
            $list.="<td>".$comment->type."</td><td>".$comment->send_date."</td><td>".$comment->read_date."</td></tr>";
            $i++;
        }
        echo $list;
    }


    //user Appointment letter
    public function User_Appointment($id)
    {
         $userid= \Crypt::decrypt($id);
         $user=User::with('userCompany')->find($userid);
           $project='';
           if(isset($_GET['project']))
           {
            $project=\Crypt::decrypt($_GET['project']);
           }

        $nomination=Nomination::with('projectt')->where(['user_id'=>$userid,'project'=>$project])->first();
         
         if($nomination->appointment_pdf)
         {
             $userdata=$id.' '.$_GET['project'];
             return redirect()->route('nomination-form', $userdata);
         }
         else
         {
           return view('dashboard.users.appointment',compact('id','user','nomination')); 
         }
         
    }

    //appointment save
    public function User_Appointment_save(Request $request)
    {

        $user=User::with('userCompany')->find($request->user_id);
        $company=User::find($user->userCompany->id);
        $nomination=Nomination::with('projectt')->find($request->nominationId);
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
        if($user->roles->pluck('name')[0]=='user')
        {
           $pdf = PDF::loadView('layouts.pdf.appointment',['user'=>$user,'signature'=>$image_name,'nomination'=>$nomination,'data'=>$request->all()]); 
        }elseif($user->roles->pluck('name')[0]=='supervisor' || $user->roles->pluck('name')[0]=='visitor')
        {
            $pdf = PDF::loadView('layouts.pdf.tws-appointment',['user'=>$user,'signature'=>$image_name,'nomination'=>$nomination,'data'=>$request->all()]);
        }
        else{
            $pdf = PDF::loadView('layouts.pdf.twc-appointment',['user'=>$user,'signature'=>$image_name,'nomination'=>$nomination,'data'=>$request->all()]);
        }
        //return $pdf->stream('document.pdf');
        $path = public_path('pdf');
        $filename =$user->id.'appointment.pdf';
        @unlink($path . '/' . $filename);
        $pdf->save($path . '/' . $filename);
        //old senerio work

        // User::find($request->user_id)->update([
        //     'appointment_pdf'=>$filename,
        //     'appointment_signature'=>$image_name,
        //     'appointment_date'=>$request->date,
        // ]);

        //new senerio work
        //  DB::table('users_has_projects')->where(['user_id'=>$request->user_id,'project_id'=>$nomination->project])->update([
        //     'appointment_pdf'=>$filename,
        //     'appointment_signature'=>$image_name,
        //     'appointment_date'=>$request->date,
        // ]);
        Nomination::find($request->nominationId)->update([
            'appointment_pdf'=>$filename,
            'appointment_signature'=>$image_name,
            'appointment_date'=>$request->date,
        ]);
        User::find($request->user_id)->update([
            'user_notify'=>2
         ]);
        $type='appointment';
        $user->project=$nomination->project;
         Notification::route('mail',$user->userCompany->email ?? '')->notify(new NominatinCompanyEmail($company,$filename,$user,$type));
         $userdata=\Crypt::encrypt($request->user_id).' '.\Crypt::encrypt($nomination->project);
         return redirect()->route('nomination-form',$userdata);

    }

    public function markNotification(Request $request)
    {
            auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    //company profile
    public function companyProfile($id)
    {
        $companyProfile=CompanyProfile::with('otherdocs')->where(['user_id'=>$id])->first();
        $adminDesigner = User::with('usernomination')->where('added_by' , 1 )->get();
        $designerList=User::with('usernomination')->where(['di_designer_id'=>$id])->get();
        // dd($designerList);
        // $designerList = $adminDesigner->merge($designerList);

        // dd($designerList);

        $ratings=ReviewRating::with('user')->where(['user_id'=>$id])->get();
        //avg rating
        $avgratings=ReviewRating::where(['user_id'=>$id])->avg('star_rating');
        return view('companyProfile',compact('companyProfile','designerList','ratings','avgratings'));
    }
}
