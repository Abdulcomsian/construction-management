<div class="modal fade" id="upload_file_id" tabindex="-1" aria-hidden="true">
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
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" style="padding-top:50px !important">
                <!--begin:Form-->
                
               {{-- <form id="dropzoneForm" method="post" class="dropzone" action="{{route('tempwork.upload')}}"  enctype="multipart/form-data"> --}}
                <form  method="post" action="{{route('tempwork.upload')}}" id="dform"  enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="d-none rams_file" name="file">
                    <input class="d-none form-control mb-2" style="width: 85% !important;" type="text" name="rams_no" id="rams_no" placeholder="Enter Rams No">
                    <input class="form-control mb-2" style="width: 85% !important;" type="text" name="rams_name" id="rams_name" placeholder="Enter Name">
                    <input class="form-control mb-2" style="width: 85% !important;" type="text" name="rams_design_checker" id="rams_design_checker" placeholder="Enter Design Checker Name">
                    <input class="form-control mb-2" style="width: 85% !important;" type="date" name="rams_date" id="rams_date" placeholder="Enter date">
                    <input type="hidden" name="tempworkid" id="tempworkid">
                    <input type="hidden" name="type" id="type">
                    <div style="width: 85% !important; height: 180px; position: relative;" class="rams_file dropzone" id="rams_file"></div>
                    <button class="btn text-white my-2" style="background: #02b654!important" type="submit">Submit</button>
               </form>
                <!--end:Form-->
                <div id="uploadfiles_popup">
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
