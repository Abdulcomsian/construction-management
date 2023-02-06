@extends('layouts.dashboard.master',['title' => 'Users'])
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Edit User</h1>
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
                    <li class="breadcrumb-item text-muted">User</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Edit Admin</li>
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
                    <form method="post" action="{{ route('users.admin.update',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">User Name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="User Name" name="name" value="{{old('name') ?: $user->name}}" />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">User Email</label>
                                    <input type="email" class="form-control form-control-solid" placeholder="User Email" name="email" value="{{old('email')  ?: $user->email}}" />
                                </div>
                                @if(auth()->user()->hasRole('company'))
                                <div class="col-md-6">
                                    <label class="fs-6 fw-bold mb-2">Upload Company Policy</label>
                                    <input type="file" class="form-control form-control-solid" name="company_policy">
                                </div>
                                @endif

                            </div>
                        </div>
                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Update User
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