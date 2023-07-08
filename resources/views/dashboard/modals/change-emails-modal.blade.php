<div class="modal fade" id="change_email_modal_id" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <!--begin::Modal ------------------------content-->
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
                <form id="kt_modal_new_target_form" class="form company_details_form" action="{{ route('change-email') }}" method="post" >
                    @csrf
                    <input type="hidden" name="id" id="design_brief_id" value="">
                    <!--begin::Heading-->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Change Emails</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-bold mb-2">PC TWC Email</label>
                            <input type="email" class="form-control form-control-solid" placeholder="Enter Email" name="pc_twc_email" />
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-bold mb-2">Designer Company Email</label>
                             <input type="email" class="form-control form-control-solid" placeholder="Enter Email" name="d_email"  />
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-bold mb-2">Designer Checker Email</label>
                             <input type="email" class="form-control form-control-solid" placeholder="Enter Email" name="dc_email"  />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S-NO</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Status</th>
                            
                            <th>Sent Date</th>
                            <th>Read Date</th>
                        </tr>
                    </thead>
                    <tbody id="change_email_history">
                        
                    </tbody>
                    
                </table>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>