@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="text-align: center"><h1>Menú Horario y Turno</h1></div>

        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="text-align: center">
            <a href="/horarioManual" class="mt-5 btn btn-primary btn-lg btn-block">Ingresar Horario manual</a>
        </div>
        <div class="col-lg-4"></div>

        <!--<div class="col-lg-4"></div>
        <div class="col-lg-4" style="text-align: center">
            <a href="/listahorario" class="mt-5 btn btn-primary btn-lg btn-block">Ingresar Horario manual 2</a>
        </div>
        <div class="col-lg-4"></div>-->

        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <a href="/horarioAutomatico" class="mt-4 btn btn-success btn-lg btn-block">Generar Horario automático</a>
        </div>
        <div class="col-lg-4"></div>
        
        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <a href="/interfazTurnos" class="mt-5 btn btn-primary btn-lg btn-block"><b>Turnos</b></a>
        </div>
        <div class="col-lg-4"></div>
        

        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <a href="." style="margin-top: 5em" class="btn btn-primary btn-lg btn-block">Volver</a>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>


@endsection

<script>
    window.onload = function() {
    document.getElementById("nombrePag").textContent="Menú horarios";
    }
</script>