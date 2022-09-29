<div class="modal fade" id="company_modal_id" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-800px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form" class="form company_details_form" action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Company Details</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->

                    <div class="row g-9 mb-8">
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Name" name="representative_name" value="{{old('representative_name')}}" />
                        </div>
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Company Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Company Name" name="name" value="{{old('name')}}" />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Company Email</label>
                            <input type="email" class="form-control form-control-solid" placeholder="Company Email" name="email" value="{{old('email')}}" />
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Project</label>
                            <select name="projects[]" class="form-select form-select-lg form-select-solid" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                @php
                                $old = old('projects');
                                @endphp
                                @forelse($projects as $item)
                                <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="required fs-6 fw-bold mb-2">Password</label>
                                <input type="password" class="form-control form-control-solid" placeholder="Password" name="password" />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-bold mb-2">Confirm Password</label>
                                <input type="password" class="form-control form-control-solid" placeholder="Confirm Password" name="password_confirmation" />
                            </div>

                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="required fs-6 fw-bold mb-2">Company Representative's Job Title</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Job title" name="job_title" value="{{old('job_title')}}" />
                        </div>
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="fs-6 fw-bold mb-2">Upload Logo</label>
                            <input type="file" class="form-control form-control-solid" placeholder="Upload Logo" name="image" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Address</label>
                            <textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Enter Company Address" name="address">{{old('address')}}</textarea>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12 fv-row">
                            <input type="checkbox"  name="nomination">
                            <label class="fs-6 fw-bold mb-2">Is Nomination Flow required ?</label>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-white me-3">Reset
                        </button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>