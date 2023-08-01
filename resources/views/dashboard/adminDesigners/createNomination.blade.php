@extends('layouts.dashboard.master',['title' => 'Create Designer'])
@section('styles')
<style>
   

    table {
        margin-top: 20px;
        
    }
    #kt_content_container{
        background-color: #e9edf1;
    }
    #kt_toolbar_container{
        background-color:#fff;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
        
    }
    .card{
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
    .aside-enabled.aside-fixed.header-fixed .header{
        border-bottom: 1px solid #e4e6ef!important;
    }
    .header-fixed.toolbar-fixed .wrapper{
        padding-top: 60px !important;
    }
    .content{
        padding-top: 0px !important;
        background-color: #e9edf1 !important;
    }
    .form-select.form-select-solid{
    color:black !important;
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


    .dataTables_filter input {
        border-radius: 8px;
    }

    thead tr {
        height: 6px !important;
    }
    .nom_table tr td:first-child{
        background-color: #edf1f3;
        max-width: 340px;
        text-align: left;
    }

    .qualif tr td:first-child{
        background-color: #fff;
    }

    .bg_grey {
        background-color: #edf1f3!important;
        border: 1px solid rgba(0, 0, 0, .2) !important;
    }


    .table td:first-child, .table th:first-child, .table tr:first-child {
        padding-left: 6px;
    }

    .table td:last-child, .table th:last-child, .table tr:last-child {
        padding-right: 6px;
    }

    .form-check:not(.form-switch) .form-check-input[type=checkbox] {
        margin-top: 19px;
    }

    .nom_table td{
        padding: 12px !important;
        font-size: 15px!important;
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
    .qualif tr th:first-child {
        width: 720px;
    }
    .proj td{
        background-color: white !important; 
    }
    td{
        position: relative;
    }
    td input[type='radio']{
        border: none;
        outline: none;
        box-shadow: none;
        text-align: center;
        width: 100%;
        height: 53%;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }
     td input{
        border: none;
        outline: none;
        box-shadow: none;
        text-align: center;
        width: 100%;
    }
    .tableBordered th,
    .tableBordered td{
        border: 1px solid grey;
    }
    .tdhight
    {
        height: 57px !important;

    }
</style>

@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Add Nomination</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Admin</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Designer</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Add Nomination</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Card body-->
                <div class="card-body pt-7">
                   @if($nomination)
                   <div class="table-responsive">
                        <table class="cell-border table-hover table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>S.No</th>
                                    <th>Nomination Pdf</th>
                                    <th>Appointment PDF</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <a type="button" href="{{asset('pdf').'/'.$nomination->pdf_url}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" download>
                                      <i class="fa fa-download" aria-hidden="true"></i>  
                                        </a>
                                    </td>
                                    <td>
                                        @if($nomination->appointment_pdf)
                                        <a type="button" href="{{asset('pdf').'/'.$nomination->appointment_pdf}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" download>
                                              <i class="fa fa-download" aria-hidden="true"></i>  
                                        </a> 
                                        @endif
                                    </td>
                                    <td>
                                        <a type="button" href="{{url('adminDesigner/edit-nomination',\Crypt::encrypt($nomination->id))}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                              <i class="fa fa-edit" aria-hidden="true"></i>  
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   @else
                   <form id="nominationform" action="{{url('adminDesigner/save-nomination',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pt-0">
                        <h2>Temporary Works Designer Nomination</h2>
                        <p>Provide supporting evidence to  of the competence, qualifications, training and experience of the individuals nominated to work as Temporary Works Supervisor, Temporary Works Coordinator or Temporary Works Designer. This form will enable  to assess the competence of the individual to undertake the appropriate role.</p>
                        <!-- table  -->
                        <table class="table nom_table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nominated person’s (Company)</td>
                                    <td><input type="text" name="nominated_person_employer" value="{{$user->userDiCompany->designer_company}}" required></td>
                                </tr>
                                <tr>
                                    <td>Nominated person </td>
                                    <td><input type="text" name="nominated_person"  value="{{$user->name}}" required></td>
                                </tr>
                                 <tr>
                                    <td>Date</td>
                                    <td>
                                        <input type="date" name="date" value="{{date('Y-m-d')}}" required>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nominated role</td>
                                    <td>
                                        <input type="text" name="nominated_role" value="Temporary Work Designer" required>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description of role being proposed:
                                        (Include details of the type of temporary works that the individual will be managing)</td>
                                   <td><input type="text" name="description_of_role" value=""></td>
                                </tr>
                                <tr>
                                    <td>Description of the limits of authority of the individual (if applicable)</td>
                                   <td>
                                        <select name="Description_limits_authority" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required>
                                            <option value="">Select Option</option>
                                            <option value="designer" {{$user->roles->pluck('name')[0]=='designer' ? 'selected' : ''}}>Designer</option>
                                            <option value="Design Checker" {{$user->roles->pluck('name')[0]=='Design Checker' ? 'selected' :''}}>Design checker</option>
                                            <option value="Designer and Design Checker" {{$user->roles->pluck('name')[0]=='Designer and Design Checker' ? 'selected' : ''}}>Designer and Design Checker</option>
                                        </select>
                                   </td>
                                </tr>
                            </tbody>
                        </table>
                         <!-- 4th table -->
                         <div class="table-responsive bordered">
                            <div class="bg_grey p-3">
                               <h5>Temporary works Related Experience</h5>
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
                                        <td class="tdhight"><input type="text" name="project_title[]" required></td>
                                        <td class="tdhight"><input type="text" name="project_role[]" required></td>
                                        <td class="tdhight"><input type="text" name="desc_of_involvement[]" required></td>
                                    </tr>
                                </tbody>
                            </table>
                              <!-- add btn -->
                              <div class="addrowBtn mb-5 pb-5 d-flex align-items-center justify-content-center">
                                <a href="" class="btn btn-primary" id="table5Btn">Add Field</a>
                            </div>
                        </div>


                         <div class="table-responsive bordered">
                            <div class="bg_grey p-3">
                               <h5>You can upload your cv if applicable</h5>
                            </div>
                            <table class="table nom_table proj table5 table-bordered mt-0">
                                <input type="file" name="cv" class="form-control">
                            </table>
                        </div>
                         <div class="table-responsive bordered">
                            <div class="bg_grey p-3">
                               <!-- <h5>Temporary works qualifications</h5> -->
                               <p class="mb-0"><b>Competence</b> - Indicate level of experience gained on the various types of temporary works, using key below and ticking the relevant boxes in the table on the subsequent page</p>
                            </div>
                            <table class="table nom_table qualif table-bordered mt-0">
                                <tbody>
                                    <tr>
                                        <td class="tdhight text-center" style="width:10%">N</td>
                                        <td class="tdhight" style="width:10%">None</td>
                                        <td class="tdhight" style="width:35%">No previous experience.</td>
                                    </tr>
                                    <tr>
                                        <td class="tdhight text-center" style="width:10%">A</td>
                                        <td class="tdhight" style="width:10%">Appreciation</td>
                                        <td class="tdhight" style="width:35%">Worked with this type of temporary works, but with no direct involvement.</td>
                                    </tr>
                                    <tr>
                                        <td class="tdhight text-center" style="width:10%">K</td>
                                        <td class="tdhight" style="width:10%">Knowledge</td>
                                        <td class="tdhight" style="width:35%">Worked with this type of temporary works, but with no direct involvement but has a basic knowledge & understanding.</td>
                                    </tr>
                                    <tr>
                                        <td class="tdhight text-center" style="width:10%">E</td>
                                        <td class="tdhight" style="width:10%">Experience</td>
                                        <td class="tdhight" style="width:35%">Worked with this type of temporary works, with direct involvement as a designer or inspector.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- 6th table -->
                        <table class="table tableBordered">
                            <thead>
                                <tr>
                                    <td rowspan="2" class="text-center"><b>Area</b></td>
                                    <td rowspan="2" class="text-center"><b>Type of temporary works</b></td>
                                    <td colspan="4" class="text-center"><b>Level of experience</b></td>
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
                                    <td><input  type="radio" name="Temporary_offices" checked value="N"></td>
                                    <td>
                                        <input  type="radio" name="Temporary_offices" value="A">
                                    </td>
                                    <td><input  type="radio" name="Temporary_offices" value="K"></td>
                                    <td><input  type="radio" name="Temporary_offices" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Sign boards</td>
                                    <td><input  type="radio" name="Sign_boards" value="N" checked></td>
                                    <td><input  type="radio" name="Sign_boards" value="A" ></td>
                                    <td><input  type="radio" name="Sign_boards" value="K" ></td>
                                    <td><input  type="radio" name="Sign_boards" value="E" ></td>
                                </tr>
                                <tr>
                                    <td>Hoardings</td>
                                    <td><input  type="radio" name="Hoardings" checked value="N"></td>
                                    <td><input  type="radio" name="Hoardings" value="A" ></td>
                                    <td><input  type="radio" name="Hoardings" value="K" ></td>
                                    <td><input  type="radio" name="Hoardings" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Access gantries</td>
                                    <td><input  type="radio" name="Access_gantries" checked value="N"></td>
                                    <td><input  type="radio" name="Access_gantries" value="A" ></td>
                                    <td><input  type="radio" name="Access_gantries" value="K" ></td>
                                    <td><input  type="radio" name="Access_gantries" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Fuel storage</td>
                                    <td><input  type="radio" name="Fuel_storage" checked value="N"></td>
                                    <td><input  type="radio" name="Fuel_storage" value="A" ></td>
                                    <td><input  type="radio" name="Fuel_storage" value="K" ></td>
                                    <td><input  type="radio" name="Fuel_storage" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Temporary roads</td>
                                    <td><input  type="radio" name="Temporary_roads" checked value="N"></td>
                                    <td><input  type="radio" name="Temporary_roads" value="A" ></td>
                                    <td><input  type="radio" name="Temporary_roads" value="K" ></td>
                                    <td><input  type="radio" name="Temporary_roads" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Barriers</td>
                                    <td><input  type="radio" name="Barriers" checked value="N"></td>
                                    <td><input  type="radio" name="Barriers" value="A" ></td>
                                    <td><input  type="radio" name="Barriers" value="K" ></td>
                                    <td><input  type="radio" name="Barriers" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Welfare facilities</td>
                                    <td><input  type="radio" name="Welfare_facilities" checked value="N"></td>
                                    <td><input  type="radio" name="Welfare_facilities" value="A" ></td>
                                    <td><input  type="radio" name="Welfare_facilities" value="K" ></td>
                                    <td><input  type="radio" name="Welfare_facilities" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Precast facilities</td>
                                    <td><input  type="radio" name="Precast_facilities" checked value="N"></td>
                                    <td><input  type="radio" name="Precast_facilities" value="A" ></td>
                                    <td><input  type="radio" name="Precast_facilities" value="K" ></td>
                                    <td><input  type="radio" name="Precast_facilities" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Access bridges</td>
                                    <td><input  type="radio" name="Access_bridges" checked value="N"></td>
                                    <td><input  type="radio" name="Access_bridges" value="A" ></td>
                                    <td><input  type="radio" name="Access_bridges" value="K" ></td>
                                    <td><input  type="radio" name="Access_bridges" value="E"></td>
                                </tr>
                                <!-- 2 -->
                                <tr>
                                    <td rowspan="9">Access/ scaffolding</td>
                                    <td>Tube & fitting</td>
                                    <td><input  type="radio" name="Tube_fitting" checked value="N"></td>
                                    <td><input  type="radio" name="Tube_fitting" value="A" ></td>
                                    <td><input  type="radio" name="Tube_fitting" value="K" ></td>
                                    <td><input  type="radio" name="Tube_fitting" value="E"></td>
                                </tr>
                                <tr>
                                    <td>System scaffolding</td>
                                    <td><input  type="radio" name="System_scaffolding" checked value="N"></td>
                                    <td><input  type="radio" name="System_scaffolding" value="A" ></td>
                                    <td><input  type="radio" name="System_scaffolding" value="K" ></td>
                                    <td><input  type="radio" name="System_scaffolding" value="E"></td>

                                </tr>
                                <tr>
                                    <td>System staircases</td>
                                    <td><input  type="radio" name="System_staircases" checked value="N"></td>
                                    <td><input  type="radio" name="System_staircases" value="A" ></td>
                                    <td><input  type="radio" name="System_staircases" value="K" ></td>
                                    <td><input  type="radio" name="System_staircases" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Temporary roofs</td>
                                    <td><input  type="radio" name="Temporary_roofs" checked value="N"></td>
                                    <td><input  type="radio" name="Temporary_roofs" value="A" ></td>
                                    <td><input  type="radio" name="Temporary_roofs" value="K" ></td>
                                    <td><input  type="radio" name="Temporary_roofs" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Loading bays</td>
                                    <td><input  type="radio" name="Loading_bays" checked value="N"></td>
                                    <td><input  type="radio" name="Loading_bays" value="A" ></td>
                                    <td><input  type="radio" name="Loading_bays" value="K" ></td>
                                    <td><input  type="radio" name="Loading_bays" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Chute support</td>
                                    <td><input  type="radio" name="Chute_support" checked value="N"></td>
                                    <td><input  type="radio" name="Chute_support" value="A" ></td>
                                    <td><input  type="radio" name="Chute_support" value="K" ></td>
                                    <td><input  type="radio" name="Chute_support" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Mobile towers</td>
                                    <td><input  type="radio" name="Mobile_towers" checked value="N"></td>
                                    <td><input  type="radio" name="Mobile_towers" value="A" ></td>
                                    <td><input  type="radio" name="Mobile_towers" value="K" ></td>
                                    <td><input  type="radio" name="Mobile_towers" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Edge protection</td>
                                    <td><input  type="radio" name="Edge_protection" checked value="N"></td>
                                    <td><input  type="radio" name="Edge_protection" value="A" ></td>
                                    <td><input  type="radio" name="Edge_protection" value="K" ></td>
                                    <td><input  type="radio" name="Edge_protection" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Suspension systems</td>
                                    <td><input  type="radio" name="Suspension_systems" checked value="N"></td>
                                    <td><input  type="radio" name="Suspension_systems" value="A" ></td>
                                    <td><input  type="radio" name="Suspension_systems" value="K" ></td>
                                    <td><input  type="radio" name="Suspension_systems" value="E"></td>
                                </tr>
                                <!-- 3 -->
                                <tr>
                                    <td rowspan="4">Formwork/ falsework</td>
                                    <td>Formwork</td>
                                    <td><input  type="radio" name="Formwork" checked value="N"></td>
                                    <td><input  type="radio" name="Formwork" value="A" ></td>
                                    <td><input  type="radio" name="Formwork" value="K" ></td>
                                    <td><input  type="radio" name="Formwork" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Falsework</td>
                                    <td><input  type="radio" name="Falsework" checked value="N"></td>
                                    <td><input  type="radio" name="Falsework" value="A" ></td>
                                    <td><input  type="radio" name="Falsework" value="K" ></td>
                                    <td><input  type="radio" name="Falsework" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Back propping</td>
                                    <td><input  type="radio" name="Back_propping" checked value="N"></td>
                                    <td><input  type="radio" name="Back_propping" value="A" ></td>
                                    <td><input  type="radio" name="Back_propping" value="K" ></td>
                                    <td><input  type="radio" name="Back_propping" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Support systems</td>
                                    <td><input  type="radio" name="Support_systems" checked value="N"></td>
                                    <td><input  type="radio" name="Support_systems" value="A" ></td>
                                    <td><input  type="radio" name="Support_systems" value="K" ></td>
                                    <td><input  type="radio" name="Support_systems" value="E"></td>
                                </tr>
                                <!-- 4 -->
                                <tr>
                                    <td rowspan="7">Construction plant</td>
                                    <td>Crane supports & foundations</td>
                                    <td><input  type="radio" name="Crane_supports_foundations" checked value="N"></td>
                                    <td><input  type="radio" name="Crane_supports_foundations" value="A" ></td>
                                    <td><input  type="radio" name="Crane_supports_foundations" value="K" ></td>
                                    <td><input  type="radio" name="Crane_supports_foundations" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Hoist ties & foundations</td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" checked value="N"></td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" value="A" ></td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" value="K" ></td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Mast climbers & foundations</td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" checked value="N"></td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" value="A" ></td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" value="K" ></td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Mobile crane foundations</td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" checked value="N"></td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" value="A" ></td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" value="K" ></td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Piling mats & working platforms</td>
                                     <td><input  type="radio" name="Piling_mats_working_platforms" checked value="N"></td>
                                    <td><input  type="radio" name="Piling_mats_working_platforms" value="A" ></td>
                                    <td><input  type="radio" name="Piling_mats_working_platforms" value="K" ></td>
                                    <td><input  type="radio" name="Piling_mats_working_platforms" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Silo bases</td>
                                    <td><input  type="radio" name="Silo_bases" checked value="N"></td>
                                    <td><input  type="radio" name="Silo_bases" value="A" ></td>
                                    <td><input  type="radio" name="Silo_bases" value="K" ></td>
                                    <td><input  type="radio" name="Silo_bases" value="E"></td>
                                   
                                </tr>
                                <tr>
                                    <td>Lifting/ handling devices</td>
                                    <td><input  type="radio" name="Lifting_handling_devices" checked value="N"></td>
                                    <td><input  type="radio" name="Lifting_handling_devices" value="A" ></td>
                                    <td><input  type="radio" name="Lifting_handling_devices" value="K" ></td>
                                    <td><input  type="radio" name="Lifting_handling_devices" value="E"></td>
                                </tr>
                                <!-- 5 -->
                                <tr>
                                    <td rowspan="6">Excavation/ earthworks</td>
                                    <td>Excavation support</td>
                                    <td><input  type="radio" name="Excavation_support" checked value="N"></td>
                                    <td><input  type="radio" name="Excavation_support" value="A" ></td>
                                    <td><input  type="radio" name="Excavation_support" value="K" ></td>
                                    <td><input  type="radio" name="Excavation_support" value="E"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Cofferdams</td>
                                    <td><input  type="radio" name="Cofferdams" checked value="N"></td>
                                    <td><input  type="radio" name="Cofferdams" value="A" ></td>
                                    <td><input  type="radio" name="Cofferdams" value="K" ></td>
                                    <td><input  type="radio" name="Cofferdams" value="E"></td>
                                   
                                </tr>
                                <tr>
                                    <td>Embankment/ bunds</td>
                                    <td><input  type="radio" name="Embankment_bunds" checked value="N"></td>
                                    <td><input  type="radio" name="Embankment_bunds" value="A" ></td>
                                    <td><input  type="radio" name="Embankment_bunds" value="K" ></td>
                                    <td><input  type="radio" name="Embankment_bunds" value="E"></td>
                                   
                                </tr>
                                <tr>
                                    <td>Ground anchor/ soil nailing</td>
                                     <td><input  type="radio" name="Ground_anchor_soil_nailing" checked value="N"></td>
                                    <td><input  type="radio" name="Ground_anchor_soil_nailing" value="A" ></td>
                                    <td><input  type="radio" name="Ground_anchor_soil_nailing" value="K" ></td>
                                    <td><input  type="radio" name="Ground_anchor_soil_nailing" value="E"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Open excavations</td>
                                    <td><input  type="radio" name="Open_excavations" checked value="N"></td>
                                    <td><input  type="radio" name="Open_excavations" value="A" ></td>
                                    <td><input  type="radio" name="Open_excavations" value="K" ></td>
                                    <td><input  type="radio" name="Open_excavations" value="E"></td>
                                </tr>
                                <tr>
                                    <td>Dewatering</td>
                                    <td><input  type="radio" name="Dewatering" checked value="N"></td>
                                    <td><input  type="radio" name="Dewatering" value="A" ></td>
                                    <td><input  type="radio" name="Dewatering" value="K" ></td>
                                    <td><input  type="radio" name="Dewatering" value="E"></td>
                                    
                                </tr>
                                <!--  -->
                                <tr>
                                    <td rowspan="6">Structural stability</td>
                                    <td>Existing structures during construction</td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" checked value="N"></td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" value="A" ></td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" value="K" ></td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" value="E"></td>
                                    
                                </tr>
                                <tr>
                                    <td>New structures during construction</td>
                                    <td><input  type="radio" name="New_structures_during_construction" checked value="N"></td>
                                    <td><input  type="radio" name="New_structures_during_construction" value="A" ></td>
                                    <td><input  type="radio" name="New_structures_during_construction" value="K" ></td>
                                    <td><input  type="radio" name="New_structures_during_construction" value="E"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Structural steelwork erection</td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" checked value="N"></td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" value="A" ></td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" value="K" ></td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" value="E"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Needling</td>
                                    <td><input  type="radio" name="Needling" checked value="N"></td>
                                    <td><input  type="radio" name="Needling" value="A" ></td>
                                    <td><input  type="radio" name="Needling" value="K" ></td>
                                    <td><input  type="radio" name="Needling" value="E"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Temporary underpinning</td>
                                    <td><input  type="radio" name="Temporary_underpinning" checked value="N"></td>
                                    <td><input  type="radio" name="Temporary_underpinning" value="A" ></td>
                                    <td><input  type="radio" name="Temporary_underpinning" value="K" ></td>
                                    <td><input  type="radio" name="Temporary_underpinning" value="E"></td>
                                    
                                </tr>
                                <tr>
                                    <td>Façade system</td>
                                    <td><input  type="radio" name="Façade_system" checked value="N"></td>
                                    <td><input  type="radio" name="Façade_system" value="A" ></td>
                                    <td><input  type="radio" name="Façade_system" value="K" ></td>
                                    <td><input  type="radio" name="Façade_system" value="E"></td>
                                    
                                </tr>
                                <!--  -->
                                <tr>
                                    <td rowspan="2">Permanent works</td>
                                    <td>Partial permanent support conditions</td>
                                     <td><input  type="radio" name="Partial_permanent_support_conditions" checked value="N"></td>
                                    <td><input  type="radio" name="Partial_permanent_support_conditions" value="A" ></td>
                                    <td><input  type="radio" name="Partial_permanent_support_conditions" value="K" ></td>
                                    <td><input  type="radio" name="Partial_permanent_support_conditions" value="E"></td>
                                   
                                </tr>
                                <tr>
                                    <td>Demolitions</td>
                                    <td><input  type="radio" name="Demolitions" checked value="N"></td>
                                    <td><input  type="radio" name="Demolitions" value="A" ></td>
                                    <td><input  type="radio" name="Demolitions" value="K" ></td>
                                    <td><input  type="radio" name="Demolitions" value="E"></td>
                                    
                                </tr>
                            </tbody>
                        </table>

                        <!-- 7th table -->
                           <div class="table-reponsive">
                               <div class="bg_grey mt-4 p-3">
                                <h4>Individual being nominated</h4>
                                <p class="mb-0">
                                    I confirm that this is a true record of my experience and qualifications.   <br> 
                                    I have read and understood the {{$user->userDiCompany->designer_company}} Temporary Works procedure. <br>
                                    I specifically understand my duties.
                                </p>
                               </div>
                               <table class="table nom_table mt-0 table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-end w-50">Date</td>
                                            <td><input type="date" name="date" value="{{date('Y-m-d')}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end w-50">
                                                <!--begin::Label-->
                                                <label >
                                                    <span>Signature:</span>
                                                </label>
                                            </td>
                                            <td>
                                                <div id="sign">
                                                     <div class="d-flex inputDiv"  style="align-items: center;">
                                                     <canvas id="sig" style="border: 1px solid lightgray"></canvas>
                                                      <br/>
                                                      <textarea id="signature" name="signed" style="display: none" required></textarea>
                                                       <span id="clear" class="fa fa-undo cursor-pointer" style="line-height: 6"></span>
                                                     </div>
                                                     <span id="sigimage" class="text-danger">Signature Not Added</span>
                                                 </div>
                                                 

                                                  <div class="inputDiv" id="pdfsign" style="display: none">
                                                    <!-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Upload Signature:</span>
                                                    </label> -->
                                                    <input type="file" name="pdfphoto" class="form-control" accept="image/*">
                                                    <span>Allowed format (PNG, JPG)</span>
                                                 </div>
                                                
                                                 <div class="d-none inputDiv" id="namesign">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Name Signature:</span>
                                                    </label>
                                                    <input type="text" name="namesign" class="form-control form-control-solid">
                                                </div>   
                                            </td>
                                        </tr>
                                        <tr>

                                            
                                            <td class="text-end w-50">
                                                <!--begin::Label-->
                                                <label >
                                                    <span>Type Signature:</span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input mx-0 position-relative" type="checkbox" id="flexCheckChecked" >
                                                  <input type="hidden" id="signtype" name="signtype" class="form-control form-control-solid" value="2">
                                                  <label class="form-check-label" for="inlineCheckbox1">name signature?</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input mx-0 position-relative" type="checkbox" id="pdfChecked">
                                                  <input type="hidden" id="pdfsign" name="pdfsigntype" class="form-control form-control-solid" value="0">
                                                  <label class="form-check-label" for="inlineCheckbox2">Pdf signature?</label>
                                                </div>
                                               
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                           </div>
                           <button type="submit" id="submit" class="btn submitbtn btn-primary">submit</button>
                    </div>
                    
                    <!--end::Card body-->
                   </form> 
                    @endif
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
        addNewRow('.table3 tbody', `<tr><td class="tdhight"><input type="text" name="qualification[]" required></td><td class="tdhight"><input type="date" name="qualification_date[]"></td> <td class="tdhight" style="width:22%"><input type="file" name="qualification_file[]"></td> </tr>`)
    });

    $('#table4Btn').click(function(e) {
        e.preventDefault();
        addNewRow('.table4 tbody', `<tr><td class="tdhight"><input type="text" name="course[]" required></td><td class="tdhight"><input type="date" name="course_date[]"></td> <td class="tdhight" style="width:22%"><input type="file" name="course_file[]"></td> </tr>`)
    });

    $('#table5Btn').click(function(e) {
        e.preventDefault();
        addNewRow('.table5 tbody', ` <tr>
                                    <td class="tdhight"><input type="text" name="project_title[]" required></td>
                                    <td class="tdhight"><input type="text" name="project_role[]"></td>
                                    <td class="tdhight"><input type="text" name="desc_of_involvement[]" style="width:78%"><button class="btn btn-sm btn-danger remove" type="button">-</button></td>
                                </tr>`)
    });

    function addNewRow(selector, row){
        $(selector).append(row);
    }
    $(document).on('click','.remove',function(){
        $(this).parent().parent().remove();
    })
</script>

<script type="text/javascript">
     var canvas = document.getElementById("sig");
     var signaturePad = new SignaturePad(canvas);
     signaturePad.addEventListener("endStroke", () => {
        console.log("here");
              $("#signature").val(signaturePad.toDataURL('image/png'));
              $("#sigimage").text("Signature Added").removeClass('text-danger').addClass('text-sucess');
            });

     $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.clear();
        $("#signature").val('');
         $("#sigimage").text("Signature Not Added").removeClass('text-sucess').addClass('text-danger');
    });
</script>

<script type="text/javascript">
    $("#flexCheckChecked").change(function(){
        if($(this).is(':checked'))
        {
            $("#pdfChecked").prop('checked',false);
            $("#signtype").val(1);
             $("#pdfsign").val(0);
            $("div#pdfsign").hide();
            $("#namesign").addClass('d-flex').removeClass('d-none')
            $(".customSubmitButton").removeClass("hideBtn");
            $(".customSubmitButton").addClass("showBtn");
             $("input[name='pdfsign']").removeAttr('required');
            $("input[name='namesign']").attr('required','required');
            $("#clear").hide();
            $("#sign").hide();
            $("#signature").removeAttr('required');
           
        }
        else{
            $("#signtype").val(2);
            $("#sign").show();
            $("#namesign").removeClass('d-flex').addClass('d-none');
            $("input[name='namesign']").removeAttr('required');
            $("#clear").show();
            $(".customSubmitButton").addClass("hideBtn");
            $(".customSubmitButton").removeClass("showBtn");
            $("#signature").attr('required','required');
        }
    })

    $("#pdfChecked").change(function(){

        if($(this).is(':checked'))
        {
            $("#flexCheckChecked").prop('checked',false);
            $("#pdfsign").val(1);
            $("#signtype").val(0);
            $("input[name='pdfsign']").attr('required','required');
            $("div#pdfsign").show();
            $("#namesign").removeClass('d-flex').addClass('d-none');
            $("input[name='namesign']").removeAttr('required');
            $("#clear").hide();
            $("#sign").hide();
            $("#signature").removeAttr('required');
           
        }
        else{
            $("#pdfsign").val(0);
            $("#signtype").val(2);
            $("#sign").show();
            $("div#pdfsign").hide();
            $("#namesign").removeClass('d-flex').addClass('d-none');
            $("input[name='namesign']").removeAttr('required');
            $("input[name='pdfsign']").removeAttr('required');
            $("#clear").show();
            $("#signature").attr('required','required');
             
        }
    })

    $(".fa-comment").click(function(){
        let Userid=$(this).attr('data-id');
        let project=$(this).attr('data-project');
        $.ajax({
                type: 'GET',
                url: '{{url("Nomination/nomination-commetns")}}',
                data:{Userid,project},
                success: function(data) {
                    $("#nomination_result").html(data);
                    $("#nomination_comment_modal_id").modal('show');
                }
            });
    })
</script>
@endsection