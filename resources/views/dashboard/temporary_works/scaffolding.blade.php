@extends('layouts.dashboard.master',['title' => 'Temporary Works'])
@section('styles')
<style>
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
        background-color: #F9D413;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
    }

    #kt_content_container {
        background-color: #fff;
    }

    #kt_content_container .card-title h2 {
        font-size: 32px;
        font-weight: 600;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

    .card {
        margin: 30px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
    }


    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: red !important;

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
        width: 100%;
        color: #000 !important;
        background-color: white !important;
        border: 1px solid lightgrey !important;
        border-radius: 8px;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        width: fit-content;
        color: #000;
        position: absolute;
        bottom: 33px;
        left: 7px;
        background: white;
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
        height: 200px;
    }

    #sig canvas {
        width: 100% !important;
        height: auto;
    }

    .modalDiv {
        width: 100%;
    }

    .modalDiv label {
        z-index: 1;
    }

    table,
    th,
    td {
        border: 1px solid grey;
        color: #000;
    }

    canvas {
        background: lightgray;
        width: 100%;
    }

    .inputDiv {
        margin: 20px 0px;
        position: relative;
    }

    .selection>span {
        background: white !important;
        border: 1px solid lightgray !important;
        border-radius: 8px;
    }

    /*.form-control.form-control-solid {
        background-color: #000;
        color: #5e6278 !important;
    }*/
    @media only screen and (max-width: 450px) {
        #sig {
            width: 200px;
        }
    }

    @media only screen and (max-width: 768px) {

        .ipadnewline,
        .ipadissue {
            display: block !important;
        }

        .zeromargin {
            margin-left: 0px !important;
        }

        .margintop {
            margin-top: 10px;
            margin-left: 0px !important;
        }

    }

    #kt_post {
        width: 75%;
    }

    #kt_post textarea {
        border: 1px solid lightgray;
        border-radius: 8px;
        height: 45px;
    }

    .listTitle {
        background: green;
        color: #fff;
        padding: 12px 10px !important;
        width: 100%;
        border-radius: 7px;

    }

    .ipadnewline {
        align-items: center;
        height: 70px;
    }

    .ipadnewline label {
        width: 30%;
    }

    .image-uploader {
        min-height: 8.4rem !important;
        border-radius: 8px;
    }

    .nav-group {
        background: none !important;
    }

    #signn {
        border: 1px solid lightgray;
        border-radius: 8px;
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
    }

    @media screen and (max-width: 670px) {
        #kt_post {
            width: 100%;
        }

        .listTitle {
            margin-bottom: 10px
        }
    }
</style>
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" />
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6 mb-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Scaffolding Inspection / Permit to Load</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form id="scaffolding" action="{{route('scaffolding.store')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <input type="hidden" name="designer_company_email"
                        value="{{$tempdata->designer_company_email ?? ''}}" readonly>
                    <div class="row">
                        <div class="col">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <label class="fs-6 fw-bold mb-2" style="bottom: 30px; z-index:1">
                                    <span class="required">Select Project:</span>
                                </label>
                                <select name="project_id" id="projects"
                                    class="form-select form-select-lg form-select-solid" data-control="select2"
                                    data-placeholder="Select an option" data-allow-clear="true" readonly>
                                    <option value="">Select Option</option>
                                    <option value="{{$project->id}}" selected="selected">{{$project->name .' - '.
                                        $project->no}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        Date:
                                    </label>
                                    <input type="date" value="{{ date('Y-m-d') }}"
                                        class="form-control form-control-solid" placeholder="Date"
                                        style="background-color:#f5f8fa;" name="date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project No :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="000" id="no" name="projno" value="{{$project->no}}"
                                        readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Permit No :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Permit No"
                                        name="permit_no" value="{{$twc_id_no}}" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project Name :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname" value="{{$project->name}}"
                                        readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Drawing Title :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Drawing Title" id="drawing_title" name="drawing_title"
                                        value="{{old('drawing_title', $latestuploadfile->drawing_title ?? '')}}"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Drawing No:</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Drawing Number" id="drawing_no" name="drawing_no"
                                        value="{{old('drawing_no', $latestuploadfile->drawing_number ?? '')}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required"> TWS or Scaffolder Name:</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWS Name"
                                        id="tws_name" name="tws_name" value="{{old('tws_name',auth()->user()->name)}}"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name"
                                        id="twc_name" name="twc_name" value="{{old('twc_name',$tempdata->twc_name)}}"
                                        required>
                                    <input type="hidden" name="twc_email" value="{{$tempdata->twc_email ?? ''}}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span> MS/RA Number:</span>
                                    </label>
                                    <input type="text" style="width:100%" class="form-control form-control-solid"
                                        placeholder="MS/RA Number" id="ms_ra_no" name="ms_ra_no"
                                        value="{{old('ms_ra_no')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Load Class:</span>
                                    </label>
                                    <select name="loadclass" id="loadclass"
                                        class="form-select form-select-lg form-select-solid" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true" readonly>
                                        <option value="">Select Option</option>
                                        <option value="1">Service Class 1 - 0.75 kN/m2 – Inspection and very light duty
                                            access</option>
                                        <option value="2">Service Class 2 - 1.50 kN/m2 – Light duty such as painting and
                                            cleaning</option>
                                        <option value="3">Service Class 3 - 2.00 kN/m2 – General building work,
                                            brickwork, etc.</option>
                                        <option value="4">Service Class 4 - 3.00 kN/m2 – Heavy duty such as masonry and
                                            heavy cladding</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        Location of the temporary works:
                                    </label>
                                    <textarea name="location_temp_work" rows="2" class="form-control" style="width:100%"
                                        placeholder=" Location of the temporary works">{{old('location_temp_work')}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        Description of structure:
                                    </label>
                                    <textarea name="description_structure" rows="2" class="form-control"
                                        style="width:100%"
                                        placeholder="Description of structure:">{{old('description_structure')}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mt-20">
                                <div class="mb-5">
                                    <div class="d-flex justify-content-between"
                                        style="align-items: center; margin-bottom:5px">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold">
                                            <span class="required">Equipment & materials used as specified & fit for
                                                purpose</span>
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid" style="height: 50px;">
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="equipment_materials"
                                                    value="1" checked />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="equipment_materials"
                                                    value="2" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                                <!--   <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span> -->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Radio group-->
                                    <div style=" position: relative;">
                                        <!-- <h3 style="position: absolute; top:-10px; left: 8px; background:white; padding: 0 9px;">Comments</h3> -->
                                        <textarea name="equipment_materials_desc" rows="2" style="width:100%;"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="d-flex justify-content-between"
                                        style="align-items: center; margin-bottom:5px">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold">
                                            <span class="required">Workmanship checked </span>
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid" style="height: 50px;">
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="workmanship" value="1"
                                                    checked />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="workmanship" value="2" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                                <!-- <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span> -->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                    </div>
                                    <!--end::Radio group-->
                                    <div>
                                        <textarea name="workmanship_desc" rows="2" style="width:100%;"
                                            class="form-control"></textarea>
                                    </div>


                                </div>

                                <div class="mb-5">
                                    <div class="d-flex justify-content-between"
                                        style="align-items: center; margin-bottom:5px">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold ">
                                            <span class="required">TW checked against drawings / design output</span>
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid">
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="drawings_design" value="1"
                                                    checked />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="drawings_design"
                                                    value="2" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Radio group-->
                                    </div>

                                    <div style="">

                                        <textarea name="drawings_design_desc" rows="2" style="width:100%;"
                                            class="form-control"></textarea>

                                    </div>
                                </div>

                                <div class="mb-5">
                                    <!--begin::Label-->
                                    <div class="d-flex justify-content-between"
                                        style="align-items: center; margin-bottom:5px">
                                        <label class="fs-6 fw-bold">
                                            <span class="required">Loading / use limitations understood(e.g. sequence of
                                                loading, access/plant loading)</span>
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid">
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="loading_limit" value="1"
                                                    checked />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="loading_limit" value="2" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                    <div>
                                        <textarea name="loading_limit_desc" rows="2" style="width:100%;"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <p style="color: #000;">Inspect each of the following items & select PASS if installed
                                    correctly as per the design. Where actions are required, identify with a number &
                                    give details in the space provided.</p>

                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <label class="fs-6 fw-bold listTitle">
                                <span style="">Footings:</span>
                            </label>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Even, stable ground?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none form-control" name="even_stable_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div style="col-md-4">
                                    <input type="file" class="d-none form-control" name="even_stable_image"
                                        id="even_stable_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Base plates?</span>
                                </label>

                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="base_Plates_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="base_Plates_image"
                                        id="base_Plates_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Sole boards?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" checked
                                            value="3" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="sole_boards_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="sole_boards_image"
                                        id="sole_boards_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Undermined?</span>
                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">

                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="undermined_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="undermined_image"
                                        id="undermined_image">
                                </div>
                            </div>
                        </div>
                        <div classs="col-12">
                            <div class="d-flex ">
                                <label class="fs-6 fw-bold listTitle">
                                    Standards:
                                </label>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Plumb?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">

                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="Plumb_comment" rows="2" cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="Plumb_image" id="Plumb_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Staggered joints?</span>
                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="staggered_joints_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="staggered_joints_image"
                                        id="staggered_joints_image">
                                </div>
                            </div>

                            <div class="d-flex  ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Wrong spacing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="wrong_spacing_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="wrong_spacing_image"
                                        id="wrong_spacing_image">
                                </div>


                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Damaged?</span>

                                </label>

                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="damaged_comment" rows="2"
                                        cols="90"></textarea>

                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="damaged_image"
                                        id="damaged_image">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <label class="fs-6 fw-bold listTitle">
                                    Boards:
                                </label>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Trap boards?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="trap_boards_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="trap_boards_image"
                                        id="trap_boards_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Incomplete boarding?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div classs="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="incomplete_boarding_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div classs="col-md-4">
                                    <input type="file" class="d-none form-control" name="incomplete_boarding_image"
                                        id="incomplete_boarding_image">
                                </div>
                            </div>

                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Insufficient supports / ties?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="supports_ties_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="supports_ties_image"
                                        id="supports_ties_image">
                                </div>
                            </div>
                            <div class="d-flex ">
                                <label class="listTitle">
                                    Ladders:
                                </label>
                            </div>
                            <div class="d-flex  ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Insufficient length?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="insufficient_length_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="insufficient_length_image"
                                        id="insufficient_length_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Any missing or loose?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="missing_loose_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="missing_loose_image"
                                        id="missing_loose_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Wrong fittings?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="wrong_fittings_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="wrong_fittings_image"
                                        id="wrong_fittings_image">
                                </div>
                            </div>
                            <div class="d-flex ">
                                <label class="listTitle">
                                    Ledges:
                                </label>
                            </div>
                            <div class="d-flex  ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Not level?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="not_level_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="not_level_image"
                                        id="not_level_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Joined in same bays?</span>
                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="joined_same_bays_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="joined_same_bays_image"
                                        id="joined_same_bays_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Loose or damaged?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="loose_damaged_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="loose_damaged_image"
                                        id="loose_damaged_image">
                                </div>

                            </div>
                            <div class="d-flex">
                                <label class="listTitle">
                                    Guard Rails:
                                </label>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Wrong height?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="wrong_height_comment" rows="2"
                                        cols="90"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="wrong_height_image"
                                        id="wrong_height_image">
                                </div>

                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Any missing or loose?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="some_missing_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="some_missing_image"
                                        id="some_missing_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Damaged?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="GuardRails_radio" value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="GuardRails_radio" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="GuardRails_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="GuardRails_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="GuardRails_image"
                                        id="GuardRails_image">
                                </div>
                            </div>
                            <!-- coupling & tiles -->
                            <div class="d-flex">
                                <label class="listTitle">
                                    Couplings:
                                </label>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Wrong fittings?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_wrongfitting_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_wrongfitting_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_wrongfitting_radio"
                                            value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea class="d-none form-control" style="width: 80%; margin: auto"
                                        name="coupling_wrongfitting_comment" rows="2"
                                        placeholder="Please Enter Comments" cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="coupling_wrongfitting_image"
                                        id="coupling_wrongfitting_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Any Missing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_somemissing_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_somemissing_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_somemissing_radio"
                                            value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="coupling_somemissing_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="coupling_somemissing_image"
                                        id="coupling_somemissing_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Loose or damaged?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_loosedamaged_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_loosedamaged_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_loosedamaged_radio"
                                            value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="coupling_loosedamaged_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="coupling_loosedamaged_image"
                                        id="coupling_loosedamaged_image">
                                </div>
                            </div>

                            <!-- Bracing Facades -->
                            <div class="d-flex">
                                <label class="listTitle">
                                    Bracing:
                                </label>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Wrong fittings?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_wrongfitting_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_wrongfitting_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_wrongfitting_radio"
                                            value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="bracing_wrongfitting_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="bracing_wrongfitting_image"
                                        id="bracing_wrongfitting_image">
                                </div>
                            </div>
                            <div class="d-flex  ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Any Missing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_somemissing_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_somemissing_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_somemissing_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="bracing_somemissing_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none  form-control" name="bracing_somemissing_image"
                                        id="bracing_somemissing_image">
                                </div>
                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Loose or damaged?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_loosedamaged_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_loosedamaged_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_loosedamaged_radio"
                                            value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="bracing_loosedamaged_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="bracing_loosedamaged_image"
                                        id="bracing_loosedamaged_image">
                                </div>
                            </div>
                            <div class="d-flex fw-bold">
                                <label class="listTitle">
                                    Debris Netting:
                                </label>
                            </div>
                            <!-- Debrings Netting -->
                            <div class="d-flex  ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Partially removed?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio" value="3"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="partially_removed_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="partially_removed_image"
                                        id="partially_removed_image">
                                </div>


                            </div>
                            <div class="d-flex ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Any Missing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="debrings_somemissing_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="debrings_somemissing_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="debrings_somemissing_radio"
                                            value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="debrings_somemissing_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="debrings_somemissing_image"
                                        id="debrings_somemissing_image">
                                </div>


                            </div>
                            <div class="d-flex  ipadnewline">
                                <!--begin::Label-->
                                <label class="col-md-2">
                                    <span class="required">Loose/ damaged or broken?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="col-md-2">
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio"
                                            value="1" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio"
                                            value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio"
                                            value="3" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div class="col-md-4">
                                    <textarea style="width: 80%; margin: auto" placeholder="Please Enter Comments"
                                        class="d-none  form-control" name="loose_damaged_broken_comment" rows="2"
                                        cols="90"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="d-none form-control" name="loose_damaged_broken_image"
                                        id="loose_damaged_broken_image">
                                </div>
                            </div>
                            <div class=" ipadnewline" style="height:auto !important;">
                                <div class="d-flex justify-content-between">
                                    <!--begin::Label-->
                                    <label class="fs-3 fw-bold" style="width: 100%">
                                        <span class="required">
                                            <h5 style="display: inline-block">Any other actions necessary not listed
                                                above? </h5>
                                        </span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="d-flex justify-content-between" style="">
                                        <label style="">
                                            <input type="radio" class="btn-check" name="other_radio" value="1" />
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary2 p-4">Yes</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label style="width: auto">
                                            <input type="radio" class="btn-check" name="other_radio" value="2"
                                                checked />
                                            <span
                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary p-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                </div>

                                <!-- <div style="margin-left: 10px; text-align:center;">
                                    <input type="file" class="d-none form-control" name="other_image" id="other_image">
                                </div> -->
                            </div>
                            <div class="">
                                <!-- <table style="width:100%">

                                <tr>

                                    <td style="width:10%;border-right:1px solid black"></td>
                                    <td style="width:50%">COMMENTS/ACTIONS </td>
                                    <td style="width:40%;width:10%;border-left:2px solid black;"></td>
                                </tr>


                                <tr>

                                    <td style="width:10%">NO.</td>
                                    <td style="width:50%">COMMENTS/ACTIONS REQUIRES</td>
                                    <td style="width:40%">DATE COMPLETED</td>
                                </tr>

                                <tr>
                                    <td><input type="text" name="no[]" class="form-control" /></td>
                                    <td><input type="text" name="desc_actions[]" class="form-control" /></td>
                                    <td><input type="date" name="action_date[]" class="form-control" /></td>
                                </tr>

                                <tr>
                                    <td><input type="tno[]ext" name="no[]" class="form-control" /></td>
                                    <td><input type="text" name="desc_actions[]" class="form-control" /></td>
                                    <td><input type="date" name="action_date[]" class="form-control" /></td>
                                </tr>


                                <tr>
                                    <td><input type="text" name="no[]" class="form-control" /></td>
                                    <td><input type="text" name="desc_actions[]" class="form-control" /></td>
                                    <td><input type="date" name="action_date[]" class="form-control" /></td>
                                </tr>


                                <tr>
                                    <td><input type="text" name="no[]" class="form-control" /></td>
                                    <td><input type="text" name="desc_actions[]" class="form-control" /></td>
                                    <td><input type="date" name="action_date[]" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="no[]" class="form-control" /></td>
                                    <td><input type="text" name="desc_actions[]" class="form-control" /></td>
                                    <td><input type="date" name="action_date[]" class="form-control" /></td>
                                </tr>


                                <tr>
                                    <td><input type="text" name="no[]" class="form-control" /></td>
                                    <td><input type="text" name="desc_actions[]" class="form-control" /></td>
                                    <td><input type="date" name="action_date[]" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="no[]" class="form-control" /></td>
                                    <td><input type="text" name="desc_actions[]" class="form-control" /></td>
                                    <td><input type="date" name="action_date[]" class="form-control" /></td>
                                </tr>
                            </table>
                            <p>To undestand the example better, we have added borders to the table.</p> -->
                            </div>
                        </div>
                        <div class="row" style="margin:20px 0">
                            <div class="col-md-12">
                                <div class="zeromargin" style="margin-top: 8px; ">
                                    <textarea class="d-none  form-control" placeholder="Please Specify"
                                        name="other_comment" rows="2" cols="90"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="d-flex justify-content-between modalDiv">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            Scaff-tag signed and displayed?
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid ">
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="Scaff_tag_signed" value="1"
                                                    checked />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="Scaff_tag_signed"
                                                    value="2" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex ">
                                    <div class="d-flex justify-content-between modalDiv">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            Are you competent to carry out inspection?
                                        </label>
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid ">
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="carry_out_inspection"
                                                    value="1" checked />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="carry_out_inspection"
                                                    value="2" />
                                                <span
                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Inspected by:
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Inspected By" id="inspected_by" name="inspected_by"
                                            value="{{auth()->user()->name}}" required="required">

                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Job Title:
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Job Title" id="job_title" name="job_title"
                                            value="{{old('job_title',Auth::user()->job_title ?? '')}}"
                                            required="required">

                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Company:
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Company"
                                            id="company" name="company" value="{{$project->company->name ?? ''}}"
                                            required>
                                        <input type="hidden" class="form-control form-control-solid"
                                            placeholder="Company" id="company_id" name="companyid"
                                            value="{{$project->company->id ?? ''}}" readonly>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <div class="d-flex inputDiv ipadissue my-0" style="width:100%">
                                        <div class="d-flex modalDiv ipadissue">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                Date :
                                            </label>
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                                placeholder="Date" name="date">

                                        </div>
                                    </div>
                                </div>
                                <div class=" inputDiv">
                                    {{-- <label class="fs-6 fw-bold mb-2"
                                        style="bottom: 93px;background: white;z-index: 1;left: 7px;">
                                        Take upload photos or documents
                                    </label> --}}
                                    <div class="d-flex inputDiv principleno" id="signn" style="">
                                        <div class="uploadingDiv">
                                            <div class="uploadDiv">
                                                <div class="input-images"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row"> --}}

                                    {{--
                                </div> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" mb-1" style="border: none">
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
                                            <input type="hidden" id="Drawtype" name="Drawtype"
                                                class="form-control form-control-solid" value="2">
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
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content">PNG/JPG
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
                                        style="background: lightgray; border-radius:10px;max-width:300px;max-height: 152px"></canvas>
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
                            </div>
                            <div class="col-md-6" style="display: flex; justify-content:flex-end; align-items:flex-end">
                                <div class="">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-right: 22px; border-radius:5px">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                    <span >Name signature:</span>
                                </label>
                                
                                <input type="checkbox" id="flexCheckChecked" style="width: 12px;margin-top:5px">
                                <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="0">
                                <span style="padding-left:3px;color:#000">Do you want name signature?</span>
                            </div>
                            <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Name Signature:</span>
                                </label>
                                <input type="text" name="namesign" id="namesign2" class="form-control form-control-solid">
                            </div> -->

                        <!-- <div class="d-flex inputDiv" id="sign">
                                <label style="width:33%;" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Signature:</span>
                                </label>
                                <br />
                                <canvas id="sig"></canvas>
                                <br />

                            </div> -->






                        <!-- <div class="uploadDiv" style="padding-left: 10px;">
                        <div class="input-images"></div>
                        </div> -->
                    </div>

                    {{-- <div class="row"></div>
                    <div class="col-md-10"></div> --}}

                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!--end::Modal body-->
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/scaffolding.js')}}"></script>
<script type="text/javascript">
    // $("#flexCheckChecked").change(function() {
    //     if ($(this).is(':checked')) {
    //         $("#signtype").val(1);
    //         $("#namesign").addClass('d-flex').show();
    //         $("input[name='namesign']").attr('required', 'required');
    //         $("textarea[name='signed']").removeAttr('required');
    //         $("#clear").hide();
    //         $("#sign").removeClass('d-flex').hide();
    //          signaturePad.clear();

    //     } else {
    //         $("#signtype").val(0);
    //         $("#sign").addClass('d-flex').show();
    //         $("#namesign").removeClass('d-flex').hide();
    //         $("input[name='namesign']").removeAttr('required');
    //         $("textarea[name='signed']").attr('required');
    //         $("#clear").show();

    //     }
    // })
    $("#DrawCheck").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#flexCheckChecked").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
            //  $("#Drawtype").val(1);
            $("div#sign").removeClass('d-none').addClass('d-flex');
            $("div#pdfsign").removeClass('d-flex').addClass("d-none");
            $("#namesign").removeClass('d-flex').addClass("d-none");
            // $(".customSubmitButton").removeClass("hideBtn");
            // $(".customSubmitButton").addClass("showBtn");
            //  $("input[name='pdfsign']").removeAttr('required');
            // $("input[name='namesign']").attr('required','required');
            $("#clear").show();
            $("#sign").css('display','block');
            $("#sign").removeClass('d-none');

           
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
    $("#flexCheckChecked").change(function () {
        if ($(this).is(':checked')) {
            $("#pdfChecked").prop('checked', false);
            $("#DrawCheck").prop('checked', false);
            $("#signtype").val(1);
            $("#pdfsign").val(0);
            $('#Drawtype').val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("div#sign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
            $("#namesign").removeClass('d-none');
            $(".customSubmitButton").removeClass("hideBtn");
            $(".customSubmitButton").addClass("showBtn");
            $("input[name='pdfsign']").removeAttr('required');
            $("input[name='namesign']").attr('required', 'required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();

        } 
        // else {
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

    $("#pdfChecked").change(function () {

        if ($(this).is(':checked')) {
            $("#flexCheckChecked").prop('checked', false);
            $("#DrawCheck").prop('checked', false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $('#Drawtype').val(0);
            $("input[name='pdfsign']").attr('required', 'required');
            $("div#sign").removeClass('d-flex').addClass('d-none');
            $("div#pdfsign").removeClass('d-none').addClass('d-flex');
            $("div#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();

        } else {
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
    

    // alert
    var canvas = document.getElementById("sig");
    var signaturePad = new SignaturePad(canvas);
     signaturePad.addEventListener("endStroke", () => {
              $("#signature").val(signaturePad.toDataURL('image/png'));
            }, { once: true });
    // $("#submitbutton").on('click', function() {
        
    //     $("#scaffolding").submit();
    // });

    $('#drawing_no').change(function() {
        $('#drawing_no').css("background-color", "#f5f8fa ");
    });
    $('#twc_name').change(function() {
        $('#twc_name').css("background-color", "#f5f8fa ");
    });
    $('#drawing_title').change(function() {
        $('#drawing_title').css("background-color", "#f5f8fa ");
    });
    $('#tws_name').change(function() {
        $('#tws_name').css("background-color", "#f5f8fa ");
    });
    $('#ms_ra_no').change(function() {
        $('#ms_ra_no').css("background-color", "#f5f8fa ");
    });
    $('#inspected_by').change(function() {
        $('#inspected_by').css("background-color", "#f5f8fa ");
    });
    $('#job_title').change(function() {
        $('#job_title').css("background-color", "#f5f8fa ");
    });
    $('#company').change(function() {
        $('#company').css("background-color", "#f5f8fa ");
    });
    $('#namesign2').change(function() {
        $('#namesign2').css("background-color", "#f5f8fa ");
    });
    // $().click().addClass('d-none');
    

    // $(document).ready(function() {
    //     $('input[name="equipment_materials"]').on('change', function() {
    //         if ($(this).val() === '1') {
    //         $('textarea[name="equipment_materials_desc"]').css('display', 'block');
    //         } else {
    //         $('textarea[name="equipment_materials_desc"]').css('display', 'none');
    //         }
    //     });
        
    //     $('.btn-active-primary').on('click', function() {
    //         $('textarea[name="equipment_materials_desc"]').css('display', 'block');
    //         $('textarea[name="equipment_materials_desc"]').removeClass('d-none');
    //     });
    // });

    // $(document).ready(function() {
    //     $('input[name="workmanship"]').on('click', function() {
    //         console.log($(this).val())
    //         if ($(this).val() === '1') {
    //         $('textarea[name="workmanship_desc"]').removeClass('d-none');
    //         } 
    //         if($(this).val() === "2") $('textarea[name="workmanship_desc"]').addClass('d-none');
    //     });
    // });





</script>
@endsection