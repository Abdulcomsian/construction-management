@extends('layouts.dashboard.master',['title' => 'Temporary Works'])
<link href="{{asset('css/imageuploadify.min.css')}}" rel="stylesheet">

@section('styles')
<style>
    .customDate::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }

    .updateBtn {
        bottom: 200px !important;
    }

    .list-div ul li,
    .list-check-div ul li {
        height: 72px;
        overflow: visible;
    }

    .aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60px !important;
    }

    .content {
        padding-top: 0px !important;
        background-color: #e9edf1 !important;
    }

    .newDesignBtn {
        border-radius: 8px;
        background-color: #07d564;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
    }

    .newDesignBtn:hover {
        color: #fff;
    }

    .card>.card-body {
        padding: 32px;
    }

    #kt_content_container {
        background-color: #fff;
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
        border-collapse: separate;
        background-color: red;
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
        color: rgba(254, 242, 242, 0.66);
    }

    table tbody td {
        text-align: center;
    }

    table thead {
        background-color: #000;
    }

    table thead th {
        color: #fff !important;
        text-align: center;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .inputDiv input {
        width: 50%;
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
        margin: 20px 0px;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .kbw-signature {
        width: 100%;
        height: 220px;
    }

    #sig canvas {
        width: 100% !important;
        /* max-height: 200px; */
    }

    .modalDiv {
        width: 100%;
    }

    .form-control.form-control-solid {
        background-color: #000;
    }

    @media only screen and (min-width: 470px) {
        .list_top {
            display: inline !important;
        }
    }

    @media only screen and (max-width: 470px) {
        .list_top {
            margin-top: 20px;
            display: block !important;
        }

        .newDesignBtn {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .inputDiv label {
            font-size: 11px !important;
        }
    }

    canvas {
        /* width: 270px;
        height: 110px; */
    }

    /* .inputDiv  #design_required_by_date{color:#fff;} */
    .form-control.form-control-solid:focus {
        color: #000 !important;
    }

    input {
        /* custom */
        caret-color: gray;
    }

    .inputDiv input {
        width: 100%;
        color: #000;
        background-color: white !important;
        border: 1px solid lightgrey !important;
        border-radius: 7px;
        height: 43px;
    }

    .inputDiv textarea {
        width: 100% !important;
        color: #000;
        background-color: white !important;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        color: #000;
        position: absolute;
        background: white;
        width: fit-content;
        bottom: 26px;
        left: 8px;
    }

    .inputDiv textarea {
        height: 32px;
    }

    .select2-container {
        width: 100% !important;
    }

    .inputDiv {
        margin: 30px 0px;
        position: relative;
    }

    #kt_post {
        width: 75%;
    }

    @media screen and (max-width: 576px) {
        #kt_post {
            width: auto;
        }
    }

    @media screen and (max-width: 576px) {
        #kt_post {
            width: auto;
        }
    }

    @media screen and (max-width: 960px) {
        #kt_post {
            margin: auto;
            width: 100%;
        }
        .set{
            display:flex;
            justify-content:start;
            width:100%;
        }
    }

    @media screen and (max-width: 670px) {
        #kt_post {
            width: 100%;
        }
    }

    .nav-group.nav-group-fluid>label {
        bottom: 0;
        left: 0;
        padding: 0 0px !important;
    }

    textarea.form-control {
        height: 44px;
        border-radius: 7px;
    }

    .select2-container--bootstrap5 {
        border: 1px solid lightgray !important;
        border-radius: 5px;

    }
    .email-plus{
        text-align: center;
        color: #fff;
        padding: 8px 12px;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        font-size: 18px;
        background:#07d564;
        border-radius:8px;
        border:none;
        cursor: pointer;
    }
    .email-minus{
        text-align: center;
        color: #fff;
        padding: 8px 12px;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        font-size: 18px;
        background:red;
        border-radius:8px;
        border:none;
        cursor: pointer;
    }
    .note-editor.note-frame.card {
        border: 1px solid #D2D5DA !important;
    }
    .description_tempwork .card{
        margin-top:0px;
    }
</style>

@include('layouts.sweetalert.sweetalert_css')
<link href="{{asset('css/imageuploadify.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}" />
<link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}" />
<link rel="stylesheet" href="{{asset('css/signature.css')}}" />
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/custom/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="background-color: #fff !important">
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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Works</h1>
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
        <div id="kt_content_container" class="container temporary_work_create">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top" style="width:98%">
                        <h2 style="display: inline-block;">Edit Design Brief</h2>
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('temporary_works.update',$temporaryWork) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <input type="hidden" name="twc_id_no" value="{{$temporaryWork->twc_id_no}}">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <label class=" fs-6 fw-bold mb-2" style="z-index: 1">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects"
                                        class="form-select form-select-lg form-select-solid" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ?
                                            'selected' : '' }} @endisset @isset($temporaryWork->project_id) {{
                                            $item->id==$temporaryWork->project_id ? 'selected' : '' }}
                                            @endisset>{{$item->name .' - '. $item->no}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="000" id="no" name="projno"
                                        value="{{old('projno',$selectedproject->no)}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname"
                                        value="{{old('projname',$selectedproject->name)}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Design Brief Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="date" class="customDate form-control" placeholder="Date"
                                        name="design_issued_date"
                                        value="{{old('design_issued_date',$temporaryWork->design_issued_date)}}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="Project Address" id="address" name="projaddress"
                                        value="{{old('projaddress',$selectedproject->address ?? '')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">TWC Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="TWC Email Address" id="twc_email" name="twc_email"
                                        value="{{old('twc_email',$temporaryWork->twc_email)}}"
                                        style="background: #f5f8fa" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name"
                                        id="twc_name" name="twc_name"
                                        value="{{old('twc_name',$temporaryWork->twc_name)}}" style="background: #f5f8fa"
                                        required>
                                </div>
                            </div>
                        </div>





                        <div class="row ">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Designer Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Designer Company Name" id="designer_company_name"
                                        name="designer_company_name"
                                        value="{{old('designer_company_name',$temporaryWork->designer_company_name)}}"
                                        required>
                                </div>
                                <span class="designerCompName_err"></span>
                            </div>



                            <div class="col-md-5">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Designer Email Address:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="email"
                                        class="form-control @if(!$temporaryWork->designer_company_email) form-control-solid @endif"
                                        placeholder="Designer Email Address" id="designer_company_email"
                                        name="designer_company_email[]"
                                        value="{{old('designer_company_email',$temporaryWork->designer_company_email)}}"
                                        required>
                                </div>
                            </div>

                            
                            <div class="col-md-1 set">
                                <div class="d-flex justify-content-end  inputDiv">
                                    <div class="email-plus" id="email-button"> + </div>
                                </div>
                            </div>

                           


                        </div>
                        <div class="row" id="additional-emails">
                            @foreach($temporaryWork->designerCompanyEmails as $email)
                                <div class="col-md-5" style="margin-top: 26px;">
                                    <div class="d-flex inputDiv d-block m-0" id="designerEmail">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="required">Designer Email Address:</span>
    
                                        </label>
                                            <input type="email"
                                                class="form-control @if(!$email->email) form-control-solid @endif"
                                                placeholder="Designer Email Address" id="designer_company_email"
                                                name="designer_company_email[]" value="{{$email->email}}"
                                                required>      
                                    </div>                
                                </div>
                                <!-- <div class="col-md-1 set">
                                    <div class="d-flex justify-content-end  inputDiv">
                                        <div class="email-minus" id="email-button"> - </div>
                                    </div>
                                </div> -->
                            @endforeach 
                            <div class="row" id="additional-emails"  >
                                    
                            
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Design Required by Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <!-- <p style=" cursor: pointer;background-color: #f5f8fa;color: #000 !important;"> -->
                                    <input type="date" class="customDate form-control"
                                        placeholder="Design Required by Date" id="design_required_by_date"
                                        name="design_required_by_date"
                                        value="{{old('design_required_by_date',$temporaryWork->design_required_by_date)}}"
                                        required>
                                    <!-- </p> -->
                                </div>
                                <span class="desingerReqDate_err"></span>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="z-index: 1; bottom: 48px">
                                        <span class="required">TW Category</span>

                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->
                                        @php
                                        $checked="";
                                        if($temporaryWork->tw_category==0)
                                        {
                                        $checked="checked";
                                        }
                                        @endphp
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="0"
                                                checked="{{$temporaryWork->tw_category==0 ?'checked':''}}" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">
                                                0
                                            </span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="1"
                                                {{$temporaryWork->tw_category==1 ?'checked':''}}/>
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">1</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="2"
                                                {{$temporaryWork->tw_category==2 ?'checked':''}}/>
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">2</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="3"
                                                {{$temporaryWork->tw_category==3 ?'checked':''}}/>
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">3</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <a href="{{asset('temporary/tw_pdfs/1.pdf')}}" target="_blank"><span><img alt="info"
                                                src="{{asset('assets/media/logos/info.png')}}"
                                                style="height:19px; position: relative; top:7px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2" style="bottom: 48px; z-index: 1">
                                        <span class="required">TW Risk Class</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="VL"
                                                checked="{{$temporaryWork->tw_risk_class=='VL' ?'checked':''}}" />
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary">VL</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="L"
                                                {{$temporaryWork->tw_risk_class=='L' ?'checked':''}}/>
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">L</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="M"
                                                {{$temporaryWork->tw_risk_class=='M' ?'checked':''}}/>
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">M</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="H"
                                                {{$temporaryWork->tw_risk_class=='H' ?'checked':''}}/>
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">H</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <a href="{{asset('temporary/tw_pdfs/2.pdf')}}" target="_blank"><span><img alt="info"
                                                src="{{asset('assets/media/logos/info.png')}}"
                                                style="height:19px; position: relative; top:7px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div
                                    class="inputDiv mb-0 {{$temporaryWork->tw_category==3 ?'d-flex':'d-none'}} desinger_company_name2">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Design Checker Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text"
                                        class="form-control @if(!$temporaryWork->desinger_company_name2) form-control-solid @endif"
                                        placeholder="Design Checker Company Name" id="desinger_company_name2"
                                        name="desinger_company_name2"
                                        value="{{old('desinger_company_name2',$temporaryWork->desinger_company_name2)}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="inputDiv mb-0 {{$temporaryWork->tw_category==3 ?'d-flex':'d-none'}} desinger_company_name2">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Design Checker Email:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text"
                                        class="form-control @if(!$temporaryWork->desinger_email_2) form-control-solid @endif "
                                        placeholder="Design Checker Email" id="desinger_email_2" name="desinger_email_2"
                                        value="{{old('desinger_email_2',$temporaryWork->desinger_email_2)}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="d-flex  d-block my-0" id="">
                                    <!--begin::Label-->
                                        <p style="font-weight:bold;">** If custom TW ID number is not entered then it will be generated automatically by system:</p>
            
                                </div>
                            </div>
                            <div class="col-12" style="">
                                <div class="d-flex inputDiv d-block my-0" id="photoDesign">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Custom TW ID #:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" id="twc_id_no" name="twc_id_no" value="{{old('twc_id_no', $temporaryWork->twc_id_no ?? '')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0"
                                    style="border: 1px solid lightgray; border-radius: 9px; height: 44px; align-items:center;">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span>Approval:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="checkbox" name="approval" id="approval"
                                        style="margin-left: 16px;width: 12px;" {{$temporaryWork->pc_twc_email== '' ? ''
                                    :'checked'}}>
                                    <span style="padding-left:15px;">Select if required.</span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div
                                    class="{{$temporaryWork->pc_twc_email== '' ? 'd-none' :'d-flex'}} inputDiv pc-twc mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span>PC TWC Email:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="email"
                                        class="form-control @if(!$temporaryWork->pc_twc_email) form-control-solid @endif"
                                        name="pc_twc_email" id="pc-twc-email" placeholder="PC TWC Email"
                                        value="{{old('pc-twc-email',$temporaryWork->pc_twc_email ?? '')}}">
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2" style="bottom: 43px">
                                            Description:
                                        </label>
                                        <textarea class="form-control" name="description_temporary_work_required"
                                            style="width:50%" rows="2"
                                            placeholder="Provide brief description of design requirements." cols="50"
                                            required>{{old('description_temporary_work_required',$temporaryWork->description_temporary_work_required)}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputDiv mb-0">
                                    <div class="d-flex modalDiv " data-bs-toggle="modal"
                                        data-bs-target="#design-requirement">
                                        <!--begin::Label-->
                                        <label style="" class="fs-6 fw-bold mb-2" style="bottom: 33px">
                                            Design requirement:
                                        </label>
                                        <br>
                                        <input type="text" style="" id="design_requirement_text"
                                            placeholder="Design requirement" readonly name="design_requirement_text"
                                            value="{{old('design_requirement_text',$temporaryWork->design_requirement_text)}}">
                                        <!--end::Label-->
                                    </div>
                                </div>
                            </div>
                            @php 
                            $preliminary_sketches_date = $temporaryWork->scopdesign->preliminary_sketches_date ? 'preliminary_sketches_date_sod '.$temporaryWork->scopdesign->preliminary_sketches_date : '';
                            $construction_rawings_date = $temporaryWork->scopdesign->construction_rawings_date ? 'construction_rawings_date_sod '.$temporaryWork->scopdesign->construction_rawings_date: '';
                            $design_calculations_date = $temporaryWork->scopdesign->design_calculations_date ? 'design_calculations_date '.$temporaryWork->scopdesign->design_calculations_date: '';
                            $design_check_certificate_date = $temporaryWork->scopdesign->design_check_certificate_date ? 'design_check_certificate_date '.$temporaryWork->scopdesign->design_check_certificate_date: '';
                            $loading_criteria_date = $temporaryWork->scopdesign->loading_criteria_date ? 'loading_criteria_date '.$temporaryWork->scopdesign->loading_criteria_date: '';
                            $construction_erection_sequence_information_date = $temporaryWork->scopdesign->construction_erection_sequence_information_date ? 'construction_erection_sequence_information_date '.$temporaryWork->scopdesign->construction_erection_sequence_information_date: '';
                            $inspection_checklist_date = $temporaryWork->scopdesign->inspection_checklist_date ? 'inspection_checklist_date '.$temporaryWork->scopdesign->inspection_checklist_date: '';
                            $monitoring_requirements_date = $temporaryWork->scopdesign->monitoring_requirements_date ? 'monitoring_requirements_date '.$temporaryWork->scopdesign->monitoring_requirements_date: '';
                            $design_inspection_test_plans_date = $temporaryWork->scopdesign->design_inspection_test_plans_date ? 'design_inspection_test_plans_date '.$temporaryWork->scopdesign->design_inspection_test_plans_date: '';
                            $scope_of_design = $preliminary_sketches_date." <br> ".$construction_rawings_date;
                            @endphp
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <div class="d-flex modalDiv d-block" data-bs-toggle="modal"
                                        data-bs-target="#scope-of-design">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2" style="bottom: 34px;">
                                            Scope of Design:
                                        </label>
                                        <textarea class="form-control" id="scopofdesign" rows="2" cols="50"
                                            placeholder="Scope of Design Output Required From TW Engineer" readonly
                                            style="height: 43px; padding: 12px 0 0 15px"></textarea>
                                        <!--  <input type="text" placeholder="Scope of Design Output Required from the Temporary Works Engineer:" readonly> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 description_tempwork">
                                <label class=" fs-6 fw-bold mt-4">
                                    Design Brief Description:
                                </label>
                                <textarea id="description" name="description_temporary_work_required" >{{$temporaryWork->description_temporary_work_required}}</textarea>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex inputDiv d-block mb-0" id="attachment_specs">
                                    <div style="position:relative;" class="modalDiv d-block" data-bs-toggle="modal"
                                        data-bs-target="#attachment-of-design">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Attachments / Spec:
                                        </label>
                                        <input type="text"
                                            placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name::</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Name"
                                        name="name" value="{{$temporaryWork->name}}" readonly="readonly" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Job title"
                                        name="job_title" value="{{$temporaryWork->job_title}}" readonly="readonly"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" id="companyadmin" class="form-control form-control-solid"
                                        style="background-color:#f5f8fa" placeholder="Company" name="company"
                                        value="{{$temporaryWork->company}}" required>
                                    <input type="hidden" id="company_id" name="company_id"
                                        value="{{$selectedproject->company->id ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="date" name="date" value="{{ date('Y-m-d') }}"
                                        style="background-color:#fff"
                                        class="customDate form-control form-control-solid">
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mt-4">
                            <div class="col-12">
                                    <div class="d-flex inputDiv d-block my-0" id="photoDesign">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Photo or Document:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="file" class="form-control" id="photo" name="photo"
                                            value="{{old('photo')}}" accept="image/*;capture=camera">
                                    </div>
                            </div>
                       
                            <div class="col-12">
                                <div id="files_div">
                                        <input type="hidden" value="{{$temporaryWork->id}}" name="temp_work_image" class="{{$temporaryWork->id}}" /> 
                                </div>
                        
                                @if($temporaryWork->photo)
                                <div id="new_div" class="m-md-2">
                                    <span id="{{$temporaryWork->id}}" >
                                        <a target="_blank" href="{{asset($temporaryWork->photo)}}" title = "Click to Full View">
                                            <span class="badge badge-success badge-lg p-2">File Uploaded</span>
                                        </a>
                                        <button type="button" onclick="deleteTempWorkFile({{$temporaryWork->id}})" class="remove-file btn btn-danger btn-sm p-2 pr-3 pl-3" data-filename="{{$temporaryWork->id}}" title = "Delete File">&times;</button>
                                    </span>
                                   
                                </div>
                                @endif
                            </div>
 
                            
                            
                        {{-- <div class="col-12">
                            <textarea id="description" name="description_temporary_work_required" >{{$temporaryWork->description_temporary_work_required}}</textarea>
                        </div> --}}
                        <div class="col-md-6">
                            {{-- @if(!isset($temporaryWork->signature) && $temporaryWork->signature != null) --}}
                            <div class="col" style="flex:100% !important;">
                                {{-- <div class="d-flex inputDiv">
                                </div> --}}
                                <div class="d-flex inputDiv ">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="{{$temporaryWork->name ?? ''}}" {{ isset($temporaryWork->name) && !empty($temporaryWork->name) ? 'readonly' : '' }}>
                                </div>
                                <div class="d-flex inputDiv ">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Job title" name="job_title" value="{{$temporaryWork->job_title ?? ''}}" {{ isset($temporaryWork->job_title) && !empty($temporaryWork->job_title) ? 'readonly' : '' }}>
                                </div>
                                <div class="d-flex inputDiv ">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                    {{-- <input type="text" id="companyadmin" class="form-control" placeholder="Company"
                                        name="company" value="{{$project->company->name ?? ''}}" {{ isset($project->company->name) && $project->company->name != null ? 'readonly' : '' }}>
                                    <input type="hidden" id="companyid" class="form-control form-control-solid"
                                        placeholder="Company" name="companyid"
                                        value="{{$project->company->id ?? ''}}" > --}}
                                    <input type="text" id="companyadmin" class="form-control form-control-solid" style="background-color:#f5f8fa" placeholder="Company" name="company" value="{{$temporaryWork->company ?? ''}}" required {{ isset($temporaryWork->company) && !empty($temporaryWork->company) ? 'readonly' : '' }}>
                                    <input type="hidden" id="company_id" name="company_id" value="{{$selectedproject->company->id ?? ''}}">
                                </div>
                                <div class="d-flex inputDiv ">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control">
                                </div>
                                <!-- Approval div -->

                            </div>
                       
                            <div class="col">
                                @if(!isset($temporaryWork->signature) && empty($temporaryWork->signature))
                                    <div class="d-flex inputDiv mt-0" style="border: none">
                                        <label class="fs-6 fw-bold mb-2"
                                            style="font-size: 600 !important; font-size: 16px !important">
                                            <span class="signatureTitle" style="white-space: nowrap">Signature
                                                Type:</span>
                                        </label>
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="checkbox-field" id="DrawCheck" checked=true
                                                style="width: 12px;">
                                            <span
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                        </div>
                                        <!--end::Label-->
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
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content">PNG/JPG
                                                Upload </span>
                                        </div>

                                    </div>
                                    <div class="d-flex inputDiv my-0" id="sign" style="align-items: center;border:none">
                                        <canvas id="sig" onblure="draw()"
                                            style="background: lightgray; border-radius:10px"></canvas>
                                        <br />
                                        <textarea id="signature" name="signed" style="display: none"></textarea>
                                        <span id="clear" class="fa fa-undo cursor-pointer btn--clear"
                                            style="line-height: 6; position:relative; top:51px; right:26px"></span>
                                    </div>
                                    <span id="sigimage" class="text-danger" style="font-size: 15px">Signature Not
                                        Added</span>
                                    <div class="inputDiv d-none" id="pdfsign">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Upload Signature:(PNG,
                                                JPG)</span>
                                        </label>
                                        <input type="file" name="pdfphoto" class="form-control" accept="image/*">
                                    </div>
                                    <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name Signature:</span>
                                        </label>
                                        <input type="text" name="namesign" class="form-control form-control-solid">
                                    </div>
                                    @endif

                                @if($temporaryWork->signature_type == 'draw')
                                    <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$temporaryWork->signature)}}" width="100%" />
                                @elseif($temporaryWork->signature_type == 'pdf')
                                <div id="new_div" class="m-md-2">
                                    <span  >
                                        <a target="_blank" href="{{asset('temporary/signature/'.$temporaryWork->signature)}}" title = "Click to Full View">
                                            <span class="badge badge-success badge-lg p-2">File Uploaded</span>
                                        </a>
                                    </span>
                                </div>                                
                                @else
                                <p><b>Name:</b> {{$temporaryWork->signature}}</hp>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6 mt-md-5" id="third_member" style="display: {{ isset($temporaryWork->signatures[0]->name) && $temporaryWork->signatures[0]->name != null ? 'block' : 'none' }}">
                            <div class="d-flex inputDiv principleno mt-0">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2" style="">
                                <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name3" name="name3" value="{{$temporaryWork->signatures[0]->name ?? ''}}" style="color:#5e6278" {{ isset($temporaryWork->signatures[0]->name) && $temporaryWork->signatures[0]->name != null ? 'readonly' : '' }}>
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                <span class="required">Job Title:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Job Title" id="job_title3" name="job_title3" value="{{$temporaryWork->signatures[0]->job_title ?? ''}}" {{ isset($temporaryWork->signatures[0]->job_title) && $temporaryWork->signatures[0]->job_title != null ? 'readonly' : '' }}>
                            </div>
                            <div class=" inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                <input type="text" id="companyadmin3" class="form-control form-control-solid" placeholder="Company" name="company3" value="{{$temporaryWork->signatures[0]->company ?? ''}}" {{ isset($temporaryWork->signatures[0]->company) && $temporaryWork->signatures[0]->company != null ? 'readonly' : '' }}>
                                <!-- name="company1" -->
                                <input type="hidden" id="companyid3" class="form-control form-control-solid" placeholder="Company" name="companyid3" readonly="readonly">
                                </div>
                            </div>
                            <div class=" inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                <input type="date" name="date3" style="background-color:#f5f8fa" value="{{$temporaryWork->signatures[0]->date ?? ''}}" class="form-control form-control-solid" {{ isset($temporaryWork->signatures[0]->date) && $temporaryWork->signatures[0]->date != null ? 'readonly' : '' }}>
                                <!-- name="date1" -->
                                </div>
                            </div>
                            @if(!isset($temporaryWork->signatures[0]) && empty($temporaryWork->signatures[0]->signature))
                            {{-- @if(!isset($permitdata->signatures[0]->signature) && $permitdata->signatures[0]->signature != null) --}}
                            <div class="d-flex inputDiv" style="border: none">
                                <label class="fs-6 fw-bold mb-2" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                <span class="signatureTitle" style="white-space: nowrap">Signature
                                    Type:</span>
                                </label>
                                <div style="display:flex; align-items: center; padding-left:10px">
                                <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true style="width: 12px;">
                                <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
                                <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                </div>
                                &nbsp;
                                <!--end::Label-->
            
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex inputDiv" id="namesign3" style="display: none !important;">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Name Signature:</span>
                                </label>
                                <input type="text" name="namesign3" id="namesign_id3" class="form-control form-control-solid">
                                </div>
            
                                <div class="d-flex inputDiv principleno mb-0" id="sign3" style="border:none !important;">
                                <canvas id="sig3" style="border-radius: 9px; background: lightgray;"></canvas>
                                <span id="clear3" class="fa fa-undo cursor-pointer btn--clear" style="line-height: 11; position:relative; top:51px; right:26px"></span>
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign3" style=" display: none !important">
                                <textarea id="signature3" name="signed3" style="opacity: 0"></textarea>
                                </div>
                            </div>
                            @else
                                <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$temporaryWork->signatures[0]->signature)}}" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-6 mt-md-5" id="fourth_member" style="display: {{ isset($temporaryWork->signatures[1]->name) &&      $temporaryWork->signatures[1]->name != null ? 'block' : 'none' }}">
                            <div class="d-flex inputDiv principleno mt-0">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2" style="">
                                <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name4" name="name4" style="color:#5e6278" value="{{$temporaryWork->signatures[1]->name ?? ''}}" {{ isset($temporaryWork->signatures[1]->name) && $temporaryWork->signatures[1]->name != null ? 'readonly' : '' }}>
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                <span class="required">Job Title:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Job Title" id="job_title4" name="job_title4" value="{{$temporaryWork->signatures[1]->job_title ?? ''}}" {{ isset($temporaryWork->signatures[1]->job_title) && $temporaryWork->signatures[1]->job_title != null ? 'readonly' : '' }}>
                            </div>
                            <div class=" inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                <input type="text" id="companyadmin4" class="form-control form-control-solid" placeholder="Company" name="company4" value="{{$temporaryWork->signatures[1]->company ?? ''}}" {{ isset($temporaryWork->signatures[1]->company) && $temporaryWork->signatures[1]->company != null ? 'readonly' : '' }}>
                                <!-- name="company1" -->
                                <input type="hidden" id="companyid4" class="form-control form-control-solid" placeholder="Company" name="companyid" readonly="readonly">
                                </div>
                            </div>
                            <div class=" inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                <input type="date" name="date4" style="background-color:#f5f8fa" value="{{$temporaryWork->signatures[1]->date ?? ''}}" class="form-control form-control-solid" {{ isset($temporaryWork->signatures[1]->date) && $temporaryWork->signatures[1]->date != null ? 'readonly' : '' }}>
                                <!-- name="date1" -->
                                </div>
                            </div>
                            @if(!isset($temporaryWork->signatures[1]) && empty($temporaryWork->signatures[1]->signature))
                            {{-- @if(!isset($permitdata->signatures[1]->signature) && $permitdata->signatures[1]->signature != null) --}}
                            <div class="d-flex inputDiv" style="border: none">
                                <label class="fs-6 fw-bold mb-2" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                <span class="signatureTitle" style="white-space: nowrap">Signature
                                    Type:</span>
                                </label>
                                <div style="display:flex; align-items: center; padding-left:10px">
                                <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true style="width: 12px;">
                                <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
                                <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                </div>
                                <!--end::Label-->
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex inputDiv" id="namesign1" style="display: none !important;">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Name Signature:</span>
                                </label>
                                <input type="text" name="namesign4" id="namesign_id4" class="form-control form-control-solid">
                                </div>
            
                                <div class="d-flex inputDiv principleno mb-0" id="sign4" style="border:none !important;">
                                {{-- <label style="width:33%"
                                                            class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Signature:</span>
                                                        </label> --}}
                                {{-- <br /> --}}
                                <canvas id="sig4" style="border-radius: 9px; background: lightgray;"></canvas>
                                <span id="clear4" class="fa fa-undo cursor-pointer btn--clear" style="line-height: 11; position:relative; top:51px; right:26px"></span>
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign4" style=" display: none !important">
                                <textarea id="signature4" name="signed4" style="opacity: 0"></textarea>
                                </div>
                            </div>
                            @else
                                <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$temporaryWork->signatures[1]->signature)}}" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-6 mt-md-5" id="fifth_member" style="display: {{ isset($temporaryWork->signatures[2]->name) && $temporaryWork->signatures[2]->name != null ? 'block' : 'none' }}">
                            <div class="d-flex inputDiv principleno mt-0">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2" style="">
                                <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name5" name="name5" style="color:#5e6278" value="{{$temporaryWork->signatures[2]->name ?? ''}}" {{ isset($temporaryWork->signatures[2]->name) && $temporaryWork->signatures[2]->name != null ? 'readonly' : '' }}>
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                <span class="required">Job Title:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Job Title" id="job_title5" name="job_title5" value="{{$temporaryWork->signatures[2]->job_title ?? ''}}" {{ isset($temporaryWork->signatures[2]->job_title) && $temporaryWork->signatures[2]->job_title != null ? 'readonly' : '' }}>
                            </div>
                            <div class=" inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                <input type="text" id="companyadmin4" class="form-control form-control-solid" placeholder="Company" name="company5" value="{{$temporaryWork->signatures[2]->company ?? ''}}" {{ isset($temporaryWork->signatures[2]->company) && $temporaryWork->signatures[2]->company != null ? 'readonly' : '' }}>
                                <!-- name="company1" -->
                                <input type="hidden" id="company5" class="form-control form-control-solid" placeholder="Company" name="company5" readonly="readonly">
                                </div>
                            </div>
                            <div class=" inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                <input type="date" name="date5" style="background-color:#f5f8fa" value="{{$temporaryWork->signatures[2]->date ?? ''}}" class="form-control form-control-solid" {{ isset($temporaryWork->signatures[2]->date) && $temporaryWork->signatures[2]->date != null ? 'readonly' : '' }}>
                                <!-- name="date1" -->
                                </div>
                            </div>
                            @if(!isset($temporaryWork->signatures[2]) && empty($temporaryWork->signatures[2]->signature))
                            {{-- @if(!isset($permitdata->signatures[2]->signature) && $permitdata->signatures[2]->signature == null) --}}
                                <div class="d-flex inputDiv" style="border: none">
                                    <label class="fs-6 fw-bold mb-2" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                    <span class="signatureTitle" style="white-space: nowrap">Signature
                                        Type:</span>
                                    </label>
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true style="width: 12px;">
                                    <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
                                    <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex inputDiv" id="namesign1" style="display: none !important;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign5" id="namesign_id5" class="form-control form-control-solid">
                                    </div>
                
                                    <div class="d-flex inputDiv principleno mb-0" id="sign5" style="border:none !important;">
                                    {{-- <br /> --}}
                                    <canvas id="sig5" style="border-radius: 9px; background: lightgray;"></canvas>
                                    <span id="clear5" class="fa fa-undo cursor-pointer btn--clear" style="line-height: 11; position:relative; top:51px; right:26px"></span>
                                    </div>
                                    <div class="d-flex inputDiv principleno" id="sign4" style=" display: none !important">
                                    <textarea id="signature5" name="signed5" style="opacity: 0"></textarea>
                                    </div>
                                </div>
                                </div>
                            @else
                                <img src="{{asset('temporary/signature/'.$temporaryWork->signatures[2]->signature)}}" style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" width="100%" />
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end align-items-end" style="bottom: 20px;">
                        {{-- <div class="d-flex inputDiv" style="align-items: right;text-align:right;"> --}}
                            {{-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">

                            </label> --}}
                            {{-- <br /> --}}
                            <div class="col-md-5">
                                <button class="btn btn-success btn-sm mt-8" id="addMemberButton" style="border-radius: 5px;padding: 10px 20px;font-size: 15px;font-weight: 500;    background: none;    background-color: #07d564;color: #fff; float:right">Add New Signature</button>
                            </div>
                            <div class="col-md-3">
                                <button id="updatebutton" type="button" style="border-radius: 5px;padding: 10px 20px;font-size: 15px;font-weight: 500;    background: none;background-color: #07d564;color: #fff;" id="updateBtn"
                                class="updateBtn btn btn-primary">Update</button>
                            </div>

                            <!-- <button id="submitbutton" type="submit" style="margin-left: 10px;" class="btn btn-primary float-end">Update</button> -->
                            {{--
                        </div> --}}
                    </div>
                </div>



                        <div class="row">
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <!-- <div class="d-flex inputDiv">
                                    
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40% !important">
                                        <span>Name signature:</span>
                                    </label>
                                    
                                     <input  type="checkbox" class="" id="flexCheckChecked"  style="width: 12px;margin-top:5px">
                                      <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="0">
                                     <span style="padding-left:3px;color:#000">Do you want name signature?</span>
                                    </div> -->
                                    {{-- <div class="d-flex inputDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                            style="width:40% !important">
                                            <span>signature:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="checkbox" class="" id="flexCheckChecked"
                                            style="width: 12px;margin-top:5px">
                                        <input type="hidden" id="signtype" name="signtype"
                                            class="form-control form-control-solid" value="2">
                                        <span style="padding-left:3px;color:#000;font-size:10px;line-height: 2">Do you
                                            want
                                            name signature?</span>
                                        &nbsp;
                                        <!--end::Label-->
                                        <input type="checkbox" class="" id="pdfChecked"
                                            style="width: 12px;margin-top:5px">
                                        <input type="hidden" id="pdfsign" name="pdfsigntype"
                                            class="form-control form-control-solid" value="0">
                                        <span style="padding-left:3px;color:#000;font-size:10px;line-height: 2;">Pdf
                                            signature?</span>

                                    </div>
                                    <div class="inputDiv d-none" id="pdfsign">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Upload Signature:<br>Allowed format (PNG, JPG)</span>
                                        </label>
                                        <input type="file" name="pdfphoto" class="form-control" accept="image/*">
                                    </div>
                                    <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name Signature:</span>
                                        </label>
                                        <input type="text" name="namesign" class="form-control form-control-solid">
                                    </div>
                                    <div class="d-flex inputDiv" id="sign" style="align-items: center;">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Signature:</span>
                                        </label>
                                        <br />
                                        <canvas id="sig" style="background: lightgray"></canvas>
                                        <br />
                                        <textarea id="signature" name="signed" style="display: none"></textarea>
                                        <span id="clear" class="fa fa-undo cursor-pointer"
                                            style="line-height: 6"></span>
                                    </div> --}}


                                    <!-- <button id="clear" type="button" class="btn btn-danger  float-end">Clear Signature</button> -->

                                    <!-- work for approval -->


                                </div>
                            </div>
                        </div>
                        <br>
                        @include('dashboard.modals.design-relief-modals-edit',['design_check' => $temporaryWork->desing_req_details,'images'=>$temporaryWork->temp_work_images])


                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/plugins/custom/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{ asset('assets/js/temporary-work-modal.js') }}"></script>
<script type="text/javascript" src="{{asset('js/image-uploader.min.js')}}"></script>
<script type="text/javascript">
    $("#signtype").val(2);
    // $('.input-images1').imageUploader();

</script>

<script type="text/javascript" src="{{asset('js/imageuploadify.min.js')}}"></script>
         <script type="text/javascript">
            $(document).ready(function() {
            
                $('input[type="file"]').imageuploadify();
                
            })
        </script>
        
<script>
    window.onload = function(){
    $(document).on('submit', "#desingform", function (e) {
    e.preventDefault();
    
    var formIsValid = true;

    // Validate the first field
    const designValue = $("#design_requirement_text").val();
    const  designerCompName = $("#designer_company_name").val();
    const desingerReqDate = $("#design_required_by_date").val();
    const briefDesc = $("#description").val()

    if (!designValue) {
        $('.designReq_err').text("Design Requirement field must be selected");
        $('.designReq_err').css('display', 'block');
        $('.designReq_err').css('color', 'red');
        formIsValid = false;
    }

    if (!designerCompName) {
        $('.designerCompName_err').text("Designer Company Name is Required");
        $('.designerCompName_err').css('display', 'block');
        $('.designerCompName_err').css('color', 'red');
        formIsValid = false;
    }

    if (!desingerReqDate) {
        $('.desingerReqDate_err').text("Designer Requirment date is required");
        $('.desingerReqDate_err').css('display', 'block');
        $('.desingerReqDate_err').css('color', 'red');
        formIsValid = false;
    }

    if (!briefDesc) {
        $('.description_err').text("Design brief Description is required");
        $('.description_err').css('display', 'block');
        $('.description_err').css('color', 'red');
        formIsValid = false;
    }
    

    // If the form is valid, submit it
    if (formIsValid) {
        $("#updatebutton")[0].submit();
    }
    });
    }
    var projects = {!!$projects!!};
    $('#projects').change(function() {
        let id = $(this).val();
        let project = projects.filter(function(p) {
            return p.id == id;
        });
        if (project) {
            $('#no').val('').val(project[0].no);
            $('#name').val('').val(project[0].name);
            $('#date').val('').val(project[0].created_at);
            $('#address').val('').val(project[0].address ? project[0].address : 'Not Set');
            $("#companyadmin").val(project[0].company.name);
            $("#company_id").val(project[0].company.id);
        }
        console.log(project);
    });
    $("#DrawCheck").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#flexCheckChecked").prop('checked',false);
            $("#signtype").val(0);
             $("#pdfsign").val(0);
             $("#Drawtype").val(1);
            // $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            // $("#pdfsign").removeClass('d-flex').addClass("d-none");
            // $(".customSubmitButton").removeClass("hideBtn");
            // $(".customSubmitButton").addClass("showBtn");
            //  $("input[name='pdfsign']").removeAttr('required');
            // $("input[name='namesign']").attr('required','required');
            $("#clear").show();
            $("div#pdfsign").removeClass('d-flex').addClass("d-none");
            $("div#namesign").removeClass('d-flex').addClass("d-none");
            $("#sign").css('display','flex');
           
        }
        // else{
        //     $("#signtype").val(2);
        //     $("#sign").addClass('d-flex').show();
        //     $("#namesign").removeClass('d-flex').hide();
        //     $("input[name='namesign']").removeAttr('required');
        //     $("#clear").show();
        //     $(".customSubmitButton").addClass("hideBtn");
        //     $(".customSubmitButton").removeClass("showBtn");
        // }
    })
    //  $("#flexCheckChecked").change(function(){
    //     if($(this).is(':checked'))
    //     {
    //         $("#pdfChecked").prop('checked',false);
    //         $("#signtype").val(1);
    //          $("#pdfsign").val(0);
    //         $("div#pdfsign").removeClass('d-flex').addClass('d-none');
    //         $("#namesign").addClass('d-flex').show();
    //         $(".customSubmitButton").removeClass("hideBtn");
    //         $(".customSubmitButton").addClass("showBtn");
    //          $("input[name='pdfsign']").removeAttr('required');
    //         $("input[name='namesign']").attr('required','required');
    //         $("#clear").hide();
    //         $("#sign").removeClass('d-flex').hide();
           
    //     }
    //     else{
    //         $("#signtype").val(2);
    //         $("#sign").addClass('d-flex').show();
    //         $("#namesign").removeClass('d-flex').hide();
    //         $("input[name='namesign']").removeAttr('required');
    //         $("#clear").show();
    //         $(".customSubmitButton").addClass("hideBtn");
    //         $(".customSubmitButton").removeClass("showBtn");
    //     }
    // })
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

    // $("#pdfChecked").change(function(){

    //     if($(this).is(':checked'))
    //     {
    //         $("#flexCheckChecked").prop('checked',false);
    //         $("#pdfsign").val(1);
    //         $("#signtype").val(0);
    //         $("input[name='pdfsign']").attr('required','required');
    //         $("div#pdfsign").removeClass('d-none').addClass('d-flex');
    //         $("#namesign").removeClass('d-flex').hide();
    //         $("input[name='namesign']").removeAttr('required');
    //         $("#clear").hide();
    //         $("#sign").removeClass('d-flex').hide();
           
    //     }
    //     else{
    //         $("#pdfsign").val(0);
    //         $("#signtype").val(2);
    //         $("#sign").addClass('d-flex').show();
    //         $("div#pdfsign").removeClass('d-flex').addClass('d-none');
    //         $("#namesign").removeClass('d-flex').hide();
    //         $("input[name='namesign']").removeAttr('required');
    //         $("input[name='pdfsign']").removeAttr('required');
    //         $("#clear").show();
             
    //     }
    // })
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

    //approval checkbox checkded
    $("#approval").change(function(){
        if($(this).is(':checked'))
        {
            $(".pc-twc").removeClass('d-none').addClass('d-flex');
            $("#pc-twc-email").attr('required','required');
        }
        else{
            $(".pc-twc").removeClass('d-flex').addClass('d-none');
            $("#pc-twc-email").removeAttr('required');
        }
    })

//when click of category 3
    $('input[name="tw_category"]').click(function(){
        var value=$(this).val();
        if(value==3)
        {
            $(".desinger_company_name2").removeClass('d-none').addClass('d-flex');
            $("#desinger_company_name2").attr('required','required');
            $("#desinger_email_2").attr('required','required');
          
        }
        else{
            $(".desinger_company_name2").addClass('d-none').removeClass('d-flex');
            $("#desinger_company_name2").removeAttr('required');
            $("#desinger_email_2").removeAttr('required');
        }
    })


    // var canvas = document.getElementById("sig");
    // var signaturePad = new SignaturePad(canvas);
    // signaturePad.addEventListener("endStroke", () => {
    //           $("#signature").val(signaturePad.toDataURL('image/png'));
    //         });
    
    //  $('#clear').click(function(e) {
    //     e.preventDefault();
    //     signaturePad.clear();
    //     $("#signature").val('');
    // });


    // var canvas = document.getElementById("sig");
    // var signaturePad = new SignaturePad(canvas);

    var canvas = document.getElementById("sig");
    var canvas1 = document.getElementById("sig1");
    var canvas3 = document.getElementById("sig3");
    var canvas4 = document.getElementById("sig4");
    var canvas5 = document.getElementById("sig5");
    let signaturepad1 = false;
    let signaturepad2 = false;
    let signaturepad3 = false;
    let signaturepad4 = false;
    let signaturepad5 = false;

    if(canvas)
    {
    var signaturePad = new SignaturePad(canvas);
    }
    if(canvas1)
    {
    var signaturePad1 = new SignaturePad(canvas1);
    }
    if(canvas3)
    {
    var signaturePad3 = new SignaturePad(canvas3);
    }
    if(canvas4)
    {
    var signaturePad4 = new SignaturePad(canvas4);
    }
    if(canvas5)
    {
    var signaturePad5 = new SignaturePad(canvas5);
    }

    $("#updatebutton, #draft").on('click', function(e) {
        if (signaturePad) {
            $("#signature").val(signaturePad.toDataURL('image/png'));
        }
        if(signaturePad3)
        {
        $("#signature3").val(signaturePad3.toDataURL('image/png'));
        }
        if(signaturePad4)
        {
        $("#signature4").val(signaturePad4.toDataURL('image/png'));
        }
        if(signaturePad5)
        {
        $("#signature5").val(signaturePad5.toDataURL('image/png'));
        }
        var buttonValue = $(this).val();
        var input = $("<input>")
        .attr("type", "hidden")
        .attr("name", "action")
        .val(buttonValue);
        // var status = $('#permitdata_status').val();
        // if(status == 'pending' && buttonValue != 'draft')
        // {
        //     $("#permitrenew").attr('action', "{{route('permit.save')}}");
        // }
        // if (signaturePad1) {
        //     $("#signature1").val(signaturePad1.toDataURL('image/png'));
        // }
        // $('#submitbutton').prop('disabled', true);
        // $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary"); //.prop("disabled", true);
        $("#desingform").append(input);
        $("#desingform").submit();
    });
    if (signaturePad) {
    signaturePad.addEventListener("endStroke", () => {
    console.log("hello");
    $("#signature").val(signaturePad.toDataURL('image/png'));
    $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
    $("#updateBtn").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
    // $('#submitbutton')
    });
}
    $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
        $("#signature").val('');
        $("#sigimage").text("Signature Not Added").removeClass('text-success').addClass('text-danger');
        $("#updateBtn").removeClass("btn-primary").addClass("btn-secondary").attr("disabled", true);
    });

    $('#design_required_by_date').change(function() {
        $('#design_required_by_date').css("background-color", "#eee ");
        $('#design_required_by_date').css({"color": "#000"});
    });
    $('#designer_company_name').change(function() {
        $('#designer_company_name').css("background-color", "#f5f8fa ");
        $('#design_required_by_date').css("color", "#000");
    });
    $('#designer_company_email').change(function() {
        $('#designer_company_email').css("background-color", "#f5f8fa ");
        $('#designer_company_email').css("color", "#000");
    });
    $('#twc_name').change(function() {
        $('#twc_name').css("background-color", "#f5f8fa ");
        $('#twc_name').css("color", "#000");
    });
    $('#twc_email').change(function() {
        $('#twc_email').css("background-color", "#f5f8fa ");
        $('#twc_email').css("color", "#000");
    });
    $(document).ready(function() {
        if($("#design_requirement_text").val() !== "") {
            console.log("helo")
                $("#design_requirement_text").removeClass("blackBack")
                $("#design_requirement_text").addClass("whiteBack")
            }
        });
  
    if($("#designer_company_name").val()!="")
    {
        $("#designer_company_name").removeClass('form-control-solid');
    }
    if($("#desinger_company_name2").val() != "")
    {
        $("#desinger_company_name2").removeClass('form-control-solid');
    }
    if($("#desinger_email_2").val() != "")
    {
        $("#desinger_email_2").removeClass('form-control-solid');
    }
   
            
</script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("email-button").addEventListener("click", function() {
        var designerEmailDiv = document.getElementById("designerEmail");
        var clonedDiv = designerEmailDiv.cloneNode(true);
        clonedDiv.querySelector("input").value = "";
        var newContainerDiv = document.createElement("div");
        newContainerDiv.setAttribute("class", "col-md-6");
        newContainerDiv.style.marginTop = "26px";
        newContainerDiv.appendChild(clonedDiv);
        document.getElementById("additional-emails").appendChild(newContainerDiv);
    });
});
</script> -->
<script>


document.addEventListener('DOMContentLoaded', function() {
    var emailContainer = document.getElementById("additional-emails");

    document.getElementById("email-button").addEventListener("click", function() {
        var emailFieldDiv = document.createElement("div");
        emailFieldDiv.setAttribute("class", "col-md-5");
        emailFieldDiv.style.marginTop = "26px";

        var designerEmailDiv = document.getElementById("designerEmail");
        var clonedDiv = designerEmailDiv.cloneNode(true);
        clonedDiv.querySelector("input").value = "";

        emailFieldDiv.appendChild(clonedDiv);
        emailContainer.appendChild(emailFieldDiv);

        var colDiv = document.createElement("div");
        colDiv.setAttribute("class", "col-md-1");

        var inputDiv = document.createElement("div");
        inputDiv.setAttribute("class", "d-flex justify-content-end inputDiv");

        var emailMinusDiv = document.createElement("div");
        emailMinusDiv.setAttribute("class", "email-minus");
        emailMinusDiv.textContent = " - ";

        emailMinusDiv.addEventListener("click", function() {
            emailContainer.removeChild(emailFieldDiv);
            emailContainer.removeChild(colDiv);
        });

        inputDiv.appendChild(emailMinusDiv);
        colDiv.appendChild(inputDiv);
        emailContainer.appendChild(colDiv);
    });
});

$(document).ready(function(){

$("#description").summernote({
    placeholder: 'Design Description',
    disableDragAndDrop:true,
    tabsize: 2,
    height: 300,
    toolbar: [
    // [groupName, [picture]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough']],
    ['fontsize', ['']],
    ['color', ['']],
    ['para', ['ul', 'ol', '']],
    ['height', ['']],
    ['picture']
  ]
});

})

// $('.email-minus').click(function(){
//     alert("13");
//     $(this).parent().parent().prev().remove();
//     $(this).remove();
</script>
<script>
    // JavaScript to handle adding new members
    const addMemberButton = document.getElementById('addMemberButton');

    addMemberButton.addEventListener('click', (e) => {
        e.preventDefault();
        const third_member = document.getElementById('third_member');
        const fourth_member = document.getElementById('fourth_member');
        const fifth_member = document.getElementById('fifth_member');

        // Check the display style of element1
        const style3 = window.getComputedStyle(third_member);
        const displayStyle3 = style3.getPropertyValue('display');

        // Check the display style of element2
        const style4 = window.getComputedStyle(fourth_member);
        const displayStyle4 = style4.getPropertyValue('display');

        // Check the display style of element2
        const style5 = window.getComputedStyle(fifth_member);
        const displayStyle5 = style5.getPropertyValue('display');
        if (displayStyle3 === 'none') {
            third_member.style.display = 'block';
        } else if (displayStyle4 === 'none') {
            fourth_member.style.display = 'block';
        } else if (displayStyle5 === 'none') {
            fifth_member.style.display = 'block';
        } else {
            alert("Max Signature Limit Reached")
        }
    });

    function deleteTempWorkFile(id) {
        console.log("id", id);
        // Remove the corresponding file container (the parent div) by its id
        const fileContainer = document.getElementById(id);

        if (fileContainer) {
            fileContainer.remove();

            // Get the filename from the id (assuming your id is in the format "filename")

            // Find all hidden inputs with the "design_upload[]" name attribute
            const hiddenInputs = document.querySelectorAll('input[name="temp_work_image"]');

            // Loop through hidden inputs to find the one with the matching value
           
                if (hiddenInputs.value == id) {
                    input.remove();
                }
          

            if (hiddenInputs) {
                // Make an AJAX request to delete the file on the server
                fetch('{{ route("delete.temporarywork.image") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if necessary
                        },
                        body: JSON.stringify({
                            filename_id: id,
                            type:"temp_work"
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message); // Log the server's response
                    })
                    .catch(error => {
                        console.error(error);
                    });
                }
            }
        }
    function deleteImageFile(id) {
        console.log("id", id);
        // Remove the corresponding file container (the parent div) by its id
        const fileContainer = document.getElementById(id);

        if (fileContainer) {
            fileContainer.remove();

            // Get the filename from the id (assuming your id is in the format "filename")

            // Find all hidden inputs with the "design_upload[]" name attribute
            const hiddenInputs = document.querySelectorAll('input[name="unload_images[]"]');

            // Loop through hidden inputs to find the one with the matching value
            hiddenInputs.forEach(input => {
                if (input.value == id) {
                    input.remove();
                }
            });

            if (hiddenInputs) {
                // Make an AJAX request to delete the file on the server
                fetch('{{ route("delete.temporarywork.image") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if necessary
                        },
                        body: JSON.stringify({
                            filename_id: id,
                            type:"temp_work_image"
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message); // Log the server's response
                    })
                    .catch(error => {
                        console.error(error);
                    });
                }
            }
        }
</script>

              
@endsection