@extends('layouts.dashboard.master',['title' => 'Companies'])
@section('styles')
<style>
    .aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60px !important;
    }

    .content {
        padding-top: 0px !important;
        background-color: #e9edf1 !important;
    }

    .newDesignBtn {
        border-radius: 8px;
        background-color: #07d564;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
        margin-right: 0px;
    }

    /*.newDesignBtn:hover {*/
    /*    color: rgba(222, 13, 13, 0.66);*/
    /*}*/

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
        border-collapse: collapse !important;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;

    }

    .card {
        margin: 30px 0px;
        border-radius: 10px;
    }

    .toolbar-fixed .toolbar {
        background-color: transparent !important;
        border: none !important;
    }

    .card-title h2 {
        color: rgba(254, 242, 242, 0.66);
    }

    table tbody td {
        text-align: center;
    }

    table thead {
        background-color: #f5f8fa;
    }

    table thead th {
        color: #000 !important;
        text-align: center;
        /*transform: rotate(-60deg);*/
        border-bottom: 0px !important;
        vertical-align: middle;
        font-size: 12px !important;
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    /* tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    } */

    .card>.card-header {
        align-items: center;
    }

    .dataTables_filter input {
        border-radius: 8px;
    }

    thead tr {
        height: 6px !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #07d564 !important;
    }

    .nom_table tr td:first-child{
        background-color: #d4d8da;
        max-width: 340px;
    }

    .qualif tr td:first-child{
        background-color: #fff;
    }

    .bg_grey {
        background-color: #d4d8da !important;
    }

    .nom_table td{
        padding: 12px !important;
        font-size: 18px!important;
        border: 1px solid rgba(0, 0, 0, .2) !important;
    }

    table thead th {
        padding: 3px 18px 3px 10px;
        border-bottom: 0;
        color: #ff0000;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        cursor: hand;
    }

    table td {
        padding: 3px 10px;
        color: #000000;
        font-size: 12px;
        font-weight: normal;
    }

    table td .d-flex {
        justify-content: center;
    }

    .btn.btn-active-color-primary:hover:not(.btn-active),
    .btn.btn-active-color-primary:hover:not(.btn-active) i {
        color: #07d564;
    }

    .modal .btn.btn-primary {
        border-color: #07d564 !important;
        background-color: #07d564 !important;
    }
    .qualif tr th:first-child {
        width: 720px;
    }
    .proj td{
        background-color: white !important; 
    }
    td{
        position: relative;
    }
    td input{
        border: none;
        outline: none;
        box-shadow: none;
        text-align: center;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
    }
    .tableBordered th,
    .tableBordered td{
        border: 1px solid grey;
    }
</style>
@include('layouts.sweetalert.sweetalert_css')
@include('layouts.datatables.datatables_css')
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <!-- <div class="toolbar" id="kt_toolbar"> -->
        <!--begin::Container-->
        <!-- <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack"> -->
            <!--begin::Page title-->
            <!-- <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;"> -->
                <!--begin::Title-->
                <!-- <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Company</h1> -->
                <!--end::Title-->
            <!-- </div> -->
            <!--end::Page title-->
        <!-- </div> -->
        <!--end::Container-->
    <!-- </div> -->
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Nomination Form</h2>
                    </div>
                    <!--begin::Card toolbar-->
                    
                    
                    
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <h2>Temporary Works Person Nomination</h2>
                    <p>Provide supporting evidence to xxxxx of the competence, qualifications, training and experience of the individuals nominated to work as Temporary Works Supervisor, Temporary Works Coordinator or Temporary Works Designer. This form will enable xxxxx to assess the competence of the individual to undertake the appropriate role.</p>
                    <!-- table  -->
                    <table class="table nom_table table-bordered">
                        <tbody>
                            <tr>
                                <td>Project</td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Project Manager</td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Nominated person</td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Nominated person’s employer</td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Nominated role</td>
                                <td>
                                        <p class="m-0">*Temporary Works Coordinator</p class="m-0">
                                        <p class="m-0">*Temporary Works Supervisor</p class="m-0">
                                        <p class="m-0">*Temporary Works Designer</p class="m-0">
                                        <p class="m-0">*Delete as appropriate</p class="m-0">
                                </td>
                            </tr>
                            <tr>
                                <td>Description of role being proposed:
                                    (Include details of the type of temporary works that the individual will be managing)</td>
                               <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Description of the limits of authority of the individual (if applicable)</td>
                               <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Does the individual have authority to issue permits to load / take into use and or permit to dismantle?</td>
                               <td><input type="text"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- 2nd table -->
                    <div class="table-responsive bordered">
                        <div class="bg_grey p-3">
                           <h5>Temporary works qualifications</h5>
                           <p class="mb-0">List highest temporary works related qualifications held</p>
                        </div>
                        <table class="table table3 nom_table qualif table-bordered mt-0">
                            <thead>
                                <tr>
                                    <th>Qualification</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text"></td>
                                    <td><input type="text"></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- add btn -->
                        <div class="addrowBtn mb-5 pb-5 d-flex align-items-center justify-content-center">
                            <a href="" class="btn btn-primary" id="table3Btn">Add Field</a>
                        </div>
                    </div>

                     <!-- 3rd table -->
                     <div class="table-responsive bordered">
                        <div class="bg_grey p-3">
                           <h5>Temporary works qualifications</h5>
                           <p class="mb-0">List highest temporary works related qualifications held</p>
                        </div>
                        <table class="table nom_table table4 qualif table-bordered mt-0">
                            <thead>
                                <tr>
                                    <th>Course title</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text"></td>
                                    <td><input type="text"></td>
                                </tr>
                            </tbody>
                        </table>
                          <!-- add btn -->
                          <div class="addrowBtn mb-5 pb-5 d-flex align-items-center justify-content-center">
                            <a href="" class="btn btn-primary" id="table4Btn">Add Field</a>
                        </div>
                    </div>

                     <!-- 4th table -->
                     <div class="table-responsive bordered">
                        <div class="bg_grey p-3">
                           <h5>Temporary works qualifications</h5>
                           <p class="mb-0">List highest temporary works related qualifications held</p>
                        </div>
                        <table class="table nom_table proj table5 table-bordered mt-0">
                            <thead>
                                <tr>
                                    <th>Project title</th>
                                    <th>Role</th>
                                    <th>Description of involvement</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text"></td>
                                    <td><input type="text"></td>
                                    <td><input type="text"></td>
                                </tr>
                            </tbody>
                        </table>
                          <!-- add btn -->
                          <div class="addrowBtn mb-5 pb-5 d-flex align-items-center justify-content-center">
                            <a href="" class="btn btn-primary" id="table5Btn">Add Field</a>
                        </div>
                    </div>

                    <!-- 5th table -->
                    <img src="{{asset('assets/media/images/table_pic.png')}}" alt="table image" class="w-100">

                    <!-- 6th table -->
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
                                <td>-</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Sign boards</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Hoardings</td>
                                <td>-</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Access gantries</td>
                                <td>-</td>
                                <td>
                                    Worked with <br> this type of <br> temporary <br> works, but <br> with no <br> direct <br> involvement.
                                </td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Fuel storage</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Temporary roads</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Barriers</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Welfare facilities</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Precast facilities</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Access bridges</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <!-- 2 -->
                            <tr>
                                <td rowspan="9">Access/ scaffolding</td>
                                <td>Tube & fitting</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>System scaffolding</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>System staircases</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Temporary roofs</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Loading bays</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Chute support</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Mobile towers</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Edge protection</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Suspension systems</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <!-- 3 -->
                            <tr>
                                <td rowspan="4">Formwork/ falsework</td>
                                <td>Formwork</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Falsework</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Back propping</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Support systems</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <!-- 4 -->
                            <tr>
                                <td rowspan="7">Construction plant</td>
                                <td>Crane supports & foundations</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Hoist ties & foundations</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Mast climbers & foundations</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Mobile crane foundations</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Piling mats & working platforms</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Silo bases</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Lifting/ handling devices</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <!-- 5 -->
                            <tr>
                                <td rowspan="6">Excavation/ earthworks</td>
                                <td>Excavation support</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Cofferdams</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Embankment/ bunds</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Ground anchor/ soil nailing</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Open excavations</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Dewatering</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <!--  -->
                            <tr>
                                <td rowspan="6">Structural stability</td>
                                <td>Existing structures during construction</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>New structures during construction</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Structural steelwork erection</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Needling</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Temporary underpinning</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Façade system</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <!--  -->
                            <tr>
                                <td rowspan="2">Permanent works</td>
                                <td>Partial permanent support conditions</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Demolitions</td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- 7th table -->
                       <div class="table-reponsive">
                           <div class="bg_grey mt-4 p-3">
                            <h4>Individual being nominated</h4>
                            <p class="mb-0">
                                I confirm that this is a true record of my experience and qualifications.   <br> 
                                I have read and understood the xxxx Temporary Works procedure. <br>
                                I specifically understand my duties.
                            </p>
                           </div>
                           <table class="table nom_table mt-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-end w-50">Print name</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end w-50">Job title</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end w-50">Signature</td>
                                        <td><input type="text"></td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>

                    <!-- 8th table -->
                    <div class="table-reponsive">
                           <div class="bg_grey mt-4 p-3">
                            <h4>Designated Individual from contractor nominating the individual for the role</h4>
                            <p class="mb-0">
                            I have assessed the competence of the individual being nominated for this role. <br>
                            I can confirm that they are competent to perform the duties that they have been nominated for. <br>
                            I have formally appointed the individual to act in this position.  <br>
                            My company will ensure that this individual will have suitable support to perform these duties.

                            </p>
                           </div>
                           <table class="table nom_table mt-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-end w-50">Print name</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end w-50">Job title</td>
                                        <td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end w-50">Signature</td>
                                        <td><input type="text"></td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection

@section('scripts')
<script>
    $('#table3Btn').click(function(e) {
        e.preventDefault();
        addNewRow('.table3 tbody', `<tr><td><input type="text"></td><td><input type="text"></td> </tr>`)
    });

    $('#table4Btn').click(function(e) {
        e.preventDefault();
        addNewRow('.table4 tbody', `<tr><td><input type="text"></td><td><input type="text"></td> </tr>`)
    });

    $('#table5Btn').click(function(e) {
        e.preventDefault();
        addNewRow('.table5 tbody', ` <tr>
                                    <td><input type="text"></td>
                                    <td><input type="text"></td>
                                    <td><input type="text"></td>
                                </tr>`)
    });

    function addNewRow(selector, row){
        $(selector).append(row);
    }
</script>
@endsection