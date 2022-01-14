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
        border-collapse: separate;
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
        border-collapse: separate;
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
                    <div class="table-responsive">
                        <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
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
                                @if($temporary_works)
                                @forelse($temporary_works as $item)
                                <tr>
                                    <td><a target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}</a></td>
                                    <td>{{ $item->company ?: '-' }}</td>
                                    <td>{{ $item->project->name ?: '-' }}</td>
                                    <td>A10</td>
                                    <td>{{ $item->tw_category ?: '-' }}</td>
                                    <td>{{ $item->tw_risk_class ?: '-' }}</td>
                                    <td>{{ $item->design_issued_date ?: '-' }}</td>
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