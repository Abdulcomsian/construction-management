<div class="modal fade" id="share_drawing_modal_id" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-800px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" style="position: absolute"
                    data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                    x="0" y="7" width="16" height="2" rx="1" />
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
                <form id="kt_modal_new_target_form" class="form company_details_form"
                    action="{{ route('drawing.share') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="sharedrwingid" value="">
                    <!--begin::Heading-->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Share Drawing</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-12 fv-row"
                            style="display: flex; justify-content:space-between;gap:10px; align-items: flex-end;">
                            <div class="" style="flex-grow: 1;">
                                <label class="required fs-6 fw-bold mb-2" style="padding: 0 !important">Email</label>
                                <input type="email" class="form-control form-control-solid"
                                    placeholder="Enter email address" name="email" required
                                    style="padding: 10px 15px;" />
                            </div>

                            <div class=" text-center">
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 11px 37px;width: 100% !important;">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                        <div class="fv-row col-12" style="margin-top:9px;">
                            <input type="checkbox" name="commentcheckbox" />
                            <label class="fs-6 fw-bold mb-2">Share Comment</label>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <!--begin::Actions-->

                        <!--end::Actions-->

                    </div>
                </form>
                <form id="kt_modal_new_target_form" class="form company_details_form"
                    action="{{ route('drawingchecker.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="sharedrwingid2" value="">
                    <!--begin::Heading-->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="my-4">
                        <!--begin::Title-->
                        <h1 class="mb-3" style="font-size: 18px; font-weight: 700;font-family: 'Inter';">Update Design
                            Checker Email</h1>
                        <!--end::Title-->
                    </div>
                    <div class="row">
                        <div class="col-12 fv-row"
                            style="display: flex; justify-content:space-between;gap:10px; align-items: flex-end;">
                            <div style="flex-grow: 1">
                                <label class="required fs-6 fw-bold mb-2" style="padding: 0 !important">Email</label>
                                <input type="email" class="form-control form-control-solid" id="designer_email"
                                    placeholder="Enter email address" name="email" required
                                    style="padding: 10px 15px;" />
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 11px 37px;width: 100% !important;">
                                    <span class="indicator-label" style="font-size:11px;">Update</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--end::Actions-->
                </form>
                <form id="kt_modal_new_target_form" class="form company_details_form"
                    action="{{ route('drawingchecker.share') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="sharedrwingwithchecckerid" value="">
                    <!--begin::Heading-->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-4 mt-6">
                        <!--begin::Title-->
                        <h1 class="mb-3" style="font-size: 18px; font-weight: 700;font-family: 'Inter';">Share Drawing
                            with Design Checker</h1>
                        <!--end::Title-->
                    </div>

                    <!--end::Actions-->
                </form>
                <!--end:Form-->
                <table class="table" style="border-radius: 8px; overflow: hidden;">
                    <thead style="background: #08d564;">
                        <tr>
                            <th style="color: white !important; text-align:left;">No</th>
                            <th style="color: white !important; text-align:left;">Shared With</th>
                            <th style="color: white !important; text-align:left;">Date</th>
                        </tr>
                    </thead>
                    <tbody id="drawingsharedata">

                    </tbody>
                </table>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary" style="width: 115px">
                        <span class="indicator-label">Send</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>