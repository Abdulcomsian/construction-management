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
   .paddingTable2 td {
      padding: 5px 10px;
   }
   .red{
    color:red; 
   }
   .green{
    color:green;
   }
   *:not(html) {
    -webkit-transform: translate3d(0, 0, 0);
}
</style>
<page pageset="old">
   <div style="padding: 0px; width: 100%; max-width: 70%; margin: auto;">
      <div class="topDiv d-flex" style="display: flex; justify-content: space-between;">
        <div class="logoText" style="float:left;width:70%">
            @if(isset($data['type']) && $data['type']=="scaffoldunload")
            <h3>Scaffolding Inspection Permit to UnLoad</h3>
            @else
            <h3>Scaffolding Inspection Permit to Load</h3>
            @endif
            <br>
            <p style="width:200px !important">{{$data['permit_no']}}&nbsp;&nbsp;{{$design_requirement_text->design_requirement_text}}</p>
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
      <div class="tableDiv paddingTable">
         <table>
            <tbody>
               <tr>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                           Project
                           Name</b>
                     </label>
                  </td>
                  <td><span style="width: 180px;font-size: 12px;">{{$data['projname']}}</span></td>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px; font-size: 10px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                           Project No</b> </label>
                  </td>
                  <td><span style="font-size: 12px;">{{$data['projno']}}</span></td>
               </tr>
               <tr>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;">
                        <b style="font-size: 12px;"> Drawing No </b> </label>
                  </td>
                  <td><span style="font-size: 12px;">{{$data['drawing_no']}}</span></td>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                           Date </b>
                        <label>
                  </td>
                  <td><span style="font-size: 12px;">{{ date('d-m-Y', strtotime($data['date'])) }}</span></td>
               </tr>
               <tr>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center;background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">Permit No</b> </label>
                  </td>
                  <td style="font-size: 12px;">{{$data['permit_no']}}</td>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color:black; margin: 0px;"><b style="font-size: 12px;">
                           Drawing Title </b></label>
                  </td>
                  <td><span style="font-size: 12px;">{{$data['drawing_title']}}</span></td>
               </tr>
               <tr>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                           TWC Name </b></label>
                  </td>
                  <td><span style="font-size: 12px;">{{$data['twc_name']}}</span></td>
                  <td style="width:180px;background:gray;color:white;">
                     <label for="" style="width: 200px; height: 70px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                           TWS or Competent<br>Scafolder Name </b>
                     </label>
                  </td>
                  <td><span style="font-size: 12px;">{{$data['tws_name']}}</span></td>
               </tr>
               <tr style="min-height: 150px;">
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px;border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color: black; margin: 0px;"><b style="font-size: 12px;">
                        <b>Load Class</b> </label>
                  </td>
                  <td colspan="3">
                    <span style="font-size: 12px;">
                     @if($data['loadclass']==1)
                     Service Class 1 - 0.75 kN/m2 – Inspection and very light duty access
                     @endif
                     @if($data['loadclass']==2)
                     Service Class 2 - 1.50 kN/m2 – Light duty such as painting and cleaning
                     @endif
                     @if($data['loadclass']==3)
                     Service Class 3 - 2.00 kN/m2 – General building work, brickwork, etc.
                     @endif
                     @if($data['loadclass']==4)
                     Service Class 4 - 3.00 kN/m2 – Heavy duty such as masonry and heavy cladding
                     @endif
                  </span></td>
               </tr>
               <tr style="min-height: 150px;">
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 200px;border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf;color: black; margin: 0px;"><b style="font-size: 12px;">
                           Location of the temporary works</b> </label>
                  </td>
                  <td colspan="3"><span style="font-size: 12px;">{{$data['location_temp_work']}}</span></td>
               </tr>
               <tr>
                  <td style="width: 180px;background:gray;color:white;">
                     <label for="" style="width: 400px; border: 1px solid black; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black; margin: 0px;"><b style="font-size: 12px;">Description of structure</label>
                  </td>
                  <td colspan="3"><span style="font-size: 12px;">{{$data['description_structure']}}</span></td>
               </tr>
            </tbody>
         </table>
      </div>
      <!-- <div class="tableDiv paddingTable" style="margin: 20px 0px;">
         <table>
             <tbody>
             
             </tbody>
         </table>
         </div> -->
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
               <td style="width: 300px;color:black;border:none">Inspection Report</td>
            </tr>
            <tr>
               <td style="width: 200px;background:gray;color:white;">
                  <label for="" style="width: 200px;padding: 10px;display: grid; align-items: center; background-color: #bfbfbf; color:black; margin: 0px;"><b style="font-size: 12px;">
                        Equipment & materials used as specified & fit for purpose </b></label>
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
                        TW checked against drawings / design output</b></label>
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
                        Loading / use limitations understood (e.g. sequence of loading, access/plant loading)</b></label>
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
            <!-- <tr>
               <td colspan="3" style="width: 300px;color:black;border:none">
                  <strong>Inspect each of the following items & tick off in the box provided if installed correctly as per the design. Where actions are required, identify with a number & detail comments in the space provided below.</strong>
               </td>
            </tr> -->
         </table>
      </div>
      <!-- <div class="tableDiv paddingTable" style="margin: 20px 0px;">
         <table>
             
         
         </table>
         </div> -->
      <div class="tableDiv paddingTable2" style="margin: 20px 0px;">
         <table>
            <tbody>
               <tr>
                  <td style="width:5%;background:gray;color:white; " text-rotate rowspan="4">Footings</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Even, stable ground?</b>
                     </label>
                  </td>
                  <td style="width:7%;" class="{{$check_radios['even_stable_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['even_stable_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['even_stable_radio']=="2")
                        <button type="button"  style="color: #000;border:none; width: 18%;padding: 12px; border:1px solid red;font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                    @if($check_radios['even_stable_radio']=="2")
                     <span style="font-size: 12px;">
                       {{ $check_comments['even_stable_comment'] ?? ''}}</span>
                    @endif
                  </td>
                  <td>
                    @if( $check_images['even_stable_image'] ?? '')
                       <img src="{{ $check_images['even_stable_image'] ?? ''}}" width="40" height="40px" />
                    @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Base plates? </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['base_Plates_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['base_Plates_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['base_Plates_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                  </td>
                  <td>
                    @if($check_radios['base_Plates_radio']=="2")
                     <span style="font-size: 12px;">
                       {{ $check_comments['base_Plates_comment'] ?? ''}}
                    </span>
                    @endif
                  </td>
                  <td>
                    @if($check_images['base_Plates_image'] ?? '')
                    <img src="{{ $check_images['base_Plates_image'] ?? ''}}" width="40" height="40px" />
                    @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Sole boards and plates installed correctly?</b>
                     </label>
                  </td>
                  <td style="width:10%;"  class="{{$check_radios['sole_boards_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['sole_boards_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['sole_boards_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                    @if($check_radios['sole_boards_radio']=="2")
                     <span style="font-size: 12px;">{{$check_comments['sole_boards_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                    @if($check_images['sole_boards_image'] ?? '')
                     <img src="{{ $check_images['sole_boards_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Undermined?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;"  class="{{$check_radios['undermined_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['undermined_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['undermined_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     @if($check_radios['undermined_radio']=="2")
                     <span style="font-size: 12px;">{{$check_comments['undermined_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                     @if($check_images['undermined_image'] ?? '')
                     <img src="{{ $check_images['undermined_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="4">Standards</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Plumb?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['Plumb_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['Plumb_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['Plumb_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     @if($check_radios['Plumb_radio']=="2")
                     <span style="font-size: 12px;">{{$check_comments['Plumb_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                     @if($check_images['Plumb_image'] ?? '')
                        <img src="{{ $check_images['Plumb_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Staggered joints?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['staggered_joints_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['staggered_joints_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['staggered_joints_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     @if($check_radios['staggered_joints_radio']=="2")
                     <span style="font-size: 12px;">{{$check_comments['staggered_joints_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                     @if($check_images['staggered_joints_image'] ?? '')
                        <img src="{{ $check_images['staggered_joints_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Wrong spacing?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['wrong_spacing_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['wrong_spacing_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['wrong_spacing_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     @if($check_radios['wrong_spacing_radio']=="2")
                     <span style="font-size: 12px;">{{$check_comments['wrong_spacing_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                     @if($check_images['wrong_spacing_image'] ?? '')
                     <img src="{{ $check_images['wrong_spacing_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Damaged?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['damaged_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['damaged_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['damaged_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                  @if($check_radios['damaged_radio']=="2")
                  <span style="font-size: 12px;">{{$check_comments['damaged_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                  @if($check_images['damaged_image'] ?? '')
                     <img src="{{ $check_images['damaged_image'] ?? ''}}" width="40" height="40px" />
                  @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="4">Boards</td>
                  <!-- <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Damaged?
                        </b>
                     </label>
                  </td> -->
                  <!-- <td style="width:10%;">
                     <span style="font-size: 12px;">
                        @if($check_radios['trap_boards_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['trap_boards_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td> -->
                  <!-- <td>
                  @if($check_radios['trap_boards_radio']=="2")
                  <span style="font-size: 12px;">{{$check_comments['trap_boards_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                  @if($check_images['trap_boards_image'] ?? '')
                  <img src="{{ $check_images['trap_boards_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr> -->
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Trap boards?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['trap_boards_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['trap_boards_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['trap_boards_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['trap_boards_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['trap_boards_image'] ?? '')
                     <img src="{{ $check_images['trap_boards_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Incomplete boarding?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['incomplete_boarding_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['incomplete_boarding_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['incomplete_boarding_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['incomplete_boarding_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['incomplete_boarding_image'] ?? '')
                     <img src="{{ $check_images['incomplete_boarding_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Insufficient supports / ties?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['supports_ties_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['supports_ties_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['supports_ties_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['supports_ties_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['supports_ties_image'] ?? '')
                     <img src="{{ $check_images['supports_ties_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="3">Ladders</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Insufficient length?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['insufficient_length_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['insufficient_length_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['insufficient_length_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['insufficient_length_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['insufficient_length_image'] ?? '')
                     <img src="{{ $check_images['insufficient_length_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Any missing or loose?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['missing_loose_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['missing_loose_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['missing_loose_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                  @if($check_radios['missing_loose_radio']=="2")
                  <span style="font-size: 12px;">{{$check_comments['missing_loose_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                     @if($check_images['missing_loose_image'] ?? '')
                     <img src="{{ $check_images['missing_loose_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Wrong fittings?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['wrong_fittings_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['wrong_fittings_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['wrong_fittings_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['wrong_fittings_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['wrong_fittings_image'] ?? '')
                     <img src="{{ $check_images['wrong_fittings_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="3">Ledges</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Not level?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['not_level_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['not_level_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['not_level_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['not_level_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['not_level_image'] ?? '')
                     <img src="{{ $check_images['not_level_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> All joints staggered?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['joined_same_bays_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['joined_same_bays_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['joined_same_bays_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['joined_same_bays_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['joined_same_bays_image'] ?? '')
                     <img src="{{ $check_images['joined_same_bays_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Loose or damaged?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['loose_damaged_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['loose_damaged_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['loose_damaged_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['loose_damaged_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['loose_damaged_image'] ?? '')  
                     <img src="{{ $check_images['loose_damaged_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="3">Guard Rails &<br>Toe Boards</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Wrong height?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['wrong_height_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['wrong_height_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['wrong_height_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                  @if($check_radios['wrong_height_radio']=="2")
                  <span style="font-size: 12px;">{{$check_comments['wrong_height_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                  @if($check_images['wrong_height_image'] ?? '')
                  <img src="{{ $check_images['wrong_height_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Any missing or loose?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['some_missing_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['some_missing_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['some_missing_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['some_missing_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['some_missing_image'] ?? '')
                     <img src="{{ $check_images['some_missing_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Damaged?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['GuardRails_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['GuardRails_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['GuardRails_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['GuardRails_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['GuardRails_image'] ?? '')
                     <img src="{{ $check_images['GuardRails_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>

               <!-- Abdul Started work here -->
               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="3">Couplers & Ties</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Wrong fittings?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['coupling_wrongfitting_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['coupling_wrongfitting_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['coupling_wrongfitting_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                  @if($check_radios['coupling_wrongfitting_radio']=="2")
                  <span style="font-size: 12px;">{{$check_comments['coupling_wrongfitting_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                  @if($check_images['coupling_wrongfitting_image'] ?? '')
                  <img src="{{ $check_images['coupling_wrongfitting_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Any missing?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['coupling_somemissing_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['coupling_somemissing_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['coupling_somemissing_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['coupling_somemissing_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if( $check_images['coupling_somemissing_image'] ?? '')
                     <img src="{{ $check_images['coupling_somemissing_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Loose or damaged?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['coupling_loosedamaged_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['coupling_loosedamaged_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['coupling_loosedamaged_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['coupling_loosedamaged_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['coupling_loosedamaged_image'] ?? '')
                     <img src="{{ $check_images['coupling_loosedamaged_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>


               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="3">Bracing</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Wrong fittings?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['bracing_wrongfitting_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['bracing_wrongfitting_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['bracing_wrongfitting_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                  @if($check_radios['bracing_wrongfitting_radio']=="2")
                  <span style="font-size: 12px;">{{$check_comments['bracing_wrongfitting_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                  @if($check_images['bracing_wrongfitting_image'] ?? '')
                  <img src="{{ $check_images['bracing_wrongfitting_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Some missing?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['bracing_somemissing_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['bracing_somemissing_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['bracing_somemissing_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['bracing_somemissing_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['bracing_somemissing_image'] ?? '')
                     <img src="{{ $check_images['bracing_somemissing_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: 70px; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Loose or damaged?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['bracing_loosedamaged_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['bracing_loosedamaged_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['bracing_loosedamaged_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['bracing_loosedamaged_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['bracing_loosedamaged_image'] ?? '')
                     <img src="{{ $check_images['bracing_loosedamaged_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>

               <tr>
                  <td style="width:5%;background:gray;color:white; " rowspan="3">Debris Netting</td>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: auto; font-size: 14px; padding: 0 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Wrong fittings?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['partially_removed_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;"> 
                        @if($check_radios['partially_removed_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['partially_removed_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                  @if($check_radios['partially_removed_radio']=="2")
                  <span style="font-size: 12px;">{{$check_comments['partially_removed_comment'] ?? ''}}</span>
                     @endif
                  </td>
                  <td>
                  @if($check_images['partially_removed_image'] ?? '')
                  <img src="{{ $check_images['partially_removed_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: auto; font-size: 14px; padding: 0 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Any missing?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['debrings_somemissing_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['debrings_somemissing_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['debrings_somemissing_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['debrings_somemissing_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['debrings_somemissing_image'] ?? '')
                     <img src="{{ $check_images['debrings_somemissing_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td>
               </tr>
               <tr>
                  <td style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: auto; font-size: 14px; padding: 0 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;">Loose/damaged or broken?
                        </b>
                     </label>
                  </td>
                  <td style="width:10%;" class="{{$check_radios['loose_damaged_broken_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['loose_damaged_broken_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid green;">Pass</button>
                        @elseif($check_radios['loose_damaged_broken_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px;margin-right: 30px;border:1px solid red;">Fail</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 0 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>
                  </td>
                  <td>
                     <span style="font-size: 12px;">{{$check_comments['loose_damaged_broken_comment'] ?? ''}}</span>
                  </td>
                  <td>
                     @if($check_images['loose_damaged_broken_image'] ?? '')
                     <img src="{{ $check_images['loose_damaged_broken_image'] ?? ''}}" width="40" height="auto" />
                     @endif
                  </td>
               </tr>


               <!-- <tr>
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
                  -->
               <tr>
                  <td colspan="2" style="width:30%;background:gray;color:white;">
                     <label style="border: 1px solid black; height: auto; font-size: 14px; padding: 10px; display: grid; align-items: center; background-color: #bfbfbf; color: black;  margin: 0px;">
                        <b style="font-size: 12px;"> Any other actions necessary not listed above?
                        </b>
                     </label>
                  </td>

                  <td style="width:10%;" class="{{$check_radios['other_radio']==2 ? 'red' : 'green'}}">
                     <span style="font-size: 12px;">
                        @if($check_radios['other_radio']=="1")
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;">Y</button>
                        @elseif($check_radios['other_radio']=="2")
                        <button type="button" style="color: #FF0A0A; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px;margin-right: 30px;">N</button>
                        @else
                        <button type="button" style="color: #164615; background-color: #C5BCBC;border:none; width: 18%;padding: 12px; font-weight: 700; font-size:12px; margin-right: 30px;border:1px solid yellow;">N/A</button>
                        @endif
                     </span>

                  </td>

                  <td>
                     <span style="font-size: 12px;">{{$check_comments['other_comment'] ?? ''}}</span>
                  </td>
                  <!-- <td>
                     @if($check_images['other_image'] ?? '')
                     <img src="{{ $check_images['other_image'] ?? ''}}" width="40" height="40px" />
                     @endif
                  </td> -->
               </tr> 
            </tbody>
         </table>
      </div>
   </div>
   <!-- old work below  -->

   <!-- new work of -->
   <div class="tableDiv paddingTable" style="margin: 5px 0px;">
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
                  <label for="" style="float: left;width: 400px; height: auto; font-size: 14px; padding: 0 10px; display: grid; align-items: center; margin: 0px;"><b style="font-size:12px;">Signature</b></label>
               </td>
               <td colspan="3" style="font-size:12px;">
                  @if($data['signtype']=='1'){{ucwords($data['namesign'])}}@else<img src="temporary/signature/{{$image_name}}" width="auto" height="100px" />@endif
               </td>
            </tr>
         </tbody>
      </table>
      @if(isset($check_images))
        <div class="tableDiv paddingTable col-md-6" style="margin: 20px 0px;">
            <table>
                <tbody>
                   @php
                     $i =1;
                   @endphp
                @foreach($check_images as $image)
                  @if(($i % 2) == 1) 
                     <tr>
                        <td>
                           <img src="{{$image}}" width="40%" height="40%" alt="img"/>
                        </td>
                     @else
                     <td>
                        <img src="{{$image}}" width="40%" height="40%" alt="img"/>
                     </td>
                  </tr>
                  @endif
                  @php $i++;@endphp
                  @endforeach
                </tbody>
            </table>
        </div>
        @endif
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
                            <a href="{{asset($image)}}" target="_blank">View Attachment</a>
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
