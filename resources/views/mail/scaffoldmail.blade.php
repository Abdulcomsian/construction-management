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
                                                        {{-- {{dd($details)}} --}}
                                                        <tr>
                                                            <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px"><span class="im">
                                                                    <h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">Hello</h1>
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">{{$details['body']['text']}}</p>
                                                                    @if(isset($details['body']['pc_twc']) && $details['body']['pc_twc']==1)
                                                                   <p>
                                                                       
                                                                       <a href="{{route('pc.permit.approved',Crypt::encrypt($details['body']['id']))}}">view to accept or reject permit to load</a>
                                                                       
                                                                   </p>
                                                                   @else
                                                                   <p>
                                                                    @php
                                                                    $tempUrl = isset($designerUrl) ? $designerUrl :  url('temporary_works');
                                                                    @endphp
                                                                    @if($type=="tempwork")

                                                                     <a href="{{$tempUrl}}">View Design Brief</a>

                                                                    @else
                                                                    <a href="{{$tempUrl}}">{{$details['action_text']}}</a>
                                                                    @endif
                                                                   </p>
                                                                   @endif
                                                                    
                                                                     <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">If you have any queries regarding the permit, you can communicate them through the Temporary Works Portal. </p>
                                                                    
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"> Regards, <br><br>
                                                                    The Temporary Works Portal Team <br><br>
                                                                        <span style="font-size: 10px">P.S. If you have any problems with the portal, don't hesitate to get in touch with us at info@ctworks.co.uk </span>
                                                                    </p>
                                                                </span>
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
                                                                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;line-height:1.5em;margin-top:0;color:#aeaeae;font-size:12px;text-align:center">© 2021 City Temporary Works. All rights reserved.</p>
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