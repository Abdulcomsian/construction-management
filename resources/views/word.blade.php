
<div class="flex-container"> 

    <table>
        <tr>
            <td style="width:90%;"></td>
        </tr>
    </table>
     
    
    
    <br/>
    <table>
        @php
        if(isset($data['date_of_payment']))
            $date_of_payment = date('d-m-Y', strtotime($data['date_of_payment']));
        else {
            $date_of_payment = '';
        }
        if(isset($data['date']))
            $invoice_date = date('d-m-Y', strtotime($data['date']));
        else {
            $invoice_date = '';
        }
        @endphp
      <tr>
            <td style="width:50%;">
                <div class="heading-2" style="font-weight:bold;">Invoice No</div>{{ $data['invoice_number'] ?? '' }}
                <div class="heading-2" style="font-weight:bold;">Email:</div>{{$data['sender_email'] ?? ''}}
                <div class="heading-2" style="font-weight:bold;">Date of Payment:</div>{{$date_of_payment ?? ''}}
                <div class="heading-2" style="font-weight:bold;">Payment Status:</div>{{$data['payment_status'] ?? ''}}
                {{-- <div class="heading" style="font-weight:bold; font-size:17pt;">TAX INVOICE</div> --}}
                <p>
                  {{-- {{$data['tax_invoice'] ?? ''}} --}}
                </p>
            </td>
            <td style="width:20%;">
                <div class="heading-2" style="font-weight:bold;">Invoice Date</div>
                {{$invoice_date ?? ''}}
                <div class="heading-2" style="font-weight:bold;"> Invoice Number</div>
                {{$data['number'] ?? ''}}
                <div class="heading-2" style="font-weight:bold;"> Reference</div>
                {{$data['reference'] ?? ''}}
            </td>
    
    <td style="width:3%;"></td>
    
            <td style="width:27%;">
                <p>
                    {{$user->companyProfile->company_address ?? ''}}
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
            <th style="width:15%; font-weight:bold;">GBP per Hour</th>
            {{-- <th style="width:10%; font-weight:bold;">VAT</th> --}}
            <th style="width:15%; font-weight:bold;">Amount GBP</th>
        </tr>
        @foreach($tableData as $key=>$value)
            <tr>
                
                <td>{{$value['item'] ?? ''}}</td>
                <td >
                    <p>
                        {{$value['description'] ?? ''}}
                    </p>
    
                </td>
                <td></td>
                <td> <p>{{$value['quantity'] ?? ''}}</p> </td>
                <td> <p>{{$value['unitPrice'] ?? ''}}</p> </td>
                <td> <p>{{$value['amountGBP'] ?? ''}}</p> </td>
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
                <p>{{$data['subtotal']}}</p>
                <p>{{$data['totalvat']}}</p>
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
                <p>{{$data['total_gbp'] ?? ''}}</p>
            </td>
        </tr>
    </table>
    
    <br/>
    <br/>
    <div class="payment">
        <span style="font-weight:bold; font-size:12pt;">Due Date: {{$data['date'] ?? ''}}</span>
        <p>
    Payment Details <br/>
    {{$user->paymentDetail->bank ?? ''}} <br/>
    Sort Code:  {{$user->paymentDetail->sort_code ?? ''}} <br/>
    A/c Number:  {{$user->paymentDetail->account_number ?? ''}} <br/>
    SWIFTBIC:  {{$user->paymentDetail->swiftbic ?? ''}} <br/>
    IBAN: {{$user->paymentDetail->iban ?? ''}}
    
                </p>
    
    </div>
    <br/>
    <div class="contact">
        <p>
    Contact information <br/>
    Name: {{$user->companyProfile->company_name ?? ''}} <br/>
    Email: {{$user->companyProfile->company_email ?? ''}} <br/>
    Phone: {{$user->companyProfile->phone ?? ''}} <br/>
    {{$user->companyProfile->website ?? ''}}
        </p>
    </div>
    
    
    <br/>
    <br/><br/>
    
    
    
    
    <!-- <footer>
        <p style="font-size:8pt;"> Company Registration No: OC418834.  Registered Office: 412 Katherine Road, LONDON, E7 8NP, United Kingdom.</p>
    </footer> -->
    </div>
    
    