<style>
    table,
    td,
    th {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }
</style>
<page pageset="old">
    <div style="padding: 30px; width: 100%; max-width: 70%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText">
                <h3>Permit to UnLoad/Strike</h3>
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
                                    Name</b> </label>
                        </td>
                        <td style="width: 200px;"> {{$data['projname']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b>
                                    Date</b> </label>
                        </td>
                        <td style="width: 200px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;">
                                <b> Project Number </b> </label>
                        </td>
                        <td style="width: 200px;"> {{$data['projno']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b>
                                    Permit Number </b><label>
                        </td>
                        <td style="width: 200px;"> {{$data['permit_no']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b>Drawing Number</b> </label>
                        </td>
                        <td style="width: 200px;"> {{$data['drawing_no']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b>
                                    Drawing Title </b></label>
                        </td>
                        <td style="width: 200px;"> {{$data['drawing_title']}}</td>
                    </tr>

                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b>TWC Name</b> </label>
                        </td>
                        <td style="width: 200px;"> {{$data['twc_name']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b>
                                    TWS Name </b></label>
                        </td>
                        <td style="width: 200px;"> {{$data['tws_name']}}</td>
                    </tr>

                </tbody>
            </table>
        </div>




        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b>Location of the Temporary Works (Area)</b> </label>
                        </td>
                        <td> {{$data['location_temp_work']}}</td>

                    </tr>

                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b>Description
                                    of the structure which is ready for use</b> </label>
                        </td>
                        <td> {{$data['description_structure']}}</td>

                    </tr>
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
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>CONCRETE CUBE RESULTS (OR OVER-WRITE WITH STRENGTH BY MATURITY CURVE DATA)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <table>

                <thead>
                    <tr style="background-color: black;color: white;">
                        <td>Mix Design Details</td>
                        <td>Unique Cube Ref. No.</td>
                        <td>Age of Cube</td>
                        <td>Compressive Strength N/mm2</td>
                        <td>Method of Curing</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$data['mix_design_detail']}}</td>
                        <td>{{$data['unique_ref_no']}}</td>
                        <td>{{$data['age_cube']}}</td>
                        <td>{{$data['compressive_strength']}}</td>
                        <td>{{$data['method_curing']}}</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tr>
                    <th>TWC to define the extents, limits and controls for this PTS (where applicable)
                    </th>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Back-propping and additional requirements; limitations & exclusions; explanatory sketch references - if applicable:</th>
                </tr>
            </table>
            <table>
                <tr>
                    <th style="height: 50px;"></th>
                </tr>
            </table>
        </div>
        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 100%;color: black; border: 1px solid; padding: 10px;">
                                <h4 style="text-align: center;">Permit to UNLOAD/STRIKE</h4>
                                1. Permanent Works supported by the above item of Temporary Works have gained sufficient strength to support the loading/use permitted (See concrete cube results below – or state any other PW design requirements if applicable) <br>
                                2. Sequence of removal of TW, where specified by the TWD, is understood by the supervisor. <br>
                                3. All standard safety measures executed i.e., holes covered and protected, leading edge protection etc <br>
                                4. Risk Assessment, Method Statement and or associated Task Sheets in place
                            </label>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="multiDiv" style="display: flex; justify-content: space-between; margin: 30px 0px;">
            <div class="leftDiv" style="width: 100%;">
                <div class="inputDiv">
                    <table style="margin-top: -10px;">
                        <thead style="margin-top: -10px;">
                            <th>Principal Contractor Approval required</th>
                            <th>Y</th>
                        </thead>

                        <tbody style="margin-top: -10px;">
                            <tr>
                                <td>Principal Contractor Approval required</td>
                                <td> @if($data['principle_contractor']==1){{'Y'}}@else{{'N'}}@endif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <div class="tableDiv" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b> Name </b></label>
                        </td>
                        <td style="width: 200px;"> @if($data['principle_contractor']==1){{$data['name1']}}@endif</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b>
                                    Name</b></label></td>
                        <td style="width: 200px;">{{$data['name']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b> Job Title </b></label>
                        </td>
                        <td style="width: 200px;"> @if($data['principle_contractor']==1){{$data['job_title1']}}@endif</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;"><b>
                                    Job Title </b></label></td>
                        <td style="width: 200px;">{{$data['job_title']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Company</b></label>
                        </td>
                        <td style="width: 200px;"> {{$data['company']}}</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Company</b></label></td>
                        <td style="width: 200px;"> {{$data['company']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Signature </b></label>
                        </td>
                        <td style="width: 200px;">
                            @if(isset($image_name1) && $image_name1!='')
                            <img src="temporary/signature/{{$image_name1}}" width="40px" height="40px" />
                            @endif
                        </td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black;  margin: 0px;"><b>
                                    Signature </b></label></td>
                        <td style="width: 200px;">
                            <img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Date </b></label>
                        </td>
                        <td style="width: 200px;">
                            {{ date('d-m-Y', strtotime($data['date'])) }}
                        </td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b>
                                    Date </b></label></td>
                        <td style="width: 200px;">
                            {{ date('d-m-Y', strtotime($data['date'])) }}
                        </td>


                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</page>