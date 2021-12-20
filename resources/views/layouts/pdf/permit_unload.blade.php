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
                    <h1>Permit to UnLoad</h1>
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

            <!-- <td  border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td> -->

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

            <!-- <td  border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td> -->

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

            <!-- <td  border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>
 -->
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
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #000000;font-size: 14px;font-weight: bold;">
                <strong>Permit to unload/Strike <br>
                    1. Permanent Works supported by the above item of Temporary Works have gained sufficient strength to support the loading/use permitted (See concrete cube results below – or state any other PW design requirements if applicable) <br>
                    2. Sequence of removal of TW, where specified by the TWD, is understood by the supervisor. <br>
                    3. All standard safety measures executed i.e., holes covered and protected, leading edge protection etc <br>
                    4. Risk Assessment, Method Statement and or associated Task Sheets in place
                </strong>
            </td>

        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td style="width:25%;"> CONCRETE CUBE RESULTS (OR OVER-WRITE WITH STRENGTH BY MATURITY CURVE DATA)</td>
            <td style="width:20%; ;"></td>
            <td style="width:30%;width:10%;"></td>
        </tr>
        <tr>
            <td style="width:15%; border:1px solid black;">Mix Design Details</td>
            <td style="width:15%; border:1px solid black;">Unique Cube Ref No.</td>
            <td style="width:15%; border:1px solid black;">Age of Cube</td>
            <td style="width:15%; border:1px solid black;">Compressive Strength N/mm2</td>
            <td style="width:50%; border:1px solid black;">Method of Curing</td>
        </tr>

        <tr style=" border:1px solid black;">
            <td style=" border:1px solid black;">{{$data['mix_design_detail']}}</td>
            <td style=" border:1px solid black;">{{$data['unique_ref_no']}}</td>
            <td style=" border:1px solid black;">{{$data['age_cube']}}</td>
            <td style=" border:1px solid black;">{{$data['compressive_strength']}}</td>
            <td style=" border:1px solid black;">{{$data['method_curing']}}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong>TWC to define the extents, limits and controls for this PTS (where applicable)</strong>
            </td>
        </tr>
        <tr>
            <td colspan="8" border="1" style=" width: 15%; padding: 20px 10px; border:1px solid #000000;border-radius: 3px;background-color: #F4F4F4; font-weight: 700; font-family: Noto Serif Malayalam;">
                {{$data['twc_control_pts']}}
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 14px;
            font-weight: 700;">
                <strong>Back-propping and additional requirements; limitations and exclusions; explanatory sketches refrences - if applicable</strong>
            </td>
        </tr>
        <tr>
            <td colspan="8" border="1" style=" width: 15%; padding: 20px 10px; border:1px solid #000000;border-radius: 3px;background-color: #F4F4F4; font-weight: 700; font-family: Noto Serif Malayalam;">
                {{$data['back_propping']}}
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" border="1" style=" text-align: left; padding: 5px 10px;color: #000000;font-size: 14px;font-weight: bold;">
                <p>I hereby authorise the Temporary Works to be struck out/removed in accordance with the specified/approved unloading & striking method, subject to observing the extents, limits and controls listed above.
                </p>
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
                <strong> Signiture:</strong>
            </td>
            <td border="1" style="padding: 20%; width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                @if(isset($image_name1) && $image_name1!='')
                <img src="temporary/signature/{{$image_name1}}" width="40px" height="40px" />
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
                <strong> Signiture:</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid #000000;padding: 0 10px;border-radius: 3px;background-color: #F4F4F4; font-weight: 700;">
                <img src="temporary/signature/{{$image_name}}" width="40px" height="40px" />
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
                <!-- {{$data['date']}} -->
                {{ date('d-m-Y', strtotime($data['date'])) }}
            </td>
        </tr>
    </table>
</page>