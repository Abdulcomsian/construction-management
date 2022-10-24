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
                                                <a href="http://construction.accrualhub.com/" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#bbbfc3;font-size:19px;font-weight:bold;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://demo.moray-limousines.com/&amp;source=gmail&amp;ust=1638963291925000&amp;usg=AOvVaw1hllcMnVjrBhGsusEn01lQ">
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
                                                                    <h3>Welcome to the online i-works Portal. 
                                                                        The temporary works @if(!$multiple)for ({{$details[0]->design_requirement_text}}) @endif has been shared with you by {{$details[0]->company}} Ltd for Project {{$details[0]->project->name ?? ''}} {{$details[0]->project->no ?? ''}}
                                                                    </h3>
                                                                    @foreach($details as $key => $data)
                                                                    <h5>
                                                                        The temporary works for ({{$data->design_requirement_text}})  has been shared with you by {{$data->company}} Ltd.
                                                                    </h5>
                                                                    <a style="text-decoration: none" href="{{asset('pdf'.'/'.$data->ped_url)}}">Design Breif - {{$data->twc_id_no}} ({{$data->design_requirement_text}}) </a><br>
                                                                    @if(count($data->comments)>0)
                                                                    <h4>Comments -</h4>
                                                                    @if($iscomment)
                                                                    <ul>
                                                                        @foreach($data->comments as $comments)
                                                                        <li>{{$comments->comment}}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                    @endif
                                                                    @endif
                                                                    @if(count($data->uploadfile)>0)
                                                                    <h4>Drawings and calculations -</h4>
                                                                    <ul>
                                                                        @foreach($data->uploadfile as $file)
                                                                        @if($file->file_type==1)
                                                                        <li>
                                                                            <a  style="text-decoration: none" href="{{asset($file->file_name)}}">{{$file->file_name}}</a>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                    @endif
                                                                    @if(count($data->uploadfile)>0)
                                                                    <h4>Design check certificate -</h4>
                                                                    <ul>
                                                                        @foreach($data->uploadfile as $file)
                                                                        @if($file->file_type==2)
                                                                        <li>
                                                                            <a  style="text-decoration: none" href="{{asset($file->file_name)}}">{{$file->file_name}}</a>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                    @endif
                                                                    @if(count($data->permits)>0)
                                                                    <h4>Permits to Load -</h4>
                                                                    <ul>
                                                                        @foreach($data->permits as $permit)
                                                                        <li>
                                                                            <a  style="text-decoration: none" href="{{asset('pdf'.'/'.$permit->ped_url)}}">{{$permit->ped_url}}</a>
                                                                            @endforeach
                                                                    </ul>
                                                                    @endif
                                                                    @if(count($data->permitsunload)>0)
                                                                    <h4>Permit to unload - </h4>
                                                                    <ul>
                                                                        @foreach($data->permitsunload as $permit)
                                                                        <li>
                                                                            <a  style="text-decoration: none" href="{{asset('pdf'.'/'.$permit->ped_url)}}">{{$permit->ped_url}}</a>
                                                                            @endforeach
                                                                    </ul>
                                                                    @endif
                                                                    @if(count($data->scaffold)>0)
                                                                    <h4>Scaffold</h4>
                                                                    <ul>
                                                                        @foreach($data->scaffold as $scaffold)
                                                                        <li>
                                                                            <a  style="text-decoration: none" href="{{asset('pdf'.'/'.$scaffold->ped_url)}}">{{$scaffold->ped_url}}</a>
                                                                            @endforeach
                                                                    </ul>
                                                                    @endif
                                                                    <hr>
                                                                    @endforeach

                                                                    </p>
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"> Regards, <br><br>
                                                                    The Temporary Works Portal Team <br><br>
                                                                        <span style="font-size: 10px">P.S. If you have any problems with the portal, don't hesitate to get in touch with us at info@ctworks.co.uk </span>
</p>
                                                                <!-- </span> -->
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