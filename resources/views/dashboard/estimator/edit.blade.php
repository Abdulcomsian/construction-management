@extends('layouts.dashboard.master',['title' => 'Estimator Edit'])

@section('styles')
<style>
        /* ::placeholder {

        color: black !important;
        opacity: 1;
    } */
    .customDate::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }

    .updateBtn {
        bottom: 200px !important;
    }

    .list-div ul li,
    .list-check-div ul li {
        height: 72px;
        overflow: visible;
    }

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
        background-color: #07d564;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
    }

    .newDesignBtn:hover {
        color: #fff;
    }

    .card>.card-body {
        padding: 32px;
    }

    #kt_content {
        background: white !important;
    }

    #kt_content_container {
        background-color: #fff !important;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

    .card {
        margin: 30px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
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



    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }



    .select2-container {
        width: 250px !important;
    }

    .inputDiv {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 5px 5px;
    }

    .inputDiv label {
        color: #000;
        position: absolute;
        bottom: 25px;
        background: white;
        font-family: 'Inter', sans-serif;
        z-index: 1;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .kbw-signature {
        width: 100%;
        height: 220px;
    }

    #sig canvas {
        width: 100% !important;
        max-height: 200px;
    }

    .modalDiv {
        width: 100%;
    }

    .form-control.form-control-solid {
        background-color: #fff;
    }

    @media only screen and (min-width: 470px) {
        .list_top {
            display: inline !important;
        }
    }

    @media only screen and (max-width: 470px) {
        .list_top {
            margin-top: 20px;
            display: block !important;
        }

        .newDesignBtn {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .inputDiv label {
            font-size: 11px !important;
        }
    }

    canvas {
        width: 270px;
        height: 110px;
    }

    textarea {
        width: 100%;
        border: none !important;

    }

    textarea.form-control {
        height: 32px !important;
    }

    /* .inputDiv  #design_required_by_date{color:#fff;} */
    .form-control.form-control-solid:focus {
        color: #000 !important;
    }

    input {
        /* custom */
        caret-color: gray;
    }

    .form-control.form-control-solid:focus {
        color: #000 !important;
    }

    .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg {
        word-break: break-all;
    }

    .select2-selection__choice__display {
        color: black;
    }

    @media only screen and (min-width: 992px) {
        #kt_post {
            width: 75%;
        }
    }

    .twLayout label {
        padding: 0 !important;
        flex-grow: 1;
    }



    .whiteBack {
    background-color: #f5f8fa !important;
    color: #000 !important;
}


input {
        /* custom */
        caret-color: gray;
    }


.form-select::-ms-expand {
    display: none;
}
.form-select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: none;
    background-color: transparent;
    padding-right: 24px; 
}
.form-control.form-control-solid {
    background: white !important;
}

.temporary_work_create .inputDiv input {
    width: 100% !important;
    border: none !important;
}
#clear{
    margin-left:-25px;
    margin-top:60px;
}
#sig{
    border-radius:5px;
    margin-top:-50px;
}
canvas {
    width: 296px;
    height: 152px;
}
#sigimage{
    position: absolute;
    margin-top:-55px;
    margin-left:6px;
}

.majorList {
        border: 1px solid lightgrey;
        height: auto !important;
        font-size: 16px;
        font-weight: 400;
        color:
    }
    .button-set{
        position: absolute !important;
    margin-top: -160px !important;
    margin-left: 585px;
    }
    .button-set > input{
        font-size:20px;
        font-weight:bold;
        padding:10px 50px !important;
    }


    @media only screen and (max-width: 775px) {
        .button-set{
        position: absolute relative;
    margin-top: -10px !important;
    margin-left: -20px;
    }
    .button-set > input{
        font-size:15px;
        font-weight:bold;
        padding:5px 15px !important;
    }
    }
</style>

@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}" />
<link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}" />
<link rel="stylesheet" href="{{asset('css/signature.css')}}" />
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" />
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container temporary_work_create">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top" style="width:98%">
                        <h2 class="db_mr" style="display: inline-block;">Estimate Design Brief  <a target="_blank" href="estimatorPdf/{{$temporaryWork->ped_url}}">View Design Brief</a></h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('estimator.update',$temporaryWork) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2"> -->
                                    <label class=" fs-6 fw-bold mb-2" style="bottom: 38px;">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects"
                                        class="form-select form-select-lg form-select-solid" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ?
                                            'selected' : '' }} @endisset @isset($temporaryWork->project_id) {{
                                            $item->id==$temporaryWork->project_id ? 'selected' : ''
                                            }}@endisset>{{$item->name .' - '. $item->no}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="whiteBack form-control form-control-solid"
                                        placeholder="000" id="no" name="projno"
                                        value="{{old('projno',$selectedproject->no)}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="whiteBack form-control form-control-solid"
                                        placeholder="Project Name" id="name" name="projname"
                                        value="{{old('projname',$selectedproject->name)}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input data-date-inline-picker="true" style=" cursor: pointer;color:#a9abb7;"
                                        type="date" class="blackBack form-control form-control-solid" placeholder="Date"
                                        name="design_issued_date" id="design_issued_date"
                                        value="{{old('design_issued_date',$temporaryWork->design_issued_date)}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="whiteBack form-control form-control-solid"
                                        placeholder="Project Address" id="address" name="projaddress"
                                        value="{{old('projaddress',$selectedproject->address ?? '')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2"> -->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">TWC Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text"
                                        class="whiteBack form-control form-control-solid {{ !auth()->user()->hasRole('user') ? 'form-control-solid' : '' }}"
                                        placeholder="TWC Name" id="twc_name" name="twc_name"
                                        value="{{old('twc_name',auth()->user()->hasRole('user') ? auth()->user()->name :$temporaryWork->twc_name)}}">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">TWC Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid"
                                        placeholder="TWC Email Address" id="twc_email" name="twc_email"
                                        value="{{old('twc_email',auth()->user()->hasRole('user') ? auth()->user()->email: $temporaryWork->twc_email)}}"
                                        style="background: #f5f8fa" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Required by Date:</span>
                                    </label>
                                    <input data-date-inline-picker="true"
                                        style=" cursor: pointer;color:#a9abb7 !important;" type="date"
                                        class="customDate blackBack form-control form-control-solid"
                                        placeholder="Design Required by Date" id="design_required_by_date"
                                        name="design_required_by_date"
                                        value="{{old('design_required_by_date',$temporaryWork->design_required_by_date)}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0" id="designReq">
                                    <div class="d-flex modalDiv" data-bs-toggle="modal"
                                        data-bs-target="#design-requirement">
                                  
                                          <label style="bottom: 41px" class="  fs-6 fw-bold mb-2">
                                            Design Requirement:
                                        </label>
                    
                                        <br>
                                        <input type="text" class="blackBack" style="width: 50%;"
                                            id="design_requirement_text" placeholder="Design requirement" readonly
                                            name="design_requirement_text"
                                            value="{{old('design_requirement_text',$temporaryWork->design_requirement_text)}}">
                               
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2" style="bottom: 41px">
                                            Description:
                                        </label>
                                        <textarea class="blackBack form-control"
                                            name="description_temporary_work_required" rows="2" cols="50"
                                            placeholder="Provide brief description of design requirements.">{{old('description_temporary_work_required',$temporaryWork->description_temporary_work_required)}}</textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 d-flex" style="margin-top: 14px">
                                <div class="d-flex flex-column mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">TW Category</span>

                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="d-flex twLayout">
                                        <!--begin::Option-->
                                        @php
                                        $checked="";
                                        if($temporaryWork->tw_category==0)
                                        {
                                        $checked="checked";
                                        }
                                        @endphp
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="0"
                                                checked="{{$temporaryWork->tw_category==0 ?'checked':''}}" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary"
                                                style="padding: 10px !important">0</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="1"
                                                {{$temporaryWork->tw_category==1 ?'checked':''}}/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                style="padding: 10px !important">1</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="2"
                                                {{$temporaryWork->tw_category==2 ?'checked':''}}/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                style="padding: 10px !important">2</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="3"
                                                {{$temporaryWork->tw_category==3 ?'checked':''}}/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                style="padding: 10px !important">3</span>
                                        </label>
                                        <!--end::Option-->
                                        <a href="{{asset('temporary/tw_pdfs/1.pdf')}}" target="_blank"><span><img
                                                    alt="info" src="{{asset('assets/media/logos/info.png')}}"
                                                    style="height:32px"></span></a>
                                        <!--end::Radio group-->
                                    </div>
                                </div>
                                <div class="d-flex mb-0" style="flex-direction: column">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">TW Risk Class</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="d-flex twLayout">
                                        <!--begin::Option-->
                                        <label> --}}
                                            <div class="col-md-6 d-flex flex-wrap" style="margin-top: 14px">
                                                <div class="d-flex flex-column mb-0 flex-grow-1">
                                                    <!--begin::Label-->
                                                    <label class=" fs-6 fw-bold mb-2">
                                                        <span class="">TW Category</span>
                                                    </label>
                                                    <!--begin::Radio group-->
                                                    <div class="d-flex twLayout">
                                                        <!--begin::Option-->
                                                        @php
                                                        $checked="";
                                                        if($temporaryWork->tw_category==0)
                                                        {
                                                        $checked="checked";
                                                        }
                                                        @endphp
                                                        <label>
                                                            <input type="radio" class="btn-check" name="tw_category"
                                                                value="0"
                                                                checked="{{$temporaryWork->tw_category==0 ?'checked':''}}" />
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary"
                                                                style="padding: 10px !important">0</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="tw_category"
                                                                value="1" {{$temporaryWork->tw_category==1
                                                            ?'checked':''}}/>
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                                style="padding: 10px !important">1</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="tw_category"
                                                                value="2" {{$temporaryWork->tw_category==2
                                                            ?'checked':''}}/>
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                                style="padding: 10px !important">2</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="tw_category"
                                                                value="3" {{$temporaryWork->tw_category==3
                                                            ?'checked':''}}/>
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                                style="padding: 10px !important">3</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <a href="{{asset('temporary/tw_pdfs/1.pdf')}}"
                                                            target="_blank"><span><img alt="info"
                                                                    src="{{asset('assets/media/logos/info.png')}}"
                                                                    style="height:32px"></span></a>
                                                        <!--end::Radio group-->
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-0 flex-grow-1" style="flex-direction: column">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2">
                                                        <span class="">TW Risk Class</span>
                                                    </label>
                                                    <!--begin::Radio group-->
                                                    <div class="d-flex twLayout">
                                                        <!--begin::Option-->
                                                        <label>


                                                            <input type="radio" class="btn-check" name="tw_risk_class"
                                                                value="VL"
                                                                checked="{{$temporaryWork->tw_risk_class=='VL' ?'checked':''}}" />
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary"
                                                                style="padding: 10px !important">VL</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="tw_risk_class"
                                                                value="L" {{$temporaryWork->tw_risk_class=='L'
                                                            ?'checked':''}}/>
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                                style="padding: 10px !important">L</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="tw_risk_class"
                                                                value="M" {{$temporaryWork->tw_risk_class=='M'
                                                            ?'checked':''}}/>
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                                style="padding: 10px !important">M</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="tw_risk_class"
                                                                value="H" {{$temporaryWork->tw_risk_class=='H'
                                                            ?'checked':''}}/>
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                                style="padding: 10px !important">H</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <a href="{{asset('temporary/tw_pdfs/2.pdf')}}"
                                                            target="_blank"><span><img alt="info"
                                                                    src="{{asset('assets/media/logos/info.png')}}"
                                                                    style="height:32px"></span></a>
                                                    </div>
                                                    <!--end::Radio group-->
                                                </div>
                                            </div>
                                    </div>
                                    @php 
                                    $preliminary_sketches_date = $temporaryWork->scopdesign->preliminary_sketches_date ? 'preliminary_sketches_date_sod '.$temporaryWork->scopdesign->preliminary_sketches_date : '';
                                    $construction_rawings_date = $temporaryWork->scopdesign->construction_rawings_date ? 'construction_rawings_date_sod '.$temporaryWork->scopdesign->construction_rawings_date: '';
                                    $design_calculations_date = $temporaryWork->scopdesign->design_calculations_date ? 'design_calculations_date '.$temporaryWork->scopdesign->design_calculations_date: '';
                                    $design_check_certificate_date = $temporaryWork->scopdesign->design_check_certificate_date ? 'design_check_certificate_date '.$temporaryWork->scopdesign->design_check_certificate_date: '';
                                    $loading_criteria_date = $temporaryWork->scopdesign->loading_criteria_date ? 'loading_criteria_date '.$temporaryWork->scopdesign->loading_criteria_date: '';
                                    $construction_erection_sequence_information_date = $temporaryWork->scopdesign->construction_erection_sequence_information_date ? 'construction_erection_sequence_information_date '.$temporaryWork->scopdesign->construction_erection_sequence_information_date: '';
                                    $inspection_checklist_date = $temporaryWork->scopdesign->inspection_checklist_date ? 'inspection_checklist_date '.$temporaryWork->scopdesign->inspection_checklist_date: '';
                                    $monitoring_requirements_date = $temporaryWork->scopdesign->monitoring_requirements_date ? 'monitoring_requirements_date '.$temporaryWork->scopdesign->monitoring_requirements_date: '';
                                    $specifications_date = $temporaryWork->scopdesign->specifications_date ? 'specifications_date '.$temporaryWork->scopdesign->design_inspection_test_plans_date: '';
                                    $design_inspection_test_plans_date = $temporaryWork->scopdesign->design_inspection_test_plans_date ? 'design_inspection_test_plans_date '.$temporaryWork->scopdesign->design_inspection_test_plans_date: '';
                                    $scope_of_design = $preliminary_sketches_date." \n ".$construction_rawings_date." \n ".$design_calculations_date." \n ".$design_check_certificate_date." \n ".$loading_criteria_date." \n ".$construction_erection_sequence_information_date." \n ".$inspection_checklist_date." \n ".$monitoring_requirements_date." \n ".$specifications_date." \n ".$design_inspection_test_plans_date;
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-flex inputDiv d-block mb-0">
                                                <div class="d-flex modalDiv d-block" data-bs-toggle="modal"
                                                    data-bs-target="#scope-of-design">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2" style="bottom: 0; top: -13px; height: fit-content;">
                                                        Scope of Design:
                                                    </label>
                                                    <input id="scopofdesign" value="{{$scope_of_design}}" class="blackBack" type="text"
                                                    placeholder="Scope of Design Output Required From TW Engineer"
                                                    readonly>
                                                    {{-- <textarea class="blackBack form-control" id="scopofdesign" rows="2"
                                                        cols="50"
                                                        placeholder="Scope of Design Output Required From TW Engineer">
                                                    </textarea> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex inputDiv d-block mb-0" id="attachment_specs">
                                                <div style="position:relative;" class="d-flex modalDiv d-block"
                                                    data-bs-toggle="modal" data-bs-target="#attachment-of-design">
                                                    <label class=" fs-6 fw-bold mb-2"   style="bottom: 0; top: -17px; height: fit-content;">
                                                        Attachments / Spec:
                                                        <span style="margin-left: 10px;">
                                                            <a href="{{asset('uploads/checklist.pdf')}}"
                                                                target="_blank"><span><img alt="info"
                                                                        src="{{asset('assets/media/logos/info.png')}}"
                                                                        style="height:25px"></span></a>
                                                        </span>
                                                    </label>

                                                    <input id="attachment" class="blackBack" type="text"
                                                        placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)"
                                                        readonly>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{-- @if(auth()->user()->hasRole('estimator') &&
                                            $temporaryWork->estimatorApprove==0)
                                            --}}
                                         
                                            <div class="d-flex inputDiv d-block">

                                                    <label class=" fs-6 fw-bold mb-2" style="bottom: 35px">
                                                    Select company Approved Designers
                                                    </label>
                                                    <select name="designers[]" id="desingers" class="form-select form-select-lg form-select-solid" data-control="select2"
                                                        data-placeholder="Select an option" data-allow-clear="true" multiple>
                                                        <option value="">Select Option</option>
                                                        <!-- <optgroup label="Designer List"> -->
                                                            @foreach($designers as $desig)
                                                            @if($desig->hasRole('designer'))
                                                            <option value="{{$desig->email}}-{{$desig->id}}" {{in_array($desig->email,
                                                            $selectedDesignersList) ? 'selected' : ''}}>{{$desig->email}}
                                                            </option>
                                                            @endif
                                                            @endforeach
                                                        <!-- </optgroup> -->
                                                    </select>
                                            </div>
                                            <h6 style="margin-top: 17px; margin-bottom: 0px; font-weight:bold">And/Or</h6>
                                            <div class="d-flex inputDiv d-block mb-0">
                                                <!--begin::Label-->
                                                   <label class=" fs-6 fw-bold mb-2" style="bottom: 27px">
                                                    <span class="">Designer Email Address:</span>

                                                </label>
                                                <!--end::Label-->
                                                <input type="text" style="border: none"
                                                    class="form-control  @if(!$inputDesignersList) form-control-solid @endif"
                                                    placeholder="Enter Comma Seperated" id="designer_company_emails"
                                                    name="designer_company_emails"
                                                    value="{{implode(',',$inputDesignersList)}}">
                                            </div>
                                            {{-- @endif --}}
                                        </div>
                                        <div class="col-md-6">
                                            {{-- @if(auth()->user()->hasRole('estimator') &&
                                            $temporaryWork->estimatorApprove==0)
                                            --}}
                                            <div class="d-flex inputDiv d-block">
                                            <label class=" fs-6 fw-bold mb-2" style="bottom: 35px">
                                                    <span>Select company approved supplier</span>
                                                </label>
                                                <select name="suppliers[]" id="suppliers"
                                                    class="form-select form-select-lg form-select-solid"
                                                    data-control="select2" data-placeholder="Select an option"
                                                    data-allow-clear="true" multiple>
                                                    <option value="">Select Option</option>
                                                    <optgroup label="Suppliers List">
                                                        @foreach($suppliers as $supp)
                                                        <option value="{{$supp->email}}-{{$supp->id}}" {{in_array($supp->email,
                                                            $selectedDesignersList) ? 'selected':''}}>{{$supp->email}}
                                                        </option>
                                                        @endforeach
                                                    </optgroup>

                                                </select>
                                            </div>
                                            <h6 style="margin-top: 17px; margin-bottom: 0px; font-weight:bold">And/Or</h6>
                                            <div class="d-flex inputDiv d-block mb-0">
                                                <!--begin::Label-->
                                                <label class=" fs-6 fw-bold mb-2" style="bottom: 27px">
                                                    <span class="">Supplier Email Address:</span>

                                                </label>
                                                <!--end::Label-->
                                                <input type="text"
                                                    class="form-control  @if(!$inputSuppliersList) form-control-solid @endif"
                                                    style="border: none" placeholder="Enter Comma Seperated"
                                                    id="supplier_company_emails" name="supplier_company_emails"
                                                    value="{{implode(',',$inputSuppliersList)}}">
                                            </div>
                                            {{-- @endif --}}
                                            

                                        </div>
                                        <!-- <div class="row"> -->
                                            <div class="col-md-6">
                                                <h6 style="margin-top: 17px; margin-bottom: 0px; font-weight:bold">And/Or</h6>
                                        
                                                <div class="d-flex inputDiv d-block mb-0">
                                                <label class="fs-6 fw-bold mb-2" style="bottom: 0; top: -13px; height: fit-content;">
                                                        <span class="">Select Online Designers</span>
                                                    </label>
                                                    <select name="online_designers[]" class="form-select form-select-lg form-select-solid"
                                                        data-control="select2" data-placeholder="Select an option"
                                                        data-allow-clear="true" multiple>
                                                        <option value="">Select Option</option>
                                                        @foreach($adminDesigners as $desig)
                                                        <!-- <optgroup label="Designer List"> -->
                                                            @if($desig->hasRole(['designer','Design Checker','Designer and Design
                                                            Checker']))
                                                            <option value="{{$desig->email}}-{{$desig->id}}" {{in_array($desig->email,
                                                            $selectedDesignersList) ? 'selected':''}}>{{$desig->name}} |
                                                                {{$desig->email}}</option>
                                                            @endif
                                                        <!-- </optgroup> -->
                                                        @endforeach
                                                    </select>
                                                </div>
                                             </div>
                                        <div class="col-md-6">
                                             <h6 style="margin-top: 17px; margin-left:20px; margin-bottom: 0px; font-weight:bold">And/Or</h6>
                                        
                                                <div class="d-flex inputDiv d-block mb-0">
                                                <label class="fs-6 fw-bold mb-2" style="bottom: 0; top: -13px; height: fit-content;">
                                                        <span class="">Select Online Supplier</span>
                                                    </label>
                                                    <select name="online_suppliers[]"  class="form-select form-select-lg form-select-solid"
                                                        data-control="select2" data-placeholder="Select an option"
                                                        data-allow-clear="true" multiple>
                                                        <option value="">Select Option</option>
                                                        @foreach($adminSuppliers as $desig)
                                                        <optgroup label="Designer List">
                                                            @if($desig->hasRole(['designer','Design Checker','Designer and Design
                                                            Checker']))
                                                            <option value="{{$desig->email}}-{{$desig->id}}" {{in_array($desig->email,
                                                            $selectedDesignersList) ? 'selected':''}}>{{$desig->name}} |
                                                                {{$desig->email}}</option>
                                                            @endif
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                             </div>
                                        </div>
                                    <!-- </div> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-flex inputDiv d-block mb-0">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Name:</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="blackBack form-control form-control-solid"
                                                    placeholder="Name" name="name" id="admin_name"
                                                    value="{{$temporaryWork->name}}" readonly="readonly"
                                                    style="background: white !important">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex inputDiv d-block mb-0">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Job title:</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="blackBack form-control form-control-solid"
                                                    style="background: white" placeholder="Job title" name="job_title"
                                                    id="job_title" value="{{$temporaryWork->job_title}}"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-flex inputDiv d-block mb-0">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Company: </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" id="companyadmin"
                                                    class="blackBack form-control form-control-solid"
                                                    style="background-color:#f5f8fa" placeholder="Company"
                                                    name="company" value="{{$temporaryWork->company}}">
                                                <input type="hidden" id="company_id" name="company_id"
                                                    value="{{$selectedproject->company->id ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex inputDiv d-block mb-0">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Date:</span>
                                                </label>
                                                <!--end::Label-->
                                                <input data-date-inline-picker="true" type="date" name="date"
                                                    value="{{ date('Y-m-d') }}" style="background-color:#fff"
                                                    class="form-control form-control-solid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex inputDiv d-block">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span>Photo:</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="file" class="form-control" id="photo" name="photo"
                                                    style="border: none" value="{{old('photo')}}"
                                                    accept="image/*;capture=camera">
                                            </div>
                                        </div>
                                    </div>


                                    {{-- CODE BELOW WILL BE CHECK AFTER --}}








                                    <div class="row">






                                        
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <input type="checkbox" id="display_sign" name="display_sign"  style="    position: relative;top: 2px;"/>
                                                <span class="tickboxalign" style="padding-left:3px;color:#000; font-family:'Inter', sans-serif;">Email Designer and upload to Temporary Work Register</span>
                                            </div>
                                            <div  class="col-md-12" id="display_sign_div" style="display:none">
                                                @if(auth()->user()->hasRole('user'))
                                                    <h5>Signature Type:</h5>
                                                    <div class="d-flex ">
                                                        <div style="display:flex; align-items: center; padding-left:10px">
                                                            <input type="radio" class="checkbox-field" id="DrawCheck" checked=true style="width: 12px;">
                                                            <input type="hidden" id="Drawtype" name="" class="form-control form-control-solid" value="1">
                                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                                        </div>
                                                        <div style="display:flex; align-items: center; padding-left:10px">
                                                            <input type="radio" class="checkbox-field" id="flexCheckChecked" 
                                                                style="width: 12px;">
                                                            <input type="hidden" id="signtype" name="signtype"
                                                                class="form-control form-control-solid" value="2">
                                                            <span
                                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Name</span>
                                                        </div>
                                                        <div style="display:flex; align-items: center; padding-left:10px">
                                                            <input type="radio" class="checkbox-field" id="pdfChecked" 
                                                                style="width: 12px;">
                                                            <input type="hidden" id="signtype" name="pdfsigntype"
                                                                class="form-control form-control-solid" value="0">
                                                            <span
                                                                style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;">PNG/JPG Upload</span>
                                                        </div>
                                                    </div>
                                                    <div class="inputDiv d-none" id="pdfsign">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Upload Signature:</span>
                                                        </label>
                                                        <input type="file" name="pdfphoto" class="form-control"
                                                            accept="image/*">
                                                    </div>
                                                    <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Name Signature:</span>
                                                        </label>
                                                        <input type="text" name="namesign"
                                                            class="form-control form-control-solid">
                                                    </div>
                                                    <div class="d-flex inputDiv" id="sign" style="align-items: center; border:none">
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <!-- <span class="required">Signature:</span> -->
                                                        </label>
                                                        <br />
                                                        <canvas id="sig" style="background: lightgray"></canvas>
                                                        <br />
                                                        
                                                        <textarea id="signature" name="signed" style="display: none"></textarea>
                                                        <span id="clear" class="fa fa-undo cursor-pointer"
                                                            style="line-height: 6"></span>
                                                    </div>
                                                    <span id="sigimage" class="text-danger" style="font-size: 15px">Signature Not Added</span>
                                                    <br>
                                                @endif
                                            </div>
                                        </div> 
                                        <!-- <div class="row mt-5">
                                            <div class="col-md-6"> 
                                            </div>
                                            <div class="col-md-1 published" style="display:none;">
                                                <input type="submit" name="action"
                                                    style="margin-left: 10px; background: #07d564 !important"
                                                    class="btn btn-primary float-end submitbutton" value="Publish">
                                            </div>
                                            <div class="col-md-4 notpublished">
                                            <input type="submit" name="action" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton" value="Email Designer & Supplier (For Pricing)">
                                            </div>
                                            <div class="col-md-2 notpublished">
                                            <input type="submit" name="action" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton" value="Update (Draft)">
                                            </div> -->
                                    </div> 
                                     
                                    <div class="row mt-5 justify-content-between">
                                            <div class="col-md-4"> 
                                            </div>
                                            <div class="col-md-1 published button-set" style="display:none;">
                                                <button type="submit" name="action"
                                                    style="margin-left: 10px; background: #07d564 !important"
                                                    class="btn btn-primary float-end submitbutton" value="Publish">Publish</button>
                                            </div>
                                            <div class="col-md-4 notpublished">
                                                <button type="submit" name="action" style="margin-left: 10px; font-size:18px; font-weight:bold" 
                                                class="btn btn-primary float-end submitbutton" 
                                                value="Email Designer & Supplier (For Pricing)">Email Designer & Supplier (For Pricing)</button>
                                            </div>
                                            <div class="col-md-2 notpublished">
                                                <button type="submit" name="action" style="margin-left: 10px; font-size:18px; font-weight:bold" 
                                                class="btn btn-primary float-end submitbutton" 
                                                value="Update (Draft)">Update (Draft)</button>
                                            </div> 
                                     </div>                                        
                                    @include('dashboard.modals.design-relief-modals-edit')
                                    
                                   
                                    <!--  <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Update & email</button>
                        <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Update</button> -->

                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
 
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@include('dashboard.modals.hazardlist')
@endsection
@section('scripts')
<script>
    var url="{{asset('js/myfile.json')}}";
    var jsondata="";
    $(document).ready(function(){
        getText(url);
            async function getText(file) {
               await fetch(file).then(response => response.json()).then(json => {
                  jsondata=json;
               });
            }
    });
</script>
<script src="{{ asset('assets/js/temporary-work-modal.js') }}"></script>
<script type="text/javascript">
    $(document).on("change","[name='req_check[]']",function(){
        if($(this).is(':checked'))
        {
            $(this).val(1);
        }
        else{
            $(this).val(0);
        }
    })
</script>
<script>
    var projects = {!!$projects!!};
    var address='';
    $('#projects').change(function() {
        let id = $(this).val();
        let project = projects.filter(function(p) {
            return p.id == id;
        });
        if(project[0].address)
        {
        address=project[0].address.replace(/\n/g,',');
        }
        if (project) {
            $('#no').val('').val(project[0].no);
            $('#name').val('').val(project[0].name);
            $('#date').val('').val(project[0].created_at);
            $('#address').val('').val(address ? address : 'Not Set');
            $("#companyadmin").val(project[0].company.name);
            $("#company_id").val(project[0].company.id);
            $.ajax({
            url:"{{route('project.twc.get')}}",
            method:"GET",
            data:{id:project[0].id,compayid:project[0].company.id},
            success:function(res)
            {
                $(".form-select.form-select-solid").css("background-color", "#eee !important");
                $(".form-control[readonly]").css("background-color", "#eee !important");
                
               if(res !='')
               {
                 // $("#twc_email").val(res);
               }
            }
        });
        }
        console.log(project);
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

//when click of category 3
    $('input[name="tw_category"]').click(function(){
        var value=$(this).val();
        if(value==3)
        {
            $(".desinger_company_name2").removeClass('d-none').addClass('d-flex');
        //    $("#desinger_company_name2").attr('required','required');
        //    $("#desinger_email_2").attr('required','required');
          
        }
        else{
            $(".desinger_company_name2").addClass('d-none').removeClass('d-flex');
            $("#desinger_company_name2").removeAttr('required');
            $("#desinger_email_2").removeAttr('required');
        }
    })

    $("#attachment").click(function() {
        $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
        });


    $('#design_required_by_date').change(function() {
        $('#design_required_by_date').css("background-color", "#eee ");
        $('#design_required_by_date').css({"color": "#000"});
    });
    $('#design_issued_date').change(function() {
        $('#design_issued_date').css("background-color", "#eee ");
        $('#design_issued_date').css({"color": "#000"});
    });
    $('#designer_company_name').change(function() {
        $('#designer_company_name').css("background-color", "#f5f8fa ");
        $('#design_required_by_date').css("color", "#000");
    });
    $('#designer_company_email').change(function() {
        $('#designer_company_email').css("background-color", "#f5f8fa ");
        $('#designer_company_email').css("color", "#000");
    });
    $('#twc_name').change(function() {
        $('#twc_name').css("background-color", "#f5f8fa ");
        $('#twc_name').css("color", "#000");
    });
    $('#twc_email').change(function() {
        $('#twc_email').css("background-color", "#f5f8fa ");
        $('#twc_email').css("color", "#000");
    });
    $("#scopofdesign").click(function() {
        $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
        });

    $(".hazardlist").on('click',function(){
        $("#hazard_modal_id").modal('show');
    })
            

    $(function() {
       var email= $("#twc_email").val();
       if(email.length>0){
        $("#twc_email").removeClass("blackBack")
       } else{
        $("#twc_email").addClass("blackBack")
       }
        $("input").on("change paste keyup cut select", function() {
            if($(this).val() !== "") {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            }
        });
        $("textarea").on("change", function() {
            if($(this).val() !== "") {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            }
        });
       
        $("#design_requirement_text").on("click", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
    
        });
        $("#scope-of-design #submit-requirment button").on("click", function() {
            console.log("here");
                $("#scopofdesign").removeClass("blackBack")
                $("#scopofdesign").addClass("whiteBack")
    
        });
        

        $("#projects").change(function(){
            console.log("hello")
            $(this).removeClass("blackBack")
            $("#projects span.form-select").removeClass("blackBack")
         //   $(".form-control[readonly]").removeClass("blackBack")
            $("#no").removeClass("blackBack").addClass("whiteBack");
            $("#name").removeClass("blackBack").addClass("whiteBack");
            $("#design_issued_date").removeClass("blackBack").addClass("whiteBack");
            $("#address").removeClass("blackBack").addClass("whiteBack");
            $("#job_title").removeClass("blackBack").addClass("whiteBack");
            $("#admin_name").removeClass("blackBack").addClass("whiteBack");
            $("#companyadmin").removeClass("blackBack").addClass("whiteBack");
            $(".form-select.form-select-solid").css("background-color","#f5f8fa")
            $("#companyadmin").removeClass("blackBack").addClass("whiteBack");
            $("#twc_name").removeClass("blackBack").addClass("whiteBack");
         //   $("#scopofdesign").addClass("blackBack")
        })

        $(".customDate").click(function(){
            $(".customDate::-webkit-calendar-picker-indicator").css("filter","invert(0)") 
        })
    });

      $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
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

    $("#pdfChecked").change(function(){

        if($(this).is(':checked'))
        {
            $("#flexCheckChecked").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("input[name='pdfsign']").attr('required','required');
            $("div#pdfsign").removeClass('d-none').addClass('d-flex');
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

     var canvas = document.getElementById("sig");
    var signaturePad = new SignaturePad(canvas);
    signaturePad.addEventListener("endStroke", () => {
              $("#signature").val(signaturePad.toDataURL('image/png'));
            });
    
     $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
        $("#signature").val('');
    });
</script>

<script>
    const checkbox = document.getElementById("display_sign");
    const displayDiv = document.getElementById("display_sign_div");

    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            $(".published").show();
            $(".notpublished").hide();
            displayDiv.style.display = "block";
        } else {
            $(".published").hide();
            $(".notpublished").show();
            displayDiv.style.display = "none";
        }
    });
</script>












<script>
    $("#DrawCheck").change(function(){
        if($(this).is(':checked'))
        {
            $('#submitbutton').prop('disabled', true);
            $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary"); //.addAttr("disabled");
            $("#sigimage").show();
            $("#pdfChecked").prop('checked',false);
            $("#flexCheckChecked").prop('checked',false);
            $("#signtype").val(0);
             $("#pdfsign").val(0);
             $("#Drawtype").val(1);
            $("#clear").show();
            $("div#pdfsign").removeClass('d-flex').addClass("d-none");
            $("div#namesign").removeClass('d-flex').addClass("d-none");
            $("#sign").css('display','flex');
           
        }

    })
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            $("#sigimage").hide();
            $("#pdfChecked").prop('checked',false);
            $("#DrawCheck").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
             $("#Drawtype").val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
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

    $("#pdfChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#sigimage").hide();
            $("#submitbutton").css("cursor", "pointer");
            $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            $("#flexCheckChecked").prop('checked',false);
            $("#DrawCheck").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("#Drawtype").val(0);
            $("input[name='pdfsign']").attr('required','required');
            $("div#pdfsign").removeClass('d-none').addClass('d-flex');
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
    



var canvas = document.getElementById("sig");
var signaturePad = new SignaturePad(canvas);
signaturePad.addEventListener("endStroke", () => {
console.log("hello");
$("#signature").val(signaturePad.toDataURL('image/png'));
$("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
$("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
// $('#submitbutton')
});
$('#clear').click(function(e) {
       e.preventDefault();
       signaturePad.clear();
       $("#signature").val('');
        $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
        $('#submitbutton').prop('disabled', true);

        $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary"); //.addAttr("disabled");
   });
// $("#submitbutton").on('click',function(e){
// if ( $("#desingform-form").valid() ) {

// $("#signature").val(signaturePad.toDataURL('image/png'));
// $("#desingform").submit();
// } else {
// console.log('form invalid');
// }


// })

$("#submitbutton").on('click', function () {
    if (signaturePad) {
        $("#signature").val(signaturePad.toDataURL('image/png'));
    }
    // if (signaturePad1) {
    //     $("#signature1").val(signaturePad1.toDataURL('image/png'));
    // }
    $('#submitbutton').prop('disabled', true);
    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary"); //.prop("disabled", true);
    $("#desingform").submit();
});





$(function() {
var email= $("#twc_email").val();
if(email.length>0){
$("#twc_email").removeClass("blackBack")
} else{
$("#twc_email").addClass("blackBack")
}
$("input").on("change paste keyup cut select", function() {
if($(this).val() !== "") {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")
}
});
$("textarea").on("change", function() {
if($(this).val() !== "") {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")
}
});

$("#design_requirement_text").on("click", function() {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")

});
$("#scope-of-design #submit-requirment button").on("click", function() {
console.log("here");
$("#scopofdesign").removeClass("blackBack")
$("#scopofdesign").addClass("whiteBack")

});
$("#attachment-of-design #submit-requirment button").on("click", function() {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")

});

$("#projects").change(function(){
console.log("hello")
$(this).removeClass("blackBack")
$("#projects span.form-select").removeClass("blackBack")
// $(".form-control[readonly]").removeClass("blackBack")
$("#no").removeClass("blackBack").addClass("whiteBack");
$("#name").removeClass("blackBack").addClass("whiteBack");
$("#design_issued_date").removeClass("blackBack").addClass("whiteBack");
$("#address").removeClass("blackBack").addClass("whiteBack");
$("#job_title").removeClass("blackBack").addClass("whiteBack");
$("#admin_name").removeClass("blackBack").addClass("whiteBack");
$("#companyadmin").removeClass("blackBack").addClass("whiteBack");
$(".form-select.form-select-solid").css("background-color","#f5f8fa")
$("#companyadmin").removeClass("blackBack").addClass("whiteBack");
$("#twc_name").removeClass("blackBack").addClass("whiteBack");
// $("#scopofdesign").addClass("blackBack")
})

$(".customDate").click(function(){
$(".customDate::-webkit-calendar-picker-indicator").css("filter","invert(0)")
})
});

//disable button on submit
$('#desingform').submit(function(e) {
    var form = $( "#desingform" );
    form.validate();
    valid = $("#desingform").valid();
    if (!$('#desingform').valid())  e.preventDefault(); 

    $('#desingform input[type=submit]').attr("disabled", "disabled");  
    e.currentTarget.submit();
    return true;
});
</script>

@endsection