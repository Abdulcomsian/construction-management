
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
        padding: 4px 10px;
    }
</style>
<page pageset="old">
    <div style="padding: 10px; width: 100%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText">
                <div>
                    <h3  style="float:left;width:70%;margin-top:15px;">Temporary Works Person Nomination:</h3>
                     <div class="logo" style="float:right;width:20%;">
                       @if(isset($user->userCompany->image) && $user->userCompany->image != NULL)
                       <img src="{{public_path($user->userCompany->image)}}" width="auto" height="60px" />
                       @endif
                    </div>
                 </div>
            </div>
            <p style="font-size:12px;width:100%">Provide supporting evidence to {{$user->userCompany->name}} of the competence, qualifications, training and experience of the individuals nominated to work as Temporary Works Supervisor, Temporary Works Coordinator or Temporary Works Designer. This form will enable {{$user->userCompany->name}} to assess the competence of the individual to undertake the appropriate role.</p> 
        </div>
        <div class="tableDiv paddingTable">
      
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$projectno?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project Manager</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$nomination->project_manager?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated person</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$nomination->nominated_person ?? ''}}</td>
                    </tr>
         
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated person’s employer</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$nomination->nominated_person_employer ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated role</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$nomination->nominated_role ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Description of role being proposed:
                            (Include details of the type of temporary works that the individual will be managing)</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$nomination->description_of_role ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 400px;background:gray;color:white">
                            <label for="" style="font-weight:900;float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Description of the limits of authority of the individual (if applicable)</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$nomination->Description_limits_authority ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Does the individual have authority to issue permits to load / take into use and or permit to dismantle?</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$nomination->authority_issue_permit ?? ''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 10px 0px;">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                   <h4 style="margin: 0;font-size:13px">Temporary works qualifications</h4>
                    <p style="margin-bottom: 0;font-size: 10px;">List highest temporary works related qualifications held
                    </p>
                </div>
            <table>
                <thead style="background:gray;color:white">
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Qualification</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Date</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Documents</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qualifications as $qualification)
                    <tr>
                        <td style="font-size:10px;">{{$qualification->qualification}}</td>
                        <td style="font-size:10px;">{{$qualification->date}}</td>
                        <td style="font-size:10px;"><p style="color:blue">{{asset($qualification->qualification_certificate ?? '')}}</p></td>
                         @php $images[]=$qualification->qualification_certificate;@endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 10px 0px;">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                    <h4 style="margin: 0;font-size:13px">Temporary works courses attended.</h4>
                    <p style="margin: 0;font-size: 10px;">Detail all relevant temporary works related courses the individual has attended <small>(copies of certification must be appended to this document)</small>
                    </p>
            </div>
            <table>
                <thead>
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Course title</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Date</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Documents</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td style=" font-size:10px;">
                            {{$course->course}}
                         </td>
                        <td style="font-size:10px;">
                            {{$course->date}}
                        </td>
                        <td style="font-size:10px;">
                            <p style="color:blue">{{asset($course->course_certificate ?? '')}}</p>
                        </td>
                        @php $images[]=$course->course_certificate;@endphp
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                    <h4 style="margin: 0;font-size:13px;">Temporary works Related Experience</h4>
            </div>
            <table>
                <thead>
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Project title</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Role</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Description of involvement</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($experience as $proj)
                    <tr>
                       <td style=" font-size:10px;">{{$proj->project_title}}</td>
                       <td style=" font-size:10px;">{{$proj->role}}</td>
                       <td style=" font-size:10px;">{{$proj->description_involvment}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($nomination->cv)
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead>
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:10px;">Cv</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       <td style="font-size:10px;"> 
                        <p style="color:blue">{{$nomination->cv}}</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
            <div class="tableDiv paddingTable" style="margin: 5px 0px;">
        <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
               <h4 style="margin: 0;font-size:13px">Competence</h4>
                <p style="margin: 0;font-size:10px;">Indicate level of experience gained on the various types of temporary works, using key below and ticking the relevant boxes in the table on the subsequent page
                </p>
        </div>
        <table>
            <tbody>
                <tr>
                    <td style="font-size:10px;">
                       N
                     </td>
                    <td style="font-size:10px;">
                       None
                    </td>
                    <td style="font-size:10px;">
                       No previous experience.
                    </td>
                </tr>
                 <tr>
                    <td style="font-size:10px;">
                       A
                     </td>
                    <td style="font-size:10px;">
                       Appreciation
                    </td>
                    <td style="font-size:10px;">
                        Worked with this type of temporary works, but with no direct involvement.
                    </td>
                </tr>
                 <tr>
                    <td style="font-size:10px;">
                      K
                     </td>
                    <td style="font-size:10px;">
                       Knowledge
                    </td>
                    <td style="font-size:10px;">
                       Worked with this type of temporary works, but with no direct involvement but has a basic knowledge & understanding.
                    </td>
                </tr>
                 <tr>
                    <td style="font-size:10px;">
                       E
                     </td>
                    <td style="font-size:10px;">
                       Experience
                    </td>
                    <td style="font-size:10px;">
                       Worked with this type of temporary works, with direct involvement as a designer or inspector.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
        <div class="tableDiv paddingTable" style="margin: 10px 0px;">
            <table class="table tableBordered">
                        <thead>
                            <tr>
                                <td rowspan="2" style="text-align: center;font-size:10px;"><b>Area</b></td>
                                <td rowspan="2" style="text-align: center;font-size:10px;"><b>Type of temporary works</b></td>
                                <td colspan="4" style="text-align: center;font-size:10px;"><b>Level of experience</b></td>
                            </tr>
                            <tr>
                                <td class="text-center" style="font-size:10px;">N</td>
                                <td class="text-center" style="font-size:10px;">A</td>
                                <td class="text-center" style="font-size:10px;">K</td>
                                <td class="text-center" style="font-size:10px;">E</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @php 
                                $data= $competence->Site_establishment;
                                @endphp
                                <td rowspan="10" style="font-size:10px;">Site establishment</td>
                                <td style="font-size:10px;">Temporary offices</td>
                                <td style="font-size:10px;">{{$data['Temporary_offices']=="N" ? $data['Temporary_offices'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_offices']=="A" ? $data['Temporary_offices'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_offices']=="K" ? $data['Temporary_offices'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_offices']=="E" ? $data['Temporary_offices'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Sign boards</td>
                                <td style="font-size:10px;">{{$data['Sign_boards']=="N" ? $data['Sign_boards'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Sign_boards']=="A" ? $data['Sign_boards'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Sign_boards']=="K" ? $data['Sign_boards'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Sign_boards']=="E" ? $data['Sign_boards'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Hoardings</td>
                                <td style="font-size:10px;">{{$data['Hoardings']=="N" ? $data['Hoardings'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Hoardings']=="A" ? $data['Hoardings'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Hoardings']=="K" ? $data['Hoardings'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Hoardings']=="E" ? $data['Hoardings'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Access gantries</td>
                                <td style="font-size:10px;">{{$data['Access_gantries']=="N" ? $data['Access_gantries'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Access_gantries']=="A" ? $data['Access_gantries'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Access_gantries']=="K" ? $data['Access_gantries'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Access_gantries']=="E" ? $data['Access_gantries'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Fuel storage</td>
                                <td style="font-size:10px;">{{$data['Fuel_storage']=="N" ? $data['Fuel_storage'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Fuel_storage']=="A" ? $data['Fuel_storage'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Fuel_storage']=="K" ? $data['Fuel_storage'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Fuel_storage']=="E" ? $data['Fuel_storage'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Temporary roads</td>
                                <td style="font-size:10px;">{{$data['Temporary_roads']=="N" ? $data['Temporary_roads'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_roads']=="A" ? $data['Temporary_roads'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_roads']=="K" ? $data['Temporary_roads'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_roads']=="E" ? $data['Temporary_roads'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Barriers</td>
                                <td style="font-size:10px;">{{$data['Barriers']=="N" ? $data['Barriers'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Barriers']=="A" ? $data['Barriers'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Barriers']=="K" ? $data['Barriers'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Barriers']=="E" ? $data['Barriers'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Welfare facilities</td>
                                <td style="font-size:10px;">{{$data['Welfare_facilities']=="N" ? $data['Welfare_facilities'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Welfare_facilities']=="A" ? $data['Welfare_facilities'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Welfare_facilities']=="K" ? $data['Welfare_facilities'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Welfare_facilities']=="E" ? $data['Welfare_facilities'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;"> Precast facilities</td>
                                <td style="font-size:10px;">{{$data['Precast_facilities']=="N" ? $data['Precast_facilities'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Precast_facilities']=="A" ? $data['Precast_facilities'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Precast_facilities']=="K" ? $data['Precast_facilities'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Precast_facilities']=="E" ? $data['Precast_facilities'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Access bridges</td>
                                <td style="font-size:10px;">{{$data['Access_bridges']=="N" ? $data['Access_bridges'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Access_bridges']=="A" ? $data['Access_bridges'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Access_bridges']=="K" ? $data['Access_bridges'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Access_bridges']=="E" ? $data['Access_bridges'] : ''}}</td>
                            </tr>
                            <!-- 2 -->
                              @php $data= $competence->Access_scaffolding;@endphp
                            <tr>
                                <td rowspan="9" style="font-size:10px;">Access/ scaffolding</td>
                                <td style="font-size:10px;">Tube & fitting</td>
                                <td style="font-size:10px;">{{$data['Tube_fitting']=="N" ? $data['Tube_fitting'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Tube_fitting']=="A" ? $data['Tube_fitting'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Tube_fitting']=="K" ? $data['Tube_fitting'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Tube_fitting']=="E" ? $data['Tube_fitting'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">System scaffolding</td>
                                <td style="font-size:10px;">{{$data['System_scaffolding']=="N" ? $data['System_scaffolding'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['System_scaffolding']=="A" ? $data['System_scaffolding'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['System_scaffolding']=="K" ? $data['System_scaffolding'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['System_scaffolding']=="E" ? $data['System_scaffolding'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">System staircases</td>
                                <td style="font-size:10px;">{{$data['System_staircases']=="N" ? $data['System_staircases'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['System_staircases']=="A" ? $data['System_staircases'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['System_staircases']=="K" ? $data['System_staircases'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['System_staircases']=="E" ? $data['System_staircases'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Temporary roofs</td>
                                <td style="font-size:10px;">{{$data['Temporary_roofs']=="N" ? $data['Temporary_roofs'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_roofs']=="A" ? $data['Temporary_roofs'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_roofs']=="K" ? $data['Temporary_roofs'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_roofs']=="E" ? $data['Temporary_roofs'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Loading bays</td>
                                <td style="font-size:10px;">{{$data['Loading_bays']=="N" ? $data['Loading_bays'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Loading_bays']=="A" ? $data['Loading_bays'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Loading_bays']=="K" ? $data['Loading_bays'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Loading_bays']=="E" ? $data['Loading_bays'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Chute support</td>
                                <td style="font-size:10px;">{{$data['Chute_support']=="N" ? $data['Chute_support'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Chute_support']=="A" ? $data['Chute_support'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Chute_support']=="K" ? $data['Chute_support'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Chute_support']=="E" ? $data['Chute_support'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Mobile towers</td>
                                <td style="font-size:10px;">{{$data['Mobile_towers']=="N" ? $data['Mobile_towers'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mobile_towers']=="A" ? $data['Mobile_towers'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mobile_towers']=="K" ? $data['Mobile_towers'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mobile_towers']=="E" ? $data['Mobile_towers'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Edge protection</td>
                                <td style="font-size:10px;">{{$data['Edge_protection']=="N" ? $data['Edge_protection'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Edge_protection']=="A" ? $data['Edge_protection'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Edge_protection']=="K" ? $data['Edge_protection'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Edge_protection']=="E" ? $data['Edge_protection'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Suspension systems</td>
                                <td style="font-size:10px;">{{$data['Suspension_systems']=="N" ? $data['Suspension_systems'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Suspension_systems']=="A" ? $data['Suspension_systems'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Suspension_systems']=="K" ? $data['Suspension_systems'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Suspension_systems']=="E" ? $data['Suspension_systems'] : ''}}</td>
                            </tr>
                            <!-- 3 -->
                             @php $data= $competence->Formwork_falsework;@endphp
                            <tr>
                                <td rowspan="4" style="font-size:10px;">Formwork/ falsework</td>
                                <td style="font-size:10px;">Formwork</td>
                                <td style="font-size:10px;">{{$data['Formwork']=="N" ? $data['Formwork'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Formwork']=="A" ? $data['Formwork'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Formwork']=="K" ? $data['Formwork'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Formwork']=="E" ? $data['Formwork'] : ''}}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Falsework</td>
                                <td style="font-size:10px;">{{$data['Falsework']=="N" ? $data['Falsework'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Falsework']=="A" ? $data['Falsework'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Falsework']=="K" ? $data['Falsework'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Falsework']=="E" ? $data['Falsework'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Back propping</td>
                                <td style="font-size:10px;">{{$data['Back_propping']=="N" ? $data['Back_propping'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Back_propping']=="A" ? $data['Back_propping'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Back_propping']=="K" ? $data['Back_propping'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Back_propping']=="E" ? $data['Back_propping'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Support systems</td>
                                <td style="font-size:10px;">{{$data['Support_systems']=="N" ? $data['Support_systems'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Support_systems']=="A" ? $data['Support_systems'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Support_systems']=="K" ? $data['Support_systems'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Support_systems']=="E" ? $data['Support_systems'] : ''}}</td>
                            </tr>
                            <!-- 4 -->
                             @php $data= $competence->Construction_plant;@endphp
                            <tr>
                                <td rowspan="6" style="font-size:10px;">Construction plant</td>
                                <td style="font-size:10px;">Crane supports & foundations</td>
                                <td style="font-size:10px;">{{$data['Crane_supports_foundations']=="N" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Crane_supports_foundations']=="A" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Crane_supports_foundations']=="K" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Crane_supports_foundations']=="E" ? $data['Crane_supports_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Hoist ties & foundations</td>
                                <td style="font-size:10px;">{{$data['Hoist_ties_foundations']=="N" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Hoist_ties_foundations']=="A" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Hoist_ties_foundations']=="K" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Hoist_ties_foundations']=="E" ? $data['Hoist_ties_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Mast climbers & foundations</td>
                               <td style="font-size:10px;">{{$data['Mast_climbers_foundations']=="N" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td style="font-size:10px;"> {{$data['Mast_climbers_foundations']=="A" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mast_climbers_foundations']=="K" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mast_climbers_foundations']=="E" ? $data['Mast_climbers_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Mobile crane foundations</td>
                               <td style="font-size:10px;">{{$data['Mobile_crane_foundations']=="N" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mobile_crane_foundations']=="A" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mobile_crane_foundations']=="K" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Mobile_crane_foundations']=="E" ? $data['Mobile_crane_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Piling mats & working platforms</td>
                                 <td style="font-size:10px;">{{$data['MPiling_mats_working-platforms']=="N" ? $data['MPiling_mats_working-platforms'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['MPiling_mats_working-platforms']=="A" ? $data['MPiling_mats_working-platforms'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['MPiling_mats_working-platforms']=="K" ? $data['MPiling_mats_working-platforms'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['MPiling_mats_working-platforms']=="E" ? $data['MPiling_mats_working-platforms'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Lifting/ handling devices</td>
                                <td style="font-size:10px;">{{$data['Lifting_handling_devices']=="N" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Lifting_handling_devices']=="A" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Lifting_handling_devices']=="K" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Lifting_handling_devices']=="E" ? $data['Lifting_handling_devices'] : ''}}</td>
                            </tr>
                            <!-- 5 -->
                            @php $data= $competence->Excavation_earthworks;@endphp
                            <tr>
                                <td rowspan="6" style="font-size:10px;">Excavation/ earthworks</td>
                                <td style="font-size:10px;">Excavation support</td>
                                <td style="font-size:10px;">{{$data['Excavation_support']=="N" ? $data['Excavation_support'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Excavation_support']=="A" ? $data['Excavation_support'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Excavation_support']=="K" ? $data['Excavation_support'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Excavation_support']=="E" ? $data['Excavation_support'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Cofferdams</td>
                                <td style="font-size:10px;">{{$data['Cofferdams']=="N" ? $data['Cofferdams'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Cofferdams']=="A" ? $data['Cofferdams'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Cofferdams']=="K" ? $data['Cofferdams'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Cofferdams']=="E" ? $data['Cofferdams'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Embankment/ bunds</td>
                                <td style="font-size:10px;">{{$data['Embankment_bunds']=="N" ? $data['Embankment_bunds'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Embankment_bunds']=="A" ? $data['Embankment_bunds'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Embankment_bunds']=="K" ? $data['Embankment_bunds'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Embankment_bunds']=="E" ? $data['Embankment_bunds'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Ground anchor/ soil nailing</td>
                                <td style="font-size:10px;">{{$data['Ground_anchor_soil_nailing']=="N" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Ground_anchor_soil_nailing']=="A" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Ground_anchor_soil_nailing']=="K" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Ground_anchor_soil_nailing']=="E" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Open excavations</td>
                                <td style="font-size:10px;">{{$data['Open_excavations']=="N" ? $data['Open_excavations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Open_excavations']=="A" ? $data['Open_excavations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Open_excavations']=="K" ? $data['Open_excavations'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Open_excavations']=="E" ? $data['Open_excavations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Dewatering</td>
                                <td style="font-size:10px;">{{$data['Dewatering']=="N" ? $data['Dewatering'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Dewatering']=="A" ? $data['Dewatering'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Dewatering']=="K" ? $data['Dewatering'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Dewatering']=="E" ? $data['Dewatering'] : ''}}</td>
                            </tr>
                            <!--  -->
                            @php $data= $competence->Structural_stability;@endphp
                            <tr>
                                <td style="font-size:10px;" rowspan="6">Structural stability</td>
                                <td style="font-size:10px;">Existing structures during construction</td>
                                <td style="font-size:10px;">{{$data['Existing_structures_during_construction']=="N" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Existing_structures_during_construction']=="A" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Existing_structures_during_construction']=="K" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Existing_structures_during_construction']=="E" ? $data['Existing_structures_during_construction'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">New structures during construction</td>
                                <td style="font-size:10px;">{{$data['New_structures_during_construction']=="N" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['New_structures_during_construction']=="A" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['New_structures_during_construction']=="K" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['New_structures_during_construction']=="E" ? $data['New_structures_during_construction'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Structural steelwork erection</td>
                                <td style="font-size:10px;">{{$data['Structural_steelwork_erection']=="N" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Structural_steelwork_erection']=="A" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Structural_steelwork_erection']=="K" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Structural_steelwork_erection']=="E" ? $data['Structural_steelwork_erection'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Needling</td>
                                <td style="font-size:10px;">{{$data['Needling']=="N" ? $data['Needling'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Needling']=="A" ? $data['Needling'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Needling']=="K" ? $data['Needling'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Needling']=="E" ? $data['Needling'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Temporary underpinning</td>
                                 <td style="font-size:10px;">{{$data['Temporary_underpinning']=="N" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_underpinning']=="A" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_underpinning']=="K" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Temporary_underpinning']=="E" ? $data['Temporary_underpinning'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Façade system</td>
                                <td style="font-size:10px;">{{$data['Façade_system']=="N" ? $data['Façade_system'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Façade_system']=="A" ? $data['Façade_system'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Façade_system']=="K" ? $data['Façade_system'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Façade_system']=="E" ? $data['Façade_system'] : ''}}</td>
                            </tr>
                            <!--  -->
                             @php $data= $competence->Permanent_works;@endphp
                            <tr>
                                <td style="font-size:10px;" rowspan="2">Permanent works</td>
                                <td style="font-size:10px;">Partial permanent support conditions</td>
                                <td style="font-size:10px;">{{$data['Partial_permanent_support_conditions']=="N" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Partial_permanent_support_conditions']=="A" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Partial_permanent_support_conditions']=="K" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Partial_permanent_support_conditions']=="E" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;">Demolitions</td>
                                <td style="font-size:10px;">{{$data['Demolitions']=="N" ? $data['Demolitions'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Demolitions']=="A" ? $data['Demolitions'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Demolitions']=="K" ? $data['Demolitions'] : ''}}</td>
                                <td style="font-size:10px;">{{$data['Demolitions']=="E" ? $data['Demolitions'] : ''}}</td>
                            </tr>
                        </tbody>
                    </table>
        </div>

        <div class="tableDiv paddingTable">
             <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                <h4 style="margin: 0;font-size:13px">Individual being nominated</h4>
                <p style="margin: 0;font-size: 10px;">I confirm that this is a true record of my experience and qualifications. <br>
                    I have read and understood the xxxx Temporary Works procedure. <br>
                    I specifically understand my duties.
                </p>
            </div>
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                    <td style="font-size:10px;" style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Print name</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:10px;"> {{$nomination->print_name}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Job title</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:10px;">{{$nomination->job_title}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Signature</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:10px;">
                            @php 
                            $signature=$nomination->signature;
                            $n = strrpos($signature, '.');
                            $ext=substr($signature, $n+1);
                            @endphp
                            
                            @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                <img src="temporary/signature/{{$signature}}" width="auto" height="40">
                            @else
                            {{ucwords($signature)}}
                            @endif
                           
                         
                        </td>
                    </tr>
         
                    
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable">
            <div style="background:gray; padding: 8px; margin-top: 10px; color: white;">
                <h4 style="margin: 0;font-size:13px">Designated Individual from contractor nominating the individual for the role</h4>
                <p style="margin: 0;font-size: 10px;">I have assessed the competence of the individual being nominated for this role. <br>
                    I can confirm that they are competent to perform the duties that they have been nominated for.  <br>
                    I have formally appointed the individual to act in this position. <br>
                    My company will ensure that this individual will have suitable support to perform these duties.
                </p>
            </div>
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Print name</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:10px;">{{$nomination->print_name1}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Job title</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:10px;">{{$nomination->job_title1}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Signature</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:10px;">
                            @php 
                            $signature1=$nomination->signature1;
                            $n = strrpos($signature1, '.');
                            $ext=substr($signature1, $n+1);
                            @endphp
                            
                            @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                <img src="temporary/signature/{{$signature1}}" width="auto" height="40">
                            @else
                            {{ucwords($signature1)}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if(isset($images) && count($images)>0)
        {{--<div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                @foreach($images as $image)
                @if($image!=NULL)
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
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>--}}
        @endif

    </div>
</page>