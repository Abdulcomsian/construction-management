<div class="modal fade" id="permit_modal_id" tabindex="-1" aria-hidden="true">
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
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3" id="permitheading">Permit To Load</h1>
                    <!--end::Title-->
                </div>
                @if(!isset($scantempwork))
                <div class=" text-center" id="permitloadbutton">
                    <form method="get" action="{{route('scaffolding.load')}}" style="display:inline-block;margin-right:20px;">
                        <input type="hidden" class="temp_work_id" name="temp_work_id" />
                        <button type="submit" class="btn btn-primary">New Scaffolding Permit</button>
                    </form>
                    <form method="get" action="{{route('permit.load')}}" style="display:inline-block;">
                        <input type="hidden" class="temp_work_id" name="temp_work_id" />
                        <button type="submit" class="btn btn-primary" id="permiturl">New Permit</button>
                    </form>
                </div>
                @endif
                <div class="d-flex text-center">
                    <table class="table table-hover">
                        <thead style="height: 60px;">
                            <tr style="background: #f5f8fa;color:#000;">
                                <td><b>Pdf Link</b></td>
                                <td><b>Permit No</b></td>
                                <td><b>Date</b></td>
                                <td><b>Type</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody id="permitbody"></tbody>
                    </table>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>