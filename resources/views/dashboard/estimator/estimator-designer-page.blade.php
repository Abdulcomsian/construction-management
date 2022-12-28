@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])

@section('styles')
<style>
    :root {
    --primary-border--radius:5px;
    }
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    .card>.card-body {
        padding: 32px;
    }
    .tab-content{
        background-color: white;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }
    .

    .card {
        margin: 30px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
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
        color: black;
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
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .inputDiv input {
        width: 90%;
        background-color: White !important;
        border-color: #d9dfe3 !important;
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
        margin: 10px 0px;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .border{
        border:1px solid red !important;
        border-bottom: 1px solid red !important;
    }
    .border-right{
        border-right:1px solid red !important;
         border-bottom: 1px solid red !important;
    }
    .border-bottom{
        border-bottom: 1px solid red !important;
    }
    input#exampleRadios1:checked[type=radio]{
        background: orange;
    }
    input#exampleRadios2:checked[type=radio]{
        background: green;
    }
    .nav-item{
        border-radius: 0px 35px 0px 0px;
        overflow: hidden;
    }
    .nav-item .tab{
        color: black;
        background: white;
    }
    .nav-item button.active{
        color: white !important;
    }
    input, button, table, select, textarea{
        border-radius: var(--primary-border--radius) !important;
    }
    .fileInput{
        margin-left: 9px !important;
    }
    .queryButton{
        margin-top: 10px;
    }
    table{
        overflow: hidden;
    }
    table thead{
        background-color: #000;
    }
    table thead tr th{
        color: #fff !important;
    }
    .query-table tbody tr {
        background: #f6f6f6 !important;
    }
    .designer-comment{
        background-color: #d7f7e6 !important;
        color: green !important;
    }
    .twc-reply{
        background-color: #fcadad !important;
        color: red !important;
    }
    .tab-pane.active{
        background: white !important;
    }
    .tab-pane{
        padding: 20px 28px;
    }
    .drawing_infoTable tbody tr:nth-child(odd){
        background: #c8e6c8 !important;
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
                <h1 class="passionate text-dark fw-bolder my-1 fs-3" style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">Temporary Works</h1>
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
        <div id="kt_content_container" class="container" style="padding-top: 80px">
            <div class="row">
                <div class=' d-flex col-md-6'>
                    <ul class="nav nav-tabs w-100 d-flex pt-0 flex-nowrap" id="myTab" role="tablist">
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100 active" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab1" aria-controls="signin" aria-selected="false" tabindex="-1">Price & Quotation</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab2" aria-controls="signin" aria-selected="false" tabindex="-1">Question & Answers</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab3" aria-controls="signin" aria-selected="false" tabindex="-1">Reviews</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <!-- tab 1 -->
                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        <!-- Estimator Work Table -->
                        <!--begin::Card title-->
                        <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Estimator Design Brief</h2>
                        </div>
                        <div class="row">
                            <div class="col" style="margin: 0 10px">
                                <table class="table query-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Project</th>
                                            <th>Company</th>
                                            <th>Attachement</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{$estimatorWork->project->name}}</td>
                                            <td>{{$estimatorWork->company}}</td>
                                            <td><a href="{{asset('estimatorPdf').'/'.$estimatorWork->ped_url}}">PDF</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <!--begin::Card title-->
                        <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Please Add price & quotaion</h2>
                        </div>
                    </div>
                    <form class="form-inline" action="{{route('designer.quotation')}}" method="post"enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="email" value="{{$mail}}"/>
                    <input type="hidden" name="estimatorId" value="{{$id}}"/>
                    <input type="hidden" name="estimator_designer_id" value="{{$esitmator_designer_id}}"/>
                    <div class="appendresult" style="background:white;margin: 0 4px;">
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group mx-sm-3 mb-2 d-flex" style="flex-direction: column">
                                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                   <span >Price:</span>
                                  </label>
                                   <input type="number" name="price[]" class="form-control"/>
                              </div> 
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mx-sm-3 mb-2 d-flex" style="flex-direction: column">
                                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                   <span >Description:</span>
                                  </label>
                                   <input type="text" name="description[]" placeholder="Enter Description" class="form-control">
                              </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span>Date:</span>
                                    </label>
                                    <input type="date" name="date[]" class="form-control fileInput" id="inputGroupFile02">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3 row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mt-5">
                                    <span></span>
                                    </label>
                                    <button type="button" class="btn btn-primary mb-2 queryButton add-more-price"><i class="fa fa-plus"></i>Add More</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mx-5">
                            <button type="submit" class="btn btn-primary mb-2 queryButton">Submit</button>
                        </div>
                    </div>
                    </form>
                    <hr>
                    <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Your Submitted Quotation</h2>
                        </div>
                    <div class="row">
                        <div class="col" style="margin: 0 10px">
                            <table class="table query-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @foreach($designerquotation as $quotaion)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$quotaion->price}}</td>
                                        <td>{{$quotaion->description}}</td>
                                        <td>{{$quotaion->date}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <!-- tab 2 -->
                <div class="tab-pane" id="tab2" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        <!--begin::Card title-->
                        <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Question Answer</h2>
                        </div>
                    </div>
                    <form class="form-inline" action="{{url('Estimator/estimator-designer/comments-save')}}" method="post"enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="email" value="{{$mail}}"/>
                    <input type="hidden" name="estimatorId" value="{{$id}}"/>
                    <input type="hidden" name="estimator_designer_id" value="{{$esitmator_designer_id}}"/>
                    <div style="background:white;margin: 0 4px;">
                        <div class="row">
                            
                            <div class="col-md-8">
                              <div class="form-group mx-sm-3 mb-2 d-flex" style="flex-direction: column">
                                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                   <span >Question:</span>
                                  </label>
                                   <textarea class="form-control" name="comment"></textarea> 
                              </div> 
                            </div>
                            <div class="col-md-3">
                              <div class="form-group mt-5">
                                    <button type="submit" class="btn btn-primary mx-5 queryButton">Submit</button>
                              </div> 
                            </div>
                            
                            
                        </div>
                    </div>
                    </form>
                    
                    <div class="row">

                        <div class="col" style="margin: 0 10px">
                            <table class="table query-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Designer's Comments</th>
                                        <th>Estimator Reply</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @foreach($comments as $cmt)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>
                                            <b>{{$cmt->comment_email}}</b><br>
                                            <p>{{$cmt->comment}}<br>{{$cmt->comment_date}}</p>

                                        </td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tab 2 -->
                <div class="tab-pane" id="tab3" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        <!--begin::Card title-->
                        <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Add Your reviews</h2>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(".add-more-price").on('click',function(){
        $(".appendresult").append(`<div class="row"><div class="col-md-3">
                              <div class="form-group mx-sm-3 mb-2 d-flex" style="flex-direction: column">
                                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                   <span >Price:</span>
                                  </label>
                                   <input type="number" name="price[]" class="form-control"/>
                
                              </div>
                                
                            </div>
                            <div class="col-md-4">
                              <div class="form-group mx-sm-3 mb-2 d-flex" style="flex-direction: column">
                                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                   <span >Description:</span>
                                  </label>
                                   <input type="text" name="description[]" placeholder="Enter Description" class="form-control">
                
                              </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3 row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span>Date:</span>
                                    </label>
                                    <input type="date" name="date[]" class="form-control fileInput" id="inputGroupFile02">
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3 row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mt-5">
                                    <span></span>
                                    </label>
                                    <button type="submit" class="btn btn-danger mb-2 queryButton remove"><i class="fa fa-minus"></i>Remove</button>
                                </div>
                                
                            </div></div>`);
    })

    $(document).on("click",".remove",function(){
        $(this).parent().parent().parent().remove();
    })
</script>
@endsection