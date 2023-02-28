@extends('layouts.dashboard.master',['title' => 'Users'])
@section('styles')
<style>
    .addBtn {
        border-radius: 8px;
        float: right;
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

    .card {
        margin: 30px 0px;
        border-radius: 10px;
    }
    .select2-selection__choice__display, .form-select.form-select-solid{
        color:black;
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
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Edit Company</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Admin</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Company</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Edit Company</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
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
                <!--begin::Card body-->
                <div class="card-body pt-7">
                    <form action="{{ route('companies.update',$company->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="row g-9 mb-8">
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Designated Individual Name</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Name" name="representative_name" value="{{old('representative_name') ?: $company->representative_name }}" />
                            </div>
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Company Title</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Company Name" name="name" value="{{old('name') ?: $company->name }}" />
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-bold mb-2">DI Email</label>
                                <input type="email" class="form-control form-control-solid" placeholder="DI Email" name="email" value="{{old('email') ?: $company->email }}" />
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold mb-2">Company Representative's Job Title</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title" value="{{old('job_title') ?: $company->job_title }}" />
                            </div>
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <label class="fs-6 fw-bold mb-2">Upload Logo</label>
                                <input type="file" class="form-control form-control-solid" placeholder="Upload Logo" name="image" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Project</label>
                                <select name="projects[]" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                    @forelse($projects as $item)
                                    <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset @isset($project_ids) {{ in_array($item->id,$project_ids) ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Address</label>
                                <textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Enter Company Address" name="address">{{old('address') ?: $company->address }}</textarea>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-12 fv-row">
                                <input type="checkbox"  name="nomination" {{$company->nomination==1 ? 'checked':''}}>
                                <label class="fs-6 fw-bold mb-2">Is Nomination Flow required ?</label>
                            </div>
                            <!--end::Col-->
                       </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-12 fv-row">
                                <label class="fs-6 fw-bold mb-2">Auto Backup</label>
                                <input type="checkbox" name="auto_backup"  {{$company->auto_backup==1 ? 'checked':''}}>
                            </div>

                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Update Company
                        </button>

                    </form>
                </div>
                <!--end::Card body-->
                <!--end::Card body-->
                <hr>
                <div class="card-body pt-7">
                    <form method="post" action="{{ route('company.updatePassword') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$company->id}}" />
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">New Password</label>
                                    <input type="password" class="form-control form-control-solid" placeholder="Password" name="password" />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Confirm New Password</label>
                                    <input type="password" class="form-control form-control-solid" placeholder="Confirm Password" name="password_confirmation" />
                                </div>

                            </div>
                        </div>

                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Update Password
                        </button>

                    </form>
                </div>
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