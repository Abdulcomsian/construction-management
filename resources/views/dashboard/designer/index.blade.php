@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])

@section('styles')
<style>

    .card>.card-body {
        padding: 32px;
    }
    #kt_content_container{
        background-color: #e9edf1;
    }
    #kt_toolbar_container{
        background-color:#fff;
        
        
    }
    .card{
        margin: 30px 0px;
        border-radius: 10px !important;   
        border: none !important; 
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
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
        background-color: #000;
    }

    table thead th {
        color: #fff !important;
        text-align: center;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .inputDiv input {
        width: 50%;
        color: #000;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        width: 40%;
        color: #000;
    }
    .select2-container{width:250px !important;}
    .inputDiv {
        margin: 20px 0px;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

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
                <h1 class="text-dark fw-bolder my-1 fs-3" style="width: 100%; text-align: center;">Temporary Work</h1>
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
                    <div class="card-title list_top" style="width:98%">
                        <h2 style="display: inline-block;">Upload Designes</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="desingform" action="{{route('designer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <input type="hidden" name="tempworkid" value="{{$id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Number:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input  type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_number" name="drawing_number"  value="{{old('drawing_number')}}" required="required">
                                        </div>
                                   </div>
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Comments:</span>

                                            </label>
                                            <!--end::Label-->
                                            <textarea class="form-control" id="comments" name="comments" required="required"></textarea>
                                        </div>
                                     </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">TWD Name:</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="TWD Name" id="twd_name" name="twd_name" value="{{old('twd_name', $twd_name->twc_name)}}"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Title:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="email" class="form-control form-control-solid" placeholder="Drawing title" id="drawing_title" name="drawing_title" value="{{old('drawing_title')}}"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="file" class="form-control form-control-solid"  id="file" name="file"  style="background: #f5f8fa" required>
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                         <div class="d-flex inputDiv requiredDiv">
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Preliminary/ For approval</span>

                                            </label>
                                            <!--begin::Radio group-->
                                             <div class="nav-group nav-group-fluid">
                                                <label>
                                                    <input type="radio" class="btn-check" name="preliminary_approval" value="1" checked />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" class="btn-check" name="preliminary_approval" value="2" />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                </label>
                                            </div>
                                     </div>
                                   </div>

                                   <div class="col-md-3">
                                         <div class="d-flex inputDiv requiredDiv">
                                             <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">For construction</span>

                                            </label>
                                            <!--begin::Radio group-->
                                             <div class="nav-group nav-group-fluid">
                                                <label>
                                                    <input type="radio" class="btn-check" name="construction" value="1" checked />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" class="btn-check" name="construction" value="2" />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                </label>
                                            </div>
                                     </div>
                                   </div>
                                </div>
                                 <br>
                                 <button  type="submit" class="btn btn-primary float-end">Submit</button>
                            </div>
                        </div> 
                    </form>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>S-no</th>
                                <th>Drawing Number</th>
                                <th>Comments</th>
                                <th>TWD Name</th>
                                <th>Drawing Title</th>
                                <th>Preliminary/ For approval</th>
                                <th>For construction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($DesignerUploads as $uploads)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$uploads->drawing_number}}</td>
                                <td>{{$uploads->comments}}</td>
                                <td>{{$uploads->twd_name}}</td>
                                <td>{{$uploads->drawing_title}}</td>
                                <td>{{$uploads->preliminary_approval==1?'Yes':'No'}}</td>
                                <td>{{$uploads->construction==1?'Yes':'No'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endsection
