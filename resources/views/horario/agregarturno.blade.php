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
        <h3 class="card-title">Nuevo Turno</h3>
      </div>
      <form method="POST" action="registurno" role="form">
          @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="rut">Hora Entrada</label>
            <input type="text" class="form-control" id="entrada" name="entrada" required>
          </div>
          <div class="form-group">
            <label for="nombre">Hora Salida</label>
            <input type="text" class="form-control" id="salida" name="salida" required>
          </div>
              
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Ingresar datos Turno</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>
@endsection

<script>


  window.onload = function() {
     
      if("{{session('alerta')}}"){
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: `{{session('alerta')}}`,
              html: '',
              showConfirmButton: false,
              timer: 1000,
          })
      }
  </script>