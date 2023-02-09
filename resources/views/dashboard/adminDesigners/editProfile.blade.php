@extends('layouts.dashboard.master',['title' => 'Edit Profile'])
@section('styles')
<style>
    .addBtn {
        border-radius: 8px;
        float: right;
    }
    .btn.btn-active-color-primary:hover:not(.btn-active),
    .btn.btn-active-color-primary:hover:not(.btn-active) i{
    color: #07d564;
}
.modal .btn.btn-primary{
        border-color: #07d564 !important;
background-color: #07d564 !important;
    }
    .card>.card-header {
        align-items: center;
    }
    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
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
    .form-select.form-select-solid{
    color:black !important;
   }
   .avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}

.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > img {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}"/>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Edit Profile</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Admin</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Designer</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Edit Profile</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
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

                <!--begin::Card body-->
                <div class="card-body pt-7">
                    <form method="post" action="{{url('adminDesigner/update-profile',$editProfile)}}" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-4 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Company Logo</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="logo" accept=".png, .jpg, .jpeg" onchange="previewFile()"/>
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <img id="imagePreview" src="{{asset($editProfile->logo)}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Name OF Company</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Designer Name" name="company_name" value="{{old('name',$editProfile->company_name)}}" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Company Email</label>
                                    <input type="email" class="form-control form-control-solid" placeholder="Designer Email" name="comapny_email" value="{{old('email',$editProfile->comapny_email)}}" required />
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Address</label>
                                    <textarea class="form-control form-control-solid" placeholder="Enter Address" name="company_address" required>{{$editProfile->company_address ?? ''}}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Company Description</label>
                                    <textarea class="form-control form-control-solid" placeholder="Enter Company Description" name="company_description" required>{{$editProfile->company_description ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Year Established</label>
                                    <input type="date" class="form-control form-control-solid" placeholder="Year" name="year_established" required  value="{{$editProfile->year_established}}" />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Phone</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Company Phone" name="phone" required value="{{$editProfile->phone}}" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Website Link</label>
                                    <input type="url" class="form-control form-control-solid" placeholder="Company Website" name="website" required value="{{$editProfile->website}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold mb-2">Upload cv</label>
                                    <input type="file" class="form-control form-control-solid"  name="company_cv" />
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Upload Professional indemnity insurance</label>
                                    <input type="file" class="form-control form-control-solid"  name="indemnity_insurance"  />
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="nomination_link_check" id="flexCheckDefault" {{$editProfile->nomination_link_check ? 'checked':''}}>
                          <label class="form-check-label" for="flexCheckDefault">
                            View Nomination LInk
                          </label>
                        </div>
                        <div class="d-flex flex-column mb-8 mt-2 fv-row fv-plugins-icon-container">
                            <h4>Upload  Other Documents</h4>
                            @if(count($editProfile->otherdocs)>0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S-no</th>
                                        <th>Document Name</th>
                                        <th>Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($editProfile->otherdocs as $doc)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$doc->name}}</td>
                                    <td><a href="{{asset($doc->file)}}">File</a></td>
                                    <td>
                                        <button type="button" class="deleteFile" data-id="{{$doc->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            @endif
                            <div class="row appenddoc">
                                <div class="col-md-4 fv-row fv-plugins-icon-container">
                                    <label class=" fs-6 fw-bold mb-2">Name</label>
                                    <input type="text" class="form-control form-control-solid"  name="other_doucuments_name[]"  />
                                </div>
                                <div class="col-md-4 fv-row fv-plugins-icon-container">
                                    <label class=" fs-6 fw-bold mb-2">Document</label>
                                    <input type="file" class="form-control form-control-solid"  name="other_doucuments_document[]" />
                                </div>
                                <div class="col-md-4 fv-row fv-plugins-icon-container" style="margin-top:28px">
                                    <button type="button" class="btn btn-primary addmoredoucument"><i class="fa fa-plus"></i> Add More</button>
                                </div>
                            </div>
                        </div>
                        
                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Save
                        </button>
                    </form>
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
<script>
      $(".addmoredoucument").on('click',function(){
        $(".appenddoc").after(`<div class="row">
                                <div class="col-md-4 fv-row fv-plugins-icon-container">
                                    <label class=" fs-6 fw-bold mb-2">Name</label>
                                    <input type="text" class="form-control form-control-solid"  name="other_doucuments_name[]"/>
                                </div>
                                <div class="col-md-4 fv-row fv-plugins-icon-container">
                                    <label class=" fs-6 fw-bold mb-2">Document</label>
                                    <input type="file" class="form-control form-control-solid"  name="other_doucuments_document[]"/>
                                </div>
                                <div class="col-md-4 fv-row fv-plugins-icon-container" style="margin-top:28px">
                                    <button type="button" class="btn btn-danger remove"><i class="fa fa-minus"></i> Remove</button>
                                </div>
                                </div>`);
    });

    $(document).on('click','.remove',function(){
        $(this).parent().parent().remove();
    });

    $(document).on('click','.deleteFile',function(){
           let id=$(this).attr('data-id');
           let current=$(this);
           Swal.fire({
                  title: "Are you sure?",
                  text: "You will not be able to recover this imaginary file!",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel plx!",
              }).then((result) => {
                    if (result.isConfirmed)
                        $.ajax({
                           url: "{{route('delete.companydocs')}}",
                           method: "get",
                           data: {
                               id
                           },
                           success: function(res) {
                              if(res=="success")
                              {
                                current.parent().parent().remove();
                              } 
                              else{
                                swal.fire("something went wrong");
                              }
                           }
                       }); 
                    else
                        swal.fire("Error!", "Coudn't delet!", "error");
                });
    
        })
</script>
@endsection