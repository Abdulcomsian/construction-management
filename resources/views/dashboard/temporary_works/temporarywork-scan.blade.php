@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style> 
  

    .card>.card-body {
        padding: 32px;
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

   
    
.btn.btn-primary{
    border-color: #07d564 !important;
background-color: #07d564 !important;
border-radius: 8px;
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
                    <h1 class="passionate text-dark fw-bolder my-1 fs-3" style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">Description of Temporary work</h1>
                    </div>
                    <!--begin::Card toolbar-->
                    
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                              <div class="card-body" style="text-align: center;">
                                <a href="{{route('show.scan.temporarywork',$id . '?temp=' .$tempid. '')}}" class="btn btn-primary" style="color:white;padding:50px;"><i class="fa fa-eye"></i> View</a>
                              </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-sm-12">
                            <div class="card">
                              <div class="card-body" style="text-align: center;">
                                <button style="padding: 50px 18px 50px 29px;" href="#" class=" addcomment btn btn-primary" data-id="{{$temporary_work_id}}"><i class="fa fa-plus"></i> Add Comment</button>
                              </div>
                            </div>
                        </div>
                        
                    </div>
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
            res=JSON.parse(res);
           $("#commenttable").html(res.comment);
           $("#comment_modal_id").modal('show');
        }
      });
     
    });
</script>
@endsection
