@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style> 
  ::-webkit-scrollbar {
    width: 30px;
    height: 30px;
    min-height: 15px;
}
.aside-enabled.aside-fixed.header-fixed .header{
    left: 0px !important;
}
.aside-enabled.aside-fixed .wrapper{
    padding-left: 0px !important;
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
     .newDesignBtn {
        border-radius: 8px;
        background-color: #07d564;
        width: 150px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
        margin-right: 0px;
    }

    .newDesignBtn:hover {
        color: rgba(222, 13, 13, 0.66);
    }

    .card>.card-body {
        padding: 32px;
    }

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

    table tbody td {
        text-align: center;
        padding: 5px !important;
    }

    table thead {
        background-color: #f5f8fa;
        position: sticky;
        top: 0px;
        z-index: 999999999;
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
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .table td p{
        font-size: 12px !important;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label,
    .dataTables_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #000 !important;
    }

    table {
        margin-top: 20px;
    }
    .profileimg{
        border-radius: 50%;
    }
    
.btn.btn-primary{
    border-color: #07d564 !important;
background-color: #07d564 !important;
border-radius: 8px;
}
.form-control,.form-control:focus{
    border:1px solid #b5b5c3;
    border-radius: 8px;
}
.table th:first-child{
    padding: .75rem .75rem !important;
}
.menu-item{
    display: flex;
}
.menu-item .menu-link{
    flex: 0%;
}
.menu-sub-accordion.show, .show:not(.menu-dropdown)>.menu-sub-accordion{
    display: -webkit-inline-box;
}
.topMenu{
    background-color: #fff;
    padding: 30px;
    border:1px solid #e4e6ef!important
}
.topMenu a{
    color: #07d564 !important;
}
.sweet-alert{
            z-index:99999999999 !important;
        }
        .sweet-overlay{
             z-index:99999999999 !important;
        }
.btn-success{
    border-radius:8px;
    background: #9370DB !important;
}
</style>
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<div class="topMenu" style="padding-top:0px;">
<div class="card bg-white border-0 shadow rounded-lg" style="margin:0 auto;">
    </div>
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <!--begin::Title-->
                
                <!--end::Title-->
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
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title" style="width: 100%"> 
                    <h1 class="passionate text-dark fw-bolder my-1 fs-3" style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">Temporary Works Register</h1>
                    </div>
                    <!--begin::Card toolbar-->
                    
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="padding: 0px !important;vertical-align: middle;;" class="">TW ID</th>
                                    <th class="">Company</th>
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
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @forelse($temporary_works as $item)
                                <tr>
                                    <td style="padding: 0px !important;vertical-align: middle;min-width: 87px;font-size: 12px;"><a target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}</a></td>
                                    <td>{{ $item->company ?: '-' }}</td>
                                    <td>{{ $item->project->name ?: '-' }}</td>
                                    <td  style="min-width:210px;padding-left: 10px !important;padding-right: 10px !important;">
                                        <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                        <hr style="margin: 5px;;color:red;border:1px solid red">
                                        <button style="background: #07d564;font-size: 12px;border-radius: 10px" class="desc btn btn-info" data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}">
                                            Description
                                        </button>
                                    </td>
                                    <td style="">{{ $item->tw_category }}</td>
                                    <td style="">{{ $item->tw_risk_class ?: '-' }}</td>
                                    <td style="min-width: 60px; max-width: 80px;">{{ date('d-m-Y', strtotime($item->design_issued_date)) ?: '-' }}</td>
                                    <td style="width:90px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)[0]}};">
                                        <p ><b>{{date('d-m-Y', strtotime($item->design_required_by_date)) ?: '-' }}</b></p> </td>
                                    <td >
                                        <p class="addcomment cursor-pointer" style="margin-bottom:2px;font-weight: 400;font-size: 12px;"  data-id="{{$item->id}}"><span class="fa fa-plus"></span> Add Comment</p>
                                        <span data-id="{{$item->id}}" class="addcomment cursor-pointer" style="background: blue;color: white;font-weight: bold;padding: 0 10px;">{{count($item->comments) ?? '-'}}</span>
                                        <hr style="color:red;border:1px solid red; margin: 2px;">
                                       <h3 class="uploadfile  cursor-pointer" style="margin-bottom:0px;font-weight: 400;font-size: 14px;" data-id="{{$item->id}}" data-type="4">Add emails</h3>
                                      
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==4)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">E{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td style="">{{ $item->designer_company_name ?: '-' }}</td>
                                    <td style=""> 
                                        @foreach($item->uploadfile as $file)
                                          @if($file->file_type==1)
                                          <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="1"> {{date('d-m-Y', strtotime($file->created_at->todatestring()))}}
                                          </p>
                                            @break
                                          @endif
                                        @endforeach
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
                                    <td><p  class="uploadfile  cursor-pointer" data-id="{{$item->id}}" data-type="1" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;">Upload Drawings</p>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==1)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">D{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td >
                                        <p  class="uploadfile  cursor-pointer" data-id="{{$item->id}}" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative;top: -23px;" data-type="2">Upload DCC</p>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==2)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                        @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        <p class="permit-to-load cursor-pointer" style="margin-bottom:0px;font-weight: 400;font-size: 14px;position: relative; top: -7px;" data-id={{Crypt::encrypt($item->id)}}>Permit <br>to<br> load</p>
                                        @if(isset($item->permits[0]->id) || isset($item->scaffold[0]->id) )
                                        <button style="padding: 7px !important;border-radius: 10px;background-color:orange;" class="btn btn-info">Live ({{count($item->permits ?? 0)+count($item->scaffold ?? 0)}})</button>
                                        @else
                                        <button style="padding: 7px !important;border-radius: 10px" class="btn btn-primary">Closed</button>
                                        @endif
                                    </td>
                                    <td>
                                         <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;position: relative;top: -17px;" data-id={{Crypt::encrypt($item->id)}}>Permit<br> to <br>Unload</p>
                                    </td>
                                    <td  data-type="2">
                                        <p class="uploadfile cursor-pointer" data-id="{{$item->id}}" style="position: relative;top: -23px;margin-bottom:0px;font-weight: 400;font-size: 14px;" data-type="3">Upload RAMS</p>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==3)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">RAMS{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <br>
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
@include('dashboard.modals.comments')
@include('dashboard.modals.datemodal')
@include('dashboard.modals.permit_to_load');
@include('dashboard.modals.description');
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')

<script type="text/javascript">
    $(".addcomment").on('click',function(){
      $("#temp_work_id").val($(this).attr('data-id'));
      var temporary_work_id=$(this).attr('data-id');
       $("#commenttable").html('');
      $.ajax({
        url:"{{route('temporarywork.get-comments')}}",
        method:"get",
        data:{temporary_work_id:temporary_work_id,type:'qscan'},
        success:function(res)
        {
           $("#commenttable").html(res);
           $("#comment_modal_id").modal('show');
        }
      });
     
    });
</script>
<script type="text/javascript">
    $(".dateclick").on('click',function(){
        var file_type=$(this).attr('data-type');
        var tempid=$(this).attr('data-id');
        $.ajax({
        url:"{{route('temporarywork.file-upload-dates')}}",
        method:"get",
        data:{file_type:file_type,tempid:tempid},
        success:function(res)
        {
            $("#tablebody").html(res);
            $("#date_modal_id").modal('show');
        }
      });
      
    })
</script>
<script type="text/javascript">
    $(".permit-to-load").on('click',function(){
         id=$(this).attr('data-id');
            $.ajax({
            url:"{{route('permit.get')}}",
            method:"get",
            data:{id:id,scanuser:'scanuser'},
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
            $.ajax({
            url:"{{route('permit.get')}}",
            method:"get",
            data:{id:id,type:'unload',scanuser:'scanuser'},
            success:function(res)
            {
               $("#permitheading").html('Permit To Unload');
               $("#permitloadbutton").removeClass('d-flex').hide();
               $("#permitbody").html(res);
               $("#permit_modal_id").modal('show');
            }
          });
    })
   
    $(".desc").on('click',function(){
        var desc=$(this).attr('title');
        $("#desc").html(desc);
        $("#desc_modal_id").modal('show');
    })

    $(document).on('click',".commentstatus",function(){
       text=$(this).text();
       if(text=="Pending")
       {
        modaltext="Do you want to change Comment status to Fixed?";
       }
       else{
        modaltext="Do you want to change Comment status to Pending?";
       }
       commentid=$(this).attr('data-id');
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
            function(){
                    $.ajax({
                    url:"{{route('temporarywork.comments.status')}}",
                    method:"get",
                    data:{commentid,text},
                    success:function(res)
                    {
                        if(res=="success")
                        {
                            if(text=="Pending")
                            {
                                $t.text('Fixed');
                                $t.removeClass('btn btn-primary').addClass('btn btn-success');
                                 $("#comment_modal_id").modal('show');
                            }
                            else{
                                 $t.text('Pending');
                                 $t.removeClass('btn btn-success').addClass('btn btn-primary');
                                   $("#comment_modal_id").modal('show');
                            }
                            
                        }
                        else{
                             $t.text(text);
                        }
                    }
                });
                    
            });
        
       
   });

</script>
@endsection
