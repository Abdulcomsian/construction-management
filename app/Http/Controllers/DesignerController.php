<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryWork;
use App\Models\TempWorkUploadFiles;
use App\Utils\HelperFunctions;
use Illuminate\Support\Facades\Redirect;

class DesignerController extends Controller
{
    public function index($id)
    {
        $DesignerUploads=TempWorkUploadFiles::where('file_type',1)->get();
        $twd_name=TemporaryWork::select('twc_name')->find($id);
        return view('dashboard.designer.index', compact('DesignerUploads','id','twd_name'));
    }

    public function store(Request $request)
    {
        try {
            $filePath = HelperFunctions::temporaryworkuploadPath();
            $file = $request->file('file');
            $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            $model = new TempWorkUploadFiles();
            $model->file_name = $imagename;
            $model->file_type = 1;
            $model->temporary_work_id = $request->tempworkid;
            $model->drawing_number=$request->drawing_number;
            $model->comments=$request->comments;
            $model->twd_name=$request->twd_name;
            $model->drawing_title=$request->drawing_title;
            $model->preliminary_approval=$request->preliminary_approval;
            $model->construction=$request->construction;
            if ($model->save()) {
                toastSuccess('Desinger Uploaded Successfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
}
