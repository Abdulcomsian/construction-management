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
        height: 32px;
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

    .blackBack {
        /* background-color: #000 !important;
        color: #fff !important; */
    }

    textarea {
        color: black;
        border: none !important;
    }

    textarea::-webkit-input-placeholder {
        color: black !important;
    }

    .whiteBack {
        background-color: #f5f8fa !important;
        color: #000 !important;
    }

    select:focus,
    input:focus,
    .form-select.form-select-solid:focus {
        background-color: #f5f8fa;
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
        border: none;
    }

    .inputDiv label {
        /* width: 40%; */
        color: #000;
        position: absolute;
        bottom: 33px;
        background: white;
        font-family: 'Inter', sans-serif;
    }

    .select2-container {
        width: 250px !important;
    }

    .select2-container--bootstrap5 .select2-selection {
        height: 32px !important;
    }

    .inputDiv {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 5px 5px;
    }

    .textarea .form-control {
        height: 32px !important;
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
        position: relative;
    }

    #descriptionTextArea,
    #scopeOfDesignArea,
    #attachment {
        min-height: fit-content !important;
    }

    .whiteBack {
        background-color: #f5f8fa !important;
        color: #000 !important;
    }

    .form-select.form-select-solid {
        background-color: #fff;
        color: #fff;
        border: none;
    }

    .form-control.form-control-solid {
        width: 250px;
    }

    @media only screen and (min-width: 470px) {
        .list_top {
            display: inline !important;
        }



        /* #submitbutton {
            position: relative;
            width: 100%;
        } */
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

    #scopofdesign::placeholder {
        /* modern browser */
        color: #fff;
    }

    /*canvas{width:50%;height:110px;}*/
    /* .inputDiv  #design_required_by_date{color:#fff;} */
    .form-control.form-control-solid:focus {
        color: #000 !important;
    }

    #projectAssig-form input {
        background-color: #fff;
        border: none !important;
        color: #000 !important;
    }

    #projectAssig-form input::placeholder {
        color: #9D9D9D !important;
    }

    input[type="radio"]:focus,
    input[type="radio"]:active {
        outline: max(2px, 0.15em) solid #000;
        background-color: #000 !important;
        outline-offset: max(2px, 0.15em);
    }

    input[type="radio"]:checked {
        /* Add your styles here */
        background-color: #07d564 !important;
        color: #07d564 !important;
        border: 1px solid #000;
    }

    .nav-group.nav-group-fluid>label {
        top: 0 !important;
        padding: 0 2px !important;
        width: 35px !important;
        height: 35px !important
    }

    .TW .nav-group {
        background-color: #fff;
    }

    .TW .nav-group label {
        margin: 0 !important;
    }

    .btn.btn-color-muted {
        color: #a1a5b7;
        background: #07D5640D;
    }

    .TW .inputDiv {
        border: none;
    }

    .fa-undo:before {
        background-color: white;
        padding: 5px;
        border-radius: 100%;
    }

    #kt_body {
        max-width: 1400px;
    }

    #kt_content {
        width: 75%;
        padding-bottom: 0;
    }

    #design-requirement .modal-dialog {
        width: 50%;
    }

    #attachment-of-design .modal-dialog {
        width: 51%;
    }

    .image-uploader {
        border: 2px dashed #d9d9d9 !important;
        position: relative;
        border-radius: 4px;
    }

    .signatureTitle {
        white-space: nowrap;
    }

    @media screen and (max-width: 768px) {

        #projectNo,
        #selectProject,
        #projectName,
        {
        margin-top: 0 !important;
        margin-bottom: 30px !important;
    }

    #desinger_company_name2 {
        margin-bottom: 0px !important;
    }

    .signatureTitle {
        white-space: nowrap;
    }

    #kt_content {
        margin: 0 auto;
        width: 100%;
    }

    #kt_content_container .card-title {
        flex-direction: column;
        align-items: flex-start !important;
    }

    #kt_content_container .card-header {
        padding-left: 8px;
    }

    #kt_content_container .card-title h2 {
        white-space: nowrap;
        margin-bottom: 20px;
    }

    .newDesignBtn {
        width: 230px !important;
    }

    .TW {
        gap: 21px;
    }

    #design-requirement .modal-dialog,
    #attachment-of-design .modal-dialog {
        width: 75%;
        margin: auto;
    }

    }

    @media screen and (max-width: 576px) {

        #design-requirement .modal-dialog,
        #attachment-of-design .modal-dialog {
            width: 100%;
            margin: auto;
        }
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
    <!--begin::Toolbar-->
    <!--  <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Works</h1>
               
            </div>
            
        </div>
        
    </div> -->
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
                    <div class="card-title list_top"
                        style="width:100%; display: flex !important; justify-content: space-between;align-items:center">
                        <h2 class="db_mr"
                            style="display: inline-block;width:36%; font-family: 'Inter', sans-serif; font-weight:600; font-size:32px">
                            Project Assign</h2>
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="projectAssig-form" method="post" action="{{route('projectAssign')}}" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inputDiv d-block" id="selectAssignedProject" style="margin-bottom:0px">
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Select Designer:</span>
                                    </label>
                                    <select name="designerId" id="selectProject" class="form-select" aria-label="Default select example">
                                        <option disabled selected>Open this select menu</option>
                                        @foreach($designers as $designer)
                                            <option value="{{$designer->id}}">{{$designer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex inputDiv d-block" id="projectNo">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <!--end::Label-->
                                    <select name="projectId" class="form-select" aria-label="Default select example">
                                        <option disabled selected>Open this select menu</option>
                                        @foreach($AwardedEstimators as $work)
                                            <option value="{{$work->id}}">{{$work->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Assign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

@endsection