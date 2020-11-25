@extends('layout')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<div class="card">
    <a href="nuevoatendedor" type="submit" class="btn btn-block btn-info btn-lg">Agregar Atendedor</a>
      <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
            <th></th>
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
                <td><a href="modatendedor" class="btn btn-app"><i class="fas fa-edit"></i> Editar</a></td>
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
        $(document).ready(function() {
            $('#example').DataTable();
        } );
      }
  </script>
  
 
 



  
