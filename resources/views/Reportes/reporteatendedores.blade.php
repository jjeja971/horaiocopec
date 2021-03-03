<!DOCTYPE html>
{{-- <link rel="stylesheet" href="adminlte/css/adminlte.min.css">
 --}}
<html lang="es">
<body>
    <div class="card-body">
        <table id="example" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Rut</th>
            <th>Nombres</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Dirección</th>
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
