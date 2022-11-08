<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Utils\HelperFunctions;
use App\Models\Nomination;
use App\Models\NominationCourses;
use App\Models\NominationQualification;
use App\Models\NominationCompetence;
use App\Models\NominationExperience;
use App\Utils\Validations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Exception;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;
use App\Notifications\Nominations;
use App\Models\NominationComment;
use Notification;
use Auth;
use PDF;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin', 'company']), 403);
        try {
        
            if ($request->ajax()) {
                if ($user->hasRole('admin')) {
                    $data = User::role(['user', 'supervisor', 'scaffolder'])->latest()->get();
                } elseif ($user->hasRole('company')) {
                    $data = User::role(['user', 'supervisor', 'scaffolder'])->with('usernomination')->where('company_id', auth()->user()->id)->get();
                }
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->editColumn('company_id', function ($data) {
                        return $data->userCompany->name ?? '';
                    })
                    ->addColumn('action', function ($data) use ($user) {
                         $btn ='';
                        if ($user->hasRole(['admin','company'])) {
                            $btn .= '<div class="d-flex">
                                <a href="' . route('users.edit', $data->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <form method="POST" action="' . route('users.destroy', $data->id) . '"  id="form_' . $data->id . '" >
                                    ' . method_field('Delete') . csrf_field() . '

                                    <button type="submit" id="' . $data->id . '" class="confirm1 btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                        <!--end::Svg Icon-->
                                    </button>
                                </form></div>
                                <a href="'.route('user.project.nomination', $data->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                ';
                            }
                        // } if($user->hasRole(['admin','company'])){
                            
                        //     if(isset($data->usernomination) && $data->nomination==1)
                        //     {
                        //         $class='';
                        //         if($data->nomination_status==0)
                        //         {
                        //             $class="text-warning";
                        //         }elseif($data->nomination_status==1)
                        //         {
                        //             $class="text-success";
                        //         }
                        //         else{
                        //             $class="text-danger";
                        //         }
                        //         $btn .= '<a type="button" href="pdf/'.$data->usernomination->pdf_url.'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" download title="View Nomination Pdf">
                        //               <i class="fa fa-download" aria-hidden="true"></i>  
                        //             </a>
                        //             <button type="button" userid="'.$data->id.'" nominationid="' . $data->usernomination->id . '" class="nominationcomment btn btn-icon btn-bg-light btn-active-color-primary btn-sm " title="View Nomination Comments">
                        //               <i class="fa fa-comment '.$class.'" aria-hidden="true"></i>
                                        
                        //             </button>';
                        //     }
                            
                        // }else {
                        //     $btn = '';
                        // }
                        return $btn;
                    })
                    ->rawColumns(['company_id', 'action'])
                    ->make(true);
            }

            return view('dashboard.users.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
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
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin','company']), 403);
        try {
            $companies = User::role('company')->latest()->get();
            return view('dashboard.users.create', compact('companies'));
        } catch (\Exception $exception) {
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
       
        Validations::storeUser($request);
        try {
            $userprojectdata=[];
            $all_inputs = $request->except('_token', 'role','description_of_role','Description_limits_authority','authority_issue_permit');
            if ($request->file('image')) {
                $filePath = HelperFunctions::profileImagePath();
                $all_inputs['image'] = HelperFunctions::saveFile(null, $request->file('image'), $filePath);
            }
            $nomination_status=0;
            if($request->nomination==1)
            {
                $all_inputs['nomination']=1;

                //$all_inputs['nomination_status']='0';
            }
            $all_inputs['password'] = Hash::make($request->password);
            $all_inputs['email_verified_at'] = now();
            $user = User::create($all_inputs);
            
            $user->project= $all_inputs['projects'][0];
            //Assigned role to user. role is already created during seeder
            $user->assignRole($request->role);
            //Add projects for user
            $user->userProjects()->syncWithPivotValues($all_inputs['projects'],['nomination'=>$request->nomination,'description_of_role' => $request->description_of_role,'Description_limits_authority'=>$request->Description_limits_authority,'authority_issue_permit'=>$request->authority_issue_permit]);


            $model= new NominationComment();
            $model->email=Auth::user()->email;
            $model->comment="Admin/Company send nomination form to ".$user->email."";
            $model->type="Nomination";
            $model->send_date=date('Y-m-d H:i:s');
            $model->user_id=$user->id;
            $model->save();

            if($user->userCompany->nomination==1 && $request->nomination==1)
            {
              Notification::route('mail',$user->email ?? '')->notify(new Nominations($user));
            }
            toastSuccess('User successfully added!');
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {
        } catch (\Exception $exception) {
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::role(['company', 'user', 'supervisor', 'scaffolder'])
                ->with(['userProjects', 'userCompany'])
                ->where('id', $id)
                ->first();
            $company_projects = $user->userCompany->companyProjects ?? [];
            $user_projects = $user->userProjects->pluck('id')->toarray();
            $companies = User::role('company')->latest()->get();
            return view('dashboard.users.edit', compact('user_projects', 'user', 'companies', 'company_projects'));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Validations::updateUser($request, $user->id);
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
            $user->userProjects()->syncWithPivotValues($all_inputs['projects'],['description_of_role' => $request->description_of_role,'Description_limits_authority'=>$request->Description_limits_authority,'authority_issue_permit'=>$request->authority_issue_permit]);
            toastSuccess('Profile Updated Successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            @unlink($user->image);
            $user->delete();
            toastSuccess('User deleted successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function updatePassword(Request $request, User $user)
    {
        Validations::updateUserPassword($request, $user->id);
        try {
            $all_inputs['password'] = Hash::make($request->password);
            $user->update([
                'password' => $all_inputs['password'],
            ]);
            toastSuccess('Password updated successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function nomination_status(Request $request)
    {

           DB::beginTransaction();
           try
           {
            $user=User::with('userCompany')->find($request->userid);
            $model=new NominationComment();
            $model->email=Auth::user()->email;
            if($request->status==1)
            {
                //old senerio code
                // User::find($user->id)->update(['nomination_status'=>1,'nomination_approve_reject_date'=>date('Y-m-d H:i:s')]);

                //new senerio code
                DB::table('users_has_projects')->where(['user_id'=>$user->id,'project_id'=>$request->project_id])->update(['nomination_status'=>1]);
                $message="Admin/Company accept nomination form of ".$user->email." having comment is".$request->comments;
                $status=1;
            }
            else
            {
                //old senerio code
                // User::find($user->id)->update(['nomination_status'=>2,'nomination_approve_reject_date'=>date('Y-m-d H:i:s')]);

                //new senerio code
                DB::table('users_has_projects')->where(['user_id'=>$user->id,'project_id'=>$request->project_id])->update(['nomination_status'=>2]);
                $message="Admin/Company reject nomination form of ".$user->email." having comment is ".$request->comments;
                $status=2;
            }
           
            $model->comment=$message;
            $model->type="Nomination";
            $model->send_date=date('Y-m-d H:i:s');
            $model->user_id=$user->id;
            $model->project_id=$request->project_id;
            $model->save();
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
                $courses=NominationCourses::where('nomination_id',$request->nominationid)->get();
                $qualifications=NominationQualification::where('nomination_id',$request->nominationid)->get();
                $experience=NominationExperience::where('nomination_id',$request->nominationid)->get();
                $competence=NominationCompetence::where('nomination_id',$request->nominationid)->first();
                $pdf = PDF::loadView('layouts.pdf.companynomination',['nomination'=>$nomination,'courses'=>$courses,'qualifications'=>$qualifications,'experience'=>$experience,'competence'=>$competence,'user'=>$user]);
                    $path = public_path('pdf');
                    $filename =rand().'nomination.pdf';
                    $pdf->save($path . '/' . $filename);
                @unlink($nomination->pdf_url);
                Nomination::find($nomination->id)->update(['pdf_url'=>$filename]);
                $user->project=$nomination->project;
                Notification::route('mail',$user->email ?? '')->notify(new Nominations($user,$status,$request->comments));  
            }
            else{
                 Nomination::find($request->nominationid)->update(['status'=>2,'nomination_approve_reject_date'=>date('Y-m-d H:i:s')]);
                 $nomination=Nomination::find($request->nominationid);
                  $user->project=$nomination->project;
                 Notification::route('mail',$user->email ?? '')->notify(new Nominations($user,$status,$request->comments));
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

    public function nomination_get_comments()
    {
        $id=$_GET['id'];
        $userid=$_GET['userid'];
        $projectId=$_GET['project'];

        $ncomments=NominationComment::where(['user_id'=>$userid,'project_id'=>$projectId])->get();
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

    public function User_Project_Nomination($id)
    {
        $project_wise_nominations=Nomination::with('user.userCompany','projectt')->where('user_id',$id)->get();
        return view('dashboard.users.details',compact('project_wise_nominations'));
    }

    public function User_Assign_Project()
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['company']), 403);
        try {
            $companies_users = User::where('company_id',$user->id)->latest()->get();
            return view('dashboard.users.user_assign_project', compact('companies_users'));
        } catch (\Exception $exception) {
        }
    }

    public function userProjects(Request $request)
    {
        try {
            $id = $request->id;
            $projectids=DB::table('users_has_projects')->select('project_id')->where('user_id',$id)->pluck('project_id')->toArray();
            $projects=Project::where('company_id',Auth::user()->id)->whereNotIn('id',$projectids)->get();
            if (!empty($projects)) {
                $data = [
                    'status' => true,
                    'projects' => $projects,
                ];
            } else {
                $data = [
                    'status' => false,
                ];
            }
            return response()->json($data);
        } catch (\Exception $exception) {
            $data = [
                'status' => false,
            ];
            return response()->json($data);
        }
    }

    public function User_Save_Assign_Project(Request $request)
    {
        Validations::assignProject($request);
         try {
            $all_inputs = $request->except('_token');
            $user = User::find($request->user_id);
            $user->project= $request->projects[0];
            //Add projects for user
            $user->userProjects()->attach($all_inputs['projects'],['nomination'=>$request->nomination,'description_of_role' => $request->description_of_role,'Description_limits_authority'=>$request->Description_limits_authority,'authority_issue_permit'=>$request->authority_issue_permit]);


            $model= new NominationComment();
            $model->email=Auth::user()->email;
            $model->comment="Admin/Company send nomination form to ".$user->email."";
            $model->type="Nomination";
            $model->send_date=date('Y-m-d H:i:s');
            $model->user_id=$user->id;
            $model->project_id=$request->projects[0];
            $model->save();

            if($user->userCompany->nomination==1 && $request->nomination==1)
            {
              Notification::route('mail',$user->email ?? '')->notify(new Nominations($user));
            }
            toastSuccess('User successfully added!');
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
}
