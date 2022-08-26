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
class HomeController extends Controller
{
    // nomination form
    public function nomination_form($id)
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
           return view('nomination',compact('user','projects'));
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

      // try {
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
                for($i=0;$i<count($request->course);$i++)
                {
                    $model=new NominationCourses();
                    if ($request->file('course_file')) {
                        $filePath = HelperFunctions::nominationcoursepath();
                        $file = $request->file('course_file');
                        $imagename = HelperFunctions::saveFile(null, $file[$i], $filePath);
                        $model->course_certificate=$imagename;
                    
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
                        $imagename = HelperFunctions::saveFile(null, $file[$i], $filePath);
                        $model->qualification_certificate=$imagename;
                    
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
                        'Temporary offices'=>$request->Temporary_offices,
                        'Sign boards'=>$request->Sign_boards,
                        'Hoardings'=>$request->Hoardings,
                        'Access gantries'=>$request->Access_gantries,
                        'Fuel storage'=>$request->Fuel_storage,
                        'Temporary roads'=>$request->Temporary_roads,
                        'Barriers'=>$request->Barriers,
                        'Welfare facilities'=>$request->Welfare_facilities,
                        'Precast facilities'=>$request->Precast_facilities,
                        'Access bridges'=>$request->Access_bridges,
                ];

                $Access_scaffolding=[
                        'Tube & fitting'=>$request->Tube_fitting,
                        'System scaffolding'=>$request->System_scaffolding,
                        'System staircases'=>$request->System_staircases,
                        'Temporary roofs'=>$request->Temporary_roofs,
                        'Loading bays'=>$request->Loading_bays,
                        'Chute support'=>$request->Chute_support,
                        'Mobile towers'=>$request->Mobile_towers,
                        'Edge protection'=>$request->Edge_protection,
                        'Suspension systems'=>$request->Suspension_systems,
                ];

                $Formwork_falsework=[
                        'Formwork'=>$request->Formwork,
                        'Falsework'=>$request->Falsework,
                        'Back propping'=>$request->Back_propping,
                        'Support systems'=>$request->Support_systems,
                ];

                $Construction_plant=[
                        'Crane supports & foundations'=>$request->Crane_supports_foundations,
                        'Hoist ties & foundations'=>$request->Hoist_ties_foundations,
                        'BMast climbers & foundations'=>$request->Mast_climbers_foundations,
                        'Mobile crane foundations'=>$request->Mobile_crane_foundations,
                        'MPiling mats & working platforms'=>$request->Piling_mats_working_platforms,
                        'Lifting/ handling devices'=>$request->Lifting_handling_devices,
                ];


                $Excavation_earthworks=[
                        'Excavation support'=>$request->Excavation_support,
                        'Cofferdams'=>$request->Cofferdams,
                        'Embankment/ bunds'=>$request->Embankment_bunds,
                        'Ground anchor/ soil nailing'=>$request->Ground_anchor_soil_nailing,
                        'Open excavations'=>$request->Open_excavations,
                        'Dewatering'=>$request->Dewatering,
                ];

                $Structural_stability=[
                        'Existing structures during construction'=>$request->Existing_structures_during_construction,
                        'New structures during construction'=>$request->New_structures_during_construction,
                        'Structural steelwork erection'=>$request->Structural_steelwork_erection,
                        'Needling'=>$request->Needling,
                        'Temporary underpinning'=>$request->Temporary_underpinning,
                        'Façade system'=>$request->Façade_system,
                ];

                $Permanent_works=[
                        'Partial permanent support conditions'=>$request->Partial_permanent_support_conditions,
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

               $pdf = PDF::loadView('layouts.pdf.nomination',['data'=>$request->all(),'signature'=>$image_name]);
                    $path = public_path('pdf');
                    $filename =rand().'nomination.pdf';
                    $pdf->save($path . '/' . $filename);

                    Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);

                   
                    Notification::route('mail',$company->email ?? '')->notify(new NominatinCompanyEmail($company,$filename));
                    toastSuccess('Nomination Form save successfully!');
                    return back();


            }

        // } catch (\Exception $exception) {
        //     toastError('Something went wrong, try again!');
        //     return back();
        // }
    }
}
