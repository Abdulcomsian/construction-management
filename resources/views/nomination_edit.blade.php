@extends('layouts.nomination',['title' => 'Nomination'])
@section('styles')
<style>
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
        height: 53%;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }
    .tableBordered th,
    .tableBordered td{
        border: 1px solid grey;
    }
    .tdhight
    {
        height: 57px !important;

    }
    @media (min-width: 992px){
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            padding: 0 160px;
        }
        .card-body {
            flex: 1 1 auto;
            padding: 1rem 3rem;
        }
    }
</style>
</style>
@include('layouts.sweetalert.sweetalert_css')
@include('layouts.datatables.datatables_css')
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card shadow-lg">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h1>Edit Nomination Form</h1>
                    </div>
                </div>
                <form action="{{url('nomination-update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="card-body pt-0">
                        <h2>Temporary Works Person Nomination</h2>
                        <p>Provide supporting evidence to {{$user->userCompany->name}} of the competence, qualifications, training and experience of the individuals nominated to work as Temporary Works Supervisor, Temporary Works Coordinator or Temporary Works Designer. This form will enable {{$user->userCompany->name}} to assess the competence of the individual to undertake the appropriate role.</p>
                        <!-- table  -->
                        <table class="table nom_table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Project</td>
                                    <td>
                                        <select name="project" id="projects" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="">Select Option</option>
                                        @forelse($projects as $item)
                                        <option value="{{$item->id}}" @isset($old) {{ in_array($item->id,$old) ? 'selected' : '' }} @endisset @isset($nomination->project) {{ $item->id==$nomination->project ? 'selected' : '' }} @endisset>{{$item->name .' - '. $item->no}}</option>
                                        @empty
                                        @endforelse
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Project Manager</td>
                                    <td><input type="text" name="project_manager" value="{{$nomination->project_manager ?? ''}}" required></td>
                                </tr>
                                <tr>
                                    <td>Nominated person (Your name)</td>
                                    <td><input type="text" name="nominated_person" value="{{$nomination->nominated_person ?? ''}}" required></td>
                                </tr>
                                <tr>
                                    <td>Nominated person’s employer</td>
                                    <td><input type="text" name="nominated_person_employer" value="{{$nomination->nominated_person_employer ?? ''}}" required></td>
                                </tr>
                                <tr>
                                    <td>Nominated role</td>
                                    <td>
                                        @php
                                         if($user->roles->pluck('name')[0]=='user')
                                         {
                                            $role="Temporary works co-ordinator";
                                         }elseif($user->roles->pluck('name')[0]=='supervisor')
                                         {
                                             $role="Temporary works supervisor";
                                         }
                                         elseif($user->roles->pluck('name')[0]=='scaffolder')
                                         {
                                            $role="Scaffolder";
                                         }
                                        @endphp
                                        <input type="text" name="nominated_role" value="{{ $role ?? '' }}" required>
                                            <p>*Temporary Works Coordinator</p>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description of role being proposed:
                                        (Include details of the type of temporary works that the individual will be managing)</td>
                                   <td><input type="text" name="description_of_role" value="{{$nomination->description_of_role}}"></td>
                                </tr>
                                <tr>
                                    <td>Description of the limits of authority of the individual (if applicable)</td>
                                   <td><input type="text" name="Description_limits_authority" value="{{$nomination->Description_limits_authority}}"></td>
                                </tr>
                                <tr>
                                    <td>Does the individual have authority to issue permits to load / take into use and or permit to dismantle?</td>
                                   <td><input type="text" name="authority_issue_permit" value="{{$nomination->authority_issue_permit}}"></td>
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
                                        <th>Upload Certificate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @foreach($qualifications as $qf)
                                        <tr>
                                        <input type="hidden" name="qualifications_ids[]" value="{{$qf->id}}">
                                        <td class="tdhight"><input type="text" name="qualification[]" value="{{$qf->qualification}}" required></td>
                                        <td class="tdhight" style="width:25%"><input type="date" name="qualification_date[]" value="{{$qf->date}}" required></td>
                                         <td class="tdhight" style="width:35%"><input type="file" name="qualification_file[]"></td>
                                         </tr>
                                        @endforeach
                                        
                                       
                                    
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
                                        <th>Upload Certificate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @foreach($courses as $cs)
                                        <tr>
                                        <input type="hidden" name="course_ids[]" value="{{$cs->id}}">
                                        <td class="tdhight"><input type="text" name="course[]" value="{{$cs->course}}" required></td>
                                        <td class="tdhight" style="width:25%"><input type="date" name="course_date[]" value="{{$cs->date}}" required></td>
                                        <td class="tdhight" style="width:35%"><input type="file" name="course_file[]"></td>
                                        </tr>
                                        @endforeach
                                    
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
                                        @foreach($experience as $ex)
                                        <tr>
                                        <input type="hidden" name="experience_ids[]" value="{{$ex->id}}">
                                        <td class="tdhight"><input type="text" name="project_title[]" value="{{$ex->project_title}}" required></td>
                                        <td class="tdhight"><input type="text" name="project_role[]" value="{{$ex->role}}" required></td>
                                        <td class="tdhight"><input type="text" name="desc_of_involvement[]" value="{{$ex->description_involvment}}" required></td>
                                         </tr>
                                        @endforeach
                                </tbody>
                            </table>
                              <!-- add btn -->
                              <div class="addrowBtn mb-5 pb-5 d-flex align-items-center justify-content-center">
                                <a href="" class="btn btn-primary" id="table5Btn">Add Field</a>
                            </div>
                        </div>

                        <!-- 5th table -->
                         <div class="table-responsive bordered">
                            <div class="bg_grey p-3">
                               <!-- <h5>Temporary works qualifications</h5> -->
                               <p class="mb-0"><b>Competence</b> - Indicate level of experience gained on the various types of temporary works, using key below and ticking the relevant boxes in the table on the subsequent page</p>
                            </div>
                            <table class="table table6 nom_table qualif table-bordered mt-0">
                                <!-- <thead>
                                    <tr>
                                        <th>Qualification</th>
                                        <th>Date</th>
                                        <th>Upload Certificate</th>
                                    </tr>
                                </thead> -->
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
                                @php 
                                    $data= $competence->Site_establishment;
                                @endphp
                                <tr>
                                    <td rowspan="10">Site establishment</td>
                                    <td>Temporary offices</td>

                                    <td><input  type="radio" name="Temporary_offices" value="N" {{$data['Temporary_offices']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_offices" value="A" {{$data['Temporary_offices']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_offices" value="K" {{$data['Temporary_offices']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_offices" value="E" {{$data['Temporary_offices']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Sign boards</td>
                                    <td><input  type="radio" name="Sign_boards" value="N" {{$data['Sign_boards']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Sign_boards" value="A" {{$data['Sign_boards']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Sign_boards" value="K" {{$data['Sign_boards']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Sign_boards" value="E" {{$data['Sign_boards']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Hoardings</td>
                                    <td><input  type="radio" name="Hoardings" value="N" {{$data['Hoardings']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Hoardings" value="A" {{$data['Hoardings']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Hoardings" value="K" {{$data['Hoardings']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Hoardings" value="E" {{$data['Hoardings']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Access gantries</td>
                                    <td><input  type="radio" name="Access_gantries" value="N" {{$data['Access_gantries']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Access_gantries" value="A" {{$data['Access_gantries']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Access_gantries" value="K" {{$data['Access_gantries']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Access_gantries" value="E" {{$data['Access_gantries']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Fuel storage</td>
                                    <td><input  type="radio" name="Fuel_storage" value="N" {{$data['Fuel_storage']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Fuel_storage" value="A" {{$data['Fuel_storage']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Fuel_storage" value="K" {{$data['Fuel_storage']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Fuel_storage" value="E" {{$data['Fuel_storage']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Temporary roads</td>
                                    <td><input  type="radio" name="Temporary_roads" value="N" {{$data['Temporary_roads']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_roads" value="A" {{$data['Temporary_roads']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_roads" value="K" {{$data['Temporary_roads']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_roads" value="E" {{$data['Temporary_roads']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Barriers</td>
                                    <td><input  type="radio" name="Barriers" value="N" {{$data['Barriers']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Barriers" value="A" {{$data['Barriers']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Barriers" value="K" {{$data['Barriers']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Barriers" value="E" {{$data['Barriers']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Welfare facilities</td>
                                    <td><input  type="radio" name="Welfare_facilities" value="N" {{$data['Welfare_facilities']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Welfare_facilities" value="A" {{$data['Welfare_facilities']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Welfare_facilities" value="K" {{$data['Welfare_facilities']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Welfare_facilities" value="E" {{$data['Welfare_facilities']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Precast facilities</td>
                                    <td><input  type="radio" name="Precast_facilities" value="N" {{$data['Precast_facilities']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Precast_facilities" value="A" {{$data['Precast_facilities']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Precast_facilities" value="K" {{$data['Precast_facilities']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Precast_facilities" value="E" {{$data['Precast_facilities']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Access bridges</td>
                                    <td><input  type="radio" name="Access_bridges" value="N" {{$data['Access_bridges']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Access_bridges" value="A" {{$data['Access_bridges']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Access_bridges" value="K" {{$data['Access_bridges']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Access_bridges" value="E" {{$data['Access_bridges']=="E" ? 'checked':''}}></td>
                                </tr>
                                <!-- 2 -->
                                @php 
                                    $data= $competence->Access_scaffolding;
                                @endphp
                                <tr>
                                    <td rowspan="9">Access/ scaffolding</td>
                                    <td>Tube & fitting</td>
                                    <td><input  type="radio" name="Tube_fitting" value="N" {{$data['Tube_fitting']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Tube_fitting" value="A" {{$data['Tube_fitting']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Tube_fitting" value="K" {{$data['Tube_fitting']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Tube_fitting" value="E" {{$data['Tube_fitting']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>System scaffolding</td>
                                    <td><input  type="radio" name="System_scaffolding" value="N" {{$data['System_scaffolding']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="System_scaffolding" value="A" {{$data['System_scaffolding']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="System_scaffolding" value="K" {{$data['System_scaffolding']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="System_scaffolding" value="E" {{$data['System_scaffolding']=="E" ? 'checked':''}}></td>

                                </tr>
                                <tr>
                                    <td>System staircases</td>
                                    <td><input  type="radio" name="System_staircases" value="N" {{$data['System_staircases']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="System_staircases" value="A" {{$data['System_staircases']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="System_staircases" value="K" {{$data['System_staircases']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="System_staircases" value="E" {{$data['System_staircases']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Temporary roofs</td>
                                    <td><input  type="radio" name="Temporary_roofs" value="N" {{$data['Temporary_roofs']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_roofs" value="A" {{$data['Temporary_roofs']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_roofs" value="K" {{$data['Temporary_roofs']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_roofs" value="E" {{$data['Temporary_roofs']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Loading bays</td>
                                    <td><input  type="radio" name="Loading_bays" value="N" {{$data['Loading_bays']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Loading_bays" value="A" {{$data['Loading_bays']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Loading_bays" value="K" {{$data['Loading_bays']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Loading_bays" value="E" {{$data['Loading_bays']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Chute support</td>
                                    <td><input  type="radio" name="Chute_support" value="N" {{$data['Chute_support']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Chute_support" value="A" {{$data['Chute_support']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Chute_support" value="K" {{$data['Chute_support']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Chute_support" value="E" {{$data['Chute_support']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Mobile towers</td>
                                    <td><input  type="radio" name="Mobile_towers" value="N" {{$data['Mobile_towers']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mobile_towers" value="A" {{$data['Mobile_towers']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mobile_towers" value="K" {{$data['Mobile_towers']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mobile_towers" value="E" {{$data['Mobile_towers']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Edge protection</td>
                                    <td><input  type="radio" name="Edge_protection" value="N" {{$data['Edge_protection']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Edge_protection" value="A" {{$data['Edge_protection']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Edge_protection" value="K" {{$data['Edge_protection']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Edge_protection" value="E" {{$data['Edge_protection']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Suspension systems</td>
                                    <td><input  type="radio" name="Suspension_systems" value="N" {{$data['Suspension_systems']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Suspension_systems" value="A" {{$data['Suspension_systems']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Suspension_systems" value="K" {{$data['Suspension_systems']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Suspension_systems" value="E" {{$data['Suspension_systems']=="E" ? 'checked':''}}></td>
                                </tr>
                                <!-- 3 -->
                                @php 
                                    $data= $competence->Formwork_falsework;
                                @endphp
                                <tr>
                                    <td rowspan="4">Formwork/ falsework</td>
                                    <td>Formwork</td>
                                    <td><input  type="radio" name="Formwork" value="N" {{$data['Formwork']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Formwork" value="A" {{$data['Formwork']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Formwork" value="K" {{$data['Formwork']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Formwork" value="E" {{$data['Formwork']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Falsework</td>
                                    <td><input  type="radio" name="Falsework" value="N" {{$data['Formwork']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Falsework" value="A" {{$data['Formwork']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Falsework" value="K" {{$data['Formwork']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Falsework" value="E" {{$data['Formwork']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Back propping</td>
                                    <td><input  type="radio" name="Back_propping" value="N" {{$data['Back_propping']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Back_propping" value="A" {{$data['Back_propping']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Back_propping" value="K" {{$data['Back_propping']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Back_propping" value="E" {{$data['Back_propping']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Support systems</td>
                                    <td><input  type="radio" name="Support_systems" value="N" {{$data['Support_systems']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Support_systems" value="A" {{$data['Support_systems']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Support_systems" value="K" {{$data['Support_systems']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Support_systems" value="E" {{$data['Support_systems']=="E" ? 'checked':''}}></td>
                                </tr>
                                <!-- 4 -->
                                @php 
                                    $data= $competence->Construction_plant;
                                @endphp
                                <tr>
                                    <td rowspan="7">Construction plant</td>
                                    <td>Crane supports & foundations</td>
                                    <td><input  type="radio" name="Crane_supports_foundations" value="N" {{$data['Crane_supports_foundations']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Crane_supports_foundations" value="A" {{$data['Crane_supports_foundations']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Crane_supports_foundations" value="K" {{$data['Crane_supports_foundations']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Crane_supports_foundations" value="E" {{$data['Crane_supports_foundations']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Hoist ties & foundations</td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" value="N" {{$data['Hoist_ties_foundations']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" value="A" {{$data['Hoist_ties_foundations']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" value="K" {{$data['Hoist_ties_foundations']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Hoist_ties_foundations" value="E" {{$data['Hoist_ties_foundations']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Mast climbers & foundations</td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" value="N" {{$data['Mast_climbers_foundations']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" value="A" {{$data['Mast_climbers_foundations']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" value="K" {{$data['Mast_climbers_foundations']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mast_climbers_foundations" value="E" {{$data['Mast_climbers_foundations']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Mobile crane foundations</td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" value="N" {{$data['Mobile_crane_foundations']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" value="A" {{$data['Mobile_crane_foundations']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" value="K" {{$data['Mobile_crane_foundations']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Mobile_crane_foundations" value="E" {{$data['Mobile_crane_foundations']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Piling mats & working platforms</td>
                                     <td><input type="radio" name="Piling_mats_working_platforms" value="N" {{$data['MPiling_mats_working-platforms']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Piling_mats_working_platforms" value="A" {{$data['MPiling_mats_working-platforms']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Piling_mats_working_platforms" value="K" {{$data['MPiling_mats_working-platforms']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Piling_mats_working_platforms" value="E" {{$data['MPiling_mats_working-platforms']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Silo bases</td>
                                    <td><input  type="radio" name="Silo_bases" value="N" checked></td>
                                    <td><input  type="radio" name="Silo_bases" value="A"></td>
                                    <td><input  type="radio" name="Silo_bases" value="K"></td>
                                    <td><input  type="radio" name="Silo_bases" value="E"></td>
                                   
                                </tr>
                                <tr>
                                    <td>Lifting/ handling devices</td>
                                    <td><input  type="radio" name="Lifting_handling_devices" value="N" {{$data['Lifting_handling_devices']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Lifting_handling_devices" value="A" {{$data['Lifting_handling_devices']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Lifting_handling_devices" value="K" {{$data['Lifting_handling_devices']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Lifting_handling_devices" value="E" {{$data['Lifting_handling_devices']=="E" ? 'checked':''}}></td>
                                </tr>
                                <!-- 5 -->
                                @php
                                $data=$competence->Excavation_earthworks;
                                @endphp
                                <tr>
                                    <td rowspan="6">Excavation/ earthworks</td>
                                    <td>Excavation support</td>
                                    <td><input  type="radio" name="Excavation_support" value="N" {{$data['Excavation_support']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Excavation_support" value="A" {{$data['Excavation_support']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Excavation_support" value="K" {{$data['Excavation_support']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Excavation_support" value="E" {{$data['Excavation_support']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <tr>
                                    <td>Cofferdams</td>
                                    <td><input  type="radio" name="Cofferdams" value="N" {{$data['Cofferdams']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Cofferdams" value="A" {{$data['Cofferdams']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Cofferdams" value="K" {{$data['Cofferdams']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Cofferdams" value="E" {{$data['Cofferdams']=="E" ? 'checked':''}}></td>
                                   
                                </tr>
                                <tr>
                                    <td>Embankment/ bunds</td>
                                    <td><input  type="radio" name="Embankment_bunds" value="N" {{$data['Embankment_bunds']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Embankment_bunds" value="A" {{$data['Embankment_bunds']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Embankment_bunds" value="K" {{$data['Embankment_bunds']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Embankment_bunds" value="E" {{$data['Embankment_bunds']=="E" ? 'checked':''}}></td>
                                   
                                </tr>
                                <tr>
                                    <td>Ground anchor/ soil nailing</td>
                                     <td><input type="radio" name="Ground_anchor_soil_nailing" value="N" {{$data['Ground_anchor_soil_nailing']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Ground_anchor_soil_nailing" value="A" {{$data['Ground_anchor_soil_nailing']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Ground_anchor_soil_nailing" value="K" {{$data['Ground_anchor_soil_nailing']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Ground_anchor_soil_nailing" value="E" {{$data['Ground_anchor_soil_nailing']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <tr>
                                    <td>Open excavations</td>
                                    <td><input  type="radio" name="Open_excavations" value="N" {{$data['Open_excavations']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Open_excavations" value="A" {{$data['Open_excavations']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Open_excavations" value="K" {{$data['Open_excavations']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Open_excavations" value="E" {{$data['Open_excavations']=="E" ? 'checked':''}}></td>
                                </tr>
                                <tr>
                                    <td>Dewatering</td>
                                    <td><input  type="radio" name="Dewatering" value="N" {{$data['Dewatering']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Dewatering" value="A" {{$data['Dewatering']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Dewatering" value="K" {{$data['Dewatering']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Dewatering" value="E" {{$data['Dewatering']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <!--  -->
                                @php
                                $data=$competence->Structural_stability;
                                @endphp
                                <tr>
                                    <td rowspan="6">Structural stability</td>
                                    <td>Existing structures during construction</td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" value="N" {{$data['Existing_structures_during_construction']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" value="A" {{$data['Existing_structures_during_construction']=="A" ? 'checked':''}} ></td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" value="K" {{$data['Existing_structures_during_construction']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Existing_structures_during_construction" value="E" {{$data['Existing_structures_during_construction']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <tr>
                                    <td>New structures during construction</td>
                                    <td><input  type="radio" name="New_structures_during_construction" value="N" {{$data['New_structures_during_construction']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="New_structures_during_construction" value="A" {{$data['New_structures_during_construction']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="New_structures_during_construction" value="K" {{$data['New_structures_during_construction']=="K" ? 'checked':''}} ></td>
                                    <td><input  type="radio" name="New_structures_during_construction" value="E" {{$data['New_structures_during_construction']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <tr>
                                    <td>Structural steelwork erection</td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" checked value="N" {{$data['Structural_steelwork_erection']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" value="A" {{$data['Structural_steelwork_erection']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" value="K" {{$data['Structural_steelwork_erection']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Structural_steelwork_erection" value="E" {{$data['Structural_steelwork_erection']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <tr>
                                    <td>Needling</td>
                                    <td><input  type="radio" name="Needling" value="N" {{$data['Needling']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Needling" value="A" {{$data['Needling']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Needling" value="K" {{$data['Needling']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Needling" value="E" {{$data['Needling']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <tr>
                                    <td>Temporary underpinning</td>
                                    <td><input  type="radio" name="Temporary_underpinning" value="N" {{$data['Temporary_underpinning']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_underpinning" value="A" {{$data['Temporary_underpinning']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_underpinning" value="K" {{$data['Temporary_underpinning']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Temporary_underpinning" value="E" {{$data['Temporary_underpinning']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <tr>
                                    <td>Façade system</td>
                                    <td><input  type="radio" name="Façade_system" value="N" {{$data['Façade_system']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Façade_system" value="A" {{$data['Façade_system']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Façade_system" value="K" {{$data['Façade_system']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Façade_system" value="E" {{$data['Façade_system']=="E" ? 'checked':''}}></td>
                                    
                                </tr>
                                <!--  -->
                                @php
                                $data=$competence->Permanent_works;
                                @endphp
                                <tr>
                                    <td rowspan="2">Permanent works</td>
                                    <td>Partial permanent support conditions</td>
                                    <td><input  type="radio" name="Partial_permanent_support_conditions" value="N" {{$data['Partial_permanent_support_conditions']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Partial_permanent_support_conditions" value="A" {{$data['Partial_permanent_support_conditions']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Partial_permanent_support_conditions" value="K" {{$data['Partial_permanent_support_conditions']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Partial_permanent_support_conditions" value="E" {{$data['Partial_permanent_support_conditions']=="E" ? 'checked':''}}></td>
                                   
                                </tr>
                                <tr>
                                    <td>Demolitions</td>
                                    <td><input  type="radio" name="Demolitions" value="N" {{$data['Demolitions']=="N" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Demolitions" value="A" {{$data['Demolitions']=="A" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Demolitions" value="K" {{$data['Demolitions']=="K" ? 'checked':''}}></td>
                                    <td><input  type="radio" name="Demolitions" value="E" {{$data['Demolitions']=="E" ? 'checked':''}}></td>
                                    
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
                                            <td><input type="text" name="print_name" value="{{$nomination->print_name}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end w-50">Job title</td>
                                            <td><input type="text" name="job_title" value="{{$nomination->job_title}}"></td>
                                        </tr>
                                        <tr>

                                            
                                            <td class="text-end w-50">
                                                <!--begin::Label-->
                                                <label >
                                                    <span>Signature:</span>
                                                </label>
                                            </td>
                                            <td>
                                                 <div class="d-flex inputDiv" id="sign" style="align-items: center;">
                                                 <canvas id="sig" style="background: lightgray"></canvas>
                                                  <br/>
                                                  <textarea id="signature" name="signed" style="display: none" required></textarea>
                                                  <span id="clear" class="fa fa-undo cursor-pointer" style="line-height: 6"></span>
                                                 </div>
                                                  <span id="sigimage" class="text-danger">Signature Not Added<span>

                                                  <div class="inputDiv d-none" id="pdfsign">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Upload Signature:</span>
                                                    </label>
                                                    <input type="file" name="pdfphoto" class="form-control" accept="image/*">
                                                 </div>
                                                
                                                 <div class="d-flex inputDiv" id="namesign" style="display: none !important">
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
                           <button type="submit" class="btn btn-primary">update</button>
                    </div>
                    
                    <!--end::Card body-->
                </form>
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
        addNewRow('.table3 tbody', `<tr><td class="tdhight"><input type="text" name="qualification[]"></td><td class="tdhight"><input type="date" name="qualification_date[]"></td> <td class="tdhight" style="width:22%"><input type="file" name="qualification_file[]"></td> </tr>`)
    });

    $('#table4Btn').click(function(e) {
        e.preventDefault();
        addNewRow('.table4 tbody', `<tr><td class="tdhight"><input type="text" name="course[]"></td><td class="tdhight"><input type="date" name="course_date[]"></td> <td class="tdhight" style="width:22%"><input type="file" name="course_file[]"></td> </tr>`)
    });

    $('#table5Btn').click(function(e) {
        e.preventDefault();
        addNewRow('.table5 tbody', ` <tr>
                                    <td class="tdhight"><input type="text" name="project_title[]"></td>
                                    <td class="tdhight"><input type="text" name="project_role[]"></td>
                                    <td class="tdhight"><input type="text" name="desc_of_involvement[]"></td>
                                </tr>`)
    });

    function addNewRow(selector, row){
        $(selector).append(row);
    }
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
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").addClass('d-flex').show();
            $(".customSubmitButton").removeClass("hideBtn");
            $(".customSubmitButton").addClass("showBtn");
             $("input[name='pdfsign']").removeAttr('required');
            $("input[name='namesign']").attr('required','required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
            $("#signature").removeAttr('required');

           
        }
        else{
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("#namesign").removeClass('d-flex').hide();
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
            $("div#pdfsign").removeClass('d-none').addClass('d-flex');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("#clear").hide();
            $("#sign").removeClass('d-flex').hide();
             $("#signature").removeAttr('required');
           
        }
        else{
            $("#pdfsign").val(0);
            $("#signtype").val(2);
            $("#sign").addClass('d-flex').show();
            $("div#pdfsign").removeClass('d-flex').addClass('d-none');
            $("#namesign").removeClass('d-flex').hide();
            $("input[name='namesign']").removeAttr('required');
            $("input[name='pdfsign']").removeAttr('required');
            $("#clear").show();
             $("#signature").attr('required','required');
             
        }
    })
</script>
@endsection