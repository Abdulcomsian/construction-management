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
                <h3>Permit to Unload / Strike</h3>
                <p style="width:200px !important;font-size: 12px;">{{$data['permit_no']}}&nbsp;&nbsp;{{$data['design_requirement_text']}}</p>
            </div>
            
            <div class="logo" style="float:right;width:20%;">
                @php
                $logodata=\App\Models\User::where('id',$data['companyid'])->first();
                @endphp
                @if($logodata->image != NULL)
                <img src="{{public_path($logodata->image)}}" width="auto" height="80px" />
                @endif
            </div>

        </div>
        <br>
        <div class="tableDiv paddingTable">
            <table>
                <tbody>
                    <tr>
                        <td style="width:150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Project
                                    Name</b> </label>
                        </td>
                        <td style=" font-size: 12px;"> {{$data['projname']}}</td>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Date</b> </label>
                        </td>
                        <td style="font-size: 12px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;">
                                <b style="font-size: 12px;"> Project No </b> </label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['projno']}}</td>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Permit No </b><label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['permit_no']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">Drawing No</b> </label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['drawing_no']}}</td>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Drawing Title </b></label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['drawing_title']}}</td>
                    </tr>

                    <tr>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">TWC Name</b> </label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['twc_name']}}</td>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 150px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWS Name </b></label>
                        </td>
                        <td style="font-size: 12px;"> {{$data['tws_name']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 350px; border: 1px solid black; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf;color: black; margin: 0px;"><b style="font-size: 12px;">
                                    Location of the temporary works</b> </label>
                        </td>
                        <td colspan="3"><span style="font-size: 12px;">{{$data['location_temp_work']}}</span></td>

                    </tr>
                    <tr>
                        <td style="width: 150px;background:gray;color:white;">
                        <label for="" style="width: 400px;border: 1px solid black; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;"><b style="font-size: 12px;">Description of structure </label>
                        </td>
                        <td  colspan="3"><span style="font-size: 12px;">{{$data['description_structure']}}</span></td>

                    </tr>
                    <tr>
                        <td style="width: 150px;background:gray;color:white;">
                            <label for="" style="width: 400px;border: 1px solid black; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;"><b style="font-size: 12px;">
                                    MS/RA number</b> </label>
                        </td>
                        <td colspan="3"><span style="font-size: 12px;">{{$data['ms_ra_no']}}</span></td>

                    </tr>

                </tbody>
            </table>
        </div>
        <div class="table paddingTable">
            <table>
                <thead>
                    <tr>
                        <th style="font-size: 12px;">CONCRETE CUBE RESULTS (or overwrite with strength by maturity curve data)</th>
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
                    <th style="font-size: 12px;">Back-propping and additional requirements; limitations and exclusions; explanatory sketches references (if applicable)</th>
                </tr>
            </table>
            <table>
                <tr>
                    <th style="height: 50px;"></th>
                </tr>
            </table>
        </div>
        <br>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="font-size: 12px;">
                            <label for="" style="width: 100%;color: black; border: 1px solid; padding: 10px;">
                                <h4 style="text-align: center; font-size:12px;">Permit to Unload / Strike</h4>
                                <ul>
                                    <li>Permanent works support by this temporary works have gained sufficient strength   to support the loading or use &nbsp;&nbsp;&nbsp;requirement. (See concrete cube results and other PW design requirements below, if applicable.)</li>
                                    <li>Sequence of removal of TW, where specified by the TWD, is understood by the supervisor.</li>
                                    <li>All standard safety measure executed (i.e. holes covered and protected, leading edge protection, etc).</li>
                                    <li>Risk assessment, method statement and/or associated task sheets in place.</li>
                                </ul>
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
                                <td style="font-size: 12px;">Principal contractor approval required?</td>
                                <td style="font-size: 12px;"> @if($principle_contractor==1){{'Y'}}@else{{'N'}}@endif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="tableDiv paddingTable" style="margin-top: 5px">
            <table>
                <tbody>
                    <tr>
                            <td style="font-size:12px;">Comments</td>
                            <td style="font-size:12px;"> {{$data['comments']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size: 12px;"> Name </b></label>
                        </td>
                        <td style="width: 200px; font-size: 12px;"> {{$data['name']}}</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Name</b></label></td>
                        <td style="width: 200px; font-size: 12px;">@if($principle_contractor==1){{$data['name1']}}@endif</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size: 12px;"> Job Title </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;">{{$data['job_title']}}</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;"><b style="font-size: 12px;">
                                    Job Title </b></label></td>
                        <td style="width: 200px; font-size:12px;">@if($principle_contractor==1){{$data['job_title1']}}@endif</td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Company</b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;"> {{$data['company']}}</td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Company</b></label></td>
                        <td style="width: 200px; font-size:12px;">@if($principle_contractor==1) {{$data['company1']}}@endif</td>


                    </tr>
                    <tr>
                        <td>
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Signature </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px">
                        @if(isset($image_name) && $image_name!='')
                            <img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />
                            @else
                            {{ $data['namesign'] ?? ''}}
                             @endif
                        </td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black;  margin: 0px;"><b style="font-size: 12px;">
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
                            <label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Date </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;">
                            {{ date('d-m-Y', strtotime($data['date1'])) }}
                        </td>
                        <td><label for="" style="width: 200px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size: 12px;">
                                    Date </b></label></td>
                        <td style="width: 200px; font-size:12px;">
                            @if($principle_contractor==1){{ date('d-m-Y', strtotime($data['date2'])) }}@endif
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        @if(isset($image_links))
        <div class="tableDiv paddingTable" style="margin: 5px">
            <table>
                <tbody>
                @foreach($image_links as $image)
                @php 
                    $n = strrpos($image, '.');
                    $ext=substr($image, $n+1);
                     
                @endphp
                    <tr>
                        <td>
                            @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                            <img src="{{$image}}" width="500" alt="img"/>
                            @else
                            <a href="{{asset($image)}}" target="_blank">Attachment</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</page>
