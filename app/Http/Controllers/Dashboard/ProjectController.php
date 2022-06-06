<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectQrCode;
use App\Models\User;
use App\Models\ProjectDocuments;
use App\Models\TemporaryWork;
use App\Models\TempWorkUploadFiles;
use App\Models\PermitLoad;
use App\Utils\Validations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Crypt;
use App\Utils\HelperFunctions;
use DB;
//use Artisan;
use ZipArchive;
use File;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        abort_if(!$user->hasAnyRole(['admin', 'company', 'user']), 403);
        try {
            if ($request->ajax()) {
                if ($user->hasRole('admin')) {
                    $data = Project::latest()->get();
                } elseif ($user->hasRole('company')) {
                    $data = Project::where('company_id', $user->id)->get();
                } else {
                    $data = DB::table('projects')
                        ->join('users_has_projects', 'projects.id', '=', 'users_has_projects.project_id')
                        ->where('users_has_projects.user_id', auth()->user()->id)
                        ->get();
                }
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->editColumn('address', function ($data) {
                        return strlen($data->address) > 30 ? substr($data->address, 0, 30) . "..." : $data->address;
                    })
                    ->addColumn('action', function ($data) use ($user) {
                        if ($user->hasRole('admin')) {
                            $btn = '<div class="d-flex">
                                    <button value="edit" data-id="' . $data->id . '" class="project_details btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                     <button value="genqrcode" data-id="' . $data->id . '" class="project_details btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="fa fa-qrcode" aria-hidden="true"></i>
                                    </button>
                                    <form method="POST" action="' . route('projects.destroy', $data->id) . '"  id="form_' . $data->id . '" >
                                        ' . method_field('Delete') . csrf_field() . '

                                        <button type="submit" id="' . $data->id . '" class="confirm btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                          <i class="fa fa-trash" aria-hidden="true"></i>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </form>
                                    <a href="' . route('projects.qrcode', $data->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>';
                        } else {
                            $btn = '';
                        }

                        return $btn;
                    })
                    ->rawColumns(['address', 'action'])
                    ->make(true);
            }

            return view('dashboard.projects.index');
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
        try {
            return view('dashboard.projects.create');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
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
        abort_if(!auth()->user()->hasRole(['admin']), 403);

        Validations::storeProject($request);
        if ($request->has('id')) {
            Validations::updateProjectId($request);
        }
        try {
            $all_inputs  = $request->except('_token');
            if ($request->has('id')) {
                try {
                    unset($all_inputs['id']);
                    Project::where('id', $request->id)
                        ->update($all_inputs);
                    $message = 'updated';
                } catch (DecryptException $decryptException) {
                    toastError('Something went wrong,try again');
                    return Redirect::back();
                }
            } else {
                Project::create($all_inputs);
                $message = 'added';
            }

            toastSuccess('Project successfully ' . $message . '!');
            return Redirect::back();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //        dd('show');
        //        try {
        //        }catch (\Exception $exception){
        //            toastError('Something went wrong, try again');
        //            return Redirect::back();
        //        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        try {
            if (!empty($project)) {
                $data = [
                    'status' => true,
                    'project' => $project
                ];
                return response()->json($data);
            } else {
                $data = [
                    'status' => false,
                    'project' => null
                ];
                return response()->json($data);
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //        try {
        //
        //        }catch (\Exception $exception){
        //            toastError('Something went wrong, try again');
        //            return Redirect::back();
        //        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        abort_if(!auth()->user()->hasRole(['admin']), 403);
        try {
            $project->delete();
            toastSuccess('Project deleted successfully!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    public function gen_qrcode(Request $request)
    {
        try {
            //check if already qr code
            $check = ProjectQrCode::where('project_id', $request->projectid)->orderBy('id', 'desc')->first();
            if ($check) {
                $j = $check->tempid;
            }
            for ($i = 1; $i <= $request->qrcodeno; $i++) {
                if ($check) {
                    $j = $j + 1;
                } else {
                    $j = $i;
                }
                \QrCode::size(500)
                    ->format('png')
                    ->generate(route('qrlink', $request->projectid . '?temp=' .  Crypt::encryptString($j) . ''), public_path('qrcode/projects/qrcode' . $request->projectid .  $j . '.png'));
                $model = new ProjectQrCode();
                $model->project_id = $request->projectid;
                $model->tempid =  $j;
                $model->qrcode = 'qrcode' . $request->projectid .  $j . '.png';
                $model->save();
            }
            toastSuccess('Qr code generated successfully!');
            return  Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
    public function proj_qrcode(Request $request, $id)
    {
        if (isset($request->tempstart)) {
            $start = $request->tempstart;
            $end = $request->tempend;
            $qrcodes = ProjectQrCode::with('tempwork')->where('project_id', $id)->where('tempid', '>=', $start)->where('tempid', '<=', $end)->get();
        } else {
            $qrcodes = ProjectQrCode::with('tempwork')->where('project_id', $id)->get();
        }
        //dd($qrcodes);
        return view('qrcode.index', compact('qrcodes', 'id'));
    }


    //store project documents
    public function temporarywork_store_project_documents(Request $request)
    {
        try {
                $filePath = HelperFunctions::Projectdocupath();
                $file = $request->file('file');
                $document = HelperFunctions::saveFile(null, $file, $filePath);
                $model = new ProjectDocuments();
                $model->docuements=$document;
                $model->type=$request->type;
                $model->project_id=$request->projects;
                $model->save();
                toastSuccess('Document Saved successfully!');
                return Redirect::back();
            } catch (\Exception $exception) {
           toastError('Something went wrong, try again!');
            return Redirect::back();
       }
    }
    //get proj doc
    public function project_docs_get(Request $request)
    {
         $user = auth()->user();
            if ($user->hasRole('admin')) 
            {
                 $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                //  $projectDocs=ProjectDocuments::with('project')->whereIn('project_id',$projects)->get();
            } elseif ($user->hasRole('company')) {
                 $projects = Project::with('company')->where('company_id', $user->id)->get();
            } else {
                   $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                    $ids = [];
                    foreach ($project_idds as $id) {
                        $ids[] = $id->project_id;
                    }
                    $projects = Project::with('company')->whereIn('id', $ids)->get();
            }

           $list='<table class="table table-hover"><thead><th>S-No</th><th>Project Name</th></thead><tbody>';
            $path = config('app.url');
           foreach($projects as $docs)
           {
            $list.='<tr><td>'.$docs->id.'</td><td><a target="_blank" href="'.url('project-document',$docs->id).'">'.$docs->name.'</a></td></tr>';
           }
           $list.='</tbody></table>';
           echo $list;
    }

    public function project_document($id)
    {
         $project_documents=ProjectDocuments::with('project')->where('project_id',$id)->latest()->paginate(20);
        return view('dashboard.temporary_works.project_document',compact('project_documents'));
    }

    public function qrcode_details($id)
    {
         $data=TemporaryWork::select('project_id','tempid')->find($id);
         $qrcodes = ProjectQrCode::with('tempwork')->where(['project_id'=> $data->project_id,'tempid'=>$data->tempid])->get();
         return view('qrcode.index', compact('qrcodes', 'id'));
    
    }

    public function project_twc_get(Request $request)
    {
        $projectid=$request->id;
        $companyid=$request->compayid;
        $userdata=DB::table('users')
                  ->join('users_has_projects','users.id','=','users_has_projects.user_id')
                  ->where(['users.company_id'=>$companyid,'users_has_projects.project_id'=>$projectid])
                  ->first();
        if($userdata->email)
        {
            return $userdata->email;
        }
        else{
            return '';
        }
        
    }

    public function project_backup()
    {
        $zip = new ZipArchive;
        $fileName = 'backup.zip';
        $temporarydata=TemporaryWork::select('id','twc_id_no','ped_url','twc_email')->where('twc_email',Auth::user()->email)->get();
        if(count($temporarydata)>0)
        {
            if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
                {
                    foreach($temporarydata as $tempdata)
                    {
                            
                        $briefpath=$tempdata->twc_id_no.'/pdf';
                        $drawingpath=$tempdata->twc_id_no.'/drawings';
                        //work for design breif pdf
                        if (file_exists('pdf/'.$tempdata->ped_url) && is_file('pdf/'.$tempdata->ped_url))
                        {
                            $zip->addFile(public_path('pdf/'.$tempdata->ped_url), $briefpath.'/brief.pdf');
                        }
                        
                        $dr=1;
                        //work for drawingws and designs
                        $drawings=TempWorkUploadFiles::select('file_name')->where('temporary_work_id',$tempdata->id)->get();
                        foreach($drawings as $drw)
                        {
                            $n = strrpos($drw->file_name, '.');
                            $ext = substr($drw->file_name, $n + 1);
                            if (file_exists($drw->file_name) && is_file($drw->file_name))
                            {
                              $zip->addFile(public_path($drw->file_name), $drawingpath.'/drawing'.$dr.'.'.$ext);
                             }
                            $dr++;
                        } 
                        //working for permit
                        $permitdata=PermitLoad::select('permit_no','ped_url')->where('temporary_work_id',$tempdata->id)->get();
                         $dr=1;
                        foreach($permitdata as $permit)
                        {
                            $permitpath=$tempdata->twc_id_no.'/permit/'.$permit->permit_no;
                            if (file_exists('pdf/'.$permit->ped_url) && is_file('pdf/'.$permit->ped_url))
                            {
                             $zip->addFile(public_path('pdf/'.$permit->ped_url), $permitpath.'/permit.pdf');
                            }
                             $dr++;

                        }    
                    }
                }
            
               $zip->close();
               return response()->download(public_path($fileName));
       }
       else{
            toastError('Not Created Any TemporaryWork');
            return Redirect::back();
       }
    }


    public function Dashboard()
    {
        $projects=Project::count();
        $temporaryworks=TemporaryWork::count();
        $company=User::role('company')->count(); 
        $pendingtemp=TemporaryWork::where('status','0')->count();
        $approvedtemp=TemporaryWork::where('status','1')->count();
        $rejectedtemp=TemporaryWork::where('status','2')->count();
        //red green and amber design breif count
        $current_date=date('Y-m-d');
        $reddesingcount=TemporaryWork::whereDate('design_required_by_date', '<', $current_date)->count();
        $greendesingcount=DB::table('temporary_works')->whereRaw('DATEDIFF(design_required_by_date,'.$current_date.') >= 7')->count();
        $amberdesingcount=DB::table('temporary_works')->whereRaw('DATEDIFF(design_required_by_date,'.$current_date.') < 7')->whereRaw('DATEDIFF(design_required_by_date,'.$current_date.') > 1')->count();
        //end of date
        
        return view('dashboard',compact('projects','temporaryworks','company','pendingtemp','approvedtemp','rejectedtemp','reddesingcount','greendesingcount','amberdesingcount'));
    }

   

}
