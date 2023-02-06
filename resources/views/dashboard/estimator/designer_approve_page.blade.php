@extends('layouts.dashboard.master',['title' => 'Designer Approve'])
@section('styles')
<style>
    .aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60px !important;
    }

    .content {
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
    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;

    }

    .card {
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
        /*transform: rotate(-60deg);*/
        border-bottom: 0px !important;
        vertical-align: middle;
        font-size: 12px !important;
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .card>.card-header {
        align-items: center;
    }

    .dataTables_filter input {
        border-radius: 8px;
    }

    thead tr {
        height: 6px !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #07d564 !important;
    }

    table thead th {
        padding: 3px 18px 3px 10px;
        border-bottom: 0;
        color: #ff0000;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        cursor: hand;
    }

    table td {
        padding: 3px 10px;
        color: #000000;
        font-size: 12px;
        font-weight: normal;
    }

    table td .d-flex {
        justify-content: center;
    }

    .btn.btn-active-color-primary:hover:not(.btn-active),
    .btn.btn-active-color-primary:hover:not(.btn-active) i {
        color: #07d564;
    }

    .modal .btn.btn-primary {
        border-color: #07d564 !important;
        background-color: #07d564 !important;
    }
    .form-select.form-select-solid{
        color:#000 !important;
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
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Designer Approve</h2>

                    </div>

                </div>
                <div class="card-body pt-0">
                   <div class="container">
                        <p>Here we will work on escrow payemnt as well later.</p>
                        <div class="row">
                           <div class="col mt-4">
                              <form class="py-2 px-4" action="{{url('Estimator/review/save')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                  @csrf
                                  <input type="hidden" name="designerId" value="{{$id}}">
                                  @if($rating)
                                  <input type="hidden" name="type" value="Update">
                                  <input type="hidden" name="ratingId" value="{{$rating->id}}">
                                  @else
                                   <input type="hidden" name="type" value="Add">
                                  @endif
                                 <p class="font-weight-bold ">Review</p>
                                 <div class="form-group row">
                                    <div class="col">
                                       <div class="rate">
                                          @if($rating)
                                          <input type="radio" {{$rating->star_rating == 5 ? 'checked' : ''}} id="star5" class="rate" name="rating" value="5"/>
                                          <label for="star5" title="text">5 stars</label>
                                          <input type="radio" {{$rating->star_rating == 4 ? 'checked' : ''}} id="star4" class="rate" name="rating" value="4"/>
                                          <label for="star4" title="text">4 stars</label>
                                          <input type="radio" {{$rating->star_rating==3 ? 'checked' : ''}} id="star3" class="rate" name="rating" value="3"/>
                                          <label for="star3" title="text">3 stars</label>
                                          <input type="radio" {{$rating->star_rating==2 ? 'checked' : ''}} id="star2" class="rate" name="rating" value="2">
                                          <label for="star2" title="text">2 stars</label>
                                          <input type="radio" {{$rating->star_rating==1 ? 'checked' : ''}} id="star1" class="rate" name="rating" value="1"/>
                                          <label for="star1" title="text">1 star</label>
                                          @else
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
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row mt-4">
                                    <div class="col">
                                       <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200">{{$rating->comments ?? ''}}</textarea>
                                    </div>
                                 </div>
                                 <div class="mt-3 text-right">
                                     @if($rating)
                                       <button class="btn btn-sm py-2 px-3 btn-info">Update
                                        </button>
                                     @else
                                        <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                        </button>
                                     @endif
                                 </div>
                              </form>
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
@endsection
@section('scripts')
@include('layouts.sweetalert.sweetalert_js')

@endsection

