<style>

    .company-name{
        color:green !important;
        font-weight:bold !important;
    }
    .address{
        color:green !important;
    }
    
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding:5px;
    }
    .two{
        display:flex !important;
    }
    .top{
        margin-top: 2px solid black !important;
    }
    .set{
        margin-left:5% !important;
    }
    input{
        border:1px solid red;
    }
    .email span{
        margin-top:80px !important;
    }
    .row{
        display:flex !important;
    }

    .left{
        float:left;
    }
    .right{
        float:right;
    }
    .font{
        font-size:13px;
    }
    .padd{
        padding:20px;
    }
    .font-2{
        font-size:14px;
    }
    .font-3{
        font-size:15px;
    }
</style>
    
    <page pageset="old">
    


    <!-- <table style="width:100%">
    <tr>
        <td style="border-right:1px solid black; padding:0px 15px;"> 
      
            <div class="company-name font-3"> Consulting Temporary Works Engineers</div>
            <div class="address font-2">85 Great Portland Street <br> London, United Kingdom, W1W 7LT</div>
            <div class="email">
                <span class="font">Email:</span>
                
            </div>
            <p></p>
        </td>
        <td style="width:50%; ">

            <div class="form-group font p" >
                <label for="title">Title:</label>
            </div>
            <hr>
            <div class="form-group font">
                <label for="project" >Project: {{$temporary_work->project->name ?? $temporary_work->projname}}</label>
            </div>
            <hr>
            <table style="width: 100%; border:none !important;  ">

                <tr>
                    <td  class="font" style="border:none ">
                        <label for="designer">Designer:</label>
                        {{$temporary_work->client_email == null ? $temporary_work->designer->user->name : $temporary_work->creator->name }}
                    </td>
                    <td  class="font" style="border:none !important; text-align: right;">
                        <label for="date">Date:</label>
                        {{$temporary_work->design_issued_date}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
     <td style="height:30px; border-right:none !important">

     </td>
     <td style="border-left:none !important">

     </td>
    </tr>


</table> -->



<table style="width:100%">
    <tr>
        <td style="border-right:1px solid black; padding:0px 15px;" rowspan="3"> 
            <div class="company-name font-3">Consulting Temporary Works Engineers</div>
            <div class="address font-2">85 Great Portland Street <br> London, United Kingdom, W1W 7LT</div>
            <div class="email">
                <span class="font">Email:</span>
            </div>
            <p></p>
        </td>
        <td style="width:50%; height: 40px;">
                        <table style="width: 100%; border:none !important; height: 100%;">
                <tr>
                    <td class="font" style="border:none; vertical-align: middle;">
                         <label  for="title">Title:</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="height: 40px;">
            <table style="width: 100%; border:none !important; height: 100%;">
                <tr>
                    <td class="font" style="border:none; vertical-align: middle;">
                        <label  for="project">Project: {{$temporary_work->project->name ?? $temporary_work->projname}}</label>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="height: 40px;">
            <table style="width: 100%; border:none !important; height: 100%;">
                <tr>
                    <td class="font" style="border:none; vertical-align: middle;">
                        <label for="designer">Designer:</label>
                        {{$temporary_work->client_email == null ? $temporary_work->designer->user->name : $temporary_work->creator->name }}
                    </td>
                    <td class="font" style="border:none !important; text-align: right; vertical-align: middle;">
                        <label for="date">Date:</label>
                        {{$temporary_work->design_issued_date}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- <tr>
         <td style="height:30px; border-right:none !important">

        </td>
        <td style="border-left:none !important">

        </td>
    </tr> -->
</table>






    <table style="width:100%; height:40px" class="font">
    <tr>
         <td style="height:30px; border-right:none !important">

        </td>
        <td style="border-left:none !important">

        </td>
    </tr>
        <tr>
            <td style="width:30%; border-right:none !important;padding:0px 15px;">
                <span>Design check Category:</span>
            </td>
            <td style="border-left:1px solid white !important;">
                <label for="cat1">CAT {{$temporary_work->tw_category }} </label>
                <p></p>
            </td>
        </tr>
    
       
    </table>
    
    <div class="heading font">
        <p  style="text-decoration: underline;">Temporary works design certificate</p>
        
    </div>
    <div class="options font" style="margin-left:5%">
            <p>(a) The following element of temporary works:</p> <br>
            <div class="a" style="margin-left:7%; margin-top:-22px; font-weight:bold;" > {{$temporary_work->description_temporary_work_required}}</div>
            <!-- <p>{{$temporary_work->description_temporary_work_required}}</p> -->
            <p>(b) Described in design brief:</p> <br>
            <div class="b" style="margin-left:7%; margin-top:-22px; font-weight:bold;" >{{$temporary_work->design_requirement_text}}  </div>
            <!-- <p>{{$temporary_work->design_requirement_text}}</p> -->
            <p> (c) Has been designed in accordance with the following standards and reference</p> <br>
            {{-- @dd($temporary_work->designerCertificates) --}}
            <table style="width:100%">
            @foreach($temporary_work->designerCertificates->tags as $tag)
                {{-- @foreach($certificate->tags as $tag) --}}
                    <tr>
                        <td style="width:30%">{{$tag->title}} </td>
                        <td> {{$tag->description}}</td>
                    </tr>
                {{-- @endforeach --}}
                <hr>
            @endforeach
            
    </table>
    <p class="font">(d) The design is described in the following documents:</p> <br>
            <div class="d font" style="margin-left:7%; margin-top:-22px; font-weight:bold;"> TW 024-01-P00 </div>
            <div class="d-2 font" style="margin-left:7%; font-weight:bold;"> TW 024-01-CALCS-REV0 </div>
            <!-- <input type="text" id="" class="set"/> 
            <input type="text" id="" class="set"/> -->
    </div>
    
    
    
    
    
    @php
     use App\Utils\HelperFunctions; 
     use App\Models\User; 
    @endphp
    <div class="options" style="margin-left:5%">
    <div class="three-points font">
    <p>I certify that the design of (a) as described in (d) complies with the standards listed in (c) and brief 
    (d)</p>
    </div>
    {{-- @if --}}
    {{-- @php $user = User::where('email',$email)->first(); @endphp --}}
    @if($temporary_work->designerCertificates->designer_signature)
        @php 
        $designer = $user
        @endphp
    @endif
    <table style="width:100%;" class="font">
        <tr>
            <td style="width:20%" >Name:</td>
            <td>{{$designer->name ?? ''}}</td>
    
        </tr>
        <tr >
            <td > Date:</td>
            <td>{{$temporary_work->designerCertificates->created_at ?? ''}}</td>
        </tr>
        <tr >
            <td > Organisation:</td>
            <td>{{$temporary_work->designer_company_name ?? '' }}</td>
        </tr>
        <tr >
            <td > Position:</td>
            <td>designer</td>
        </tr>
        <tr >
            <td > sign:</td>
            <td></td>
        </tr>
    
    </table>
    
        <div class="para font">
            <p>
           I propose that the design be checked as category 1. I confirm that the check of the scheme 
    described above has been carried out with the required level of independence required for a 
    category 1 check, and that we are satisfied that the design provides a satisfactory solution to the 
    brief and standards referenced.
            </p>
        </div>
        {{-- @php $user = Auth::user(); @endphp --}}
        @if($temporary_work->designerCertificates->checker_signature)
        @php 
            $checker = $user
            @endphp
        @endif
        <table class="font" style="width:100%;">
        <tr>
            <td style="width:20%" >Name:</td>
            <td>{{$checker->name ?? ''}}</td>
    
        </tr>
        <tr >
            <td > Date:</td>
            <td>{{$checker->designerCertificates->created_at ?? ''}}</td>
        </tr>
        <tr >
            <td> Organisation:</td>
            <td>{{$temporary_work->designer_company_name ?? ''}}</td>
        </tr>
        <tr >
            <td> Position:</td>
            <td>checker</td>
        </tr>
        <tr >
            <td> sign:</td>
            <td></td>
        </tr>
    
    </table>
    </div>
</page>
    