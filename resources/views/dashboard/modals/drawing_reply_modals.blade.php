<div class="modal fade" id="reply_drawing_modal_id" tabindex="-1" aria-hidden="true">
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
                <form id="kt_modal_new_target_form" class="form company_details_form" action="{{ route('twcdrawing.comment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="drawingid" id="replydrwingid" />
                   
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mb-13 text-center">
                      
                        <h1 class="mb-3">Add Comment</h1>
                       
                    </div>
                   

                    <div class="row g-9 mb-8">
                      
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Comment:</label>
                            <textarea class="form-control form-control-solid" name="commment" required></textarea>
                        </div>
                       
                        
                    </div>
                  
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                   
                </form>
                <!--end:Form-->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>comments</th>
                            <th>Reply</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="drawingreplydata">
                        
                    </tbody>
                </table>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>