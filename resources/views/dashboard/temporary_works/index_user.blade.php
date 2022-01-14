@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style>
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
    .card>.card-body {
        padding: 32px;
    }


    table {
        margin-top: 20px;
    }

    #kt_content_container{
        background-color: #e9edf1;
    }
    #kt_toolbar_container{
        background-color:#fff;
        
        
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
    }
    .card{
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
        /* color: #fff !important; */
        text-align: center;
        /* transform: rotate(-90deg); */
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

    .table {
        border-style: solid;
    }

    .table.table-row-dashed tr {
        height: 120px;
    }

    thead tr {
        height: 6px !important;
    }

    table {
        margin-top: 20px;
    }
    .dataTables_filter input {
        border-radius: 8px;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label,
    .dataTables_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #07d564 !important;
    }

    

    table td {
        padding: 3px 10px;
        color: #000000;
        font-size: 12px;
        font-weight: normal;
    }
    table td .d-flex{
        justify-content: center;
    }
    .btn.btn-active-color-primary:hover:not(.btn-active),
    .btn.btn-active-color-primary:hover:not(.btn-active) i{
    color: #07d564;
}
.modal .btn.btn-primary{
        border-color: #07d564 !important;
background-color: #07d564 !important;
    }
    .topMenu a {
color: #07d564 !important;
}
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
                    <div class="card-title">
                        <h2>Temporary Work Register</h2>
                    </div>
                    <!--begin::Card toolbar-->
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive" style="height: 1000px;">
                        <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="padding: 0px !important;vertical-align: middle;;" class="">TW ID</th>
                                    <th class="">Company</th>
                                    <th style="min-width: 80px; padding: 0px;" class="">Project Name</th>
                                    <th class="" style="max-width:210px;">Description of TWS</th>
                                    <th style="padding: 0px !important;vertical-align: middle;max-width: 75px;min-width:30px" class="">CAT Check</th>
                                    <th style="min-width: 40px;" class="">Risk Class</th>
                                    <th class=""  style="min-width:60px;">Issue Date<br> of Design Brief</th>
                                    <th class=""  style="">Required<br>Date<br>of<br>Design</th>
                                    <th class="">Comments</th>
                                    <th class="">TW designer<br> (designer name and company)</th>
                                    <th class=""  style="padding: 12px;">Date<br> Design<br> Returned</th>
                                    <th class="">TW designer (designer name and company)</th>
                                    <th class=""  style=" padding: 30px !important;">Date<br> DCC <br>Returned</th>
                                    <th class="">DRAWINGS<br> and<br> DESIGNS</th>
                                    <th class="">Design<br> Check<br> CERT</th>
                                    <th class="">Permit to Load</th>
                                    <th class="">Permit to Unload</th>
                                    <th class="">RAMS</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @if($temporary_works)
                                @forelse($temporary_works as $item)
                                <tr>
                                    <td style="padding: 0px !important;vertical-align: middle;min-width: 87px;font-size: 12px;"><a target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}</a></td>
                                    <td>{{ $item->company ?: '-' }}</td>
                                    <td>{{ $item->project->name ?: '-' }}</td>
                                    <td>A10</td>
                                    <td>{{ $item->tw_category ?: '-' }}</td>
                                    <td>{{ $item->tw_risk_class ?: '-' }}</td>
                                    <td style="min-width: 60px; max-width: 80px;">{{ $item->design_issued_date ?: '-' }}</td>
                                    <td style="{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)}}">{{$item->design_required_by_date ?: '-' }} </td>
                                    <td>{{ $item->description_temporary_work_required ?: '-' }}</td>
                                    <td>{{ $item->designer_company_name ?: '-' }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p>Drag and drop folders/ pdf drawings</p><br>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==1)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">D{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <p>Drag and drop folders/ pdf drawings</p>
                                        <br>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==2)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                        @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        <p>Permit to load</p>
                                        @if(isset($item->permits->id))
                                        <button class="btn btn-info">Live</button>
                                        @else
                                        <button class="btn btn-success">Closed</button>
                                        @endif
                                    </td>
                                    <td>
                                         <p>Permit to Unload</p>
                                    </td>
                                    <td>
                                        <p>Drag and drop folders/ pdf drawings</p>
                                        <br>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==3)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">RAMS{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                                @else
                                <tr><td colspan="12"><h3>No record Found</h3></td><td colspan="7"></td></tr>
                                @endif
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