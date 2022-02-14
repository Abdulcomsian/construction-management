<div class="modal fade" id="tempwork_share_modal_id" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
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
                <form id="kt_modal_new_target_form" class="form project_doc_form" action="{{ route('tempwork.share') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <input type="hidden" id="sharetempid" name="tempid" value="">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Share Temporary Work</h1>
                        <!--end::Title-->
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="condition" id="flexRadioDefault1" value="current" checked>
                              <label class="form-check-label" for="flexRadioDefault1">
                               Share Current Temporary Work
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="condition" id="flexRadioDefault2" value="all">
                              <label class="form-check-label" for="flexRadioDefault2">
                                Share Full Project Temporary Work
                              </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="commentsandother"  id="flexCheckIndeterminate">
                              <label class="form-check-label" for="flexCheckIndeterminate">
                                Share Comments And Emails
                              </label>
                            </div>
                        </div>
                        <!--begin::Col-->
                        <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span class="required">Email:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                               <input type="email" class="form-control" name="useremail" placeholder="Enter User Email" required>
                                <!--end:Input-->
                            </div>
                            <!--begin::Label-->
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>