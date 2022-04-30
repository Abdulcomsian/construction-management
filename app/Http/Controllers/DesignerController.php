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
use App\Models\ShareDrawing;
use App\Models\DrawingComment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Notification;
use Auth;
use App\Notifications\DesignUpload;
use App\Notifications\PermitNotification;
use App\Notifications\ShareDrawingNotification;
use App\Notifications\DrawingCommentNotification;

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
        $riskassessment = TempWorkUploadFiles::where(['file_type' => 5, 'temporary_work_id' => $id,'created_by'=>$mail])->get();
        $twd_name = TemporaryWork::select('twc_name')->where('id', $id)->first();
        $comments=TemporaryWorkComment::where(['temporary_work_id'=> $id,'type'=>'normal'])->get();
        return view('dashboard.designer.index', compact('DesignerUploads', 'id', 'twd_name','Designerchecks','mail','comments','riskassessment'));
        
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
            if(isset($request->designermail))
            {
                $model->created_by = $request->designermail;
            }
            else{
                $model->created_by =Auth::user()->email;
            }
            
            $model->file_name = $imagename;
            $model->file_type = $file_type;
            $model->temporary_work_id = $tempworkdata->id;
            if ($model->save()) {
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
        if($ramsno->desinger_email_2)
        {
        $designearray[1]=$ramsno->desinger_email_2;
        }
        $list='';
        $path = config('app.url');
        
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('user')) {
                $registerupload= TempWorkUploadFiles::where(['temporary_work_id' => $tempworkid, 'file_type' => 1,'created_by'=>auth()->user()->email])->get();
               if($registerupload)
                {
                    $list.="<h3>TWC Uploaded</h3>";            
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

                        $list .= '<tr class="clickable-row cursor-pointer" data-href="' . $path . $uploads->file_name . '" style="background:' . $background . '">';
                        $list .= '<td>' . $i . '</td>';
                        $list .= '<td>' . $uploads->drawing_number . '</td>';
                        $list .= '<td>' . $uploads->comments . '</td>';
                        $list .= '<td>' . $uploads->twd_name . '</td>';
                        $list .= '<td>' . $uploads->drawing_title . '</td>';
                        $list .= '<td>' . $papproval . '</td>';
                        $list .= '<td>' . $construction . '</td>';
                        if ($construction == 'Yes') {
                            $list .= '<td style="display:flex">
                                 <a class="btn btn-primary btn-small" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>&nbsp;
                                 <button class="btn btn-danger btn-small drawingreply" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                                 <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                    <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                    <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                     <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                    <button style="font-size:8px" type="button" class="btn btn-primary btn-small openpermitform" id="' . $uploads->id . '">Open Permit</button>
                                </form>
                                </td>';
                        } else {
                            $list .= '<td style="display:flex">
                                 <a class="btn btn-primary btn-small" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>
                                 &nbsp;
                                 <button class="btn btn-danger btn-small drawingreply" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
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
            if($j==0)
            {
            $DesignerUploads = TempWorkUploadFiles::where(['temporary_work_id' => $tempworkid, 'file_type' => 1,'created_by'=>$designearray[$j]])->get();
            }
            else
            {
                $ids=[];
                $drawingsid=ShareDrawing::select('temp_work_upload_files_id')->where('email',$designearray[$j])->get();
                if(count($drawingsid)>0)
                {
                    foreach($drawingsid as $drawing)
                    {
                        $ids[]=$drawing->temp_work_upload_files_id;
                    }
                }
                $DesignerUploads = TempWorkUploadFiles::where(['temporary_work_id' => $tempworkid, 'file_type' => 1])->where(function($query) use($ids,$designearray){
                    $query->whereIn('id',$ids)
                    ->orWhere('created_by',$designearray[1]);
                })->get();
            }
            
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

                    $list .= '<tr class="clickable-row cursor-pointer" data-href="' . $path . $uploads->file_name . '" style="background:' . $background . '">';
                    $list .= '<td>' . $i . '</td>';
                    $list .= '<td>' . $uploads->drawing_number . '</td>';
                    $list .= '<td>' . $uploads->comments . '</td>';
                    $list .= '<td>' . $uploads->twd_name . '</td>';
                    $list .= '<td>' . $uploads->drawing_title . '</td>';
                    $list .= '<td>' . $papproval . '</td>';
                    $list .= '<td>' . $construction . '</td>';
                    if ($construction == 'Yes') {
                        $list .= '<td style="display:flex">
                             <a class="btn btn-primary btn-small" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>&nbsp;
                             <button class="btn btn-danger btn-small drawingreply" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                             <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                 <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                <button style="font-size:8px" type="button" class="btn btn-primary btn-small openpermitform" id="' . $uploads->id . '">Open Permit</button>
                            </form>
                            </td>';
                    } else {
                        $list .= '<td style="display:flex">
                             <a class="btn btn-primary btn-small" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>&nbsp;
                             <button class="btn btn-danger btn-small drawingreply" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
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
        $rejected=TemporaryWorkRejected::where(['temporary_work_id'=>$id])->get();
        $list='';
        $array=[];
        $status='';
        $i=1;
        $path = config('app.url');
        $acceptance_date='';
        $rejdate='';
        foreach($rejected as $rej)
        {
            if($rej->acceptance_date)
            {
                $acceptance_date=date('H:i d-m-Y',strtotime($rej->acceptance_date));
            }
            if($rej->comment)
            {
                $rejdate=date('H:i d-m-Y',strtotime($rej->updated_at));
            }
            $list .='<tr><td>'.$i.'</td><td>'.$rej->rejected_by.'<br>'.$acceptance_date.'</td><td>'.$rej->comment.'<br>'.$rejdate.'</td><td><a href='.$path.'pdf/'.$rej->pdf_url.'>PDF</a></td><td><a  href='.route('temporary_works.edit',$id).' target="_blank" style="padding: 3px !important;border-radius: 4px;background: #50cd89; font-size: 12px;" class="btn btn-primary p-2 m-1"><i class="fa fa-edit" aria-hidden="true"></i></a></td></tr>';
            $i++;
        }
        $array['list']=$list;
        $array['brief']=$tempdata->twc_id_no;
        $status='Accepted';
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

    public function share_drawing(Request $request)
    {
       
        $id=$request->id;
        $email=$request->email;
        $model= new ShareDrawing();
        $model->email=$email;
        $model->temp_work_upload_files_id=$id;
        $check=0;
        if(isset($request->commentcheckbox)){
            $check=1;
        }
        if($model->save())
        {
         $tempworkid=TempWorkUploadFiles::select('temporary_work_id')->find($id);
         $tempdata=TemporaryWork::select('desinger_email_2')->find($tempworkid->temporary_work_id);
         Notification::route('mail',$email)->notify(new ShareDrawingNotification($id,$check));
         toastSuccess('Drawing Share Successfully!');
         if($tempdata->desinger_email_2)
         {
            $model= new ShareDrawing();
            $model->email=$tempdata->desinger_email_2;
            $model->temp_work_upload_files_id=$id;
            $model->save();
            Notification::route('mail',$tempdata->desinger_email_2)->notify(new ShareDrawingNotification($id));
            toastSuccess('Drawing Share Successfully!');
         }
          return Redirect::back();
        }
    }

    public function get_share_drawing(Request $request)
    {
        $id=$request->id;
        $sharedrawings=ShareDrawing::where('temp_work_upload_files_id',$id)->get();
        $list='';
        $i=1;
        foreach($sharedrawings as $share)
        {
            $list.='<tr><td>'.$i.'</td><td>'.$share->email.'</td><td>'.date("d-m-Y", strtotime($share->created_at)).'</td></tr>';
        }
        return $list;
    }

    public function reply_drawing(Request $request)
    {
        $comments=DrawingComment::find($request->id);
        $createdby=TempWorkUploadFiles::select('created_by')->find($request->drawingid);
        $replyarray=[];
        if (is_array($comments->drawing_reply)) 
        {
                foreach ($comments->drawing_reply as $dt) {
                    $replyarray[] = $dt;
                }
        }
        $replyarray[]=$request->reply;
        if (is_array( $comments->reply_date)) {
                foreach ($comments->reply_date as $dt) {
                    $reply_date[] = $dt;
                }
            }
        $reply_date[] = date('Y-m-d H:i:s');

        $arrayimage = [];
            if (is_array($comments->reply_image)) {
                foreach ($comments->reply_image as $img) {
                    $arrayimage[] = $img;
                }
            }
            if ($request->file('replyfile')) {
                $filePath = HelperFunctions::temporaryworkcommentPath();
                $file = $request->file('replyfile');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $arrayimage[] = $imagename;
            } else {
                $arrayimage[] = null;
            }
            

        $comments->update(['drawing_reply'=>$replyarray,'reply_date'=>$reply_date,'reply_image'=>$arrayimage,'reply_email'=>Auth::user()->email]);
         Notification::route('mail', $createdby->created_by)->notify(new DrawingCommentNotification($request->reply,'reply'));
        toastSuccess('Reply send  Successfully!');
        return Redirect::back();
        
    }

    public function get_reply_drawing(Request $request)
    {
        $id=$request->id;
        $drawings=DrawingComment::where('temp_work_upload_files_id',$id)->get();
        $list='';
        $i=1;
         $path = config('app.url');
        foreach($drawings as $x => $comment)
        {
            //reply 
            $replylist = '';
                $k = 1;
                if ($comment->drawing_reply) {
                    for ($j = 0; $j < count($comment->drawing_reply); $j++) {
                        if ($comment->drawing_reply[$j]) {
                        
                            $image = '';
                            if (isset($comment->reply_image[$j])) {
                                $n = strrpos($comment->reply_image[$j], '.');
                                $ext = substr($comment->reply_image[$j], $n + 1);
                                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                                    $image = '<a target="_blank" href="' . $path . $comment->reply_image[$j] . '"><img src="' . $path . $comment->reply_image[$j] . '" width="50px" height="50px"/></a>';
                                } else {
                                    $image = '<a target="_blank" href="' . $path . $comment->reply_image[$j] . '">View File</a>';
                                }
                            }
                            $date = '';
                            if (isset($comment->reply_date[$j])) {
                                $date = date("d-m-Y", strtotime($comment->reply_date[$j]));
                            }
                            $replylist .= '<tr style="background:#08d56478;margin-top:1px"><td>R</td><td>' .$comment->reply_email.'<br>'. $comment->drawing_reply[$j] . '</td><td>'. $image . '<br>' . $date . '</td><td>' . $comment->created_at . '</td></tr><br>';
                            $k++;
                        }
                    }
                }
            $list.='<tr style="padding:5px"><td>'.$i.'</td><td>'.$comment->sender_email.'<br>'.$comment->drawing_comment.'<br'.date('d-m-Y',strtotime($comment->created_at)).'</td><td><form method="post" action="' . route("drawing.reply") . '" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                                   <input type="hidden" name="id" value="' . $comment->id . '"/>
                                   <input type="hidden" name="drawingid" value="'.$id.'" />
                                   <textarea style="width: 100%" type="text" class="replay" name="reply" style="float:left"></textarea>
                                    <div class="submmitBtnDiv">
                                        <input style="width:50%;margin-top:20px;float:left" type="file" name="replyfile" />
                                        <button class="btn btn-primary replay-comment" style="font-size:10px;margin-top:10px;float:right;">submit</button>
                                    </div>
                                </form></td><td>'.$comment->created_at.'</td></tr>'.$replylist.'';
            $i++;
        }
        return $list;
    }

    public function drawing_comment(Request $request)
    {
        $tempdata=TemporaryWork::select('twc_email')->find($request->tempid);
        $model= new DrawingComment();
        $model->drawing_comment=$request->comment;
        $model->temp_work_upload_files_id=$request->drawingid;
        $model->sender_email=$request->mail;
        if($model->save())
        {
            Notification::route('mail',$tempdata->twc_email)->notify(new DrawingCommentNotification($request->comment,'question'));
            toastSuccess('Comment Added  Successfully!');
            return Redirect::back();
        }

    }

    public function risk_assessment_store(Request $request)
    {
        $model= new TempWorkUploadFiles();
        $model->file_type=$request->type;
        $model->created_by=$request->designermail;
        $filePath = HelperFunctions::temporaryworkuploadPath();
        if (isset($request->riskassesmentfile)) {
            $file = $request->file('riskassesmentfile');
            $ext = $request->file('riskassesmentfile')->extension();
            $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            $model->file_name=$imagename;
         }
         $model->temporary_work_id=$request->tempworkid;
        if($model->save())
        {
            toastSuccess('Risk Assessment Uploaded Successfully!');
            return Redirect::back();
        }
   }

   public function get_assessment(Request $request)
   {
     $riskassessment=TempWorkUploadFiles::where(['file_type'=>5,'temporary_work_id'=>$request->id])->get();
     $list='';
     $i=1;
     $path = config('app.url');
     foreach($riskassessment as $risk){
        $list.='<tr><td>'.$i.'</td><td>'.$risk->created_by.'</td><td> <a  href="' . $path . $risk->file_name . '" target="_blank">Risk Assessment-' . $i . '</a></td><td>'.date('d-m-Y',strtotime($risk->created_at)).'</td></tr>';
        $i++;
     }
     return $list;
   }
}
