@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])

@section('styles')
<style>
    :root {
    --primary-border--radius:5px;
    }
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    .card>.card-body {
        padding: 32px;
    }
    .tab-content{
        background-color: white;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }
    .

    .card {
        margin: 30px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
    }

    .toolbar-fixed .toolbar {
        background-color: transparent !important;
        border: none !important;
    }

    .card-title h2 {
        color: black;
    }

    table tbody td {
        text-align: center;
    }

    table thead {
        background-color: #f5f8fa;
    }

    table thead th {
        color: #000 !important;
        text-align: center;
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .inputDiv input {
        width: 90%;
        background-color: White !important;
        border-color: #d9dfe3 !important;
        color: #000;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        width: 40%;
        color: #000;
    }

    .select2-container {
        width: 250px !important;
    }

    .inputDiv {
        margin: 10px 0px;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .border{
        border:1px solid red !important;
        border-bottom: 1px solid red !important;
    }
    .border-right{
        border-right:1px solid red !important;
         border-bottom: 1px solid red !important;
    }
    .border-bottom{
        border-bottom: 1px solid red !important;
    }
    input#exampleRadios1:checked[type=radio]{
        background: orange;
    }
    input#exampleRadios2:checked[type=radio]{
        background: green;
    }
    .nav-item{
        border-radius: 0px 35px 0px 0px;
        overflow: hidden;
    }
    .nav-item .tab{
        color: black;
        background: white;
    }
    .nav-item button.active{
        color: white !important;
    }
    input, button, table, select, textarea{
        border-radius: var(--primary-border--radius) !important;
    }
    .fileInput{
        margin-left: 9px !important;
    }
    .queryButton{
        margin-top: 10px;
    }
    table{
        overflow: hidden;
    }
    table thead{
        background-color: #000;
    }
    table thead tr th{
        color: #fff !important;
    }
    .query-table tbody tr {
        background: #f6f6f6 !important;
    }
    .designer-comment{
        background-color: #d7f7e6 !important;
        color: green !important;
    }
    .twc-reply{
        background-color: #fcadad !important;
        color: red !important;
    }
    .tab-pane.active{
        background: white !important;
    }
    .tab-pane{
        padding: 20px 28px;
    }
    .drawing_infoTable tbody tr:nth-child(odd){
        background: #c8e6c8 !important;
    }
</style>

@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="passionate text-dark fw-bolder my-1 fs-3" style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">Temporary Works</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->

    
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container" style="padding-top: 80px">
            <div class="row">
                <div class=' d-flex col-md-6'>
                    <ul class="nav nav-tabs w-100 d-flex pt-0 flex-nowrap" id="myTab" role="tablist">
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100 active" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab1" aria-controls="signin" aria-selected="false" tabindex="-1">Owner</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id="" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="signup" aria-selected="true">Drawing Info</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id="" data-bs-toggle="tab" data-bs-target="#tab3"  type="button" role="tab" aria-controls="owner" aria-selected="false" tabindex="-1">Certificate</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id="" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="owner" aria-selected="false" tabindex="-1">Others</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <!-- tab 1 -->
                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        <!--begin::Card title-->
                        <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Queries for TWC (if applicable)</h2>
                        </div>
                    </div>
                    <div class="row" style="background:white;margin: 0 4px;">
                        <div class="col-md-6">
                            <form class="form-inline" action="{{route('temporarywork.storecomment')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                 <input type="hidden" name="temp_work_id" value="{{$id}}">
                                  <input type="hidden" name="mail" value="{{$mail}}">
                                  <div class="form-group mx-sm-3 mb-2 d-flex" style="flex-direction: column">
                                      <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                       <span >Ask questions or list further requirements for the TWC.</span>
                                      </label>
                                       <textarea rows="4" class="form-control" required="required" name="comment" style="border-radius: var(--primary-border--radius)"></textarea>
                                       &nbsp;&nbsp;
                    
                                  </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3 row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Attachment</span>
                                </label>
                                <input type="file" class="form-control fileInput" name="file" id="inputGroupFile02">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 queryButton">Submit</button>
                        </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col" style="margin: 0 10px">
                            <table class="table query-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Designer's Comments</th>
                                        <th>TWC Reply</th>
                                        <th>Attachement</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @foreach($comments as $cments)
                                    <tr >
                                        <td><b>{{$loop->index+1}}</b></td>
                                        <td class="designer-comment">{{$mail}}<br><b>{{$cments->comment}}</b><br><b>{{date('H:i d-m-Y',strtotime($cments->created_at))}}<br><br><a href="{{$cments->image}}">Download File</a></b></td>
                                        <td class="twc-reply">
                                            @if($cments->replay)
                                             @php $i=0;@endphp
                                             @foreach($cments->replay as $reply)
                                              <p>{{$cments->reply_email}}<br><b>{{$reply}}</b><br><b>{{date('H:i d-m-Y',strtotime($cments->reply_date[$i] ?? ''))}}</b></p>
                                              @php $i++; @endphp
                                             @endforeach
                                            @endif
                                        </td>
                                        <td >
                                            @php
                                             $path = config('app.url');
                                             if(isset($cments->reply_image))
                                             {
                                                    for($j=0;$j < count($cments->reply_image);$j++)
                                                    {
                            
                                                        $image='';
                                                        if(isset($cments->reply_image[$j]))
                                                        {
                                                            $n = strrpos($cments->reply_image[$j], '.');
                                                            $ext=substr($cments->reply_image[$j], $n+1);
                                                            if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                                            {
                                                            echo $image='<a target="_blank" style="color: dodgerblue;" href='.$path.$cments->reply_image[$j].'><img src="'.$path.$cments->reply_image[$j].'" width="50px" height="50px"/></a><hr>';
                                                            }
                                                            else{
                                                            echo $a='<a target="_blank" href="'. $path.$cments->reply_image[$j].'">View File</a><hr>';
                                                            }
                            
                                                        }
                                                    }
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tab 2 -->
                <div class="tab-pane" id="tab2" role="tabpanel">
                    <form id="desingform" action="{{route('designer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <input type="hidden" name="tempworkid" value="{{$id}}">
                        <input type="hidden" name="designermail" value="{{$mail}}">
                        <!-- <input type="hidden" name="type" value="Add" id="formtype" />
                        <input type="hidden" name="designid" value="" id="designid"> -->
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class=" inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:65% !important">
                                                <span class="required"> Drawing Status:</span>

                                            </label>
                                            <!--end::Label-->
                                            
                                        </div>
                                       <div class="d-flex">
                                           <div class="form-check" >
                                              <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                                              <label class="form-check-label" for="exampleRadios1">
                                                Preliminary / For Approval
                                              </label>
                                            </div>
                                            <div class="form-check" >
                                              <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="2">
                                              <label class="form-check-label" for="exampleRadios2">
                                                For Construction
                                              </label>
                                            </div>
                                       </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="file" class="form-control form-control-solid" id="file" name="file[]" style="background: #f5f8fa" required>
                                        </div>
                                        <div style="text-align: center;">
                                            <img class="d-none" width="100" height="100" id="editimage">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Title:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" id="drawing_title" name="drawing_title" value="{{old('drawing_title')}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col-md-4">
                                <div class=" inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Drawing No:</span>

                                    </label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_number"  name="drawing_number" value="{{old('drawing_number')}}" required="required" style="width:34%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="border:none" id="drawingno-addon">P</span>
                                        </div>
                                            <input type="number" max="99" onKeyDown="limitText(this,2);"
                                                    onKeyUp="limitText(this,2);" class="form-control form-control-solid" placeholder="01" name="drawing_postfix_no" required="required" style="width: 20%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Name:</span>
                                    </label>
                                            <!--end::Label-->

                                    <input type="text" class="form-control form-control-solid" id="twd_name" name="twd_name" value="{{old('twd_name')}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="inputDiv d-block">
                                            <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Comments:</span>
                                    </label>
                                            <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" id="comments" name="comments"  >
                                </div>
                            </div>
                        </div>
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col">
                                <button type="submit" class="btn btn-primary float-start">Upload</button>
                            </div>
                        </div>
                    </form>
                        <!-- </div> -->
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col">
                                <table class="table drawing_infoTable" style="border-collapse: collapse;background: none;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Drawing No</th>
                                            <th>Comments</th>
                                            <th>TWD Name</th>
                                            <th>Drawing Title</th>
                                            <th>Preliminary / For Approval</th>
                                            <th>For Construction</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $l=1;
                                        $background='';
                                        $userList = [];
                                        @endphp
                                
                                        @foreach($DesignerUploads as $uploads)
                                        @php
                                        $dno=explode('-',$uploads->drawing_number);
                                        $drawinglastno=$dno[sizeof($dno)-1];
                                        $sliced = array_slice($dno, 0, -1);
                                        $string = implode("-", $sliced);
                                        $remove_p_c =  ltrim(ltrim($drawinglastno, 'P') , 'C');
                                        $fullString=$string.$remove_p_c;
                                        if(!in_array($fullString,$userList))
                                        {
                                            $userList[] = $fullString;
                                            $background = $uploads->preliminary_approval==1 ? 'yellow' : 'lightgreen';
                                
                                        }else{
                                            $background = "";
                                        }
                                        $comments=\App\Models\DrawingComment::where('temp_work_upload_files_id',$uploads->id)->get();
                                        @endphp
                                        <tr style="background: {{$background ?? ''}}">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$uploads->drawing_number}}</td>
                                            <td>{{$uploads->comments}}</td>
                                            <td>{{$uploads->twd_name}}</td>
                                            <td>{{$uploads->drawing_title}}</td>
                                            <td>{{$uploads->preliminary_approval==1 ? 'Yes':'No'}}</td>
                                            <td>{{$uploads->construction==1 ? 'Yes':'No'}}</td>
                                            <td style="display:flex; flex-direction:column;padding: 10px">
                                                <!-- <button class="btn" onclick="Editdesign({{$uploads}});"><i class="fas fa-edit"></i></button>
                                                <a class="btn" href="{{route('designer.delete',$uploads->id)}}"><i class="fas fa-trash"></i></a> -->
                                                <form method="post" action="{{route('drawing.comment')}}">
                                                    @csrf
                                                    <textarea class="form-control" row="2" required name="comment"></textarea><br>
                                                    <input type="hidden" name="drawingid" value="{{$uploads->id}}">
                                                    <input type="hidden" name="tempid" value="{{$uploads->temporary_work_id}}">
                                                    <input type="hidden" name="mail" value="{{$mail}}">
                                                    <button class="btn btn-primary" style="align-self:center">Add Comment</button>
                                                </form></td>
                                        </tr>
                                        @if(count($comments)>0)
                                        @foreach($comments as $cments)
                                        <tr>
                                            <td class="border"><b>{{$l}} - {{$loop->index+1}}</b></td>
                                            <td class="border"><b>Comment/Reply</b></td>
                                            @php $style='';@endphp
                                            @if($mail==$cments->sender_email)
                                            <td colspan="2" style="max-width: 30px;{{$style}}" class="border-bottom" >
                                                <b>{{$cments->drawing_comment}}</b><br>{{$cments->sender_email}}<br>{{date('H:i d-m-Y',strtotime($cments->created_at))}}
                                            </td>
                                            @else
                                            <td colspan="2" style="max-width: 30px;" class="border-bottom" >
                                
                                            </td>
                                            @endif
                                
                                            <td colspan="2" class="border-bottom" style="color: red">
                                                @if($mail!=$cments->sender_email)
                                                <b>{{$cments->drawing_comment}}</b><br>{{$cments->sender_email}}<br>{{date('H:i d-m-Y',strtotime($cments->created_at))}}
                                                @endif
                                                @if($cments->drawing_reply)
                                                @php $i=0;@endphp
                                                @foreach($cments->drawing_reply as $reply)
                                                <p><b>{{$reply}}</b><br>{{$cments->reply_email}}<br>{{date('H:i d-m-Y',strtotime($cments->reply_date[$i] ?? ''))}}</p><hr>
                                                @php $i++; @endphp
                                                @endforeach
                                                @endif
                                            </td>
                                            <td colspan="2" class="border-right">
                                                @php
                                                $path = config('app.url');
                                                if(isset($cments->reply_image))
                                                {
                                                    for($j=0;$j < count($cments->reply_image);$j++)
                                                    {
                                
                                                        $image='';
                                                        if(isset($cments->reply_image[$j]))
                                                        {
                                                            $n = strrpos($cments->reply_image[$j], '.');
                                                            $ext=substr($cments->reply_image[$j], $n+1);
                                                            if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                                            {
                                                            echo $image='<a target="_blank" href='.$path.$cments->reply_image[$j].'><img src="'.$path.$cments->reply_image[$j].'" width="50px" height="50px"/></a><hr>';
                                                            }
                                                            else{
                                                            echo $a='<a target="_blank" href="'. $path.$cments->reply_image[$j].'">View File</a><hr>';
                                                            }
                                
                                                        }
                                                    }
                                                }
                                                @endphp
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        @php $l++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                </div>
                <!-- tab 3 -->
                <div class="tab-pane" id="tab3" role="tabpanel" >
                    <form class="form-inline" action="{{route('designer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="tempworkid" value="{{$id}}">
                          <input type="hidden" name="designermail" value="{{$mail}}">
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col-md-6">
                                <div class="form-group mx-sm-1 mb-2"    style="margin-top: 15px;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Check Certificate:</span>
                                    </label>
                                    <div class="d-flex" >
                                        <input type="file" style="width:25%; flex-grow:1"class="form-control" id="designcheckfile" name="designcheckfile" required="required">
                                                                   &nbsp;&nbsp;
                                                                   <button type="submit" class="btn btn-primary mb-2" style="margin-bottom:0px !important">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                   
                    <div class="row" style="background:white;margin: 0 4px;">
                        <div class="col-md-6">
                            <table class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Design Check Certificate</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @foreach($Designerchecks as $dcc)
                                    <tr >
                                        <td>{{$loop->index+1}}</td>
                                        <td><a href="{{asset($dcc->file_name)}}" target="_blank">DC{{$loop->index+1}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab4" role="tabpanel" >
                    <!-- Risk Assessment and calculations -->
                    <form class="form-group" action="{{route('riskassesment.store')}}" method="post" enctype="multipart/form-data" style="width: 100%;margin: auto 0;">
                        @csrf
                        <input type="hidden" name="tempworkid" value="{{$id}}">
                          <input type="hidden" name="designermail" value="{{$mail}}">
                          <div class="row" style="background:white;margin: 0 4px;">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1" style="margin: 5px;">Select Document:</label><br>
                                    <input type="file" class="form-control" id="riskassesmentfile" name="riskassesmentfile" required="required">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1" style="margin: 5px">Select Document Type:</label><br>
                                    <select class="form-control" name="type"  required>
                                               <option value="" selected disabled>Risk Assessment-Calculations</option>
                                               <option value="5">Risk Assessment</option>
                                               <option value="6">Calculations (Design Notes)</option>
                                    </select>
                                  </div>
                              </div>
                          </div>
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col"><button type="submit" class="btn btn-primary mt-2">Upload</button></div>
                        </div>
                    </form>
                    
                   
                    <div class="row" style="background:white;margin: 0 4px;">
                        <div class="col">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Document Type</th>
                                        <th>File</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @foreach($riskassessment as $riks)
                                    @php
                                     $type='';
                                     if($riks->file_type=="5")
                                     {
                                        $type='Risk Assessment';
                                     }
                                     if($riks->file_type=="6")
                                     {
                                        $type='Calculations';
                                     }
                                     @endphp
                                     <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$riks->created_by}}</td>
                                        <td>{{$type}}</td>
                                        <td><a href="{{asset($riks->file_name)}}" target="_blank">File</a></td>
                                        <td>{{date("d-m-Y",strtotime($riks->created_at));}}</td>
                                     </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('input[name="preliminary_approval"]').on('click', function() {
        var val = $(this).val();
        if (val == 1) {
            $("[datacheck='no']").prop('checked', true);
            $("[datacheck='yes']").prop('checked', false);
        } else {
            $("[datacheck='no']").prop('checked', false);
            $("[datacheck='yes']").prop('checked', true);
        }
    })

    $('input[name="construction"]').on('click', function() {
        var val = $(this).val();
        console.log(val);
        if (val == 1) {
            $("[datacheck1='no']").prop('checked', true);
            $("[datacheck1='yes']").prop('checked', false);
        } else {
            $("[datacheck1='no']").prop('checked', false);
            $("[datacheck1='yes']").prop('checked', true);
        }
    })

    $('input[name="status"]').on('click', function() {
        var val = $(this).val();
        if (val == 1) {
          $("#drawingno-addon").text("P");   
        } else {
            $("#drawingno-addon").text("C");
        }
    })



    function Editdesign(data)
    {
        $("#designid").val(data.id);
        $("#drawing_number").val(data.drawing_number);
        $("#comments").val(data.comments);
        $("#twd_name").val(data.twd_name);
        $("#drawing_title").val(data.drawing_title);
        $("#editimage").attr('src',data.file_name);
        $("#editimage").removeClass('d-none');
        if(data.preliminary_approval == 1)
        {
            $("#exampleRadios1").prop('checked',true);
        }
        else{
            $("#exampleRadios2").prop('checked',true);
        }
        $("#file").removeAttr('required');
        $("#formtype").val('Edit');
    }


    function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}

    // $("#designcheck").on('change',function(){
    //     if($(this).is(":checked"))
    //     {
    //         $(".designcheck").show();
    //         $(".construction").hide();
    //         $("#designcheckfile").attr('required','required');
    //         $("#file").removeAttr('required');
    //     }
    //     else{
    //         $(".designcheck").hide();
    //         $(".construction").show();
    //         $("#designcheckfile").removeAttr('required');
    //         $("#file").attr('required','required');
    //     }
    // })
</script>
@endsection