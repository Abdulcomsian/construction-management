@extends('layouts.dashboard.master',['title' => 'Admin Designer List'])
@section('styles')

<style>
    .company p{
            font-size:15px;
    }
    .address p{
        font-size:15px
    }
    td P{
        font-size:15px
    }
    .font-weight-bold {
        font-weight:bold;
    }
    .payment{
        width:35%;
    }
    .add-more {
        border-radius: 8px;
        background-color: #07d564;
        width: 100px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
        margin-right: 0px;
        border:none;
        font-weight:bold;
    }

    .aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60px !important;
    }

    .content {
        padding-top: 0px !important;
        background-color: #e9edf1 !important;
    }

    .newDesignBtn {
        border-radius: 8px;
        background-color: #07d564;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
        margin-right: 0px;
    }

    /*.newDesignBtn:hover {*/
    /*    color: rgba(222, 13, 13, 0.66);*/
    /*}*/

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;

    }

    .card {
        margin: 30px 0px;
        border-radius: 10px;
    }

    .toolbar-fixed .toolbar {
        background-color: transparent !important;
        border: none !important;
    }

    .card-title h2 {
        color: rgba(254, 242, 242, 0.66);
    }

    table tbody td {
        text-align: center;
    }

    table thead {
        background-color: #f5f8fa;
    }

    table thead th {
        color: #000 !important;
        text-align: center;
        /*transform: rotate(-60deg);*/
        border-bottom: 0px !important;
        vertical-align: middle;
        font-size: 12px !important;
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        /* background-color: #f2f2f2; */
    }

    .card>.card-header {
        align-items: center;
    }

    .dataTables_filter input {
        border-radius: 8px;
    }

    thead tr {
        height: 6px !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #07d564 !important;
    }

    table thead th {
        padding: 3px 18px 3px 10px;
        border-bottom: 0;
        color: #ff0000;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        * cursor: hand;
    }

    table td {
        padding: 3px 10px;
        color: #000000;
        font-size: 12px;
        font-weight: normal;
    }

    table td .d-flex {
        justify-content: center;
    }

    .btn.btn-active-color-primary:hover:not(.btn-active),
    .btn.btn-active-color-primary:hover:not(.btn-active) i {
        color: #07d564;
    }

    .modal .btn.btn-primary {
        border-color: #07d564 !important;
        background-color: #07d564 !important;
    }

    #modal1 th {
    text-align: center!important;
    }
    .circle.unblink{
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(92, 92, 92);
        margin: auto;
    }

    .circle.blink {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(30, 255, 0);
        animation: blink 1s infinite;
        margin: auto;
        cursor: pointer;
    }

    .circle.danger-blink {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(255, 30, 0);
        animation: blink 1s infinite;
        margin: auto;
        cursor: pointer;
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    } 

</style>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="" id="kt_toolbar">
        <div class="post d-flex flex-column-fluid" id="kt_post"  style="">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <form method="post" action="{{route("save_invoice")}}">
                    @csrf
                        <div class="card">
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <div class="card-title" style="    float: left;padding-top: 0px;">
                                    Add New Invoice</h2>
                                </div>
                            </div>
                            <div class="card-body pt-7 px-20">
                                    <div class="d-flex flex-column justify-content-between mb-8 fv-row fv-plugins-icon-container">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-5 company">
                                                <!-- <h2> Invoice #: AH---1</h2>
                                                <h2> Sender's Email: input field with type email</h2>
                                                <h2> Date of Payment: Input field with date</h2>
                                                <h2> Tax Invoice</h2> -->
                                                <p>
                                            
                                                <div class =" row d-flex mb-2">
                                                    <div class = "col-md-4"> <label class="required fs-6 fw-bold">  Invoice#</label></div>
                                                    <div class = "col-md-8"><input type = "text" name = "invoice_number" class="form-control form-control-solid" placeholder = "Invoice Number" value = "{{$invoice_number}}" readonly></div>
                                                </div>
                                                <div class =" row d-flex mb-2">
                                                    <div class = "col-md-4"> <label class="required fs-6 fw-bold">  Sender Email</label></div>
                                                    <div class = "col-md-8"><input type = "text" name = "send_email" class="form-control form-control-solid" placeholder = "Sender Email" required></div>
                                                </div>
                                                <div class =" row d-flex mb-2">
                                                    <div class = "col-md-5"> <label class="required fs-6 fw-bold">  Date of Payment</label></div>
                                                    <div class = "col-md-7"><input type = "date" name = "date_of_payment" class="form-control form-control-solid" required></div>
                                                </div>
                                                <div class =" row d-block">
                                                    <textarea class="form-control" name="tax_invoice" placeholder="Enter Text"></textarea>
                                                </div>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="required fs-6 fw-bold mb-2">  Invoice Date</label>
                                                <input type="date" name="date" class="form-control form-control-solid" placeholder="Enter Date" name="date" />
                                                <label class="required fs-6 fw-bold mb-2">  Invoice Number</label>
                                                <input type="text" name="number" class="form-control form-control-solid" placeholder="Enter Invoice Number" name="invoice-number" />
                                                <label class="required fs-6 fw-bold mb-2">  Reference</label>
                                                <input type="text" name="reference" class="form-control form-control-solid" placeholder="Enter Reference" name="reference" />
                                            </div>

                                                <div class="col-md-3 address">
                                                    <p>
                                                    STRUCTEMP LLP <br>
                                                    106 Weston Street <br>
                                                    London SE1 3QB <br>
                                                    UNITED KINGDOM <br>
                                                    VAT Number: 282 1901 12
                                                    </p>
                                                </div>
                                
                                        </div>
                                        <table id="item-table" class="mt-20 d-flex flex-column">
                                            <tr class="d-flex justify-content-between">
                                                <th style="width:10%"> Item </th>
                                                <th style="width:25%">Description</th>
                                                <th style="width:15%"> Hours</th>
                                                <th style="width:10%">GBP per Hour </th>
                                                <th style="width:10%"> Amount GBP</th>
                                                <th style="width:10%" > <button class="btn btn-sm btn-success" id="add-more-btn"> Add More </button> </th>
                                            </tr>
                                            {{-- <tr>
                                                <td style="width:100%;"> <hr style="height:5px;color:black; background-color:black;"> </td>
                                            </tr> --}}
                                            <tr class="d-flex justify-content-between">
                                                <td style="width:10%"><input type="text" class="form-control form-control-solid item" placeholder="Item" name="item[]" /> </td>
                                                <td style="width:25%"><textarea class="form-control description" id="exampleFormControlTextarea1" rows="3" name="description[]"></textarea> </td>
                                                <td style="width:15%"><input type="number" class="form-control form-control-solid quantity" placeholder="Quantity" name="quantity[]" /></td>
                                                <td style="width:10%"><input type="number" class="form-control form-control-solid price" placeholder="Price" name="price[]" /></td>
                                                <td style="width:10%"> <input type="number" class="form-control form-control-solid amount" placeholder="Amount GBP" name="amount[]" /></td>
                                                <td style="width:10%"> </td>
                                            </tr>
                                        </table>
                                        <table class="mt-20 d-flex flex-column">
                                                                        
                                            <tr class="d-flex justify-content-between mt-10">
                                                <td style="width:10%"> </td>
                                                <td style="width:25%"></td>
                                                <td style="width:15%"> </td>
                                                <td style="width:10%"> </td>
                                                <td class="text-left" style="width:10%"> <p>Subtotal</p> </td>
                                                <td style="width:10%">  <input type="number" class="form-control form-control-solid" id="subtotal-input" placeholder="" name="subtotal" /> </td>
                                                <td style="width:10%"> </td>
                                            </tr>
                                            
                                            <tr class="d-flex justify-content-between mt-10">
                                                <td style="width:10%"> </td>
                                                <td style="width:25%"></td>
                                                <td style="width:15%"> </td>
                                                <td style="width:10%"> </td>
                                                <td class="text-left" style="width:14%"> <p>TOTAL VAT 20% </p> </td>
                                                <td style="width:10%">  <input type="number" class="form-control form-control-solid" id="total-vat-input" placeholder="" name="totalvat" /> </td>
                                                <td style="width:11%"> </td>
                                            </tr>
                                            
                                            <tr class="d-flex justify-content-between mt-10">
                                                <td style="width:10%"> </td>
                                                <td style="width:25%"></td>
                                                <td style="width:15%"> </td>
                                                <td style="width:10%"> </td>
                                                <td class="text-left " style="width:11%"> <p class="font-weight-bold">TOTAL GBP </p> </td>
                                                <td style="width:10%">  <input type="number" class="form-control form-control-solid font-weight-bold" id="total-gbp-input" placeholder="" name="total_gbp" /> </td>
                                                <td style="width:10%"> </td>
                                            </tr>
                                            
                                        </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-success">Generate Invoice</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </form>
            </div>
        </div>
    </div>
</div>




@endsection
@section('scripts')
<script>
$(document).ready(function() {
    // Handle click event of "Add More" button
    $("#add-more-btn").on("click", function(e) {
        e.preventDefault()
        var newRow = `
            <tr class="d-flex justify-content-between">
                <td style="width:10%"><input type="text" class="form-control form-control-solid item" placeholder="Item" name="item[]" /> </td>
                <td style="width:25%"><textarea name="description[]" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> </td>
                <td style="width:15%"><input type="number" class="form-control form-control-solid quantity" placeholder="Quantity" name="quantity[]" /></td>
                <td style="width:10%"><input type="number" class="form-control form-control-solid price" placeholder="Price" name="price[]" /></td>
                <td style="width:10%"> <input type="number" class="form-control form-control-solid amount" placeholder="Amount GBP" name="amount[]" /></td>
                <td style="width:10%"> </td>
            </tr>
        `;

        // Append the new row to the table
        $("#item-table").append(newRow);
    });
    // Calculate the "Amount GBP" based on "Quantity" and "Unit Price" inputs
    function calculateAmountGBP() {
        var quantity = parseFloat($(this).closest("tr").find(".quantity").val());
        var unitPrice = parseFloat($(this).closest("tr").find(".price").val());
        console.log(quantity,unitPrice)
        if (!isNaN(quantity) && !isNaN(unitPrice)) {
            var amountGBP = (quantity * unitPrice).toFixed(2);
            $(this).closest("tr").find(".amount").val(amountGBP);
        }
        calculateTotals();
    }
    // Calculate the Subtotal and Total GBP
    function calculateTotals() {
            var subTotal = 0;
            var totalGBP = 0;

            $(".price").each(function() {
                var unitPrice = parseFloat($(this).val());
                if (!isNaN(unitPrice)) {
                    subTotal += unitPrice;
                }
            });

            $(".amount").each(function() {
                var amountGBP = parseFloat($(this).val());
                if (!isNaN(amountGBP)) {
                    totalGBP += amountGBP;
                }
            });

            // Update the input fields
            $("#subtotal-input").val(subTotal.toFixed(2));
            $("#total-gbp-input").val(totalGBP.toFixed(2));
            $("#total-vat-input").val((0.2 * totalGBP).toFixed(2)); // Assuming 20% VAT
        }
        // Listen to changes in the "Quantity" and "Unit Price" fields
        $(document).on("input", ".quantity, .price", calculateAmountGBP);
    });

</script>
<script>
        // Function to check if the download is complete
        function isDownloadComplete() {
            return document.cookie.indexOf('downloadComplete=true') !== -1;
        }

        // Function to set a cookie
        function setCookie(name, value, days) {
            const expires = new Date();
            expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
        }

        // Trigger the file download by navigating to the download-and-redirect route

        // Check for the custom header to indicate the download is complete
        setTimeout(function() {
            if (isDownloadComplete()) {
                // Set a cookie to indicate the download is complete
                setCookie('downloadComplete', 'true', 1); // Adjust the expiration time if needed

                // Redirect to another page after a certain delay
                setTimeout(function() {
                    window.location.href = '{{ route("invoices") }}';
                }, 5000); // Adjust the delay (5 seconds in this example)
            }
        }, 1000); // Check every second for the header, adjust as needed
    </script>
@endsection