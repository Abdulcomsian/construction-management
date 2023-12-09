@extends('layouts.dashboard.master',['title' => 'Projects'])
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
                <h1 class="text-dark fw-bolder  fs-3" style="width: 100%; text-align: center;margin-top: 2.25rem !important; margin-bottom: -0.75rem !important;">Users</h1>
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
                     @if(\Auth::user()->hasRole(['admin', 'company']))
                      <a href="{{ route('users.create') }}" value="add" class="newDesignBtn btn">Add User</a>
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
                                    <th class="min-w-125px">Company Name</th>
                                    <th class="min-w-125px">Actions</th>
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
{ render: function (data, type, row, meta) {
return meta.row + meta.settings._iDisplayStart + 1;
}
},
{data: 'name', name: 'name',defaultContent: '-'},
{data: 'email', name: 'email',defaultContent: '-'},
{data: 'company_id', name:'company_id', defaultContent: '-'},
{data: 'action', name: 'action', orderable: false, searchable: false},
]";
$url = route('users.index');
$data = [
'columns' => $columns,
'url' => $url,
];
@endphp
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
@include('layouts.datatables.datatables_js',['data' => $data])
@include('layouts.dashboard.ajax_call')
@include('dashboard.modals.nomination_comment')
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
                            $("textarea[name='job_title']").val(data.job_title);
                            $('#project_modal_id').modal('show');
                        } else {
                            alert('Something went wrong,try again');
                        }
                    }
                });
            }
        });
    });


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

    
    var canvas = document.getElementById("sig");
     var signaturePad = new SignaturePad(canvas);
     signaturePad.addEventListener("endStroke", () => {
        console.log("hello");
              $("#signature").val(signaturePad.toDataURL('image/png'));
            });
    $(document).on("click",".nominationcomment",function(){
        let nomination_id=$(this).attr('nominationid');
        let userid=$(this).attr('userid');
        $("#nominationid").val(nomination_id);

        $.ajax({
                type: 'GET',
                url: '{{url("nomination-get-commetns")}}',
                data:{id:nomination_id,userid:userid},
                success: function(data) {
                    $("#nomination_result").html(data);
                    $("#nominationid").val(nomination_id);
                    $("#userid").val(userid);
                    $("#nomination_comment_modal_id").modal('show');
                }
            });
    })
</script>
@endsection
