@extends('layouts.dashboard.master',['title' => 'Permit To Load'])
@section('styles')
<style>
    .aside-enabled.aside-fixed.header-fixed .header {
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
        background: white;
    }

    .inputDiv input,
    .inputDiv textarea,
    .form-select.form-select-solid {
        height: 34px !important;
    }

    .inputDiv textarea {
        border: none;
    }

    .inputDiv select {
        width: 100%;
        background-color: #2B2727 !important;
        border-color: #2B2727 !important;
        color: #000 !important;
    }

    .inputDiv label {
        position: absolute;
        width: fit-content;
        color: #000;
        bottom: 31px;
        background-color: white;
    }

    .inputDiv {
        margin: 20px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 5px 5px;
    }

    .form-control.form-control-solid {
        background-color: white !important;
        padding: 5px;
        border: none !important;
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

    .permit-edit li {
        margin-bottom: 10px;
        color: #121826;
        font-size: 14px;
        font-weight: 400;
    }

    #second_member input,
    #first_member input {
        border: none !important;
    }

    .nav-group {
        background: none;
    }

    #prCon>label {
        position: initial !important;
    }

    @media only screen and (max-width: 450px) {
        #sig1 {
            width: 200px;
        }

        #sig {
            width: 200px;
        }
    }

    @media screen and (min-width: 992px) {
        #kt_post {
            width: 75%;
        }
    }
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
                    <h2>Edit Permit</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form id="permitrenew" action="{{route('permit.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <input type="hidden" name="designer_company_email"
                        value="{{$tempdata->designer_company_email ?? ''}}" readonly>
                    <input type="hidden" name="design_requirement_text"
                        value="{{$tempdata->design_requirement_text ?? ''}}" readonly="readonly">
                    @if(isset($permitdata))
                    <input type="hidden" name="type" value="renew">
                    <input type="hidden" name="permitid" value="{{$permitdata->id}}">
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="d-flex inputDiv d-block mb-0">
                                <label class=" fs-6 fw-bold mb-2">
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
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
                            <div class="d-flex inputDiv d-block mb-0">
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Drawing Number:</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Drawing Number" id="drawing_no"
                                        name="drawing_no" value="{{$permitdata->drawing_no ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
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
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Drawing Title :</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Drawing Title"
                                        name="drawing_title" value="{{$permitdata->drawing_title ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Permit Number :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Permit No"
                                        name="permit_no" value="{{$twc_id_no}}" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control " placeholder="TWC Name" name="twc_name"
                                        value="{{$permitdata->twc_name ?? ''}}">
                                    <input type="hidden" name="twc_email" value="{{$tempdata->twc_email ?? ''}}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">TWS Name :</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="TWS Name" name="tws_name"
                                        value="{{$permitdata->tws_name ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">MS/RA Number</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="MS/RA Number" name="ms_ra_no"
                                        value="{{$permitdata->ms_ra_no ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex inputDiv d-block mb-0">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2" style="bottom: 43px">
                                        Location of the temporary works
                                    </label>
                                    <textarea class="form-control" name="location_temp_work" rows="2"
                                        style="width:100%;"
                                        placeholder=" Location of the temporary works:">{{$permitdata->location_temp_work ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2" style="bottom: 43px">
                                        Description of structure:
                                    </label>
                                    <textarea class="form-control" name="description_structure" rows="2"
                                        style="width:100%;"
                                        placeholder="Description of structure:">{{$permitdata->description_structure ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class=" fs-6 fw-bold mb-2">
                                    <span class="required">Equipment/materials used as a specified/fit for
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
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class=" fs-6 fw-bold mb-2">
                                    <span class="required">Workmanship checked (i.e. all props, ties, struts, joints,
                                        stop-ends, checked)</span>

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
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">TW checked to drawings/design output</span>

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
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
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
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Approval by Temp Works Coordinator Required? <br>
                                        completed Other criteria specified (e.g. strength of supporting structure, any
                                        back propping,
                                        ground tests, anchor tests) are checked and satisfied (IF YES, SPECIFY
                                        BELOW)</span>

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
                            <div class="d-flex ">
                                <div class="d-flex modalDiv">
                                    @if(isset($permitdata) && $permitdata->works_coordinator==1)
                                    <textarea name="description_approval_temp_works" rows="2"
                                        style="border: 1px solid lightgray; border-radius: 8px; margin-bottom: 5px"
                                        class="form-control">{{$permitdata->description_approval_temp_works ?? ''}}</textarea>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- rate of rise work -->
                            <div class="d-flex justify-content-between">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Add rate of rise (IF YES, SPECIFY BELOW)</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>

                                        <input type="radio" class="btn-check" name="rate_rise" value="1"
                                            @if(isset($permitdata) && $permitdata->rate_rise==1){{'checked'}}@endif />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="rate_rise" value="2"
                                            @if(isset($permitdata) && $permitdata->rate_rise==2){{'checked'}}@endif/>
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            <div class="d-flex">
                                <div class="d-flex modalDiv">
                                    <textarea
                                        style="border: 1px solid lightgray; border-radius: 8px; margin-bottom: 5px"
                                        name="rate_rise_comment" rows="2"
                                        class="form-control {{$permitdata->rate_rise==1 ? 'd-flex' :'d-none'}}">{{$permitdata->rate_rise_comment ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
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
                            <div class="d-flex">
                                <div class="d-flex modalDiv">
                                    <textarea name="construction_methodology_comment" rows="2" class="form-control"
                                        style="display: {{$permitdata->construction_methodology==1 ? 'block' : 'none'; }}; border: 1px solid lightgray; border-radius: 8px; margin-bottom: 5px">{{old('construction_methodology_comment',$permitdata->construction_methodology_comment ?? '')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5 style="color: #000;font-weight: 600;font-size: 24px;margin-top: 15px;">Permit to
                                load/Use</h5>
                            <br>
                            <ul style="color: #000;" class="permit-edit">

                                <li>
                                    I confirm that I have inspected the above temporary structure and I
                                    am satisfied that it conforms to the above.
                                </li>
                                <li>
                                    I consider that the temporary structure is ready to be loaded and
                                    taken into use.
                                </li>
                                <li>
                                    I confirm that I am authorised to issue a Permit to Load for this
                                    temporary structure.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>Approval:</span>
                                </label>
                                <!--end::Label-->
                                <input type="checkbox" name="approval" id="approval" style="width: 12px;"
                                    {{$permitdata->pc_twc_email=='' ?
                                '':'checked'}}>
                                <span style="padding-left:16px;color:#000">Select if required.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputDiv {{$permitdata->pc_twc_email=='' ? 'd-none':'d-flex'}}  pc-twc">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>PC TWC Email:</span>
                                </label>
                                <!--end::Label-->
                                <input type="email" class="form-control" name="pc_twc_email" id="pc-twc-email"
                                    placeholder="PC TWC Email"
                                    value="{{old('pc_twc_email',$permitdata->pc_twc_email ?? '')}}"
                                    style="border: none;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv " id="sign" style="">
                                <div class="uploadingDiv">
                                    <div class="uploadDiv" style="padding-left: 10px;">
                                        <div class="input-images"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Principle Contractor approved required?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid" id="prCon">
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
                            <div class="row" id="second_member">
                                <div class="col" style="flex:100% !important;">
                                    {{-- <div class="d-flex inputDiv">
                                    </div> --}}
                                    <div class="d-flex inputDiv ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name::</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control" placeholder="Name" name="name"
                                            value="{{$permitdata->name ?? ''}}">
                                    </div>
                                    <div class="d-flex inputDiv ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Job title:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control" placeholder="Job title" name="job_title"
                                            value="{{$permitdata->job_title ?? ''}}">
                                    </div>
                                    <div class="d-flex inputDiv ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Company: </span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" id="companyadmin" class="form-control" placeholder="Company"
                                            name="company" value="{{$project->company->name ?? ''}}">
                                        <input type="hidden" id="companyid" class="form-control form-control-solid"
                                            placeholder="Company" name="companyid"
                                            value="{{$project->company->id ?? ''}}" readonly="readonly">
                                    </div>
                                    <div class="d-flex inputDiv ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                            <span class="required">Date:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control">
                                    </div>
                                    <!-- Approval div -->

                                </div>
                                {{-- <div class="col">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-flex inputDiv mt-0" id="sign" style="border: none;">
                                                <div class="signatureDiv">
                                                    <label style="width:33%;"
                                                        class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Signature:</span>
                                                    </label>
                                                    <br />
                                                    <canvas id="sig"></canvas>
                                                    <br />
                                                    <textarea id="signature" name="signed"
                                                        style="display: none"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div> --}}
                                <div class="col">
                                    <div class="d-flex inputDiv mt-0" style="border: none">
                                        <label class="fs-6 fw-bold mb-2"
                                            style="font-size: 600 !important; font-size: 16px !important">
                                            <span class="signatureTitle" style="white-space: nowrap">Signature
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
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content">PNG/JPG
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
                                    <!-- <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-flex inputDiv principleno mt-0" id="sign">
                                                <div class="signatureDiv">
                                                    <label style="width:24%;bottom:170px; background: white"
                                                        class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Signature:</span>
                                                    </label>
                                                    <br />
                                                    <div class="canva_signature_div" style="width: 76%">

                                                        <br>
                                                        <canvas id="sig" ></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-none">

                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="first_member">
                            @if(isset($permitdata) && $permitdata->principle_contractor==1)
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Name::</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" placeholder="Name" name="name1"
                                    value="{{$permitdata->name1 ?? ''}}">
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Job title:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control" placeholder="Job title" name="job_title1"
                                    value="{{$permitdata->job_title1 ?? ''}}">
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <input type="text" id="companyadmin" class="form-control" placeholder="Company"
                                    name="company" value="{{$project->company->name ?? ''}}">
                                <input type="hidden" id="companyid" class="form-control form-control-solid"
                                    placeholder="Company" name="companyid" value="{{$project->company->id ?? ''}}"
                                    readonly="readonly">
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                    <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control">
                            </div>
                            @endif
                            @if(isset($permitdata) && $permitdata->principle_contractor==1)

                            {{-- old code --}}
                            {{-- <div class="d-flex inputDiv principleno" id="sign1">
                                <label style="width:33%" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Signature:</span>
                                </label>
                                <br />
                                <canvas id="sig1"></canvas>
                                <br />
                                <textarea id="signature1" name="signed1" style="display: none"></textarea>
                            </div> --}}
                            {{-- old code end here --}}

                            <div class="d-flex inputDiv principleno" style="border: none">
                                <label class="fs-6 fw-bold mb-2"
                                    style="font-size: 600 !important; font-size: 16px !important">
                                    <span class="signatureTitle" style="white-space: nowrap">Signature Type:</span>
                                </label>
                                <div style="display:flex; align-items: center; padding-left:10px">
                                    <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true
                                        style="width: 12px;">
                                    <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
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


                            {{-- //old COde --}}

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
                                </div>
                                {{-- <div class="d-flex inputDiv principleno" id="sign1"
                                    style=" display: none !important">
                                    <textarea id="signature1" name="signed1" style="opacity: 0"></textarea>
                                </div> --}}
                            </div>
                            @endif
                        </div>
                    </div>



                    <div class="row mt-7">
                        <div class="col-md-12">

                            <!-- <div class="uploadDiv" style="padding-left: 10px;">
                               <div class="input-images"></div>
                             </div> -->
                            <button id="submitbutton" type="button" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endsection
        @section('scripts')
        <script>
            // $("#flexCheckChecked").change(function() {
            //     if ($(this).is(':checked')) {
            //         $("#signtype").val(1);
            //         $("#namesign").addClass('d-flex').show();
            //         $("#clear").hide();
            //         $("#sign").removeClass('d-flex').hide();

            //     } else {
            //         $("#signtype").val(0);
            //         $("#sign").addClass('d-flex').show();
            //         $("#namesign").removeClass('d-flex').hide();
            //         $("#clear").show();

            //     }
            // })

            // New Conditions embedded by Basit 
            $("#flexCheckChecked").change(function(){
                if($(this).is(':checked'))
                {
                    $("#pdfChecked").prop('checked',false);
                    $("#DrawCheck").prop('checked',false);
                    $("#signtype").val(1);
                    $("#pdfsign").val(0);
                    $("#Drawtype").val(0);
                    $("div#pdfsign").removeClass('d-flex').addClass('d-none');
                    $("div#sign").removeClass('d-flex').addClass('d-none');
                    $("#namesign").addClass('d-flex').show();
                    $("div#namesign").removeClass('d-none');
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
    $("input[name='principle_contractor']").change(function(){
       if ($(this).val()==1){
          $(".principleno").addClass('d-flex').show();
       }
       else{
          $(".principleno").removeClass('d-flex').hide()
        
       }
    })

    $("input[name='works_coordinator']").change(function(){
       if ($(this).val()==1){
         $("textarea[name='description_approval_temp_works']").show();
       }
       else{
          $("textarea[name='description_approval_temp_works']").hide();
        
       }
    })

    $('#drawing_no').change(function() {
        $('#drawing_no').css("background-color", "#f5f8fa ");
     });
     $('#drawing_title').change(function() {
        $('#drawing_title').css("background-color", "#f5f8fa ");
     });
     $('#drawing_no').change(function() {
        $('#drawing_no').css("background-color", "#f5f8fa ");
     });
     $('#twc_name').change(function() {
        $('#twc_name').css("background-color", "#f5f8fa ");
     });
     $('#tws_name').change(function() {
        $('#tws_name').css("background-color", "#f5f8fa ");
     });
     $('#ms_ra_no').change(function() {
        $('#ms_ra_no').css("background-color", "#f5f8fa ");
     });
     $('#name1').change(function() {
        $('#name1').css("background-color", "#f5f8fa ");
     });
     $('#job_title1').change(function() {
        $('#job_title1').css("background-color", "#f5f8fa ");
     });
     $('#name2').change(function() {
        $('#name2').css("background-color", "#f5f8fa ");
     });
     $('#job_title').change(function() {
        $('#job_title').css("background-color", "#f5f8fa ");
     });
     $('#namesign_id').change(function() {
        $('#namesign_id').css("background-color", "#f5f8fa ");
     });
     $('#namesign_id2').change(function() {
        $('#namesign_id2').css("background-color", "#f5f8fa ");
     });
            var canvas = document.getElementById("sig");
            var signaturePad = new SignaturePad(canvas);
            var canvas1 = document.getElementById("sig1");
            if(canvas1)
            {
             var signaturePad1 = new SignaturePad(canvas1);
            }
            
            $("#submitbutton").on('click',function(){
                 $("#signature").val(signaturePad.toDataURL('image/png'));
                 if(canvas1)
                 {
                    console.log("hello");
                    $("#signature1").val(signaturePad1.toDataURL('image/png'));
                 }
                 $("#permitrenew").submit();
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

    $("input[name='rate_rise']").change(function() {
        if ($(this).val() == 1) {
            $("textarea[name='rate_rise_comment']").removeClass('d-none').addClass('d-flex');
        } else {
            $("textarea[name='rate_rise_comment']").removeClass('d-flex').addClass('d-none');

        }
    })
    $("input[name='works_coordinator']").change(function() {
        if ($(this).val() == 1) {
            $("textarea[name='description_approval_temp_works']").removeClass('d-none').addClass('d-flex');
        } else {
            $("textarea[name='description_approval_temp_works']").removeClass('d-flex').addClass('d-none');

        }
    })

    $("input[name='construction_methodology']").change(function() {
        if ($(this).val() == 1) {
            $("textarea[name='construction_methodology_comment']").show();
        } else {
            $("textarea[name='construction_methodology_comment']").hide();

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
            $("div#namesign").removeClass('d-flex').addClass("d-none");
            $('div#sign').removeClass('d-none').addClass('d-flex')
            $("#sign").css('display','flex');
            $("#sign").removeClass('d-none');
           
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
            $("div#sign").removeClass('d-flex').addClass('d-none');
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
    
        </script>
        @endsection