@extends('layout')
@section('content')
@foreach ($turnos as $item)
@endforeach
<div class="row">

    <div class="col-lg-4"></div>
  
    <div class="col-lg-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Modificar Turno</h3>
      </div>
      <form role="form">
        @csrf
        <div class="card-body">
  
          <div class="form-group">
            <label for="rut">Id</label>
            <input type="text" class="form-control" id="rut" name="rut" value="{{$item->id_turno}}" readonly>
          </div>
          <div class="form-group">
              <label for="nombre">Hora de Entrada</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->hora_entrada}}">
          </div>
          <div class="form-group">
              <label for="numero">Hora de Salida</label>
              <input type="text" class="form-control" id="numero" name="numero" value="{{$item->hora_salida}}">
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
document.getElementById("nombrePag").textContent="Modificar Turno";
}
</script>