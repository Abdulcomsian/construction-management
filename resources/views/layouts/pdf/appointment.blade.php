
<style type="text/css">


    .paddingTable td {
        padding: 4px 10px;
    }
    table *{
        font-size: 11px !important;
    }
     .input{
        border: none;
        border-bottom: 1px solid;
        padding:0 8px;
    }
    .paragraph{
        font-size:16px;
        font-weight: 500;
        color:#2e2c2c;

    }

    table,
    td,
    th {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .paddingTable td {
        padding: 10px;
    }
  
</style>
<page pageset="old">
    <div style="padding: 10px; width: 100%; margin: auto;">
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
                    <div class="card-body pt-0">
                        <div style="margin-bottom: 15px;">
                            <div style="float:left;width:200px;">
                              <h6></h6>
                            </div>
                            <div style="float:left;width:450px;text-align: right;">
                                <h6>Temporary Works Procedure: SAMPLE – TWf2019: 03</h6>
                            </div>
                         </div>
                         <!-- <div style="background:#009fdb;color:#000000e3;font-size:12px;padding:10px">Appointment of a Temporary Works Co-ordinator (TWC)</div> -->
                        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">APPOINTMENT OF TEMPORARY WORKS CO-ORDINATOR (TWC)</b></label>
                                        </td>
                                        <td style="background: #c9cacc !important;width:70px; font-size:12px;">FORM No. 1
</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 150px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">From:</b></label>
                                        </td>
                                        <td style="width: 200px; font-size:12px;">{{$user->userCompany->name}}</td>
                                        <td style="width: 120px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Date:</b></label>
                                        </td>
                                        <td style="max-height:70px !important; font-size:12px;"> {{$data['date']}}</td>
                                    </tr>
                                    <tr style="height: 150px;">
                                        <td style="width: 150px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">To:</b></label>
                                        </td>
                                        <td style="max-height:70px !important; font-size:12px;">{{$user->name}}</td>
                                        <td style="width: 150px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project:</b></label>
                                        </td>
                                        <td style="max-height:70px !important; font-size:12px;">{{$nomination->projectt->no}}-{{$nomination->projectt->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">APPOINTMENT</b></label>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;font-size:10px">
                                            <p>You have been appointed as the <b>Temporary Works Coordinator</b> for the above Project.
                                            This appointment satisfies the recommendation in BS 5975: 2019 to appoint a Temporary Works Coordinator.
                                            The duties and competencies are summarised below and are detailed in the Company Temporary Works Procedure</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 70px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Signed</b></label>
                                        </td>
                                        <td style="width:500px; font-size:12px;">
                                              @php 
                                            $image=$nomination->signature1;
                                            $n = strrpos($image, '.');
                                            $ext=substr($image, $n+1);
                                             
                                            @endphp
                                             @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                                <img src="temporary/signature/{{$image}}" width="500" alt="img" width="auto" height="40"/>
                                                @else
                                               <p>{{$image}}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    

                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;background:#c9cacc;color:#000000e3;text-align: center;">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">ACKNOWLEDGEMENT</b></label>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;background:#CACFD2;color:black;text-align: left;">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Duties:</b></label>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;font-size:10px;color:black">
                                            <p>
                                                <ul style="text-align: center;">
                                                    <li>
                                                        The TWC has overall responsibility to ensure that all                 temporary         works under their control are undertaken in
                                                         accordance with the company Temporary WorksProcedure.NOTE: A PC’s TWC takes precedence.
                                                        </p>
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
                                        <td style="width: 250px;background:#c9cacc;color:black;text-align: left;">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Competency Requirements:</b></label>
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;font-size:10px;color:black">
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
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;background:#c9cacc;color:black;text-align: center;">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">I have read, understand the responsibilities as noted and am able to undertake
the duties placed on me by this appointment.</b></label>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width:120px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Signed:</b></label>
                                        </td>
                                        <td style="width:500px; font-size:12px;">
                                            @if($data['signtype']==1)
                                            {{signature}}
                                            @else
                                             <img src="temporary/signature/{{$signature}}" width="auto" height="40">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width:120px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Date:</b></label>
                                        </td>
                                        <td style="width:500px; font-size:12px;">{{$data['date']}}</td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width:120px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Copied To:</b></label>
                                        </td>
                                        <td style="width:500px; font-size:12px;">{{$user->name}}</td>
                                    </tr>
                                    

                                </tbody>
                            </table>
                           

                        </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
    </div>
</page>