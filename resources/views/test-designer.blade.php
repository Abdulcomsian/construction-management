@extends('layouts.dashboard.master-index-tempory',['title' => 'View Estimator'])
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
      border-color: #07d564 !important;
      background-color: #07d564 !important;
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
      background: #3699FF !important;
      color: white !important;
   }

   .rowcolor {
      background: #D5D8DC !important;
   }

   .tab-content>.active {
      background: none !important;
   }

   .modal-content {
      position: relative;
   }

   .modal-close {
      cursor: pointer;
      font-size: 27px;
      display: inline-block;
      position: absolute;
      top: 5px;
      right: 20px;
   }

   .inputDiv {
      margin: 30px 0px;
      border: 1px solid #D2D5DA;
      border-radius: 8px;
      position: relative;
      padding: 8px 5px;
   }

   .inputDiv label {
      /* width: 40%; */
      color: #000;
      position: absolute;
      bottom: 21px;
      background: white;
      font-family: 'Inter', sans-serif;
   }
</style>
@include('layouts.sweetalert.sweetalert_css')
@include('dashboard.modals.comments')
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
                     <h3 class="card-label pt-5" style="font-size:1.6rem;">List of Estimator Briefs
                        <span class="d-block text-muted pt-25 font-size-sm"></span>
                     </h3>
                  </div>
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
                                       <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name ?:
                                          '' }}
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
                  <!--begin::Topbar-->
               </div>
               {{-- new code starts here --}}
               <div class="card-body indexTempory pt-0">

                  <div class="my-4" style="background: white;padding: 10px 22px;">
                     <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                           <div class="row align-items-center">
                              <div class="col-md-4 my-2 my-md-0">
                                 <form class="form-inline d-flex" method="get"
                                    action="{{route('tempwork.proj.search')}}">
                                    <div class="col-10">
                                       <select name="projects[]" class="form-select form-select-lg" multiple="multiple"
                                          data-control="select2" data-placeholder="Select a Project" required>

                                          @foreach($projects as $project)
                                          <option value="{{$project->id}}">{{$project->name}}</option>
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
                                 <form class="form-inline d-flex" method="get" action="{{route('tempwork.search')}}">
                                    <div class="col-10">
                                       <input type="text" style="border-radius:0px;border-color:#e2e2e2;"
                                          class="form-control" placeholder="Search..." id="terms" name="terms">
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
                        <div class="col-md-2 my-2  my-md-0">
                           <!--begin::Dropdown-->
                           <div class="dropdown pull-right dropdown-inline mr-2 mt-0">
                              <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                       width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <rect x="0" y="0" width="24" height="24"></rect>
                                          <path
                                             d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                             fill="#000000" opacity="0.3"></path>
                                          <path
                                             d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                             fill="#000000"></path>
                                       </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                 </span>
                                 Status
                              </button>
                              <!--begin::Dropdown Menu-->
                              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-23px, -257px, 0px);"
                                 x-placement="top-end">
                                 <!--begin::Navigation-->
                                 <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-item">
                                       <a href="{{url('/temporary_works?status=all')}}" class="navi-link ">

                                          <span class="navi-text">All</span>
                                       </a>
                                    </li>
                                    <li class="navi-item">
                                       <a href="{{url('/temporary_works?status=pending')}}" class="navi-link ">

                                          <span class="navi-text">Pending</span>
                                       </a>
                                    </li>
                                    <li class="navi-item">
                                       <a href="{{url('/temporary_works?status=completed')}}" class="navi-link">

                                          <span class="navi-text">Completed</span>
                                       </a>
                                    </li>

                                 </ul>
                              </div>
                              <!--end::Dropdown Menu-->
                           </div>
                        </div>

                        <div class="col-md-2 my-2  my-md-0 float-right">
                           <!--begin::Dropdown-->
                           <div class="dropdown pull-right dropdown-inline mr-2 mt-0">
                              <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                       width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <rect x="0" y="0" width="24" height="24"></rect>
                                          <path
                                             d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                             fill="#000000" opacity="0.3"></path>
                                          <path
                                             d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                             fill="#000000"></path>
                                       </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                 </span>
                                 View Document
                              </button>
                              <!--begin::Dropdown Menu-->
                              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-23px, -257px, 0px);"
                                 x-placement="top-end">
                                 <!--begin::Navigation-->
                                 <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-item">
                                       <a href="#" class="navi-link adddocument">
                                          <span class="navi-icon">
                                             <i class="la la-print"></i>
                                          </span>
                                          <span class="navi-text">Add Document</span>
                                       </a>
                                    </li>
                                    <li class="navi-item">
                                       <a href="#" class="navi-link viewdocument" data-type="document">
                                          <span class="navi-icon">
                                             <i class="la la-copy"></i>
                                          </span>
                                          <span class="navi-text">View Document</span>
                                       </a>
                                    </li>
                                    <li class="navi-item">
                                       <a href="{{ route('Designbrief.export') }}" class="navi-link">
                                          <span class="navi-icon">
                                             <i class="la la-file-excel-o"></i>
                                          </span>
                                          <span class="navi-text">Export</span>
                                       </a>
                                    </li>
                                    <li class="navi-item">
                                       <a href="#" class="navi-link viewdocument" data-type="nominations">
                                          <span class="navi-icon">
                                             <i class="la la-file-excel-o"></i>
                                          </span>
                                          <span class="navi-text">View Nominations</span>
                                       </a>
                                    </li>
                                    <li class="navi-item">
                                       <a href="#" class="navi-link viewdocument" data-type="appointments">
                                          <span class="navi-icon">
                                             <i class="la la-file-excel-o"></i>
                                          </span>
                                          <span class="navi-text">View Appointments</span>
                                       </a>
                                    </li>
                                    @if(auth()->user()->hasRole('company'))
                                    <li class="navi-item">
                                       <a href="{{asset(auth()->user()->company_policy)}}" class="navi-link"
                                          target="_blank">
                                          <span class="navi-icon">
                                             <i class="la la-file-excel-o"></i>
                                          </span>
                                          <span class="navi-text">Company Policy</span>
                                       </a>
                                    </li>
                                    @endif
                                 </ul>
                              </div>
                              <!--end::Dropdown Menu-->
                           </div>
                        </div>
                        <div class="col-md-2 my-2 my-md-0 positionChange">
                           <!--end::Dropdown-->
                           <!--begin::Button-->
                           <a href="{{ route('temporary_works.create') }}"
                              class="btn pull-right btn-primary font-weight-bolder"
                              style="color:white !important;border-radius:0px;">
                              <span class="fa fa-plus"></span> Design Brief</a>
                           <!--end::Button-->
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
            <div class="row " style="padding:10px;position:relative;">
               <div class="col-md-4 my-2 my-md-0 ">
                  <nav class="tabnave" style="width: 100%;float:left">
                     <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <span class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">All</span>
                        <span class="nav-item nav-link " id="nav-basic-tab" data-toggle="tab" href="#nav-basic"
                           role="tab" aria-controls="nav-basic" aria-selected="true">Basic</span>
                        <span class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                           role="tab" aria-controls="nav-profile" aria-selected="false">Advance</span>
                        <span class="nav-item nav-link" id="nav-priority-tab" data-toggle="tab" href="#nav-priority"
                           role="tab" aria-controls="nav-profile" aria-selected="false">Priority</span>
                     </div>
                  </nav>
               </div>
               <div class="col-md-2 my-2 my-md-0 text-center">
                  <div class="tableInputDiv">
                     <div class="dropdown mt-0">
                        <!-- <button onclick="myFunction()"  class="dropbtn btn btn-primary">view</button> -->
                        <button type="button" onclick="myFunction()"
                           style="border-bottom: 1px solid #eff2f5 !important;border-radius: 0;background:#fff !important;color:#3699FF !important; padding-bottom: 2px;margin-bottom: 5px;"
                           class="view_column  dropbtn btn btn-primary font-weight-bolder dropdown-toggle">
                           <span class="svg-icon svg-icon-md">
                              <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                       d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                       fill="#000000" opacity="0.3"></path>
                                    <path
                                       d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                       fill="#000000"></path>
                                 </g>
                              </svg>
                              <!--end::Svg Icon-->
                           </span>
                           View/Hide Column
                        </button>
                        <div id="myDropdown" class="dropdown-content" style="text-align: left">
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" id="col_1" checked>
                              <span>DESIGN BRIEF</span>
                           </div>
                           @if(\Auth::user()->hasRole('admin'))
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_2">
                              <span>COMPANY</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_3">
                              <span>PROJECT NAME</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_4">
                              <span>DESCRIPTION OF TW</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_5">
                              <span>CAT CHECK</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_6">
                              <span>RISK CLASS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_7">
                              <span>ISSUE DATE</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_8">
                              <span>REQUIRED DATE</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_9">
                              <span>COMMENTS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_10">
                              <span>TW DESIGNER</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_11">
                              <span>DATE DESIGN</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_12">
                              <span>DATE DCC</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_13">
                              <span>DRAWINGS AND DESIGNS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_14">
                              <span>DESIGN CHECK CERT</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_15">
                              <span>PERMIT TO LOAD</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_16">
                              <span>PERMIT TO UNLOAD</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_17">
                              <span>RAMS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_18">
                              <span>QR CODE</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_19">
                              <span>ACTIONS</span>
                           </div>
                           @else
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_2">
                              <span>PROJECT NAME</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_3">
                              <span>DESCRIPTION OF TW</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_4">
                              <span>CAT CHECK</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_5">
                              <span>RISK CLASS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_6">
                              <span>ISSUE DATE</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_7">
                              <span>REQUIRED DATE</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_8">
                              <span>COMMENTS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_9">
                              <span>TW DESIGNER</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_10">
                              <span>DATE DESIGN</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_11">
                              <span>DATE DCC</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_12">
                              <span>DRAWINGS AND DESIGNS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_13">
                              <span>DESIGN CHECK CERT</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_14">
                              <span>PERMIT TO LOAD</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_15">
                              <span>PERMIT TO UNLOAD</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_16">
                              <span>RAMS</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_17">
                              <span>QR CODE</span>
                           </div>
                           <div class="inputSpan">
                              <input type="checkbox" class="hidecol" checked id="col_18">
                              <span>ACTIONS</span>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>

            </div>

         </div>

         <!--end::Card-->
      </div>
      <div class="row">
         <div class="col-12">
            <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
               <!--begin::Table head-->
               <!-- <thead>

                   <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                      <th data-tabbedTable="Personal info" style="padding: 0px !important;vertical-align: middle;;" class="">TW ID</th>
                      @if(\Auth::user()->hasRole('admin'))
                      <th class="">Company</th>
                      @endif
                      <th style="min-width: 80px; padding: 0px;" class="">Project Name</th>
                      <th class="" style="max-width:150px;">DESCRIPTION OF TW</th>
                      <th style="padding: 0px !important;vertical-align: middle;max-width: 75px;min-width:30px" class="">CAT Check</th>
                      <th style="min-width: 40px;" class="">Risk Class</th>
                      <th class="" style="min-width:60px;">Issue Date</th>
                      <th class="" style="">DESIGN REQUIRED BY</th>
                      <th class="">Comments</th>
                      <th class="">TW DESIGNER & COMPANY</th>
                      <th class="" style="padding: 12px;">Date<br> Design<br> Returned</th>
                      <th class="" style=" padding: 30px !important;">Date<br> DCC <br>Returned</th>
                      <th class="">DRAWINGS & DESIGNS</th>
                      <th class="">Design<br> Check<br> CERT</th>
                      <th class="">Permit to Load</th>
                      <th class="">Permit to Unload</th>
                      <th class="">RAMS</th>
                      <th class="">QR CODE</th>
                      <th>Actions</th>
                   </tr>

                </thead> -->
               <!--end::Table head-->
               <!--begin::Table body-->
               <tbody class="text-gray-600 fw-bold">

                  @forelse($AwardedEstimators as $item)

                  <tr class="{{$item->status==3 ? 'rowcolor ':''}}"
                     style="height: {{count($AwardedEstimators)==1 ? '100px':''}}">
                     <td
                        style="padding: 0px !important;vertical-align: middle;min-width: 90px;font-size: 12px; display: flex; flex-direction: column; justify-content: space-between; align-items: center;">
                        @if(\Auth::user()->hasRole([['company','admin','user']]))
                        @if($item->status==3)
                        <input type="checkbox" class="temp_design_complete" value="{{Crypt::encrypt($item->id)}}"
                           checked>
                        @else
                        <input type="checkbox" class="temp_design_complete" value="{{Crypt::encrypt($item->id)}}">

                        @endif
                        @endif
                        <span class="fa fa-plus addphoto cursor-pointer" data-id="{{$item->id}}"></span>
                        <!-- <br> -->
                        @if(count($item->rejecteddesign)>0)
                        <span class="rejecteddesign cursor-pointer" style="width: 108px;"
                           data-id="{{Crypt::encrypt($item->id)}}"><span
                              class="label label-lg font-weight-bold label-light-success label-inline"><i
                                 class="fa fa-eye text-white"></i></span>
                        </span>
                        <!-- <br>
                         <br> -->
                        @endif
                        <a style="color:{{$item->status==0 || $item->status==2 ? 'red !important':'';}}" target="_blank"
                           href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}
                        </a>
                        <!-- <br> -->
                        @if($item->status==2)
                        <a href="{{route('temporary_works.edit',$item->id)}}">
                           <span class="rejecteddesign cursor-pointer" style="width: 108px;"
                              data-id="{{Crypt::encrypt($item->id)}}">
                              <span
                                 class="redBgBlink label label-lg font-weight-bold label-light-danger label-inline"><i
                                    class="fa fa-edit text-white"></i>
                              </span>
                           </span>
                        </a>
                        @endif
                     </td>
                     @if(\Auth::user()->hasRole('admin'))
                     <td>
                        <p>{{ $item->company ?: '-' }}</p>
                     </td>
                     @endif
                     <td>
                        <p
                           style="font-size: 16px !important; font-weight: 600; font-family: 'Poppins'; color: black; margin-bottom: 10px !important">
                           {{ $item->project->name ?? '' }}</p>
                        <p style="font-weight:400;font-size:11px !important; font-family: 'Poppins';">Equipment and
                           Plant:</p>
                        <p style="font-weight:500;font-size:11px !important; font-family: 'Poppins';">
                           {{$item->design_requirement_text ?? ''}}</p>
                        {{-- <p>{{($item->project->company ? $item->project->company->name : '--')}}</p> --}}
                        @if($item->project)
                        <p>{{($item->project->company ? $item->project->company->name : $item->companty)}}</p>
                        @else
                        <p>{{($item->company)}}</p>
                        @endif
                     </td>
                     <td style="min-width: 216px;padding: 11px !important;">
                        <div class="d-flex justify-content-between align-items-center">
                           <span class="titleColumn">
                              Description TWs:
                           </span>
                           <span class="desc cursor-pointer" style="width: 96px;padding: 2px;" data-toggle="tooltip"
                              data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span
                                 class="label label-lg font-weight-bold label-light-success label-inline"
                                 style="display: inline-block;width: fit-content; text-align: center;background: #FFA50026;color: #FFA500; font-weight: 400">Description</span>
                           </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center" style="margin: 11px 0;">
                           <span class="titleColumn">Issue Date:</span>
                           <span style="width: 96px; text-align:center">{{ $item->design_issued_date ? date('d-m-Y',
                              strtotime($item->design_issued_date)) : '-' }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                           <span class="titleColumn">Required by:</span>
                           <span
                              class="{{$item->design_required_by_date ? date('d-m-Y', strtotime($item->design_required_by_date)) : '-' }} desc cursor-pointer"
                              style="border-radius:6px;padding: 2px;width: fit-content;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[0]}}; text-align: center"
                              data-toggle="tooltip" data-placement="top"
                              title="{{ $item->description_temporary_work_required ?: '-' }}"><span
                                 class="label label-lg font-weight-light  label-inline"><b>{{isset($item->design_required_by_date)
                                    && !empty($item->design_required_by_date) ? date('d-m-Y',
                                    strtotime($item->design_required_by_date)) : '-' }}</b></span>
                        </div>


                     </td>
                     <td style="min-width: 220px; max-width: 80px; padding: 15px !important">
                        <div>
                           <div class="d-flex justify-content-between">
                              <span>
                                 <span class=" titleColumn">CAT Check:</span>
                                 <span>{{ $item->tw_category }}</span>
                              </span>
                              <span>
                                 <span class="titleColumn">Risk Class:</span>
                                 <span>{{ $item->tw_risk_class ?? '-' }}</span>
                              </span>

                           </div>
                        </div>
                        <div style="margin: 12px 0;">
                           <div class="d-flex justify-content-between"">
                                  <span class=" titleColumn">Cost:</span>
                                 @if($item->designer)
                                    <span>{{$item->designer->quotationSum ? $item->designer->quotationSum->sum('price') :
                                       '0'}}</span>
                                 @endif
                           </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                           <div>Comment</div>
                           <div class="commentSection"
                              style="background: #3A7DFF26; border-radius: 7px; padding: 4px 10px; color: #3A7DFF; padding: 4px 10px !important;">
                              <p class="addcomment cursor-pointer"
                                 style="margin-bottom:2px;font-weight: 400;font-size: 12px; display: inline-block; margin-right: 4px !important;"
                                 data-id="{{$item->id}}">
                                 <!-- <span class="fa fa-plus"></span> -->
                                 Comment
                              </p>
                              @php
                              $drawingscount=0;
                              $color="green";
                              $class='';
                              if(count($item->commentlist)>0)
                              {
                              $color="red";
                              $class='redBgBlink';
                              if(count($item->reply)== count($item->commentlist))
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
                                    {{count($item->commentlist) ?? '-'}}
                                 </span>
                              </span>
                           </div>
                        </div>

                     </td>
                     {{-- <td style="min-width: 254px; max-width: 80px;">
                        <div class="d-flex justify-content-between">
                           <span class="titleColumn">Drawings & Designs:</span>
                           <div style="display: flex; justify-content:space-between; flex-grow: 0.5">
                              <div style="background: #07D56426;padding: 4px; border-radius: 4px">
                                 <p class="uploaddrawing cursor-pointer" data-id="{{$item->id}}" data-type="1"
                                    style="margin-bottom:0px;font-weight: 400;position: relative;top: 4px;">
                                    <span style="font-size: 12px; color: #07D564;" class="fa fa-plus"
                                       title="Upload Drawings"></span>
                                 </p>
                              </div>
                              <div style="background: #07D56426;padding: 4px; border-radius: 4px">
                                 <p class="uploaddrawing cursor-pointer" data-id="{{$item->id}}" data-type="1"
                                    style="margin-bottom:0px;font-weight: 400;position: relative;top: 4px;">
                                    <span style="font-size: 12px; color: #07D564;" class="fa fa-plus"
                                       title="Upload Drawings"></span>
                                 </p>
                              </div>
                              <div style="background: #07D56426;padding: 4px; border-radius: 4px">
                                 <p class="assessmentlist cursor-pointer" data-id="{{$item->id}}" data-type="1"
                                    style="margin-bottom:0px;font-weight: 400;font-size:  13px !important;position: relative;top: 0px;">
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
                              </div>

                           </div>
                        </div>
                        <div class="d-flex justify-content-between my-3">
                           <span class="titleColumn">Permit to load:</span>
                           <div style="display: flex; justify-content: flex-start; flex-grow: 0.5; max-width:80px">
                              <div style="background: #07D56426;padding: 4px; border-radius: 4px">
                                 <p class="cursor-pointer permit-to-load-btn"
                                    style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;"
                                    data-id="eyJpdiI6ImcrMzZ1L2tFOGE4L3QzbUUvZGJPcFE9PSIsInZhbHVlIjoiS0s2TkIyOVRBY3BDbno0Vkg1VmFxQT09IiwibWFjIjoiODAwODk4OWU2MjJkZTJjZmMxYmUyMTI3NGNhNDQ0ZTM1OGNhYjg4YmFjNTU1M2RkMzIwYzY1NGExZGVjMmFmMyIsInRhZyI6IiJ9"
                                    data-desc="Site Establishment - Temporary Office / Cabins foundations"><span
                                       style="font-size: 12px; color: #07D564;" class="fa fa-eye"
                                       title="permit to load"></span></p>
                              </div>
                              <div style="background: #3A7DFF;padding: 4px; border-radius: 4px; margin-left:9px">
                                 @if($drawingscount)
                                 <p class="cursor-pointer permit-to-load-btn"
                                    style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;"
                                    data-id="{{Crypt::encrypt($item->id)}}"
                                    data-desc="{{$item->design_requirement_text}}">Permit to<br> load</p>
                                 @endif
                                 @if(count($item->scancomment)>0)
                                 @php
                                 $n=count($item->scancomment);
                                 if($item->scancomment[$n-1]->status==2)
                                 {
                                 $scolor="red";
                                 }elseif($item->scancomment[$n-1]->status==1)
                                 {
                                 $scolor="#FFA500";
                                 }elseif($item->scancomment[$n-1]->status==0)
                                 {
                                 $scolor="green";
                                 }
                                 @endphp
                                 <br>
                                 <button
                                    style="padding: 3px !important;border-radius: 4px;background:{{$scolor}} ; font-size: 12px;"
                                    class="btn btn-info scancomment" data-id="{{$item->id}}"><span
                                       class="fa fa-comments"></span>
                                 </button>
                                 <br>
                                 @endif
                                 @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                 @php
                                 $permitexpire=\App\Models\PermitLoad::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at',
                                 '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                    $scaffoldexpire=\App\Models\Scaffolding::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at',
                                    '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                       $color="orange";
                                       $class='';
                                       if($permitexpire>0 || $scaffoldexpire>0)
                                       {
                                       $color="red";
                                       $class="redBgBlink";
                                       }
                                       @endphp
                                       @if(isset($item->rejectedpermits) && count($item->rejectedpermits)>0)
                                       <br>
                                       <span class="text-danger redBgBlink" style="">DNL</span><br>

                                       @endif
                                       <br>
                                       <span class="permit-to-load-btn cursor-pointer" style="width: 108px"
                                          data-id="{{Crypt::encrypt($item->id)}}"
                                          data-desc="{{$item->design_requirement_text}}">
                                          <span
                                             class="label label-lg font-weight-bold label-light-yellow label-inline {{$class}}"
                                             style=";background-color:{{$color}};color:white">Live({{count($item->permits
                                             ?? 0)+count($item->scaffold ?? 0)}})</span>
                                       </span>

                                       @else
                                       <span style="width: 108px;">
                                          <span class="label label-lg font-weight-bold label-inline"
                                             style="padding: 0.2rem 0.35rem; color: white;">
                                             @if(count($item->unloadpermits)>0 || count($item->closedpermits)>0)
                                             Closed
                                             @else
                                             0
                                             @endif
                                          </span>
                                       </span>
                                       @endif
                              </div>
                           </div>
                        </div>
                        <div>
                           <div class="d-flex" style="justify-content: space-between">
                              <span class="titleColumn">Permit to unload:</span>
                              <div style="display: flex; justify-content: flex-start; flex-grow: 1; max-width:80px">
                                 <div style="background: #07D56426;padding: 4px; border-radius: 4px">
                                    <p class="permit-to-unload cursor-pointer"
                                       style="font-weight: 400;font-size: 14px;position: relative;top: -17px;"
                                       data-id="eyJpdiI6InZDNUFWNUZDVDFVcU5GV1d1SHFDcXc9PSIsInZhbHVlIjoicUlLbDE1UTRpT3R6SWRpcThuUnE1Zz09IiwibWFjIjoiZDM4ZTYwNTg3YjBjNDhmZmIyZmZjYTE5ZGQ4YjFhNTNiOTdhOTZkY2Q3ODIyY2RlM2E4M2VhMWQ3Mjg4MDU3MSIsInRhZyI6IiJ9"
                                       data-desc="Site Establishment - Temporary Office / Cabins foundations"><span
                                          style="font-size: 12px; color: #07D564;" class="fa fa-eye"
                                          title="Upload Drawings"></span></p>
                                 </div>
                              </div>


                           </div>
                        </div>
                     </td> --}}
                     {{-- <td style="min-width: 254px; max-width: 80px;"> --}}
                        {{-- {{$item->designer->quotationSum ? $item->designer->quotationSum->sum('price') : '0'}} --}}
                        {{-- <div class="d-flex justify-content-between">
                           <span class="titleColumn">Design Check CERT:</span>
                           <div style="display: flex; justify-content: flex-start; flex-grow: 1; max-width:80px">
                              @php $dccstyle='';@endphp
                              @foreach($item->uploadfile as $file)
                              @if($file->file_type==2)
                              @php $dccstyle="display:none"; @endphp
                              @endif
                              @endforeach
                              <p class="uploadfile  cursor-pointer" data-id="{{$item->id}}"
                                 style="{{$dccstyle}};margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;"
                                 data-type="2"><span style="font-size: 12px; color: #07D564;" class="fa fa-plus"
                                    title="Upload Drawings"></span></p>
                              @php $i=0;@endphp
                              @foreach($item->uploadfile as $file)
                              @if($file->file_type==2)
                              @php $i++ @endphp
                              <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                              @endif
                              @endforeach
                           </div>
                        </div>
                        <div class="d-flex justify-content-between my-6">
                           <span class="titleColumn">Date DCC Returned:</span>
                           <div style="display: flex; justify-content: flex-start; flex-grow: 0.5; max-width:80px">

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

                              <p class="dateclick cursor-pointer" style="color:{{$dcolor ?? ''}};"
                                 data-id="{{$item->id}}" data-type="1"> {{date('d-m-Y', strtotime($date))}}
                              </p>
                              @endif
                           </div>
                        </div>
                        <div>
                           <div class="d-flex" style="justify-content: space-between">
                              <span class="titleColumn">Date Design Returned:</span>
                              <div style="display: flex; justify-content: flex-start; flex-grow: 1; max-width:80px">
                                 @foreach($item->uploadfile as $file)
                                 @if($file->file_type==2)
                                 <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">
                                    {{date('d-m-Y', strtotime($file->created_at->todatestring()))}}</p>
                                 @break
                                 @endif
                                 @endforeach
                              </div>


                           </div>
                        </div> --}}
                        {{--
                     </td> --}}
                     <td style="min-width: 220px; max-width: 80px;padding: 15px !important;">
                        <div class="d-flex justify-content-between">
                           <span>
                              <span class=" titleColumn" style="font-weight: bold; color: black">Allocated
                                 Designers:</span>
                           </span>
                        </div>
                        <div class="d-flex justify-content-between" style="margin: 12px 0;">
                           <span class=" titleColumn">Designer Name:</span>
                           <span>John Deo</span>
                        </div>
                        <div class="d-flex justify-content-between"">
                           <span class=" titleColumn">Checker Name:</span>
                           <span>John Deo</span>
                        </div>
                     </td>
                     <td style="min-width: 220px; max-width: 80px;padding: 15px !important;">
                        <div class="d-flex justify-content-between">
                           <span class=" titleColumn" style="font-weight: bold; color: black">Design Check
                              Cert:</span>
                        </div>
                        <div class="d-flex justify-content-between" style="margin: 12px 0;">
                           <span class=" titleColumn">Designer Name:</span>
                           <span>John Deo</span>
                        </div>
                        <div class="d-flex justify-content-between">
                           <span class=" titleColumn">Checker Name:</span>
                           <span>John Deo</span>
                        </div>
                     </td>
                     <td style="min-width: 154px; max-width: 80px;padding: 15px !important">
                        <div class="d-flex justify-content-between">
                           <span class=" titleColumn">Drawing:</span>
                           @php $email = $item->designer->email ?? 'user@domain.com' @endphp
                           <a href="{{route('designer.uploaddesign',Crypt::encrypt($item->id).'/?mail='.$email)}}"
                              target="_blank"><i class="fa fa-eye"></i></a>
                        </div>
                        <button class="btn btn-sm w-100 my-1"
                           style="border: 1px solid #02B654; color: #02B654; display:block; padding: 6px; border-radius: 5px">Invoice
                           Sent</button>
                        <button class="btn btn-sm w-100"
                           style="border: 1px solid #FFA500; color: white; background-color:#FFA500;display:block;padding: 6px; border-radius: 5px">Invoice
                           Paid</button>
                     </td>

                  </tr>
                  @empty
                  @endforelse
               </tbody>
               <!--end::Table body-->
            </table>
         </div>
      </div>
      <!--end::Container-->
      {{-- new code ends here --}}
   </div>
   <!--end::Post-->
</div>
<button class="btn btn-primary" data-toggle="modal" data-target="#AssignProjectModal" style="width: fit-content">Launch
   Modal</button>

Field submit

Update Work Progress
Date, hours, task worked on submit

Table:
Date, hours spent, Task, % Completed


<div class="modal  fade" id="AssignProjectModal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <span data-dismiss="modal" class="modal-close">&times;</span>
            <form action="">
               <div class="row">
                  <div class="col-md-9">
                     <div class="d-flex inputDiv d-block mb-3">
                        <!--begin::Label-->
                        <label class=" fs-6 fw-bold mb-2">
                           <span class="required">Total Esimtated Hours required:</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" name="" id="" style="border: none; width: 100%">
                     </div>
                  </div>
                  <div class="col-md-3 mt-9">
                     <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
               </div>
            </form>
            <div class="row">
               <div class="col-md-6">
                  <span class="fw-bold">Date:</span>
                  <span>02/05/2023</span>
               </div>
               <div class="col-md-6">
                  <span class="fw-bold">Hours:</span>
                  <span>140h</span>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <span class="fw-bold">Description</span>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio placeat distinctio repudiandae
                     itaque voluptatem asperiores deserunt nemo eum ea? Doloribus.</p>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Date</th>
                           <th scope="col">Hours spent</th>
                           <th scope="col">Task</th>
                           <th scope="col">Completed(%)</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <th scope="row">1</th>
                           <td>Mark</td>
                           <td>Otto</td>
                           <td>@mdo</td>
                        </tr>
                        <tr>
                           <th scope="row">2</th>
                           <td>Jacob</td>
                           <td>Thornton</td>
                           <td>@fat</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   let role = "{{ \Auth::user()->roles->pluck('name')[0] }}";
   $(".addcomment").on('click', function() {
       if (role == 'supervisor' || role == "scaffolder") {
           alert("You are not allowed to add comment");
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
</script>
@endsection