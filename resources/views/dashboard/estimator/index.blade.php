@extends('layouts.dashboard.master-index-tempory',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style>
   #kt_content_container .card-header .topRightMenu {
      position: absolute;
      right: 15px;
      top: 15px;
   }

   #kt_aside:hover {
      width: 265px;
   }

   #kt_aside .userIconLink:hover .aside-logo img {
      display: block !important;

   }

   #kt_aside:hover .menu-title {
      opacity: 1 !important;
   }

   #kt_aside:hover .menu-sub-accordion {
      height: auto !important;
   }

   #kt_aside_toggle .rotate-180 {
      transform: rotateZ(180deg);
   }

   .view_column::after {
      color: #000 !important;
   }

   .nav-tabs .nav-link.active {
      border-radius: 8px !important;
   }

   ::-webkit-scrollbar {
      width: 30px;
      height: 30px;
      min-height: 15px;
   }

   .aside-enabled.aside-fixed[data-kt-aside-minimize=on] .wrapper {
      padding-left: 75px !important;
   }

   .menu-title {
      opacity: 0;
   }

   .menu-sub-accordion {
      height: 0px;
   }

   .aside-fixed .aside {
      width: 45px;
   }

   #kt_aside_toggle {
      position: relative;
      right: 15px;
   }

   .menu-icon i {
      font-size: 22px !important;
   }

   #kt_aside:hover #kt_aside_toggle {
      right: 0px;
   }

   .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg {
      padding: 0px 10px;
   }

   .aside-enabled.aside-fixed .wrapper {
      padding-left: 30px;
   }

   .menu-item,
   .menu-sub-accordion.show,
   .show:not(.menu-dropdown)>.menu-sub-accordion {
      display: block !important;
   }

   ::-webkit-scrollbar {
      width: 30px;
      height: 30px;
      min-height: 15px;
   }

   .aside-enabled.aside-fixed.header-fixed .header {
      left: 0px !important;
   }

   .aside-enabled.aside-fixed.header-fixed .header {
      border-bottom: 1px solid #e4e6ef !important;
   }

   .header-fixed.toolbar-fixed .wrapper {
      padding-top: 60pximportant;
   }

   .content {
      padding-top: 0px !important;
      backgroun !d-color: #e9edf1 !important;
   }

   .newDesignBtn {
      border-radius: 8px;
      background-color: #07d564;
      width: 170px;
      padding: 10px 15px;
      color: #000;
      margin: 0px 29px;
      margin-right: 0px;
   }

   .newDesignBtn:hover {
      color: rgba(222, 13, 13, 0.66);
   }

   .nav-tabs .nav-link.active {
      border-radius: 0px !important;
   }

   .card>.card-body {
      padding: 32px;
   }

   table {
      margin-top: 20px;
   }

   #kt_wrapper {
      padding-top: 0px !important;
   }

   .card-header {
      display: block !important;
   }

   .card-header .card-title {
      display: block !important;
      text-align: center;
   }

   #kt_wrapper.activeWrapper {
      padding-left: 256px !important;
   }

   .activeAside {
      width: 265px !important;
   }

   .activeSubMenu {
      height: auto !important;
   }

   .mw-750px {
      max-width: 1050px !important;
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
      margin: 9px 0px;
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
      padding: 5px !important;
   }

   #kt_header {
      display: none;
   }

   table thead {
      background-color: #f5f8fa;
      position: sticky;
      top: 0px;
      z-index: 99;
   }

   table thead th {
      color: #000 !important;
      text-align: center;
      border-bottom: 0px !important;
      vertical-align: middle;
      font-size: 10px !important;
      font-weight: 900 !important;
   }

   tbody tr:nth-child(odd) {
      background-color: #fff;
   }

   tbody tr:nth-child(even) {
      background-color: #f2f2f2;
   }

   .table td {
      font-size: 12px;
      padding: 0px !important;
   }

   .table td p {
      font-size: 12px !important;
      margin: 0px !important;
   }

   .dataTables_length label,
   #DataTables_Table_0_filter label,
   .dataTables_filter label {
      color: #fff;
   }

   .page-item.active .page-link {
      background-color: #000 !important;
   }

   tbody.text-gray-600.fw-bold tr td {
      vertical-align: middle;
   }

   .form-control {
      padding: 5px 10px;
   }

   table {
      margin-top: 20px;
   }

   .profileimg {
      border-radius: 50%;
   }

   .symbol.symbol-md-35px .symbol-label {
      width: 53px;
      height: 42px;
   }

   .symbol.symbol-md-35px .symbol-label:hover {
      background-color: #009ef7 !important;
      color: #fff !important;
   }

   .btn.btn-primary {
      border-color: #07d564 ;
      background-color: #07d564 ;
      border-radius: 8px;
   }

   .form-control,
   .form-control:focus {
      border: 1px solid #b5b5c3;
      border-radius: 8px;
   }

   .table th:first-child {
      padding: .75rem .75rem !important;
   }

   .menu-item {
      display: flex;
   }

   .menu-item .menu-link {
      flex: 0%;
   }

   .menu-sub-accordion.show,
   .show:not(.menu-dropdown)>.menu-sub-accordion {
      display: -webkit-inline-box;
   }

   .topMenu {
      background-color: #fff;
      padding: 30px;
      border: 1px solid #e4e6ef !important
   }

   .topMenu a {
      color: #07d564 !important;
   }

   .sweet-alert {
      z-index: 99999999999 !important;
   }

   .sweet-overlay {
      z-index: 99999999999 !important;
   }

   .btn-success {
      border-radius: 8px;
      background: #9370DB !important;
   }

   @media (max-width: 390px) {
      .formDiv .form {
         display: block !important;
      }

      #search-btn,
      #terms {
         margin-top: 20px !important;
      }

      #view_btn {
         margin-left: auto !important;
         text-align: center;
      }
   }

   @media (max-width: 800px) {
      .action {
         justify-content: center !important;
         max-width: 83px !important;
         margin-left: 26px !important;
      }
   }

   @media (min-width: 801px) {
      .action {
         justify-content: center !important;
         max-width: 85px !important;
         margin-left: 26px !important;
      }
   }

   @media (min-width: 1330px) {
      .action {
         justify-content: center !important;
         max-width: 91px !important;
         margin-left: 26px !important;
      }
   }

   .modal-backdrop {
      visibility: hidden !important;
   }

   .modal.in {
      background-color: rgba(0, 0, 0, 0.5);
   }

   .topMenu,
   #kt_content_container,
   .card>.card-body,
   .card>.card-header {
      padding: 0 1rem !important;
   }

   .table td p {
      position: initial !important;
      top: initial !important
   }

   .active {
      /* background: #3699FF !important; */
      background: white !important;
      /* color: white !important; */
      color:black;
   }

   .rowcolor {
      background: #D5D8DC !important;
   }

   .titleColumn {
      color: #9D9D9D;
      font-weight: 500;
      font-size: 13px;
      margin-left: 21px;
      font-family: 'Inter', sans-serif;
      white-space: nowrap;
   }
   .bg{
      width:100%;
      /* background-color:orange !important; */
   }

   @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }

    /* Apply the animation to the Font Awesome icon */
    .blinking-icon, .redBgBlink {
      animation: blink 1s infinite;
      color: red;
      background-color:red !important;
    }

    /* .redBgBlink{color: #fff !important;background-color:red !important;} */
</style>
@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid temporary_blade" id="kt_content">
   <div class="topMenu" style="padding-top:0px;">
      <div class="post d-flex flex-column-fluid" id="kt_post">
         <!--begin::Container-->
         <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
               <!--begin::Card header-->
               <div class="card-header border-0">
                  <div class="card-title">
                     <h3 class="card-label pt-5" style="font-size:1.6rem;">Design Brief for Estimations
                        <span class="d-block text-muted pt-25 font-size-sm"></span>
                     </h3>
                  </div>
                  <!--begin::Topbar-->
                  <div class="d-flex align-items-stretch flex-shrink-0 topRightMenu">
                     <!--begin::Toolbar wrapper-->
                     <div class="topbar d-flex align-items-stretch flex-shrink-0">
                        <!--begin::User-->
                        <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                           <div
                              class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                              data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                              data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                              @isset(auth()->user()->image)
                              <img alt="Logo" src="{{ auth()->user()->image ?: '' }}">
                              @else
                              <div class="symbol-label fs-3 bg-light-primary text-primary">
                                 {{ \Illuminate\Support\Str::upper(auth()->user()->name[0]) ?: '' }}</div>
                              @endisset
                           </div>
                           <!--begin::Menu-->
                           <div
                              class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px"
                              data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                       @isset(auth()->user()->image)
                                       <img alt="Logo" src="{{ auth()->user()->image ?: '' }}">
                                       @else
                                       <div class="symbol-label fs-3 bg-light-primary text-primary">
                                          {{ auth()->user()->name[0] ?: '' }}</div>
                                       @endisset
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                       <div class="fw-bolder d-flex align-items-center fs-5">{{
                                          auth()->user()->name ?: '' }}
                                       </div>
                                       <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{
                                          auth()->user()->email }}</a>
                                    </div>
                                    <!--end::Username-->
                                 </div>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu separator-->
                              <div class="separator my-2"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                                 <a href="{{ route('users.edit',auth()->id()) }}" class="menu-link px-5">Account
                                    Settings</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                                 <a class="menu-link px-5" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                           <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                              <i class="bi bi-text-left fs-1"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body indexTempory pt-0">
                  <div class="mb-2">
                     <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                           <div class="row">
                              <div class="col-md-4 my-2 my-md-0">
                                 <form class="form-inline d-flex" method="get"
                                    action="{{route('estimator.proj.search')}}">
                                    <div class="col-10">
                                       <select name="projects[]" class="form-select form-select-lg" multiple="multiple"
                                          data-control="select2" data-placeholder="Select a Project" required>
                                          @foreach($projects as $proj)
                                          <option value="{{$proj->id}}">{{$proj->name}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <div class="col-2 ">
                                       <button type="submit" class="btn btn-light-primary mb-2 w-100"
                                          style="border-radius: 0px;padding: 6px 10px; margin-left:10px;    margin-bottom: 0px !important;width: auto !important;    "><span
                                             class="fa fa-filter"></span></button>
                                    </div>
                                 </form>
                              </div>
                              <div class="col-md-4 my-2 my-md-0">
                                 <form class="form-inline d-flex" method="get" action="{{route('estimator.search')}}">
                                    <div class="col-10">
                                       <input type="text" style="border-radius:0px;border-color:#e2e2e2;"
                                          class="form-control" placeholder="Search by description..." id="terms"
                                          name="terms">
                                       <span>
                                          <i class="flaticon2-search-1 text-muted"></i>
                                       </span>
                                    </div>
                                    <div class="col-md-2 text-right" id="search-btn">
                                       <button type="submit" class="btn btn-light-primary px-6 font-weight-bold"
                                          style="    padding: 6px 10px !important;margin:0px 0px 0px 7px;"><span
                                             class="fa fa-search"></span></button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="col my-2 my-md-0 positionChange">
                           <!--end::Dropdown-->
                           <!--begin::Button-->
                           <a href="{{ route('estimator.create') }}"
                              class="btn pull-right btn-primary font-weight-bolder"
                              style="color:white !important;border-radius:0px;">
                              <span class="fa fa-plus"></span> Estimate Design Brief</a>
                           <!--end::Button-->
                        </div>
                     </div>
                  </div>
                  <!--begin::Table-->
                  <div class="row " style="padding:10px;position:relative;">
                     <div class="col-md-4 my-2 my-md-0 ">
                     </div>
                     <div class="col-md-3 my-2 my-md-0 ">
                     </div>
                     <div class="col-md-2">
                     </div>

                  </div>
                  <div class="row">
                     <div style="float:left;width:100%;position:relative;top:-5px;">
                        <div class="table-responsive tableDiv tab-content" id="nav-tabContent" style="height: 1000px;">
                           <!-- aLL TAB -->
                           <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                              aria-labelledby="nav-home-tab">
                              <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive " style="margin-top:250px !important"
                                 id="kt_table_users" >
                                 <!--begin::Table head-->
                                 {{-- <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" >
                                       <th>Serial No</th>
                                       <th style="min-width: 80px; padding: 0px;" class="">Project Name
                                       </th>
                                       <th class="" style="max-width:150px;">DESCRIPTION OF TW</th>
                                       <th style="padding: 0px !important;vertical-align: middle;max-width: 75px;min-width:30px"
                                          class="">CAT Check</th>
                                       <th style="min-width: 40px;" class="">Risk Class</th>
                                       <th class="" style="min-width:60px;">Issue Date</th>
                                       <th class="" style="">DESIGN REQUIRED BY</th>
                                       <th class="">Comments</th>
                                       <th class="">TW DESIGNER & COMPANY</th>
                                       <th class="" style="padding: 12px;">Date<br> Design<br> Returned
                                       </th>
                                       <th class="" style=" padding: 30px !important;">Date<br> DCC
                                          <br>Returned
                                       </th>
                                       <th class="">DRAWINGS & DESIGNS</th>
                                       <th class="">Design<br> Check<br> CERT</th>
                                       <th class="">Status</th>
                                       <th class="">Actions</th>
                                       <th class=""></th>
                                    </tr>
                                    <!--end::Table row-->
                                 </thead> --}}
                                 <!--end::Table head-->
                                 <!--begin::Table body-->
                                 <!-- gap  -->
                                 <tbody class="text-gray-600 fw-bold d-flex flex-column gap-3" >
                                    @forelse($estimator_works as $item)
                                    <tr class="p-3 bg" style="height: {{count($estimator_works)==1 ? '155px':''}} ">
                                       {{-- <td
                                          style="padding: 0px !important;vertical-align: middle;min-width: 90px;font-size: 12px;">
                                          {{$item->estimator_serial_no}}
                                       </td> --}}
                                       {{-- <td>{{ $item->project->name ?? '' }}</td> --}}
                                       {{-- <td
                                          style="min-width:150px;padding-left: 10px !important;padding-right: 10px !important;">
                                          <p style="font-weight:400;font-size:14px;">
                                             {{$item->design_requirement_text ?? ''}}</p> --}}
                                          {{--
                                          <hr style="margin: 5px;;color:red;border:1px solid red">
                                          <span class="desc cursor-pointer" style="width: 108px;padding: 2px;"
                                             data-toggle="tooltip" data-placement="top"
                                             title="{{ $item->description_temporary_work_required ?: '-' }}"><span
                                                class="label label-lg font-weight-bold label-light-success label-inline">Description</span>
                                          </span> --}}
                                          {{--
                                       </td> --}}
                                       <td style="width:12%">
                                          <div class="">
                                             {{-- <span class="col-5 titleColumn text-start">Serial
                                                No.</span> --}}
                                             {{$item->estimator_serial_no}}
                                          </div>
                                          <div style="font-weight: bold">
                                             {{-- <span class="col-5 titleColumn text-start">Project
                                                Name</span> --}}
                                             {{ $item->project->name ?? '' }}
                                          </div>
                                       </td>
                                       <td style="width:12% ">
                                          <div class="d-flex">
                                             <p style="font-weight:400;font-size:14px;">
                                                {{$item->design_requirement_text ?? ''}}</p>
                                          </div>
                                       </td>
                                       <td style="width:10%">
                                          <div
                                             style="max-height:100%; display:flex;flex-direction:column;align-items:center;justify-content:space-between;gap:5px;">
                                             <div class="commentSection" style="">
                                                @php
                                                $drawingscount=0;
                                                $color="green";
                                                $class='';
                                                if(count($item->comments)>0)
                                                {
                                                $color="red";
                                                $class='redBgBlink';
                                                if(count($item->reply)== count($item->comments))
                                                {
                                                $color="blue";
                                                $class='';
                                                }
                                                }
                                                @endphp
                                                <p class="addcomment cursor-pointer"
                                                   style="margin-bottom:2px;font-weight: 400;font-size: 11px !important; display: inline-block; background: #3A7DFF26; border-radius: 7px; padding: 4px 10px; color: #3A7DFF; padding: 4px 10px !important;word-break: keep-all;width:112px;text-align:center;"
                                                   data-id="{{$item->id}}">
                                                   <!-- <span class="fa fa-plus"></span> -->
                                                   Comment
                                                   <span class="addcomment cursor-pointer"
                                                      style="border-radius:5px;width: 108px;color:{{$color}} !important;"
                                                      data-id="{{$item->id}}">
                                                      <span class="{{$class}} ">
                                                         ({{count($item->comments) ?? '-'}})
                                                      </span>
                                                   </span>
                                                </p>
                                             </div>
                                             <span class="desc cursor-pointer" style="width: 112px;padding: 2px;"
                                                data-toggle="tooltip" data-placement="top"
                                                title="{{ $item->description_temporary_work_required ?: '-' }}"><span
                                                   class="label label-lg font-weight-bold label-light-success label-inline"
                                                   style="display: inline-block;width: 100%; text-align: center;background: #FFA50026;color: #FFA500; font-weight: 400">Description</span>
                                             </span>
                                          </div>
                                       </td>

                                       <td style="width:15%;">
                                          <div class="d-flex justify-content-between">
                                             <span class="titleColumn">Issue Date:</span>
                                             <span
                                                style="width: 125px; text-align:end; margin-right: 21px; font-weight: 500; color: black">{{
                                                $item->design_issued_date ? date('d-m-Y',
                                                strtotime($item->design_issued_date)) : '-' }}</span>
                                          </div>
                                          <div class="d-flex justify-content-between my-2">
                                             <span class="titleColumn">Required by:</span>
                                             <span
                                                class="{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[1] ?? ''}} desc cursor-pointer"
                                                style="border-radius:6px;width: 108px;padding: 2px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[0]}};"
                                                data-toggle="tooltip" data-placement="top"
                                                title="{{ $item->description_temporary_work_required ?: '-' }}"><span
                                                   class="label label-lg font-weight-bold  label-inline">
                                                   <b>
                                                      @if($item->design_required_by_date)
                                                      {{date('d-m-Y',
                                                      strtotime($item->design_required_by_date))}}
                                                      @else
                                                      -
                                                      @endif
                                                   </b>
                                                </span>
                                          </div>
                                          <div>
                                             <div class="d-flex justify-content-between">
                                                <span>
                                                   <span class="titleColumn">CAT Check:</span>
                                                   <span style="font-weight: 500; color: black">{{
                                                      $item->tw_category }}</span>
                                                </span>
                                                <span style="">
                                                   <span class="titleColumn">Risk Class:</span>
                                                   <span style="margin-right: 11px; font-weight: 500; color: black">{{
                                                      $item->tw_risk_class ?: '-' }} </span>
                                                </span>
                                             </div>
                                          </div>
                                       </td>
                                       <!-- <td style="width:15%"></td> -->
                                       <td style="width:21%">
                                          <div class="d-flex" style="position: relative;">
                                             <span class="titleColumn">Drawings & Designs:</span>
                                             <div class="d-flex col-sm-6"
                                                                style="column-gap:1rem;margin-left: 31px">
                                                                <div
                                                                    style="background: #07D56426;padding: 4px; border-radius: 4px;width: 20px; height:20px;">
                                                                    <p class="uploaddrawing cursor-pointer"
                                                                        data-id="{{$item->id}}" data-type="1"
                                                                        style="margin-bottom:0px;font-weight: 400;bottom:3px !important; left: 1px">
                                                                        <span style="font-size: 14px; color: #07D564;"
                                                                            class="fa fa-plus"
                                                                            title="Upload Drawings"></span>
                                                                    </p>
                                                                </div>
                                                                @php
                                                                $date='';
                                                                $dcolor='#919191ba';
                                                                $drawingscount=0;
                                                                @endphp
                                                                @foreach($item->uploadfile as $file)
                                                                @php
                                                                if($file->file_type==1 && $file->construction==1)
                                                                {
                                                                $dcolor='green';
                                                                $drawingscount=1;

                                                                }
                                                                elseif($file->file_type==1 &&
                                                                $file->preliminary_approval==1)
                                                                {
                                                                $dcolor='orange';

                                                                }
                                                                @endphp
                                                                @endforeach
                                                                <div
                                                                    style="background: {{$dcolor}};padding: 4px; border-radius: 4px;width: 20px; height:20px;">
                                                                    <p class="uploaddrawinglist cursor-pointer"
                                                                        data-id="{{$item->id}}" data-type="1"
                                                                        style="position: relative!important;margin-bottom:0px;font-weight: 400;bottom:3px !important; ">
                                                                        <span style="font-size: 10px; color: #fff;"
                                                                            class="fa fa-eye"
                                                                            title="Upload Drawings"></span>
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    style="background: #07D56426;padding: 2px 4px; border-radius: 4px; margin-right: 12px;width: 20px; height:20px;">
                                                                    <p class="assessmentlist cursor-pointer"
                                                                        data-id="{{$item->id}}" data-type="1"
                                                                        style="margin-bottom:0px;font-weight: 400;font-size:  13px !important;position: relative;top: 0px;">
                                                                        <!-- View Drawings -->
                                                                        @php
                                                                        $color="";
                                                                        if(count($item->riskassesment)>0)
                                                                        {
                                                                        $color="green";
                                                                        }
                                                                        @endphp
                                                                        <span
                                                                            style="font-size: 13px; color:{{$color}};position: relative; top: 1px; left:1px"
                                                                            class="fa fa-file"
                                                                            title="View Calculation/Risk Assessment"></span>
                                                                    </p>
                                                                </div>

                                                            </div>
                                          </div>
                                          <div class="d-flex mt-2" style="position: relative;top: 0px;">
                                             <span class="titleColumn">Design Check CERT:</span>
                                             <div
                                                style="display: flex;justify-content: flex-start;flex-grow: 1;max-width:80px;margin-left: 18px;">
                                                @php $i=0;@endphp
                                                @foreach($item->uploadfile as $file)
                                                @if($file->file_type==2)
                                                @php $i++ @endphp
                                                <span><a href="{{asset($file->file_name)}}"
                                                      target="_blank">DC{{$i}}</a></span>
                                                @endif
                                                @endforeach
                                             </div>
                                          </div>
                                          <div class="d-flex mt-2" style="visibility:hidden; position: relative;">
                                             <span class="titleColumn"></span>
                                             <div
                                                style="display: flex; justify-content: flex-start; flex-grow: 0.5; max-width:80px; margin-left:20px">
                                               asd

                                             </div>
                                          </div>
                                       </td> 
                                       <td style="width:400px;">
                                        
                                          <div class="d-flex">
                                             <!-- <span class="col-5 titleColumn text-start" style="flex:0 0 0 !important;">Action</span> -->
                                             <!-- action class removed from next line action -->
                                             <div class="d-flex col-6 "
                                                style="display: flex; justify-content: flex-end; gap: 15px; flex-grow: 1; margin-left: 40px !important;">
                                                
                                                <a href="{{route('estimator.edit',$item->id)}}" style="width:170px;">
                                                   <button class="btn btn-primary">Edit Design Brief</button>
                                                   <!-- <i
                                                      class="fa fa-edit" style="margin-left:10px"></i> -->
                                                </a>
                                                <!-- @if(auth()->user()->hasRole('estimator'))
                                                @endif -->
                                                <!-- @if(auth()->user()->hasRole('user'))
                                                @if($item->estimatorApprove)
                                                <a href="{{route('estimator.edit',$item->id)}}"><i
                                                      class="fa fa-edit"></i></a>
                                                @endif
                                                @endif -->
                                                <style>
                                                 .redBgBlink {
                                                   animation: blink 1s infinite;
                                                   color: red;
                                                   background-color:red !important;
                                                 }
                                                </style>
                                                 <a href="{{route('estimator.show',$item->id)}}"
                                                   class="">
                                                   <!-- <i class="fa fa-eye " style="margin-left:15px"></i> -->
                                                   <button class="btn btn-primary @if(!$item->designerQuote->isEmpty() && !$item->estimatorApprove) blinking-icon @endif  {{$item->unreadQuestions->count() > 0 ? 'redBgBlink' : '' }} {{ count($item->checkQuestion) > 0 ? 'redBgBlink' : ''}}">View Quotations</button>
                                                </a>
                                             </div>

                                          </div>

                                       </td>
                                       <td style="width:8%">
                                          <div class="flex">
                                             <span class="col-5 titleColumn" style="padding-left:2px;">Status</span>
                                             <div class="col-6 text-center">
                                                @if($item->estimatorApprove)
                                                <span class="text-success" style="white-space: nowrap; padding-left:50%;">Awarded</span>
                                                @else
                                                <span class="text-danger" style="white-space: nowrap; padding-left:50%;">Not Awarded</span>
                                                @endif
                                             </div>

                                          </div>
                                       </td>
                                       <td style="width:50px;">
                                       <form method="POST" action="{{route('temporary_works.destroy',$item->id)}} "
                                          id="{{'form_' . $item->id}}">
                                          @method('Delete')
                                          @csrf
                                          <button type="submit" id="{{$item->id}}"
                                                class="confirm1 btn p-0 m-1 ">
                                                <i style="padding:3px;"
                                                   class="fa fa-trash-alt"></i>
                                          </button>
                                       </form>
                                       </td>
                                       {{-- <td style="">{{ $item->tw_category }}</td> --}}
                                       {{-- <td style="">{{ $item->tw_risk_class ?: '-' }}</td> --}}
                                       {{-- <td style="min-width: 100px; max-width: 80px;">{{
                                          $item->design_issued_date ? date('d-m-Y',
                                          strtotime($item->design_issued_date)) : '-' }}</td> --}}
                                       {{-- <td style="min-width:100px;">
                                          <span
                                             class="{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[1] ?? ''}} desc cursor-pointer"
                                             style="border-radius:6px;width: 108px;padding: 2px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[0]}};"
                                             data-toggle="tooltip" data-placement="top"
                                             title="{{ $item->description_temporary_work_required ?: '-' }}"><span
                                                class="label label-lg font-weight-bold  label-inline">
                                                <b>
                                                   @if($item->design_required_by_date)
                                                   {{date('d-m-Y',
                                                   strtotime($item->design_required_by_date))}}
                                                   @else
                                                   -
                                                   @endif
                                                </b>
                                             </span>
                                       </td> --}}
                                       {{-- <td>
                                          <p class="addcomment cursor-pointer"
                                             style="margin-bottom:2px;font-weight: 400;font-size: 12px;"
                                             data-id="{{$item->id}}">
                                             <!-- <span class="fa fa-plus"></span> -->
                                             <br> Comment
                                          </p>
                                          @php
                                          $drawingscount=0;
                                          $color="green";
                                          $class='';
                                          if(count($item->comments)>0)
                                          {
                                          $color="red";
                                          $class='redBgBlink';
                                          if(count($item->reply)== count($item->comments))
                                          {
                                          $color="blue";
                                          $class='';
                                          }
                                          }
                                          @endphp
                                          <span class="addcomment cursor-pointer"
                                             style="border-radius:5px;width: 108px;background:{{$color}} !important;color: white !important;"
                                             data-id="{{$item->id}}">
                                             <span class="{{$class}} label label-lg font-weight-bold label-inline">
                                                {{count($item->comments) ?? '-'}}
                                             </span>
                                          </span>
                                       </td> --}}
                                       {{-- <td style="">
                                          <span class="designer-company cursor-pointer" style="width: 108px;"
                                             data-desing="{{$item->designer_company_name.'-'.$item->desinger_company_name2 ?? ''}}"
                                             data-tw="{{$item->tw_name ?? ''}}"><span
                                                class="label label-lg font-weight-bold label-light-success label-inline">View</span>
                                          </span>

                                       </td> --}}

                                       {{-- <td style="">
                                          @php
                                          $date='';
                                          $dcolor='';
                                          $drawingscount=0;
                                          @endphp
                                          @foreach($item->uploadfile as $file)
                                          @php
                                          if($file->file_type==1 && $file->construction==1)
                                          {
                                          $dcolor='green';
                                          $drawingscount=1;
                                          $date=$file->created_at->todatestring();
                                          }
                                          elseif($file->file_type==1 && $file->preliminary_approval==1)
                                          {
                                          $dcolor='orange';
                                          $date=$file->created_at->todatestring();
                                          }
                                          @endphp
                                          @endforeach
                                          @if($date)

                                          <p class="dateclick cursor-pointer"
                                             style="color:{{$dcolor ?? ''}};background: #f2f2f2;"
                                             data-id="{{$item->id}}" data-type="1"> {{date('d-m-Y',
                                             strtotime($date))}}
                                          </p>
                                          @endif
                                       </td> --}}
                                       <!--  <td></td> -->
                                       {{-- <td style="">
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">
                                             {{date('d-m-Y',
                                             strtotime($file->created_at->todatestring()))}}</p>
                                          @break
                                          @endif
                                          @endforeach
                                       </td> --}}
                                       {{-- <td>
                                          <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}"
                                             data-type="1"
                                             style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             <span style="font-size: 18px;color:{{$dcolor}}" class="fa fa-eye"
                                                title="View Drawings"></span>
                                          </p>
                                          <p class="assessmentlist cursor-pointer" data-id="{{$item->id}}" data-type="1"
                                             style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             @php
                                             $color="";
                                             if(count($item->riskassesment)>0)
                                             {
                                             $color="green";
                                             }
                                             @endphp
                                             <span style="font-size: 18px; color:{{$color}}" class="fa fa-file"
                                                title="View Calculation/Risk Assessment"></span>
                                          </p>
                                       </td> --}}
                                       {{-- <td>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}"
                                                target="_blank">DC{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td> --}}
                                       {{-- <td>
                                          @if($item->estimatorApprove)
                                          <span class="text-success">Awarded</span>
                                          @else
                                          <span class="text-danger">Not Awarded</span>
                                          @endif
                                       </td> --}}
                                       {{-- <td>
                                          @if(auth()->user()->hasRole('estimator'))
                                          <a href="{{route('estimator.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                          @endif
                                          @if(auth()->user()->hasRole('user'))
                                          @if($item->estimatorApprove)
                                          <a href="{{route('estimator.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                          @endif
                                          @endif
                                          <a href="{{route('estimator.show',$item->id)}}"
                                             class="{{count($item->checkQuestion) > 0 ? 'redBgBlink':''}}">
                                             <i class="fa fa-eye"></i>
                                          </a>
                                       </td> --}}
                                       
                                    </tr>
                                   
                                       
                                    
                                    @empty
                                    @endforelse
                                    
                                 </tbody>
                                 <!--end::Table body-->
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <div class="col-md-6 d-flex" style="margin-bottom:10px">
               </div>
               <!--end::Table-->
            </div>
            <!--end::Card body-->
         </div>
         <!--end::Card-->
      </div>
      <!--end::Container-->
   </div>
   <!--end::Post-->
</div>
@include('dashboard.modals.comments')
@include('dashboard.modals.drawingdesignlist')
@include('dashboard.modals.risk_assessment')
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')

<script type="text/javascript">
   var role = "{{ \Auth::user()->roles->pluck('name')[0] }}";
     $(".addcomment").on('click', function() {
        if (role != 'user') {
           alert("Twc can view and add comment");
           return false;
       }
       $("#temp_work_id").val($(this).attr('data-id'));
       var temporary_work_id = $(this).attr('data-id');
       var userid = {{Auth::user()->id}}
       $("#commenttable").html('');
       $.ajax({
           url: "{{route('temporarywork.get-comments')}}",
           method: "get",
           data: {
               id: userid,
               temporary_work_id: temporary_work_id,
               type: 'normal'
           },
           success: function(res) {
               res=JSON.parse(res);
               $("#commenttable").html(res.comment);
               $("#twccommenttable").html(res.twccomment);
               $(".comments_form").show();
               $("#comment_modal_id").modal('show');
           }
       });
   
   });

   //upload drawing and design
   $(".uploaddrawinglist").on('click', function() {
       var tempworkid = $(this).attr('data-id');
   
       $.ajax({
           url: "{{route('get-designs')}}",
           method: "get",
           data: {
               tempworkid: tempworkid
           },
           success: function(res) {
               $("#drawingdesigntable").html(res);
               $("#drawinganddesignlist").modal('show');
           }
       });
   
   })

   $(document).on('click','.assessmentlist',function(){
       id=$(this).attr('data-id');
        $.ajax({
           url: "{{route('get.assessment')}}",
           method: "get",
           data: {
               id
           },
           success: function(res) {
               $("#risk_assessment_body").html(res);
               $("#risk_assessment_modal_id").modal('show'); 
           }
       });
   })
</script>
@endsection