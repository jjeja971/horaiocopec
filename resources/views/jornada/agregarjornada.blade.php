@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Nueva Jornada</h3>
      </div>
      <form method="POST" action="registrarjornada" role="form">
          @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="rut">Tipo jornada</label>
            <div class="form-group">
                <select class="form-control" id="idjornada" name="idjornada">
                  <option value="F" >Full-Time</option>
                  <option value="P" >Part-Time</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="nombre">Cantidad de Horas</label>
            <input type="number" class="form-control" id="horasjornada" name="horasjornada" required>
          </div>
              
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Registrar datos Jornada</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>
@endsection
