<table class="table commentsTable" style="border-radius: 8px; overflow:hidden;">
    <thead style="height:60px;background: #07D564;">
    <tr>
        <th style="width:10%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">No</th>
        <th style="width:35%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">Designer Comment</th>
        <th style="width:40%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">Client's Reply</th>
    </tr>
   </thead>
   <tbody>
      @php
        $detail = $tempWorks->AdditionalInformation;
      @endphp 
 
    <tr style="background:white">
        <td>1</td>
        <td style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), rgba(7, 213, 100, 0.5);">
            <span style="font-weight: 600; font-size: 16px; margin-right:5px">Comment:</span><span style="font-size:16px">{{$detail->more_details}}</span><br>
            <div style="display:flex; justify-content: center;"><span style="color: #9D9D9D">{{date('d-m-Y H:i:s' , strtotime($detail->created_at))}}</span></div>
            @if(isset($detail->file_path) && !is_null($detail->file_path))
            <div>
                <a target="_blank" href="{{ asset('uploads/additional_information/' . $detail->file_path) }}">View File</a>
            </div>
            @endif
            <span style="color: #3A7DFF; font-size: 14px; font-weight: 400;"></span>
        </td>
        <td style=" flex-direction: column;">
            @foreach($detail->jobComment as $comments )
            <div>
                <div>{{$comments->comment}}</div>
                @if(isset($comments->file_destination) && !is_null($comments->file_destination))
                    <a target="_blank" href="{{ asset('uploads/additional_information/' . $comments->file_destinaion) }}">View File</a>
                @endif
                <div>
                    {{date("d-m-Y H:i:s", strtotime($comments->created_at))}}
                </div>
            </div>
            <hr>
            @endforeach
        <form action="{{route('additional.comment.reply')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="addId" value="{{$detail->id}}">
            <textarea style="width: 100%" type="text" class="replay" name="comment" placeholder="Add comment here..."></textarea>
            <div class="submmitBtnDiv">
                <input style="width:50%;margin-top:20px;float:left" type="file" name="commentFile">
                <button type="submit" class="btn btn-primary" style="font-size:10px;margin-top:10px;float:right;">submit</button>
            </div>
        </form>

        </td>
    </tr>
    </tbody>
</table>