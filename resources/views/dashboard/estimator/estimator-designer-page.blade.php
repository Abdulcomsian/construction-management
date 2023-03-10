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

     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
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
                <div class=' d-flex col-md-8'>
                    <ul class="nav nav-tabs w-100 d-flex pt-0 flex-nowrap" id="myTab" role="tablist">
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100 active" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab1" aria-controls="signin" aria-selected="false" tabindex="-1">Price & Quotation</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab2" aria-controls="signin" aria-selected="false" tabindex="-1">Question & Answers</button>
                        </li>
                         <li class="nav-item w-100" role="presentation">
                            <button class="@if($record->public_message) {{'redBgBlink'}} @endif nav-link tab btn btn_outline w-100" id="public_qa"  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab3" aria-controls="signin" aria-selected="false" tabindex="-1">Public Q&A</button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab4" aria-controls="signin" aria-selected="false" tabindex="-1">Awarded Contracts</button>
                        </li>
                        <!-- <li class="nav-item w-100" role="presentation">
                            <button class="nav-link tab btn btn_outline w-100" id=""  type="button" role="tab" data-bs-toggle="tab" data-bs-target="#tab4" aria-controls="signin" aria-selected="false" tabindex="-1">Reviews</button>
                        </li> -->
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
                            <div class="col">
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
                                   <input type="number" name="price[]" class="form-control" placeholder="Enter Price" />
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
                                    <span>Submittal Date:</span>
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
                        <div class="col">
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
                                        <td>${{$quotaion->price}}</td>
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

                        <div class="col">
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
                                            <td style="width: 45%">
                                                <b>{{$cmt->comment_email}}</b><br>
                                                <p>{{$cmt->comment}}<br>{{$cmt->comment_date}}</p>

                                            </td>
                                            <td style="width: 45%">
                                                <b>{{$cmt->reply_email}}</b><br>
                                                <p>{{$cmt->reply}}<br>{{$cmt->reply_date}}</p>
                                            </td>
                                        </tr>
                                       
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tab 3 -->
                <div class="tab-pane" id="tab3" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        <!--begin::Card title-->
                        <div class="card-title list_top" style="width:98%">
                            <h2 style="display: inline-block;">Public Question Answer</h2>
                        </div>
                    </div>
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
                                    @foreach($public_comments as $cmt)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td style="width: 45%">
                                                <p>{{$cmt->comment}}<br>{{$cmt->comment_date}}</p>

                                            </td>
                                            <td style="width: 45%">
                                                <b>{{$cmt->reply_email}}</b><br>
                                                <p>{{$cmt->reply}}<br>{{$cmt->reply_date}}</p>
                                            </td>
                                        </tr>
                                       
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab4" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        <div class="container">
                            <div class="row">
                            <div class="col">
                                <table class="table query-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Project</th>
                                            <th>Company</th>
                                            <th>Attachement</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        @foreach($AwardedEstimators as $est)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$est->estimator->project->name}}</td>
                                            <td>{{$est->estimator->company}}</td>
                                            <td><a href="{{asset('estimatorPdf/'.$est->estimator->ped_url)}}">PDF</a></td>
                                            <td><a href="{{route('designer.uploaddesign',Crypt::encrypt($est->temporary_work_id).'/?mail='.$est->email)}}" target="_blank" title="View & Upload Design"><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>   
                </div>
                <!-- tab 4 -->
                {{-- <div class="tab-pane" id="tab4" role="tabpanel">
                    <div class="card-header border-0 pt-2">
                        @if($ratings)
                        <div class="container">
                            <div class="row">
                               <div class="col mt-4">
                                     <p class="font-weight-bold ">Review</p>
                                     <div class="form-group row">
                                        <div class="col">
                                           <div class="rated">
                                            @for($i=1; $i<=$ratings->star_rating; $i++)
                                              <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                            @endfor
                                            </div>
                                        </div>
                                     </div>
                                     <div class="form-group row mt-4">
                                        <div class="col">
                                            <p>{{ $ratings->comments }}</p>
                                        </div>
                                     </div>
                               </div>
                            </div>
                         </div>
                         @else
                            <div class="container">
                                <div class="row">
                                   <div class="col mt-4">
                                      <form class="py-2 px-4" action="{{url('Estimator/designer-review/save')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                         @csrf
                                         <input type="hidden" name="company" value="{{$company->company->id}}">
                                         <input type="hidden" name="email" value="{{$mail}}">
                                         <p class="font-weight-bold ">Review</p>
                                         <div class="form-group row">
                                            <div class="col">
                                               <div class="rate">
                                                  <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                  <label for="star5" title="text">5 stars</label>
                                                  <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                  <label for="star4" title="text">4 stars</label>
                                                  <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                  <label for="star3" title="text">3 stars</label>
                                                  <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                  <label for="star2" title="text">2 stars</label>
                                                  <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                  <label for="star1" title="text">1 star</label>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="form-group row mt-4">
                                            <div class="col">
                                               <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                                            </div>
                                         </div>
                                         <div class="mt-3 text-right">
                                            <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                            </button>
                                         </div>
                                      </form>
                                   </div>
                                </div>
                            </div>
                        @endif
                    </div>   
                </div> --}}
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

    $("#public_qa").on('click',function(){
        if($(this).hasClass('redBgBlink'))
        {
            let id="{{$record->id}}";
            $.ajax({
                url:"{{url('Estimator/designer/read-message')}}",
                method:"get",
                data:{id:id},
                success:function(res){
                    console.log(res);
                  if(res=="success")
                  {
                    $("#public_qa").removeClass('redBgBlink');
                  }
                  else{

                  }
                }
            }) 
        }
        
    })
</script>
@endsection