
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
                        <div style="margin-bottom: 15px;border-bottom:2px solid #009fdb">
                            <div style="float:left;width:450px;">
                                 <h6>Temporary Works Procedure: SAMPLE – TWf2019: 03 </h6>
                              
                            </div>
                            <div style="float:left;width:200px;text-align: right;">
                               <h6>Temporary Work Forum</h6>
                            </div>
                         </div>
                         <div style="background:#009fdb;color:#000000e3;font-size:12px;padding:10px">Appointment of a Temporary Works Supervisor (TWS)</div>
                        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">APPOINTMENT OF TEMPORARY WORKS SUPERVISOR (TWS)</b></label>
                                        </td>
                                        <td style="width:70px; font-size:12px;background: #c9cacc !important;">FORM No. 2</td>
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
                                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Date </b></label>
                                        </td>
                                        <td style="max-height:70px !important; font-size:12px;"> {{$data['date']}} </td>
                                    </tr>
                                    <tr style="height: 150px;">
                                        <td style="width: 150px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">TO:</b></label>
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
                                            <p>You have been appointed as the <b>Temporary Works Supervisor</b> for the above Project.This appointment satisfies the recommendation in BS 5975: 2019 to appoint, where required, a Temporary Works Supervisor.The duties and competencies are summarised below and are detailed in the Company Temporary Works Procedure.</p>
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
                                                       The TWS is responsible to the TWC.
                                                    </li>
                                                    <li>To contribute to the design brief (via the TWC).
                                                    </li>
                                                    <li>
                                                        To operate in accordance with the Company Temporary Works Procedure (and any other Procedures agreed with the PC, as required).
                                                    </li>
                                                    <li>
                                                        Assist the TWC in the supervision and checks for compliance with the design; and recording of inspections of the temporary works.
                                                    </li>
                                                    <li>
                                                       Supervision of the erection, use, maintenance and dismantling of the temporary works.
                                                    </li>
                                                    <li>
                                                        Undertaking checks during construction on site. 
                                                    </li>
                                                    <li>
                                                        To liaising with the TWC to ensure any modifications to the scheme or differences from envisaged conditions are drawn to the temporary works designer’s attention.
                                                    </li>
                                                    <li>
                                                        Undertake periodic inspections, monitoring and maintenance of the temporary works.
                                                    </li>
                                                    <li>
                                                         Issue any permit-to-work, where approved to do so by the TWC.
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
                                        <td style="width:500px; font-size:12px;">
                                            {{$data['date']}}
                                        </td>
                                    </tr>
                                    <tr style="min-height: 150px;">
                                        <td style="width:120px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Copied To:</b></label>
                                        </td>
                                        <td style="width:500px; font-size:12px;">
                                            {{$user->name}}
                                        </td>
                                    </tr>
                                    

                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 250px;background:#c9cacc;color:#000000e3;text-align: center;">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">ACKNOWLDGED BY DESIGNATED INDIVIDUAL (DI)</b></label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr style="min-height: 150px;">
                                        <td style="width: 150px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Signature:</b></label>
                                        </td>
                                        <td style="width: 200px; font-size:12px;">
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
                                        <td style="width: 120px;background:#c9cacc;color:#000000e3">
                                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: #c9cacc !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Date:</b></label>
                                        </td>
                                        <td style="max-height:70px !important; font-size:12px;">{{$data['date']}}</td>
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