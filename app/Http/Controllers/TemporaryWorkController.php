<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Project;
use App\Models\ScopeOfDesign;
use App\Models\TemporaryWork;
use App\Models\TemporayWorkImage;
use App\Models\DesignRequirementLevelOne;
use App\Models\User;
use App\Utils\Validations;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;
use App\Utils\HelperFunctions;
use DB;

class TemporaryWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        try {
            if ($user->hasRole('admin')) {
                $temporary_works = TemporaryWork::with('project')->latest()->get();
            } elseif ($user->hasRole('company')) {
                $users = User::select('id')->where('company_id', $user->id)->get();
                $ids = [];
                foreach ($users as $u) {
                    $ids[] = $u->id;
                }
                $ids[] = $user->id;
                $temporary_works = TemporaryWork::with('project')->whereIn('created_by', $ids)->latest()->get();
            } else {
                $temporary_works = TemporaryWork::with('project')->where('created_by', $user->id)->latest()->get();
            }
            return view('dashboard.temporary_works.index', compact('temporary_works'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
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
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::latest()->get();
            } elseif ($user->hasRole(['company'])) {
                $projects = Project::where('company_id', $user->id)->get();
            } else {
                $projects = DB::table('projects')
                    ->join('users_has_projects', 'projects.id', '=', 'users_has_projects.project_id')
                    ->where('users_has_projects.user_id', auth()->user()->id)
                    ->get();
            }
            $desogmreqlevlone = DesignRequirementLevelOne::get();
            return view('dashboard.temporary_works.create', compact('projects', 'desogmreqlevlone'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
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
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'folder')) {
                    $data = null;
                    $data = [
                        Str::replace('_folder', '', $key) => $request->$key
                    ];
                    $folder_attachements = array_merge($folder_attachements, $data);
                    unset($request[$key]);
                }
            }
            $all_inputs  = $request->except('_token', 'signed', 'file', 'namesign', 'signtype');
            //upload signature here
            if (isset($request->namesign) && $request->namesign != '') {
                $all_inputs['signature'] = $request->namesign;
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
            $temporary_work = TemporaryWork::create($all_inputs);
            ScopeOfDesign::create(array_merge($scope_of_design, ['temporary_work_id' => $temporary_work->id]));
            Folder::create(array_merge($folder_attachements, ['temporary_work_id' => $temporary_work->id]));
            //work for upload images here
            if ($request->file('file')) {
                $filePath = HelperFunctions::temporaryworkImagePath();
                $files = $request->file('file');
                foreach ($files  as $key => $file) {
                    $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                    $model = new TemporayWorkImage();
                    $model->image = $imagename;
                    $model->temporary_work_id = $temporary_work->id;
                    $model->save();
                }
            }
            toastSuccess('Temporary Work successfully added!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function show(TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function edit(TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemporaryWork  $temporaryWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemporaryWork $temporaryWork)
    {
        try {
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
}
