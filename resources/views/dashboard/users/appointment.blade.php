@extends('layouts.nomination',['title' => 'Appointment'])
@section('styles')
<style>
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

    table {
        margin-top: 20px;
        border-collapse: collapse !important;
    }
    .card {
        margin: 30px 0px;
        border-radius: 10px;
    }
    td{

    }
    .card>.card-header {
        align-items: center;
    }
    thead tr {
        height: 6px !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
    }
    .nom_table td{
        padding: 12px !important;
        font-size: 15px!important;
        border: 1px solid rgba(0, 0, 0, .2) !important;
        width: 50%;
    }
    input{
        border: none;
        border-bottom: 1px solid;
        padding:0 8px;
    }
    .paragraph{
        font-size:16px;
        font-weight: 500;
        color:#2e2c2c;
    }
    @media (min-width: 992px){
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            padding: 0 160px;
        }
        .card-body {
            flex: 1 1 auto;
            padding: 1rem 3rem;
        }
    }
</style>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card shadow-lg">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2></h2>
                    </div>
                </div>
                
                <form id="nominationform" action="{{url('user-appointment-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="hidden" name="nominationId" value="{{$nomination->id}}">
                    <div class="card-body pt-0">
                        <h4 class="float-end text-sucess">{{date('d F Y')}}</h4>
                        <table class="table nom_table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Project No & Name:</td>
                                    <td>
                                        {{$nomination->projectt->no}}-{{$nomination->projectt->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name of Project Manager:</td>
                                    <td>
                                        {{$nomination->project_manager}}
                                    </td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                        <br>
                        <p  style="font-size: 16px">Dear {{$user->name}}</p><br>
                        @php
                         if($user->roles->pluck('name')[0]=='user')
                         {
                            $role="Temporary works co-ordinator (TWC)";
                         }elseif($user->roles->pluck('name')[0]=='supervisor')
                         {
                             $role="Temporary works supervisor (TWS)";
                         }
                         elseif($user->roles->pluck('name')[0]=='scaffolder')
                         {
                            $role="Scaffolder";
                         }
                         @endphp
                         <div class="mb-3 paragraph">
                            <p><b>RE:</b> Appointment as {{$role}}</p>
                         </div>
                        <div class="mb-3">
                         <p class="paragraph">This letter confirms your appointment as the {{$role}} on the above project.</p>      </div>
                        <div class="mb-3">
                            <p class="paragraph">As the nominated ({{$role}}), you are responsible for managing all aspects of the temporary works on this project.</p>
                        <div>
                        <div class="mb-3">
                            <p class="paragraph">Your role as temporary works ({{$role}}) is fully explained in the ({{$user->userCompany->name}}) Temporary Works Management Procedure –.  This procedure is maintained electronically on the Company Quality Management system.</p></div>
                        <div class="mb-3">
                            <p class="paragraph">Please sign and date the enclosed copy of this letter, to confirm your acceptance of the above.</p>
                        </div>
                        <div class="row">
                            <div class="col-6 d-flex">
                                <label for="sign" class="paragraph">Signed:</label>
                                <div class="d-flex inputDiv" id="sign" style="align-items: center;">
                                 <canvas id="sig" style="border: 1px solid lightgray"></canvas>
                                  <textarea id="signature" name="signed" style="display: none" required></textarea>
                                   <span id="clear" class="fa fa-undo cursor-pointer" style="line-height: 6"></span>
                                 </div>
                                
                                    <input type="text" id="namesign" name="namesign" class="w-100 d-none" >
                                    <input type="file" name="pdfsign" class="w-100 d-none" >
                                
                                
                                
                                <!-- <input id="sign" type="text" name="signature" class="w-100" required> --> 
                            </div>  
                             <div class="col-6 d-flex" style="height: 25px"><label for="date" class="paragraph">Dated:</label><input id="date" type="date" name="date" class="w-100" value="<?php echo date('Y-m-d'); ?>" required>  </div>
                             <div class="col-2 form-check d-flex mt-5">

                                  <input class="form-check-input mx-0 position-relative" type="checkbox" id="flexCheckChecked" >
                                  <label for="flexCheckChecked">Name Signature</label>
                                  <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="2">  
                            </div>  
                             <div class="col-2 form-check d-flex mt-5">

                                  <input class="form-check-input mx-0 position-relative" type="checkbox" id="pdfChecked" >
                                  <label for="pdfChecked">Pdf Signature</label>
                                  <input type="hidden" id="pdfsign" name="pdfsigntype" class="form-control form-control-solid" value="0">

                                 
                            </div> 
                           
                        </div>
                        <p class="paragraph mt-4"> Name from the nomination form Temporary Works Coordinator</p>
                        <div class="mb-3">
                            <p class="paragraph">This record should be kept by the TWC in the Temporary Works file and be updated, as necessary. The Designated Individual will keep a register of all TWC and dTWC appointments.</p></div>
                           <button type="submit" id="submit" class="btn btn-primary">submit</button>
                    </div>
                    
                    <!--end::Card body-->
                </form>
             
               
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


@endsection

@section('scripts')

<script type="text/javascript">
     var canvas = document.getElementById("sig");
     var signaturePad = new SignaturePad(canvas);
     signaturePad.addEventListener("endStroke", () => {
        console.log("here");
              $("#signature").val(signaturePad.toDataURL('image/png'));
              $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
            });

     $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
        $("#signature").val('');
         $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
    });
</script>

<script type="text/javascript">
    $("#flexCheckChecked").change(function(){
         if($(this).is(':checked'))
         {
             $("#pdfChecked").prop('checked',false);
             $("#signtype").val(1);
              $("#pdfsign").val(0);
             $("input[name='pdfsign']").removeClass('d-flex').addClass('d-none');
             $("#namesign").addClass('d-flex').removeClass("d-none");
             $(".customSubmitButton").removeClass("hideBtn");
             $(".customSubmitButton").addClass("showBtn");
              $("input[name='pdfsign']").removeAttr('required');
             $("input[name='namesign']").attr('required','required');
             $("#clear").hide();
             $("#sign").removeClass('d-flex').addClass('d-none');
             $("#signature").removeAttr('required');
           
        }
        else{
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').removeClass('d-none');
            $("#namesign").removeClass('d-flex').addClass('d-none');
            $("input[name='namesign']").removeAttr('required');
            $("#clear").show();
            $(".customSubmitButton").addClass("hideBtn");
            $(".customSubmitButton").removeClass("showBtn");
            $("#signature").attr('required','required');
        }
    })

    $("#pdfChecked").change(function(){

        if($(this).is(':checked'))
        {
            $("#flexCheckChecked").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("input[name='pdfsign']").attr('required','required');
            $("input[name='pdfsign']").removeClass('d-none').addClass('d-flex');
            $("#namesign").removeClass('d-flex').addClass('d-none');
            $("input[name='namesign']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').addClass('d-none');
             $("#signature").removeAttr('required');
           
        }
        else{
            $("#pdfsign").val(0);
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').removeClass('d-none');
            $("input[name='pdfsign']").removeClass('d-flex').addClass('d-none');
            $("#namesign").removeClass('d-flex').addClass('d-none');
            $("input[name='namesign']").removeAttr('required');
            $("input[name='pdfsign']").removeAttr('required');
            $("#clear").show();
             $("#signature").attr('required','required');
             
        }
    })

   

    
</script>
@endsection