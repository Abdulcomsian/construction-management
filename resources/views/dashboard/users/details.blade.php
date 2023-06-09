@extends('layouts.dashboard.master',['title' => 'User Project Details'])
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
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">User Project
                    Nominations Details</h1>
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
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table
                            class="cell-border table-hover datatable table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">S.No</th>
                                    <th class="min-w-125px">User Name</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-125px">Company Name</th>
                                    <th class="min-w-125px">Project</th>
                                    <th class="min-w-125px">Nomination PDF</th>
                                    <th class="min-w-125px">Appointment PDF</th>
                                    <th class="min-w-125px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @foreach($project_wise_nominations as $nomination)
                                <tr>
                                    @php
                                    $url =
                                    url('Nomination/nomination-formm',Crypt::encrypt($nomination->user->id)).'?project='.Crypt::encrypt($nomination->projectt->id)
                                    @endphp
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$nomination->user->name}}</td>
                                    <td>{{$nomination->user->email}}</td>
                                    <td>{{$nomination->user->userCompany->name}}</td>
                                    <td>{{$nomination->projectt->name}}</td>
                                    <td><a href="{{asset('pdf').'/'.$nomination->pdf_url}}">PDF</a><br>
                                        <a href="{{$url}}">Nomination link<a>
                                    </td>
                                    <td>
                                        @if($nomination->appointment_pdf)
                                        <a href="{{asset('pdf').'/'.$nomination->appointment_pdf}}">PDF</a>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                        $class='';
                                        $bgclass='';
                                        if($nomination->status==0)
                                        {
                                        $class="text-warning";
                                        $bgclass='redBgBlink';
                                        }elseif($nomination->status==1)
                                        {
                                        $class="text-success";
                                        }
                                        else{
                                        $class="text-danger";
                                        }

                                        @endphp
                                        <button type="button" userid="{{$nomination->user->id}}"
                                            nominationid="{{$nomination->id}}" project="{{$nomination->project}}"
                                            class="nominationcomment btn btn-icon btn-bg-light btn-active-color-primary btn-sm {{$bgclass}}"
                                            title="View Nomination Comments">
                                            <i class="fa fa-comment {{$class}}" aria-hidden="true"></i>

                                        </button>
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

    @include('dashboard.modals.nomination_comment')
</div>

@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')

<script type="text/javascript">
    var canvas = document.getElementById("sig");
     var signaturePad = new SignaturePad(canvas);
     signaturePad.addEventListener("endStroke", () => {
                $("#signature").val(signaturePad.toDataURL('image/png'));
              $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-success');
              $('.submitBtn').removeClass('btn-secondary').addClass('btn-primary').prop('disabled', false);
            });
     $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
        $("#signature").val('');
        $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
         $('.submitBtn').removeClass('btn-primary').addClass('btn-secondary').prop('disabled', true)
    });
    $(document).on("click",".nominationcomment",function(){
        let nomination_id=$(this).attr('nominationid');
        let userid=$(this).attr('userid');
        let project=$(this).attr("project");
        $("#nominationid").val(nomination_id);

        $.ajax({
                type: 'GET',
                url: '{{url("Nomination/nomination-get-commetns")}}',
                data:{id:nomination_id,userid:userid,project:project},
                success: function(data) {
                    $("#nomination_result").html(data);
                    $("#nominationid").val(nomination_id);
                    $("#userid").val(userid);
                    $("#project_id").val(project);
                    $("#nomination_comment_modal_id").modal('show');
                }
            });
    })

        $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
            $(".customSubmitButton").removeClass("hideBtn");
            $(".customSubmitButton").addClass("showBtn");
             $("input[name='pdfsign']").removeAttr('required');
            $("input[name='namesign']").attr('required','required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
           
        }
        else{
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").show();
            $(".customSubmitButton").addClass("hideBtn");
            $(".customSubmitButton").removeClass("showBtn");
        }
    })

    $("#pdfChecked").change(function(){

        if($(this).is(':checked'))
        {
            $("#flexCheckChecked").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("input[name='pdfsign']").attr('required','required');
            $("div#pdfsign").removeClass('d-none').addClass('d-flex');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
           
        }
        else{
            $("#pdfsign").val(0);
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("input[name='pdfsign']").removeAttr('required');
            $("#clear").show();
             
        }
    })
</script>
@endsection