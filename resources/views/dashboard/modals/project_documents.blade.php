<div class="modal fade" id="project_document_modal_id" tabindex="-1" aria-hidden="true">
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
                <form id="kt_modal_new_target_form" class="form project_doc_form" action="{{ route('temporarywork.store.project.document') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Attach Documents</h1>
                        <!--end::Title-->
                    </div>
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span class="required">Select Project:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                                <select name="projects"  class="form-select form-select-lg form-select-solid"  data-placeholder="Select an option" data-allow-clear="true">
                                       <option value="">Select Projects</option>
                                       @foreach($projects as $proj)
                                       <option value="{{$proj->id}}">{{$proj->name}}</option>
                                       @endforeach
                                   </select>
                                <!--end:Input-->
                            </div>
                            <!--begin::Label-->
                        </div>
                         <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span class="required">Document Type:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                                <select name="type"  class="form-select form-select-lg form-select-solid"  data-placeholder="Select an option" data-allow-clear="true">
                                       <option value="">Select Type</option>
                                       <option value="Company policy">Company policy</option>
                                       <option value="Appointment letters">Appointment letters</option>
                                       <option value="Competency check">Competency check</option>
                                       <option value="Competency certificate">Competency certificate</option>
                                        <option value="Other">Other</option>
                                   </select>
                                <!--end:Input-->
                            </div>
                            <!--begin::Label-->
                        </div>
                         <div class="col-md-12">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-4">
                                <span class="required">Document:</span>
                            </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-12 d-flex align-items-center fw-bold fs-6">
                               <input class="form-control" type="file" name="file" required="required">
                                <!--end:Input-->
                            </div>
                            <!--begin::Label-->
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

                <div id="project-documents">
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>