@extends('layouts.dashboard.master',['title' => 'Create Profile'])
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Create Profile</h1>
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
                    <li class="breadcrumb-item text-dark">Create Profile</li>
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
                    @if($companyProfile)
                     <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="cell-border table-hover table align-middle table-row-dashed fs-6 gy-5 table-responsive">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>S.No</th>
                                    <th>Company Name</th>
                                    <th>DI Email</th>
                                    <th>Address</th>
                                    <th>About</th>
                                    <th>Year Established</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Logo</th>
                                    <th>Cv</th>
                                    <th>Indemnity Insurance</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    <td>1</td>
                                    <td>{{$companyProfile->company_name}}</td>
                                    <td>{{$companyProfile->comapny_email}}</td>
                                    <td>{{$companyProfile->company_address}}</td>
                                    <td style="max-height: 200px;
    min-height: 200px;
    height: 200px;
    /* overflow: scroll; */
    text-overflow: ellipsis;
    width: max-content;
    display: block;
    max-width: 300px;">{{$companyProfile->company_description}}</td>
                                    <td>{{$companyProfile->year_established}}</td>
                                    <td>{{$companyProfile->phone}}</td>
                                    <td>{{$companyProfile->website}}</td>
                                    <td> 
                                        <img src="{{asset($companyProfile->logo)}}" width="100px" height="100px">
                                    </td>
                                    <td><a href="{{$companyProfile->company_cv}}" target="_blank">View cv</a> </td>
                                    <td>
                                        <a href="{{$companyProfile->indemnity_insurance}}" target="_blank">View Indemnity Insurance</a> 
                                    </td>
                                    <td><a href="{{url('adminDesigner/edit-profile',$companyProfile->id)}}"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <form method="post" action="{{url('adminDesigner/save-profile')}}" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Name OF Company</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Designer Name" name="company_name" value="{{old('name')}}" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Company Email</label>
                                    <input type="email" class="form-control form-control-solid" placeholder="Designer Email" name="comapny_email" value="{{old('email')}}" required />
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Address</label>
                                    <textarea class="form-control form-control-solid" placeholder="Enter Address" name="company_address" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Company Description</label>
                                    <textarea class="form-control form-control-solid" placeholder="Enter Company Description" name="company_description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Year Established</label>
                                    <input type="date" class="form-control form-control-solid" placeholder="Year" name="year_established" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Phone</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Company Phone" name="phone" required />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Website Link</label>
                                    <input type="url" class="form-control form-control-solid" placeholder="Company Website" name="website" required />
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Company Logo</label>
                                    <input type="file" class="form-control form-control-solid"  name="logo" required accept="image/png, image/gif, image/jpeg"/>
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
                                    <input type="file" class="form-control form-control-solid"  name="indemnity_insurance" required />
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="nomination_link_check" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            View Nomination LInk
                          </label>
                        </div>
                         <div class="d-flex flex-column mb-8 mt-2 fv-row fv-plugins-icon-container">
                            <h4>Upload  Other Documents</h4>
                            <div class="row appenddoc">
                                <div class="col-md-4 fv-row fv-plugins-icon-container">
                                    <label class=" fs-6 fw-bold mb-2">Name</label>
                                    <input type="text" class="form-control form-control-solid"  name="other_doucuments_name[]" />
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
                        <!-- <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold mb-2">Upload Other Files</label>
                                    <div class="uploadDiv" style="padding-left: 10px;">
                                        <div class="input-images"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Save
                        </button>

                    </form>
                    @endif
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
    })
</script>
@endsection