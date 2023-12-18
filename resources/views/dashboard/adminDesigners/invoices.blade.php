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
        /* margin-top: 200px */
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
        margin: 36px 0px;
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

</style>
@include('layouts.sweetalert.sweetalert_css')
{{-- @include('layouts.datatables.datatables_css') --}}
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
  
    <div class="toolbar" id="kt_toolbar" style="height: 100%">
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
    <div class="post d-flex flex-column-fluid" id="kt_post" >
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title" style="    float: left;padding-top: 0px;">
                        Manage Invoices</h2>
                    </div>
                    <a href="{{route('generate_invoice')}}" class="btn btn-primary">Generate Invoice</a>
                </div>
                
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    {{-- <h2>Jobs</h2> --}}
                   
                    <!--begin::Table-->
                    
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Date of Payment</th>
                                        <th>Sender's Emails</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        {{-- @foreach($task as $row) --}}
                                            {{-- @dd($job->designerAssign->estimatorDesignerListTasks->last()->completed) --}}
                                            @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{$invoice->invoice_number}}</td>
                                                <td>{{date('M d, y',strtotime($invoice->date_of_payment))}}</td>
                                                <td>{{$invoice->send_email}}</td>
                                                <td>{{$invoice->status}}</td>
                                                <td>
                                                <a   href = "{{asset($invoice->file_name)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <i class="fa fa-download" aria-hidden="true"></i>    
                                                </a>
                                               
                                                <button type="button" id = "download-form-{{$invoice->id}}" value = "{{$invoice->status}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm edit_designer_details">
                                                    <i class="fa fa-pen" aria-hidden="true"></i>    
                                                </button>
                                               
                                                </td>
                                            </tr>
                                            @endforeach
                                </tbody>
                            </table>
                        </div>
                  
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
<div class="modal fade" id="Change-Status-Modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
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
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form" class="form change_status_form" action="{{ route('externalDesigners.store') }}" method="post">
                    @csrf
                    <!--begin::Heading-->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Change Payment Status</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Email:</label>
                             <select name = "status" class = "form-select">
                               <option value = "Unpaid">Unpaid</option>
                               <option value = "Paid">Paid</option>
                             </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
{{-- @include('dashboard.modals.project') --}}
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')

<script>
    $(document).ready(function() {
        $(document).on('click', '.edit_designer_details', function() {
         
            let type = $(this).attr('value');
            let id = $(this).attr('id');
            $('.change_status_form').trigger("reset");
            $('.change_status_form input[type="select"]').val('');
            $('#error_div').remove();
            $('.change_status_form input[name="id"]').remove();

                let update_url = "{{ route('update_invoice_status',':id') }}";
                update_url = update_url.replace(':id', id);
                $('.change_status_form').attr('action', update_url);
                // $('.change_status_form').append(`<input name="id" value="${id}" type="hidden">`);           
                // $("#projectid").val($(this).attr('data-id'));
                $("#Change-Status-Modal").modal('show');
  
        });
    });

  
</script>
@endsection