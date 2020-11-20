@extends('layout')
@section('content')

<div class="card">
  <a href="nuevoatendedor" type="submit" class="btn btn-block btn-info btn-lg">Agregar Atendedor</a>
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
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
              <td><a class="btn btn-app"><i class="fas fa-edit"></i> Editar</a></td>
          </tr>
          @endforeach
        


        
        </tbody>

      </table>
    </div>
    <!-- /.card-body -->
  </div>




  @endsection

  