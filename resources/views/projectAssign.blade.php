@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #fff !important;
        opacity: 1;
        /* Firefox */
    }

    #scope-of-design {}

    .whiteBack::placeholder {
        color: #000 !important;
    }

    .form-select,
    #design_requirement_text,
    .inputDiv input {
        border-radius: 0.25rem !important;
    }

    .form-control[readonly] {
        background-color: #000;
    }

    input {
        /* custom */
        caret-color: gray;
    }

    .customDate::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }

    input::placeholder {
        color: #fff !important;
    }

    #design_requirement_text {
        color: #000 !important;
        height: 32px;
    }

    .list-div ul li,
    .list-check-div ul li {
        height: 72px;
        overflow: visible;
        border-radius: 5px;
    }

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
    }

    .newDesignBtn:hover {
        color: #fff;
    }

    .card>.card-body {
        padding: 32px;
    }

    #kt_content_container {
        background-color: #fff;
    }

    #kt_toolbar_container {
        background-color: #fff;
    }

    .card {
        margin: 9px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }

    .blackBack {
        /* background-color: #000 !important;
        color: #fff !important; */
    }

    textarea {
        color: black;
        border: none !important;
    }

    textarea::-webkit-input-placeholder {
        color: black !important;
    }

    .whiteBack {
        background-color: #f5f8fa !important;
        color: #000 !important;
    }

    select:focus,
    input:focus,
    .form-select.form-select-solid:focus {
        background-color: #f5f8fa;
        color: #000;
    }

    .form-control[readonly] {
        background-color: #000;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
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
        background-color: #000;
    }

    table thead th {
        color: #fff !important;
        text-align: center;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .inputDiv input {
        width: 50%;
        color: #000;
    }

    .hideBtn {
        display: none !important;
    }

    .showBtn {
        display: block !important
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
        border: none;
    }

    .inputDiv label {
        /* width: 40%; */
        color: #000;
        position: absolute;
        bottom: 33px;
        background: white;
        font-family: 'Inter', sans-serif;
    }

    .select2-container {
        width: 250px !important;
    }

    .select2-container--bootstrap5 .select2-selection {
        height: 32px !important;
    }

    .inputDiv {
        margin: 30px 0px;
        border: 1px solid #D2D5DA;
        border-radius: 8px;
        position: relative;
        padding: 5px 5px;
    }

    .textarea .form-control {
        height: 32px !important;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .kbw-signature {
        width: 100%;
        height: 220px;
    }

    /*#sig canvas {
            width: 50% !important;
            max-height: 200px;
        }*/
    .modalDiv {
        width: 100%;
        position: relative;
    }

    #descriptionTextArea,
    #scopeOfDesignArea,
    #attachment {
        min-height: fit-content !important;
    }

    .whiteBack {
        background-color: #f5f8fa !important;
        color: #000 !important;
    }

    .form-select.form-select-solid {
        background-color: #fff;
        color: #fff;
        border: none;
    }

    .form-control.form-control-solid {
        width: 250px;
    }

    @media only screen and (min-width: 470px) {
        .list_top {
            display: inline !important;
        }



        /* #submitbutton {
            position: relative;
            width: 100%;
        } */
    }

    @media only screen and (max-width: 470px) {
        .list_top {
            margin-top: 20px;
            display: block !important;
        }

        .newDesignBtn {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .inputDiv label {
            font-size: 11px !important;
        }

    }

    @media only screen and (max-width: 550px) {
        .db_mr {
            display: block !important;
            width: 100% !important;
            margin-bottom: 20px !important;
        }

    }

    #scopofdesign::placeholder {
        /* modern browser */
        color: #fff;
    }

    /*canvas{width:50%;height:110px;}*/
    /* .inputDiv  #design_required_by_date{color:#fff;} */
    .form-control.form-control-solid:focus {
        color: #000 !important;
    }

    #projectAssig-form input {
        background-color: #fff;
        border: none !important;
        color: #000 !important;
    }

    #projectAssig-form input::placeholder {
        color: #9D9D9D !important;
    }

    input[type="radio"]:focus,
    input[type="radio"]:active {
        outline: max(2px, 0.15em) solid #000;
        background-color: #000 !important;
        outline-offset: max(2px, 0.15em);
    }

    input[type="radio"]:checked {
        /* Add your styles here */
        background-color: #07d564 !important;
        color: #07d564 !important;
        border: 1px solid #000;
    }

    .nav-group.nav-group-fluid>label {
        top: 0 !important;
        padding: 0 2px !important;
        width: 35px !important;
        height: 35px !important
    }

    .TW .nav-group {
        background-color: #fff;
    }

    .TW .nav-group label {
        margin: 0 !important;
    }

    .btn.btn-color-muted {
        color: #a1a5b7;
        background: #07D5640D;
    }

    .TW .inputDiv {
        border: none;
    }

    .fa-undo:before {
        background-color: white;
        padding: 5px;
        border-radius: 100%;
    }

    #kt_body {
        max-width: 1400px;
    }

    #kt_content {
        width: 75%;
        padding-bottom: 0;
    }

    #design-requirement .modal-dialog {
        width: 50%;
    }

    #attachment-of-design .modal-dialog {
        width: 51%;
    }

    .image-uploader {
        border: 2px dashed #d9d9d9 !important;
        position: relative;
        border-radius: 4px;
    }

    .signatureTitle {
        white-space: nowrap;
    }

    @media screen and (max-width: 768px) {

        #projectNo,
        #selectProject,
        #projectName,
        {
        margin-top: 0 !important;
        margin-bottom: 30px !important;
    }

    #desinger_company_name2 {
        margin-bottom: 0px !important;
    }

    .signatureTitle {
        white-space: nowrap;
    }

    #kt_content {
        margin: 0 auto;
        width: 100%;
    }

    #kt_content_container .card-title {
        flex-direction: column;
        align-items: flex-start !important;
    }

    #kt_content_container .card-header {
        padding-left: 8px;
    }

    #kt_content_container .card-title h2 {
        white-space: nowrap;
        margin-bottom: 20px;
    }

    .newDesignBtn {
        width: 230px !important;
    }

    .TW {
        gap: 21px;
    }

    #design-requirement .modal-dialog,
    #attachment-of-design .modal-dialog {
        width: 75%;
        margin: auto;
    }

    }

    @media screen and (max-width: 576px) {

        #design-requirement .modal-dialog,
        #attachment-of-design .modal-dialog {
            width: 100%;
            margin: auto;
        }
    }
</style>

@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}" />
<link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}" />
<link rel="stylesheet" href="{{asset('css/signature.css')}}" />
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" />
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <!--  <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Works</h1>
               
            </div>
            
        </div>
        
    </div> -->
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container temporary_work_create">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top"
                        style="width:100%; display: flex !important; justify-content: space-between;align-items:center">
                        <h2 class="db_mr"
                            style="display: inline-block;width:36%; font-family: 'Inter', sans-serif; font-weight:600; font-size:32px">
                            Project Assign</h2>
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="projectAssig-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inputDiv d-block" id="selectAssignedProject" style="margin-bottom:0px">
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select id="selectProject" class="form-select" aria-label="Default select example">
                                        <option disabled selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex inputDiv d-block" id="projectNo">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option disabled selected>Open this select menu</option>
                                        <option value="1">Project-One</option>
                                        <option value="2">Project-Two</option>
                                        <option value="3">Project-Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Container-->
</div>
<!--end::Post-->
</div>
@include('dashboard.modals.hazardlist')
@endsection
@section('scripts')



{{--
<script>
    var url="{{asset('js/myfile.json')}}";
    var jsondata="";
    $(document).ready(function(){
        getText(url);
            async function getText(file) {
               await fetch(file).then(response => response.json()).then(json => {
                  jsondata=json;
               });
            }
    });
</script>
<script src="{{ asset('assets/js/temporary-work-modal.js') }}"></script>
<script type="text/javascript">
    $("#signtype").val(2);
    $(document).on("change","[name='req_check[]']",function(){
        if($(this).is(':checked'))
        {
            $(this).val(1);
        }
        else{
            $(this).val(0);
        }
    })
</script> --}}
{{-- <script>
    var projects = {!!$projects!!};
    var address='';
    $('#projects').change(function() {
        let id = $(this).val();
        let project = projects.filter(function(p) {
            return p.id == id;
        });
        if(project[0].address)
        {
        address=project[0].address.replace(/\n/g,',');
        }
        if (project) {
            $('#no').val('').val(project[0].no);
            $('#name').val('').val(project[0].name);
            $('#date').val('').val(project[0].created_at);
            $('#address').val('').val(address ? address : 'Not Set');
            $("#companyadmin").val(project[0].company.name);
            $("#company_id").val(project[0].company.id);
            $.ajax({
            url:"{{route('project.twc.get')}}",
            method:"GET",
            data:{id:project[0].id,compayid:project[0].company.id},
            success:function(res)
            {
                $(".form-select.form-select-solid").css("background-color", "#eee !important");
                $(".form-control[readonly]").css("background-color", "#eee !important");
                
               if(res !='')
               {
                 $("#twc_email").val(res);
               }
            }
        });
        }
        console.log(project);
    });
    $("#DrawCheck").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#flexCheckChecked").prop('checked',false);
            $("#signtype").val(0);
             $("#pdfsign").val(0);
             $("#Drawtype").val(1);
            // $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            // $("#pdfsign").removeClass('d-flex').addClass("d-none");
            // $(".customSubmitButton").removeClass("hideBtn");
            // $(".customSubmitButton").addClass("showBtn");
            //  $("input[name='pdfsign']").removeAttr('required');
            // $("input[name='namesign']").attr('required','required');
            $("#clear").show();
            $("div#pdfsign").removeClass('d-flex').addClass("d-none");
            $("div#namesign").removeClass('d-flex').addClass("d-none");
            $("#sign").css('display','flex');
           
        }
        // else{
        //     $("#signtype").val(2);
        //     $("#sign").addClass('d-flex').show();
        //     $("#namesign").removeClass('d-flex').hide();
        //     $("input[name='namesign']").removeAttr('required');
        //     $("#clear").show();
        //     $(".customSubmitButton").addClass("hideBtn");
        //     $(".customSubmitButton").removeClass("showBtn");
        // }
    })
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#DrawCheck").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
             $("#Drawtype").val(0);
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
            $("#DrawCheck").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("#Drawtype").val(0);
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
    

    //approval checkbox checkded
    $("#approval").change(function(){
        if($(this).is(':checked'))
        {
            $(".pc-twc").removeClass('d-none').addClass('d-flex');
            $("#pc-twc-email").attr('required','required');
        }
        else{
            $(".pc-twc").removeClass('d-flex').addClass('d-none');
            $("#pc-twc-email").removeAttr('required');
        }
    })

//when click of category 3
    $('input[name="tw_category"]').click(function(){
        var value=$(this).val();
        if(value==3)
        {
            $(".desinger_company_name2").removeClass('d-none').addClass('d-flex');
        //    $("#desinger_company_name2").attr('required','required');
        //    $("#desinger_email_2").attr('required','required');
          
        }
        else{
            $(".desinger_company_name2").addClass('d-none').removeClass('d-flex');
            $("#desinger_company_name2").removeAttr('required');
            $("#desinger_email_2").removeAttr('required');
        }
    })



//     <script type="text/javascript">
//     var canvas = document.getElementById("sig");
//     console.log(canvas)
//     var signaturePad = new SignaturePad(canvas);
//     signaturePad.addEventListener("endStroke", () => {
//        console.log("here1234");
//              $("#signature").val(signaturePad.toDataURL('image/png'));
//              $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
//            });

//     $('#clear').click(function(e) {
//        e.preventDefault();
//        signaturePad.clear();
//        $("#signature").val('');
//         $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
//    });
// 



var canvas = document.getElementById("sig");
var signaturePad = new SignaturePad(canvas);
signaturePad.addEventListener("endStroke", () => {
console.log("hello");
$("#signature").val(signaturePad.toDataURL('image/png'));
$("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
$("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
// $('#submitbutton')
});
$('#clear').click(function(e) {
       e.preventDefault();
       signaturePad.clear();
       $("#signature").val('');
        $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
        $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary").addAttr("disabled");
   });
// $("#submitbutton").on('click',function(e){
// if ( $("#projectAssig-form-form").valid() ) {

// $("#signature").val(signaturePad.toDataURL('image/png'));
// $("#projectAssig-form").submit();
// } else {
// console.log('form invalid');
// }


// })

$("#submitbutton").on('click', function () {
    if (signaturePad) {
        $("#signature").val(signaturePad.toDataURL('image/png'));
    }
    // if (signaturePad1) {
    //     $("#signature1").val(signaturePad1.toDataURL('image/png'));
    // }
    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary").prop("disabled", true);
    $("#projectAssig-form").submit();
});



$('#clear').click(function(e) {
e.preventDefault();
signaturePad.clear();
$("#signature").val('');
});
$("#attachment").click(function() {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")
});


$('#design_required_by_date').change(function() {
$('#design_required_by_date').css("background-color", "#eee ");
$('#design_required_by_date').css({"color": "#000"});
});
$('#designer_company_name').change(function() {
$('#designer_company_name').css("background-color", "#f5f8fa ");
$('#design_required_by_date').css("color", "#000");
});
$('#designer_company_email').change(function() {
$('#designer_company_email').css("background-color", "#f5f8fa ");
$('#designer_company_email').css("color", "#000");
});
$('#twc_name').change(function() {
$('#twc_name').css("background-color", "#f5f8fa ");
$('#twc_name').css("color", "#000");
});
$('#twc_email').change(function() {
$('#twc_email').css("background-color", "#f5f8fa ");
$('#twc_email').css("color", "#000");
});
$("#scopofdesign").click(function() {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")
});

$(".hazardlist").on('click',function(){
$("#hazard_modal_id").modal('show');
})


$(function() {
var email= $("#twc_email").val();
if(email.length>0){
$("#twc_email").removeClass("blackBack")
} else{
$("#twc_email").addClass("blackBack")
}
$("input").on("change paste keyup cut select", function() {
if($(this).val() !== "") {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")
}
});
$("textarea").on("change", function() {
if($(this).val() !== "") {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")
}
});

$("#design_requirement_text").on("click", function() {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")

});
$("#scope-of-design #submit-requirment button").on("click", function() {
console.log("here");
$("#scopofdesign").removeClass("blackBack")
$("#scopofdesign").addClass("whiteBack")

});
$("#attachment-of-design #submit-requirment button").on("click", function() {
$(this).removeClass("blackBack")
$(this).addClass("whiteBack")

});

$("#projects").change(function(){
console.log("hello")
$(this).removeClass("blackBack")
$("#projects span.form-select").removeClass("blackBack")
// $(".form-control[readonly]").removeClass("blackBack")
$("#no").removeClass("blackBack").addClass("whiteBack");
$("#name").removeClass("blackBack").addClass("whiteBack");
$("#design_issued_date").removeClass("blackBack").addClass("whiteBack");
$("#address").removeClass("blackBack").addClass("whiteBack");
$("#job_title").removeClass("blackBack").addClass("whiteBack");
$("#admin_name").removeClass("blackBack").addClass("whiteBack");
$("#companyadmin").removeClass("blackBack").addClass("whiteBack");
$(".form-select.form-select-solid").css("background-color","#f5f8fa")
$("#companyadmin").removeClass("blackBack").addClass("whiteBack");
$("#twc_name").removeClass("blackBack").addClass("whiteBack");
// $("#scopofdesign").addClass("blackBack")
})

$(".customDate").click(function(){
$(".customDate::-webkit-calendar-picker-indicator").css("filter","invert(0)")
})
});
</script> --}}



@endsection