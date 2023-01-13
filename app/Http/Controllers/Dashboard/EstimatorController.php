<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Utils\Validations;
use App\Models\{EstimatorDesignerList,DesignerQuotation,TemporaryWork,ScopeOfDesign,Project,AttachSpeComment,TemporaryWorkComment,TempWorkUploadFiles,User,Folder,EstimatorDesignerComment,ReviewRating};
use App\Utils\HelperFunctions;
use App\Notifications\EstimatorNotification;
use App\Notifications\TemporaryWorkNotification;
use App\Notifications\DesignerAwarded;
use Notification;
use DB;
use PDF;
use Auth;

class EstimatorController extends Controller
{
    //estimaor index page
    public function index()
    {
        $user=Auth::user();
        if($user->hasRole('estimator'))
        {
            $user = User::with('userCompany')->find(Auth::user()->id);
            $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->project_id;
            }
        }
        elseif($user->hasRole('user'))
        {
            $user=User::role('estimator')->where(['company_id'=>$user->userCompany->id])->first();
            $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->project_id;
            }
        }

        
        $estimator_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
            $q->whereIn('project_id', $ids);
        })->where(['estimator'=>1])->latest()->paginate(20);
        $projects = Project::with('company')->whereIn('id', $ids)->get();
        $scantempwork = '';
        return view('dashboard.estimator.index',compact('estimator_works','scantempwork','projects'));
    }
    //serarch
     //search tempwork
    public function estimator_project_search(Request $request)
    {
        $user=Auth::user();
        try {
            if($user->hasRole('estimator'))
            {
                $user = User::with('userCompany')->find(Auth::user()->id);
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
            }
            elseif($user->hasRole('user'))
            {
                $user=User::role('estimator')->where(['company_id'=>$user->userCompany->id])->first();
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
            }
            $estimator_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($request) {
                $q->whereIn('project_id',$request->projects);
            })->where(['estimator'=>1])->latest()->paginate(20);
            $projects = Project::with('company')->whereIn('id', $ids)->get();
            $scantempwork = '';
            return view('dashboard.estimator.index',compact('estimator_works','scantempwork','projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //search estimator by keywork
    public function estimator_search(Request $request)
    {
        $user=Auth::user();
        try {
            if($user->hasRole('estimator'))
            {
                $user = User::with('userCompany')->find(Auth::user()->id);
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
            }
            elseif($user->hasRole('user'))
            {
                $user=User::role('estimator')->where(['company_id'=>$user->userCompany->id])->first();
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
            }
            $estimator_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->where('description_temporary_work_required', 'LIKE', '%' . $request->terms . '%')->where(['estimator'=>1])->latest()->paginate(20);
            $projects = Project::with('company')->whereIn('id', $ids)->get();
            $scantempwork = '';
            return view('dashboard.estimator.index',compact('estimator_works','scantempwork','projects'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //estimator form
    public function create()
    {
        if (!auth()->user()->hasRole([['estimator','admin']])) {
            toastError('the Estimator is the only appointed person who can create a Estimate design brief. If you require access, please contact your management team to request access for you');
            return Redirect::back();
        }
        try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $designers=User::role(['designer'])->get();
                $suppliers=User::role(['supplier'])->get();
            }else {
                $projects = Project::with('company')->where('company_id', $user->userCompany->id)->get(); 
                $designers=User::role(['designer'])->where(['company_id'=>$user->userCompany->id])->get();
                $suppliers=User::role(['supplier'])->where(['company_id'=>$user->userCompany->id])->get();
            }
            return view('dashboard.estimator.create', compact('projects','designers','suppliers'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //save estimator work
    public function store(Request $request)
    {
        Validations::storeEstimatorWork($request);
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
            $folder_attachements_pdf = [];
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'folder')) {
                    $data = null;
                    $data1 = null;
                    $data = [
                        Str::replace('_folder', '', $key) => $request->$key
                    ];
                    $mykey = Str::replace('_folder', '', $key);
                    if (isset($request->$mykey)) {
                        $data1 = [
                            $request->$mykey => $request->$key
                        ];
                        $folder_attachements_pdf = array_merge($folder_attachements_pdf, $data1);
                    }
                    $folder_attachements = array_merge($folder_attachements, $data);
                    unset($request[$key]);
                }
            }
            $attachcomments = [];
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'comment')) {
                    $data = null;
                    $data1 = null;
                    $data = [
                        $key => $request->$key
                    ];
                    $attachcomments = array_merge($attachcomments, $data);
                    unset($request[$key]);
                }
            }

            //if design req details is exist
            if(isset($request->req_name))
            {
                $desing_req_details=[];
                foreach($request->req_name as $key => $req)
                {
                    $desing_req_details[]=['name'=>$req,'check'=>isset($request->req_check[$key]) ? 'Y':'N','note'=>$request->req_notes[$key]];
                }
                $all_inputs['desing_req_details']=json_encode($desing_req_details);
            }
            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'projaddress', 'signed', 'images','pdfphoto', 'projno', 'projname', 'approval','req_type','req_name','req_check','req_notes','designers','designer_company_emails','action');
            $image_name = '';
            $all_inputs['signature'] = $image_name;
            $all_inputs['created_by'] = auth()->user()->id;
            //work for qrcode
            $all_inputs['status'] = '0';
            //photo work here
            if ($request->photo) {
                $filePath = HelperFunctions::designbriefphotopath();
                $file = $request->file('photo');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['photo'] = $imagename;
            }
            $categorylabel=explode("-",$request->design_requirement_text);
            $all_inputs['category_label']=$categorylabel[0];
            $all_inputs['estimator']=1;
            $all_inputs['estimator_serial_no']= HelperFunctions::generateEstimatorSerial();
            $temporary_work = TemporaryWork::create($all_inputs);
            if ($temporary_work) {
                ScopeOfDesign::create(array_merge($scope_of_design, ['temporary_work_id' => $temporary_work->id]));
                Folder::create(array_merge($folder_attachements, ['temporary_work_id' => $temporary_work->id]));
                AttachSpeComment::create(array_merge($attachcomments, ['temporary_work_id' => $temporary_work->id]));
                //work for upload images here
                $image_links = [];
                if ($request->file('images')) {
                    $filePath = HelperFunctions::temporaryworkImagePath();
                    $files = $request->file('images');
                    foreach ($files  as $key => $file) {
                        $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                        $model = new TemporayWorkImage();
                        $model->image = $imagename;
                        $model->temporary_work_id = $temporary_work->id;
                        $model->save();
                        $image_links[] = $imagename;
                    }
                }
                //work for pdf
                $pdf = PDF::loadView('layouts.pdf.estimator', ['data' => $request->all(), 'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => '', 'comments' => $attachcomments]);
                $path = public_path('estimatorPdf');
                $filename = rand() . '.pdf';
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporary_work->id);
                $model->ped_url = $filename;
                $model->save();
                //send mail to admin
                $notify_msg = [
                    'greeting' => 'Estimator Work Pdf',
                    'subject' => 'Estimator Work -'.$request->projname . '-' .$request->projno,
                    'body' => [
                        'company' => $request->company,
                        'filename' => $filename,
                        'links' => '',
                        'name' =>  $request->projname . '-' . $request->projno,

                    ],
                    'thanks_text' => 'Thanks For Using our site',
                    'action_text' => '',
                    'action_url' => '',
                ];  
                $designer_supplier_email_list1=[];
                if(!empty($request->designer_company_emails))
                {
                    $designer_supplier_email_list1=explode(",",$request->designer_company_emails);
                }
                $designer_supplier_email_list2=$request->designers;
                $finalemaillist=array_merge($designer_supplier_email_list1,$designer_supplier_email_list2);
                foreach($finalemaillist as $list)
                {
                    $list=explode('-',$list);
                    $code=random_int(100000, 999999);
                    EstimatorDesignerList::create([
                        'email'=>$list[0],
                        'temporary_work_id'=>$temporary_work->id,
                        'code'=>$code,
                        'user_id'=>$list[1] ?? NULL,
                    ]);
                    if($request->action=="Save & Email")
                    {
                        Notification::route('mail', $list[0])->notify(new EstimatorNotification($notify_msg, $temporary_work->id,$list[0],$code));
                    }
                    
                }
            }
            toastSuccess('Estimator Brief successfully added!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //unset keys
    public function Unset($request)
    {
        unset($request['list_of_attachments']);
        unset($request['reports_including_site_investigations']);
        unset($request['existing_ground_conditions']);
        unset($request['preferred_non_preferred_methods']);
        unset($request['access_limitations']);
        unset($request['back_propping']);
        unset($request['limitations_on_temporary_works_design']);
        unset($request['details_of_any_hazards']);
        unset($request['3rd_party_requirements']);
        return $request;
    }
    //detail page of estimator
    public function show($id)
    {
        $listOfDesigners=EstimatorDesignerList::with('Estimator.project')->with('quotationSum')->where(['temporary_work_id'=>$id])->get();
        $temporaryWork=TemporaryWork::find($id);
        return view('dashboard.estimator.view',compact('listOfDesigners','id','temporaryWork'));
    }
    //estimator designer quotation page from estimater side
    public function estimatorQuotationDetails(Request $request,$id)
    {
        $QuotaionDetails=DesignerQuotation::where(['temporary_work_id'=>$request->estid,'estimator_designer_list_id'=>$id])->get();
        return view('dashboard.estimator.quotationDetails',compact('QuotaionDetails'));
    }
    //estimater designer comment page from estimator side
    public function estimatorDesignerComments(Request $request,$id)
    {
        $comments=EstimatorDesignerComment::where(['estimator_designer_list_id'=>$id,'temporary_work_id'=>$request->estid])->get();
        return view('dashboard.estimator.estimator-designer-comment',compact('comments'));
    }
    //save question/comment from designer
    public function estimatorDesignerCommentsSave(Request $request)
    {

        $model= new EstimatorDesignerComment;
        $model->comment=$request->comment;
        $model->comment_email=$request->email;
        $model->comment_date=date('Y-m-d H:i:s');
        $model->estimator_designer_list_id=$request->estimator_designer_id;
        $model->temporary_work_id=$request->estimatorId;
        $model->save();
        toastSuccess('Comment submitted successfully!');
        return redirect()->back();
    }

    //save reply by estimator
    public function estimatorDesignerReplySave(Request $request)
    {
        $model=EstimatorDesignerComment::find($request->commentId);
        $model->reply=$request->comment;
        $model->reply_email=Auth::user()->email;
        $model->reply_date=date('Y-m-d H:i:s');
        if($request->public)
        {
            $model->public_status=1;
        }
        $model->save();
        toastSuccess('Reply submitted successfully!');
        return redirect()->back();
    }
    //estimator edit form
    public function edit($id)
    {
         $estimatorId= (int)$id;
         try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $designers=User::role(['designer'])->get();
                $suppliers=User::role(['supplier'])->get();
            }elseif($user->hasRole(['estimator'])) {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();

                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $designers=User::role(['designer'])->where(['company_id'=>$user->userCompany->id])->get();
                $suppliers=User::role(['supplier'])->where(['company_id'=>$user->userCompany->id])->get();
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            }elseif($user->hasRole('user'))
            {
                $userr=User::role('estimator')->where(['company_id'=>$user->userCompany->id])->first();
                $project_idds = DB::table('users_has_projects')->where('user_id', $userr->id)->get();

                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $designers=User::role(['designer'])->where(['company_id'=>$user->userCompany->id])->get();
                $suppliers=User::role(['supplier'])->where(['company_id'=>$user->userCompany->id])->get();
                $projects = Project::with('company')->whereIn('id', $ids)->get();
            }
            $selectedDesignersList=EstimatorDesignerList::select('email')->where('user_id','!=',NULL)->where(['temporary_work_id'=>$estimatorId])->pluck('email')->toArray();
            $inputDesignersList=EstimatorDesignerList::select('email')->where(['temporary_work_id'=>$estimatorId,'user_id'=>NULL])->pluck('email')->toArray();
            $temporaryWork = TemporaryWork::with('scopdesign', 'folder', 'attachspeccomment', 'temp_work_images')->where('id',$estimatorId)->first();
            $selectedproject = Project::with('company')->find($temporaryWork->project_id);
            return view('dashboard.estimator.edit',compact('temporaryWork', 'projects', 'selectedproject','designers','suppliers','selectedDesignersList','inputDesignersList'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //update estimaor work from estimator or twc
    public function update(Request $request, $temporaryWork)
    {
        $temporaryWorkData=TemporaryWork::find($temporaryWork);
        Validations::storeEstimatorWork($request);
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
            $folder_attachements_pdf = [];
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'folder')) {
                    $data = null;
                    $data1 = null;
                    $data = [
                        Str::replace('_folder', '', $key) => $request->$key
                    ];
                    $mykey = Str::replace('_folder', '', $key);
                    if (isset($request->$mykey)) {
                        $data1 = [
                            $request->$mykey => $request->$key
                        ];
                        $folder_attachements_pdf = array_merge($folder_attachements_pdf, $data1);
                    }
                    $folder_attachements = array_merge($folder_attachements, $data);
                    unset($request[$key]);
                }
            }
            $attachcomments = [];
            foreach ($request->keys() as $key) {
                if (Str::contains($key, 'comment')) {
                    $data = null;
                    $data1 = null;
                    $data = [
                        $key => $request->$key
                    ];
                    $attachcomments = array_merge($attachcomments, $data);
                    unset($request[$key]);
                }
            }

            //if design req details is exist
            if(isset($request->req_name))
            {
                $desing_req_details=[];
                foreach($request->req_name as $key => $req)
                {
                    $desing_req_details[]=['name'=>$req,'check'=>isset($request->req_check[$key]) ? 'Y':'N','note'=>$request->req_notes[$key]];
                }
                $all_inputs['desing_req_details']=json_encode($desing_req_details);
            }
            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token','_method','date', 'company_id', 'projaddress', 'signed', 'images','pdfphoto', 'projno', 'projname','preloaded','namesign','signtype','pdfsigntype','approval','req_type','req_name','req_check','req_notes','designers','designer_company_emails','action');
            $image_name = '';
            if(Auth::user()->hasRole('user'))
            {
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

                //work for qrcode
                $j = HelperFunctions::generatetempid($request->project_id);
                $all_inputs['tempid'] = $j;
                $twc_id_no = HelperFunctions::generatetwcid($request->projno, $request->company, $request->project_id);
                $all_inputs['twc_id_no'] = $twc_id_no;

                //make estimator as temporary work
                $all_inputs['estimator']=0;
            }
            $all_inputs['signature'] = $image_name;
            $all_inputs['created_by'] = auth()->user()->id;
            //work for qrcode
            $all_inputs['status'] = '1';
            //photo work here
            if ($request->photo) {
                $filePath = HelperFunctions::designbriefphotopath();
                $file = $request->file('photo');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                @unlink($temporaryWorkData->photo);
                $all_inputs['photo'] = $imagename;
            }
            $categorylabel=explode("-",$request->design_requirement_text);
            $all_inputs['category_label']=$categorylabel[0];
            $temporary_work = TemporaryWork::find($temporaryWork)->update($all_inputs);
            if ($temporary_work) {
                ScopeOfDesign::where(['temporary_work_id'=>$temporaryWork])->update(array_merge($scope_of_design, ['temporary_work_id' => $temporaryWork]));
                Folder::where(['temporary_work_id'=>$temporaryWork])->update(array_merge($folder_attachements, ['temporary_work_id' => $temporaryWork]));
                AttachSpeComment::where(['temporary_work_id'=>$temporaryWork])->update(array_merge($attachcomments, ['temporary_work_id' => $temporaryWork]));
                //work for upload images here
                $image_links = [];
                if ($request->file('images')) {
                    $filePath = HelperFunctions::temporaryworkImagePath();
                    $files = $request->file('images');
                    foreach ($files  as $key => $file) {
                        $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                        $model = new TemporayWorkImage();
                        $model->image = $imagename;
                        $model->temporary_work_id = $temporaryWork;
                        $model->save();
                        $image_links[] = $imagename;
                    }
                }
                //work for pdf
                if(Auth::user()->hasRole('user'))
                {
                    $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $request->all(), 'image_name' => $temporaryWork, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => '', 'comments' => $attachcomments]);
                    $path = public_path('pdf');
                }
                else{
                    $pdf = PDF::loadView('layouts.pdf.estimator', ['data' => $request->all(), 'image_name' => $temporaryWork, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => '', 'comments' => $attachcomments]);
                     $path = public_path('estimatorPdf');
                }
                
                $filename = rand() . '.pdf';
                @unlink($temporaryWorkData->ped_url);
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporaryWork);
                $model->ped_url = $filename;
                $model->save();
                //send mail to admin
                if(Auth::user()->hasRole('user'))
                {
                    //check if temporaywork file upload is constuction
                    $checkfileconstruction=TempWorkUploadFiles::where(['temporary_work_id'=>$temporaryWork,'file_type'=>1,'construction'=>1])->count();
                    if($checkfileconstruction<=0)
                    {
                         $notify_admins_msg = [
                            'greeting' => 'Temporary Work Pdf',
                            'subject' => 'TWP – Design Brief Review - '.$request->projname . '-' . $request->projno,
                            'body' => [
                                'company' => $request->company,
                                'filename' => $filename,
                                'links' => '',
                                'name' =>  $model->design_requirement_text . '-' . $model->twc_id_no,
                                'designer' => '',
                                'pc_twc' => '',
                            ],
                            'thanks_text' => 'Thanks For Using our site',
                            'action_text' => '',
                            'action_url' => '',
                        ];

                        if($request->action="Update & Email")
                        {
                            Notification::route('mail', 'ctwscaffolder@gmail.com')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork));
                            Notification::route('mail', $request->twc_email ?? '')->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork));
                            //designer
                            if ($request->designer_company_email) {
                                $notify_admins_msg['body']['designer'] = 'designer1';
                                Notification::route('mail', $request->designer_company_email)->notify(new TemporaryWorkNotification($notify_admins_msg, $temporaryWork, $request->designer_company_email));
                            }
                        }
                        
                    }
                }
                elseif(Auth::user()->hasRole('estimator') && $temporaryWorkData->estimatorApprove==0)
                {
                    $notify_msg = [
                        'greeting' => 'Estimator Work Pdf',
                        'subject' => 'Estimator Work -'.$request->projname . '-' .$request->projno,
                        'body' => [
                            'company' => $request->company,
                            'filename' => $filename,
                            'links' => '',
                            'name' =>  $request->projname . '-' . $request->projno,

                        ],
                        'thanks_text' => 'Thanks For Using our site',
                        'action_text' => '',
                        'action_url' => '',
                    ]; 
                    $designer_supplier_email_list1=[];
                    if(!empty($request->designer_company_emails))
                    {
                        $designer_supplier_email_list1=explode(",",$request->designer_company_emails);
                    }
                    $designer_supplier_email_list2=$request->designers;
                    $finalemaillist=array_merge($designer_supplier_email_list1,$designer_supplier_email_list2);
                    foreach($finalemaillist as $list)
                    {
                        $list=explode('-',$list);
                        $checkDesignerexist=EstimatorDesignerList::where(['temporary_work_id'=>$temporaryWork,'email'=>$list[0]])->count();
                        if($checkDesignerexist<=0)
                        {
                            $code=random_int(100000, 999999);
                            EstimatorDesignerList::create([
                                'email'=>$list[0],
                                'temporary_work_id'=>$temporaryWork,
                                'code'=>$code,
                                'user_id'=>$list[1] ?? NULL,
                            ]);
                           if($request->action="Update & Email")
                           {
                            Notification::route('mail', $list[0])->notify(new EstimatorNotification($notify_msg, $temporaryWork,$list[0],$code));
                            }
                        } 
                    }
                }
                
            }
            toastSuccess('Estimator Brief successfully Updated!');
            return redirect()->route('temporary_works.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
        //
    }

    //Estimator desinger page from designer side
    public function estimatorDesigner(Request $request,$id)
    {
        try
        {
            $code=\Crypt::decrypt($request->code);
            $record=EstimatorDesignerList::where(['email'=>$request->mail,'code'=>$code])->first();
            if($record)
            {
                $estimatorWork=TemporaryWork::with('project')->find($id);
                $designerquotation=DesignerQuotation::where(['estimator_designer_list_id'=>$record->id])->get();
                $comments=EstimatorDesignerComment::where(['estimator_designer_list_id'=>$record->id,'temporary_work_id'=>$id])->get();
                 $public_comments=EstimatorDesignerComment::where(['temporary_work_id'=>$id,'public_status'=>1])->get();
                //get company record
                $company=Project::with('company')->find($estimatorWork->project_id);
                //get rating of cuurent designer
                //$ratings=ReviewRating::where(['added_by'=>$record->email,'user_id'=>$company->company->id])->first();
                $AwardedEstimators=EstimatorDesignerList::with('estimator.project')->where(['email'=>$request->mail])->get();
                return view('dashboard.estimator.estimator-designer-page',['mail'=>$record->email,'estimatorWork'=>$estimatorWork,'esitmator_designer_id'=>$record->id,'id'=>$id,'designerquotation'=>$designerquotation,'comments'=>$comments,'company'=>$company,'public_comments'=>$public_comments,'AwardedEstimators'=>$AwardedEstimators]);
            }
            else{
                echo "<h1>You Are not allowed</h1>";
            }
         }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
        
    }

    //save designer quotation from designer side
    public function designerQuotation(Request $request)
    {
        try
        {
            for($i=0;$i<count($request->price);$i++)
            {
                $model=new DesignerQuotation;
                $model->price=$request->price[$i];
                $model->description=$request->description[$i];
                $model->date=$request->date[$i];
                $model->estimator_designer_list_id=$request->estimator_designer_id;
                $model->email=$request->email;
                $model->temporary_work_id=$request->estimatorId;
                $model->save();
            }

            toastSuccess('Quotaion successfully Sent!');
            return redirect()->back();
        }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
        
    }
    //estimaor approve page
    public function estimatorApproveDetails($id)
    {
        return view('dashboard.estimator.designer_approve_page');
    }
    //approve one designer from estimator
    public function estimatorDesignerApprove(Request $request)
    {
        try
        {
            $estimatorDesigner=EstimatorDesignerList::find($request->designerId);
            $estimatorDesigner->estimatorApprove=1;
            $estimatorDesigner->save();
            $email=$estimatorDesigner->email;
            $temporary_work_id=$estimatorDesigner->temporary_work_id;
            $code=$estimatorDesigner->code;
            $res=TemporaryWork::find($temporary_work_id)->update(['designer_company_email'=>$email,'estimatorApprove'=>1]);
            if($res)
            { 
                 Notification::route('mail', $email)->notify(new DesignerAwarded($temporary_work_id,$email,$code));
                 toastSuccess('Designer Approved successfully!');
                 return redirect()->back();
            }
           
        }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
    }

    //save designer review about company
    public function designerReview(Request $request)
    {
        try
        {
            $model=new ReviewRating();
            $model->comments=$request->comment;
            $model->star_rating=$request->rating;
            $model->user_id=$request->company;
            $model->added_by=$request->email;
            $model->save();
            toastSuccess('Your review added successfully!');
            return redirect()->back();
        }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
}
