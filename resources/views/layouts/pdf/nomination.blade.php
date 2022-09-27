
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
    table *{
        font-size: 11px !important;
    }
</style>
<page pageset="old">
    <div style="padding: 10px; width: 100%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText" style="float:left;">
                <h3>Temporary Works Person Nomination:</h3>
                <p style="font-size:12px">Provide supporting evidence to {{$user->userCompany->name}} of the competence, qualifications, training and experience of the individuals nominated to work as {{$data['nominated_role']}}. This form will enable {{$user->userCompany->name}} to assess the competence of the individual to undertake the appropriate role.</p>
            </div>
            
        </div>
        <div class="tableDiv paddingTable">
      
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$project_no ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project Manager</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['project_manager'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated person</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['nominated_person'] ?? ''}}</td>
                    </tr>
         
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated person’s employer</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['nominated_person_employer'] ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated role</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['nominated_role'] ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Description of role being proposed:
                            (Include details of the type of temporary works that the individual will be managing)</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['description_of_role'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 400px;background:gray;color:white">
                            <label for="" style="font-weight:900;float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Description of the limits of authority of the individual (if applicable)</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['Description_limits_authority'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 400px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Does the individual have authority to issue permits to load / take into use and or permit to dismantle?</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['authority_issue_permit'] ?? ''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 10px 0px;">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                    <h4 style="margin: 0;font-size:14px;">Temporary works qualifications</h4>
                    <p style="margin: 0;font-size:12px;">List highest temporary works related qualifications held
                    </p>
                </div>
            <table>
                <thead style="background:gray;color:white">
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Qualification</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Date</td>
                    </tr>
                </thead>
                <tbody>
                    @php $i=0;@endphp
                    @foreach($data['qualification'] as $qualification)
                    <tr>
                        <td style="font-size:12px;">{{$data['qualification'][$i]}}</td>
                        <td style="font-size:12px;">{{$data['qualification_date'][$i]}}</td>
                    </tr>
                     @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 10px 0px;">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                    <h4 style="margin: 0;font-size:14px;">Temporary works courses attended.</h4>
                    <p style="margin: 0;font-size:12px;">Detail all relevant temporary works related courses the individual has attended <small>(copies of certification must be appended to this document)</small>
                    </p>
            </div>
            <table>
                <thead>
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Course title</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Date</td>
                    </tr>
                </thead>
                <tbody>
                   @php $i=0;@endphp
                    @foreach($data['course'] as $course)
                    <tr>
                        <td style="font-size:12px;">
                            {{$data['course'][$i]}}
                         </td>
                        <td style="font-size:12px;">
                            {{$data['course_date'][$i]}}
                        </td>
                            
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <thead>
                    <tr>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Project title</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Role</td>
                        <td style="color: #fff; background: gray !important; padding: 10px; font-size:12px;">Description of involvement</td>
                    </tr>
                </thead>
                <tbody>
                   @php $i=0;@endphp
                    @foreach($data['project_title'] as $proj)
                    <tr>
                       <td style="font-size:12px;">{{$data['project_title'][$i]}}</td>
                       <td style="font-size:12px;">{{$data['project_role'][$i]}}</td>
                       <td style="font-size:12px;">{{$data['desc_of_involvement'][$i]}}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 10px 0px;">
            <table class="table tableBordered">
                        <thead>
                            <tr>
                                <td rowspan="2" style="text-align: center;font-size:12px;"><b>Area</b></td>
                                <td rowspan="2" style="text-align: center;font-size:12px;"><b>Type of temporary works</b></td>
                                <td colspan="4" style="text-align: center;font-size:12px;"><b>Level of experience</b></td>
                            </tr>
                            <tr>
                                <td class="text-center" style="font-size:12px;">N</td>
                                <td class="text-center" style="font-size:12px;">A</td>
                                <td class="text-center" style="font-size:12px;">K</td>
                                <td class="text-center" style="font-size:12px;">E</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="10"  style="font-size:12px;">Site establishment</td>
                                <td style="font-size:12px;">Temporary offices</td>
                                <td style="font-size:12px;">{{$data['Temporary_offices']=="N" ? $data['Temporary_offices'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_offices']=="A" ? $data['Temporary_offices'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_offices']=="K" ? $data['Temporary_offices'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_offices']=="E" ? $data['Temporary_offices'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Sign boards</td>
                                <td style="font-size:12px;">{{$data['Sign_boards']=="N" ? $data['Sign_boards'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Sign_boards']=="A" ? $data['Sign_boards'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Sign_boards']=="K" ? $data['Sign_boards'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Sign_boards']=="E" ? $data['Sign_boards'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Hoardings</td>
                                <td style="font-size:12px;">{{$data['Hoardings']=="N" ? $data['Hoardings'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Hoardings']=="A" ? $data['Hoardings'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Hoardings']=="K" ? $data['Hoardings'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Hoardings']=="E" ? $data['Hoardings'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Access gantries</td>
                                <td style="font-size:12px;">{{$data['Access_gantries']=="N" ? $data['Access_gantries'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Access_gantries']=="A" ? $data['Access_gantries'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Access_gantries']=="K" ? $data['Access_gantries'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Access_gantries']=="E" ? $data['Access_gantries'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Fuel storage</td>
                                <td style="font-size:12px;">{{$data['Fuel_storage']=="N" ? $data['Fuel_storage'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Fuel_storage']=="A" ? $data['Fuel_storage'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Fuel_storage']=="K" ? $data['Fuel_storage'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Fuel_storage']=="E" ? $data['Fuel_storage'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Temporary roads</td>
                                <td style="font-size:12px;">{{$data['Temporary_roads']=="N" ? $data['Temporary_roads'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_roads']=="A" ? $data['Temporary_roads'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_roads']=="K" ? $data['Temporary_roads'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_roads']=="E" ? $data['Temporary_roads'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Barriers</td>
                                <td style="font-size:12px;">{{$data['Barriers']=="N" ? $data['Barriers'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Barriers']=="A" ? $data['Barriers'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Barriers']=="K" ? $data['Barriers'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Barriers']=="E" ? $data['Barriers'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Welfare facilities</td>
                                <td style="font-size:12px;">{{$data['Welfare_facilities']=="N" ? $data['Welfare_facilities'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Welfare_facilities']=="A" ? $data['Welfare_facilities'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Welfare_facilities']=="K" ? $data['Welfare_facilities'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Welfare_facilities']=="E" ? $data['Welfare_facilities'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Precast facilities</td>
                                <td style="font-size:12px;">{{$data['Precast_facilities']=="N" ? $data['Precast_facilities'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Precast_facilities']=="A" ? $data['Precast_facilities'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Precast_facilities']=="K" ? $data['Precast_facilities'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Precast_facilities']=="E" ? $data['Precast_facilities'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Access bridges</td>
                                <td style="font-size:12px;">{{$data['Access_bridges']=="N" ? $data['Access_bridges'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Access_bridges']=="A" ? $data['Access_bridges'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Access_bridges']=="K" ? $data['Access_bridges'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Access_bridges']=="E" ? $data['Access_bridges'] : ''}}</td>
                            </tr>
                            <!-- 2 -->
                            <tr>
                                <td rowspan="9"  style="font-size:12px;">Access/ scaffolding</td>
                                <td style="font-size:12px;">Tube & fitting</td>
                                <td style="font-size:12px;">{{$data['Tube_fitting']=="N" ? $data['Tube_fitting'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Tube_fitting']=="A" ? $data['Tube_fitting'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Tube_fitting']=="K" ? $data['Tube_fitting'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Tube_fitting']=="E" ? $data['Tube_fitting'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">System scaffolding</td>
                                <td style="font-size:12px;">{{$data['System_scaffolding']=="N" ? $data['System_scaffolding'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['System_scaffolding']=="A" ? $data['System_scaffolding'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['System_scaffolding']=="K" ? $data['System_scaffolding'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['System_scaffolding']=="E" ? $data['System_scaffolding'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">System staircases</td>
                                <td style="font-size:12px;">{{$data['System_staircases']=="N" ? $data['System_staircases'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['System_staircases']=="A" ? $data['System_staircases'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['System_staircases']=="K" ? $data['System_staircases'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['System_staircases']=="E" ? $data['System_staircases'] : ''}}</td>
                            </tr>
                            <tr>
                                <td  style="font-size:12px;">Temporary roofs</td>
                                <td style="font-size:12px;">{{$data['Temporary_roofs']=="N" ? $data['Temporary_roofs'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_roofs']=="A" ? $data['Temporary_roofs'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_roofs']=="K" ? $data['Temporary_roofs'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_roofs']=="E" ? $data['Temporary_roofs'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Loading bays</td>
                                <td style="font-size:12px;">{{$data['Loading_bays']=="N" ? $data['Loading_bays'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Loading_bays']=="A" ? $data['Loading_bays'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Loading_bays']=="K" ? $data['Loading_bays'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Loading_bays']=="E" ? $data['Loading_bays'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Chute support</td>
                                <td style="font-size:12px;">{{$data['Chute_support']=="N" ? $data['Chute_support'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Chute_support']=="A" ? $data['Chute_support'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Chute_support']=="K" ? $data['Chute_support'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Chute_support']=="E" ? $data['Chute_support'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Mobile towers</td>
                                <td style="font-size:12px;">{{$data['Mobile_towers']=="N" ? $data['Mobile_towers'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mobile_towers']=="A" ? $data['Mobile_towers'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mobile_towers']=="K" ? $data['Mobile_towers'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mobile_towers']=="E" ? $data['Mobile_towers'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Edge protection</td>
                                <td style="font-size:12px;">{{$data['Edge_protection']=="N" ? $data['Edge_protection'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Edge_protection']=="A" ? $data['Edge_protection'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Edge_protection']=="K" ? $data['Edge_protection'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Edge_protection']=="E" ? $data['Edge_protection'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Suspension systems</td>
                                <td style="font-size:12px;">{{$data['Suspension_systems']=="N" ? $data['Suspension_systems'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Suspension_systems']=="A" ? $data['Suspension_systems'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Suspension_systems']=="K" ? $data['Suspension_systems'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Suspension_systems']=="E" ? $data['Suspension_systems'] : ''}}</td>
                            </tr>
                            <!-- 3 -->
                            <tr>
                                <td style="font-size:12px;" rowspan="4">Formwork/ falsework</td>
                                <td style="font-size:12px;">Formwork</td>
                                <td style="font-size:12px;">{{$data['Formwork']=="N" ? $data['Formwork'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Formwork']=="A" ? $data['Formwork'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Formwork']=="K" ? $data['Formwork'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Formwork']=="E" ? $data['Formwork'] : ''}}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Falsework</td>
                                <td style="font-size:12px;">{{$data['Falsework']=="N" ? $data['Falsework'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Falsework']=="A" ? $data['Falsework'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Falsework']=="K" ? $data['Falsework'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Falsework']=="E" ? $data['Falsework'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Back propping</td>
                                <td style="font-size:12px;">{{$data['Back_propping']=="N" ? $data['Back_propping'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Back_propping']=="A" ? $data['Back_propping'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Back_propping']=="K" ? $data['Back_propping'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Back_propping']=="E" ? $data['Back_propping'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Support systems</td>
                                <td style="font-size:12px;">{{$data['Support_systems']=="N" ? $data['Support_systems'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Support_systems']=="A" ? $data['Support_systems'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Support_systems']=="K" ? $data['Support_systems'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Support_systems']=="E" ? $data['Support_systems'] : ''}}</td>
                            </tr>
                            <!-- 4 -->
                            <tr>
                                <td style="font-size:12px;" rowspan="6">Construction plant</td>
                                <td style="font-size:12px;">Crane supports & foundations</td>
                                <td style="font-size:12px;">{{$data['Crane_supports_foundations']=="N" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Crane_supports_foundations']=="A" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Crane_supports_foundations']=="K" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Crane_supports_foundations']=="E" ? $data['Crane_supports_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Hoist ties & foundations</td>
                                <td style="font-size:12px;">{{$data['Hoist_ties_foundations']=="N" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Hoist_ties_foundations']=="A" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Hoist_ties_foundations']=="K" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Hoist_ties_foundations']=="E" ? $data['Hoist_ties_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Mast climbers & foundations</td>
                               <td style="font-size:12px;">{{$data['Mast_climbers_foundations']=="N" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mast_climbers_foundations']=="A" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mast_climbers_foundations']=="K" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mast_climbers_foundations']=="E" ? $data['Mast_climbers_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Mobile crane foundations</td>
                               <td style="font-size:12px;">{{$data['Mobile_crane_foundations']=="N" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mobile_crane_foundations']=="A" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mobile_crane_foundations']=="K" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Mobile_crane_foundations']=="E" ? $data['Mobile_crane_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Piling mats & working platforms</td>
                                 <td style="font-size:12px;">{{$data['Piling_mats_working_platforms']=="N" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Piling_mats_working_platforms']=="A" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Piling_mats_working_platforms']=="K" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Piling_mats_working_platforms']=="E" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Lifting/ handling devices</td>
                                <td style="font-size:12px;">{{$data['Lifting_handling_devices']=="N" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Lifting_handling_devices']=="A" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Lifting_handling_devices']=="K" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Lifting_handling_devices']=="E" ? $data['Lifting_handling_devices'] : ''}}</td>
                            </tr>
                            <!-- 5 -->
                            <tr>
                                <td style="font-size:12px;" rowspan="6">Excavation/ earthworks</td>
                                <td style="font-size:12px;">Excavation support</td>
                                <td style="font-size:12px;">{{$data['Excavation_support']=="N" ? $data['Excavation_support'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Excavation_support']=="A" ? $data['Excavation_support'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Excavation_support']=="K" ? $data['Excavation_support'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Excavation_support']=="E" ? $data['Excavation_support'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Cofferdams</td>
                                <td style="font-size:12px;">{{$data['Cofferdams']=="N" ? $data['Cofferdams'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Cofferdams']=="A" ? $data['Cofferdams'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Cofferdams']=="K" ? $data['Cofferdams'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Cofferdams']=="E" ? $data['Cofferdams'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Embankment/ bunds</td>
                                <td style="font-size:12px;">{{$data['Embankment_bunds']=="N" ? $data['Embankment_bunds'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Embankment_bunds']=="A" ? $data['Embankment_bunds'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Embankment_bunds']=="K" ? $data['Embankment_bunds'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Embankment_bunds']=="E" ? $data['Embankment_bunds'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Ground anchor/ soil nailing</td>
                                <td style="font-size:12px;">{{$data['Ground_anchor_soil_nailing']=="N" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Ground_anchor_soil_nailing']=="A" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Ground_anchor_soil_nailing']=="K" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Ground_anchor_soil_nailing']=="E" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Open excavations</td>
                                <td style="font-size:12px;">{{$data['Open_excavations']=="N" ? $data['Open_excavations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Open_excavations']=="A" ? $data['Open_excavations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Open_excavations']=="K" ? $data['Open_excavations'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Open_excavations']=="E" ? $data['Open_excavations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Dewatering</td>
                                <td style="font-size:12px;">{{$data['Dewatering']=="N" ? $data['Dewatering'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Dewatering']=="A" ? $data['Dewatering'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Dewatering']=="K" ? $data['Dewatering'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Dewatering']=="E" ? $data['Dewatering'] : ''}}</td>
                            </tr>
                            <!--  -->
                            <tr>
                                <td style="font-size:12px;" rowspan="6">Structural stability</td>
                                <td style="font-size:12px;">Existing structures during construction</td>
                                <td style="font-size:12px;">{{$data['Existing_structures_during_construction']=="N" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Existing_structures_during_construction']=="A" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Existing_structures_during_construction']=="K" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Existing_structures_during_construction']=="E" ? $data['Existing_structures_during_construction'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">New structures during construction</td>
                                <td style="font-size:12px;">{{$data['New_structures_during_construction']=="N" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['New_structures_during_construction']=="A" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['New_structures_during_construction']=="K" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['New_structures_during_construction']=="E" ? $data['New_structures_during_construction'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Structural steelwork erection</td>
                                <td style="font-size:12px;">{{$data['Structural_steelwork_erection']=="N" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Structural_steelwork_erection']=="A" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Structural_steelwork_erection']=="K" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Structural_steelwork_erection']=="E" ? $data['Structural_steelwork_erection'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Needling</td>
                                <td style="font-size:12px;">{{$data['Needling']=="N" ? $data['Needling'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Needling']=="A" ? $data['Needling'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Needling']=="K" ? $data['Needling'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Needling']=="E" ? $data['Needling'] : ''}}</td>
                            </tr>
                            <tr>
                                <td  style="font-size:12px;">Temporary underpinning</td>
                                 <td style="font-size:12px;">{{$data['Temporary_underpinning']=="N" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_underpinning']=="A" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_underpinning']=="K" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Temporary_underpinning']=="E" ? $data['Temporary_underpinning'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Façade system</td>
                                <td style="font-size:12px;">{{$data['Façade_system']=="N" ? $data['Façade_system'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Façade_system']=="A" ? $data['Façade_system'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Façade_system']=="K" ? $data['Façade_system'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Façade_system']=="E" ? $data['Façade_system'] : ''}}</td>
                            </tr>
                            <!--  -->
                            <tr>
                                <td rowspan="2"  style="font-size:12px;">Permanent works</td>
                                <td style="font-size:12px;">Partial permanent support conditions</td>
                                <td style="font-size:12px;">{{$data['Partial_permanent_support_conditions']=="N" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Partial_permanent_support_conditions']=="A" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Partial_permanent_support_conditions']=="K" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Partial_permanent_support_conditions']=="E" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;">Demolitions</td>
                                <td style="font-size:12px;">{{$data['Demolitions']=="N" ? $data['Demolitions'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Demolitions']=="A" ? $data['Demolitions'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Demolitions']=="K" ? $data['Demolitions'] : ''}}</td>
                                <td style="font-size:12px;">{{$data['Demolitions']=="E" ? $data['Demolitions'] : ''}}</td>
                            </tr>
                        </tbody>
                    </table>
        </div>

        <div class="tableDiv paddingTable">
             <div style="background:gray; padding: 12px; margin-top: 10px; color: white;">
                <h4 style="margin: 0;font-size:14px;">Individual being nominated</h4>
                <p style="margin: 0;font-size:12px;">I confirm that this is a true record of my experience and qualifications. <br>
                    I have read and understood the {{$user->userCompany->name}} Temporary Works procedure. <br>
                    I specifically understand my duties.
                </p>
            </div>
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Print name</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;"> {{$data['print_name']}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Job title</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['job_title']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Signature</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">
                            @if($data['signtype']=='1')
                            {{ucwords($signature)}}
                            @else
                            <img src="temporary/signature/{{$signature}}" width="auto" height="120">
                            @endif
                         
                        </td>
                    </tr>
         
                    
                </tbody>
            </table>
        </div>

        

        @if(isset($images) && count($images)>0)
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table>
                <tbody>
                @foreach($images as $image)
                @php 
                    $n = strrpos($image, '.');
                    $ext=substr($image, $n+1);
                     
                @endphp
                    <tr>
                        <td>
                            @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                            <img src="{{$image}}" width="500" alt="img"/>
                            @elseif($ext!='pdf')
                            <a href="{{asset($image)}}" target="_blank">Attachment</a>
                            @elseif($nomerge)
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