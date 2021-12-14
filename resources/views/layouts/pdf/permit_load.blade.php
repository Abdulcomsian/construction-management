<style type="text/css">
    @font-face {
        font-family: "myFirstFont";
        src: url("/public/fonts/Calibri.ttf")format("truetype");
    }

    table {
        font-size: 12px;
        line-height: 16px;
        font-family: "myFirstFont";
    }

    table.page_header {
        width: 100%;
        border: none;
        background-color: #ffffff;
        border-bottom: solid 1mm #fff;
        padding: 2mm
    }

    table.page_footer {
        width: 100%;
        border: none;
        background-color: #ffffff;
        border-top: solid 1mm #fff;
        padding: 2mm
    }

    p {
        margin: 0 0 8px;
    }

    input {
        background: transparent;
        border: none;
    }
</style>


<page pageset="old">
    <table style="width: 100%; margin:0 auto; padding-top: 80px;">
        <tr>
            <td colspan="3" border="1" style="width: 15%; font-size: 18px; font-weight: 700; text-align: left; padding: 5px 10px;color: #000000;font-size: 14px;
            font-weight: 700;">
                <strong>
                    <h1>Permit to Load</h1>
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
                {{$data['date']}}
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
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Equipment/materials used as specified/fit for purpose</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">Y</button>
                <!-- <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button> -->
            </td>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Workmanship checked (i.e. all props, ties, struts, joints, stop-ends, checked)</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">Y</button>
                <!-- <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button> -->
            </td>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> TW checked to drawings/design output</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">Y</button>
                <!-- <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button> -->
            </td>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong>Loading /use limitations understood e.g. Rate of pour, sequence of loading, access/plant loading</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">Y</button>
                <!-- <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button> -->
            </td>

        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong>Approval by Temp Works Coordinator Required?<br>
                    completed Other criteria specified (e.g. strength of supporting structure, any back propping,<br>
                    ground tests, anchor tests) are checked and satisfied (IF YES, SPECIFY BELOW)</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['works_coordinator']==1)
                <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">Y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>

        </tr>
        <tr>
            @if($data['works_coordinator']==1)
            <td colspan="8" border="1" style=" width: 15%; padding: 20px 10px; border:1px solid #000000;border-radius: 3px;background-color: #F4F4F4; font-weight: 700; font-family: Noto Serif Malayalam;">
                {{$data['description_approval_temp_works']}}
            </td>
            @endif
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #000000;font-size: 14px;font-weight: bold;">
                <strong>PERMIT TO LOAD / USE <br>
                    I confirm that I have inspected the above temporary structure and I am satisfied that it conforms to the above <br>
                    I consider that the temporary structure is ready to be loaded and taken into use. <br>
                    I confirm that I am authorised to issue a Permit to Load for this temporary structure.
                </strong>
            </td>

        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong>Principal Contractor approval required?</strong>
            </td>
            <td border="1" style="text-align: right;;padding: 0px;border-radius: 3px;">
                @if($data['principle_contractor']==1)
                <button type="button" style="color: #164615; background-color: red;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 25px;">Y</button>
                @else
                <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;">N</button>
                @endif
            </td>

        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>

        <tr>
            @if($data['principle_contractor']==1)
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Name:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['name1']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Signature:</strong>
            </td>
            <td border="1" style="padding: 20%; width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                @if(isset($image_name1) && $image_name1!='')
                <img src="temporary/signature/{{$image_name1}}" width="40px" height="40px" />
                @else
                 {{ $data['namesign1'] ?? ''}} 
                @endif
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td rowspan="2" border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Job Title:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['job_title1']}}
            </td>
        </tr>
        @endif
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Name:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['name']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Signature:</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                 @if(isset($image_name) && $image_name!='')
                <img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />
                @else
                 {{ $data['namesign'] ?? ''}} 
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
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['job_title']}}
            </td>


        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Company:<strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['company']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong> Date:</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                {{$data['date']}}
            </td>
        </tr>
    </table>
</page>