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
                    <input type="date" name="date"  id="date" style="width: 100%" class="form-control form-control-solid" required>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="d-flex inputDiv d-block mb-3">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold mb-2">
                        <span class="required">Hours</span>
                    </label>
                    <!--end::Label-->
                    <input type="text" name="hours" id="hours" style="width: 100%" class="form-control form-control-solid" required>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class=" inputDiv d-block mb-3">
                    <!--begin::Label-->
                    <label class=" fs-6 fw-bold mb-2">
                        <span class="required">Completed</span>
                    </label>
                    <!--end::Label-->
                    <input type="number" name="completed"  id="completed" style="width: 100%" class="form-control form-control-solid" required>
                    <p id= "error-complete-percentage" style="color:red;"></p>
                    <p class="d-flex inputDiv d-block mb-3"><b>Task Remaining: </b> &nbsp; <span id  = "task-remaining"> {{100 - $estimatorDesigner->task_completed ?? 0}}<span>%</p>
                </div>

            </div>
            <div class="col-md-6 mb-2">
                <!--begin::Label-->
                <div class="inputDiv d-block mb-3">
                    <label class=" fs-6 fw-bold mb-2" style = "width:50%">
                        <span class="required" >Select Status</span>
                    </label>
                    <select class="form-control" name="status" class="form-control form-control-solid">
                        <option value="working">Working</option>
                        <option value="stuck">Stuck</option>
                        <option value="completed">Completed</option>
                        <option value="On Hold">On Hold</option>
                        <option value="Design Check">Design Check</option>
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
                    <td scope="row" style = "width:10%;">{{$row->date ? date('d-m-Y',strtotime($row->date)) : ''}}</td>
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
@elseif(auth()->user()->di_designer_id == null || (auth()->user()->di_designer_id != null && auth()->user()->admin_designer == 1))
    <div class="row">
        <p><b>Desinger: </b>{{$estimatorDesigner->email ?? ''}}</p>
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
                    @if(isset($estimatorDesigner->estimatorDesignerListTasks) && $estimatorDesigner->estimatorDesignerListTasks != null)
                    @foreach($estimatorDesigner->estimatorDesignerListTasks as $row) 
                    <tr>
                        <td scope="row" style = "width:10%;">{{$row->date ? date('d-m-Y',strtotime($row->date)) : ''}}</td>
                        <td style = "width:10%;">{{$row->hours ?? ''}}</td>
                        <td><div style="width:60%; line-height:17px;letter-spacing: normal;">{{$row->task ?? ''}}</div></td>
                        <td style = "width:10%;">{{$row->completed ?? ''}}%</td>
                        <td style = "width:10%;">{{$row->status ?? ''}}</td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <p><b>Checker: </b>{{$checkerData->email ?? ''}}</p>
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
                    @if(isset($checkerData->estimatorDesignerListTasks) && $checkerData->estimatorDesignerListTasks != null)
                    @foreach($checkerData->estimatorDesignerListTasks as $row) 
                    <tr>
                        <td scope="row" style = "width:10%;">{{$row->date ? date('d-m-Y',strtotime($row->date)) : ''}}</td>
                        <td style = "width:10%;">{{$row->hours ?? ''}}</td>
                        <td><div style="width:60%; line-height:17px;letter-spacing: normal;">{{$row->task ?? ''}}</div></td>
                        <td style = "width:10%;">{{$row->completed ?? ''}}%</td>
                        <td style = "width:10%;">{{$row->status ?? ''}}</td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
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
</div> @endif --}}
<script>
     
     var taskInput = document.querySelector('input[name=completed]');
        if(taskInput)
        {
            var taskComplete = document.querySelector('#task-remaining').innerText;
                taskInput.addEventListener('input', function () {
                taskComplete = parseInt(taskComplete);
                var inputValue = parseInt(taskInput.value);
                  console.log(taskComplete);
                if (inputValue > taskComplete) {
                    document.getElementById('error-complete-percentage').innerHTML = 'You can not enter number greater than '+taskComplete;
                    taskInput.value = taskComplete;
                }
                else
                {
                    document.getElementById('error-complete-percentage').innerHTML = '';

                }
            });
        }
        else{
            console.log('no')
        }
      
     
</script>