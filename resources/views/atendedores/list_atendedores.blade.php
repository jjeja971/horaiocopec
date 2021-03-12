<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@extends('layout')
@section('content')
<a href="nuevoatendedor" type="buttom" class="btn btn-success btn-lg"><i class="fas fa-plus"></i> Nuevo Atendedor</a>
<hr>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Lista de atendedores</h3>
  </div>
  <!-- /.card-header -->
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
        <th>Eliminar</th>
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
            <td>
              <a href="/modatendedor/{{$item->rut_atendedor}}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i>Editar
              </a>
            </td>
            <td>
              <a id="eliminar" name="eliminar" href="/eliminar_atendedor/{{$item->rut_atendedor}}" class="btn btn-danger btn-sm">
                <i class="far fa-trash-alt"></i> Eliminar
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
      <!-- /.card-body -->
</div>
  
@endsection

  <script>
      window.onload = function() { 


        if("{{session('alerta')}}"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: `{{session('alerta')}}`,
            html: '',
            showConfirmButton: false,
            timer: 1000,
        })
    }

    if("{{session('alertaeliminar')}}"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: `{{session('alertaeliminar')}}`,
            html: '',
            showConfirmButton: false,
            timer: 1000,
        })
    }


          document.getElementById("nombrePag").textContent="Tabla Atendedores";
          $('#example').DataTable({
            "language":{
            "lengthMenu": "Mostrar _MENU_ por paginación",
            "zeroRecords": "No se encontraron resultados",
            "info": "Total mostrados:  _TOTAL_",
            "infoEmpty": "",
            "infoFiltered": "",
            "search":"Buscar: ",
            "paginate":{
              "next": "Siguiente",
              "previous": "Anterior"
            }
            }
          }); 
      }
  </script>
  
 
 



  
