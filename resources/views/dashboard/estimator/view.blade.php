@extends('layouts.dashboard.master',['title' => 'Designer List'])
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
    .form-select.form-select-solid{
        color:#000 !important;
    }
</style>
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Designer & Supplier List</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="cell-border table-hover datatable table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-50px">S.No</th>
                                    <th class="min-w-50px">Company</th>
                                    <th class="min-w-50px">Project</th>
                                    <th class="min-w-50px">Designer Email</th>
                                    <th class="min-w-50px">Price</th>
                                    <th class="min-w-50px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach($listOfDesigners as $designer)
                                 <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$designer->Estimator->company}}</td>
                                    <td>{{$designer->Estimator->project->name}}</td>
                                    <td>{{$designer->email}}</td>
                                    <td>@if(auth()->user()->hasRole('estimator')) ${{$designer->quotationSum->sum('price') ?? 0}} @endif</td>
                                    <td>
                                       
                                        @if(auth()->user()->hasRole(['admin','estimator']))
                                        <a href="{{url('Estimator/estimator-designer/details',$designer->id).'?estid='.$id}}"><i class="fa fa-eye"></i>
                                        </a>
                                        @endif

                                        <a href="{{url('Estimator/estimator-designer/comments',$designer->id).'?estid='.$id}}"><i class="fa fa-comments"></i>
                                        </a>
                                        @if($temporaryWork->estimatorApprove)
                                         @if($designer->estimatorApprove)
                                          <br>
                                          <span class="text-success">Approved</span>
                                         @endif

                                        @else
                                        <a href="{{url('Estimator/estimator-approve-details',$designer->id)}}"><i class="fa fa-save"></i></a>
                                        <form method="POST" action="{{url('Estimator/estimator-approve')}}"  id="form_{{$designer->id}}">
                                           @csrf
                                            <input type="hidden" name="designerId" value="{{$designer->id}}">
                                            <button type="submit" id="{{$designer->id}}" class="confirm1 btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-text="Are you sure ? to approve designer">
                                              <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
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
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')

@endsection

