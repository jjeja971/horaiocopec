@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{Session::get('error')}}
    </div>
    @endif


    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Nuevo Atendedor</h3>
      </div>
      <form method="POST" action="insertaratendedor" role="form">
          @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="rut">Rut</label>
            <input type="text" class="form-control" id="rut" name="rut" required>
          </div>
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
              <label for="numero">Telefono</label>
              <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="direccion">Direccion</label>
              <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
              <label>Jornada</label>
              <select id="jornada" name="jornada" class="form-control">
                <option value="1">Full</option>
                <option value="2">Par-Time 20Hr</option>
                <option value="3">par-Time 30Hr</option>

              </select>
            </div>
              
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Agregar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>
@endsection
