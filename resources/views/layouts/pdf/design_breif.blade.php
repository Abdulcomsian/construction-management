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
    <div style="padding: 30px; width: 100%; max-width: 70%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText">
                <h3>Design Brief</h3>
            </div>
            <div class="logo">
                {{$twc_id_no}}
            </div>

        </div>
        <div class="tableDiv">
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Project
                                name</label>
                        </td>
                        <td style="width: 250px;">{{$data['projname']}}</td>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Date</label>
                        </td>
                        <td style="max-height:70px !important"> {{date('d-m-Y',strtotime($data['design_issued_date']))}} </td>
                    </tr>
                    <tr style="height: 150px;">
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Project
                                number</label>
                        </td>
                        <td style="max-height:70px !important"> {{$data['projno']}}</td>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Date Required</label>
                        </td>
                        <td style="max-height:70px !important"> {{ date('d-m-Y',strtotime($data['design_required_by_date']))}}</td>
                    </tr>
                    <tr style="height: 150px;">
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Project
                                address</label>
                        </td>
                        <td style="max-height:70px !important"> {{$data['projaddress'] ?? ''}}</td>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">TWC Email Address</label>
                        </td>
                        <td style="max-height:70px !important"> {{$data['twc_email']}}</td>
                    </tr>
                    <tr style="height: 150px;">
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Designer Company Name</label>
                        </td>
                        <td style="max-height:70px !important"> {{$data['designer_company_name']}}</td>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Designer Company Email Address</label>
                        </td>
                        <td style="max-height:70px !important"> {{$data['designer_company_email']}}</td>
                    </tr>
                    <tr style="height: 150px;">
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">TWC Name</label>
                        </td>
                        <td style="max-height:70px !important"> {{$data['twc_name']}}</td>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">TWc Email Address</label>
                        </td>
                        <td style="max-height:70px !important"> {{$data['twc_email']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Temporary Works Category</label>
                        </td>
                        <td> {{$data['tw_category']}}</td>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Temporary Works Risk Class</label>
                        </td>
                        <td> {{$data['tw_risk_class']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Design requirement for</label>
                        </td>
                        <td style="width: 300px;">{{$data['design_requirement_text']}}</td>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;">Description of Temporary Works required</label>
                        </td>
                        <td style="width: 300px;">{{$data['description_temporary_work_required']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead style="background:gray;color:white">
                    <th style="color: #fff; background: gray !important; padding: 10px;">Scope of Design Output and date required from the Temporary
                        work Engineer</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">Date</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">Scope of Design Output and date required from the Temporary
                        work Engineer</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">Date</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead style="background:gray;color:white">
                    <th style="color: #fff; background: gray !important; padding: 10px;">Scope of Design Output Required from TEMPORARY WORKS
                        DESIGNER</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">Y</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">N</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">Date Required</th>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Preliminary Sketches</b> (prior to full TW design for discussion with site team)</td>
                        <td>@if($scopdesg['preliminary_sketches_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['preliminary_sketches_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['preliminary_sketches_date'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td><b>Construction Drawings</b> (with notes on loadings, restrictions, critical components,
                            etc.)</td>
                        <td>@if($scopdesg['construction_rawings_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['construction_rawings_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['construction_rawings_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Design Calculations</b> (where needed for submission to client etc.)</td>
                        <td>@if($scopdesg['design_calculations_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['design_calculations_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['design_calculations_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Design Check Certificate</b> (were needed for submission to client, etc.)</td>
                        <td>@if($scopdesg['design_check_certificate_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['design_check_certificate_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['design_check_certificate_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Loading Criteria</b></td>
                        <td>@if($scopdesg['loading_criteria_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['loading_criteria_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['loading_criteria_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Construction / Erection Sequence Information</b> (to include in method statement)</td>
                        <td>@if($scopdesg['construction_erection_sequence_information_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['construction_erection_sequence_information_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['construction_erection_sequence_information_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Inspection Checklist</b> (for erection, loading, inspection, dismantling, etc.)</td>
                        <td>@if($scopdesg['inspection_checklist_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['inspection_checklist_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['inspection_checklist_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Monitoring Requirements</b></td>
                        <td>@if($scopdesg['monitoring_requirements_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['monitoring_requirements_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['monitoring_requirements_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Specifications</b></td>
                        <td>@if($scopdesg['specifications_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['specifications_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['specifications_date'] ?? ''}}</td>

                    </tr>
                    <tr>
                        <td><b>Design Inspection and Test Plans (ITP’s)</b></td>
                        <td>@if($scopdesg['design_inspection_test_plans_date']){{'Y'}}@endif</td>
                        <td>@if($scopdesg['design_inspection_test_plans_date']==null){{'N'}}@endif</td>
                        <td>{{$scopdesg['design_inspection_test_plans_date'] ?? ''}}</td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead style="">
                    <th style="color: #fff; background: gray !important; padding: 10px;">List of attachments</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">Y</th>
                    <th style="color: #fff; background: gray !important; padding: 10px;">N</th>
                </thead>
                <tbody>
                    <tr>
                        <td><b>List of attachments/sketches/ Photos / Specifications /Drawings etc.</b></td>
                        <td>@if(isset($folderattac['list_of_attachments']) && $folderattac['list_of_attachments']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['list_of_attachments']) && $folderattac['list_of_attachments']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Reports including Site Investigations- relevant boreholes/ trial pits/ site investigation</b></td>
                        <td>@if(isset($folderattac['reports_including_site_investigations']) && $folderattac['reports_including_site_investigations']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['reports_including_site_investigations']) && $folderattac['reports_including_site_investigations']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Existing Ground conditions</b></td>
                        <td>@if(isset($folderattac['existing_ground_conditions']) && $folderattac['existing_ground_conditions']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['existing_ground_conditions']) && $folderattac['existing_ground_conditions']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Preferred/non-preferred methods, systems or types of equipment</b></td>
                        <td>@if(isset($folderattac['preferred_non_preferred_methods']) && $folderattac['preferred_non_preferred_methods']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['preferred_non_preferred_methods']) && $folderattac['preferred_non_preferred_methods']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Access limitations or edge protection requirements:</b></td>
                        <td>@if(isset($folderattac['access_limitations']) && $folderattac['access_limitations']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['access_limitations']) && $folderattac['access_limitations']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Back Propping / Re-Propping Sequence: (please attach)</b></td>
                        <td>@if(isset($folderattac['back_propping']) && $folderattac['back_propping']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['back_propping']) && $folderattac['back_propping']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Limitations on Temporary Works Design: (please attach)</b></td>
                        <td>@if(isset($folderattac['limitations_on_temporary_works_design']) && $folderattac['limitations_on_temporary_works_design']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['limitations_on_temporary_works_design']) && $folderattac['limitations_on_temporary_works_design']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Details of any hazards identified during the risk or hazard assessment that require action by the Temporary Works Designer to eliminate or control all risks or hazard</b></td>
                        <td>@if(isset($folderattac['details_of_any_hazards']) && $folderattac['details_of_any_hazards']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['details_of_any_hazards']) && $folderattac['details_of_any_hazards']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>3rd Party Requirements</b></td>
                        <td>@if(isset($folderattac['3rd_party_requirements']) && $folderattac['3rd_party_requirements']=="yes"){{'Y'}}@endif</td>
                        <td>@if(isset($folderattac['3rd_party_requirements']) && $folderattac['3rd_party_requirements']=="no"){{'N'}}@endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tr>
                    <td colspan="5" border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                        <strong></strong>Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload) </strong>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 100%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 5px 10px;border-radius: 3px;background-color: #F4F4F4;">
                                    @foreach($imagelinks as $links)
                                    <a href="{{asset($links)}}">{{asset($links)}}</a><br>
                                    @endforeach
                                    <br>
                                    @foreach($folderattac as $key => $folder)
                                    <strong>{{$key}}:{{$folder}}</strong><br>
                                    @endforeach
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </div>
        <!-- <div class="multiDiv" style="display: flex; justify-content: space-between; margin: 30px 0px;">
            <div class="leftDiv" style="width: 100%;">
                <div class="inputDiv">
                    <label for="" style="float: left;width: 100%;">List of attachments uploaded</label>
                    <textarea style="width: 100%; padding: 10px;" name="" id="" cols="90" rows="10">
                     @foreach($imagelinks as $links)
                            <a href="{{asset($links)}}">{{asset($links)}}</a><br>
                            @endforeach
                            <br>
                            @foreach($folderattac1 as $key => $folder)
                            <strong>{{$key}}:{{$folder}}</strong><br>
                            @endforeach
                    </textarea>
                </div>
            </div>
        </div> -->

        <div class="multiDiv" style="display: flex; justify-content: space-between; margin: 30px 0px;">
            <div class="leftDiv" style="width: 100%;">
                <div class="inputDiv">
                    <label for="" style="float: left;width: 100%; border: 1px solid; padding: 10px;"><b>I certify that the above information is, as far as can be reasonably ascertained, accurate at the time of writing.
                            (to be signed by the person responsible for the production of the Temporary Works Engineering Design Brief)
                        </b>
                    </label>
                </div>
            </div>
        </div>



        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b>Name</b></label>
                        </td>
                        <td> {{$data['name'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b>Job Title</b></label>
                        </td>
                        <td> {{$data['job_title'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="float: left;width: 400px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b>Signature</b></label>
                        </td>
                        <td> @if($data['signtype']=='1')
                            {{ucwords($data['namesign'])}}
                            @else
                            @php $sign=\App\Models\TemporaryWork::find($image_name);@endphp
                            <img src="temporary/signature/{{$sign->signature}}" width="40px" height="40px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="" style="float: left;width: 400px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b>Date</b></label></td>
                        <td> {{ date('d-m-Y',strtotime($data['date']))}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</page>