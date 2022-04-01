<div class="modal fade" id="drawinganddesign" tabindex="-1" aria-hidden="true">
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
                @if(isset($scantempwork) && $scantempwork=='')
                <form id="kt_modal_new_target_form"  class="form comments_details_form comments_form" action="{{route('designer.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                         <input type="hidden" id="desing_tempworkid" name="tempworkid" value="">
                        <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Upload Design & Drawings</h1>
                        <!--end::Title-->
                        </div>
                             <div class="row">
                                 <div class="col-md-12">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Number:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input  type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_number" name="drawing_number"  value="{{old('drawing_number')}}" required="required">
                                        </div>
                                 </div>
                               
                             </div>
                             <br>
                             <div class="row">
                                 <div class="col-md-12">
                                    <div class="d-flex inputDiv d-block">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Comments:</span>

                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control" id="comments" name="comments" required="required"></textarea>
                                    </div>
                                 </div>
                             </div>
                             <br>
                             <div class="row">
                                   <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">TWD Name:</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="TWD Name" id="twd_name" name="twd_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Title:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Drawing title" id="drawing_title" name="drawing_title" value="{{old('drawing_title')}}"  required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                     <div class="col-md-6">
                                         <div class="d-flex inputDiv requiredDiv">
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Preliminary/ For approval</span>

                                            </label>
                                            <!--begin::Radio group-->
                                             <div class="nav-group nav-group-fluid">
                                                <label>
                                                    <input type="radio" datacheck1='yes' class="btn-check" name="preliminary_approval" value="1" checked />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" datacheck1='no' class="btn-check" name="preliminary_approval" value="2" />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                </label>
                                            </div>
                                         </div>
                                     </div>
                                   <div class="col-md-6">
                                         <div class="d-flex inputDiv requiredDiv">
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">For construction</span>

                                            </label>
                                            <!--begin::Radio group-->
                                             <div class="nav-group nav-group-fluid">
                                                <label>
                                                    <input type="radio" datacheck='yes' class="btn-check" name="construction" value="1"  />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" datacheck='no' class="btn-check" name="construction" value="2" checked />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                </label>
                                            </div>
                                     </div>
                                   </div>
                               </div>
                               <br>
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex inputDiv d-block">
                                            <div class="uploadDiv" style="padding-left: 10px;width:100%">
                                            <div id="myimage" class="input-images"></div>
                                        </div>
                                            <!--begin::Label-->
                                            <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing:</span>

                                            </label> -->
                                            <!--end::Label-->
                                            <!-- <input type="file" class="form-control form-control-solid"  id="file" name="file"  style="background: #f5f8fa" required> -->
                                        </div>
                                    </div>
                                </div>
                               <br>
                                 <button  type="submit" class="btn btn-primary float-end">Submit</button>
                                  <br>
                           
                </form>
                <br>
                @endif
               
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>