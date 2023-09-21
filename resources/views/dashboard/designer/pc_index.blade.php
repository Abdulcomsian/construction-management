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
                        <h2 style="display: inline-block;">Design Brief for PC TWC to review, to accept, or reject with comments:</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="desingform" action="{{route('design.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <input type="hidden" name="tempworkid" value="{{$tempworkdetail->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-between">
                                   
                                    <div class="col-md-8">
                                        <div class="d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Comments for TWC:</span>

                                            </label>
                                            <!--end::Label-->
                                            <textarea class="form-control form-control-solid" id="comments" name="comments"
                                                required="required"></textarea>
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="col-md-5 d-flex justify-content-flex-start align-items-center"> -->
                                    <div class="col-md-4  d-flex justify-content-between align-items-center mt-5">
                                        <!-- <div class="d-flex align-items-baseline requiredDiv"> -->
                                        <div class="d-block">
                                            <label class="fs-6 fw-bold mb-2 mt-2">
                                                <span class="required">Select Y For Accepted Or N for Rejected:</span>

                                            </label>
                                            <!--begin::Radio group-->
                                            <div class="nav-group nav-group-fluid" style="max-width: 150px !important;">
                                                <label style="padding:0px  !important;">
                                                    <input type="radio" datacheck1='yes' class="btn-check" name="status"
                                                        value="1" checked />
                                                    <span
                                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label style="padding:0px !important;">
                                                    <input type="radio" datacheck1='no' class="btn-check" name="status"
                                                        value="2" />
                                                    <span
                                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="d-block">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Upload file:</span>

                                                </label>
                                                <!--end::Label-->
                                                <input type = "file" class="form-control form-control-solid" name = "attachfile"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 ">
                                            <div class="d-block">
                                                <!--begin::Label-->
                                                <label class="d-flex  fs-6 fw-bold mb-2">
                                                    <span class="required">Cc Email:</span>

                                                </label>
                                                <!--end::Label-->
                                                <input type = "email" class="form-control form-control-solid" name = "ccemail"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex flex-column justify-content-center align-items-center pt-6">
                                            
                                            
                                                <button type="submit" class="btn btn-primary float-end" style="border-radius: 0.25rem;">Submit</button>
                                       
                                        </div>
                                </div>
                            
                        </div>
                    </form>

                    <hr  style="height: 2px;" class="mt-4"/>
                    <!-- <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TWC ID NO</th>
                                <th>PDF</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr >
                                <td>1</td>
                                <td> {{$tempworkdetail->twc_id_no}}</td>
                                <td><a target="_blank" href="{{asset('pdf'.'/'.$tempworkdetail->ped_url)}}">PDF</a></td>
                                <td>
                                    @if($tempworkdetail->status==0)
                                    <span class="text-primary">Pending</span>
                                    @elseif($tempworkdetail->status==1)
                                     <span class="text-success">Approved</span>
                                    @else
                                     <span class="text-danger">Rejected</span>
                                    @endif
                                </td>
                            
                        </tbody>
                    </table> -->
                </div>
               <div class="row"> 
                    <div class="col-md-12">
                        <div class="d-block">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <h2 style="margin-top:20px;" class="">Communication Table:</h2>

                            </label>
                        </div>
                    </div>
               </div>
                <table class="table container" style="margin-top:0px;border-radius: 8px; overflow:hidden;">
                    <thead style="background: #07D564">
                        <tr>
                            <th style="width:50px;">No</th>
                            <th style="width:100px;">TWC ID</th>
                            <th style="width:200px;">Design Brief</th>
                            {{-- <th>Sent By</th> --}}
                            <th style="width:400px;">Comments by PC TWC</th>
                        </tr>
                    </thead>
                    <tbody class="designBriefAccepted">
                        @foreach($rejectedcomments as $cmt)
                        <tr>
                            <td  style="width:50px;">{{$loop->index+1}}</td>
                            <td style="width:100px;"> {{$tempworkdetail->twc_id_no}}</td>
                            <td style="width:200px;"><a href="{{asset('pdf/').'/'.$cmt->pdf_url}}">PDF</a><br><b>Sent
                                    by: </b> <span style="color: #9D9D9D">{{$cmt->email}}</span><br><b>Sent
                                    To: </b><span
                                    style="color: #9D9D9D">{{$tempworkdetail->pc_twc_email}}</span><br>
                                    
                                    <?php echo date('d-m-Y H:m:i', strtotime($cmt->created_at)) ?>
                            </td>
                            {{-- <td><b>{{$cmt->email}}</b><br><br><b>Sent To: &nbsp;
                                    <br> {{$tempworkdetail->pc_twc_email}}</b><br>{{$cmt->created_at}}</td> --}}
                            <td style="width:400px;"><b>Comment: </b>{{$cmt->comment}}<br>
                                @if(isset($cmt->comment))
                                <span style="color:#9D9D9D">{{$cmt->updated_at}}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
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