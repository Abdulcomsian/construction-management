@extends('layouts.dashboard.master',['title' => 'Users'])
@section('styles')
<style>
    .addBtn {
        border-radius: 8px;
        float: right;
    }
    .form-select.form-select-solid{
    color:black !important;
   }
</style>
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Edit User</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Admin</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">User</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Edit User</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-7">
                    <form method="post" action="{{ route('users.update',$user->id) }}">
                        @csrf
                        @method('PUT')
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">User Name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="User Name" name="name" value="{{old('name') ?: $user->name}}" />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">User Email</label>
                                    <input type="email" class="form-control form-control-solid" placeholder="User Email" name="email" value="{{old('email')  ?: $user->email}}" />
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Password</label>
                                    <input type="password" class="form-control form-control-solid" placeholder="Password" name="password" />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Confirm Password</label>
                                    <input type="password" class="form-control form-control-solid" placeholder="Confirm Password" name="password_confirmation" />
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Job Title</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Job Title" name="job_title" value="{{old('job_title')  ?: $user->job_title}}" />
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Select Role</label>
                                    <select name="role" class="form-select form-select-lg form-select-solid role-dropdown" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                        <option value="">Select Role</option>
                                        <option value="user" @if($user->hasRole('user')==true){{"selected"}}@endif>Temporary works co-ordinator</option>
                                        <option value="supervisor" @if($user->hasRole('supervisor')==true){{"selected"}}@endif>Temporary works supervisor</option>
                                        <option value="visitor" @if($user->hasRole('visitor')==true){{"selected"}}@endif>Temporary works visitor</option>
                                        <option value="scaffolder" @if($user->hasRole('scaffolder')==true){{"selected"}}@endif>Scaffolder</option>
                                        <option value="estimator" @if($user->hasRole('estimator')==true){{"selected"}}@endif>Estimator / Pre-Con</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Select Company</label>
                                    <select id="company_id" name="company_id" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                        <option value="">Select Company</option>
                                        @if(Auth::user()->hasRole(['company']))
                                           @forelse($companies as $item)
                                           @if($item->id==Auth::user()->id)
                                           <option value="{{$item->id}}" {{ $item->id == $user->company_id ? 'selected' : '' }} {{ $item->id == old('company_id') ? 'selected' : '' }}>{{$item->name}}</option>
                                           @endif
                                           @empty
                                        @endforelse
                                        @else
                                        @forelse($companies as $item)
                                        <option value="{{$item->id}}" {{ $item->id == $user->company_id ? 'selected' : '' }} {{ $item->id == old('company_id') ? 'selected' : '' }}>{{$item->name}}</option>
                                        @empty
                                        @endforelse
                                        @endif
                                       
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-md-6">
                                   <!--  <label class="required fs-6 fw-bold mb-2">Select Project</label>
                                    @php
                                    @endphp
                                    <select id="projects"  name="projects[]" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                        @forelse($company_projects as $item)
                                        <option value="{{$item->id}}" @isset($user_projects) {{ in_array($item->id,$user_projects) ? 'selected' : '' }} @endisset>{{$item->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div> -->
                                </div>
                                @if($user->hasRole('user')==true)
                                <div class="col-md-12 my-2 check-estimator">
                                @else
                                <div class="col-md-12 my-2 check-estimator d-none">
                                @endif
                                @php
                                    $checked = '';
                                @endphp
                                {{-- @dd($user->hasPermissionTo($permission)) --}}
                                    @if($user->hasPermissionTo($permission))
                                        @php $checked = 'checked'; @endphp
                                    @endif
                                <input type="checkbox" name="allow_estimator"  {{$checked}}>
                                    <label class="fs-6 fw-bold mb-2">Allow this TWC to have role of Estimator as well ?</label>
                                </div>
                                <!--begin::Col-->
                                 <!-- <div class="col-md-6">
                                    <div class="d-flex inputDiv requiredDiv">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2" >
                                            <span>Is Nomination Flow required ?:</span>

                                        </label>
                                    
                                        <div class="nav-group nav-group-fluid">
                                            <label>
                                                <input type="radio" datacheck1='yes' class="btn-check" name="nomination" value="1" {{$user->nomination==1 ? 'checked':''}} />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                            </label>
                                            <label>
                                                <input type="radio" datacheck1='no' class="btn-check" name="nomination" value="2" {{$user->nomination==0 ? 'checked':''}}/>
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary2 px-4">N</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-12 fv-row nomination-flow">
                                    <input type="checkbox"  name="nomination" id="nomination" {{$user->nomination==1 ? 'checked':''}}>
                                    <label class="fs-6 fw-bold mb-2">Is Nomination Flow required ?</label>
                                </div> -->


                                <!-- <div class="col-md-12 fv-row nominationdesc" style="display: {{$user->nomination==1 ? 'block':'none';}}">
                                    <label class="fs-6 fw-bold mb-2">Description of role being proposed:</label>
                                    <textarea cols="40" rows="2" class="form-control" name="description_of_role">{{$user->description_of_role ?? ''}}</textarea>
                                </div>
                                <div class="col-md-12 fv-row nominationdesc" style="display: {{$user->nomination==1 ? 'block':'none';}}">
                                    <label class="fs-6 fw-bold mb-2">Description of the limits of authority of the individual:</label>
                                    <textarea cols="40" rows="2" class="form-control">{{$user->Description_limits_authority ?? ''}}</textarea>
                                </div>
                                <div class="col-md-12 fv-row nominationdesc" style="display: {{$user->nomination==1 ? 'block':'none';}}">
                                    <label class="fs-6 fw-bold mb-2"> Does the individual have authority to issue permits to load:</label>
                                    <textarea cols="40" rows="2" class="form-control">{{$user->authority_issue_permit ?? ''}}</textarea>
                                </div> -->

                        

                            </div>
                        </div>

                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Update User
                        </button>

                    </form>
                </div>
                <!--end::Card body-->
                <hr>
                <div class="card-body pt-7">
                    <form method="post" action="{{ route('users.updatePassword',$user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">New Password</label>
                                    <input type="password" class="form-control form-control-solid" placeholder="Password" name="password" />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold mb-2">Confirm New Password</label>
                                    <input type="password" class="form-control form-control-solid" placeholder="Confirm Password" name="password_confirmation" />
                                </div>

                            </div>
                        </div>

                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Update Password
                        </button>

                    </form>
                </div>
                <hr>
                <div class="card-body pt-7">
                    <h3>User Has Following Assign Project</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#No</th>
                                <th>User</th>
                                <th>Project</th>
                                <th>Nomination Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->userProjects as $project)
                            <tr>

                                <td>{{$loop->index+1}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$project->name}}</td>
                                <td>
                                    @if($project->pivot->nomination==1)
                                    <a href="{{url('Nomination/nomination-formm',Crypt::encrypt($user->id)).'?project='.Crypt::encrypt($project->id)}}" target="_blink">Link</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
    $(document).ready(function() {
        let nomination_flo='{{$user->nomination}}';
        if(nomination_flo=='1')
        {
             $(".nominationdesc").show();
        }
        else{
             $(".nominationdesc").hide();
        }
        $("#company_id").change(function() {
            console.log('Here in id changes');
            let id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('company.projects') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        let projects = data.projects;
                        let company_nomination=data.company_nomination;
                        if(company_nomination==0)
                        {
                            $(".nomination-flow").hide();
                        }
                        else{
                            $(".nomination-flow").show();
                        }
                        $('#projects').empty();
                        $.each(projects, function(key, item) {
                            $('#projects').append(`<option value="${item.id}">${item.name}</option>`);
                        });

                    }
                }
            });

        });

       //nomination checkbox work here
        $("input[name='nomination']").change(function(){
            if($(this).val()==1)
            {
                $(".nominationdesc").show();
            }
            else{
                $(".nominationdesc").hide();

            }
           });


    });

    $(document).on("change" , ".role-dropdown" , function(e){
        let role = e.target.value;
        if(role == "user"){
            document.querySelector(".check-estimator").classList.remove("d-none");
        }else{
            document.querySelector(".check-estimator").classList.add("d-none");
        }
    })
</script>
@endsection