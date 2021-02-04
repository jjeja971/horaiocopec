@extends('layout')
@section('content')
@foreach ($dato as $item)
    
@endforeach
<div class="row">

  <div class="col-lg-4"></div>

  <div class="col-lg-4">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Modificar Atendedor</h3>
    </div>
    <form method="POST" action="/modificaratendedor">
      @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="rut">Rut</label>
          <input type="text" class="form-control" id="rut" name="rut" value="{{$item->rut_atendedor}}" readonly>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" onkeypress='return validaletras(event)' value="{{$item->nombre_atendedor}}">
        </div>
        <div class="form-group">
            <label for="numero">Teléfono</label>
            <input type="text" class="form-control" maxlength="11" id="numero" name="numero" minlength="9" maxlength="11" onkeypress='return validaNumericos(event)' value="{{$item->numero}}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" onkeypress='return validaemail(event)' value="{{$item->email}}">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" onkeypress='return validaletraynumeroconespacio(event)' value="{{$item->direccion}}">
        </div>
        <div class="form-group">
          <label>Jornada</label>
          <select id="jornada" name="jornada" class="form-control">
              @foreach ($dato2 as $item2)
                <option value="{{$item2->id_jornada}}">{{$item2->tipo}}</option>
              @endforeach
          </select>     
        </div>   

      </div>

      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-primary">Modificar</button>
      </div>
    </form>
  </div>
  </div>

  <div class="col-lg-4"></div>
</div>
@endsection

<script> 
 window.onload = function() { 
    document.getElementById("nombrePag").textContent="Modificar Atendedor";
    document.getElementById("jornada").value = {{$item->id_jornada}};
 }
</script>

