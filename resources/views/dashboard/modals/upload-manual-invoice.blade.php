
<div class="modal fade" id="uploadInvoiceModal" tabindex="-1" aria-hidden="true">
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
                <form action="{{route("save.manual.invoice")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="temporary_work_id" value = "{{$_GET['tempwork_id'] ?? ''}}">
                    <div class="row mt-3">
                        <div class = "col-md-6"> 
                            <label class="required fs-6 fw-bold">Invoice #</label>
                            <input type = "text" name = "invoice_number" class="form-control form-control-solid" placeholder = "Invoice Number" required>
                        </div>
                        <div class = "col-md-6"> 
                            <label class="required fs-6 fw-bold">Receiver's Email</label>
                            <input type = "text" name = "send_email" class="form-control form-control-solid" value="{{isset($userData['client_email']) ? $userData['client_email'] : ''}}" placeholder = "Sender Email" required>
                            @error('send_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="required fs-6 fw-bold">Date of Payment</label>
                            <input type = "date" name = "date_of_payment" class="form-control form-control-solid" required>
                            @error('date_of_payment')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="required fs-6 fw-bold mb-2">  Invoice Date</label>
                            <input type="date" name="date" class="form-control form-control-solid" placeholder="Enter Date" name="date" required/>
                                @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="attachfile" class="required fs-6 fw-bold mb-2">Upload Manual Invoice</label>
                            <input type="file" name="attachfile" class="form-control" id="attachfile" accept="all" required>
                        </div>
                        <div class="col-md-6">
                            <label for="payment_status" class="fs-6 fw-bold mb-2">Payment Status</label>
                            <select name="payment_status" class="form-control" id="paymentStatus" required>
                                <option value="">Choose Status</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4" style="float: right;">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>