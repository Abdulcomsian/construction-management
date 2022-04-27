@extends('layouts.dashboard.master-index-tempory',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style>
    ::-webkit-scrollbar {
        width: 30px;
        height: 30px;
        min-height: 15px;
    }

    .aside-enabled.aside-fixed.header-fixed .header {
        left: 0px !important;
    }

    .aside-enabled.aside-fixed .wrapper {
        padding-left: 0px !important;
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
        margin-right: 0px;
    }

    .newDesignBtn:hover {
        color: rgba(222, 13, 13, 0.66);
    }

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
    }

    .mw-750px {
        max-width: 1050px !important;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


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
        padding: 5px !important;
    }

    table thead {
        background-color: #f5f8fa;
        position: sticky;
        top: 0px;
        z-index: 99;
    }

    table thead th {
        color: #000 !important;
        text-align: center;
        border-bottom: 0px !important;
        vertical-align: middle;
        font-size: 10px !important;
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    .table td {
        font-size: 12px;
        padding: 0px !important;
    }

    .table td p {
        font-size: 12px !important;
        margin: 0px !important;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label,
    .dataTables_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #000 !important;
    }

    tbody.text-gray-600.fw-bold tr td {
        vertical-align: middle;
    }

    table {
        margin-top: 20px;
    }

    .profileimg {
        border-radius: 50%;
    }

    .btn.btn-primary {
        border-color: #07d564 !important;
        background-color: #07d564 !important;
        border-radius: 8px;
    }

    .form-control,
    .form-control:focus {
        border: 1px solid #b5b5c3;
        border-radius: 8px;
    }

    .table th:first-child {
        padding: .75rem .75rem !important;
    }

    .menu-item {
        display: flex;
    }

    .menu-item .menu-link {
        flex: 0%;
    }

    .menu-sub-accordion.show,
    .show:not(.menu-dropdown)>.menu-sub-accordion {
        display: -webkit-inline-box;
    }

    .topMenu {
        background-color: #fff;
        padding: 30px;
        border: 1px solid #e4e6ef !important
    }

    .topMenu a {
        color: #07d564 !important;
    }

    .sweet-alert {
        z-index: 99999999999 !important;
    }

    .sweet-overlay {
        z-index: 99999999999 !important;
    }

    .btn-success {
        border-radius: 8px;
        background: #9370DB !important;
    }

    /*.sweet-alert{
            z-index:99999999999 !important;
        }
        .passionate{
            font-size: 45px !important;
        }
        .sweet-alert h2{font-size:22px !important;}
            @media (max-width: 768px) {
                .margintop{margin-top:20px;}
            }
            @media (max-width: 480px) {
            .passionate{
            font-size:24px !important;
            }
                .btns_resp{
                    display:block !important;
                }
                .project_details{width:250px !important;}
            }*/

    .modal-backdrop {
        visibility: hidden !important;
    }

    .modal.in {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .topMenu,
    #kt_content_container,
    .card>.card-body,
    .card>.card-header {
        padding: 0 1rem !important;
    }

    .table td p {
        position: initial !important;
        top: initial !important
    }
</style>

@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="topMenu" style="padding-top:0px;">
        <!-- <div class="card bg-white border-0 shadow rounded-lg" style="margin:0 auto;">
		<div class="d-flex align-items-center justify-content-center flex-wrap px-5 py-5 px-md-10 py-md-9">
			
			<a data-toggle="tooltip" class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{route('projects.index')}}" target="" title="" data-original-title="With Bootstrap5">Projects</a>
			@if(\Auth::user()->hasAnyRole(['admin', 'company']))
			<a data-toggle="tooltip" class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('companies.index') }}" target="" title="" data-original-title="With Bootstrap4">Companies</a>
			@endif
			@if(\Auth::user()->hasAnyRole(['admin', 'company']))
			<a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('users.index') }}" target="">Users</a>
			@endif
			<a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('temporary_works.index') }}" target="">Temporary Work Register</a>
			<a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('temporary_works.create') }}" target="">New Design Brief</a>
            <a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{route('temporary_works.shared')}}" target="">Shared Temporary Works</a>
		</div>
    </div> -->
        <!--begin::Toolbar-->
        <!-- <div class="toolbar" id="kt_toolbar"> -->
        <!--begin::Container-->
        <!-- <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack"> -->
        <!--begin::Page title-->
        <!-- <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;"> -->
        <!--begin::Title-->

        <!--end::Title-->
        <!-- </div> -->
        <!--end::Page title-->
        <!-- </div> -->
        <!--end::Container-->
        <!-- </div> -->
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
                        <div class="card-title btns_resp" style="width: 100%">


                            <h1 class="passionate text-dark fw-bolder my-1 fs-3" style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">Temporary Works Register</h1>
                        </div>
                        <div class="card-title " style="width: 100%;    display: contents">
                            <div class="formDiv">
                                <div class="form" style="display: flex; align-items: baseline;">
                                    <form class="form-inline d-flex" method="get" action="{{route('tempwork.proj.search')}}">
                                        <div class="col-10">
                                            <select name="projects[]" class="form-select form-select-lg" multiple="multiple" data-control="select2" data-placeholder="Select a Project">
                                                @foreach($projects as $proj)
                                                <option value="{{$proj->id}}">{{$proj->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 margintop">
                                            <button type="submit" class="btn btn-primary mb-2 w-100" style="padding: 1px; margin:8px 0px 0px 10px;width: 35px !important;"><span class="fa fa-filter"></span></button>
                                        </div>
                                    </form>
                                    <div class="col-md-3" style="margin-left: 20px">
                                        <form class="form-inline" method="get" action="{{route('tempwork.search')}}">
                                            <div class="row">
                                                <div class="form-group  col-md-9">
                                                    <input type="text" style="    padding: 0px 10px;" class="form-control" name="terms" required="required" />
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <button style="padding: 1px;width: 35px !important;" type="submit" class="btn btn-primary mb-2 w-100"><span class="fa fa-search"></span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2" style="margin-left: 40px">
                                        <div class="tableInputDiv">
                                            <div class="dropdown">
                                                <button onclick="myFunction()" class="dropbtn" style="text-transform:uppercase;">view</button>
                                                <div id="myDropdown" class="dropdown-content">


                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" id="col_1" checked>
                                                        <span>DESIGN BRIEF</span>
                                                    </div>
                                                    @if(\Auth::user()->hasRole('admin'))
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_2">
                                                        <span>COMPANY</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_3">
                                                        <span>PROJECT NAME</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_4">
                                                        <span>DESCRIPTION OF TWS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_5">
                                                        <span>CAT CHECK</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_6">
                                                        <span>RISK CLASS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_7">
                                                        <span>ISSUE DATE</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_8">
                                                        <span>REQUIRED DATE</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_9">
                                                        <span>COMMENTS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_10">
                                                        <span>TW DESIGNER</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_11">
                                                        <span>DATE DESIGN</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_12">
                                                        <span>DATE DCC</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_13">
                                                        <span>DRAWINGS AND DESIGNS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_14">
                                                        <span>DESIGN CHECK CERT</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_15">
                                                        <span>PERMIT TO LOAD</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_16">
                                                        <span>PERMIT TO UNLOAD</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_17">
                                                        <span>RAMS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_18">
                                                        <span>QRCODE</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_19">
                                                        <span>ACTIONS</span>
                                                    </div>
                                                    @else
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_2">
                                                        <span>PROJECT NAME</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_3">
                                                        <span>DESCRIPTION OF TWS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_4">
                                                        <span>CAT CHECK</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_5">
                                                        <span>RISK CLASS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_6">
                                                        <span>ISSUE DATE</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_7">
                                                        <span>REQUIRED DATE</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_8">
                                                        <span>COMMENTS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_9">
                                                        <span>TW DESIGNER</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_10">
                                                        <span>DATE DESIGN</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_11">
                                                        <span>DATE DCC</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_12">
                                                        <span>DRAWINGS AND DESIGNS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_13">
                                                        <span>DESIGN CHECK CERT</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_14">
                                                        <span>PERMIT TO LOAD</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_15">
                                                        <span>PERMIT TO UNLOAD</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_16">
                                                        <span>RAMS</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_17">
                                                        <span>QRCODE</span>
                                                    </div>
                                                    <div class="inputSpan">
                                                        <input type="checkbox" class="hidecol" checked id="col_18">
                                                        <span>ACTIONS</span>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="button desktopView">
                                    <a style="color:#fff !important; padding:1px;font-size: 14px;text-transform: uppercase;" href="#" class="showonclick newDesignBtn btn project_details adddocument">Add Documents</a>
                                    <a style=" color:#fff !important;  padding:1px;font-size: 14px;text-transform: uppercase;" href="#" class="showonclick newDesignBtn btn project_details viewdocument">View Documents</a>
                                    <a style=" color:#fff !important;  padding:1px;font-size: 14px;text-transform: uppercase;" href="{{ route('Designbrief.export') }}" class="showonclick newDesignBtn btn project_details">Export Data</a>
                                    <a style=" color:#fff !important;  padding:1px;font-size: 14px;text-transform: uppercase;" id="adddocument" class="hideonclick newDesignBtn btn document_data project_details">Documents & Data</a>
                                    <a style=" color:#fff !important;  padding:1px;font-size: 14px;text-transform: uppercase;width:35px !important;" id="crossdoc" class="showonclick newDesignBtn btn  project_details">x</a>
                                </div>
                                <div class="menuBtn">
                                    <span class="fa fa-bars"></span>
                                </div>

                            </div>

                            <div class="mobileView text-center">
                                <a style="color:#fff !important; display:inline-block; padding:1px;font-size: 14px;text-transform: uppercase;" href="#" class="showonclick newDesignBtn btn project_details adddocument">Add Documents</a>
                                <a style=" color:#fff !important;   display:inline-block; padding:1px;font-size: 14px;text-transform: uppercase;" href="#" class="showonclick newDesignBtn btn project_details viewdocument">View Documents</a>
                                <a style=" color:#fff !important;  display:inline-block;  padding:1px;font-size: 14px;text-transform: uppercase;" href="{{ route('Designbrief.export') }}" class="showonclick newDesignBtn btn project_details">Export Data</a>
                                <a style=" color:#fff !important;  padding:1px;font-size: 14px;text-transform: uppercase;" id="adddocument" class="text-center hideonclick newDesignBtn btn document_data project_details">Documents & Data</a>

                                <div class="tableInputDiv">
                                    <div class="dropdown">
                                        <button onclick="myFunctionMobile()" class="dropbtn" style="text-transform:uppercase;">view</button>
                                        <div id="myDropdownMobile" class="dropdown-content">


                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" id="col_1" checked>
                                                <span>DESIGN BRIEF</span>
                                            </div>
                                            @if(\Auth::user()->hasRole('admin'))
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_2">
                                                <span>COMPANY</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_3">
                                                <span>PROJECT NAME</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_4">
                                                <span>DESCRIPTION OF TWS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_5">
                                                <span>CAT CHECK</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_6">
                                                <span>RISK CLASS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_7">
                                                <span>ISSUE DATE</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_8">
                                                <span>REQUIRED DATE</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_9">
                                                <span>COMMENTS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_10">
                                                <span>TW DESIGNER</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_11">
                                                <span>DATE DESIGN</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_12">
                                                <span>DATE DCC</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_13">
                                                <span>DRAWINGS AND DESIGNS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_14">
                                                <span>DESIGN CHECK CERT</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_15">
                                                <span>PERMIT TO LOAD</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_16">
                                                <span>PERMIT TO UNLOAD</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_17">
                                                <span>RAMS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_18">
                                                <span>QRCODE</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_19">
                                                <span>ACTIONS</span>
                                            </div>
                                            @else
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_2">
                                                <span>PROJECT NAME</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_3">
                                                <span>DESCRIPTION OF TWS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_4">
                                                <span>CAT CHECK</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_5">
                                                <span>RISK CLASS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_6">
                                                <span>ISSUE DATE</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_7">
                                                <span>REQUIRED DATE</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_8">
                                                <span>COMMENTS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_9">
                                                <span>TW DESIGNER</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_10">
                                                <span>DATE DESIGN</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_11">
                                                <span>DATE DCC</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_12">
                                                <span>DRAWINGS AND DESIGNS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_13">
                                                <span>DESIGN CHECK CERT</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_14">
                                                <span>PERMIT TO LOAD</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_15">
                                                <span>PERMIT TO UNLOAD</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_16">
                                                <span>RAMS</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_17">
                                                <span>QRCODE</span>
                                            </div>
                                            <div class="inputSpan">
                                                <input type="checkbox" class="hidecol" checked id="col_18">
                                                <span>ACTIONS</span>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        @if(\Auth::user()->hasRole('company') && \auth()->user()->image!='')
                                        <img class="img img-thumbnail profileimg" src="{{\auth()->user()->image}}" width="150px" height="150px">
                                        @endif
                                        <a class="newDesignBtn btn project_details" href="{{ route('temporary_works.create') }}" style="fornt-size:16px;margin-left:0px;width:100%;    padding: 1px;width: 150px;color:#fff !important; margin-top: 20px;text-transform: uppercase;" value="add">New Design Brief</a>
                                    </div>
                                    <div class="col-12 text-center">
                                        <form class="form-inline" method="get" action="{{route('tempwork.search')}}">
                                            <div class="row" style="margin:0 auto;">
                                                <div class="form-group  col-md-2 text-center">
                                                    <label class="text-white">Search</label>
                                                    <input type="text" style="  margin:0 auto;    width: 240px;  padding: 0px 10px;" class="form-control" name="terms" placeholder="Search1 Description of TWS" required="required" />
                                                </div>
                                                <div class="col-md-4 mt-6 text-center">
                                                    <button style="padding: 1px;width: 35px !important;" type="submit" class="btn btn-primary mb-2 w-100"><span class="fa fa-search"></span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row" style="display: contents;">
                            <form class="form-inline d-flex" style="width: 40%" method="get" action="{{route('tempwork.proj.search')}}" >
                                <div class="col-md-9 col-sm-6" >
                                   <select name="projects[]"  class="form-select form-select-lg form-select-solid" multiple="multiple"data-control="select2" data-placeholder="Select a Project" data-allow-clear="true">
                                       
                                       <option value="">Select Projects</option>
                                       @foreach($projects as $proj)
                                       <option value="{{$proj->id}}">{{$proj->name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="col-md-2 col-sm-7 margintop">
                                    <button type="submit" class="btn btn-primary mb-2 w-100" style="padding: 1px; margin:8px 0px 0px 10px;width: 35px !important;"><span class="fa fa-filter"></span></button>
                                </div>
                             </form>
                            <div class="col-md-2 col-sm-7 text-center showonclick margintop "> <a style="color:#fff !important; padding:1px; width:170px;  font-size: 16px;text-transform: uppercase;" href="#" class="newDesignBtn btn project_details adddocument">Add Documents</a>
                            </div>
                            <div class="col-md-3  col-sm-7 text-center showonclick margintop "><a style=" color:#fff !important;  padding:1px; width:170px;  font-size: 16px;text-transform: uppercase;" href="#" class="newDesignBtn btn project_details viewdocument">View Documents</a> 
                            </div>
                            <div class="col-md-2 col-sm-7 text-center showonclick margintop "><a style=" color:#fff !important;  padding:1px; width:170px;  font-size: 16px;text-transform: uppercase;" href="{{ route('Designbrief.export') }}" class="newDesignBtn btn project_details">Export Data</a>
                            </div>

                            <div class="col-md-2 col-sm-7 hideonclick text-center margintop"><a style=" color:#fff !important;  padding:1px; width:170px;  font-size: 16px;text-transform: uppercase;" id="adddocument" class="newDesignBtn btn document_data project_details">Documents & Data</a>
                            </div>
                        </div> -->
                        </div>
                        <!--begin::Card toolbar-->

                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="row desktopView">

                            <div class="col-md-2">
                                @if(\Auth::user()->hasRole('company') && \auth()->user()->image!='')
                                @php $path = config('app.url');@endphp
                                <img class="img img-thumbnail profileimg" src="{{$path.\auth()->user()->image}}" width="150px" height="150px">
                                @endif
                                <a class="newDesignBtn btn project_details" href="{{ route('temporary_works.create') }}" style="fornt-size:16px;margin-left:0px;width:100%;    padding: 1px;width: 150px;color:#fff !important; margin-top: 20px;text-transform: uppercase;" value="add">New Design Brief</a>

                            </div>


                        </div>
                        <!--begin::Table-->
                        <div class="table-responsive tableDiv" style="height: 1000px;">
                            <div class="tableInputDiv">
                                <div class="">

                                </div>
                            </div>
                            <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th style="padding: 0px !important;vertical-align: middle;;" class="">TW ID<br>Design Brief</th>
                                        @if(\Auth::user()->hasRole('admin'))
                                        <th class="">Company</th>
                                        @endif
                                        <th style="min-width: 80px; padding: 0px;" class="">Project Name</th>
                                        <th class="" style="max-width:150px;">Description of TWS</th>
                                        <th style="padding: 0px !important;vertical-align: middle;max-width: 75px;min-width:30px" class="">CAT Check</th>
                                        <th style="min-width: 40px;" class="">Risk Class</th>
                                        <th class="" style="min-width:60px;">Issue Date<br> of Design Brief</th>
                                        <th class="" style="">Required<br>Date<br>of<br>Design</th>
                                        <th class="">Comments</th>
                                        <th class="">TW designer<br> (designer name and company)</th>
                                        <!-- <th class="">Appointments</th>  -->
                                        <th class="" style="padding: 12px;">Date<br> Design<br> Returned</th>
                                        <th class="" style=" padding: 30px !important;">Date<br> DCC <br>Returned</th>
                                        <th class="">DRAWINGS<br> and<br> DESIGNS</th>
                                        <th class="">Design<br> Check<br> CERT</th>
                                        <th class="">Permit to Load</th>
                                        <th class="">Permit to Unload</th>
                                        <th class="">RAMS</th>
                                        <th class="">Qrcode</th>
                                        <th>Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @forelse($temporary_works as $item)

                                    <tr>
                                        <td style="padding: 0px !important;vertical-align: middle;min-width: 90px;font-size: 12px;">
                                            @if(count($item->rejecteddesign)>0)
                                            <button style="padding: 3px !important;border-radius: 4px;background: #50cd89; font-size: 12px;" class="btn btn-info rejecteddesign" data-id="{{Crypt::encrypt($item->id)}}"><i class="fa fa-eye"></i>
                                            </button>
                                            <br>
                                            @endif

                                            <a style="color:{{$item->status==0 || $item->status==2 ? 'red !important':'';}}" target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}
                                            </a>
                                            @if($item->status==2)
                                            <!-- <p class="rejectcomment cursor-pointer" data-id="{{$item->id}}" > <span class="text-danger">Rejected</span></p> -->
                                            <a href="{{route('temporary_works.edit',$item->id)}}" style="padding: 3px !important;border-radius: 4px;background: #50cd89; font-size: 12px;" class="btn btn-primary p-2 m-1"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            @endif
                                        </td>
                                        @if(\Auth::user()->hasRole('admin'))
                                        <td>
                                            <p>{{ $item->company ?: '-' }}</p>
                                        </td>
                                        @endif
                                        <td>{{ $item->project->name ?? '' }}</td>
                                        <td style="min-width:150pxpx;padding-left: 10px !important;padding-right: 10px !important;">
                                            <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                            <hr style="margin: 5px;;color:red;border:1px solid red">
                                            <button style="background: #07d564;font-size: 12px;border-radius: 4px; padding: 2px;" class="desc btn btn-info" data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}">
                                                Description
                                            </button>
                                        </td>
                                        <td style="">{{ $item->tw_category }}</td>
                                        <td style="">{{ $item->tw_risk_class ?: '-' }}</td>
                                        <td style="min-width: 100px; max-width: 80px;">{{ date('d-m-Y', strtotime($item->design_issued_date)) ?: '-' }}</td>
                                        <td style="min-width:100px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)}};">
                                            <p><b>{{date('d-m-Y', strtotime($item->design_required_by_date)) ?: '-' }}</b></p>
                                        </td>
                                        <td>
                                            <p class="addcomment cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;" data-id="{{$item->id}}">
                                                <!-- <span class="fa fa-plus"></span> -->
                                                <br> Comment
                                            </p>
                                            @php
                                            $color="green";
                                            if(count($item->comments)>0)
                                            {
                                            $color="red";
                                            if(count($item->reply)== count($item->comments))
                                            {
                                            $color="blue";
                                            }

                                            }

                                            @endphp
                                            <span data-id="{{$item->id}}" class="addcomment cursor-pointer" style="background:{{$color}};color: white;font-weight: bold;padding: 0 10px;">{{count($item->comments) ?? '-'}}</span>
                                            <hr style="color:red;border:1px solid red; margin: 2px;">
                                            <h3 class="uploadfile  cursor-pointer" style="margin-bottom:0px;font-weight: 400;font-size: 14px;" data-id="{{$item->id}}" data-type="4">

                                                <!-- <span class="fa fa-plus"></span> -->
                                                <br> Emails
                                            </h3>

                                            @php $i=0;@endphp
                                            @foreach($item->uploadfile as $file)
                                            @if($file->file_type==4)
                                            @php $i++ @endphp
                                            <span><a href="{{asset($file->file_name)}}" target="_blank">E{{$i}}</a></span>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td style="">
                                            <button style="padding: 3px !important;border-radius: 4px;background: #50cd89; font-size: 12px;" class="btn btn-info designer-company" data-desing="{{$item->designer_company_name.'-'.$item->desinger_company_name2 ?? ''}}" data-tw="{{$item->tw_name ?? ''}}">View
                                            </button>


                                            <!-- {{$item->tw_name ?: '-'}} -->
                                            @if(!$item->tw_name)
                                            <!-- <p class="addtwname cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;"  data-id="{{$item->id}}"><span class="fa fa-plus"></span> Add TWD Name</p> -->
                                            @endif
                                        </td>
                                        <!-- <td>
                                        <p  class="uploadfile  cursor-pointer" data-id="{{$item->id}}" data-type="5">Drag and drop folders/ appointments</p><br>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==5)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">App{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td> -->
                                        <td style="">
                                            @php
                                            $date='';
                                            @endphp
                                            @foreach($item->uploadfile as $file)
                                            @php
                                            if($file->file_type==1 && $file->construction==1)
                                            {
                                            $color='green';
                                            $date=$file->created_at->todatestring();
                                            }
                                            elseif($file->file_type==1 && $file->preliminary_approval==1)
                                            {
                                            $color='#FFD700';
                                            $date=$file->created_at->todatestring();
                                            }
                                            @endphp
                                            @endforeach
                                            @if($date)
                                            <p class="dateclick cursor-pointer" style="color:{{$color ?? ''}};background: #f2f2f2;" data-id="{{$item->id}}" data-type="1"> {{date('d-m-Y', strtotime($date))}}
                                            </p>
                                            @endif
                                        </td>
                                        <!--  <td></td> -->
                                        <td style="">
                                            @foreach($item->uploadfile as $file)
                                            @if($file->file_type==2)
                                            <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">{{date('d-m-Y', strtotime($file->created_at->todatestring()))}}</p>
                                            @break
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <p class="uploaddrawing cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: 4px;">
                                                <!-- Upload Drawings -->
                                                <span class="fa fa-plus" title="Upload Drawings"></span>
                                            </p>
                                            <br>
                                            <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: 0px;">
                                                <!-- View Drawings -->
                                                <span class="fa fa-eye" title="View Drawings"></span>
                                            </p>
                                            <!-- @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==1)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">D{{$i}}</a></span>
                                        @endif
                                        @endforeach -->
                                        </td>
                                        <td>
                                            <p class="uploadfile  cursor-pointer" data-id="{{$item->id}}" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;" data-type="2">Upload DCC</p>
                                            @php $i=0;@endphp
                                            @foreach($item->uploadfile as $file)
                                            @if($file->file_type==2)
                                            @php $i++ @endphp
                                            <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                            @endif
                                            @endforeach

                                        </td>
                                        <td>
                                            <p class="cursor-pointer permit-to-load-btn" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to<br> load</p>
                                            @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                            @php
                                            $permitexpire=\App\Models\PermitLoad::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();

                                                $scaffoldexpire=\App\Models\Scaffolding::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();

                                                    $color="orange";
                                                    if($permitexpire>0 || $scaffoldexpire>0)
                                                    {
                                                    $color="red";
                                                    }


                                                    @endphp
                                                    <br>
                                                    @if(count($item->scancomment)>0)
                                                    <button style="padding: 3px !important;border-radius: 4px;background: #50cd89; font-size: 12px;" class="btn btn-info scancomment" data-id="{{$item->id}}"><span class="fa fa-comments"></span>
                                                    </button>
                                                    @endif
                                                    <br><br>
                                                    @if(isset($item->rejectedpermits) && count($item->rejectedpermits)>0)
                                                    <span class="text-danger">DNL</span>
                                                    @endif
                                                    <button style="padding: 7px !important;border-radius: 10px;background-color:{{$color}};" class="permit-to-load-btn btn btn-info">Live ({{count($item->permits ?? 0)+count($item->scaffold ?? 0)}})</button>
                                                    @else
                                                    <button style="padding: 3px !important;border-radius: 4px; font-size: 12px;" class="btn btn-primary">Closed</button>
                                                    @endif
                                        </td>
                                        <td>
                                            <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;position: relative;top: -17px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to <br>Unload</p>
                                        </td>
                                        <td data-type="2">
                                            <p class="uploadfile cursor-pointer" data-id="{{$item->id}}" data-rams="{{$item->rams_no ?? ''}}" style="position: relative;top: -23px;margin-bottom:0px;font-weight: 400;font-size: 14px;" data-type="3">Upload RAMS<br></p>
                                            @php $i=0;@endphp
                                            @foreach($item->uploadfile as $file)
                                            @if($file->file_type==3)
                                            @php $i++ @endphp
                                            <span><a href="{{asset($file->file_name)}}" target="_blank">RAMS{{$i}}</a></span>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $qrcode=\App\Models\ProjectQrCode::where(['tempid'=>$item->tempid,'project_id'=>$item->project->id])->first();
                                            @endphp
                                            @if(isset($qrcode->qrcode) && file_exists(public_path('qrcode/projects/'.$qrcode->qrcode.'')))
                                            <a href="{{route('tempwork.qrcodedetail',$item->id)}}">
                                                <img class="p-2" src="{{asset('qrcode/projects/'.$qrcode->qrcode.'')}}" width="100px" height="100px">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(\Auth::user()->hasRole('admin'))
                                            <a href="{{route('tempwork.sendattach',$item->id)}}" class="btn btn-primary p-2 m-1"><i class="fa fa-arrow-right"></i></a>
                                            @endif
                                            <br>
                                            @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                            <form method="POST" action="{{route('temporary_works.destroy',$item->id)}} " id="{{'form_' . $item->id}}">
                                                @method('Delete')
                                                @csrf
                                                <button type="submit" id="{{$item->id}}" class="confirm btn btn-danger p-2 m-1 ">
                                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                    <i style="padding:3px;" class="fa fa-trash-alt"></i>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </form>
                                            @endif
                                            @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                            <a href="#" class="btn btn-danger p-2 m-1 sharebutton" style="border-radius: 21%;" data-id={{Crypt::encrypt($item->id)}}>
                                                <i style="padding:3px;" class="fa fa-share-alt"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6 d-flex" style="margin-bottom:10px">
                        {{$temporary_works->links("pagination::bootstrap-4")}}
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@include('dashboard.modals.drawingdesign')
@include('dashboard.modals.upload-file')
@include('dashboard.modals.tw_name')
@include('dashboard.modals.designername')
@include('dashboard.modals.comments')
@include('dashboard.modals.drawingdesignlist')
@include('dashboard.modals.datemodal')
@include('dashboard.modals.permit_to_load')
@include('dashboard.modals.description')
@include('dashboard.modals.project_documents')
@include('dashboard.modals.tempwork_share')
@include('dashboard.modals.rejected-temporarywork-modals')
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script> -->
<script>
    $(document).ready(function() {

        $(".showonclick").hide();
    })
</script>
<script src="{{asset('js/dropzone.js')}}"></script>
<script type="text/javascript">
    var role = "{{ \Auth::user()->roles->pluck('name')[0] }}";
    console.log(role);
    Dropzone.options.dropzoneForm = {
        init: function() {
            // Set up any event handlers
            this.on("queuecomplete", function(file) {
                location.reload();
            });
        }
    };
</script>
<script>
    $(".uploadfile").on('click', function() {
        if (role == 'supervisor' || role == "scaffolder") {
            alert("You are not allowed to add File");
            return false;
        }
        $("#tempworkid").val($(this).attr('data-id'));
        $("#type").val($(this).attr('data-type'));
        if ($(this).attr('data-type') == '3') {
            $("#rams_no").removeClass('d-none').val($(this).attr('data-rams'));
        } else {
            $("#rams_no").addClass('d-none');
        }
        $("#upload_file_id").modal('show');

    })
</script>
<script type="text/javascript">
    $(".addtwname").on('click', function() {
        $("#temp_work_idd").val($(this).attr('data-id'));
        var temporary_work_id = $(this).attr('data-id');
        var userid = {{Auth::user()->id}}
        $("#tw_modal_id").modal('show');
    })

    $(".addcomment").on('click', function() {
        if (role == 'supervisor' || role == "scaffolder") {
            alert("You are not allowed to add comment");
            return false;
        }
        $("#temp_work_id").val($(this).attr('data-id'));
        var temporary_work_id = $(this).attr('data-id');
        var userid = {{Auth::user()->id}}
        $("#commenttable").html('');
        $.ajax({
            url: "{{route('temporarywork.get-comments')}}",
            method: "get",
            data: {
                id: userid,
                temporary_work_id: temporary_work_id,
                type: 'normal'
            },
            success: function(res) {
                $("#commenttable").html(res);
                $(".comments_form").show();
                $("#comment_modal_id").modal('show');
            }
        });

    });

    //show reject comment
    $(".rejectcomment").on('click', function() {
        if (role == 'supervisor' || role == "scaffolder") {
            alert("You are not allowed to add comment");
            return false;
        }
        $("#temp_work_id").val($(this).attr('data-id'));
        var temporary_work_id = $(this).attr('data-id');
        var userid = {{Auth::user()->id}}
        $("#commenttable").html('');
        $.ajax({
            url: "{{route('temporarywork.get-comments')}}",
            method: "get",
            data: {
                id: userid,
                temporary_work_id: temporary_work_id,
                type: 'pc'
            },
            success: function(res) {
                $("#commenttable").html(res);
                $(".comments_form").hide();
                $("#comment_modal_id").modal('show');
            }
        });

    });
</script>
<script type="text/javascript">
    $(".dateclick").on('click', function() {
        if (role == 'supervisor' || role == "scaffolder") {
            alert("You are not allowed to add comment");
            return false;
        }
        var file_type = $(this).attr('data-type');
        var tempid = $(this).attr('data-id');
        $.ajax({
            url: "{{route('temporarywork.file-upload-dates')}}",
            method: "get",
            data: {
                file_type: file_type,
                tempid: tempid
            },
            success: function(res) {
                $("#tablebody").html(res);
                $("#date_modal_id").modal('show');
            }
        });

    })


    //upload drawing and design
    $(".uploaddrawing").on('click', function() {
        var tempworkid = $(this).attr('data-id');
        $("#desing_tempworkid").val(tempworkid);
        $("#drawinganddesign").modal('show');
    })

    //upload drawing and design
    $(".uploaddrawinglist").on('click', function() {
        var tempworkid = $(this).attr('data-id');

        $.ajax({
            url: "{{route('get-designs')}}",
            method: "get",
            data: {
                tempworkid: tempworkid
            },
            success: function(res) {
                $("#drawingdesigntable").html(res);
                $("#drawinganddesignlist").modal('show');
            }
        });

    })
</script>


<script type="text/javascript">
    $(".permit-to-load").on('click', function() {
        id = $(this).attr('data-id');
        desc = $(this).attr('data-desc');
        $.ajax({
            url: "{{route('permit.get')}}",
            method: "get",
            data: {
                id: id,
                desc: desc
            },
            success: function(res) {
                $("#permitheading").html('Permit To Load');
                $("#permitloadbutton").addClass('d-flex').show();
                $("#permitbody").html(res);
                $(".temp_work_id").val(id);
                $("#permit_modal_id").css('display', 'block');
                $("#permit_modal_id").modal('show');
            }
        });

    })
    $(".permit-to-load-btn").on('click', function() {
        id = $(this).attr('data-id');
        desc = $(this).attr('data-desc');
        $.ajax({
            url: "{{route('permit.get')}}",
            method: "get",
            data: {
                id: id,
                desc: desc
            },
            success: function(res) {
                $("#permitheading").html('Permit To Load');
                $("#permitloadbutton").addClass('d-flex').show();
                $("#permitbody").html(res);
                $(".temp_work_id").val(id);
                $("#permit_modal_id").css('display', 'block');
                $("#permit_modal_id").modal('show');
            }
        });

    })

    //permit to unload
    $(".permit-to-unload").on('click', function() {
        id = $(this).attr('data-id');
        desc = $(this).attr('data-desc');
        $.ajax({
            url: "{{route('permit.get')}}",
            method: "get",
            data: {
                id: id,
                type: 'unload',
                desc: desc
            },
            success: function(res) {
                console.log(res);
                $("#permitheading").html('Permit To Unload');
                $("#permitloadbutton").removeClass('d-flex').hide();
                $("#permitbody").html(res);
                $("#permit_modal_id").css('display', 'block');
                $("#permit_modal_id").modal('show');
            }
        });
    })

    //desc 
    $(".desc").on('click', function() {
        var desc = $(this).attr('title');
        $("#desc").html(desc);
        $("#desc_modal_id").modal('show');
    })

    //Add documents
    $(".adddocument").on('click', function(e) {
        if (role == 'supervisor' || role == "scaffolder") {
            alert("You are not allowed to add Documents");
            return false;
        }
        e.preventDefault();
        $("#project-documents").hide();
        $(".project_doc_form").show();
        $("#project_document_modal_id").modal('show');
    });

    //view documents
    $(".viewdocument").on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('project.document.get')}}",
            method: "GET",
            data: {},
            success: function(res) {
                $(".project_doc_form").hide();
                $("#project-documents").html(res);
                $("#project-documents").show();
                $("#project_document_modal_id").modal('show');
            }
        });

    });

    //share butto click envent
    $(".sharebutton").on('click', function(e) {
        e.preventDefault();
        var tempid = $(this).attr('data-id');
        $("#sharetempid").val(tempid);
        $("#tempwork_share_modal_id").modal('show');
    })
</script>
<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize: 50,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 500000,
        removedfile: function(file) {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("image/delete") }}',
                data: {
                    filename: name
                },
                success: function(data) {
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response) {
            console.log(response);
        },
        error: function(file, response) {
            return false;
        }
    };


    $(document).on('click', "#adddocument", function() {
        console.log("here");
        $(".showonclick").show();
        $(".hideonclick").hide();

    })
    $(document).on('click', "#crossdoc", function() {
        console.log("here");
        $(".showonclick").hide();
        $(".hideonclick").show();

    })
</script>
<script type="text/javascript">
    $('input[name="preliminary_approval"]').on('click', function() {
        var val = $(this).val();
        console.log(val);
        if (val == 1) {
            $("[datacheck='no']").prop('checked', true);
            $("[datacheck='yes']").prop('checked', false);
        } else {
            $("[datacheck='no']").prop('checked', false);
            $("[datacheck='yes']").prop('checked', true);
        }
    })

    $('input[name="construction"]').on('click', function() {
        var val = $(this).val();
        console.log(val);
        if (val == 1) {
            $("[datacheck1='no']").prop('checked', true);
            $("[datacheck1='yes']").prop('checked', false);
        } else {
            $("[datacheck1='no']").prop('checked', false);
            $("[datacheck1='yes']").prop('checked', true);
        }
    })

    $(document).on('click', ".clickable-row", function() {
        window.open($(this).data("href"), '_blank');
    });

    $(document).on('click', '.openpermitform', function(e) {
        id = $(this).attr('id');
        $("#submit" + id + "").submit();
        e.stopPropagation();
    })


    $(document).on('click', '.permit-rejected', function() {
        var permit_id = $(this).attr('data-id');
        $.ajax({
            url: "{{route('temporarywork.get-comments')}}",
            method: "get",
            data: {
                permit_id: permit_id,
                type: 'permit'
            },
            success: function(res) {
                $("#permit_modal_id").modal('hide');
                $("#commenttable").html(res);
                $(".comments_form").hide();
                $("#comment_modal_id").modal('show');
            }
        });
    })

    $(".designer-company").on('click', function() {
        var companies = $(this).attr('data-desing');
        const names = companies.split("-");
        var tw_name = $(this).attr('data-tw');
        console.log(tw_name);
        var list = '';
        if (names[0] != '') {
            list += '<tr><td>1</td><td>' + names[0] + '</td><td>' + tw_name + '</td></tr>';
        }
        if (names[1] != '') {
            list += '<tr><td>2</td><td>' + names[1] + '</td><td>' + tw_name + '</td></tr>';
        }
        $("#desginerbody").html(list);
        $("#desingername").modal('show');
    })

    $(document).on('click', ".commentstatus", function() {
        text = $(this).text();
        if (text == "Pending") {
            modaltext = "Do you want to change Comment status to Fixed?";
        } else {
            modaltext = "Do you want to change Comment status to Pending?";
        }
        commentid = $(this).attr('data-id');
        var $t = $(this);
        $("#comment_modal_id").modal('hide');

        swal({
                title: modaltext,
                // text: "You will not be able to recover this record!",
                type: "warning",
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes!',
                showCancelButton: true,
                closeOnConfirm: true,
                //closeOnCancel: false
            },
            function() {
                $.ajax({
                    url: "{{route('temporarywork.comments.status')}}",
                    method: "get",
                    data: {
                        commentid,
                        text
                    },
                    success: function(res) {
                        if (res == "success") {
                            if (text == "Pending") {
                                $t.text('Fixed');
                                $t.removeClass('btn btn-primary').addClass('btn btn-success');
                                $("#comment_modal_id").modal('show');
                            } else {
                                $t.text('Pending');
                                $t.removeClass('btn btn-success').addClass('btn btn-primary');
                                $("#comment_modal_id").modal('show');
                            }

                        } else {
                            $t.text(text);
                        }
                    }
                });

            });


    });


    $(document).ready(function() {


        // Checkbox click
        $(".hidecol").click(function() {

            var id = this.id;
            var splitid = id.split("_");
            var colno = splitid[1];
            var checked = true;

            // Checking Checkbox state
            if ($(this).is(":checked")) {
                checked = false;
            } else {
                checked = true;
            }
            setTimeout(function() {
                if (checked) {
                    $('table td:nth-child(' + colno + ')').hide();
                    $('table th:nth-child(' + colno + ')').hide();
                } else {
                    $('table td:nth-child(' + colno + ')').show();
                    $('table th:nth-child(' + colno + ')').show();
                }

            }, 1500);

        });
    });

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function myFunctionMobile() {
        document.getElementById("myDropdownMobile").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                //   if (openDropdown.classList.contains('show')) {
                //     openDropdown.classList.remove('show');
                //   }
            }
        }
    }
    $(document).click(function(e) {

        e.stopPropagation();

        //check if the clicked area is dropDown or not
        if (!$(event.target).closest('.dropbtn').length && !$(event.target).closest('#myDropdown').length) {
            console.log("hello")
            $("#myDropdown").removeClass("show")
        }


        // if($("#myDropdown").hasClass('show')){
        //     $("#myDropdown").hide()
        // }
        // $("#myDropdown").click(function(e){
        //     e.stopPropagation(); 
        // });
    });

    $(document).on('click', '.scancomment', function() {
        var temporary_work_id = $(this).attr('data-id');
        var userid = {
            {
                \
                Auth::user() - > id
            }
        }
        $("#commenttable").html('');
        $.ajax({
            url: "{{route('temporarywork.get-comments')}}",
            method: "get",
            data: {
                temporary_work_id: temporary_work_id,
                type: 'scan'
            },
            success: function(res) {
                $("#commenttable").html(res);
                $(".comments_form").hide();
                $("#comment_modal_id").modal('show');
            }
        });

    });

    $(document).on('click', '.rejecteddesign', function() {
        tempid = $(this).attr('data-id');
        $.ajax({
            url: "{{route('rejected.designs')}}",
            method: "get",
            data: {
                tempid
            },
            success: function(res) {
                res = JSON.parse(res);
                console.log(res);
                $("#rejected-designbrief-body").html(res.list);
                $("#design-brief").html(res.brief);
                $("span#rejectstatus").html(res.status);
                $("#rejected_designbrief_modal_id").modal('show');
            }
        });
    })
</script>
@endsection