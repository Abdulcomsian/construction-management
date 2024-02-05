<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signature PDF</title>
</head>
<style>
    table,
    td,
    th {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .paddingTable td {
        padding: 10px;
    }
</style>
<body>
    <table>
        <tbody>
            <tr style="min-height: 150px;">
                {{-- just a name  --}}
                @if($signtype == 1)
                    <td style="width: 100px;height: 100px; background:gray;color:white">
                        <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Client Signature After Approval</b></label>
                    </td>
                    <td style="width: 370px; font-size:12px;">
                        <p>{{$image}}</p>               
                    </td>

                {{-- signature image  --}}
                @elseif($pdfSigntype == 1)
                    <td style="width: 100px;height: 250px; background:gray;color:white">
                        <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Client Signature After Approval</b></label>
                    </td>
                    <td style="width: 370px; font-size:12px;">
                        <p>{{asset('temporary/signature/', $image)}}</p>
                        <img src="{{asset('temporary/signature/', $image)}}" alt="Image">                    
                    </td>
                {{-- actual image of Signature  --}}
                @else
                    <td style="width: 100px;height: 250px; background:gray;color:white">
                        <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Client Signature After Approval</b></label>
                    </td>
                    <td style="width: 370px; font-size:12px;">
                        <p>{{asset('temporary/signature/', $image)}}</p>
                        <img src="{{asset('temporary/signature/', $image)}}" alt="Image">                    
                    </td>
                @endif
                
            </tr>
        </tbody>
    </table>
</body>
</html>