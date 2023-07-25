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
</style>
    
    <page pageset="old">
    
    <table style="width:100%">
      <tr >
        <td style="border-right:1px solid black" > 
           <div class="company-name"> </div>
           <div class="address"> 85 Great Portland Street <br> London, United Kingdom, W1W 7LT</div>
           <div class="email"> <span>Email:</span>  <p style="color:green;"> </p> </div>
           <p></p>
        </td>
        <td style="width:50%;">
        <div class="form-group">
        <label for="title">Title:</label>
        <p></p>
        </div>
        <hr>
        <div class="form-group">
        <label for="project">Project: {{$temporary_work->project->name ?? $temporary_work->projname}}</label>
        <p></p>
        </div>
        <hr>
        <div class="form-group">
        <label for="designer">Designer: {{$temporary_work->client_email == null ? $temporary_work->designer->user->name : $temporary_work->creator->name }}</label>
        <p></p>
        </div>
        <hr>
        <div class="form-group">
        <label for="date">Date: {{$temporary_work->design_issued_date}}</label>
    
        <p></p>
        </div>
    
        </td>
    
      </tr>
    
    
    </table >
    <table style="width:100%">
        <tr>
            <td style="width:50%">
                <span>Design check Category:</span>
            </td>
            <td style="border-left:1px solid white !important;">
                <label for="cat1">CAT {{$temporary_work->tw_category }} </label>
                <p></p>
            </td>
        </tr>
    
       
    </table>
    
    <div class="heading">
        <p>Temporary works design certificate</p>
    </div>
    <div class="options" style="margin-left:5%">
            <p>(a) The following element of temporary works:</p> <br>
            <p>{{$temporary_work->description_temporary_work_required}}</p>
            <p>(b) Described in design brief:</p> <br>
            <p>{{$temporary_work->design_requirement_text}}</p>
            <p> (c) Has been designed in accordance with the following standards and reference</p> <br>
            <table style="width:100%">
            @foreach($temporary_work->designerCertificates as $certificate)
                @foreach(optional($certificate)->tags ?? [] as $tag)
                    <tr>
                        <td style="width:30%">{{$tag->title}} </td>
                        <td> {{$tag->description}}</td>
                    </tr>
                @endforeach
                <hr>
            @endforeach
            
    </table>
    <p>(d) The design is described in the following documents:</p> <br>
            <input type="text" id="" class="set"/>  <br>
            <input type="text" id="" class="set"/>
    </div>
    
    
    
    
    
    @php
     use App\Utils\HelperFunctions; 
     use App\Models\User; 
    @endphp
    <div class="options" style="margin-left:5%">
    <div class="three-points">
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
    <table style="width:100%;">
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
    
        <div class="para">
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
        <table style="width:100%;">
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
    