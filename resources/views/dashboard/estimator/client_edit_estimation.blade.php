@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])
<div class="row">
    <div class="col-md-4">
        <a href="{{route('estimator.designer_client',$temporary_work->id.'/?mail='.$temporary_work->client_email.'&code='.Crypt::encrypt('Designer'))}}" class="btn btn-primary">View All Jobs</a>
    </div>
</div>
@include('components.edit_estimation')
@endsection