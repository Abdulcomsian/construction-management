<!------ Design Requiremnts Modal ---->
<style>
    .form-control.form-control-solid {
        background: black;
    }

    .designRequirmentList {
        display: block;
    }

    .designRequirmentList .requirment-first {
        width: 100% !important;
        margin-left: 0;
    }

    .designRequirmentList .list-div ul li:after {
        transform: rotate(90deg);
    }

    .designRequirmentList .list-div ul li {
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
    .equipment li::after {
        content: none !important;
    }

    .fa-check {
        background-color: #07D564;
        color: white;
        padding: 3px;
        border-radius: 100%;
    }

    .hidden {
        display: none;
    }

    .show {
        display: block;
    }

    .list-div .submenu li::after {
        content: '';
    }

    #attachment-of-design {
        font-family: 'Inter', sans-serif;
    }

    #attachment-of-design .modal-header h2 {
        font-size: 26px;
        font-weight: 700;
        width: 80%;
    }

    .majorList {
        border: 1px solid lightgrey;
        height: auto !important;
        font-size: 16px;
        font-weight: 400;
        color:
    }

    #attachment-of-design tbody td {
        border-top: 0 !important;
    }

    #attachment-of-design tbody tr:nth-child(even) {
        background: white !important;
        border: none;
    }

    .form-check-input[type=radio] {
        width: 15px !important;
        height: 15px !important;
    }

    #attachment-first li {
        height: auto;
    }

    .borderActive {
        border: 1px solid #07D564;
        border-radius: 5px
    }

    .active {
        margin: 0 !important;
    }

    .active::after {
        transform: rotate(90deg);
    }

    #desingform .form-check-input[type=radio] {
        border: 2px solid lightgray !important;
        position: relative;
        left: 11px;
    }

    .multi-Radio {
        min-width: 120px;
    }

    .List-Attachment::after,
    .Report-Site::after,
    .Exsisting-Ground::after,
    .System-Type::after,
    .Limitations::after,
    .Back-Propping::after,
    .Temporary-Work::after,
    .Party-Requirements::after {
        content: none !important;
    }

    .invisible {
        /* visibility: hidden; */
        display:none;
    }


    .form-check-input:checked[type=radio] {
    background-color: green !important;
}
.list-div ul li, .list-check-div ul li {
    height: 72px;
    overflow: visible;
    border-radius: 5px;
}

</style>
<!------ Design Requiremnts Modal ---->

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
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                    x="0" y="7" width="16" height="2" rx="1" />
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
                <div class="multi-list designRequirmentList">
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
                                        <input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state">
                                    </li>
                                </ul>
                                <li data-id="equipment " class="majorMenu">Equipment and Plant</li>
                                <ul class="d-none equipment submenu" style="width: 90%;margin: auto;">
                                    <li>Pile Mat & Working Platform </li>
                                    <li>Crane Platform</li>
                                    <li>Crane Support & Foundations</li>
                                    <li>Crane Bases - Out rigger concrete padsmissing </li>
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
                                    <li>Hoist Run offs </li>
                                    <li>Lifting of prefabricated rebar column/ wall panels</li>
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
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
                                    <li>Protection Shield (steel shield to cover Railway while working with a crane
                                        above)</li>
                                    <li>Guard Rail Fixings</li>
                                    <li>Bird Cages</li>
                                    <li>Scaffold crash deck</li>
                                    <li>Scaffold road/ Pavement Gantry</li>
                                    <li>Façade access scaffold</li>
                                    <li>Lift shaft scaffold</li>
                                    <li>Temporary roof scaffold</li>
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
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
                                    <li>Earth works retention for basement, deep services or attenuation tank
                                        construction</li>
                                    <li>Slope Stability</li>
                                    <li>Piled/ sheet piled wall propping</li>
                                    <li>Kingpost retaining walls</li>
                                    <li>Sheet piled retaining walls</li>
                                    <li>Road plates over trenches</li>
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
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
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
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
                                    <li>Capping beam (fully detailed with rebar)</li>
                                    <li>Thrust Blocks</li>
                                    <li>Under-pinning</li>
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
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
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
                                </ul>
                                <li data-id="demolition" class="majorMenu">Demolition</li>
                                <ul class="d-none demolition submenu" style="width: 90%;margin: auto;">
                                    <li>Cutting of Existing Boundary Wall</li>
                                    <li>Support to Existing Structure</li>
                                    <li>Wall/ Adjacent structures monitoring brief</li>
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
                                </ul>
                                <li data-id="permanent" class="majorMenu">Permanent Works</li>
                                <ul class="d-none permanent submenu" style="width: 90%;margin: auto;">
                                    <li>Partial / Permanent Support Conditions</li>
                                    <li><input class="form-control form-control-solid otherInput" type="text" vlaue=""
                                            placeholder="If other: please state"></li>
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
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                    x="0" y="7" width="16" height="2" rx="1" />
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
                            <ul >
                                <li  data-id="Preliminary-Sketches">Preliminary Sketches (prior to full TW design for
                                    discussion with site team)
                                </li>
                                
                                <li data-id="Construction-Drawings">Construction Drawings (with notes on loadings,
                                    restrictions, critical components, etc)
                                </li>
                                <li data-id="Design-Calculations">Design Calculations (where needed for submission to
                                    client etc.)
                                </li>
                                <li data-id="Check-Certificate">Design Check Certificate (were needed for submission to
                                    client, etc.)
                                </li>
                                <li data-id="Loading-Criteria">Loading Criteria</li>
                                <li data-id="Construction-Erection">Construction / Erection Sequence Information (to
                                    include in method statement)
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
                    <div class="common-requirment requirment-second" style="display:block;">
                        <input type="text" value="" class="requirment-second-value">
                        <div class="list-div">

                            <ul>
                            <li class="{{$temporaryWork->scopdesign->preliminary_sketches_date ? '':'invisible'}} Preliminary-Sketches">
                                    <input type="date" name="preliminary_sketches_date_sod" value="{{$temporaryWork->scopdesign->preliminary_sketches_date ?? ''}}">
                                </li>
                                <li class="{{$temporaryWork->scopdesign->construction_rawings_date ? '':'invisible'}} Construction-Drawings">
                                    <input type="date" name="construction_rawings_date_sod" value="{{$temporaryWork->scopdesign->construction_rawings_date ?? ''}}">
                                </li>
                                                  
                                <li class="{{$temporaryWork->scopdesign->design_calculations_date ? '':'invisible'}} Design-Calculations">
                                <input type="date" name="design_calculations_date_sod" value="{{$temporaryWork->scopdesign->design_calculations_date ?? ''}}">
                                </li>
                                <li class="{{$temporaryWork->scopdesign->design_check_certificate_date ? '':'invisible'}} Check-Certificate">
                                    <input type="date" name="design_check_certificate_date_sod" value="{{$temporaryWork->scopdesign->design_check_certificate_date ?? ''}}">
                                </li>
                                <li class="{{$temporaryWork->scopdesign->loading_criteria_date ? '':'invisible'}} Loading-Criteria">
                                    <input type="date" name="loading_criteria_date_sod" value="{{$temporaryWork->scopdesign->loading_criteria_date ?? '' }}">
                                </li>
                                <li class="{{$temporaryWork->scopdesign->construction_erection_sequence_information_date ? '':'invisible'}} Construction-Erection">
                                    <input type="date" name="construction_erection_sequence_information_date_sod" value="{{$temporaryWork->scopdesign->construction_erection_sequence_information_date ?? '' }}">
                                </li>
                                <li class="{{$temporaryWork->scopdesign->inspection_checklist_date ? '':'invisible'}} Inspection-Checklist">
                                    <input type="date" name="inspection_checklist_date_sod" value="{{$temporaryWork->scopdesign->inspection_checklist_date ?? '' }}">
                                </li>
                                <li class="{{$temporaryWork->scopdesign->monitoring_requirements_date ? '':'invisible'}} Monitoring-Requirements">
                                    <input type="date" name="monitoring_requirements_date_sod" value="{{$temporaryWork->scopdesign->monitoring_requirements_date ?? '' }}">
                                </li>


                                <li class="{{$temporaryWork->scopdesign->specifications_date ? '':'invisible'}} Specifications">
                                    <input type="date" name="specifications_date_sod" value="{{$temporaryWork->scopdesign->specifications_date ?? '' }}">
                                </li>
                                <li class="{{$temporaryWork->scopdesign->design_inspection_test_plans_date ? '':'invisible'}} Design-Inspection">
                                    <input type="date" name="design_inspection_test_plans_date_sod" value="{{$temporaryWork->scopdesign->design_inspection_test_plans_date ?? '' }}">
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
                <h2>Attachments / Spec / Existing Designs and Existing Site Conditions (folders to upload) hello</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                    x="0" y="7" width="16" height="2" rx="1" />
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
                    @isset($design_check)   
                        @php
                         $designCheck = json_decode($design_check) ?? '';
                        @endphp
                    @endisset
                    @isset($designCheck)
                    <p style="font-weight: 400; font-size: 16px">Reminder of checklist suggested which you should provide for the designer to speed the process and results in accurate designs.</p>
                    @endif
                    <table class="table">
                        <tbody>
                            @isset($designCheck)
                            @foreach ($designCheck as $index => $item)
                                @php
                                    $name = $item->name;
                                    $check = $item->check;
                                    $note = $item->note ?? "";
                                    
                                @endphp
                                <tr>
                                    <td>
                                        <input style="position: relative; top: 5px" type="checkbox" name="req_check[{{ $name }}]" value="2" {{$check == 'Y' ? 'checked' : ''}} />
                                    </td>
                                    <td style="text-align: start; font-weight: 400; font-size: 16px; width: 40%">
                                        <input type="hidden" name="req_name[]" value="{{ $name }}"/> 
                                        {{ $name }}
                                    </td>
                                    <td style="width: 55%">
                                        <input type="text" name="req_notes[]" class="form-control" style="border: 1px solid lightgray !important; border-radius: 5px" value="{{ $note == '0' ? '':$note }}"/>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
                <br>
                <div class="multi-list">
                    <div class="common-requirment requirment-first" id="attachment-first">

                        <input type="text" value="" class="requirment-first-value">
                        <div class="list-div">
                            <ul>
                                <div class="list {{$temporaryWork->folder->list_of_attachments ? 'borderActive' : ''}}">
                                    <li data-id="List-Attachment" class="majorList {{$temporaryWork->folder->list_of_attachments ? 'active' : ''}}">Attachments (sketches / photos /
                                        specifications / drawings, etc)
                                    </li>

                                    <ul class="listAttachment--desc {{$temporaryWork->folder->list_of_attachments ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->list_of_attachments ? '' : 'invisible'}} List-Attachment d-flex  my-0"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="list_of_attachments_folder" id="" value="yes" {{$temporaryWork->folder->list_of_attachments=='yes' ? 'checked':''}} />
                                                    <input class="form-check-input" type="hidden"
                                                        name="list_of_attachments"
                                                        value="List of attachments/sketches/ Photos / Specifications /Drawings etc." />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="list_of_attachments_folder" id="" value="no"  {{$temporaryWork->folder->list_of_attachments=='no' ? 'checked':''}} />
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <!-- <div class="list_of_attach_comment {{$temporaryWork->attachspeccomment->list_of_attachments_comment ? '':'d-none'}}"> -->
                                            <div class="list_of_attach_comment
                                            {{ $temporaryWork->folder->list_of_attachments == 'yes' ? '' : 'd-none' }}">
                                                    <textarea type="text" 
                                                    style="background: white;color:black;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px" 
                                                    name="list_of_attachments_comment" cols="80" rows="2" 
                                                    placeholder="Enter Comment">{{$temporaryWork->attachspeccomment->list_of_attachments_comment ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                                <div class="list {{$temporaryWork->folder->reports_including_site_investigations ? 'borderActive':''}} ">
                                    <li data-id="Report-Site" class="majorList {{$temporaryWork->folder->reports_including_site_investigations ? 'active ':''}}">Reports Including Site Investigations
                                        (relevant boreholes / trial pits / site investigation / any existing or proposed
                                        services above or below the ground where appropriate minimum clearances and
                                        protection are required to be maintained)
                                    </li>
                                    <ul class="report-site--desc {{$temporaryWork->folder->reports_including_site_investigations ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->reports_including_site_investigations ? '':'invisible'}} Report-Site d-flex my-0"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="reports_including_site_investigations_folder" id="" value="yes" {{$temporaryWork->folder->reports_including_site_investigations=='yes' ? 'checked':''}}/>
                                                    <input class="form-check-input" type="hidden"
                                                        name="reports_including_site_investigations"
                                                        value="Reports Including Site Investigations (relevant boreholes / trial pits / site investigation / any existing or proposed services above or below the ground where appropriate minimum clearances and protection are required to be maintained)" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                   
                                                    name="reports_including_site_investigations_folder" id="" value="no"      {{$temporaryWork->folder->reports_including_site_investigations=='no' ? 'checked':''}}/>
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <!-- <div class="reports_including_site_investigations_comment {{$temporaryWork->attachspeccomment->reports_including_site_investigations_comment ? '':'d-none'}}"> -->
                                            <div class="reports_including_site_investigations_comment
                                            {{ $temporaryWork->folder->reports_including_site_investigations == 'yes' ? '' : 'd-none' }}">
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="reports_including_site_investigations_comment"
                                                    cols="80" rows="2" placeholder="Enter 
                                                    Comment">{{$temporaryWork->attachspeccomment->reports_including_site_investigations_comment ?? ''}} </textarea>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                              
                                <div class="list {{$temporaryWork->folder->existing_ground_conditions ? 'borderActive':''}}">
                                    <li data-id="Exsisting-Ground" class="majorList {{$temporaryWork->folder->existing_ground_conditions ? 'active':''}}">Existing Ground conditions</li>
                                    <ul class="existing-ground--desc {{$temporaryWork->folder->existing_ground_conditions ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->existing_ground_conditions ? '':'invisible'}} Exsisting-Ground d-flex my-0"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="existing_ground_conditions_folder" id="" value="yes" {{$temporaryWork->folder->existing_ground_conditions=='yes' ? 'checked':''}} />
                                                    <input class="form-check-input" type="hidden"
                                                        name="existing_ground_conditions"
                                                        value="Existing Ground conditions:" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="existing_ground_conditions_folder" id="" value="no" {{$temporaryWork->folder->existing_ground_conditions=='no' ? 'checked':''}} />
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <!-- <div class="existing_ground_conditions_comment {{$temporaryWork->attachspeccomment->existing_ground_conditions_comment ? '':'d-none'}}"> -->
                                            <div class="existing_ground_conditions_comment 
                                            {{ $temporaryWork->folder->existing_ground_conditions == 'yes' ? '' : 'd-none' }}">
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="existing_ground_conditions_comment" cols="80"
                                                    rows="2" placeholder="Enter Comment">{{$temporaryWork->attachspeccomment->existing_ground_conditions_comment ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <li class="existing_ground_conditions_comment d-none" style="background: white;height:73px"></li> -->

                                </div>

                                <!-- Prefered/Non prefered container  -->
                                <div class="list {{$temporaryWork->folder->preferred_non_preferred_methods ? 'borderActive':''}}">
                                    <li data-id="System-Type" class="majorList {{$temporaryWork->folder->preferred_non_preferred_methods ? 'active':''}}">Preferred/non-preferred methods, systems
                                        or types of
                                        equipment:
                                    </li>
                                    <ul class="perferred-NonPrefered--desc {{$temporaryWork->folder->preferred_non_preferred_methods ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->preferred_non_preferred_methods ? '':'invisible'}} System-Type d-flex my-0"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="preferred_non_preferred_methods_folder" id=""
                                                        value="yes" {{$temporaryWork->folder->preferred_non_preferred_methods=='yes' ? 'checked':''}}/>
                                                    <input class="form-check-input" type="hidden"
                                                        name="preferred_non_preferred_methods"
                                                        value="Preferred/non-preferred methods, systems or types of equipment:" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="preferred_non_preferred_methods_folder" id=""
                                                        value="no" {{$temporaryWork->folder->preferred_non_preferred_methods=='no' ? 'checked':''}} />
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <div class="preferred_non_preferred_methods_comment {{$temporaryWork->folder->preferred_non_preferred_methods=='yes' ? '':'d-none'}}">
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="preferred_non_preferred_methods_comment" cols="80"
                                                    rows="2" placeholder="Enter Comment">{{$temporaryWork->attachspeccomment->preferred_non_preferred_methods_comment ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <li class="preferred_non_preferred_methods_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                    <li class="preferred_non_preferred_methods_comment d-none">

                                    </li>
                                </div>
                                <!-- Prefered/Non prefered container end -->


                                <!-- Access Limitations start -->

                                <div class="list {{$temporaryWork->folder->access_limitations ? 'borderActive':''}}">
                                    <li data-id="Limitations" class="majorList {{$temporaryWork->folder->access_limitations ? 'active':''}}">Access Limitations (or edge protection
                                        requirements)</li>
                                    <ul class="access-limitation--desc {{$temporaryWork->folder->access_limitations ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->access_limitations ? '':'invisible'}} Limitations d-flex my-0"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="access_limitations_folder" id="" value="yes" {{$temporaryWork->folder->access_limitations=='yes' ? 'checked':''}} />
                                                    <input class="form-check-input" type="hidden"
                                                        name="access_limitations"
                                                        value="Access Limitations (or edge protection requirements)" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="access_limitations_folder" id="" value="no" {{$temporaryWork->folder->access_limitations=='no' ? 'checked':''}}/>
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <div class="access_limitations_comment {{$temporaryWork->folder->access_limitations=='yes' ? '':'d-none'}}">
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="access_limitations_comment" cols="80" rows="2"
                                                    placeholder="Enter Comment"> {{$temporaryWork->attachspeccomment->access_limitations_comment ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <li class="access_limitations_comment d-none" style="background: white;height:73px">
                                        </li> -->

                                </div>
                                <!-- Access Limitations end -->



                                <!-- Back propping start -->

                                <div class="list {{$temporaryWork->folder->back_propping ? 'borderActive':''}}" >
                                    <li data-id="Back-Propping" class="majorList {{$temporaryWork->folder->back_propping ? 'active':''}}">Back Propping / Re-Propping Sequence
                                    </li>
                                    <ul class="back-propping--desc {{$temporaryWork->folder->back_propping ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->back_propping ? '':'invisible'}} Back-Propping d-flex"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="back_propping_folder" id="" value="yes" {{$temporaryWork->folder->back_propping=='yes' ? 'checked':''}}/>
                                                    <input class="form-check-input" type="hidden" name="back_propping"
                                                        value="Back Propping  / Re-Propping Sequence" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="back_propping_folder" id="" value="no" {{$temporaryWork->folder->back_propping=='no' ? 'checked':''}}/>
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <div class="back_propping_comment {{$temporaryWork->folder->back_propping=='yes' ? '':'d-none'}}">
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="back_propping_comment" cols="80" rows="2"
                                                    placeholder="Enter Comment">{{$temporaryWork->attachspeccomment->back_propping_comment ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <li class="back_propping_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                </div>

                                <!-- Back propping ends -->

                                <!-- Limitation on Temporary work start  -->

                                <div class="list {{$temporaryWork->folder->limitations_on_temporary_works_design ? 'borderActive':''}}">
                                    <li data-id="Temporary-Work" class="majorList  {{$temporaryWork->folder->limitations_on_temporary_works_design ? 'active':''}}">Limitations on Temporary Works
                                        Design:</li>
                                    <ul class="temporary-work--desc {{$temporaryWork->folder->limitations_on_temporary_works_design ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->limitations_on_temporary_works_design ? '':'invisible'}} Temporary-Work d-flex"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="limitations_on_temporary_works_design_folder" id=""
                                                        value="yes" {{$temporaryWork->folder->limitations_on_temporary_works_design=='yes' ? 'checked':''}}/>
                                                    <input class="form-check-input" type="hidden"
                                                        name="limitations_on_temporary_works_design"
                                                        value="Limitations on Temporary Works Design:" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="limitations_on_temporary_works_design_folder" id=""
                                                        value="no" {{$temporaryWork->folder->limitations_on_temporary_works_design=='no' ? 'checked':''}}/>
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <!-- <div class="limitations_on_temporary_works_design_comment {{$temporaryWork->attachspeccomment->limitations_on_temporary_works_design_comment ?'':'d-none'}}"> -->
                                            <div class="limitations_on_temporary_works_design_comment {{$temporaryWork->folder->limitations_on_temporary_works_design=='yes' ? '':'d-none'}}">
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="limitations_on_temporary_works_design_comment"
                                                    cols="80" rows="2" placeholder="Enter Comment">{{$temporaryWork->attachspeccomment->limitations_on_temporary_works_design_comment ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <li class="limitations_on_temporary_works_design_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                </div>

                                <!-- Limitation on Temporary work end  -->


                                <!-- Hazard identification start  -->

                                <div class="list {{$temporaryWork->folder->details_of_any_hazards ? 'borderActive':''}}">
                                    <li data-id="Hazard-Risk" class="majorList {{$temporaryWork->folder->details_of_any_hazards ? 'active':''}}">Details of any hazards identified during
                                        the risk or hazard
                                        assessment that require action by the Temporary Works Designer to eliminate or
                                        control all risks or hazard
                                    </li>
                                    <ul class="hazard-risk--desc {{$temporaryWork->folder->details_of_any_hazards ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->details_of_any_hazards ? '':'invisible'}} Hazard-Risk d-flex"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="details_of_any_hazards_folder" id="" value="yes" {{$temporaryWork->folder->details_of_any_hazards=='yes' ? 'checked':''}}/>
                                                    <input class="form-check-input" type="hidden"
                                                        name="details_of_any_hazards"
                                                        value="Details of any hazards identified during the risk or hazard assessment that require action by the Temporary Works Designer to eliminate or control all risks or hazard" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="details_of_any_hazards_folder" id="" value="no" {{$temporaryWork->folder->details_of_any_hazards=='no' ? 'checked':''}}/>
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            <!-- <div class="details_of_any_hazards_comment {{$temporaryWork->attachspeccomment->details_of_any_hazards_comment ?'':'d-none'}}"> -->
                                            <div class="details_of_any_hazards_comment {{$temporaryWork->folder->details_of_any_hazards=='yes' ? '':'d-none'}}">
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="details_of_any_hazards_comment" cols="80" rows="2"
                                                    placeholder="Enter Comment">{{$temporaryWork->attachspeccomment->details_of_any_hazards_comment ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <li class="details_of_any_hazards_comment d-none" style="background: white;height:73px">
                                        </li> -->

                                </div>

                                <!-- Hazard identification end  -->


                                <!-- 3rd part Requirements start  -->

                                <div class="list {{$temporaryWork->folder->toArray()['3rd_party_requirements'] ? 'borderActive':''}}">
                                    <li data-id="Party-Requirements" class="majorList {{$temporaryWork->folder->toArray()['3rd_party_requirements']  ? 'active':''}}">3rd Party Requirements:</li>
                                    <ul class="partyRequirment--desc {{$temporaryWork->folder->toArray()['3rd_party_requirements']  ? '':'d-none'}}">
                                        <li class="{{$temporaryWork->folder->toArray()['3rd_party_requirements']  ? '':'invisible'}} Party-Requirements d-flex"
                                            style="justify-content: space-between; align-items: center; min-height: 70px">
                                            <div class="multi-Radio">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="3rd_party_requirements_folder" id="" value="yes" {{$temporaryWork->folder->toArray()['3rd_party_requirements'] =='yes' ? 'checked':''}}/>
                                                    <input class="form-check-input" type="hidden"
                                                        name="3rd_party_requirements" value="3rd Party Requirements:" />
                                                    <label class="form-check-label" for=""> YES </label>
                                                </div>
                                                <!-- NO -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="3rd_party_requirements_folder" id="" value="no" {{$temporaryWork->folder->toArray()['3rd_party_requirements'] =='no' ? 'checked':''}}/>
                                                    <label class="form-check-label" for=""> NO </label>
                                                </div>
                                            </div>
                                            @php
                                            $val = $temporaryWork->folder->toArray()['3rd_party_requirements'];
                                            @endphp
                                            <div class="3rd_party_requirements_comment @if($val=='yes') @else 'd-none' @endif">

                                           
                                                <textarea
                                                    style="color: black;width: 100%;background: white;border: 1px solid lightgrey !important;border-radius: 5px;height: auto; padding: 10px 0 0 10px"
                                                    type="text" name="3rd_party_requirements_comment" cols="80" rows="2"
                                                    placeholder="Enter Comment">{{$temporaryWork->attachspeccomment->toArray()['3rd_party_requirements_comment'] ?? ''}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <li class="3rd_party_requirements_comment d-none" style="background: white;height:73px">
                                        </li> -->
                                    <!-- <li class="3rd_party_requirements_comment d-none">
                                        
                                    </li> -->
                                </div>

                                <!-- 3rd part Requirements end  -->
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="files_div">
                            @isset($images)
                            @foreach($images as $image)
                                <input type="hidden" value="{{$image->id}}" name="unload_images[]" class="{{$image->id}}" /> 
                            @endforeach
                            @endisset
                        </div>
                        <div id="new_div" class="m-md-2">
                            @isset($images)
                            @foreach($images as $image)
                            <span id="{{$image->id}}" >
                                <a target="_blank" href="{{asset($image->image)}}" title = "Click to Full View">
                                    <span class="badge badge-success badge-lg p-2">File Uploaded</span>
                                </a>
                                <button type="button" onclick="deleteImageFile({{$image->id}})" class="remove-file btn btn-danger btn-sm p-2 pr-3 pl-3" data-filename="{{$image->id}}" title = "Delete File">&times;</button>
                            </span>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            <div>
                    <!-- @isset($images)
                        @foreach($images as $image)
                            <a target="_blank" href="{{asset($image->image)}}">Attachment {{$loop->iteration}} </a>
                            <div><a href="{{route('delete.temporaryworkimage',$image->id)}}" class="btn btn-danger">-</a></div>
                        @endforeach
                    @endisset -->
                </div>
                <div class="uploadDiv" style="margin-top:20px">
                    {{-- <div class="input-images"></div> --}}
                    <input type="file" name="images[]" accept=".DWG, .dwg, .mp4, .mp3, .jpg, .jpeg, .gif, .svg, .png, .xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                </div>
                <div class="submit-requirment" style="width:100%;justify-content: flex-end">
                    <button data-bs-dismiss="modal"
                        style="width: 27%;border-radius: 6px;margin: 15px 0 !important;">Save</button>

                </div>

            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Attachment of Design -->






<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const listItems = document.querySelectorAll(".common-requirment li[data-id]");

        listItems.forEach(item => {
            item.addEventListener("click", function () {
                const itemId = item.getAttribute("data-id");
                const allDateSections = document.querySelectorAll(".common-requirment.requirment-second li");
                const selectedDateSection = document.querySelector(`.common-requirment.requirment-second li.${itemId}`);
                
                allDateSections.forEach(dateSection => {
                    dateSection.classList.add("invisible");
                });
                
                selectedDateSection.classList.remove("invisible");
            });
        });
    });
</script> -->






