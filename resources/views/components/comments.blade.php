<!-- Add this code to your comments.blade.php file -->

@php
    $table = '';
    $tabletwc = '';
    $tabletwcdesigner = '';
    $path = config('app.url');

    if ($request->type == 'normal') {
        $comments = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'normal'])->get();
        $twccomments = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'twc'])->get();
        $twcdesigncomments = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'twctodesigner'])->get();
    } elseif ($request->type == 'client') {
        $twcdesigncomments = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'client'])->get();
    } elseif ($request->type == 'pc') {
        $comments = TemporaryWorkComment::where(['temporary_work_id' => $request->temporary_work_id, 'type' => 'pc'])->get();
    } elseif ($request->type == 'permit') {
        $permit_id = \Crypt::decrypt($request->permit_id);
        $comments = PermitComments::where(['permit_load_id' =>  $permit_id])->latest()->get();
    } elseif ($request->type == 'scan' || $request->type == 'qscan') {
        $temporary_work_id = $request->temporary_work_id;
        $comments = TemporaryWorkComment::where(['temporary_work_id' => $temporary_work_id, 'type' => 'scan'])->get();
    }

    // TWC comments
    if (isset($twccomments) && count($twccomments) > 0) {
        $tabletwc .= '<table class="table" style="border-radius: 8px; overflow: hidden;">
                        <thead style="height: 60px; background: #07D564;">
                            <tr>
                                <th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">No</th>
                                <th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">Twc Comment</th>
                                <th style="width: 120px; color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>';

        $i = 1;
        foreach ($twccomments as $comment) {
            $tabletwc .= '<tr style="background: white">
                            <td style="padding: 11px !important">' . $i . '</td>
                            <td style="padding: 11px !important">' . $comment->comment . '</td>
                            <td style="padding: 11px !important">' . date("d-m-Y H:i:s", strtotime($comment->created_at)) . '</td>
                        </tr>';
            $i++;
        }

        $tabletwc .= '</tbody></table>';
    }

    <!-- Add this code to your comments.blade.php file -->

    // TWC Designer comments
    if (isset($twcdesigncomments) && count($twcdesigncomments) > 0) {
        $tabletwcdesigner .= '<table class="table" style="border-radius: 8px; overflow: hidden;">
                                <thead style="height: 60px; background: #07D564;">
                                    <tr>
                                        <th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">No</th>
                                        <th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">TWC Designer Comment</th>
                                        <th style="width: 120px; color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>';

        $i = 1;
        foreach ($twcdesigncomments as $comment) {
            $tabletwcdesigner .= '<tr style="background: white">
                                    <td style="padding: 11px !important">' . $i . '</td>
                                    <td style="padding: 11px !important">' . $comment->comment . '</td>
                                    <td style="padding: 11px !important">' . date("d-m-Y H:i:s", strtotime($comment->created_at)) . '</td>
                                </tr>';
            $i++;
        }

        $tabletwcdesigner .= '</tbody></table>';
    }
@endphp

@if(isset($comments) && count($comments) > 0)
    <table class="table" style="border-radius: 8px; overflow: hidden;">
        <thead style="height: 60px; background: #07D564;">
            <tr>
                <th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">No</th>
                <th style="color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">Comment</th>
                <th style="width: 120px; color: white !important; font-size: 16px !important; font-weight: 600 !important; text-align: left;">Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($comments as $comment)
                <tr style="background: white">
                    <td style="padding: 11px !important">{{ $i }}</td>
                    <td style="padding: 11px !important">{{ $comment->comment }}</td>
                    <td style="padding: 11px !important">{{ date("d-m-Y H:i:s", strtotime($comment->created_at)) }}</td>
                </tr>
                @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
@endif

{!! $tabletwc !!}
{!! $tabletwcdesigner !!}

