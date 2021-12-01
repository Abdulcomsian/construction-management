<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Project;
use App\Models\ScopeOfDesign;
use App\Models\TemporaryWork;
use App\Utils\Validations;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class TemporaryWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $temporary_works = TemporaryWork::with('project')->latest()->get();
            return view('dashboard.temporary_works.index',compact('temporary_works'));
        }catch (\Exception $exception){
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
            $projects = Project::latest()->get();
            return view('dashboard.temporary_works.create',compact('projects'));
        }catch (\Exception $exception){
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
            foreach ($request->keys() as $key){
                if (Str::contains($key, 'sod')){
                    $data = null;
                    $data = [
                      Str::replace('_sod','',$key) => $request->$key
                    ];
                    $scope_of_design = array_merge($scope_of_design,$data);
                    unset($request[$key]);
                }
            }
            $folder_attachements = [];
            foreach ($request->keys() as $key){
                if (Str::contains($key, 'folder')){
                    $data = null;
                    $data = [
                        Str::replace('_folder','',$key) => $request->$key
                    ];
                    $folder_attachements = array_merge($folder_attachements,$data);
                    unset($request[$key]);
                }
            }
            $all_inputs  = $request->except('_token');
            $temporary_work = TemporaryWork::create($all_inputs);
            ScopeOfDesign::create(array_merge($scope_of_design,['temporary_work_id' => $temporary_work->id]));
            Folder::create(array_merge($folder_attachements,['temporary_work_id' => $temporary_work->id]));

            toastSuccess('Temporary Work successfully added!');
            return redirect()->route('temporary_works.index');
        }catch (\Exception $exception){
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

        }catch (\Exception $exception){
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

        }catch (\Exception $exception){
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

        }catch (\Exception $exception){
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

        }catch (\Exception $exception){
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
}
