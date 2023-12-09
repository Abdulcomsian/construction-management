<span data-dismiss="modal" class="modal-close">&times;</span>
@if(auth()->user()->di_designer_id != null && ($designer || $checker))
<form action="{{route('store_award_estimator_hours', $estimatorDesigner->id)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex inputDiv d-block mb-3">
                <!--begin::Label-->
                <label class=" fs-6 fw-bold mb-2">
                    <span class="required">Date</span>
                </label>
                <!--end::Label-->
                <input type="date" name="date"  id="date" style="width: 100%" class="form-control form-control-solid">
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="d-flex inputDiv d-block mb-3">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">
                    <span class="required">Hours</span>
                </label>
                <!--end::Label-->
                <input type="text" name="hours" id="hours" style="width: 100%" class="form-control form-control-solid">
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="d-flex inputDiv d-block mb-3">
                <!--begin::Label-->
                <label class=" fs-6 fw-bold mb-2">
                    <span class="required">Completed</span>
                </label>
                <!--end::Label-->
                <input type="number" name="completed"  id="completed" style="width: 100%" class="form-control form-control-solid">
            </div>
        </div>
        <div class="col-md-6 mb-2">
             <!--begin::Label-->
            <div class="d-flex inputDiv d-block mb-3">
                <label class=" fs-6 fw-bold mb-2" style = "width:50%">
                    <span class="required" >Select Status</span>
                </label>
                <select class="form-control" name="status" class="form-control form-control-solid">
                    <option value="working">Working</option>
                    <option value="stuck">Stuck</option>
                    <option value="completed">Completed</option>
                    <option value="hold">Hold</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label class=" fs-6 fw-bold mb-2">
                <span class="required" >Details</span>
            </label>
                <textarea class="form-control form-control-solid" placeholder="Enter Task" name="task"></textarea>
        </div>
      
        {{-- <div class="col-md-9">
            <div class="d-flex inputDiv d-block mb-3">
            <!--begin::Label-->
            <label class=" fs-6 fw-bold mb-2">
                <span class="required">Total Esimtated Hours required:</span>
            </label>
            <!--end::Label-->
            <input type="text" name="name" value="{{$estimatorDesigner->total_hours ?? ''}}" id="" style="width: 100%">
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
@if(isset($estimatorDesigner->estimatorDesignerListTasks) && $estimatorDesigner->estimatorDesignerListTasks != null)
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Hours spent</th>
                <th scope="col">Task</th>
                <th scope="col">Completed(%)</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($estimatorDesigner->estimatorDesignerListTasks as $row)    
                <tr>
                <td scope="row" style = "width:10%;">{{$row->date ?? ''}}</td>
                <td style = "width:10%;">{{$row->hours ?? ''}}</td>
                <td><div style="width:60%; line-height:17px;letter-spacing: normal;">{{$row->task ?? ''}}</div></td>
                <td style = "width:10%;">{{$row->completed ?? ''}}%</td>
                <td style = "width:10%;">{{$row->status ?? ''}}</td>
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