@extends('layouts.dashboard.master',['title' => 'Permit To Load'])
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
        background-color: #e9edf1;
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
        background: transparent !important;
        border: none !important;
        color: #000;
    }

    .image-uploader .upload-text span {
        color: #000;
    }

    canvas {
        background: lightgray;
    }

    /*.form-control.form-control-solid{background-color:#000;color:#5e6278 !important;}*/

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
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <input type="hidden" name="permitid" value="{{$permitdata->id}}">
                    <input type="hidden" name="designer_company_email"
                        value="{{$tempdata->designer_company_email ?? ''}}" readonly>
                    <input type="hidden" name="design_requirement_text"
                        value="{{$tempdata->design_requirement_text ?? ''}}" readonly="readonly">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv d-block">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
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
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No:</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="000" id="no" name="projno" value="{{$project->no}}"
                                        readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname" value="{{$project->name}}"
                                        readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Drawing No:</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Drawing Number" id="drawing_no"
                                        name="drawing_no" value="{{$permitdata->drawing_no ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
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
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Date:
                                        </label>
                                        <input type="date" value="{{ date('Y-m-d') }}"
                                            class="form-control form-control-solid" placeholder="Date"
                                            style="background-color:#f5f8fa" name="date">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Permit No:</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Permit No" name="permit_no" value="{{$twc_id_no}}"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Drawing Title:</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Drawing Title"
                                            id="drawing_title" name="drawing_title"
                                            value="{{$permitdata->drawing_title ?? ''}}">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">TWS Name:</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="TWS Name" id="tws_name"
                                            name="tws_name" value="{{$permitdata->tws_name ?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Location of the temporary works:
                                    </label>
                                    <textarea name="location_temp_work" rows="2" cols="170"
                                        placeholder=" Location of the temporary works">{{$permitdata->location_temp_work ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Description of structure:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170"
                                        placeholder="Description of structure:">{{$permitdata->description_structure ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <div class="d-flex modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">MS / RA Number:</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="MS/RA Number" id="ms_ra_no"
                                        name="ms_ra_no" value="{{$permitdata->ms_ra_no ?? ''}}">
                                </div>
                            </div>
                            <h5 style="color: #000">Permit to Unload / Strike</h5>
                            <br>
                            <p style="color: #000;">1. Permanent works support by this temporary works have gained
                                sufficient strength to support the loading or use requirement. (See concrete cube
                                results and other PW design requirements below, if applicable.)
                                <br>
                                2. Sequence of removal of TW, where specified by the TWD, is understood by the
                                supervisor.
                                <br>
                                3. All standard safety measure executed (i.e. holes covered and protected, leading edge
                                protection, etc).
                                <br>
                                4. Risk assessment, method statement and/or associated task sheets in place.

                                <!--end::Option-->
                        </div>
                        <div class="container">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: left;" colspan="5">CONCRETE CUBE RESULTS (or overwrite
                                            with strength by maturity curve data)</th>

                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <tr>
                                        <td>Mix Design Details</td>
                                        <td>Unique Cube Ref No.</td>
                                        <td>Age of Cube</td>
                                        <td>Compressive Strength N/mm2</td>
                                        <td>Method of Curing</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mix_design_detail"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Mix Design Details">
                                        </td>
                                        <td>
                                            <input type="text" name="unique_ref_no"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Unique Cube Ref No">
                                        </td>
                                        <td>
                                            <input type="text" name="age_cube"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Age of Cube">
                                        </td>
                                        <td>
                                            <input type="text" name="compressive_strength"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Compressive Strength N/mm2">
                                        </td>
                                        <td>
                                            <input type="text" name="method_curing"
                                                class="form-control form-control-solid tableinput"
                                                placeholder="Enter Method of Curing">
                                        </td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>

                        <div class="col-md-12">
                            <h6 style="color:black">TWC to define the extents, limits and controls for this PTS (where
                                applicable)</h6>
                            <textarea name="twc_control_pts" rows="2" style="width:100%;"></textarea>

                            <h6 style="color:black">Back-propping and additional requirements; limitations and
                                exclusions; explanatory sketches references (if applicable)</h6>
                            <textarea name="back_propping" rows="2" style="width:100%;"></textarea>
                            <br>
                            <p style="color: black;"> I hereby authorise the temporary works to be struck out or removed
                                in accordance with the specified or approved unloading and striking method, subject to
                                observing the extents, limits and controls listed above. </p>

                        </div>
                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Principle Contractor approval required?</span>

                            </label>

                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <label>
                                    <input type="radio" class="btn-check" name="principle_contractor" value="1"
                                        @if(isset($permitdata) &&
                                        $permitdata->principle_contractor==1){{'checked'}}@endif/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                </label>
                                <label>
                                    <input type="radio" class="btn-check" name="principle_contractor" value="2"
                                        @if(isset($permitdata) &&
                                        $permitdata->principle_contractor==2){{'checked'}}@endif/>
                                    <span
                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                </label>
                            </div>
                        </div>

                        <div class="row" id="second_member">
                            <div class="col" style="flex:100% !important;">
                                <div class="d-flex inputDiv">
                                </div>
                                @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required" style="width: 27%">Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Name" id="name1" name="name1"
                                        value="{{old('name1',$permitdata->name1 ?? '')}}">
                                </div>
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required" style="width: 27%">Job Title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Job title" id="job_title1"
                                        name="job_title1" value="{{old('job_title1',$permitdata->job_title1 ?? '')}}">
                                </div>
                                @endif
                            </div>

                            <div class="col">
                                @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                <div class="d-flex inputDiv">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2"
                                        style="width:33% !important">
                                        <span class="required">Name/signature:</span>
                                    </label>
                                    <input type="checkbox" id="flexCheckChecked1" style="width: 12px;margin-top:5px">
                                    <input type="hidden" id="signtype1" name="signtype1"
                                        class="form-control form-control-solid" value="0">
                                    <span style="padding-left:3px;color:#000">Do you want name signature?</span>
                                </div>
                                <div class="d-flex inputDiv" id="namesign1" style="display: none !important;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign1" class="form-control">
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign1">
                                    <label style="width:33%;" class="d-flex align-items-center fs-6 fw-bold mb-2">
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
                            </div>

                        </div>


                        <!-- Second person -->


                        <div class="col" style="flex:100% !important;" id="second_member">

                            <div class="d-flex inputDiv">
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                    <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" class="form-control" placeholder="Name" id="name2" name="name"
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
                                        name="job_title" value="{{old('job_title',$permitdata->job_title ?? '')}}">
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
                                    <input type="date" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}"
                                        class="form-control form-control-solid">
                                </div>
                            </div>

                        </div>

                        <div class="col">
                            <!-- <div class="d-flex inputDiv" >
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
                                            <input type="text" name="namesign" class="form-control form-control-solid">
                                        </div> -->
                                        <div class="d-flex inputDiv">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:22% !important">
                                    <span>Type Signature:</span>
                                </label>
                                <!--end::Label-->
                                <input type="checkbox" class="" id="flexCheckChecked"
                                    style="width: 12px;margin-top:5px">
                                <input type="hidden" id="signtype" name="signtype"
                                    class="form-control form-control-solid" value="2">
                                <span style="padding-left:3px;color:#000;font-size:10px;line-height: 2">name
                                    signature?</span>
                                &nbsp;
                                <!--end::Label-->
                                <input type="checkbox" class="" id="pdfChecked" style="width: 12px;margin-top:5px">
                                <input type="hidden" id="pdfsign" name="pdfsigntype"
                                    class="form-control form-control-solid" value="0">
                                <span style="padding-left:3px;color:#000;font-size:10px;line-height: 2;">Pdf
                                    signature?</span>

                            </div>
                            <div class="inputDiv d-none" id="pdfsign">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Upload Signature:</span>
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
                            <div class="d-flex inputDiv upload_signature_div">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:21%">

                                </label>
                                <div class="d-flex inputDiv principleno" id="sign" style="">
                                    <div class="uploadingDiv">
                                        <div class="uploadDiv" style="padding-left: 10px;">
                                            <div class="input-images"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex inputDiv principleno" id="sign" style="">
                                        <div class="signatureDiv">
                                            <label style="width:33%;"
                                                class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Signature:</span>
                                            </label>
                                            <br />
                                            <canvas id="sig"></canvas>
                                        </div>
                                    </div>
                                </div>
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
                       
                            

                            <!-- <div class="d-flex inputDiv principleno" id="sign">
                                            <label style="width:33%;" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Signature:</span>
                                            </label>
                                            <br />
                                            <canvas id="sig" ></canvas>

                                        </div> -->
                            <div class="d-flex inputDiv principleno" id="sign">
                                <textarea id="signature" name="signed" style="opacity: 0" required></textarea>
                            </div>
                            <!-- </div> -->
                        </div>
                        <!-- </div> -->

                        <!-- </div> -->
                        <div class="col-md-12">
                            <!-- <div class="uploadDiv" style="padding-left: 10px;">
                                <div class="input-images"></div>
                            </div> -->
                            <br>
                            <button id="submitbutton" type="button" class="btn btn-primary float-end unload_button">Submit</button>
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



    $("#flexCheckChecked1").change(function () {
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
        alert();
        if ($(this).is(':checked')) {
            $("#pdfChecked").prop('checked', false);
            $("#signtype").val(1);
            $("#pdfsign").val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
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
