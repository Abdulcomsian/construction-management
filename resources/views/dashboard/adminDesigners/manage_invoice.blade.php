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
</style>
@endsection
@section('content')
<div class="container">
<form method="post" action="{{route("generate_invoice")}}">
    @csrf
<div class="card-body pt-7 px-20">
                    <div class="d-flex flex-column justify-content-between mb-8 fv-row fv-plugins-icon-container">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-5 company">
                                   <h1> TAX INVOICE</h1>
                                   <p>
                                    <textarea class="form-control" name="tax_invoice" placeholder="Enter Text"></textarea>
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
                <th style="width:10%">No of Hours </th>
                <th style="width:10%"> Amount GBP</th>
                <th style="width:10%" > <button id="add-more-btn"> Add More </button> </th>
            </tr>
            <tr>
                <td style="width:100%;"> <hr style="height:5px;color:black; background-color:black;"> </td>
            </tr>
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


<div class="both d-flex justify-content-around mt-20">
<div class="payment">
<div class="row">
        <div class="font-weight-bold ms-2" style="font-size:20px"> <p>Payment Details </p> </div> 
    </div>
    <div class="row ">
        <div class="col"><label class="required fs-6 fw-bold mb-2">  Invoice Date</label></div>
        <div class="col"> <input type="date" class="form-control form-control-solid" placeholder="Date" name="date" /></div>
    </div>

    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2">  Bank</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="Bank Name" name="bank" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2">  Sort Code:</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="Sort code" name="sort_code" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2"> A/c Number:</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="A/c No" name="account_no" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2"> SWIFTBIC</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="" name="swiftbic" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2">IBAN</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="IBAN" name="iban" /></div>
    </div>


</div>




<div class="payment">
<div class="row">
        <div class="font-weight-bold ms-2" style="font-size:20px"> <p>Contact information </p> </div> 
    </div>
    <div class="row ">
        <div class="col"><label class="required fs-6 fw-bold mb-2">  Name</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="Name" name="date" /></div>
    </div>

    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2">  Email</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="Bank Name" name="bank" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2">  Phone</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="Sort code" name="sort code" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2"> Web page</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="A/c No" name="A/c No" /></div>
    </div>



</div>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success">Generate Invoice</button>
        </div>
    </div>
</div>
</form>
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

@endsection