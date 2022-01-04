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
                            <label for="" style="width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWC Name </b></label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['twc_name']}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWS Name </b>
                            </label>
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
                    <td style="width: 200px;background:gray;color:white;">
                        <label for="" style="width: 200px;padding: 10px;display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                Equipment/materials used as specified/fit for purpose </b></label>
                    </td>
                    <td style="width: 20px;">
                        @if($data['equipment_materials']==1)
                        <span style="font-size:12px;">Y</span>
                        @else
                        <span style="font-size:12px">N</span>
                        @endif
                    </td>
                    <td>
                        <span style="font-size: 12px;">{{$data['equipment_materials_desc']}}</span>
                    </td>
                </tr>

                <tr>
                    <td style="width: 200px;background:gray;color:white;">
                        <label for="" style="width: 200px;padding: 10px;display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                Workmanship checked</b></label>
                    </td>
                    <td style="width: 20px;">
                        @if($data['workmanship']==1)
                        <span style="font-size:12px;">Y</span>
                        @else
                        <span style="font-size:12px">N</span>
                        @endif
                    </td>
                    <td>
                        <span style="font-size: 12px;"> {{$data['workmanship_desc']}}</span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;background:gray;color:white;">
                        <label for="" style="width: 200px;padding: 10px;display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                TW checked to drawings/ design output</b></label>
                    </td>
                    <td style="width: 20px;">
                        @if($data['drawings_design']==1)
                        <span style="font-size:12px;">Y</span>
                        @else
                        <span style="font-size:12px">N</span>
                        @endif
                    </td>
                    <td>
                        <span style="font-size: 12px;"> {{$data['drawings_design_desc']}}</span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;background:gray;color:white;">
                        <label for="" style="width: 200px;padding: 10px;display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                Loading/use limitations understood eg. sequence of loading,access/plant loading</b></label>
                    </td>
                    <td style="width: 20px;">
                        @if($data['loading_limit']==1)
                        <span style="font-size:12px;">Y</span>
                        @else
                        <span style="font-size:12px">N</span>
                        @endif
                    </td>
                    <td>
                        <span style="font-size: 12px;">{{$data['loading_limit_desc']}}</span>
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
                        <td style="width:30%;background:gray;color:white;">
                            <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                                <b style="font-size: 12px;"> Even, stable ground?</b>
                            </label>
                        </td>

                        <td style="width:7%;">
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

                        <td></td>
                        <span style="font-size: 12px;">{{$check_comments['even_stable_comment'] ?? ''}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['base_Plates_comment'] ?? ''}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['sole_boards_comment'] ?? ''}}</span>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['undermined_comment'] ?? ''}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['Plumb_comment'] ?? ''}}</span>
                        </td>
                    </tr>




                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['staggered_joints_comment'] ?? ''}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['wrong_spacing_comment'] ?? ''}}</span>
                        </td>
                    </tr>





                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            {{$check_comments['damaged_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            {{$check_comments['trap_boards_comment'] ?? ''}}
                        </td>
                    </tr>



                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['trap_boards_comment'] ?? ''}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['incomplete_boarding_comment'] ?? ''}}</span>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['supports_ties_comment'] ?? ''}}</span>
                        </td>
                    </tr>



                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['insufficient_length_comment'] ?? ''}}</span>
                        </td>
                    </tr>



                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            {{$check_comments['missing_loose_comment'] ?? ''}}
                        </td>
                    </tr>


                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['wrong_fittings_comment'] ?? ''}}</span>
                        </td>
                    </tr>


                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['not_level_comment'] ?? ''}}</span>
                        </td>
                    </tr>



                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['joined_same_bays_comment'] ?? ''}}</span>
                        </td>
                    </tr>




                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['loose_damaged_comment'] ?? ''}}</span>
                        </td>
                    </tr>



                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            {{$check_comments['wrong_height_comment'] ?? ''}}
                        </td>
                    </tr>




                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['some_missing_comment'] ?? ''}}</span>
                        </td>
                    </tr>



                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['partially_removed_comment'] ?? ''}}</span>
                        </td>
                    </tr>





                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['loose_damaged_broken_comment'] ?? ''}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%;background:gray;color:white;">
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

                        <td>
                            <span style="font-size: 12px;">{{$check_comments['other_comment'] ?? ''}}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>











    <!-- old work below  -->
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

    <!-- new work of -->
    <div class="tableDiv paddingTable" style="margin: 20px 0px;">
        <table>
            <tbody>
                <tr>
                    <td style="width:30%;background:gray;color:white;">
                        <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Inspected by:</b></label>
                    </td>
                    <td style="font-size:12px;"> {{$data['inspected_by']}}</td>
                    <td style="width:30%;background:gray;color:white;">
                        <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Scaff-tag signed and displayed?</b></label>
                    </td>
                    <td style="font-size:12px;">
                        @if($data['Scaff_tag_signed']==1)
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                        @else
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="width:30%;background:gray;color:white;">
                        <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;"> Job Title:</b></label>
                    </td>
                    <td style="font-size:12px;">
                        {{$data['job_title']}}
                    </td>
                    <td style="width:30%;background:gray;color:white;">
                        <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Are you competent to carry out inspection?</b></label>
                    </td>
                    <td style="font-size:12px;">
                        @if($data['carry_out_inspection']==1)
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">y</button>
                        @else
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="width:30%;background:gray;color:white;">
                        <label for="" style="float: left;width: 400px; height: 70p1; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Company</b></label>
                    </td>
                    <td style="font-size:12px;"> {{$data['company'] ?? ''}}</td>
                    <td style="width:30%;background:gray;color:white;">
                        <label for="" style="float: left;width: 400px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Date</b></label>
                    </td>
                    <td style="font-size:12px;"> {{ date('d-m-Y',strtotime($data['date']))}}</td>
                </tr>
                <tr>
                    <td style="width:30%;background:gray;color:white;">
                        <label for="" style="float: left;width: 400px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Signature</b></label>
                    </td>
                    <td colspan="3" style="font-size:12px;">
                        @if($data['signtype']=='1'){{ucwords($data['namesign'])}}@else<img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />@endif
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</page>