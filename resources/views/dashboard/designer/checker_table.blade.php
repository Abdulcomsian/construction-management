<span data-dismiss="modal" class="modal-close">&times;</span>
@if(auth()->user()->di_designer_id != null && $checker)
<form action="{{route('store_award_estimator_hours', $estimatorDesigner->id)}}" method="post">
@csrf
<div class="row">
    <div class="col-md-4">
        <div class="d-flex inputDiv d-block mb-3">
            <!--begin::Label-->
            <label class=" fs-6 fw-bold mb-2">
                <span class="required">Date</span>
            </label>
            <!--end::Label-->
            <input type="date" name="date"  id="date" style="border: none; width: 100%">
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex inputDiv d-block mb-3">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">
                <span class="required">Hours</span>
            </label>
            <!--end::Label-->
            <input type="text" name="hours" id="hours" style="border: none; width: 100%">
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex inputDiv d-block mb-3">
            <!--begin::Label-->
            <label class=" fs-6 fw-bold mb-2">
                <span class="required">Completed</span>
            </label>
            <!--end::Label-->
            <input type="number" name="completed"  id="completed" style="border: none; width: 100%">
        </div>
    </div>
    <div class="col-md-12">
        <textarea class="form-control" placeholder="Enter Task" name="task"></textarea>
    </div>
    {{-- <div class="col-md-9">
        <div class="d-flex inputDiv d-block mb-3">
        <!--begin::Label-->
        <label class=" fs-6 fw-bold mb-2">
            <span class="required">Total Esimtated Hours required:</span>
        </label>
        <!--end::Label-->
        <input type="text" name="name" value="{{$estimatorDesigner->total_hours ?? ''}}" id="" style="border: none; width: 100%">
        </div>
    </div> --}}
</div>    
<div class="row">    
    <div class="col-md-3 mt-9">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</div>
</form>
@endif
{{-- @if($estimatorDesigner->total_hours) --}}
{{-- <div class="row">
    <div class="col-md-6">
        <span class="fw-bold">Date:</span>
        <span>02/05/2023</span>
    </div>
    <div class="col-md-6">
        <span class="fw-bold">Hours:</span>
        <span>{{$estimatorDesigner->total_hours ?? ''}}h</span>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="fw-bold">Description</span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio placeat distinctio repudiandae
            itaque voluptatem asperiores deserunt nemo eum ea? Doloribus.</p>
    </div>
</div> --}}
@if(isset($estimatorDesigner->estimatorDesignerListTasks) && $estimatorDesigner->estimatorDesignerListTasks)
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Hours spent</th>
                <th scope="col">Task</th>
                <th scope="col">Completed(%)</th>
                </tr>
            </thead>
            <tbody>
            @foreach($estimatorDesigner->estimatorDesignerListTasks as $row)    
                <tr>
                <th scope="row">{{$row->date ?? ''}}</th>
                <td>{{$row->hours ?? ''}}</td>
                <td>{{$row->task ?? ''}}</td>
                <td>{{$row->completed ?? ''}}%</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="h3">No Records Found</div>
    </div>
</div>
@endif