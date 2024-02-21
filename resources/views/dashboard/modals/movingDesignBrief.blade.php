<div class="modal fade" id="moving_design_brief" tabindex="-1" aria-hidden="true">
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
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-5">
                <div class="mb-13 text-center">
                    @php
                        // getting the last element of url
                        $url = url()->current();
                        $path = parse_url($url, PHP_URL_PATH);
                        $segments = explode('/', rtrim($path, '/'));
                        $lastSegment = end($segments);
                    @endphp
                    <h1>Move this Design Brief</h1>
                    <form action="{{route('change.design.status')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="temporary_work_id" id="tempWorkId" value="">
                        
                        <select class="form-control" style="margin-top: 35px !important;" name="move_design_brief">
                            <option value="">Select</option>
                            @if($lastSegment == "completed")
                                <option value="paid">Move to Paid</option>
                            @else
                                <option value="completed">Move to Completed</option>
                                <option value="paid">Move to Paid</option>
                            @endif                        
                        </select>

                        <button class="btn btn-primary mt-4" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>