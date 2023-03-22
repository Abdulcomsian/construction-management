@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #fff !important;
  opacity: 1; /* Firefox */
}
    #scope-of-design{

    }
    .whiteBack::placeholder{
        color: #000 !important;
    }
    .form-select,
    #design_requirement_text,
    .inputDiv input{
        border-radius: 0.25rem !important;
    }
    .form-control[readonly] {
    background-color: #000;
}
input {
  /* custom */
  caret-color: gray;
}
.customDate::-webkit-calendar-picker-indicator {   background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>'); }
input::placeholder{
    color: #fff !important;
}
#design_requirement_text{
    color: #000 !important;
    height:32px;
}
.list-div ul li, .list-check-div ul li{
height: 72px;
    overflow: visible;
    border-radius: 5px;
}
    .aside-enabled.aside-fixed.header-fixed .header{
        border-bottom: 1px solid #e4e6ef!important;
    }
    .header-fixed.toolbar-fixed .wrapper{
        padding-top: 60px !important;
    }
    .content{
        padding-top: 0px !important;
        background-color: #e9edf1 !important;
    }
    .newDesignBtn {
        border-radius: 8px;
        background-color: #07d564;
        width: 150px;
        padding: 10px 15px;
        color: #000;
    }

    .newDesignBtn:hover {
        color: #fff;
    }

    .card>.card-body {
        padding: 32px;
    }
    #kt_content_container{
        background-color: #fff;
    }
    #kt_toolbar_container{
        background-color:#fff; 
    }
    .card{
        margin: 9px 0px;
        border-radius: 10px !important;   
        border: none !important; 
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }
    .blackBack{
        /* background-color: #000 !important;
        color: #fff !important; */
    }
    textarea{
        color:black;
        border:none !important;
    }
    textarea::-webkit-input-placeholder {
        color:black !important;
    }
    .whiteBack{
        background-color: #f5f8fa !important;
        color: #000 !important;
    }
    select:focus,input:focus,
    .form-select.form-select-solid:focus{
        background-color: #f5f8fa;
        color: #000;
    }
    .form-control[readonly]{
        background-color: #000;
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

    .inputDiv input {
        width: 50%;
        color: #000;
    }
    .hideBtn{
        display: none !important;
    }
    .showBtn{
        display: block !important
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        /* width: 40%; */
        color: #000;
        position: absolute;
        bottom: 25px;
        background:white;
        font-family: 'Inter', sans-serif;
    }
    .select2-container{width:250px !important;}
    .select2-container--bootstrap5 .select2-selection{
        height:32px !important;
    }
    .inputDiv {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding:5px 5px;
    }

    .textarea .form-control{
        height:32px !important;
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

        /*#sig canvas {
            width: 50% !important;
            max-height: 200px;
        }*/
        .modalDiv{
            width:100% ;
            position: relative;
        }
        #descriptionTextArea,
        #scopeOfDesignArea,
        #attachment{
            min-height: fit-content !important;
        }
        .whiteBack{
            background-color: #f5f8fa !important;
            color: #000 !important;
        }
        .form-select.form-select-solid{
            background-color: #fff;
            color: #fff;
            border:none;
        }
     .form-control.form-control-solid{
        width:250px;
    }
     @media only screen and (min-width: 470px) {
        .list_top{display:inline !important;}
     }
        @media only screen and (max-width: 470px) {
            .list_top{margin-top:20px;display:block !important;}
            .newDesignBtn{margin-top:20px; margin-bottom:10px;}
            .inputDiv label{font-size:11px !important;}
           
    }
    @media only screen and (max-width: 550px) {
        .db_mr{
                display:block !important;
                width:100% !important; 
                margin-bottom:20px !important;
            }
    }
    #scopofdesign::placeholder {
        /* modern browser */
        color: #fff;
    }
    
    /*canvas{width:50%;height:110px;}*/
    /* .inputDiv  #design_required_by_date{color:#fff;} */
    .form-control.form-control-solid:focus{
        color:#000 !important;
    }
    #desingform input{
        background-color: #fff !important;
        border: none !important;
        color: #000 !important;
    }
    #desingform input::placeholder{
        color: #9D9D9D !important;
    }
    .nav-group.nav-group-fluid>label{
        top:0 !important;
        padding: 0 2px !important;
        width: 35px !important;
        height: 35px !important
    }

    .TW .nav-group{
        background-color: #fff;
    }

    .TW .nav-group label{
        margin: 0 !important;
    }
    .btn.btn-color-muted{
        color: #a1a5b7;
        background: #07D5640D ;
    }
    .TW .inputDiv{
        border: none;
    }
    .fa-undo:before{
        background-color: white;
        padding:5px;
        border-radius: 100%;
    }
    #kt_body{
        max-width: 1400px;
    }
    #kt_content{
        width: 75%;
        padding-bottom: 0;
    }
    #design-requirement .modal-dialog{
        width: 50%;
    }
    #attachment-of-design .modal-dialog{
        width: 51%;
    }
    .image-uploader{
        border: 2px dashed #d9d9d9 !important;
        position: relative;
        border-radius: 4px;
    }
    @media screen and (max-width: 768px){
        #projectNo, #selectProject, #projectName, #designIssueDate, #twcName, #designerEmail, #designReq,
        #designBriefDate, #designBriefJobTitle, #photoDesign, #pctwcEmail{
            margin-top: 0 !important;
            margin-bottom: 30px !important;
        }
        #desinger_company_name2{
            margin-bottom: 0px !important;
        }
        .signatureTitle{
            white-space: nowrap;
        }
        #kt_content{
            margin: 0 auto;
        }

        #kt_content_container .card-title{
            flex-direction: column;
            align-items: flex-start !important;
        }
        #kt_content_container .card-header{
            padding-left: 8px;
        }
        #kt_content_container .card-title h2{
            white-space: nowrap;
            margin-bottom: 20px;
        }
        .newDesignBtn{
            width: 230px !important;
        }
        .TW{
            gap: 21px;
        }
        #design-requirement .modal-dialog, 
        #attachment-of-design .modal-dialog{
            width: 75%;
            margin: auto;
        }
        
    }
    @media screen and (max-width: 576px){
        #design-requirement .modal-dialog, 
        #attachment-of-design .modal-dialog{
            width: 100%;
            margin: auto;
        }
    }

</style>

@include('layouts.sweetalert.sweetalert_css')
    <link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/signature.css')}}"/>
     <link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}"/>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
   <!--  <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Works</h1>
               
            </div>
            
        </div>
        
    </div> -->
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container temporary_work_create">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top" style="width:100%; display: flex !important; justify-content: space-between;align-items:center">
                        <h2 class="db_mr" style="display: inline-block;width:36%; font-family: 'Inter', sans-serif; font-weight:600; font-size:32px">Design Brief</h2>
                        <a style="width: 273px; text-align:center;color:#fff;padding:10px 2px;font-family: 'Inter', sans-serif; font-weight:600; font-size:18px" href="{{ url('manuall-designbrief-form') }}" class="newDesignBtn">Upload existing design brief</a>
                        
                        
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('temporary_works.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inputDiv d-block" id="selectProject" style="margin-bottom:0px">
                                    <label class="fs-6 fw-bold mb-2">
                                            <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid"    data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="">Select Option</option>
                                            @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset @isset($project_ids) {{ in_array($item->id,$project_ids) ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
                                            @empty
                                            @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block" id="projectNo">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{old('projno')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block" id="projectName">
                                        <!--begin::Label-->
                                        <label class=" fs-6 fw-bold mb-2">
                                            <span class="required">Project Name:</span>

                                        </label>
                                        <!--end::Label-->
                                        <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Design requirement" id="name" name="projname"  value="{{old('projname')}}">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block m-0" id="designIssueDate">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input data-date-inline-picker="true" readonly type="date" value="{{ date('Y-m-d') }}" class="blackBack form-control form-control-solid" placeholder="Date" name="design_issued_date"  id="design_issued_date" value="{{old('design_issued_date')}}"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block m-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Project Address" id="address" name="projaddress" value="{{old('projaddress')}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="TWC Email Address" id="twc_email" name="twc_email" value="{{old('twc_email',\Auth::user()->email)}}" style="background: #f5f8fa"  required  readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block" id="twcName">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="TWC Name" id="twc_name" name="twc_name" value="{{old('twc_name',\Auth::user()->name)}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block m-0" id="designerEmail">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="email" class="blackBack form-control form-control-solid" placeholder="Designer Email Address" id="designer_company_email" name="designer_company_email" value="{{old('designer_company_email')}}"  required>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block m-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="Designer Company Name" id="designer_company_name" name="designer_company_name" value="{{old('designer_company_name')}}"  required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block mb-0">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Required by Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <!-- <p style=" cursor: pointer;background-color: #f5f8fa;color: #000 !important;"> -->
                                        <input data-date-inline-picker="true"  style=" cursor: pointer;color:#a9abb7;" type="date" class="customDate blackBack form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="design_required_by_date" value="{{old('design_required_by_date')}}"  required>
                                    <!-- </p> -->
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top: 26px">
                                <div class="row TW" style="width: 100%; margin: auto;">
                                    <div class="col-md-6 d-flex inputDiv my-0" style='width: 100%; padding: 5px 0'>
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2" style="bottom: 41px; left: 6px">
                                            <span class="required">TW Category</span>
                                        </label>
                                        {{-- <!--end::Label-->--}}
                                        {{-- <div class="checkBoxDiv">--}}
                                        {{-- </div>--}}
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid" style="width: 90%">
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="0" checked="checked" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">0</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="1" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">1</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="2" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">2</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_category" value="3" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">3</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <a href="{{asset('temporary/tw_pdfs/1.pdf')}}" target="_blank" style="display:flex;align-items:center;"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:18px"></span></a>
                                        <!--end::Radio group-->
                                    </div>
                                    <div class="col-md-6 d-flex inputDiv my-0" style='width: 100%; padding: 5px 0'>
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2" style="bottom: 41px; left: 6px">
                                            <span class="required">TW Risk Class</span>
                                        </label>
                                        {{-- <!--end::Label-->--}}
                                        {{-- <div class="checkBoxDiv">--}}
                                        {{-- </div>--}}
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid" style="width: 90%">
                                            <!--begin::Option-->
                                            <label >
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="VL" checked="checked" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary" style="white-space: nowrap">VL</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="L" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">L</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="M" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">M</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="tw_risk_class" value="H" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">H</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <a href="{{asset('temporary/tw_pdfs/2.pdf')}}" target="_blank" style="display:flex;align-items:center;"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:18px"></span></a>
                                        <!--end::Radio group-->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputDiv d-none desinger_company_name2 mb-0" id="desinger_company_name2">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Checker Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid " placeholder="Design Checker Company Name" id="desinger_company_name2" name="desinger_company_name2" value="{{old('desinger_company_name2')}}"  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv d-none desinger_company_name2 mb-0" style="margin-top: 30px">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Checker Email:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid " placeholder="Design Checker Email" id="desinger_email_2" name="desinger_email_2" value="{{old('desinger_email_2')}}" autocomplete="off" >
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                 
                                 <!-- <div class="inputDiv d-none desinger_company_name2">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                       Design Checker Name:</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid " placeholder="Design Checker Name" id="desinger" name="desinger" value="{{old('desinger')}}"  >
                                </div> -->
                                <div class="d-flex align-items-center inputDiv" style="height: 41px">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" >
                                        <span>PCTWC approval required?</span>
                                    </label>
                                    <!--end::Label-->
                                     <input  type="checkbox" name="approval" id="approval"  style="margin-left:10px;opacity: 0.5" class="blackBack">
                                     <span style="padding-left:22px;color:#000">Select if approval is required.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-none inputDiv pc-twc mb-0" id="pctwcEmail">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2" style="width:fix-content!important">
                                        <span>PC TWC Email:</span>
                                    </label>
                                    <!--end::Label-->
                                     <input  type="email" class="blackBack form-control form-control-solid" name="pc_twc_email" id="pc-twc-email" placeholder="PC TWC Email" value="{{old('pc_twc_email')}}">
                                </div>
                            </div>

                                <div class="col-md-12 ">
                                    <div class="d-flex inputDiv d-block mt-0">
                                        <div class="modalDiv d-block">
                                            <!--begin::Label-->
                                                <label class="required fs-6 fw-bold mb-2" style="top:-17px; height: fit-content;">
                                                Description:
                                                </label>
                                                <textarea class="blackBack form-control" id="descriptionTextArea"  name="description_temporary_work_required"   cols="50" placeholder="Provide brief description of design requirements." required style="height: 32px !important">{{old('description_temporary_work_required')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block my-0" id="designReq">
                                    <div class="modalDiv" data-bs-toggle="modal" data-bs-target="#design-requirement" >
                                        <!--begin::Label-->
                                        <label style="" class="required fs-6 fw-bold mb-2">
                                        Design Requirement:
                                        </label>
                                        <!-- <br> -->
                                        <input type="text" class="blackBack" style="width: 50%;"  id="design_requirement_text" placeholder="Design requirement" readonly name="design_requirement_text" value="{{old('design_requirement_text')}}">
                                        <!--end::Label-->
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                  <div class="d-flex inputDiv d-block my-0">
                                    <div class="modalDiv d-block" data-bs-toggle="modal" data-bs-target="#scope-of-design">
                                         <!--begin::Label-->
                                             <label class="fs-6 fw-bold mb-2" style="top:-17px; height: fit-content;">
                                              Scope of Design:
                                            </label>
                                            <textarea class="form-control" id="scopeOfDesignArea" style="background: white;height: 32px !important"  id="scopofdesign"  cols="50"  placeholder="Scope of Design Output Required From TW Engineer"  readonly></textarea>
                                       <!--  <input type="text" placeholder="Scope of Design Output Required from the Temporary Works Engineer:" readonly> -->
                                    </div>
                                    
                                  </div>
                            </div>

                                <div class="col-md-12">
                                    <div class="d-flex inputDiv d-block mb-0">
                                        <div style="position:relative;" class="modalDiv d-block" data-bs-toggle="modal" data-bs-target="#attachment-of-design">
                                            <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2" style="top:-17px; height: fit-content;">
                                                Attachments / Spec:
                                                <span style="margin-left: 10px;">
                                            <a href="{{asset('uploads/checklist.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:25px"></span></a>
                                            </span></label>
                                            
                                            <input id="attachment" style="background: white;height: 32px !important" class="blackBack" style="background-color: #000; color:#fff" type="text" placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)" readonly>
                                        </div>
                                  </div>
                                </div>

                            <!-- <div class="row"> -->
                                <div class="col-md-6">
                                    <div class="d-flex inputDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="blackBack form-control form-control-solid" placeholder="Name" name="name" id="admin_name" value="{{\Auth::user()->name ?? ''}}" readonly="readonly"  required>
                                    </div>
                                    <div class="d-flex inputDiv d-block" id="designBriefCompany">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Company: </span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" id="companyadmin" class="blackBack form-control form-control-solid" style="background-color:#f5f8fa" placeholder="Company" name="company"  required>
                                        <input type="hidden" id="company_id"  name="company_id"  >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex inputDiv d-block" id='designBriefJobTitle'>
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" >
                                            <span class="required">Job title:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="blackBack form-control form-control-solid" placeholder="Job title" name="job_title" id="job_title" value="{{\Auth::user()->job_title ?? ''}}" readonly="readonly"  required>
                                    </div>
                                    <div class="d-flex inputDiv d-block" >
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Date:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input data-date-inline-picker="true" type="date" name="date" value="{{ date('Y-m-d') }}" style="background-color:#fff" class="form-control form-control-solid">
                                    </div>
                                </div>
                            <!-- </div> -->
                            <!-- <div class="row"> -->
                                    <div class="col-12">
                                    <div class="d-flex inputDiv d-block my-0" id="photoDesign">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Photo:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input  type="file" class="form-control"  id="photo" name="photo" value="{{old('photo')}}" accept="image/*;capture=camera">
                                    </div>
                                    </div>
                            <!-- </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex inputDiv mb-1" style="border: none">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
                                            <span class="signatureTitle">Signature Type:</span>
                                        </label>
                                        <!--end::Label-->
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input  type="radio" class="checkbox-field" id="DrawCheck" checked=true  style="width: 12px;">
                                            <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2">
                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
                                        </div>
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input  type="radio" class="" id="flexCheckChecked"  style="width: 12px;">
                                            <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="2">
                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Name</span>
                                        </div>
                                        &nbsp;
                                        <!--end::Label-->
                                        <div style="display:flex; align-items: center; padding-left:10px">
                                            <input  type="radio" class="" id="pdfChecked"  style="width: 12px;">
                                            <input type="hidden" id="pdfsign" name="pdfsigntype" class="form-control form-control-solid" value="0">
                                            <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content">PNG/JPG Upload </span>
                                        </div>

                                    </div>
                                    <div class="d-flex inputDiv my-0" id="sign" style="align-items: center;border:none">
                                        <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Signature:</span>
                                        </label>
                                        <br/> -->
                                        <canvas id="sig" onblure="draw()" style="background: lightgray; border-radius:10px"></canvas>
                                        <br/>
                                        <textarea id="signature" name="signed" style="display: none"></textarea>
                                        <span id="clear" class="fa fa-undo cursor-pointer" style="line-height: 6; position:relative; top:51px; right:26px"></span>
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
                                <div class="col-md-6">
                                    
                                    
                                    <!-- <div class="d-flex inputDiv"  style="align-items: right;text-align:right;">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            
                                            </label> -->
                                        <!-- <button id="submitbutton" type="submit" style="" class="btn btn-primary float-end submitbutton">Submit</button> -->
                                    <!-- </div> -->
                                    <!-- work for approval -->
                                    @include('dashboard.modals.design-relief-modals')
                                        <button id="submitbutton" type="submit"  class="btn btn-primary float-end submitbutton" style="top: 62%">Submit</button>
                        
                                </div>

                            </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        
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
                 $("#twc_email").val(res);
               }
            }
        });
        }
        console.log(project);
    });
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
            $("#sign").css('display','block');
           
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
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
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


     var canvas = document.getElementById("sig");
     var signaturePad = new SignaturePad(canvas);
     signaturePad.addEventListener("endStroke", () => {
        console.log("hello");
              $("#signature").val(signaturePad.toDataURL('image/png'));
            });
    // $("#submitbutton").on('click',function(e){
    //     if ( $("#desingform-form").valid() ) {

    //          $("#signature").val(signaturePad.toDataURL('image/png'));
    //           $("#desingform").submit();
    //         } else {
    //             console.log('form invalid');
    //         }
        
        
    // })


   
     $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
        $("#signature").val('');
    });
    $("#attachment").click(function() {
        $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
        });


    $('#design_required_by_date').change(function() {
        $('#design_required_by_date').css("background-color", "#eee ");
        $('#design_required_by_date').css({"color": "#000"});
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
        $("#attachment-of-design  #submit-requirment button").on("click", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
    
        });

        $("#projects").change(function(){
            console.log("hello")
            $(this).removeClass("blackBack")
            $("#projects span.form-select").removeClass("blackBack")
        //    $(".form-control[readonly]").removeClass("blackBack")
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
</script>

    

@endsection
