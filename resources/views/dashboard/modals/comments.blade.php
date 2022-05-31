<div class="modal fade" id="comment_modal_id" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
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
                @if(isset($scantempwork) || $scantempwork=='sharedview')
                <form id="kt_modal_new_target_form"  class="form comments_details_form comments_form" action="{{ route('temporarywork.storecomment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <input type="hidden" name="temp_work_id" id="temp_work_id" />
                    <input type="hidden" name="type" value="twc" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">TWC Comments</h1>
                        <!--end::Title-->
                    </div>
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span class="required">TWC Comments:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                                <textarea class="form-control form-control-solid mb-8" rows="4" placeholder="Enter Comment" name="comment" required>{{old('comment')}}</textarea>
                                <!--end:Input-->
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                         @if(isset($scantempwork) && $scantempwork=='scantempwork')
                         <input type="hidden" name="type" value="scan" />
                         <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span>Email:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                               <input type="email" name="mail" class="form-control" required>
                            </div>
                            <!--begin::Label-->
                        </div>
                         <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span>Status:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                               <select name="status" class="form-control">
                                   <option value="0">Good Practice</option>
                                   <option value="1">Amber</option>
                                   <option value="2">Stop Work</option>
                               </select>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span>Image:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                               <input type="file" name="image" class="form-control form-control-solid">
                                <!--end:Input-->
                            </div>
                            <!--begin::Label-->
                        </div>
                        @endif
                        <!--end::Col-->
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                @endif
                <!--end:Form-->
                <div id="commenttable">

                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>