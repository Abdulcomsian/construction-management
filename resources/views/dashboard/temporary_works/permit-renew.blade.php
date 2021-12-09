@extends('layouts.dashboard.master',['title' => 'Permit To Load'])
@section('styles')
<style>
    .newDesignBtn {
        border-radius: 8px;
        background-color: #F9D413;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
    }

    .newDesignBtn:hover {
        color: rgba(222, 13, 13, 0.66);
    }

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }

    .wrapper,
    .page {
        background-image: url({{asset("assets/media/images/temporaryBg.png")}})
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: red !important;

    }

    .content,
    .card,
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
        background-color: #2B2727 !important;
        border-color: #2B2727 !important;
        color: #fff !important;
    }

    .inputDiv select {
        width: 100%;
        background-color: #2B2727 !important;
        border-color: #2B2727 !important;
        color: #fff !important;
    }

    .inputDiv label {
        width: 50%;
        color: #fff;
    }

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
        height: 200px;
    }

    #sig canvas {
        width: 100% !important;
        height: auto;
    }

    .modalDiv {
        width: 100%;
    }

    #table-body tr td {
        background-color: black;
        color: white;
    }
    .nav-group.nav-group-fluid{
        position: absolute;
        right:10px;
    }
 .image-uploader .upload-text span{
        color:white;
    }
</style>
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}"/>
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Permit to Load</h2>

                </div>
                <!--begin::Card toolbar-->

                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <form action="{{route('permit.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="temporary_work_id" value="{{$tempid}}">
                    @if(isset($permitdata))
                    <input type="hidden" name="type" value="renew">
                    <input type="hidden" name="permitid" value="{{$permitdata->id}}">
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" readonly>
                                        <option value="">Select Option</option>
                                        <option value="{{$project->id}}" selected="selected">{{$project->name .' - '. $project->no}}</option>
                                    </select>
                                </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project No :</span>
                                    </label>
                                   <input readonly type="text" class="form-control form-control-solid" placeholder="000" id="no" name="projno" value="{{$project->no}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">Project Name :</span>
                                    </label>
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" id="name" name="projname" value="{{$project->name}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">Drawing Number:</span>
                                    </label>
                                     <input  type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_no" name="drawing_no" value="{{$permitdata->drawing_no ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" name="twc_name" value="{{$permitdata->twc_name ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Date :
                                        </label>
                                         <input  type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" name="date">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                             <span class="required">Permit Number :</span>
                                        </label>
                                         <input  type="text" class="form-control form-control-solid" placeholder="Permit No" name="permit_no" value="{{$twc_id_no}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                             <span class="required">Drawing title :</span>
                                        </label>
                                         <input  type="text" class="form-control form-control-solid" placeholder="Drawing Title" name="drawing_title" value="{{$permitdata->drawing_title ?? ''}}">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                             <span class="required">TWS Name :</span>
                                        </label>
                                         <input  type="text" class="form-control form-control-solid" placeholder="TWS Name" name="tws_name" value="{{$permitdata->tws_name ?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Location of the Temporary Works (Area):
                                    </label>
                                    <textarea name="location_temp_work" rows="2" cols="170" style="background: #2B2727;color:white" placeholder="Location of the Temporary Works (Area):">{{$permitdata->location_temp_work ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170" style="background: #2B2727;color:white" placeholder="Description of Structure which is ready for use:">{{$permitdata->description_structure ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">MS/RA Number</span>
                                    </label>
                                     <input  type="text" class="form-control form-control-solid" placeholder="Ms/RA Number" name="ms_ra_no" value="{{$permitdata->ms_ra_no ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Equipment/materials used as a specified/fit for purpose</span>

                            </label>
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <label>
                                    <input type="radio" class="btn-check" name="equipment_metrial" value="1" checked />
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" >Y</span>
                                </label>
                                <label>
                                    <input type="radio" class="btn-check" name="equipment_metrial" value="2" disabled readonly/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" >N</span>
                                </label>
                            </div>
                            <!--end::Radio group-->
                        </div>

                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Workmanship checked (i.e. all props, ties, struts, joints, stop-ends, checked)</span>

                            </label>
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <!--begin::Option-->

                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="Workmanship" value="1" checked/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="Workmanship" value="2" disabled="disabled" readonly/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->

                                <!--end::Option-->
                            </div>
                            <!--end::Radio group-->
                        </div>

                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">TW checked to drawings/design output</span>

                            </label>
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <!--begin::Option-->

                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="drawings_design" value="1" checked/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="drawings_design" value="2" disabled readonly/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->

                                <!--end::Option-->
                            </div>
                            <!--end::Radio group-->
                        </div>

                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Loading /use limitations understood e.g. Rate of pour, sequence of loading, access/plant loading</span>

                            </label>
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <!--begin::Option-->

                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="loading_limitations" value="1" checked/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="loading_limitations" value="2" disabled readonly/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->

                                <!--end::Option-->
                            </div>
                            <!--end::Radio group-->
                        </div>

                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Approval by Temp Works Coordinator Required? <br>
                                    completed Other criteria specified (e.g. strength of supporting structure, any back propping,
                                    ground tests, anchor tests) are checked and satisfied (IF YES, SPECIFY BELOW)</span>

                            </label>
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <!--begin::Option-->

                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                     
                                      <input type="radio" class="btn-check" name="works_coordinator" value="1" @if(isset($permitdata) && $permitdata->works_coordinator==1){{'checked'}}@endif />
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="works_coordinator" value="2" @if(isset($permitdata) && $permitdata->works_coordinator==2){{'checked'}}@endif/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->

                                <!--end::Option-->
                            </div>
                            <!--end::Radio group-->
                        </div>
                         <div class="d-flex inputDiv">
                            <div class="d-flex modalDiv">
                                   @if(isset($permitdata) && $permitdata->works_coordinator==1)
                                    <textarea name="description_approval_temp_works" rows="2" cols="155" style="background: #2B2727;color:white">{{$permitdata->description_approval_temp_works ?? ''}}</textarea>
                                    @endif
                            </div>
                         </div>
                            <h5 style="color: white">Permit to unload/Use</h5>
                            <br>
                            <p style="color: white;">
                               
                                I confirm that I have inspected the above temporary structure and I
                                am satisfied that it conforms to the above.<br>
                                I consider that the temporary structure is ready to be loaded and
                                taken into use.<br>
                                I confirm that I am authorised to issue a Permit to Load for this
                                temporary structure.<br>
                            </p>

                                <!--end::Option-->


                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Principle Contractor approved required?</span>

                            </label>
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <!--begin::Option-->

                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="principle_contractor" value="1" @if(isset($permitdata) && $permitdata->principle_contractor==1){{'checked'}}@endif />
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="principle_contractor" value="2" @if(isset($permitdata) && $permitdata->principle_contractor==2){{'checked'}}@endif/>
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->

                                <!--end::Option-->
                            </div>
                            <!--end::Radio group-->
                        </div>     
                        <div class="d-flex inputDiv">
                            <!--begin::Label-->
                            <div class="col-md-6">
                                <div class="d-flex inputDiv">
                                </div>
                                @if(isset($permitdata) && $permitdata->principle_contractor==1)
                               <div class="d-flex inputDiv principleno">
                                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name::</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Name" name="name1" value="{{$permitdata->name1 ?? ''}}">
                                </div>
                                <div class="d-flex inputDiv principleno">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title1" value="{{$permitdata->job_title1 ?? ''}}">
                                </div>
                                @endif
                                <div class="d-flex inputDiv ">
                                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name::</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Name" name="name" value="{{$permitdata->name ?? ''}}">
                                </div>
                                <div class="d-flex inputDiv " >
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title" value="{{$permitdata->job_title ?? ''}}">
                                </div>
                                  <div class="d-flex inputDiv ">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                     <input type="text" id="companyadmin" class="form-control form-control-solid" placeholder="Company" name="company" value="{{$project->company->name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(isset($permitdata) && $permitdata->principle_contractor==1)
                               <div class="d-flex inputDiv principleno" id="sign1" style="margin-left:40px">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Signature:</span>
                                    </label>
                                    <br/>
                                    <div id="sig1" style="width:40%;height: 100px"></div>
                                    <br/>
                                   <textarea id="signature1" name="signed1" style="display: none"></textarea>
                                </div>
                                @endif
                                <div class="d-flex inputDiv " id="sign"  style="margin-left:40px">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                        <span class="required">Signature:</span>
                                    </label>
                                    <br/>
                                    <div id="sig"  style="width:40%;height: 100px;"></div>
                                    <br/>
                                   <textarea id="signature" name="signed" style="display: none"></textarea>
                                </div>
                                <div class="d-flex inputDiv " style="margin-left:40px">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
                                </div>
                                
                            </div>
                        </div>
                         <div class="col-md-12">
                             <div class="uploadDiv" style="padding-left: 10px;">
                               <div class="input-images"></div>
                             </div>
                             <br>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </div>
                    </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $("#flexCheckChecked").change(function() {
        if ($(this).is(':checked')) {
            $("#signtype").val(1);
            $("#namesign").addClass('d-flex').show();
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();

        } else {
            $("#signtype").val(0);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("#clear").show();

        }
    })
    $("input[name='principle_contractor']").change(function(){
       if ($(this).val()==1){
          $(".principleno").addClass('d-flex').show();
       }
       else{
          $(".principleno").removeClass('d-flex').hide()
        
       }
    })

    $("input[name='works_coordinator']").change(function(){
       if ($(this).val()==1){
         $("textarea[name='description_approval_temp_works']").show();
       }
       else{
          $("textarea[name='description_approval_temp_works']").hide();
        
       }
    })
    
</script>
@endsection