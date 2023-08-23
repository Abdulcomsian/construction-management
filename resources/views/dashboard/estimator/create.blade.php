@extends('layouts.dashboard.master',['title' => 'Temporary Works'])
@section('multiselectscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
@endsection
@section('styles')
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
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

    .inputDiv-1 input{
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
    
    .inputDiv-1 input {
        min-width: 40px;
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
    .inputDiv-1 select {
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
    .label-1 {
         width: 50%;
        color: #000;
        position: absolute;
        bottom: 34px;
        background: white;
        font-family: 'Inter', sans-serif;
        z-index: 1;
        text-align:center;
    }
    .btn-group {
    position: relative;
    display: -ms-inline-flexbox;
    display: inline-flex;
    vertical-align: middle;
    margin-top: -5px !important;
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
    .inputDiv-1 {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 0px 5px;
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

    .form-check-input:checked[type=radio]{
        background-color:green !important;
    }

    #clear{
    margin-left:-25px;
    margin-top:60px;
}
#sig{
    border-radius:5px;
    margin-top:-50px;
}
canvas {
    width: 296px;
    height: 152px;
}
#sigimage{
    position: absolute;
    margin-top:-55px;
    margin-left:6px;
}


.button-set{
        position: absolute !important;
    margin-top: -160px !important;
    margin-left: 585px;
    }
    .button-set > input{
        font-size:20px;
        font-weight:bold;
        padding:10px 50px !important;
    }


    @media only screen and (max-width: 775px) {
        .button-set{
        position: absolute relative;
    margin-top: -10px !important;
    margin-left: -20px;
    }
    .button-set > input{
        font-size:15px;
        font-weight:bold;
        padding:5px 15px !important;
    }
    }




    .multiselect-selected-text{
        color:gray;
        font-weight: 400;
    font-size: 14px;
    }

    .multiselect-container>li {
        padding: 5px 0;
        border-bottom: 1px solid #eee;
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
                        <h2 class="db_mr" style="display: inline-block;">Estimate Design Brief</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('estimator.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="row">
                            <div class="col">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <label class=" fs-6 fw-bold mb-2" style="bottom: 38px;">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects"
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
                                    <input readonly type="text" class="blackBack form-control form-control-solid"
                                        placeholder="000" id="no" name="projno" value="{{old('projno')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname"
                                        value="{{old('projname')}}">
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
                                    @php
                                    $cur_date = date('d/m/Y');
                                    @endphp
                                    <input data-date-inline-picker="true" readonly type="date" 
                                        class="blackBack form-control form-control-solid" placeholder="Date"
                                        name="design_issued_date" id="design_issued_date"
                                        value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid"
                                        placeholder="Project Address" id="address" name="projaddress"
                                        value="{{old('projaddress')}}">
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
                                        placeholder="TWC Name" id="twc_name" name="twc_name" value="{{\Auth::user()->hasPermissionTo('twc-estimator') ? \Auth::user()->name : ''}}">
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
                                        placeholder="TWC Email Address" id="twc_email" name="twc_email" value="{{\Auth::user()->hasPermissionTo('twc-estimator') ? \Auth::user()->email : ''}}"
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
                                        name="design_required_by_date" value="{{date("Y-m-d")}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0" id="designReq">
                                    <div class="d-flex modalDiv" data-bs-toggle="modal"
                                        data-bs-target="#design-requirement">
                                        <!--begin::Label-->
                                        <label style="bottom: 41px" class="  fs-6 fw-bold mb-2">
                                            Design Requirement:
                                        </label>
                                        <br>
                                        <input type="text" class="blackBack" style="width: 50%;"
                                            id="design_requirement_text" placeholder="Design requirement" readonly
                                            name="design_requirement_text" value="{{old('design_requirement_text')}}">
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
                                        <label class="  fs-6 fw-bold mb-2"
                                            style="bottom: 0; top: -13px; height: fit-content;">
                                            Description:
                                        </label>
                                        <textarea class="blackBack form-control"
                                            name="description_temporary_work_required"
                                            style="height:32px; border: none " rows="2" cols="50"
                                            placeholder="Provide brief description of design requirements.">{{old('description_temporary_work_required')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex mt-2">
                                <div class="col-md-6">
                                    <div class="d-flex flex-column mb-0">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="">TW Category</span>
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
                                            <span class="">TW Risk Class</span>
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
                                            <a href="{{asset('temporary/tw_pdfs/2.pdf')}}" target="_blank"><span><img
                                                        alt="info" src="{{asset('assets/media/logos/info.png')}}"
                                                        style="height:32px"></span></a>
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
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
                                <div class="d-flex inputDiv d-block mb-0" id="attachment_specs">
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
                                            placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               
                                <div>
                                    <div class="d-flex inputDiv d-block mb-0">
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="">Select company approved designer</span>
                                        </label>
                                        <select name="designers[]" id="desingers"
                                            class="form-select form-select-lg form-select-solid" data-control="select2"
                                            data-placeholder="Select an option" data-allow-clear="true" multiple>
                                            {{-- <option value="">Select Option</option> --}}
                                            <optgroup label="Designer List">
                                                @foreach($designers as $desig)
                                                @if($desig->hasRole('designer'))
                                                <option value="{{$desig->email}}-{{$desig->id}}">{{$desig->email}}
                                                </option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <h6 style="margin-top: 17px; margin-bottom: 0px; font-weight:bold">And/Or</h6>
                                    <div class="d-flex inputDiv d-block mb-0">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="">Designer Email Address:</span>

                                        </label>

                                        <!--end::Label-->
                                        <input type="text" class="blackBack form-control form-control-solid"
                                            placeholder="Enter Comma Seperated" id="designer_company_emails"
                                            name="designer_company_emails" value="{{old('designer_company_emails')}}">
                                    </div>
                                </div>
                                <h6 style="margin-top: 17px; margin-bottom: 0px; font-weight:bold">And/Or</h6>

                                <!-- <div class="d-flex inputDiv d-block mb-0">
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Select Online Designers</span>
                                    </label>
                                    <select name="online_designers[]"
                                        class="form-select form-select-lg form-select-solid adminDesigners"
                                        data-control="select2" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple>
                                        {{-- <option value="">Select Option</option> --}}

                                        @foreach($adminDesigners as $desig)
                                     
                                            @if($desig->hasRole(['designer','Design Checker','Designer and Design
                                            Checker']))
                                            <option value="{{$desig->email}}-{{$desig->id}}">{{$desig->name}} |
                                                {{$desig->email}}</option>
                                            @endif
                                 
                                        @endforeach

                                    </select>
                                </div> -->

                                <!--
                                    <option value="Option one">  Option one</option>
                                     <option value="Option two">Option two</option>
        <option value="Option three">Option three</option>
        <option value="Option four">Option four</option>
        <option value="Option five">Option five</option>
        <option value="Option six">Option six</option> -->


                                <div class="d-flex  flex-column inputDiv-1 mb-0">
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="label-1">Select Online Designers</span>
                                    </label>
                                    <select id="mySelect" class="mySelect" multiple="multiple"  name="online_designers[]">
   
                                    @foreach($adminDesigners as $desig)
                                     
                                     @if($desig->hasRole(['designer','Design Checker','Designer and Design
                                     Checker']))
                                     <option value="{{$desig->email}}-{{$desig->id}}">{{$desig->name}} |
                                         {{$desig->email}}</option>
                                     @endif
                          
                                 @endforeach

                                    </select>
                                </div>
                                

                            </div>
                            <div class="col-md-6">
                             
                                <div class="">
                                    <div class="d-flex inputDiv d-block mb-0">

                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="">Select company approved supplier</span>
                                        </label>
                                        <select name="suppliers[]" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-allow-clear="true" multiple>
                                            {{-- <option value="">Select Option</option> --}}
                                            <!-- <optgroup label="Suppliers List"> -->
                                                @foreach($suppliers as $supp)
                                                <option value="{{$supp->email}}-{{$supp->id}}">{{$supp->email}}</option>
                                                @endforeach
                                            <!-- </optgroup> -->

                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <h6 style="margin-top: 17px; margin-bottom: 0px; font-weight:bold">And/Or</h6>
                                    <div class="d-flex inputDiv d-block mb-0">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="">Supplier Email Address:</span>

                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="blackBack form-control form-control-solid"
                                            placeholder="Enter Comma Seperated" id="supplier_company_emails"
                                            name="supplier_company_emails" value="{{old('supplier_company_emails')}}">
                                    </div>
                                </div>

                                <h6 style="margin-top: 17px; margin-bottom: 0px; font-weight:bold">And/Or</h6>

                                <div class="d-flex inputDiv d-block mb-0">
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Select Online Supplier</span>
                                    </label>
                                    <select name="online_suppliers[]"  id="mySelect" class="mySelect"  multiple>
                                        {{-- <option value="">Select Option</option> --}}

                                        @foreach($adminSuppliers as $supp)
                                        <!-- <optgroup label="Supplier List"> -->
                                            @if($supp->hasRole('supplier'))
                                            <option value="{{$supp->email}}-{{$supp->id}}">{{$supp->name}}</option>
                                            @endif
                                        <!-- </optgroup> -->
                                        @endforeach

                                    </select>
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
                                        placeholder="Name" name="name" id="admin_name"
                                        value="{{\Auth::user()->name ?? ''}}" readonly="readonly">
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
                                        placeholder="Job title" name="job_title" id="job_title"
                                        value="{{\Auth::user()->job_title ?? ''}}" readonly="readonly">
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
                                    <input data-date-inline-picker="true" type="date" name="date"
                                        value="{{ date('Y-m-d') }}" style="background-color:#fff"
                                        class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
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
                        </div>
                        @if(auth()->user()->hasRole('user'))
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-12">
                            <input type="checkbox" id="display_sign" name="display_sign"  style="    position: relative;top: 2px;"/>
                            <span class="tickboxalign" style="padding-left:3px;color:#000; font-family:'Inter', sans-serif;">Email Designer and upload to Temporary Work Register</span>
                            </div>
                            <div class="col-md-12" id="display_sign_div" style="display:none">
                                
                                    <h5>Signature Type:</h5>
                                    <div class="d-flex ">
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="checkbox-field" id="DrawCheck" checked=true style="width: 12px;">
                                            <input type="hidden" id="Drawtype" name="" class="form-control form-control-solid" value="1">
                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                        </div>
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="checkbox-field" id="flexCheckChecked" 
                                                style="width: 12px;">
                                            <input type="hidden" id="signtype" name="signtype"
                                                class="form-control form-control-solid" value="2">
                                            <span
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Name</span>
                                        </div>
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="checkbox-field" id="pdfChecked" 
                                                style="width: 12px;">
                                            <input type="hidden" id="signtype" name="pdfsigntype"
                                                class="form-control form-control-solid" value="0">
                                            <span
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;">PNG/JPG Upload</span>
                                        </div>
                                    </div>
                                    <div class="inputDiv d-none" id="pdfsign">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Upload Signature:</span>
                                        </label>
                                        <input type="file" name="pdfphoto" class="form-control"
                                            accept="image/*">
                                    </div>
                                    <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name Signature:</span>
                                        </label>
                                        <input type="text" name="namesign"
                                            class="form-control form-control-solid">
                                    </div>
                                    <div class="d-flex inputDiv" id="sign" style="align-items: center; border:none">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <!-- <span class="required">Signature:</span> -->
                                        </label>
                                        <br />
                                        <canvas id="sig" style="background: lightgray"></canvas>
                                        <br />
                                        
                                        <textarea id="signature" name="signed" style="display: none"></textarea>
                                        <span id="clear" class="fa fa-undo cursor-pointer"
                                            style="line-height: 6"></span>
                                    </div>
                                    <span id="sigimage" class="text-danger" style="font-size: 15px">Signature Not Added</span>
                                    <br>
    
                                    
                            </div>
                        </div>
                        @endif
                        
                       
                        <div class="row mt-5 justify-content-between">
                            <div class="col-md-5"> 
                            </div>
                            <div class="col-md-1 published button-set" style="display:none;">
                                <button  type="submit" name="action"
                                    style="margin-left: 10px; background: #07d564 !important; color:white !important;"
                                    class="btn btn-primary float-end submitbutton" value="Publish">Publish</button>
                            </div>
                            <div class="col-md-4 notpublished"> 
                                <button type="submit" name="action"
                                    style="margin-left: 10px; background: #07d564 !important; color:white !important; font-size:18px; font-weight:bold;"
                                    class="btn btn-primary float-end submitbutton" value="Email Designer & Supplier (For Pricing)">Email Designer & Supplier (For Pricing)</button>
                            </div>
                            <div class="col-md-2 notpublished">
                                <button type="submit" name="action"
                                    style="margin-left: 10px; background: #07d564 !important; color:white !important; font-size:18px; font-weight:bold;"
                                    class="btn btn-primary float-end submitbutton" value="Save as Draft">Save as Draft</button>
                            </div>

                            
                        </div>
                        <!-- <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Save & Email</button> -->
                        <!-- <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Save</button> -->

                        @include('dashboard.modals.design-relief-modals')
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
@include('dashboard.modals.hazardlist')
@endsection
@section('scripts')
<script>
    var url="{{asset('js/myfile.json')}}";
    var jsondata="";
    $(document).ready(function(){
        getText(url);
            async function getText(file) {
               await fetch(file).then(response => response.json()).then(json => {
                  jsondata=json;
               });
            }
    });
</script>
<script src="{{ asset('assets/js/temporary-work-modal.js') }}"></script>
<script type="text/javascript">
    $(document).on("change","[name='req_check[]']",function(){
        if($(this).is(':checked'))
        {
            $(this).val(1);
        }
        else{
            $(this).val(0);
        }
    })
</script>
<script>
    var projects = {!!$projects!!};
    var address='';
    $('#projects').change(function() {
        let id = $(this).val();
        let project = projects.filter(function(p) {
            return p.id == id;
        });
        if(project[0].address)
        {
        address=project[0].address.replace(/\n/g,',');
        }
        if (project) {
            $('#no').val('').val(project[0].no);
            $('#name').val('').val(project[0].name);
            $('#date').val('').val(project[0].created_at);
            $('#address').val('').val(address ? address : 'Not Set');
            $("#companyadmin").val(project[0].company.name);
            $("#company_id").val(project[0].company.id);
            $.ajax({
            url:"{{route('project.twc.get')}}",
            method:"GET",
            data:{id:project[0].id,compayid:project[0].company.id},
            success:function(res)
            {
                $(".form-select.form-select-solid").css("background-color", "#eee !important");
                $(".form-control[readonly]").css("background-color", "#eee !important");
                
               if(res !='')
               {
                 // $("#twc_email").val(res);
               }
            }
        });
        }
        console.log(project);
    });
    
    

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
        //    $("#desinger_company_name2").attr('required','required');
        //    $("#desinger_email_2").attr('required','required');
          
        }
        else{
            $(".desinger_company_name2").addClass('d-none').removeClass('d-flex');
            $("#desinger_company_name2").removeAttr('required');
            $("#desinger_email_2").removeAttr('required');
        }
    })

    $("#attachment").click(function() {
        $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
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
    $("#scopofdesign").click(function() {
        $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
        });

    $(".hazardlist").on('click',function(){
        $("#hazard_modal_id").modal('show');
    })
            

    $(function() {
       var email= $("#twc_email").val();
       if(email.length>0){
        $("#twc_email").removeClass("blackBack")
       } else{
        $("#twc_email").addClass("blackBack")
       }
        $("input").on("change paste keyup cut select", function() {
            if($(this).val() !== "") {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            }
        });
        $("textarea").on("change", function() {
            if($(this).val() !== "") {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            }
        });
       
        $("#design_requirement_text").on("click", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
    
        });
        $("#scope-of-design #submit-requirment button").on("click", function() {
            console.log("here");
                $("#scopofdesign").removeClass("blackBack")
                $("#scopofdesign").addClass("whiteBack")
    
        });
        $("#attachment-of-design  #submit-requirment button").on("click", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
    
        });

        $("#projects").change(function(){
            console.log("hello")
            $(this).removeClass("blackBack")
            $("#projects span.form-select").removeClass("blackBack")
         //   $(".form-control[readonly]").removeClass("blackBack")
            $("#no").removeClass("blackBack").addClass("whiteBack");
            $("#name").removeClass("blackBack").addClass("whiteBack");
            $("#design_issued_date").removeClass("blackBack").addClass("whiteBack");
            $("#address").removeClass("blackBack").addClass("whiteBack");
            $("#job_title").removeClass("blackBack").addClass("whiteBack");
            $("#admin_name").removeClass("blackBack").addClass("whiteBack");
            $("#companyadmin").removeClass("blackBack").addClass("whiteBack");
            $(".form-select.form-select-solid").css("background-color","#f5f8fa")
            $("#companyadmin").removeClass("blackBack").addClass("whiteBack");
            $("#twc_name").removeClass("blackBack").addClass("whiteBack");
         //   $("#scopofdesign").addClass("blackBack")
        })

        $(".customDate").click(function(){
            $(".customDate::-webkit-calendar-picker-indicator").css("filter","invert(0)") 
        })
    });


    // $(".adminDesigners").on('change',function(){
    //     let data=$(this).val();
    //     var baseUrl = "<?php echo e(env('APP_URL')); ?>";
    //     if(data.length>0)
    //     {
    //         parts = data[0].split('-');
    //         loc = parts.pop();
    //         window.open(baseUrl+'company-profile/'+loc+'', '_blank');
    //     }
        
    // })

    var canvas = document.getElementById("sig");
    var signaturePad = new SignaturePad(canvas);
    signaturePad.addEventListener("endStroke", () => {
              $("#signature").val(signaturePad.toDataURL('image/png'));
              $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
            $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
    });
    
     $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
        $("#signature").val('');
        $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
        $('#submitbutton').prop('disabled', true);

        $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary"); //.addAttr("disabled");
    });

    const checkbox = document.getElementById("display_sign");
    const displayDiv = document.getElementById("display_sign_div");

    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            $(".published").show();
            $(".notpublished").hide();
            displayDiv.style.display = "block";
        } else {
            $(".published").hide();
            $(".notpublished").show();
            displayDiv.style.display = "none";
        }
    });

//disable button on submit
// $('#desingform').submit(function(e) {
//     e.preventDefault();
//     var form = $( "#desingform" );
//     form.validate();
//     valid = $("#desingform").valid();
//     if (!$('#desingform').valid())  e.preventDefault(); return false

//     $('#desingform input[type=submit]').attr("disabled", "disabled");  
//     e.currentTarget.submit();
//     return true;
// });
</script>


<!-- multiselect -->

<!-- <script>
    

    jQuery(document).ready(function() {
        $(document).ready(function() {
        jQuery('#mySelect').multiselect({
            buttonText: function(options, select) {
                if (options.length === 0) {
                    return 'Select options';
                } else if (options.length > 4) {
                    return options.length + ' selected';
                } else {
                    var labels = [];
                    options.each(function() {
                        labels.push($(this).text());
                    });
                    return labels.join(', ');
                }
            }
        });
    });
});
</script> -->


<script>
        $(document).ready(function() {
            $('.mySelect').multiselect({
                buttonText: function(options, select) {
                    if (options.length === 0) {
                        return 'Select options';
                    } else if (options.length > 2) {
                        return options.length + ' selected';
                    } else {
                        var labels = [];
                        options.each(function() {
                            labels.push($(this).text());
                        });
                        return labels.join(', ');
                    }
                }
            });

            // Prevent checkbox selection when clicking on option text
            $('.mySelect + .btn-group ul li a label').click(function(e) {
                e.preventDefault();

                var optionValue = $(this).closest('li').find('input[type="checkbox"]').val();

                // Perform navigation only for "Option one" when clicking on the option text
                if (optionValue === "Option one") {
                    window.location.href = 'sdsd.html';
                }
                if (optionValue === "Option two") {
                    window.location.href = 'adad.html';
                }
            });

            // Toggle checkboxes only when checkboxes are clicked
            $('.mySelect + .btn-group ul li a input[type="checkbox"]').click(function(e) {
                e.stopPropagation(); 
            });
        });
    </script>



@endsection