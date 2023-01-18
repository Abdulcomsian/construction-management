@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #fff !important;
  opacity: 1; /* Firefox */
}
    #scope-of-design{

    }
    .whiteBack::placeholder{
        color: #000 !important;
    }
    .form-select,
    #design_requirement_text,
    .inputDiv input{
        border-radius: 0.25rem !important;
    }
    .form-control[readonly] {
    background-color: #000;
}
input {
  /* custom */
  caret-color: gray;
}
.customDate::-webkit-calendar-picker-indicator {   background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>'); }
input::placeholder{
    color: #fff !important;
}
#design_requirement_text{
    color: #000 !important;
}
.list-div ul li, .list-check-div ul li{
height: 72px;
    overflow: visible;
    border-radius: 5px;
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
        margin: 9px 0px;
        border-radius: 10px !important;   
        border: none !important; 
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }
    .blackBack{
        background-color: #000 !important;
        color: #fff !important;
    }
    .whiteBack{
        background-color: #f5f8fa !important;
        color: #000 !important;
    }
    select:focus,input:focus,
    .form-select.form-select-solid:focus{
        background-color: #f5f8fa;
        color: #000;
    }
    .form-control[readonly]{
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
    .hideBtn{
        display: none !important;
    }
    .showBtn{
        display: block !important
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

        /*#sig canvas {
            width: 50% !important;
            max-height: 200px;
        }*/
        .modalDiv{
            width:100% ;
        }
        .whiteBack{
            background-color: #f5f8fa !important;
            color: #000 !important;
        }
        .form-select.form-select-solid{
            background-color: #000;
            color: #fff;
        }
     .form-control.form-control-solid{width:250px;}
     @media only screen and (min-width: 470px) {
        .list_top{display:inline !important;}
     }
        @media only screen and (max-width: 470px) {
            .list_top{margin-top:20px;display:block !important;}
            .newDesignBtn{margin-top:20px; margin-bottom:10px;}
            .inputDiv label{font-size:11px !important;}
           
    }
    @media only screen and (max-width: 550px) {
        .db_mr{
                display:block !important;
                width:100% !important; 
                margin-bottom:20px !important;
            }
    }
    #scopofdesign::placeholder {
        /* modern browser */
        color: #fff;
    }
    
    /*canvas{width:50%;height:110px;}*/
    /* .inputDiv  #design_required_by_date{color:#fff;} */
    .form-control.form-control-solid:focus{color:#000 !important;}
    .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg 
    {
        word-break: break-all;
    }
    .select2-selection__choice__display
    {
        color:black;
    }
</style>

@include('layouts.sweetalert.sweetalert_css')
    <link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/signature.css')}}"/>
     <link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}"/>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container temporary_work_create">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top" style="width:98%">
                        <h2 class="db_mr" style="display: inline-block;width:30%">Estimate Design Brief</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="desingform" action="{{ route('estimator.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block">
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
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No.:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{old('projno')}}">
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Project Name" id="name" name="projname"  value="{{old('projname')}}">
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input data-date-inline-picker="true" readonly type="date" value="" class="blackBack form-control form-control-solid" placeholder="Date" name="design_issued_date"  id="design_issued_date" value="{{old('design_issued_date')}}">
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Design Required by Date:</span>
                                    </label>
                                        <input data-date-inline-picker="true"  style=" cursor: pointer;color:#a9abb7;" type="date" class="customDate blackBack form-control form-control-solid" placeholder="Design Required by Date" id="design_required_by_date" name="design_required_by_date" value="{{old('design_required_by_date')}}"  >
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="blackBack form-control form-control-solid" placeholder="Project Address" id="address" name="projaddress" value="{{old('projaddress')}}">
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Designer Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="Enter Comma Seperated" id="designer_company_emails" name="designer_company_emails" value="{{old('designer_company_emails')}}">
                                </div>
                                <h6>And/Or</h6>
                                <div class="d-flex inputDiv d-block">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Select company approved designer</span>
                                    </label>
                                    <select name="designers[]" id="desingers" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required multiple>
                                        <option value="">Select Option</option>
                                        @foreach($designers as $desig)
                                        <optgroup label="Designer List">
                                            @if($desig->hasRole('designer'))
                                            <option value="{{$desig->email}}-{{$desig->id}}">{{$desig->email}}</option>
                                            @endif
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Supplier Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="Enter Comma Seperated" id="supplier_company_emails" name="supplier_company_emails" value="{{old('supplier_company_emails')}}">
                                </div>
                                 <h6>And/Or</h6>
                                 <div class="d-flex inputDiv d-block">

                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Select company approved supplier</span>
                                    </label>
                                    <select name="suppliers[]"  class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple>
                                        <option value="">Select Option</option>
                                        @foreach($suppliers as $supp)
                                         <optgroup label="Suppliers List">
                                            <option value="{{$supp->email}}-{{$supp->id}}">{{$supp->email}}</option>
                                        </optgroup>
                                        @endforeach
                                       
                                    </select>
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">TWC Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="TWC Name" id="twc_name" name="twc_name" value="">
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">TWC Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="TWC Email Address" id="twc_email" name="twc_email" value="" style="background: #f5f8fa" readonly>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW Category</span>

                                    </label>
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
                                    <a href="{{asset('temporary/tw_pdfs/1.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:32px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW Risk Class</span>
                                    </label>
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
                                    <a href="{{asset('temporary/tw_pdfs/2.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:32px"></span></a>
                                    <!--end::Radio group-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex inputDiv d-block">
                                
                                    <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#design-requirement" >
                                        <!--begin::Label-->
                                         <label style="" class=" d-flex align-items-center fs-6 fw-bold mb-2">
                                           Design Requirement:
                                        </label>
                                        <br>
                                        <input type="text" class="blackBack" style="width: 50%;"  id="design_requirement_text" placeholder="Design requirement" readonly name="design_requirement_text" value="{{old('design_requirement_text')}}">
                                        <!--end::Label-->
                                    </div>
                                
                                 </div>
                                  <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block">
                                        <!--begin::Label-->
                                             <label class="required d-flex align-items-center fs-6 fw-bold mb-2">
                                              Description:
                                            </label>
                                            <textarea class="blackBack form-control" name="description_temporary_work_required"  style="width:50%"  rows="2" cols="50" placeholder="Provide brief description of design requirements.">{{old('description_temporary_work_required')}}</textarea>
                                    </div>
                                 </div>
                                  <div class="d-flex inputDiv d-block">
                                    <div class="d-flex modalDiv d-block" data-bs-toggle="modal" data-bs-target="#scope-of-design">
                                         <!--begin::Label-->
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                              Scope of Design:
                                            </label>
                                            <textarea class="blackBack form-control"  style="width:50%; "  id="scopofdesign" rows="2" cols="50"  placeholder="Scope of Design Output Required From TW Engineer" ></textarea>
                                    </div>
                                  </div>
                                   <div class="d-flex inputDiv d-block">
                                    <div style="position:relative;" class="d-flex modalDiv d-block" data-bs-toggle="modal" data-bs-target="#attachment-of-design">
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                              Attachments / Spec:
                                              <span style="margin-left: 10px;">
                                        <a href="{{asset('uploads/checklist.pdf')}}" target="_blank"><span><img alt="info" src="{{asset('assets/media/logos/info.png')}}" style="height:25px"></span></a>
                                    </span>
                                            </label>
                                           
                                        <input id="attachment" class="blackBack" style="background-color: #000; color:#fff" type="text" placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)" readonly>
                                    </div>
                                    
                                  </div>
                                  
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="Name" name="name" id="admin_name" value="{{\Auth::user()->name ?? ''}}" readonly="readonly">
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="blackBack form-control form-control-solid" placeholder="Job title" name="job_title" id="job_title" value="{{\Auth::user()->job_title ?? ''}}" readonly="readonly" >
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                     <input type="text" id="companyadmin" class="blackBack form-control form-control-solid" style="background-color:#f5f8fa" placeholder="Company" name="company" >
                                     <input type="hidden" id="company_id"  name="company_id"  >
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input data-date-inline-picker="true" type="date" name="date" value="{{ date('Y-m-d') }}" style="background-color:#fff" class="form-control form-control-solid">
                                </div>
                                <div class="d-flex inputDiv d-block">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Photo:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input  type="file" class="form-control"  id="photo" name="photo" value="{{old('photo')}}" accept="image/*;capture=camera">
                                </div>
                            
                            </div>

                        </div>
                        @include('dashboard.modals.design-relief-modals')
                         <input type="submit" name="action"  style="margin-left: 10px;" class="btn btn-primary float-end submitbutton" value="Save & Email">
                         <input type="submit" name="action"  style="margin-left: 10px;" class="btn btn-primary float-end submitbutton" value="Save">
                         <!-- <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Save & Email</button> -->
                        <!-- <button  type="submit" style="margin-left: 10px;" class="btn btn-primary float-end submitbutton">Save</button> -->

                        
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
    $(document).on("change","[name='req_check[]']",function(){
        if($(this).is(':checked'))
        {
            $(this).val(1);
        }
        else{
            $(this).val(0);
        }
    })
 </script>
<script>

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
                 // $("#twc_email").val(res);
               }
            }
        });
        }
        console.log(project);
    });
    
    

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
        $("#attachment-of-design  #submit-requirment button").on("click", function() {
                $(this).removeClass("blackBack")
                $(this).addClass("whiteBack")
    
        });

        $("#projects").change(function(){
            console.log("hello")
            $(this).removeClass("blackBack")
            $("#projects span.form-select").removeClass("blackBack")
         //   $(".form-control[readonly]").removeClass("blackBack")
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
         //   $("#scopofdesign").addClass("blackBack")
        })

        $(".customDate").click(function(){
            $(".customDate::-webkit-calendar-picker-indicator").css("filter","invert(0)") 
        })
    });
</script>

    

@endsection
