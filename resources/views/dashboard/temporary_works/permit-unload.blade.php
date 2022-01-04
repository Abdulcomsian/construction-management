@extends('layouts.dashboard.master',['title' => 'Permit To Load'])
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
                    <h2>Permit to UnLoad</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form action="{{route('permit.unload.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    <input type="hidden" name="permitid" value="{{$permitdata->id}}">
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
                                    <input type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_no" name="drawing_no" value="{{$permitdata->drawing_no ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" name="twc_name" value="{{$permitdata->twc_name ?? ''}}">
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
                                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" name="date">
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
                                        <input type="text" class="form-control form-control-solid" placeholder="Drawing Title" name="drawing_title" value="{{$permitdata->drawing_title ?? ''}}">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">TWS Name :</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="TWS Name" name="tws_name" value="{{$permitdata->tws_name ?? ''}}">
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
                                    <textarea name="location_temp_work" rows="2" cols="170" placeholder="Location of the Temporary Works (Area):">{{$permitdata->location_temp_work ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170" placeholder="Description of Structure which is ready for use:">{{$permitdata->description_structure ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">MS/RA Number</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Ms/RA Number" name="ms_ra_no" value="{{$permitdata->ms_ra_no ?? ''}}">
                                </div>
                            </div>
                            <h5 style="color: white">Permit to unload/Strike</h5>
                            <br>
                            <p style="color: white;">1. Permanent Works supported by the above item of Temporary Works have gained sufficient strength to support the loading/use permitted (See concrete cube results below – or state any other PW design requirements if applicable)
                                <br>
                                2. Sequence of removal of TW, where specified by the TWD, is understood by the supervisor.
                                <br>
                                3. All standard safety measures executed i.e., holes covered and protected, leading edge protection etc
                                <br>
                                4. Risk Assessment, Method Statement and or associated Task Sheets in place

                                <!--end::Option-->
                        </div>
                        <div class="container">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: left;" colspan="5">CONCRETE CUBE RESULTS (OR OVER-WRITE WITH STRENGTH BY MATURITY CURVE DATA)</th>

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
                                            <input type="text" name="mix_design_detail" class="form-control form-control-solid tableinput" placeholder="Enter Mix Design Details">
                                        </td>
                                        <td>
                                            <input type="text" name="unique_ref_no" class="form-control form-control-solid tableinput" placeholder="Enter Unique Cube Ref No">
                                        </td>
                                        <td>
                                            <input type="text" name="age_cube" class="form-control form-control-solid tableinput" placeholder="Enter Age of Cube">
                                        </td>
                                        <td>
                                            <input type="text" name="compressive_strength" class="form-control form-control-solid tableinput" placeholder="Enter Compressive Strength N/mm2">
                                        </td>
                                        <td>
                                            <input type="text" name="method_curing" class="form-control form-control-solid tableinput" placeholder="Enter Method of Curing">
                                        </td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>

                        <div class="col-md-12">
                            <h6 style="color:black">TWC to define the extents, limits and controls for this PTS (where applicable)</h6>
                            <textarea name="twc_control_pts" rows="2" cols="153"></textarea>

                            <h6 style="color:black">Back-propping and additional requirements; limitations and exclusions; explanatory sketches refrences - if applicable</h6>
                            <textarea name="back_propping" rows="2" cols="153"></textarea>
                            <br>
                            <p style="color: black;"> I hereby authorise the Temporary Works to be struck out/removed in accordance with the specified/approved unloading & striking method, subject to observing the extents, limits and controls listed above. </p>

                        </div>
                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Principle Contractor approved required?</span>

                            </label>

                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid d-none">
                                <!--begin::Option-->

                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="principle_contractor" value="1" @if(isset($permitdata) && $permitdata->principle_contractor==1){{'checked'}}@endif/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="principle_contractor" value="2" @if(isset($permitdata) && $permitdata->principle_contractor==2){{'checked'}}@endif/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->

                                <!--end::Option-->
                            </div>
                        </div>
                        <!--end::Radio group-->
                        <div class="d-flex inputDiv">
                            <!--begin::Label-->


                            <div class="col-md-12">

                                <div class="row" id="first_member">

                                    <div class="col">

                                        <div class="d-flex inputDiv">
                                        </div>
                                        @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                        <div class="d-flex inputDiv principleno">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name::</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Name" name="name1" value="{{old('name1',$permitdata->name1 ?? '')}}">
                                        </div>
                                        <div class="d-flex inputDiv principleno">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Job title:</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title1" value="{{old('job_title1',$permitdata->job_title1 ?? '')}}">
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col">
                                        @if(isset($permitdata) && $permitdata->principle_contractor==1)
                                        <div class="d-flex inputDiv" style="margin-left:40px">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                                <span class="required">Name/signature:</span>
                                            </label>
                                            <input type="checkbox" id="flexCheckChecked1" style="width: 12px;margin-top:5px">
                                            <input type="hidden" id="signtype1" name="signtype1" class="form-control form-control-solid" value="0">
                                            <span style="padding-left:3px;color:white">Do you want name signature?</span>
                                        </div>
                                        <div class="d-flex inputDiv" id="namesign1" style="display: none !important;margin-left:40px">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name Signature:</span>
                                            </label>
                                            <input type="text" name="namesign1" class="form-control form-control-solid">
                                        </div>
                                        <div class="d-flex inputDiv principleno" id="sign1" style="margin-left:40px">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Signature:</span>
                                            </label>
                                            <br />
                                            <div id="sig1" style="width:40%;height: 100px"></div>
                                            <br />
                                            <textarea id="signature1" name="signed1" style="opacity: 0"></textarea>
                                        </div>
                                        @endif
                                    </div>

                                </div>


                                <!-- Second person -->


                                <div class="row" id="second_member">
                                    <div class="col">

                                        <div class="d-flex inputDiv">
                                        </div>
                                        <div class="d-flex inputDiv principleno">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name::</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Name" name="name" value="{{old('name',$permitdata->name ?? '')}}">
                                        </div>
                                        <div class="d-flex inputDiv principleno">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Job title:</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title" value="{{old('job_title',$permitdata->job_title ?? '')}}">
                                        </div>
                                        <div class="d-flex inputDiv ">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Company: </span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" id="companyadmin" class="form-control form-control-solid" placeholder="Company" name="company" value="{{$project->company->name ?? ''}}" readonly="readonly">
                                            <input type="text" id="companyid" class="form-control form-control-solid" placeholder="Company" name="companyid" value="{{$project->company->id ?? ''}}" readonly="readonly">
                                        </div>
                                        <div class="d-flex inputDiv ">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                                <span class="required">Date:</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
                                        </div>

                                    </div>

                                    <div class="col">
                                        <div class="d-flex inputDiv" style="margin-left:40px">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:33% !important">
                                                <span class="required">Name/signature:</span>
                                            </label>
                                            <input type="checkbox" id="flexCheckChecked" style="width: 12px;margin-top:5px">
                                            <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="0">
                                            <span style="padding-left:3px;color:white">Do you want name signature?</span>
                                        </div>
                                        <div class="d-flex inputDiv" id="namesign" style="display: none !important;margin-left:40px">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Name Signature:</span>
                                            </label>
                                            <input type="text" name="namesign" class="form-control form-control-solid">
                                        </div>
                                        <div class="d-flex inputDiv principleno" id="sign" style="margin-left:40px">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Signature:</span>
                                            </label>
                                            <br />
                                            <div id="sig" style="width:40%;height: 100px"></div>
                                            <br />
                                            <textarea id="signature" name="signed" style="opacity: 0" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="uploadDiv" style="padding-left: 10px;">
                                <div class="input-images"></div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
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
</script>
@endsection