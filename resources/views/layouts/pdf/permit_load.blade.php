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
    <div style="padding: 0px; width: 100%; max-width: 70%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText">
                <h3>Permit to Load</h3>
            </div>
            <div class="logo">

            </div>

        </div>
        <div class="tableDiv paddingTable">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Project
                                    Name</b>
                            </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['projname']}}</span></td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Project
                                    number </b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['projno']}}</span></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;">
                                <b style="font-size: 12px;"> Drawing Number </b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['drawing_no']}}</span></td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Date </b><label>
                        </td>
                        <td><span style="font-size: 12px;">{{ date('d-m-Y', strtotime($data['date'])) }}</span></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">Permit
                                    Number </b> </label>
                        </td>
                        <td style="font-size: 12px;">{{$data['permit_no']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Drawing Title </b></label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['drawing_title']}}</span></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWC Name </b></label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['twc_name']}}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color: black; margin: 0px;"><b style="font-size: 12px;">
                                    Location of the Temporary Works (Area)</b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['location_temp_work']}}</span></td>

                    </tr>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px;border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b style="font-size: 12px;">Description
                                    of the structure which is ready for use</b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['description_structure']}}</span></td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px;border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;"><b style="font-size: 12px;">
                                    MS/RA number</b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['ms_ra_no']}}</span></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead>
                    <th style="color:black; padding: 10px;font-size:12px;"><span style="font-size:12px;">Equipment/materials used as specified/fit for purpose.</span></th>
                    <th style="color: black; padding: 10px;">Y</th>


                </thead>
                <tbody>
                    <tr>
                        <td style="font-size:12px;">Equipment/materials used as specified/fit for purpose.</td>
                        <td style="font-size:12px;">Y</td>


                    </tr>
                    <tr>
                        <td style="font-size:12px;">Workmanship checked – all props, ties, struts, joints, stop-ends, checked/tight.</td>
                        <td style="font-size:12px;">Y</td>


                    </tr>
                    <tr>
                        <td style="font-size:12px;">TW checked to drawings/design output</td>
                        <td style="font-size:12px;">Y</td>
                    </tr>
                    <tr>
                        <td style="font-size:12px;">Loading /use limitations understood <br>
                            e.g. Rate of pour, sequence of loading, access/plant loading
                        </td>
                        <td style="font-size:12px;">Y</td>
                    </tr>
                    <tr>
                        <td style="font-size:12px;">Approval by Temp Works Coordinator Required?
                            completed Other criteria specified (e.g. strength of supporting structure, any back propping, ground tests, anchor tests) are checked and satisfied (IF YES, SPECIFY BELOW)</td>
                        <td style="font-size:12px;">@if($data['works_coordinator']==1){{'Y'}}@else{{'N'}}@endif</td>
                    </tr>
                    <tr style="height: 40px;">
                        <td style="font-size:12px;">
                            @if($data['works_coordinator']==1)
                            {{$data['description_approval_temp_works']}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 100%;color: black; border: 1px solid; padding: 10px;">
                                <h4 style="text-align: center; font-size:12px;">Permit to Load/Use</h4>
                                <span style="font-size:12px;">I confirm that I have inspected the above temporary structure and I am satisfied that it
                                    conforms to the above design.</span> <br>
                                <span style="font-size:12px;">I consider that the temporary structure is ready to be loaded and taken into use. <br>
                                    I confirm that I am authorised to issue a Permit to Load for this temporary structure.</span>

                            </label>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="width: 100%;">
            <div class="inputDiv">
                <table style="margin-top: 10px;">
                    <thead style="margin-top:10px;">
                        <th style="font-size:12px;">Principal Contractor Approval required</th>
                        <th style="font-size:12px;">Y</th>
                    </thead>

                    <tbody style="margin-top: 10px;">
                        <tr>
                            <td style="font-size:12px;">Principal Contractor Approval required</td>
                            <td style="font-size:12px;"> @if($data['principle_contractor']==1){{'Y'}}@else{{'N'}}@endif</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>


        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size:12px;"> Name </b></label>
                        </td>
                        <td style="width:200px; font-size:12px;"> @if($data['principle_contractor']==1){{$data['name1']}}@endif</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size:12px;">
                                    Job Title </b></label></td>
                        <td style="width: 200px; font-size:12px;"> @if($data['principle_contractor']==1){{$data['job_title1']}}@endif</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size:12px;"> Company </b></label>
                        </td>
                        <td style="width: 200px; font-size: 12px;"> {{$data['company']}}</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;"><b style="font-size:12px;">
                                    Signature </b></label></td>
                        <td style="width: 200px; font-size:12px;">
                            @if(isset($image_name1) && $image_name1!='')
                            <img src="temporary/signature/{{$image_name1}}" width="40px" height="40px" />
                            @else
                            {{ $data['namesign1'] ?? ''}}
                            @endif
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    Date </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    Name </b></label></td>
                        <td style="width: 200px; font-size:12px;">{{$data['name']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    Job Title </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;"> {{$data['job_title']}}</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black;  margin: 0px;"><b style="font-size:12px;">
                                    Company </b></label></td>
                        <td style="width: 200px; font-size:12px;">{{$data['company']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    Signature </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;">
                            @if(isset($image_name) && $image_name!='')
                            <img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />
                            @else
                            {{ $data['namesign'] ?? ''}}
                            @endif
                        </td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    Date </b></label></td>
                        <td style="width: 200px; font-size:12px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>


                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</page>