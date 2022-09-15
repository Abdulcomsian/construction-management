<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomination;
use App\Models\NominationCourses;
use App\Models\NominationQualification;
use App\Models\NominationExperience;
use App\Models\NominationCompetence;
use App\Notifications\NominatinCompanyEmail;
use App\Models\User;
use App\Models\NominationComment;
use App\Models\Project;
use App\Utils\HelperFunctions;
use PDF;
use Notification;
use Redirect;
use DB;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
class HomeController extends Controller
{
    // nomination form
    public function nomination_form($id)
    {
        try 
        {

            $userid= \Crypt::decrypt($id);
            //check if already nomination is submited
            $nomination=Nomination::where('user_id',$userid)->first();
            if($nomination)
            {
                 return view('nomination',compact('nomination','id'));
            }
            else{
                $user=User::with('userCompany')->find($userid);
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                        $ids = [];
                        foreach ($project_idds as $id) {
                            $ids[] = $id->project_id;
                        }
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                return view('nomination',compact('user','projects'));
             }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return back();
        }
    }

    //
    public function nomination_formm($id)
    {
       $userid= \Crypt::decrypt($id);
       $user=User::find($userid);


       $model=new NominationComment();
       $model->email=$user->email;
       $model->comment="User Read the email";
       $model->type="Nomination";
       $model->read_date=date('Y-m-d');
       $model->user_id=$userid;
       $model->save();
       return Redirect::route('nomination-form', $id);
       
    }

    //save nomination form
    public function nomination_save(Request $request)
    {

        DB::beginTransaction();
         // try {
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
            $all_inputs=[
                'project'=>$request->project,
                'project_manager'=>$request->project_manager,
                'nominated_person'=>$request->nominated_person,
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

            ];


            $nomination=Nomination::create($all_inputs);
            if($nomination)
            {
                //nomination courses
                $images=[];
                for($i=0;$i<count($request->course);$i++)
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
                        }
                    
                    }
                    
                    $model->course=$request->course[$i];
                    $model->date=$request->course_date[$i];
                    $model->nomination_id=$nomination->id;
                    $model->save();
                }

                //nomination qualifications
                for($i=0;$i<count($request->qualification);$i++)
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
                        }
                    
                    }
                    $model->qualification=$request->qualification[$i];
                    $model->date=$request->qualification_date[$i];
                    $model->nomination_id=$nomination->id;
                    $model->save();
                }

                //nomination experience
                for($i=0;$i<count($request->project_title);$i++)
                {
                    $model=new NominationExperience();
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


                $user=User::find($request->user_id);
                $company=User::find($user->company_id);


                $model=new NominationComment();
                $model->email=$user->email;
                $model->comment="User submit the nominatin form to company ".$company->email."";
                $model->type="Nomination";
                $model->send_date=date('Y-m-d');
                $model->read_date=date('Y-m-d');
                $model->user_id=$user->id;
                $model->save();

               $pdf = PDF::loadView('layouts.pdf.nomination',['data'=>$request->all(),'signature'=>$image_name,'project_no'=>$projectdata->no,'images'=>$images,'user'=>$user]);
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

                   
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename));

                    DB::commit();
                    toastSuccess('Nomination Form save successfully!');
                    return back();


            }

        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     toastError($exception->getMessage());
        //     return back();
        // }
    }



    //edit nomination ofrm
    public function nomination_edit($id)
    {
        try 
        {
            $userid= \Crypt::decrypt($id);
            $user=User::with('userCompany')->find($userid);
            $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->project_id;
            }
            $projects = Project::with('company')->whereIn('id', $ids)->get();
            $nomination=Nomination::where('user_id',$userid)->first();
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
            $all_inputs=[
                'project'=>$request->project,
                'project_manager'=>$request->project_manager,
                'nominated_person'=>$request->nominated_person,
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

            ];

               Nomination::where('user_id',$request->user_id)->update($all_inputs);
               $nomination=Nomination::where('user_id',$request->user_id)->first();
            if($nomination)
            {
                //nomination courses
                $images=[];
                for($i=0;$i<count($request->course);$i++)
                {
                    if(isset($request->course_ids[$i]))
                    {
                        $model=NominationCourses::where('id',$request->course_ids[$i])->first();
                    }
                    else{
                        $model= new NominationCourses();
                    }
                    
                    if ($request->file('course_file')) {
                        $filePath = HelperFunctions::nominationcoursepath();
                        $file = $request->file('course_file');
                        if(isset($file[$i]))
                        {
                        $imagename = HelperFunctions::saveFile(null, $file[$i], $filePath);
                        $model->course_certificate=$imagename;
                        $images[]=$imagename;
                        }
                    
                    }
                    else
                    {
                        $images[]= $model->course_certificate;
                    }
                    
                    $model->course=$request->course[$i];
                    $model->date=$request->course_date[$i];
                    $model->nomination_id=$nomination->id;
                    $model->save();
                }

                //nomination qualifications
                for($i=0;$i<count($request->qualification);$i++)
                {
                    if(isset($request->qualifications_ids[$i]))
                    {
                    $model=NominationQualification::where('id',$request->qualifications_ids[$i])->first();
                    }
                    else{
                        $model= new NominationQualification();
                    }
                    if ($request->file('qualification_file')) {
                        $filePath = HelperFunctions::nominationqualificationpath();
                        $file = $request->file('qualification_file');
                        if(isset($file[$i]))
                        {
                        $imagename = HelperFunctions::saveFile(null, $file[$i], $filePath);
                        $model->qualification_certificate=$imagename;
                        $images[]=$imagename;
                        }
                    
                    }
                    else
                    {
                        $images[]=$model->qualification_certificate;
                    }
                    $model->qualification=$request->qualification[$i];
                    $model->date=$request->qualification_date[$i];
                    $model->nomination_id=$nomination->id;
                    $model->save();
                }

                //nomination experience
              
                for($i=0;$i<count($request->project_title);$i++)
                {
                    if(isset($request->$request->experience_ids[$i]))
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
                $company=User::find($user->company_id);


                $model=new NominationComment();
                $model->email=$user->email;
                $model->comment="User Update the nominatin form to company ".$company->email."";
                $model->type="Nomination";
                $model->send_date=date('Y-m-d');
                $model->read_date=date('Y-m-d');
                $model->user_id=$user->id;
                $model->save();

               $pdf = PDF::loadView('layouts.pdf.nomination',['data'=>$request->all(),'signature'=>$image_name,'project_no'=>$projectdata->no,'images'=>$images,'user'=>$user]);
                    $path = public_path('pdf');
                    $filename =rand().'nomination.pdf';
                    $pdf->save($path . '/' . $filename);
                    @unlink($nomination->pdf_url);
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

                   
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename));

                    DB::commit();
                    toastSuccess('Nomination Form save successfully!');
                    return back();

            }

        } catch (\Exception $exception) {
            DB::rollback();
            toastError($exception->getMessage());
            return back();
        }
    }

    public function nomination_get_comments(Request $request)
    {
        $id=$request->nominationId;
       
        $ncomments=NominationComment::where(['nomination_id'=>$id])->get();
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
}
