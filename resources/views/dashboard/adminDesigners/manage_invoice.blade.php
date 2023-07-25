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


<div class="card-body pt-7 px-20">
                    <form method="post">
                    <div class="d-flex flex-column justify-content-between mb-8 fv-row fv-plugins-icon-container">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-5 company">
                                   <h1> TAX INVOICE</h1>
                                   <p>CITY TEMPORARY WORKS LTD <br>
                                        London <br>
                                        EC1V 2NX <br>
                                        UK</p>
                                </div>
                                <div class="col-md-3">
                                    <label class="required fs-6 fw-bold mb-2">  Invoice Date</label>
                                    <input type="date" class="form-control form-control-solid" placeholder="Enter Date" name="date" />
                                    <label class="required fs-6 fw-bold mb-2">  Invoice Number</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Invoice Number" name="invoice-number" />
                                    <label class="required fs-6 fw-bold mb-2">  Reference</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Reference" name="reference" />
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

<table class="mt-20 d-flex flex-column">
    <tr class="d-flex justify-content-between">
        <th style="width:10%"> Item </th>
        <th style="width:25%">Description</th>
        <th style="width:15%"> Quantity</th>
        <th style="width:10%">Unit Price </th>
        <th style="width:10%">VAT  </th>
        <th style="width:10%"> Amount GBP</th>
        <th style="width:10%" > <button class="add-more"> Add More </button> </th>

    </tr>
<tr>
    <td style="width:100%;"> <hr style="height:5px;color:black; background-color:black;"> </td>
</tr>
    <tr class="d-flex justify-content-between">
        <td style="width:10%">  <input type="text" class="form-control form-control-solid" placeholder="Item" name="item" /> </td>
        <td style="width:25%">   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> </td>
        <td style="width:15%"><input type="text" class="form-control form-control-solid" placeholder="Quantity" name="item" /></td>
        <td style="width:10%"><input type="text" class="form-control form-control-solid" placeholder="Price" name="item" /></td>
        <td style="width:10%"><input type="text" class="form-control form-control-solid" placeholder="VAT" name="item" /> </td>
        <td style="width:10%"> <input type="text" class="form-control form-control-solid" placeholder="Amount GBP" name="item" /></td>
        <td style="width:10%"> </td>
    </tr>

    <tr class="d-flex justify-content-between mt-10">
    <td style="width:10%"> </td>
        <td style="width:25%"></td>
        <td style="width:15%"> </td>
        <td style="width:10%"> </td>
        <td class="text-left" style="width:10%"> <p>Subtotal</p> </td>
        <td style="width:10%">  <input type="text" class="form-control form-control-solid" placeholder="" name="item" /> </td>
        <td style="width:10%"> </td>
    </tr>

    <tr class="d-flex justify-content-between mt-10">
    <td style="width:10%"> </td>
        <td style="width:25%"></td>
        <td style="width:15%"> </td>
        <td style="width:10%"> </td>
        <td class="text-left" style="width:14%"> <p>TOTAL  VAT  20% </p> </td>
        <td style="width:10%">  <input type="text" class="form-control form-control-solid" placeholder="" name="item" /> </td>
        <td style="width:11%"> </td>
    </tr>

    <tr class="d-flex justify-content-between mt-10">
    <td style="width:10%"> </td>
        <td style="width:25%"></td>
        <td style="width:15%"> </td>
        <td style="width:10%"> </td>
        <td class="text-left " style="width:11%"> <p class="font-weight-bold">TOTAL GBP </p> </td>
        <td style="width:10%">  <input type="text" class="form-control form-control-solid font-weight-bold" placeholder="" name="item" /> </td>
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
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="Sort code" name="sort code" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2"> A/c Number:</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="A/c No" name="A/c No" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2"> SWIFTBIC</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="" name="" /></div>
    </div>
    <div class="row mt-2">
        <div class="col"><label class="required fs-6 fw-bold mb-2">IBAN</label></div>
        <div class="col"> <input type="text" class="form-control form-control-solid" placeholder="IBAN" name="bank" /></div>
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

                    </form>
                </div>





@endsection