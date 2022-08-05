<div class="modal fade" id="nomination_comment_modal_id" tabindex="-1" aria-hidden="true">
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
                    <form id="desingform" action="{{url('nomination-chagnestatus')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nominationid" id="nominationid">
                        <input type="hidden" name="userid" id="userid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Comments</span>

                                            </label>
                                            <!--end::Label-->
                                            <textarea class="form-control" id="comments" name="comments" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputDiv requiredDiv">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2" style="width: 14%">
                                                <span class="required">Accept:</span>

                                            </label>
                                            <!--begin::Radio group-->
                                            <div class="nav-group nav-group-fluid">
                                                <label>
                                                    <input type="radio" datacheck1='yes' class="btn-check" name="status" value="1" checked />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" datacheck1='no' class="btn-check" name="status" value="2" />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Nomination Comments</h1>
                        <!--end::Title-->

                        <table>
                            <thead>
                                <tr>
                                    <th>S-No</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Type</th>
                                    <th>Send Date</th>
                                    <th>Read Date</th>
                                </tr>
                            </thead>
                            <tbody id="nomination_result">
                                
                            </tbody>
                        </table>
                    </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>