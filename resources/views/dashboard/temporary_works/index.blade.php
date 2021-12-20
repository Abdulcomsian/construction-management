@extends('layouts.dashboard.master',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style> 
  ::-webkit-scrollbar {
    width: 30px;
    height: 30px;
    min-height: 15px;
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
    }

    table thead {
        background-color: #f5f8fa;
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


    .table.table-row-dashed tr {
        height: 120px;
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
</style>
@include('layouts.sweetalert.sweetalert_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Works</h1>
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
                    <div class="card-title">
                       
                    </div>
                    <!--begin::Card toolbar-->
                    <a href="{{ route('temporary_works.create') }}" style="width: 200px;" value="add" class="newDesignBtn btn project_details">New Temporary Work</a>
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
                        <div class="col-md-4 offset-md-2">
                             <form class="form-inline" method="get" action="{{route('tempwork.search')}}" >
                                <div class="row">
                                      <div class="form-group  col-md-8">
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
                    <div class="table-responsive">
                        <table class="table datatable align-middle table-row-dashed fs-6 gy-5 table-responsive" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="transform: rotate(-90deg);" class="">TW ID. No.</th>
                                    <th class="">Company</th>
                                    <th class="">Project Name</th>
                                    <th class="" style="max-width:210px;">Description of TWS</th>
                                    <th style="transform: rotate(-90deg);" class="">Design Check CAT</th>
                                    <th style="transform: rotate(-90deg);" class="">Implimentation Risk Class</th>
                                    <th class=""  style="transform: rotate(-90deg);">Issue Date of Design Brief</th>
                                    <th class=""  style="transform: rotate(-90deg);">Required Date of Design</th>
                                    <th class="">Comments</th>
                                    <th class="">TW designer (designer name and company)</th>
                                    <!-- <th class="">Appointments</th>  -->
                                    <th class=""  style="transform: rotate(-90deg);">Date Design Returned</th>
                                    <th class=""  style="transform: rotate(-90deg);">Date Design / Check Returned</th>
                                    <th class="">DRAWINGS and DESIGNS</th>
                                    <th class="">Design Check Certificate</th>
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
                                <!-- <tr>
                                    <td></td>
                                    <td>A16</td>
                                    <td>A2</td>
                                    <td>A10</td>
                                    <td>0</td>
                                    <td>H3</td>
                                    <td>A3</td>
                                    <td>A4</td>
                                    <td>A11 Drag and Drop emails</td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td></td>
                                    <td class="uploadfile">Drag and drop folders/ pdf drawings</td>
                                    <td>Drag and drop folders/ pdf drawings</td>
                                    <td></td>
                                    <td></td>
                                    <td>Drag and drop folders/ pdf drawings</td>
                                </tr> -->
                                @forelse($temporary_works as $item)

                                <tr>
                                    <td style="transform: rotate(-90deg);"><a target="_blank" href="{{asset('pdf'.'/'.$item->ped_url)}}">{{$item->twc_id_no}}</a></td>
                                    <td>{{ $item->company ?: '-' }}</td>
                                    <td>{{ $item->project->name ?: '-' }}</td>
                                    <td  style="max-width:210px;">
                                        <p style="font-weight:400;font-size:14px;">{{$item->design_requirement_text ?? ''}}</p>
                                        <hr style="color:red;border:1px solid red">
                                        <p data-toggle="tooltip" data-placement="top" title="{{ $item->description_temporary_work_required ?: '-' }}">
                                            {{ substr($item->description_temporary_work_required ?: '-',0,40).'.......' }}
                                        </p>
                                    </td>
                                    <td style="">{{ $item->tw_category ?: '-' }}</td>
                                    <td style="">{{ $item->tw_risk_class ?: '-' }}</td>
                                    <td>{{ $item->design_issued_date ?: '-' }}</td>
                                    <td style="{{HelperFunctions::check_date($item->design_required_by_date,$item->uploadfile)}};">
                                        <p style="background: #07d564;border: 1px solid 07d564;width: 103%;">{{$item->design_required_by_date ?: '-' }}</p> </td>
                                    <td >
                                        <p class="addcomment cursor-pointer" style="font-weight: 400;font-size: 12px;"  data-id="{{$item->id}}"><span class="fa fa-plus"></span> Add Comment</p>
                                        <span style="background: blue;color: white;font-weight: bold;padding: 0 10px;">{{count($item->comments) ?? '-'}}</span>
                                        <hr style="color:red;border:1px solid red">
                                       <h3 class="uploadfile  cursor-pointer" style="font-weight: 400;font-size: 14px;" data-id="{{$item->id}}" data-type="4">All Drag And Drop emails</h3>
                                       <br>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==4)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">E{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td style="transform: rotate(-90deg);">{{ $item->designer_company_name ?: '-' }}</td>
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
                                    <td style="transform: rotate(-90deg);"> 
                                        @foreach($item->uploadfile as $file)
                                          @if($file->file_type==1)
                                          <p class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="1"> {{$file->created_at->todatestring()}}
                                          </p>
                                            @break
                                          @endif
                                        @endforeach
                                    </td>
                                   <!--  <td></td> -->
                                    <td style="transform: rotate(-90deg);">
                                        @foreach($item->uploadfile as $file)
                                          @if($file->file_type==2)
                                           <p  class="dateclick cursor-pointer" data-id="{{$item->id}}" data-type="2">{{$file->created_at->todatestring()}}</p>
                                            @break
                                          @endif
                                        @endforeach
                                    </td>
                                    <td><p  class="uploadfile  cursor-pointer" data-id="{{$item->id}}" data-type="1" style="font-weight: 400;font-size: 14px;">Upload or Drag and drop folders</p><br>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==1)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">D{{$i}}</a></span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td >
                                        <p  class="uploadfile  cursor-pointer" data-id="{{$item->id}}" style="font-weight: 400;font-size: 14px;" data-type="2">Upload or Drag and drop folders</p>
                                        <br>
                                        @php $i=0;@endphp
                                        @foreach($item->uploadfile as $file)
                                        @if($file->file_type==2)
                                        @php $i++ @endphp
                                        <span><a href="{{asset($file->file_name)}}" target="_blank">DC{{$i}}</a></span>
                                        @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        <p class="permit-to-load cursor-pointer" style="font-weight: 400;font-size: 14px;" data-id={{Crypt::encrypt($item->id)}}>Permit to load</p>
                                        @if(isset($item->permits->id))
                                        <button class="btn btn-info">Live</button>
                                        @else
                                        <button class="btn btn-success">Closed</button>
                                        @endif
                                    </td>
                                    <td>
                                         <p class="permit-to-unload cursor-pointer" style="font-weight: 400;font-size: 14px;" data-id={{Crypt::encrypt($item->id)}}>Permit to Unload</p>
                                    </td>
                                    <td  data-type="2">
                                        <p class="uploadfile cursor-pointer" data-id="{{$item->id}}" style="font-weight: 400;font-size: 14px;" data-type="3">Upload or Drag and drop folders</p>
                                        <br>
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
                                        <a  href="{{route('tempwork.sendattach',$item->id)}}" class="btn btn-primary p-2 m-1"><i class="fa fa-arrow-right"></i></a>
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
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
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
               $("#permitheading").html('Permit To Unload');
               $("#permitloadbutton").removeClass('d-flex').hide();
               $("#permitbody").html(res);
               $("#permit_modal_id").modal('show');
            }
          });
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