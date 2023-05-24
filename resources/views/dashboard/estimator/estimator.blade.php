@extends('layouts.dashboard.master',['title' => 'Projects'])
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
        background-color: #07d564;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
        margin-right: 0px;
    }

    /*.newDesignBtn:hover {*/
    /*    color: rgba(222, 13, 13, 0.66);*/
    /*}*/

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
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
    }

    table thead {
        background-color: #f5f8fa;
    }

    table thead th {
        color: #000 !important;
        text-align: center;
        /*transform: rotate(-60deg);*/
        border-bottom: 0px !important;
        vertical-align: middle;
        font-size: 12px !important;
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .card>.card-header {
        align-items: center;
    }

    .dataTables_filter input {
        border-radius: 8px;
    }

    thead tr {
        height: 6px !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #07d564 !important;
    }

    table thead th {
        padding: 3px 18px 3px 10px;
        border-bottom: 0;
        color: #ff0000;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        * cursor: hand;
    }

    table td {
        padding: 3px 10px;
        color: #000000;
        font-size: 12px;
        font-weight: normal;
    }

    table td .d-flex {
        justify-content: center;
    }

    .btn.btn-active-color-primary:hover:not(.btn-active),
    .btn.btn-active-color-primary:hover:not(.btn-active) i {
        color: #07d564;
    }

    .modal .btn.btn-primary {
        border-color: #07d564 !important;
        background-color: #07d564 !important;
    }
</style>
@include('layouts.sweetalert.sweetalert_css')
{{-- @include('layouts.datatables.datatables_css') --}}
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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Jobs</h1>
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
                        <h2>Jobs</h2>
                    </div>
                    <!--begin::Card toolbar-->
                    <a href="{{route('add_estimator')}}" class="btn btn-primary">Add New Job</a>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        {{-- <table
                            class="cell-border table-hover datatable table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">S.No</th>
                                    <th class="min-w-125px">User Name</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-125px">Company Name</th>
                                    <th class="min-w-125px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="">
                                <tr>
                                    <td>01</td>
                                    <td>testing</td>
                                    <td>testing@gmail.com</td>
                                    <td>company name</td>
                                    <td><a href="{{route('edit_estimation')}}" class="btn btn-primary">Edit</a></td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table> --}}
                        <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive"
                            id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>Serial No</th>
                                    <th>Project</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach($estimatorWork as $work)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$work->project->name ?? $work->company}}</td>
                                    <td>{{$work->project->company->name ?? $work->company}}</td>
                                    <td>{{Auth::user()->email ?? ''}}</td>
                                    <td><a href="{{route('edit_estimation')}}" class="btn btn-primary">Edit</a></td>
                                </tr>
                                @endforeach
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
@include('dashboard.modals.project')
@endsection
@php
$columns = "[
{ render: function (data, type, row, meta) {
return meta.row + meta.settings._iDisplayStart + 1;
}
},
{data: 'name', name: 'name',defaultContent: '-'},
{data: 'email', name: 'email',defaultContent: '-'},
{data: 'company_id', name:'company_id', defaultContent: '-'},
{data: 'action', name: 'action', orderable: false, searchable: false},
]";
$url = route('users.index');
$data = [
'columns' => $columns,
'url' => $url,
];
@endphp
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
{{-- @include('layouts.datatables.datatables_js',['data' => $data]) --}}
@include('layouts.dashboard.ajax_call')
@include('dashboard.modals.nomination_comment')
<script>

</script>
@endsection