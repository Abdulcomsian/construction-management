<div class="col-md-6 mt-5 {{$counter}}">
    <!-- <div class="d-flex inputDiv">
                          </div> -->
    <div class="d-flex inputDiv principleno mt-0">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold mb-2">
        <span class="required">Name:</span>
      </label>
      <!--end::Label-->
      <div class="input">
        <input type="text" class="form-control form-control-solid" placeholder="Name" id="name2" name="name[]" value="{{old('name',  Auth::user()->name ?? '')}}">
      </div>
    </div>
    <div class="d-flex inputDiv principleno">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold mb-2">
        <span class="required">Job Title:</span>
      </label>
      <!--end::Label-->
      <div class="input">
        <input type="text" class="form-control form-control-solid" placeholder="Job Title" id="job_title" name="job_title[]" value="{{old('job_title',Auth::user()->job_title ?? '')}}">
      </div>
    </div>
    <div class="d-flex inputDiv ">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold mb-2">
        <span class="required">Company: </span>
      </label>
      <!--end::Label-->
      <div class="input">
        <input type="text" id="companyadmin" class="form-control form-control-solid" placeholder="Company" name="company[]" value="{{$project->company->name ?? ''}}">
        <input type="hidden" id="companyid" class="form-control form-control-solid" placeholder="Company" name="companyid[]" value="{{$project->company->id ?? ''}}">
      </div>
    </div>
    <div class="d-flex inputDiv ">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold mb-2 ml-2">
        <span class="required">Date:</span>
      </label>
      <!--end::Label-->
      <div class="input">
        <input type="date" style="background-color:#f5f8fa" value="{{ date('Y-m-d') }}" class="form-control form-control-solid">
      </div>
    </div>
    <div class="col">
      <div class="d-flex inputDiv" style="border: none">
        <label class="fs-6 fw-bold mb-2" style="width:40% !important;font-size: 600 !important; font-size: 16px !important">
          <span class="signatureTitle" style="white-space: nowrap">Signature
            Type:</span>
        </label>
        <div style="display:flex; align-items: center; padding-left:10px">
          <input type="radio" class="checkbox-field" id="DrawCheck" checked=true style="width: 12px;">
          <!-- <input type="hidden" id="Drawtype" name="Drawtype" class="form-control form-control-solid" value="2"> -->
          <span style="padding-left:14px;font-family: 'Inter', sans-serif;font-weight:color:#000;font-size:14px;line-height: 2">Draw</span>
        </div>
      </div>
      <div class="d-flex inputDiv my-0" id="sign" style="align-items: center;border:none">
        <canvas id="sig{{$counter}}" onblure="draw()" style="background: lightgray; border-radius:10px"></canvas>
        <br />
        <textarea id="signature{{$counter}}" name="signed[]" style="display: none"></textarea>
        <span id="clear" class="fa fa-undo cursor-pointer btn--clear" style="line-height: 6; position:relative; top:51px; right:26px"></span>
      </div>
      {{-- <span id="sigimage" class="text-danger" style="font-size: 15px">Signature Not
        Added</span> --}}
      <div class="inputDiv d-none" id="pdfsign">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
          <span class="required">Upload Signature:<br>Allowed format (PNG,
            JPG)</span>
        </label>
        <input type="file" name="pdfphoto[]" class="form-control" accept="image/*">
      </div>

      <div class="d-flex inputDiv" id="namesign" style="display: none !important">
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
          <span class="required">Name Signature:</span>
        </label>
        <input type="text" name="namesign[]" class="form-control form-control-solid">
      </div>
    </div>
  </div>