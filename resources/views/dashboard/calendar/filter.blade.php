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
        /* margin: 9px 0px; */
        margin-bottom: 30px;
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

    #modal1 th {
    text-align: center!important;
    }
    .circle.unblink{
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(92, 92, 92);
        margin: auto;
    }

    .circle.blink {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(30, 255, 0);
        animation: blink 1s infinite;
        margin: auto;
        cursor: pointer;
    }

    .circle.danger-blink {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(255, 30, 0);
        animation: blink 1s infinite;
        margin: auto;
        cursor: pointer;
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    } 
    .select2-container {
        width: 250px !important;
    }
.select2-container--bootstrap5 .select2-selection--multiple.form-select-lg {
        word-break: break-all;
        /* height: 32px;
        height:fit-content; */
        background: white;
        border: 1px solid #e4e6ef;
    }
.select2-selection__choice__display {
        color: black;
    }

    textarea.select2-search__field::placeholder {
        color: rgb(138, 136, 136) !important;
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
        {{--
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Filter</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div> --}}
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post"  style="margin-top:300px !important;">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title" style="float: left;padding-top: 0px;">
                        Filters</h2>
                    </div>
                </div>
                
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    {{-- <h2>Jobs</h2> --}}
                    <form method="get" action={{route('filter')}}>
                        <div class="row mb-4">
                                    @csrf
                                    <div class="col-md-3">
                                        <label for="start-date">Start Date:</label>
                                        <input type="date" class="form-control" id="start-date" name="start_date" value="{{ $startDate ?? '' }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="end-date">End Date:</label>
                                        <input type="date" class="form-control" id="end-date" name="end_date" value="{{ $endDate ?? '' }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="user">Select User</label>
                                        <select  id="" name="user[]"
                                            class="form-select form-select-lg form-select-solid" data-control="select2"
                                            data-placeholder="Select an option" data-allow-clear="true" multiple required>
                                            {{-- <option value="">Select Option</option> --}}
                                            <optgroup >
                                            @foreach($users as $user)                                       
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                </option>   
                                            @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-sm btn-primary btn-block mt-md-5" type="submit">Filter</button>
                                    </div>
                            </div>
                        </form>    
                    </div>
                    <!--begin::Table-->
                    @isset($tasks)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Hours</th>
                                        <th>Percentage</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        @foreach ($task->estimatorDesignerListTasks as $row)
                                        {{-- @foreach($task as $row) --}}
                                            {{-- @dd($job->designerAssign->estimatorDesignerListTasks->last()->completed) --}}
                                            <tr>
                                                <td>{{$task->Estimator->projname ?? ''}}</td>
                                                <td>{{$task->user->name ?? ''}}</td>
                                                <td>{{$task->user->email ?? ''}}</td>
                                                <td>{{ $row->date ?? '' }}</td>
                                                <td>{{ $row->hours ?? '' }}</td>
                                                <td>{{ $row->completed ??'' }}%</td>
                                                <td>{{ $row->task ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endisset
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
{{-- @include('dashboard.modals.project') --}}
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
@endsection