@extends('layouts.dashboard.master',['title' => 'Users'])
@section('styles')
<style>
    .newDesignBtn {
        border-radius: 8px;
        background-color: #F9D413;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
    }

    .newDesignBtn:hover {
        color: rgba(222, 13, 13, 0.66);
    }

    .card>.card-body {
        padding: 32px;
    }
    table{
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }
    .wrapper,
    .page{
        background-image: url({{asset("assets/media/images/temporaryBg.png")}})
    }
    #kt_toolbar_container h1{
        font-size: 35px !important;
        color: red !important;
    }
    .content,
    .card,
    .toolbar-fixed .toolbar{
        background-color: transparent !important;
        border: none !important;
    }
    .card-title h2{
        color: rgba(254, 242, 242, 0.66);
    }
    table tbody td{
        text-align:center;
    }
    table thead{
        background-color: #000;
    }
    table thead th{
        color: #fff !important;
        text-align: center;
        transform: rotate(-90deg);
        border-bottom: 0px !important;
        vertical-align: middle;
        font-size: 12px !important;
        font-weight: 900 !important;
    }
    tbody tr:nth-child(odd) {background-color: #fff;}
    tbody tr:nth-child(even) {background-color: #f2f2f2;}
</style>
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                style="width: 100%; text-align: center;">
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
                    <div class="card-title">
                        <h2>Temporary Work Register</h2>
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <a href="" class="newDesignBtn">New Design Relief</a>
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">TW ID. No.</th>
                                    <th class="min-w-100px">Company</th>
                                    <th class="min-w-100px">Project Name</th>
                                    <th class="min-w-100px">Description of TWS</th>
                                    <th class="min-w-100px">Design Check CAT (0,1,2,3)</th>
                                    <th class="min-w-100px">Implimentation Risk Class (VL,L,M,H)</th>
                                    <th class="min-w-100px">Issue Date of Design Brief</th>
                                    <th class="min-w-100px">Required Date of Design</th>
                                    <th class="min-w-100px">Comments</th>
                                    <th class="min-w-100px">Comments</th>
                                    <th class="min-w-100px">TW designer (designer name and company)</th>
                                    <th class="min-w-100px">Date Design Returned</th>
                                    <th class="min-w-100px">TW designer (designer name and company)</th>
                                    <th class="min-w-100px">Date Design / Check Returned</th>
                                    <th class="min-w-100px">Drawings</th>
                                    <th class="min-w-100px">Design Check Certificate</th>
                                    <th class="min-w-100px">Permit to Load</th>
                                    <th class="min-w-100px">Permit to Unload</th>
                                    <th class="min-w-100px">RAMS</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    <td></td>
                                    <td>A16</td>
                                    <td>A2</td>
                                    <td>A10</td>
                                    <td>0</td>
                                    <td>H3</td>
                                    <td>A3</td>
                                    <td>A4</td>
                                    <td>A11 Drag and Drop emails</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Drag and drop folders/ pdf drawings</td>
                                    <td>Drag and drop folders/ pdf drawings</td>
                                    <td></td>
                                    <td></td>
                                    <td>Drag and drop folders/ pdf drawings</td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
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
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
@endsection