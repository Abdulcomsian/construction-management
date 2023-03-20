<!------ Design Requiremnts Modal ---->
<style>
    .form-control.form-control-solid{
        background: black;
    }
    .designRequirmentList {
        display: block;
    }
    .designRequirmentList .requirment-first{
        width: 100% !important;
        margin-left: 0;
    }
    .designRequirmentList  .list-div ul li:after{
        transform: rotate(90deg);
    }
    
    .designRequirmentList  .list-div ul li{
        height: 40px !important;
        border: 1px solid lightgrey;
        display: flex;
        justify-content: space-between;
    }
    /* .establishment li,
    .equipment li{
        border-left: none !important; 
        border-right: none !important; 
        border-top: none !important;
    } */
    .establishment li::after,
    .equipment li::after{
        content: none !important;
    }
    .fa-check{
        background-color: #07D564;
        color: white;
        padding: 3px;
        border-radius: 100%;
    }
    .hidden{
        display: none;
    }
    .show{
        display: block;
    }
    .list-div .submenu li::after{
        content: '';
    }

    #attachment-of-design{
        font-family: 'Inter', sans-serif;
    }
    #attachment-of-design .modal-header h2{
        font-size: 26px;
        font-weight: 700;
        width: 80%;
    }
    .majorList{
        border: 1px solid lightgrey;
        height: auto !important;
        font-size: 16px;
        font-weight: 400;
        color: 
    }

    
    .form-check-input[type=radio]{
        width: 15px !important;
        height: 15px !important;
    }

    #attachment-first li {
        height: auto;
    }
    .borderActive{
        border: 1px solid #07D564; 
        border-radius: 5px
    }
    .active{
        margin: 0 !important;
    }
    .active::after{
        transform: rotate(90deg);
    }

    #desingform .form-check-input[type=radio]{
        border: 2px solid lightgray !important;
        position: relative;
        left: 11px;
    }
    .multi-Radio{
        min-width: 120px;
    }

    .List-Attachment::after,
    .Report-Site::after,
    Exsisting-Ground::after,
    System-Type::after,
    Limitations::after,
    Back-Propping::after,
    Temporary-Work::after,
    Party-Requirements::after{
        content: none !important;
    }
   
</style>
<!--begin::Modal - Design Requirement-->
<div class="modal fade" id="design-requirement" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Design Requirement</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <div class="multi-list designRequirmentList" >
                    <div class="common-requirment requirment-first">
                        <input type="text" value="" class="requirment-first-value">
                        <input type="text" vlaue="" class="requirment-second-value">
                        <div class="list-div">
                            <ul>
                                <li data-id="establishment" id="establishment" class="majorMenu">Site Establishment
                               
                                </li>
                                <ul class="d-none establishment submenu" style="width: 90%;margin: auto;">
                                    <li data-id="Trench">Temporary Office / Cabins foundations</li>
                                    <li data-id="Manhole">Stacked Cabin stability (cabins only)</li>
                                    <li data-id="Cofferdams">Hoarding / Tower Crane Hoarding</li>
                                    <li data-id="Excavation">Site hoarding - Heras</li>
                                    <li data-id="Capping">Access / Scaffolding</li>
                                    <li data-id="Temporary">Access Gantries / Platform</li>
                                    <li data-id="Temporary">Access Bridges</li>
                                    <li data-id="Headings">Barriers </li>
                                    <li data-id="sign">Sign Boards </li>
                                    <li data-id="Underpinning">Fuel Storage</li>
                                    <li data-id="Stockpiles">Welfare Facilities</li>
                                    <li data-id="precast">Precast Facilities</li>
                                    <li data-id="PCC">Wheel Wash Base</li>
                                    <li data-id="gates">Gates - Steel Mesh</li>
                                    <li data-id="flag">Flag Pole Bases</li>
                                    <li data-id="Dewatering">Haul Road</li>
                                    <li data-id="State">Other Please State</li>
                                    <li>
                                        <input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state">
                                    </li>
                                </ul>
                                <li data-id="equipment " class="majorMenu">Equipment and Plant</li>
                                    <ul class="d-none equipment submenu" style="width: 90%;margin: auto;">
                                        <li>Pile Mat & Working Platform </li>
                                        <li>Crane Platform</li>
                                        <li>Crane Support & Foundations</li>
                                        <li>Crane Bases  - Out rigger concrete padsmissing </li>
                                        <li>Tower Crane Base (piled)</li>
                                        <li>Tower Crane Base (mass concrete)</li>
                                        <li>Access Platform for Machines and Temporary Ramps </li>
                                        <li>Concrete Pump Working Platform (outrigger check)</li>
                                        <li>Hoist Ties & Foundations</li>
                                        <li>Mast Climbers & Foundations</li>
                                        <li>Chute Support</li>
                                        <li>Loading Bay</li>
                                        <li>Canti Deck</li>
                                        <li>Soli Bases</li>
                                        <li>Lifting / Handling Devices</li>
                                        <li>Mobile Crane platforms</li>
                                        <li>Design outrigger load assessment on existing highway road / street</li>
                                        <li>Crane Outrigger loadings, mat and back propping</li>
                                        <li>Hoist bases, restraint and back propping</li>
                                        <li>Mobile crane outriggers</li>
                                        <li>Hoist Run offs</li>
                                        <li>Lifting  of prefabricated rebar column/ wall panels</li>
                                        <li>Lifting  of prefabricated rebar column/ wall panels</li>
                                        <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                                <li data-id="scaffolding " class="majorMenu">Access / Scaffolding</li>
                                    <ul class="d-none scaffolding submenu" style="width: 90%;margin: auto;">
                                        <li>Tube & Fitting</li>
                                        <li>System Scaffolding </li>
                                        <li>System Staircase</li>
                                        <li>Temporary Roof</li>
                                        <li>Loading Bay</li>
                                        <li>Chute Support</li>
                                        <li>Mobile Tower</li>
                                        <li>Pedestrian Walkway Cover</li>
                                        <li>Suspension System</li>
                                        <li>Pontoon</li>
                                        <li>Protection Shield (to cover railway while working with crane above)</li>
                                        <li>Protection Shield (steel shield to cover Railway while working with a crane above)</li>
                                        <li>Guard Rail Fixings</li>
                                        <li>Bird Cages</li>
                                        <li>Scaffold crash deck</li>
                                        <li>Scaffold road/ Pavement Gantry</li>
                                        <li>Façade access scaffold</li>
                                        <li>Lift shaft scaffold</li>
                                        <li>Temporary roof scaffold</li>
                                        <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                                <li data-id="excavation" class="majorMenu">Excavation Earthworks</li>
                                    <ul class="d-none excavation submenu" style="width: 90%;margin: auto;">
                                        <li>Trench sheeting</li>
                                        <li>Manhole/ Trench Boxes </li>
                                        <li>Cofferdams</li>
                                        <li>Excavation Shoring Systems</li>
                                        <li>Capping Beam Support</li>
                                        <li>Temporary Slopes</li>
                                        <li>Headings / Tunnel Support</li>
                                        <li>Underpinning</li>
                                        <li>Stockpiles</li>
                                        <li>PCC L shape wall</li>
                                        <li>Embankment Bund</li>
                                        <li>Dewatering</li>
                                        <li>Temporary access ramp construction</li>
                                        <li>Piling Mat</li>
                                        <li>Excavation batters</li>
                                        <li>Shoring to pile caps during excavation</li>
                                        <li>Earth works retention for basement, deep services  or attenuation tank construction</li>
                                        <li>Slope Stability</li>
                                        <li>Piled/ sheet piled wall propping</li>
                                        <li>Kingpost retaining walls</li>
                                        <li>Sheet piled retaining walls</li>
                                        <li>Road plates over trenches</li>
                                        <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                                <li data-id="formwork" class="majorMenu">Formwork / Falsework</li>
                                    <ul class="d-none formwork submenu" style="width: 90%;margin: auto;">
                                        <li>Foundation / Formwork</li>
                                        <li>Walls/ Formwork</li>
                                        <li>Walls/ Formwork (double sided)</li>
                                        <li>Walls/ Formwork (single sided)</li>
                                        <li>formwork rate of rise</li>
                                        <li>Formwork / Shaft Platforms</li>
                                        <li>walls double sided in timber (traditional)</li>
                                        <li>Columns / Formwork</li>
                                        <li>Formwork Climbing system</li>
                                        <li>Slab / Soffit Falsework</li>
                                        <li>System formwork to lift shaft walls (one typical core)</li>
                                        <li>Temporary propping to precast columns and walls</li>
                                        <li>temporary propping to precast slabs</li>
                                        <li>Beams / Falsework</li>
                                        <li>Back Propping</li>
                                        <li>Edge protection</li>
                                        <li>Support Systems</li>
                                        <li>Twin Wall Design and Support</li>
                                        <li>Push pull Precast walls and Columns</li>
                                        <li>Precast Stairs</li>
                                        <li>Crash Decks</li>
                                        <li>Metal Decking & Back Propping</li>
                                        <li>Screen Protection</li>
                                        <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                                <li data-id="structure_popping" class="majorMenu">Structure Propping</li>
                                    <ul class="d-none structure_popping submenu" style="width: 90%;margin: auto;">
                                        <li>Back Propping</li>
                                        <li>Shoring</li>
                                        <li>Scaffolding</li>
                                        <li>Working Platform</li>
                                        <li>Stair installation propping and any adjacent </li>
                                        <li>walls</li>
                                        <li>Retaining wall propping</li>
                                        <li>Capping beam</li>
                                        <li>Thrust Blocks</li>
                                        <li>Under-pinning</li>
                                        <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                                <li data-id="structure_stability" class="majorMenu">Structural Stability</li>
                                    <ul class="d-none structure_stability submenu" style="width: 90%;margin: auto;">
                                        <li>Existing Structure During Construction</li>
                                        <li>New Structure During Construction</li>
                                        <li>Structural Steelwork Erection</li>
                                        <li>Needling</li>
                                        <li>Temporary Underpinning</li>
                                        <li>Cut & Carve beam and slab Support</li>
                                        <li>Façade System</li>
                                        <li>Party Wall Propping</li>
                                        <li>Buttresses</li>
                                        <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                                <li data-id="demolition" class="majorMenu">Demolition</li>
                                    <ul class="d-none demolition submenu" style="width: 90%;margin: auto;">
                                        <li>Cutting of Existing Boundary Wall</li>
                                        <li>Support to Existing Structure</li>
                                        <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                                <li data-id="permanent" class="majorMenu">Permanent Works</li>
                                    <ul class="d-none permanent submenu" style="width: 90%;margin: auto;">
                                    <li>Partial / Permanent Support Conditions</li>
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                                    </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="common-requirment requirment-second">
                        
                        <div class="list-div">
                            
                            <!-- **************** Framework / Falsework **************  -->
                            
                            <!-- **************** Equipment and Plant **************  -->
                            
                            <!-- **************** Site Establishment **************  -->
                            
                            <!-- **************** Access / Scaffolding **************  -->
                            
                            <!-- **************** Structure **************  -->
                           
                            <!-- **************** Structural Stability **************  -->
                            
                            <!-- **************** Permanent Works **************  -->
                        </div>
                    </div>
                </div>
                <div class="submit-requirment" data-bs-dismiss="modal">
                    <button disabled="disabled" style="opacity:1 !important;">Save</button>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Design Requirement -->

<!--begin::Modal - Scope of Design -->
<div class="modal fade" id="scope-of-design" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Scope Of Design</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <div class="multi-list">
                    <div class="common-requirment requirment-first">
                        <input type="text" value="" class="requirment-first-value">
                        <div class="list-div">
                            <ul>
                                <li data-id="Preliminary-Sketches">Preliminary Sketches (prior to full TW design for
                                    discussion with site team)
                                </li>
                                <li data-id="Construction-Drawings">Construction Drawings (with notes on loadings, restrictions, critical components, etc)
                                </li>
                                <li data-id="Design-Calculations">Design Calculations (where needed for submission to client etc.)
                                </li>
                                <li data-id="Check-Certificate">Design Check Certificate (were needed for submission to
                                    client, etc.)
                                </li>
                                <li data-id="Loading-Criteria">Loading Criteria</li>
                                <li data-id="Construction-Erection">Construction / Erection Sequence Information (to include in method statement)
                                </li>
                                <li data-id="Inspection-Checklist">Inspection Checklist (for erection, loading,
                                    inspection, dismantling, etc.)
                                </li>
                                <li data-id="Monitoring-Requirements">Monitoring Requirements</li>
                                <li data-id="Specifications">Specifications</li>
                                <li data-id="Design-Inspection">Design Inspection and Test Plans (ITPs)</li>
                                <!-- <li data-id="user-input">
                                    <input type="text" placeholder="Other STATE">
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="common-requirment requirment-second">
                        <input type="text" vlaue="" class="requirment-second-value">
                        <div class="list-div">

                            <ul>
                                <li class="invisible Preliminary-Sketches">
                                    <input type="date" name="preliminary_sketches_date_sod">
                                </li>
                                <li class="invisible Construction-Drawings">
                                    <input type="date" name="construction_rawings_date_sod">
                                </li>
                                <li class="invisible Design-Calculations">
                                    <input type="date" name="design_calculations_date_sod">
                                </li>
                                <li class="invisible Check-Certificate">
                                    <input type="date" name="design_check_certificate_date_sod">
                                </li>
                                <li class="invisible Loading-Criteria">
                                    <input type="date" name="loading_criteria_date_sod">
                                </li>
                                <li class="invisible Construction-Erection">
                                    <input type="date" name="construction_erection_sequence_information_date_sod">
                                </li>
                                <li class="invisible Inspection-Checklist">
                                    <input type="date" name="inspection_checklist_date_sod">
                                </li>
                                <li class="invisible Monitoring-Requirements">
                                    <input type="date" name="monitoring_requirements_date_sod">
                                </li>
                                <li class="invisible Specifications">
                                    <input type="date" name="specifications_date_sod">
                                </li>
                                <li class="invisible Design-Inspection">
                                    <input type="date" name="design_inspection_test_plans_date_sod">
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="submit-requirment" data-bs-dismiss="modal">
                    <button disabled="disabled">Save</button>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Scope of Design -->

<!--begin::Modal - Attachment of Design -->
<div class="modal fade" id="attachment-of-design" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" style="align-items: flex-start">
                <!--begin::Modal title-->
                <h2>Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload)</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
                
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <div id="req_details_data">

                </div>
                <br>
                <div class="multi-list">
                    <div class="common-requirment requirment-first" id="attachment-first">
                        
                        <input type="text" value="" class="requirment-first-value">
                        <div class="list-div">
                            <ul>
                                <div class="list">
                                    <li data-id="List-Attachment" class="majorList">Attachments (sketches / photos / specifications / drawings, etc)
                                    </li>
                                        <ul>
                                            <li class=" List-Attachment my-0" style="display: flex; justify-content: space-between; align-items: center">
                                                <div class="multi-Radio">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="list_of_attachments_folder" id="flexRadioDefault1" value="yes" />
                                                        <input class="form-check-input" type="hidden" name="list_of_attachments" value="List of attachments/sketches/ Photos / Specifications /Drawings etc." />
                                                        <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                    </div>
                                                    <!-- NO -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="list_of_attachments_folder" id="flexRadioDefault2" value="no" />
                                                        <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                    </div>
                                                </div>
                                                <div class="list_of_attach_comment d-none">
                                                    <textarea type="text" style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" name="list_of_attachments_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                                </div>
                                            </li>
                                        </ul>
                                    
                                </div>
                                <div class="list">
                                    <li data-id="Report-Site" class="majorList">Reports Including Site Investigations (relevant boreholes / trial pits / site investigation / any existing or proposed services above or below the ground where appropriate minimum clearances and protection are required to be maintained)
                                    </li>
                                        <ul>
                                            <li class="invisible Report-Site d-flex my-0" style="justify-content: space-between; align-items: center">
                                                <div class="multi-Radio">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="reports_including_site_investigations_folder" id="flexRadioDefault1" value="yes" />
                                                        <input class="form-check-input" type="hidden" name="reports_including_site_investigations" value="Reports Including Site Investigations (relevant boreholes / trial pits / site investigation / any existing or proposed services above or below the ground where appropriate minimum clearances and protection are required to be maintained)" />
                                                        <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                    </div>
                                                    <!-- NO -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="reports_including_site_investigations_folder" id="flexRadioDefault2" value="no" />
                                                        <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                    </div>
                                                </div>
                                                <div class="reports_including_site_investigations_comment d-none">
                                                    <textarea  style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" type="text" name="reports_including_site_investigations_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                                </div>
                                            </li>
                                        </ul>
                                </div>
                                <div class="list">
                                    <li data-id="Exsisting-Ground" class="majorList">Existing Ground conditions</li>
                                        <ul>
                                            <li class="invisible Exsisting-Ground d-flex my-0" style="justify-content: space-between; align-items: center">
                                                <div class="multi-Radio">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="existing_ground_conditions_folder" id="flexRadioDefault1" value="yes" />
                                                        <input class="form-check-input" type="hidden" name="existing_ground_conditions" value="Existing Ground conditions:" />
                                                        <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                    </div>
                                                    <!-- NO -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="existing_ground_conditions_folder" id="flexRadioDefault2" value="no" />
                                                        <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                    </div>
                                                </div>
                                                <div class="existing_ground_conditions_comment d-none">
                                                    <textarea style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" type="text" name="existing_ground_conditions_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- <li class="existing_ground_conditions_comment d-none" style="background: white;height:73px"></li> -->
                                    
                                </div>

                                <!-- Prefered/Non prefered container  -->
                                <div class="list">
                                    <li data-id="System-Type" class="majorList">Preferred/non-preferred methods, systems or types of
                                        equipment:
                                    </li>
                                        <li class="invisible System-Type d-flex my-0" style="justify-content: space-between; align-items: center">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="preferred_non_preferred_methods_folder" id="flexRadioDefault1" value="yes" />
                                                    <input class="form-check-input" type="hidden" name="preferred_non_preferred_methods" value="Preferred/non-preferred methods, systems or types of equipment:" />
                                                    <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="preferred_non_preferred_methods_folder" id="flexRadioDefault2" value="no" />
                                                    <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- <li class="preferred_non_preferred_methods_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                    <li class="preferred_non_preferred_methods_comment d-none">
                                        <textarea style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" type="text" name="preferred_non_preferred_methods_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                    </li>
                                </div>
                                <!-- Prefered/Non prefered container end -->


                                <!-- Access Limitations start -->
                                    
                                <div class="list">
                                    <li data-id="Limitations" class="majorList">Access Limitations (or edge protection requirements)</li>
                                        <li class="invisible Limitations d-flex my-0" style="justify-content: space-between; align-items: center">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="access_limitations_folder" id="flexRadioDefault1" value="yes" />
                                                    <input class="form-check-input" type="hidden" name="access_limitations" value="Access Limitations (or edge protection requirements)" />
                                                    <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="access_limitations_folder" id="flexRadioDefault2" value="no" />
                                                    <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                </div>
                                            </div>
                                            <div class="access_limitations_comment d-none">
                                                <textarea style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" type="text" name="access_limitations_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                            </div>
                                        </li>
                                        <!-- <li class="access_limitations_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                    
                                </div>
                                <!-- Access Limitations end -->
                                


                                <!-- Back propping start -->
                                
                                <div class="list">
                                    <li data-id="Back-Propping" class="majorList">Back Propping  / Re-Propping Sequence</li>
                                        <li class="invisible Back-Propping d-flex" style="justify-content: space-between; align-items: center">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="back_propping_folder" id="flexRadioDefault1" value="yes" />
                                                    <input class="form-check-input" type="hidden" name="back_propping" value="Back Propping  / Re-Propping Sequence" />
                                                    <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="back_propping_folder" id="flexRadioDefault2" value="no" />
                                                    <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                </div>
                                            </div>
                                            <div class="back_propping_comment d-none">
                                                <textarea style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" type="text" name="back_propping_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                            </div>
                                        </li>
                                        <!-- <li class="back_propping_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                </div>

                                <!-- Back propping ends -->

                                <!-- Limitation on Temporary work start  -->

                                <div class="list">
                                    <li data-id="Temporary-Work" class="majorList">Limitations on Temporary Works Design:</li>
                                        <li class="invisible Temporary-Work d-flex" style="justify-content: space-between; align-items: center">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="limitations_on_temporary_works_design_folder" id="flexRadioDefault1" value="yes" />
                                                    <input class="form-check-input" type="hidden" name="limitations_on_temporary_works_design" value="Limitations on Temporary Works Design:" />
                                                    <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="limitations_on_temporary_works_design_folder" id="flexRadioDefault2" value="no" />
                                                    <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                </div>
                                            </div>
                                            <div class="limitations_on_temporary_works_design_comment d-none">
                                                <textarea style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" type="text" name="limitations_on_temporary_works_design_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                            </div>
                                        </li>
                                        <!-- <li class="limitations_on_temporary_works_design_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                </div>

                                <!-- Limitation on Temporary work end  -->


                                <!-- Hazard identification start  -->

                                <div class="list">
                                    <li data-id="Hazard-Risk" class="majorList">Details of any hazards identified during the risk or hazard
                                        assessment that require action by the Temporary Works Designer to eliminate or
                                        control all risks or hazard
                                    </li>
                                        <li class="invisible Hazard-Risk d-flex" style="justify-content: space-between; align-items: center">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="details_of_any_hazards_folder" id="flexRadioDefault1" value="yes" />
                                                    <input class="form-check-input" type="hidden" name="details_of_any_hazards" value="Details of any hazards identified during the risk or hazard assessment that require action by the Temporary Works Designer to eliminate or control all risks or hazard" />
                                                    <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="details_of_any_hazards_folder" id="flexRadioDefault2" value="no" />
                                                    <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                </div>
                                            </div>
                                            <div class="details_of_any_hazards_comment d-none">
                                                <textarea style="color: black;width: 100%;background: white;border: 1px solid lightgrey;border-radius: 5px;height: auto;" type="text" name="details_of_any_hazards_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                            </div>
                                        </li>
                                        <!-- <li class="details_of_any_hazards_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                    
                                </div>

                                <!-- Hazard identification end  -->


                                <!-- 3rd part Requirements start  -->

                                <div class="list">
                                    <li data-id="Party-Requirements" class="majorList">3rd Party Requirements:</li>
                                        <li class="invisible Party-Requirements d-flex" style="justify-content: space-between; align-items: center">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="3rd_party_requirements_folder" id="flexRadioDefault1" value="yes" />
                                                    <input class="form-check-input" type="hidden" name="3rd_party_requirements" value="3rd Party Requirements:" />
                                                    <label class="form-check-label" for="flexRadioDefault1"> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="3rd_party_requirements_folder" id="flexRadioDefault2" value="no" />
                                                    <label class="form-check-label" for="flexRadioDefault2"> NO </label>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- <li class="3rd_party_requirements_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                    <li class="3rd_party_requirements_comment d-none">
                                        <textarea style="background: black;color:white;ay:none" type="text" name="3rd_party_requirements_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                    </li>
                                </div>

                                <!-- 3rd part Requirements end  -->
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="uploadDiv" style="padding-left: 10px;">
                    <div class="input-images"></div>
                    <!-- <input type="file" multiple name="file[]">
                    <input type="button" class="btn btn-sm btn-primary addfile" style="width: 10%;" value="Add"> -->
                </div>
                <div class="submit-requirment" style="width:100%;padding-left:10px;">
                    <button data-bs-dismiss="modal" style="width: 10%;opacity:1 !important;">Save</button>

                </div>

            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Attachment of Design -->