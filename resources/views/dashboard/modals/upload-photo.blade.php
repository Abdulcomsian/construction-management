
<div class="modal fade" id="upload_photo_id" tabindex="-1" aria-hidden="true">
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
                <form  class="form comments_details_form" action="{{route('tempwork.upload.photo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <input type="hidden" name="temp_work_id" id="temp_work_id_photo" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Upload Photo/Document</h1>
                        <!--end::Title-->
                    </div>
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span class="required">Upload Photo/Document:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-md-12">
                                <div class="d-flex inputDiv d-block">
                                    <div class="uploadDiv" style="padding-left: 10px;width:100%">
                                    <div  class="input-imagess"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <hr>
                <div id="photo_dev" >
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>