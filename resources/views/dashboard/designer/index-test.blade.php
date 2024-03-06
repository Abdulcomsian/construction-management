@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])
{{-- @extends('layouts.dashboard.master',['title' => 'Temporary Works']) --}}

@section('styles')
<style>
    :root {
        --primary-border--radius: 5px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .card>.card-body {
        padding: 32px;
    }

    .tab-content {
        background-color: white;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

    . .card {
        margin: 30px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
    }

    .toolbar-fixed .toolbar {
        background-color: transparent !important;
        border: none !important;
    }

    .card-title h2 {
        color: black;
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
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .inputDiv input {
        width: 90%;
        background-color: White !important;
        border-color: #d9dfe3 !important;
        color: #000;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        width: 40%;
        color: #000;
    }

    .select2-container {
        width: 250px !important;
    }

    .inputDiv {
        margin: 10px 0px;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .border {
        border: 1px solid red !important;
        border-bottom: 1px solid red !important;
    }

    .border-right {
        border-right: 1px solid red !important;
        border-bottom: 1px solid red !important;
    }

    .border-bottom {
        border-bottom: 1px solid red !important;
    }

    input#exampleRadios1:checked[type=radio] {
        background: orange;
    }

    input#exampleRadios2:checked[type=radio] {
        background: green;
    }

    .nav-item {
        border-radius: 0px 35px 0px 0px;
        overflow: hidden;
    }

    .nav-item .tab {
        color: black;
        background: white;
    }

    .nav-item button.active {
        color: white !important;
    }

    input,
    button,
    table,
    select,
    textarea {
        border-radius: var(--primary-border--radius) !important;
    }

    .fileInput {
        margin-left: 9px !important;
    }

    .queryButton {
        margin-top: 10px;
    }

    table {
        overflow: hidden;
    }

    table thead {
        background-color: #000;
    }

    table thead tr th {
        color: #fff !important;
    }

    .query-table tbody tr {
        background: #f6f6f6 !important;
    }

    .designer-comment {
        background-color: #d7f7e6 !important;
        color: green !important;
    }

    .twc-reply {
        background-color: #fcadad !important;
        color: red !important;
    }

    .tab-pane.active {
        background: white !important;
    }

    .tab-pane {
        padding: 20px 28px;
    }

    .drawing_infoTable tbody tr:nth-child(odd) {
        background: #c8e6c8 !important;
    }
    .commentsTable th{
        text-align: center!important;
    }
    @keyframes blink {
        0% {
        background-color: red;
        border-color: red;
        color: white;
        }
        50% {
        background-color: inherit;
        border-color: inherit;
        color: inherit;
        }
    }

    .blink {
    animation: blink 1s infinite;
    }

    .red{
    background-color: rgb(255, 0, 0) !important;
    }
    .green{
        background-color: green !important;
    }



    /* .circle.nonblink{
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
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    } */
</style>

@endsection


@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="passionate text-dark fw-bolder my-1 fs-3"
                    style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">
                    Temporary Works</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->


    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container" style="padding-top: 80px">
            <div class="row">
                {{-- <div class=' d-flex col-md-6'>
                    <ul class="nav nav-tabs w-100 d-flex pt-0 flex-nowrap" id="myTab" role="tablist">

                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100 active" id="" data-bs-toggle="tab"
                                data-bs-target="#tab2" type="button" role="tab" aria-controls="signup"
                                aria-selected="true">Jobs</button>
                        </li>
                </div> --}}
            </div>
            <div class="tab-content" id="myTabContent">

                <!-- tab 2 -->
                <div class="tab-pane active" id="tab2" role="tabpanel">
                    <!-- </div> -->
                    <div class="row" style="background:white;margin: 0 4px;">
                        <div class="col">
                            <table class="table drawing_infoTable" style="border-collapse: collapse;background: none;">
                                <thead>
                                    <tr style="padding-left: 10px;">
                                        <th>No</th>
                                        <th>Project</th>
                                        <th>Company</th>
                                        <th>Design Brief</th>
                                        <th>Comments</th>
                                        <th>Additional Information</th>
                                        <th>Pricing</th>
                                        @if($estimatorWork[0]['work_status'] == 'publish' && $estimatorWork[0]['estimator'] == 1)
                                        <th>Approve Design Brief</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 0; @endphp
                                    @foreach($estimatorWork as $row)
                                    @php 
                                    $count++; 
                                    // $btn_style = $row->additionalInformation ? 'blink' : ''
                                    // $btn_class = '';
                                    // if($row->additionalInformation){
                                    //     if($row->additionalInformation->jobComment->count() == 0){
                                    //         $btn_class = 'blink';
                                    //     }
                                    // }

                                    $btn_pricing_class = '';
                                    if($row->work_status == 'draft'){
                                        $btn_pricing_class = 'blink';
                                    }

                                    $view_comments_class = '';
                                    for($j=1; $j<=count($viewComments); $j++){
                                        if(isset($viewComments[$j]['status']) && $viewComments[$j]['status'] == 1){
                                            $view_comments_class = 'blink';
                                        }
                                    }

                                    $view_additional_pricing = '';
                                    for($i = 0; $i<=count($extraPricing); $i++){
                                        if(isset($extraPricing[$i]['status']) && $extraPricing[$i]['status'] == 0){
                                            $view_additional_pricing = 'blink';
                                        }elseif(isset($extraPricing[$i]['status']) && $extraPricing[$i]['status'] == 1){
                                            $view_additional_pricing = 'red';
                                        }elseif(isset($extraPricing[$i]['status']) && $extraPricing[$i]['status'] == 2){
                                            $view_additional_pricing = 'green';
                                        }
                                    }
                                    // dd($extraPricing);
                                    @endphp
                                    <tr style="background: {{$background ?? ''}}  !important">
                                        <td><p style="margin-top: 10px;">{{$count++}}</p></td>
                                        <td><p style="margin-top: 10px;">{{$row->projname}}</p></td>
                                        <td><p style="margin-top: 10px;">{{$row->company}}</p></td>
                                        <td>
                                            <a target="_blank" href="{{ asset('estimatorPdf/'.$row->ped_url) }}" class="btn" style="border: 1px solid #07d564; border-radius: 5px">Design Brief</a>
                                        </td>
                                        <td>
                                            <button onclick="showCommentModal({{$row->id}})" class="btn {{$view_comments_class}}" style="border: 1px solid #07d564; border-radius: 5px" id="pricing_modal">Comments</button>
                                        </td>
                                        <td style="width: 30%;">
                                            {{-- data-bs-target="#modal1" --}}
                                            <button onclick="showAdditionalInformation({{$row->id}})" class="btn" style="border: 1px solid #07d564; border-radius: 5px; margin-right: 15px" data-bs-toggle="modal">Additional Information</button>
                                            {{-- <button onclick="showAdditionalInformation({{$row->id}})" class="btn" style="border: 1px solid #07d564; border-radius: 5px; margin-right:15px" data-bs-toggle="modal">Additional Information </button> --}}
                                           
                                            <a target="_blank" href="{{route('client_edit_estimation', $row->id)}}" class="btn" style="border: 1px solid #07d564; border-radius: 5px">Edit Job</a>
                                        </td>
                                        <td>
                                            <button onclick="showPricingModal({{$row->id}})" class="btn {{$btn_pricing_class}}" style="border: 1px solid #07d564; border-radius: 5px" id="pricing_modal">View Pricing</button>
                                            <button onclick="showAdditionalPricingModal({{$row->id}})" class="btn {{$view_additional_pricing}}" style="border: 1px solid #07d564; border-radius: 5px; margin-top: 7px;" id="pricing_modal">Additional Pricing</button>
                                        </td>
                                        @if($row->work_status == 'publish' && $row->estimator == 1)
                                            <td>
                                                <button onclick="showApproveDesignBriefModal({{$row->id}})" class="btn" style="border: 1px solid #07d564; border-radius: 5px" id="approve_design_brief">Approve Design Brief</button>
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal  fade" id="modal1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="mb-3" style="text-align: left; font-weight: 700; font-size: 26px;font-family: 'Inter';">Comments</h1>
                    <div class="comment-body">

                    </div>
                    {{-- <form action="">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                        </div>
                        <button class="btn w-100" type="submit"
                            style="border: 1px solid #07d564; border-radius: 5px">Submit</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for pricing  --}}
    <div class="modal  fade" id="modal2">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="modal-data">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modal3">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="table">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('dashboard.modals.pricing') --}}
    @include('dashboard.modals.approve_design_brief')
    @include('dashboard.modals.show_additional_pricing')
    @endsection
    @section('scripts')
    <script type="text/javascript">

        @if (\Session::has('success'))
            toastr.success("{{\Session::get('success')}}")
        @endif


    //     $(document).on("change" , ".twc-comment-checked" , function(e){
        
    //     if(e.target.checked === true){
    //         let element = e.target;
    //         $.ajax({
    //             type: 'POST',
    //             url : '{{route("mark.comment.as.read.client")}}',
    //             data : {
    //                 twcId : element.value,
    //                 _token : '{{csrf_token()}}'
    //             },
    //             success: function(res){
    //                 if(res.success === true){
    //                     toastr.success(res.msg)
    //                     window.location.reload();
    //                 }else{
    //                     toastr.error(res.msg)
    //                 }
    //             }
    //         })
    //     }
    // })

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



    function Editdesign(data)
    {
        $("#designid").val(data.id);
        $("#drawing_number").val(data.drawing_number);
        $("#comments").val(data.comments);
        $("#twd_name").val(data.twd_name);
        $("#drawing_title").val(data.drawing_title);
        $("#editimage").attr('src',data.file_name);
        $("#editimage").removeClass('d-none');
        if(data.preliminary_approval == 1)
        {
            $("#exampleRadios1").prop('checked',true);
        }
        else{
            $("#exampleRadios2").prop('checked',true);
        }
        $("#file").removeAttr('required');
        $("#formtype").val('Edit');
    }


    function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}

    // $("#designcheck").on('change',function(){
    //     if($(this).is(":checked"))
    //     {
    //         $(".designcheck").show();
    //         $(".construction").hide();
    //         $("#designcheckfile").attr('required','required');
    //         $("#file").removeAttr('required');
    //     }
    //     else{
    //         $(".designcheck").hide();
    //         $(".construction").show();
    //         $("#designcheckfile").removeAttr('required');
    //         $("#file").attr('required','required');
    //     }
    // })


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
    })

    function showAdditionalInformation(id){

         // $.LoadingOverlay("show");
         var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('get.additional.information') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function(res) {
                console.log(res);
                // Add response in Modal body
                document.getElementById("modal1").querySelector(".comment-body").innerHTML = res.html;
                // Display Modal
                $('#modal1').modal('toggle');
            });

    }

    function showAdditionalPricingModal(id){
        $('#temp_id').val(id);
        $('#show_additional_pricing_modal').modal('show');
    }

    $(document).on("click", '.additional-comment', function(e) {
        e.preventDefault();
        let form = $(this).closest(".form")[0];
        let formdata = new FormData(form);
        formdata.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "{{ route('additional.comment.reply') }}",
            data: formdata,
            processData: false, 
            contentType: false,
            success: function(res) {
                // Add response in Modal body
                if (res.success === true) {
                    toastr.success(res.msg);
                    window.location.reload();
                }else{
                    toastr.error(res.msg);
                    let errors = res.error;
                    for(let key of Object.keys(errors) )
                    {
                        let errorList = errors[key];
                        errorList.forEach(err => {
                            toastr.error(err)
                        })
                    }
                    
                }
            }
        });
    });


    function showPricingModal(id){
         // $.LoadingOverlay("show");
         var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('show_pricing') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function(response) {
                // Add response in Modal body
                $('#modal2 #modal-data').html(response);
                // Display Modal
                $('#modal2').modal('show');
                // $.LoadingOverlay("hide");
            });

    }

    function showApproveDesignBriefModal(id){
        var CSRF_TOKEN = '{{csrf_token()}}';
        $.post("{{route('approve.design.brief')}}", {
            _token: CSRF_TOKEN,
            id: id
        }).done(function(response){
            $('#approve_db').modal('show');
        });
    }

    function showCommentModal(id){
         // $.LoadingOverlay("show");
         var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('show_comment') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function(res) {
                console.log(res)
                // Add response in Modal body
                // $('#modal3 #table').html(response);
                document.getElementById("modal3").querySelector("#table").innerHTML = res.html;
                // Display Modal
                $('#modal3').modal('show');
                // $.LoadingOverlay("hide");
            });

    }

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
    @endsection