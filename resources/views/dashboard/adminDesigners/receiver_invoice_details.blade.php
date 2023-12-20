@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])

@section('styles')
<style>
    .card>.card-body {
        padding: 0;
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
        =
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
        background-color: #f5f8fa;
        position: sticky;
        top: 0px;
        z-index: 99;
    }

    table thead th {
        color: #fff !important;
        text-align: left;
        padding: 10px !important;
        font-size: 16px !important;
        font-weight: 600 !important;
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

    .designBriefAccepted tr td {
        text-align: left;
        padding: 10px !important;
        /* font-family: 'Inter'; */
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
            <div class="card container" style="margin: 40px auto">
                <!--begin::Card header-->
               
                <div class="card-header border-0" style="padding-left:0px;">
                    <!--begin::Card title-->
                    <div class="card-title list_top" style="width:98%">
                        <h2 style="display: inline-block;">Invoice Payment Proof for Designer</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="invoice-payment-proof-form" action="{{route('save_invoice_payment_proof',['id'=>$id])}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-between">
                                   
                                    <div class="col-md-8">
                                        <div class="d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Invoice Details:</span>

                                            </label>
                                            <!--end::Label-->
                                            <textarea class="form-control form-control-solid" id="invoice_payment_details" name="invoice_payment_details"
                                                required="required"></textarea>
                                        </div>
                                    </div>
                                                                 
                                </div>       
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span >Upload Invoice Receipt:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type = "file" class="form-control form-control-solid" name = "attachfile"/>
                                        </div>
                                    </div>
                                 
                                    <div class="col-md-2 d-flex flex-column justify-content-center align-items-center pt-6">
                                        
                                        
                                            <button type="submit" class="btn btn-primary float-end" style="border-radius: 0.25rem;">Submit</button>
                                    
                                    </div>
                                </div>    
                        </div>
                    </form>

                    <hr  style="height: 2px;" class="mt-4"/>
              
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