<!------ Design Requiremnts Modal ---->
<style>
    .form-control.form-control-solid{
        background: black;
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
                <div class="multi-list">
                    <div class="common-requirment requirment-first">
                        <input type="text" value="" class="requirment-first-value">
                        <div class="list-div">
                            <ul>
                                <li data-id="Excavation">Excavation / Earthworks</li>
                                <li data-id="Formwork">Formwork / Falsework</li>
                                <li data-id="Equipment">Equipment and Plant</li>
                                <li data-id="Establishment">Site Establishment</li>
                                <li data-id="Scaffolding">Access / Scaffolding</li>
                                <li data-id="Structure">Structure</li>
                                <li data-id="Stability">Structural Stability</li>
                                <li data-id="Permanent">Permanent Works</li>
                            </ul>
                        </div>
                    </div>
                    <div class="common-requirment requirment-second">
                        <input type="text" vlaue="" class="requirment-second-value">
                        <div class="list-div">
                            <ul class="d-none Excavation">

                                <li data-id="Trench">Trench Sheeting</li>
                                <li data-id="Manhole">Manhole / Trench Boxes</li>
                                <li data-id="Cofferdams">Cofferdams</li>
                                <li data-id="Excavation">Excavation Shoring System</li>
                                <li data-id="Capping">Capping Beam Support</li>
                                <li data-id="Temporary">Temporary Slopes</li>
                                <li data-id="Headings">Headings / Tunnel Support</li>
                                <li data-id="Underpinning">Underpinning</li>
                                <li data-id="Stockpiles">Stockpiles</li>
                                <li data-id="PCC">PCC L-Shaped Wall</li>
                                <li data-id="Embankment">Embankment Bunds</li>
                                <li data-id="Dewatering">Dewatering</li>
                                <li data-id="State">Other Please State</li>
                                <li>
                                    <input class="form-control form-control-solid otherInput" type="text" vlaue="" placeholder="If other: please state">
                                </li>
                            </ul>
                            <!-- **************** Framework / Falsework **************  -->
                            <ul class="d-none Formwork">
                                <li>Foundation / Formwork</li>
                                <li>Walls / Formwork</li>
                                <li>Columns / Formwork</li>
                                <li>Slab / Soffit - Falsework</li>
                                <li>Beams / Falsework</li>
                                <li>Back Propping</li>
                                <li>Edge Protection</li>
                                <li>Support Systems</li>
                                <li>Twin Wall Design & Support</li>
                                <li>Push Pulls for Precast Walls and Columns</li>
                                <li>Precast Stairs</li>
                                <li>Crash Decks</li>
                                <li>Metal Decking & Back Propping</li>
                                <li>Screen Protection</li>
                                <li><input class="otherInput" type="text" vlaue="" placeholder="Other (please specify)"></li>
                            </ul>
                            <!-- **************** Equipment and Plant **************  -->
                            <ul class="d-none Equipment">
                                <li>Piling Mat & Working Platform</li>
                                <li>Crane Platform</li>
                                <li>Crane Support & Foundations</li>
                                <li>Tower Crane Base</li>
                                <li>Access Platform for Machines and Temporary Ramps </li>
                                <li>Concrete Pump Working Platform</li>
                                <li>Hoist Ties & Foundations</li>
                                <li>Mast Climbers & Foundations</li>
                                <li>Chute Support</li>
                                <li>Loading Bay</li>
                                <li>Canti Deck</li>
                                <li>Soil Bases</li>
                                <li>Lifting / Handling Devices</li>
                                <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                            </ul>
                            <!-- **************** Site Establishment **************  -->
                            <ul class="d-none Establishment">
                                <li>Temporary Offices / Cabins</li>
                                <li>Hoarding / Tower Crane Hoarding</li>
                                <li>Access / Scaffolding</li>
                                <li>Access Gantries / Platform</li>
                                <li>Access Bridges</li>
                                <li>Barriers</li>
                                <li>Sign Boards</li>
                                <li>Fuel Storage</li>
                                <li>Welfare Facilities</li>
                                <li>Precast Facilities</li>
                                <li>Wheel Wash Base</li>
                                <li>Permanent Works</li>
                                <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                            </ul>
                            <!-- **************** Access / Scaffolding **************  -->
                            <ul class="d-none Scaffolding">
                                <li>Tube & Fitting</li>
                                <li>System Scaffolding </li>
                                <li>System Staircase</li>
                                <li>Temporary Roof</li>
                                <li>Loading Bay</li>
                                <li>Cute Support</li>
                                <li>Mobile Tower</li>
                                <li>Pedestrain Walkway Cover</li>
                                <li>Suspension System</li>
                                <li>Pontoon</li>
                                <li>Protection Shield (steel Shield to Cover Railway While Working with a Crane Above)</li>
                                <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                            </ul>
                            <!-- **************** Structure **************  -->
                            <ul class="d-none Structure">
                                <li>Propping</li>
                                <li>Back Propping</li>
                                <li>Shoring</li>
                                <li>Scaffolding</li>
                                <li>Working Platform</li>
                                <li>Formwork</li>
                                <li>Falsework</li>
                                <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                            </ul>
                            <!-- **************** Structural Stability **************  -->
                            <ul class="d-none Stability">
                                <li>Existing Structures During Construction</li>
                                <li>New Structures During Construction</li>
                                <li>Structural Steelwork Erection</li>
                                <li>Needling</li>
                                <li>Temporary Underpinning</li>
                                <li>Cut and Carve Beam and Slab Support</li>
                                <li>Facade System</li>
                                <li>Party Wall Propping</li>
                                <li>Butresses</li>
                                <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                            </ul>
                            <!-- **************** Permanent Works **************  -->
                            <ul class="d-none Permanent">
                                <li>Partial / Permanent Support Conditions</li>
                                <li>Demolition</li>
                                <li><input class="otherInput" type="text" vlaue="" placeholder="If other: please state"></li>
                            </ul>
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
                                <li data-id="Design-Calculations">Design Check Certificate (where needed for submission to client, etc)
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
            <div class="modal-header">
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
                <div class="multi-list">
                    <div class="common-requirment requirment-first">
                        <input type="text" value="" class="requirment-first-value">
                        <div class="list-div">
                            <ul>
                                <li data-id="List-Attachment">Attachments (sketches / photos / specifications / drawings, etc)
                                </li>
                                <li class="list_of_attach_comment d-none">
                                    <textarea type="text" style="background: black;color:white;" name="list_of_attachments_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="Report-Site">Reports Including Site Investigations (relevant boreholes / trial pits / site investigation / any existing or proposed services above or below the ground where appropriate minimum clearances and protection are required to be maintained)
                                </li>
                                <li class="reports_including_site_investigations_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="reports_including_site_investigations_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="Exsisting-Ground">Existing Ground conditions</li>
                                <li class="existing_ground_conditions_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="existing_ground_conditions_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="System-Type">Preferred/non-preferred methods, systems or types of
                                    equipment:
                                </li>
                                <li class="preferred_non_preferred_methods_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="preferred_non_preferred_methods_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="Limitations">Access Limitations (or edge protection requirements)</li>
                                <li class="access_limitations_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="access_limitations_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="Back-Propping">Back Propping  / Re-Propping Sequence</li>
                                <li class="back_propping_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="back_propping_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="Temporary-Work">Limitations on Temporary Works Design:</li>
                                <li class="limitations_on_temporary_works_design_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="limitations_on_temporary_works_design_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="Hazard-Risk">Details of any hazards identified during the risk or hazard
                                    assessment that require action by the Temporary Works Designer to eliminate or
                                    control all risks or hazard
                                </li>
                                <li class="details_of_any_hazards_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="details_of_any_hazards_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                                <li data-id="Party-Requirements">3rd Party Requirements:</li>
                                <li class="3rd_party_requirements_comment d-none">
                                    <textarea style="background: black;color:white;ay:none" type="text" name="3rd_party_requirements_comment" cols="80" rows="2" placeholder="Enter Comment"></textarea>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="common-requirment requirment-second">
                        <div class="list-check-div">
                            <ul>
                                <li class="invisible List-Attachment">
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
                                </li>
                                <li class="list_of_attach_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible Report-Site">
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
                                </li>
                                <li class="reports_including_site_investigations_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible Exsisting-Ground">
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
                                </li>
                                <li class="existing_ground_conditions_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible System-Type">
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
                                <li class="preferred_non_preferred_methods_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible Limitations">
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
                                </li>
                                <li class="access_limitations_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible Back-Propping">
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
                                </li>
                                <li class="back_propping_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible Temporary-Work">
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
                                </li>
                                <li class="limitations_on_temporary_works_design_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible Hazard-Risk">
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
                                </li>
                                <li class="details_of_any_hazards_comment d-none" style="background: white;height:73px">
                                </li>
                                <li class="invisible Party-Requirements">
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
                                <li class="3rd_party_requirements_comment d-none" style="background: white;height:73px">
                                </li>
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