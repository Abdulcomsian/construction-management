@extends('layouts.dashboard.master',['title' => 'Temporary Works'])

@section('styles')
<style>
    .card {
        max-width: 1000px;
    }

    .estimatorTable {
        text-align: center;
        margin-top: 2rem;
    }

    .estimatorTable thead tr {
        border-bottom: 1px solid lightslategray;
    }

    .estimatorTable thead th {
        font-weight: bold;
        text-transform: uppercase
    }
</style>

{{--
<link rel="stylesheet" href="{{asset('css/signature-twitter-bootstrap.css')}}" />
<link rel="stylesheet" href="{{asset('css/Jquery-ui-min.css')}}" />
<link rel="stylesheet" href="{{asset('css/signature.css')}}" />
<link rel="stylesheet" href="{{asset('css/image-uploader.min.css')}}" /> --}}
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container temporary_work_create">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title list_top"
                        style="width:100%; display: flex !important; justify-content: space-between;align-items:center">
                        <h2 class="db_mr"
                            style="display: inline-block;width:36%; font-family: 'Inter', sans-serif; font-weight:600; font-size:32px">
                            Estimators</h2>
                        <a class="btn btn-primary" href='#' class="addNewEstimationBtn">Add New Estimation</a>


                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <table class="table estimatorTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td><a class="btn btn-primary" href="#" role="button">Edit</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td><a class="btn btn-primary" href="#" role="button">Edit</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td>Larry</td>
                                <td>@twitter</td>
                                <td><a class="btn btn-primary" href="#" role="button">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
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
<script>
</script>
@endsection