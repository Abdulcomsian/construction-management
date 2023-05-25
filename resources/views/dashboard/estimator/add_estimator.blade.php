@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #fff !important;
        opacity: 1;
        /* Firefox */
    }

    #scope-of-design {}

    .whiteBack::placeholder {
        color: #000 !important;
    }

    .form-select,
    #design_requirement_text,
    .inputDiv input {
        border-radius: 0.25rem !important;
    }

    .form-control[readonly] {
        background-color: #000;
    }


    input {
        /* custom */
        caret-color: gray;
    }

    .customDate::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }

    input::placeholder {
        color: #fff !important;
    }

    #design_requirement_text {
        color: #000 !important;
    }

    .list-div ul li,
    .list-check-div ul li {
        height: 72px;
        overflow: visible;
        border-radius: 5px;
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
        margin: 9px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }

    /* .blackBack {
        background-color: #000 !important;
        color: #fff !important;
    } */

    /* .whiteBack {
        background-color: #f5f8fa !important;
        color: #000 !important;
    } */

    select:focus,
    input:focus,
    .form-select.form-select-solid:focus {
        background-color: #fff;
        color: #000;
    }

    .form-control[readonly] {
        background-color: #000;
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

    .hideBtn {
        display: none !important;
    }

    .showBtn {
        display: block !important
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        /* width: 40%; */
        color: #000;
        position: absolute;
        bottom: 25px;
        background: white;
        font-family: 'Inter', sans-serif;
        z-index: 1;
    }

    input {
        background-color: #fff !important;
        border: none !important;
        color: #000 !important;
    }

    .select2-container {
        width: 250px !important;
    }

    .inputDiv {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 5px 5px;
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

    /*#sig canvas {
            width: 50% !important;
            max-height: 200px;
        }*/
    .modalDiv {
        width: 100%;
    }

    .whiteBack {
        background-color: #f5f8fa !important;
        color: #000 !important;
    }

    #kt_content {
        background: white !important;
    }

    /* .form-select.form-select-solid {
        background-color: #000;
        color: #fff;
    } */

    .form-control.form-control-solid {
        width: 250px;
    }

    .twLayout label {
        padding: 0 !important;
        flex-grow: 1
    }

    .twLayout label span {
        padding: 12px !important;
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

    @media only screen and (max-width: 550px) {
        .db_mr {
            display: block !important;
            width: 100% !important;
            margin-bottom: 20px !important;
        }
    }

    @media only screen and (min-width: 992px) {
        #kt_post {
            width: 75%;
        }
    }

    #scopofdesign::placeholder {
        /* modern browser */
        color: #fff;
    }

    /*canvas{width:50%;height:110px;}*/
    /* .inputDiv  #design_required_by_date{color:#fff;} */
    .form-control.form-control-solid:focus {
        color: #000 !important;
    }

    .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg {
        word-break: break-all;
        height: 32px;
        background: white;
        border: none;
    }

    .form-select.form-select-solid {
        background: white;
        border: none;
    }

    .select2-selection__choice__display {
        color: black;
    }

    textarea.select2-search__field::placeholder {
        color: rgb(138, 136, 136) !important;
    }
</style>

@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}" />
<link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}" />
<link rel="stylesheet" href="{{asset('css/signature.css')}}" />
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" />
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container temporary_work_create">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top" style="width:98%">
                        <h2 class="db_mr" style="display: inline-block;">New Estimate Design Brief</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('estimation_store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        {{-- <div class="row">
                            <div class="col">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <label class=" fs-6 fw-bold mb-2" style="bottom: 38px;">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="00"
                                        id="no" name="projno">
                                    {{-- <select name="project_id" id="projects"
                                        class="form-select form-select-lg form-select-solid" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ?
                                            'selected' : '' }} @endisset @isset($project_ids) {{
                                            in_array($item->id,$project_ids) ? 'selected' : '' }}
                                            @endisset>{{$item->name .' - '. $item->no}}</option>
                                        @empty
                                        @endforelse
                                    </select> --}}
                                    {{--
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid"
                                        placeholder="Enter Project number" id="no" name="projno">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input data-date-inline-picker="true" type="date" value=""
                                        class="blackBack form-control form-control-solid" placeholder="Date"
                                        name="design_issued_date" id="design_issued_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid"
                                        placeholder="Project Address" id="address" name="projaddress">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">TWC Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid"
                                        placeholder="TWC Name" id="twc_name" name="twc_name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">TWC Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid"
                                        placeholder="TWC Email Address" id="twc_email" name="twc_email"
                                        style="background: #f5f8fa">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Design Required by Date:</span>
                                    </label>
                                    <input data-date-inline-picker="true"
                                        style=" cursor: pointer;color:#a9abb7 !important;" type="date"
                                        class="customDate blackBack form-control form-control-solid"
                                        placeholder="Design Required by Date" id="design_required_by_date"
                                        name="design_required_by_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <div class="d-flex modalDiv" data-bs-toggle="modal"
                                        data-bs-target="#design-requirement">
                                        <!--begin::Label-->
                                        <label style="bottom: 41px" class="  fs-6 fw-bold mb-2">
                                            Design Requirement:
                                        </label>
                                        <br>
                                        <input type="text" class="blackBack" style="width: 50%;"
                                            id="design_requirement_text" placeholder="Design requirement"
                                            name="design_requirement_text">
                                        <!--end::Label-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="required  fs-6 fw-bold mb-2"
                                            style="bottom: 0; top: -13px; height: fit-content;">
                                            Description:
                                        </label>
                                        <textarea class="blackBack form-control"
                                            name="description_temporary_work_required"
                                            style="height:32px; border: none " rows="2" cols="50"
                                            placeholder="Provide brief description of design requirements."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex mt-2">
                                <div class="col-md-6">
                                    <div class="d-flex flex-column mb-0">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="required">TW Category</span>
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="d-flex twLayout">
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="0"
                                                    checked="checked" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary">0</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="1" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">1</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="2" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">2</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="3" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">3</span>
                                            </label>
                                            <!--end::Option-->
                                            <a href="{{asset('temporary/tw_pdfs/1.pdf')}}" target="_blank"><span><img
                                                        alt="info" src="{{asset('assets/media/logos/info.png')}}"
                                                        style="height:32px"></span></a>
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column  ">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="required">TW Risk Class</span>
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="d-flex twLayout">
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="VL"
                                                    checked="checked" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary">VL</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="L" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">L</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="M" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">M</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="H" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">H</span>
                                            </label>
                                            <!--end::Option-->
                                            <a href="" target="_blank"><span><img alt="info"
                                                        src="{{asset('assets/media/logos/info.png')}}"
                                                        style="height:32px"></span></a>
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputDiv desinger_company_name2 mb-0 d-none" id="desinger_company_name2">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Checker Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid "
                                        placeholder="Design Checker Company Name" id="desinger_company_name2"
                                        name="desinger_company_name2" value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv desinger_company_name2 mb-0 d-none" style="margin-top: 30px">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Checker Email:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid "
                                        placeholder="Design Checker Email" id="desinger_email_2" name="desinger_email_2"
                                        value="" autocomplete="off">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <div class="d-flex modalDiv d-block" data-bs-toggle="modal"
                                        data-bs-target="#scope-of-design">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2"
                                            style="bottom: 0; top: -13px; height: fit-content;">
                                            Scope of Design:
                                        </label>
                                        <textarea class="blackBack form-control" style="height:32px; border: none "
                                            id="scopofdesign" rows="2" cols="50"
                                            placeholder="Scope of Design Output Required From TW Engineer"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <div style="position:relative;" class="d-flex modalDiv d-block"
                                        data-bs-toggle="modal" data-bs-target="#attachment-of-design">
                                        <label class=" fs-6 fw-bold mb-2" style="bottom: 32px">
                                            Attachments / Spec:
                                            <span style="margin-left: 10px;">
                                                <a href="{{asset('uploads/checklist.pdf')}}" target="_blank"><span><img
                                                            alt="info" src="{{asset('assets/media/logos/info.png')}}"
                                                            style="height:25px"></span></a>
                                            </span>
                                        </label>
                                        <input id="attachment" class="blackBack"
                                            style="background-color: #000; color:#fff" type="text"
                                            placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid"
                                        placeholder="Name" name="name" id="admin_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid"
                                        placeholder="Job title" name="job_title" id="job_title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" id="companyadmin"
                                        class="blackBack form-control form-control-solid"
                                        style="background-color:#f5f8fa" placeholder="Company" name="company">
                                    <input type="hidden" id="company_id" name="company_id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input data-date-inline-picker="true" type="date" name="date" value=""
                                        style="background-color:#fff" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span>Client Email:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="email" name="client_email" class="form-control form-control-slid"
                                        placeholder="Enter Client Email" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span>Status:</span>
                                    </label>
                                    <!--end::Label-->
                                    <select name="work_status" id=""
                                        style="height: 33px;border: none;padding-left: 5px;outline:none">
                                        <option value="draft">Draft</option>
                                        <option value="publish">Publish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span>Photo:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="file" class="form-control" id="photo" name="photo"
                                        value="{{old('photo')}}" accept="image/*;capture=camera">
                                </div>
                            </div>

                            <div class="col-md-6">
                                {{-- <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span>Information Required:</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea class="form-control" rows="5" name="information_required"
                                        class="form-control form-control-solid"></textarea>
                                </div> --}}

                                <!-- <div class="inputDiv d-none desinger_company_name2">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                           Design Checker Name:</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid " placeholder="Design Checker Name" id="desinger" name="desinger" value="{{old('desinger')}}"  >
                                    </div> -->
                                <div class="d-flex align-items-center inputDiv" style="height: 41px">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span>Information Required?</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="checkbox" name="information_required" id="information_required"
                                        style="margin-left:10px;opacity: 0.5" class="blackBack">
                                    <span style="padding-left:22px;color:#000">Select if additional information is
                                        required.</span>
                                </div>
                            </div>
                        </div>
                        <div class="appendresult" style="background:white;margin: 0 4px;">
                            <div class="row">
                                <div class="pl-3 col-md-3">
                                    <div class="inputDiv mt-0">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Price:</span>
                                        </label>
                                        <input type="number" name="price[]" class="form-control"
                                            placeholder="Enter Price" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="inputDiv form-group  mt-0 d-flex" style="flex-direction: column">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Description:</span>
                                        </label>
                                        <input type="text" name="description[]" placeholder="Enter Description"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="inputDiv input-group mt-0 ">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Submittal Date:</span>
                                        </label>
                                        <input type="date" name="date[]" class="form-control fileInput"
                                            id="inputGroupFile02">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-end">
                                        {{-- <label class="d-flex align-items-center fs-6 fw-bold mt-5">
                                            <span></span>
                                        </label> --}}
                                        <button type="button" class="btn btn-primary  queryButton add-more-price"><i
                                                class="fa fa-plus"></i>Add More</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @include('dashboard.modals.design-relief-modals')
                        <div class="row mt-5">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <input type="submit" name="action"
                                    style="margin-left: 10px; background: #07d564 !important"
                                    class="btn btn-primary float-end submitbutton" value="Save">
                            </div>
                        </div>
                        <!-- <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Save & Email</button> -->
                        <!-- <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Save</button> -->


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
<script src="{{asset('assets/js/temporary-work-modal.js')}}"></script>
<script>
    $(document).ready(function(){
        $('input[name="tw_category"]').on('click', function() {
            // Get the value of the clicked input element
            let value = $(this).val();

            // Log the value to the console
            console.log(value);

            // Check if the value is equal to "3"
            if (value === "3") {
                $(".desinger_company_name2").removeClass('d-none').addClass('d-flex');
                // $("#desinger_company_name2").attr('required','required');
                // $("#desinger_email_2").attr('required','required');
            } else {
                $(".desinger_company_name2").addClass('d-none').removeClass('d-flex');
            }
        });
    });
</script>
<script type="text/javascript">
    $(".add-more-price").on('click',function(){
        $(".appendresult").append(`<div class="row"><div class="pl-3 col-md-3">
                              <div class=" inputDiv form-group  mt-0 d-flex" style="flex-direction: column">
                                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                   <span >Price:</span>
                                  </label>
                                   <input type="number" name="price[]" class="form-control"/>
                
                              </div>
                                
                            </div>
                            <div class="col-md-4">
                              <div class="inputDiv form-group mt-0 d-flex" style="flex-direction: column">
                                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                   <span >Description:</span>
                                  </label>
                                   <input type="text" name="description[]" placeholder="Enter Description" class="form-control">
                
                              </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="inputDiv input-group mt-0 ">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span>Date:</span>
                                    </label>
                                    <input type="date" name="date[]" class="form-control fileInput" id="inputGroupFile02">
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger mb-2 queryButton remove"><i class="fa fa-minus"></i>Remove</button>
                                </div>
                                
                            </div></div>`);
    })

    $(document).on("click",".remove",function(){
        $(this).parent().parent().parent().remove();
    })
</script>
@endsection