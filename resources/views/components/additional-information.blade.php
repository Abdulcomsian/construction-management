<table class="table commentsTable" style="border-radius: 8px; overflow:hidden;">
    <thead style="height:60px;background: #07D564;">
    <tr>
        <th style="width:10%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">No</th>
        <th style="width:35%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">Designer Comment</th>
        <th style="width:40%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">TWC Reply</th>
    </tr>
   </thead>
   <tbody>
    @foreach($tempWorks->AdditionalInformation as $detail)
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
                <div><p>{{$comments->comment}}</p></div>
                <a target="_blank" href="{{ asset('uploads/additional_information/' . $comments->file_destinaion) }}">View File</a>
            </div>
            <br>{{date("d-m-Y H:i:s", strtotime($comments->created_at))}}
                @foreach($comments->reply as $reply)
                    <div>
                        <div><p>{{$reply->comment}}</p></div>
                        <a target="_blank" href="{{ asset('uploads/additional_information/' . $reply->file_destinaion) }}">View File</a>
                    </div>
                @endforeach
                <form style="display:block;" method="get" action="{{url('job/comment/reply')}}" enctype="multipart/form-data">
                    <input type="hidden" name="tempid" value="{{$comments->id}}">
                    <textarea style="width: 100%" type="text" class="replay" name="replay" placeholder="Add comment here..."></textarea>
                    <div class="submmitBtnDiv">
                        <input style="width:50%;margin-top:20px;float:left" type="file" name="replyfile">
                        <input type="hidden" name="commentid" value="228">
                        <input type="hidden" name="scan" value="scan">
                        <button class="btn btn-primary replay-comment" style="font-size:10px;margin-top:10px;float:right;">submit</button>
                    </div>
        
                </form>
            @endforeach
        <form style="display:block;" class="form"  enctype="multipart/form-data">
            <input type="hidden" name="tempid" value="{{$detail->id}}">
            <textarea style="width: 100%" type="text" class="replay" name="replay" placeholder="Add comment here..."></textarea>
            <div class="submmitBtnDiv">
                <input style="width:50%;margin-top:20px;float:left" type="file" name="replyfile">
                <button type="button" class="btn btn-primary additional-comment" style="font-size:10px;margin-top:10px;float:right;">submit</button>
            </div>

        </form>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>