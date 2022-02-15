@extends('layouts.dashboard.master',['title' => 'Project Document'])
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
@include('layouts.datatables.datatables_css')
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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Project Documents</h1>
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
                        <h2>Project Documents</h2>
                    </div>
                    
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="cell-border table-hover datatable table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-50px">S.No</th>
                                    <th class="min-w-50px">Documents</th>
                                    <th class="min-w-50px">Document Type</th>
                                    <th class="min-w-50px">Project Name</th>
                                    <th class="min-w-50px">Create Date</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach($project_documents as $all)
                                <tr class="text-start text-black-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <td>{{$all->id}}</td>
                                    @php  $path = config('app.url');@endphp
                                    <td><a href="{{$path}}{{$all->docuements}}">{{$all->docuements}}</a></td>
                                    <td>{{$all->type}}</td>
                                    <td>{{$all->project->name}}</td>
                                    <td>{{$all->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <br>
                    <div class="col-md-6 d-flex" style="margin-bottom:10px">
                        {{$project_documents->links("pagination::bootstrap-4")}}
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
<div class="modal fade" id="qrcodemodal" tabindex="-1" aria-hidden="true">
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
            
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@endsection
@php

@endphp
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
@include('layouts.dashboard.ajax_call')
<script>
    $(document).ready(function() {
        //When validation error occur
        @if($errors->any())
        $('#project_modal_id').modal('show');
        @endif

        $(document).on('click', '.project_details', function() {
            let type = $(this).attr('value');
            $('.project_details_form').trigger("reset");
            $('#error_div').remove();
            $('input[name="id"]').remove();


            if (type == 'add') {
                $("textarea[name='address']").text('');
                $('#project_modal_id').modal('show');
            } else if (type == 'edit') {
                let id = $(this).data('id');
                let edit_url = "{{ route('projects.edit',':id') }}";
                edit_url = edit_url.replace(':id', id);
                $('.project_details_form').append(`<input name="id" value="${id}" type="hidden">`);
                $.ajax({
                    type: 'GET',
                    url: edit_url,
                    success: function(data) {
                        if (data.status == true) {
                            data = data.project;
                            $("input[name='no']").val(data.no);
                            $("input[name='name']").val(data.name);
                            $("textarea[name='address']").text(data.address);
                            $('#project_modal_id').modal('show');
                        } else {
                            alert('Something went wrong,try again');
                        }
                    }
                });
            }

            if (type == "genqrcode") {
                $("#projectid").val($(this).attr('data-id'));
                $("#qrcodemodal").modal('show');
            }
        });
    });
</script>
@endsection