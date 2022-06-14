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
    <div style="padding: 0; width: 100%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText" style="float:left;width:70%">
                <h3>Permit to Load</h3>
                <p style="width:200px !important">{{$data['permit_no']}}&nbsp;&nbsp;{{$data['design_requirement_text']}}</p>
            </div>
            <div class="logo" style="float:right;width:20%;">
                @php
                $logodata=\App\Models\User::where('id',$data['companyid'])->first();
                @endphp
                @if($logodata->image != NULL)
                <img src="{{public_path($logodata->image)}}" width="auto" height="80px" />
                @else
               <!--  <img src="{{public_path('uploads/logo/ctw-02-2.png')}}" width="80px" height="80px" /> -->
                @endif
            </div>
        </div>
        <!-- <br> -->
        <div class="tableDiv paddingTable" style="margin-top:10p !important; margin-top:10px;">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 5px 10px; padding: 5px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Project
                                    Name</b>
                            </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['projname']}}</span></td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 10px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Project No </b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['projno']}}</span></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;">
                                <b style="font-size: 12px;"> Drawing No </b> </label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['drawing_no']}}</span></td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Date </b><label>
                        </td>
                        <td><span style="font-size: 12px;">{{ date('d-m-Y', strtotime($data['date'])) }}</span></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">Permit No</b> </label>
                        </td>
                        <td style="font-size: 12px;">{{$data['permit_no']}}</td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                                    Drawing Title </b></label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['drawing_title']}}</span></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWC Name </b></label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['twc_name']}}</span></td>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 200px; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                                    TWS Name </b></label>
                        </td>
                        <td><span style="font-size: 12px;">{{$data['tws_name']}}</span></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 400px; border: 1px solid black; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf;color: black; margin: 0px;"><b style="font-size: 12px;">
                                    Location of the temporary works</b> </label>
                        </td>
                        <td colspan="3"><span style="font-size: 12px;">{{$data['location_temp_work']}}</span></td>

                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                        <label for="" style="width: 400px;border: 1px solid black; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;"><b style="font-size: 12px;">Description of structure </label>
                        </td>
                        <td  colspan="3"><span style="font-size: 12px;">{{$data['description_structure']}}</span></td>

                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white;">
                            <label for="" style="width: 400px;border: 1px solid black; height: 70px; font-size: 12px; padding: 5px 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;"><b style="font-size: 12px;">
                                    MS/RA number</b> </label>
                        </td>
                        <td colspan="3"><span style="font-size: 12px;">{{$data['ms_ra_no']}}</span></td>

                    </tr>
                </tbody>
            </table>
        </div>


        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead>
                    <th style="color:black; padding: 10px;font-size:12px;"><span style="font-size:12px;">Equipment/materials used as specified/fit for purpose.</span></th>
                    <th style="color: black; padding: 10px;">Y</th>


                </thead>
                <tbody>
                    <tr>
                        <td style="font-size:12px;">Equipment & materials used as specified & fit for purpose</td>
                        <td style="font-size:12px;">Y</td>


                    </tr>
                    <tr>
                        <td style="font-size:12px;">Workmanship checked (i.e. props, ties, struts, joints, stop-ends).</td>
                        <td style="font-size:12px;">Y</td>


                    </tr>
                    <tr>
                        <td style="font-size:12px;">TW checked against drawings / design output</td>
                        <td style="font-size:12px;">Y</td>
                    </tr>
                    <tr>
                        <td style="font-size:12px;">Loading / use limitations understood(e.g. rate of pour, sequence of loading, access/plant loading)
                        </td>
                        <td style="font-size:12px;">Y</td>
                    </tr>
                    <tr>
                        <td style="font-size:12px;">Approval by TWC required?</td>
                        <td style="font-size:12px;">@if($data['works_coordinator']==1){{'Y'}}@else{{'N'}}@endif</td>
                    </tr>
                    <tr style="height: 40px;">
                        <td style="font-size:10px;">
                            @if($data['works_coordinator']==1)
                            Other specified criteria satisfied? (e.g. strength of supporting structure, back propping, ground tests, anchor tests)<br><br>
                            <span style="font-size:12px;">{{$data['description_approval_temp_works']}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="" style="width: 100%;color: black; border: 1px solid; padding: 10px;">
                                <center>
                                    <h4 style="text-align: center; font-size:12px;">Permit to Load/Use</h4>
                                </center>
                                <span style="font-size:12px;">I confirm that I have inspected the above temporary structure and I am satisfied that it
                                    conforms to the above design.  </span> 
                                    <br>
                                <span style="font-size:12px;">I consider that the temporary structure is ready to be loaded and taken into use.</span>
                                <br>
                                    I confirm that I am authorised to issue a Permit to Load for this temporary structure. </span> 

                            </label>
                        </td>
                    </tr>
                    <tr>
                            <td style="font-size:12px;">Approval by TWC required?</td>
                            <td style="font-size:12px;"> @if($data['principle_contractor']==1){{'Y'}}@else{{'N'}}@endif</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <th style="color:black; padding: 10px;font-size:12px;"><span style="font-size:12px;">Equipment/materials used as specified/fit for purpose.</span></th>
                    <th style="color: black; padding: 10px;">Y</th>


                </thead>
                <tbody>
                    <tr>
                        <td style="font-size:12px;">Rate of Rise</td>
                        <td style="font-size:12px;">@if($data['rate_rise']==1){{'Y'}}@else{{'N'}}@endif</td>
                        <td style="font-size:12px;">{{$data['rate_rise_comment'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="font-size:12px;">Has the construction methodology changed?</td>
                        <td style="font-size:12px;">@if($data['construction_methodology']==1){{'Y'}}@else{{'N'}}@endif</td>
                        <td style="font-size:12px;">{{$data['construction_methodology_comment'] ?? ''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                    <tr>
                       
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; color:black; margin: 0px;"><b style="font-size:12px;">
                        Name   </b></label></td>
                        <td style="width: 200px; font-size:12px;"> {{$data['name']}}</td>

                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size:12px;">@if($data['principle_contractor']==1) Name @endif</b></label>
                        </td>
                        <td style="width:200px; font-size:12px;"> @if($data['principle_contractor']==1){{$data['name1']}}@endif</td>

                    </tr>
                    <tr>
                       
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;"><b style="font-size:12px;">
                        Company 
                         </b></label></td>
                        <td style="width: 200px; font-size:12px;">
                        {{$data['company']}}
                            
                        </td>
                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size:12px;">  </b></label>
                        </td>
                        <td style="width:200px; font-size:12px;"> </td>

                       
                    </tr>
                    <tr>
                        
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                             Job Title        </b></label></td>
                        <td style="width: 200px; font-size:12px;"> {{$data['job_title']}}</td>

                        <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color: black; margin: 0px;">
                                <b style="font-size:12px;"> @if($data['principle_contractor']==1) Job Title @endif
                                
                                 </b></label>
                        </td>
                        <td style="width: 200px; font-size: 12px;"> @if($data['principle_contractor']==1){{$data['job_title1']}}@endif</td>

                        
                        
                    </tr>
                   
                    <tr>
                       
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    Date </b></label></td>
                        <td style="width: 200px; font-size:12px;"> {{ date('d-m-Y', strtotime($data['date'])) }}</td>

                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                        @if($data['principle_contractor']==1) Date @endif</b></label></td>
                        <td style="width: 200px; font-size:12px;"> 
                        @if($data['principle_contractor']==1)
                        {{ date('d-m-Y', strtotime($data['date'])) }}
                        @endif
                    </td>

                    </tr>
                    <tr>
                        
                        <td><label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    Signature </b></label></td>
                        <td style="width: 200px; font-size:12px;"> 
                        @if(isset($image_name) && $image_name!='')
                            <img src="temporary/signature/{{$image_name}}"  width="auto" height="120px" />
                            @else
                            {{ $data['namesign'] ?? ''}}
                            @endif
                    </td>

                    <td>
                            <label for="" style="width: 100px;border: 1px solid; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;  color:black ; margin: 0px;"><b style="font-size:12px;">
                                    
                            @if($data['principle_contractor']==1)      Signature @endif
                             </b></label>
                        </td>
                        <td style="width: 200px; font-size:12px;">
                        @if(isset($image_name1) && $image_name1!='')
                            <img src="temporary/signature/{{$image_name1}}"  width="auto" height="120px"/>
                            @else
                            {{ $data['namesign1'] ?? ''}}
                            @endif
                            
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        @if(isset($image_links))
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
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
