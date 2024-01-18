@extends('layouts.dashboard.master',['title' => 'View Estimator'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style>

#kt_content_container .card-header .topRightMenu {
        position: absolute;
        right: 15px;
        top: 15px;
    }
    /* #kt_aside:hover{
       width: 265px;
    }
  
    #kt_aside .userIconLink:hover .aside-logo img{
       display: block !important;
       
    }
    #kt_aside:hover .menu-title{
       opacity: 1 !important;
    }
    #kt_aside .menu-title{
       opacity: 1 !important;
    } */
    /* #kt_aside:hover .menu-sub-accordion{
       height: auto !important;
    } */
    /* #kt_aside .menu-sub-accordion{
       height: auto;
    } */
    /* #kt_aside_toggle .rotate-180{
        transform: rotateZ(180deg);
    }
   .view_column::after{color:#000 !important;}
   .nav-tabs .nav-link.active{border-radius:8px !important;}
   ::-webkit-scrollbar {
   width: 30px;
   height: 30px;
   min-height: 15px;
   } */
   /* .aside-enabled.aside-fixed[data-kt-aside-minimize=on] .wrapper{
   padding-left: 75px !important;
   } */
   /* .menu-title{
   opacity: 0;
   }
   .menu-sub-accordion{
   height: 0px;
   } */
   /* #kt_aside_toggle{
      position: relative;
      right: 15px;
   } */
   /* .menu-icon i{
      font-size: 22px !important;
   } */
   /* #kt_aside:hover  #kt_aside_toggle{
      right: 0px;
   } */
   /* .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg{
      padding: 0px 10px;
   } */
   /* .aside-enabled.aside-fixed .wrapper{
   padding-left: 30px;
   } */
   /* .menu-item,
   .menu-sub-accordion.show, .show:not(.menu-dropdown)>.menu-sub-accordion{
   display: block !important;
   } */
   /* ::-webkit-scrollbar {
   width: 30px;
   height: 30px;
   min-height: 15px;
   } */
   /* .aside-enabled.aside-fixed.header-fixed .header {
   left: 0px !important;
   } */
   /* .aside-enabled.aside-fixed.header-fixed .header {
   border-bottom: 1px solid #e4e6ef !important;
   } */

/* below is fine  */
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

      /* below is fine  */
   /* .activeAside{
   width: 265px !important;
   }
   .activeSubMenu{
   height: auto !important;
   } */
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
   /* #kt_header{
      display: none;
   } */
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
   /* .menu-item {
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
   } */
    
    /*code is fine below */
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

    /* Define the blinking animation */
    @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }

    /* Apply the animation to the Font Awesome icon */
    .blinking-icon {
      animation: blink 1s infinite;
      color: red;
    }


    
    
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
        border-collapse: separate;
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

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

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

    table thead th {
        padding: 3px 18px 3px 10px;
        border-bottom: 0;
        color: #ff0000;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        * cursor: hand;
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

    #modal1 th {
    text-align: center!important;
}
    .circle.unblink{
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(92, 92, 92);
        margin: auto;
    }

    .circle.blink {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(30, 255, 0);
        animation: blink 1s infinite;
        margin: auto;
        cursor: pointer;
    }

    .circle.danger-blink {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: rgb(255, 30, 0);
        animation: blink 1s infinite;
        margin: auto;
        cursor: pointer;
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    } 

</style>
@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('content')
@include('layouts.dashboard.header')
<div class="content d-flex flex-column flex-column-fluid temporary_blade" id="kt_content">
   {{--
      <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">List of Estimator Briefs</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
      </div> --}}
   <div class="topMenu" style="padding-top:0px;background:#e9edf1">
      <div class="post d-flex flex-column-fluid" id="kt_post" style="margin-top:75px !important;">
         <!--begin::Container-->
         
         <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
               <!--begin::Card header-->
               <div class="card-header border-0 pt-6">
                  <!--begin::Card title-->
                  <div class="card-title" style="    float: left;padding-top: 15px;">
                      <h2>List of Precons for Estimation</h2>
                  </div>
              </div>
               <div class="card-body indexTempory pt-0">
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
                              @foreach($estimatorWork as $work)
                              <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$work->project->name}}</td>
                                <td>{{$work->project->company->name}}</td>
                                <td>{{Auth::user()->email}}</td>
                                @php $getCode = \App\Models\EstimatorDesignerList::where(['temporary_work_id'=>$work->id,'email'=>auth()->user()->email])->pluck('code'); @endphp
                                <td>
                                    <a href="{{route('estimator.designer',$work->id.'/?mail='.auth()->user()->email.'&code='.Crypt::encrypt($getCode))}}" target="_blank"><i class="fa fa-eye @if(!$work->thisDesignerQuote) blinking-icon @endif"></i>
                                    </a>
                                </td>
                              </tr>
                              @endforeach
                             </tbody>
                             <!--end::Table body-->
                          </table>
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