@extends('layouts.dashboard.master-index-tempory',['title' => 'Awarded Estimator'])
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

   .rowcolor{
    background: #D5D8DC !important;
   }
   .tab-content>.active {
    background: none !important;
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
                     <h3 class="card-label pt-5" style="font-size:1.6rem;">Awarded List of Estimator Briefs
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
               <div class="card-body indexTempory pt-0">
                <div class="tab-content" id="myTabContent">
                  <!-- Awarded tab -->
                    <div class="table-responsive tableDiv tab-content" id="nav-tabContent" style="height: 1000px;">
                       <!-- aLL TAB -->
                       <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                             <!--begin::Table head-->
                             <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                   <th>Serial No</th>
                                   <th>Project</th>
                                   <th>Company</th>
                                   <th>Email</th>
                                   <th>Action</th>
                                </tr>
                                <!--end::Table row-->
                             </thead>
                             <!--end::Table head-->
                             <!--begin::Table body-->
                             <tbody class="text-gray-600 fw-bold">
                                @if(count($AwardedEstimators)>0)
                                  @foreach($AwardedEstimators as $work)
                                  <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$work->project->name}}</td>
                                    <td>{{$work->project->company->name}}</td>
                                    <td>{{Auth::user()->email}}</td>
                                    <td>
                                        <a href="{{route('designer.uploaddesign',Crypt::encrypt($work->id).'/?mail='.$work->designer->email)}}" target="_blank"><i class="fa fa-eye"></i></a>
                                    </td>
                                  </tr>
                                  @endforeach
                                @else
                                <tr>
                                    <td colspan="5"><h3 class="mt-3">No Record Found!</h3></td>
                                </tr>
                                @endif
                             </tbody>
                             <!--end::Table body-->
                          </table>
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
@endsection
@section('scripts')
<script type="text/javascript">
   
</script>
@endsection