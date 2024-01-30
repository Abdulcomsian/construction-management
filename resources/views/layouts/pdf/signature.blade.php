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
                <td style="width: 150px;height: 300px; background:gray;color:white">
                    <label for="" style="font-weight:900;float: left;width: 200px; height: 70px;  padding: 10px; display: grid; align-items: center; background: gray !important;  color: #fff; margin: 0px;"><b style="font-size: 12px;">Client Signature After Approval</b></label>
                </td>
                <td style="width: 270px; font-size:12px;">
                    <img src="{{asset('temporary/signature/', $image)}}" alt="Image">                    
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>