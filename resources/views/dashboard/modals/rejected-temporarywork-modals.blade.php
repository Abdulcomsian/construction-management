<div class="modal fade" id="rejected_designbrief_modal_id" tabindex="-1" aria-hidden="true">
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
                <div style="display: flex">
                <h3 style="width: 50%">Design Breif Number: <strong id="design-brief" class="text-danger"></strong></h3>
                <h3 style="width: 30%;color:red;background: #c4c0c0;padding:10px"><span id="rejectstatus"></span></h3>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email sent for acceptance</th>
                            <th>Acceptance/Reject-notes</th>
                            <th>Design Brief Updated </th>
                            <!-- <th>Rejectd By</th>
                            <th>Date</th>  -->
                            <th>Actions</th>
                        </tr>
                    </thead>
               
                <tbody id="rejected-designbrief-body">
                    
                </tbody>
                 </table>
                
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>