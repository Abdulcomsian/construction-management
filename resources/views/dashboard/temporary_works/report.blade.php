@extends('layouts.dashboard.master',['title' => 'Reports'])
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
        padding: 20px;
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
        cursor: hand;
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
<!-- @include('layouts.sweetalert.sweetalert_css')
@include('layouts.datatables.datatables_css') -->
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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Reports</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card generte-reports">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Filters</h2>
                        <a class="btn btn-primary pull-right" href="{{ route('export.csv', ['start_date' => request()->get('start_date') ?? '', 'end_date' => request()->get('end_date') ?? '', 'type' => request()->get('type') ?? '']) }}">Export to CSV</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control datepicker" id="start_date" name="start_date" value="{{request()->get('start_date')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control datepicker" id="end_date" name="end_date" value="{{request()->get('end_date')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dropdown">Dropdown</label>
                                    <select class="form-control" id="dropdown" name="type">
                                        <option value="all" {{request()->get('type') == 'all' ? 'selected' : ''}}>All</option>
                                        <option value="design_brief" {{request()->get('type') == 'design_brief' ? 'selected' : ''}}>Design Brief</option>
                                        <option value="permit_load" {{request()->get('type') == 'permit_load' ? 'selected' : ''}}>Permits To Load</option>
                                        <option value="permit_unload" {{request()->get('type') == 'permit_unload' ? 'selected' : ''}}>Permits To Unload</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end p-5 mx-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Design Brief --}}
    @if(request()->get('type') == 'design_brief' || request()->get('type') == 'all')
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card generte-reports">
                    <!--end::Card header-->
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <h2 class="text-center">Design Brief</h2>
                        </div>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="cell-border table-hover datatable table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">Date</th>
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-50px">Issue Date</th>
                                        <th class="min-w-50px">Project Name/Design Requirement</th>
                                        {{-- <th class="min-w-50px">Actions</th> --}}
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @forelse($temporary_works as $item)
                                        <tr>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->twc_id_no}}</td>
                                            <td>
                                                {{ $item->design_issued_date ? date('d-m-Y',
                                                strtotime($item->design_issued_date)) : '-'
                                                }}</span>
                                            </td>
                                            <td style="max-width: 191px;min-width: 191px;">

                                                @php
                                                $value = explode('-', $item->design_requirement_text);
                                                @endphp
                                                <p
                                                    style="font-size: 16px !important; font-weight: 600; font-family: 'Inter'; color: black; margin-bottom: 5px !important; ">
                                                    {{$value[1] ?? ''}}</p>
                                                <p
                                                    style="font-weight:400;font-size:11px !important; font-family: 'Inter';">
                                                    {{ $item->project->name ?? '' }}</p>
                                            </td>
                                        </tr>
                                    @empty
                                    <h3>No Records Found!</h3>
                                    @endforelse

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Permit to Loads --}}
    @if(request()->get('type') == 'permit_load' || request()->get('type') == 'all')
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card generte-reports">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <h2 class="text-center">Permit to Load</h2>
                        </div>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="cell-border table-hover datatable table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">Date</th>
                                        <th class="min-w-50px">Temporary Work</th>
                                        <th class="min-w-50px">Permit No</th>
                                        <th class="min-w-50px">Expiry Date</th>
                                        <th class="min-w-50px">Location</th>
                                        <th class="min-w-50px">Status</th>
                                        {{-- <th class="min-w-50px">Actions</th> --}}
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @php
                                        $current =  \Carbon\Carbon::now();
                                    @endphp
                                    @forelse($permited as $permit)
                                    @php
                                    if(!isset($permit->tempwork)){
                                        continue;
                                    }
                                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                                    $diff_in_days = $to->diffInDays($current);
                                    $color = '';
                                    $status = '';
                                    $days = (7 - $diff_in_days);
                                @endphp
                                        <?php
                                            if ($permit->draft_status == '1') {
                                                $status = "Draft";
                                            }elseif ($permit->status == '1') {
                                                $status = "Open";
                                            } elseif ($permit->status == 0 ) {
                                                $status = "Closed";
                                            } elseif($permit->status == 4)
                                            {
                                                $status = "Unloaded";
                                            } elseif ($permit->status == 3) {
                                                $status = "Unloaded";
                                            } elseif ($permit->status == 2) {
                                                $status = "Pending";
                                            } elseif ($permit->status == 5) {
                                                $status = "Rejected";
                                            }elseif ($permit->status == 6) {
                                                $status = "Pending";
                                            }elseif ($permit->status == 7) {
                                                $status = "Pending";
                                            }
                                        ?>
                                        <tr>
                                            <td>{{$permit->created_at}}</td>
                                            <td><a style="height: 50px;line-height: 15px;" target="_blank" href="{{asset('pdf/'.$permit->ped_url)}}">{{$permit->tempwork->design_requirement_text}}</a></td>
                                            <td>{{ $permit->permit_no ?? '' }}</td>
                                            <td style="max-width: 191px;min-width: 191px;">
                                                {{$days.' days'}} 
                                            </td>
                                            <td>{{$permit->location_temp_work}}</td>
                                            <td>{{$status}}</td>
                                        </tr>
                                        @empty
                                        <h3>No Records Found!</h3>
                                    @endforelse

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    @endif
    
    {{-- Permit to Unload --}}
    @if(request()->get('type') == 'permit_unload' || request()->get('type') == 'all')
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card generte-reports">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <h2 class="text-center">Permit to Unload</h2>
                        </div>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="cell-border table-hover datatable table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">Date</th>
                                        <th class="min-w-50px">Temporary Work</th>
                                        <th class="min-w-50px">Permit No</th>
                                        <th class="min-w-50px">Expiry Date</th>
                                        <th class="min-w-50px">Location</th>
                                        <th class="min-w-50px">Status</th>
                                        {{-- <th class="min-w-50px">Actions</th> --}}
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                    @php
                                        $current =  \Carbon\Carbon::now();
                                    @endphp
                                    @forelse($permit_unload as $permit)
                                        <?php
                                                if (($permit->draft_status == '1')) {
                                                    if($permit->status == 3 || $permit->status == 6){
                                                        $unload_permit = true;
                                                    } else{
                                                        $unload_permit = false;
                                                    }
                                                } else{
                                                    if($permit->status == 3 || $permit->status == 6 || $permit->status == 1){
                                                        $unload_permit = true;
                                                    } else{
                                                        $unload_permit = false;
                                                    }
                                                }
                                                if($unload_permit == false){
                                                    continue;
                                                }  
                                        ?>
                                         @php
                                          if(!isset($permit->tempwork)){
                                                continue;
                                            }
                                            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $permit->created_at);
                                            $diff_in_days = $to->diffInDays($current);
                                            $color = '';
                                            $status = '';
                                            $days = (7 - $diff_in_days);
                                         @endphp
                                        <?php
                                            if ($permit->draft_status == '1') {
                                                $status = "Draft";
                                            }elseif ($permit->status == '1') {
                                                $status = "Open";
                                            } elseif ($permit->status == 0 ) {
                                                $status = "Closed";
                                            } elseif($permit->status == 4)
                                            {
                                                $status = "Unloaded";
                                            } elseif ($permit->status == 3) {
                                                $status = "Unloaded";
                                            } elseif ($permit->status == 2) {
                                                $status = "Pending";
                                            } elseif ($permit->status == 5) {
                                                $status = "Rejected";
                                            }elseif ($permit->status == 6) {
                                                $status = "Pending";
                                            }elseif ($permit->status == 7) {
                                                $status = "Pending";
                                            }
                                        ?>
                                       
                                        <tr>
                                            <td>{{$permit->created_at}}</td>
                                            <td><a style="height: 50px;line-height: 15px;" target="_blank" href="{{asset('pdf/'.$permit->ped_url)}}">{{$permit->tempwork->design_requirement_text}}</a></td>
                                            <td>{{ $permit->permit_no ?? '' }}</td>
                                            <td style="max-width: 191px;min-width: 191px;">
                                                {{$days.' days'}} 
                                            </td>
                                            <td>{{$permit->location_temp_work}}</td>
                                            <td>{{$status}}</td>
                                        </tr>
                                        @empty
                                        <h3>No Records Found!</h3>
                                    @endforelse

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    @endif
</div>
@endsection