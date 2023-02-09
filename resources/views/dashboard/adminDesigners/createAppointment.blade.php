@extends('layouts.dashboard.master',['title' => 'Appointment'])
@section('styles')
<style>
   

    table {
        margin-top: 20px;
        
    }
    #kt_content_container{
        background-color: #e9edf1;
    }
    #kt_toolbar_container{
        background-color:#fff;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
        
    }
    .card{
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
    .aside-enabled.aside-fixed.header-fixed .header{
        border-bottom: 1px solid #e4e6ef!important;
    }
    .header-fixed.toolbar-fixed .wrapper{
        padding-top: 60px !important;
    }
    .content{
        padding-top: 0px !important;
        background-color: #e9edf1 !important;
    }
    .form-select.form-select-solid{
    color:black !important;
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


    .dataTables_filter input {
        border-radius: 8px;
    }

    thead tr {
        height: 6px !important;
    }
    .nom_table tr td:first-child{
        background-color: #edf1f3;
        max-width: 340px;
        text-align: left;
    }

    .qualif tr td:first-child{
        background-color: #fff;
    }

    .bg_grey {
        background-color: #edf1f3!important;
        border: 1px solid rgba(0, 0, 0, .2) !important;
    }


    .table td:first-child, .table th:first-child, .table tr:first-child {
        padding-left: 6px;
    }

    .table td:last-child, .table th:last-child, .table tr:last-child {
        padding-right: 6px;
    }

    .form-check:not(.form-switch) .form-check-input[type=checkbox] {
        margin-top: 19px;
    }

    .nom_table td{
        padding: 12px !important;
        font-size: 15px!important;
        border: 1px solid rgba(0, 0, 0, .2) !important;
    }

    table thead th {
        padding: 3px 18px 3px 10px;
        border-bottom: 0;
        color: #ff0000;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        cursor: hand;
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
    .qualif tr th:first-child {
        width: 720px;
    }
    .proj td{
        background-color: white !important; 
    }
    td{
        position: relative;
    }
    td input[type='radio']{
        border: none;
        outline: none;
        box-shadow: none;
        text-align: center;
        width: 100%;
        height: 53%;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }
     td input{
        border: none;
        outline: none;
        box-shadow: none;
        text-align: center;
        width: 100%;
    }
    .tableBordered th,
    .tableBordered td{
        border: 1px solid grey;
    }
    .tdhight
    {
        height: 57px !important;

    }
</style>

@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Add Appointment</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Admin</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Designer</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Add Appointment</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Card body-->
                <div class="card-body pt-7">
                
                <form id="nominationform" action="{{url('adminDesigner/save-appointment')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="hidden" name="nominationId" value="{{$nomination->id}}">
                    <div class="card-body pt-0">
                        <h4 class="float-end text-sucess">{{date('d F Y')}}</h4>
                        <table class="table nom_table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nomination Person</td>
                                    <td>
                                        {{$nomination->nominated_person}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name Person Employer:</td>
                                    <td>
                                        {{$nomination->nominated_person_employer}}
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
                         elseif($user->roles->pluck('name')[0]=='estimator')
                         {
                            $role='Estimator';
                         }
                         elseif($user->roles->pluck('name')[0]=='designer')
                         {
                            $role='Temporary Work Designer';
                         }
                         elseif($user->roles->pluck('name')[0]=='Designer and Design Checker')
                         {
                            $role='Designer and Design Checker';
                         }
                         elseif($user->roles->pluck('name')[0]=='Design Checker')
                         {
                            $role='Design Checker';
                         }
                         @endphp
                         <div class="mb-3 paragraph">
                            <p><b>RE:</b> Appointment as {{$role ?? ''}}</p>
                         </div>
                        <div class="mb-3">
                         <p class="paragraph">This letter confirms your appointment as the {{$role ?? ''}} on the above project.</p>      </div>
                        <div class="mb-3">
                            <p class="paragraph">As the nominated ({{$role ?? ''}}), you are responsible for managing all aspects of the temporary works on this project.</p>
                        <div>
                        <div class="mb-3">
                            <p class="paragraph">Your role as temporary works ({{$role ?? ''}}) is fully explained in the ({{$user->userDiCompany->name}}) Temporary Works Management Procedure –.  This procedure is maintained electronically on the Company Quality Management system.</p></div>
                        <div class="mb-3">
                            <p class="paragraph">Please sign and date the enclosed copy of this letter, to confirm your acceptance of the above.</p>
                        </div>
                        <table style="width: 100%">
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="text-align: center;">
                                            <label for="" style="font-weight:900; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;margin: 0px;"><b style="font-size: 12px;">ACKNOWLEDGEMENT</b></label>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td>
                                            <label for="" style="font-weight:900;height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important; margin: 0px;"><b style="font-size: 12px;">Duties:</b></label>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;font-size:16px;color:black;font-weight: 500;">
                                                <ul style="text-align: center;">
                                                    <li>
                                                        The TWC has overall responsibility to ensure that all                 temporary         works under their control are undertaken in
                                                         accordance with the company Temporary WorksProcedure.NOTE: A PC’s TWC takes precedence.
                                                    </li>
                                                    <li>For temporary works in Design Check Category 1, 2 and 3 ensure there is an agreement in place to formally
                                                    allocate design responsibility to the design and design checking organisations.
                                                    </li>
                                                    <li>
                                                        Prepare, maintain and regularly review the Temporary Works Register for the above project.
                                                    </li>
                                                    <li>
                                                        Ensure each temporary works item is allocated an appropriate ‘construction risk’ category.
                                                    </li>
                                                    <li>
                                                        Ensure that a written Design Brief is prepared for all appropriate temporary works and issued to the design and
                                                        design checking organisations identified on the Temporary Works Register.
                                                    </li>
                                                    <li>
                                                        Review Risk Assessments and Method Statements (RAMS) to ensure particular requirements are incorporated.
                                                    </li>
                                                    <li>
                                                        Ensure that a Project Site File is established and maintained; to include a record of all relevant documents.
                                                    </li>
                                                    <li>
                                                        Liaise with the Principal Contractor’s TWC (and seek approvals, where required).
                                                    </li>
                                                    <li>
                                                         Distribute information to all interested parties, including the Principal Designer and Client where appropriate.
                                                    </li>
                                                    <li>
                                                        Ensure that any proposed changes in material or construction are referred to the Temporary Works Designer and
                                                        that any agreed changes or corrections of faults are correctly carried out on site.
                                                    </li>
                                                    <li>
                                                        Ensure that all appropriate inspections and hold points (including those noted in the design) are undertaken and
                                                        recorded on the permit-to-work.
                                                    </li>
                                                    <li>
                                                        Sign and issue the permit-to-work, e.g. permit to load, permit for putting into use, permit to strike, permit to
                                                        remove, etc.; and agree in writing where the TWS may do this (not high-risk work).
                                                    </li>
                                                    <li>
                                                        Identify and instigate any requirements for periodic inspections, monitoring and maintenance of the temporary
                                                        works.
                                                    </li>
                                                </ul>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td>
                                            <label for="" style="font-weight:900;height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;margin: 0px;"><b style="font-size: 12px;">Competency Requirements:</b></label>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;font-size:16px;color:black;font-weight: 500;">
                                            <p>
                                                <ul>
                                                    <li>Have undertaken and passed the 2-day CITB-accredited TWC Course; and have proven experience.
                                                    </li>
                                                    <li>Understand the company procedure for the control of temporary works.
                                                    </li>
                                                    <li>
                                                        Have the resource, personal skills and authority to carry out the TWC duties; including the suspension of work where necessary.
                                                    </li>
                                                </ul>
                                            </p>
                                        </td>
                                    </tr>
                                    

                                </tbody>
                        </table><br>
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
                <!--end::Card body-->
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