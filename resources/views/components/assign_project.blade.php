
<span data-dismiss="modal" class="modal-close">&times;</span>
@if($loggedInUser->di_designer_id == null)
<form action="{{route("projectAssign", $temporary_work_id)}}" method="post">
   @csrf
   <div class="row">
      <div class="col-md-12">
         <div class="inputDiv d-block mb-3">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">
               <span class="required">Select Designer</span>
            </label>
            <!--end::Label-->
            <select name="designer" class="form-select" id="designer-select" aria-label="Default select example"
               style="border:none; padding: 0 10px; color: #666; font-weight: 300;">
               <option disabled selected>Open this select menu</option>
               @isset($users)
                  @foreach($users as $user)
                     @if($user->hasRole('designer') OR $user->hasRole('Designer and Design Checker'))
                        @php
                           $selected = '';
                           if(isset($estimatorDesigner->designerAssign->user->id) && $estimatorDesigner->designerAssign->user->id == $user->id){
                              $selected = 'selected';
                           }
                        @endphp
                        <option value="{{$user->id}}" {{$selected}}>{{$user->name}}</option>
                     @endif
                  @endforeach
               @endisset
            </select>
         </div>
         <p id="link-designer"></p>
      </div>
      <div class="col-md-6">
         <label class="fs-6 fw-bold mb-2">
            <span class="required">Start Designer Date</span>
         </label>
         <input type="date" class="form-control" name="designer_start_date" value="{{ $estimatorDesigner->designerAssign->start_date ?? '' }}"/>
      </div>
      <div class="col-md-6">
         <label class="fs-6 fw-bold mb-2">
            <span class="required">End Designer Date</span>
         </label>
         <input type="date" class="form-control" name="designer_end_date" value="{{ $estimatorDesigner->designerAssign->end_date ?? '' }}"/>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="inputDiv d-block mb-3">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">
               <span class="required">Select Checker</span>
            </label>
            <!--end::Label-->
            <select name="checker" class="form-select" id="checker-select" aria-label="Default select example"
               style="border:none; padding: 0 10px; color: #666; font-weight: 300;">
               <option disabled selected>Open this select menu</option>
               @isset($users)
                  @foreach($users as $user)
                     @php
                        $selected = '';
                        if(isset($estimatorDesigner->checkerAssign->user->id) && $estimatorDesigner->checkerAssign->user->id == $user->id){
                           $selected = 'selected';
                        }
                     @endphp
                     @if($user->hasRole('Design Checker') OR $user->hasRole('Designer and Design Checker'))
                        <option value="{{$user->id}}" {{$selected}}>{{$user->name}}</option>
                     @endif
                  @endforeach
               @endisset
            </select>
         </div>
         <p id="link-checker"></p>
         <script>
            var dropdown = document.getElementById('designer-select');
            var linkPlaceholder = document.getElementById('link-designer');
      
            dropdown.addEventListener('change', function() {
               var selectedValue = dropdown.value;
               var link = window.location.origin + '/designer/calendar?user_id=' + selectedValue;
               linkPlaceholder.innerHTML = '<a target="_blank" href="' + link + '">' + link + '</a>';
            });
         </script>
         <script>
            var dropdown2 = document.getElementById('checker-select');
            var linkPlaceholder2 = document.getElementById('link-checker');
      
            dropdown2.addEventListener('change', function() {
               var selectedValue2 = dropdown2.value;
               var link2 = window.location.origin + '/designer/calendar?user_id=' + selectedValue2;
               linkPlaceholder2.innerHTML = '<a target="_blank" href="' + link2 + '">' + link2 + '</a>';
            });
         </script>
      </div>
      <div class="col-md-6">
         <label class="fs-6 fw-bold mb-2">
            <span class="required">Start Design Checker Date</span>
         </label>
         <input type="date" class="form-control" name="checker_start_date" value="{{ $estimatorDesigner->checkerAssign->start_date ?? '' }}"/>
      </div>
      <div class="col-md-6">
         <label class="fs-6 fw-bold mb-2">
            <span class="required">End Designer Checker Date</span>
         </label>
         <input type="date" class="form-control" name="checker_end_date" value="{{ $estimatorDesigner->checkerAssign->start_date ?? '' }}"/>
      </div>
      <div class="col-md-12 mt-4">
         <button class="btn btn-primary w-100" type="submit">Submit</button>
      </div>
   </div>
</form>
@else
<div class="row">
    <div class="col-md-6">
       <b>Designer Name</b>
    </div>
    <div class="col-md-6">
       {{$estimatorDesigner->designerAssign->user->email ?? ''}}
    </div>
</div>
<div class="row">
   <div class="col-md-6">
      <b>Start Date</b>
   </div>
   <div class="col-md-6">
      {{$estimatorDesigner->designerAssign->start_date ?? ''}}
   </div>
</div>
<div class="row">
   <div class="col-md-6">
      <b>End Date</b>
   </div>
   <div class="col-md-6">
      {{$estimatorDesigner->designerAssign->end_date ?? ''}}
   </div>
</div>
<div class="row">
    <div class="col-md-6">
        <b>Checker Name</b>
     </div>
     <div class="col-md-6">
        {{$estimatorDesigner->checkerAssign->user->email ?? ''}}
     </div>
 </div>
 <div class="row">
   <div class="col-md-6">
      <b>Start Date</b>
   </div>
   <div class="col-md-6">
      {{$estimatorDesigner->checkerAssign->start_date ?? ''}}
   </div>
</div>
<div class="row">
   <div class="col-md-6">
      <b>End Date</b>
   </div>
   <div class="col-md-6">
      {{$estimatorDesigner->checkerAssign->end_date ?? ''}}
   </div>
</div>
@endif
