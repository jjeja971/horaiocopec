<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@extends('layout')
@section('content')
<a href="nuevoatendedor" type="buttom" class="btn btn-success btn-lg">Agregar nuevo Turno</a>
<hr>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Lista de Turnos</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Id</th>
        <th>Hora de Entrada</th>
        <th>Hora de Salida</th>
        <th>Editar</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($turno as $item)
            <tr>
                <td>{{$item->id_turno}}</td>
                <td>{{$item->hora_entrada}}</td>
                <td>{{$item->hora_salida}}</td>        
                <td><a href="/modificarTurno/{{$item->id_turno}}"  class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</a></td>
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
    
document.getElementById("nombrePag").textContent="Turnos";
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