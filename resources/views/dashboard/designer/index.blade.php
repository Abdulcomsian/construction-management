@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style>
    :root {
        --primary-border--radius: 5px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .card>.card-body {
        padding: 32px;
    }

    .tab-content {
        background-color: white;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

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
        background-color: #f5f8fa ;
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

    .border {
        border: 1px solid red !important;
        border-bottom: 1px solid red !important;
    }

    .border-right {
        border-right: 1px solid red !important;
        border-bottom: 1px solid red !important;
    }

    .border-bottom {
        border-bottom: 1px solid red !important;
    }

    input#exampleRadios1:checked[type=radio] {
        background: orange;
    }

    input#exampleRadios2:checked[type=radio] {
        background: green;
    }

    .nav-item {
        border-radius: 0px 35px 0px 0px;
        overflow: hidden;
    }

    .nav-item .tab {
        color: black;
        background: white;
    }

    .nav-item button.active {
        color: white !important;
    }

    input,
    button,
    table,
    select,
    textarea {
        border-radius: var(--primary-border--radius) !important;
    }

    .fileInput {
        margin-left: 9px !important;
    }

    .queryButton {
        margin-top: 10px;
    }

    table {
        overflow: hidden;
    }

    table thead {
        background-color: #000;
    }

    table thead tr th {
        color: #fff !important;
    }

    .query-table tbody tr {
        background: #f6f6f6 !important;
    }

    .designer-comment {
        background-color: #d7f7e6 !important;
        color: green !important;
    }

    .twc-reply {
        background-color: #fcadad !important;
        color: red !important;
    }

    .tab-pane.active {
        background: white !important;
    }

    .tab-pane {
        padding: 20px 28px;
    }

    .drawing_infoTable tbody tr:nth-child(odd) {
        /* background: #c8e6c8 !important; */
         background: pink !important; 

        
    }
    .tag-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tag {
            padding: 5px 10px;
            border: 1px solid #ccc;
            cursor: pointer;
            user-select: none;
        }

        .tag.selected {
            background-color: #007bff;
            color: #fff;
        }

        /* Hide the actual checkbox */
        input[type="checkbox"] {
            /* display: none; */
        }
        .btn-comment{
            color: white !important;
    border: 1px solid green !important;
    background-color: green;
    padding: 1px 10px !important;
    font-size: 12px;
        }

</style>
@include('dashboard.modals.drawing_delete_modals')

@endsection
@section('content')
@php $certificate_active = '' @endphp
@if(isset($_GET['cert']))
@php
    $certificate_active = 'active';
@endphp
@endif
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="passionate text-dark fw-bolder my-1 fs-3"
                    style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">
                    Temporary Works</h1>
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
                <div class="col" style="margin: 0 10px">
                    <table class="table query-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Design Brief</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>1</td>
                                
                                <td >
                                    <a target="_blank" href="{{asset('pdf/'.$tempdata->ped_url)}}">Design Brief</a>
                                    
                                    </td>
                                <td>{{$tempdata->created_at}}</td>

                            </tr>
                            @php
                                $i=2
                            @endphp
                            @foreach($tempdata->pdfFilesDesignBrief as $pdf_files)
                            <tr>
                                <td>{{$i}}</td>
                                
                                <td class="">
                                    <a target="_blank" href="{{asset('pdf/'.$pdf_files->pdf_name)}}">Design Brief</a></td>
                                   
                             

                                <td class="">{{$pdf_files->created_at}}</td>
                            
                            </tr>
                            @php 
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{-- <label class="align-items-center fs-6 fw-bold mb-2" style="display:inline;">
                        <span class="">Design Brief Title: </span>
                        </label>
                        <label class="form-check-label" for="exampleRadios1">
                        {{$tempdata->design_requirement_text}}. To Download Design Brief <<a href="{{asset('pdf/'.$tempdata->ped_url)}}">Click here</a>
                    </label> --}}
                    @if($tempdata->estimatorApprove)
                        <label class="align-items-center fs-6 fw-bold mb-2" style="display:inline;">
                            <span class="">View Pricing:  </span>
                            </label>
                            <label class="form-check-label" for="exampleRadios1">To View Pricing <<a href="{{route('estimator.designer',$id.'/?mail='.$mail.'&code='.Crypt::encrypt($estimato_designer->code ?? ''))}}">Click here</a>
                        </label>                         
                    @endif       
                </div>
                <div class=' d-flex col-md-6'>
                    <ul class="nav nav-tabs w-100 d-flex pt-0 flex-nowrap" id="myTab" role="tablist">

                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100 {{$certificate_active == 'active' ? '' : 'active'}}" id="" data-bs-toggle="tab"
                                data-bs-target="#tab2" type="button" role="tab" aria-controls="signup"
                                aria-selected="{{$certificate_active == 'active' ? 'false' : 'true'}}">Drawing Info</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100 {{$certificate_active == 'active' ? 'active' : ''}}" id="" data-bs-toggle="tab"
                                data-bs-target="#tab3" type="button" role="tab" aria-controls="owner"
                                aria-selected="{{$certificate_active == 'active' ? 'true' : 'false'}}" tabindex="-1">Certificate</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id="" data-bs-toggle="tab"
                                data-bs-target="#tab4" type="button" role="tab" aria-controls="owner"
                                aria-selected="false" tabindex="-1">Others</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100 " id="" type="button" role="tab"
                                data-bs-toggle="tab" data-bs-target="#tab1" aria-controls="signin" aria-selected="false"
                                tabindex="-1">Queries</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <!-- tab 1 -->
                <div class="tab-pane fade show " id="tab1" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        <!--begin::Card title-->
                        <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Queries for TWC (if applicable)</h2>
                        </div>
                    </div>
                    <div class="row" style="background:white;margin: 0 4px;">
                        <div class="col-md-6">
                            <form class="form-inline" action="{{route('temporarywork.storecomment')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="temp_work_id" value="{{$id}}">
                                <input type="hidden" name="mail" value="{{$mail}}">
                                <input type="hidden" name="type" value="designertotwc">
                                <div class="form-group mx-sm-3 mb-2 d-flex" style="flex-direction: column">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Ask questions or list further requirements for the TWC.</span>
                                    </label>
                                    <textarea rows="4" class="form-control" required="required" name="comment"
                                        style="border-radius: var(--primary-border--radius)"></textarea>
                                    &nbsp;&nbsp;

                                </div>

                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3 row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span>Attachment</span>
                                </label>
                                <input type="file" name="image" class="form-control fileInput" id="inputGroupFile02">
                            </div>
                            <!-- <button type="submit" class="btn btn-primary mb-2 queryButton">Submit</button> -->
                        </div>
                        <div class="row" style="background:white;margin: 0 4px;">
                         
                            <div class="col-md-4">
                                <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;" >
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span >Cc Emails: <span style = "color:grey;">(use comma separated multiple emails)</span></span>
                                    </label>
                                    <!--end::Label-->

                                    <input type="text" class="form-control form-control-solid" id="ccemails"
                                        name="queriesccemails" value="" />
                                </div>
                            </div>
                            <div class = "col-md-2 d-flex flex-column justify-content-center align-items-center pt-7">
                                <button type="submit" class="btn btn-primary mb-2 queryButton">Submit</button>
                            </div>
                            
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
                                        <th>TWC Comments</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $path = config('app.url');
                                    @endphp
                                    @foreach($comments as $cments)
                                    <tr>
                                        <td><b>{{$loop->index+1}}</b></td>
                                        @if($cments->type=='normal')
                                        <!-- added by Abdul to show only designers comment -->
                                        <td class="designer-comment">
                                            {{$cments->sender_email}}<br><b style="white-space: pre-wrap;background: yellow  !important"">{{$cments->comment}}</b><br><b>{{date('H:i
                                                d-m-Y',strtotime($cments->created_at))}}</b>
                                            <br><br>
                                            @php
                                            if(isset($cments->image)){
                                            @endphp
                                            <a href="{{$path}}{{$cments->image}}">View File</a>
                                            @php
                                            }
                                            @endphp
                                            </b>
                                        </td>
                                        @endif

                                        @if($cments->replay)

                                        <td class="twc-reply">
                                            @php $i=0;@endphp
                                            @foreach($cments->replay as $reply)
                                            <p style="white-space:pre-wrap; text-align:center;">{{$cments->reply_email}}<br><b>{{$reply}}</b><br><b style="white-space:normal;">{{date('H:i
                                                    d-m-Y',strtotime($cments->reply_date[$i] ?? ''))}}</b></p>
                                            @php $i++; @endphp
                                            @endforeach
                                            @endif
                                            @if($cments->type=='twctodesigner')
                                        <td class="designer-comment"></td>
                                        <td class="twc-reply">{{$mail}}<br><b style="white-space: pre-wrap;">{{$cments->comment}}</b><br><b>{{date('H:i
                                                d-m-Y',strtotime($cments->created_at))}}</b>
                                            <br><br>
                                            @php
                                            if(isset($cments->image)){
                                            @endphp
                                            <a href="{{$path}}{{$cments->image}}">View File</a>
                                            @php
                                            }
                                            @endphp
                                            </b>
                                            <hr />
                                        </td>
                                        @endif
                                        <br><br>
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
                                            echo $image='<a target="_blank" style="color: dodgerblue;"
                                                href='.$path.$cments->reply_image[$j].'><img
                                                    src="'.$path.$cments->reply_image[$j].'" width="50px"
                                                    height="50px" /></a>
                                            <hr>';
                                            }
                                            else{
                                            echo $a='<a target="_blank" href="'. $path.$cments->reply_image[$j].'">View
                                                File</a>
                                            <hr>';
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
                <div class="tab-pane {{$certificate_active == 'active' ? '' : 'active'}}" id="tab2" role="tabpanel">
                    <form id="desingform" action="{{route('designer.store')}}" method="post"
                        enctype="multipart/form-data">
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
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                                style="width:65% !important">
                                                <span class="required"> Drawing Status:</span>

                                            </label>
                                            <!--end::Label-->

                                        </div>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="exampleRadios1" value="1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Preliminary / For Approval
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="exampleRadios2" value="2">
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
                                            <input type="file" class="form-control form-control-solid" id="file"
                                                name="file[]" style="background: #f5f8fa" required>
                                        </div>
                                        <div style="text-align: center;">
                                            <img class="d-none" width="100" height="100" id="editimage">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputDiv d-block">
                                        
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Title:</span>

                                            </label>
                                        
                                            <input type="text" class="form-control form-control-solid"
                                                id="drawing_title" name="drawing_title" value="{{old('drawing_title')}}"
                                                required>
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
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Drawing Number" id="drawing_number" name="drawing_number"
                                            value="{{old('drawing_number')}}" required="required" style="width:34%">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="border:none"
                                                id="drawingno-addon">P</span>
                                        </div>
                                        <input type="number" id="max" max="99" onKeyDown="limitText(this,2);"
                                            onKeyUp="limitText(this,2);" class="form-control form-control-solid"
                                            placeholder="01" name="drawing_postfix_no" required="required"
                                            style="width: 20%">
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

                                    <input type="text" class="form-control form-control-solid" id="twd_name"
                                        name="twd_name" value="{{old('twd_name')}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Comments:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" id="comments"
                                        name="comments">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col-md-6">
                                <div class=" inputDiv d-block" >
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style = "width:100%;">
                                        <span >Cc Emails: <span style = "color:grey;">(use comma separated multiple emails)</span></span>
                                    </label>
                                    <!--end::Label-->

                                    <input type="text" class="form-control form-control-solid" id="ccemails"
                                        name="ccemails" value="" />
                                </div>
                            </div>
                         
                        </div>
                        @if(isset($_GET['job']))
                            @php 
                                $client_email = HelperFunctions::getClientEmailByJobId($id);
                                $designer = HelperFunctions::getJobAwardedDesignerorCheckerByJobId($id, 'designers');
                                $checker = HelperFunctions::getJobAwardedDesignerorCheckerByJobId($id, 'checker');  
                            
                                $admin_designer = HelperFunctions::getJobAdminDesignerByJobId($id);  
                                $estimator = HelperFunctions::getJobEstimatorByJobId($id);  
                                $admin_designer_option=false;
                                $estimator_option=false;
                                $designer_option=false;
                                $checker_option=false;
                                // $user = App\Models\User::where('email',$_GET['mail'])->first();
                                if(isset($designer->user_id) && $user->id == $designer->user_id){
                                    $designer_option=true;
                                }
                                if(isset($checker->user_id) && $user->id == $checker->user_id){
                                    $checker_option=true;
                                }
                                // dd($checker_option);
                            @endphp
                            <div class="row" style="background:white;margin: 0 4px;">
                                    <div class="col-md-12">
                                        <div class=" inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Send Email:</span>
                                            </label>
                                            <!--end::Label-->
                                            {{-- <select class="form-control"> --}}
                                            <select name="emails[]" class="form-select form-select-lg" multiple="multiple" data-control="select2" data-placeholder="Select an option" >
                                                <option value="" selected>Select Email</option>
                                                <option value="{{$client_email}}">Client ({{$client_email}})</option>
                                                {{-- @if($user->di_designer_id != null) --}}
                                                    @if($admin_designer_option)
                                                    <option value="{{$estimator->email}}">Estimator ({{$admin_designer->creator->email}})</option>
                                                    @endif
                                                    @if($estimator_option)
                                                    <option value="{{$admin_designer->creator->email}}">Estimator ({{$admin_designer->creator->email}})</option>
                                                    @endif
                                                    <option value="{{$admin_designer->creator->email}}">Admin Designer ({{$admin_designer->creator->email}})</option>
                                                    @if($checker_option && isset($designer->email))
                                                        <option value="{{$designer->email}}">Designer ({{$designer->email}})</option>
                                                    @endif
                                                    @if($designer_option && isset($checker->email))
                                                    <option value="{{$checker->email}}">Checker ({{$checker->email}})</option>
                                                    @endif
                                                {{-- @endif --}}
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        @endif
                    
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
                                    $date = date('d-m-Y H:i', strtotime($uploads->created_at));
                                    $dno=explode('-',$uploads->drawing_number);
                                    $drawinglastno=$dno[sizeof($dno)-1];
                                    $sliced = array_slice($dno, 0, -1);
                                    $string = implode("-", $sliced);
                                    $remove_p_c = ltrim(ltrim($drawinglastno, 'P') , 'C');
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
                                    <tr style="background: {{$background ?? ''}}  !important">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$uploads->drawing_number}} <br>
                                            <a target="_blank" href="{{asset($uploads->file_name)}}"><i  style="color:#000;"  class="fa fa-eye"></i></a>
                                            <br><br>
                                            {{$date}}
                                            <br><br>
                                            Created By: {{$uploads->created_by}}
                                        </td>
                                        <td style="white-space:pre-wrap;">{{$uploads->comments}}</td>
                                        <td>{{$uploads->twd_name}}</td>
                                        <td>{{$uploads->drawing_title}}</td>
                                        <td>{{$uploads->preliminary_approval==1 ? 'Yes':'No'}}</td>
                                        <td>{{$uploads->construction==1 ? 'Yes':'No'}}</td>

                                        <td style="padding: 10px;">
                                            <div class="d-flex justify-content-around">
                                            <button class="btn btn-comment" style="align-self:center; border" onclick="toggleComment(this)">Add Comment</button>
                                                   
                                            <button class="mt-2 deletedrawing" style="border-radius:4px; border:none;background: transparent; padding:5px;" title="Reply To Designer" data-id="{{$uploads->id}}"><i style="padding:3px;" class="fa fa-trash"></i></button>
                                            </div>

                                        <div class="comment" style="display:none;">
                                        {{-- <button class="btn" onclick="Editdesign({{$uploads}});"><i class="fas fa-edit"></i></button> --}}
                                            
                                            
                                                <!-- <a class="btn" href="{{route('designer.delete',$uploads->id)}}"><i class="fas fa-trash"></i></a> -->
                                            <form method="post" action="{{route('drawing.comment')}}" >
                                                @csrf
                                                <textarea class="form-control" row="2" required
                                                    name="comment"></textarea><br>
                                                <input type="hidden" name="drawingid" value="{{$uploads->id}}">
                                                <input type="hidden" name="tempid"
                                                    value="{{$uploads->temporary_work_id}}">
                                                <input type="hidden" name="mail" value="{{$mail}}">
                                                <button class="btn btn-primary" style="align-self:center">Submit</button>
                                            </form>
                                        </div>


                                        </td>
                                    </tr>
                                    @if(count($comments)>0)
                                    @foreach($comments as $cments)
                                    <tr>
                                        <td class="border"><b>{{$l}} - {{$loop->index+1}}</b></td>
                                        <td class="border"><b>Comment/Reply</b></td>
                                        @php $style='';@endphp
                                        @if($mail==$cments->sender_email)
                                        
                                        <!-- <td colspan="2" class="border-bottom"  style="white-space:pre-wrap; max-width: 30px;{{$style}}" > -->
                                        <td colspan="2" class="border-bottom"  style="color:black" >

                                            <b style="white-space: pre-wrap;">{{$cments->drawing_comment}}</b><br>{{$cments->sender_email}}<br>{{date('H:i
                                            d-m-Y',strtotime($cments->created_at))}}
                                        </td>
                                        @else
                                        <td colspan="2" style="max-width: 30px;" class="border-bottom">

                                        </td>
                                        @endif

                                        <td colspan="2" class="border-bottom" style=" color: red">
                                            @if($mail!=$cments->sender_email)
                                            <b style="white-space:pre-wrap;">{{$cments->drawing_comment}}</b><br>
                                            @if($cments->drawing_image)
                                            <a target="_blank" href="{{asset($cments->drawing_image)}}"><i  style="color:#000;"  class="fa fa-eye"></i></a><br>
                                            @endif
                                            {{$cments->sender_email}}<br>{{date('H:i
                                            d-m-Y',strtotime($cments->created_at))}}
                                            @endif
                                            @if($cments->drawing_reply)
                                            @php $i=0;@endphp
                                            @foreach($cments->drawing_reply as $reply)
                                            <p><b>{{$reply}}</b><br>{{$cments->reply_email}}<br>{{date('H:i
                                                d-m-Y',strtotime($cments->reply_date[$i] ?? ''))}}</p>
                                            <hr>
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
                                                echo $image='<a target="_blank"
                                                    href='.$path.$cments->reply_image[$j].'><img
                                                        src="'.$path.$cments->reply_image[$j].'" width="50px"
                                                        height="50px" /></a>
                                                <hr>';
                                                }
                                                else{
                                                echo $a='<a target="_blank"
                                                    href="'. $path.$cments->reply_image[$j].'">View File</a>
                                                <hr>';
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
                <div class="tab-pane {{$certificate_active == 'active' ? 'active' : ''}}" id="tab3" role="tabpanel">
                    @php 
                    $display_certificate = false;
                    $admin_designer = HelperFunctions::getJobAdminDesignerByJobId($id);
                    @endphp
                    
                    {{-- @if($admin_designer->creator->id && ($admin_designer->creator->id == $user->id || $admin_designer->creator->id == $user->di_designer_id)) --}}
                    @if(isset($user) && ($admin_designer->creator->id == $user->id || $admin_designer->creator->id == $user->di_designer_id))
                        @php
                        $display_certificate = true
                        @endphp
                    @endif
                    @if($display_certificate)
                        <form class="form-inline" action="{{route('designer.certificate.store')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="tempworkid" value="{{$id}}">
                                <input type="hidden" name="designermail" value="{{$mail}}">
                                <div class="row" style="background:white;margin: 0 4px;">
                                {{-- @if($designer_certificate)
                                <div class="col-md-6">
                                </div>
                                @else --}}
                                <div class="col-md-6">
                                    <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Certificate Element:</span>
                                        </label>
                                        <div class="d-flex">
                                            <input type="text" placeholder="Certificate Element" class="form-control" name="certificate_element" value="{{$designer_certificate->certificate_element ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Design Document:</span>
                                        </label>
                                        <div class="d-flex">
                                            <input type="text" placeholder="Design Document" class="form-control" name="design_document" value="{{$designer_certificate->design_document ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Tags:</span>
                                        </label>
                                        <div class="d-flex">
                                            <div class="tag-container">
                                                @foreach($tags as $tag)
                                                        <label class="tag">
                                                            <input type="checkbox" name="selected_tags[]" value="<?= $tag->id ?>">
                                                            <?= $tag->title ?>
                                                        </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Tags:</span>
                                        </label>
                                        <div class="d-flex">
                                            <div class="tag-container">
                                                @isset($tags)
                                                    @foreach($tags as $tag)
                                                        <label class="tag">
                                                            <input type="checkbox" name="selected_tags[]" value="{{ $tag->id }}" 
                                                            @if($designer_certificate && in_array($tag->id, $designer_certificate->tags->pluck('id')->toArray())) 
                                                                checked 
                                                            @endif
                                                            >
                                                            {{ $tag->title }}
                                                        </label>
                                                    @endforeach
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="custom_tag_input" placeholder="Enter custom tag" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea type="text" id="custom_tag_description" placeholder="Enter custom tag description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success" id="save_custom_tag_btn">Save Custom Tag</button>
                                    </div>
                                </div> --}}
                                
                                <div class="row" id="signature_div">
                                    <div class="col-md-8">
                                    <div class="d-flex flex-column inputDiv mb-1" style="border: none">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                    style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                    <span class="signatureTitle">Signature Type:</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="d-flex">
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="checkbox-field" id="DrawCheck" checked=true
                                        style="width: 12px;">
                                    <input type="hidden" id="Drawtype" name=""
                                        class="form-control form-control-solid" value="1">
                                    <span
                                        style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                    </div>
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="" id="flexCheckChecked" style="width: 12px;">
                                    <input type="hidden" id="signtype" name="signtype"
                                        class="form-control form-control-solid" value="2">
                                    <span
                                        style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Name</span>
                                    </div>
                                    &nbsp;
                                    <!--end::Label-->
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="" id="pdfChecked" style="width: 12px;">
                                    <input type="hidden" id="pdfsign" name="pdfsigntype"
                                        class="form-control form-control-solid" value="0">
                                    <span
                                        style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content; white-space: nowrap">PNG/JPG
                                        Upload </span>
                                    </div>
                                    </div>
                                
                                    </div>
                                    <div class="d-flex inputDiv my-0" id="sign" style="align-items: center;border:none">
                                    <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Signature:</span>
                                    </label>
                                    <br/> -->
                                    <canvas id="sig" onblure="draw()"
                                    style="background: lightgray; border-radius:10px"></canvas>
                                    <br />
                                    <textarea id="signature" name="signed" style="display: none"></textarea>
                                    <span id="clear" class="fa fa-undo cursor-pointer"
                                    style="line-height: 6; position:relative; top:51px; right:26px"></span>
                                    </div>
                                    <div class="inputDiv d-none" id="pdfsign">
                                    <label class="fs-6 fw-bold mb-2" style="width: fit-content">
                                    <span class="required">Upload Signature: Allowed format (PNG, JPG)</span>
                                    </label>
                                    <input type="file" name="pdfphoto" class="form-control" accept="image/*">
                                    </div>
                                
                                    <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign" class="form-control form-control-solid">
                                    </div>
                                    <span id="sigimage" class="text-danger" style="font-size: 15px">Signature Not
                                    Added</span>
                                    </div>
                                    <div class="col-md-4">
                                
                                    </div>
                                
                                </div>
                                {{-- @endif --}}
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button id="submitbutton" type="submit" class="btn btn-secondary float-end submitbutton" disabled
                                        style="  top: 77% !important; left: 0;  padding: 10px 50px;font-size: 20px;font-weight: bold;">Submit</button>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mb-2">
                                        Upload</button>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                    @endif
                    <hr>
                    <form class="form-inline" action="{{route('designer.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tempworkid" value="{{$id}}">
                        <input type="hidden" name="designermail" value="{{$mail}}">
                        
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col-md-4">
                                <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Checker Name:</span>
                                    </label>
                                    <div class="d-flex">
                                        <input type="hidden" name="mail" value="{{$mail}}">
                                        <input type="text" class="form-control form-control-solid" id="design-check-name" name="checkeremail" value="" style="border:1px solid #d9dfe3;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Check Certificate:</span>
                                    </label>
                                    <div class="d-flex">
                                        <input type="file" style="width:25%; flex-grow:1" class="form-control"
                                            id="designcheckfile" name="designcheckfile" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col-md-4">
                                <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;" >
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span >Cc Emails: <span style = "color:grey;">(use comma separated multiple emails)</span></span>
                                    </label>
                                    <!--end::Label-->

                                    <input type="text" class="form-control form-control-solid" id="ccemails"
                                        name="certificateccemails" value="" />
                                </div>
                            </div>
                            <div class = "col-md-2 d-flex flex-column justify-content-center align-items-center pt-7">
                                <button type="submit" class="btn btn-primary "
                                            >Upload</button>
                            </div>
                            
                        </div>
                    </form>

                    <div class="row" style="background:white;margin: 0 4px;">
                        <div class="col-md-12">
                            <table class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Document Type</th>
                                        <th>Design Check Certificate</th>
                                        <th>File</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Designerchecks as $dcc)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td><a href="{{asset($dcc->file_name)}}"
                                                target="_blank">DC{{$loop->index+1}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab4" role="tabpanel">
                    <!-- Risk Assessment and calculations -->
                    <form class="form-group" action="{{route('riskassesment.store')}}" method="post"
                        enctype="multipart/form-data" style="width: 100%;margin: auto 0;">
                        @csrf
                        <input type="hidden" name="tempworkid" value="{{$id}}">
                        <input type="hidden" name="designermail" value="{{$mail}}">
                        <div class="row" style="background:white;margin: 0 4px;">
                             <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="margin: 5px">Select Document
                                            Type:</label><br>
                                        <select class="form-select form-control form-control-solid" name="type" required>
                                            <option value="" disabled></option>
                                            <option value="" selected disabled>Risk Assessment-Calculations</option>
                                            <option value="5">Risk Assessment</option>
                                            <option value="6">Calculations (Design Notes)</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="margin: 5px;">Select Document:</label><br>
                                    <input type="file" class="form-control form-control-solid" id="riskassesmentfile"
                                        name="riskassesmentfile" required="required">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row" style="background:white;margin: 0 4px;">
                            <div class="col-md-6">
                                <div class="form-group mx-sm-1 mb-2" style="margin-top: 15px;" >
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span >Cc Emails: <span style = "color:grey;">(use comma separated multiple emails)</span></span>
                                    </label>
                                    <!--end::Label-->

                                    <input type="text" class="form-control form-control-solid" id=""
                                        name="riskccemails" value="" />
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
    $('.deletedrawing').on('click', function(e) {
    // $(document).on('click','.deletedrawing',function(e){
        e.stopPropagation();
        id =$(this).attr('data-id');
        $("#drwingdelete_drawingidid").val($(this).attr('data-id'));

               $("#delete_drawing_modal_id").modal('show'); 
       
           
        
   })

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

    var canvas = document.getElementById("sig");
        var signaturePad = new SignaturePad(canvas);

    signaturePad.addEventListener("endStroke", () => {
        $("#signature").val(signaturePad.toDataURL('image/png'));
        $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
        $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
        // $('#submitbutton')
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            signaturePad.clear();
            $("#signature").val('');
                $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
                $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary").addAttr("disabled");
        });

        const customTagInput = document.getElementById('custom_tag_input');
        const customTagDescriptionInput = document.getElementById('custom_tag_description');

        // JavaScript to handle tag selection
        const tags = document.querySelectorAll('.tag');

        tags.forEach(tag => {
            tag.addEventListener('click', () => {
                tag.classList.toggle('selected');
                const checkbox = tag.querySelector('input[type="checkbox"]');
                checkbox.checked = !checkbox.checked;
            });
        });

    $("#DrawCheck").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#flexCheckChecked").prop('checked',false);
            $("#signtype").val(0);
             $("#pdfsign").val(0);
             $("#Drawtype").val(1);
            $("#clear").show();
            $("div#pdfsign").removeClass('d-flex').addClass("d-none");
            $("div#namesign").removeClass('d-flex').addClass("d-none");
            $("#sign").css('display','flex');
            $('#sigimage').removeClass('d-none')
           
        }

    })
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#DrawCheck").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
             $("#Drawtype").val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
            $(".customSubmitButton").removeClass("hideBtn");
            $(".customSubmitButton").addClass("showBtn");
             $("input[name='pdfsign']").removeAttr('required');
            $("input[name='namesign']").attr('required','required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
            $('#sigimage').addClass('d-none')
           
        }
        else{
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").show();
            $(".customSubmitButton").addClass("hideBtn");
            $(".customSubmitButton").removeClass("showBtn");
        }
    })

    $("#pdfChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#flexCheckChecked").prop('checked',false);
            $("#DrawCheck").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("#Drawtype").val(0);
            $("input[name='pdfsign']").attr('required','required');
            $("div#pdfsign").removeClass('d-none').addClass('d-flex');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
            $('#sigimage').addClass('d-none')
           
        }
        else{
            $("#pdfsign").val(0);
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("input[name='pdfsign']").removeAttr('required');
            $("#clear").show();
             
        }
    })

    // Event listener for save custom tag button
    const saveCustomTagBtn = document.getElementById('save_custom_tag_btn');
    saveCustomTagBtn.addEventListener('click', saveCustomTag);

    function saveCustomTag() {
        const customTagTitleInput = document.getElementById('custom_tag_input');
        const customTagDescriptionInput = document.getElementById('custom_tag_description');
        const newTagTitle = customTagTitleInput.value.trim();
        const newTagDescription = customTagDescriptionInput.value.trim();

        // Check if both fields are filled
        if (newTagTitle === '' || newTagDescription === '') {
            alert('Both fields must be filled to save the custom tag.');
            return;
        }

        // Send AJAX request to save the custom tag
        addCustomTag(newTagTitle, newTagDescription);
        customTagTitleInput.value = '';
        customTagDescriptionInput.value = '';
    }

    // Function to add a new tag via AJAX
    function addCustomTag(title, description) {
        fetch('{{ route("designer.save.tag") }}', { // Use the route name here
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ title: title, description: description }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Add the new tag to the selection options
                const tagContainer = document.querySelector('.tag-container');
                const label = document.createElement('label');
                label.classList.add('tag');
                label.innerHTML = `sss
                    <input type="checkbox" name="selected_tags[]" value="${data.tag.id}" checked>
                    ${data.tag.title}
                `;
                tagContainer.appendChild(label);
            } else {
                alert('Failed to add custom tag. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }


</script>

<script>

// click on add comment button to show a comment section to add comment
function toggleComment(button) {
        var commentDiv = button.parentNode.nextElementSibling;        
        if (commentDiv.style.display === 'none' || commentDiv.style.display === '') {
            commentDiv.style.display = 'block';
        } else {
            commentDiv.style.display = 'none';
        }
    }

</script>

<script>
      $('#drawing_title').change(function() {
    $('#drawing_title').css("background-color", "white ");
  });

  $('#twd_name').change(function() {
    $('#twd_name').css("background-color", "white ");
  });
  $('#comments').change(function() {
    $('#comments').css("background-color", "white ");
  });
  $('#drawing_number').change(function() {
    $('#drawing_number').css("background-color", "white ");
  });
  $('#max').change(function() {
    $('#max').css("background-color", "white ");
  });
  $('#file').change(function() {
    $('#file').css("background-color", "white ");
  });
  $('#design-check-name').change(function() {
    $('#design-check-name').css("background-color", "white ");
  });
</script>
@endsection

