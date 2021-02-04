@extends('layout')
@section('content')

<div class="row">
    
        <div class="col-lg-3"></div>
        <div class="col-lg-6" style="border: solid rgb(45, 47, 148) 1px; padding:4em ;border-radius:2em; background: rgb(255, 255, 255);">
            
            <div class="row">
                <div class="col-lg-12 mb-5" style="text-align: center; color:rgb(248, 47, 47)"><h1><b>Menú de Horario y Turno</b></h1></div>

                <div class="col-lg-2"></div>
                <div class="col-lg-8" style="text-align: center">
                    <a href="/horarioManual" class="mt-5 mb-2 btn btn-primary btn-lg btn-block">Ingresar Horario manual</a>
                </div>
                <div class="col-lg-2"></div>

                <!--<div class="col-lg-4"></div>
                <div class="col-lg-4" style="text-align: center">
                    <a href="/listahorario" class="mt-5 btn btn-primary btn-lg btn-block">Ingresar Horario manual 2</a>
                </div>
                <div class="col-lg-4"></div>-->

                <div class="col-lg-2"></div>
                <div class="col-lg-8"  style="text-align: center">
                    <a href="/horarioAutomatico" class="mt-4 mb-5 btn btn-primary btn-lg btn-block">Generar Horario automático</a>
                </div>
                <div class="col-lg-2"></div>
                
                <div class="col-lg-2"></div>
                <div class="col-lg-8"  style="text-align: center">
                    <a href="/interfazTurnos" class="mt-3 btn btn-primary btn-lg btn-block">Turnos</a>
                </div>
                <div class="col-lg-2"></div>
                

                <div class="col-lg-2"></div>
                <div class="col-lg-8"  style="text-align: center">
                    <a href="/Inicio" style="font-size:1.5em;margin-top: 5em; color: #4340e7" class="btn btn-lg btn-block">Volver a Inicio</a>
                </div>
                <div class="col-lg-2"></div>
            </div>
   
        </div>
        <div class="col-lg-3"></div>   
   
</div>

@endsection

<script>
    window.onload = function() {
    document.getElementById("nombrePag").textContent="Menú horarios";
    }
</script>