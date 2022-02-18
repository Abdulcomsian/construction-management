@extends('layouts.dashboard.master',['title' => 'Permit To Load'])
@section('styles')
<style>
    .aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60px !important;
    }
    .form-control.form-control-solid{background-color:#000;}
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
    canvas{
        background: lightgray;
    }
    .uploaded{padding:40px 0 !important;}

    @media only screen and (max-width: 450px) {
        #sig1{
            width:200px;
        }
        #sig{
            width:200px;
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
                    <h2>Permit to Load</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form id="permitform" action="{{route('permit.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <input type="hidden" name="designer_company_email" value="{{$tempdata->designer_company_email ?? ''}}"  readonly>
                    <input type="hidden" name="design_requirement_text" value="{{$tempdata->design_requirement_text ?? ''}}" readonly="readonly">
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
                                    <input type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_no" name="drawing_no" value="{{old('drawing_no')}}" required>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" id="twc_name" name="twc_name" value="{{old('twc_name')}}" required>
                                    <input type="hidden" name="twc_email" value="{{$tempdata->twc_email ?? ''}}" readonly>
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
                                        <input type="date" style="background-color:#f5f8fa !important" id="permit_date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" name="date" value="{{old('date')}}">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Permit Number :</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Permit No" name="permit_no" value="{{$twc_id_no}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Drawing title :</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Drawing Title" id="drawing_title" name="drawing_title" value="{{old('drawing_title')}}" required>
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">TWS Name :</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="TWS Name" id="tws_name" name="tws_name" value="{{old('tws_name')}}" required>
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">MS/RA Number</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Ms/RA Number" id="ms_ra_no" name="ms_ra_no" value="{{old('ms_ra_no')}}" required>
                                        <!-- <input type="text" class="form-control form-control-solid" placeholder="TWS Name" id="tws_name" name="tws_name" value="{{old('tws_name')}}" required> -->
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
                                    <textarea class="form-control" name="location_temp_work" rows="2" style="width:100%" placeholder="Location of the Temporary Works (Area):">{{old('location_temp_work')}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea class="form-control" name="description_structure" rows="2" style="width:100%" placeholder="Description of Structure which is ready for use:">{{old('description_structure')}}</textarea>
                                </div>
                            </div>
                            <!-- <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                   
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">MS/RA Number</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Ms/RA Number" id="ms_ra_no" name="ms_ra_no" value="{{old('ms_ra_no')}}" required>
                                </div>
                            </div> -->
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Equipment/materials used as a specified/fit for purpose</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <label>
                                        <input type="radio" class="btn-check" name="equipment_metrial" value="1" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="equipment_metrial" value="2" disabled readonly />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                </div>
                                <!--end::Radio group-->
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Workmanship checked (i.e. all props, ties, struts, joints, stop-ends, checked)</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Workmanship" value="1" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="Workmanship" value="2" disabled="disabled" readonly />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
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
                                        <input type="radio" class="btn-check" name="drawings_design" value="1" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="drawings_design" value="2" disabled readonly />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Loading /use limitations understood e.g. Rate of pour, sequence of loading, access/plant loading</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loading_limitations" value="1" checked />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="loading_limitations" value="2" disabled readonly />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Approval by Temp Works Coordinator Required? <br>
                                        completed Other criteria specified (e.g. strength of supporting structure, any back propping,
                                        ground tests, anchor tests) are checked and satisfied (IF YES, SPECIFY BELOW)</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        @if(isset($old))
                                        <input type="radio" class="btn-check" name="works_coordinator" value="1" {{ old('works_coordinator') == '1' ? 'checked' : '' }} />
                                        @else
                                        <input type="radio" class="btn-check" name="works_coordinator" value="1" checked />
                                        @endif
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="works_coordinator" value="2" {{ old('works_coordinator') == '2' ? 'checked' : '' }} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <textarea name="description_approval_temp_works" rows="2" class="form-control">{{old('description_approval_temp_works')}}</textarea>
                                </div>
                            </div>
                            <h5 style="color: #000">Permit to unload/Use</h5>
                            <br>
                            <p style="color: #000;">

                                I confirm that I have inspected the above temporary structure and I
                                am satisfied that it conforms to the above.<br>
                                I consider that the temporary structure is ready to be loaded and
                                taken into use.<br>
                                I confirm that I am authorised to issue a Permit to Load for this
                                temporary structure.<br>
                            </p>

                            <!--end::Option-->


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Principle Contractor approved required?</span>

                                </label>
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        @if(isset($old))
                                        <input type="radio" class="btn-check" name="principle_contractor" value="1" {{ old('principle_contractor') == '1' ? 'checked' : '' }} />
                                        @else
                                        <input type="radio" class="btn-check" name="principle_contractor" value="1" checked />
                                        @endif
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="principle_contractor" value="2" {{ old('principle_contractor') == '2' ? 'checked' : '' }} />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            <!-- <div class="d-flex inputDiv"> -->
                                <!--begin::Label-->


                                <div class="col-md-12">
                                    <div class="row" id="first_member">
                                        <div class="col"  style="flex:100% !important;">

                                            <div class="d-flex inputDiv">
                                            </div>
                                            <div class="d-flex inputDiv principleno">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Name::</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name1" name="name1" value="{{old('name1')}}">
                                            </div>
                                            <div class="d-flex inputDiv principleno">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Job title:</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Job title" id="job_title1" name="job_title1" value="{{old('job_title1')}}">
                                            </div>

                                        </div>

                                        <div class="col">
                                            <div class="d-flex inputDiv" style="">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                                    <span class="required">Name/signature:</span>
                                                </label>
                                                <input type="checkbox" id="flexCheckChecked1" style="width: 12px;margin-top:5px">
                                                <input type="hidden" id="signtype1" name="signtype1" class="form-control form-control-solid" value="0">
                                                <span style="padding-left:3px;color:#000">Do you want name signature?</span>
                                            </div>
                                            <div class="d-flex inputDiv" id="namesign1" style="display: none !important;">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Name Signature:</span>
                                                </label>
                                                <input type="text" name="namesign1" id="namesign_id2" class="form-control form-control-solid">
                                            </div>
                                            <div class="d-flex inputDiv principleno" id="sign1" style="">
                                                <label style="width:33%" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Signature:</span>
                                                </label>
                                                <br />
                                                <canvas id="sig1" ></canvas>
                                            </div>
                                            <div class="d-flex inputDiv principleno" id="sign1" style="">
                                                <textarea id="signature1" name="signed1" style="opacity: 0"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Second person -->


                                    <div class="row" id="second_member">
                                        <div class="col" style="flex:100% !important;">

                                            <div class="d-flex inputDiv">
                                            </div>
                                            <div class="d-flex inputDiv principleno">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Name::</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name2" name="name" value="{{old('name')}}">
                                            </div>
                                            <div class="d-flex inputDiv principleno">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Job title:</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Job title" id="job_title" name="job_title" value="{{old('job_title')}}">
                                            </div>
                                            <div class="d-flex inputDiv ">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Company: </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" id="companyadmin" class="form-control form-control-solid" placeholder="Company" name="company" value="{{$project->company->name ?? ''}}" readonly="readonly">
                                                <input type="hidden" id="companyid" class="form-control form-control-solid" placeholder="Company" name="companyid" value="{{$project->company->id ?? ''}}" readonly="readonly">
                                            </div>
                                            <div class="d-flex inputDiv ">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                                    <span class="required">Date:</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="date" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
                                            </div>

                                        </div>

                                        <div class="col">
                                            <div class="d-flex inputDiv" style="">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                                    <span class="required">Name/signature:</span>
                                                </label>
                                                <input type="checkbox" id="flexCheckChecked" style="width: 12px;margin-top:5px">
                                                <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="0">
                                                <span style="padding-left:3px;color:#000">Do you want name signature?</span>
                                            </div>
                                            <div class="d-flex inputDiv" id="namesign" style="display: none !important;">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Name Signature:</span>
                                                </label>
                                                <input type="text" name="namesign" id="namesign_id" class="form-control form-control-solid">
                                            </div>
                                            <div class="d-flex inputDiv principleno" id="sign" style="">
                                                <label style="width:33%;" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Signature:</span>
                                                </label>
                                                <br />
                                                <canvas id="sig" ></canvas>
                                               
                                            </div>
                                            <div class="d-flex inputDiv principleno" id="sign" style="">
                                                <textarea id="signature" name="signed" style="opacity: 0" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- </div> -->

                            <div class="uploadDiv" style="padding-left: 10px;">
                                <div class="input-images"></div>
                            </div>
                            <br>
                            <button id="submitbutton" type="button" class="btn btn-primary float-end">Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $("input[name='principle_contractor']").change(function() {
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



    $("input[name='works_coordinator']").change(function() {
        if ($(this).val() == 1) {
            $("textarea[name='description_approval_temp_works']").show();
        } else {
            $("textarea[name='description_approval_temp_works']").hide();

        }
    })



    $("#flexCheckChecked1").change(function() {
        if ($(this).is(':checked')) {
            $("#signtype1").val(1);
            $("#namesign1").addClass('d-flex').show();
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


    $("#flexCheckChecked").change(function() {
        if ($(this).is(':checked')) {
            $("#signtype").val(1);
            $("#namesign").addClass('d-flex').show();
            $("input[name='namesign']").attr('required', 'required');
            $("#signature").removeAttr('required');
            $("#sign").removeClass('d-flex').hide();

        } else {
            $("#signtype").val(0);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#signature").attr('required', 'required');
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
     
    //  $('#permit_date').change(function() {
    //     $('#permit_date').css("background-color", "#f5f8fa ");
    //     $('#permit_date').css("color", "#000 !important;");
    //  });


            var canvas = document.getElementById("sig");
            var signaturePad = new SignaturePad(canvas);
            var canvas1 = document.getElementById("sig1");
            var signaturePad1 = new SignaturePad(canvas1);
            
            $("#submitbutton").on('click',function(){
                if(signaturePad)
                 {
                   $("#signature").val(signaturePad.toDataURL('image/png'));
                 }
                 if(signaturePad1)
                 {
                    $("#signature1").val(signaturePad1.toDataURL('image/png'));
                 }
                 $(this).attr('disabled','disabled');
                 $("#permitform").submit();
            })
           
            //  $('#clear').click(function(e) {
            //     e.preventDefault();
            //     signaturePad.clear();
            //     $("#signature").val('');
            // });
     
</script>
@endsection