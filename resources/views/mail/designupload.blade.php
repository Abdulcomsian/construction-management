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
                                                <a href="{{ env('APP_URL) }}" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#bbbfc3;font-size:19px;font-weight:bold;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://demo.moray-limousines.com/&amp;source=gmail&amp;ust=1638963291925000&amp;usg=AOvVaw1hllcMnVjrBhGsusEn01lQ">
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
                                                                    <h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">Hello
                                                                        {{-- @if(isset($details['body']['type']) && $details['body']['type']=='desingbrief')
                                                                         {{ $details['body']['company'] }}
                                                                        @endif --}}
                                                                    </h1>
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                                         @if(!isset($details['body']['filetype']))
                                                                         Welcome to the Temporary Works Portal.<br><br>
                                                                         @endif
                                                                         {{$details['body']['text']}}<br>
                                                                         {{-- @if(isset($details['body']['comments']))
                                                                         <b>Comments:</b><br>
                                                                         {{$details['body']['comments']}}
                                                                         @endif --}}
                                                                   </p>
                                                                   @if(isset($details['body']['designer']) && $details['body']['designer']=='designer1')
                                                                   <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                                       <a href="{{route('designer.uploaddesign',Crypt::encrypt($details['body']['id']).'/?mail='.$email)}}">Click here to view the design brief.</a>
                                                                   </p>
                                                                   <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                                       
                                                                        Within the Temporary Works Portal, you will be able to:<br> 
                                                                        1. Send comments or ask a question to the person who<br>provided the design brief.<br> 
                                                                        2. Upload preliminary and construction issue drawings.<br>
                                                                        3. Upload design check certificates.<br>
                                                                        4. Upload calculations or design notes.

                                                                   @else
                                                                    <p>
                                                                        @if(isset($details['body']['filetype']) && $details['body']['filetype']==2)
                                                                        @php $name="design check certificate";@endphp
                                                                        <a href="{{url('temporary_works')}}">View Design Check Certificate</a>
                                                                        @elseif(isset($details['body']['filetype']) && $details['body']['filetype']==5)
                                                                        @php $name="risk assessment";@endphp
                                                                         <a href="{{url('temporary_works')}}">View Risk Assessment. </a>
                                                                        @elseif(isset($details['body']['filetype']) && $details['body']['filetype']==6)
                                                                        @php $name="calculations/designs";@endphp
                                                                        <a href="{{url('temporary_works')}}">View Calculations/Design Notes.</a>
                                                                        @else
                                                                        @php $name="drawing";@endphp
                                                                         <a href="{{url('temporary_works')}}">view Details.</a>

                                                                        @endif
                                                                   </p>
                                                                   @endif
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                                        @if(isset($details['body']['type']) && $details['body']['type']=='desingbrief')
                                                                        If you have questions about the brief, please refer them to {{ $details['body']['company'] }}<br><br>
                                                                        Thank you for your attention.<br><br>
                                                                        @else
                                                                        If you have any queries regarding the {{$name ?? 'drawing'}}, you can communicate them to the designer through the Temporary Works Portal.<br><br>
                                                                        
                                                                        @endif
                                                                        Regards,<br>The Temporary Works Portal Team <br><br>
                                                                        <span style="font-size: 10px">If you have any problems with the portal, don't hesitate to get in touch with us at info@ctworks.co.uk</span>
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
                                                                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;line-height:1.5em;margin-top:0;color:#aeaeae;font-size:12px;text-align:center">© 2022 City Temporary Works.  All rights reserved.</p>
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