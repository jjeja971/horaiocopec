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
            <td>{{$item->nombre_atendedor}}</td>
            @if({{$item->dia}}=='LUNES')
                <td>{{$item->hora_entrada}} a {{$item->salida}}</td>
            @elseif({{$item->dia}}=='MARTES')
                <td>{{$item->hora_entrada}} a {{$item->salida}}</td>
            @elseif({{$item->dia}}=='MIERCOLES')
                <td>{{$item->hora_entrada}} a {{$item->salida}}</td>
            @elseif({{$item->dia}}=='JUEVES')
                <td>{{$item->hora_entrada}} a {{$item->salida}}</td>
            @elseif({{$item->dia}}=='VIERNES')
                <td>{{$item->hora_entrada}} a {{$item->salida}}</td>
            @elseif({{$item->dia}}=='SABADO')
                <td>{{$item->hora_entrada}} a {{$item->salida}}</td>
            @elseif({{$item->dia}}=='DOMINGO')
                <td>{{$item->hora_entrada}} a {{$item->salida}}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
      <!-- /.card-body -->
</div>
  
@endsection

  
 
 



  
