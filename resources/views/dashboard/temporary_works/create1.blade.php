@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
    .customDate::-webkit-calendar-picker-indicator {   background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>'); }
    .whiteBack{
            background-color: #f5f8fa !important;
            color: #000 !important;
        }
        .form-select.form-select-solid{
            background-color: #000;
            color: #fff;
        }
.list-div ul li, .list-check-div ul li{
height: 72px;
    overflow: visible;
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
        margin: 0px 29px;
    }

    .newDesignBtn:hover {
        color: #fff;
    }

    .card>.card-body {
        padding: 32px;
    }
    #kt_content_container{
        background-color: #e9edf1;
    }
    #kt_toolbar_container{
        background-color:#fff;
        
        
    }
    .card{
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

    .inputDiv input {
        width: 50%;
        color: #000;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        width: 40%;
        color: #000;
    }
    .select2-container{width:250px !important;}
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
            height: 220px;
        }
        input::placeholder{
    color: #fff !important;
}

        #sig canvas {
            width: 100% !important;
            max-height: 200px;
        }
        .modalDiv{
            width:100% ;
        }
        .blackBack{
        background-color: #000 !important;
        color: #fff !important;
    }
     .form-control.form-control-solid{width:250px;background-color:#000;}
     .form-control.form-control-solid[type="file"]{
        background-color: transparent;
     }
     @media only screen and (min-width: 470px) {
        .list_top{display:inline !important;}
     }
        @media only screen and (max-width: 470px) {
            .list_top{margin-top:20px;}
            .inputDiv label{font-size:11px !important;}
    }
    canvas{width:270px;height:110px;}
    .inputDiv  #design_required_by_date{color:#fff;}
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
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Works</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top">
                        <h2 style="display: inline-block;">Design Brief</h2>
                        <!-- <a style="width: 190px; text-align:center;float: right;" href="{{ route('temporary_works.create') }}" class="newDesignBtn">New Design Brief</a>
                        <a style="width: 190px; text-align:center;float: right;" href="{{ url('manuall-designbrief-form') }}" class="newDesignBtn">Existing Design Brief</a> -->
                        
                        
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('temporary_works.store1') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset @isset($project_ids) {{ in_array($item->id,$project_ids) ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{old('projno')}}">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Project Name" id="name" name="projname"  value="{{old('projname')}}">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW ID No:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input  type="text" class="blackBack form-control form-control-solid" placeholder="Twc Id No" id="twc_id_no" name="twc_id_no"  value="{{old('twc_id_no')}}" required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Upload Existing Design Brief:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="file" class="form-control form-control-solid"  id="pdf" name="pdf" accept="application/pdf">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="date" class="customDate form-control form-control-solid" placeholder="Date" name="design_issued_date"  value="{{old('design_issued_date')}}"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Required by Date:</span>
                                    </label>
                                        <input  style=" cursor: pointer;color: #a9abb7;" type="date" class="customDate form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="design_required_by_date" value="{{old('design_required_by_date')}}"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Project Address" id="address" name="projaddress" value="{{old('projaddress')}}">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"   placeholder="Designer Company Name" id="designer_company_name" name="designer_company_name" value="{{old('designer_company_name')}}"  required>
                                </div>
                                
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Date DCC Returned:</span>
                                    </label>
                                    <!--end::Label-->
                                    <!-- <p style=" cursor: pointer;background-color: #f5f8fa;color: #000 !important;"> -->
                                        <input  style=" cursor: pointer;color: #a9abb7;" type="date" class="customDate form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="dcc_returned" value="{{old('dcc_returned')}}"  >
                                    <!-- </p> -->
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW Category</span>

                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
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
                                    <a href="{{asset('temporary/tw_pdfs/1.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:32px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW Risk Class</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="VL" checked="checked" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">VL</span>
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
                                    <a href="{{asset('temporary/tw_pdfs/2.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:32px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv">
                                
                                    <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#design-requirement" >
                                        <!--begin::Label-->
                                         <label style="" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                           Design Requirement:
                                        </label>
                                        <br>
                                        <input type="text" class="blackBack" style="width: 50%;"  id="design_requirement_text" placeholder="Design requirement" readonly name="design_requirement_text" value="{{old('design_requirement_text')}}">
                                        <!--end::Label-->
                                    </div>
                                
                                 </div>
                                 
                                  <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                              Description:
                                            </label>
                                            <textarea class="blackBack form-control" name="description_temporary_work_required"  style="width:50%"  rows="2" cols="50" placeholder="Provide brief description of design requirements." required>{{old('description_temporary_work_required')}}</textarea>
                                    </div>
                                 </div>
                                 <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Upload Drawings and Design:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="file" class="whiteBack form-control form-control-solid" id="drawing" name="drawing" >
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Date Design Returned:</span>
                                    </label>
                                    <!--end::Label-->
                                    <!-- <p style=" cursor: pointer;background-color: #f5f8fa;color: #000 !important;"> -->
                                        <input  style=" cursor: pointer;color: #a9abb7;" type="date"  class="customDate form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="design_returned" value="{{old('design_returned')}}"  >
                                    <!-- </p> -->
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Upload Design Check Certificate:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="file" class="whiteBack form-control form-control-solid" id="dcc" name="dcc" >
                                </div>
                                 <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                     <input type="text" id="companyadmin" class="blackBack form-control form-control-solid" style="background-color:#f5f8fa" placeholder="Company" name="company"  required>
                                </div>
                                
                            </div>
                        </div>
                          <br>
                          

                          <!--begin::Modal - Design Requirement-->
                        <div class="modal fade" id="design-requirement" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2>Design Requirement</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                        <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                                        <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body py-lg-10 px-lg-10">
                                        <div class="multi-list">
                                            <div class="common-requirment requirment-first">
                                                <input type="text" value="" class="requirment-first-value">
                                                <div class="list-div">
                                                    <ul>
                                                        <li data-id="Excavation">Excavation / Earthworks</li>
                                                        <li data-id="Formwork">Formwork / Falsework</li>
                                                        <li data-id="Equipment">Equipment and Plant</li>
                                                        <li data-id="Establishment">Site Establishment</li>
                                                        <li data-id="Scaffolding">Access / Scaffolding</li>
                                                        <li data-id="Structure">Structure</li>
                                                        <li data-id="Stability">Structural Stability</li>
                                                        <li data-id="Permanent">Permanent Works</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="common-requirment requirment-second">
                                                <input type="text" vlaue="" class="requirment-second-value">
                                                <div class="list-div">
                                                    <ul class="d-none Excavation">

                                                        <li data-id="Trench">Trench Sheeting</li>
                                                        <li data-id="Manhole">Manhole / Trench Boxes</li>
                                                        <li data-id="Cofferdams">Cofferdams</li>
                                                        <li data-id="Excavation">Excavation Shoring System</li>
                                                        <li data-id="Capping">Capping Beam Support</li>
                                                        <li data-id="Temporary">Temporary Slopes</li>
                                                        <li data-id="Headings">Headings / Tunnel Support</li>
                                                        <li data-id="Underpinning">Underpinning</li>
                                                        <li data-id="Stockpiles">Stockpiles</li>
                                                        <li data-id="PCC">PCC L-Shaped Wall</li>
                                                        <li data-id="Embankment">Embankment Bunds</li>
                                                        <li data-id="Dewatering">Dewatering</li>
                                                        <li data-id="State">Other Please State</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                                    </ul>
                                                    <!-- **************** Framework / Falsework **************  -->
                                                    <ul class="d-none Formwork">
                                                        <li>Foundation / Formwork</li>
                                                        <li>Walls / Formwork</li>
                                                        <li>Columns / Formwork</li>
                                                        <li>Slab / Soffit - Falsework</li>
                                                        <li>Beams / Falsework</li>
                                                        <li>Back Propping</li>
                                                        <li>Edge Protection</li>
                                                        <li>Support Systems</li>
                                                        <li>Twin Wall Design & Support</li>
                                                        <li>Push Pulls for Precast Walls and Columns</li>
                                                        <li>Precast Stairs</li>
                                                        <li>Crash Decks</li>
                                                        <li>Metal Decking & Back Propping</li>
                                                        <li>Screen Protection</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="Other (please specify)"></li>
                                                    </ul>
                                                    <!-- **************** Equipment and Plant **************  -->
                                                    <ul class="d-none Equipment">
                                                        <li>Piling Mat & Working Platform</li>
                                                        <li>Crane Platform</li>
                                                        <li>Crane Support & Foundations</li>
                                                        <li>Tower Crane Base</li>
                                                        <li>Access Platform for Machines and Temporary Ramps </li>
                                                        <li>Concrete Pump Working Platform</li>
                                                        <li>Hoist Ties & Foundations</li>
                                                        <li>Mast Climbers & Foundations</li>
                                                        <li>Chute Support</li>
                                                        <li>Loading Bay</li>
                                                        <li>Canti Deck</li>
                                                        <li>Soil Bases</li>
                                                        <li>Lifting / Handling Devices</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                                    </ul>
                                                    <!-- **************** Site Establishment **************  -->
                                                    <ul class="d-none Establishment">
                                                        <li>Temporary Offices / Cabins</li>
                                                        <li>Hoarding / Tower Crane Hoarding</li>
                                                        <li>Access / Scaffolding</li>
                                                        <li>Access Gantries / Platform</li>
                                                        <li>Access Bridges</li>
                                                        <li>Barriers</li>
                                                        <li>Sign Boards</li>
                                                        <li>Fuel Storage</li>
                                                        <li>Welfare Facilities</li>
                                                        <li>Precast Facilities</li>
                                                        <li>Wheel Wash Base</li>
                                                        <li>Permanent Works</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                                    </ul>
                                                    <!-- **************** Access / Scaffolding **************  -->
                                                    <ul class="d-none Scaffolding">
                                                        <li>Tube & Fitting</li>
                                                        <li>System Scaffolding </li>
                                                        <li>System Staircase</li>
                                                        <li>Temporary Roof</li>
                                                        <li>Loading Bay</li>
                                                        <li>Chute Support</li>
                                                        <li>Mobile Tower</li>
                                                        <li>Pedestrian Walkway Cover</li>
                                                        <li>Suspension System</li>
                                                        <li>Pontoon</li>
                                                        <li>Protection Shield (to cover railway while working with crane above)</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                                    </ul>
                                                    <!-- **************** Structure **************  -->
                                                    <ul class="d-none Structure">
                                                        <li>Propping</li>
                                                        <li>Back Propping</li>
                                                        <li>Shoring</li>
                                                        <li>Scaffolding</li>
                                                        <li>Working Platform</li>
                                                        <li>Formwork</li>
                                                        <li>Falsework</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                                    </ul>
                                                    <!-- **************** Structural Stability **************  -->
                                                    <ul class="d-none Stability">
                                                        <li>Existing Structures During Construction</li>
                                                        <li>New Structures During Construction</li>
                                                        <li>Structural Steelwork Erection</li>
                                                        <li>Needling</li>
                                                        <li>Temporary Underpinning</li>
                                                        <li>Cut and Carve Beam and Slab Support</li>
                                                        <li>Facade System</li>
                                                        <li>Party Wall Propping</li>
                                                        <li>Butresses</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                                    </ul>
                                                    <!-- **************** Permanent Works **************  -->
                                                    <ul class="d-none Permanent">
                                                        <li>Partial / Permanent Support Conditions</li>
                                                        <li>Demolition</li>
                                                        <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-requirment" data-bs-dismiss="modal">
                                            <button disabled="disabled" type="button" style="opacity:1 !important;">Save</button>
                                        </div>
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Design Requirement -->

                        <button  type="submit" class="btn btn-primary float-end">Submit</button>
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
@endsection
@section('scripts')
<script src="{{ asset('assets/js/temporary-work-modal.js') }}"></script>
<script>
    var projects = {!!$projects!!};
    $('#projects').change(function() {
        let id = $(this).val();
        let project = projects.filter(function(p) {
            return p.id == id;
        });
        if (project) {
            $('#no').val('').val(project[0].no);
            $('#name').val('').val(project[0].name);
            $('#date').val('').val(project[0].created_at);
            $('#address').val('').val(project[0].address ? project[0].address : 'Not Set');
            $("#companyadmin").val(project[0].company.name);
            $("#company_id").val(project[0].company.id);
        }
        console.log(project);
    });
   

            $('#design_required_by_date').change(function() {
                $('#design_required_by_date').css("background-color", "#f5f8fa ");
                $('#design_required_by_date').css("color", "#000");
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
            $("#twc_id_no").on("change paste keyup cut select", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            });
            $("input").on("change paste keyup cut select", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            });
            $("#projects").change(function(){
            console.log("hello")
            $(this).removeClass("blackBack")
            $("#projects span.form-select").removeClass("blackBack")
         //   $(".form-control[readonly]").removeClass("blackBack")
            $("#no").removeClass("blackBack")
            $("#name").removeClass("blackBack")
            $("#design_issued_date").removeClass("blackBack")
            $("#address").removeClass("blackBack")
            $("#job_title").removeClass("blackBack")
            $("#admin_name").removeClass("blackBack")
            $("#companyadmin").removeClass("blackBack")
            $(".form-select.form-select-solid").css("background-color","#f5f8fa")
            $("#companyadmin").removeClass("blackBack")
            $("#twc_name").removeClass("blackBack")
         //   $("#scopofdesign").addClass("blackBack")
        })
        $("#twc_id_no").on("change paste keyup cut select", function() {
           
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            
        });
        $("#design_requirement_text").click(function() {
           
           $(this).removeClass("blackBack")
           $(this).addClass("whiteBack")
       
   });
   $("textarea").click(function() {
           
           $(this).removeClass("blackBack")
           $(this).addClass("whiteBack")
       
   });
</script>

    

@endsection
