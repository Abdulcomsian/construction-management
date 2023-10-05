<style type="text/css">
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
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText" style="float:left;width:70%">
                <h3>Design Brief: {{$twc_id_no}}</h3>
                <p style="width:200px !important">{{$twc_id_no}}&nbsp;&nbsp;{{$data['design_requirement_text']}}</p>
            </div>
            <div class="logo" style="float:right;width:20%;">
                @php
                $logodata=\App\Models\User::where('id',$data['company_id'])->first();
                @endphp
                @if(isset($logodata->image) && $logodata->image != NULL)
                <img src="{{public_path($logodata->image)}}" width="auto" height="80px" />
                @endif
            </div>
        </div>
        <div class="tableDiv paddingTable">
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project Name</b></label>
                        </td>
                        <td style="width: 270px; font-size:12px;">{{$data['projname']}}</td>
                        <td style="width: 120px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Date Requested</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{date('d-m-Y',strtotime($data['design_issued_date']))}} </td>
                    </tr>
                    <tr style="height: 150px;">
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project No</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['projno']}}</td>
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Date Required</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{ date('d-m-Y',strtotime($data['design_required_by_date']))}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project Address</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['projaddress'] ?? ''}}</td>
                    </tr>
                   <!--  <tr style="height: 150px;">
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project Address</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['projaddress'] ?? ''}}</td>
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">TWC Email</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['twc_email']}}</td>
                    </tr> -->
                    <tr style="height: 150px;">
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Designer Company<br>Name</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['designer_company_name'] ?? ''}}</td>
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Designer Company<br>Email</b></label>
                        </td>
                        {{-- <td style="max-height:70px !important; font-size:12px;"> {{$data['designer_company_email'][0]}}</td> --}}
                        <td style="max-height:70px !important; font-size:12px;">
                            {{-- @if(count($data['designer_company_email']) > 0)
                                @foreach($data['designer_company_email'] as $index => $email)
                                    {{$email}}{{($index != count($data['designer_company_email']) - 1) ? ',' : ''}}
                                @endforeach
                            @endif --}}
                            @if(is_array($data['designer_company_email']) && count($data['designer_company_email']) > 0)
                                @foreach($data['designer_company_email'] as $index => $email)
                                    {{$email}}{{($index != count($data['designer_company_email']) - 1) ? ',' : ''}}
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    @if(isset($data['desinger_email_2']))
                    <tr style="height: 150px;">
                        <!--  <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Design Checker Company Name</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['desinger_company_name2'] ?? ''}}</td>
                         <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Designer Name</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['desinger'] ?? ''}}</td> -->
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Design Checker Email</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['desinger_email_2'] ?? ''}}</td>
                    </tr>
                    @endif
                    <!-- <tr style="height: 150px;">
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Design Checker Email</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['desinger_email_2'] ?? ''}}</td>
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;"></b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"></td>
                    </tr> -->
                    <tr style="height: 150px;">
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">TWC Name</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['twc_name']}}</td>
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">TWC Email</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;">
                            {{$data['twc_email']}}
                        </td>
                    </tr>
                    <tr style="height: 150px;">
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="font-weight:900;float: left; height: 70px;  padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Temporary Works<br> Category</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['tw_category']}}</td>
                        <td style="width: 150px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Temporary Works<br>Risk Class</b></label>
                        </td>
                        <td style="max-height:70px !important; font-size:12px;"> {{$data['tw_risk_class']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="font-weight:900;float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Design requirement for</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$data['design_requirement_text']}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Description of Temporary Works Required</b></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-size:14px;white-space:pre-wrap;"><b>
                            
                            @php
                                // echo nl2br($data['description_temporary_work_required']);
                                echo $description;
                                @endphp
                               
                           
                        </b>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead style="background:gray;color:white">
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Required from Temporary Works Designer 
                            DESIGNER</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Y</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">N</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Date Required</td>
                    </tr>
                </thead>
                <tbody>
                    @if($scopdesg['preliminary_sketches_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Preliminary Sketches</b> (prior to full TW design for discussion with site team)</td>
                        <td style="font-size:12px;">@if($scopdesg['preliminary_sketches_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['preliminary_sketches_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['preliminary_sketches_date']){{ date('d-m-Y',strtotime($scopdesg['preliminary_sketches_date']))}}@endif</td>
                    </tr>
                    @endif
                    @if($scopdesg['construction_rawings_date'])
                    <tr>
                        <td style="font-size:12px;"><b style="font-size:12px;">Construction Drawings</b> (with notes on loadings, restrictions, critical components, etc)
                        </td>
                        <td style="font-size:12px;">@if($scopdesg['construction_rawings_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['construction_rawings_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['construction_rawings_date']){{ date('d-m-Y',strtotime($scopdesg['construction_rawings_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['design_calculations_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Design Calculations</b> (where needed for submission to client, etc)</td>
                        <td style="font-size:12px;">@if($scopdesg['design_calculations_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['design_calculations_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['design_calculations_date']){{ date('d-m-Y',strtotime($scopdesg['design_calculations_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['design_check_certificate_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Design Check Certificate</b> (where needed for submission to client, etc)</td>
                        <td style="font-size:12px;">@if($scopdesg['design_check_certificate_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['design_check_certificate_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['design_check_certificate_date']){{ date('d-m-Y',strtotime($scopdesg['design_check_certificate_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['loading_criteria_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Loading Criteria</b></td>
                        <td style="font-size:12px;">@if($scopdesg['loading_criteria_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['loading_criteria_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['loading_criteria_date']){{ date('d-m-Y',strtotime($scopdesg['loading_criteria_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['construction_erection_sequence_information_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Construction / Erection Sequence Information</b> (to include in method statement)</td>
                        <td style="font-size:12px;">@if($scopdesg['construction_erection_sequence_information_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['construction_erection_sequence_information_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['construction_erection_sequence_information_date']){{ date('d-m-Y',strtotime($scopdesg['construction_erection_sequence_information_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['inspection_checklist_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Inspection Checklist</b> (for erection, loading, inspection, dismantling, etc.)</td>
                        <td style="font-size:12px;">@if($scopdesg['inspection_checklist_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['inspection_checklist_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['inspection_checklist_date']){{ date('d-m-Y',strtotime($scopdesg['inspection_checklist_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['monitoring_requirements_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Monitoring Requirements</b></td>
                        <td style="font-size:12px;">@if($scopdesg['monitoring_requirements_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['monitoring_requirements_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['monitoring_requirements_date']){{ date('d-m-Y',strtotime($scopdesg['monitoring_requirements_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['specifications_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Specifications</b></td>
                        <td style="font-size:12px;">@if($scopdesg['specifications_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['specifications_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['specifications_date']){{ date('d-m-Y',strtotime($scopdesg['specifications_date']))}}@endif</td>

                    </tr>
                    @endif
                    @if($scopdesg['design_inspection_test_plans_date'])
                    <tr>
                        <td style="font-size:12px;"><b>Design Inspection and Test Plans (ITPs)</b></td>
                        <td style="font-size:12px;">@if($scopdesg['design_inspection_test_plans_date']){{'Y'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['design_inspection_test_plans_date']==null){{'N'}}@endif</td>
                        <td style="font-size:12px;">@if($scopdesg['design_inspection_test_plans_date']){{ date('d-m-Y',strtotime($scopdesg['design_inspection_test_plans_date']))}}@endif</td>

                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead>
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Design Requirements Details</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Y</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Comments</td>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data['req_name']))
                    @foreach($data['req_name'] as $key => $req)
                    <tr>
                        <td><b style="font-size:12px;">{{$req}}</b></td>
                        <td style="font-size:12px;">@if(isset($data['req_check'][$req])) Y @else N @endif</td>
                        <td style="font-size:12px;">{{$data['req_notes'][$key]}}</td>
                    </tr>
                    @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead>
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Attachments</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Y</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">N</td>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($folderattac['list_of_attachments']) && $folderattac['list_of_attachments']=="yes")
                    <tr>
                        <td>
                            <span style="font-size:12px;">Attachments (sketches / photos / specifications / drawings, etc)</span>
                            <p style="font-size:11px;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['list_of_attachments_comment'] ?? '');
                                @endphp
                                </span></b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['list_of_attachments']) && $folderattac['list_of_attachments']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['list_of_attachments']) || $folderattac['list_of_attachments']==NULL || $folderattac['list_of_attachments']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['list_of_attachments']) && $folderattac['list_of_attachments']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['reports_including_site_investigations']) && $folderattac['reports_including_site_investigations']=="yes")
                    <tr>
                        <td><span style="font-size:12px;">Reports Including Site Investigations (relevant boreholes / trial pits / site investigation</span>
                            <p style="font-size:11px;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['reports_including_site_investigations_comment'] ?? '');
                                @endphp
                                </span></b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['reports_including_site_investigations']) && $folderattac['reports_including_site_investigations']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['reports_including_site_investigations']) || $folderattac['reports_including_site_investigations']==NULL || $folderattac['reports_including_site_investigations']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['reports_including_site_investigations']) && $folderattac['reports_including_site_investigations']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['existing_ground_conditions']) && $folderattac['existing_ground_conditions']=="yes")
                    <tr>
                        <td>
                            <span style="font-size:12px;">Existing Ground Conditions</span>
                            <p style="font-size:11px;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['existing_ground_conditions_comment'] ?? '');
                                @endphp
                                </span></b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['existing_ground_conditions']) && $folderattac['existing_ground_conditions']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['existing_ground_conditions']) || $folderattac['existing_ground_conditions']==NULL || $folderattac['existing_ground_conditions']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['existing_ground_conditions']) && $folderattac['existing_ground_conditions']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['preferred_non_preferred_methods']) && $folderattac['preferred_non_preferred_methods']=="yes")
                    <tr>
                        <td>
                            <span style="font-size:12px;">Preferred/non-preferred methods, systems or types of equipment</span>
                            <p style="font-size:11px;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['preferred_non_preferred_methods_comment'] ?? '');
                                @endphp
                                </span></b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['preferred_non_preferred_methods']) && $folderattac['preferred_non_preferred_methods']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['preferred_non_preferred_methods']) || $folderattac['preferred_non_preferred_methods']==NULL || $folderattac['preferred_non_preferred_methods']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['preferred_non_preferred_methods']) && $folderattac['preferred_non_preferred_methods']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['access_limitations']) && $folderattac['access_limitations']=="yes")
                    <tr>
                        <td>
                            <span style="font-size:12px;">Access Limitations (or edge protection requirements)</span>
                            <p style="font-size:11px;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['access_limitations_comment'] ?? '');
                                @endphp
                                </span></b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['access_limitations']) && $folderattac['access_limitations']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['access_limitations']) || $folderattac['access_limitations']==NULL || $folderattac['access_limitations']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['access_limitations']) && $folderattac['access_limitations']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['back_propping']) && $folderattac['back_propping']=="yes")
                    <tr>
                        <td><span style="font-size:12px;">Back Propping / Re-Propping Sequence</span>
                            <p style="font-size:11px;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['back_propping_comment'] ?? '');
                                @endphp
                                </b></span></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['back_propping']) && $folderattac['back_propping']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['back_propping']) || $folderattac['back_propping']==NULL || $folderattac['back_propping']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['back_propping']) && $folderattac['back_propping']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['limitations_on_temporary_works_design']) && $folderattac['limitations_on_temporary_works_design']=="yes")
                    <tr>
                        <td><span style="font-size:12px;">Limitations on Temporary Works Design: (please attach)</span>
                            <p style="font-size:11px;"><b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['limitations_on_temporary_works_design_comment'] ?? '');
                                @endphp
                            </span><b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['limitations_on_temporary_works_design']) && $folderattac['limitations_on_temporary_works_design']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['limitations_on_temporary_works_design']) || $folderattac['limitations_on_temporary_works_design']==NULL || $folderattac['limitations_on_temporary_works_design']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['limitations_on_temporary_works_design']) && $folderattac['limitations_on_temporary_works_design']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['details_of_any_hazards']) && $folderattac['details_of_any_hazards']=="yes")
                    <tr>
                        <td><span style="font-size:12px;">Details of any hazards identified during the risk or hazard assessment that require action by the Temporary Works Designer to eliminate or control all risks or hazard</span>
                            <p style="font-size:11px;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['details_of_any_hazards_comment'] ?? '');
                                @endphp
                                </span></b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['details_of_any_hazards']) && $folderattac['details_of_any_hazards']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['details_of_any_hazards']) || $folderattac['details_of_any_hazards']==NULL || $folderattac['details_of_any_hazards']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['details_of_any_hazards']) && $folderattac['details_of_any_hazards']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                    @if(isset($folderattac['3rd_party_requirements']) && $folderattac['3rd_party_requirements']=="yes")
                    <tr>
                        <td>
                            <span style="font-size:12px;">3rd Party Requirements</span>
                            <p style="font-size:11px;white-space: pre-wrap;"> <b>Comment: <span style="font-size:14px;white-space: pre-wrap;">
                                @php
                                    echo preg_replace('/\v+|\\\r\\\n/Ui','<br/>',$comments['3rd_party_requirements_comment'] ?? '');
                                @endphp
                            </span></b></p>
                        </td>
                        <td style="font-size:12px;">@if(isset($folderattac['3rd_party_requirements']) && $folderattac['3rd_party_requirements']=="yes"){{'Y'}}@endif</td>
                        <td style="font-size:12px;">
                            @if(!isset($folderattac['3rd_party_requirements']) || $folderattac['3rd_party_requirements']==NULL || $folderattac['3rd_party_requirements']=="no"){{'N'}}@endif
                            <!-- @if(isset($folderattac['3rd_party_requirements']) && $folderattac['3rd_party_requirements']=="no"){{'N'}}@endif -->
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tr>
                    <td colspan="5" border="1" style="width: 15%; text-align: left; padding: 5px 10px;font-size: 10px;
            font-weight: 700;">
                        <strong style="font-size:12px;">List of Attachments Uploaded </strong>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 100%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 5px 10px;border-radius: 3px;background-color: #F4F4F4; font-size:12px;">
                                    @foreach($imagelinks as $links)
                                    <a target="_blank" href="{{asset($links)}}">{{asset($links)}}</a><br>
                                    @endforeach
                                    <br>
                                    {{-- @foreach($folderattac as $key => $folder)
                                    <strong>{{$key}}:{{$folder}}</strong><br>
                                    @endforeach --}}
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </div>

        <div class="multiDiv" style="display: flex; justify-content: space-between; margin: 30px 0px;">
            <div class="leftDiv" style="width: 100%;">
                <div class="inputDiv">
                    <label for="" style="float: left;width: 100%; border: 1px solid; padding: 10px;"><b style="font-size:12px;">I certify that the above information is accurate at the time of writing, as far as can reasonably be ascertained.
                        </b>
                    </label>
                </div>
            </div>
        </div>

        <div class="tableDiv paddingTable" style="margin-top: 5px">
            <table>
                <tbody>
                    <thead>
                        <tr>
                            <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size:12px;">
                                Name   </b></label></td>
                            <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size:12px;">
                                Company   </b></label></td>
                            <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size:12px;">
                                Job Title   </b></label></td>
                            <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size:12px;">
                                Date   </b></label></td>
                            <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size:12px;">
                                Signature   </b></label></td>
                    </tr>
                    <tbody>
                        <tr>
                            <td style="width: 200px; font-size:12px;"> {{$data['name']}}</td>
                            <td style="width: 200px; font-size:12px;">{{$data['company']}}</td>
                            <td style="width: 200px; font-size:12px;"> {{$data['job_title']}}</td>
                            <td style="width: 200px; font-size:12px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>
                            <td style="font-size:12px;"> @if(isset($data['signtype']) && $data['signtype']=='1')
                                <i> {{ucwords($data['namesign'])}}</i>
                                 @elseif(isset($signature_type) && $signature_type == 'name_sign')
                                    <i> @isset($name_signature){{$name_signature}}@endisset</i>
                                @else
                                 @php 
                                 $sign=\App\Models\TemporaryWork::find($image_name);@endphp
                                 <img src="temporary/signature/{{$sign->signature}}" width="auto" height="120">
                                 @endif
                            </td>
                        </tr>
                        @if($data['name3'])
                            <tr>
                                <td style="width: 200px; font-size:12px;"> {{$data['name3']}}</td>
                                <td style="width: 200px; font-size:12px;">{{$data['company3']}}</td>
                                <td style="width: 200px; font-size:12px;"> {{$data['job_title3']}}</td>
                                <td style="width: 200px; font-size:12px;"> {{ date('d-m-Y', strtotime($data['date3'])) }}</td>
                                <td style="width: 200px; font-size:12px;"> 
                                    @if(isset($image_name3) && $image_name3!='')
                                        <img src="temporary/signature/{{$image_name3}}"  width="auto" height="50px" />
                                    @else
                                        {{ $data['namesign'] ?? ''}}
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @if($data['name4'])
                            <tr>
                                <td style="width: 200px; font-size:12px;"> {{$data['name4']}}</td>
                                <td style="width: 200px; font-size:12px;">{{$data['company4']}}</td>
                                <td style="width: 200px; font-size:12px;"> {{$data['job_title4']}}</td>
                                <td style="width: 200px; font-size:12px;"> {{ date('d-m-Y', strtotime($data['date4'])) }}</td>
                                <td style="width: 200px; font-size:12px;"> 
                                    @if(isset($image_name4) && $image_name4 !='')
                                        <img src="temporary/signature/{{$image_name4}}"  width="auto" height="50px" />
                                    @else
                                        {{ $data['namesign'] ?? ''}}
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @if($data['name5'])
                            <tr>
                                <td style="width: 200px; font-size:12px;"> {{$data['name5']}}</td>
                                <td style="width: 200px; font-size:12px;">{{$data['company5']}}</td>
                                <td style="width: 200px; font-size:12px;"> {{$data['job_title5']}}</td>
                                <td style="width: 200px; font-size:12px;"> {{ date('d-m-Y', strtotime($data['date5'])) }}</td>
                                <td style="width: 200px; font-size:12px;"> 
                                    @if(isset($image_name5) && $image_name5 !='')
                                        <img src="temporary/signature/{{$image_name5}}"  width="auto" height="50px" />
                                    @else
                                        {{ $data['namesign'] ?? ''}}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    </tbody>
                    </thead>
                </tbody>
            </table>
        </div>

        {{-- <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Name</b></label>
                        </td>
                        <td style="font-size:12px;"> {{$data['name'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Job Title</b></label>
                        </td>
                        <td style="font-size:12px;"> {{$data['job_title'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Company</b></label>
                        </td>
                        <td style="font-size:12px;"> {{$data['company'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="float: left;width: 400px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Signature</b></label>
                        </td>
                        <td style="font-size:12px;"> @if($data['signtype']=='1')
                           <i> {{ucwords($data['namesign'])}}</i>
                            @else
                            @php 
                            $sign=\App\Models\TemporaryWork::find($image_name);@endphp
                            <img src="temporary/signature/{{$sign->signature}}" width="auto" height="120">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="" style="float: left;width: 400px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Date</b></label></td>
                        <td style="font-size:12px;"> {{ date('d-m-Y',strtotime($data['date']))}}</td>
                    </tr>
                </tbody>
            </table>
        </div> --}}

    </div>
</page>