<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    asd
    <div id="invoice" name="invoice">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lista as $item)
                <tr>
                    <td>{{$item->rut_atendedor}}</td>
                    <td>{{$item->nombre_atendedor}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>