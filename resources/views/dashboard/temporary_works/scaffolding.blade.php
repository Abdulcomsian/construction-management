@extends('layouts.dashboard.master',['title' => 'Temporary Works'])
@section('styles')
<style>
    .newDesignBtn {
        border-radius: 8px;
        background-color: #F9D413;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
    }

    .newDesignBtn:hover {
        color: rgba(222, 13, 13, 0.66);
    }

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }

    .wrapper,
    .page {
         background-image: url({{asset("assets/media/images/temporaryBg.png")}})
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: red !important;

    }

    .content,
    .card,
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
        background-color: #2B2727 !important;
        border-color: #2B2727 !important;
        color: #fff !important;
    }

    .inputDiv select {
        width: 100%;
        background-color: #2B2727 !important;
        border-color: #2B2727 !important;
        color: #fff !important;
    }

    .inputDiv label {
        width: 50%;
        color: #fff;
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

    table,
    th,
    td {
        border: 1px solid grey;
        background-color: #000000;
        color: white;
    }
</style>
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
                    <h2>Scaffolding InspectionPermit to Load</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form action="{{route('scaffolding.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                      <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <div class="row">
                        <div class="col-md-6">
                             <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Select Project:</span>
                                </label>
                                <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" readonly>
                                    <option value="">Select Option</option>
                                    <option value="{{$project->id}}" selected="selected">{{$project->name .' - '. $project->no}}</option>
                                </select>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No :</span>
                                    </label>
                                   <input readonly type="text" class="form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{$project->no}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">Project Name :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" id="name" name="projname" value="{{$project->name}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">Drawing Number:</span>
                                    </label>
                                     <input  type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_no" name="drawing_no" value="{{old('drawing_no')}}"  required>
                                </div>
                            </div>
                             <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" name="twc_name" value="{{old('twc_name')}}"  required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Date :
                                        </label>
                                         <input  type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" name="date">
                                    </div>
                                </div>
                                 <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                             <span class="required">Permit Number :</span>
                                        </label>
                                         <input  type="text" class="form-control form-control-solid" placeholder="Permit No" name="permit_no" value="{{$twc_id_no}}" readonly="readonly">
                                    </div>
                                </div>
                                 <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                             <span class="required">Drawing title :</span>
                                        </label>
                                         <input  type="text" class="form-control form-control-solid" placeholder="Drawing Title" name="drawing_title" value="{{old('drawing_title')}}"  required>
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                             <span class="required">  TWS or competent Scaffolder Name:</span>
                                        </label>
                                         <input  type="text" class="form-control form-control-solid" placeholder="TWS Name" name="tws_name" value="{{old('tws_name')}}"  required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                             <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Location of the Temporary Works (Area):
                                    </label>
                                    <textarea name="location_temp_work" rows="2" cols="170" style="background: #2B2727;color:white" placeholder="Location of the Temporary Works (Area):">{{old('location_temp_work')}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170" style="background: #2B2727;color:white" placeholder="Description of Structure which is ready for use:">{{old('description_structure')}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">MS/RA Number</span>
                                    </label>
                                     <input  type="text" class="form-control form-control-solid" placeholder="Ms/RA Number" name="ms_ra_no"  value="{{old('ms_ra_no')}}"  required>
                                </div>
                            </div>
                            <div class="col-md-12 mt-20">
                                <div class="d-flex inputDiv" style=" height: 87px;">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Equipment/materials used as a specified/fit for purpose</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid" style="margin-top: 32px;height: 50px;">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="equipment_materials" value="1" checked/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="equipment_materials" value="2"/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">
                                        <h3 style="color: white;">Comments</h3>
                                        <textarea  name="equipment_materials_desc" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Workmanship checked </span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="workmanship" value="1" checked/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="workmanship" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">
                                        <textarea  name="workmanship_desc" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>
                                    </div>


                                </div>

                                <div class="d-flex inputDiv">
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
                                            <input type="radio" class="btn-check" name="drawings_design" value="1" checked/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="drawings_design" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->

                                    <div style="margin-left: 10px; text-align:center;">

                                        <textarea name="drawings_design_desc" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>

                                    </div>
                                </div>

                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Loading /use limitations understood e.g. sequence of loading, access/plant loading</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="loading_limit" value="1" checked/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="loading_limit" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">
                                        <textarea  name="loading_limit_desc" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>
                                    </div>
                                </div>
                                <p style="color: white;">Inspect each of the following items & tick off in the box provided if installed correctly as per the design. Where actions are required, identify with a number & detail comments in the space provided below.</p>

                            </div>
                        </div>

                        <div class="col-md-12 ">


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Even, stable ground?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="1" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div  style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="even_stable_comment" rows="2" cols="90" style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Base Plates?</span>
                                </label>

                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="1" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea  class="d-none" name="base_Plates_comment" rows="2" cols="90" style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Sole boards?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="1" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="sole_boards_comment" rows="2" cols="90" style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Undermined?</span>
                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="undermined_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Plumb?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="1" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="Plumb_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Staggered joints?</span>
                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="1" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="2"/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="staggered_joints_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong spacing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="wrong_spacing_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>


                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Damaged?</span>

                                </label>

                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="damaged_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Trap boards?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="1" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="trap_boards_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Incomplete boarding?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="incomplete_boarding_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Insufficient supports / ties?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="supports_ties_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Insufficient length?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="insufficient_length_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Any missing or loose?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="missing_loose_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong fittings?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="wrong_fittings_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Not level?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="2" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="not_level_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Joined in same bays?</span>
                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="2" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="joined_same_bays_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Loose or damaged?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="2" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="loose_damaged_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong height?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="2" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="wrong_height_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Some missing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="2" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="some_missing_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                           


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Partially Removed?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio" value="2" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="d-none" name="partially_removed_comment" rows="2" cols="90" style="background: #2B2727;color:white"></textarea>
                                </div>


                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Loose/ damaged or broken?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio" value="3" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="d-none" name="loose_damaged_broken_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">
                                        <h5>OTHER? Any further actions necessary? </h5>
                                    </span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid" style="height: 48px;">
                                    <label>
                                        <input type="radio" class="btn-check" name="other_radio" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="other_radio" value="2" checked/>
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>

                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 70px; ">
                                    <textarea class="d-none" name="other_comment" rows="2" cols="90"  style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>
                            <div class="contain<input type="text" name="" class="form-control"/>
                                <table style="width:100%">

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
                                        <td><input type="text" name="no[]" class="form-control"/></td>
                                        <td><input type="text" name="desc_actions[]" class="form-control"/></td>
                                        <td><input type="date" name="action_date[]" class="form-control"/></td>
                                    </tr>

                                    <tr>
                                        <td><input type="tno[]ext" name="no[]" class="form-control"/></td>
                                        <td><input type="text" name="desc_actions[]" class="form-control"/></td>
                                        <td><input type="date" name="action_date[]" class="form-control"/></td>
                                    </tr>


                                    <tr>
                                        <td><input type="text" name="no[]" class="form-control"/></td>
                                        <td><input type="text" name="desc_actions[]" class="form-control"/></td>
                                        <td><input type="date" name="action_date[]" class="form-control"/></td>
                                    </tr>


                                    <tr>
                                        <td><input type="text" name="no[]" class="form-control"/></td>
                                        <td><input type="text" name="desc_actions[]" class="form-control"/></td>
                                        <td><input type="date" name="action_date[]" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="no[]" class="form-control"/></td>
                                        <td><input type="text" name="desc_actions[]" class="form-control"/></td>
                                        <td><input type="date" name="action_date[]" class="form-control"/></td>
                                    </tr>


                                    <tr>
                                        <td><input type="text" name="no[]" class="form-control"/></td>
                                        <td><input type="text" name="desc_actions[]" class="form-control"/></td>
                                        <td><input type="date" name="action_date[]" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="no[]" class="form-control"/></td>
                                        <td><input type="text" name="desc_actions[]" class="form-control"/></td>
                                        <td><input type="date" name="action_date[]" class="form-control"/></td>
                                    </tr>
                                </table>
                                <p>To undestand the example better, we have added borders to the table.</p>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Inspected by: :
                                                </label>
                                                 <input  type="text" class="form-control form-control-solid" placeholder="Inspected By" name="inspected_by" required>

                                            </div>
                                        </div>
                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Job Title: :
                                                </label>
                                                <input  type="text" class="form-control form-control-solid" placeholder="Job Title" name="job_title"  value="{{\Auth::user()->job_title ?? ''}}" required>

                                            </div>
                                        </div>

                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Company:
                                                </label>
                                                <input  type="text" class="form-control form-control-solid" placeholder="Company" name="company" value="{{$project->company->name ?? ''}}" required>

                                            </div>
                                        </div>
                                         <div class="d-flex inputDiv">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                                <span class="required">Name signature:</span>
                                            </label>
                                            <!--end::Label-->
                                             <input  type="checkbox" id="flexCheckChecked"  style="width: 12px;margin-top:5px">
                                              <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="0">
                                             <span style="padding-left:3px;color:white">Do you want name signature?</span>
                                        </div>
                                        <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name Signature:</span>
                                            </label>
                                            <input type="text" name="namesign" class="form-control form-control-solid">
                                        </div>
                                        <div class="d-flex inputDiv" id="sign">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Signature:</span>
                                            </label>
                                            <br/>
                                            <div id="sig" ontouchmove="event.preventDefault();"></div>
                                            <br/>
                                           <textarea id="signature" name="signed" style="opacity:0" required></textarea>
                                        </div>
                                         <button id="clear" type="button" class="btn btn-danger  float-end">Clear Signature</button>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Scaff-tag signed and displayed?
                                                </label>
                                                <!--begin::Radio group-->
                                                <div class="nav-group nav-group-fluid ">
                                                    <!--begin::Option-->

                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="Scaff_tag_signed" value="1" checked/>
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="Scaff_tag_signed" value="2" />
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                    </label>

                                                    <!--end::Option-->
                                                    <!--begin::Option-->

                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Radio group-->
                                            </div>
                                        </div>
                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Are you competent to carry out inspection?
                                                </label>
                                                <!--begin::Radio group-->
                                                <div class="nav-group nav-group-fluid ">
                                                    <!--begin::Option-->

                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="carry_out_inspection" value="1" checked/>
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="carry_out_inspection" value="2" />
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                    </label>
                                                    <label>

                                                        <!--end::Option-->
                                                        <!--begin::Option-->

                                                        <!--end::Option-->
                                                </div>
                                                <!--end::Radio group-->



                                            </div>

                                        </div>

                                        <div class="d-flex inputDiv mt-10">
                                            <div class="d-flex inputDiv">
                                                <div class="d-flex modalDiv">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        Date :
                                                    </label>
                                                    <input  type="date" class="form-control"  value="{{ date('Y-m-d') }}" placeholder="Date" name="date">

                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
<script type="text/javascript">
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#signtype").val(1);
            $("#namesign").addClass('d-flex').show();
            $("input[name='namesign']").attr('required','required');
             $("textarea[name='signed']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
           
        }
        else{
            $("#signtype").val(0);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("textarea[name='signed']").attr('required');
            $("#clear").show();
             
        }
    })


    $('input[name="even_stable_radio"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="even_stable_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="even_stable_comment"]').addClass('d-none').removeAttr('required');
        }
    })

     $('input[name="base_Plates_radio"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="base_Plates_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="base_Plates_comment"]').addClass('d-none').removeAttr('required');
        }
    })

     $('input[name="sole_boards_radio"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="sole_boards_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="sole_boards_comment"]').addClass('d-none').removeAttr('required');
        }
    })

     $('input[name="undermined_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="undermined_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="undermined_comment"]').addClass('d-none').removeAttr('required');
        }
    })

      $('input[name="Plumb_radio"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="Plumb_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="Plumb_comment"]').addClass('d-none').removeAttr('required');
        }
    })

       $('input[name="staggered_joints_radio"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="staggered_joints_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="staggered_joints_comment"]').addClass('d-none').removeAttr('required');
        }
    })

       $('input[name="wrong_spacing_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="wrong_spacing_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="wrong_spacing_comment"]').addClass('d-none').removeAttr('required');
        }
    })

       $('input[name="damaged_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="damaged_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="damaged_comment"]').addClass('d-none').removeAttr('required');
        }
    })

        $('input[name="trap_boards_radio"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="trap_boards_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="trap_boards_comment"]').addClass('d-none').removeAttr('required');
        }
    })

        $('input[name="incomplete_boarding_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="incomplete_boarding_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="incomplete_boarding_comment"]').addClass('d-none').removeAttr('required');
        }
    })

        $('input[name="supports_ties_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="supports_ties_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="supports_ties_comment"]').addClass('d-none').removeAttr('required');
        }
    })

        $('input[name="insufficient_length_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="insufficient_length_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="insufficient_length_comment"]').addClass('d-none').removeAttr('required');
        }
    })

        $('input[name="missing_loose_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="missing_loose_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="missing_loose_comment"]').addClass('d-none').removeAttr('required');
        }
    })

        $('input[name="wrong_fittings_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="wrong_fittings_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="wrong_fittings_comment"]').addClass('d-none').removeAttr('required');
        }
    })

              


    $('input[name="not_level_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="not_level_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="not_level_comment"]').addClass('d-none').removeAttr('required');
        }
    })




    $('input[name="joined_same_bays_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="joined_same_bays_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="joined_same_bays_comment"]').addClass('d-none').removeAttr('required');
        }
    })





    $('input[name="loose_damaged_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="loose_damaged_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="loose_damaged_comment"]').addClass('d-none').removeAttr('required');
        }
    })


    $('input[name="wrong_height_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="wrong_height_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="wrong_height_comment"]').addClass('d-none').removeAttr('required');
        }
    })



    $('input[name="some_missing_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="some_missing_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="some_missing_comment"]').addClass('d-none').removeAttr('required');
        }
    })

    $('input[name="partially_removed_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="partially_removed_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="partially_removed_comment"]').addClass('d-none').removeAttr('required');
        }
    })

    $('input[name="loose_damaged_broken_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="loose_damaged_broken_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="loose_damaged_broken_comment"]').addClass('d-none').removeAttr('required');
        }
    })

    $('input[name="other_radio"]').change(function(){
        if($(this).val()==1)
        {
            $('textarea[name="other_comment"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="other_comment"]').addClass('d-none').removeAttr('required');
        }
    }) 




        $('input[name="equipment_materials"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="equipment_materials_desc"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="equipment_materials_desc"]').removeAttr('required');
        }
    }) 


        $('input[name="workmanship"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="workmanship_desc"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="workmanship_desc"]').removeAttr('required');
        }
    }) 

              $('input[name="loading_limit"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="loading_limit_desc"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="loading_limit_desc"]').removeAttr('required');
        }
    })


              $('input[name="drawings_design"]').change(function(){
        if($(this).val()==2)
        {
            $('textarea[name="drawings_design_desc"]').removeClass('d-none').attr('required','required');
        }
        else{
             $('textarea[name="drawings_design_desc"]').removeAttr('required');
        }
    })




</script>
@endsection