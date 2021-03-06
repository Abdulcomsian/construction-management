@extends('layouts.dashboard.master',['title' => 'Project QR code'])
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
        color: #000 !important;
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
    @media print
    {
            #kt_toolbar_container {
               display: none !important;
            }
            .card-header{
                display: none !important;
            }
            .footer{
                display: none !important;
            }
    }
</style>
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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Work QR Code</h1>
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
                        <h2>Tempory work QR code</h2>
                    </div>
                    <!--begin::Card toolbar-->
                     <button style="width: 200px;" value="add" class="newDesignBtn btn printqrcode">Print</button>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    
                    <form class="form-inline" method="get" action="{{route('projects.qrcode',$id)}}">
                        <div class="row">
                          <div class="form-group mb-2 col-md-2">
                            <label  class="text-white">Temp Start</label>
                            <input type="number" min="1" class="form-control" name="tempstart" required="required" />
                          </div>
                          <div class="form-group  mb-2 col-md-2">
                            <label class="text-white">Temp End</label>
                            <input type="number" min="1" class="form-control" name="tempend" required="required">
                          </div>
                              <div class="col-md-2 mt-6">

                                <button type="submit" class="btn btn-primary mb-2">Search Record</button>
                            </div>
                        </div>
                    </form>
                  
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                            @php 
                            $i=0;
                            @endphp
                            <tbody class="text-gray-600 fw-bold">
                                @foreach( $qrcodes as $code)
                                    @if($i==0) 
                                        <tr>
                                    @endif
                                        
                                            <td>
                                                <img src="{{asset('qrcode/projects'.'/'.$code->qrcode)}}" width="auto" height="250px">
                                                <br><br><br>
                                                 <p><b>{{$code->tempwork->twc_id_no ?? ''}}</b></p>
                                                <p><b>{{$code->tempwork->design_requirement_text ?? ''}}</b></p>
                                                <p><b>{{$code->tempwork->description_temporary_work_required ?? '' }}</b></p>
                                            </td>
                                           
                                    @if($i==2) 
                                        </tr>
                                    @endif
                                    @php
                                        $i++;
                                        if($i==2){
                                            $i=0;
                                        }
                                    @endphp
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

<script type="text/javascript">
    $(".printqrcode").on('click',function(){
        window.print();
    })
</script>
@endsection