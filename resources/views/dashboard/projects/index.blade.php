@extends('layouts.dashboard.master',['title' => 'Projects'])
@section('styles')
    <style>
        .newDesignBtn {
            border-radius: 8px;
            background-color: #F9D413;
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
            /*transform: rotate(-60deg);*/
            border-bottom: 0px !important;
            vertical-align: middle;
            font-size: 12px !important;
            font-weight: 900 !important;
        }
        tbody tr:nth-child(odd) {background-color: #fff;}
        tbody tr:nth-child(even) {background-color: #f2f2f2;}
        .card>.card-header{
            align-items: center;
        }
        .dataTables_filter input{
            border-radius: 8px;
        }
        thead tr{
            height: 6px !important;
        }
        table {
            margin-top: 20px;
            border-collapse: separate;
            background-color: red !important;
            border-color: red !important;
            border-style: solid !important;
        }
        .dataTables_length label,
        #DataTables_Table_0_filter label{
            color: #fff;
        }
        .page-item.active .page-link{
            background-color: #000 !important;
        }
        table thead th {
            padding: 3px 18px 3px 10px;
            border: 1px solid red !important;
            border-bottom: 0;
            color: #ff0000;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            * cursor: hand;
        }

        table td {
            border: 1px solid red !important;
            padding: 3px 10px;
            color: #000000;
            font-size: 12px;
            font-weight: normal;
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
                <div data-kt-place="true" data-kt-place-mode="prepend"
                     data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                     style="width: 100%; text-align: center;">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Projects</h1>
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
                            <h2>Projects</h2>
                        </div>
                        <!--begin::Card toolbar-->
                        @if(\Auth::user()->hasAnyRole(['admin', 'company']))
                        <button value="add" class="newDesignBtn btn project_details">New Project</button>
                        @endif
                        <!--end::Card toolbar-->
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
                                    <th class="min-w-50px">No</th>
                                    <th class="min-w-50px">Name</th>
                                    <th class="min-w-50px">Address</th>
                                    <th class="min-w-50px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
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
        {   render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {data: 'no', name: 'no',defaultContent: '-'},
        {data: 'name', name: 'name',defaultContent: '-'},
        {data: 'address', name: 'address',defaultContent: '-'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]";
    $url = route('projects.index');
    $data = [
        'columns' => $columns,
        'url' => $url,
    ];
@endphp
@section('scripts')
    @include('layouts.sweetalert.sweetalert_js')
    @include('layouts.datatables.datatables_js',['data' => $data])
    @include('layouts.dashboard.ajax_call')
    <script>
        $(document).ready(function () {
            //When validation error occur
            @if ($errors->any())
                $('#project_modal_id').modal('show');
            @endif

            $(document).on('click','.project_details',function(){
                let type  = $(this).attr('value');
                $('.project_details_form').trigger("reset");
                $('#error_div').remove();
                $('input[name="id"]').remove();


                if(type == 'add'){
                    $("textarea[name='address']").text('');
                    $('#project_modal_id').modal('show');
                }else if(type == 'edit'){
                    let id = $(this).data('id');
                    let edit_url = "{{ route('projects.edit',':id') }}";
                    edit_url = edit_url.replace(':id',id);
                    $('.project_details_form').append(`<input name="id" value="${id}" type="hidden">`);
                    $.ajax({
                        type: 'GET',
                        url: edit_url,
                        success: function (data) {
                            if(data.status == true){
                                data = data.project;
                                $("input[name='no']").val(data.no);
                                $("input[name='name']").val(data.name);
                                $("textarea[name='address']").text(data.address);
                                $('#project_modal_id').modal('show');
                            }else{
                                alert('Something went wrong,try again');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
