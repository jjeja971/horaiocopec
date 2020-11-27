@extends('layout')
@section('content')
@foreach ($dato as $item)
    
@endforeach
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Nuevo Atendedor</h3>
    </div>
    <form role="form">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="rut">Rut</label>
          <input type="text" class="form-control" id="rut" name="rut" value="{{$item->rut_atendedor}}">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre_atendedor}}">
        </div>
        <div class="form-group">
            <label for="numero">Telefono</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{$item->numero}}">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$item->email}}">
          </div>
          <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{$item->direccion}}">
          </div>
          <div class="form-group">
            <label>Select</label>
            <select id="jornada" name="jornada" class="form-control">
              @foreach ($dato2 as $item2)
                <option value="{{$item2->id_jornada}}">{{$item2->tipo}}</option>
              @endforeach

            </select>
            <script> 
              document.getElementById("jornada").value = {{$item->id_jornada}};
            </script>
            
           
          </div>
          
          

        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection

