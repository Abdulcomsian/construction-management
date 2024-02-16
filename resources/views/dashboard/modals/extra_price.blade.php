<div class="modal fade" id="extraPriceModal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-450px">
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
                <!--end:Form-->
                <div class="mb-13 text-center">
                        <!--begin::Title-->
                         <h3>Add Extra Price</h3>
                        <!--end::Title-->
                </div>
                <form action="{{route('store.extra.price')}}" method="post">
                    @csrf
                    <input type="hidden" name="temporary_work_id" id="temporary_work_id" value="">
                    {{-- <div class="" style="background:white;margin: 26px 4px;"> --}}
                        <div class="row">
                            <div class="pl-3 col-md-12">
                                <div class="inputDiv mt-0">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Price:</span>
                                    </label>
                                    <input type="number" name="price" class="form-control"
                                        placeholder="Enter Price"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inputDiv form-group  mt-0 d-flex" style="flex-direction: column">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Description:</span>
                                    </label>
                                    <input type="text" name="description" placeholder="Enter Description"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4" style="float: right;">Submit</button>
                            {{-- <div class="col-md-3">
                                <div class="inputDiv input-group mt-0 ">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Payment Date:</span>
                                    </label>
                                    <input type="date" name="date[]" data-date-format="DD/MM/YYYY" class="form-control fileInput"
                                        id="payment_date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex justify-content-end">
                                    <label class="d-flex align-items-center fs-6 fw-bold mt-5">
                                        <span></span>
                                    </label>
                                    <button type="button" class="btn btn-primary  queryButton add-more-price"><i
                                            class="fa fa-plus"></i>Add More</button>
                                </div>

                            </div> --}}
                        
                    {{-- </div> --}}
                </form>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>