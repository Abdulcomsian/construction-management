<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Utils\Validations;
use App\Models\{TemporayWorkImage, AdditionalInformation, EstimatorDesignerList,DesignerQuotation,TemporaryWork,ScopeOfDesign,Project,AttachSpeComment,TemporaryWorkComment,TempWorkUploadFiles,User,Folder,EstimatorDesignerComment,ReviewRating , JobComments, ExtraPrice};
use App\Utils\HelperFunctions;
use App\Notifications\{DesignerAwarded,QuotationSend,EstimatorNotification,TemporaryWorkNotification,DesignerEstimatComment};
use App\Models\ChangeEmailHistory;
use App\Models\ExternalDesignerSupplier;
use App\Models\SelectedOnlineSupplier;
use App\Models\SelectedOnlineDesigners;
use App\Models\PdfFilesHistory;
use Notification;
use App\Models\DesignerCompanyEmail;
use DB;
use PDF;
use Auth;
use App\Mail\CommentEmail;
use Illuminate\Support\Facades\Validator;

class EstimatorController extends Controller
{
    //estimaor index page
    public function index()
    {
        $user=Auth::user();
        if($user->hasRole('estimator') || $user->hasPermissionTo('twc-estimator'))
        {
            $user = User::with('userCompany')->find(Auth::user()->id);
            $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->id;
            }
        }
        elseif($user->hasRole('user'))
        {
           $user = User::with('userCompany')->find(Auth::user()->id);
            $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->id;
            }
        }
        else
        {
            return redirect('/temporary_works');
        }

        
        $estimator_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits','rejecteddesign','checkQuestion','designerQuote', 'unreadQuestions')->whereHas('project', function ($q) use ($ids) {
            $q->whereIn('project_id', $ids);
        })->where(['estimator'=>1])->latest()->paginate(20);
        // dd($estimator_works);
        $projects = Project::with('company')->whereIn('id', $ids)->get();
        $scantempwork = '';
        return view('dashboard.estimator.index',compact('estimator_works','scantempwork','projects'));
    }
    public function testIndex()
    {
        $user=Auth::user();
        if($user->hasRole('estimator') || $user->hasPermissionTo('twc-estimator'))
        {
            $user = User::with('userCompany')->find(Auth::user()->id);
            $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->id;
            }
        }
        elseif($user->hasRole('user'))
        {
           $user = User::with('userCompany')->find(Auth::user()->id);
            $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
            $ids = [];
            foreach ($project_idds as $id) {
                $ids[] = $id->id;
            }
        }
        else
        {
            return redirect('/temporary_works');
        }

        

        
        $estimator_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits','rejecteddesign','checkQuestion')->whereHas('project', function ($q) use ($ids) {
            $q->whereIn('project_id', $ids);
        })->where(['estimator'=>1])->latest()->paginate(20);
        // dd($estimator_works);
        $projects = Project::with('company')->whereIn('id', $ids)->get();
        $scantempwork = '';
        return view('dashboard.estimator.index-test',compact('estimator_works','scantempwork','projects'));
    }
    //serarch
     //search tempwork
    public function estimator_project_search(Request $request)
    {
        $user=Auth::user();
        try {
            if($user->hasRole('estimator') || $user->hasPermissionTo('twc-estimator'))
            {
                $user = User::with('userCompany')->find(Auth::user()->id);
                $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
            }
            elseif($user->hasRole('user'))
            {
                $user = User::with('userCompany')->find(Auth::user()->id);
                $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
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
            if($user->hasRole('estimator') || $user->hasPermissionTo('twc-estimator'))
            {
                $user = User::with('userCompany')->find(Auth::user()->id);
                 $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
            }
            elseif($user->hasRole('user'))
            {
                $user = User::with('userCompany')->find(Auth::user()->id);
                $project_idds = DB::table('projects')->where('company_id', $user->userCompany->id)->get();
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
        if (!auth()->user()->hasRole([['estimator','admin']]) && !auth()->user()->hasPermissionTo('twc-estimator')) {
            toastError('the Estimator is the only appointed person who can create a Estimate design brief. If you require access, please contact your management team to request access for you');
            return Redirect::back();
        }
        try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $designers=User::role(['designer'])->get();
                $suppliers=User::role(['supplier'])->get();
                $adminDesigners=User::role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->whereNull('di_designer_id ')->get();
                $adminSuppliers=User::role('supplier')->where(['added_by'=>1])->get();
                $externalDesigners = ExternalDesignerSupplier::where(['type'=>'designer'])->get();
                $externalSuppliers = ExternalDesignerSupplier::where(['type'=>'supplier'])->get();
                $selectedOnlineDesigners = SelectedOnlineDesigners::with('designerDetails')->get();
                $selectedOnlineSuppliers = SelectedOnlineSupplier::with('supplierDetails')->get();
            }else {
                $projects = Project::with('company')->where('company_id', $user->userCompany->id)->get(); 
                $designers=User::role(['designer'])->where(['company_id'=>$user->userCompany->id])->get();
                $suppliers=User::role(['supplier'])->where(['company_id'=>$user->userCompany->id])->get();
                $adminDesigners=User::role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->whereNull('di_designer_id')->get();
                //dd($adminDesigners);
                $adminSuppliers=User::role('supplier')->where(['added_by'=>1])->get();
                $externalDesigners = ExternalDesignerSupplier::where(['type'=>'designer','company_id'=>$user->userCompany->id])->get();
                $externalSuppliers = ExternalDesignerSupplier::where(['type'=>'supplier','company_id'=>$user->userCompany->id])->get();
                $selectedOnlineDesigners = SelectedOnlineDesigners::with('designerDetails')->where('company_id',$user->userCompany->id)->get();
                $selectedOnlineSuppliers = SelectedOnlineSupplier::with('supplierDetails')->where('company_id',$user->userCompany->id)->get();
            }
            return view('dashboard.estimator.create', compact('projects','designers','suppliers','adminDesigners','adminSuppliers','externalDesigners','externalSuppliers','selectedOnlineDesigners','selectedOnlineSuppliers'));
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

            ini_set('max_execution_time', '300');
            ini_set("pcre.backtrack_limit", "5000000");
            
            $designDocument = $request->description_temporary_work_required;
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            @$dom->loadHtml($designDocument, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors(false);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $item => $image){
                $data = $image->getAttribute("src");
            // dd($data);

            //     dd($data)(;
            $image_explode = explode(';', $data);
            if(count($image_explode) == 2){
                list($type, $data) = [$image_explode[0] , $image_explode[1]];
                list(, $data)      = explode(',', $data);
            }else{
                continue;
            }
            
                // list($type, $data) = explode(';', $data);
                // list(, $data)      = explode(',', $data);
    

                $imgeData = base64_decode($data);
                $image_name= time().$item.'.png';
                $path = public_path().'/temporary/signature/' . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', 'temporary/signature/'.$image_name);
                $image->setAttribute('width' , "120");
                $image->setAttribute('height' , "120");
                $image->removeAttribute("style");
            }
            $content = $dom->saveHTML();
            $all_inputs['description_temporary_work_required'] = $content;
            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('_token','external_designers','files', 'external_suppliers', 'date', 'company_id', 'projaddress', 'signed', 'images','pdfphoto', 'projno', 'projname', 'approval','req_type','req_name','req_check','req_notes','designers','suppliers','designer_company_emails','supplier_company_emails', 'online_designers', 'online_suppliers','action', 'display_sign', 'signtype', 'pdfsigntype', 'namesign');
            //if design req details is exist
            if(isset($request->req_name))
            {
                $desing_req_details=[];
                foreach($request->req_name as $key => $req)
                {
                    $desing_req_details[]=['name'=>$req,'check'=>isset($request->req_check[$req]) ? 'Y':'N','note'=>$request->req_notes[$key]];
                }
                $all_inputs['desing_req_details']=json_encode($desing_req_details);
            }
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
            if($request->action == 'Publish')
            {
                $all_inputs['estimator']=0;

                $j = HelperFunctions::generatetempid($request->project_id);
                $all_inputs['tempid'] = $j;
                $twc_id_no = HelperFunctions::generatetwcid($request->projno, $request->company, $request->project_id);
                $all_inputs['twc_id_no'] = $twc_id_no;
            }else{
                $twc_id_no = HelperFunctions::generatetwcid($request->projno, $request->company, $request->project_id);
            }
            $image_name = '';
            if(Auth::user()->hasRole('user') && $request->display_sign){
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
            }
            
            $all_inputs['signature'] = $image_name;
            if($request->action == 'Publish'){
                $data = $request->except('designer_company_emails');
                $designer_company_emails = str_replace(' ', '', $request->designer_company_emails);
                $designer_company_emails=explode(",",$designer_company_emails);

                $supplier_company_emails = str_replace(' ', '', $request->supplier_company_emails);
                $supplier_company_emails=explode(",",$supplier_company_emails);

                if($request->designers==NULL){
                    $local_designers = Array($request->designers);
                }else{
                    $local_designers = $request->designers;
                }
              
                if($request->online_designers==NULL){
                    $online_designers = Array($request->online_designers);
                }else{
                    $online_designers = $request->online_designers;
                }
                if($request->external_designers==NULL){
                    $external_designers = Array($request->external_designers);
                }else{
                    $external_designers = $request->external_designers;
                }
                if($request->external_suppliers==NULL){
                    $external_suppliers = Array($request->external_suppliers);
                }else{
                    $external_suppliers = $request->external_suppliers;
                }

                if($request->suppliers==NULL){
                    $local_suppliers = Array($request->suppliers);
                }else{
                    $local_suppliers = $request->suppliers;
                }

                if($request->online_suppliers==NULL){
                    $online_suppliers = Array($request->online_suppliers);
                }else{
                    $online_suppliers = $request->online_suppliers;
                }

                //clean arraya, remove any null values
                $designer_company_emails  = array_filter($designer_company_emails);
                $supplier_company_emails  = array_filter($supplier_company_emails);
                $local_designers  = array_filter($local_designers);
                $local_suppliers  = array_filter($local_suppliers);
                $online_designers  = array_filter($online_designers);
                $external_suppliers  = array_filter($external_suppliers);
                $external_designers  = array_filter($external_designers);
                $online_suppliers  = array_filter($online_suppliers);
                
                // dd($designer_company_emails, $supplier_company_emails, $local_designers , $local_suppliers,$online_designers, $online_suppliers );

                $merged_emails = array_merge($local_designers, $local_suppliers, $online_designers,$online_suppliers,$external_designers,$external_suppliers); 
                $cleaned_email = [];
                //Removing -52 for creating emails in proper format
                foreach($merged_emails as $email)
                {
                    $parts = explode('-', $email);
                    $last = array_pop($parts);
                    $cleaned_email[] = array(implode('-', $parts), $last)[0];
                    
                }
                $data['designer_company_email'] = array_merge($cleaned_email, $designer_company_emails, $supplier_company_emails);
                $all_inputs['designer_company_email'] = $data['designer_company_email'][0];
            }

            $temporary_work = TemporaryWork::create($all_inputs);
            if ($temporary_work) {

                ScopeOfDesign::create(array_merge($scope_of_design, ['temporary_work_id' => $temporary_work->id]));
                Folder::create(array_merge($folder_attachements, ['temporary_work_id' => $temporary_work->id]));
                AttachSpeComment::create(array_merge($attachcomments, ['temporary_work_id' => $temporary_work->id]));
                //work for upload images here
                // $image_links = [];
                if ($request->file('images')) {
                    $filePath = HelperFunctions::temporaryworkImagePath();
                    $files = $request->file('images');
                    foreach ($files  as $key => $file) {
                        $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                        $model = new TemporayWorkImage();
                        $model->image = $imagename;
                        $model->temporary_work_id = $temporary_work->id;
                        $model->save();
                        // $image_links[] = $imagename;
                    }
                }

// dd( $data['designer_company_email'] );
                //work for pdf
                if($request->action == 'Publish'){
                    // $data['designer_company_email']=$request->designer_company_emails;
                    $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $data, 'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => $twc_id_no, 'comments' => $attachcomments]);
                    $path = public_path('pdf');
                    $filename = rand() . '.pdf';
                    $pdf->save($path . '/' . $filename);
                    $model = TemporaryWork::find($temporary_work->id);
                    $model->ped_url = $filename;
                    $model->save();

                    //now saving tempwork in pdf history table
                    $model = new PdfFilesHistory();
                    $model->pdf_name = $filename;
                    $model->tempwork_id = $temporary_work->id;
                    $model->save();

                    // foreach($data['designer_company_email'] as $key=>$list){
                        // Remove the first email from the array
                        $emails = $data['designer_company_email'];
                        $notify_admins_msg = [
                            'greeting' => 'Temporary Work PDF',
                            'subject' => 'TWP – Design Brief -'.$request->projname . '-' .$request->projno,
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
                        
                        $notify_admins_msg['body']['designer'] = 'designer1';
                        $notify_msg = $notify_admins_msg;

                        //sending email to zero index here, because it will be remove from array on next line
                        Notification::route('mail', $emails[0])->notify(new TemporaryWorkNotification($notify_msg, $temporary_work->id, $emails[0]));

                        // array_shift($emails);
                        
                        foreach ($emails as $key=>$email) {
                            if($key!=0){ // zero index is already saved in temporary work register
                                $company_email = new DesignerCompanyEmail();
                                $company_email->temporary_work_id = $temporary_work->id;
                                $company_email->email = $email;
                                $company_email->save();
                            }
                            Notification::route('mail', $email)->notify(new TemporaryWorkNotification($notify_msg, $temporary_work->id, $email));
                        }
                     
                        
                    // }       
                    $chm= new ChangeEmailHistory();
                    $chm->email='';
                    $chm->type ='Pre-Conn Published';
                    $chm->foreign_idd=$temporary_work->id;
                    $chm->message='Pre-Conn Published to Temporary work register';
                    $chm->user_type = '';
                    $chm->status = 2;
                    $chm->save();

                    toastSuccess('Pre Con Published successfully!');
                    return redirect()->route('temporary_works.index');

                }else{
                    $dataOfImage = TemporayWorkImage::where('temporary_work_id', '=', $temporary_work->id)->get();
                    $pdf = PDF::loadView('layouts.pdf.estimator', ['data' => $request->all(), 'image_name' => $temporary_work->id, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $dataOfImage, 'twc_id_no' => $twc_id_no, 'comments' => $attachcomments]);
                    $path = public_path('estimatorPdf');
                    $filename = rand() . '.pdf';
                    $pdf->save($path . '/' . $filename);
                    $model = TemporaryWork::find($temporary_work->id);
                    $model->ped_url = $filename;
                    $model->save();

                    //now saving tempwork in pdf history table
                    $model = new PdfFilesHistory();
                    $model->pdf_name = $filename;
                    $model->tempwork_id = $temporary_work->id;
                    $model->save();
                    //send mail to admi

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

               

                    //work for designer email list==============  
                    $this->saveDesignerSupplier( $request->designer_company_emails,$request->designers,$request->action,$notify_msg,$temporary_work->id,'Designer', $request->online_designers,$request->external_designers); 
                    //work for supplier email list=============
                    $this->saveDesignerSupplier($request->supplier_company_emails,$request->suppliers,$request->action,$notify_msg,$temporary_work->id,'Supplier', $request->online_suppliers,$request->external_suppliers);
                }
                toastSuccess('Estimator Brief successfully added!');
                return redirect()->route('estimator.index');
               
            }
            
        } catch (\Exception $exception) {
            dd($exception->getMessage(),$exception->getLine());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    //send email to desinger and save in database
    public function saveDesignerSupplier($emails,$designers_or_suppliers,$action,$notify_msg,$temporary_work_id,$type,$online_designers,$external_designers)
    {
            $email_list1=[];
            $email_list2=[];
            $email_list3=[];
            $email_list4=[];
            if(!empty($emails))
            {
                $email_list1=explode(",",$emails);
            }
            if($designers_or_suppliers)
            {
                $email_list2=$designers_or_suppliers;
            }
            if($online_designers)
            {
                $email_list3=$online_designers;
            }
            if($external_designers)
            {
                $email_list4=$external_designers;
            }
            $finalList=array_merge($email_list1,$email_list2, $email_list3,$email_list4);
            // if($action=="Email Designers & Suppliers")
            // {
                foreach($finalList as $list)
                {
                    $list=explode('-',$list);
                    $list[0] = ltrim($list[0]);
                    $code=random_int(100000, 999999);
                    EstimatorDesignerList::create([
                        'email'=>$list[0],
                        'temporary_work_id'=>$temporary_work_id,
                        'code'=>$code,
                        'type'=>$type,
                        'user_id'=>$list[1] ?? NULL,
                    ]);
                    if($action=="Email Designer & Supplier (For Pricing)")
                    {
                        Notification::route('mail', $list[0])->notify(new EstimatorNotification($notify_msg, $temporary_work_id,$list[0],$code));
                    }
                    
                }
            // }
               
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
        if(Auth::user()->hasRole(['estimator','user']))
        {
            // $listOfDesigners=EstimatorDesignerList::with('Estimator.project')
            //                                         ->with('quotationSum','checkCommentReply')
            //                                         ->where(['temporary_work_id'=>$id])
            //                                         ->whereHas('user' , function($query){
            //                                             $query->whereNull('di_designer_id');
            //                                         })->get();
            $listOfDesigners = EstimatorDesignerList::with('Estimator.project')
            ->with('quotationSum', 'checkCommentReply')
            ->where(['temporary_work_id' => $id])
            ->where(function ($query) {
                $query->whereHas('user', function ($subQuery) {
                    $subQuery->whereNull('di_designer_id');
                })->orWhereNull('user_id');
            })
            ->get();
            $temporaryWork=TemporaryWork::find($id);
            return view('dashboard.estimator.view',compact('listOfDesigners','id','temporaryWork'));
        }
        else
        {
            return redirect('/temporary_works');
        }
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
        if($request->file('attachfile'))
        {$attachfile= $request->file('attachfile');}
        else 
        {$attachfile='';}
        if($request->ccemails)
        { $cc_emails = HelperFunctions::ccEmails($request->ccemails);}
        else
        {$cc_emails = [];}
        $model= new EstimatorDesignerComment;
        $model->comment=$request->comment;
        $model->comment_email=$request->email;
        $model->comment_date=date('Y-m-d H:i:s');
        $model->estimator_designer_list_id=$request->estimator_designer_id;
        $model->temporary_work_id=$request->estimatorId;
        $model->save();
        $temporary_work = TemporaryWork::findorfail($request->estimatorId);
        $estimatorUser=User::find($temporary_work->created_by);
        $type='estimator';
        Notification::route('mail',$estimatorUser->email)->notify(new DesignerEstimatComment($request->email,$type,'','',$attachfile,$cc_emails,$request->comment));
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
       //send email to designer/supplier
       if($request->public)
       {
           $model->public_status=1;
           $this->notifyUserPublicMessage($model->temporary_work_id,$model->comment_email);
       }else
       {
           $type='designer_supplier';
           Notification::route('mail',$model->comment_email)->notify(new DesignerEstimatComment(Null,$type,$model->estimator_designer_list_id,$model->temporary_work_id));  
       }
        $model->save();
       
 
        toastSuccess('Reply submitted successfully!');
        return redirect()->back();
    }

    public function notifyUserPublicMessage($temporary_work_id,$comment_email=null)
    {
        $userlist=EstimatorDesignerList::where(['temporary_work_id'=>$temporary_work_id])->get();
        foreach($userlist as $list)
        {
            $list->public_message=1;
            $list->save();
            $type='designer_supplier';
            Notification::route('mail',$list->email)->notify(new DesignerEstimatComment($comment_email,$type,$list->id,$list->temporary_work_id));
        }
    }
    //estimator edit form
    public function edit($id)
    { 
         $estimatorId= (int)$id;
         try {
            $user = auth()->user();
            if ($user->hasRole(['admin'])) {
                $projects = Project::with('company')->whereNotNull('company_id')->latest()->get();
                $designers=User::role(['designer'])->where(['company_id'=>$user->userCompany->id])->get();
                $suppliers=User::role(['supplier'])->where(['company_id'=>$user->userCompany->id])->get();
                $adminDesigners=User::role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->whereNotNull('designer_company')->get();
                //dd($adminDesigners);
                $adminSuppliers=User::role('supplier')->where(['added_by'=>1])->get();
                $externalDesigners = ExternalDesignerSupplier::where(['type'=>'designer'])->get();
                $externalSuppliers = ExternalDesignerSupplier::where(['type'=>'supplier'])->get();
                $selectedOnlineDesigners = SelectedOnlineDesigners::with('designerDetails')->get();
                $selectedOnlineSuppliers = SelectedOnlineSupplier::with('supplierDetails')->get();
            }elseif($user->hasRole(['estimator'])) {
                $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();

                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $designers=User::role(['designer'])->where(['company_id'=>$user->userCompany->id])->get();
                $suppliers=User::role(['supplier'])->where(['company_id'=>$user->userCompany->id])->get();
                $adminDesigners=User::role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->whereNotNull('designer_company')->get();
                //dd($adminDesigners);
                $adminSuppliers=User::role('supplier')->where(['added_by'=>1])->get();
                $projects = Project::with('company')->whereIn('id', $ids)->get();
                $externalDesigners = ExternalDesignerSupplier::where(['type'=>'designer','company_id'=>$user->userCompany->id])->get();
                $externalSuppliers = ExternalDesignerSupplier::where(['type'=>'supplier','company_id'=>$user->userCompany->id])->get();
                $selectedOnlineDesigners = SelectedOnlineDesigners::with('designerDetails')->where('company_id',$user->userCompany->id)->get();
                $selectedOnlineSuppliers = SelectedOnlineSupplier::with('supplierDetails')->where('company_id',$user->userCompany->id)->get();
            }elseif($user->hasRole('user'))
            {
                // $userr=User::role('estimator')->where(['company_id'=>$user->userCompany->id])->first();
                $userr=User::where(['company_id'=>$user->userCompany->id])->first();
                $project_idds = DB::table('users_has_projects')->where('user_id', $userr->id)->get();
               


                $ids = [];
                foreach ($project_idds as $id) {
                    $ids[] = $id->project_id;
                }
                $designers=User::role(['designer'])->where(['company_id'=>$user->userCompany->id])->get();
                $suppliers=User::role(['supplier'])->where(['company_id'=>$user->userCompany->id])->get();
                $adminDesigners=User::role(['designer','Design Checker','Designer and Design Checker'])->where(['added_by'=>1])->where('designer_company','!=',NULL)->whereNotNull('designer_company')->get();
                //dd($adminDesigners);
                $adminSuppliers=User::role('supplier')->where(['added_by'=>1])->get();
                // $projects = Project::with('company')->whereIn('id', $ids)->get(); //commented by abdul to make project same as create estimator page
                $projects = Project::with('company')->where('company_id', $user->userCompany->id)->get(); 
                $externalDesigners = ExternalDesignerSupplier::where(['type'=>'designer','company_id'=>$user->userCompany->id])->get();
                $externalSuppliers = ExternalDesignerSupplier::where(['type'=>'supplier','company_id'=>$user->userCompany->id])->get();
                $selectedOnlineDesigners = SelectedOnlineDesigners::with('designerDetails')->where('company_id',$user->userCompany->id)->get();
                $selectedOnlineSuppliers = SelectedOnlineSupplier::with('supplierDetails')->where('company_id',$user->userCompany->id)->get();
            }
            $selectedDesignersList=EstimatorDesignerList::select('email')->where('user_id','!=',NULL)->where(['temporary_work_id'=>$estimatorId])->pluck('email')->toArray();
            $inputDesignersList=EstimatorDesignerList::select('email')->where(['temporary_work_id'=>$estimatorId, 'type'=>'Designer', 'user_id'=>NULL])->pluck('email')->toArray();
            $inputSuppliersList=EstimatorDesignerList::select('email')->where(['temporary_work_id'=>$estimatorId,'type'=>'Supplier','user_id'=>NULL])->pluck('email')->toArray();
            $temporaryWork = TemporaryWork::with('designbrief_history', 'scopdesign', 'folder', 'attachspeccomment', 'temp_work_images')->where('id',$estimatorId)->first();
            $selectedproject = Project::with('company')->find($temporaryWork->project_id);
            return view('dashboard.estimator.edit',compact('temporaryWork', 'projects', 'selectedproject','designers','suppliers', 'adminSuppliers', 'adminDesigners', 'selectedDesignersList','inputDesignersList', 'inputSuppliersList','externalDesigners','externalSuppliers','selectedOnlineDesigners','selectedOnlineSuppliers'));
        } catch (\Exception $exception) {
            dd($exception->getMessage(), $exception->getLine());

            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //update estimaor work from estimator or twc
    public function update(Request $request, $temporaryWork)
    {
        // dd($request->all());
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

            ini_set('max_execution_time', '300');
            ini_set("pcre.backtrack_limit", "5000000");

            $designDocument = $request->description_temporary_work_required;
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            @$dom->loadHtml($designDocument, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors(false);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $item => $image){
                $data = $image->getAttribute("src");
            // dd($data);

            //     dd($data)(;
            $image_explode = explode(';', $data);
            if(count($image_explode) == 2){
                list($type, $data) = [$image_explode[0] , $image_explode[1]];
                list(, $data)      = explode(',', $data);
            }else{
                continue;
            }
            
                // list($type, $data) = explode(';', $data);
                // list(, $data)      = explode(',', $data);
    

                $imgeData = base64_decode($data);
                $image_name= time().$item.'.png';
                $path = public_path().'/temporary/signature/' . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', 'temporary/signature/'.$image_name);
                $image->setAttribute('width' , "120");
                $image->setAttribute('height' , "120");
                $image->removeAttribute("style");
            }
            $content = $dom->saveHTML();
            $all_inputs['description_temporary_work_required'] = $content;

            //unset all keys 
            $request = $this->Unset($request);
            $all_inputs  = $request->except('unload_images','files', 'external_designers','external_suppliers', '_token','_method','date', 'company_id', 'projaddress', 'signed', 'images','pdfphoto', 'projno', 'projname','preloaded','namesign','signtype','pdfsigntype','approval','req_type','req_name','req_check','req_notes','designers','suppliers','supplier_company_emails','designer_company_emails','action', 'display_sign', 'signtype', 'pdfsigntype', 'namesign', 'online_designers', 'online_suppliers');
            //if design req details is exist
            if(isset($request->req_name))
            {
                $desing_req_details=[];
                foreach($request->req_name as $key => $req)
                {
                    $desing_req_details[]=['name'=>$req,'check'=>isset($request->req_check[$req]) ? 'Y':'N','note'=>$request->req_notes[$key]];
                }
                $all_inputs['desing_req_details']=json_encode($desing_req_details);
            }
            $image_name = '';
            if(Auth::user()->hasRole('user') && $request->display_sign)
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
                $all_inputs['created_at']= date('Y-m-d H:i:s');
            }else{
                $twc_id_no = HelperFunctions::generatetwcid($request->projno, $request->company, $request->project_id);
                $all_inputs['twc_id_no'] = $twc_id_no;
            }
            $all_inputs['signature'] = $image_name;
            $all_inputs['created_by'] = auth()->user()->id;
            //work for qrcode
            $all_inputs['status'] = '1';
            if($request->action == 'Publish' && $temporaryWorkData->estimatorApprove == 1){ 
                $data = $request->except('');
                $data['designer_company_email'] = Array($temporaryWorkData->designer_company_email);
            } elseif($request->action == 'Publish'){ 
                $data = $request->except('designer_company_emails');
                $designer_company_emails = str_replace(' ', '', $request->designer_company_emails);
                $designer_company_emails=explode(",",$designer_company_emails);

                $supplier_company_emails = str_replace(' ', '', $request->supplier_company_emails);
                $supplier_company_emails=explode(",",$supplier_company_emails);

                if($request->designers==NULL){
                    $local_designers = Array($request->designers);
                }else{
                    $local_designers = $request->designers;
                }

                if($request->online_designers==NULL){
                    $online_designers = Array($request->online_designers);
                }else{
                    $online_designers = $request->online_designers;
                }
                if($request->external_designers==NULL){
                    $external_designers = Array($request->external_designers);
                }else{
                    $external_designers = $request->external_designers;
                }
                if($request->external_suppliers==NULL){
                    $external_suppliers = Array($request->external_suppliers);
                }else{
                    $external_suppliers = $request->external_suppliers;
                }

                if($request->suppliers==NULL){ 
                    $local_suppliers = Array($request->suppliers);
                }else{
                    $local_suppliers = $request->suppliers;
                }

                if($request->online_suppliers==NULL){
                    $online_suppliers = Array($request->online_suppliers);
                }else{
                    $online_suppliers = $request->online_suppliers;
                }
                //clean arraya, remove any null values
                $designer_company_emails  = array_filter($designer_company_emails);
                $supplier_company_emails  = array_filter($supplier_company_emails);
                $local_designers  = array_filter($local_designers);
                $local_suppliers  = array_filter($local_suppliers);
                $online_designers  = array_filter($online_designers);
                $external_suppliers  = array_filter($external_suppliers);
                $external_designers  = array_filter($external_designers);
                $online_suppliers  = array_filter($online_suppliers);

                // dd($designer_company_emails, $supplier_company_emails, $local_designers , $local_suppliers,$online_designers, $online_suppliers );

                $merged_emails = array_merge($local_designers, $local_suppliers, $online_designers,$online_suppliers,$external_designers,$external_designers); 
                //Removing -52 for creating emails in proper format
                $cleaned_email = [];
                foreach($merged_emails as $email)
                {
                    $parts = explode('-', $email);
                    $last = array_pop($parts);
                    $cleaned_email[] = array(implode('-', $parts), $last)[0];
                    
                }
               
                $data['designer_company_email'] = array_merge($cleaned_email, $designer_company_emails, $supplier_company_emails);
                $all_inputs['designer_company_email'] = $data['designer_company_email'][0];
            }

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
                //fetching previously stored attachments
                $image_links = [];
                foreach($temporaryWorkData->temp_work_images as $image){
                    $image_links[]=$image->image;
                }
                //fetching new uploaded attachments
                if ($request->file('images')) {
                    $filePath = HelperFunctions::temporaryworkImagePath();
                    $files = $request->file('images');
                    foreach ($files  as $key => $file) {
                        $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                        $model = new TemporayWorkImage();
                        $model->image = $imagename;
                        $model->temporary_work_id = $temporaryWork;
                        $model->save();
                        // $image_links[] = $imagename;
                    }
                }
                //work for pdf
                if($request->action == 'Publish' && $temporaryWorkData->estimatorApprove == 1){

                    // $data['designer_company_email']=$request->designer_company_emails;
                    // dd($data);
                    $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $data, 'image_name' => $temporaryWork, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => $twc_id_no, 'comments' => $attachcomments]);
                    $path = public_path('pdf');
                    $filename = rand() . '.pdf';
                    $pdf->save($path . '/' . $filename);
                    $model = TemporaryWork::find($temporaryWork);
                    $model->ped_url = $filename;
                    $model->save();

                    // foreach($data['designer_company_email'] as $key=>$list){
                        // Remove the first email from the array
                        $emails = $data['designer_company_email'];
                        $notify_admins_msg = [
                            'greeting' => 'Temporary Work PDF',
                            'subject' => 'TWP – Design Brief -'.$request->projname . '-' .$request->projno,
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
                        
                        $notify_admins_msg['body']['designer'] = 'designer1';
                        $notify_msg = $notify_admins_msg;

                        //sending email to zero index here, because it will be remove from array on next line
                        Notification::route('mail', $emails[0])->notify(new TemporaryWorkNotification($notify_msg, $temporaryWork, $emails[0]));

                        array_shift($emails);
                        
                        foreach ($emails as $email) {
                            // $company_email = new DesignerCompanyEmail();
                            // $company_email->temporary_work_id = $temporaryWork;
                            // $company_email->email = $email;
                            // $company_email->save();

                            DesignerCompanyEmail::updateOrCreate(
                                ['email' => $email , 'temporary_work_id' => $temporaryWork],
                                ['email' => $email , 'temporary_work_id' => $temporaryWork]
                            );

                            Notification::route('mail', $email)->notify(new TemporaryWorkNotification($notify_msg, $temporaryWork, $email, 1));
                        }
                     
                        
                    // }       
                    toastSuccess('Pre Con Published successfully!');
                    return redirect()->route('temporary_works.index');

                } elseif($request->action == 'Publish'){

                    // $data['designer_company_email']=$request->designer_company_emails;
                    $pdf = PDF::loadView('layouts.pdf.design_breif', ['data' => $data, 'image_name' => $temporaryWork, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $image_links, 'twc_id_no' => $twc_id_no, 'comments' => $attachcomments]);
                    $path = public_path('pdf');
                    $filename = rand() . '.pdf';
                    $pdf->save($path . '/' . $filename);
                    $model = TemporaryWork::find($temporaryWork);
                    $model->ped_url = $filename;
                    $model->save();

                    // foreach($data['designer_company_email'] as $key=>$list){
                        // Remove the first email from the array
                        $emails = $data['designer_company_email'];
                        $notify_admins_msg = [
                            'greeting' => 'Temporary Work PDF',
                            'subject' => 'TWP – Design Brief -'.$request->projname . '-' .$request->projno,
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
                        
                        $notify_admins_msg['body']['designer'] = 'designer1';
                        $notify_msg = $notify_admins_msg;
                        // array_shift($emails);
                        
                        foreach($emails as $key => $list){
                            if($key!=0){ // zero index is already saved in temporary work register
                                // $company_email = new DesignerCompanyEmail();
                                // $company_email->temporary_work_id = $temporaryWork;
                                // $company_email->email = $list;
                                // $company_email->save();

                                DesignerCompanyEmail::updateOrCreate(
                                    ['email' => $email , 'temporary_work_id' => $temporaryWork],
                                    ['email' => $email , 'temporary_work_id' => $temporaryWork]
                                );
                            }
                            Notification::route('mail', $list)->notify(new TemporaryWorkNotification($notify_msg, $temporaryWork, $list));                            
                        }
                        $chm= new ChangeEmailHistory();
                        $chm->email='';
                        $chm->type ='Pre-Conn Published';
                        $chm->foreign_idd=$temporaryWork;
                        $chm->message='Pre-Conn Published to Temporary work register';
                        $chm->user_type = '';
                        $chm->status = 2;
                        $chm->save();
                        toastSuccess('Pre Con Published successfully!');
                        return redirect()->route('temporary_works.index');
                } else{
                    $dataOfImage = TemporayWorkImage::where('temporary_work_id', '=', $temporaryWork)->get();
                    $pdf = PDF::loadView('layouts.pdf.estimator', ['data' => $request->all(), 'image_name' => $temporaryWork, 'scopdesg' => $scope_of_design, 'folderattac' => $folder_attachements, 'folderattac1' =>  $folder_attachements_pdf, 'imagelinks' => $dataOfImage, 'twc_id_no' => $twc_id_no, 'comments' => $attachcomments]);
                     $path = public_path('estimatorPdf');
               
                
                $filename = rand() . '.pdf';
                @unlink($temporaryWorkData->ped_url);
                $pdf->save($path . '/' . $filename);
                $model = TemporaryWork::find($temporaryWork);
                $model->ped_url = $filename;
                $model->save();
                
                HelperFunctions::PdfFilesHistory($filename, $temporaryWork, 'pre_con');


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
                
                // if($request->action="Email Designer & Supplier (For Pricing)")
                // {
                     //work for designer email list==============  
                    //  dd($request->designer_company_emails, $request->designers, $request->online_designers);
                    $this->updateDesignerSupplier($request->designer_company_emails,$request->designers,$request->action,$notify_msg,$temporaryWork,'Designer', $request->online_designers);
                    //work for supplier email list=============
                    $this->updateDesignerSupplier($request->supplier_company_emails,$request->suppliers,$request->action,$notify_msg,$temporaryWork,'Supplier', $request->online_suppliers);
                // }
                    
                }
            }
                
            
            toastSuccess('Estimator Brief successfully Updated!');
            return redirect()->route('estimator.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage(), $exception->getLine());
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

     //send email to desinger and save in database
    public function updateDesignerSupplier($emails,$designers_or_suppliers,$action,$notify_msg,$temporary_work_id,$type, $online_designers)
    {
        // dd($action);
           
            $email_list1=[];
            $email_list2=[];
            $email_list3=[];
            if(!empty($emails))
            {
                $email_list1=explode(",",$emails);
            }
            if($designers_or_suppliers)
            {
                $email_list2=$designers_or_suppliers;
            }
            if($online_designers)
            {
                $email_list3=$online_designers;
            }
            $finalList=array_merge($email_list1,$email_list2, $email_list3);
            // EstimatorDesignerList::where('temporary_work_id', $temporary_work_id)->delete();
            foreach($finalList as $list)
            {
                $list=explode('-',$list);
                // $checkDesignerexist=v->first();
                $code=random_int(100000, 999999);

               
                //  if($checkDesignerexist==NULL)
                //  {
                //  EstimatorDesignerList::create([
                //         'email'=>$list[0],
                //         'temporary_work_id'=>$temporary_work_id,
                //         'code'=>$code,
                //         'type'=>$type,
                //         'user_id'=>$list[1] ?? NULL,
                //     ]);
                
                    EstimatorDesignerList::updateOrCreate(
                        ['email' => trim($list[0]) , 'temporary_work_id' => $temporary_work_id],
                        ['email' => trim($list[0]) , 'temporary_work_id' => $temporary_work_id, 'user_id'=>$list[1] ?? NULL, 'code'=>$code, 'type'=>$type]
                    );
                //  }
                //  else{
                //     $code=$checkDesignerexist->code;
                //  }
                if($action=="Email Designer & Supplier (For Pricing)")
                {
                   Notification::route('mail', $list[0])->notify(new EstimatorNotification($notify_msg, $temporary_work_id,$list[0],$code));
                }
                
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
                $AwardedEstimators=EstimatorDesignerList::with('estimator.project')->where(['email'=>$request->mail,'estimatorApprove'=>1])->get();

                return view('dashboard.estimator.estimator-designer-page-test',['mail'=>$record->email,'estimatorWork'=>$estimatorWork,'esitmator_designer_id'=>$record->id,'id'=>$id,'designerquotation'=>$designerquotation,'comments'=>$comments,'company'=>$company,'public_comments'=>$public_comments,'AwardedEstimators'=>$AwardedEstimators,'record'=>$record]);
            }
            else{
                echo "<h1>You Are not allowed</h1>";
            }
         }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
        
    }

    //Estimator desinger page from designer side
    public function estimatorDesignerClient(Request $request,$id)
    { 
        try
        {
            $code=\Crypt::decrypt($request->code);
            // $record=EstimatorDesignerList::where(['email'=>$request->mail,'code'=>$code])->first();
            // $record=EstimatorDesignerList::where(['email'=>$request->email])->first();
            // $estimatorWork=TemporaryWork::with('project')->find($id);
            $estimatorWork=TemporaryWork::with(['additionalInformation.unreadComment', 'extraPrice'])->where('client_email',$request->mail)->get();
            // dd($estimatorWork->extraPrice);
            if($estimatorWork)
            {
                // $estimatorWork=TemporaryWork::with('project')->find($id);
                // $designerquotation=DesignerQuotation::where(['estimator_designer_list_id'=>$record->id])->get();
                // $comments=EstimatorDesignerComment::where(['estimator_designer_list_id'=>$record->id,'temporary_work_id'=>$id])->get();
                // $public_comments=EstimatorDesignerComment::where(['temporary_work_id'=>$id,'public_status'=>1])->get();
                // //get company record
                // $company=Project::with('company')->find($estimatorWork->project_id);
                // //get rating of cuurent designer
                // //$ratings=ReviewRating::where(['added_by'=>$record->email,'user_id'=>$company->company->id])->first();
                // $AwardedEstimators=EstimatorDesignerList::with('estimator.project')->where(['email'=>$request->mail,'estimatorApprove'=>1])->get();

                $designerquotation=DesignerQuotation::where(['temporary_work_id'=>$estimatorWork[0]->id])->get();
                $comments=EstimatorDesignerComment::where(['estimator_designer_list_id'=>$estimatorWork[0]->id,'temporary_work_id'=>$id])->get();
                $public_comments=EstimatorDesignerComment::where(['temporary_work_id'=>$id,'public_status'=>1])->get();
                //get company record
                // $company=Project::with('company')->find($estimatorWork->project_id);
                //get rating of cuurent designer
                //$ratings=ReviewRating::where(['added_by'=>$record->email,'user_id'=>$company->company->id])->first();
                $AwardedEstimators=EstimatorDesignerList::with('estimator.project')->where(['email'=>$request->mail,'estimatorApprove'=>1])->get();
                $viewComments = TemporaryWorkComment::where('temporary_work_id', $id)->get(); // Getting this Temporary Work Comments Data for Blinking functionality of View Comment Button

                return view('dashboard.designer.index-test',[
                    'mail'=>$request->email,
                    'estimatorWork'=>$estimatorWork,
                    'id'=>$id,
                    'designerquotation'=>$designerquotation,
                    'comments'=>$comments,
                    'public_comments'=>$public_comments,
                    'AwardedEstimators'=>$AwardedEstimators, 
                    'viewComments' => $viewComments, 
                ]);
            }  
            // return view('dashboard.designer.index-test');

            // else{
            //     echo "<h1>You Are not allowed</h1>";
            // }
         }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
        
    }

    public function changeStatus(Request $request){
        try{
            $tempWork_id = $request->temporary_work_id;
            $changeStatus = $request->changeStatus;
            $pricingId = $request->extra_price_id;
            $clientComment = $request->clientComment;
            $status = '';
            if($changeStatus == 'approve'){
                $status = 2; // means approved
            }elseif($changeStatus == 'reject'){
                $status = 1; // means rejected
            }

            $extraPricing = ExtraPrice::where('id', $pricingId)->where('temporary_work_id', $tempWork_id)->update([
                'status' => $status,
                'client_comment' => $clientComment,
            ]);
            if($extraPricing){
                // Storing History of that event
                $chm= new ChangeEmailHistory(); 
                $chm->email=$_GET['mail'] ?? '';
                $chm->type ='Extra Price';
                $chm->foreign_idd=$request->temporary_work_id;
                if($changeStatus == 'approve'){
                    $chm->message='Client has approved extra price';
                }else{
                    $chm->message='Client has rejected extra price';
                }
                $chm->save();
                return response()->json(["status" => true, "msg"=>"Pricing Updated Successfully"], 200);
            }
        }catch(\Exception $e){
            return response()->json(["status"=>false, "error_message"=>$e->getMessage()], 400);
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
            $temporary_work = TemporaryWork::find($request->estimatorId);
            //send email to estimator about quotaiton 
            $estimatorUser=User::find($temporary_work->created_by);
            Notification::route('mail', $estimatorUser->email)->notify(new QuotationSend($request->email));
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
        $rating=ReviewRating::where(['user_id'=>$id,'addedBy'=>Auth::user()->id])->first();
        return view('dashboard.estimator.designer_approve_page',['id'=>$id,'rating'=>$rating]);
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

            }
            $estimatorDesigners = EstimatorDesignerList::where('temporary_work_id', $temporary_work_id)->get();
            foreach($estimatorDesigners as $designer){
                if($designer->id != $estimatorDesigner->id){
                     Notification::route('mail', $designer->email)->notify(new DesignerAwarded($temporary_work_id,$designer->email,$code, 'rejected'));
                }
            }
            toastSuccess('Designer Approved successfully!');
            return redirect()->back();
        }catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
         }
    }
    //esitamtor reveiw add and update also to company
    public function estimatorReview(Request $request)
    {
        try
        {
            if($request->type=="Add")
            {
                $model=new ReviewRating();
                $message='Your review added successfully!';
            }
            else{
                $model=ReviewRating::find($request->ratingId);
                $message='Your review updated successfully!';
            }
            
            $model->comments=$request->comment;
            $model->star_rating=$request->rating;
            $model->user_id=$request->designerId;
            $model->added_by=Auth::user()->email;
            $model->addedBy=Auth::user()->id;
            $model->save();
            toastSuccess($message);
            return redirect()->back();
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

    public function readMessage(Request $request)
   {
     $res=EstimatorDesignerList::find($request->id)->update(['public_message'=>0]);
     if($res)
     {
        return response()->json('success');
     }
     else{
         return response()->json('error');
     }
   }

   public function getAdditionalInformation(Request $request){
        try{
            $tempId = $request->id;
            // $tempWork =TemporaryWork::with(['AdditionalInformation.jobComment' => function ($query) {
            //     $query->orderByDesc('created_at');
            // }])->where('id', $tempId)->first();

            $tempWork =TemporaryWork::with(['AdditionalInformation' => function ($query) {
                $query->with(['jobComment' => function($query1){
                    $query1->orderByDesc('created_at');
                }])->where('status' , 'additional_text');
            }])->where('id', $tempId)->first();

            $html = $tempWork->AdditionalInformation ?  view('components.additional-information' , ['tempWorks' => $tempWork])->render() : "No Additional Information Added";
            return response()->json(['success' => true , 'msg' => 'Additional inforamtion find successfully' , 'html' => $html]);
        }catch(\Exception $e){
            return response()->json([ 'success'=>false , 'msg' => 'Something went wrong' , 'error' => $e->getMessage()]);
        }

   }


   public function getAdditionalInformationComment(Request $request){
    try{

        $id = $request->id;
        $additionalInformation = AdditionalInformation::with(['jobComment' => function ($query) {
            $query->orderByDesc('created_at');
        }])->where('id', $id)->first();
        $html = view('components.additional-information-comment' , ['additionalInformation' => $additionalInformation])->render();
        return response()->json(['success' => true , 'msg' => 'Additional inforamtion find successfully' , 'html' => $html]);
    }catch(\Exception $e){
        return response()->json([ 'success'=>false , 'msg' => 'Something went wrong' , 'error' => $e->getMessage()]);
    }

}




   public function getAdditionalComment(Request $request)
   {
    $validator = Validator::make($request->all() , [
                    'comment' => 'required',
                ]);

    if($validator->fails())
    {
        return response()->json(['success' => false , 'msg' => 'Something went wrong!' , 'error' => $validator->getMessageBag()]);
    }
         
   
       try{
           $additional_id = $request->addId;
            $comment = $request->comment;
            $filePath = null;
            if($request->hasFile('commentFile')){
                $file = $request->file('commentFile');
                $filePath = time().'-'.$file->getClientOriginalName();
                $file->move( public_path('uploads/additional_information') , $filePath);
            }

            //new email code starts here
            $additionalInformation = AdditionalInformation::with('temporaryWork.creator', 'temporaryWork.project')->where('id' , $request->addId)->first();
            
            $comment = JobComments::create(['additional_information_id'=> $additional_id , 'comment' => $comment , 'file_destination' => $filePath, 'notified' => 1]);

            $creator = $additionalInformation->temporaryWork->creator;
            $designerEmail =  isset($creator) && !is_null($creator) ? $creator->email : null ;
            if(isset($designerEmail) && !is_null($designerEmail))
            {
                $projName = $additionalInformation->temporaryWork->projname;
                \Mail::to($designerEmail)->send(new CommentEmail($comment , $projName));
            }
            //new email code ends here
            toastSuccess('Comment Added Successfully');
            return redirect()->back();
            // return response()->json(['success' => true , 'msg' => 'Comment Added Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false , 'msg' => 'Something Went Wrong' , 'error' => $e->getMessage()]);
        }


   }


   public function setCommentNotification(Request $request)
   {
        try{
            $id = $request->id;
            JobComments::where('id' , $id)->update(['notified' => 1]);
            return response()->json(["success" => true ,"msg"=> "Comment updated successfully"]);
        }catch(\Exception $e)
        {
            return response()->json(["success" => false ,"msg"=> "Something Went Wrong" , 'error' => $e->getMessage()]);
        }
   }

    public function deleteTemporaryWorkImage(Request $request){

        $fileData = TemporayWorkImage::findorfail($request->filename_id);
        $filePath = public_path($fileData->image); // Replace with the actual file path
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file
            $fileData->delete();
            return response()->json(['message' => 'File deleted successfully']);
        }

        return response()->json(['message' => 'File not found'], 404);  


    }


}
