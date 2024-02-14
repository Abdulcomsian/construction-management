<table class="table drawing_infoTable" style="border-collapse: collapse;background: none;">
<thead>
    <tr>
        <th>Price</th>
        <th>Description</th>
        <th>Submition Date</th>
    </tr>
</thead>
<tbody>
    @if($temporary_work['work_status'] == 'publish')
    <h5>Pricing Approved</h5>
    @endif
    @foreach($temporary_work->designerQuote as $item)
    <tr style="background: {{$background ?? ''}}  !important">
        <td>£{{$item->price}}</td>
        <td>{{$item->description}}</td>
        <td>{{date("d-m-Y", strtotime($item->date))}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@if($temporary_work['work_status'] == 'draft')
<form method="post" action="{{route("approve_pricing")}}"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="temporary_work_id" value="{{$temporary_work['id']}}"/>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="padding-left: 10px">
                <input type="radio" name="payment" value="approve" checked>
                <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">I accept payment terms and design brief</span>
                <a target="_blank" href="{{ asset('estimatorPdf/'.$temporary_work['ped_url']) }}" style="float: right;">Download Design Brief</a>
            </div>
            <div class="form-group" style="padding-left: 10px">
                <input type="radio" name="payment" value="reject">
                <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">I reject payment terms and design brief</span>
            </div>
        </div>
    </div>
    <div class="row mb-md-3" id="payment_note" style="display:none">
        <div class="col-md-12">
            <div class="form-group">
                <textarea class="form-control" name="payment_note" rows="5" placeholder="Enter note"></textarea>
            </div>
        </div>
    </div>
    <div class="row" id="signature_div">
        <div class="col-md-8">
        <div class="d-flex flex-column inputDiv mb-1" style="border: none">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2"
        style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
        <span class="signatureTitle">Signature Type:</span>
        </label>
        <!--end::Label-->
        <div class="d-flex">
        <div style="display:flex; align-items: center; padding-left:10px">
        <input type="radio" class="checkbox-field" id="DrawCheck" checked=true
            style="width: 12px;">
        <input type="hidden" id="Drawtype" name=""
            class="form-control form-control-solid" value="1">
        <span
            style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
        </div>
        <div style="display:flex; align-items: center; padding-left:10px">
        <input type="radio" class="" id="flexCheckChecked" style="width: 12px;">
        <input type="hidden" id="signtype" name="signtype"
            class="form-control form-control-solid" value="2">
        <span
            style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Name</span>
        </div>
        &nbsp;
        <!--end::Label-->
        <div style="display:flex; align-items: center; padding-left:10px">
        <input type="radio" class="" id="pdfChecked" style="width: 12px;">
        <input type="hidden" id="pdfsign" name="pdfsigntype"
            class="form-control form-control-solid" value="0">
        <span
            style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2; min-width: fit-content; white-space: nowrap">PNG/JPG
            Upload </span>
        </div>
        </div>
    
        </div>
        <div class="d-flex inputDiv my-0" id="sign" style="align-items: center;border:none">
        <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
        <span class="required">Signature:</span>
        </label>
        <br/> -->
        <canvas id="sig" onblure="draw()"
        style="background: lightgray; border-radius:10px"></canvas>
        <br />
        <textarea id="signature" name="signed" style="display: none"></textarea>
        <span id="clear" class="fa fa-undo cursor-pointer"
        style="line-height: 6; position:relative; top:51px; right:26px"></span>
        </div>
        <div class="inputDiv d-none" id="pdfsign">
        <label class="fs-6 fw-bold mb-2" style="width: fit-content">
        <span class="required">Upload Signature: Allowed format (PNG, JPG)</span>
        </label>
        <input type="file" name="pdfphoto" class="form-control" accept="image/*">
        </div>
    
        <div class="d-flex inputDiv" id="namesign" style="display: none !important">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
        <span class="required">Name Signature:</span>
        </label>
        <input type="text" name="namesign" class="form-control form-control-solid">
        </div>
        <span id="sigimage" class="text-danger" style="font-size: 15px">Signature Not
        Added</span>
        </div>
        <div class="col-md-4">
       
        </div>
    
    </div>
    <button id="submitbutton" type="submit" class="btn btn-secondary float-end submitbutton"
    disabled
    style="  top: 77% !important; left: 0;  padding: 10px 50px;font-size: 20px;font-weight: bold;">Submit</button>

    {{-- @endif --}}
</form>
@endif

<script>
    var canvas = document.getElementById("sig");
        var signaturePad = new SignaturePad(canvas);

        signaturePad.addEventListener("endStroke", () => {
            $("#signature").val(signaturePad.toDataURL('image/png'));
            $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
            $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            // $('#submitbutton')
            });
            $('#clear').click(function(e) {
                e.preventDefault();
                signaturePad.clear();
                $("#signature").val('');
                    $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
                    $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary").addAttr("disabled");
            });


        $('input[name="preliminary_approval"]').on('click', function() {
        var val = $(this).val();
        if (val == 1) {
            $("[datacheck='no']").prop('checked', true);
            $("[datacheck='yes']").prop('checked', false);
        } else {
            $("[datacheck='no']").prop('checked', false);
            $("[datacheck='yes']").prop('checked', true);
        }
    })

    $('input[name="construction"]').on('click', function() {
        var val = $(this).val();
        console.log(val);
        if (val == 1) {
            $("[datacheck1='no']").prop('checked', true);
            $("[datacheck1='yes']").prop('checked', false);
        } else {
            $("[datacheck1='no']").prop('checked', false);
            $("[datacheck1='yes']").prop('checked', true);
        }
    })

    $('input[name="status"]').on('click', function() {
        var val = $(this).val();
        if (val == 1) {
          $("#drawingno-addon").text("P");   
        } else {
            $("#drawingno-addon").text("C");
        }
    })

    $("#DrawCheck").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#flexCheckChecked").prop('checked',false);
            $("#signtype").val(0);
             $("#pdfsign").val(0);
             $("#Drawtype").val(1);
            // $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            // $("#pdfsign").removeClass('d-flex').addClass("d-none");
            // $(".customSubmitButton").removeClass("hideBtn");
            // $(".customSubmitButton").addClass("showBtn");
            //  $("input[name='pdfsign']").removeAttr('required');
            // $("input[name='namesign']").attr('required','required');
            $("#clear").show();
            $("div#pdfsign").removeClass('d-flex').addClass("d-none");
            $("div#namesign").removeClass('d-flex').addClass("d-none");
            $("#sign").css('display','flex');
            $('#sigimage').removeClass('d-none')
           
        }
        // else{
        //     $("#signtype").val(2);
        //     $("#sign").addClass('d-flex').show();
        //     $("#namesign").removeClass('d-flex').hide();
        //     $("input[name='namesign']").removeAttr('required');
        //     $("#clear").show();
        //     $(".customSubmitButton").addClass("hideBtn");
        //     $(".customSubmitButton").removeClass("showBtn");
        // }
    })
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#DrawCheck").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
             $("#Drawtype").val(0);
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
            $(".customSubmitButton").removeClass("hideBtn");
            $(".customSubmitButton").addClass("showBtn");
             $("input[name='pdfsign']").removeAttr('required');
            $("input[name='namesign']").attr('required','required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
            $('#sigimage').addClass('d-none');
            $('#submitbutton').removeAttr("disabled");
           
        }
        else{
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").show();
            $(".customSubmitButton").addClass("hideBtn");
            $(".customSubmitButton").removeClass("showBtn");
            $('#submitbutton').addAttr("disabled");
        }
    })

    $("#pdfChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#flexCheckChecked").prop('checked',false);
            $("#DrawCheck").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("#Drawtype").val(0);
            $("input[name='pdfsign']").attr('required','required');
            $("div#pdfsign").removeClass('d-none').addClass('d-flex');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
            $('#sigimage').addClass('d-none');
            $('#submitbutton').removeAttr("disabled");
           
        }
        else{
            $("#pdfsign").val(0);
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("input[name='pdfsign']").removeAttr('required');
            $("#clear").show();
            $('#submitbutton').addAttr("disabled");
             
        }
    });

    $('input[name="payment"]').on('change', function() {
        if ($(this).val() === 'approve') {
            $('#signature_div').show();
            $('#submitbutton').prop('disabled', true);
            $("#submitbutton").removeClass("btn-primary").addClass("btn-secondary");
            $('#payment_note').hide(); // Remove the div with id "payment_note"
            $('input[name="payment_note"]').prop('required', true);
        } else {
            $('#signature_div').hide();
            $('#submitbutton').prop('disabled', false);
            $("#submitbutton").removeClass("btn-secondary").addClass("btn-primary");
            $('#payment_note').show(); // Remove the div with id "payment_note"
            $('input[name="payment_note"]').prop('required', false);
        }
    });
</script>