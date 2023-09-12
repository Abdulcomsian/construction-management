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

    /* canvas {
        background: lightgray;
    } */


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

    /* #kt_post input,
    #kt_post textarea {
        height: 32px
    } */

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
<link rel="stylesheet" href="{{asset('pdf-editor/viewer.css')}}" />
<script>
    var baseUrl = "{{ env('APP_URL') }}";
    var CSRF_TOKEN = '{{ csrf_token() }}';
</script>
<link rel="resource" type="application/l10n" href="https://mozilla.github.io/pdf.js/web/locale/locale.properties" />
<script defer src="https://cdn.jsdelivr.net/npm/es-module-shims@1.4.7/dist/es-module-shims.js">
</script>

<script type="importmap-shim">
    {
      "imports": {
        "pdfjs": "{{ asset('pdf-editor/src/pdf.js') }}",
        "pdfjs-lib": "{{ asset('pdf-editor/src/pdf.js') }}",
        "pdfjs-web/": "{{ asset('pdf-editor') }}",

        "web-annotation_editor_params": "{{asset('pdf-editor/annotation_editor_params.js')}}",
        "web-com": "{{asset('pdf-editor/genericcom.js')}}",
        "web-pdf_attachment_viewer": "{{ asset('pdf-editor/pdf_attachment_viewer.js') }}",
        "web-pdf_cursor_tools": "{{ asset('pdf-editor/pdf_cursor_tools.js') }}",
        "web-pdf_document_properties": "{{ asset('pdf-editor/pdf_document_properties.js') }}",
        "web-pdf_find_bar": "{{ asset('pdf-editor/pdf_find_bar.js') }}",
        "web-pdf_layer_viewer": "{{ asset('pdf-editor/pdf_layer_viewer.js') }}",
        "web-pdf_outline_viewer": "{{ asset('pdf-editor/pdf_outline_viewer.js') }}",
        "web-pdf_presentation_mode": "{{ asset('pdf-editor/pdf_presentation_mode.js') }}",
        "web-pdf_sidebar": "{{ asset('pdf-editor/pdf_sidebar.js') }}",
        "web-pdf_thumbnail_viewer": "{{ asset('pdf-editor/pdf_thumbnail_viewer.js') }}",
        "web-print_service": "{{ asset('pdf-editor/pdf_print_service.js') }}",
        "web-secondary_toolbar": "{{ asset('pdf-editor/secondary_toolbar.js') }}",
        "web-toolbar": "{{ asset('pdf-editor/toolbar.js') }}"
      }
    }
</script>
<script src="{{ asset('pdf-editor/viewer.js?v=1') }}" type="module-shim"></script>
<style>
    .modal-content {
        height: 90vh;
    }

    .modal-content .modal-body {
        background-color: rgba(42, 42, 46, 1);
    }
</style>
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
                    <h2>Permit to Unload - Edit</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form id="permitunload" action="{{route('permit.unload.update')}}" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" name="designer_company_email" value="{{$tempdata->designer_company_email ?? ''}}" readonly>
                    <input type="hidden" name="design_requirement_text" value="{{$tempdata->design_requirement_text ?? ''}}" readonly="readonly">


                    <div class="row">
                        <div class="col-12">
                            <div class="inputDiv d-block mb-0">
                                <label class="fs-6 fw-bold mb-2" style="bottom:40px">
                                    <span class="required">Select Project:</span>
                                </label>
                                <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" readonly>
                                    <option value="">Select Option</option>
                                    <option value="{{$project->id}}" selected="selected">
                                        {{$project->name .' - '. $project->no}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="modalDiv d-block mt-md-11" id="drawingFieldDiv">
                                <label class="fs-6 fw-bold set">
                                    <span class="required">Select Drawing : </span>
                                </label>
                                <select id="drawingDropDown" class="form-select" name="drawing" style="border-radius: 9px;">
                                    <option value="">Select PDF</option>
                                    @foreach($temporary_work_files as $upload)
                                    <option value="{{ env('APP_URL').$upload->file_name }}">{{ $upload->drawing_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="customFieldDiv">
                            <div class="modalDiv d-block mt-md-11">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold">
                                    <span>Upload Custom Drawing:</span>
                                </label>
                                <!--end::Label-->
                                <input type="file" style="border-radius: 9px;" class="form-control" id="custom_drawing" name="custom_drawing" value="" accept="image/*;capture=camera">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="files_div">
                            </div>
                            <div id="new_div" class="m-md-2">
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
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{$project->no}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="inputDiv d-block">
                                <div class="modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" id="name" name="projname" value="{{$project->name}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="inputDiv d-block">
                                <div class="modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Drawing No:</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Drawing Number" id="drawing_no" name="drawing_no" value="{{$permitdata->drawing_no ?? ''}}">
                                </div>
                            </div>
                            <div class="inputDiv d-block">
                                <div class="modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name:</span>
                                    </label>
                                    <input type="text" class="form-control " placeholder="TWC Name" name="twc_name" id="twc_name" value="{{$permitdata->twc_name ?? ''}}">
                                    <input type="hidden" name="twc_email" value="{{$tempdata->twc_email ?? ''}}" readonly>
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
                                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" style="background-color:#f5f8fa" name="date">
                                    </div>
                                </div>
                                <div class=" inputDiv d-block">
                                    <div class=" modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="required">Permit No:</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Permit No" name="permit_no" value="{{$twc_id_no}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class=" inputDiv d-block">
                                    <div class=" modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="required">Drawing Title:</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Drawing Title" id="drawing_title" name="drawing_title" value="{{$permitdata->drawing_title ?? ''}}">
                                    </div>
                                </div>
                                <div class=" inputDiv d-block">
                                    <div class=" modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">
                                            <span class="required">TWS Name:</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="TWS Name" id="tws_name" name="tws_name" value="{{$permitdata->tws_name ?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class=" inputDiv d-block">
                                <div class=" modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="bottom: 46px;">
                                        Location of the temporary works:
                                    </label>
                                    <textarea name="location_temp_work"  rows="2" cols="170" placeholder=" Location of the temporary works">{{$permitdata->location_temp_work ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class=" inputDiv d-block">
                                <div class=" modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="bottom: 46px;">
                                        Description of structure:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170" placeholder="Description of structure:">{{$permitdata->description_structure ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class=" inputDiv d-block">
                                <div class=" modalDiv d-block">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">MS / RA Number:</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="MS/RA Number" id="ms_ra_no" name="ms_ra_no" value="{{$permitdata->ms_ra_no ?? ''}}">
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

                            <table class="table table-bordered" style="border:1px solid lightgray; border-radius: 8px; overflow: hidden; border-collapse: separate;">
                                <thead>
                                    <tr>
                                        <th style="text-align: left; padding-left: 24px" colspan="5">CONCRETE CUBE
                                            RESULTS (or overwrite
                                            with strength by maturity curve data)</th>

                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <tr>
                                        <td class="col-md-4" style="padding-left: 25px;text-align: left; font-weight:500">Mix Design
                                            Details</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="mix_design_detail" class="form-control form-control-solid tableinput" placeholder="Enter Mix Design Details" value= "{{$permitdata->mix_design_detail ?? ''}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Unique Cube Ref
                                            No.</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="unique_ref_no" class="form-control form-control-solid tableinput" placeholder="Enter Unique Cube Ref No" value= "{{$permitdata->unique_ref_no ?? ''}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Age of Cube
                                        </td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="age_cube" class="form-control form-control-solid tableinput" placeholder="Enter Age of Cube" value= "{{$permitdata->age_cube ?? ''}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Compressive
                                            Strength N/mm2</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="compressive_strength" class="form-control form-control-solid tableinput" placeholder="Enter Compressive Strength N/mm2" value= "{{$permitdata->compressive_strength ?? ''}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 25px;text-align: left; font-weight:500">Method of
                                            Curing</td>
                                        <td style="padding-right:28px">
                                            <input type="text" name="method_curing" class="form-control form-control-solid tableinput" placeholder="Enter Method of Curing" value= "{{$permitdata->method_curing ?? ''}}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="col-md-12">
                            <div class="inputDiv">
                                <label style="color:black; bottom: 45px">TWC to define the extents, limits and controls
                                    for this PTS (where
                                    applicable)</label>
                                <textarea name="twc_control_pts" class="twcTextArea" rows="2" style="width:100%;">{{$permitdata->twc_control_pts ?? ''}}</textarea>
                            </div>

                            <div class="inputDiv">
                                <label style="color:black;" class="mb-5">Back-propping and additional requirements;
                                    limitations and
                                    exclusions; explanatory sketches references (if applicable)</label>
                                <textarea name="back_propping" class="pt-2" rows="2" style="width:100%;">{{$permitdata->back_propping ?? ''}}</textarea>
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
                                <input type="checkbox" checked name="principle_contractor" value="1" id="approval" style="width: 12px;margin-left:11px;margin-right: 10px; opacity: 0.5">
                                <input type="hidden" name="approavalEmailReq" value="0">
                                <span class="tickboxalign" style="padding-left:3px;color:#000">Select if
                                    approval is required.</span>
                            </div>

                        </div>
                        <div class="col-md-6 my-4" id="twc-email-box" class="twc-email-box">
                            <div class="inputDiv pc-twc mb-0 mt-6 d-flex" style="margin-top:10px !important;">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:fit-content !important;">
                                    <span>PC TWC Email:</span>
                                </label>
                                <!--end::Label-->
                                <input type="email" class="form-control form-control-solid" name="pc_twc_email" id="pc-twc-email" placeholder="Email" value="{{$permitdata->pc_twc_email ?? ''}}" required="required">
                            </div>
                        </div>
                    </div>
                    <!-- Second person -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" inputDiv upload_signature_div mt-0">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: fit-content; bottom:124px;">
                                    Photo Upload
                                </label>
                                <!-- <div class="principleno"  style=""> -->
                                <div class="">
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
                        <div class="col-md-6   mt-0" style="    min-height: 40px;margin-left:7px; ">
                            <div class="d-flex inputDiv">
                                <label class="fs-6 fw-bold mb-8">
                                    <span>Comments:</span>
                                </label>
                                <textarea name="comments" class="form-control pt-2">{{$permitdata->comments ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv">
                                <label class="fs-6 fw-bold mb-2" style="bottom: 27px;">
                                    <span class="required">Principle Contractor approval required?</span>
                                </label>
                                <div class=" justify-content-end" style="position: relative; left:70%;background: white">
                                    <label style="position: initial; flex-grow: 0; background: white">
                                        <input type="radio" class="btn-check" name="approval_PC" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <label style="position: initial; flex-grow: 0; background: white">
                                        <input type="radio" class="btn-check" checked name="approval_PC" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" id="second_member" style="margin-top: 2rem;">
                            {{-- <div class="d-flex inputDiv">
                            </div> --}}
                            <div class="d-flex inputDiv principleno mt-0">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                    <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{$permitdata->name ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                    <span class="required">Job title:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" class="form-control" placeholder="Job title" id="job_title" name="job_title" value="{{$permitdata->job_title ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                    <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" id="companyadmin" class="form-control form-control-solid" placeholder="Company" name="company" value="{{$project->company->name ?? ''}}" readonly="readonly">
                                    <input type="hidden" id="companyid" class="form-control form-control-solid" placeholder="Company" name="companyid" value="{{$project->company->id ?? ''}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv d-block">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2" style="width: 27%">
                                    <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="date" name="date1" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
                                </div>
                            </div>
                            @if(!isset($permitdata->signature) && $permitdata->signature != null)
                            <div class="col">
                                <div class="d-flex flex-column" style="border: none">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold" style="width:40% !important;font-size: 600 !important; font-size: 16px !important; white-space: nowrap">
                                        <span class="signatureTitle">Signature Type:</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="d-flex flex-row">
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="checkbox-field" id="DrawCheck" checked=true style="width: 12px;">
                                            <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="0"> -->
                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2">Draw</span>
                                        </div>
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="" id="flexCheckChecked" style="width: 12px;">
                                            <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="1">
                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2">Name</span>
                                        </div>
                                        <!--end::Label-->
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input type="radio" class="" id="pdfChecked" style="width: 12px;">
                                            <input type="hidden" id="pdfsign" name="pdfsigntype" class="form-control form-control-solid" value="0">
                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2; min-width: fit-content; white-space: nowrap">PNG/JPG
                                                Upload </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex inputDiv my-0" id="sign" style="align-items: center;border:none">
                                    <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Signature:</span>
                                            </label>
                                            <br/> -->
                                    <canvas id="sig" onblure="draw()" style="background: lightgray; border-radius:10px"></canvas>
                                    <br />
                                    <textarea id="signature" name="signed" style="display: none"></textarea>
                                    <span id="clear" class="fa fa-undo btn--clear cursor-pointer" style="line-height: 6; position:relative; top:51px; right:26px"></span>
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
                            @else
                            <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$permitdata->signature)}}" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-6" id="first_member" style="display: {{ (isset($permitdata->name1) && $permitdata->name1 != null) ? 'block' : 'none' }}; margin-top: 2rem;">
                            <div class="col" style="flex:100% !important;">
                                {{-- <div class="d-flex inputDiv">
                                </div> --}}
                                <!-- @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                @endif -->
                                @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                <div class="d-flex inputDiv principleno mt-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required" style="width: 27%">Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Name" id="name1" name="name1" value = "">
                                    
                                </div>
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required" style="width: 27%">Job Title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control" placeholder="Job title" id="job_title1" name="job_title1" value = "{{$permitdata->job_title1 ?? ''}}">
                                    {{-- value="{{old('job_title1',$permitdata->job_title1 ?? '')}}" --}}
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 27%">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input" style="width: 100%">
                                        <input type="text" id="companyadmin1" class="form-control form-control-solid" placeholder="Company" name="company1" value = "{{$project->company->name ?? ''}}">
                                        <input type="hidden" id="companyid1" class="form-control form-control-solid" placeholder="Company" name="companyid1" value="{{$project->company->id ?? ''}}">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2" style="width: 27%">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input">
                                        <input type="date" name="date2" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
                                    </div>
                                </div>
                                @endif
                                @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                @if(!isset($permitdata->signature1) && empty($permitdata->signature1))
                                <div class="col">
                                    <div class="d-flex flex-column" style="border: none">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold" style="width:40% !important;font-size: 600 !important; font-size: 16px !important; white-space: nowrap">
                                            <span class="signatureTitle">Signature Type:</span>
                                        </label>
                                        <!--end::Label-->
                                        <div class="d-flex flex-row">
                                            <div style="display:flex; align-items: center; padding-left:10px">
                                                <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true style="width: 12px;">
                                                <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="0"> -->
                                                <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2">Draw</span>
                                            </div>
                                            <div style="display:flex; align-items: center; padding-left:10px">
                                                <input type="radio" class="" id="flexCheckChecked1" style="width: 12px;">
                                                <input type="hidden" id="signtype1" name="signtype1" class="form-control form-control-solid" value="2">
                                                <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2">Name</span>
                                            </div>
                                            &nbsp;
                                            <!--end::Label-->
                                            <div style="display:flex; align-items: center; padding-left:10px">
                                                <input type="radio" class="" id="pdfChecked1" style="width: 12px;">
                                                <input type="hidden" id="pdfsign1" name="pdfsigntype1" class="form-control form-control-solid" value="0">
                                                <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2; min-width: fit-content; white-space: nowrap">PNG/JPG
                                                    Upload </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex inputDiv m-0" id="sign1" style="align-items: center;border:none">
                                        <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Signature:</span>
                                                </label>
                                                <br/> -->
                                        <canvas id="sig1" onblure="draw()" style="background: lightgray; border-radius:10px"></canvas>
                                        <br />
                                        <textarea id="signature1" name="signed1" style="display: none"></textarea>
                                        <span id="clear1" class="fa fa-undo btn--clear cursor-pointer" style="line-height: 6; position:relative; top:51px; right:26px"></span>
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
                                @else
                                <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$permitdata->signature1)}}" width="100%" />
                                @endif
                                @endif
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
                        <div class="col-md-6" id="third_member" style="display: {{ (isset($permitdata->signatures[0]->name) && $permitdata->signatures[0]->name != null) ? 'block' : 'none' }}; margin-top: 2rem;">
                            <!-- <div class="d-flex inputDiv d-block">
                                        </div> -->
                            <div class="d-flex inputDiv principleno mt-0">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name3" name="name3" value="{{$permitdata->signatures[0]->name ?? ''}}" style="color:#5e6278" {{ isset($permitdata->signatures[0]->name) && $permitdata->signatures[0]->name != null ? 'readonly' : '' }}>
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Job Title:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Job Title" id="job_title3" name="job_title3" value="{{$permitdata->signatures[0]->job_title ?? ''}}" {{ isset($permitdata->signatures[0]->job_title) && $permitdata->signatures[0]->job_title != null ? 'readonly' : '' }}>
                            </div>
                            <div class="d-flex inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" id="companyadmin3" class="form-control form-control-solid" placeholder="Company" name="company3" value="{{$permitdata->signatures[0]->company ?? ''}}" {{ isset($permitdata->signatures[0]->company) && $permitdata->signatures[0]->company != null ? 'readonly' : '' }}>
                                    <!-- name="company1" -->
                                    <input type="hidden" id="companyid3" class="form-control form-control-solid" placeholder="Company" name="companyid3" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                    <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="date" name="date3" style="background-color:#f5f8fa" value="{{$permitdata->signatures[0]->date ?? ''}}" class="form-control form-control-solid" {{ isset($permitdata->signatures[0]->date) && $permitdata->signatures[0]->date != null ? 'readonly' : '' }}>
                                    <!-- name="date1" -->
                                </div>
                            </div>
                            @if(!isset($permitdata->signatures[0]) && empty($permitdata->signatures[0]->signature))
                            <div class="col">
                                <div class="d-flex flex-column" style="border: none">
                                    <label class="fs-6 fw-bold" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                        <span class="signatureTitle" style="white-space: nowrap">Signature
                                            Type:</span>
                                    </label>
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                        <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true style="width: 12px;">
                                        <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
                                        <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2">Draw</span>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                {{-- //old COde --}}
                                <div class="d-flex inputDiv" id="namesign3" style="display: none !important;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign3" id="namesign_id3" class="form-control form-control-solid">
                                </div>
                                <div class="d-flex inputDiv principleno m-0" id="sign3" style="border:none !important;">
                                    <canvas id="sig3" style="border-radius: 9px; background: lightgray;"></canvas>
                                    <span id="clear3" class="fa fa-undo cursor-pointer btn--clear" style="line-height: 11; position:relative; top:51px; right:26px"></span>
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign3" style=" display: none !important">
                                    <textarea id="signature3" name="signed3" style="opacity: 0"></textarea>
                                </div>
                            </div>
                            @else
                            <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$permitdata->signatures[0]->signature)}}" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-6" id="fourth_member" style="display: {{ isset($permitdata->signatures[1]->name) &&      $permitdata->signatures[1]->name != null ? 'block' : 'none' }}; margin-top: 2rem;">
                            <!-- <div class="d-flex inputDiv d-block">
                                        </div> -->
                            <div class="d-flex inputDiv principleno mt-0">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name4" name="name4" style="color:#5e6278" value = "{{$permitdata->signatures[1]->name ?? ''}}">
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Job Title:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Job Title" id="job_title4" name="job_title4" value = "{{$permitdata->job_title4 ?? ''}} ">
                            </div>
                            <div class="d-flex inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" id="companyadmin4" class="form-control form-control-solid" placeholder="Company" name="company4" value = "{{$permitdata->signatures[1]->company ?? ''}}">
                                    <!-- name="company1" -->
                                    <input type="hidden" id="companyid4" class="form-control form-control-solid" placeholder="Company" name="companyid" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                    <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="date" name="date4" style="background-color:#f5f8fa" value="{{$permitdata->signatures[1]->date ?? ''}}" class="form-control form-control-solid">
                                    <!-- name="date1" -->
                                </div>
                            </div>
                            @if(!isset($permitdata->signatures[1]) && empty($permitdata->signatures[1]->signature))
                            <div class="col">
                                <div class="d-flex flex-column" style="border: none">
                                    <label class="fs-6 fw-bold" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                        <span class="signatureTitle" style="white-space: nowrap">Signature
                                            Type:</span>
                                    </label>
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                        <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true style="width: 12px;">
                                        <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
                                        <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2">Draw</span>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                {{-- //old COde --}}
                                <div class="d-flex" id="namesign1" style="display: none !important;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign4" id="namesign_id4" class="form-control form-control-solid">
                                </div>
                                <div class="d-flex inputDiv principleno m-0" id="sign4" style="border:none !important;">
                                    {{-- <br /> --}}
                                    <canvas id="sig4" style="border-radius: 9px; background: lightgray;"></canvas>
                                    <span id="clear4" class="fa fa-undo cursor-pointer btn--clear" style="line-height: 11; position:relative; top:51px; right:26px"></span>
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign4" style=" display: none !important">
                                    <textarea id="signature4" name="signed4" style="opacity: 0"></textarea>
                                </div>
                            </div>
                            @else
                            <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$permitdata->signatures[1]->signature)}}" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-6" id="fifth_member" style="display: {{ isset($permitdata->signatures[2]->name) && $permitdata->signatures[2]->name != null ? 'block' : 'none' }}: none; margin-top: 2rem;">
                            <div class="d-flex inputDiv principleno mt-0">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Name:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Name" id="name5" name="name5" style="color:#5e6278" value = "{{$permitdata->signatures[2]->name ?? ''}}">
                            </div>
                            <div class="d-flex inputDiv principleno">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Job Title:</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Job Title" id="job_title5" name="job_title5" value = "{{$permitdata->signatures[2]->job_title ?? ''}}">
                            </div>
                            <div class="d-flex inputDiv ">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Company: </span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="text" id="companyadmin5" class="form-control form-control-solid" placeholder="Company" name="company5" value="{{$permitdata->signatures[2]->company5 ?? ''}}">
                                    <!-- name="company1" -->
                                    <input type="hidden" id="company5" class="form-control form-control-solid" placeholder="Company" name="company5" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                    <span class="required">Date:</span>
                                </label>
                                <!--end::Label-->
                                <div class="input">
                                    <input type="date" name="date5" style="background-color:#f5f8fa" value="{{$permitdata->signatures[2]->date ?? ''}}" class="form-control form-control-solid">
                                    <!-- name="date1" -->
                                </div>
                            </div>
                            @if(!isset($permitdata->signatures[2]) && empty($permitdata->signatures[2]->signature))
                            <div class="col">
                                <div class="d-flex flex-column" style="border: none">
                                    <label class="fs-6 fw-bold" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                        <span class="signatureTitle" style="white-space: nowrap">Signature
                                            Type:</span>
                                    </label>
                                    <div style="display:flex; align-items: center; padding-left:10px">
                                        <input type="radio" class="checkbox-field" id="DrawCheck1" checked=true style="width: 12px;">
                                        <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
                                        <span style="padding-left:14px;font-family: 'Inter', sans-serif; color:#000;font-size:14px;line-height: 2">Draw</span>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                {{-- //old COde --}}
                                <div class="d-flex align-items-center" id="namesign1" style="display: none !important;">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign5" id="namesign_id5" class="form-control form-control-solid">
                                </div>

                                <div class="d-flex inputDiv principleno m-0" id="sign5" style="border:none !important;">
                                    {{-- <label style="width:33%"
                                                class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Signature:</span>
                                            </label> --}}
                                    {{-- <br /> --}}
                                    <canvas id="sig5" style="border-radius: 9px; background: lightgray;"></canvas>
                                    <span id="clear5" class="fa fa-undo cursor-pointer btn--clear" style="line-height: 11; position:relative; top:51px; right:26px"></span>
                                </div>
                                <div class="d-flex inputDiv principleno" id="sign4" style=" display: none !important">
                                    <textarea id="signature5" name="signed5" style="opacity: 0"></textarea>
                                </div>
                            </div>
                        </div>
                        @else
                        <img style="background-color: #D3D3D3; border-radius: 15px; width: 300px;" src="{{asset('temporary/signature/'.$permitdata->signatures[2]->signature)}}" width="100%" />
                        @endif
                    </div>

                    <div>
                        <button class="btn btn-success btn-sm mt-8" id="addMemberButton">Add New</button>
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
                        <input type = "hidden" name = "id" value = "{{$permitdata->id}}">
                        <button id="submitbutton" type="button" class="btn btn-secondary unload_button">Submit</button>
                        <button name="action" id="draft" value="draft" type="button" class="btn btn-success  set-button">Save as Draft</button>
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
{{-- this is newly added code for edit pdf modal --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PDF Editor</h5>
                <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="outerContainer">
                    <div id="sidebarContainer">
                        <div id="toolbarSidebar">
                            <div id="toolbarSidebarLeft">
                                <div id="sidebarViewButtons" class="splitToolbarButton toggled" role="radiogroup">
                                    <button id="viewThumbnail" class="toolbarButton toggled" title="Show Thumbnails" tabindex="2" data-l10n-id="thumbs" role="radio" aria-checked="true" aria-controls="thumbnailView">
                                        <span data-l10n-id="thumbs_label">Thumbnails</span>
                                    </button>
                                    <button id="viewOutline" class="toolbarButton" title="Show Document Outline (double-click to expand/collapse all items)" tabindex="3" data-l10n-id="document_outline" role="radio" aria-checked="false" aria-controls="outlineView">
                                        <span data-l10n-id="document_outline_label">Document Outline</span>
                                    </button>
                                    <button id="viewAttachments" class="toolbarButton" title="Show Attachments" tabindex="4" data-l10n-id="attachments" role="radio" aria-checked="false" aria-controls="attachmentsView">
                                        <span data-l10n-id="attachments_label">Attachments</span>
                                    </button>
                                    <button id="viewLayers" class="toolbarButton" title="Show Layers (double-click to reset all layers to the default state)" tabindex="5" data-l10n-id="layers" role="radio" aria-checked="false" aria-controls="layersView">
                                        <span data-l10n-id="layers_label">Layers</span>
                                    </button>
                                </div>
                            </div>

                            <div id="toolbarSidebarRight">
                                <div id="outlineOptionsContainer" class="hidden">
                                    <div class="verticalToolbarSeparator"></div>

                                    <button id="currentOutlineItem" class="toolbarButton" disabled="disabled" title="Find Current Outline Item" tabindex="6" data-l10n-id="current_outline_item">
                                        <span data-l10n-id="current_outline_item_label">Current Outline Item</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="sidebarContent">
                            <div id="thumbnailView"></div>
                            <div id="outlineView" class="hidden"></div>
                            <div id="attachmentsView" class="hidden"></div>
                            <div id="layersView" class="hidden"></div>
                        </div>
                        <div id="sidebarResizer"></div>
                    </div>
                    <!-- sidebarContainer -->

                    <div id="mainContainer">
                        <div class="findbar hidden doorHanger" id="findbar">
                            <div id="findbarInputContainer">
                                <input id="findInput" class="toolbarField" title="Find" placeholder="Find in document…" tabindex="91" data-l10n-id="find_input" aria-invalid="false" />
                                <div class="splitToolbarButton">
                                    <button id="findPrevious" class="toolbarButton" title="Find the previous occurrence of the phrase" tabindex="92" data-l10n-id="find_previous">
                                        <span data-l10n-id="find_previous_label">Previous</span>
                                    </button>
                                    <div class="splitToolbarButtonSeparator"></div>
                                    <button id="findNext" class="toolbarButton" title="Find the next occurrence of the phrase" tabindex="93" data-l10n-id="find_next">
                                        <span data-l10n-id="find_next_label">Next</span>
                                    </button>
                                </div>
                            </div>

                            <div id="findbarOptionsOneContainer">
                                <input type="checkbox" id="findHighlightAll" class="toolbarField" tabindex="94" />
                                <label for="findHighlightAll" class="toolbarLabel" data-l10n-id="find_highlight">Highlight All</label>
                                <input type="checkbox" id="findMatchCase" class="toolbarField" tabindex="95" />
                                <label for="findMatchCase" class="toolbarLabel" data-l10n-id="find_match_case_label">Match Case</label>
                            </div>
                            <div id="findbarOptionsTwoContainer">
                                <input type="checkbox" id="findMatchDiacritics" class="toolbarField" tabindex="96" />
                                <label for="findMatchDiacritics" class="toolbarLabel" data-l10n-id="find_match_diacritics_label">Match Diacritics</label>
                                <input type="checkbox" id="findEntireWord" class="toolbarField" tabindex="97" />
                                <label for="findEntireWord" class="toolbarLabel" data-l10n-id="find_entire_word_label">Whole Words</label>
                            </div>

                            <div id="findbarMessageContainer" aria-live="polite">
                                <span id="findResultsCount" class="toolbarLabel"></span>
                                <span id="findMsg" class="toolbarLabel"></span>
                            </div>
                        </div>
                        <!-- findbar -->

                        <div class="editorParamsToolbar hidden doorHangerRight" id="editorFreeTextParamsToolbar">
                            <div class="editorParamsToolbarContainer">
                                <div class="editorParamsSetter">
                                    <label for="editorFreeTextColor" class="editorParamsLabel" data-l10n-id="editor_free_text_color">Color</label>
                                    <input type="color" id="editorFreeTextColor" class="editorParamsColor" tabindex="100" />
                                </div>
                                <div class="editorParamsSetter">
                                    <label for="editorFreeTextFontSize" class="editorParamsLabel" data-l10n-id="editor_free_text_size">Size</label>
                                    <input type="range" id="editorFreeTextFontSize" class="editorParamsSlider" value="10" min="5" max="100" step="1" tabindex="101" />
                                </div>
                            </div>
                        </div>
                        <div class="editorParamsToolbar hidden doorHangerRight" id="editorInkParamsToolbar">
                            <div class="editorParamsToolbarContainer">
                                <div class="editorParamsSetter">
                                    <label for="editorInkColor" class="editorParamsLabel" data-l10n-id="editor_ink_color">Color</label>
                                    <input type="color" id="editorInkColor" class="editorParamsColor" tabindex="102" />
                                </div>
                                <div class="editorParamsSetter">
                                    <label for="editorInkThickness" class="editorParamsLabel" data-l10n-id="editor_ink_thickness">Thickness</label>
                                    <input type="range" id="editorInkThickness" class="editorParamsSlider" value="1" min="1" max="100" step="1" tabindex="102" />
                                </div>
                                <div class="editorParamsSetter">
                                    <label for="editorInkOpacity" class="editorParamsLabel" data-l10n-id="editor_ink_opacity">Opacity</label>
                                    <input type="range" id="editorInkOpacity" class="editorParamsSlider" value="100" min="1" max="100" step="1" tabindex="103" />
                                </div>
                            </div>
                        </div>
                        <div class="editorParamsToolbar hidden doorHangerRight" id="editorInkParamsToolbar2">
                            <div class="editorParamsToolbarContainer">
                                <div class="editorParamsSetter">
                                    <label for="editorInk2Color" class="editorParamsLabel" data-l10n-id="editor_ink_color">Color</label>
                                    <input type="color" id="editorInk2Color" class="editorParamsColor" tabindex="104" />
                                </div>
                                <div class="editorParamsSetter">
                                    <label for="editorInk2Thickness" class="editorParamsLabel" data-l10n-id="editor_ink_thickness">Thickness</label>
                                    <input type="range" id="editorInk2Thickness" class="editorParamsSlider" value="1" min="1" max="500" step="15" tabindex="105" />
                                </div>
                            </div>
                        </div>
                        <div class="editorParamsToolbar hidden doorHangerRight" id="editorRectParamsToolbar">
                            <div class="editorParamsToolbarContainer">
                                <div class="editorParamsSetter">
                                    <label for="editorRectColor" class="editorParamsLabel" data-l10n-id="editor_rect_color">Color</label>
                                    <input type="color" id="editorRectColor" class="editorParamsColor" tabindex="106" />
                                </div>
                                <div class="editorParamsSetter">
                                    <label for="editorRectThickness" class="editorParamsLabel" data-l10n-id="editor_rect_thickness">Thickness</label>
                                    <input type="range" id="editorRectThickness" class="editorParamsSlider" value="1" min="1" max="100" step="1" tabindex="107" />
                                </div>
                                <div class="editorParamsSetter">
                                    <label for="editorRectOpacity" class="editorParamsLabel" data-l10n-id="editor_rect_opacity">Opacity</label>
                                    <input type="range" id="editorRectOpacity" class="editorParamsSlider" value="100" min="1" max="100" step="1" tabindex="108" />
                                </div>
                            </div>
                        </div>
                        <div id="secondaryToolbar" class="secondaryToolbar hidden doorHangerRight">
                            <div id="secondaryToolbarButtonContainer">
                                <!--#if GENERIC-->
                                <button id="secondaryOpenFile" class="secondaryToolbarButton visibleLargeView" title="Open File" tabindex="51" data-l10n-id="open_file">
                                    <span data-l10n-id="open_file_label">Open</span>
                                </button>
                                <!--#endif-->

                                <button id="secondaryPrint" class="secondaryToolbarButton visibleMediumView" title="Print" tabindex="52" data-l10n-id="print">
                                    <span data-l10n-id="print_label">Print</span>
                                </button>

                                <button id="secondaryDownload" class="secondaryToolbarButton visibleMediumView" title="Save" tabindex="53" data-l10n-id="save">
                                    <span data-l10n-id="save_label">Save</span>
                                </button>

                                <!--#if GENERIC-->
                                <div class="horizontalToolbarSeparator visibleLargeView"></div>
                                <!--#else-->
                                <!--        <div class="horizontalToolbarSeparator visibleMediumView"></div>-->
                                <!--#endif-->

                                <button id="presentationMode" class="secondaryToolbarButton" title="Switch to Presentation Mode" tabindex="54" data-l10n-id="presentation_mode">
                                    <span data-l10n-id="presentation_mode_label">Presentation Mode</span>
                                </button>

                                <a href="#" id="viewBookmark" class="secondaryToolbarButton" title="Current Page (View URL from Current Page)" tabindex="55" data-l10n-id="bookmark1">
                                    <span data-l10n-id="bookmark1_label">Current Page</span>
                                </a>

                                <div id="viewBookmarkSeparator" class="horizontalToolbarSeparator"></div>

                                <button id="firstPage" class="secondaryToolbarButton" title="Go to First Page" tabindex="56" data-l10n-id="first_page">
                                    <span data-l10n-id="first_page_label">Go to First Page</span>
                                </button>
                                <button id="lastPage" class="secondaryToolbarButton" title="Go to Last Page" tabindex="57" data-l10n-id="last_page">
                                    <span data-l10n-id="last_page_label">Go to Last Page</span>
                                </button>

                                <div class="horizontalToolbarSeparator"></div>

                                <button id="pageRotateCw" class="secondaryToolbarButton" title="Rotate Clockwise" tabindex="58" data-l10n-id="page_rotate_cw">
                                    <span data-l10n-id="page_rotate_cw_label">Rotate Clockwise</span>
                                </button>
                                <button id="pageRotateCcw" class="secondaryToolbarButton" title="Rotate Counterclockwise" tabindex="59" data-l10n-id="page_rotate_ccw">
                                    <span data-l10n-id="page_rotate_ccw_label">Rotate Counterclockwise</span>
                                </button>

                                <div class="horizontalToolbarSeparator"></div>

                                <div id="cursorToolButtons" role="radiogroup">
                                    <button id="cursorSelectTool" class="secondaryToolbarButton toggled" title="Enable Text Selection Tool" tabindex="60" data-l10n-id="cursor_text_select_tool" role="radio" aria-checked="true">
                                        <span data-l10n-id="cursor_text_select_tool_label">Text Selection Tool</span>
                                    </button>
                                    <button id="cursorHandTool" class="secondaryToolbarButton" title="Enable Hand Tool" tabindex="61" data-l10n-id="cursor_hand_tool" role="radio" aria-checked="false">
                                        <span data-l10n-id="cursor_hand_tool_label">Hand Tool</span>
                                    </button>
                                </div>

                                <div class="horizontalToolbarSeparator"></div>

                                <div id="scrollModeButtons" role="radiogroup">
                                    <button id="scrollPage" class="secondaryToolbarButton" title="Use Page Scrolling" tabindex="62" data-l10n-id="scroll_page" role="radio" aria-checked="false">
                                        <span data-l10n-id="scroll_page_label">Page Scrolling</span>
                                    </button>
                                    <button id="scrollVertical" class="secondaryToolbarButton toggled" title="Use Vertical Scrolling" tabindex="63" data-l10n-id="scroll_vertical" role="radio" aria-checked="true">
                                        <span data-l10n-id="scroll_vertical_label">Vertical Scrolling</span>
                                    </button>
                                    <button id="scrollHorizontal" class="secondaryToolbarButton" title="Use Horizontal Scrolling" tabindex="64" data-l10n-id="scroll_horizontal" role="radio" aria-checked="false">
                                        <span data-l10n-id="scroll_horizontal_label">Horizontal Scrolling</span>
                                    </button>
                                    <button id="scrollWrapped" class="secondaryToolbarButton" title="Use Wrapped Scrolling" tabindex="65" data-l10n-id="scroll_wrapped" role="radio" aria-checked="false">
                                        <span data-l10n-id="scroll_wrapped_label">Wrapped Scrolling</span>
                                    </button>
                                </div>

                                <div class="horizontalToolbarSeparator"></div>

                                <div id="spreadModeButtons" role="radiogroup">
                                    <button id="spreadNone" class="secondaryToolbarButton toggled" title="Do not join page spreads" tabindex="66" data-l10n-id="spread_none" role="radio" aria-checked="true">
                                        <span data-l10n-id="spread_none_label">No Spreads</span>
                                    </button>
                                    <button id="spreadOdd" class="secondaryToolbarButton" title="Join page spreads starting with odd-numbered pages" tabindex="67" data-l10n-id="spread_odd" role="radio" aria-checked="false">
                                        <span data-l10n-id="spread_odd_label">Odd Spreads</span>
                                    </button>
                                    <button id="spreadEven" class="secondaryToolbarButton" title="Join page spreads starting with even-numbered pages" tabindex="68" data-l10n-id="spread_even" role="radio" aria-checked="false">
                                        <span data-l10n-id="spread_even_label">Even Spreads</span>
                                    </button>
                                </div>

                                <div class="horizontalToolbarSeparator"></div>

                                <button id="documentProperties" class="secondaryToolbarButton" title="Document Properties…" tabindex="69" data-l10n-id="document_properties" aria-controls="documentPropertiesDialog">
                                    <span data-l10n-id="document_properties_label">Document Properties…</span>
                                </button>
                            </div>
                        </div>
                        <!-- secondaryToolbar -->

                        <div class="secondary-toolbar">
                            <div id="toolbarContainer">
                                <div id="toolbarViewer">
                                    <div id="toolbarViewerLeft">
                                        <button id="sidebarToggle" class="toolbarButton" title="Toggle Sidebar" tabindex="11" data-l10n-id="toggle_sidebar" aria-expanded="false" aria-controls="sidebarContainer">
                                            <span data-l10n-id="toggle_sidebar_label">Toggle Sidebar</span>
                                        </button>
                                        <div class="toolbarButtonSpacer"></div>
                                        <button id="viewFind" class="toolbarButton" title="Find in Document" tabindex="12" data-l10n-id="findbar" aria-expanded="false" aria-controls="findbar">
                                            <span data-l10n-id="findbar_label">Find</span>
                                        </button>
                                        <div class="splitToolbarButton hiddenSmallView">
                                            <button class="toolbarButton" title="Previous Page" id="previous" tabindex="13" data-l10n-id="previous">
                                                <span data-l10n-id="previous_label">Previous</span>
                                            </button>
                                            <div class="splitToolbarButtonSeparator"></div>
                                            <button class="toolbarButton" title="Next Page" id="next" tabindex="14" data-l10n-id="next">
                                                <span data-l10n-id="next_label">Next</span>
                                            </button>
                                        </div>
                                        <input type="number" id="pageNumber" class="toolbarField" title="Page" value="1" min="1" tabindex="15" data-l10n-id="page" autocomplete="off" />
                                        <span id="numPages" class="toolbarLabel"></span>
                                    </div>
                                    <div id="toolbarViewerRight">
                                        <!--#if GENERIC-->
                                        <button id="openFile" class="toolbarButton hiddenLargeView" title="Open File" tabindex="31" data-l10n-id="open_file">
                                            <span data-l10n-id="open_file_label">Open</span>
                                        </button>
                                        <!--#endif-->

                                        <button id="print" class="toolbarButton hiddenMediumView" title="Print" tabindex="32" data-l10n-id="print">
                                            <span data-l10n-id="print_label">Print</span>
                                        </button>

                                        <button id="download" class="toolbarButton hiddenMediumView" title="Save" tabindex="33" data-l10n-id="save">
                                            <span data-l10n-id="save_label">Save</span>
                                        </button>

                                        <div class="verticalToolbarSeparator hiddenMediumView"></div>

                                        <div id="editorModeButtons" class="splitToolbarButton toggled" role="radiogroup">
                                            <button id="editorStamp" class="toolbarButton hidden" disabled="disabled" title="Image" role="radio" aria-checked="false" tabindex="34" data-l10n-id="editor_stamp">
                                                <span data-l10n-id="editor_stamp_label">Image</span>
                                            </button>
                                            <button id="editorFreeText" class="toolbarButton" disabled="disabled" title="Text" role="radio" aria-checked="false" aria-controls="editorFreeTextParamsToolbar" tabindex="35" data-l10n-id="editor_free_text2">
                                                <span data-l10n-id="editor_free_text2_label">Text</span>
                                            </button>
                                            <button id="editorInk" class="toolbarButton" disabled="disabled" title="Draw" role="radio" aria-checked="false" aria-controls="editorInkParamsToolbar" tabindex="36" data-l10n-id="editor_ink2">
                                                <span data-l10n-id="editor_ink2_label">Draw</span>
                                            </button>
                                            <button id="editorInk2" class="toolbarButton" disabled="disabled" title="Highlight" role="radio" aria-checked="false" aria-controls="editorInkParamsToolbar2" tabindex="37" data-l10n-id="editor_ink22">
                                                <span data-l10n-id="editor_ink2_label">Draw</span>
                                            </button>
                                            <button id="editorRect" class="toolbarButton d-none" disabled="disabled" title="Rect" role="radio" aria-checked="false" aria-controls="editorRectParamsToolbar" tabindex="38" data-l10n-id="editor_Rect2">
                                                <span data-l10n-id="editor_ink2_label">Draw</span>
                                            </button>
                                        </div>

                                        <div id="editorModeSeparator" class="verticalToolbarSeparator"></div>

                                        <button id="secondaryToolbarToggle" class="toolbarButton" title="Tools" tabindex="48" data-l10n-id="tools" aria-expanded="false" aria-controls="secondaryToolbar">
                                            <span data-l10n-id="tools_label">Tools</span>
                                        </button>
                                    </div>
                                    <div id="toolbarViewerMiddle">
                                        <div class="splitToolbarButton">
                                            <button id="zoomOut" class="toolbarButton" title="Zoom Out" tabindex="21" data-l10n-id="zoom_out">
                                                <span data-l10n-id="zoom_out_label">Zoom Out</span>
                                            </button>
                                            <div class="splitToolbarButtonSeparator"></div>
                                            <button id="zoomIn" class="toolbarButton" title="Zoom In" tabindex="22" data-l10n-id="zoom_in">
                                                <span data-l10n-id="zoom_in_label">Zoom In</span>
                                            </button>
                                        </div>
                                        <span id="scaleSelectContainer" class="dropdownToolbarButton">
                                            <select id="scaleSelect" title="Zoom" tabindex="23" data-l10n-id="zoom">
                                                <option id="pageAutoOption" title="" value="auto" selected="selected" data-l10n-id="page_scale_auto">
                                                    Automatic Zoom
                                                </option>
                                                <option id="pageActualOption" title="" value="page-actual" data-l10n-id="page_scale_actual">
                                                    Actual Size
                                                </option>
                                                <option id="pageFitOption" title="" value="page-fit" data-l10n-id="page_scale_fit">
                                                    Page Fit
                                                </option>
                                                <option id="pageWidthOption" title="" value="page-width" data-l10n-id="page_scale_width">
                                                    Page Width
                                                </option>
                                                <option id="customScaleOption" title="" value="custom" disabled="disabled" hidden="true"></option>
                                                <option title="" value="0.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 50 }'>
                                                    50%
                                                </option>
                                                <option title="" value="0.75" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 75 }'>
                                                    75%
                                                </option>
                                                <option title="" value="1" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 100 }'>
                                                    100%
                                                </option>
                                                <option title="" value="1.25" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 125 }'>
                                                    125%
                                                </option>
                                                <option title="" value="1.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 150 }'>
                                                    150%
                                                </option>
                                                <option title="" value="2" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 200 }'>
                                                    200%
                                                </option>
                                                <option title="" value="3" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 300 }'>
                                                    300%
                                                </option>
                                                <option title="" value="4" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 400 }'>
                                                    400%
                                                </option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div id="loadingBar">
                                    <div class="progress">
                                        <div class="glimmer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="viewerContainer" tabindex="0">
                            <div id="viewer" class="pdfViewer"></div>
                        </div>
                    </div>
                    <!-- mainContainer -->

                    <div id="dialogContainer">
                        <dialog id="passwordDialog">
                            <div class="row">
                                <label for="password" id="passwordText" data-l10n-id="password_label">Enter the password to open this PDF file:</label>
                            </div>
                            <div class="row">
                                <input type="password" id="password" class="toolbarField" />
                            </div>
                            <div class="buttonRow">
                                <button id="passwordCancel" class="dialogButton">
                                    <span data-l10n-id="password_cancel">Cancel</span>
                                </button>
                                <button id="passwordSubmit" class="dialogButton">
                                    <span data-l10n-id="password_ok">OK</span>
                                </button>
                            </div>
                        </dialog>
                        <dialog id="documentPropertiesDialog">
                            <div class="row">
                                <span id="fileNameLabel" data-l10n-id="document_properties_file_name">File name:</span>
                                <p id="fileNameField" aria-labelledby="fileNameLabel">-</p>
                            </div>
                            <div class="row">
                                <span id="fileSizeLabel" data-l10n-id="document_properties_file_size">File size:</span>
                                <p id="fileSizeField" aria-labelledby="fileSizeLabel">-</p>
                            </div>
                            <div class="separator"></div>
                            <div class="row">
                                <span id="titleLabel" data-l10n-id="document_properties_title">Title:</span>
                                <p id="titleField" aria-labelledby="titleLabel">-</p>
                            </div>
                            <div class="row">
                                <span id="authorLabel" data-l10n-id="document_properties_author">Author:</span>
                                <p id="authorField" aria-labelledby="authorLabel">-</p>
                            </div>
                            <div class="row">
                                <span id="subjectLabel" data-l10n-id="document_properties_subject">Subject:</span>
                                <p id="subjectField" aria-labelledby="subjectLabel">-</p>
                            </div>
                            <div class="row">
                                <span id="keywordsLabel" data-l10n-id="document_properties_keywords">Keywords:</span>
                                <p id="keywordsField" aria-labelledby="keywordsLabel">-</p>
                            </div>
                            <div class="row">
                                <span id="creationDateLabel" data-l10n-id="document_properties_creation_date">Creation Date:</span>
                                <p id="creationDateField" aria-labelledby="creationDateLabel">
                                    -
                                </p>
                            </div>
                            <div class="row">
                                <span id="modificationDateLabel" data-l10n-id="document_properties_modification_date">Modification Date:</span>
                                <p id="modificationDateField" aria-labelledby="modificationDateLabel">
                                    -
                                </p>
                            </div>
                            <div class="row">
                                <span id="creatorLabel" data-l10n-id="document_properties_creator">Creator:</span>
                                <p id="creatorField" aria-labelledby="creatorLabel">-</p>
                            </div>
                            <div class="separator"></div>
                            <div class="row">
                                <span id="producerLabel" data-l10n-id="document_properties_producer">PDF Producer:</span>
                                <p id="producerField" aria-labelledby="producerLabel">-</p>
                            </div>
                            <div class="row">
                                <span id="versionLabel" data-l10n-id="document_properties_version">PDF Version:</span>
                                <p id="versionField" aria-labelledby="versionLabel">-</p>
                            </div>
                            <div class="row">
                                <span id="pageCountLabel" data-l10n-id="document_properties_page_count">Page Count:</span>
                                <p id="pageCountField" aria-labelledby="pageCountLabel">
                                    -
                                </p>
                            </div>
                            <div class="row">
                                <span id="pageSizeLabel" data-l10n-id="document_properties_page_size">Page Size:</span>
                                <p id="pageSizeField" aria-labelledby="pageSizeLabel">-</p>
                            </div>
                            <div class="separator"></div>
                            <div class="row">
                                <span id="linearizedLabel" data-l10n-id="document_properties_linearized">Fast Web View:</span>
                                <p id="linearizedField" aria-labelledby="linearizedLabel">
                                    -
                                </p>
                            </div>
                            <div class="buttonRow">
                                <button id="documentPropertiesClose" class="dialogButton">
                                    <span data-l10n-id="document_properties_close">Close</span>
                                </button>
                            </div>
                        </dialog>
                        <!--#if !MOZCENTRAL-->
                        <dialog id="printServiceDialog" style="min-width: 200px">
                            <div class="row">
                                <span data-l10n-id="print_progress_message">Preparing document for printing…</span>
                            </div>
                            <div class="row">
                                <progress value="0" max="100"></progress>
                                <span data-l10n-id="print_progress_percent" data-l10n-args='{ "progress": 0 }' class="relative-progress">0%</span>
                            </div>
                            <div class="buttonRow">
                                <button id="printCancel" class="dialogButton">
                                    <span data-l10n-id="print_progress_close">Cancel</span>
                                </button>
                            </div>
                        </dialog>
                        <!--#endif-->
                        <!--#if CHROME-->
                        <!--#include viewer-snippet-chrome-overlays.html-->
                        <!--#endif-->
                    </div>
                    <!-- dialogContainer -->
                </div>
                <!-- outerContainer -->
                <div id="printContainer"></div>

                <!--#if GENERIC-->
                <input type="file" id="fileInput" class="hidden" />
                <!--#endif-->
            </div>
            <!-- <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Close
        </button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>
{{-- this is newly added code for edit pdf modal --}}
@endsection
@section('scripts')
<script>
    // const canvas = document.getElementById("sig");
    // const signaturePad = new SignaturePad(canvas);
    // const canvas1 = document.getElementById("sig1");
    // const signaturePad1 = new SignaturePad(canvas1);
    // let signaturepad = false;
    let signaturepad1 = false;
            let signaturepad2 = false;
            let signaturepad3 = false;
            let signaturepad4 = false;
            let signaturepad5 = false;
  var canvas = document.getElementById("sig");
  var canvas1 = document.getElementById("sig1");
  var canvas3 = document.getElementById("sig3");
  var canvas4 = document.getElementById("sig4");
  var canvas5 = document.getElementById("sig5");

  if (canvas) {
  var signaturePad = new SignaturePad(canvas);
  }
  if (canvas1) {
  var signaturePad1 = new SignaturePad(canvas1);
  }
  if (canvas3) {
  var signaturePad3 = new SignaturePad(canvas3);
  }
  if (canvas4) {
    var signaturePad4 = new SignaturePad(canvas4);
  }
  if (canvas5) {
  var signaturePad5 = new SignaturePad(canvas5);
  }
  let first_sig = 0;
  let second_sig = 0;
  let third_sig = 0;
  let fourth_sig = 0;
  let fifth_sig = 0;
  $("#submitbutton, #draft").on('click', function(e) {
    e.preventDefault();
    if (signaturePad) {
      $("#signature").val(signaturePad.toDataURL('image/png'));
    }
    if (signaturePad1) {
      $("#signature1").val(signaturePad1.toDataURL('image/png'));
    }
    if (signaturePad3) {
      $("#signature3").val(signaturePad3.toDataURL('image/png'));
    }
    if (signaturePad4) {
      $("#signature4").val(signaturePad4.toDataURL('image/png'));
    }
    if (signaturePad5) {
      $("#signature5").val(signaturePad5.toDataURL('image/png'));
    }
    $(this).attr('disabled', 'disabled');

    var buttonValue = $(this).val();
    var input = $("<input>")
      .attr("type", "hidden")
      .attr("name", "action")
      .val(buttonValue);

    // Append the input element to the form
    $("#permitunload").append(input);

    $("#permitunload").submit();
  })
    // var canvas = document.getElementById("sig");
    // var signaturePad = new SignaturePad(canvas);
    // var canvas1 = document.getElementById("sig1");
    // if (canvas1) {
    //     var signaturePad1 = new SignaturePad(canvas1);
    // }
    if(signaturePad){
    signaturePad.addEventListener('endStroke', function() {
        pc_approval = document.querySelector('input[name="approval_PC"]:checked').value;
        $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
        if (pc_approval == 2) {
            console.log("here");
            if (signaturePad.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==") {
                $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            } else {

                $('#submitbutton').prop('disabled', true);
                $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");; //.removeAttr("disabled");
            }
        } else {
            console.log("there");
            var signtype1 = $("#signtype1").val();
            if (signtype1 == 1) {
                if (signaturePad.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==") {
                    $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                } else {
                    $('#submitbutton').prop('disabled', true);
                    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");; //.removeAttr("disabled");
                }
            } else {
                if (signaturePad.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==" && signaturePad1.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==") {
                    $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                } else {
                    $('#submitbutton').prop('disabled', true);
                    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");; //.removeAttr("disabled");
                }
            }
        }




    })
    }
    if(signaturePad1){
    signaturePad1.addEventListener('endStroke', function() {
        $("#sigimage1").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
        signtype = $("#signtype").val();
        pdfsign = $("#pdfsign").val();
        if (signtype == 1 || pdfsign == 1) {
            console.log("here");
            if (signaturePad1.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==") {

                $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                $('#submitbutton').prop('disabled', false);
            } else {

            }
        } else {

            if (signaturePad1.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==" && signaturePad1.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==") {
                $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            } else {
                $('#submitbutton').prop('disabled', true);
                $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");; //.removeAttr("disabled");
            }
        }
    })
    }

    // document.getElementById("twc-email-box").classList.add("d-none");
    $("#approval").change(function() {
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
    $("input[name='approval_PC']").change(function() {
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



    $("input[name='works_coordinator']").change(function() {
        if ($(this).val() == 1) {
            $("textarea[name='description_approval_temp_works']").show();
        } else {
            $("textarea[name='description_approval_temp_works']").hide();

        }
    })


    $("#DrawCheck").change(function() {
        if ($(this).is(':checked')) {
            $("#pdfChecked").prop('checked', false);
            $("#flexCheckChecked").prop('checked', false);
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
            $("#sign").css('display', 'block');
            $("#sign").removeClass('d-none');

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

    $("#DrawCheck1").change(function() {
        if ($(this).is(':checked')) {
            $("#signtype1").val(0);
            var signtype = $("#signtype").val();
            var signtype1 = $("#signtype1").val();
            var pdfsigntype = $("#pdfsign").val();

            var pc_approval = document.querySelector('input[name="approval_PC"]:checked').value;
            if (pc_approval == 2) {
                if (signtype == 1 || pdfsigntype == 1) {
                    $("#submitbutton").css("cursor", "pointer");
                    $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                } else {
                    $('#submitbutton').prop('disabled', true);
                    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");
                }

            } else {
                if ((signtype == 1 || pdfsigntype == 1) && signtype1 == 1) {
                    $("#submitbutton").css("cursor", "pointer");
                    $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                } else if (signtype1 == 0) {
                    $('#submitbutton').prop('disabled', true);
                    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");
                } else {
                    $('#submitbutton').prop('disabled', true);
                    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");
                }
            }
            $("#pdfChecked1").prop('checked', false);
            $("#flexCheckChecked1").prop('checked', false);
            $("#signtype").val(0);
            $("#pdfsign").val(0);
            $("#Drawtype").val(1);
            // $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            // $("#pdfsign").removeClass('d-flex').addClass("d-none");
            // $(".customSubmitButton").removeClass("hideBtn");
            // $(".customSubmitButton").addClass("showBtn");
            //  $("input[name='pdfsign']").removeAttr('required');
            // $("input[name='namesign']").attr('required','required');
            // $("#clear").show();
            $("div#pdfsign1").removeClass('d-flex').addClass("d-none");
            $("div#namesign1").removeClass('d-flex').addClass("d-none");
            $("#sign1").css('display', 'block');
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

    $("#flexCheckChecked1").change(function() {
        if ($(this).is(':checked')) {
            $("#signtype1").val(1);
            var signtype = $("#signtype").val();
            var signtype1 = $("#signtype1").val();
            var pdfsigntype = $("#pdfsign").val();

            var pc_approval = document.querySelector('input[name="approval_PC"]:checked').value;
            console.log(signtype, pdfsigntype, signtype1, pc_approval);
            if (pc_approval == 2) {
                if (signtype == 1 || pdfsigntype == 1) {
                    $("#submitbutton").css("cursor", "pointer");
                    $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                } else {
                    $('#submitbutton').prop('disabled', true);
                    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");
                }

            } else {
                if ((signtype == 1 || pdfsigntype == 1) && signtype1 == 1) {
                    $("#submitbutton").css("cursor", "pointer");
                    $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                } else {
                    console.log(signaturePad.toDataURL('image/png'));
                    if (signaturePad.toDataURL('image/png') != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==") {

                        console.log("here");
                        $('#submitbutton').prop('disabled', true);
                        $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary");
                    } else {
                        console.log("there");
                        $('#submitbutton').prop('disabled', true);
                        $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");
                    }

                }
            }

            $("#sigimage1").hide();
            $("#DrawCheck1").prop('checked', false);

            // $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            $("#sigimage").hide();
            $("#DrawCheck1").prop('checked', false);
            $("#pdfChecked1").prop('checked', false);
            $("#namesign1").removeClass('d-none');
            $("#namesign1").addClass('d-flex');
            $("div#pdfsign1").addClass('d-none');
            $("input[name='namesign1']").attr('required', 'required');
            $("#signature1").removeAttr('required', 'required');
            // $("#clear1").hide();
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
    $("#pdfChecked1").change(function() {
        if ($(this).is(':checked')) {
            $("#DrawCheck1").prop('checked', false);
            $("#flexCheckChecked1").prop('checked', false);
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
    $("#flexCheckChecked").change(function() {
        // document.getElementById("namesign").classList.remove("d-none") 
        // document.getElementById("namesign").style.display = 'block'; 
        // document.getElementById("sign").classList.add("d-none") 
        // document.getElementById("pdfsign").classList.add("d-none") 
        // // sign
        // // pdfsign
        // alert();
        if ($(this).is(':checked')) {
            if ($("#DrawCheck1").is(':checked') == true) {
                $("#sigimage").hide();
            } else {
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
            $("#namesign").removeClass('d-none').show();
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

    $("#pdfChecked").change(function() {

        if ($(this).is(':checked')) {
            $("#flexCheckChecked").prop('checked', false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $('#Drawtype').val(0);
            $("#sigimage1").hide();
            $("#DrawCheck").prop('checked', false);
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

    // $('#clear').click(function(e) {
    // e.preventDefault();
    // signaturePad.clear();
    // $("#signature").val('');
    // });
    const clearBtns = document.querySelectorAll('.btn--clear');
    clearBtns.forEach(clearbtn => {
        clearbtn.addEventListener('click', function(e) {
            console.log(e.target);
            if (e.target.getAttribute('id') === 'clear') {
                e.preventDefault();
                signaturePad.clear();
                $("#signature").val('');
                $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary").prop("disabled", true);
                $("#sigimage").text("Signature Not Added").removeClass('text-success').addClass('text-danger');
            }
            if (e.target.getAttribute('id') === 'clear1') {
                e.preventDefault();
                signaturePad1.clear();
                $("#signature1").val('');
                $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary").prop("disabled", true);
                $("#sigimage1").text("Signature Added").removeClass('text-success').addClass('text-danger');
            }
        });
    });

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
        $('#name1').css("background-color", "#fff ");
    });
    $('#job_title1').change(function() {
        $('#job_title1').css("background-color", "#fff");
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
    // var canvas = document.getElementById("sig");
    // var signaturePad = new SignaturePad(canvas);
    // var canvas1 = document.getElementById("sig1");
    // if (canvas1) {
    //     var signaturePad1 = new SignaturePad(canvas1);
    // }

    // $("#submitbutton").on('click', function () {
    //     $("#signature").val(signaturePad.toDataURL('image/png'));
    //     if (canvas1) {
    //         console.log("hello");
    //         $("#signature1").val(signaturePad1.toDataURL('image/png'));
    //     }
    //     $("#permitunload").submit();
    // });

    $("#submitbutton").on('click', function() {
        if (signaturePad) {
            $("#signature").val(signaturePad.toDataURL('image/png'));
        }
        if (signaturePad1) {
            $("#signature1").val(signaturePad1.toDataURL('image/png'));
        }
        $(this).attr('disabled', 'disabled');
        $("#permitunload").submit();
    })
</script>
<script>
    function deleteFile(id) {
        console.log("id", id);
        // Remove the corresponding file container (the parent div) by its id
        const fileContainer = document.getElementById(id);

        if (fileContainer) {
            fileContainer.remove();

            // Get the filename from the id (assuming your id is in the format "filename")
            const filename = id.split('_').pop();

            // Find all hidden inputs with the "design_upload[]" name attribute
            const hiddenInputs = document.querySelectorAll('input[name="design_upload[]"]');

            // Loop through hidden inputs to find the one with the matching value
            hiddenInputs.forEach(input => {
                if (input.value == id) {
                    input.remove();
                }
            });

            if (hiddenInputs) {
                // Make an AJAX request to delete the file on the server
                fetch('{{ route("delete_drawing_file") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if necessary
                        },
                        body: JSON.stringify({
                            filename: id
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message); // Log the server's response
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        }
    }
</script>

<script>
    // JavaScript to handle adding new members
    const addMemberButton = document.getElementById('addMemberButton');

    addMemberButton.addEventListener('click', (e) => {
        e.preventDefault();
        const third_member = document.getElementById('third_member');
        const fourth_member = document.getElementById('fourth_member');
        const fifth_member = document.getElementById('fifth_member');

        // Check the display style of element1
        const style3 = window.getComputedStyle(third_member);
        const displayStyle3 = style3.getPropertyValue('display');

        // Check the display style of element2
        const style4 = window.getComputedStyle(fourth_member);
        const displayStyle4 = style4.getPropertyValue('display');

        // Check the display style of element2
        const style5 = window.getComputedStyle(fifth_member);
        const displayStyle5 = style5.getPropertyValue('display');
        if (displayStyle3 === 'none') {
            third_member.style.display = 'block';
        } else if (displayStyle4 === 'none') {
            fourth_member.style.display = 'block';
        } else if (displayStyle5 === 'none') {
            fifth_member.style.display = 'block';
        } else {
            alert("No new signature for added")
        }
    });
</script>
@endsection