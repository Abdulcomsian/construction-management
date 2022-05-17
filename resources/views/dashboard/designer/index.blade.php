@extends('layouts.dashboard.master_user',['title' => 'Temporary Works'])

@section('styles')
<style>
    .card>.card-body {
        padding: 32px;
    }

    #kt_content_container {
        background-color: #e9edf1;
    }

    #kt_toolbar_container {
        background-color: #fff;


    }

    .card {
        margin: 30px 0px;
        border-radius: 10px !important;
        border: none !important;
    }

    table {
        margin-top: 20px;
        border-collapse: separate;
        background-color: red;
    }

    #kt_toolbar_container h1 {
        font-size: 35px !important;
        color: #000 !important;
        padding: 15px 0px;
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
        background-color: gray;
    }

    table thead th {
        color: #fff !important;
        text-align: center;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .inputDiv input {
        width: 50%;
        color: #000;
    }

    .inputDiv select {
        width: 100%;
        color: #000 !important;
    }

    .inputDiv label {
        width: 40%;
        color: #000;
    }

    .select2-container {
        width: 250px !important;
    }

    .inputDiv {
        margin: 20px 0px;
    }

    .card-title {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1" style="width: 100%; text-align: center;">
                <!--begin::Title-->
                <h1 class="passionate text-dark fw-bolder my-1 fs-3" style="margin-left:0px !important;  width: 100%; text-align: center; text-transform: uppercase;">Temporary Works</h1>
                <!--end::Title-->
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
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title list_top" style="width:98%">
                        <h2 style="display: inline-block;">Upload questions for TWC if required</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form class="form-inline" action="{{route('temporarywork.storecomment')}}" method="post" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="temp_work_id" value="{{$id}}">
                          <input type="hidden" name="mail" value="{{$mail}}">
                          <div class="form-group mx-sm-3 mb-2 d-flex">
                              <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                               <span >Any question or further requirement for the temporary works coordinator before design ? Type and submit:</span>
                              </label>
                               <textarea rows="2" class="form-control" required="required" name="comment"></textarea>
                               &nbsp;&nbsp;
                               <button type="submit" class="btn btn-primary mb-2">Submit</button>
                          </div>
                      
                    </form>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Designer's Comments</th>
                                <th>Twc Reply</th>
                                <th>Attachement</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach($comments as $cments)
                            <tr >
                                <td><b>{{$loop->index+1}}</b></td>
                                <td><b>{{$cments->comment}}</b><br><b>{{date('H:i d-m-Y',strtotime($cments->created_at))}}</b></td>
                                <td>
                                    @if($cments->replay)
                                     @php $i=0;@endphp
                                     @foreach($cments->replay as $reply)
                                      <p><b>{{$reply}}</b><br><b>{{date('H:i d-m-Y',strtotime($cments->reply_date[$i] ?? ''))}}</b></p><hr>
                                      @php $i++; @endphp
                                     @endforeach
                                    @endif
                                </td>
                                <td>
                                    @php
                                     $path = config('app.url');
                                     if(isset($cments->reply_image))
                                     {
                                    for($j=0;$j < count($cments->reply_image);$j++)
                                     {
                           
                                        $image='';
                                        if(isset($cments->reply_image[$j]))
                                        {
                                            $n = strrpos($cments->reply_image[$j], '.');
                                            $ext=substr($cments->reply_image[$j], $n+1);
                                            if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                            {
                                               echo $image='<a target="_blank" href='.$path.$cments->reply_image[$j].'><img src="'.$path.$cments->reply_image[$j].'" width="50px" height="50px"/></a><hr>';

                                            }
                                            else{
                                               echo $a='<a target="_blank" href="'. $path.$cments->reply_image[$j].'">View File</a><hr>';
                                            }
                                            
                                        }
                                     }
                                 }
                                    @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <br>
                    <form id="desingform" action="{{route('designer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <input type="hidden" name="tempworkid" value="{{$id}}">
                        <input type="hidden" name="designermail" value="{{$mail}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Number:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Drawing Number" id="drawing_number" name="drawing_number" value="{{old('drawing_number')}}" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span>Comments:</span>

                                            </label>
                                            <!--end::Label-->
                                            <textarea class="form-control" id="comments" name="comments"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">TWD Name:</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="TWD Name" id="twd_name" name="twd_name" value="{{old('twd_name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing Title:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Drawing title" id="drawing_title" name="drawing_title" value="{{old('drawing_title')}}" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex inputDiv d-block">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Drawing:</span>

                                            </label>
                                            <!--end::Label-->
                                            <input type="file" class="form-control form-control-solid" id="file" name="file[]" style="background: #f5f8fa" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex inputDiv requiredDiv">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Preliminary/ For approval</span>

                                            </label>
                                            <!--begin::Radio group-->
                                            <div class="nav-group nav-group-fluid">
                                                <label>
                                                    <input type="radio" datacheck1='yes' class="btn-check" name="preliminary_approval" value="1" checked />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" datacheck1='no' class="btn-check" name="preliminary_approval" value="2" />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex inputDiv requiredDiv">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">For construction</span>

                                            </label>
                                            <!--begin::Radio group-->
                                            <div class="nav-group nav-group-fluid">
                                                <label>
                                                    <input type="radio" datacheck='yes' class="btn-check" name="construction" value="1" />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Y</span>
                                                </label>
                                                <label>
                                                    <input type="radio" datacheck='no' class="btn-check" name="construction" value="2" checked />
                                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">N</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Drawing Number</th>
                                <th>Comments</th>
                                <th>TWD Name</th>
                                <th>Drawing Title</th>
                                <th>Preliminary/ For approval</th>
                                <th>For construction</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $l=1; @endphp
                            @foreach($DesignerUploads as $uploads)
                            @php
                            
                            if($uploads->preliminary_approval==1)
                            {
                            $background='yellow';
                            }
                            elseif($uploads->construction==1){
                            $background='lightgreen';
                            }

                            $comments=\App\Models\DrawingComment::where('temp_work_upload_files_id',$uploads->id)->get();
                            @endphp
                            <tr style="background: {{$background ?? ''}}">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$uploads->drawing_number}}</td>
                                <td>{{$uploads->comments}}</td>
                                <td>{{$uploads->twd_name}}</td>
                                <td>{{$uploads->drawing_title}}</td>
                                <td>{{$uploads->preliminary_approval==1?'Yes':'No'}}</td>
                                <td>{{$uploads->construction==1?'Yes':'No'}}</td>
                                <td><form method="post" action="{{route('drawing.comment')}}">
                                        @csrf
                                        <textarea class="form-control" required name="comment"></textarea><br>
                                        <input type="hidden" name="drawingid" value="{{$uploads->id}}">
                                        <input type="hidden" name="tempid" value="{{$uploads->temporary_work_id}}">
                                        <input type="hidden" name="mail" value="{{$mail}}">
                                        <button class="btn btn-primary">Add Comment</button>
                                    </form></td>

                            </tr>
                            @if(count($comments)>0)
                            @foreach($comments as $cments)
                            <tr >
                                <td><b>{{$l}} - {{$loop->index+1}}</b></td>
                                <td><b>Comment/Reply</b></td>
                                <td colspan="2"><b>{{$mail}}</b><br><b>{{$cments->drawing_comment}}</b><br><b>{{date('H:i d-m-Y',strtotime($cments->created_at))}}</b></td>
                                <td colspan="2">
                                    @if($cments->drawing_reply)
                                     @php $i=0;@endphp
                                     @foreach($cments->drawing_reply as $reply)
                                      <p><b>{{$cments->reply_email}}</b><br><b>{{$reply}}</b><br><b>{{date('H:i d-m-Y',strtotime($cments->reply_date[$i] ?? ''))}}</b></p><hr>
                                      @php $i++; @endphp
                                     @endforeach
                                    @endif
                                </td>
                                <td colspan="2">
                                    @php
                                     $path = config('app.url');
                                     if(isset($cments->reply_image))
                                     {
                                        for($j=0;$j < count($cments->reply_image);$j++)
                                         {
                               
                                            $image='';
                                            if(isset($cments->reply_image[$j]))
                                            {
                                                $n = strrpos($cments->reply_image[$j], '.');
                                                $ext=substr($cments->reply_image[$j], $n+1);
                                                if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                                {
                                                   echo $image='<a target="_blank" href='.$path.$cments->reply_image[$j].'><img src="'.$path.$cments->reply_image[$j].'" width="50px" height="50px"/></a><hr>';

                                                }
                                                else{
                                                   echo $a='<a target="_blank" href="'. $path.$cments->reply_image[$j].'">View File</a><hr>';
                                                }
                                                
                                            }
                                         }
                                     }
                                    @endphp
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                            @endif

                            @php $l++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                     <hr>
                    <form class="form-inline" action="{{route('designer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="tempworkid" value="{{$id}}">
                          <input type="hidden" name="designermail" value="{{$mail}}">
                      <div class="form-group mx-sm-3 mb-2 d-flex">
                          <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                           <span class="required">Design Check Certificate:</span>
                          </label>
                           <input type="file" style="width:50%"class="form-control" id="designcheckfile" name="designcheckfile" required="required">
                           &nbsp;&nbsp;
                           <button type="submit" class="btn btn-primary mb-2">Upload Certificate</button>
                      </div>
                      
                    </form>
                   
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Design Check Certificate</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach($Designerchecks as $dcc)
                            <tr >
                                <td>{{$loop->index+1}}</td>
                                <td><a href="{{asset($dcc->file_name)}}" target="_blank">DC{{$loop->index+1}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Risk Assessment and calculations -->
                    <br>
                     <hr>
                    <form class="form-inline" action="{{route('riskassesment.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="tempworkid" value="{{$id}}">
                          <input type="hidden" name="designermail" value="{{$mail}}">
                          <div class="form-group mx-sm-3 mb-2 d-flex">
                              <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                               <span class="required">Risk Assessment Certificate:</span>
                              </label>
                               <input type="file" style="width:20%"class="form-control" id="riskassesmentfile" name="designcheckfile" required="required">
                               &nbsp;&nbsp;
                               <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                               <span class="required">Document Type:</span>
                              </label>
                               <select class="form-control" name="type" style="width:30% !important">
                                   <option value="5">Risk Assessment Calculations</option>
                               </select>
                               &nbsp;&nbsp;
                               <button type="submit" class="btn btn-primary mb-2">Upload Rrisk Assessment Certificate</button>
                          </div>
                      
                    </form>
                   
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Risk Assessment Certificate</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach($riskassessment as $riks)
                             <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$riks->created_by}}</td>
                                <td><a href="{{asset($riks->file_name)}}" target="_blank">Risk Assessment-{{$loop->index+1}}</a></td>
                                <td>{{date("d-m-Y",strtotime($riks->created_at));}}</td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                    

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
<script type="text/javascript">
    $('input[name="preliminary_approval"]').on('click', function() {
        var val = $(this).val();
        console.log(val);
        if (val == 1) {
            $("[datacheck='no']").prop('checked', true);
            $("[datacheck='yes']").prop('checked', false);
        } else {
            $("[datacheck='no']").prop('checked', false);
            $("[datacheck='yes']").prop('checked', true);
        }
    })

    $('input[name="construction"]').on('click', function() {
        var val = $(this).val();
        console.log(val);
        if (val == 1) {
            $("[datacheck1='no']").prop('checked', true);
            $("[datacheck1='yes']").prop('checked', false);
        } else {
            $("[datacheck1='no']").prop('checked', false);
            $("[datacheck1='yes']").prop('checked', true);
        }
    })

    // $("#designcheck").on('change',function(){
    //     if($(this).is(":checked"))
    //     {
    //         $(".designcheck").show();
    //         $(".construction").hide();
    //         $("#designcheckfile").attr('required','required');
    //         $("#file").removeAttr('required');
    //     }
    //     else{
    //         $(".designcheck").hide();
    //         $(".construction").show();
    //         $("#designcheckfile").removeAttr('required');
    //         $("#file").attr('required','required');
    //     }
    // })
</script>
@endsection