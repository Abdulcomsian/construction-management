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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<div class="topMenu" style="padding-top:0px;">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title btns_resp" style="width: 100%"> 
                        <h1 class="passionate text-dark fw-bolder my-1 fs-3" style="margin-left:0px !important;     font-size: 22px !important; width: 100%; text-align: center;font-size:21px; text-transform: uppercase;">Shared Temporary Works</h1>
                    </div>
                    <div class="form" style="float:left;width: 30% !important">
                            <form class="form-inline d-flex" method="get" action="{{route('sharedtempwork.proj.search')}}" >
                                <div class="col-10" >
                                <select name="projects[]"  class="form-control form-select form-select-lg form-select-solid" multiple="multiple"data-control="select2" data-placeholder="Select a Project" data-allow-clear="true">
                                    <option value="">Select Projects</option>
                                    @foreach($projects as $proj)
                                    <option value="{{$proj->id}}">{{$proj->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-2 col-sm-7 margintop">
                                    <button type="submit" class="btn btn-primary mb-2 w-100" style="padding: 1px; margin:8px 0px 0px 10px;width: 35px !important;"><span class="fa fa-filter"></span></button>
                                </div>
                            </form>
                        </div>
                        <div class="form" style="float:left;width: 30% !important">
                            <form class="form-inline d-flex" method="get" action="{{route('sharedtempwork.proj.search')}}" >
                                <div class="col-10" >
                                <select name="company"  class="form-control form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select Company" data-allow-clear="true">
                                    <option value="">Select Company</option>
                                    @foreach($projects as $proj)
                                    <option value="{{$proj->company->id}}">{{$proj->company->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-2 col-sm-7 margintop">
                                    <button type="submit" class="btn btn-primary mb-2 w-100" style="padding: 1px; margin:8px 0px 0px 10px;width: 35px !important;"><span class="fa fa-filter"></span></button>
                                </div>
                            </form>
                        </div>
                    <!--begin::Card toolbar-->
                    
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="row"> 

                        <div class="col-md-6" >
                            @if(\Auth::user()->hasRole('company') && \auth()->user()->image!='')
                             <img class="img img-thumbnail profileimg" src="{{\auth()->user()->image}}" width="150px" height="150px">
                            @endif  
                        </div>
                    </div>
                    <!--begin::Table-->
                     <div class="table-responsive tableDiv " style="height: 1000px;">
                        <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="padding: 0px !important;vertical-align: middle;;" class="">TW ID<br>Design Brief</th>
                                    @if(\Auth::user()->hasRole('admin'))
                                    <th class="">Company</th>
                                    @endif
                                    <th style="min-width: 80px; padding: 0px;" class="">Project Name</th>
                                    <th class="" style="max-width:210px;">Description of TWS</th>
                                    <th style="padding: 0px !important;vertical-align: middle;max-width: 75px;min-width:30px" class="">CAT Check</th>
                                    <th style="min-width: 40px;" class="">Risk Class</th>
                                    <th class=""  style="min-width:60px;">Issue Date<br> of Design Brief</th>
                                    <th class=""  style="">Required<br>Date<br>of<br>Design</th>
                                    <th class="">Comments</th>
                                    <th class="">TW designer<br> (designer name and company)</th>
                                    <!-- <th class="">Appointments</th>  -->
                                    <th class=""  style="padding: 12px;">Date<br> Design<br> Returned</th>
                                    <th class=""  style=" padding: 30px !important;">Date<br> DCC <br>Returned</th>
                                    <th class="">DRAWINGS<br> and<br> DESIGNS</th>
                                    <th class="">Design<br> Check<br> CERT</th>
                                    <th class="">Permit to Load</th>
                                    <th class="">Permit to Unload</th>
                                    <th class="">RAMS</th>
                                    <th class="">Qrcode</th>
                                    <th>Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @forelse($temporary_works as $item)
                                <tr>
                                    <td style="padding: 0px !important;vertical-align: middle;min-width: 87px;font-size: 12px;"><a style="color:{{$item->status==0 || $item->status==2 ? 'red !important':'';}}" target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}</a></td>
                                    @if(\Auth::user()->hasRole('admin'))
                                    <td>{{ $item->company ?: '-' }}</td>
                                    @endif
                                    <td>{{ $item->project->name ?: '-' }}</td>
                                    <td  style="min-width:210px;padding-left: 10px !important;padding-right: 10px !important;">
                                        <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                        <hr style="margin: 5px;;color:red;border:1px solid red">
                                        <span class="desc cursor-pointer" style="width: 108px;padding: 2px;"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold label-light-success label-inline">Description</span>
                                        </span>
                                    </td>
                                    <td style="">{{ $item->tw_category }}</td>
                                    <td style="">{{ $item->tw_risk_class ?: '-' }}</td>
                                    <td style="min-width: 60px; max-width: 80px;">{{ date('d-m-Y', strtotime($item->design_issued_date)) ?: '-' }}</td>
                                    <td style="min-width:100px;">
                                        <span class="{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[1]}} desc cursor-pointer" style="border-radius:6px;width: 108px;padding: 2px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[0]}};"  data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}"><span class="label label-lg font-weight-bold  label-inline"><b>{{date('d-m-Y', strtotime($item->design_required_by_date)) ?: '-' }}</b></span>
                                    </td>
                                    <td >
                                         <p class="addcomment cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;" data-id="{{$item->id}}">
                                             <!-- <span class="fa fa-plus"></span> -->
                                             <br> Comment
                                          </p>
                                        @php
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
                                       <h3 class="@if($item->tempshare->comments_email==1){{'uploadfile'}}@endif  cursor-pointer" style="margin-bottom:0px;font-weight: 400;font-size: 14px;" data-id="{{$item->id}}" data-type="4">Add emails</h3>
                                      
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
                                           <p  class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">{{date('d-m-Y', strtotime($file->created_at->todatestring()))}}</p>
                                            @break
                                          @endif
                                        @endforeach
                                    </td>
                                    <td>
                                          <p class="uploaddrawinglist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             <span style="font-size: 18px;color:{{$dcolor}}"  class="fa fa-eye" title="View Drawings"></span>
                                          </p>
                                          <p class="assessmentlist cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size:  18px !important;position: relative;top: 0px;">
                                             <!-- View Drawings -->
                                             <span style="font-size: 18px;"  class="fa fa-file" title="View Calculation/Risk Assessment"></span>
                                          </p>
                                    </td>
                                    <td >
                                        <p  class="cursor-pointer" data-id="{{$item->id}}" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;" data-type="2">Upload DCC</p>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==2)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                        @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        <p class="permit-to-load cursor-pointer" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;" data-desc="{{$item->design_requirement_text}}" data-id={{Crypt::encrypt($item->id)}}>Permit <br>to<br> load</p>
                                        @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                        <button style="padding: 7px !important;border-radius: 10px;background-color:orange;" class="btn btn-info">Live ({{count($item->permits ?? 0)+count($item->scaffold ?? 0)}})</button>
                                        @else
                                        <button style="padding: 7px !important;border-radius: 10px" class="btn btn-success">Closed</button>
                                        @endif
                                    </td>
                                    <td>
                                         <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;position: relative;top: -17px;" data-desc="{{$item->design_requirement_text}}" data-id={{Crypt::encrypt($item->id)}}>Permit<br> to <br>Unload</p>
                                    </td>
                                    <td  data-type="2">
                                        <p class="cursor-pointer" data-id="{{$item->id}}" style="position: relative;top: -23px;margin-bottom:0px;font-weight: 400;font-size: 14px;" data-type="3">Upload RAMS</p>
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
                                        <img class="p-2" src="{{asset('qrcode/projects/'.$qrcode->qrcode.'')}}" width="100px" height="100px">
                                        @endif
                                    </td>
                                    <td>
                                         @if(\Auth::user()->hasRole('admin'))
                                        <form method="POST" action="{{route('temporary_works.sharedelete')}} " id="{{'form_' . $item->id}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <input type="hidden" name="user_id" value="{{$users[$loop->index]}}">
                                            <button type="submit" id="{{$item->id}}" class="confirm btn btn-danger p-2 m-1 ">
                                                <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                             <i style="padding:3px;" class="fa fa-trash-alt"></i>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
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
@include('dashboard.modals.upload-file')
@include('dashboard.modals.tw_name')
@include('dashboard.modals.comments')
@include('dashboard.modals.datemodal')
@include('dashboard.modals.permit_to_load');
@include('dashboard.modals.description');
@include('dashboard.modals.tempwork_share');
@include('dashboard.modals.designername')
@include('dashboard.modals.drawingdesignlist')
@include('dashboard.modals.risk_assessment')
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script> -->
<script src="{{asset('js/dropzone.js')}}"></script>

<script type="text/javascript">
    var role="{{ \Auth::user()->roles->pluck('name')[0] }}";
    console.log(role);
    Dropzone.options.dropzoneForm = {
    init: function () {
        // Set up any event handlers
       this.on("queuecomplete", function (file) {
          location.reload();
      });
    }
};
</script>
<script>
   
    $(".uploadfile").on('click',function(){
        $("#tempworkid").val($(this).attr('data-id'));
        $("#type").val($(this).attr('data-type'));
        $("#upload_file_id").modal('show');

    })
</script>
<script type="text/javascript">
    $(".addtwname").on('click',function(){
        $("#temp_work_idd").val($(this).attr('data-id'));
      var temporary_work_id=$(this).attr('data-id');
      var userid={{\Auth::user()->id}}
        $("#tw_modal_id").modal('show');
    })

    $(".addcomment").on('click',function(){
      $("#temp_work_id").val($(this).attr('data-id'));
      var temporary_work_id=$(this).attr('data-id');
      var showhide=$(this).attr('data-show');
      var userid={{\Auth::user()->id}}
       $("#commenttable").html('');
      $.ajax({
        url:"{{route('temporarywork.get-comments')}}",
        method:"get",
        data:{id:userid,temporary_work_id:temporary_work_id,type: 'normal'},
        success:function(res)
        {
           $("#commenttable").html(res);
           if(showhide=='show')
           {
            console.log("show");
            $(".comments_form").show();
           }
           else{
            console.log("hide");
                $(".comments_form").hide();
           }
           $("#comment_modal_id").modal('show');
        }
      });
     
    });
</script>
<script type="text/javascript">
    $(".permit-to-load").on('click',function(){
         id=$(this).attr('data-id');
          desc = $(this).attr('data-desc');
            $.ajax({
            url:"{{route('permit.get')}}",
            method:"get",
            data: {
               id: id,
               desc: desc,
               shared:'shared',
           },
            success:function(res)
            {
               $("#permitheading").html('Permit To Load');
               $("#permitloadbutton").addClass('d-flex').show();
               $("#permitbody").html(res);
               $(".temp_work_id").val(id);
               $("#permit_modal_id").modal('show');
            }
          });
         
    })

    //permit to unload
    $(".permit-to-unload").on('click',function(){
         id=$(this).attr('data-id');
          desc = $(this).attr('data-desc');
            $.ajax({
            url:"{{route('permit.get')}}",
            method:"get",
            data:{id:id,type:'unload','shared':'shared',desc: desc},
            success:function(res)
            {
                console.log(res);
               $("#permitheading").html('Permit To Unload');
               $("#permitloadbutton").removeClass('d-flex').hide();
               $("#permitbody").html(res);
               $("#permit_modal_id").modal('show');
            }
          });
    })

    //desc 
    $(".desc").on('click',function(){
        var desc=$(this).attr('title');
        $("#desc").html(desc);
        $("#desc_modal_id").modal('show');
    })

    //Add documents
    $(".adddocument").on('click',function(e){
        // if(role=='supervisor' || role=="scaffolder")
        // {
        //     alert("You are not allowed to add Documents");
        //     return false;
        // }
        // e.preventDefault();
        // $("#project-documents").hide();
        //  $(".project_doc_form").show();
        //  $("#project_document_modal_id").modal('show');
    });

    //view documents
    $(".viewdocument").on('click',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{route('project.document.get')}}",
            method:"GET",
            data:{},
            success:function(res)
            {
               $(".project_doc_form").hide();
               $("#project-documents").html(res);
               $("#project_document_modal_id").modal('show');
            }
        });
        
    });

    //share butto click envent
    // $(".sharebutton").on('click',function(e){
    //       e.preventDefault();
    //       var tempid=$(this).attr('data-id');
    //       $("#sharetempid").val(tempid);
    //     $("#tempwork_share_modal_id").modal('show');
    // })
    
</script>
<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/delete") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};

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
