<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@extends('layout')
@section('content')
<a href="nuevoatendedor" type="buttom" class="btn btn-success btn-lg">Agregar nuevo Atendedor</a>
<hr>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Semana</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nombre</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sabado</th>
        <th>Domingo</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($dato as $item)
          <tr>
            <td>{{$item->nombre}}</td>
            <td>{{$item->LUNES}}</td>
            <td>{{$item->MARTES}}</td>
            <td>{{$item->MIERCOLES}}</td>
            <td>{{$item->JUEVES}}</td>
            <td>{{$item->VIERNES}}</td>
            <td>{{$item->SABADO}}</td>
            <td>{{$item->DOMINGO}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
      <!-- /.card-body -->
</div>
  
@endsection

  
 
 



  
