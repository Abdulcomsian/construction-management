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
use App\Models\ChangeEmailHistory;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Notification;
use Auth;
use App\Notifications\DesignUpload;
use App\Notifications\PermitNotification;
use App\Notifications\ShareDrawingNotification;
use App\Notifications\DrawingCommentNotification;
use App\Notifications\TemporaryWorkNotification;

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
        $tempdata=TemporaryWork::select('designer_company_email','desinger_email_2')->find($id);

        if($mail=$tempdata->designer_company_email)
        {
            ChangeEmailHistory::where(['foreign_idd'=>$id,'type'=>'Designer Company'])->orderBy('id','desc')->update(['status'=>1]);
        }
        if($mail==$tempdata->desinger_email_2)
        {
            ChangeEmailHistory::where(['foreign_idd'=>$id,'type'=>'Designer Checker'])->orderBy('id','desc')->update(['status'=>1]);
        }
        
        $DesignerUploads = TempWorkUploadFiles::where(['file_type' => 1, 'temporary_work_id' => $id,'created_by'=>$mail])->get();
        $Designerchecks = TempWorkUploadFiles::where(['file_type' => 2, 'temporary_work_id' => $id,'created_by'=>$mail])->get();
        $riskassessment = TempWorkUploadFiles::where(['temporary_work_id' => $id,'created_by'=>$mail])->whereIn('file_type',[5,6])->get();
        $twd_name = TemporaryWork::select('twc_name')->where('id', $id)->first();
        $comments=TemporaryWorkComment::where(['temporary_work_id'=> $id,'type'=>'normal'])->get();
        return view('dashboard.designer.index', compact('DesignerUploads', 'id', 'twd_name','Designerchecks','mail','comments','riskassessment','tempdata'));
        
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
            if (isset($request->designcheckfile)) {
                $file = $request->file('designcheckfile');
                $ext = $request->file('designcheckfile')->extension();
                $subject = 'Designer Uploaded Design Check Certificate ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                $text = 'The designer has uploaded a design check certificate to your design brief for '. $tempworkdata->company.' Ltd in the i-Works web portal.';
                $file_type = 2;
                 $imagename = HelperFunctions::saveFile(null, $file, $filePath);
            } else {
                $file_type = 1;
                $file = $request->file('file');
                //$ext = $request->file[0]('file')->extension();
                $subject = 'Designer Uploaded Drawing ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                $text = 'The designer has uploaded a drawing to your design brief for '. $tempworkdata->company.' Ltd in the i-Works web portal. ';
                $model->drawing_number = $request->drawing_number;
                $model->comments = $request->comments;
                $model->twd_name = $request->twd_name;
                $model->drawing_title = $request->drawing_title;
                if(isset($request->status))
                {
                    if($request->status==1)
                    {
                        
                        $model->preliminary_approval = 1;
                        $model->construction = 2;
                    }
                    else{
                        $model->preliminary_approval = 2;
                        $model->construction = 1;
                    }
                }
                else{
                    $model->preliminary_approval = $request->preliminary_approval;
                    $model->construction = $request->construction;
                }
                
                
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
                //
                $chm= new ChangeEmailHistory();
                $chm->email=$tempworkdata->twc_email;
                $chm->type ='Design Upload';
                $chm->foreign_idd=$tempworkdata->id;
                $chm->message='Designer Uploaded Design';
                $chm->status = 2;
                $chm->save();
                // dd($chm->status);
                $notify_admins_msg = [
                    'greeting' => 'Designer Upload Document',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'company'=>$tempworkdata->company,
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
                // Notification::route('mail',  $createdby->email ?? '')->notify(new DesignUpload($notify_admins_msg));
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
        $ramsno=TemporaryWork::select('rams_no','designer_company_email','desinger_email_2','project_id')->find($tempworkid);
        $designearray[0]=$ramsno->designer_company_email;
        if($ramsno->desinger_email_2)
        {
        $designearray[1]=$ramsno->desinger_email_2;
        }
        $list='';
        $path = config('app.url');
        
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('user')) {
               
               if(auth()->user()->hasRole('admin'))
               {
                $company=Project::find($ramsno->project_id);
                $coordinators = User::role('user')->select('email')->where('company_id',$company->company_id)->get();
                $registerupload= TempWorkUploadFiles::with('comment')->where(function ($query) use($coordinators){
                       $query->whereIn('created_by',$coordinators)
                       ->orWhere('created_by',auth()->user()->email);
                      })->where(['file_type'=>1,'temporary_work_id' => $tempworkid])->get();
               }
               else{
                $registerupload= TempWorkUploadFiles::with('comment')->where(function ($query){
                       $query->where(['created_by'=>auth()->user()->email])
                       ->orWhere('created_by','hani.thaher@gmail.com');
                       })->where(['file_type'=>1,'temporary_work_id' => $tempworkid])->get();
               }
               
               if($registerupload)
                {
                    $list.="<h3>TWC Uploaded</h3>";            
                    $list .= '<table class="table table-hover"><thead><tr>';
                    $list .= '<th>No</th>';
                    $list .= '<th>Drawing No</th>';
                    $list .= '<th>Comments</th>';
                    $list .= '<th>Designer Name</th><th>Drawing Title</th><th>Preliminary / For approval</th><th>For Construction Drawing</th><th>Action</th>';
                    $list .= '</tr></thead><tbody>';
                     $i = 1;
                     $background='';
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
                                 <a class="btn btn-primary btn-small" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" title="Share Design Brief" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt" ></i></button>&nbsp;
                                 <button class="btn btn-danger btn-small drawingreply" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                                 <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                    <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                    <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                     <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                    <button style="font-size:8px" type="button" class="btn btn-primary btn-small openpermitform" id="' . $uploads->id . '">Open Permit</button>
                                </form>
                                </td>';
                        } else {
                            $list .= '<td style="display:flex">
                                 <a class="btn btn-primary btn-small" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" title="Share Design Brief" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>
                                 &nbsp;
                                 <button class="btn btn-danger btn-small drawingreply" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                                 <form method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                    <input type="hidden" name="rams_no" value'.$ramsno->rams_no.'/>
                                    <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                    <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                     <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                   
                                </form>
                                </td>';
                        }
                        $list .= '</tr>';
                        if(count($uploads->comment)>0)
                        {
                            $j=1;

                            foreach($uploads->comment as $comment)
                            {
                                 $reply='';
                                 $replydate='';
                                if(isset($comment->drawing_reply[0]))
                                {
                                    $reply=$comment->drawing_reply[0];
                                }
                                if(isset($comment->reply_date[0]))
                                {
                                    $replydate=date("d-m-Y H:i", strtotime($comment->reply_date[0]));
                                }
                                $image = '';
                                if (isset($comment->reply_image[0])) {
                                    $n = strrpos($comment->reply_image[0], '.');
                                    $ext = substr($comment->reply_image[0], $n + 1);
                                    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                                        $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '"><img src="' . $path . $comment->reply_image[0] . '" width="50px" height="50px"/></a>';
                                    } else {
                                        $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '">View File</a>';
                                    }
                                }
                                $list .='<tr>';
                                $list .='<td>'.$i.'-'.$j.'</td>';
                                $list .='<td>Comment/Reply</td>';
                                $list .='<td colspan="5" style="max-width:30px;overflow-x:scroll;">'.$comment->sender_email.'<br><b>'.$comment->drawing_comment.'</b><br>'.date('d-m-Y H:i',strtotime($comment->created_at)).'</td>';
                                $list .='<td colspan="5">'.$comment->reply_email.'<br><b>'.$reply.'</b><br>'.$image.'<br>'.$replydate.'</td>';
                                $list .='</tr>';
                                $j++;

                            }
                            
                        }
                        $i++;
                    }
                    $list .= '</tbody></table>';
                }
        }

        
        for($j=0;$j<count($designearray);$j++)
        {
            $DesignerUploads = TempWorkUploadFiles::with('comment')->where(['temporary_work_id' => $tempworkid, 'file_type' => 1,'created_by'=>$designearray[$j]])->get();            
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
                $list .= '<table class="table table-hover"><thead><tr>';
                $list .= '<th>No</th>';
                $list .= '<th>Drawing No</th>';
                $list .= '<th>Comments</th>';
                $list .= '<th>Designer Name</th><th>Drawing Title</th><th>Preliminary / For approval</th><th>For Construction Drawing</th><th>Action</th>';
                    $list .= '</tr></thead><tbody>';
                $list .= '</tr></thead><tbody>';
                $background='';
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
                             <a class="btn btn-primary btn-small" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" title="Share Design Brief" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>&nbsp;
                             <button class="btn btn-danger btn-small drawingreply" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                             <form id="submit' . $uploads->id . '" method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                 <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                                <button style="font-size:8px" type="button" class="btn btn-primary btn-small openpermitform" id="' . $uploads->id . '">Open Permit</button>
                            </form>
                            </td>';
                    } else {
                        $list .= '<td style="display:flex">
                             <a class="btn btn-primary btn-small" title="View Design Brief" href="' . $path . $uploads->file_name . '" target="_blank">D' . $i . '</a>&nbsp;<button class="btn btn-danger btn-small drawingshare" title="Share Design Brief" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-share-alt"></i></button>&nbsp;
                             <button class="btn btn-danger btn-small drawingreply" title="Reply To Designer" data-id="'.$uploads->id.'"><i style="padding:3px;" class="fa fa-reply"></i></button>
                             <form method="get" action="' . route("permit.load") . '" style="display:inline-block;">
                                <input type="hidden" name="rams_no" value'.$ramsno->rams_no.'/>
                                <input type="hidden" class="temp_work_id" name="temp_work_id" value=' . Crypt::encrypt($tempworkid) . ' />
                                <input type="hidden"  name="drawingno" value=' . $uploads->drawing_number . ' />
                                 <input type="hidden"  name="drawingtitle" value=' . $uploads->drawing_title . ' />
                               
                            </form>
                            </td>';
                    }
                    $list .= '</tr>';
                    if(count($uploads->comment)>0)
                    {
                        $k=1;

                        foreach($uploads->comment as $comment)
                        {
                             $reply='';
                             $replydate='';
                            if(isset($comment->drawing_reply[0]))
                            {
                                $reply=$comment->drawing_reply[0];
                            }
                            if(isset($comment->reply_date[0]))
                            {
                                $replydate=date("d-m-Y H:i", strtotime($comment->reply_date[0]));
                            }
                             $image = '';
                                if (isset($comment->reply_image[0])) {
                                    $n = strrpos($comment->reply_image[0], '.');
                                    $ext = substr($comment->reply_image[0], $n + 1);
                                    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                                        $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '"><img src="' . $path . $comment->reply_image[0] . '" width="50px" height="50px"/></a>';
                                    } else {
                                        $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '">View File</a>';
                                    }
                                }
                            $list .='<tr>';
                            $list .='<td>'.$i.'-'.$k.'</td>';
                            $list .='<td>Comment/Reply</td>';
                            $list .='<td colspan="5" style="max-width:30px;overflow-x:scroll;">'.$comment->sender_email.'<br><b>'.$comment->drawing_comment.'</b><br>'.date('d-m-Y H:i',strtotime($comment->created_at)).'</td>';
                            $list .='<td colspan="5">'.$comment->reply_email.'<br><b>'.$reply.'</b><br>'.$image.'<br>'.$replydate.'</td>';
                            $list .='</tr>';
                            $k++;

                        }
                        
                    }
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
        ChangeEmailHistory::where(['foreign_idd'=>$id,'type'=>'Design Brief'])->orderBy('id','desc')->limit(1)->update(['status'=>1]);
        $tempworkdetail = TemporaryWork::find($id);
        $comments=TemporaryWorkComment::where(['temporary_work_id'=>$id,'type'=>'pc'])->get();
        $rejectedcomments=TemporaryWorkRejected::where(['temporary_work_id'=>$id])->get();
        //dd($rejectedcomments);
        return view('dashboard.designer.pc_index', compact('tempworkdetail','comments','rejectedcomments'));
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
                    //
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->twc_email;
                    $chm->type ='Design Brief Rejected';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Design Breif Rejected by Pc Twc';
                    $chm->status=2;
                    $chm->save();

                    $subject = 'Design Brief Rejected ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                    $text = ' Your design brief has been REJECTED by PC TWC. Please select the link below to amend your submission.';
                    $notify_admins_msg = [
                        'greeting' => 'Design Brief Rejected',
                        'subject' => $subject,
                        'body' => [
                            'text' => $text,
                            'filename' => $tempworkdata->ped_url,
                            'links' =>  '',
                            'name' => $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no,
                            'ext' => '',
                            'comments'=>$request->comments,
                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => '',
                        'action_url' => '',
                    ];
                    Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new DesignUpload($notify_admins_msg));

                    Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));
                    //Notification::route('mail',  $createdby->email ?? '')->notify(new DesignUpload($notify_admins_msg));
                    //Notification::route('mail',  $tempworkdata->designer_company_email ?? '')->notify(new DesignUpload($notify_admins_msg));

                    toastSuccess('Design Brief Rejected Successfully!');
                    return Redirect::back();
                }
            } else {
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
                    //
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->twc_email;
                    $chm->type ='Design Brief Accepted';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Design Breif Approved by Pc Twc';
                    $chm->status=2;
                    $chm->save();
                }
                $subject = 'Design Brief Accepted ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
                     $text = " Attached for your attention is an Accepted PDF design brief created for ". $tempworkdata->company ." Ltd. Relevant documents are included as links in the design brief.";
               
                $notify_admins_msg = [
                    'greeting' => 'Design Brief Accepted',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'company'=>$tempworkdata->company,
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

                Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new DesignUpload($notify_admins_msg));

                Notification::route('mail',  $tempworkdata->twc_email ?? '')->notify(new DesignUpload($notify_admins_msg));

                //Notification::route('mail',  $createdby->email ?? '')->notify(new DesignUpload($notify_admins_msg));
                if($tempworkdata->designer_company_email)
                {
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->designer_company_email;
                    $chm->type ='Designer Company';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Email send to Designer Company';
                    $chm->save();
                   $notify_admins_msg['body']['designer'] = 'designer1';
                   Notification::route('mail',  $tempworkdata->designer_company_email ?? '')->notify(new DesignUpload($notify_admins_msg,$tempworkdata->designer_company_email)); 
                }
                if($tempworkdata->desinger_email_2)
                {
                    $chm= new ChangeEmailHistory();
                    $chm->email=$tempworkdata->desinger_email_2;
                    $chm->type ='Designer Checker';
                    $chm->foreign_idd=$request->tempworkid;
                    $chm->message='Email send to Designer Checker';
                    $chm->save();
                   $notify_admins_msg['body']['designer'] = 'designer1';
                   Notification::route('mail',  $tempworkdata->desinger_email_2 ?? '')->notify(new DesignUpload($notify_admins_msg,$tempworkdata->desinger_email_2)); 
                }
                

                toastSuccess('Design Brief Accepted Successfully!');
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
        $commetns = PermitComments::where(['permit_load_id' => $id])->latest()->get();
        return view('dashboard.designer.pc_permit_index', compact('permitload','commetns'));
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
                $subject = 'Permit Load Accepted';
                $text = ' Welcome to the online i-works Web-Portal.Permit Load Accepted by PC TWC.';
                $msg = 'Permit Load Accepted Successfully!';
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
        $tempdata=TemporaryWork::select(['twc_id_no','status','pc_twc_email'])->find($id);
        $rejected=TemporaryWorkRejected::where(['temporary_work_id'=>$id])->get();
        $list='';
        $array=[];
        $status='';
        $i=1;
        $path = config('app.url');
        $acceptance_date='';
        
        foreach($rejected as $rej)
        {
            $rejdate='';
            if($rej->acceptance_date)
            {
                $acceptance_date=date('H:i d-m-Y',strtotime($rej->acceptance_date));
            }
            if($rej->comment != null)
            {
                $rejdate=date('H:i d-m-Y',strtotime($rej->updated_at));
            }
            $list .='<tr><td>'.$i.'</td><td>'.$tempdata->pc_twc_email.'<br>'.$acceptance_date.'</td><td>'.$rej->comment.'<br>'.$rejdate.'</td><td><a href='.$path.'pdf/'.$rej->pdf_url.'>PDF</a></td><td><a  href='.route('temporary_works.edit',$id).' target="_blank" style="padding: 3px !important;border-radius: 4px;background: #50cd89; font-size: 12px;" class="btn btn-primary p-2 m-1"><i class="fa fa-edit" aria-hidden="true"></i></a></td></tr>';
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
         
         Notification::route('mail',$email)->notify(new ShareDrawingNotification($id,$check));
         toastSuccess('Drawing Share Successfully!');
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
        $createdby=TempWorkUploadFiles::select(['created_by','temporary_work_id'])->find($request->drawingid);
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
        $chm= new ChangeEmailHistory();
        $chm->email=$createdby->created_by;
        $chm->type ='Design Reply';
        $chm->foreign_idd=$createdby->temporary_work_id;
        $chm->message='Twc reply to Comment';
        $chm->status= 2;
        $chm->save();
         Notification::route('mail', $createdby->created_by)->notify(new DrawingCommentNotification($request->reply,'reply',$createdby->created_by,$createdby->temporary_work_id));
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
            $reply='';
                $k = 1;
                 $none='';
                 $replyemail='';
                  $image = '';
                if ($comment->drawing_reply) {
                    $none='display:none;';
                    // for ($j = 0; $j < count($comment->drawing_reply); $j++) {
                        if ($comment->drawing_reply[0]) {
                            
                           
                            if (isset($comment->reply_image[0])) {
                                $n = strrpos($comment->reply_image[0], '.');
                                $ext = substr($comment->reply_image[0], $n + 1);
                                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                                    $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '"><img src="' . $path . $comment->reply_image[0] . '" width="50px" height="50px"/></a>';
                                } else {
                                    $image = '<a target="_blank" href="' . $path . $comment->reply_image[0] . '">View File</a>';
                                }
                            }
                            $date = '';
                            if (isset($comment->reply_date[0])) {
                                $date = date("d-m-Y", strtotime($comment->reply_date[0]));
                            }
                            $reply=$comment->drawing_reply[0];

                            // $replylist .= '<tr style="background:#08d56478;margin-top:1px"><td>R</td><td style="max-width:300px;overflow-x:scroll">' .$comment->reply_email.'<br>'. $comment->drawing_reply[$j] . '</td><td>'. $image . '<br>' . $date . '</td><td>' . $comment->created_at . '</td></tr><br>';
                            $replyemail=$comment->reply_email;
                            $k++;
                        }
                   // }
                }
               
                if (Auth::user()->email==$comment->sender_email) 
                {
                    $none='display:none;';
                }
            $list.='<tr style="padding:5px"><td>'.$i.'</td><td style="max-width:300px;overflow-x:scroll">'.$comment->sender_email.'<br>'.$comment->drawing_comment.'<br'.date('d-m-Y',strtotime($comment->created_at)).'</td><td>'. $replyemail.'<br>'.$reply.'<br>'. $image.'<form style="'. $none.'" method="post" action="' . route("drawing.reply") . '" enctype="multipart/form-data">
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
                $chm = new ChangeEmailHistory();
                $chm->email=$tempdata->twc_email;
                $chm->type ='Design Comment';
                $chm->foreign_idd=$request->tempid;
                $chm->status = 2;
                $chm->message='Designer Company Added Comment';
                $chm->save();
            Notification::route('mail',$tempdata->twc_email)->notify(new DrawingCommentNotification($request->comment,'question','',$request->tempid));
            toastSuccess('Comment Added  Successfully!');
            return Redirect::back();
        }

    }

    //twc drawing comment
    public function twc_drawing_comment(Request $request)
    {
        
        $temp_work_id=TempWorkUploadFiles::find($request->drawingid);
        $tempdata=TemporaryWork::select('twc_email')->find($temp_work_id->temporary_work_id);
        $model= new DrawingComment();
        $model->drawing_comment=$request->commment;
        $model->temp_work_upload_files_id=$request->drawingid;
        $model->sender_email=$tempdata->twc_email;
        if($model->save())
        {
            $chm= new ChangeEmailHistory();
            $chm->email=$temp_work_id->created_by;
            $chm->type ='Designer Company';
            $chm->foreign_idd=$temp_work_id->temporary_work_id;
            $chm->message='Twc Added Comment';
            $chm->save();
            Notification::route('mail', $temp_work_id->created_by)->notify(new DrawingCommentNotification($request->commment,'twcquestion',$temp_work_id->created_by,$temp_work_id->temporary_work_id));
            toastSuccess('Comment Added  Successfully!');
            return Redirect::back();
        }
    }

    public function risk_assessment_store(Request $request)
    {
        $model= new TempWorkUploadFiles();
        $tempworkdata=TemporaryWork::find($request->tempworkid);
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
            $subject = 'Designer Uploaded Risk Assessment ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
            if($request->type==6)
            {
                $subject = 'calculations/design notes ' . $tempworkdata->design_requirement_text . '-' . $tempworkdata->twc_id_no;
            }
             
                $text = 'The designer has uploaded a risk assessment to your design brief for '.$tempworkdata->company.' Ltd in the i-Works web portal.';
            $notify_admins_msg = [
                    'greeting' => 'Designer Upload Document',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                        'company'=>$tempworkdata->company,
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
            toastSuccess('Risk Assessment Uploaded Successfully!');
            return Redirect::back();
        }
   }

   public function get_assessment(Request $request)
   {
     $riskassessment=TempWorkUploadFiles::where(['temporary_work_id'=>$request->id])->whereIn('file_type',[5,6])->get();
     $list='';
     $i=1;
     $path = config('app.url');
     foreach($riskassessment as $risk){
        if($risk->file_type=="5")
        {
            $type="Risk Assessment";
        }
        if($risk->file_type=="6")
        {
            $type='Calculations';
        }
        $list.='<tr><td>'.$i.'</td><td>'.$risk->created_by.'</td><td>'.$type.'</td><td> <a  href="' . $path . $risk->file_name . '" target="_blank">View</a></td><td>'.date('d-m-Y H:i:s',strtotime($risk->created_at)).'</td></tr>';
        $i++;
     }
     return $list;
   }

   public function share_drawing_checker(Request $request)
   {
     $id=$request->id;
     $tempworkid=TempWorkUploadFiles::select('temporary_work_id')->find($id);
     $tempdata=TemporaryWork::select('desinger_email_2')->find($tempworkid->temporary_work_id);
      if($tempdata->desinger_email_2)
     {
        $exist=TempWorkUploadFiles::where(['share_id'=> $id,'created_by'=>$tempdata->desinger_email_2])->count();
        if($exist>0)
        {
             toastSuccess('Drawing Already Shared!');
             return Redirect::back();
        }
        else{
            $model= TempWorkUploadFiles::find($id);
            $newmodel=$model->replicate();
            $newmodel->created_by=$tempdata->desinger_email_2;
            $newmodel->share_id=$id;
           $newmodel->save();
            Notification::route('mail',$tempdata->desinger_email_2)->notify(new ShareDrawingNotification($id));
            toastSuccess('Drawing Share Successfully!');
            return Redirect::back();
        } 
     }
     else{
        toastSuccess('Desing Chcecker Not found!!!');
        return Redirect::back();
     }
   }


   //change emails
   public function change_email(Request $request)
   {
      $id=\Crypt::decrypt($request->id);
      $model=TemporaryWork::find($id);
      //send mail to admin
        $notify_admins_msg = [
            'greeting' => 'Temporary Work Pdf',
            'subject' => $model->design_requirement_text . '-' . $model->twc_id_no,
            'body' => [
                'company' => $model->company,
                'filename' => $model->ped_url,
                'links' => '',
                'name' =>  $model->design_requirement_text . '-' . $model->twc_id_no,
                'designer' => '',
                'pc_twc' => '',
            ],
            'thanks_text' => 'Thanks For Using our site',
            'action_text' => '',
            'action_url' => '',
        ];
        //for design brief approved
        $subject = 'Design Brief Accepted ' . $model->design_requirement_text . '-' .$model->twc_id_no;
        $text = ' Welcome to the online i-works Web-Portal.Design Brief Accepted by PC TWC.';
        $notify_admins_msgg = [
                    'greeting' => 'Design Brief Accepted',
                    'subject' => $subject,
                    'body' => [
                        'text' => $text,
                         'company' => $model->company,
                        'filename' => $model->ped_url,
                        'links' =>  '',
                        'designer' => '',
                        'name' => $model->design_requirement_text . '-' . $model->twc_id_no,
                        'ext' => '',
                        'id'=>$id,
                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];
      if($request->pc_twc_email)
      {
        $chm= new ChangeEmailHistory();
        $chm->email=$request->pc_twc_email;
        $chm->type ='Design Brief';
        $chm->foreign_idd=$id;
        if($chm->save())
        {
            $notify_admins_msg['body']['pc_twc'] = '1';
            Notification::route('mail', $request->pc_twc_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $id));
        }
        $model->pc_twc_email=$request->pc_twc_email;
      }
      if($request->d_email)
      {
        $chm= new ChangeEmailHistory();
        $chm->email=$request->d_email;
        $chm->type ='Designer Company';
        $chm->foreign_idd=$id;
        if($chm->save())
        {
            $notify_admins_msgg['body']['designer'] = 'designer1';
             Notification::route('mail',  $request->d_email)->notify(new DesignUpload($notify_admins_msgg,$request->d_email)); 
        }
        $model->designer_company_email=$request->d_email;
      }
      if($request->dc_email)
      {
        $chm= new ChangeEmailHistory();
        $chm->email=$request->dc_email;
        $chm->type ='Designer Checker';
        $chm->foreign_idd=$id;
        if($chm->save())
        {
            $notify_admins_msgg['body']['designer'] = 'designer1';
            Notification::route('mail',$request->dc_email)->notify(new DesignUpload($notify_admins_msgg,$request->dc_email)); 
        }
        $model->desinger_email_2=$request->dc_email;
      }
      if($model->save())
      {
         toastSuccess('Emails Changed Successfully');
         return Redirect::back();
      }

   }


   public function change_email_history(Request $request)
   {
     $id=\Crypt::decrypt($request->id);
     $changedemailhistory=ChangeEmailHistory::where('foreign_idd',$id)->get();
     $list='';
     $i=1;
     foreach($changedemailhistory as $history)
     {
        
         $cdate=$history->created_at;
        if($history->status==1)
        {
            $status="Read";
            $rdate=$history->updated_at;
        }
        elseif($history->status==0)
        {
             $status="Unread";
             $rdate='';
        }
        else{
             $status="";
             $rdate=$history->updated_at;
        }
        $list.='<tr>';
        $list.='<td>'.$i.'</td>';
        $list.='<td>'.$history->email.'</td>';
        $list.='<td>'.$history->type.'</td>';
        $list.='<td>'.$status.'</td>';
         $list.='<td>'.$history->message.'</td>';
        $list.='<td>'.$cdate.'</td><td>'.$rdate.'</td></tr>';
        $i++;
     }
     echo $list;
   }
}
