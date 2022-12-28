<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Utils\Validations;
use App\Models\{EstimatorDesignerList,DesignerQuotation,TemporaryWork,ScopeOfDesign,Project,AttachSpeComment,TemporaryWorkComment,TempWorkUploadFiles,User,Folder,EstimatorDesignerComment};
use Illuminate\Support\Facades\Crypt;
use App\Utils\HelperFunctions;
use App\Notifications\EstimatorNotification;
use Notification;
use DB;
use PDF;
use Auth;

class EstimatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('userCompany')->find(Auth::user()->id);
        $project_idds = DB::table('users_has_projects')->where('user_id', $user->id)->get();
        $ids = [];
        foreach ($project_idds as $id) {
            $ids[] = $id->project_id;
        }
        $estimator_works = TemporaryWork::with('project', 'uploadfile', 'comments', 'scancomment', 'reply', 'permits', 'scaffold', 'rejecteddesign','unloadpermits','closedpermits')->whereHas('project', function ($q) use ($ids) {
            $q->whereIn('project_id', $ids);
        })->where(['estimator'=>1])->latest()->paginate(20);
        $projects = Project::with('company')->whereIn('id', $ids)->get();
        return view('dashboard.estimator.index',compact('estimator_works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $all_inputs  = $request->except('_token', 'date', 'company_id', 'projaddress', 'signed', 'images','pdfphoto', 'projno', 'projname', 'approval','req_type','req_name','req_check','req_notes','designers','designer_company_emails');
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
                    $code=random_int(100000, 999999);
                    EstimatorDesignerList::create([
                        'email'=>$list,
                        'temporary_work_id'=>$temporary_work->id,
                        'code'=>$code,
                    ]);
                    Notification::route('mail', $list)->notify(new EstimatorNotification($notify_msg, $temporary_work->id,$list,$code));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listOfDesigners=EstimatorDesignerList::with('Estimator.project')->where(['temporary_work_id'=>$id])->get();
        return view('dashboard.estimator.view',compact('listOfDesigners','id'));
    }

    public function estimatorQuotationDetails($id)
    {
        $QuotaionDetails=DesignerQuotation::where(['temporary_work_id'=>$request->estid,'estimator_designer_list_id'=>$id])->get();
        return view('dashboard.estimator.quotationDetails',compact('QuotaionDetails'));
    }

    public function estimatorDesignerComments($id)
    {
        $comments=EstimatorDesignerComment::where(['estimator_designer_list_id'=>$id,'temporary_work_id'=>$request->estid])->get();
        return view('dashboard.estimator.estimator-designer-comment',compact('comments'));
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Estimator desinger page
    public function estimatorDesigner(Request $request,$id)
    {
        $code=\Crypt::decrypt($request->code);
        $estimatorWork=TemporaryWork::with('project')->find($id);
        $record=EstimatorDesignerList::where(['email'=>$request->mail,'code'=>$code])->first();
        $designerquotation=DesignerQuotation::where(['estimator_designer_list_id'=>$record->id])->get();
        $comments=EstimatorDesignerComment::where(['estimator_designer_list_id'=>$record->id,'temporary_work_id'=>$id])->get();
        if($record)
        {
            return view('dashboard.estimator.estimator-designer-page',['mail'=>$record->email,'estimatorWork'=>$estimatorWork,'esitmator_designer_id'=>$record->id,'id'=>$id,'designerquotation'=>$designerquotation,'comments'=>$comments]);
        }
        else{
            echo "<h1>You Are not allowed</h1>";
        }
        
    }

    //save designer quotation
    public function designerQuotation(Request $request)
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
        
    }
}
