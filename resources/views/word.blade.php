
<div class="flex-container"> 

<table>
    <tr>
        <td style="width:90%;"></td>
        <td class="img" ><img  src="images/anjez.png" alt=""/></td>
    </tr>
</table>
 


<br/>
<table>
  <tr>
        <td style="width:50%;">
            <div class="heading" style="font-weight:bold; font-size:17pt;">TAX INVOICE</div>
            <p>
CITY TEMPORARY WORKS LTD <br/>
London <br/>
EC1V 2NX <br/>
UK
            </p>
        </td>
        <td style="width:20%;">
            <div class="heading-2" style="font-weight:bold;">Invoice Date</div>
            21 Jul 2023
            <div class="heading-2" style="font-weight:bold;"> Invoice Number</div>
            CT015
            <div class="heading-2" style="font-weight:bold;"> Reference</div>
            S2023.07
        </td>

<td style="width:3%;"></td>

        <td style="width:27%;">
            <p>
STRUCTEMP LLP <br/>
106 Weston Street <br/>
London SE1 3QB <br/>
UNITED KINGDOM <br/>
VAT Number: 282 1901 12
            </p>

        </td>

  </tr>


</table>

<br/>
<br/>
<table>
    <tr>
        <th style="width:10%; font-weight:bold;">Item</th>
        <th style="width:30%; font-weight:bold;">Description</th>
        <th style="width:5%; font-weight:bold;"></th>
        <th style="width:15%; font-weight:bold;">Hours</th>
        <th style="width:15%; font-weight:bold;">No of Hours</th>
        {{-- <th style="width:10%; font-weight:bold;">VAT</th> --}}
        <th style="width:15%; font-weight:bold;">Amount GBP</th>
    </tr>
    @foreach($tableData as $key=>$value)
        <tr>
            
            <td>{{$value['item']}}</td>
            <td >
                <p>
                    {{$value['description']}}
                </p>

            </td>
            <td></td>
            <td> <p>{{$value['quantity']}}</p> </td>
            <td> <p>{{$value['unitPrice']}}</p> </td>
            <td> <p>{{$value['amountGBP']}}</p> </td>
            {{-- <td> <p>%</p> </td> --}}
        </tr>
    @endforeach
    {{-- @dd($tableData) --}}

</table>

<hr/>
<table>
        <tr>
        <td style="width:66%;"></td>
        <td style="width:19%;">
            <span>Subtotal</span>
            <p>TOTAL  VAT  20%</p>
        </td>
        <td style="width:5%;"></td>
        <td style="width:10%; margin-left:10pt;">
            <p>350.00</p>
            <p>350.00</p>
        </td>
    </tr>
</table>
<hr/>
<table>
        <tr>
        <td style="width:60%;"></td>
        <td style="width:13%; font-weight:bold">
            <p>TOTAL GBP</p>
        </td>
        <td style="width:9%;"></td>
        <td style="width:11%; font-weight:bold">
            <p>420.00</p>
        </td>
    </tr>
</table>

<br/>
<br/>
<div class="payment">
    <span style="font-weight:bold; font-size:12pt;">Due Date: 28 Jul 2023</span>
    <p>
Payment Details <br/>
Barclays Bank PLC <br/>
Sort Code: 20-89-56 <br/>
A/c Number: 23607925 <br/>
SWIFTBIC BUKBGB22 <br/>
IBAN GB11 BUKB 2089 5623 6079 25

            </p>

</div>
<br/>
<div class="contact">
    <p>
Contact information <br/>
Shiraz Dudhia <br/>
Email: shiraz.dudhia@structemp.co.uk <br/>
Phone: 07960 307039 <br/>
www.structemp.co.u
    </p>
</div>


<br/>
<br/><br/>




<!-- <footer>
    <p style="font-size:8pt;"> Company Registration No: OC418834.  Registered Office: 412 Katherine Road, LONDON, E7 8NP, United Kingdom.</p>
</footer> -->
</div>

