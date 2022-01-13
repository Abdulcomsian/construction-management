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

    .paddingTable td {
        padding: 10px;
    }
</style>
<page pageset="old">
    <div style="padding: 10px; width: 100%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText" style="float:left;width:70%">
                <h3>Permit to UnLoad/Strike</h3>
            </div>
            <div class="logo" style="float:right;width:20%;">
                @php
                $logodata=\App\Models\User::where('id',$data['companyid'])->first();
                @endphp
                @if($logodata->image != NULL)
                <img src="{{public_path($logodata->image)}}" width="80px" height="80px" />
                @else
                <img src="{{public_path('uploads/logo/ctw-02-2.png')}}" width="80px" height="80px" />
                @endif
            </div>

        </div>
        <br>
        <div class="tableDiv paddingTable">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Project
                                    Name</b> </label>
                        </td>
                        <td style="width: 200px; font-size: 12px;"> {{$data['projname']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Date</b> </label>
                        </td>
                        <td style="width: 200px;font-size: 12px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;">
                                <b style="font-size: 12px;"> Project Number </b> </label>
                        </td>
                        <td style="width: 200px;font-size: 12px;"> {{$data['projno']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Permit Number </b><label>
                        </td>
                        <td style="width: 200px;font-size: 12px;"> {{$data['permit_no']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">Drawing Number</b> </label>
                        </td>
                        <td style="width: 200px;font-size: 12px;"> {{$data['drawing_no']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Drawing Title </b></label>
                        </td>
                        <td style="width: 200px;font-size: 12px;"> {{$data['drawing_title']}}</td>
                    </tr>

                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">TWC Name</b> </label>
                        </td>
                        <td style="width: 200px;font-size: 12px;"> {{$data['twc_name']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWS Name </b></label>
                        </td>
                        <td style="width: 200px;font-size: 12px;"> {{$data['tws_name']}}</td>
                    </tr>

                </tbody>
            </table>
        </div>




        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b style="font-size: 12px;">Location of the Temporary Works (Area)</b> </label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['location_temp_work']}}</td>

                    </tr>

                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b style="font-size: 12px;">Description
                                    of the structure which is ready for use</b> </label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['description_structure']}}</td>

                    </tr>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px;border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;"><b style="font-size: 12px;">
                                    MS/RA number</b> </label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['ms_ra_no']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table paddingTable">
            <table>
                <thead>
                    <tr>
                        <th style="font-size: 12px;">CONCRETE CUBE RESULTS (OR OVER-WRITE WITH STRENGTH BY MATURITY CURVE DATA)</th>
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
                        <td style="font-size: 12px; color: #fff;">Mix Design Details</td>
                        <td style="font-size: 12px; color: #fff;">Unique Cube Ref. No.</td>
                        <td style="font-size: 12px; color: #fff;">Age of Cube</td>
                        <td style="font-size: 12px; color: #fff;">Compressive Strength N/mm2</td>
                        <td style="font-size: 12px; color: #fff;">Method of Curing</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="font-size: 12px;">{{$data['mix_design_detail']}}</td>
                        <td style="font-size: 12px;">{{$data['unique_ref_no']}}</td>
                        <td style="font-size: 12px;">{{$data['age_cube']}}</td>
                        <td style="font-size: 12px;">{{$data['compressive_strength']}}</td>
                        <td style="font-size: 12px;">{{$data['method_curing']}}</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tr>
                    <th style="font-size: 12px;">TWC to define the extents, limits and controls for this PTS (where applicable)
                    </th>
                </tr>
            </table>
            <table>
                <tr>
                    <th style="font-size: 12px;">Back-propping and additional requirements; limitations & exclusions; explanatory sketch references - if applicable:</th>
                </tr>
            </table>
            <table>
                <tr>
                    <th style="height: 50px;"></th>
                </tr>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="font-size: 12px;">
                            <label for="" style="width: 100%;color: black; border: 1px solid; padding: 10px;">
                                <h4 style="text-align: center; font-size:12px;">Permit to UNLOAD/STRIKE</h4>
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
                <div class="inputDiv paddingTable">
                    <table style="margin-top: -10px;">
                        <thead style="margin-top: -10px;">
                            <th style="font-size: 12px;">Principal Contractor Approval required</th>
                            <th style="font-size: 12px;">Y</th>
                        </thead>

                        <tbody style="margin-top: -10px;">
                            <tr>
                                <td style="font-size: 12px;">Principal Contractor Approval required</td>
                                <td style="font-size: 12px;"> @if($data['principle_contractor']==1){{'Y'}}@else{{'N'}}@endif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size: 12px;"> Name </b></label>
                        </td>
                        <td style="width: 200px; font-size: 12px;"> @if($data['principle_contractor']==1){{$data['name1']}}@endif</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Name</b></label></td>
                        <td style="width: 200px; font-size: 12px;">{{$data['name']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size: 12px;"> Job Title </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;"> @if($data['principle_contractor']==1){{$data['job_title1']}}@endif</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;"><b style="font-size: 12px;">
                                    Job Title </b></label></td>
                        <td style="width: 200px; font-size:12px;">{{$data['job_title']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Company</b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;"> {{$data['company']}}</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Company</b></label></td>
                        <td style="width: 200px; font-size:12px;"> {{$data['company']}}</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Signature </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px">
                            @if(isset($image_name1) && $image_name1!='')
                            <img src="temporary/signature/{{$image_name1}}" width="40px" height="40px" />
                            @endif
                        </td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black;  margin: 0px;"><b style="font-size: 12px;">
                                    Signature </b></label></td>
                        <td style="width: 200px; font-size:12px;">
                            <img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Date </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;">
                            {{ date('d-m-Y', strtotime($data['date'])) }}
                        </td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Date </b></label></td>
                        <td style="width: 200px; font-size:12px;">
                            {{ date('d-m-Y', strtotime($data['date'])) }}
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</page>
