@extends('layouts.dashboard.master',['title' => 'Designer Nomination'])
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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Designer Nomination Details</h1>
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
                        <h2>Designer</h2>
                    </div>
                    <!--begin::Card toolbar-->
                     
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
                                    <th class="min-w-125px">PDF</th>
                                    <th class="min-w-125px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">
                                @if($userNomination)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$User->name}}</td>
                                        <td>{{$User->email}}</td>
                                        <td><a href="{{asset('pdf').'/'.$userNomination->pdf_url}}">PDF</a></td>
                                        <td>
                                            @php 
                                                $class='';
                                                $bgclass='';
                                                 if($userNomination->status==0)
                                                 {
                                                     $class="text-warning";
                                                     $bgclass='redBgBlink';
                                                 }elseif($userNomination->status==1)
                                                 {
                                                     $class="text-success";
                                                 }
                                                 else{
                                                     $class="text-danger";
                                                 }
                                            @endphp
                                            <button type="button" userid="{{$User->id}}" nominationid="{{$userNomination->id}}"  class="nominationcomment btn btn-icon btn-bg-light btn-active-color-primary btn-sm {{$bgclass}}">
                                                <i class="fa fa-comment {{$class}}" aria-hidden="true"></i>
                                        
                                            </button>
                                        </td>
                                    </tr>
                                @else

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@include('dashboard.modals.nomination_comment')
@endsection
@section('scripts')
<script>
    var canvas = document.getElementById("sig");
    var signaturePad = new SignaturePad(canvas);
    signaturePad.addEventListener("endStroke", () => {
          $("#signature").val(signaturePad.toDataURL('image/png'));
        });
    $(document).on("click",".nominationcomment",function(){
        let nomination_id=$(this).attr('nominationid');
        let userid=$(this).attr('userid');
        let project=''
        let url='{{url("adminDesigner/nomination-status")}}';
        $("#nominationid").val(nomination_id);
        $("#desingform").attr('action',url);
        $("#nomination_result").parent().parent().hide();

        $.ajax({
                type: 'GET',
                url: '{{url("Nomination/nomination-get-commetns")}}',
                data:{id:nomination_id,userid:userid,project:project},
                success: function(data) {
                    $("#nominationid").val(nomination_id);
                    $("#userid").val(userid);
                    $("#project_id").val(project);
                    $("#nomination_comment_modal_id").modal('show');
                }
            });
    })
</script>
@endsection

