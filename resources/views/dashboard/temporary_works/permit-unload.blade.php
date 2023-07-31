@extends('layouts.dashboard.master',['title' => 'Permit To Unload'])
@section('styles')
<style>
    .aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60px !important;
    }

    /*.content {
        padding-top: 0px !important;
        background-color: #e9edf1 !important;
    }*/

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
        font-family: 'Inter', sans-serif;
    }

    #kt_content_container .card-title h2 {
        font-weight: 600;
        font-size: 32px;
    }


    #kt_toolbar_container {
        background-color: #fff;


    }

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
    }

    .card {
        margin: 30px 0px;
        border-radius: 10px;
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
        background-color: #f5f8fa;
    }

    table thead th {
        color: #000 !important;
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

    .tableinput {
        border: 1px solid lightgray !important;
        border-radius: 5px !important;
    }

    .image-uploader .upload-text span {
        color: #000;
    }

    canvas {
        background: lightgray;
    }


    .inputDiv {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 5px 5px;
    }

    .inputDiv label {
        width: fit-content !important;
        color: #000;
        position: absolute;
        bottom: 32px;
        background: white;
        font-family: 'Inter', sans-serif;
        width: fit-content;
    }

    .form-select.form-select-solid {
        background-color: #fff;
        color: #fff;
        border: none;
    }

    input {
        background-color: white;
    }

    .form-control.form-control-solid {
        background-color: white !important;
    }

    #tbody tr::nth-child(odd) {
        background: white
    }

    .table>tbody {
        vertical-align: middle;
    }

    /*.form-control.form-control-solid{background-color:#000;color:#5e6278 !important;}*/
    .twcTextArea:focus {
        border: 1px solid green
    }

    .twcTextArea:focus-visible {
        /* border: none !important; */
        border: 1px solid green;
        border-width: 0;
    }

    #kt_post {
        width: 75%
    }

    #kt_post input,
    #kt_post textarea {
        height: 32px
    }

    .permitUnloadList li {
        font-weight: 400;
        font-size: 14px;
    }

    #name1,
    #job_title1 {
        border: none
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
    }

    .btn-check:checked+.btn.btn-active-primary2 {
        background: #FFBF00;
    }
</style>
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" />
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container unload_Permit">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Permit to UnLoad</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form id="permitunload" action="{{route('permit.unload.save')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="text-danger"><strong>{{$error}} </strong></li>
                        @endforeach

                    </ul>

                    @endif
                    {{--
                    <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <input type="hidden" name="permitid" value="{{$permitdata->id}}">
                    <input type="hidden" name="designer_company_email"
                        value="{{$tempdata->designer_company_email ?? ''}}" readonly>
                    <input type="hidden" name="design_requirement_text"
                        value="{{$tempdata->design_requirement_text ?? ''}}" readonly="readonly">


                    <div class="row">
                        <div class="col-12">
                            <div class="inputDiv d-block mb-0">
                                <label class="fs-6 fw-bold mb-2" style="bottom:40px">
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

                            <div class="inputDiv d-block">
                                <div class="modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project No:</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="000" id="no" name="projno" value="{{$project->no}}"
                                        readonly="readonly">
                                </div>
                            </div>
                            <div class="inputDiv d-block">
                                <div class="modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname" value="{{$project->name}}"
                                        readonly="readonly">
                                </div>
                            </div>
                            <div class="inputDiv d-block">
                                <div class="modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Drawing No:</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Drawing Number" id="drawing_no"
                                        name="drawing_no" value="{{$permitdata->drawing_no ?? ''}}">
                                </div>
                            </div>
                            <div class="inputDiv d-block">
                                <div class="modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name:</span>
                                    </label>
                                    <input type="text" class="form-control " placeholder="TWC Name" name="twc_name"
                                        id="twc_name" value="{{$permitdata->twc_name ?? ''}}">
                                    <input type="hidden" name="twc_email" value="{{$tempdata->twc_email ?? ''}}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class=" inputDiv d-block">
                                    <div class=" modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            Date:
                                        </label>
                                        <input type="date" value="{{ date('Y-m-d') }}"
                                            class="form-control form-control-solid" placeholder="Date"
                                            style="background-color:#f5f8fa" name="date">
                                    </div>
                                </div>
                                <div class=" inputDiv d-block">
                                    <div class=" modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="required">Permit No:</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Permit No" name="permit_no" value="{{$twc_id_no}}"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class=" inputDiv d-block">
                                    <div class=" modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="required">Drawing Title:</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Drawing Title"
                                            id="drawing_title" name="drawing_title"
                                            value="{{$permitdata->drawing_title ?? ''}}">
                                    </div>
                                </div>
                                <div class=" inputDiv d-block">
                                    <div class=" modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="required">TWS Name:</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="TWS Name" id="tws_name"
                                            name="tws_name" value="{{$permitdata->tws_name ?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class=" inputDiv d-block">
                                <div class=" modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="bottom: 39px;">
                                        Location of the temporary works:
                                    </label>
                                    <textarea name="location_temp_work" rows="2" cols="170"
                                        placeholder=" Location of the temporary works">{{$permitdata->location_temp_work ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class=" inputDiv d-block">
                                <div class=" modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="bottom: 39px;">
                                        Description of structure:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170"
                                        placeholder="Description of structure:">{{$permitdata->description_structure ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class=" inputDiv d-block">
                                <div class=" modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">MS / RA Number:</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="MS/RA Number" id="ms_ra_no"
                                        name="ms_ra_no" value="{{$permitdata->ms_ra_no ?? ''}}">
                                </div>
                            </div>
                            <h5 style="color: #000; font-weight:600; font-size:24px">Permit to Unload / Strike</h5>
                            <br>
                            <ol style="color: #000;" class="permitUnloadList">
                                <li>
                                    Permanent works support by this temporary works have gained
                                    sufficient strength to support the loading or use requirement. (See concrete cube
                                    results and other PW design requirements below, if applicable.)
                                </li>
                                <li>
                                    Sequence of removal of TW, where specified by the TWD, is understood by the
                                    supervisor.
                                </li>
                                <br>
                                <li>
                                    All standard safety measure executed (i.e. holes covered and protected, leading edge
                                    protection, etc).
                                </li>
                                <br>
                                <li>Risk assessment, method statement and/or associated task sheets in place.</li>

                                <!--end::Option-->
                        </div>
                        <div class="">

                            <table class="table table-bordered"
                                style="border:1px solid lightgray; border-radius: 8px; overflow: hidden; border-collapse: separate;">
                                <thead>
                                    <tr>
                                        <th style="text-align: left; padding-left: 24px" colspan="5">CONCRETE CUBE
                                            RESULTS (or overwrite
                                            with strength by maturity curve data)</th>

                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <tr>
                                        <td class="col-md-4"
                                            style="padding-left: 25px;text-align: left; font-weight:500">Mix Design
                                            Details</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="mix_design_detail"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Mix Design Details">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Unique Cube Ref
                                            No.</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="unique_ref_no"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Unique Cube Ref No">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Age of Cube
                                        </td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="age_cube"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Age of Cube">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Compressive
                                            Strength N/mm2</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="compressive_strength"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Compressive Strength N/mm2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Method of
                                            Curing</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="method_curing"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Method of Curing">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="col-md-12">
                            <div class="inputDiv">
                                <label style="color:black; bottom: 38px">TWC to define the extents, limits and controls
                                    for this PTS (where
                                    applicable)</label>
                                <textarea name="twc_control_pts" class="twcTextArea" rows="2"
                                    style="width:100%;"></textarea>
                            </div>

                            <div class="inputDiv">
                                <label style="color:black; bottom: 38px">Back-propping and additional requirements;
                                    limitations and
                                    exclusions; explanatory sketches references (if applicable)</label>
                                <textarea name="back_propping" rows="2" style="width:100%;"></textarea>
                            </div>
                            <br>
                            <p style="color: black;"> I hereby authorise the temporary works to be struck out or removed
                                in accordance with the specified or approved unloading and striking method, subject to
                                observing the extents, limits and controls listed above. </p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv mt-7" style="min-height:40px; align-items: center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2" style="width:fit-content; bottom: 25px">
                                    <span>Approval via Email Required by the PCTWC</span>
                                </label>
                                <!--end::Label-->
                                <input type="checkbox" name="principle_contractor" value="1" id="approval"
                                    style="width: 12px;margin-left:11px;margin-right: 10px; opacity: 0.5">
                                <input type="hidden" name="approavalEmailReq" value="0">
                                <span class="tickboxalign" style="padding-left:3px;color:#000">Select if
                                    approval is required.</span>
                            </div>
                            
                        </div>
                        <div class="col-md-6 my-4" id="twc-email-box" class="twc-email-box">
                            <div class="inputDiv pc-twc mb-0 mt-6 d-flex" style="margin-top:10px !important;">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                    style="width:fit-content% !important">
                                    <span>PC TWC Email:</span>
                                </label>
                                <!--end::Label-->
                                <input type="email" class="form-control form-control-solid" name="pc_twc_email"
                                    id="pc-twc-email" placeholder="Email" value="" required="required">
                            </div>
                        </div>
                    </div>
                    <!-- Second person -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" inputDiv upload_signature_div mt-0">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                    style="width: fit-content; bottom:124px;">
                                    Photo Upload
                                </label>
                                <!-- <div class="principleno"  style=""> -->
                                <div class="" style="">
                                    <!-- <div class="uploadingDiv"> -->
                                    <div class="">
                                        <!-- <div class="uploadDiv"> -->
                                        <div class="">
                                            <!-- <div class="input-images"></div> -->
                                            <div class="input-images"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="d-flex inputDiv">
                                <label class="fs-6 fw-bold mb-2" style="bottom: 27px;">
                                    <span class="required">Principle Contractor approval required?</span>
                                </label>
                                <div class=" justify-content-end"
                                    style="position: relative; left:70%;background: white">
                                    <label style="position: initial; flex-grow: 0; background: white">
                                        <input type="radio" class="btn-check" name="approval_PC" value="1" /> 
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <label style="position: initial; flex-grow: 0; background: white">
                                        <input type="radio" class="btn-check" checked name="approval_PC" value="2" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6   mt-0" style="    min-height: 40px;margin-left:7px; ">
                            <div class="d-flex inputDiv">
                                <label class="fs-6 fw-bold mb-2" style="">
                                    <span >Comments:</span>
                                </label>
                                <textarea  name="comments" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" id="second_member">

                            {{-- <div class="d-flex inputDiv">
                            </div> --}}
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                    <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" class="form-control" placeholder="Name" id="name2" name="name1"
                                        value="{{old('name',$permitdata->name ?? '')}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                    <span class="required">Job title:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" class="form-control" placeholder="Job title" id="job_title"
                                        name="job_title1" value="{{old('job_title',$permitdata->job_title ?? '')}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                    <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" id="companyadmin" class="form-control form-control-solid"
                                        placeholder="Company" name="company" value="{{$project->company->name ?? ''}}"
                                        readonly="readonly">
                                    <input type="hidden" id="companyid" class="form-control form-control-solid"
                                        placeholder="Company" name="companyid" value="{{$project->company->id ?? ''}}"
                                        readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2" style="width: 27%">
                                    <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="date" name="date1" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}"
                                        class="form-control form-control-solid">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex inputDiv mb-1" style="border: none">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                        style="width:40% !important;font-size: 600 !important; font-size: 16px !important; white-space: nowrap">
                                        <span class="signatureTitle">Signature Type:</span>
                                    </label>
                                    <!--end::Label-->
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                        <input type="radio" class="checkbox-field" id="DrawCheck" checked=true
                                            style="width: 12px;">
                                        <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="0"> -->
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
                                            style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content; white-space: nowrap">PNG/JPG
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
                        </div>
                        <div class="col-md-6 d-none" id="first_member">
                            <div class="col" style="flex:100% !important;">
                                {{-- <div class="d-flex inputDiv">
                                </div> --}}
                                <!-- @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                @endif -->
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required" style="width: 27%">Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Name" id="name1" name="name1">
                                    {{-- value="{{old('name1',$permitdata->name1 ?? '')}}" --}}
                                </div>
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required" style="width: 27%">Job Title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Job title" id="job_title1"
                                        name="job_title1">
                                    {{-- value="{{old('job_title1',$permitdata->job_title1 ?? '')}}" --}}
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input" style="width: 100%">
                                        <input type="text" id="companyadmin1" class="form-control form-control-solid"
                                            placeholder="Company" name="company1">
                                        <input type="hidden" id="companyid1" class="form-control form-control-solid"
                                            placeholder="Company" name="companyid1">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2" style="width: 27%">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input">
                                        <input type="date" name="date2" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}"
                                            class="form-control form-control-solid">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex inputDiv mb-1" style="border: none">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                            style="width:40% !important;font-size: 600 !important; font-size: 16px !important; white-space: nowrap">
                                            <span class="signatureTitle">Signature Type:</span>
                                        </label>
                                        <!--end::Label-->
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true
                                                style="width: 12px;">
                                            <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="0"> -->
                                            <span
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                        </div>
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="" id="flexCheckChecked1" style="width: 12px;">
                                            <input type="hidden" id="signtype" name="signtype"
                                                class="form-control form-control-solid" value="2">
                                            <span
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Name</span>
                                        </div>
                                        &nbsp;
                                        <!--end::Label-->
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="" id="pdfChecked1" style="width: 12px;">
                                            <input type="hidden" id="pdfsign1" name="pdfsigntype1"
                                                class="form-control form-control-solid" value="0">
                                            <span
                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content; white-space: nowrap">PNG/JPG
                                                Upload </span>
                                        </div>

                                    </div>
                                    <div class="d-flex inputDiv my-0" id="sign1"
                                        style="align-items: center;border:none">
                                        <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Signature:</span>
                                                </label>
                                                <br/> -->
                                        <canvas id="sig1" onblure="draw()"
                                            style="background: lightgray; border-radius:10px"></canvas>
                                        <br />
                                        <textarea id="signature1" name="signed1" style="display: none"></textarea>
                                        <span id="clear" class="fa fa-undo cursor-pointer"
                                            style="line-height: 6; position:relative; top:51px; right:26px"></span>
                                    </div>
                                    <div class="inputDiv d-none" id="pdfsign1">
                                        <label class="fs-6 fw-bold mb-2" style="width: fit-content">
                                            <span class="required">Upload Signature: Allowed format (PNG, JPG)</span>
                                        </label>
                                        <input type="file" name="pdfphoto1" class="form-control" accept="image/*">
                                    </div>

                                    <div class="d-none inputDiv" id="namesign1">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name Signature:</span>
                                        </label>
                                        <input type="text" name="namesign1" class="form-control form-control-solid">
                                    </div>
                                </div>

                            </div>

                            <!-- <div class="col">
                                @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                <div class="d-flex inputDiv">
                                    <label class="fs-6 fw-bold mb-2"
                                        style="width:33% !important">
                                        <span class="required">Name/signature:</span>
                                    </label>
                                    <input type="checkbox" id="flexCheckChecked1" style="width: 12px;margin-top:5px">
                                    <input type="hidden" id="signtype1" name="signtype1"
                                        class="form-control form-control-solid" value="0">
                                    <span style="padding-left:3px;color:#000">Do you want name signature?</span>
                                </div>
                                <div class="d-flex inputDiv" id="namesign1" style="display: none !important;">
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign1" class="form-control">
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign1">
                                    <label style="width:33%;" class="fs-6 fw-bold mb-2">
                                        <span class="required">Signature:</span>
                                    </label>
                                    <br />
                                    <canvas id="sig1"></canvas>
                                    <br />

                                </div>
                                <div class="d-flex inputDiv principleno" id="sign1">
                                    <textarea id="signature1" name="signed1" style="opacity: 0"></textarea>
                                </div>
                                @endif
                            </div> -->

                        </div>
                    </div>



                    <div class="row">


                    </div>
                    <!-- </div> -->

                    <!-- </div> -->
                    <div class="col-md-12">
                        <!-- <div class="uploadDiv" style="padding-left: 10px;">
                                <div class="input-images"></div>
                            </div> -->
                        <br>
                        <button id="submitbutton" type="button" class="btn btn-primary unload_button">Submit</button>
                        {{-- <div class="d-flex inputDiv principleno" id="sign">
                            <textarea id="signature" name="signed" style="opacity: 0" required></textarea>
                        </div> --}}
                    </div>
                    </p>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    document.getElementById("twc-email-box").classList.add("d-none");
     $("#approval").change(function () {
        if ($(this).is(':checked')) {
            document.getElementById("twc-email-box").classList.remove("d-none")
            $(".pc-twc").removeClass('d-none').removeClass('d-flex');
            $("#pc-twc-email").attr('required', 'required');
            $('input[name="approavalEmailReq"]').val(1);
        } else {
            $("#twc-email-box").removeClass('d-none');
            $(".pc-twc").removeClass('d-flex').addClass('d-none');
            $("#pc-twc-email").removeAttr('required');
            $('input[name="approavalEmailReq"]').val(0);
        }
    })
    $("input[name='approval_PC']").change(function () {
        if ($(this).val() == 1) {
            $("#first_member").removeClass('d-none');
            $("input[name='name1']").attr('required', 'required');
            $("input[name='job_title1']").attr('required', 'required');
            // document.getElementById("twc-email-box").classList.remove("d-none")
            

        } else {
            $("#first_member").addClass('d-none');
            $("input[name='name1']").removeAttr('required');
            $("input[name='job_title1']").removeAttr('required');
            // document.getElementById("twc-email-box").classList.add("d-none")
        }
    })



    $("input[name='works_coordinator']").change(function () {
        if ($(this).val() == 1) {
            $("textarea[name='description_approval_temp_works']").show();
        } else {
            $("textarea[name='description_approval_temp_works']").hide();

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
            $("#sign1").addClass('d-flex');
           
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

    $("#flexCheckChecked1").change(function () {
        if ($(this).is(':checked')) {
            $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            $("#sigimage").hide();
            $("#DrawCheck1").prop('checked',false);
            $("#pdfChecked1").prop('checked',false);
            $("#signtype1").val(1);
            $("#namesign1").removeClass('d-none');
            $("#namesign1").addClass('d-flex');
            $("div#pdfsign1").addClass('d-none');
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
    $("#pdfChecked1").change(function () {
        if ($(this).is(':checked')) {
            $("#DrawCheck1").prop('checked',false);
            $("#flexCheckChecked1").prop('checked',false);
            $("#signtype1").val(1);
            $("div#pdfsign1").removeClass('d-none');
            $("#namesign1").addClass('d-none');
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
        // document.getElementById("namesign").classList.remove("d-none") 
        // document.getElementById("namesign").style.display = 'block'; 
        // document.getElementById("sign").classList.add("d-none") 
        // document.getElementById("pdfsign").classList.add("d-none") 
        // // sign
        // // pdfsign
        // alert();
        if ($(this).is(':checked')) {
            if($("#DrawCheck1").is(':checked')==true){
                $("#sigimage").hide();
            }else{
                $("#sigimage").hide();
                $("#sigimage1").hide();
                $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            }
            $("#pdfChecked").prop('checked', false);
            $("#DrawCheck").prop('checked', false);
            $("#signtype").val(1);
            $("#pdfsign").val(0);
            $('#Drawtype').val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("div#sign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
            $(".customSubmitButton").removeClass("hideBtn");
            $(".customSubmitButton").addClass("showBtn");
            $("input[name='pdfsign']").removeAttr('required');
            $("input[name='namesign']").attr('required', 'required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
            $()

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

    $("#pdfChecked").change(function () {

        if ($(this).is(':checked')) {
            $("#flexCheckChecked").prop('checked', false);
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

    $('#clear').click(function(e) {
    e.preventDefault();
    signaturePad.clear();
    $("#signature").val('');
    });


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
        $('#name1').css("background-color", "#fff ");
    });
    $('#job_title1').change(function () {
        $('#job_title1').css("background-color", "#fff");
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
    var canvas = document.getElementById("sig");
    var signaturePad = new SignaturePad(canvas);
    var canvas1 = document.getElementById("sig1");
    if (canvas1) {
        var signaturePad1 = new SignaturePad(canvas1);
    }

    $("#submitbutton").on('click', function () {
        $("#signature").val(signaturePad.toDataURL('image/png'));
        if (canvas1) {
            console.log("hello");
            $("#signature1").val(signaturePad1.toDataURL('image/png'));
        }
        $("#permitunload").submit();
    });

</script>
@endsection