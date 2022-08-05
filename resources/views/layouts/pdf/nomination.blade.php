
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
    <div style="padding: 10px; width: 100%; margin: auto;">
        <div class="topDiv" style="display: flex; justify-content: space-between;">
            <div class="logoText" style="float:left;width:70%">
                <h3>Temporary Works Person Nomination:</h3>
                <p style="width:200px !important">Provide supporting evidence to xxxxx of the competence, qualifications, training and experience of the individuals nominated to work as Temporary Works Supervisor, Temporary Works Coordinator or Temporary Works Designer. This form will enable xxxxx to assess the competence of the individual to undertake the appropriate role.</p>
            </div>
            
        </div>
        <div class="tableDiv paddingTable">
      
            <table>
                <tbody>
                    <tr style="min-height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['project'] ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Project Manager</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['project_manager'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated person</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['nominated_person'] ?? ''}}</td>
                    </tr>
         
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated person’s employer</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['nominated_person_employer'] ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Nominated role</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['nominated_role'] ?? ''}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Description of role being proposed:
                            (Include details of the type of temporary works that the individual will be managing)</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['description_of_role'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="font-weight:900;float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Description of the limits of authority of the individual (if applicable)</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$data['Description_limits_authority'] ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Does the individual have authority to issue permits to load / take into use and or permit to dismantle?</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:11px;">{{$data['authority_issue_permit'] ?? ''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                    <h4 style="margin-bottom: 0;">Temporary works qualifications</h4>
                    <p style="margin-bottom: 0;">List highest temporary works related qualifications held
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
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                    <h4 style="margin-bottom: 0;">Temporary works courses attended.</h4>
                    <p style="margin-bottom: 0;">Detail all relevant temporary works related courses the individual has attended <small>(copies of certification must be appended to this document)</small>
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
                        <td>
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
                       <td>{{$data['project_title'][$i]}}</td>
                       <td>{{$data['project_role'][$i]}}</td>
                       <td>{{$data['desc_of_involvement'][$i]}}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tableDiv paddingTable" style="margin: 20px 0px;">
            <table class="table tableBordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Area</td>
                                <td rowspan="2">Type of temporary works</td>
                                <td colspan="4">Level of experience</td>
                            </tr>
                            <tr>
                                <td class="text-center">N</td>
                                <td class="text-center">A</td>
                                <td class="text-center">K</td>
                                <td class="text-center">E</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="10">Site establishment</td>
                                <td>Temporary offices</td>
                                <td>{{$data['Temporary_offices']=="N" ? $data['Temporary_offices'] : ''}}</td>
                                <td>{{$data['Temporary_offices']=="A" ? $data['Temporary_offices'] : ''}}</td>
                                <td>{{$data['Temporary_offices']=="K" ? $data['Temporary_offices'] : ''}}</td>
                                <td>{{$data['Temporary_offices']=="E" ? $data['Temporary_offices'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Sign boards</td>
                                <td>{{$data['Sign_boards']=="N" ? $data['Sign_boards'] : ''}}</td>
                                <td>{{$data['Sign_boards']=="A" ? $data['Sign_boards'] : ''}}</td>
                                <td>{{$data['Sign_boards']=="K" ? $data['Sign_boards'] : ''}}</td>
                                <td>{{$data['Sign_boards']=="E" ? $data['Sign_boards'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Hoardings</td>
                                <td>{{$data['Hoardings']=="N" ? $data['Hoardings'] : ''}}</td>
                                <td>{{$data['Hoardings']=="A" ? $data['Hoardings'] : ''}}</td>
                                <td>{{$data['Hoardings']=="K" ? $data['Hoardings'] : ''}}</td>
                                <td>{{$data['Hoardings']=="E" ? $data['Hoardings'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Access gantries</td>
                                <td>{{$data['Access_gantries']=="N" ? $data['Access_gantries'] : ''}}</td>
                                <td>{{$data['Access_gantries']=="A" ? $data['Access_gantries'] : ''}}</td>
                                <td>{{$data['Access_gantries']=="K" ? $data['Access_gantries'] : ''}}</td>
                                <td>{{$data['Access_gantries']=="E" ? $data['Access_gantries'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Fuel storage</td>
                                <td>{{$data['Fuel_storage']=="N" ? $data['Fuel_storage'] : ''}}</td>
                                <td>{{$data['Fuel_storage']=="A" ? $data['Fuel_storage'] : ''}}</td>
                                <td>{{$data['Fuel_storage']=="K" ? $data['Fuel_storage'] : ''}}</td>
                                <td>{{$data['Fuel_storage']=="E" ? $data['Fuel_storage'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Temporary roads</td>
                                <td>{{$data['Temporary_roads']=="N" ? $data['Temporary_roads'] : ''}}</td>
                                <td>{{$data['Temporary_roads']=="A" ? $data['Temporary_roads'] : ''}}</td>
                                <td>{{$data['Temporary_roads']=="K" ? $data['Temporary_roads'] : ''}}</td>
                                <td>{{$data['Temporary_roads']=="E" ? $data['Temporary_roads'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Barriers</td>
                                <td>{{$data['Barriers']=="N" ? $data['Barriers'] : ''}}</td>
                                <td>{{$data['Barriers']=="A" ? $data['Barriers'] : ''}}</td>
                                <td>{{$data['Barriers']=="K" ? $data['Barriers'] : ''}}</td>
                                <td>{{$data['Barriers']=="E" ? $data['Barriers'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Welfare facilities</td>
                                <td>{{$data['Welfare_facilities']=="N" ? $data['Welfare_facilities'] : ''}}</td>
                                <td>{{$data['Welfare_facilities']=="A" ? $data['Welfare_facilities'] : ''}}</td>
                                <td>{{$data['Welfare_facilities']=="K" ? $data['Welfare_facilities'] : ''}}</td>
                                <td>{{$data['Welfare_facilities']=="E" ? $data['Welfare_facilities'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Precast facilities</td>
                                <td>{{$data['Precast_facilities']=="N" ? $data['Precast_facilities'] : ''}}</td>
                                <td>{{$data['Precast_facilities']=="A" ? $data['Precast_facilities'] : ''}}</td>
                                <td>{{$data['Precast_facilities']=="K" ? $data['Precast_facilities'] : ''}}</td>
                                <td>{{$data['Precast_facilities']=="E" ? $data['Precast_facilities'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Access bridges</td>
                                <td>{{$data['Access_bridges']=="N" ? $data['Access_bridges'] : ''}}</td>
                                <td>{{$data['Access_bridges']=="A" ? $data['Access_bridges'] : ''}}</td>
                                <td>{{$data['Access_bridges']=="K" ? $data['Access_bridges'] : ''}}</td>
                                <td>{{$data['Access_bridges']=="E" ? $data['Access_bridges'] : ''}}</td>
                            </tr>
                            <!-- 2 -->
                            <tr>
                                <td rowspan="9">Access/ scaffolding</td>
                                <td>Tube & fitting</td>
                                <td>{{$data['Tube_fitting']=="N" ? $data['Tube_fitting'] : ''}}</td>
                                <td>{{$data['Tube_fitting']=="A" ? $data['Tube_fitting'] : ''}}</td>
                                <td>{{$data['Tube_fitting']=="K" ? $data['Tube_fitting'] : ''}}</td>
                                <td>{{$data['Tube_fitting']=="E" ? $data['Tube_fitting'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>System scaffolding</td>
                                <td>{{$data['System_scaffolding']=="N" ? $data['System_scaffolding'] : ''}}</td>
                                <td>{{$data['System_scaffolding']=="A" ? $data['System_scaffolding'] : ''}}</td>
                                <td>{{$data['System_scaffolding']=="K" ? $data['System_scaffolding'] : ''}}</td>
                                <td>{{$data['System_scaffolding']=="E" ? $data['System_scaffolding'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>System staircases</td>
                                <td>{{$data['System_staircases']=="N" ? $data['System_staircases'] : ''}}</td>
                                <td>{{$data['System_staircases']=="A" ? $data['System_staircases'] : ''}}</td>
                                <td>{{$data['System_staircases']=="K" ? $data['System_staircases'] : ''}}</td>
                                <td>{{$data['System_staircases']=="E" ? $data['System_staircases'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Temporary roofs</td>
                                <td>{{$data['Temporary_roofs']=="N" ? $data['Temporary_roofs'] : ''}}</td>
                                <td>{{$data['Temporary_roofs']=="A" ? $data['Temporary_roofs'] : ''}}</td>
                                <td>{{$data['Temporary_roofs']=="K" ? $data['Temporary_roofs'] : ''}}</td>
                                <td>{{$data['Temporary_roofs']=="E" ? $data['Temporary_roofs'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Loading bays</td>
                                <td>{{$data['Loading_bays']=="N" ? $data['Loading_bays'] : ''}}</td>
                                <td>{{$data['Loading_bays']=="A" ? $data['Loading_bays'] : ''}}</td>
                                <td>{{$data['Loading_bays']=="K" ? $data['Loading_bays'] : ''}}</td>
                                <td>{{$data['Loading_bays']=="E" ? $data['Loading_bays'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Chute support</td>
                                <td>{{$data['Chute_support']=="N" ? $data['Chute_support'] : ''}}</td>
                                <td>{{$data['Chute_support']=="A" ? $data['Chute_support'] : ''}}</td>
                                <td>{{$data['Chute_support']=="K" ? $data['Chute_support'] : ''}}</td>
                                <td>{{$data['Chute_support']=="E" ? $data['Chute_support'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Mobile towers</td>
                                <td>{{$data['Mobile_towers']=="N" ? $data['Mobile_towers'] : ''}}</td>
                                <td>{{$data['Mobile_towers']=="A" ? $data['Mobile_towers'] : ''}}</td>
                                <td>{{$data['Mobile_towers']=="K" ? $data['Mobile_towers'] : ''}}</td>
                                <td>{{$data['Mobile_towers']=="E" ? $data['Mobile_towers'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Edge protection</td>
                                <td>{{$data['Edge_protection']=="N" ? $data['Edge_protection'] : ''}}</td>
                                <td>{{$data['Edge_protection']=="A" ? $data['Edge_protection'] : ''}}</td>
                                <td>{{$data['Edge_protection']=="K" ? $data['Edge_protection'] : ''}}</td>
                                <td>{{$data['Edge_protection']=="E" ? $data['Edge_protection'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Suspension systems</td>
                                <td>{{$data['Suspension_systems']=="N" ? $data['Suspension_systems'] : ''}}</td>
                                <td>{{$data['Suspension_systems']=="A" ? $data['Suspension_systems'] : ''}}</td>
                                <td>{{$data['Suspension_systems']=="K" ? $data['Suspension_systems'] : ''}}</td>
                                <td>{{$data['Suspension_systems']=="E" ? $data['Suspension_systems'] : ''}}</td>
                            </tr>
                            <!-- 3 -->
                            <tr>
                                <td rowspan="4">Formwork/ falsework</td>
                                <td>Formwork</td>
                                <td>{{$data['Formwork']=="N" ? $data['Formwork'] : ''}}</td>
                                <td>{{$data['Formwork']=="A" ? $data['Formwork'] : ''}}</td>
                                <td>{{$data['Formwork']=="K" ? $data['Formwork'] : ''}}</td>
                                <td>{{$data['Formwork']=="E" ? $data['Formwork'] : ''}}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Falsework</td>
                                <td>{{$data['Falsework']=="N" ? $data['Falsework'] : ''}}</td>
                                <td>{{$data['Falsework']=="A" ? $data['Falsework'] : ''}}</td>
                                <td>{{$data['Falsework']=="K" ? $data['Falsework'] : ''}}</td>
                                <td>{{$data['Falsework']=="E" ? $data['Falsework'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Back propping</td>
                                <td>{{$data['Back_propping']=="N" ? $data['Back_propping'] : ''}}</td>
                                <td>{{$data['Back_propping']=="A" ? $data['Back_propping'] : ''}}</td>
                                <td>{{$data['Back_propping']=="K" ? $data['Back_propping'] : ''}}</td>
                                <td>{{$data['Back_propping']=="E" ? $data['Back_propping'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Support systems</td>
                                <td>{{$data['Support_systems']=="N" ? $data['Support_systems'] : ''}}</td>
                                <td>{{$data['Support_systems']=="A" ? $data['Support_systems'] : ''}}</td>
                                <td>{{$data['Support_systems']=="K" ? $data['Support_systems'] : ''}}</td>
                                <td>{{$data['Support_systems']=="E" ? $data['Support_systems'] : ''}}</td>
                            </tr>
                            <!-- 4 -->
                            <tr>
                                <td rowspan="6">Construction plant</td>
                                <td>Crane supports & foundations</td>
                                <td>{{$data['Crane_supports_foundations']=="N" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td>{{$data['Crane_supports_foundations']=="A" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td>{{$data['Crane_supports_foundations']=="K" ? $data['Crane_supports_foundations'] : ''}}</td>
                                <td>{{$data['Crane_supports_foundations']=="E" ? $data['Crane_supports_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Hoist ties & foundations</td>
                                <td>{{$data['Hoist_ties_foundations']=="N" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td>{{$data['Hoist_ties_foundations']=="A" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td>{{$data['Hoist_ties_foundations']=="K" ? $data['Hoist_ties_foundations'] : ''}}</td>
                                <td>{{$data['Hoist_ties_foundations']=="E" ? $data['Hoist_ties_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Mast climbers & foundations</td>
                               <td>{{$data['Mast_climbers_foundations']=="N" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td>{{$data['Mast_climbers_foundations']=="A" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td>{{$data['Mast_climbers_foundations']=="K" ? $data['Mast_climbers_foundations'] : ''}}</td>
                                <td>{{$data['Mast_climbers_foundations']=="E" ? $data['Mast_climbers_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Mobile crane foundations</td>
                               <td>{{$data['Mobile_crane_foundations']=="N" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td>{{$data['Mobile_crane_foundations']=="A" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td>{{$data['Mobile_crane_foundations']=="K" ? $data['Mobile_crane_foundations'] : ''}}</td>
                                <td>{{$data['Mobile_crane_foundations']=="E" ? $data['Mobile_crane_foundations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Piling mats & working platforms</td>
                                 <td>{{$data['Piling_mats_working_platforms']=="N" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                                <td>{{$data['Piling_mats_working_platforms']=="A" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                                <td>{{$data['Piling_mats_working_platforms']=="K" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                                <td>{{$data['Piling_mats_working_platforms']=="E" ? $data['Piling_mats_working_platforms'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Lifting/ handling devices</td>
                                <td>{{$data['Lifting_handling_devices']=="N" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td>{{$data['Lifting_handling_devices']=="A" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td>{{$data['Lifting_handling_devices']=="K" ? $data['Lifting_handling_devices'] : ''}}</td>
                                <td>{{$data['Lifting_handling_devices']=="E" ? $data['Lifting_handling_devices'] : ''}}</td>
                            </tr>
                            <!-- 5 -->
                            <tr>
                                <td rowspan="6">Excavation/ earthworks</td>
                                <td>Excavation support</td>
                                <td>{{$data['Excavation_support']=="N" ? $data['Excavation_support'] : ''}}</td>
                                <td>{{$data['Excavation_support']=="A" ? $data['Excavation_support'] : ''}}</td>
                                <td>{{$data['Excavation_support']=="K" ? $data['Excavation_support'] : ''}}</td>
                                <td>{{$data['Excavation_support']=="E" ? $data['Excavation_support'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Cofferdams</td>
                                <td>{{$data['Cofferdams']=="N" ? $data['Cofferdams'] : ''}}</td>
                                <td>{{$data['Cofferdams']=="A" ? $data['Cofferdams'] : ''}}</td>
                                <td>{{$data['Cofferdams']=="K" ? $data['Cofferdams'] : ''}}</td>
                                <td>{{$data['Cofferdams']=="E" ? $data['Cofferdams'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Embankment/ bunds</td>
                                <td>{{$data['Embankment_bunds']=="N" ? $data['Embankment_bunds'] : ''}}</td>
                                <td>{{$data['Embankment_bunds']=="A" ? $data['Embankment_bunds'] : ''}}</td>
                                <td>{{$data['Embankment_bunds']=="K" ? $data['Embankment_bunds'] : ''}}</td>
                                <td>{{$data['Embankment_bunds']=="E" ? $data['Embankment_bunds'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Ground anchor/ soil nailing</td>
                                <td>{{$data['Ground_anchor_soil_nailing']=="N" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td>{{$data['Ground_anchor_soil_nailing']=="A" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td>{{$data['Ground_anchor_soil_nailing']=="K" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                                <td>{{$data['Ground_anchor_soil_nailing']=="E" ? $data['Ground_anchor_soil_nailing'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Open excavations</td>
                                <td>{{$data['Open_excavations']=="N" ? $data['Open_excavations'] : ''}}</td>
                                <td>{{$data['Open_excavations']=="A" ? $data['Open_excavations'] : ''}}</td>
                                <td>{{$data['Open_excavations']=="K" ? $data['Open_excavations'] : ''}}</td>
                                <td>{{$data['Open_excavations']=="E" ? $data['Open_excavations'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Dewatering</td>
                                <td>{{$data['Dewatering']=="N" ? $data['Dewatering'] : ''}}</td>
                                <td>{{$data['Dewatering']=="A" ? $data['Dewatering'] : ''}}</td>
                                <td>{{$data['Dewatering']=="K" ? $data['Dewatering'] : ''}}</td>
                                <td>{{$data['Dewatering']=="E" ? $data['Dewatering'] : ''}}</td>
                            </tr>
                            <!--  -->
                            <tr>
                                <td rowspan="6">Structural stability</td>
                                <td>Existing structures during construction</td>
                                <td>{{$data['Existing_structures_during_construction']=="N" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td>{{$data['Existing_structures_during_construction']=="A" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td>{{$data['Existing_structures_during_construction']=="K" ? $data['Existing_structures_during_construction'] : ''}}</td>
                                <td>{{$data['Existing_structures_during_construction']=="E" ? $data['Existing_structures_during_construction'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>New structures during construction</td>
                                <td>{{$data['New_structures_during_construction']=="N" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td>{{$data['New_structures_during_construction']=="A" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td>{{$data['New_structures_during_construction']=="K" ? $data['New_structures_during_construction'] : ''}}</td>
                                <td>{{$data['New_structures_during_construction']=="E" ? $data['New_structures_during_construction'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Structural steelwork erection</td>
                                <td>{{$data['Structural_steelwork_erection']=="N" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td>{{$data['Structural_steelwork_erection']=="A" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td>{{$data['Structural_steelwork_erection']=="K" ? $data['Structural_steelwork_erection'] : ''}}</td>
                                <td>{{$data['Structural_steelwork_erection']=="E" ? $data['Structural_steelwork_erection'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Needling</td>
                                <td>{{$data['Needling']=="N" ? $data['Needling'] : ''}}</td>
                                <td>{{$data['Needling']=="A" ? $data['Needling'] : ''}}</td>
                                <td>{{$data['Needling']=="K" ? $data['Needling'] : ''}}</td>
                                <td>{{$data['Needling']=="E" ? $data['Needling'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Temporary underpinning</td>
                                 <td>{{$data['Temporary_underpinning']=="N" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td>{{$data['Temporary_underpinning']=="A" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td>{{$data['Temporary_underpinning']=="K" ? $data['Temporary_underpinning'] : ''}}</td>
                                <td>{{$data['Temporary_underpinning']=="E" ? $data['Temporary_underpinning'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Façade system</td>
                                <td>{{$data['Façade_system']=="N" ? $data['Façade_system'] : ''}}</td>
                                <td>{{$data['Façade_system']=="A" ? $data['Façade_system'] : ''}}</td>
                                <td>{{$data['Façade_system']=="K" ? $data['Façade_system'] : ''}}</td>
                                <td>{{$data['Façade_system']=="E" ? $data['Façade_system'] : ''}}</td>
                            </tr>
                            <!--  -->
                            <tr>
                                <td rowspan="2">Permanent works</td>
                                <td>Partial permanent support conditions</td>
                                <td>{{$data['Partial_permanent_support_conditions']=="N" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td>{{$data['Partial_permanent_support_conditions']=="A" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td>{{$data['Partial_permanent_support_conditions']=="K" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                                <td>{{$data['Partial_permanent_support_conditions']=="E" ? $data['Partial_permanent_support_conditions'] : ''}}</td>
                            </tr>
                            <tr>
                                <td>Demolitions</td>
                                <td>{{$data['Demolitions']=="N" ? $data['Demolitions'] : ''}}</td>
                                <td>{{$data['Demolitions']=="A" ? $data['Demolitions'] : ''}}</td>
                                <td>{{$data['Demolitions']=="K" ? $data['Demolitions'] : ''}}</td>
                                <td>{{$data['Demolitions']=="E" ? $data['Demolitions'] : ''}}</td>
                            </tr>
                        </tbody>
                    </table>
        </div>

        <div class="tableDiv paddingTable">
             <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                <h4 style="margin-bottom: 0;">Individual being nominated</h4>
                <p style="margin-bottom: 0;">I confirm that this is a true record of my experience and qualifications. <br>
                    I have read and understood the xxxx Temporary Works procedure. <br>
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
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['signature']}}</td>
                    </tr>
         
                    
                </tbody>
            </table>
        </div>

        <div class="tableDiv paddingTable">
            <div style="background:gray; padding: 12px; margin-top: 20px; color: white;">
                <h4>Designated Individual from contractor nominating the individual for the role</h4>
                <p style="margin-bottom: 0;">I have assessed the competence of the individual being nominated for this role. <br>
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
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['print_name1']}}</td>
                    </tr>
                    <tr style="height: 150px;">
                    <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Job title</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['job_title1']}}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;background:gray;color:white">
                            <label for="" style="float: left;width: 200px; font-size: 14px; padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Signature</b></label>
                        </td>
                        <td colspan="3" style="width: 300px; font-size:12px;">{{$data['signature1']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</page>