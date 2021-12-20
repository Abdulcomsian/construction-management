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
                <h3>Permit to Load</h3>
            </div>
            <div class="logo">

            </div>

        </div>
        <div class="tableDiv">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b>
                                    Project
                                    Name</b>
                            </label>
                        </td>
                        <td> {{$data['projname']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b>
                                    Project
                                    number </b> </label>
                        </td>
                        <td>{{$data['projno']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;">
                                <b> Drawing Number </b> </label>
                        </td>
                        <td> {{$data['drawing_no']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b>
                                    Date </b><label>
                        </td>
                        <td> {{ date('d-m-Y', strtotime($data['date'])) }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b>Permit
                                    Number </b> </label>
                        </td>
                        <td>{{$data['permit_no']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b>
                                    Drawing Title </b></label>
                        </td>
                        <td> {{$data['drawing_title']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b>
                                    TWC Name </b></label>
                        </td>
                        <td> {{$data['twc_name']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color: black; margin: 0px;"><b>
                                    Location of the Temporary Works (Area)</b> </label>
                        </td>
                        <td> {{$data['location_temp_work']}}</td>

                    </tr>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b>Description
                                    of the structure which is ready for use</b> </label>
                        </td>
                        <td> {{$data['description_structure']}}</td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px;border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;"><b>
                                    MS/RA number</b> </label>
                        </td>
                        <td> {{$data['ms_ra_no']}}</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td></td>

                    </tr>
                    <tr>
                        <td></td>

                    </tr>
                    <tr>
                        <td></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead>
                    <th style="color:black; padding: 10px;">Equipment/materials used as specified/fit for purpose.</th>
                    <th style="color: black; padding: 10px;">Y</th>


                </thead>
                <tbody>
                    <tr>
                        <td>Equipment/materials used as specified/fit for purpose.</td>
                        <td>Y</td>


                    </tr>
                    <tr>
                        <td>Workmanship checked – all props, ties, struts, joints, stop-ends, checked/tight.</td>
                        <td>Y</td>


                    </tr>
                    <tr>
                        <td>TW checked to drawings/design output</td>
                        <td>Y</td>
                    </tr>
                    <tr>
                        <td>Loading /use limitations understood <br>
                            e.g. Rate of pour, sequence of loading, access/plant loading
                        </td>
                        <td>Y</td>
                    </tr>
                    <tr>
                        <td>Approval by Temp Works Coordinator Required?
                            completed Other criteria specified (e.g. strength of supporting structure, any back propping, ground tests, anchor tests) are checked and satisfied (IF YES, SPECIFY BELOW)</td>
                        <td>@if($data['works_coordinator']==1){{'Y'}}@else{{'N'}}@endif</td>
                    </tr>
                    <tr style="height: 40px;">
                        <td>
                            @if($data['works_coordinator']==1)
                            {{$data['description_approval_temp_works']}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 100%;color: black; border: 1px solid; padding: 10px;">
                                <h4 style="text-align: center;">Permit to Load/Use</h4>
                                I confirm that I have inspected the above temporary structure and I am satisfied that it
                                conforms to the above design. <br>
                                I consider that the temporary structure is ready to be loaded and taken into use. <br>
                                I confirm that I am authorised to issue a Permit to Load for this temporary structure.

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
                        <th>Principal Contractor Approval required</th>
                        <th>Y</th>
                    </thead>

                    <tbody style="margin-top: 10px;">
                        <tr>
                            <td>Principal Contractor Approval required</td>
                            <td> @if($data['principle_contractor']==1){{'Y'}}@else{{'N'}}@endif</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>


        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b> Name </b></label>
                        </td>
                        <td style="width:200px"> @if($data['principle_contractor']==1){{$data['name1']}}@endif</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b>
                                    Job Title </b></label></td>
                        <td style="width: 200px;"> @if($data['principle_contractor']==1){{$data['job_title1']}}@endif</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b> Company </b></label>
                        </td>
                        <td style="width: 200px;"> {{$data['company']}}</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;"><b>
                                    Signature </b></label></td>
                        <td style="width: 200px;">
                            @if(isset($image_name1) && $image_name1!='')
                            <img src="temporary/signature/{{$image_name1}}" width="40px" height="40px" />
                            @else
                            {{ $data['namesign1'] ?? ''}}
                            @endif
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Date </b></label>
                        </td>
                        <td style="width: 200px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Name </b></label></td>
                        <td style="width: 200px;">{{$data['name']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Job Title </b></label>
                        </td>
                        <td style="width: 200px;"> {{$data['job_title']}}</td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black;  margin: 0px;"><b>
                                    Company </b></label></td>
                        <td style="width: 200px;">{{$data['company']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Signature </b></label>
                        </td>
                        <td style="width: 200px;">
                            @if(isset($image_name) && $image_name!='')
                            <img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />
                            @else
                            {{ $data['namesign'] ?? ''}}
                            @endif
                        </td>
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Date </b></label></td>
                        <td style="width: 200px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>


                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</page>