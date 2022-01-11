@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
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
        background-color: #e9edf1;
    }
    #kt_toolbar_container{
        background-color:#fff;
        
        
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
        width: 50%;
        color: #000;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        width: 40%;
        color: #000;
    }
    .select2-container{width:250px !important;}
    .inputDiv {
        margin: 20px 0px;
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

        #sig canvas {
            width: 100% !important;
            max-height: 200px;
        }
        .modalDiv{
            width:100% ;
        }
     .form-control.form-control-solid{width:250px;background-color:#000;}
        @media only screen and (max-width: 470px) {
            .inputDiv label{font-size:11px !important;}
    }
    canvas{width:270px;height:110px;}
    .inputDiv  #design_required_by_date{color:#fff;}
</style>

@include('layouts.sweetalert.sweetalert_css')
    <link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/signature.css')}}"/>
     <link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}"/>
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
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Design Brief</h2>
                        <a style="width: 190px; text-align:center;" href="{{ route('temporary_works.create') }}" class="newDesignBtn">New Design Brief</a>
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('temporary_works.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset @isset($project_ids) {{ in_array($item->id,$project_ids) ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{old('projno')}}">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" id="name" name="projname"  value="{{old('projname')}}">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" name="design_issued_date"  value="{{old('design_issued_date')}}"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Required by Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <!-- <p style=" cursor: pointer;background-color: #f5f8fa;color: #000 !important;"> -->
                                        <input  style=" cursor: pointer;color: #f5f8fa;" type="date" class="form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="design_required_by_date" value="{{old('design_required_by_date')}}"  required>
                                    <!-- </p> -->
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Address" id="address" name="projaddress" value="{{old('projaddress')}}">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Designer Company Name" id="designer_company_name" name="designer_company_name" value="{{old('designer_company_name')}}"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="email" class="form-control form-control-solid" placeholder="Designer Email Address" id="designer_company_email" name="designer_company_email" value="{{old('designer_company_email')}}"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" id="twc_name" name="twc_name" value="{{old('twc_name')}}"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Email Address" id="twc_email" name="twc_email" value="{{old('twc_email')}}"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW Category</span>

                                    </label>
                                    {{-- <!--end::Label-->--}}
                                    {{-- <div class="checkBoxDiv">--}}

                                    {{-- </div>--}}
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
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
                                    <!--end::Radio group-->
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW Risk Class</span>
                                    </label>
                                    {{-- <!--end::Label-->--}}
                                    {{-- <div class="checkBoxDiv">--}}

                                    {{-- </div>--}}
                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
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
                                    <!--end::Radio group-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv">
                                
                                    <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#design-requirement" >
                                        <!--begin::Label-->
                                         <label style="" class="d-flex align-items-center fs-6 fw-bold mb-2">
                                           Design Requirement:
                                        </label>
                                        <br>
                                        <input type="text" style="width: 50%;"  id="design_requirement_text" placeholder="Design Requirement" readonly name="design_requirement_text" value="{{old('design_requirement_text')}}">
                                        <!--end::Label-->
                                    </div>
                                
                                 </div>
                                  <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                              Description :
                                            </label>
                                            <textarea class="form-control" name="description_temporary_work_required"  style="width:50%"  rows="2" cols="50" required>{{old('description_temporary_work_required')}}</textarea>
                                    </div>
                                 </div>
                                  <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#scope-of-design">
                                         <!--begin::Label-->
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                              Scope of Design:
                                            </label>
                                            <textarea class="form-control"  style="width:50%"  id="scopofdesign" rows="2" cols="50"  placeholder="Scope of Design Output Required from the Temporary Works Engineer:" readonly></textarea>
                                       <!--  <input type="text" placeholder="Scope of Design Output Required from the Temporary Works Engineer:" readonly> -->
                                    </div>
                                  </div>
                                   <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#attachment-of-design">
                                        <!--begin::Label-->
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                              Attachments / Spec:
                                            </label>
                                        <input type="text" placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)" readonly>
                                    </div>
                                  </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name::</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Name" name="name" value="{{\Auth::user()->name ?? ''}}" readonly="readonly"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title" value="{{\Auth::user()->job_title ?? ''}}" readonly="readonly"  required>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                     <input type="text" id="companyadmin" class="form-control form-control-solid" style="background-color:#f5f8fa" placeholder="Company" name="company"  required>
                                     <input type="hidden" id="company_id"  name="company_id"  >
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="date" name="date" value="{{ date('Y-m-d') }}" style="background-color:#fff" class="form-control form-control-solid">
                                </div>
                                 <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width:40% !important">
                                        <span class="required">Name signature:</span>
                                    </label>
                                    <!--end::Label-->
                                     <input  type="checkbox" class="" id="flexCheckChecked"  style="width: 12px;margin-top:5px">
                                      <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="0">
                                     <span style="padding-left:3px;color:#000">Do you want name signature?</span>
                                </div>
                                <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign" class="form-control form-control-solid">
                                </div>
                                 <div class="d-flex inputDiv" id="sign">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Signature:</span>
                                    </label>
                                    <br/>
                                    <canvas id="sig" style="background: lightgray"></canvas>
                                    <br/>
                                   <textarea id="signature" name="signed" style="display: none"></textarea>
                                </div>
                                <button id="clear" type="button" class="btn btn-danger  float-end">Clear Signature</button>

                            </div>
                        </div>
                          <br>
                        @include('dashboard.modals.design-relief-modals')

                        <button id="submitbutton" type="button" class="btn btn-primary float-end">Submit</button>
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
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#signtype").val(1);
            $("#namesign").addClass('d-flex').show();
            $("input[name='namesign']").attr('required','required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
           
        }
        else{
            $("#signtype").val(0);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").show();
             
        }
    })



            var canvas = document.getElementById("sig");
            var signaturePad = new SignaturePad(canvas);
            
            $("#submitbutton").on('click',function(){
                 $("#signature").val(signaturePad.toDataURL('image/png'));
                 $("#desingform").submit();
            })
           
             $('#clear').click(function(e) {
                e.preventDefault();
                signaturePad.clear();
                $("#signature").val('');
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
            
</script>

    

@endsection
