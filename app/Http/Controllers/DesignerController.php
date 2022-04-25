<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryWork;
use App\Models\PermitLoad;
use App\Models\TempWorkUploadFiles;
use App\Models\TemporaryWorkComment;
use App\Models\PermitComments;
use App\Utils\HelperFunctions;
use App\Models\User;
use App\Models\TemporaryWorkRejected;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Notification;
use Auth;
use App\Notifications\DesignUpload;
use App\Notifications\PermitNotification;

class DesignerController extends Controller
{
    public function index($id)
    {
        if(!isset($_GET['mail']))
        {
            abort(403);
        }
        $mail=$_GET['mail'];
        $id = \Crypt::decrypt($id);
        $DesignerUploads = TempWorkUploadFiles::where(['file_type' => 1, 'temporary_work_id' => $id,'created_by'=>$mail])->get();
        $Designerchecks = TempWorkUploadFiles::where(['file_type' => 2, 'temporary_work_id' => $id,'created_by'=>$mail])->get();
        $twd_name = TemporaryWork::select('twc_name')->where('id', $id)->first();
        $comments=TemporaryWorkComment::where(['temporary_work_id'=> $id,'type'=>'normal'])->get();
        return view('dashboard.designer.index', compact('DesignerUploads', 'id', 'twd_name','Designerchecks','mail','comments'));
        
    }

    public function store(Request $request)
    {
        try {
            $tempworkdata = TemporaryWork::find($request->tempworkid);
            $tempworkdata->tw_name=$request->twd_name;
            $tempworkdata->save();
            $createdby = User::find($tempworkdata->created_by);
            $filePath = HelperFunctions::temporaryworkuploadPath();
            $model = new TempWorkUploadFiles();
            $file_type = 1;
            if (isset($request->designcheckfile)) {
                $file = $request->file('designcheckfile');
                $ext = $request->file('designcheckfile')->extension();
                $subject = 'Designer Uploaded Design Check Certificate ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                $text = ' Welcome to the online i-works Web-Portal.Designer have uploaded Design Check Certificate. Please Login and view document.';
                $file_type = 2;
                 $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            } else {
                $file = $request->file('file');
                //$ext = $request->file[0]('file')->extension();
                $subject = 'Designer Uploaded Drawing ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                $text = ' Welcome to the online i-works Web-Portal. Designer have uploaded Drawing. Please Login and view drawing.';
                $model->drawing_number = $request->drawing_number;
                $model->comments = $request->comments;
                $model->twd_name = $request->twd_name;
                $model->drawing_title = $request->drawing_title;
                $model->preliminary_approval = $request->preliminary_approval;
                $model->construction = $request->construction;
                $imagename = HelperFunctions::saveFile(null, $file[0], $filePath);
            }
             $model->created_by = $request->designermail;
            $model->file_name = $imagename;
            $model->file_type = $file_type;
            $model->temporary_work_id = $tempworkdata->id;
            if ($model->save()) {
                //send mail to twc

                $notify_admins_msg = [
                    'greeting' => 'Designer Upload Document',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'filename' => $tempworkdata->ped_url,
                        'links' =>  '',
                        'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                        'ext' => '',
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
        $tempworkid = $request->tempworkid;
        $designearray=[];
        $ramsno=TemporaryWork::select('rams_no','designer_company_email','desinger_email_2')->find($tempworkid);
        $designearray[0]=$ramsno->designer_company_email;
        $designearray[1]=$ramsno->desinger_email_2;
        $list='';
        $path = config('app.url');
        //twc uploade designs
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('user')) {
                $registerupload= TempWorkUploadFiles::where(['temporary_work_id' => $tempworkid, 'file_type' => 1,'created_by'=>auth()->user()->email])->get();
               if($registerupload)
                {
                    $list.="<h3>Twc/company Uploaded</h3>";            
                    $list .= '<table class="table table-hover"><thead><tr>';
                    $list .= '<th>S-no</th>';
                    $list .= '<th>Drawing Number</th>';
                    $list .= '<th>Comments</th>';
                    $list .= '<th>TWD Name</th><th>Drawing Title</th><th>Preliminary/ For approval</th><th>For construction</th><th>Action</th>';
                    $list .= '</tr></thead><tbody>';
                     $i = 1;
                    foreach ($registerupload as $uploads) {
                        $papproval = 'No';
                        $construction = 'No';
                        if ($uploads->preliminary_approval == 1) {
                            $background = 'yellow';
                            $papproval = 'Yes';
                        } elseif ($uploads->construction == 1) {
                            $background = 'lightgreen';
                            $construction = 'Yes';
                        }

                        $list .= '<tr class="clickable-row cursor-pointer" data-href="' . $path . '/' . $uploads->file_name . '" style="background:' . $background . '">';
                        $list .= '<td>' . $i . '</td>';
                        $list .= '<td>' . $uploads->drawing_number . '</td>';
                        $list .= '<td>' . $uploads->comments . '</td>';
                        $list .= '<td>' . $uploads->twd_name . '</td>';
                        $list .= '<td>' . $uploads->drawing_title . '</td>';
                        $list .= '<td>' . $papproval . '</td>';
                        $list .= '<td>' . $construction . '</td>';
                        if ($construction == 'Yes') {
                            $list .= '<td style="display:flex">
                                 <a class="btn btn-primary btn-small" href="' . $path . '/' . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;
                                 <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                    <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                    <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                     <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                    <button style="font-size:8px" type="button" class="btn btn-primary btn-small openpermitform" id="' . $uploads->id . '">Open Permit</button>
                                </form>
                                </td>';
                        } else {
                            $list .= '<td style="display:flex">
                                 <a class="btn btn-primary btn-small" href="' . $path . '/' . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;
                                 <form method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                    <input type="hidden" name="rams_no" value'.$ramsno->rams_no.'/>
                                    <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                    <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                     <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                   
                                </form>
                                </td>';
                        }
                        $list .= '</tr>';
                        $i++;
                    }
                    $list .= '</tbody></table>';
                }
        }
        for($j=0;$j<count($designearray);$j++)
        {
            $DesignerUploads = TempWorkUploadFiles::where(['temporary_work_id' => $tempworkid, 'file_type' => 1,'created_by'=>$designearray[$j]])->get();
            $i = 1;
            
            if($DesignerUploads)
            {
                if($j==0)
                {
                    $list.="<h3>Designer Company</h3>";
                }
                else{
                     $list.="<h3>Designer checker Company</h3>";
                }
                
                $list .= '<table class="table table-hover"><thead><tr>';
                $list .= '<th>S-no</th>';
                $list .= '<th>Drawing Number</th>';
                $list .= '<th>Comments</th>';
                $list .= '<th>TWD Name</th><th>Drawing Title</th><th>Preliminary/ For approval</th><th>For construction</th><th>Action</th>';
                $list .= '</tr></thead><tbody>';
                foreach ($DesignerUploads as $uploads) {
                    $papproval = 'No';
                    $construction = 'No';
                    if ($uploads->preliminary_approval == 1) {
                        $background = 'yellow';
                        $papproval = 'Yes';
                    } elseif ($uploads->construction == 1) {
                        $background = 'lightgreen';
                        $construction = 'Yes';
                    }

                    $list .= '<tr class="clickable-row cursor-pointer" data-href="' . $path . '/' . $uploads->file_name . '" style="background:' . $background . '">';
                    $list .= '<td>' . $i . '</td>';
                    $list .= '<td>' . $uploads->drawing_number . '</td>';
                    $list .= '<td>' . $uploads->comments . '</td>';
                    $list .= '<td>' . $uploads->twd_name . '</td>';
                    $list .= '<td>' . $uploads->drawing_title . '</td>';
                    $list .= '<td>' . $papproval . '</td>';
                    $list .= '<td>' . $construction . '</td>';
                    if ($construction == 'Yes') {
                        $list .= '<td style="display:flex">
                             <a class="btn btn-primary btn-small" href="' . $path . '/' . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;
                             <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                 <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                <button style="font-size:8px" type="button" class="btn btn-primary btn-small openpermitform" id="' . $uploads->id . '">Open Permit</button>
                            </form>
                            </td>';
                    } else {
                        $list .= '<td style="display:flex">
                             <a class="btn btn-primary btn-small" href="' . $path . '/' . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;
                             <form method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                <input type="hidden" name="rams_no" value'.$ramsno->rams_no.'/>
                                <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                 <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                               
                            </form>
                            </td>';
                    }
                    $list .= '</tr>';
                    $i++;
                }
                $list .= '</tbody></table>';
            }
        }
        
        echo $list;
    }
    //PC TWC EMAIL WORK HERE
    public function pc_index($id)
    {
        $id = \Crypt::decrypt($id);
        $tempworkdetail = TemporaryWork::find($id);
        $comments=TemporaryWorkComment::where(['temporary_work_id'=>$id,'type'=>'pc'])->get();
        return view('dashboard.designer.pc_index', compact('tempworkdetail','comments'));
    }

    //approved or reject
    public function pc_store(Request $request)
    {
        try {
            $tempworkdata = TemporaryWork::find($request->tempworkid);
            $createdby = User::find($tempworkdata->created_by);
            TemporaryWork::find($request->tempworkid)->update([
                'status' => $request->status,
            ]);
            if ($request->status == 2) {
                $model = new TemporaryWorkComment();
                $model->comment = $request->comments;
                $model->temporary_work_id = $request->tempworkid;
                $model->type = 'pc';
                if ($model->save()) {
                    $rejectedmodel= TemporaryWorkRejected::where('temporary_work_id',$request->tempworkid)->orderBy('id','desc')->limit(1)->first();

                    $rejectedmodel->temporary_work_id=$request->tempworkid;
                    $rejectedmodel->comment=$request->comments;
                    $rejectedmodel->rejected_by=$tempworkdata->pc_twc_email;
                    $rejectedmodel->pdf_url=$tempworkdata->ped_url;
                    $rejectedmodel->updated_at=date('Y-m-d H:i:s');
                    $rejectedmodel->save();

                    $subject = 'Design Brief Rejected ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                    $text = ' Welcome to the online i-works Web-Portal.Design Brief Rejected by PC TWC.';
                    $notify_admins_msg = [
                        'greeting' => 'Design Brief Rejected',
                        'subject' => $subject,
                        'body' => [
                            'text' => $text,
                            'filename' => $tempworkdata->ped_url,
                            'links' =>  '',
                            'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                            'ext' => '',
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => '',
                        'action_url' => '',
                    ];
                    Notification::route('mail', 'hani@ctworks.co.uk')->notify(new DesignUpload($notify_admins_msg));

                    Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));
                    //Notification::route('mail',  $createdby->email ?? '')->notify(new DesignUpload($notify_admins_msg));
                    //Notification::route('mail',  $tempworkdata->designer_company_email ?? '')->notify(new DesignUpload($notify_admins_msg));

                    toastSuccess('Design Brief Rejected Successfully!');
                    return Redirect::back();
                }
            } else {
                $subject = 'Design Brief Approved ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                     $text = ' Welcome to the online i-works Web-Portal.Design Brief Approve by PC TWC.';
               
                $notify_admins_msg = [
                    'greeting' => 'Design Brief Approved',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'filename' => $tempworkdata->ped_url,
                        'links' =>  '',
                        'designer' => '',
                        'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                        'ext' => '',
                        'id'=>$request->tempworkid,
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];

                Notification::route('mail', 'hani@ctworks.co.uk')->notify(new DesignUpload($notify_admins_msg));

                Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));

                //Notification::route('mail',  $createdby->email ?? '')->notify(new DesignUpload($notify_admins_msg));
                if($tempworkdata->designer_company_email)
                {
                   $notify_admins_msg['body']['designer'] = 'designer1';
                   Notification::route('mail',  $tempworkdata->designer_company_email ?? '')->notify(new DesignUpload($notify_admins_msg,$tempworkdata->designer_company_email)); 
                }
                if($tempworkdata->desinger_email_2)
                {
                   $notify_admins_msg['body']['designer'] = 'designer1';
                   Notification::route('mail',  $tempworkdata->desinger_email_2 ?? '')->notify(new DesignUpload($notify_admins_msg,$tempworkdata->desinger_email_2)); 
                }
                

                toastSuccess('Design Brief Approved Successfully!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function pc_permit_index($id)
    {
        $id = \Crypt::decrypt($id);
        $permitload = PermitLoad::find($id);
        return view('dashboard.designer.pc_permit_index', compact('permitload'));
    }

    public function pc_permit_store(Request $request)
    {
        try {
            $permitdata = PermitLoad::find($request->permitid);
            $createdby = User::find($permitdata->created_by);
            PermitLoad::find($request->permitid)->update([
                'status' => $request->status,
            ]);
            if ($request->status == 5) {
                $model = new PermitComments();
                $model->comment = $request->comments;
                $model->permit_load_id = $request->permitid;
                $model->save();
                $subject = 'Permit Load Rejected ';
                $text = ' Welcome to the online i-works Web-Portal.Permit Load Rejected by PC TWC.';
                $msg = 'Permit Load Rejected Successfully!';
            } else {
                $subject = 'Permit Load Approved';
                $text = ' Welcome to the online i-works Web-Portal.Permit Load Approved by PC TWC.';
                $msg = 'Permit Load Approved Successfully!';
            }
            $notify_admins_msg = [
                'greeting' => 'Permit Load Rejected',
                'subject' => $subject,
                'body' => [
                    'text' => $text,
                    'filename' => $permitdata->ped_url,
                    'links' =>  '',
                    'pc_twc' => '',
                    'id' => '',
                    'name' => 'Permit Load',
                ],
                'thanks_text' => 'Thanks For Using our site',
                'action_text' => '',
                'action_url' => '',
            ];

            $twc_email = TemporaryWork::select('twc_email')->find($permitdata->temporary_work_id);
            Notification::route('mail',  $twc_email->twc_email ?? '')->notify(new PermitNotification($notify_admins_msg));
            //Notification::route('mail',  $createdby->email ?? '')->notify(new PermitNotification($notify_admins_msg));
            toastSuccess($msg);
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function get_rejected_designbrief(Request $request)
    {
        $id=\Crypt::decrypt($request->tempid);
        $tempdata=TemporaryWork::select(['twc_id_no','status'])->find($id);
        $rejected=TemporaryWorkRejected::where(['temporary_work_id'=>$id])->where('comment','!=','')->get();
        $list='';
        $array=[];
        $status='';
        $i=1;
        $path = config('app.url');
        foreach($rejected as $rej)
        {
            $list .='<tr><td>'.$i.'</td><td>'.$rej->rejected_by.'<br>'.date('H:i Y-m-d',strtotime($rej->acceptance_date)).'</td><td>'.$rej->comment.'<br>'.date('H:i Y-m-d',strtotime($rej->updated_at)).'</td><td><a href='.$path.'pdf/'.$rej->pdf_url.'>PDF</a></td><td>'.$rej->rejected_by.'</td><td>'.$rej->created_at.'</td></tr>';
            $i++;
        }
        $array['list']=$list;
        $array['brief']=$tempdata->twc_id_no;
        if($tempdata->status == 0)
        {
           $status="Pending";
        }
        if($tempdata->status== 2)
        {
            $status='Rejected';
        }
        $array['status']=$status;
       echo json_encode($array);
    }
}
