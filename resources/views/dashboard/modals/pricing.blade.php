<input type="hidden" name="temporary_work_id" value="{{$temporary_work->id}}"/>
<table class="table drawing_infoTable" style="border-collapse: collapse;background: none;">
<thead>
    <tr>
        <th>Price</th>
        <th>Description</th>
        <th>Submition Date</th>
    </tr>
</thead>
<tbody>
    @foreach($temporary_work->designerQuote as $row)
        <tr style="background: {{$background ?? ''}}  !important">
            <td>£{{$row->price}}</td>
            <td>{{$row->description}}</td>
            <td>{{$row->date}}</td>
        </tr>
    @endforeach
</tbody>
</table>