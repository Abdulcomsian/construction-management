@extends('layouts.dashboard.master',['title' => 'Permit To Load'])
@section('styles')
<style>
    <style>.aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60px !important;
    }

    .form-control.form-control-solid .content {
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
        border-collapse: separate;
        background-color: red;
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
    }

    .inputDiv select {
        width: 100%;
        background-color: #2B2727 !important;
        border-color: #2B2727 !important;
        color: #000 !important;
    }

    .inputDiv label {
        width: 50%;
        color: #000;
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

    #sig1 canvas {
        width: 100% !important;
        height: auto;
    }

    .modalDiv {
        width: 100%;
    }

    #table-body tr td {
        background-color: black;
        color: white;
    }

    .nav-group.nav-group-fluid {
        /* position: absolute; */
        right: 10px;
    }

    .image-uploader .upload-text span {
        color: white;
    }

    canvas {
        background: lightgray;
    }

    .uploaded {
        padding: 40px 0 !important;
    }

    .btn-check:checked+.btn.btn-active-primary2 {
        background: #FFBF00;
    }

    .inputDiv {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 5px 5px;
    }

    .inputDiv label {
        /* width: 40%; */
        color: #000;
        position: absolute;
        bottom: 31px;
        background: white;
        font-family: 'Inter', sans-serif;
        width: fit-content;
    }

    .form-control.form-control-solid {
        background-color: white !important;
        padding: 5px;
        border: none !important;
    }

    #kt_content_container textarea {
        border: none;
        height: 41px;
    }

    .nav-group {
        background: none;
    }

    .form-select.form-select-solid {
        background-color: white !important;
    }

    .signatureTitle {
        white-space: nowrap;
    }

    @media only screen and (max-width: 450px) {
        #sig1 {
            width: 200px;
        }

        #sig {
            width: 200px;
        }
    }

    @media only screen and (min-width:990px) {
        #kt_post {
            width: 75%;
        }
    }

    @media only screen and (max-width:768px) {
        #first_member .upload_signature_div {
            display: none !important;
        }
    }
</style>
</style>
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" />
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Permit to Load</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form id="permitrenew" class="from-prevent-multiple-submits" action="{{route('permit.save')}}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <input type="hidden" name="designer_company_email"
                        value="{{$tempdata->designer_company_email ?? ''}}" readonly>
                    <input type="hidden" name="design_requirement_text"
                        value="{{$tempdata->design_requirement_text ?? ''}}" readonly>
                    @if(isset($permitdata))
                    <input type="hidden" name="type" value="renew">
                    <input type="hidden" name="permitid" value="{{$permitdata->id}}">
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="d-flex inputDiv d-block mb-0">
                                <label class="fs-6 fw-bold mb-2" style="z-index: 1">
                                    <span class="required">Select Project:</span>
                                </label>
                                <select name="project_id" id="projects"
                                    class="form-select form-select-lg form-select-solid" data-control="select2"
                                    data-placeholder="Select an option" data-allow-clear="true" readonly>
                                    <option value="">Select Option</option>
                                    <option value="{{$project->id}}" selected="selected">
                                        {{$project->name .' - '. $project->no}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project No :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="000" id="no" name="projno" value="{{$project->no}}"
                                        readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project Name :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname" value="{{$project->name}}"
                                        readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Drawing Number:</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Drawing Number" id="drawing_no" name="drawing_no"
                                        value="{{$permitdata->drawing_no ?? ''}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        Date :
                                    </label>
                                    <input type="date" value="{{ date('Y-m-d') }}"
                                        class="form-control form-control-solid" placeholder="Date"
                                        style="background-color:#f5f8fa" name="date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name"
                                        name="twc_name" value="{{$permitdata->twc_name ?? ''}}">
                                    <input type="hidden" name="twc_email" value="{{$tempdata->twc_email ?? ''}}"
                                        readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Permit Number :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Permit No"
                                        name="permit_no" value="{{$twc_id_no}}" readonly="readonly" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Drawing Title :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Drawing Title" name="drawing_title"
                                        value="{{$permitdata->drawing_title ?? ''}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">TWS Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWS Name"
                                        name="tws_name" value="{{$permitdata->tws_name ?? ''}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">

                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">MS/RA Number</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="MS/RA Number" name="ms_ra_no"
                                        value="{{old('ms_ra_no',$permitdata->ms_ra_no ?? '')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="bottom: 42px">
                                        Location of the temporary works
                                    </label>
                                    <textarea class="form-control" name="location_temp_work" rows="2"
                                        style="width:100%;"
                                        placeholder=" Location of the temporary works">{{old('location_temp_work',$permitdata->location_temp_work ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="bottom: 42px">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea class="form-control" name="description_structure" rows="2"
                                        style="width:100%;"
                                        placeholder="Description of structure:">{{old('description_structure',$permitdata->description_structure ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center requiredDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Equipment & materials used as specified & fit for
                                        purpose</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="equipment_metrial" value="1"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="equipment_metrial" value="2"
                                            disabled readonly />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Workmanship checked (i.e. all props, ties, struts, joints,
                                        stop-ends, etc)</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Workmanship" value="1" checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Workmanship" value="2"
                                            disabled="disabled" readonly />
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
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">TW checked to drawings / design output</span>

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
                                        <input type="radio" class="btn-check" name="drawings_design" value="2" disabled
                                            readonly />
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
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Loading /use limitations understood e.g. Rate of pour,
                                        sequence of loading, access/plant loading</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loading_limitations" value="1"
                                            checked />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loading_limitations" value="2"
                                            disabled readonly />
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
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Approval by TWC required?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>

                                        <input type="radio" class="btn-check" name="works_coordinator" value="1"
                                            @if(isset($permitdata) &&
                                            $permitdata->works_coordinator==1){{'checked'}}@endif />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="works_coordinator" value="2"
                                            @if(isset($permitdata) &&
                                            $permitdata->works_coordinator==2){{'checked'}}@endif/>
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            @php
                            $display='display:none;';
                            if(isset($permitdata) && $permitdata->works_coordinator==1)
                            {
                            $display='display:block;';

                            }
                            @endphp
                            <div class="">
                                <div class="d-flex modalDiv">
                                    <textarea name="description_approval_temp_works" rows="2" class="form-control"
                                        style="{{$display}}; border: 1px solid lightgray; border-radius: 7px;">{{old('description_approval_temp_works',$permitdata->description_approval_temp_works)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- new work here -->
                            <div class="d-flex justify-content-between align-items-center requiredDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Add rate of rise?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="rate_rise" value="1"
                                            @if(isset($permitdata) && $permitdata->rate_rise==1){{'checked'}}@endif/>
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="rate_rise" value="2"
                                            @if(isset($permitdata) && $permitdata->rate_rise==2){{'checked'}}@endif />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            @php
                            $display='display:none;';
                            if(isset($permitdata) && $permitdata->rate_rise==1)
                            {
                            $display='display:block;';

                            }
                            @endphp
                            <div class="">
                                <div class="d-flex modalDiv">
                                    <textarea name="rate_rise_comment" rows="2" class="form-control"
                                        style="{{$display}};border: 1px solid lightgray; border-radius: 7px;">{{old('rate_rise_comment',$permitdata->rate_rise_comment)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Has the construction methodology changed?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>

                                        <input type="radio" class="btn-check" name="construction_methodology" value="1"
                                            @if(isset($permitdata) &&
                                            $permitdata->construction_methodology==1){{'checked'}}@endif />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="construction_methodology" value="2"
                                            @if(isset($permitdata) &&
                                            $permitdata->construction_methodology==2){{'checked'}}@endif/>
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            <div class="d-flex ">
                                <div class="d-flex modalDiv">
                                    <textarea name="construction_methodology_comment" rows="2" class="form-control"
                                        style="display: {{$permitdata->construction_methodology==1 ? 'block' : 'none';}}; border: 1px solid lightgray; border-radius: 7px;">{{old('construction_methodology_comment',$permitdata->construction_methodology_comment ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5 style="color: #000;font-weight: 600;font-size: 24px;margin-top: 15px;">Permit to Load /
                                Use</h5>
                            <br>
                            <ul style="color: #000;">

                                <li>
                                    I confirm that I have inspected this temporary structure and I am satisfied that it
                                    conforms to the criteria given above.
                                </li>
                                <li>I consider that the temporary structure is ready to be loaded and put into use.</li>
                                <li>I confirm that I am authorised to use a Permit to Load for this temporary structure.
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv upload_signature_div">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:16%">

                                </label>
                                <div class="d-flex inputDiv principleno" id="sign"
                                    style="width:100%; border: none; margin:auto">
                                    <div class="uploadingDiv">
                                        <div class="uploadDiv" style="padding-left: 10px;">
                                            <div class="input-images"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv" style="height: 41px; align-items:center; gap: 17px">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>Approval:</span>
                                </label>
                                <!--end::Label-->
                                <input type="checkbox" name="approval" id="approval"
                                    style="width: 12px;margin-top:5px; margin-left: 12px">
                                <span class="tickboxalign" style="padding-left:3px;color:#000">Select if
                                    required.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none inputDiv pc-twc">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>PC TWC Email:</span>
                                </label>
                                <!--end::Label-->
                                <input type="email" class="form-control form-control-solid" name="pc_twc_email"
                                    id="pc-twc-email" placeholder="PC TWC Email" value="{{old('pc-twc-email')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Other approval required?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="principle_contractor" value="1"
                                            @if(isset($permitdata) &&
                                            $permitdata->principle_contractor==1){{'checked'}}@endif />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="principle_contractor" value="2"
                                            @if(isset($permitdata) &&
                                            $permitdata->principle_contractor==2){{'checked'}}@endif/>
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" id="second_member">
                                <div class="col" style="flex:100% !important;">

                                    {{-- <div class="d-flex inputDiv">
                                    </div> --}}
                                    <div class="d-flex inputDiv principleno">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name::</span>
                                        </label>
                                        <!--end::Label-->
                                        <div class="input">
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Name" id="name2" name="name"
                                                value="{{$permitdata->name ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="d-flex inputDiv principleno">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Job Title:</span>
                                        </label>
                                        <!--end::Label-->
                                        <div class="input">
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Job Title" id="job_title" name="job_title"
                                                value="{{$permitdata->job_title ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="d-flex inputDiv ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Company: </span>
                                        </label>
                                        <!--end::Label-->
                                        <div class="input">
                                            <input type="text" id="companyadmin" class="form-control form-control-solid"
                                                placeholder="Company" name="company"
                                                value="{{$project->company->name ?? ''}}" readonly="readonly">
                                            <input type="hidden" id="companyid" class="form-control form-control-solid"
                                                placeholder="Company" name="companyid"
                                                value="{{$project->company->id ?? ''}}" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="d-flex inputDiv ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                            <span class="required">Date:</span>
                                        </label>
                                        <!--end::Label-->
                                        <div class="input">
                                            <input type="date" style="background-color:#f5f8fa"
                                                value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
                                        </div>
                                    </div>

                                </div>

                                <div class="col">
                                    <!-- Approval div -->

                                    <!-- <div class="d-flex inputDiv" style="">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                                <span>Name/signature:</span>
                                            </label>
                                            <input type="checkbox" id="flexCheckChecked" style="width: 12px;margin-top:5px">
                                            <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="0">
                                            <span class="tickboxalign" style="padding-left:3px;color:#000">Do you want name signature?</span>
                                        </div>
                                        <div class="d-flex inputDiv" id="namesign" style="display: none !important;">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name Signature:</span>
                                            </label>
                                            <input type="text" name="namesign" id="namesign_id" class="form-control form-control-solid">
                                        </div> -->

                                    <div class="d-flex inputDiv" style="border: none">
                                        <label class="fs-6 fw-bold mb-2"
                                            style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                            <span class="signatureTitle">Signature
                                                Type:</span>
                                        </label>
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="checkbox-field" id="DrawCheck" checked=true
                                                style="width: 12px;">
                                            <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
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
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content; white-space: nowrap;">PNG/JPG
                                                Upload </span>
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
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Upload Signature:<br>Allowed format (PNG,
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
                                    {{--
                                    <!--  <div class="d-flex inputDiv">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:17%">
                                            <span>Type Signature:</span>
                                        </label>
                                        
                                        <input type="checkbox" class="" id="flexCheckChecked"
                                            style="width: 12px;margin-top:5px">
                                        <input type="hidden" id="signtype" name="signtype"
                                            class="form-control form-control-solid" value="2">
                                        <span style="padding-left:3px;color:#000;font-size:10px;line-height: 2">name
                                            signature?</span>
                                        &nbsp;
                                      
                                        <input type="checkbox" class="" id="pdfChecked"
                                            style="width: 12px;margin-top:5px">
                                        <input type="hidden" id="pdfsign" name="pdfsigntype"
                                            class="form-control form-control-solid" value="0">
                                        <span style="padding-left:3px;color:#000;font-size:10px;line-height: 2;">Pdf
                                            signature?</span>

                                    </div>
                                    <div class="inputDiv d-none" id="pdfsign">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Upload Signature:<br>Allowed format (PNG,
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
                                    <div class="d-flex inputDiv" id="namesign" style="display: none !important;">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name Signature:</span>
                                        </label>
                                        <input type="text" name="namesign" id="namesign_id"
                                            class="form-control form-control-solid">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-flex inputDiv principleno" id="sign" style="">
                                                <div class="signatureDiv">
                                                    <label style="width:26%;"
                                                        class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Signature:</span>
                                                    </label>
                                                    <br />
                                                    <canvas id="sig"></canvas>
                                                </div>
                                            </div>
                                        </div> -->
                                    <!-- <div class="col-md-4">
                                                <div class="d-flex inputDiv principleno" id="sign" style="">
                                                    <div class="uploadingDiv">
                                                    <div class="uploadDiv" style="padding-left: 10px;">
                                                            <div class="input-images"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                </div>
                                <!-- <div class="d-flex inputDiv principleno" id="sign" style="">
                                        <textarea id="signature" name="signed" style="opacity: 0"></textarea>
                                    </div>  -->
                                --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @php
                        $display='display:none;';
                        if(isset($permitdata) && $permitdata->principle_contractor==1)
                        {
                        $display='display:block;';
                        }
                        @endphp
                        <div id="first_member" style="{{$display}}">
                            <div class="col" style="flex:100% !important;">

                                {{-- <div class="d-flex inputDiv d-block">
                                </div> --}}
                                {{-- <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name::</span>
                                    </label>
                                    <!--end::Label-->

                                </div>
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job Title:</span>
                                    </label>
                                    <!--end::Label-->

                                </div> --}}
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name::</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input">
                                        <input type="text" class="form-control form-control-solid" placeholder="Name"
                                            id="name2" name="name1" value="{{$permitdata->name1 ?? ''}}">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job Title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input">
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Job Title" id="job_title" name="job_title1"
                                            value="{{$permitdata->job_title1 ?? ''}}">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv ">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input">
                                        <input type="text" id="companyadmin" class="form-control form-control-solid"
                                            placeholder="Company" name="company"
                                            value="{{$project->company->name ?? ''}}" readonly="readonly">
                                        <input type="hidden" id="companyid" class="form-control form-control-solid"
                                            placeholder="Company" name="companyid"
                                            value="{{$project->company->id ?? ''}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv ">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input">
                                        <input type="date" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}"
                                            class="form-control form-control-solid">
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="col">
                                <div class="d-flex inputDiv" style="">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                        style="width:33% !important">
                                        <span>Name/signature:</span>
                                    </label>
                                    <input type="checkbox" id="flexCheckChecked1" style="width: 12px;margin-top:5px">
                                    <input type="hidden" id="signtype1" name="signtype1"
                                        class="form-control form-control-solid" value="0">
                                    <span class="tickboxalign" style="padding-left:3px;color:#000">Do you want
                                        name signature?</span>
                                </div>
                                <div class="d-flex inputDiv" id="namesign1" style="display: none !important;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign1" id="namesign_id2"
                                        class="form-control form-control-solid">
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign1" style="">
                                    <label style="width:33%" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Signature:</span>
                                    </label>
                                    <br />
                                    <canvas id="sig1"></canvas>
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign1" style="">
                                    <textarea id="signature1" name="signed1" style="opacity: 0"></textarea>
                                </div>
                            </div> --}}
                            <div class="d-flex inputDiv" style="border: none">
                                <label class="fs-6 fw-bold mb-2"
                                    style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                    <span class="signatureTitle">Signature Type:</span>
                                </label>
                                <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true
                                        style="width: 12px;">
                                    <!-- <input type="hidden" id="Drawtype" name="Drawtype" cl
                                            ass="form-control form-control-solid" value="2"> -->
                                    <span
                                        style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                </div>
                                <!--end::Label-->
                                <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="" id="flexCheckChecked1" style="width: 12px;">
                                    <input type="hidden" id="signtype1" name="signtype1"
                                        class="form-control form-control-solid" value="2">
                                    <span
                                        style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Name</span>
                                </div>
                                &nbsp;
                                <!--end::Label-->
                                {{-- <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="" id="pdfChecked1" style="width: 12px;">
                                    <input type="hidden" id="pdfsign1" name="pdfsign1"
                                        class="form-control form-control-solid" value="0">
                                    <span
                                        style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content">PNG/JPG
                                        Upload </span>
                                </div> --}}

                            </div>
                            <div class="col-md-12">
                                {{-- <div class="d-flex inputDiv" style="">
                                    <label class="fs-6 fw-bold mb-2" style="">
                                        <span>Name/signature:</span>
                                    </label>
                                    <input type="checkbox" id="flexCheckChecked1" style="width: 12px;margin-top:5px">
                                    <input type="hidden" id="signtype1" name="signtype1"
                                        class="form-control form-control-solid" value="0">
                                    <span class="tickboxalign" style="padding-left:3px;color:#000">Do you want
                                        name signature?</span>
                                </div> --}}
                                <div class="d-flex inputDiv" id="namesign1" style="display: none !important;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign1" id="namesign_id2"
                                        class="form-control form-control-solid">
                                </div>

                                <div class="d-flex inputDiv principleno" id="sign1" style="border:none !important;">
                                    {{-- <label style="width:33%" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Signature:</span>
                                    </label> --}}
                                    {{-- <br /> --}}
                                    <canvas id="sig1" style="border-radius: 9px"></canvas>
                                    <span id="clear1" class="fa fa-undo cursor-pointer"
                                        style="line-height: 6; position:relative; top:51px; right:26px"></span>
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign1" style=" display: none !important">
                                    <textarea id="signature1" name="signed1" style="opacity: 0"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <button id="submitbutton" type="submit"
                        class="btn btn-primary from-prevent-multiple-submits">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        $("#flexCheckChecked1").change(function () {
                if ($(this).is(':checked')) {
                    $("#DrawCheck1").prop('checked',false);
                    $("#signtype1").val(1);
                    $("#namesign1").addClass('d-flex').show();
                    $("#namesign1").removeClass('d-none');
                    $("#namesign1").css('display', 'block');
                    $("input[name='namesign1']").attr('required', 'required');
                    $("#signature1").removeAttr('required', 'required');
                    $("#clear1").hide();
                    $("#sign1").removeClass('d-flex').hide();

                } else {
                    $("#signtype1").val(0);
                    $("#sign1").addClass('d-flex').show();
                    $("#namesign1").removeClass('d-flex').hide();
                    $("input[name='namesign1']").removeAttr('required');
                    $("#signature1").attr('required', 'required');
                    $("#clear1").show();
                }
            })


            // $("#flexCheckChecked").change(function() {
            //     if ($(this).is(':checked')) {
            //         $("#signtype").val(1);
            //         $("#namesign").addClass('d-flex').show();
            //         $("input[name='namesign']").attr('required', 'required');
            //         $("#signature").removeAttr('required');
            //         $("#sign").removeClass('d-flex').hide();

            //     } else {
            //         $("#signtype").val(0);
            //         $("#sign").addClass('d-flex').show();
            //         $("#namesign").removeClass('d-flex').hide();
            //         $("input[name='namesign']").removeAttr('required');
            //         $("#signature").attr('required', 'required');
            //     }
            // })

            $("#flexCheckChecked").change(function () {
                if ($(this).is(':checked')) {
                    $("#pdfChecked").prop('checked', false);
                    $("#DrawCheck").prop('checked', false);
                    $("#signtype").val(1);
                    $("#pdfsign").val(0);
                    $("div#pdfsign").removeClass('d-flex').addClass('d-none');
                    $("div#sign").removeClass('d-flex').addClass('d-none');
                    $("div#namesign").removeClass('d-none').addClass('d-flex').show();
                    $("div#namesign").css('display', 'block');
                    $(".customSubmitButton").removeClass("hideBtn");
                    $(".customSubmitButton").addClass("showBtn");
                    $("input[name='pdfsign']").removeAttr('required');
                    $("input[name='namesign']").attr('required', 'required');
                    $("#clear").hide();
                    $("#sign").removeClass('d-flex').hide();

                } else {
                    $("#signtype").val(2);
                    $("#sign").addClass('d-flex').show();
                    $("#namesign").removeClass('d-flex').hide();
                    $("input[name='namesign']").removeAttr('required');
                    $("#clear").show();
                    $(".customSubmitButton").addClass("hideBtn");
                    $(".customSubmitButton").removeClass("showBtn");
                }
            })

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
                    $("#namesign").removeClass('d-flex').addClass("d-none");
                    $("div#sign").css('display','flex');
                    $("div#sign").removeClass('d-none');
                
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

            $('#clear').click(function(e) {
                e.preventDefault();
                signaturePad.clear();
                $("#signature").val('');
            });
            $('#clear1').click(function(e) {
                e.preventDefault();
                signaturePad1.clear();
                $("#signature1").val('');
            });
            $("#DrawCheck1").change(function(){
                if($(this).is(':checked'))
                {
                    $("#pdfChecked1").prop('checked',false);
                    $("#flexCheckChecked1").prop('checked',false);
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
                    $("div#pdfsign1").removeClass('d-flex').addClass("d-none");
                    $("div#namesign1").removeClass('d-flex').addClass("d-none");
                    $("#sign1").css('display','block');
                    $("#sign1").removeClass('d-none');
                
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

            $("#pdfChecked").change(function () {

                if ($(this).is(':checked')) {
                    $("#flexCheckChecked").prop('checked', false);
                    $("#pdfsign").val(1);
                    $("#signtype").val(0);
                    $("input[name='pdfsign']").attr('required', 'required');
                    $("div#pdfsign").removeClass('d-none').addClass('d-flex');
                    $("#namesign").removeClass('d-flex').hide();
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

            var principle_contractor = '{{old('
            principle_contractor ')}}';
            if (principle_contractor == 2) {
                $("#first_member").hide();
            }
            $("input[name='principle_contractor']").change(function () {
                if ($(this).val() == 1) {

                    $("#first_member").show();
                    $("input[name='name1']").attr('required', 'required');
                    $("input[name='job_title1']").attr('required', 'required');

                } else {
                    $("#first_member").hide();
                    $("input[name='name1']").removeAttr('required');
                    $("input[name='job_title1']").removeAttr('required');

                }
            })


            $("input[name='works_coordinator']").change(function () {
                if ($(this).val() == 1) {
                    $("textarea[name='description_approval_temp_works']").show();
                } else {
                    $("textarea[name='description_approval_temp_works']").hide();

                }
            })

            $("input[name='rate_rise']").change(function () {
                if ($(this).val() == 1) {
                    $("textarea[name='rate_rise_comment']").show();
                } else {
                    $("textarea[name='rate_rise_comment']").hide();

                }
            })

            $("input[name='construction_methodology']").change(function () {
                if ($(this).val() == 1) {
                    $("textarea[name='construction_methodology_comment']").show();
                } else {
                    $("textarea[name='construction_methodology_comment']").hide();

                }
            })

            $('#drawing_no').change(function () {
                $('#drawing_no').css("background-color", "#f5f8fa ");
            });
            $('#drawing_title').change(function () {
                $('#drawing_title').css("background-color", "#f5f8fa ");
            });
            $('#drawing_no').change(function () {
                $('#drawing_no').css("background-color", "#f5f8fa ");
            });
            $('#twc_name').change(function () {
                $('#twc_name').css("background-color", "#f5f8fa ");
            });
            $('#tws_name').change(function () {
                $('#tws_name').css("background-color", "#f5f8fa ");
            });
            $('#ms_ra_no').change(function () {
                $('#ms_ra_no').css("background-color", "#f5f8fa ");
            });
            $('#name1').change(function () {
                $('#name1').css("background-color", "#f5f8fa ");
            });
            $('#job_title1').change(function () {
                $('#job_title1').css("background-color", "#f5f8fa ");
            });
            $('#name2').change(function () {
                $('#name2').css("background-color", "#f5f8fa ");
            });
            $('#job_title').change(function () {
                $('#job_title').css("background-color", "#f5f8fa ");
            });
            $('#namesign_id').change(function () {
                $('#namesign_id').css("background-color", "#f5f8fa ");
            });
            $('#namesign_id2').change(function () {
                $('#namesign_id2').css("background-color", "#f5f8fa ");
            });


            //click submit button
            var canvas = document.getElementById("sig");
            var signaturePad = new SignaturePad(canvas);
            var canvas1 = document.getElementById("sig1");
            // let signaturePad1 = new SignaturePad(canvas1);
            if (canvas) {
                var signaturePad = new SignaturePad(canvas);
            }
            if (canvas1) {
                var signaturePad1 = new SignaturePad(canvas1);
            }
            signaturePad.addEventListener("endStroke", () => {
                $("#signature").val(signaturePad.toDataURL('image/png'));
            }, {
                once: true
            });

            signaturePad1.addEventListener("endStroke", () => {
                $("#signature1").val(signaturePad1.toDataURL('image/png'));
            }, {
                once: true
            });


            (function(){
                $('.from-prevent-multiple-submits').on('submit', function(){
                    $('.from-prevent-multiple-submits').attr('disabled','true');
                })
            })();

            // $("#submitbutton").on('click',function(){
            //      $("#signature").val(signaturePad.toDataURL('image/png'));
            //      if(canvas1)
            //      {
            //         console.log("hello");
            //         $("#signature1").val(signaturePad1.toDataURL('image/png'));
            //      }
            //      $("#permitrenew").submit();
            // })

            //approval checkbox checkded
            $("#approval").change(function () {
                if ($(this).is(':checked')) {
                    $(".pc-twc").removeClass('d-none').addClass('d-flex');
                    $("#pc-twc-email").attr('required', 'required');
                } else {
                    $(".pc-twc").removeClass('d-flex').addClass('d-none');
                    $("#pc-twc-email").removeAttr('required');
                }
            })

    </script>
    @endsection