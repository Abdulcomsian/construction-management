@extends('layouts.dashboard.master-index',['title' => 'Temporary Works'])
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
</style>
@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<div class="topMenu" style="padding-top:0px;">
<div class="card bg-white border-0 shadow rounded-lg" style="margin:0 auto;">
		<div class="d-flex align-items-center justify-content-center flex-wrap px-5 py-5 px-md-10 py-md-9">
			<!--begin::Menu-->
			<a data-toggle="tooltip" class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{route('projects.index')}}" target="" title="" data-original-title="With Bootstrap&nbsp;5">Projects</a>
			@if(\Auth::user()->hasAnyRole(['admin', 'company']))
			<a data-toggle="tooltip" class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('companies.index') }}" target="" title="" data-original-title="With Bootstrap&nbsp;4">Companies</a>
			@endif
			@if(\Auth::user()->hasAnyRole(['admin', 'company']))
			<a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('users.index') }}" target="">Users</a>
			@endif
			<a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('temporary_works.index') }}" target="">All Listings</a>
			<a class="btn btn-lg btn-light-hover-primary text-uppercase font-size-1 font-size-md-3 letter-spacing-sm font-weight-boldest px-3 px-md-6 mr-1 mr-md-2 " href="{{ route('temporary_works.create') }}" target="">Add New Temporary Work</a>
		</div>
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
                        <span style="width:200px"> 
                            <a style="min-width:220px;max-width: 500px;color:#fff !important; margin-top: 20px;text-transform: uppercase;" href="{{ route('Designbrief.export') }}" class="newDesignBtn">Export Data</a>
                        </span>
                    <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center; font-size:45px !important; text-transform: uppercase;">Temporary Works Register</h1>
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
                            <a href="{{ route('temporary_works.create') }}" style="min-width:220px;max-width: 500px;color:#fff !important; margin-top: 20px;text-transform: uppercase;" value="add" class="newDesignBtn btn project_details">New Design Brief / Temporary Work</a>

                        </div>

                        <div class="col-md-4 offset-md-2">
                             <form class="form-inline" method="get" action="{{route('tempwork.search')}}" >
                                <div class="row">
                                      <div class="form-group  col-md-2">
</div>
                                      <div class="form-group  col-md-6">
                                        <label  class="text-white">Search</label>
                                        <input type="text" class="form-control" name="terms" required="required" />
                                      </div>
                                      <div class="col-md-4 mt-6">
                                        <button type="submit" class="btn btn-primary mb-2 w-100"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--begin::Table-->
                    <div class="table-responsive" style="height: 1000px;">
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
                                    <td style="width:90px;{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)}};">
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
                                        <button style="padding: 7px !important;border-radius: 10px" class="btn btn-success">Closed</button>
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
                                        <a  href="{{route('tempwork.sendattach',$item->id)}}" class="btn btn-primary p-2 m-1"><i class="fa fa-arrow-right"></i></a>
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
@include('dashboard.modals.comments')
@include('dashboard.modals.datemodal')
@include('dashboard.modals.permit_to_load');
@include('dashboard.modals.description');
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
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
        if(role=='supervisor' || role=="scaffolder")
        {
            alert("You are not allowed to add File");
            return false;
        }
        $("#tempworkid").val($(this).attr('data-id'));
        $("#type").val($(this).attr('data-type'));
        $("#upload_file_id").modal('show');

    })
</script>
<script type="text/javascript">
    $(".addcomment").on('click',function(){
       if(role=='supervisor' || role=="scaffolder")
        {
            alert("You are not allowed to add comment");
            return false;
        }
      $("#temp_work_id").val($(this).attr('data-id'));
      var temporary_work_id=$(this).attr('data-id');
      var userid={{\Auth::user()->id}}
       $("#commenttable").html('');
      $.ajax({
        url:"{{route('temporarywork.get-comments')}}",
        method:"get",
        data:{id:userid,temporary_work_id:temporary_work_id},
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
        if(role=='supervisor' || role=="scaffolder")
        {
            alert("You are not allowed to add comment");
            return false;
        }
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
            data:{id:id},
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
            data:{id:id,type:'unload'},
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
   
    $(".desc").on('click',function(){
        var desc=$(this).attr('title');
        $("#desc").html(desc);
        $("#desc_modal_id").modal('show');
    })
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



</script>
@endsection
