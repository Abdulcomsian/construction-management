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
                <h3>Scaffolding Inspection Permit to Load</h3>
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
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWS Name </b></label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['tws_name']}}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color: black; margin: 0px;"><b style="font-size: 12px;">
                                    Location of the Temporary Works (Area)</b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['location_temp_work']}}</span></td>

                    </tr>
                    <tr>
                        <td style="width: 300px;background:gray;color:white;">
                            <label for="" style="width: 400px; height: 70px;border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b style="font-size: 12px;">Description
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
                <tr>
                    <td style="width: 300px;color:black;border:none">Comments</td>
                </tr>
                <tr>
                    <td style="width: 20%;background:gray;color:white;">
                        <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                            <b style="font-size: 12px;">
                                Equipment/materials used as specified/fit for purpose</b>
                        </label>
                    </td>
                    <td style="width:5%;">
                        <span style="font-size: 12px;">
                            @if($data['equipment_materials']==1)
                            <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;">Y</button>
                            @else
                            <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none;">N</button>
                            @endif
                    </td>

                    <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                        {{$data['equipment_materials_desc']}}
                    </td>
                <tr>
                    <td style="width: 20%;background:gray;color:white;">
                        <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                            <b style="font-size: 12px;"> Workmanship checked</b>
                    </td>


                    <td style="width:5%;">
                        <span style="font-size: 12px;">
                            @if($data['workmanship']==1)
                            <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;    margin-right: 40px !important; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                            @else
                            <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px;    margin-right: 15px;    margin-right: 15px; font-weight: 700; font-size:12px;">N</button>
                            @endif
                        </span>
                    </td>

                    <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                        {{$data['workmanship_desc']}}
                    </td>
                <tr>
                    <td style="width: 20%;background:gray;color:white;">
                        <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                            <b style="font-size: 12px;"> TW checked to drawings/ design output</b>
                    </td>


                    <td style="width:5%;">
                        <span style="font-size: 12px;">
                            @if($data['drawings_design']==1)
                            <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;    margin-right: 40px !important; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                            @else
                            <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px;    margin-right: 15px;    margin-right: 15px; font-weight: 700; font-size:12px;">N</button>
                            @endif
                        </span>
                    </td>

                    <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                        {{$data['drawings_design_desc']}}
                    </td>
                <tr>
                    <td style="width: 20%;background:gray;color:white;">
                        <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                            <b style="font-size: 12px;"> Loading/use limitations understood eg. sequence of loading,access/plant loading</b>
                    </td>


                    <td style="width:5%;">
                        <span style="font-size: 12px;">
                            @if($data['loading_limit']==1)
                            <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;    margin-right: 40px !important; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                            @else
                            <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px;    margin-right: 15px;    margin-right: 15px; font-weight: 700; font-size:12px;">N</button>
                            @endif
                        </span>
                    </td>

                    <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                        {{$data['loading_limit_desc']}}
                    </td>
                </tr>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tr>
                    <td style="width: 300px;color:black;border:none">
                        <strong>Inspect each of the following items & tick off in the box provided if installed correctly as per the design. Where actions are required, identify with a number & detail comments in the space provided below.</strong>
                    </td>
                </tr>

            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Even, stable ground?</b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['even_stable_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">y</button>
                                @elseif($check_radios['even_stable_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>
                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['even_stable_comment'] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Base Plates? </b>
                            </label>

                        </td>
                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['base_Plates_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['base_Plates_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['base_Plates_comment'] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Sole boards?</b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['sole_boards_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['sole_boards_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['sole_boards_comment'] ?? ''}}
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Undermined?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['undermined_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['undermined_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['undermined_comment'] ?? ''}}
                        </td>
                    </tr>


                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Plumb?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['Plumb_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['Plumb_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['Plumb_comment'] ?? ''}}
                        </td>
                    </tr>




                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Staggered joints?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['staggered_joints_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['staggered_joints_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['staggered_joints_comment'] ?? ''}}
                        </td>
                    </tr>


                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Wrong spacing?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['wrong_spacing_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['wrong_spacing_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['wrong_spacing_comment'] ?? ''}}
                        </td>
                    </tr>





                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Damaged?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['damaged_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['damaged_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['damaged_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Damaged?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['trap_boards_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['trap_boards_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['trap_boards_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Trap boards?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['trap_boards_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['trap_boards_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['trap_boards_comment'] ?? ''}}
                        </td>
                    </tr>


                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Incomplete boarding?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['incomplete_boarding_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['incomplete_boarding_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['incomplete_boarding_comment'] ?? ''}}
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Insufficient supports / ties?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['supports_ties_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['supports_ties_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['supports_ties_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Insufficient length?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['insufficient_length_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['insufficient_length_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['insufficient_length_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Any missing or loose?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['missing_loose_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['missing_loose_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['missing_loose_comment'] ?? ''}}
                        </td>
                    </tr>


                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Wrong fittings?

                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['wrong_fittings_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['wrong_fittings_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['wrong_fittings_comment'] ?? ''}}
                        </td>
                    </tr>


                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Not level?

                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['not_level_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['not_level_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['not_level_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Joined in same bays?

                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['joined_same_bays_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['joined_same_bays_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['joined_same_bays_comment'] ?? ''}}
                        </td>
                    </tr>




                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Loose or damaged?

                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['loose_damaged_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['loose_damaged_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['loose_damaged_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Wrong height?

                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['wrong_height_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['wrong_height_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['wrong_height_comment'] ?? ''}}
                        </td>
                    </tr>




                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Any missing or loose?

                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['some_missing_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['some_missing_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['some_missing_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Damaged?

                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['partially_removed_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['partially_removed_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['partially_removed_comment'] ?? ''}}
                        </td>
                    </tr>





                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;">Loose damaged or broken?
                                </b></label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['loose_damaged_broken_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['loose_damaged_broken_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['loose_damaged_broken_comment'] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> OTHER?Any further actions necessary?
                                </b>
                            </label>
                        </td>

                        <td style="width:10%;">
                            <span style="font-size: 12px;">
                                @if($check_radios['other_radio']=="1")
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                                @elseif($check_radios['other_radio']=="2")
                                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                                @else
                                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                                @endif
                            </span>

                        </td>

                        <td colspan="4" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                            {{$check_comments['other_comment'] ?? ''}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>











    <!-- old work below  -->

    {{--<table style="width: 100%; margin:0 auto; padding-top: 80px;">
        <tr>
            <td colspan="3" border="1" style="width: 15%; font-size: 18px; font-weight: 700; text-align: left; padding: 5px 10px;color: #000000;font-size: 14px;
            font-weight: 700;">
                <strong>
                    <h1>Scaffolding Inspection Permit to Load</h1>
                </strong>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Project No.:</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['projno']}}
    </td>

    <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
    </td>

    <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
        <strong> Date:</strong>
    </td>
    <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
        <!-- {{$data['date']}} -->
        {{ date('d-m-Y', strtotime($data['date'])) }}
    </td>
    </tr>

    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> Project Name:</strong>
        </td>
        <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['projname']}}
        </td>

        <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
        </td>

        <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> Permit Number:</strong>
        </td>
        <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['permit_no']}}
        </td>
    </tr>


    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> Drwaing Number:</strong>
        </td>
        <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['drawing_no']}}
        </td>

        <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
        </td>

        <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> Drawing Title:</strong>
        </td>
        <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['drawing_title']}}
        </td>
    </tr>


    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> TWC Name:</strong>
        </td>
        <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['twc_name']}}
        </td>

        <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
        </td>

        <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> TWS Name:</strong>
        </td>
        <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['tws_name']}}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> Location of the Temporary Works (Area):</strong>
        </td>
        <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['location_temp_work']}}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> Description of Structure which is ready for use:</strong>
        </td>
        <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['description_structure']}}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong> MS/RA Number:</strong>
        </td>
        <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
            {{$data['ms_ra_no']}}
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>

    </table>

    <table>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style=" position: absolute;right: 320;width: 80px; bottom: 248; font-size: 18px;">Comments</td>

        </tr>


        <tr>
            <td colspan="" 2 border="1" style="width: 12%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Equipment/materials used as specified/fit for purpose</strong>
            </td>

            <td border="1" style="width:15%; text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['equipment_materials']==1)
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;    margin-right: 40px !important; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">Y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px;    margin-right: 15px;    margin-right: 15px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>

            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['equipment_materials_desc']}}
            </td>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="" 2 border="1" style="width: 12%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Workmanship checked</strong>
            </td>


            <td border="1" style="width:15%; text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['workmanship']==1)
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;    margin-right: 40px !important; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px;    margin-right: 15px;    margin-right: 15px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>

            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['workmanship_desc']}}
            </td>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="" 2 border="1" style="width: 12%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
             font-weight: 700;">
                <strong> TW checked to drawings/ design output</strong>
            </td>


            <td border="1" style="width:15%; text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['drawings_design']==1)
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;    margin-right: 40px !important; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px;    margin-right: 15px;    margin-right: 15px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>

            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['drawings_design_desc']}}
            </td>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="" 2 border="1" style="width: 19%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
              font-weight: 700;">
                <strong> Loading/use limitations understood eg. sequence of loading,access/plant loading</strong>
            </td>


            <td border="1" style="width:15%; text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['loading_limit']==1)
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none;    margin-right: 40px !important; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px;    margin-right: 15px;    margin-right: 15px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>

            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['loading_limit_desc']}}
            </td>


        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

    <table>
        <tr>
            <td>&nbsp;</td>
        </tr>

        <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
            <strong>Inspect each of the following items & tick off in the box provided if installed correctly as per the design. Where actions are required, identify with a number & detail comments in the space provided below.</strong>
        </td>

    </table>


    <table>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Even, stable ground?</strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['even_stable_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">y</button>
                @elseif($check_radios['even_stable_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif
            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['even_stable_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong>Base Plates? </strong>

            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['base_Plates_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['base_Plates_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif
            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['base_Plates_comment'] ?? ''}}
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Sole boards?</strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['sole_boards_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['sole_boards_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['sole_boards_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong>Undermined?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['undermined_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['undermined_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['undermined_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Plumb?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['Plumb_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['Plumb_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['Plumb_comment'] ?? ''}}
            </td>
        </tr>



        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong>Staggered joints?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['staggered_joints_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['staggered_joints_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['staggered_joints_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Wrong spacing?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['wrong_spacing_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['wrong_spacing_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['wrong_spacing_comment'] ?? ''}}
            </td>
        </tr>



        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Damaged?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['damaged_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['damaged_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['damaged_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Damaged?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['trap_boards_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['trap_boards_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['trap_boards_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Trap boards?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['trap_boards_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['trap_boards_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['trap_boards_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong>Incomplete boarding?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['incomplete_boarding_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['incomplete_boarding_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['incomplete_boarding_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Insufficient supports / ties?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['supports_ties_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['supports_ties_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['supports_ties_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong>Insufficient length?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['insufficient_length_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['insufficient_length_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['insufficient_length_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Any missing or loose?
                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['missing_loose_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['missing_loose_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['missing_loose_comment'] ?? ''}}
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Wrong fittings?

                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['wrong_fittings_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['wrong_fittings_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['wrong_fittings_comment'] ?? ''}}
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Not level?

                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['not_level_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['not_level_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['not_level_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Joined in same bays?

                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['joined_same_bays_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['joined_same_bays_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['joined_same_bays_comment'] ?? ''}}
            </td>
        </tr>



        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong>Loose or damaged?

                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['loose_damaged_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['loose_damaged_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['loose_damaged_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Wrong height?

                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['wrong_height_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['wrong_height_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['wrong_height_comment'] ?? ''}}
            </td>
        </tr>



        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong> Any missing or loose?

                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['some_missing_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['some_missing_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['some_missing_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
                 font-weight: 700;">
                <strong>Damaged?

                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['partially_removed_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['partially_removed_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['partially_removed_comment'] ?? ''}}
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
             font-weight: 700;">
                <strong>Loose damaged or broken?



                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['loose_damaged_broken_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['loose_damaged_broken_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['loose_damaged_broken_comment'] ?? ''}}
            </td>
        </tr>



        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td colspan="" 2 border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
             font-weight: 700;">
                <strong> OTHER?Any further actions necessary?



                </strong>
            </td>

            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($check_radios['other_radio']=="1")
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                @elseif($check_radios['other_radio']=="2")
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                @else
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">N/A</button>
                @endif

            </td>

            <td colspan="3" border="1" style="width: 50%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$check_comments['other_comment'] ?? ''}}
            </td>
        </tr>
    </table>--}}

    <table style="border: 1px solid black;width: 100%;">


        <tr>
            <td style="width:12%; "></td>
            <td style="width:40%;">COMMENTS/ACTIONS </td>
            <td style=" width:20%; "></td>
        </tr>


        <tr style=" border:1px solid black;">
            </td>
            <td style=" border:1px solid black;">NO</td>
            <td style=" border:1px solid black;">COMMENTS/ACTIONS REQUIRES</td>
            <td style=" border:1px solid black;">Date Completed</td>
        </tr>
        @php
        for($i=0;$i<count($data['no']);$i++){@endphp <tr>

            <td style=" border:1px solid black;">{{$data['no'][$i]}}</td>
            <td style=" border:1px solid black;">{{$data['desc_actions'][$i]}}</td>
            <td style=" border:1px solid black;">
                <!-- {{$data['action_date'][$i]}} -->
                {{ date('d-m-Y', strtotime($data['action_date'][$i])) }}
            </td>
            </tr>
            @php }
            @endphp
    </table>

    <table style="width: 100%;">


        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Inspected by:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 12px 10px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['inspected_by']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td colspan="1" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong>Scaff-tag signed and displayed?</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['Scaff_tag_signed']==1)
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Job Title:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['job_title']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td colspan="1" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong>Are you competent to carry out inspection?</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['carry_out_inspection']==1)
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td rowspan="2" border="1" style="width: 15%; text-align: left; padding: 5px 10px; color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Company:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 12px 10px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['company']}}
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 12px 10px;color: #C5BCBC;font-size: 14px; font-weight: 700;">
                <strong> Signature:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                @if($data['signtype']=='1'){{$data['namesign']}}@else<img src="temporary/signature/{{$image_name}}" width="100px" height="100px" />@endif
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Date:</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 12px 10px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['date']}}
            </td>
        </tr>

    </table>

</page>