@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
    .customDate::-webkit-calendar-picker-indicator {   background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>'); }
    .whiteBack{
            background-color: #f5f8fa !important;
            color: #000 !important;
        }
        .form-select.form-select-solid{
            background-color: #fff;
            color: #fff;
        }
.list-div ul li, .list-check-div ul li{
height: 72px;
    overflow: visible;
}
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

    .newDesignBtn:hover {
        color: #fff;
    }

    .card>.card-body {
        padding: 32px;
    }
    #kt_content_container{
        background-color: #fff;
        width: 75%;

    }
    #kt_toolbar_container{
        background-color:#fff;
    }
    #kt_post{
        background: white;
    }
    .card{
        margin: 30px 0px;
        border-radius: 10px !important;   
        border: none !important; 
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
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
        width: 100%;
        color: #000;
        background-color: white !important;
        border: 1px solid lightgrey !important;
        border-radius: 7px;
        height: 43px;
    }
    .inputDiv textarea {
        width: 100% !important;
        color: #000;
        background-color: white !important;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        color: #000;
        position: absolute;
        background: white;
        width: fit-content;
        bottom: 22px;
        left: 8px;
    }
    .select2-container{
        width:100% !important;
    }
    .inputDiv {
        margin: 30px 0px;
        position: relative;
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
        input::placeholder{
    color: #fff !important;
}

        #sig canvas {
            width: 100% !important;
            max-height: 200px;
        }
        .modalDiv{
            width:100% ;
        }
        .blackBack{
        background-color: #000 !important;
        color: #fff !important;
    }
     .form-control.form-control-solid{
        width:100%;
        background-color:#fff;
    }

    .form-control.form-control-solid[type="file"]{
        background-color: transparent;
    }
     @media only screen and (min-width: 470px) {
        .list_top{display:inline !important;}
     }
        @media only screen and (max-width: 470px) {
            .list_top{margin-top:20px;}
            .inputDiv label{font-size:11px !important;}
    }
    canvas{width:270px;height:110px;}
    .inputDiv  #design_required_by_date{color:#fff;}

    .TWRisk label,
    .TWCatagory label{
        margin-bottom: 0;
    }
</style>

@include('layouts.sweetalert.sweetalert_css')
    <link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/signature.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}"/>
@endsection
@section('content')
@include('dashboard.modals.design-relief-modals')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Works</h1>
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
        <div id="kt_content_container" class="">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top">
                        <h2 style="display: inline-block;">Design Brief</h2>
                        <!-- <a style="width: 190px; text-align:center;float: right;" href="{{ route('temporary_works.create') }}" class="newDesignBtn">New Design Brief</a>
                        <a style="width: 190px; text-align:center;float: right;" href="{{ url('manuall-designbrief-form') }}" class="newDesignBtn">Existing Design Brief</a> -->
                        
                        
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('temporary_works.store1') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex inputDiv mb-0" style="border: 1px solid lightgray; border-radius: 8px;overflow: hidden;">
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required >
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset @isset($project_ids) {{ in_array($item->id,$project_ids) ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{old('projno')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Project Name" id="name" name="projname"  value="{{old('projname')}}">
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                        <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Project Address" id="address" name="projaddress" value="{{old('projaddress')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">TW ID No:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input  type="text" class="blackBack form-control form-control-solid" placeholder="Twc Id No" id="twc_id_no" name="twc_id_no"  value="{{old('twc_id_no')}}" required>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Upload Existing Design Brief:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="file" class="form-control form-control-solid"  id="pdf" name="pdf" required="required" style="padding: 20px 0 0 27px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2" >
                                        <span class="">Upload Drawings and Design:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="file" class="whiteBack form-control form-control-solid" id="drawing" name="drawing" style="padding: 20px 0 0 27px;">
                                </div>
                            </div>
                            
                            

                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Drawing Title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Drawing title" id="drawing_title" name="drawing_title" value="{{old('drawing_title')}}"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Drawing Number:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_number" name="drawing_number"  value="{{old('drawing_number')}}">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            
                             <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="date" class="customDate form-control form-control-solid" placeholder="Date" name="design_issued_date"  value="{{old('design_issued_date')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Design Required by Date:</span>
                                    </label>
                                        <input  style=" cursor: pointer;color: #a9abb7 !important;" type="date" class="customDate form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="design_required_by_date" value="{{old('design_required_by_date')}}"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Upload Design Check Certificate:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="file" class="whiteBack form-control form-control-solid" id="dcc" name="dcc" style="padding: 20px 0 0 27px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Date Design Returned:</span>
                                    </label>
                                    <!--end::Label-->
                                    <!-- <p style=" cursor: pointer;background-color: #f5f8fa;color: #000 !important;"> -->
                                        <input  style=" cursor: pointer;color: #a9abb7 !important;" type="date"  class="customDate form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="design_returned" value="{{old('design_returned')}}" required="required" >
                                    <!-- </p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Designer Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"   placeholder="Designer Company Name" id="designer_company_name" name="designer_company_name" value="{{old('designer_company_name')}}"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                     <input type="text" id="companyadmin" class="blackBack form-control form-control-solid" style="background-color:#f5f8fa" placeholder="Company" name="company"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">
                                        <span class="">Date DCC Returned:</span>
                                    </label>
                                    <!--end::Label-->
                                    <!-- <p style=" cursor: pointer;background-color: #f5f8fa;color: #000 !important;"> -->
                                        <input  style=" cursor: pointer;color: #a9abb7 !important;" type="date" class="customDate form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="dcc_returned" value="{{old('dcc_returned')}}"  >
                                    <!-- </p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex TWCatagory" style="position: relative;border: 1px solid lightgray;border-radius: 7px;width: 100%;margin-top: 24px;align-items: center">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2" style="position: absolute; bottom: 32px; background: white;">
                                        <span class="required">TW Category</span>

                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid" style="background: white; padding-top:12px; width:100%">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="0" checked="checked" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">0</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="1" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">1</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">2</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="3" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">3</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <a href="{{asset('temporary/tw_pdfs/1.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:32px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                                <div class="d-flex TWRisk" style="position: relative;border: 1px solid lightgray;border-radius: 7px;width: 100%;margin-top: 24px;align-items: center">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2" style="position: absolute; bottom: 32px; background: white;">
                                        <span class="required">TW Risk Class</span>
                                    </label>
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid" style="background: white; padding-top:12px; width:100%">
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="VL" checked="checked" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">VL</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="L" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">L</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="M" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">M</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_risk_class" value="H" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">H</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <a href="{{asset('temporary/tw_pdfs/2.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:32px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                            </div>
                        </div>
                          
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#design-requirement" >
                                        <!--begin::Label-->
                                         <label style="" class="required  fs-6 fw-bold mb-2">
                                           Design Requirement:
                                        </label>
                                        <br>
                                        <input type="text" class="blackBack"  id="design_requirement_text" placeholder="Design requirement" readonly name="design_requirement_text" value="{{old('design_requirement_text')}}" required>
                                        <!--end::Label-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv mb-0">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                             <label class="required  fs-6 fw-bold mb-2" style="top: -12px; height: fit-content ">
                                              Description:
                                            </label>
                                            <textarea class="blackBack form-control" name="description_temporary_work_required"  style="height: 43px;border-radius: 7px;padding: 8px 0 0 17px;"  rows="2" cols="50" placeholder="Provide brief description of design requirements." required>{{old('description_temporary_work_required')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <!--begin::Modal - Design Requirement-->
                        
                        <!--end::Modal - Design Requirement -->

                        <button  type="submit" class="btn btn-primary float-end">Submit</button>
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
@endsection
@section('scripts')
<script src="{{ asset('assets/js/temporary-work-modal.js') }}"></script>
<script>
    var projects = {!!$projects!!};
    $('#projects').change(function() {
        let id = $(this).val();
        let project = projects.filter(function(p) {
            return p.id == id;
        });
        if (project) {
            $('#no').val('').val(project[0].no);
            $('#name').val('').val(project[0].name);
            $('#date').val('').val(project[0].created_at);
            $('#address').val('').val(project[0].address ? project[0].address : 'Not Set');
            $("#companyadmin").val(project[0].company.name);
            $("#company_id").val(project[0].company.id);
        }
        console.log(project);
    });
   

            $('#design_required_by_date').change(function() {
                $('#design_required_by_date').css("background-color", "#f5f8fa ");
                $('#design_required_by_date').css("color", "#000");
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
            $("#twc_id_no").on("change paste keyup cut select", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            });
            $("input").on("change paste keyup cut select", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            });
            $("#projects").change(function(){
            console.log("hello")
            $(this).removeClass("blackBack")
            $("#projects span.form-select").removeClass("blackBack")
         //   $(".form-control[readonly]").removeClass("blackBack")
            $("#no").removeClass("blackBack")
            $("#name").removeClass("blackBack")
            $("#design_issued_date").removeClass("blackBack")
            $("#address").removeClass("blackBack")
            $("#job_title").removeClass("blackBack")
            $("#admin_name").removeClass("blackBack")
            $("#companyadmin").removeClass("blackBack")
            $(".form-select.form-select-solid").css("background-color","#f5f8fa")
            $("#companyadmin").removeClass("blackBack")
            $("#twc_name").removeClass("blackBack")
         //   $("#scopofdesign").addClass("blackBack")
        })
        $("#twc_id_no").on("change paste keyup cut select", function() {
           
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
            
        });
        $("#design_requirement_text").click(function() {
           
           $(this).removeClass("blackBack")
           $(this).addClass("whiteBack")
       
   });
   $("textarea").click(function() {
           
           $(this).removeClass("blackBack")
           $(this).addClass("whiteBack")
       
   });
</script>

    

@endsection
