@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])

@section('styles')
<style>
    .card>.card-body {
        padding: 32px;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

    .card {
        margin: 30px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
        border-collapse: collapse;
        /* background-color: red; */
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
        background-color: white;
    }

    table thead th {
        color: #000 !important;
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

    .select2-container {
        width: 250px !important;
    }

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
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1"
                style="width: 100%; text-align: center;">
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
                        <h2 style="display: inline-block;">Permit Load Acceptance</h2>
                    </div>
                </div>
                <div class="card-body pt-0">

                    <form id="desingform" action="{{route('design.permit.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <input type="hidden" name="permitid" value="{{$permitload->id}}">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Comments:</span>

                                            </label>
                                            <!--end::Label-->
                                            <textarea class="form-control" id="comments" name="comments"
                                                required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center requiredDiv">
                                            <label class="fs-6 fw-bold required">
                                                <!-- <span class="required">Accept:</span> -->
                                                Accept
                                            </label>
                                            <!--begin::Radio group-->
                                            <div class="nav-group nav-group-fluid" style="min-width:160px !important">
                                                <label>
                                                    <input type="radio" datacheck1='yes' class="btn-check" name="status"
                                                        value="1" checked />
                                                    <span
                                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" datacheck1='no' class="btn-check" name="status"
                                                        value="5" />
                                                    <span
                                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="type" value="permit-load" />

                                    <div class="col-md-2">
                                        <div class="d-flex inputDiv requiredDiv">
                                            <label> </label>
                                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                                        </div>
                                        <div>
                                        </div>



                                    </div>
                                </div>
                    </form>
                    <hr>
                    <h4>Comments/Summary</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 8.5%">NO</th>
                                <th style="width: 37.7%;">Permit No</th>
                                <th>comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commetns as $cmt)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$permitload->permit_no}}</td>
                                <td>{{$cmt->comment}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Permit No</th>
                                <th>PDF</th>


                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td> {{$permitload->permit_no}}</td>
                                <td><a target="_blank" href="{{asset('pdf'.'/'.$permitload->ped_url)}}">Permit to load
                                        for Approval</a>
                                </td>
                            </tr>
                            @isset($permitload->permitLoadRejecteds)
                            @foreach($permitload->permitLoadRejecteds as $index=>$rejected_permit_load)
                            <tr>
                                <td>1-{{$index+1}}</td>
                                <td> {{$permitload->permit_no}}</td>
                                <td><a target="_blank" href="{{asset('pdf'.'/'.$rejected_permit_load->filename)}}">Rejected</a>
                                </td>
                            </tr>
                            @endforeach
                            @endisset


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