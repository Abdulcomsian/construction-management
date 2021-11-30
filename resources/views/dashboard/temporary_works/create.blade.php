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
    .inputDiv select{
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
    .card-title{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
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
                        <a style="width: 190px;" href="{{ route('temporary_works.create') }}" class="newDesignBtn">New Design Relief</a>
                    </div>
                    <!--begin::Card toolbar-->

                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form action="{{ route('temporary_works.store') }}" method="post">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                        <div class="row">
                            <div class="col-md-6">
                                <div clatemss="d-flex inputDiv">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Select Project:</span>
                                    </label>
                                    <select name="project_id" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                            <option value="{{$item->id}}"  @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset @isset($project_ids) {{ in_array($item->id,$project_ids) ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
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
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="000" id="no">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Name" id="name">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Issued Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" placeholder="Date" name="design_issued_date">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Design Required by Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="date" class="form-control form-control-solid" placeholder="Design Required by Date" name="design_required_by_date">
                                </div><div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Project Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input readonly type="text" class="form-control form-control-solid" placeholder="Project Address" id="address">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Company Name:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Designer Company Name" name="designer_company_name">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Designer Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="email" class="form-control form-control-solid" placeholder="Designer Email Address" name="designer_company_email">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Name:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Name" name="twc_name">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TWC Email Address:</span>

                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="TWC Email Address" name="twc_email">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">TW Category</span>

                                    </label>
                                {{--								<!--end::Label-->--}}
                                {{--							    <div class="checkBoxDiv">--}}

                                {{--                                </div>--}}
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
                                {{--								<!--end::Label-->--}}
                                {{--							    <div class="checkBoxDiv">--}}

                                {{--                                </div>--}}
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
                                <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#design-requirement">
                                    <!--begin::Label-->
                                    <input type="text" placeholder="Design Requirement" readonly name="design_requirement_text">
                                    <!--end::Label-->
                                </div>
                                <div class="d-flex modalDiv">
                                    <input type="text" placeholder="Description of Temporary Works Required" name="description_temporary_work_required">
                                </div>
                                <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#scope-of-design">
                                    <input type="text" placeholder="Scope of Design Output Required fronm the Temporary Works Engineer:" readonly>
                                </div>
                                <div class="d-flex modalDiv" data-bs-toggle="modal" data-bs-target="#attachment-of-design">
                                    <input type="text" placeholder="Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)" readonly>
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Name::</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Name" name="name">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Job title:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Company: </span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Company" name="company">
                                </div>
                                <div class="d-flex inputDiv">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Date:</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
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
@include('dashboard.modals.design-relief-modals')
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/temporary-work-modal.js') }}"></script>
    <script>
        var projects = {!! $projects !!};
        $('#projects').change(function () {
            let id = $(this).val();
            let project = projects.filter(function(p){return p.id == id;});
            if (project){
                $('#no').val('').val(project[0].no);
                $('#name').val('').val(project[0].name);
                $('#date').val('').val(project[0].created_at);
                $('#address').val('').val(project[0].address ? project[0].address : 'Not Set');
            }
            console.log(project);
        });
    </script>
@endsection

