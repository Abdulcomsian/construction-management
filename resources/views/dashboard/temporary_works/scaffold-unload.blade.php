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
    }

    .inputDiv select {
        width: 100%;
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

    .modalDiv {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid grey;
        color: #000;
    }
    canvas{
        background: lightgray;
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
                    <h2>Scaffolding Inspection / Permit to Unload</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form id="scaffolding" action="{{route('scaffolding.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}" />
                    <input type="hidden" name="type" value="scaffoldunload" />
                    <input type="hidden" name="id" value="{{$scaffolddata->id ?? ''}}" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Select Project:</span>
                                </label>
                                <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" readonly>
                                    <option value="">Select Option</option>
                                    <option value="{{$project->id}}" selected="selected">{{$project->name .' - '. $project->no}}</option>
                                </select>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{$project->no}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Name :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" id="name" name="projname" value="{{$project->name}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Drawing No:</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Drawing No" id="drawing_no" name="drawing_no" value="{{$scaffolddata->drawing_no ?? ''}}" required>
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" name="twc_name" value="{{$scaffolddata->twc_name ?? ''}}" required>
                                </div>
                            </div>
                             <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Load Class:</span>
                                        </label>
                                        <select name="loadclass" id="loadclass" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" readonly>
                                            <option value="">Select Option</option>
                                            <option value="1" {{$scaffolddata->loadclass==1 ? 'selected' : ''}}>Service Class 1 - 0.75 kN/m2 ??? Inspection and very light duty access</option>
                                            <option value="2" {{$scaffolddata->loadclass==2 ? 'selected' : ''}}>Service Class 2 - 1.50 kN/m2 ??? Light duty such as painting and cleaning</option>
                                            <option value="3" {{$scaffolddata->loadclass==3 ? 'selected' : ''}}>Service Class 3 - 2.00 kN/m2 ??? General building work, brickwork, etc.</option>
                                            <option value="4" {{$scaffolddata->loadclass==4 ? 'selected' : ''}}>Service Class 4 - 3.00 kN/m2 ??? Heavy duty such as masonry and heavy cladding</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Date:
                                        </label>
                                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" name="date">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Permit No :</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Permit No" name="permit_no" value="{{$twc_id_no}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Drawing Title :</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Drawing Title" name="drawing_title" value="{{$scaffolddata->drawing_title ?? ''}}" required>
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required"> TWS or Scaffolder Name:</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="TWS Name" name="tws_name" value="{{$scaffolddata->tws_name ?? ''}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:17%">
                                         Location of the temporary works:
                                    </label>
                                    <textarea name="location_temp_work" rows="2" cols="170" placeholder=" Location of the temporary works:">{{$scaffolddata->location_temp_work ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:17%">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170" placeholder="Description of Structure which is ready for use:">{{$scaffolddata->description_structure ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40%">
                                        <span class="required">MS/RA Number</span>
                                    </label>
                                    <input type="text" style="width:25%" class="form-control form-control-solid" placeholder="MS/RA Number" name="ms_ra_no" value="{{$scaffolddata->ms_ra_no ?? ''}}" required>
                                </div>
                            </div>
                            <div class="col-md-12 mt-20">
                                <div class="d-flex inputDiv" style=" height: 87px;">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40%">
                                        <span class="required">Equipment/materials used as a specified/fit for purpose</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid" style="margin-top: 32px;height: 50px;">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="equipment_materials" value="1" {{$scaffolddata->equipment_materials == 1 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="equipment_materials" value="2" {{$scaffolddata->equipment_materials == 2 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">
                                        <h3 style="color: white;">Comments</h3>
                                        <textarea name="equipment_materials_desc" rows="2" cols="50">{{$scaffolddata->equipment_materials_desc ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40%">
                                        <span class="required">Workmanship checked </span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="workmanship" value="1" {{$scaffolddata->workmanship == 1 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="workmanship" value="2" {{$scaffolddata->workmanship == 2 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">
                                        <textarea name="workmanship_desc" rows="2" cols="50">{{$scaffolddata->workmanship_desc ?? ''}}</textarea>
                                    </div>


                                </div>

                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40%">
                                        <span class="required">TW checked against drawings / design output</span>

                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="drawings_design" value="1" {{$scaffolddata->drawings_design == 1 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="drawings_design" value="2" {{$scaffolddata->drawings_design == 2 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->

                                    <div style="margin-left: 10px; text-align:center;">

                                        <textarea name="drawings_design_desc" rows="2" cols="50">{{$scaffolddata->drawings_design_desc ?? ''}}</textarea>

                                    </div>
                                </div>

                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40%">
                                        <span class="required">Loading /use limitations understood e.g. sequence of loading, access/plant loading</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="loading_limit" value="1" {{$scaffolddata->loading_limit == 1 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="loading_limit" value="2" {{$scaffolddata->loading_limit == 2 ? 'checked' : ''}} />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">
                                        <textarea name="loading_limit_desc" rows="2" cols="50">{{$scaffolddata->loading_limit_desc ?? ''}}</textarea>
                                    </div>
                                </div>
                                <p style="color: #000;">Inspect each of the following items & select PASS if installed correctly as per the design. Where actions are required, identify with a number & give details in the space provided.</p>

                            </div>
                        </div>

                        <div class="col-md-12 ">

                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="background:green;color:#fff;padding:10px;width: 20%;">
                                    <span style="">Footings:</span>
                                </label>
                            </div>
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
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="1" {{$checkAndComments->radio_checks['even_stable_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="2" {{$checkAndComments->radio_checks['even_stable_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="even_stable_radio" value="3" {{$checkAndComments->radio_checks['even_stable_radio'] ==  3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['even_stable_radio'] == 2 ? '' : 'd-none'}}" name="even_stable_comment" rows="2" cols="90">{{$checkAndComments->comments['even_stable_comment']}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Base plates?</span>
                                </label>

                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="1" {{$checkAndComments->radio_checks['base_Plates_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="2" {{$checkAndComments->radio_checks['base_Plates_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="base_Plates_radio" value="3" {{$checkAndComments->radio_checks['base_Plates_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['base_Plates_radio'] == 2 ? '' : 'd-none'}}" name="base_Plates_comment" rows="2" cols="90">{{$checkAndComments->comments['base_Plates_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="1" {{$checkAndComments->radio_checks['sole_boards_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="2" {{$checkAndComments->radio_checks['sole_boards_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="sole_boards_radio" value="3" {{$checkAndComments->radio_checks['sole_boards_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['sole_boards_radio'] == 2 ? '' : 'd-none'}}" name="sole_boards_comment" rows="2" cols="90">{{$checkAndComments->comments['sole_boards_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="undermined_radio" value="1" {{$checkAndComments->radio_checks['undermined_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="2" {{$checkAndComments->radio_checks['undermined_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="undermined_radio" value="3" {{$checkAndComments->radio_checks['undermined_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['undermined_radio'] == 2 ? '' : 'd-none'}}" name="undermined_comment" rows="2" cols="90">{{$checkAndComments->comments['undermined_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                    Standards:
                                </label>
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
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="1" {{$checkAndComments->radio_checks['Plumb_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="2" {{$checkAndComments->radio_checks['Plumb_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="Plumb_radio" value="3" {{$checkAndComments->radio_checks['Plumb_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['Plumb_radio'] == 2 ? '' : 'd-none'}}" name="Plumb_comment" rows="2" cols="90">{{$checkAndComments->comments['Plumb_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="1" {{$checkAndComments->radio_checks['staggered_joints_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="2" {{$checkAndComments->radio_checks['staggered_joints_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="staggered_joints_radio" value="3" {{$checkAndComments->radio_checks['staggered_joints_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['staggered_joints_radio'] == 2 ? '' : 'd-none'}}" name="staggered_joints_comment" rows="2" cols="90">{{$checkAndComments->comments['staggered_joints_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="1" {{$checkAndComments->radio_checks['wrong_spacing_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="2" {{$checkAndComments->radio_checks['wrong_spacing_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_spacing_radio" value="3" {{$checkAndComments->radio_checks['wrong_spacing_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['wrong_spacing_radio'] == 2 ? '' : 'd-none'}}" name="wrong_spacing_comment" rows="2" cols="90">{{$checkAndComments->comments['wrong_spacing_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="damaged_radio" value="1" {{$checkAndComments->radio_checks['damaged_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="2" {{$checkAndComments->radio_checks['damaged_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="damaged_radio" value="3" {{$checkAndComments->radio_checks['damaged_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['damaged_radio'] == 2 ? '' : 'd-none'}}" name="damaged_comment" rows="2" cols="90">{{$checkAndComments->comments['damaged_comment'] ?? ''}}</textarea>

                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                    Boards:
                                </label>
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
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="1" {{$checkAndComments->radio_checks['trap_boards_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="2" {{$checkAndComments->radio_checks['trap_boards_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="trap_boards_radio" value="3" {{$checkAndComments->radio_checks['trap_boards_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['trap_boards_radio'] == 2 ? '' : 'd-none'}}" name="trap_boards_comment" rows="2" cols="90">{{$checkAndComments->comments['trap_boards_comment'] ?? ''}}</textarea>

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
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio" value="1" {{$checkAndComments->radio_checks['incomplete_boarding_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio" value="2" {{$checkAndComments->radio_checks['incomplete_boarding_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="incomplete_boarding_radio" value="3" {{$checkAndComments->radio_checks['incomplete_boarding_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['incomplete_boarding_radio'] == 2 ? '' : 'd-none'}}" name="incomplete_boarding_comment" rows="2" cols="90">{{$checkAndComments->comments['incomplete_boarding_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="1" {{$checkAndComments->radio_checks['supports_ties_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="2" {{$checkAndComments->radio_checks['supports_ties_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="supports_ties_radio" value="3" {{$checkAndComments->radio_checks['supports_ties_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['supports_ties_radio'] == 2 ? '' : 'd-none'}}" name="supports_ties_comment" rows="2" cols="90">{{$checkAndComments->comments['supports_ties_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                    Ladders:
                                </label>
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
                                        <input type="radio" class="btn-check" name="insufficient_length_radio" value="1" {{$checkAndComments->radio_checks['insufficient_length_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio" value="2" {{$checkAndComments->radio_checks['insufficient_length_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="insufficient_length_radio" value="3" {{$checkAndComments->radio_checks['insufficient_length_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['insufficient_length_radio'] == 2 ? '' : 'd-none'}}" name="insufficient_length_comment" rows="2" cols="90">{{$checkAndComments->comments['insufficient_length_comment'] ?? ''}}</textarea>

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
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="1" {{$checkAndComments->radio_checks['missing_loose_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="2" {{$checkAndComments->radio_checks['missing_loose_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="missing_loose_radio" value="3" {{$checkAndComments->radio_checks['missing_loose_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['missing_loose_radio'] == 2 ? '' : 'd-none'}}" name="missing_loose_comment" rows="2" cols="90">{{$checkAndComments->comments['missing_loose_comment'] ?? ''}}</textarea>

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
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="1" {{$checkAndComments->radio_checks['wrong_fittings_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="2" {{$checkAndComments->radio_checks['wrong_fittings_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_fittings_radio" value="3" {{$checkAndComments->radio_checks['wrong_fittings_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['wrong_fittings_radio'] == 2 ? '' : 'd-none'}}" name="wrong_fittings_comment" rows="2" cols="90">{{$checkAndComments->comments['wrong_fittings_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                   Ledges:
                                </label>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Not level?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="1" {{$checkAndComments->radio_checks['not_level_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="2" {{$checkAndComments->radio_checks['not_level_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="not_level_radio" value="3" {{$checkAndComments->radio_checks['not_level_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['not_level_radio'] == 2 ? '' : 'd-none'}}" name="not_level_comment" rows="2" cols="90">{{$checkAndComments->comments['not_level_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="1" {{$checkAndComments->radio_checks['joined_same_bays_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="2" {{$checkAndComments->radio_checks['joined_same_bays_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="joined_same_bays_radio" value="3" {{$checkAndComments->radio_checks['joined_same_bays_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['joined_same_bays_radio'] == 2 ? '' : 'd-none'}}" name="joined_same_bays_comment" rows="2" cols="90">{{$checkAndComments->comments['joined_same_bays_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="1" {{$checkAndComments->radio_checks['loose_damaged_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="2" {{$checkAndComments->radio_checks['loose_damaged_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_radio" value="3" {{$checkAndComments->radio_checks['loose_damaged_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['loose_damaged_radio'] == 2 ? '' : 'd-none'}}" name="loose_damaged_comment" rows="2" cols="90">{{$checkAndComments->comments['loose_damaged_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                    Guard Rails:
                                </label>
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
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="1" {{$checkAndComments->radio_checks['wrong_height_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="2" {{$checkAndComments->radio_checks['wrong_height_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="wrong_height_radio" value="3" {{$checkAndComments->radio_checks['wrong_height_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['wrong_height_radio'] == 2 ? '' : 'd-none'}}" name="wrong_height_comment" rows="2" cols="90">{{$checkAndComments->comments['wrong_height_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="1" {{$checkAndComments->radio_checks['some_missing_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="2" {{$checkAndComments->radio_checks['some_missing_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="some_missing_radio" value="3" {{$checkAndComments->radio_checks['some_missing_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['some_missing_radio'] == 2 ? '' : 'd-none'}}" name="some_missing_comment" rows="2" cols="90">{{$checkAndComments->comments['some_missing_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="GuardRails_radio" value="1" {{$checkAndComments->radio_checks['GuardRails_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="GuardRails_radio" value="2" {{$checkAndComments->radio_checks['GuardRails_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="GuardRails_radio" value="3" {{$checkAndComments->radio_checks['GuardRails_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['GuardRails_radio'] == 2 ? '' : 'd-none'}}" name="GuardRails_comment" rows="2" cols="90">{{$checkAndComments->comments['GuardRails_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <!-- coupling & tiles -->
                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                    Couplings:
                                </label>
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
                                        <input type="radio" class="btn-check" name="coupling_wrongfitting_radio" value="1" {{$checkAndComments->radio_checks['coupling_wrongfitting_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_wrongfitting_radio" value="2" {{$checkAndComments->radio_checks['coupling_wrongfitting_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_wrongfitting_radio" value="3" {{$checkAndComments->radio_checks['coupling_wrongfitting_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['coupling_wrongfitting_radio'] == 2 ? '' : 'd-none'}}" name="coupling_wrongfitting_comment" rows="2" cols="90">{{$checkAndComments->comments['coupling_wrongfitting_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Any missing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_somemissing_radio" value="1" {{$checkAndComments->radio_checks['coupling_somemissing_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_somemissing_radio" value="2" {{$checkAndComments->radio_checks['coupling_somemissing_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_somemissing_radio" value="3" {{$checkAndComments->radio_checks['coupling_somemissing_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['coupling_somemissing_radio'] == 2 ? '' : 'd-none'}}" name="coupling_somemissing_comment" rows="2" cols="90">{{$checkAndComments->comments['coupling_somemissing_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="coupling_loosedamaged_radio" value="1" {{$checkAndComments->radio_checks['coupling_loosedamaged_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_loosedamaged_radio" value="2" {{$checkAndComments->radio_checks['coupling_loosedamaged_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="coupling_loosedamaged_radio" value="3" {{$checkAndComments->radio_checks['coupling_loosedamaged_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['coupling_loosedamaged_radio'] == 2 ? '' : 'd-none'}}" name="coupling_loosedamaged_comment" rows="2" cols="90">{{$checkAndComments->comments['coupling_loosedamaged_comment'] ?? ''}}</textarea>
                                </div>
                            </div>

                            <!-- Bracing Facades -->
                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                    Bracing:
                                </label>
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
                                        <input type="radio" class="btn-check" name="bracing_wrongfitting_radio" value="1" {{$checkAndComments->radio_checks['bracing_wrongfitting_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_wrongfitting_radio" value="2" {{$checkAndComments->radio_checks['bracing_wrongfitting_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_wrongfitting_radio" value="3" {{$checkAndComments->radio_checks['bracing_wrongfitting_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['bracing_wrongfitting_radio'] == 2 ? '' : 'd-none'}}" name="bracing_wrongfitting_comment" rows="2" cols="90">{{$checkAndComments->comments['bracing_wrongfitting_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Any missing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_somemissing_radio" value="1" {{$checkAndComments->radio_checks['bracing_somemissing_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_somemissing_radio" value="2" {{$checkAndComments->radio_checks['bracing_somemissing_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_somemissing_radio" value="3" {{$checkAndComments->radio_checks['bracing_somemissing_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['bracing_somemissing_radio'] == 2 ? '' : 'd-none'}}" name="bracing_somemissing_comment" rows="2" cols="90">{{$checkAndComments->comments['bracing_somemissing_comment'] ?? ''}}</textarea>
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
                                        <input type="radio" class="btn-check" name="bracing_loosedamaged_radio" value="1" {{$checkAndComments->radio_checks['bracing_loosedamaged_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_loosedamaged_radio" value="2" {{$checkAndComments->radio_checks['bracing_loosedamaged_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="bracing_loosedamaged_radio" value="3" {{$checkAndComments->radio_checks['bracing_loosedamaged_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['bracing_loosedamaged_radio'] == 2 ? '' : 'd-none'}}" name="bracing_loosedamaged_comment" rows="2" cols="90">{{$checkAndComments->comments['bracing_loosedamaged_comment'] ?? ''}}</textarea>
                                </div>
                            </div>



                            <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;background:green;color:#fff;padding:10px;">
                                    Debris Netting:
                                </label>
                            </div>
                            <!-- Debrings Netting -->
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
                                        <input type="radio" class="btn-check" name="partially_removed_radio" value="1" {{$checkAndComments->radio_checks['partially_removed_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio" value="2" {{$checkAndComments->radio_checks['partially_removed_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="partially_removed_radio" value="3" {{$checkAndComments->radio_checks['partially_removed_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['partially_removed_radio'] == 2 ? '' : 'd-none'}}" name="partially_removed_comment" rows="2" cols="90">{{$checkAndComments->comments['partially_removed_comment'] ?? ''}}</textarea>
                                </div>


                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Any missing?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="debrings_somemissing_radio" value="1" {{$checkAndComments->radio_checks['debrings_somemissing_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="debrings_somemissing_radio" value="2" {{$checkAndComments->radio_checks['debrings_somemissing_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="debrings_somemissing_radio" value="3" {{$checkAndComments->radio_checks['debrings_somemissing_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">
                                    <textarea class="{{$checkAndComments->radio_checks['debrings_somemissing_radio'] == 2 ? '' : 'd-none'}}" name="debrings_somemissing_comment" rows="2" cols="90">{{$checkAndComments->comments['debrings_somemissing_comment'] ?? ''}}</textarea>
                                </div>


                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Loose/ damaged or broken?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio" value="1" {{$checkAndComments->radio_checks['loose_damaged_broken_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Pass</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio" value="2" {{$checkAndComments->radio_checks['loose_damaged_broken_radio'] == 2 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">Fail</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="loose_damaged_broken_radio" value="3" {{$checkAndComments->radio_checks['loose_damaged_broken_radio'] == 3 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea class="{{$checkAndComments->radio_checks['loose_damaged_broken_radio'] == 2 ? '' : 'd-none'}}" name="loose_damaged_broken_comment" rows="2" cols="90">{{$checkAndComments->comments['loose_damaged_broken_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">
                                        <h5>Any other actions necessary not listed above? </h5>
                                    </span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid" style="height: 48px;">
                                    <label>
                                        <input type="radio" class="btn-check" name="other_radio" value="1" {{$checkAndComments->radio_checks['other_radio'] == 1 ? 'checked' : ''}} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="other_radio" value="2" {{$checkAndComments->radio_checks['other_radio'] == 2 ? 'checked' : ''}} />
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
                                    <textarea class="{{$checkAndComments->radio_checks['other_radio'] == 1 ? '' : 'd-none'}}" name="other_comment" rows="2" cols="90">{{$checkAndComments->comments['other_comment'] ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="contain<input type=" text" name="" class="form-control" />
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
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex inputDiv d-block">
                                        <div class="d-flex modalDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                Inspected by:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" value="{{$scaffolddata->inspected_by ?? ''}}" placeholder="Inspected By" name="inspected_by" required>

                                        </div>
                                    </div>
                                    <div class="d-flex inputDiv d-block">
                                        <div class="d-flex modalDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                Job Title:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Job Title" name="job_title" value="{{\Auth::user()->job_title ?? ''}}" required>

                                        </div>
                                    </div>

                                    <div class="d-flex inputDiv d-block">
                                        <div class="d-flex modalDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                Company:
                                            </label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Company" name="company" value="{{$project->company->name ?? ''}}" required>
                                            <input type="hidden" class="form-control form-control-solid" placeholder="Company" id="company_id" name="companyid" value="{{$project->company->id ?? ''}}" readonly>

                                        </div>
                                    </div>
                                    <div class="d-flex inputDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                            <span class="required">Name signature:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="checkbox" id="flexCheckChecked" style="width: 12px;margin-top:5px">
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
                                        <br />
                                        <canvas id="sig"></canvas>
                                        <br />
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
                                                    <input type="radio" class="btn-check" name="Scaff_tag_signed" value="1" {{$scaffolddata->Scaff_tag_signed == 1 ? 'checked' : ''}} />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="Scaff_tag_signed" value="2" {{$scaffolddata->Scaff_tag_signed == 2 ? 'checked' : ''}} />
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
                                                    <input type="radio" class="btn-check" name="carry_out_inspection" value="1" {{$scaffolddata->carry_out_inspection == 1 ? 'checked' : ''}} />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label>
                                                    <input type="radio" class="btn-check" name="carry_out_inspection" value="2" {{$scaffolddata->carry_out_inspection    == 2 ? 'checked' : ''}} />
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
                                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}" placeholder="Date" name="date">

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <br>
                            <button id="submitbutton" type="button" class="btn btn-primary">Submit</button>
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
<script src="{{asset('assets/js/scaffolding.js')}}"></script>
<script type="text/javascript">
    $("#flexCheckChecked").change(function() {
        if ($(this).is(':checked')) {
            $("#signtype").val(1);
            $("#namesign").addClass('d-flex').show();
            $("input[name='namesign']").attr('required', 'required');
            $("textarea[name='signed']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();

        } else {
            $("#signtype").val(0);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("textarea[name='signed']").attr('required');
            $("#clear").show();

        }
    })

            var canvas = document.getElementById("sig");
            var signaturePad = new SignaturePad(canvas);            
             $("#submitbutton").on('click',function(){
                 $("#signature").val(signaturePad.toDataURL('image/png'));
                 $("#scaffolding").submit();
            });
</script>
@endsection