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
        .modalDiv{
            width:100% ;
        }
        #table-body tr td {
          background-color: black;
          color :white;
        }
</style>
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
                        <h2>Permit to UnLoad</h2>
                    
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form action="https://construction.accrualhub.com/temporary_works" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="KYtCMOU8ufOlGP3QPYhG6VJzge5LnJ3mj93r8p8N">                        
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
                                     <input  type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_no" name="drawing_no">
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">TWC Name :</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" name="twc_name">
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
                                         <input  type="text" class="form-control form-control-solid" placeholder="Drawing Title" name="drawing_title">
                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                             <span class="required">TWS Name :</span>
                                        </label>
                                         <input  type="text" class="form-control form-control-solid" placeholder="TWS Name" name="tws_name">
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
                                    <textarea name="location_temp_work" rows="2" cols="170" style="background: #2B2727;color:white" placeholder="Location of the Temporary Works (Area):"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea name="description_structure" rows="2" cols="170" style="background: #2B2727;color:white" placeholder="Description of Structure which is ready for use:"></textarea>
                                </div>
                            </div>
                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                         <span class="required">MS/RA Number</span>
                                    </label>
                                     <input  type="text" class="form-control form-control-solid" placeholder="Ms/RA Number" name="ms_ra_no">
                                </div>
                            </div>
                             <h5 style="color: white">Permit to unload/Strike</h5>
                             <br>   
                             <p style="color: white;">1.    Permanent Works supported by the above item of Temporary Works have gained sufficient strength  to support  the loading/use permitted (See concrete cube results below – or state any other PW design requirements if applicable)
                                    <br>
                            2.  Sequence of removal of TW, where specified by the TWD, is understood by the supervisor.
                            <br>
                            3.  All standard safety measures executed i.e., holes covered and protected, leading edge protection etc
                            <br>
                            4.  Risk Assessment, Method Statement and or associated Task Sheets in place                      
                                
                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>                            
                   
                            </div>
                          </div>
                            <div class="container" >
                                      
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th style="text-align: left;" colspan="5">CONCRETE CUBE RESULTS (OR OVER-WRITE WITH STRENGTH BY MATURITY CURVE DATA)</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody id="table-body">
                                        <tr>
                                            <td>Mix Design Details</td>
                                            <td>Unique Cube Ref No.</td>
                                            <td>Age of Cube</td>
                                          <td>Compressive Strength N/mm2</td>
                                          <td>Method of Curing</td>
                                        </tr>
                                        <tr>
                                          <td>manually</td>
                                          <td>manually</td>
                                          <td>manually</td>
                                          <td>manually</td>
                                          <td>ManuallyManually</td>
                                        </tr>
                                        
                                          
                                      </tbody>
                                    </table>
                                  
                            </div>
                             
                            <div class="col-md-12">
                                <h6 style="color:white">TWC to define the extents, limits and controls for this PTS (where applicable)</h6>
                                <textarea name="description_temporary_work_required" rows="2" cols="153" style="background: #2B2727;color:white"></textarea>

                                <h6 style="color:white">Back-propping and additional requirements; limitations and exclusions; explanatory sketches refrences - if applicable</h6>
                                <textarea name="description_temporary_work_required" rows="2" cols="153" style="background: #2B2727;color:white"></textarea>
                                 <br>
                                 <p style="color: white;"> I hereby authorise the Temporary Works to be struck out/removed in accordance with the specified/approved  unloading & striking method, subject to observing the extents, limits and controls listed above.  </p>
                            
                            </div>
                            <div class="d-flex inputDiv"  >
                            
                                    
                                <!--begin::Label-->
                                <div class="col-md-6">
                                    <div class="d-flex inputDiv">
                                    </div>
                                   <div class="d-flex inputDiv principleno">
                                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name::</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Name" name="name1">
                                    </div>
                                    <div class="d-flex inputDiv principleno">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Job title:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title1" >
                                    </div>
                                    <div class="d-flex inputDiv ">
                                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name::</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Name" name="name" >
                                    </div>
                                    <div class="d-flex inputDiv " >
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Job title:</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title" >
                                    </div>
                                      <div class="d-flex inputDiv ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Company: </span>
                                        </label>
                                        <!--end::Label-->
                                         <input type="text" id="companyadmin" class="form-control form-control-solid" placeholder="Company" name="company">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="d-flex inputDiv principleno" id="sign1" style="margin-left:40px">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Signature:</span>
                                        </label>
                                        <br/>
                                        <div id="sig1" style="width:40%;height: 100px"></div>
                                        <br/>
                                       <textarea id="signature1" name="signed1" style="display: none"></textarea>
                                    </div>
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
                                    <br>
                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                                </div>
                           </div>
                    </div>
                </div>
             
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    @endsection

