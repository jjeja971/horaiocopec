@extends('layout')
@section('content')

<div class="row">
    
        <div class="col-lg-3"></div>
        <div class="col-lg-6 elevation-5 tarjetaformulario">
            
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
                    <!--<a href="/horarioAutomatico" class="mt-4 mb-5 btn btn-primary btn-lg btn-block">Generar Horario automático</a>-->
                    <button type="button" class="mt-4 mb-5 btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">Generar Horario automático</button>
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

<form action="/horarioAutomatico" method="POST"  class="row col-lg-8 elevation-4 tarjetaformulario" >
    @csrf
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label >Fecha:</label>
                <div class="input-group">
                    @if (session("fecha_horario_m"))
                        <input id="date" type="date" name="date" max="3000-12-31" 
                        min="1000-01-01" style="font-size: 1.6em; color:#1d59a7" class="form-control" value="{{session("fecha_horario_m")}}"> 
                    @else
                        <input id="date" type="date" name="date" max="3000-12-31" 
                        min="1000-01-01" style="font-size: 1.6em; color:#1d59a7" class="form-control"> 
                    @endif  
                </div>          
            </div>
        </div>
        <div class="modal-footer">
          <a href="/horarioAutomatico" class="mt-4 mb-5 btn btn-primary btn-lg btn-block">Generar Horario automático</a>
        </div>
     
      </div>
    
    </div>
  </div>
</form> 

@endsection

<script>
    window.onload = function() {
    document.getElementById("nombrePag").textContent="Menú horarios";
    }
</script>