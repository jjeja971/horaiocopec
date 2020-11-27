<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@extends('layout')
@section('content')
<a href="nuevoatendedor" type="buttom" class="btn btn-success btn-lg">Agregar nuevo Atendedor</a>
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
      </tr>
      </thead>
      <tbody>
        @foreach ($lista as $item)
          <tr>
              <td>{{$item->rut_atendedor}}</td>
              <td>{{$item->nombre_atendedor}}</td>
              <td>{{$item->numero}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->direccion}}</td>
              <td><a href="#"  class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</a></td>
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
          $('#example').DataTable(); 
      }
  </script>
  
 
 



  
