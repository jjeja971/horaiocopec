<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
@extends('layout')
@section('content')


<form action="/convertirpdfhorasemana/{!!$fechaInicio!!}" method="post" target="_blank" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="chartData" id="chartInputData">
  <button type="submit" style="background: rgb(11, 155, 78); color: #ffffff"  class="btn"><b>Descargar en PDF</b> <i class="far fa-file-pdf" style="color: rgb(255, 255, 255)"></i></button>
</form>
<hr>
<div class="card" id="tabla_div">
  <div class="card-header">
    <h5><b>Registro de Lunes {!! $fechaInicio !!} a Domingo {!! $fechaFin !!}</b></h5>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>RUT-Nombre</th>
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
            <td>{{$item->ruta}} - {{$item->nombre}}</td>
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
  
<script>
  window.onload = function() {
    document.getElementById("nombrePag").textContent="Horarios de semana";

    $("#tabla_div").append("<div id='tabla_div'></div>");

    setTimeout(function(){
            let chartsData = $("#tabla_div").html();
            $("#chartInputData").val(chartsData);
        }, 200);
  }
</script>

@endsection

  
 
 



  
