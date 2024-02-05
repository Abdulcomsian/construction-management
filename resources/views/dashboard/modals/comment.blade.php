{{-- <?php 
    // $checked = $tempWorks->clientComments[0]['status'] == 2 ? "checked disabled" : '';
?>
<div class="d-flex justify-content-end">
    <p>
        <label>
            <input class="twc-comment-checked" type="checkbox" {{$checked}} value="{{$tempId}}">
                    Mark As Read
        </label>
    </p>
</div> --}}

<table class="table commentsTable" style="border-radius: 8px; overflow:hidden;">
    <thead style="height:60px;background: #07D564;">
        <tr>
            <th style="width:10%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">No</th>
            <th style="width:35%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">Designer Comment</th>
            <th style="width:40%;text-align:left;color:white !important; font-weight: 600 !important; font-size:16px !important">Client's Reply</th>
        </tr>
    </thead>
    <tbody>
    @php $count = 0; @endphp
    @foreach($tempWorks->clientComments as $comment)
    <?php 
    $count++;
    $list = '';

    $k = 1;
    $formorreply='';
    $none='';
    if ($comment->replay) {
        $none='display:block;';
        // $none='display:none;';
      
        for ($j = 0; $j < count($comment->replay); $j++) {
            if (isset($comment->replay[$j])) {
                $image = '';
                if (isset($comment->reply_image[$j])) {
                    $n = strrpos($comment->reply_image[$j], '.');
                    $ext = substr($comment->reply_image[$j], $n + 1);
                    if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                        // $image = '<a target="_blank" href="' . $path . $comment->reply_image[$j] . '"><img src="' . $path . $comment->reply_image[$j] . '" width="50px" height="50px"/></a>';
                        $image = '<a target="_blank" href="' . asset($comment->reply_image[$j]) . '"><i class="fa fa-eye"></i></a>';
                    } else {
                        $image = '<a target="_blank" href="' . asset($comment->reply_image[$j]) . '">View File</a>';
                    }
                }
                $date = '';
                if (isset($comment->reply_date[$j])) {
                    $date = date("H:i d-m-Y", strtotime($comment->reply_date[$j]));
                }
                // $list .= '<tr style="background:#08d56478;margin-top:1px"><td>R</td><td>' . $comment->replay[0] . '</td><td>' . $comment->reply_email . '<br>' . $image . '<br>' . $date . '</td><td></td><td>' .  date("d-m-Y", strtotime($comment->reply_date[0])) . '</td></tr><br>';
                $k++;
                $formorreply .= $comment->reply_email . '<br>' . $comment->replay[$j] . '<br>' . $date . '<br>';
                if ($image) {
                    $formorreply .= $image . '<br>';
                }
                $formorreply .= '<br>';
            }
        }
            // dd($comment->replay[0]);
    }
    ?>
        <tr style="background:white">
    <td>{{$count}}</td>
    <td style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), rgba(7, 213, 100, 0.5);">
        <span style="font-weight: 600; font-size: 16px; margin-right:5px">Comment:</span>
        <span style="font-size:16px; white-space: pre-wrap;">{{$comment->comment}}</span>
        <br>
        <div><span style="color: #9D9D9D">{{date('H:i d-m-Y', strtotime($comment->created_at))}}</span></div>
        @if(isset($comment->image))
        <a href="{{asset($comment->image)}}" target="_blank"><i class="fa fa-eye"></i></a>
        @endif
        <span style="color: #3A7DFF; font-size: 14px; font-weight: 400;"></span>
    </td>
    <td style=" flex-direction: column;">

        {!!$formorreply!!}
     <form style="" method="post" action="{{route('temporarywork.storecommentreplay')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tempid" value="{{$tempWorks->id}}"/>
        <textarea style="width: 100%" type="text" class="replay" name="replay" placeholder="Add comment here..."></textarea>
         <div class="submmitBtnDiv">
             <input style="width:50%;margin-top:20px;float:left" type="file" name="replyfile[]" multiple>
             <input type="hidden" name="commentid" value="{{$comment->id}}"/>
             
             <button class="btn btn-primary replay-comment" style="font-size:10px;margin-top:10px;float:right;">submit</button>
         </div>
     </form>
    </td>
</tr>
@endforeach
</tbody></table>