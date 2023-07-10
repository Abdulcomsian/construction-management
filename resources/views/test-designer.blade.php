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

   .commentsTable th{
        text-align: center!important;
    }

    @keyframes blink {
    0% {
        color: red;
    }
    50% {
        color: red;
    }
    100% {
        color: inherit;
    }
   }

   .blink {
      animation: blink 1s infinite;
      color: red;
   }



</style>
@include('layouts.sweetalert.sweetalert_css')
@include('dashboard.modals.comments2')
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
               <br>
               <div class="col-md-6 d-flex" style="margin-bottom:10px">
               </div>
               <!--end::Table-->
            </div>
            <!--end::Card body-->
         </div>

         <!--end::Card-->
      </div>
      <div class="row">
         <div class="col-12">
            <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
               <!--begin::Table body-->
               <tbody class="text-gray-600 fw-bold">

                  @forelse($AwardedEstimators as $item)

                  <tr class="{{$item->status==3 ? 'rowcolor ':''}}"
                     style="height: {{count($AwardedEstimators)==1 ? '100px':''}}">
                     @if(\Auth::user()->hasRole('admin'))
                     <td>
                        <p>{{ $item->company ?: '-' }}</p>
                     </td>
                     @endif
                     <td>
                        @if($item->project_id)
                        <p style="font-size: 16px !important; font-weight: 600; font-family: 'Poppins'; color: black; margin-bottom: 10px !important">
                           {{ $item->project->name ?? '' }}</p>
                        @else
                        <p style="font-size: 16px !important; font-weight: 600; font-family: 'Poppins'; color: black; margin-bottom: 10px !important">
                              {{ $item->projname ?? '' }}</p>   
                        @endif
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
                        <p style="font-weight:400;font-size:11px !important; font-family: 'Poppins';">Client Name:</p>
                        <p style="font-weight:500;font-size:11px !important; font-family: 'Poppins';">
                           {{$item->client_name ?? ''}}</p>
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
                           <div class="d-flex justify-content-between">
                                  <span class=" titleColumn">Cost:</span>
                              @if($item->designerQuote && auth()->user()->view_price)
                              <span>${{$item->designerQuote ? $item->designerQuote->sum('price') :
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
                        @php $blink = '' @endphp
                        @if(empty($item->designerAssign->user->name) || empty($item->checkerAssign->user->name) )
                           @php $blink = 'blink' @endphp
                        @endif
                     <td style="min-width: 220px; max-width: 80px;padding: 15px !important;">
                        <div class="d-flex justify-content-between">
                           <span>
                              {{-- <span class="titleColumn" id="allocationDesignerModalButton" style="font-weight: bold; width: 100%; border-radius: 5px; color: black;">Allocated Designers:</span> --}}
                              <span class=" titleColumn">Allocated Designers:</span>
                              <i class="icon-edit {{$blink}}" id="allocated-designer" data-rowid="{{ $item->id }}" style="cursor: pointer; font-size: 16px; vertical-align: bottom; margin-left: 11px;"></i>
                          </span>                                             
                        </div>
                        <div class="d-flex justify-content-between" style="margin: 12px 0;">
                           <span class=" titleColumn">Designer Name:</span>
                           <span>{{$item->designerAssign->user->name ?? ''}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                           <span class=" titleColumn">Checker Name:</span>
                           <span>{{$item->checkerAssign->user->name ?? ''}}</span>
                        </div>
                     </td>
                     <td style="min-width: 220px; max-width: 80px;padding: 15px !important;">
                        <div class="d-flex justify-content-between">
                           <div>
                              <span class=" titleColumn">Designer Progress:</span>
                              {{-- <span class=" titleColumn" style="font-weight: bold; color: black">Designer Progress:</span> --}}
                              <i class="icon-edit" data-toggle="modal"
                                 data-target="#DesignCheckCertModal" id="time-estimator"  data-rowid="{{$item->id}}"
                                 style="cursor: pointer; font-size: 16px;vertical-align: bottom;margin-left: 3px;"></i>
                                 <div class="mt-5">
                                    <span class=" titleColumn">Checker Progress:</span>
                                 {{-- <span class=" titleColumn" style="font-weight: bold; color: black">Checker Progress:</span> --}}
                                 <i class="icon-edit" data-toggle="modal" id="time-estimator-checker"  data-rowid="{{$item->id}}"
                                    style="cursor: pointer; font-size: 16px;vertical-align: bottom;margin-left: 3px;"></i>
                                 </div>
                                 @php
                                 $userEmail = auth()->user()->email;
                                 $email = '';
                                 @endphp
                           
                                 @if(isset($item->designerAssign) && $userEmail == $item->designerAssign->email)
                                       @php $email = $item->designerAssign->email; @endphp
                                 @elseif(isset($item->checkerAssign) && $userEmail == $item->checkerAssign->email)
                                       @php $email = $item->checkerAssign->email; @endphp
                                 @endif
                         
                                 <a target="_blank" href="{{ route('designer.uploaddesign', Crypt::encrypt($item->id).'/?mail='.$email.'&cert=1') }}" >
                                    <div class="mt-5">
                                          <span class="titleColumn">Designer Certificate:</span>
                                          {{-- <span class=" titleColumn" style="font-weight: bold; color: black">Designer Certificate:</span> --}}
                                          <i class="icon-edit"  data-rowid="{{$item->id}}"
                                             style="cursor: pointer; font-size: 16px;vertical-align: bottom;margin-left: 3px;"></i>
                                       </div>
                                    </a>
                           </div>
                           {{-- <div>
                              <span class=" titleColumn" style="font-weight: bold; color: black">Checker Progress:</span><i class="icon-edit" data-toggle="modal" id="time-estimator-checker"  data-rowid="{{$item->id}}"
                                 style="color: #000; cursor: pointer; font-size: 16px;vertical-align: bottom;margin-left: 3px;"></i>
                           </div> --}}
                        </div>
                     </td>
                     <td style="min-width: 154px; max-width: 80px;padding: 15px !important">
                        <div class="d-flex justify-content-between">
                           <span class=" titleColumn">Drawing:</span>
                           @php
                           $userEmail = auth()->user()->email;
                           $email = '';
                           @endphp
                       
                           @if(isset($item->designerAssign) && $userEmail == $item->designerAssign->email)
                                 @php $email = $item->designerAssign->email; @endphp
                           @elseif(isset($item->checkerAssign) && $userEmail == $item->checkerAssign->email)
                                 @php $email = $item->checkerAssign->email; @endphp
                           @endif
                         
                              <a href="{{ route('designer.uploaddesign', Crypt::encrypt($item->id).'/?mail='.$email.'&job=1') }}"
                              target="_blank"><i class="fa fa-plus"></i>
                              </a>
                              <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;position: relative !important;bottom:3px !important; ">
                                 <span style="font-size: 10px; color: #black;" class="fa fa-eye" title="Upload Drawings"></span>
                             </p>
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

<div class="modal  fade" id="AssignProjectModal" style="width: 100%">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <input type="hidden" name="assigned_task" id="assigned_task" />
      
         </div>
      </div>
   </div>
</div>
<div class="modal  fade" id="DesignCheckCertModal2">
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
                           <th scope="col">Completed(%)</th>
                           <th scope="col">Description</th>
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
<div class="modal fade" id="allocationDesignerModal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
           
         </div>
      </div>
   </div>
</div>
@include('dashboard.modals.drawingdesign')
@include('dashboard.modals.drawingdesignlist')
@include('dashboard.modals.description')
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
       $("#temp_work_id2").val($(this).attr('data-id'));
       var temporary_work_id = $(this).attr('data-id');
       var userid = {{Auth::user()->id}}
       $("#commenttable").html('');
       $.ajax({
           url: "{{route('temporarywork.get-comments')}}",
           method: "get",
           data: {
               id: userid,
               temporary_work_id: temporary_work_id,
               type: 'client'
           },
           success: function(res) {
               res=JSON.parse(res);
               // console.log(res.comment)
               console.log(res.comment)
               // $("#commenttable").html(res.comment);
               $("#twccommenttable").html(res.twccomment);
               $("#twccommenttable2").html(res.twclientcomments);
               $(".comments_form").show();
               $("#comment_modal_id").modal('show');
           }
       });
   
   });
   //desc 
   $(".desc").on('click', function() {
       var desc = $(this).attr('title');
       $("#desc").html(desc);
       $("#desc_modal_id").modal('show');
   })
</script>
<script type="text/javascript">
      $(document).on('click', '#time-estimator', function() {
            var temporary_work_id = $(this).data('rowid');
              // $.LoadingOverlay("show");
              var CSRF_TOKEN = '{{ csrf_token() }}';
              $.post("{{ route('award-estimator-modal') }}", {
                  _token: CSRF_TOKEN,
                  temporary_work_id: temporary_work_id
              }).done(function(response) {
                  // Add response in Modal body
                  $('#AssignProjectModal .modal-body').html(response);
                  // Display Modal
                  $('#AssignProjectModal').modal('show');
                  // $.LoadingOverlay("hide");
              });
      });

      $(document).on('click', '#time-estimator-checker', function() {
            var temporary_work_id = $(this).data('rowid');
              // $.LoadingOverlay("show");
              var CSRF_TOKEN = '{{ csrf_token() }}';
              $.post("{{ route('award-estimator-modal-checker') }}", {
                  _token: CSRF_TOKEN,
                  temporary_work_id: temporary_work_id
              }).done(function(response) {
                  // Add response in Modal body
                  $('#DesignCheckCertModal2 .modal-body').html(response);
                  // Display Modal
                  $('#DesignCheckCertModal2').modal('show');
                  // $.LoadingOverlay("hide");
              });
      });

   
      $(document).on('click', '#allocated-designer', function() {
         var temporary_work_id = $(this).data('rowid');         // Your code here

            var CSRF_TOKEN = '{{ csrf_token() }}';
              $.post("{{ route('allocated-designer-modal') }}", {
                  _token: CSRF_TOKEN,
                  temporary_work_id: temporary_work_id
              }).done(function(response) {
                  // Add response in Modal body
                  $('#allocationDesignerModal .modal-body').html(response);
                  // Display Modal
                  $('#allocationDesignerModal').modal('show');
                  // $.LoadingOverlay("hide");
              });
      });

         //upload drawing and design
      $(".uploaddrawinglist").on('click', function() {
         var tempworkid = $(this).attr('data-id');
         console.log("id",tempworkid)
      
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
@endsection