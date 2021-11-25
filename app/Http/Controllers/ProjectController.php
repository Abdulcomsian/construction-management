<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Utils\Validations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Project::latest()->get();
                return Datatables::of($data)
                    ->removeColumn('id')
                    ->editColumn('address',function ($data){
                        return strlen($data->address) > 30 ? substr($data->address,0,30)."..." : $data->address ?: '-';
                    })
                    ->addColumn('action', function($data){
                        $btn = '<div class="d-flex">
                                <button value="edit" data-id="'. $data->id .'" class="project_details btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                    <i class="fa-thin fa-pencil"></i>
                                    <!--end::Svg Icon-->
                                </button>
                                <form method="POST" action="'. route('projects.destroy',$data->id).'"  id="form_'.$data->id.'" >
                                    '.method_field('Delete'). csrf_field().'

                                    <button type="submit" id="'. $data->id .'" class="confirm btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                        <!--end::Svg Icon-->
                                    </button>
                                </form></div>';
                        return $btn;
                    })
                    ->rawColumns(['address','action'])
                    ->make(true);
            }

            return view('dashboard.projects.index');
        }catch (\Exception $exception){
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
        }catch (\Exception $exception){
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
        Validations::storeProject($request);
        if ($request->has('id')){
            Validations::updateProjectId($request);
        }
        try {
            $all_inputs  = $request->except('_token');
            if ($request->has('id')) {
                try {
                    unset($all_inputs['id']);
                    Project::where('id',$request->id)
                        ->update($all_inputs);
                    $message = 'updated';
                }catch (DecryptException $decryptException){
                    toastError('Something went wrong,try again');
                    return Redirect::back();
                }
            }else{
                Project::create($all_inputs);
                $message = 'added';
            }

            toastSuccess('Project successfully '.$message.'!');
            return Redirect::back();
        }catch (\Exception $exception){
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
        try {

        }catch (\Exception $exception){
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
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
            if (!empty($project)){
                $data = [
                    'status' => true,
                    'project' => $project
                ];
                return response()->json($data);
            }else{
                $data = [
                    'status' => false,
                    'project' => null
                ];
                return response()->json($data);
            }

        }catch (\Exception $exception){
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
        try {

        }catch (\Exception $exception){
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try {
            dd($project);
            $project->delete();
            toastSuccess('Project deleted successfully!');
            Redirect::back();
        }catch (\Exception $exception){
            toastError('Something went wrong, try again');
            return Redirect::back();
        }
    }
}
