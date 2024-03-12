@extends('layouts.dashboard.master-index-tempory',['title' => 'Awarded Jobs'])
@php
$currentRouteUrl = request()->path();
$tempWorkClass = "d-none";
@endphp
@if($currentRouteUrl == 'temporary_works')
@include('layouts.dashboard.side-bar')
@endif
@php use App\Utils\HelperFunctions; @endphp
@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap');


    #kt_aside {
        display: none;
    }

    #kt_content_container .card-header .topRightMenu {
        position: absolute;
        right: 15px;
        top: 10px;
    }

    /* #kt_aside:hover {
        width: 265px;
    } */

    #kt_aside .userIconLink:hover .aside-logo img {
        display: block !important;

    }

    /* #kt_aside:hover .menu-title {
        opacity: 1 !important;
    } */

    #kt_aside:hover .menu-sub-accordion {
        height: auto !important;
    }

    #kt_aside_toggle .rotate-180 {
        transform: rotateZ(180deg);
    }

    .view_column::after {
        color: #000 !important;
    }

    .nav-tabs .nav-link.active {
        border-radius: 8px !important;
    }

    ::-webkit-scrollbar {
        width: 30px;
        height: 30px;
        min-height: 15px;
    }

    .aside-enabled.aside-fixed[data-kt-aside-minimize=on] .wrapper {
        padding-left: 75px !important;
    }

    /* .menu-title {
        opacity: 0;
    } */

    /* .menu-sub-accordion {
        height: 0px;
    } */

    .aside-fixed .aside {
        /* width: 45px; */
        display: none;
    }

    #kt_aside_toggle {
        transform: rotate(180deg);
    }

    .menu-icon i {
        font-size: 22px !important;
    }

    /* #kt_aside:hover #kt_aside_toggle {
        right: 0px;
    } */

    .select2-container--bootstrap5 .select2-selection--multiple.form-select-lg {
        padding: 0px 10px;
    }

    .aside-enabled.aside-fixed .wrapper {
        padding-left: 30px;
    }

    .menu-item,
    .menu-sub-accordion.show,
    .show:not(.menu-dropdown)>.menu-sub-accordion {
        display: block !important;
    }

    ::-webkit-scrollbar {
        width: 30px;
        height: 30px;
        min-height: 15px;
    }

    .aside-enabled.aside-fixed.header-fixed .header {
        left: 0px !important;
    }

    .aside-enabled.aside-fixed.header-fixed .header {
        border-bottom: 1px solid #e4e6ef !important;
    }

    .header-fixed.toolbar-fixed .wrapper {
        padding-top: 60pximportant;
    }

    .content {
        padding-top: 0px !important;
        backgroun !d-color: #e9edf1 !important;
    }

    .newDesignBtn {
        border-radius: 8px;
        background-color: #07d564;
        width: 170px;
        padding: 10px 15px;
        color: #000;
        margin: 0px 29px;
        margin-right: 0px;
    }

    .newDesignBtn:hover {
        color: rgba(222, 13, 13, 0.66);
    }

    .nav-tabs {
        /* border-bottom: 1px solid gray !important; */
    }

    .nav-tabs .nav-link {
        color: #9D9D9D !important;
    }

    .nav-tabs .nav-link.active {
        border-radius: 0px !important;
        border: 0;
        color: #07D564;
        font-weight: 700;
        padding-left: 0;
    }

    .card>.card-body {
        padding: 32px;
    }

    table {
        margin-top: 20px;
    }

    #kt_wrapper {
        padding: 0px !important;
    }

    .card-header {
        display: block !important;
    }

    .card-header .card-title {
        display: block !important;
        text-align: center;
    }

    #kt_wrapper.activeWrapper {
        padding-left: 256px !important;
    }

    .activeAside {
        width: 265px !important;
    }

    .activeSubMenu {
        height: auto !important;
    }

    .mw-750px {
        max-width: 1050px !important;
    }

    #kt_content_container {
        background-color: #e9edf1 !important;
        padding: 0 !important;
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
        margin: 9px 0px;
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
        /* text-align: center; */
        padding: 5px !important;
    }

    #kt_header {
        display: none;
    }

    table thead {
        background-color: #f5f8fa;
        position: sticky;
        top: 0px;
        z-index: 99;
    }

    table thead th {
        color: #000 !important;
        text-align: center;
        border-bottom: 0px !important;
        vertical-align: middle;
        font-size: 10px !important;
        font-weight: 900 !important;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table td {
        font-size: 12px;
        padding: 0px !important;
    }

    .table td p {
        font-size: 12px !important;
        margin: 0px !important;
    }

    .dataTables_length label,
    #DataTables_Table_0_filter label,
    .dataTables_filter label {
        color: #fff;
    }

    .page-item.active .page-link {
        background-color: #000 !important;
    }

    tbody.text-gray-600.fw-bold tr td {
        /* vertical-align: middle;
   min-height: 110px !important; */
    }

    .form-control {
        padding: 5px 10px;
    }

    table {
        margin-top: 20px;
    }

    .profileimg {
        border-radius: 50%;
    }

    .symbol.symbol-md-35px .symbol-label {
        width: 53px;
        height: 42px;
    }

    .symbol.symbol-md-35px .symbol-label:hover {
        background-color: #009ef7 !important;
        color: #fff !important;
    }

    .btn.btn-primary {
        border-color: #07d564 !important;
        background-color: #07d564 !important;
        border-radius: 8px;
    }

    .form-control,
    .form-control:focus {
        border: 1px solid #b5b5c3;
        border-radius: 8px;
    }

    .table th:first-child {
        padding: .75rem .75rem !important;
    }

    .menu-item {
        display: flex;
    }

    .menu-item .menu-link {
        flex: 0%;
    }

    .menu-sub-accordion.show,
    .show:not(.menu-dropdown)>.menu-sub-accordion {
        display: -webkit-inline-box;
    }

    .topMenu {
        background-color: #fff;
        padding: 30px;
        border: 1px solid #e4e6ef !important
    }

    .topMenu a {
        color: #07d564 !important;
    }

    .sweet-alert {
        z-index: 99999999999 !important;
    }

    .sweet-overlay {
        z-index: 99999999999 !important;
    }

    .btn-success {
        border-radius: 8px;
        background: #9370DB !important;
    }

    @media (max-width: 390px) {
        .formDiv .form {
            display: block !important;
        }

        #search-btn,
        #terms {
            margin-top: 20px !important;
        }

        #view_btn {
            margin-left: auto !important;
            text-align: center;
        }
    }


    @media (max-width: 546px) {
        #kt_content_container .card-label {
            padding-top: 3.25rem !important;
        }
    }

    .modal-backdrop {
        visibility: hidden !important;
    }

    .modal.in {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .topMenu,
    #kt_content_container,
    .card>.card-body,
    .card>.card-header {
        padding: 0 1rem;
    }

    .table td p {
        position: initial !important;
        top: initial !important
    }

    .active {
        background: transparent !important;
        /* color:white !important; */
    }

    .rowcolor {
        background: #D5D8DC !important;
    }

    .titleColumn {
        color: #9D9D9D;
        font-weight: 500;
        font-size: 13px;
        margin-left: 21px;
        font-family: 'Inter', sans-serif;
        white-space: nowrap;
    }

    .btn.btn-danger i {
        color: #9D9D9D;
    }

    .document-nav {
        padding: 12px;
    }

    .document-nav .navi-item {
        list-style: none;
    }

    #ptl {
        max-width: 88px;
    }

    #ptu {
        max-width: 88px;
    }

    .tabnave .nav .nav-link.active::after {
        content: '';
        border-bottom: 3px solid #07D564;
        display: block;
        width: 100%;
        position: relative;
        top: 9px;
    }

    @media screen and (min-width: 1460px) {

        #ptl,
        #ptu {
            max-width: 95px !important;
        }
    }

    @media screen and (max-width: 768px) {
        .twrHeader {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
        }

        .twrHeader>a {
            margin-left: 0px !important;
        }

        .btn-viewDoc,
        .btn-status {
            width: 100%;
            border-radius: 7px !important;
        }

        .btn-action {
            width: 88% !important;
        }
    }

    .overlay {
        background-color: #d9d9d952;
        width: 100%;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9;
    }


    table {
        border-collapse: collapse;
        width: 100%;
    }

    tr {
        height: 100px;
        background-color: white !important;
    }

    th {
        background-color: #D9D9D91F !important;


    }

    th,
    td {
        /* border: 1px solid black;
       */
        border: 1px solid #B4BBC580;
        padding: 8px;
        text-align: left;
        font-family: "Inter";
        font-size: 14px;
        /* font-weight: 600 !important; */
        line-height: 30px;
        text-align: center;
        padding-top: 10px !important;
    }

    th {
        background-color: #f2f2f2;
    }

    td span {
        font-weight: 600;
    }

    .description {
        background: #FFA50026;
        padding: 0 2px;
        border-radius: 4px;
        color: #FFA500;
        width: 80%;
        font-size: 14px;
        height: 3% !important;
    }

    .comment {
        background: #3A7DFF26;
        padding: 0 2px;
        border-radius: 4px;
        color: #3A7DFF;
        width: 80%;
    }

    .paid {
        background: #07D56426;
        padding: 0 5px;
        border-radius: 4px;
        color: #07D564;
        width: 80%;
    }

    .progress-bar {
        position: relative;
        height: 18.28px;
        background-color: black;
        width: 95%;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress {
        height: 100%;
        background-color: #07D5A4;
    }

    .progress-2 {
        height: 100%;
        background-color: #BE6CFF;
    }

    .progress-3 {
        height: 100%;
        background: #3A7DFF;

    }

    .progress-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 14px;
    }

    .green {
        color: #07D564;
        background: #07D56426;
    }

    .yellow {
        background: #FFA50026;
        color: #FFA500;
    }

    .red {
        background: #F0373826;
        color: #F03738;
    }


    .redbackground {
        background-color: #f17c7c26 !important;
    }

    table tbody td {
        /* text-align: center; */
        padding: 5px !important;
    }

    .th-2 {
        width: 7%;
    }

    .th-5 {
        width: 11%;
    }

    .th-6 {
        width: 10%;
    }

    .th-7 {
        width: 10%;
    }

    .th-8 {
        width: 10%;
    }

    .th-9 {
        width: 7%;
    }

    .th-11 {
        width: 8%;
    }

    .center {
        display: grid;
        place-items: center;
    }

    .img {
        width: 40%;
    }

    hr {
        box-shadow: 0px 3px 10px 0px #0000000F;
        color: #0000000F;
    }

    #check {
        background: #07D564 !important;
    }

    .mainMenu-link:hover {
        cursor: pointer;
    }

    .invoice-btn {
        background: #f1416c;
        padding: 0 5px;
        border-radius: 4px;
        color: #07D564;
        width: 80%;
    }

    .badge-custom {
        color: #50cd89;
        background: #07D56426;
        font-size: 14px;
        height: 3% !important
    }

    .badge-red {
        color: #fff;
        background: #f1416ca6;
        font-size: 14px;
        height: 3% !important
    }

    .extra-price {
        padding: 6px 9px;
        border-radius: 4px;
        color: #5d5db3;
        cursor: pointer;
    }

    .red {
        background-color: rgb(255, 0, 0) !important;
    }

    .green {
        background-color: green !important;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid temporary_blade" id="kt_content">
    <div class="topMenu" style="padding:0px !important;">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <div class="card-title">
                            <a class="mainMenu-link" style="position:absolute; left: 40px; top: 23px"
                                onclick="hideCheck3(1)">Menu</a>
                            <h3 class="card-label pt-5" style="font-size:1.6rem;">AWARDED JOBS
                                <span class="d-block text-muted pt-25 font-size-sm"></span>
                            </h3>
                        </div>
                        <hr>
                        <div class="row d-flex">
                            <form action="{{route('filter.project')}}" class="d-flex" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- start: filter -->
                                <div class="col-md-6 d-flex">
                                    <select name="projects" class="form-select form-select-lg" style="max-height:40px;"
                                        data-control="select2" data-placeholder="Select a Project">
                                        <option value="">Select a Project</option>
                                        @if(isset($tempWorkProjects) && !empty($tempWorkProjects) && $tempWorkProjects !== null)
                                            @foreach($tempWorkProjects->unique('projname') as $project)
                                            <option value="{{ $project->projno ?? '' }}">
                                                {{ $project->projno ?? '' }} <br> {{ $project->projname ?? '' }}
                                            </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-6 d-flex" style="margin-left: 9px;">
                                    <select name="clients" class="form-select form-select-lg" style="max-height:40px;"
                                        data-control="select2" data-placeholder="Select a Client">
                                        <option value="">Select a Client</option>
                                        @if(isset($tempWorkClients) && !empty($tempWorkClients) && $tempWorkClients !== null)
                                            @foreach($tempWorkClients->unique('client_name') as $client)
                                            <option value="{{ $client->client_name ?? '' }}">
                                                {{ $client->client_email ?? '' }} <br> {{ $client->client_name ?? '' }}
                                            </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <button type="submit" class="btn btn-light-primary mb-2 w-50 btn-action"
                                        style="border-radius: 7px;padding: 10px 10px; margin-left:10px;    margin-bottom: 0px !important;width: 55px !important;    "><span
                                            class="fa fa-filter" style="width: 9px !important;"></span></button>
                                    <a href="{{route('awarded_jobs')}}" style="margin-left: 5px; width: 40%;"><button
                                            type="button" class="btn btn-primary">Clear Filter</button></a>
                                </div>
                            </form>
                        </div>
                        <!-- end: filter  -->
                        <div class="tab">
                            <table>
                                <tr class="row-1">
                                    <th class="th-1">Project</th>
                                    <th class="th-2">Client</th>
                                    <th class="th-3">Job Title / Cost</th>
                                    <th class="th-4">Design Req </th>
                                    <th class="th-5">Description / Comment</th>
                                    <th class="th-6">Timeline</th>
                                    <th class="th-7">Allocated Designer</th>
                                    <th class="th-8">Allocated Designer Checker</th>
                                    <!-- <th  class="th-9">Status</th> -->
                                    <th class="th-10">
                                        <div>Drawing <p style="font-size: 11px;line-height: 17px">(View & Upload)
                                            <p>
                                        </div>
                                    </th>
                                    <th class="th-11">Design Brief Number</th>
                                    <th class="th-11">Invoice</th>
                                </tr>
                                @php
                                $i=0;
                                // if(session()->has('data')){
                                // $AwardedEstimators = session('data');
                                // }
                                @endphp
                                @forelse($AwardedEstimators as $item)
                                @php
                                $rowBackgroundColor = '';
                                if($item->work_status == 'publish' && $item->approve_design_brief == 0){
                                $rowBackgroundColor = 'redbackground';
                                }
                                @endphp
                                <tr class="row-2 {{$rowBackgroundColor}}">
                                    <td>
                                        @if($item->project_id)
                                        {{ $item->project->no ?? '' }} <br> {{ $item->project->name ?? '' }}
                                        @else
                                        {{ $item->projno ?? '' }} <br> {{ $item->projname ?? '' }}
                                        @endif
                                        <br>
                                        <a target="_blank" href="estimatorPdf/{{$item->ped_url ?? ''}}">Job PDF</a>
                                    </td>
                                    <td>{{$item->client_name ?? ($item->creator->userCompany->name ?? '') }}</td>
                                    <td>
                                        @php
                                        // For pending Status
                                        $jsonData = $item->getExtraPricePending;
                                        $extraPrices = json_decode($jsonData);
                                        if ($extraPrices !== null) {
                                        foreach ($extraPrices as $extraPrice) {
                                        $blink = 'redBgBlink';
                                        $price = $extraPrice->price;
                                        echo "<p class='extra-price $blink' style='color:black;'> £$price </p>";
                                        }
                                        } else {
                                        echo "Error decoding JSON";
                                        }

                                        // for rejected Status
                                        $jsonDataRejected = $item->getExtraPriceRejected;
                                        $extraPriceRejected = json_decode($jsonDataRejected);
                                        if($extraPriceRejected !== null){
                                        foreach ($extraPriceRejected as $extraPrice) {
                                        $price = $extraPrice->price;
                                        $color = 'red';
                                        echo "<p class='extra-price $color showClientComment' data-id='$extraPrice->id' style='color:black;'> £$price </p>";
                                        }
                                        }

                                        // for accepted Status
                                        $jsonDataAccepted = $item->getExtraPriceAccepted;
                                        $extraPriceAccepted = json_decode($jsonDataAccepted);
                                        if($extraPriceAccepted !== null){
                                        foreach ($extraPriceAccepted as $extraPrice) {
                                        $price = $extraPrice->price;
                                        $color = 'green';
                                        echo "<p class='extra-price $color showClientComment' data-id='$extraPrice->id' style='color:black;'>£$price </p>";
                                        }
                                        }
                                        @endphp
                                        {{-- @dd($item->designerQuote) --}}
                                        {{$item->job_title ?? ''}}
                                        @if($item->designerQuote && auth()->user()->view_price)
                                        <br>
                                        <span>{{$item->designerQuote ? $item->designerQuote->sum('price') : '0'}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                        $req = explode('-', $item->design_requirement_text);
                                        $user = Auth::user();
                                        @endphp
                                        <span> {{$req[0] ?? ''}}
                                            <!-- {{$item->design_requirement_text ?? ''}} -->
                                        </span> <br> {{$req[1] ?? ''}} <br>

                                        @if(($user->di_designer_id == null || $user->admin_designer == 1) &&
                                        $user->hasAnyRole(['designer', 'Designer and Design Checker']))
                                        <button class="btn btn-success extraPrice" data-id="{{$item->id}}" style="
                                        background-color: #3A7DFF26 !important;
                                        padding: 6px 9px;
                                        border-radius: 4px;
                                        color: #5d5db3;
                                        ">Add Extra Price</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row d-flex flex-column">
                                            @php
                                            $drawingscount=0;
                                            $color="green";
                                            $class='';
                                            foreach ($item->commentlist as $comment) {
                                                if(isset($comment->status) && $comment->status == 2){
                                                    $color = "red";
                                                    $class = "redBgBlink";
                                                }
                                            }
                                            @endphp
                                            <div class="col d-flex justify-content-center">
                                                <div class="description desc cursor-pointer" data-toggle="tooltip"
                                                    title="{{ $item->description_temporary_work_required ?? '' }}"
                                                    data-placement="top"> Description </div>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <div class="comment addcomment cursor-pointer mt-3"
                                                    data-id="{{$item->id}}"> Comment <span
                                                        class="{{$class}}">({{count($item->commentlist) ?? '-'}})</span>
                                                </div>
                                            </div>
                                            <span class="btn p-2 m-1 allHistory" style="border-radius: 21%;"
                                                title="Designer Change Email" data-id={{Crypt::encrypt($item->id)}} >
                                                <i style="padding:3px;" class="fa fa-exchange-alt"></i>
                                            </span>
                                        </div>

                                    </td>
                                    @php
                                    $user = Auth::user();
                                    // dd($user);
                                    $is_admin = HelperFunctions::isAdminDesigner($user);
                                    $is_promoted_admin = HelperFunctions::isPromotedAdminDesigner($user);
                                    $is_designer =
                                    HelperFunctions::getJobAwardedDesignerorCheckerByJobId($item->id,'designers');
                                    $is_checker =
                                    HelperFunctions::getJobAwardedDesignerorCheckerByJobId($item->id,'checker');
                                    $designer_or_checker =
                                    \App\Models\EstimatorDesignerList::where('temporary_work_id',$item->id)->where('email',
                                    auth()->user()->email)->whereIn('type',['designers','checker'])->first();
                                    if(HelperFunctions::isPromotedAdminDesigner(\Auth::user())){
                                    $status_1 = 'Timeline';
                                    $status_2 = 'Allocate Designer';
                                    }else{
                                    if($designer_or_checker){
                                    $status_1 = 'Add Timeline';
                                    $status_2 = 'View Designer';
                                    }else{
                                    $status_1 = 'Timeline';
                                    if(HelperFunctions::isPromotedAdminDesigner(\Auth::user()))
                                    $status_2 = 'View Designer';
                                    else
                                    $status_2 = 'Allocate Designer';

                                    }
                                    }
                                    @endphp
                                    <td>
                                        <div class="row d-flex flex-column">

                                            <div class="row d-block ms-2" id="allocated-designer"
                                                data-rowid="{{ $item->id }}">
                                                @php $blink = '' @endphp
                                                @if(empty($item->designerAssign->user->name) ||
                                                empty($item->checkerAssign->user->name) )
                                                @php $blink = 'blink' @endphp
                                                @endif
                                                <label class="fs-6 fw-bold">{{$status_2}}</label>
                                                <img class="img {{$blink}}"
                                                    style="cursor: pointer; vertical-align:top;width:30%;"
                                                    src="{{asset('images/box.png')}}" alt="" title="{{$status_2}}">

                                            </div>
                                            <div class="row d-block ms-2" id="time-estimator"
                                                data-rowid="{{$item->id}}">
                                                <label class="fs-6 fw-bold">{{$status_1}}</label>
                                                <img class="img" style="cursor: pointer; vertical-align:top;width:30%;"
                                                    src="{{asset('images/time.png')}}" title="{{$status_1}}">
                                            </div>
                                            <!-- <div class="col d-flex justify-content-center mt-2">
                                    <div class="progress-bar">
                                    <div class="progress-3" style="width: 50%;"></div>
                                    <span class="progress-text">50%</span>
                                    </div> -->
                                        </div>

                                    </td>
                                    @php
                                    /* Doesn't add total tasks percentage for Designer

                                    $designer_task = isset($item->designerAssign->estimatorDesignerListTasks)
                                    ? ($item->designerAssign->estimatorDesignerListTasks->last() ?
                                    $item->designerAssign->estimatorDesignerListTasks->last()->completed : '0')
                                    : '0';

                                    */


                                    $designer_task = 0;
                                    if(isset($item->designerAssign->estimatorDesignerListTasks)) //add tasks percentage
                                    {
                                    foreach($item->designerAssign->estimatorDesignerListTasks as $task)
                                    $designer_task = $designer_task + $task->completed;
                                    }



                                    /* Doesn't add total tasks percentage for Checker
                                    $checker_task = isset($item->checkerAssign->estimatorDesignerListTasks)
                                    ? ($item->checkerAssign->estimatorDesignerListTasks->last() ?
                                    $item->checkerAssign->estimatorDesignerListTasks->last()->completed : '0')
                                    : '0';
                                    */

                                    $checker_task = 0;
                                    if(isset($item->checkerAssign->estimatorDesignerListTasks)) //add tasks percentage
                                    {
                                    foreach($item->checkerAssign->estimatorDesignerListTasks as $task)
                                    $checker_task = $checker_task + $task->completed;
                                    }

                                    $designer_status = isset($item->designerAssign->estimatorDesignerListTasks)
                                    ? ($item->designerAssign->estimatorDesignerListTasks->last() ?
                                    $item->designerAssign->estimatorDesignerListTasks->last()->status : '')
                                    : '';

                                    $checker_status = isset($item->checkerAssign->estimatorDesignerListTasks)
                                    ? ($item->checkerAssign->estimatorDesignerListTasks->last() ?
                                    $item->checkerAssign->estimatorDesignerListTasks->last()->status : '-')
                                    : '-';

                                    $last_status =isset($item->design->estimatorDesignerListTasks)
                                    ? ($item->design->estimatorDesignerListTasks->last() ?
                                    $item->design->estimatorDesignerListTasks->last()->status : '-')
                                    : '-';
                                    $status_badge = HelperFunctions::getDesignerStatusBadge($designer_status);
                                    $checker_status_badge = HelperFunctions::getCheckerStatusBadge($checker_status);

                                    @endphp
                                    <td>
                                        @if(isset($item->designerAssign->user->name))
                                        <div class=" d-flex flex-column">
                                            <div class=" text-center"> {{$item->designerAssign->user->name ?? ''}}
                                            </div>
                                            <div class=" d-flex justify-content-center">
                                                <div class="progress-bar">
                                                    <div class="progress" style="width: {{$designer_task}}%;"></div>
                                                    <span class="progress-text">{{$designer_task}}%</span>
                                                </div>
                                            </div>
                                            @endif
                                            {!! $status_badge !!}
                                            <!-- @if($is_admin || $is_promoted_admin || ($is_designer && $user->id == $is_designer->user_id)) @endif -->
                                            @if($is_admin || $is_promoted_admin || ($is_designer && $user->id ==
                                            $is_designer->user_id) || $is_checker)
                                            <span class="btn p-2 m-1 designerchangeemail" style="border-radius: 21%;"
                                                title="Designer Change Email" data-id={{Crypt::encrypt($item->id)}} >
                                                <i style="padding:3px;" class="fa fa-exchange-alt"></i>
                                            </span>
                                    </td>
                                    @endif

                                    <td>
                                        @if(isset($item->checkerAssign->user->name))
                                        <div class=" d-flex flex-column">
                                            <div class=" text-center"> {{$item->checkerAssign->user->name ?? ''}} </div>
                                            <div class=" d-flex justify-content-center">
                                                <div class="progress-bar">
                                                    <div class="progress-2" style="width: {{$checker_task}}%;"></div>
                                                    <span class="progress-text">{{$checker_task}}%</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if($checker_status != '-' )
                                            {!! $checker_status_badge !!}
                                            @endif
                                            <!-- @if($is_admin || $is_promoted_admin || ($is_checker && $user->id == $is_checker->user_id)) @endif-->
                                            @if($is_admin || $is_promoted_admin || ($is_checker && $user->id ==
                                            $is_checker->user_id) || $is_designer)
                                            <span class="btn p-2 m-1 checkerchangeemail"
                                                style="border-radius: 21%; z-index:1060" title="Change Email"
                                                data-id={{Crypt::encrypt($item->id)}} >
                                                <i style="padding:3px;" class="fa fa-exchange-alt"></i>
                                            </span>
                                            @endif

                                    </td>
                                    <!-- <td >  {!! $status_badge !!} </td> -->
                                    <td>
                                        <div class="center ">
                                            <div class="image d-flex gap-3">

                                                <div class="image-1">
                                                    @php
                                                    $userEmail = auth()->user()->email;
                                                    $email = '';
                                                    @endphp

                                                    @if(isset($item->designerAssign) && $userEmail ==
                                                    $item->designerAssign->email)
                                                    @php $userEmail = $item->designerAssign->email; @endphp
                                                    @elseif(isset($item->checkerAssign) && $userEmail ==
                                                    $item->checkerAssign->email)
                                                    @php $userEmail = $item->checkerAssign->email; @endphp
                                                    @endif
                                                    <a href="{{ route('designer.uploaddesign', Crypt::encrypt($item->id).'/?mail='.$userEmail.'&job=1') }}"
                                                        target="_blank">
                                                        <img src="{{asset('images/add.png')}}" alt="" srcset=""
                                                            title="Upload Design">
                                                    </a>
                                                </div>
                                                <div style="background: {{($item->uploadfile_count > 0 ? 'green' : '#919191ba')}};padding: 4px; border-radius: 4px;width: 23px; height:23px;line-height:14px;margin-top:4px;"
                                                    class="image-2 uploaddrawinglist cursor-pointer"
                                                    data-id="{{$item->id}}" data-type="1">
                                                    <p class="uploaddrawinglist cursor-pointer" data-id="44"
                                                        data-type="1"
                                                        style="margin-bottom:0px;font-weight: 400;bottom:3px !important; ">
                                                        <span style="font-size: 10px; color: #fff;" class="fa fa-eye"
                                                            title="Upload Drawings"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                        $designerCertificateTag =
                                        App\Models\DesignerCertificate::where('temporary_work_id', $item->id)->count();
                                        $tempWorkUploadFiles =
                                        App\Models\TempWorkUploadFiles::where('temporary_work_id',
                                        $item->id)->where('drawing_title', '==' , null)->count();
                                        // print_r($designerCertificateTag);
                                        @endphp
                                        @if($designerCertificateTag > 0 || $tempWorkUploadFiles > 0)
                                        <div>
                                            <a href="{{ route('designer.uploaddesign', Crypt::encrypt($item->id).'/?mail='.$userEmail.'&job=1&cert') }}" target="_blank"><i class="fa fa-file" style="color: green"></i></a>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{isset($item->twc_id_no) ? $item->twc_id_no : ''}}</p>
                                    </td>
                                    <td>
                                        <div class="row d-flex flex-column">
                                            <div class="col d-flex justify-content-center">
                                                <div class="invoice-btn mt-3">
                                                    <a href="{{ route('generate_invoice') }}?tempwork_id={{$item->id}}"
                                                        style="color:white !important;" target="_blank">
                                                        <span class="fa fa-plus" title="Upload Drawings"> Invoice</span>
                                                    </a>

                                                </div>
                                            </div>
                                            @foreach($item->invoice as $invoiceItem)
                                            @if(isset($item->invoice))
                                            @if($invoiceItem->status == 'Unpaid')
                                            <div class="col d-flex justify-content-center mt-3"> <button type="button"
                                                    id="{{$invoiceItem->id}}" value="{{$invoiceItem->status}}"
                                                    class="description edit_designer_details" style="border: none;">
                                                    Unpaid </button> </div>
                                            @elseif($invoiceItem->status = 'Paid')
                                            <div class="col d-flex justify-content-center"> <button type="button"
                                                    id="{{$invoiceItem->id}}" value="{{$invoiceItem->status}}"
                                                    class="paid mt-3 edit_designer_details" style="border: none;"> Paid
                                                </button> </div>
                                            @endif
                                            @endif
                                            @endforeach

                                        </div>

                                        <span class="btn p-2 m-1 invoiceHistory"
                                            style="border-radius: 21%; z-index:1060" title="Invoice History" {{--
                                            data-id={{$item->id}} --}}
                                            data-id={{Crypt::encrypt($item->id)}}
                                            >
                                            <i style="padding:3px;" class="fa fa-exchange-alt"></i>
                                        </span>
                                        @if(($user->di_designer_id == null || $user->admin_designer == 1) &&
                                        $user->hasAnyRole(['designer', 'Designer and Design Checker']))
                                        <span class="btn p-2 m-1 moveDesignBrief"
                                            style="background-color: #07D56426; color:#07D564; border-radius: 10%; padding:6px 20px !important;"
                                            data-id={{$item->id}}
                                            >Move</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </table>
                        </div>
                        <!--begin::Topbar-->
                        <div class="d-flex align-items-stretch flex-shrink-0 topRightMenu">
                            <!--begin::Toolbar wrapper-->
                            <div class="topbar d-flex align-items-stretch flex-shrink-0">
                                <!--begin::User-->
                                <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <!-- notification work here -->
                                    @if(!auth()->user()->hasRole('company'))

                                    @php $notifications=App\Utils\HelperFunctions::getNotificaions();@endphp
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown notification-ui me-2" style="margin-top: 6px">
                                            <!-- <a class="nav-link dropdown-toggle notification-ui_icon" href="#"
                                                id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-bell {{count($notifications) > 0 ? 'redBgBlink' :'' }}"
                                                    style="font-size:21px"></i>
                                                <span class="badge unread-notification">{{count($notifications)}}</span>
                                            </a> -->
                                            <div class="dropdown-menu notification-ui_dd"
                                                aria-labelledby="navbarDropdown">
                                                <div class="notification-ui_dd-header">
                                                    <h3 class="text-center">Notifications</h3>
                                                </div>
                                                <div class="notification-ui_dd-content text-center">


                                                    @forelse($notifications as $notification)
                                                    <div class="notification-list notification-list--unread">
                                                        <!-- <div class="notification-list_img"><p><b>{{ $notification->data['msg'] }}</b>  -->
                                                        <!-- </div> -->
                                                        <div class="notification-list_detail">
                                                            <a href="{{$notification->data['url']}}"> {{
                                                                $notification->data['msg'] }}</a></p>
                                                            <p><small>{{ $notification->created_at }}</small></p>
                                                        </div>
                                                        <div class="notification-list_feature-img">
                                                            <a href="#" class="float-right mark-as-read"
                                                                data-id="{{ $notification->id }}">
                                                                Mark as read
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @if($loop->last)
                                                    <div class="notification-ui_dd-footer text-center py-3">
                                                        <button class="btn btn-success btn-block" id="mark-all">Mark all
                                                            as read</button>
                                                    </div>
                                                    @endif
                                                    @empty
                                                    There are no new notifications
                                                    @endforelse


                                                </div>
                                                <!--   -->

                                            </div>
                                        </li>
                                    </ul>
                                    @endif

                                    @if(auth()->user()->hasRole('company'))
                                    @php $notifications=App\Utils\HelperFunctions::getNotificaions();@endphp
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown notification-ui me-2">
                                            <a class="nav-link dropdown-toggle notification-ui_icon" href="#"
                                                id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i
                                                    class="fa fa-bell {{count($notifications) > 0 ? 'redBgBlink' :'' }}"></i>
                                                <span class="badge unread-notification">{{count($notifications)}}</span>
                                            </a>
                                            <div class="dropdown-menu notification-ui_dd"
                                                aria-labelledby="navbarDropdown">
                                                <div class="notification-ui_dd-header">
                                                    <h3 class="text-center">Notifications</h3>
                                                </div>
                                                <div class="notification-ui_dd-content text-center">


                                                    @forelse($notifications as $notification)
                                                    <div class="notification-list notification-list--unread">
                                                        <div class="notification-list_img">
                                                            <p><b>{{ $notification->data['name'] }}</b>
                                                        </div>
                                                        <div class="notification-list_detail">
                                                            {{ $notification->data['message'] }}</p>
                                                            <p><small>{{ $notification->created_at }}</small></p>
                                                        </div>
                                                        <div class="notification-list_feature-img">
                                                            <a href="#" class="float-right mark-as-read"
                                                                data-id="{{ $notification->id }}">
                                                                Mark as read
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @if($loop->last)
                                                    <div class="notification-ui_dd-footer text-center py-3">
                                                        <button class="btn btn-success btn-block" id="mark-all">Mark all
                                                            as read</button>
                                                    </div>
                                                    @endif
                                                    @empty
                                                    There are no new notifications
                                                    @endforelse


                                                </div>
                                                <!--   -->

                                            </div>
                                        </li>
                                    </ul>
                                    @endif
                                    <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                        @if(isset(auth()->user()->userDiCompany->companyProfile->logo))
                                        <img alt="Logo"
                                            src="{{asset(auth()->user()->userDiCompany->companyProfile->logo)}}">
                                        @elseif(auth()->user()->image)
                                        <img alt="Logo" src="{{ auth()->user()->image ?: '' }}">
                                        @else
                                        <div class="symbol-label fs-3 bg-light-primary text-primary"
                                            style="display:flex !important;">
                                            {{ \Illuminate\Support\Str::upper(auth()->user()->name[0]) ?: '' }}</div>
                                        @endif
                                    </div>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    @if(isset(auth()->user()->userDiCompany->companyProfile->logo))
                                                    <img alt="Logo"
                                                        src="{{asset(auth()->user()->userDiCompany->companyProfile->logo)}}">
                                                    @elseif(auth()->user()->image)
                                                    <img alt="Logo" src="{{ auth()->user()->image ?? '' }}">
                                                    @else
                                                    <div class="symbol-label fs-3 bg-light-primary text-primary"
                                                        style="display:flex !important;">
                                                        {{ auth()->user()->name[0] ?: '' }}</div>
                                                    @endif
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">{{
                                                        auth()->user()->name ?: '' }}
                                                    </div>
                                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{
                                                        auth()->user()->email }}</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        @if(auth()->user()->hasRole(['admin','company','user']))
                                        <div class="menu-item px-5">
                                            <a href="{{ route('users.admin.edit',auth()->id()) }}"
                                                class="menu-link px-5">Account Settings</a>
                                        </div>
                                        @endif
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a class="menu-link px-5" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::User -->
                                <!--begin::Heaeder menu toggle-->
                                <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                                    <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                                        <i class="bi bi-text-left fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Heaeder menu toggle-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->

                </div>
                <br>
                <div class="col-md-6 d-flex" style="margin-bottom:10px">
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>

<div class="modal  fade" id="AssignProjectModal" style="width: 100%">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" name="assigned_task" id="assigned_task" />

            </div>
        </div>
    </div>
</div>
<div class="modal  fade" id="designer_change_email_modal_id" style="width: 100%">
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S-NO</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Type</th>
                            <!-- <th>Status</th> -->

                            <!-- <th>Sent Date</th> -->
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="designer_change_email_history">

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal  fade" id="checker_change_email_modal_id" style="width: 100%">
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S-NO</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Type</th>
                            <!-- <th>Status</th> -->

                            <!-- <th>Sent Date</th> -->
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="checker_change_email_history">

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
{{-- Invoice history Modal --}}
<div class="modal  fade" id="invoice_history_modal" style="width: 100%">
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S-NO</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Type</th>
                            <!-- <th>Status</th> -->

                            <!-- <th>Sent Date</th> -->
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="invoice_history_table">

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

{{-- all history table  --}}
<div class="modal  fade" id="all-history-modal" style="width: 100%">
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S-NO</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Type</th>
                            <!-- <th>Status</th> -->

                            <!-- <th>Sent Date</th> -->
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="all_history_table">

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="allocationDesignerModal">
    <div class="modal-dialog modal-dialog-centered" style="min-width:700px;">
        <div class="modal-content">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

@include('dashboard.modals.change-emails-modal')
@include('layouts.sweetalert.sweetalert_css')
@include('dashboard.modals.comments2')
@include('dashboard.modals.drawingdesign')
@include('dashboard.modals.drawingdesignlist')
@include('dashboard.modals.description')
@include('dashboard.modals.change_payment_status')
@include('dashboard.modals.extra_price')
@include('dashboard.modals.movingDesignBrief')
@include('dashboard.modals.showClientComment')
@endsection
@section('scripts')
<script type="text/javascript">
$(document).on("click", ".showClientComment", function(){
    let pricingId = $(this).attr('data-id');
    $.ajax({
           url: "{{route('get.client.comment')}}",
           method: "POST",
           data: {
                _token: '{{csrf_token()}}',
               pricingId: pricingId,
           },
           success: function(res) {
               console.log(res.clientComment);
               let clientComment = res.clientComment;
               $('#clientCommentPrice').val(clientComment.client_comment !== null ? clientComment.client_comment : "No comment added by the client");
               $('#show_client_comment').modal('show');
           }
       });
});
    let role = "{{ \Auth::user()->roles->pluck('name')[0] }}";
   $(".addcomment").on('click', function() {
       if (role == 'supervisor' || role == "scaffolder" || role == "visitor") {
           alert("You are not allowed to add comment");
           return false;
       }
       $("#temp_work_id").val($(this).attr('data-id'));
       $("#temp_work_id2").val($(this).attr('data-id'));
       var temporary_work_id = $(this).attr('data-id');
       var userid = {{Auth::user()->id}}
       $("#commenttable").html('');
       $.ajax({
           url: "{{route('temporarywork.get-comments')}}",
           method: "get",
           data: {
               id: userid,
               temporary_work_id: temporary_work_id,
               type: 'client'
           },
           success: function(res) {
               res=JSON.parse(res);
               // console.log(res.comment)
            //    console.log(res.comment)
               $("#commenttable").html(res.comment);
               $("#twccommenttable").html(res.twccomment);
               $("#twccommenttable2").html(res.twclientcomments);
               $('#select_this').html(res.selectElement);
               $('#communicationBeforeAwarded').html(res.pastCommunicationTable);
               $(".comments_form").show();
               $("#comment_modal_id").modal('show');
           }
       });
   
   });
//desc 
   jQuery(".desc").on('click', function() {
       var desc = jQuery(this).attr('title');
       jQuery("#desc").html(desc);
       jQuery("#desc_modal_id").modal('show');
   })

   $(".uploaddrawinglist").on('click', function() {
         var tempworkid = $(this).attr('data-id');
         console.log("id",tempworkid)
      
         $.ajax({
            url: "{{route('get-di-designs')}}",
            method: "get",
            data: {
                  tempworkid: tempworkid,
            },
            success: function(res) {
                    console.log(res)
                  $("#drawingdesigntable").html(res);
                  $("#drawinganddesignlist").modal('show');
            }
         });
      })
      $(document).on('click', '#allocated-designer', function() {
         var temporary_work_id = $(this).data('rowid');         // Your code here

            var CSRF_TOKEN = '{{ csrf_token() }}';
              $.post("{{ route('allocated-designer-modal') }}", {
                  _token: CSRF_TOKEN,
                  temporary_work_id: temporary_work_id
              }).done(function(response) {
                  // Add response in Modal body
                  $('#allocationDesignerModal .modal-body').html(response);
                  // Display Modal
                  $('#allocationDesignerModal').modal('show');
                  // $.LoadingOverlay("hide");
              });
      });
      $(document).on('click', '#time-estimator', function() {
            var temporary_work_id = $(this).data('rowid');
              // $.LoadingOverlay("show");
              var CSRF_TOKEN = '{{ csrf_token() }}';
              $.post("{{ route('award-estimator-modal') }}", {
                  _token: CSRF_TOKEN,
                  temporary_work_id: temporary_work_id
              }).done(function(response) {
                  // Add response in Modal body
                  $('#AssignProjectModal .modal-body').html(response);
                  // Display Modal
                  $('#AssignProjectModal').modal('show');
                  // $.LoadingOverlay("hide");
              });
      });

              //change email click event
    $(document).on('click', '.designerchangeemail', function(e) {
    // $(".designerchangeemail").on('click',function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url: "{{route('designer-change-email-history')}}",
            method: "get",
            data: {
                id
            },
            success: function(res) {
                $("#design_brief_id").val(id);
                $("#designer_change_email_history").html(res);
                $("#designer_change_email_modal_id").modal('show');
            }
        });
        
        
    })

    $(document).on('click', '.moveDesignBrief', function(){
        var id = $(this).attr('data-id');
        $('#tempWorkId').val(id);
        $("#moving_design_brief").modal('show');
    })

    $(document).on('click', '.invoiceHistory', function(e){
        var id = $(this).attr('data-id');
        $.ajax({
            url: "{{route('invoice.history')}}",
            method: "get",
            data:{
                id
            },
            success: function(res){
                $("#invoice_history_table").html(res);
                $('#invoice_history_modal').modal('show');
            }
        });
    });

    $(document).on('click', '.allHistory', function(e){
        var id = $(this).attr('data-id');
        $.ajax({
            url: "{{route('all.history')}}",
            method: "get",
            data:{
                id
            },
            success: function(res){
                $("#all_history_table").html(res);
                $('#all-history-modal').modal('show');
            }
        });
    });

      $(document).on('click', '.checkerchangeemail', function(e) {
        e.preventDefault()
        // $(".checkerchangeemail").on('click',function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url: "{{route('checker-change-email-history')}}",
            method: "get",
            data: {
                id
            },
            success: function(res) {
                $("#design_brief_id").val(id);
                $("#checker_change_email_history").html(res);
                $("#checker_change_email_modal_id").modal('show');
            }
        });
    });

    $(document).on('click', '.extraPrice', function(){
        let temporary_work_id = $(this).attr('data-id');
        $('#temporary_work_id').val(temporary_work_id);
        $('#extraPriceModal').modal('show');
    });

    $(document).on('click', '.edit_designer_details', function() {
         let type = $(this).attr('value');
         let id = $(this).attr('id');
        $('#invoice_id').val(id);
        $('.change_status_form').trigger("reset");
        $("#Change-Status-Modal").modal('show');


        //  $('.change_status_form input[type="select"]').val('');
        //  $('#error_div').remove();
        //  $('.change_status_form input[name="id"]').remove();

            //  let update_url = "{{ route('update_invoice_status',':id') }}";
            //  update_url = update_url.replace(':id', id);
            //  $('.change_status_form').attr('action', update_url);
             // $('.change_status_form').append(`<input name="id" value="${id}" type="hidden">`);           
             // $("#projectid").val($(this).attr('data-id'));
             

     });
    // });

    //     $(document).on("change" , ".twc-comment-checked" , function(e){
    //     if(e.target.checked === true){
    //         let element = e.target;
    //         const urlRoute = '{{route("mark.comment.as.read.admin.designer")}}';
    //         // alert(element.value);
    //         $.ajax({
    //             type: 'POST',
    //             url : urlRoute,
    //             data : {
    //                 twcId : element.value,
    //                 _token : '{{csrf_token()}}'
    //             },
    //             success: function(res){
    //                 if(res.success === true){
    //                     toastr.success(res.msg)
    //                     window.location.reload();
    //                 }else{
    //                     toastr.error(res.msg)
    //                 }
    //             }
    //         })
    //     }
    // })

    const asideContainer = document.querySelector('.aside-fixed .aside');
    const overlay = document.querySelector('.overlay');
    document.querySelector('.mainMenu-link').addEventListener('click', function(e){
        e.preventDefault();
        asideContainer.style.display = 'block !important';
            overlay.classList.remove('d-none')
        });

        overlay.addEventListener('click', () => {
            asideContainer.style.display = 'none';
            overlay.classList.add('d-none');
        })
    
       
        
</script>
<script>
    // const asideContainer = document.querySelector('.aside-fixed .aside');

            function hideCheck3() {
            document.getElementById("check2").style.display = "block";
            document.getElementById("kt_aside").style.display = "block";
            // asideContainer.style.display = 'block !important';
        }
        function hideCheck2() {
            document.getElementById("check2").style.display = "none";
            document.getElementById("kt_aside").style.display = "none";
            // asideContainer.style.display = 'block !important';
        }
</script>

@endsection