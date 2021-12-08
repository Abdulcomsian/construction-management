@extends('layouts.dashboard.master',['title' => 'Temporary Works'])
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
        background-image: url(https://construction.accrualhub.com/assets/media/images/temporaryBg.png)
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

    table,
    th,
    td {
        border: 1px solid grey;
        background-color: #000000;
        color: white;
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
                    <h2>Scaffolding InspectionPermit to Load</h2>

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
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Project No :
                                    </label>
                                    <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>


                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Project Name :
                                    </label>
                                    <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Drawing Number:
                                    </label>
                                    <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>


                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        TWC Name :
                                    </label>
                                    <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

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
                                        <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                    </div>
                                </div>
                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Permit Number :
                                        </label>
                                        <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                    </div>
                                </div>

                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Drawing title :
                                        </label>
                                        <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>
                                    </div>
                                </div>


                                <div class="d-flex inputDiv">
                                    <div class="d-flex modalDiv">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            TWS or competent Scaffolder Name:
                                        </label>
                                        <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                    </div>
                                </div>

                                <div class="d-flex inputDiv" id="namesign" style="display: none !important">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name Signature:</span>
                                    </label>
                                    <input type="text" name="namesign" class="form-control form-control-solid">
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
                                    <textarea name="description_temporary_work_required" rows="2" cols="170" style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        Description of Structure which is ready for use:
                                    </label>
                                    <textarea name="description_temporary_work_required" rows="2" cols="170" style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>


                            <div class="d-flex inputDiv">
                                <div class="d-flex modalDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        MS/RA Number
                                    </label>
                                    <textarea name="description_temporary_work_required" rows="2" cols="170" style="background: #2B2727;color:white"></textarea>
                                </div>
                            </div>




                            <div class="col-md-12 mt-20">

                                <div class="d-flex inputDiv" style=" height: 87px;">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Equipment/materials used as a specified/fit for purpose</span>


                                    </label>




                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid" style="margin-top: 32px;height: 50px;">
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="1" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->

                                    </div>

                                    <!--end::Radio group-->

                                    <div style="margin-left: 10px; text-align:center;">
                                        <h3 style="color: white;">Comments</h3>

                                        <textarea name="description_temporary_work_required" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>

                                    </div>

                                </div>

                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Workmanship checked </span>

                                    </label>




                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="1" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">

                                        <textarea name="description_temporary_work_required" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>

                                    </div>


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
                                            <input type="radio" class="btn-check" name="tw_category" value="1" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->

                                    <div style="margin-left: 10px; text-align:center;">

                                        <textarea name="description_temporary_work_required" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>

                                    </div>



                                </div>

                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Loading /use limitations understood e.g. sequence of loading, access/plant loading</span>

                                    </label>




                                    <!--begin::Radio group-->
                                    <div class="nav-group nav-group-fluid">
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="1" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label>
                                            <input type="radio" class="btn-check" name="tw_category" value="2" />
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Radio group-->
                                    <div style="margin-left: 10px; text-align:center;">
                                        <textarea name="description_temporary_work_required" rows="2" cols="50" style="background: #2B2727;color:white"></textarea>

                                    </div>
                                </div>
                                <p style="color: white;">Inspect each of the following items & tick off in the box provided if installed correctly as per the design. Where actions are required, identify with a number & detail comments in the space provided below.</p>

                            </div>
                        </div>








                        <div class="col-md-12 ">


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Even, stable ground?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Base Plates?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Sole boards?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                " style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Undermined?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Plumb?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Staggered joints?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong spacing?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Damaged?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Damaged?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Trap boards?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Incomplete boarding?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Insufficient supports / ties?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Insufficient length?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Any missing or loose?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong fittings?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Not level?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Joined in same bays?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Loose or damaged?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong height?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Any missing or loose?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>



                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Damaged?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>



                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong fittings?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>



                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Some missing?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>



                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Loose or damaged?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Wrong fittings?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Some missing?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Loose or damaged?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Partially Removed?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>

                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Some missing?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>


                            </div>


                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">Loose/ damaged or broken?</span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N/A</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 10px; text-align:center;">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>

                            </div>




                            <div class="d-flex inputDiv">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 20%;">
                                    <span class="required">
                                        <h5>OTHER? Any further actions necessary? </h5>
                                    </span>

                                </label>




                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid" style="height: 48px;">
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                    </label>
                                    <label>

                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->

                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                                <div style="margin-left: 70px; ">

                                    <textarea name="description_temporary_work_required" rows="2" cols="100
                                                            " style="background: #2B2727;color:white"></textarea>

                                </div>
                            </div>


                            <div class="container">


                                <table style="width:100%">

                                    <tr>

                                        <td style="width:10%;border-right:1px solid black"></td>
                                        <td style="width:50%">COMMENTS/ACTIONS </td>
                                        <td style="width:40%;width:10%;border-left:2px solid black;"></td>
                                    </tr>


                                    <tr>

                                        <td style="width:10%">NO.</td>
                                        <td style="width:50%">COMMENTS/ACTIONS REQUIRES</td>
                                        <td style="width:40%">DATE COMPLETED</td>
                                    </tr>

                                    <tr>
                                        <td>Emil</td>
                                        <td>Tobias</td>
                                        <td>Linus</td>
                                    </tr>

                                    <tr>
                                        <td>Emil</td>
                                        <td>Tobias</td>
                                        <td>Linus</td>
                                    </tr>


                                    <tr>
                                        <td>Tobias</td>
                                        <td>Tobias</td>
                                        <td>Tobias</td>
                                    </tr>


                                    <tr>
                                        <td>Emil</td>
                                        <td>Tobias</td>
                                        <td>Linus</td>
                                    </tr>



                                    <tr>
                                        <td>Emil</td>
                                        <td>Tobias</td>
                                        <td>Linus</td>
                                    </tr>


                                    <tr>
                                        <td>Emil</td>
                                        <td>Tobias</td>
                                        <td>Linus</td>
                                    </tr>



                                    <tr>
                                        <td>Emil</td>
                                        <td>Tobias</td>
                                        <td>Linus</td>
                                    </tr>



                                </table>

                                <p>To undestand the example better, we have added borders to the table.</p>

                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Inspected by: :
                                                </label>
                                                <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                            </div>
                                        </div>


                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Job Title: :
                                                </label>
                                                <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                            </div>
                                        </div>

                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Company:
                                                </label>
                                                <textarea name="description_temporary_work_required" rows="1" cols="70" style="background: #2B2727;color:white"></textarea>

                                            </div>
                                        </div>

                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Signature:
                                                </label>
                                                <textarea name="description_temporary_work_required" rows="3" cols="70" style="background: #2B2727;color:white"></textarea>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Scaff-tag signed and displayed?
                                                </label>
                                                <!--begin::Radio group-->
                                                <div class="nav-group nav-group-fluid ">
                                                    <!--begin::Option-->

                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                    </label>

                                                    <!--end::Option-->
                                                    <!--begin::Option-->

                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Radio group-->



                                            </div>

                                        </div>

                                        <div class="d-flex inputDiv">
                                            <div class="d-flex modalDiv">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    Are you competent to carry out inspection?
                                                </label>
                                                <!--begin::Radio group-->
                                                <div class="nav-group nav-group-fluid ">
                                                    <!--begin::Option-->

                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="tw_category" value="1" />
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin::Option-->
                                                    <label>
                                                        <input type="radio" class="btn-check" name="tw_category" value="2" />
                                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                    </label>
                                                    <label>

                                                        <!--end::Option-->
                                                        <!--begin::Option-->

                                                        <!--end::Option-->
                                                </div>
                                                <!--end::Radio group-->



                                            </div>

                                        </div>

                                        <div class="d-flex inputDiv mt-10">
                                            <div class="d-flex inputDiv">
                                                <div class="d-flex modalDiv">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        Date :
                                                    </label>
                                                    <textarea name="description_temporary_work_required" rows="2" cols="70" style="background: #2B2727;color:white"></textarea>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <!------ Design Requiremnts Modal ---->

                        <!-- **************** Framework / Falsework **************  -->
                        <ul class="d-none Formwork">
                            <li>Foundation / Formwork</li>
                            <li>Walls / Formwork</li>
                            <li>Columns / Formwork</li>
                            <li>Slab / Soffit - Falsework</li>
                            <li>Beams / Falsework</li>
                            <li>Back Propping</li>
                            <li>Edge Protection</li>
                            <li>Support Systems</li>
                            <li>Twin Wall Design & Support</li>
                            <li>Push Pulls for Precast Walls and Columns</li>
                            <li>Precast Stairs</li>
                            <li>Crash Decks</li>
                            <li>Metal Decking & Back Proppig</li>
                            <li>Screen Protection</li>
                            <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                        </ul>
                        <!-- **************** Equipment and Plant **************  -->
                        <ul class="d-none Equipment">
                            <li>Piling Mat & Working Platform</li>
                            <li>Crane Platform</li>
                            <li>Crane Support & Foundations</li>
                            <li>Tower Crane Base</li>
                            <li>Access Platform for Machines and Temporary Ramps </li>
                            <li>Concrete Pump Working Platform</li>
                            <li>Hoist Ties & Foundations</li>
                            <li>Mast Climbers & Foundations</li>
                            <li>Chute Support</li>
                            <li>Loading Bay</li>
                            <li>Canti Deck</li>
                            <li>Soil Bases</li>
                            <li>Lifting / Handling Devices</li>
                            <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                        </ul>
                        <!-- **************** Site Establishment **************  -->
                        <ul class="d-none Establishment">
                            <li>Temporary Offices / Cabins</li>
                            <li>Hoarding / Tower Crane Hoarding</li>
                            <li>Access / Scaffolding</li>
                            <li>Access Gantries / Platform</li>
                            <li>Access Bridges</li>
                            <li>Barriers</li>
                            <li>Sign Boards</li>
                            <li>Fuel Storage</li>
                            <li>Welfare Facilities</li>
                            <li>Precast Facilities</li>
                            <li>Wheel Wash Base</li>
                            <li>Permanent Works</li>
                            <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                        </ul>
                        <!-- **************** Access / Scaffolding **************  -->
                        <ul class="d-none Scaffolding">
                            <li>Tube & Fitting</li>
                            <li>System Scaffolding </li>
                            <li>System Staircase</li>
                            <li>Temporary Roof</li>
                            <li>Loading Bay</li>
                            <li>Cute Support</li>
                            <li>Mobile Tower</li>
                            <li>Pedestrain Walkway Cover</li>
                            <li>Suspension System</li>
                            <li>Pontoon</li>
                            <li>Protection Shield (steel Shield to Cover Railway While Working with a Crane Above)</li>
                            <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                        </ul>
                        <!-- **************** Structure **************  -->
                        <ul class="d-none Structure">
                            <li>Propping</li>
                            <li>Back Propping</li>
                            <li>Shoring</li>
                            <li>Scaffolding</li>
                            <li>Working Platform</li>
                            <li>Formwork</li>
                            <li>Falsework</li>
                            <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                        </ul>
                        <!-- **************** Structural Stability **************  -->
                        <ul class="d-none Stability">
                            <li>Existing Structures During Construction</li>
                            <li>New Structures During Construction</li>
                            <li>Structural Steelwork Erection</li>
                            <li>Needling</li>
                            <li>Temporary Underpinning</li>
                            <li>Cut and Carve Beam and Slab Support</li>
                            <li>Facade System</li>
                            <li>Party Wall Propping</li>
                            <li>Butresses</li>
                            <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                        </ul>
                        <!-- **************** Permanent Works **************  -->
                        <ul class="d-none Permanent">
                            <li>Partial / Permanent Support Conditions</li>
                            <li>Demolition</li>
                            <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                        </ul>
                    </div>
            </div>
        </div>

    </div>
    <!--end::Modal body-->
</div>
@endsection