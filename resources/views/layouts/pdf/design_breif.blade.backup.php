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

    tr.spacer>td {
        padding-bottom: 1em;
    }
</style>


<page pageset="old">
    <center><strong style="margin-left:20px;">Design Brief:{{ $twc_id_no}}</strong></center>
    <table style="width: 100%; margin:0 auto; padding-top: 50px;">
        <tr>
            <td border="1" style="width: 20%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> Project No.:</strong>
            </td>
            <td border="1" style="width: 25%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['projno']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td border="1" style="width: 20%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> Date:</strong>
            </td>
            <td border="1" style="width: 25%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{date('d-m-Y',strtotime($data['design_issued_date']))}}
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td border="1" style="width: 20%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> Project Name:</strong>
            </td>
            <td border="1" style="width: 25%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['projname']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td border="1" style="width: 20%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> Required by Date:</strong>
            </td>
            <td border="1" style="width: 25%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{ date('d-m-Y',strtotime($data['design_required_by_date']))}}
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> Project Address:</strong>
            </td>
            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['projaddress']}}
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> Designer Company Name:</strong>
            </td>
            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['designer_company_name']}}
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> Designer Email Address: </strong>
            </td>
            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['designer_company_email']}}
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> TWC Email Address:</strong>
            </td>
            <td colspan="4" border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['twc_email']}}
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong>TW Category</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['tw_category']}}
            </td>

            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>

            <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong> TTW Risk Class</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['tw_risk_class']}}
            </td>
        </tr>



        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td colspan="5" border="1" style="width: 100%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong>Design Required for</strong><br>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding:  10px;border-radius: 3px;background-color: #F4F4F4;">{{$data['design_requirement_text']}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td colspan="2" border="1" style="width: 25%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong>Description of Temporary Works Required </strong>
            </td>
            <td colspan="4" border="1" style="width: 80%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['description_temporary_work_required']}}
            </td>
        </tr>
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer">
            <td></td>
        </tr>
        <tr>
            <td colspan="6" border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <strong></strong>Scope of Design Output Required From TW Engineer
                </strong>
                @if(isset($scopdesg) && count($scopdesg)>0)
                @php $i=1; @endphp
                @foreach($scopdesg as $key=> $desg)
                @if($desg)
                @if($i%2==1)
        <tr>
            <td colspan="3" border="1" style="width: 50%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <table style="width: 83%;">
                    <tr>
                        <td style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 5px 10px;border-radius: 3px;background-color: #F4F4F4;">
                            {{ Str::replace('_date', '', $key)}} {{$desg}}
                        </td>
                    </tr>
                </table>

            </td>
            <!-- <td colspan="5" border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 5px 10px;border-radius: 3px;background-color: #F4F4F4;">123</td>
                    </tr>
                </table>

            </td> -->
            @else
            <td colspan="3" border="1" style="width: 50%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
            font-weight: 700;">
                <table style="width: 83%;">
                    <tr>
                        <td style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 5px 10px;border-radius: 3px;background-color: #F4F4F4;">
                            {{ Str::replace('_date', '', $key)}} {{$desg}}
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        @endif
        @endif
        @php
        $i++;
        @endphp
        @endforeach

        @endif
        </td>
        </tr>
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
        <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer"></tr>
        </tr>
        <tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
                font-weight: 700;">
                <strong> Name</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['name']}}
            </td>
            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>
            <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 10px;
                font-weight: 700;">
                <strong>Signature</strong>
            </td>
            @if($data['signtype']=='1')
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{ucwords($data['namesign'])}}
            </td>
            @else
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                @php $sign=\App\Models\TemporaryWork::find($image_name);@endphp
                <img src="temporary/signature/{{$sign->signature}}" width="40px" height="40px">

            </td>
            @endif
            <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer"></tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
                    font-weight: 700;">
                <strong>Job Title</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['job_title']}}
            </td>
            <!-- <tr>
            <td>&nbsp;</td>
        </tr> -->
        <tr class="spacer"></tr>
        <tr>
        <tr>
            <td border="1" style="width: 15%; text-align: left; padding: 5px 10px;color: #C5BCBC;font-size: 10px;
                    font-weight: 700;">
                <strong> Company</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{$data['company']}}
            </td>
            <td border="0" style="width: 10%; text-align: left; padding: 0px 10px;">
            </td>
            <td border="1" style="width: 15%; text-align: left; padding: 0px 10px;color: #C5BCBC;font-size: 10px;
                    font-weight: 700;">
                <strong> Date:</strong>
            </td>
            <td border="1" style="width: 30%; text-align: left;border:1px solid rgba(191, 191, 191,1));padding: 0 10px;border-radius: 3px;background-color: #F4F4F4;">
                {{ date('d-m-Y',strtotime($data['date']))}}
            </td>
        </tr>
    </table>
</page>