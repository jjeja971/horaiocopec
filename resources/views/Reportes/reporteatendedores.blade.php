<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="card-body">
        <table id="example" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Rut</th>
            <th>Nombres</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Editar</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($lista as $item)
              <tr>
                <td>{{$item->rut_atendedor}}</td>
                <td>{{$item->nombre_atendedor}}</td>
                <td>{{$item->numero}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->id_jornada}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</body>
</html>