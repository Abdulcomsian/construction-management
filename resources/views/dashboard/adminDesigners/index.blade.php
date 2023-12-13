@extends('layouts.dashboard.master',['title' => 'Admin Designer List'])
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
     
    .form-switch{
        padding-left:1.75rem !important;
    }
    .form-check .form-check-input{
        float: none;
        margin-left:0px;
        padding-left:0
    }
    .form-switch .form-check-input{
        border-radius: 34px;
        border: 1px solid #bfbfbf;
    }
    .form-switch .form-check-input:checked{
        background-color: #2aac42;
        padding: 5px;
        border-radius: 32px;
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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Admin Designers List</h1>
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
                        <h2>Users</h2>
                    </div>
                    <!--begin::Card toolbar-->
                     @if(\Auth::user()->hasRole(['admin']))
                      <a href="{{ url('adminDesigner/create') }}" value="add" class="newDesignBtn btn">Add Designer</a>
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
                                    <th class="min-w-125px">S.No</th>
                                    <th class="min-w-125px">User Name</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-125px">Status</th>
                                    <th class="min-w-125px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
@php
$columns = "[
{ 
    render: function (data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
      }
},
{data: 'name', name: 'name',defaultContent: '-'},
{data: 'email', name: 'email',defaultContent: '-'},
{data: 'status', name: 'status'},
{data: 'action', name: 'action', orderable: false, searchable: false},
]";
$url = route('adminDesigner.index');
$data = [
'columns' => $columns,
'url' => $url,
];
@endphp
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
@include('layouts.datatables.datatables_js',['data' => $data])
@include('layouts.dashboard.ajax_call')

@endsection
<!-- Include jQuery and DataTables script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<!-- Your DataTable initialization script -->
<script>
  $(document).ready(function() {
    // DataTable initialization
    var dataTable = $('.datatable').DataTable();

    // Wait for DataTable to finish rendering
    dataTable.on('draw.dt', function() {
      // Now you can safely select your checkbox element
      var checkbox = document.querySelector('input[name=select_designer]');

    $('.select_designer').change(function(){
        var _token = "{{ csrf_token() }}";
            var designer_id = $(this).attr("id");
            var that = this;
            
              $.post("{{ route('select_designer')}}", {_token:_token,designer_id:designer_id}).done( function(response){
                var result = JSON.parse(response);
                  if (result.status === "added") {
                    console.log('Designer added');
                  } else if (result.status === "removed") {
                    console.log('Designer removed');
                  }
              }).fail(function(xhr, error, message){
                    console.log(message)
                
              });
    })
    });
  });
</script>
