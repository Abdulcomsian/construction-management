<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryWork;
use App\Models\TempWorkUploadFiles;
use App\Utils\HelperFunctions;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Notification;
use App\Notifications\DesignUpload;

class DesignerController extends Controller
{
    public function index($id)
    {
        $id = \Crypt::decrypt($id);
        $DesignerUploads=TempWorkUploadFiles::where(['file_type'=>1,'temporary_work_id'=>$id])->get();
        $twd_name=TemporaryWork::select('twc_name')->where('id',$id)->first();
        return view('dashboard.designer.index', compact('DesignerUploads','id','twd_name'));
    }

    public function store(Request $request)
    {
        try {
            $tempworkdata=TemporaryWork::find($request->tempworkid);
            $createdby=User::find($tempworkdata->created_by);
            $filePath = HelperFunctions::temporaryworkuploadPath();
             $file_type=1;
            if(isset($request->designcheck))
            {
                $file = $request->file('designcheckfile');
                $file_type=2;
            }
            else{
                 $file = $request->file('file');
            }
            $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            $model = new TempWorkUploadFiles();
            $model->file_name = $imagename;
            $model->file_type = $file_type;
            $model->temporary_work_id =$tempworkdata->id;
            $model->drawing_number=$request->drawing_number;
            $model->comments=$request->comments;
            $model->twd_name=$request->twd_name;
            $model->drawing_title=$request->drawing_title;
            $model->preliminary_approval=$request->preliminary_approval;
            $model->construction=$request->construction;
            if ($model->save()) {
                //send mail to twc
               
                  $notify_admins_msg = [
                    'greeting' => 'Designer Upload Document',
                    'subject' => 'Designer Uploaded Document',
                    'body' => [
                        'text' => '',
                        'filename' =>$imagename,
                        'links' =>  '',
                        'name' => 'Design Upload',
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
                Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));
                Notification::route('mail',  $createdby->email ?? '')->notify(new DesignUpload($notify_admins_msg));
                toastSuccess('Desinger Uploaded Successfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function get_desings(Request $request)
    {
         $tempworkid=$request->tempworkid;
         $DesignerUploads=TempWorkUploadFiles::where(['temporary_work_id'=>$tempworkid,'file_type'=>1])->get();
         $list='<table class="table table-hover"><thead><tr>';
         $list.='<th>S-no</th>';
         $list.='<th>Drawing Number</th>';
         $list.='<th>Comments</th>';
         $list.='<th>TWD Name</th><th>Drawing Title</th><th>Preliminary/ For approval</th><th>For construction</th><th>Action</th>';
         $list.='</tr></thead><tbody>';
         $i=1;
         foreach($DesignerUploads as $uploads)
         {
             $papproval='No';
             $construction='No';
             if($uploads->preliminary_approval==1)
             {
                $background='yellow';
                $papproval='Yes';
             }
             elseif($uploads->construction==1){
                $background='lightgreen';
                $construction='Yes';
             }

            $list.='<tr style="background:'.$background.'">';
            $list.='<td>'.$i.'</td>';
            $list.='<td>'.$uploads->drawing_number.'</td>';
            $list.='<td>'.$uploads->comments.'</td>';
            $list.='<td>'.$uploads->twd_name.'</td>';
            $list.='<td>'.$uploads->drawing_title.'</td>';
            $list.='<td>'. $papproval.'</td>';
            $list.='<td>'.$construction.'</td>';
            $path = config('app.url');
            if($construction=='Yes')
            {
            $list.='<td style="display:flex">
                     <a href="' . $path . '/'.$uploads->file_name.'" target="_blank">D'.$i.'</a>&nbsp;
                     <form method="get" action="'. route("permit.load").'" style="display:inline-block;">
                        <input type="hidden" class="temp_work_id" name="temp_work_id" value='.Crypt::encrypt($tempworkid).' />
                        <input type="hidden"  name="drawingno" value='.$uploads->drawing_number.' />
                         <input type="hidden"  name="drawingtitle" value='.$uploads->drawing_title.' />
                        <button style="font-size:8px" type="submit" class="btn btn-primary btn-small" id="permiturl">Open Permit</button>
                    </form>
                    </td>';
                }
                else{
                    $list.='<td style="display:flex">
                     <a href="' . $path . '/'.$uploads->file_name.'" target="_blank">D'.$i.'</a>&nbsp;
                     <form method="get" action="'. route("permit.load").'" style="display:inline-block;">
                        <input type="hidden" class="temp_work_id" name="temp_work_id" value='.Crypt::encrypt($tempworkid).' />
                        <input type="hidden"  name="drawingno" value='.$uploads->drawing_number.' />
                         <input type="hidden"  name="drawingtitle" value='.$uploads->drawing_title.' />
                       
                    </form>
                    </td>';

                }
            $list.='</tr>';
            $i++;
         }
         $list.='</tbody></table>';
         echo $list;

    }
}
