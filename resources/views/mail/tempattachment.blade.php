<div class="">
    <div id=":p0" tabindex="-1"></div>
    <div id=":op" class="ii gt" jslog="20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0.">
        <div id=":oo" class="a3s aiL "><u></u>
            <div style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#f5f8fa;color:#74787e;height:100%;line-height:1.4;margin:0;width:100%!important;word-break:break-word">
                <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#f5f8fa;margin:0;padding:0;width:100%">
                    <tbody>
                        <tr>
                            <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0;padding:0;width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:25px 0;text-align:center;color:white;background:#131313">
                                                <a href="{{env('APP_URL')}}" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#bbbfc3;font-size:19px;font-weight:bold;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://demo.moray-limousines.com/&amp;source=gmail&amp;ust=1638963291925000&amp;usg=AOvVaw1hllcMnVjrBhGsusEn01lQ">
                                                    Temporary Works
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;border-bottom:1px solid #edeff2;border-top:1px solid #edeff2;margin:0;padding:0;width:100%">
                                                <table align="center" width="570" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;margin:0 auto;padding:0;width:570px">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px"><span class="im">
                                                                    <h1>Hello!</h1>
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                                    <h3>Design Upload/Drawing/Email/Appointment Documents</h3>
                                                                    @foreach($details->uploadfile as $key => $file)
                                                                    @php
                                                                    if($file->file_type==1)
                                                                    {
                                                                    $name='Design and drawing';
                                                                    }
                                                                    elseif($file->file_type==2)
                                                                    {
                                                                    $name='DESIGN CHECK CERTIFICATE';
                                                                    }
                                                                    elseif($file->file_type==3)
                                                                    {
                                                                    $name='RAMS';
                                                                    }
                                                                    elseif($file->file_type==4)
                                                                    {
                                                                    $name='Drag & Drop email';
                                                                    }
                                                                    elseif($file->file_type==5){
                                                                    $name='Appointment';
                                                                    }
                                                                    else{
                                                                    $name='Desing and drawing';
                                                                    }
                                                                    @endphp
                                                                    <a href="{{asset($file->file_name)}}">{{$name}} . {{$key+1}} </a><br>
                                                                    @endforeach

                                                                    <h3>Temporary work Specific attachments/images</h3>
                                                                    @foreach($details->temp_work_images as $key => $img)
                                                                    <a href="{{asset($img->image)}}">attachment specific . {{$key+1}} </a><br>
                                                                    @endforeach

                                                                    <h3>Permit Load Pdf</h3>
                                                                    @foreach($details->permits as $x=> $pdf)
                                                                    @if($pdf->status==1)
                                                                    <a href="{{asset('pdf'.'/'.$pdf->ped_url)}}"> PDF </a><br>
                                                                    @endif
                                                                    @endforeach

                                                                    <h3>Permit UnLoad Pdf</h3>
                                                                    @foreach($details->permits as $x=> $pdf)
                                                                    @if($pdf->status==3)
                                                                    <a href="{{asset('pdf'.'/'.$pdf->ped_url)}}"> PDF </a><br>
                                                                    @endif
                                                                    @endforeach

                                                                    <h3>Scaffold Load Pdf</h3>
                                                                    @foreach($details->scaffold as $spdf)
                                                                    @if($spdf->status==1)
                                                                    <a href="{{asset('pdf'.'/'.$spdf->ped_url)}}"> PDF </a><br>
                                                                    @endif
                                                                    @endforeach

                                                                    <h3>Scaffold UnLoad Pdf</h3>
                                                                    @foreach($details->scaffold as $spdf)
                                                                    @if($spdf->status==3)
                                                                    <a href="{{asset('pdf'.'/'.$spdf->ped_url)}}"> PDF </a><br>
                                                                    @endif
                                                                    @endforeach


                                                                    <h3>Temporary work PDF attachments/PDF</h3>

                                                                    <a href="{{asset('pdf'.'/'.$details->ped_url)}}">PDF </a><br>

                                                                    </p>
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"> Regards, <br><br>
                                                                    The Temporary Works Portal Team <br><br>
                                                                        <span style="font-size: 10px">P.S. If you have any problems with the portal, don't hesitate to get in touch with us at info@ctworks.co.uk </span></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                                <table align="center" width="570" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0 auto;padding:0;text-align:center;width:570px">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px">
                                                                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;line-height:1.5em;margin-top:0;color:#aeaeae;font-size:12px;text-align:center">© 2022 Temporary Work Portal.  All rights reserved.</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
