@extends('layouts.dashboard.master-index-tempory',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style>
    #kt_content_container .card-header .topRightMenu {
        position: absolute;
        right: 15px;
        top: 15px;
    }
    #kt_aside:hover{
       width: 265px;
    }
  
    #kt_aside .userIconLink:hover .aside-logo img{
       display: block !important;
       
    }
    #kt_aside:hover .menu-title{
       opacity: 1 !important;
    }
    #kt_aside:hover .menu-sub-accordion{
       height: auto !important;
    }
    #kt_aside_toggle .rotate-180{
        transform: rotateZ(180deg);
    }
   .view_column::after{color:#000 !important;}
   .nav-tabs .nav-link.active{border-radius:8px !important;}
   ::-webkit-scrollbar {
   width: 30px;
   height: 30px;
   min-height: 15px;
   }
   .aside-enabled.aside-fixed[data-kt-aside-minimize=on] .wrapper{
   padding-left: 75px !important;
   }
   .menu-title{
   opacity: 0;
   }
   .menu-sub-accordion{
   height: 0px;
   }
   .aside-fixed .aside{
   width: 45px;
   }
   #kt_aside_toggle{
      position: relative;
      right: 15px;
   }
   .menu-icon i{
      font-size: 22px !important;
   }
   #kt_aside:hover  #kt_aside_toggle{
      right: 0px;
   }
   .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg{
      padding: 0px 10px;
   }
   .aside-enabled.aside-fixed .wrapper{
   padding-left: 30px;
   }
   .menu-item,
   .menu-sub-accordion.show, .show:not(.menu-dropdown)>.menu-sub-accordion{
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
   .nav-tabs .nav-link.active{
      border-radius: 0px !important;
   }
   .card>.card-body {
   padding: 32px;
   }
   table {
   margin-top: 20px;
   }
   #kt_wrapper{
       padding-top: 0px !important;
   }
   .card-header{
       display: block !important;
   }
   .card-header .card-title{
       display: block !important;
       text-align: center;
   }
   #kt_wrapper.activeWrapper{
   padding-left: 256px !important;
   }
   .activeAside{
   width: 265px !important;
   }
   .activeSubMenu{
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
   #kt_header{
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
   .form-control{
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
.symbol.symbol-md-35px .symbol-label:hover{
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
   .formDiv .form{
   display:block !important;
   }
   #search-btn,  #terms{margin-top:20px !important;}
   #view_btn{margin-left:auto !important; text-align:center;}
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
   color:white !important;
   }
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
                     <h3 class="card-label pt-5" style="font-size:1.6rem;">Temporary Works Registers
                        <span class="d-block text-muted pt-25 font-size-sm"></span>
                     </h3>
                  </div>
                  <!--begin::Topbar-->
                <div class="d-flex align-items-stretch flex-shrink-0 topRightMenu">
                    <!--begin::Toolbar wrapper-->
                    <div class="topbar d-flex align-items-stretch flex-shrink-0">
                        <!--begin::User-->
                        <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div
                                class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                                data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                @isset(auth()->user()->image)
                                    <img alt="Logo" src="{{ auth()->user()->image ?: '' }}">
                                @else
                                    <div class="symbol-label fs-3 bg-light-primary text-primary">
                                        {{ \Illuminate\Support\Str::upper(auth()->user()->name[0])  ?: '' }}</div>
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
                                            <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name ?: '' }}
                                            </div>
                                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
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
                                    <a href="{{ route('users.edit',auth()->id()) }}" class="menu-link px-5">Account Settings</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a class="menu-link px-5"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User -->
                        <!--begin::Heaeder menu toggle-->
                        <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                            <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                                <i class="bi bi-text-left fs-1"></i>
                            </div>
                        </div>
                        <!--end::Heaeder menu toggle-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
            <!--end::Topbar-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body indexTempory pt-0">
                  <div class="mb-2">
                     <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                           <div class="row align-items-center">
                              <div class="col-md-4 my-2 my-md-0">
                                 <form class="form-inline d-flex" method="get" action="{{route('tempwork.proj.search')}}">
                                    <div class="col-10">
                                       <select name="projects[]" class="form-select form-select-lg" multiple="multiple" data-control="select2" data-placeholder="Select a Project" required>
                                          @foreach($projects as $proj)
                                          <option value="{{$proj->id}}">{{$proj->name}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <div class="col-2 ">
                                       <button type="submit" class="btn btn-light-primary mb-2 w-100" style="border-radius: 0px;padding: 6px 10px; margin-left:10px;    margin-bottom: 0px !important;width: auto !important;    "><span class="fa fa-filter"></span></button>
                                    </div>
                                 </form>
                              </div>
                              <div class="col-md-4 my-2 my-md-0">
                                 <form class="form-inline d-flex" method="get" action="{{route('tempwork.search')}}">
                                    <div class="col-10">
                                       <input type="text" style="border-radius:0px;border-color:#e2e2e2;" class="form-control" placeholder="Search..." id="terms" name="terms">
                                       <span>
                                       <i class="flaticon2-search-1 text-muted"></i>
                                       </span>
                                    </div>
                                    <div class="col-md-2 text-right" id="search-btn">
                                       <button type="submit" class="btn btn-light-primary px-6 font-weight-bold" style="    padding: 6px 10px !important;margin:0px 0px 0px 7px;"><span class="fa fa-search"></span></button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="row desktopView"> -->
                  <!-- <div class="col-md-2">
                     @if(\Auth::user()->hasRole('company') && \auth()->user()->image!='')
                     @php $path = config('app.url');@endphp
                     <img class="img img-thumbnail profileimg" src="{{$path.\auth()->user()->image}}" width="150px" height="150px">
                     @endif
                     </div> -->
                  <!-- </div> -->
                  <!--begin::Table-->
                  <div class="row " style="padding:10px;position:relative;">
                  <div class="col-md-4 my-2 my-md-0 ">
                  <nav class="tabnave" style="width: 100%;float:left">
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                           <span class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</span>
                           <span class="nav-item nav-link " id="nav-basic-tab" data-toggle="tab" href="#nav-basic" role="tab" aria-controls="nav-basic" aria-selected="true">Basic</span>
                           <span  class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Advance</span>
                           <span  class="nav-item nav-link" id="nav-priority-tab" data-toggle="tab" href="#nav-priority" role="tab" aria-controls="nav-profile" aria-selected="false">Priority</span>
                        </div>
                     </nav>
                    </div>
                     <div class="col-md-2 my-2 my-md-0 text-center">
                        <div class="tableInputDiv">
                           <div class="dropdown mt-0">
                              <!-- <button onclick="myFunction()"  class="dropbtn btn btn-primary">view</button> -->
                              <button type="button" onclick="myFunction()"  style="border-bottom: 1px solid #eff2f5 !important;border-radius: 0;background:#fff !important;color:#3699FF !important; padding-bottom: 2px;margin-bottom: 5px;" class="view_column  dropbtn btn btn-primary font-weight-bolder dropdown-toggle">
                                 <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <rect x="0" y="0" width="24" height="24"></rect>
                                          <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                          <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
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


                <div class="col-md-2 my-2 offset-2 my-md-0 float-right">
                         <!--begin::Dropdown-->
                     <div class="dropdown pull-right dropdown-inline mr-2 mt-0">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="svg-icon svg-icon-md">
                              <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                                 </g>
                              </svg>
                              <!--end::Svg Icon-->
                           </span>
                           View Data
                        </button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-23px, -257px, 0px);" x-placement="top-end">
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
                                 <a href="#" class="navi-link viewdocument">
                                 <span class="navi-icon">
                                 <i class="la la-copy"></i>
                                 </span>
                                 <span class="navi-text">View Document</span>
                                 </a>
                              </li>
                              <li class="navi-item">
                                 <a  href="{{ route('Designbrief.export') }}" class="navi-link">
                                 <span class="navi-icon">
                                 <i class="la la-file-excel-o"></i>
                                 </span>
                                 <span class="navi-text">Export</span>
                                 </a>
                              </li>
                           </ul>
                        </div>
                        <!--end::Dropdown Menu-->
                     </div>
                     </div>
                     <div class="col-md-2 my-2 my-md-0 positionChange">
                     <!--end::Dropdown-->
                     <!--begin::Button-->
                     <a href="{{ route('temporary_works.create') }}" class="btn pull-right btn-primary font-weight-bolder" style="color:white !important;border-radius:0px;">
                     <span class="fa fa-plus"></span> Design Brief</a>
                     <!--end::Button-->
                </div>
                </div>
                <div class="row">
                     <div style="float:left;width:100%;position:relative;top:-5px;">
                        <div class="table-responsive tableDiv tab-content" id="nav-tabContent" style="height: 1000px;">
                           <!-- aLL TAB -->
                           <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                                 <!--begin::Table head-->
                                 <thead>
                                    <!--begin::Table row-->
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
                                       <!-- <th class="">Appointments</th>  -->
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
                                    <!--end::Table row-->
                                 </thead>
                                 <!--end::Table head-->
                                 <!--begin::Table body-->
                                 <tbody class="text-gray-600 fw-bold">
                                    @forelse($temporary_works as $item)
                                    <tr>
                                       <td style="padding: 0px !important;vertical-align: middle;min-width: 90px;font-size: 12px;">
                                          <span class="fa fa-plus addphoto cursor-pointer" data-id="{{$item->id}}"></span><br>
                                          @if(count($item->rejecteddesign)>0)
                                          <span class="rejecteddesign cursor-pointer" style="width: 108px;" data-id="{{Crypt::encrypt($item->id)}}"><span class="label label-lg font-weight-bold label-light-success label-inline"><i class="fa fa-eye text-white"></i></span>
                                          </span>
                                          <br>
                                          <br>
                                          @endif
                                          <a style="color:{{$item->status==0 || $item->status==2 ? 'red !important':'';}}" target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}
                                          </a>
                                          <br>
                                          @if($item->status==2)
                                          <a href="{{route('temporary_works.edit',$item->id)}}">
                                          <span class="rejecteddesign cursor-pointer" style="width: 108px;" data-id="{{Crypt::encrypt($item->id)}}">
                                          <span class="redBgBlink label label-lg font-weight-bold label-light-danger label-inline"><i class="fa fa-edit text-white"></i>
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
                                       <td>{{ $item->project->name ?? '' }}</td>
                                       <td style="min-width:150pxpx;padding-left: 10px !important;padding-right: 10px !important;">
                                          <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                          <hr style="margin: 5px;;color:red;border:1px solid red">
                                          <span class="desc cursor-pointer" style="width: 108px;padding: 2px;"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold label-light-success label-inline">Description</span>
                                          </span>
                                       </td>
                                       <td style="">{{ $item->tw_category }}</td>
                                       <td style="">{{ $item->tw_risk_class ?: '-' }}</td>
                                       <td style="min-width: 100px; max-width: 80px;">{{ $item->design_issued_date ? date('d-m-Y', strtotime($item->design_issued_date)) : '-' }}</td>
                                       <td style="min-width:100px;">
                                          <span class="{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[1]}} desc cursor-pointer" style="border-radius:6px;width: 108px;padding: 2px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[0]}};"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold  label-inline"><b>{{date('d-m-Y', strtotime($item->design_required_by_date)) ?: '-' }}</b></span>
                                       </td>
                                       <td>
                                          <p class="addcomment cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;" data-id="{{$item->id}}">
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
                                          <span class="addcomment cursor-pointer" style="border-radius:5px;width: 108px;background:{{$color}} !important;color: white !important;" data-id="{{$item->id}}">
                                          <span class="{{$class}} label label-lg font-weight-bold label-inline">
                                          {{count($item->comments) ?? '-'}}
                                          </span>
                                          </span>
                                          <hr style="color:red;border:1px solid red; margin: 2px;">
                                          <h3 class="uploadfile  cursor-pointer" style="margin-bottom:0px;font-weight: 400;font-size: 14px;" data-id="{{$item->id}}" data-type="4">
                                             <!-- <span class="fa fa-plus"></span> -->
                                             <br> Emails
                                          </h3>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==4)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">E{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td>
                                       <td style="">
                                          <span class="designer-company cursor-pointer" style="width: 108px;" data-desing="{{$item->designer_company_name.'-'.$item->desinger_company_name2 ?? ''}}" data-tw="{{$item->tw_name ?? ''}}"><span class="label label-lg font-weight-bold label-light-success label-inline">View</span>
                                          </span>
                                          <!-- {{$item->tw_name ?: '-'}} -->
                                          @if(!$item->tw_name)
                                          <!-- <p class="addtwname cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;"  data-id="{{$item->id}}"><span class="fa fa-plus"></span> Add TWD Name</p> -->
                                          @endif
                                       </td>
                                       <!-- <td>
                                          <p  class="uploadfile  cursor-pointer" data-id="{{$item->id}}" data-type="5">Drag and drop folders/ appointments</p><br>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==5)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">App{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                          </td> -->
                                       <td style="">
                                          @php
                                          $date='';
                                          $dcolor='';
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

                                          <p class="dateclick cursor-pointer" style="color:{{$dcolor ?? ''}};background: #f2f2f2;" data-id="{{$item->id}}" data-type="1"> {{date('d-m-Y', strtotime($date))}}
                                          </p>
                                          @endif
                                       </td>
                                       <!--  <td></td> -->
                                       <td style="">
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">{{date('d-m-Y', strtotime($file->created_at->todatestring()))}}</p>
                                          @break
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          <p class="uploaddrawing cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size: 18px !important;position: relative;top: 4px;">
                                             <!-- Upload Drawings -->
                                             <span style="font-size: 18px;" class="fa fa-plus" title="Upload Drawings"></span>
                                          </p>
                                          <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             <span style="font-size: 18px;color:{{$dcolor}}"  class="fa fa-eye" title="View Drawings"></span>
                                          </p>
                                          <p class="assessmentlist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             @php 
                                             $color="";
                                             if(count($item->riskassesment)>0)
                                             {
                                                $color="green";
                                             }
                                             @endphp
                                            <span style="font-size: 18px; color:{{$color}}" class="fa fa-file" title="View Calculation/Risk Assessment"></span>
                                          </p>
                                       </td>
                                       <td>
                                          @php $dccstyle='';@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          @php $dccstyle="display:none"; @endphp
                                          @endif
                                          @endforeach
                                          <p class="uploadfile  cursor-pointer" data-id="{{$item->id}}" style="{{$dccstyle}};margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;" data-type="2">Upload DCC</p>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          <p class="cursor-pointer permit-to-load-btn" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to<br> load</p>
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
                                          <button style="padding: 3px !important;border-radius: 4px;background:{{$scolor}} ; font-size: 12px;" class="btn btn-info scancomment" data-id="{{$item->id}}"><span class="fa fa-comments"></span>
                                          </button>
                                          <br>
                                          @endif
                                          @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                              @php
                                              $permitexpire=\App\Models\PermitLoad::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                              $scaffoldexpire=\App\Models\Scaffolding::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
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
                                              <span class="permit-to-load-btn cursor-pointer" style="width: 108px" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">
                                              <span class="label label-lg font-weight-bold label-light-yellow label-inline {{$class}}" style=";background-color:{{$color}};color:white">Live({{count($item->permits ?? 0)+count($item->scaffold ?? 0)}})</span>
                                              </span>
                                          
                                          @else
                                          <br>
                                          <span style="width: 108px;">
                                            <span class="label label-lg font-weight-bold label-light-green label-inline">
                                              @if(count($item->unloadpermits)>0 || count($item->closedpermits)>0)
                                              Closed
                                              @else
                                              0
                                              @endif
                                            </span>
                                          </span>
                                          @endif
                                       </td>
                                       <td>
                                          <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;position: relative;top: -17px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to <br>Unload</p>
                                          @if(count($item->unloadpermits)>0)
                                          <span  style="background:green;color: white;font-weight: bold;padding: 0 10px;border-radius: 5px">{{count($item->unloadpermits)}}
                                          </span>
                                          @endif
                                       </td>
                                       <td data-type="2">
                                          <p class="uploadfile cursor-pointer" data-id="{{$item->id}}" data-rams="{{$item->rams_no ?? ''}}" style="position: relative;top: -23px;margin-bottom:0px;font-weight: 400;font-size: 14px;" data-type="3">Upload RAMS<br></p>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==3)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">RAMS{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          @php
                                          $qrcode=\App\Models\ProjectQrCode::where(['tempid'=>$item->tempid,'project_id'=>$item->project->id])->first();
                                          @endphp
                                          @if(isset($qrcode->qrcode) && file_exists(public_path('qrcode/projects/'.$qrcode->qrcode.'')))
                                          <a href="{{route('tempwork.qrcodedetail',$item->id)}}">
                                          <img class="p-2" src="{{asset('qrcode/projects/'.$qrcode->qrcode.'')}}" width="60px" height="60px">
                                          </a>
                                          @endif
                                       </td>
                                       <td>
                                          <span class="svg-icon svg-icon-md dropdown-toggle dropdownaction" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24"></rect>
                                                   <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000">
                                                   </path>
                                                </g>
                                             </svg>
                                          </span>
                                          <!--begin::Dropdown Menu-->
                                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right " style="text-align: center;">
                                             <!--begin::Navigation-->
                                             <ul class="navi flex-column navi-hover py-2" style="list-style: none">
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole('admin'))
                                                   <a href="{{route('tempwork.sendattach',$item->id)}}" class="btn btn-primary p-2 m-1" ><i class="fa fa-arrow-right"></i></a>
                                                   @endif
                                                </li>
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                                   <form method="POST" action="{{route('temporary_works.destroy',$item->id)}} " id="{{'form_' . $item->id}}">
                                                      @method('Delete')
                                                      @csrf
                                                      <button type="submit" id="{{$item->id}}" class="confirm1 btn btn-danger p-2 m-1 " >
                                                      <i style="padding:3px;" class="fa fa-trash-alt"></i>
                                                      </button>
                                                   </form>
                                                   @endif
                                                </li>
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                                   <a href="javascript:void(0)" class="btn btn-danger p-2 m-1 sharebutton" style="border-radius: 21%;" data-id={{Crypt::encrypt($item->id)}}>
                                                   <i style="padding:3px;" class="fa fa-share-alt"></i>
                                                   </a>
                                                   @endif
                                                </li>
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                                   <span class="btn btn-danger p-2 m-1 changeemail" style="border-radius: 21%;" title="Change Email" data-id={{Crypt::encrypt($item->id)}} >
                                                     <i style="padding:3px;" class="fa fa-exchange-alt" ></i>
                                                   </span>
                                                   @endif
                                                </li>
                                             </ul>
                                             <!--end::Navigation-->
                                          </div>
                                          <!--end::Dropdown Menu-->
                                       </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                 </tbody>
                                 <!--end::Table body-->
                              </table>
                           </div>
                           <!-- BASIC -->
                           <div class="tab-pane fade show " id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                              <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                                 <!--begin::Table head-->
                                 <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                       <th class="" style="max-width:150px;">DESCRIPTION OF TW</th>
                                       <th class="">DRAWINGS & DESIGNS</th>
                                       <th class="">Permit to Load</th>
                                       <th class="">Permit to Unload</th>
                                    </tr>
                                    <!--end::Table row-->
                                 </thead>
                                 <!--end::Table head-->
                                 <!--begin::Table body-->
                                 <tbody class="text-gray-600 fw-bold">
                                    @forelse($temporary_works as $item)
                                    <tr>
                                       <td style="min-width:150pxpx;padding-left: 10px !important;padding-right: 10px !important;">
                                          <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                          <hr style="margin: 5px;;color:red;border:1px solid red">
                                          <span class="desc cursor-pointer" style="width: 108px;padding: 2px;"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold label-light-success label-inline">Description</span>
                                          </span>
                                       </td>
                                       @php
                                          $date='';
                                          $dcolor='';
                                          @endphp
                                          @foreach($item->uploadfile as $file)
                                          @php
                                          if($file->file_type==1 && $file->construction==1)
                                          {
                                          $dcolor='green';
                                          }
                                          elseif($file->file_type==1 && $file->preliminary_approval==1)
                                          {
                                          $dcolor='orange';
                                          }
                                          @endphp
                                        @endforeach
                                       <td>
                                          <p class="uploaddrawing cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size: 18px !important;position: relative;top: 4px;">
                                             <!-- Upload Drawings -->
                                             <span style="font-size: 18px;" class="fa fa-plus" title="Upload Drawings"></span>
                                          </p>
                                          <br>
                                          <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             <span style="font-size: 18px;color: {{$dcolor}}"  class="fa fa-eye" title="View Drawings"></span>
                                          </p>
                                          <br>
                                          <p class="assessmentlist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                              @php 
                                                 $color="";
                                                 if(count($item->riskassesment)>0)
                                                 {
                                                    $color="green";
                                                 }
                                             @endphp
                                             <span style="font-size: 18px; color:{{$color}}"  class="fa fa-file" title="View File"></span>
                                          </p>
                                       </td>
                                       <td>
                                          <p class="cursor-pointer permit-to-load-btn" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to<br> load</p>
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
                                          <button style="padding: 3px !important;border-radius: 4px;background:{{$scolor}} ; font-size: 12px;" class="btn btn-info scancomment" data-id="{{$item->id}}"><span class="fa fa-comments"></span>
                                          </button>
                                          <br>
                                          @endif
                                          @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                          @php
                                          $permitexpire=\App\Models\PermitLoad::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                          $scaffoldexpire=\App\Models\Scaffolding::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                          $color="orange";
                                          $class='';
                                          if($permitexpire>0 || $scaffoldexpire>0)
                                          {
                                          $color="red";
                                          $class='redBgBlink';
                                          }
                                          @endphp
                                          @if(isset($item->rejectedpermits) && count($item->rejectedpermits)>0)
                                          <br>
                                          <span class="text-danger redBgBlink" style="">DNL</span><br>
                                           
                                          @endif
                                           <br>
                                          <span class="permit-to-load-btn cursor-pointer" style="width: 108px" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">
                                          <span class="label label-lg font-weight-bold label-light-yellow label-inline {{$class}}" style=";background-color:{{$color}};color:white">Live({{count($item->permits ?? 0)+count($item->scaffold ?? 0)}})</span>
                                          </span>
                                          
                                          @else
                                          <br>
                                          <span style="width: 108px;"><span class="label label-lg font-weight-bold label-light-green label-inline">Closed</span></span>
                                          @endif
                                       </td>
                                       <td>
                                          <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;position: relative;top: -17px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to <br>Unload</p>
                                          @if(count($item->unloadpermits)>0)
                                          <span  style="background:green;color: white;font-weight: bold;padding: 0 10px;border-radius: 5px">{{count($item->unloadpermits)}}
                                          </span>
                                          @endif
                                       </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                 </tbody>
                                 <!--end::Table body-->
                              </table>
                           </div>
                           <!-- Advance tab -->
                           <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                                 <!--begin::Table head-->
                                 <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                       <th data-tabbedTable="Personal info" style="padding: 0px !important;vertical-align: middle;;" class="">TW ID</th>
                                       <th class="" style="max-width:150px;">DESCRIPTION OF TW</th>
                                       <th class="" style="padding: 12px;">Date<br> Design<br> Returned</th>
                                       <th class="" style=" padding: 30px !important;">Date<br> DCC <br>Returned</th>
                                       <th class="">DRAWINGS & DESIGNS</th>
                                       <th class="">Design<br> Check<br> CERT</th>
                                       <th class="">Permit to Load</th>
                                       <th class="">Permit to Unload</th>
                                    </tr>
                                    <!--end::Table row-->
                                 </thead>
                                 <!--end::Table head-->
                                 <!--begin::Table body-->
                                 <tbody class="text-gray-600 fw-bold">
                                    @forelse($temporary_works as $item)
                                    <tr>
                                       <td style="padding: 0px !important;vertical-align: middle;min-width: 90px;font-size: 12px;">
                                          @if(count($item->rejecteddesign)>0)
                                          <span class="rejecteddesign cursor-pointer" style="width: 108px;" data-id="{{Crypt::encrypt($item->id)}}"><span class="label label-lg font-weight-bold label-light-success label-inline"><i class="fa fa-eye text-white"></i></span>
                                          </span>
                                          <br>
                                          @endif
                                          <a style="color:{{$item->status==0 || $item->status==2 ? 'red !important':'';}}" target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}
                                          </a>
                                          <br>
                                          @if($item->status==2)
                                          <a href="{{route('temporary_works.edit',$item->id)}}">
                                          <span class="rejecteddesign cursor-pointer" style="width: 108px;" data-id="{{Crypt::encrypt($item->id)}}">
                                          <span class="redBgBlink label label-lg font-weight-bold label-light-success label-inline"><i class="fa fa-edit text-white"></i>
                                          </span>
                                          </span>
                                          </a>
                                          @endif
                                       </td>
                                       <td style="min-width:150pxpx;padding-left: 10px !important;padding-right: 10px !important;">
                                          <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                          <hr style="margin: 5px;;color:red;border:1px solid red">
                                          <span class="desc cursor-pointer" style="width: 108px;padding: 2px;"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold label-light-success label-inline">Description</span>
                                          </span>
                                       </td>
                                       <td style="">
                                          @php
                                          $date='';
                                          $dcolor='';
                                          @endphp
                                          @foreach($item->uploadfile as $file)
                                          @php
                                          if($file->file_type==1 && $file->construction==1)
                                          {
                                          $dcolor='green';

                                          $date=$file->created_at->todatestring();
                                          }
                                          elseif($file->file_type==1 && $file->preliminary_approval==1)
                                          {
                                          $dcolor='#FFD700';
                                          $date=$file->created_at->todatestring();
                                          }
                                          @endphp
                                          @endforeach
                                          @if($date)
                                          <p class="dateclick cursor-pointer" style="color:{{$dcolor ?? ''}};background: #f2f2f2;" data-id="{{$item->id}}" data-type="1"> {{date('d-m-Y', strtotime($date))}}
                                          </p>
                                          @endif
                                       </td>
                                       <!--  <td></td> -->
                                       <td style="">
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">{{date('d-m-Y', strtotime($file->created_at->todatestring()))}}</p>
                                          @break
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          <p class="uploaddrawing cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size: 18px !important;position: relative;top: 4px;">
                                             <!-- Upload Drawings -->
                                             <span style="font-size: 18px;" class="fa fa-plus" title="Upload Drawings"></span>
                                          </p>
                                          <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             <span style="font-size: 18px;color:{{$dcolor}}"  class="fa fa-eye" title="View Drawings"></span>
                                          </p>
                                          <p class="assessmentlist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             @php
                                             $color="";
                                                 if(count($item->riskassesment)>0)
                                                 {
                                                    $color="green";
                                                 }
                                            @endphp
                                             <span style="font-size: 18px; color:{{$color}}"  class="fa fa-file" title="View File"></span>
                                          </p>
                                          <!-- @php $i=0;@endphp
                                             @foreach($item->uploadfile as $file)
                                             @if($file->file_type==1)
                                             @php $i++ @endphp
                                             <span><a href="{{asset($file->file_name)}}" target="_blank">D{{$i}}</a></span>
                                             @endif
                                             @endforeach -->
                                       </td>
                                       <td>
                                          <p class="uploadfile  cursor-pointer" data-id="{{$item->id}}" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;" data-type="2">Upload DCC</p>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          <p class="cursor-pointer permit-to-load-btn" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to<br> load</p>
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
                                          <button style="padding: 3px !important;border-radius: 4px;background:{{$scolor}} ; font-size: 12px;" class="btn btn-info scancomment" data-id="{{$item->id}}"><span class="fa fa-comments"></span>
                                          </button>
                                          <br>
                                          @endif
                                          @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                          @php
                                          $permitexpire=\App\Models\PermitLoad::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                          $scaffoldexpire=\App\Models\Scaffolding::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                          $color="orange";
                                          $class='';
                                          if($permitexpire>0 || $scaffoldexpire>0)
                                          {
                                          $color="red";
                                          $class='redBgBlink';
                                          }
                                          @endphp
                                          @if(isset($item->rejectedpermits) && count($item->rejectedpermits)>0)
                                          <br>
                                          <span class="text-danger redBgBlink" style="">DNL</span><br>
                                           
                                          @endif
                                           <br>
                                          <span class="permit-to-load-btn cursor-pointer" style="width: 108px" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">
                                          <span class="label label-lg font-weight-bold label-light-yellow label-inline {{$class}}" style=";background-color:{{$color}};color:white">Live({{count($item->permits ?? 0)+count($item->scaffold ?? 0)}})</span>
                                          </span>
                                          
                                          @else
                                          <br>
                                          <span style="width: 108px;"><span class="label label-lg font-weight-bold label-light-green label-inline">Closed</span></span>
                                          @endif
                                       </td>
                                       <td>
                                          <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;position: relative;top: -17px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to <br>Unload</p>
                                          @if(count($item->unloadpermits)>0)
                                          <span  style="background:green;color: white;font-weight: bold;padding: 0 10px;border-radius: 5px">{{count($item->unloadpermits)}}
                                          </span>
                                          @endif
                                       </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                 </tbody>
                                 <!--end::Table body-->
                              </table>
                           </div>
                            <div class="tab-pane fade" id="nav-priority" role="tabpanel" aria-labelledby="nav-priority-tab">
                              <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                                 <!--begin::Table head-->
                                 <thead>
                                    <!--begin::Table row-->
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
                                       <!-- <th class="">Appointments</th>  -->
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
                                    <!--end::Table row-->
                                 </thead>
                                 <!--end::Table head-->
                                 <!--begin::Table body-->
                                 <tbody class="text-gray-600 fw-bold">
                                    @forelse($temporary_works as $item)
                                    @if(HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[1]=='redBgBlink' || $item->status==2)
                                    <tr>
                                       <td style="padding: 0px !important;vertical-align: middle;min-width: 90px;font-size: 12px;">
                                          <span class="fa fa-plus addphoto cursor-pointer" data-id="{{$item->id}}"></span><br>
                                          @if(count($item->rejecteddesign)>0)
                                          <span class="rejecteddesign cursor-pointer" style="width: 108px;" data-id="{{Crypt::encrypt($item->id)}}"><span class="label label-lg font-weight-bold label-light-success label-inline"><i class="fa fa-eye text-white"></i></span>
                                          </span>
                                          <br>
                                          <br>
                                          @endif
                                          <a style="color:{{$item->status==0 || $item->status==2 ? 'red !important':'';}}" target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}
                                          </a>
                                          <br>
                                          @if($item->status==2)
                                          <a href="{{route('temporary_works.edit',$item->id)}}">
                                          <span class="rejecteddesign cursor-pointer" style="width: 108px;" data-id="{{Crypt::encrypt($item->id)}}">
                                          <span class="redBgBlink label label-lg font-weight-bold label-light-danger label-inline"><i class="fa fa-edit text-white"></i>
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
                                       <td>{{ $item->project->name ?? '' }}</td>
                                       <td style="min-width:150pxpx;padding-left: 10px !important;padding-right: 10px !important;">
                                          <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                          <hr style="margin: 5px;;color:red;border:1px solid red">
                                          <span class="desc cursor-pointer" style="width: 108px;padding: 2px;"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold label-light-success label-inline">Description</span>
                                          </span>
                                       </td>
                                       <td style="">{{ $item->tw_category }}</td>
                                       <td style="">{{ $item->tw_risk_class ?: '-' }}</td>
                                       <td style="min-width: 100px; max-width: 80px;">{{ $item->design_issued_date ? date('d-m-Y', strtotime($item->design_issued_date)) : '-' }}</td>
                                       <td style="min-width:100px;">
                                          <span class="{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[1]}} desc cursor-pointer" style="border-radius:6px;width: 108px;padding: 2px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[0]}};"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold  label-inline"><b>{{date('d-m-Y', strtotime($item->design_required_by_date)) ?: '-' }}</b></span>
                                       </td>
                                       <td>
                                          <p class="addcomment cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;" data-id="{{$item->id}}">
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
                                          <span class="addcomment cursor-pointer" style="border-radius:5px;width: 108px;background:{{$color}} !important;color: white !important;" data-id="{{$item->id}}">
                                          <span class="{{$class}} label label-lg font-weight-bold label-inline">
                                          {{count($item->comments) ?? '-'}}
                                          </span>
                                          </span>
                                          <hr style="color:red;border:1px solid red; margin: 2px;">
                                          <h3 class="uploadfile  cursor-pointer" style="margin-bottom:0px;font-weight: 400;font-size: 14px;" data-id="{{$item->id}}" data-type="4">
                                             <!-- <span class="fa fa-plus"></span> -->
                                             <br> Emails
                                          </h3>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==4)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">E{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td>
                                       <td style="">
                                          <span class="designer-company cursor-pointer" style="width: 108px;" data-desing="{{$item->designer_company_name.'-'.$item->desinger_company_name2 ?? ''}}" data-tw="{{$item->tw_name ?? ''}}"><span class="label label-lg font-weight-bold label-light-success label-inline">View</span>
                                          </span>
                                          <!-- {{$item->tw_name ?: '-'}} -->
                                          @if(!$item->tw_name)
                                          <!-- <p class="addtwname cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;"  data-id="{{$item->id}}"><span class="fa fa-plus"></span> Add TWD Name</p> -->
                                          @endif
                                       </td>
                                       <!-- <td>
                                          <p  class="uploadfile  cursor-pointer" data-id="{{$item->id}}" data-type="5">Drag and drop folders/ appointments</p><br>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==5)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">App{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                          </td> -->
                                       <td style="">
                                          @php
                                          $date='';
                                          $dcolor='';
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

                                          <p class="dateclick cursor-pointer" style="color:{{$dcolor ?? ''}};background: #f2f2f2;" data-id="{{$item->id}}" data-type="1"> {{date('d-m-Y', strtotime($date))}}
                                          </p>
                                          @endif
                                       </td>
                                       <!--  <td></td> -->
                                       <td style="">
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">{{date('d-m-Y', strtotime($file->created_at->todatestring()))}}</p>
                                          @break
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          <p class="uploaddrawing cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size: 18px !important;position: relative;top: 4px;">
                                             <!-- Upload Drawings -->
                                             <span style="font-size: 18px;" class="fa fa-plus" title="Upload Drawings"></span>
                                          </p>
                                          <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             <span style="font-size: 18px;color:{{$dcolor}}"  class="fa fa-eye" title="View Drawings"></span>
                                          </p>
                                          <p class="assessmentlist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             @php 
                                             $color="";
                                             if(count($item->riskassesment)>0)
                                             {
                                                $color="green";
                                             }
                                             @endphp
                                            <span style="font-size: 18px; color:{{$color}}" class="fa fa-file" title="View Calculation/Risk Assessment"></span>
                                          </p>
                                       </td>
                                       <td>
                                          @php $dccstyle='';@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          @php $dccstyle="display:none"; @endphp
                                          @endif
                                          @endforeach
                                          <p class="uploadfile  cursor-pointer" data-id="{{$item->id}}" style="{{$dccstyle}};margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;" data-type="2">Upload DCC</p>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          <p class="cursor-pointer permit-to-load-btn" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to<br> load</p>
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
                                          <button style="padding: 3px !important;border-radius: 4px;background:{{$scolor}} ; font-size: 12px;" class="btn btn-info scancomment" data-id="{{$item->id}}"><span class="fa fa-comments"></span>
                                          </button>
                                          <br>
                                          @endif
                                          @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                              @php
                                              $permitexpire=\App\Models\PermitLoad::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
                                              $scaffoldexpire=\App\Models\Scaffolding::where(['temporary_work_id'=>$item->id,'status'=>1])->whereDate('created_at', '<=',\Carbon\Carbon::now()->subDays(7))->count();
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
                                              <span class="permit-to-load-btn cursor-pointer" style="width: 108px" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">
                                              <span class="label label-lg font-weight-bold label-light-yellow label-inline {{$class}}" style=";background-color:{{$color}};color:white">Live({{count($item->permits ?? 0)+count($item->scaffold ?? 0)}})</span>
                                              </span>
                                          
                                          @else
                                          <br>
                                          <span style="width: 108px;">
                                            <span class="label label-lg font-weight-bold label-light-green label-inline">
                                              @if(count($item->unloadpermits)>0 || count($item->closedpermits)>0)
                                              Closed
                                              @else
                                              0
                                              @endif
                                            </span>
                                          </span>
                                          @endif
                                       </td>
                                       <td>
                                          <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;position: relative;top: -17px;" data-id="{{Crypt::encrypt($item->id)}}" data-desc="{{$item->design_requirement_text}}">Permit to <br>Unload</p>
                                          @if(count($item->unloadpermits)>0)
                                          <span  style="background:green;color: white;font-weight: bold;padding: 0 10px;border-radius: 5px">{{count($item->unloadpermits)}}
                                          </span>
                                          @endif
                                       </td>
                                       <td data-type="2">
                                          <p class="uploadfile cursor-pointer" data-id="{{$item->id}}" data-rams="{{$item->rams_no ?? ''}}" style="position: relative;top: -23px;margin-bottom:0px;font-weight: 400;font-size: 14px;" data-type="3">Upload RAMS<br></p>
                                          @php $i=0;@endphp
                                          @foreach($item->uploadfile as $file)
                                          @if($file->file_type==3)
                                          @php $i++ @endphp
                                          <span><a href="{{asset($file->file_name)}}" target="_blank">RAMS{{$i}}</a></span>
                                          @endif
                                          @endforeach
                                       </td>
                                       <td>
                                          @php
                                          $qrcode=\App\Models\ProjectQrCode::where(['tempid'=>$item->tempid,'project_id'=>$item->project->id])->first();
                                          @endphp
                                          @if(isset($qrcode->qrcode) && file_exists(public_path('qrcode/projects/'.$qrcode->qrcode.'')))
                                          <a href="{{route('tempwork.qrcodedetail',$item->id)}}">
                                          <img class="p-2" src="{{asset('qrcode/projects/'.$qrcode->qrcode.'')}}" width="60px" height="60px">
                                          </a>
                                          @endif
                                       </td>
                                       <td>
                                          <span class="svg-icon svg-icon-md dropdown-toggle dropdownaction" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24"></rect>
                                                   <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000">
                                                   </path>
                                                </g>
                                             </svg>
                                          </span>
                                          <!--begin::Dropdown Menu-->
                                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right " style="text-align: center;">
                                             <!--begin::Navigation-->
                                             <ul class="navi flex-column navi-hover py-2" style="list-style: none">
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole('admin'))
                                                   <a href="{{route('tempwork.sendattach',$item->id)}}" class="btn btn-primary p-2 m-1" ><i class="fa fa-arrow-right"></i></a>
                                                   @endif
                                                </li>
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                                   <form method="POST" action="{{route('temporary_works.destroy',$item->id)}} " id="{{'form_' . $item->id}}">
                                                      @method('Delete')
                                                      @csrf
                                                      <button type="submit" id="{{$item->id}}" class="confirm1 btn btn-danger p-2 m-1 " >
                                                      <i style="padding:3px;" class="fa fa-trash-alt"></i>
                                                      </button>
                                                   </form>
                                                   @endif
                                                </li>
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                                   <a href="javascript:void(0)" class="btn btn-danger p-2 m-1 sharebutton" style="border-radius: 21%;" data-id={{Crypt::encrypt($item->id)}}>
                                                   <i style="padding:3px;" class="fa fa-share-alt"></i>
                                                   </a>
                                                   @endif
                                                </li>
                                                <li class="navi-item">
                                                   @if(\Auth::user()->hasRole([['admin', 'company','user']]))
                                                   <span class="btn btn-danger p-2 m-1 changeemail" style="border-radius: 21%;" title="Change Email" data-id={{Crypt::encrypt($item->id)}} >
                                                     <i style="padding:3px;" class="fa fa-exchange-alt" ></i>
                                                   </span>
                                                   @endif
                                                </li>
                                             </ul>
                                             <!--end::Navigation-->
                                          </div>
                                          <!--end::Dropdown Menu-->
                                       </td>
                                    </tr>
                                    @endif
                                    @empty
                                    @endforelse
                                 </tbody>
                                 <!--end::Table body-->
                              </table>
                           </div>
                        </div>
                        <!-- second table -->
                        <!-- <div class="table-responsive  tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="height: 1000px;">
                           </div> -->
                     </div>
                  </div>
               </div>
               <br>
               <div class="col-md-6 d-flex" style="margin-bottom:10px">
                  {{$temporary_works->links("pagination::bootstrap-4")}}
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
@include('dashboard.modals.drawingdesign')
@include('dashboard.modals.upload-file')
@include('dashboard.modals.tw_name')
@include('dashboard.modals.designername')
@include('dashboard.modals.comments')
@include('dashboard.modals.drawingdesignlist')
@include('dashboard.modals.datemodal')
@include('dashboard.modals.permit_to_load')
@include('dashboard.modals.description')
@include('dashboard.modals.project_documents')
@include('dashboard.modals.tempwork_share')
@include('dashboard.modals.rejected-temporarywork-modals')
@include('dashboard.modals.share_drawing_modal')
@include('dashboard.modals.drawing_reply_modals')
@include('dashboard.modals.risk_assessment')
@include('dashboard.modals.change-emails-modal')
@include('dashboard.modals.upload-photo')
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
<script>
   $(document).ready(function() {
   
       $(".showonclick").hide();
   })
</script>
<script src="{{asset('js/dropzone.js')}}"></script>
<script type="text/javascript">
   var role = "{{ \Auth::user()->roles->pluck('name')[0] }}";
   console.log(role);
   Dropzone.options.dropzoneForm = {
       init: function() {
           // Set up any event handlers
           this.on("queuecomplete", function(file) {
               location.reload();
           });
       }
   };
</script>
<script>
   $(".uploadfile").on('click', function() {
       if (role == 'supervisor' || role == "scaffolder") {
           alert("You are not allowed to add File");
           return false;
       }
       $("#tempworkid").val($(this).attr('data-id'));
       $("#type").val($(this).attr('data-type'));
       if ($(this).attr('data-type') == '3') {
           $("#rams_no").removeClass('d-none').val($(this).attr('data-rams'));
       } else {
           $("#rams_no").addClass('d-none');
       }
       $("#upload_file_id").modal('show');
   
   })
</script>
<script type="text/javascript">
   $(".addtwname").on('click', function() {
       $("#temp_work_idd").val($(this).attr('data-id'));
       var temporary_work_id = $(this).attr('data-id');
       var userid = {{Auth::user()->id}}
       $("#tw_modal_id").modal('show');
   })
   
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
   
   //show reject comment
   $(".rejectcomment").on('click', function() {
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
               type: 'pc'
           },
           success: function(res) {
                 res=JSON.parse(res);
               $("#commenttable").html(res.comment);
               $(".comments_form").hide();
               $("#comment_modal_id").modal('show');
           }
       });
   
   });
</script>
<script type="text/javascript">
   $(".dateclick").on('click', function() {
       if (role == 'supervisor' || role == "scaffolder") {
           alert("You are not allowed to add comment");
           return false;
       }
       var file_type = $(this).attr('data-type');
       var tempid = $(this).attr('data-id');
       $.ajax({
           url: "{{route('temporarywork.file-upload-dates')}}",
           method: "get",
           data: {
               file_type: file_type,
               tempid: tempid
           },
           success: function(res) {
               $("#tablebody").html(res);
               $("#date_modal_id").modal('show');
           }
       });
   
   })
   
   
   //upload drawing and design
   $(".uploaddrawing").on('click', function() {
       var tempworkid = $(this).attr('data-id');
       $("#desing_tempworkid").val(tempworkid);
       $("#drawinganddesign").modal('show');
   })
   
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
</script>
<script type="text/javascript">
   $(".permit-to-load").on('click', function() {
       id = $(this).attr('data-id');
       desc = $(this).attr('data-desc');
       $.ajax({
           url: "{{route('permit.get')}}",
           method: "get",
           data: {
               id: id,
               desc: desc
           },
           success: function(res) {
               $("#permitheading").html('Permit To Load');
               $("#permitloadbutton").addClass('d-flex').show();
               $("#permitbody").html(res);
               $(".temp_work_id").val(id);
               $("#permit_modal_id").css('display', 'block');
               $("#permit_modal_id").modal('show');
           }
       });
   
   })
   $(".permit-to-load-btn").on('click', function() {
       id = $(this).attr('data-id');
       desc = $(this).attr('data-desc');
       $.ajax({
           url: "{{route('permit.get')}}",
           method: "get",
           data: {
               id: id,
               desc: desc
           },
           success: function(res) {
               $("#permitheading").html('Permit To Load');
               $("#permitloadbutton").addClass('d-flex').show();
               $("#permitbody").html(res);
               $(".temp_work_id").val(id);
               $("#permit_modal_id").css('display', 'block');
               $("#permit_modal_id").modal('show');
           }
       });
   
   })
   
   //permit to unload
   $(".permit-to-unload").on('click', function() {
       id = $(this).attr('data-id');
       desc = $(this).attr('data-desc');
       $.ajax({
           url: "{{route('permit.get')}}",
           method: "get",
           data: {
               id: id,
               type: 'unload',
               desc: desc
           },
           success: function(res) {
               console.log(res);
               $("#permitheading").html('Permit To Unload');
               $("#permitloadbutton").removeClass('d-flex').hide();
               $("#permitbody").html(res);
               $("#permit_modal_id").css('display', 'block');
               $("#permit_modal_id").modal('show');
           }
       });
   })
   
   //desc 
   $(".desc").on('click', function() {
       var desc = $(this).attr('title');
       $("#desc").html(desc);
       $("#desc_modal_id").modal('show');
   })
   
   //Add documents
   $(".adddocument").on('click', function(e) {
       if (role == 'supervisor' || role == "scaffolder") {
           alert("You are not allowed to add Documents");
           return false;
       }
       e.preventDefault();
       $("#project-documents").hide();
       $(".project_doc_form").show();
       $("#project_document_modal_id").modal('show');
   });
   
   //view documents
   $(".viewdocument").on('click', function(e) {
       e.preventDefault();
       $.ajax({
           url: "{{route('project.document.get')}}",
           method: "GET",
           data: {},
           success: function(res) {
               $(".project_doc_form").hide();
               $("#project-documents").html(res);
               $("#project-documents").show();
               $("#project_document_modal_id").modal('show');
           }
       });
   
   });
   
   //share butto click envent
   $(".sharebutton").on('click', function(e) {
       e.preventDefault();
       var tempid = $(this).attr('data-id');
       $("#sharetempid").val(tempid);
       $("#tempwork_share_modal_id").modal('show');
   })
</script>
<script type="text/javascript">
   Dropzone.options.dropzone = {
       maxFilesize: 50,
       renameFile: function(file) {
           var dt = new Date();
           var time = dt.getTime();
           return time + file.name;
       },
       acceptedFiles: ".jpeg,.jpg,.png,.gif",
       addRemoveLinks: true,
       timeout: 500000,
       removedfile: function(file) {
           var name = file.upload.filename;
           $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               },
               type: 'POST',
               url: '{{ url("image/delete") }}',
               data: {
                   filename: name
               },
               success: function(data) {
                   console.log("File has been successfully removed!!");
               },
               error: function(e) {
                   console.log(e);
               }
           });
           var fileRef;
           return (fileRef = file.previewElement) != null ?
               fileRef.parentNode.removeChild(file.previewElement) : void 0;
       },
   
       success: function(file, response) {
           console.log(response);
       },
       error: function(file, response) {
           return false;
       }
   };
   
   
   $(document).on('click', "#adddocument", function() {
       console.log("here");
       $(".showonclick").show();
       $(".hideonclick").hide();
   
   })
   $(document).on('click', "#crossdoc", function() {
       console.log("here");
       $(".showonclick").hide();
       $(".hideonclick").show();
   
   })
</script>
<script type="text/javascript">
   $('input[name="preliminary_approval"]').on('click', function() {
       var val = $(this).val();
       console.log(val);
       if (val == 1) {
           $("[datacheck='no']").prop('checked', true);
           $("[datacheck='yes']").prop('checked', false);
       } else {
           $("[datacheck='no']").prop('checked', false);
           $("[datacheck='yes']").prop('checked', true);
       }
   })
   
   $('input[name="construction"]').on('click', function() {
       var val = $(this).val();
       console.log(val);
       if (val == 1) {
           $("[datacheck1='no']").prop('checked', true);
           $("[datacheck1='yes']").prop('checked', false);
       } else {
           $("[datacheck1='no']").prop('checked', false);
           $("[datacheck1='yes']").prop('checked', true);
       }
   })
   
   $(document).on('click', ".clickable-row", function() {
       window.open($(this).data("href"), '_blank');
   });
   
   $(document).on('click', '.openpermitform', function(e) {
       id = $(this).attr('id');
       $("#submit" + id + "").submit();
       e.stopPropagation();
   })
   
   
   $(document).on('click', '.permit-rejected', function() {
       var permit_id = $(this).attr('data-id');
       $.ajax({
           url: "{{route('temporarywork.get-comments')}}",
           method: "get",
           data: {
               permit_id: permit_id,
               type: 'permit'
           },
           success: function(res) {
               res=JSON.parse(res);
               $("#permit_modal_id").modal('hide');
               $("#commenttable").html(res.comment);
               $(".comments_form").hide();
               $("#comment_modal_id").modal('show');
           }
       });
   })
   
   $(".designer-company").on('click', function() {
       var companies = $(this).attr('data-desing');
       const names = companies.split("-");
       var tw_name = $(this).attr('data-tw');
       console.log(tw_name);
       var list = '';
       if (names[0] != '') {
           list += '<tr><td>1</td><td>' + names[0] + '</td><td>' + tw_name + '</td></tr>';
       }
       if (names[1] != '') {
           list += '<tr><td>2</td><td>' + names[1] + '</td><td>' + tw_name + '</td></tr>';
       }
       $("#desginerbody").html(list);
       $("#desingername").modal('show');
   })
   
   $(document).on('click', ".commentstatus", function() {
       text = $(this).text();
       if (text == "Pending") {
           modaltext = "Do you want to change Comment status to Fixed?";
       } else {
           modaltext = "Do you want to change Comment status to Pending?";
       }
       commentid = $(this).attr('data-id');
       var $t = $(this);
       $("#comment_modal_id").modal('hide');
   
       swal({
               title: modaltext,
               // text: "You will not be able to recover this record!",
               type: "warning",
               confirmButtonColor: '#DD6B55',
               confirmButtonText: 'Yes!',
               showCancelButton: true,
               closeOnConfirm: true,
               //closeOnCancel: false
           },
           function() {
               $.ajax({
                   url: "{{route('temporarywork.comments.status')}}",
                   method: "get",
                   data: {
                       commentid,
                       text
                   },
                   success: function(res) {
                       if (res == "success") {
                           if (text == "Pending") {
                               $t.text('Fixed');
                               $t.removeClass('btn btn-primary').addClass('btn btn-success');
                               $("#comment_modal_id").modal('show');
                           } else {
                               $t.text('Pending');
                               $t.removeClass('btn btn-success').addClass('btn btn-primary');
                               $("#comment_modal_id").modal('show');
                           }
   
                       } else {
                           $t.text(text);
                       }
                   }
               });
   
           });
   
   
   });
   
   
   $(document).ready(function() {
   
   
       // Checkbox click
       $(".hidecol").click(function() {
   
           var id = this.id;
           var splitid = id.split("_");
           var colno = splitid[1];
           var checked = true;
   
           // Checking Checkbox state
           if ($(this).is(":checked")) {
               checked = false;
           } else {
               checked = true;
           }
           setTimeout(function() {
               if (checked) {
                   $('table td:nth-child(' + colno + ')').hide();
                   $('table th:nth-child(' + colno + ')').hide();
               } else {
                   $('table td:nth-child(' + colno + ')').show();
                   $('table th:nth-child(' + colno + ')').show();
               }
   
           }, 1500);
   
       });
   });
   
   function myFunction() {
       document.getElementById("myDropdown").classList.toggle("show");
   }
   
   function myFunctionMobile() {
       document.getElementById("myDropdownMobile").classList.toggle("show");
   }
   
   // Close the dropdown menu if the user clicks outside of it
   window.onclick = function(event) {
       if (!event.target.matches('.dropbtn')) {
           var dropdowns = document.getElementsByClassName("dropdown-content");
           var i;
           for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               //   if (openDropdown.classList.contains('show')) {
               //     openDropdown.classList.remove('show');
               //   }
           }
       }
   }
   $(document).click(function(e) {
   
       e.stopPropagation();
   
       //check if the clicked area is dropDown or not
       if (!$(event.target).closest('.dropbtn').length && !$(event.target).closest('#myDropdown').length) {
           console.log("hello")
           $("#myDropdown").removeClass("show")
       }
   
   
       // if($("#myDropdown").hasClass('show')){
       //     $("#myDropdown").hide()
       // }
       // $("#myDropdown").click(function(e){
       //     e.stopPropagation(); 
       // });
   });
   
   $(document).on('click', '.scancomment', function() {
       var temporary_work_id = $(this).attr('data-id');
       var userid = {{Auth::user()->id}}
       $("#commenttable").html('');
       $.ajax({
           url: "{{route('temporarywork.get-comments')}}",
           method: "get",
           data: {
               temporary_work_id: temporary_work_id,
               type: 'scan'
           },
           success: function(res) {
               res=JSON.parse(res);
               $("#commenttable").html(res.comment);
               $(".comments_form").hide();
               $("#comment_modal_id").modal('show');
           }
       });
   
   });
   
   $(document).on('click', '.rejecteddesign', function() {
       tempid = $(this).attr('data-id');
       $.ajax({
           url: "{{route('rejected.designs')}}",
           method: "get",
           data: {
               tempid
           },
           success: function(res) {
               res = JSON.parse(res);
               console.log(res);
               $("#rejected-designbrief-body").html(res.list);
               $("#design-brief").html(res.brief);
               $("span#rejectstatus").html('Status: '+res.status);
               if(res.status=="Pending")
               {
                   $("span#rejectstatus").css('color','#FFC300 ');
               }
               if(res.status=="Accepted")
               {
                   $("span#rejectstatus").css('color','green ');
               }
               if(res.status=="Rejected")
               {
                   $("span#rejectstatus").css('color','red');
               }
               $("#rejected_designbrief_modal_id").modal('show');
           }
       });
   })
   
   $(document).on('click','.drawingshare',function(e){
        e.stopPropagation();
        id=$(this).attr('data-id');
        $("#sharedrwingid").val($(this).attr('data-id'));
        $("#sharedrwingwithchecckerid").val($(this).attr('data-id'));
       $.ajax({
           url: "{{route('get.share.drawings')}}",
           method: "get",
           data: {
               id
           },
           success: function(res) {
               
               $("#drawingsharedata").html(res);
               $("#share_drawing_modal_id").modal('show');
           }
       });
       
   
   })
   
   $(document).on('click','.drawingreply',function(e){
       e.stopPropagation();
        id=$(this).attr('data-id');
        $("#drwingid").val($(this).attr('data-id'));
        $.ajax({
           url: "{{route('get.reply.drawings')}}",
           method: "get",
           data: {
               id
           },
           success: function(res) {
               $("#drawingreplydata").html(res);
               $("#reply_drawing_modal_id").modal('show'); 
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
   
   
   $(".mydropdown").on('click',function(){
       $(".mydrodownmenu").toggle();
   })
   
   
   
   $("div#kt_aside_toggle").click(function(){
      if($(".aside").hasClass("activeAside")){
         $("#kt_wrapper").removeClass("activeWrapper");
      $(".aside").removeClass("activeAside");
      $(".aside-logo .logo").css("display","none");
      $(".menu-title").css("opacity","0");
      $(".menu-sub-accordion").removeClass("activeSubMenu");
      $("#kt_aside_toggle .rotate-180").css("transform","rotateZ(180deg)")
      } else {
          $("#kt_wrapper").addClass("activeWrapper");
          $(".aside").addClass("activeAside");
          $(".aside-logo .logo").css("display","block");
          $(".menu-title").css("opacity","1");
          $(".menu-sub-accordion").addClass("activeSubMenu");
          $("#kt_aside_toggle .rotate-180").css("transform","rotateZ(0deg)")
         
      }
   })

   //change email click event
   $(".changeemail").on('click',function(){
      var id=$(this).attr('data-id');
      $.ajax({
           url: "{{route('change-email-history')}}",
           method: "get",
           data: {
               id
           },
           success: function(res) {
               $("#design_brief_id").val(id);
               $("#change_email_history").html(res);
               $("#change_email_modal_id").modal('show');
           }
       });
      
      
   })
   //upload photo
   $(".addphoto").on('click',function(){
    let id=$(this).attr('data-id');
    $.ajax({
           url: "{{route('tempwork.get.photo')}}",
           method: "get",
           data: {id},
           success: function(res) {
               $("#photo_dev").html(res);
               $("#temp_work_id_photo").val(id);
               $("#upload_photo_id").modal('show');
           }
       });
      
   })
   
</script>
@endsection