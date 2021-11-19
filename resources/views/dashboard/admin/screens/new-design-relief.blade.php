@extends('layouts.dashboard.master',['title' => 'Users'])
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
    table{
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }
    .wrapper,
    .page{
        background-image: url({{asset("assets/media/images/temporaryBg.png")}})
    }
    #kt_toolbar_container h1{
        font-size: 35px !important;
        color: red !important;
    }
    .content,
    .card,
    .toolbar-fixed .toolbar{
        background-color: transparent !important;
        border: none !important;
    }
    .card-title h2{
        color: rgba(254, 242, 242, 0.66);
    }
    table tbody td{
        text-align:center;
    }
    table thead{
        background-color: #000;
    }
    table thead th{
        color: #fff !important;
        text-align: center;
    }
    tbody tr:nth-child(odd) {background-color: #fff;}
    tbody tr:nth-child(even) {background-color: #f2f2f2;}
    .inputDiv input{
        width: 100%;
        background-color: #2B2727 !important;
        border-color: #2B2727 !important;
        color: #fff !important;
    }
    .inputDiv label{
        width: 50%;
        color: #fff;
    }
    .inputDiv{
        margin: 20px 0px;
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
                        <h2>Temporary Work Register</h2>
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <a href="" class="newDesignBtn">New Design Relief</a>
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex inputDiv">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Project No.:</span>
							</label>
							<!--end::Label-->
								<input readonly type="text" class="form-control form-control-solid" placeholder="000" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Project Name:</span>

								</label>
								<!--end::Label-->
							    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Date:</span>

								</label>
								<!--end::Label-->
							    <input readonly type="text" class="form-control form-control-solid" placeholder="Date" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Design Required by Date:</span>

								</label>
								<!--end::Label-->
							    <input readonly type="text" class="form-control form-control-solid" placeholder="Design Required by Date" name="target_title">
							</div><div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Project Address:</span>

								</label>
								<!--end::Label-->
							    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Address" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Designer Company Name:</span>

								</label>
								<!--end::Label-->
							    <input type="text" class="form-control form-control-solid" placeholder="Designer Company Name" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Designer Email Address:</span>

								</label>
								<!--end::Label-->
							    <input type="text" class="form-control form-control-solid" placeholder="Designer Email Address" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">TWC Name:</span>

								</label>
								<!--end::Label-->
							    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">TWC Email Address:</span>

								</label>
								<!--end::Label-->
							    <input type="text" class="form-control form-control-solid" placeholder="TWC Email Address" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">TW Category</span>

								</label>
								<!--end::Label-->
							    <div class="checkBoxDiv">

                                </div>
							</div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex inputDiv">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Design Requirement for:</span>
							</label>
							<!--end::Label-->
								<input readonly type="text" class="form-control form-control-solid" placeholder="000" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Description of Temporary Works Required</span>

								</label>
								<!--end::Label-->
							    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Scope of Design Output Required fronm the Temporary Works Engineer:</span>

								</label>
								<!--end::Label-->
							    <input readonly type="text" class="form-control form-control-solid" placeholder="Date" name="target_title">
							</div>
                            <div class="d-flex inputDiv">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold mb-2">
									<span class="required">Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)</span>

								</label>
								<!--end::Label-->
							    <input readonly type="text" class="form-control form-control-solid" placeholder="Design Required by Date" name="target_title">
							</div>
                        </div>
                    </div>
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
@include('layouts.sweetalert.sweetalert_js')
@endsection