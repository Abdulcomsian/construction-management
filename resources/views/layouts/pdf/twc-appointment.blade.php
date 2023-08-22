
<style type="text/css">


    .paddingTable td {
        padding: 4px 10px;
    }
    table *{
        font-size: 11px !important;
    }
     .input{
        border: none;
        border-bottom: 1px solid;
        padding:0 8px;
    }
    .paragraph{
        font-size:16px;
        font-weight: 500;
        color:#2e2c2c;

    }
  
</style>
<page pageset="old">
    <div style="padding: 10px; width: 100%; margin: auto;">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card shadow-lg">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2></h2>
                    </div>
                </div>
                    <div class="card-body pt-0">
                        <div style="margin-bottom: 15px;">
                            <h3  style="float:left;width:70%;margin-top:15px;">{{date('d F Y')}}</h3>
                            <div class="logo" style="float:right;width:20%;">
                            @if(isset($user->userCompany->image) && $user->userCompany->image != NULL)
                            <img src="{{public_path($user->userCompany->image)}}" width="auto" height="60px" />
                            @endif
                            </div>
                         </div>
                        <table style="border-collapse: collapse;width: 100%; border: 1px solid black;">
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid black;background: gray;height:30px">Project No & Name:</td>
                                    <td style="border: 1px solid black;">
                                        {{$nomination->projectt->no}}-{{$nomination->projectt->name}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="border-collapse: collapse;width: 100%; border: 1px solid black;">
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid black;">Project No & Name:</td>
                                    <td style="border: 1px solid black;">
                                        {{$nomination->projectt->no}}-{{$nomination->projectt->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black;">Name of Project Manager:</td>
                                    <td style="border: 1px solid black;">
                                        {{$user->userCompany->name ?? ''}}
                                    </td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                     
                        <p  style="font-size: 16px">Dear {{$user->name}}</p><br>
                        @php
                         if($user->roles->pluck('name')[0]=='user')
                         {
                            $role="Temporary works co-ordinator (TWC)";
                         }elseif($user->roles->pluck('name')[0]=='supervisor')
                         {
                             $role="Temporary works supervisor (TWS)";
                         }elseif($user->roles->pluck('name')[0]=='visitor')
                         {
                             $role="Temporary works visitor (TWS)";
                         }
                         elseif($user->roles->pluck('name')[0]=='scaffolder')
                         {
                            $role="Scaffolder";
                         }
                         @endphp
                         <div class="mb-3 paragraph">
                            <p><b>RE:</b> Appointment as {{$role}}</p>
                         </div>
                        <div class="mb-3">
                         <p class="paragraph">This letter confirms your appointment as the {{$role}} on the above project.</p>      </div>
                        <div class="mb-3">
                            <p class="paragraph">As the nominated ({{$role}}), you are responsible for managing all aspects of the temporary works on this project.</p>
                        <div>
                        <div class="mb-3">
                            <p class="paragraph">Your role as temporary works ({{$role}}) is fully explained in the ({{$user->userCompany->name}}) Temporary Works Management Procedure –.  This procedure is maintained electronically on the Company Quality Management system.</p></div>
                        <div class="mb-3">
                            <p class="paragraph">Please sign and date the enclosed copy of this letter, to confirm your acceptance of the above.</p>
                        </div>
                        <div>
                            <table style="border-collapse: collapse;width: 100%;">
                            <tbody>
                                
                                <tr>
                                    <td style="width:30px">Name:</td>
                                    <td>{{$user->name}}</td>
                                    <td style="width:80px">
                                     Signature:
                                    </td>
                                    <td style="border-bottom: 1px solid;text-align: center;">
                                        @if($data['signtype']==1)
                                        {{signature}}
                                        @else
                                         <img src="temporary/signature/{{$signature}}" width="auto" height="40">
                                        @endif
                                    </td>
                                    <td style="width: 40px">Date:</td>
                                    <td style="border-bottom: 1px solid;text-align: center;">
                                        {{$data['date']}}
                                    </td>
                                </tr>
                                
                                <br>
                                <tr>
                                    <td style="width:30px">Name:</td>
                                    <td>{{$user->userCompany->name}}</td>
                                    <td style="width:80px">
                                        Signature:
                                    </td>
                                    <td style="border-bottom: 1px solid;text-align: center;">
                                        @php 
                                            $image=$nomination->signature1;
                                            $n = strrpos($image, '.');
                                            $ext=substr($image, $n+1);
                                             
                                        @endphp
                                         @if($ext=='png' || $ext=='jpg' || $ext=='jpeg')
                                            <img src="temporary/signature/{{$image}}" width="500" alt="img" width="auto" height="40"/>
                                            @else
                                           <p>{{$image}}</p>
                                        @endif
                                    </td>
                                    <td style="width: 40px">Date:</td>
                                    <td style="border-bottom: 1px solid;text-align: center;">
                                         {{$data['date']}}
                                    </td>
                                </tr>
                                
                                
                                
                            </tbody>
                        </table>
                                
                           
                        </div>
                      
                        <div class="mb-3">
                            <p class="paragraph">This record should be kept by the TWC in the Temporary Works file and be updated, as necessary. The Designated Individual will keep a register of all TWC and dTWC appointments.</p></div>
                        
                    </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
    </div>
</page>