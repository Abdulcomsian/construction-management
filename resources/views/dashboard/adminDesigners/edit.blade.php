@extends('layouts.dashboard.master',['title' => 'Designer'])
@section('styles')
<style>
    .addBtn {
        border-radius: 8px;
        float: right;
    }
    .form-select.form-select-solid{
    color:black !important;
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Edit Designer</h1>
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
                    <li class="breadcrumb-item text-muted">Designer</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Edit Designer</li>
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
                    <form method="post" action="{{ route('adminDesigner.update',$user->id) }}">
                        @csrf
                        @method('PUT')
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="required fs-6 fw-bold mb-2">Designer Name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="User Name" name="name" value="{{old('name') ?: $user->name}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="required fs-6 fw-bold mb-2">Designer Email</label>
                                    <input type="email" class="form-control form-control-solid" placeholder="User Email" name="email" value="{{old('email')  ?: $user->email}}" />
                                </div>
                                @php
                                $admin = auth()->user()->hasRole('admin');
                                @endphp
                                @if($admin)
                                <div class="col-md-4">
                                    <label class="required fs-6 fw-bold mb-2">Designer Company</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Designer Company" name="designer_company" value="{{old('designer_company')}}" />
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Job Title</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Job Title" name="job_title" value="{{old('job_title')  ?: $user->job_title}}" />
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Select Role</label>
                                    <select name="role" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                        <option value="">Select Role</option>
                                        <option value="designer" selected>Designer</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        @if(!$admin)
                            <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                <div class="row">
                                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                                        <label class="fs-6 fw-bold mb-2">Make this user as admin designer</label>
                                        <input name="admin_designer" type="checkbox" {{$user->admin_designer ? 'checked' : ''}} />
                                    </div>
                                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                                        <label class="fs-6 fw-bold mb-2">Allow to see price</label>
                                        <input name="view_price" type="checkbox" {{$user->view_price ? 'checked' : ''}} />
                                    </div>
                                </div>
                            </div>
                            @endif
                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Update Designer
                        </button>

                    </form>
                </div>
                <!--end::Card body-->
                <hr>
                <div class="card-body pt-7">
                    <form method="post" action="{{ route('users.updatePassword',$user->id) }}">
                        @csrf
                        @method('PUT')

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
<script>
</script>
@endsection