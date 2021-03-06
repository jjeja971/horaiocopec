<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3" style="text-align: center"></div>
        <div class="col-lg-6" style="text-align: center"><h1>Ingreso automático de horario</h1></div>
        <div class="col-lg-3" style="text-align: center"></div>

        <div class="col-lg-3" style="text-align: center"></div>
        <div class="col-lg-6" style="text-align: center"><a href="{{ URL::previous() }}" class="mt-5 btn btn-warning btn-lg"><b>Cancelar horario completo</b></a></div>
        <div class="col-lg-3" style="text-align: center"></div>

        <div class="col-lg-1">
        </div>
        <div class="mb-5 mt-5 col-lg-10"  style="text-align: center">
            <div id="timeline" style="height: 180px;"></div>
        </div>
        <div class="col-lg-1"></div>


        <!-- Modal -->
                                        

        <div class="modal fade" id="exampleModal" tabindex="-1" style="background: rgba(9, 20, 36, 0.5)" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">                                      
            <form method="POST" id="formmodal" name="formmodal" action="gestionturnohorario">
            @csrf
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header" style="z-index:90;background: #3955cf">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke">Lista de personal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="background: rgba(237, 240, 243, 0.295); width:48%; height:100%; position:absolute;"></div>
                        <div class="modal-body">
                            <div class="container-fluid" style="text-align: center">
                                <h3 style="color: #395ca8"> Seleccione el personal a asignar al turno elegido</h3>                              
                                <div class="col-lg-sm mt-5">
                                
                                    <div class="row" >
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            @if (session("fecha_horario_m"))
                                                <input id="date" type="date" name="date" max="3000-12-31" min="1000-01-01" 
                                                style="font-size: 1.6em; color:#1d59a7" class="form-control" value="{{session("fecha_horario_m")}}" readonly> 
                                             @endif
                                        </div>
                                        <div class="col-sm-3"> 
                                            <select id="modlugar" name="modlugar" style="font-size: 1.6em; width:100%; color:#1d59a7"> 
                                                <option value="Gasolina">Gasolina</option>
                                                <option value="Petroleo">Petroleo</option>
                                            </select>    
                                        </div>
                                        <div class="col-sm-3"></div>

                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6 mt-4">
                                            <h3 class="mt-5">Atendedor actual</h3>
                                          
                                            <select class="mt-4" id="personalmodal" name="personalmodal" style="pointer-events:none; font-size: 1.6em; width:100%; color:#1d59a7"> 
                                                @foreach ($personalrec as $item) 
                                                    <option value="{{ $item->rut_atendedor }}">{{ $item->nombre_atendedor }}</option>   
                                                @endforeach  
                                            </select>  
                                            
                                            <h2 class="mt-5">Cambiar Atendedor a</h2>
                                           
                                            <select class="mt-4" id="modificarpersonal" name="modificarpersonal" style="font-size: 1.6em; width:100%; color:#1d59a7"> 
                                                @foreach ($personalrec as $item) 
                                                    <option value="{{ $item->rut_atendedor }}">{{ $item->nombre_atendedor }}</option>   
                                                @endforeach  
                                            </select>  
                                            
                                            <hr class="mt-4">
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <input id="estado" name="estado" type="hidden" />
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <button type="submit" id="modificarTurno" name="action" style="width: 13em;" class="btn btn-primary btn-lg mb-3 mt-5" value="modificar"><b>Modificar</b></button>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" id="btnRemoverTurno" name="action" style="width: 13em;" class="btn btn-danger btn-lg mb-3 mt-5 ml-4" value="eliminar"><b>Eliminar del horario</b></button>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> 



    </div>
</div>


@endsection

<script>
    
window.onload = function() {
    
    document.getElementById("nombrePag").textContent="Horario Automático";
    var opcion = document.getElementById("listapersonal");

    google.charts.load('current', {'packages':['timeline']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
                
        var chart = new google.visualization.Timeline(document.getElementById('timeline'));
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'President' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
        dataTable.addRows([
      
            @foreach($turnosRecomendados as $item)
            [ 'Sin asignar {{$item->id}}',       new Date({{$item->hora}}), new Date({{$item->hora}}+{{$item->cantidadHoras_recomendadas}}) ],
            @endforeach
            ]);

            var options = {
                height: 580,
                timeline: {
                    legend: 'none'
                },
                tooltip: {
                    trigger: 'selection'
                }                
            };
    
        chart.draw(dataTable, options); 
        //metodo escuchar seleccion barra grafico
        google.visualization.events.addListener(chart, 'select', selectHandler);
            
        function selectHandler() {
            $('#exampleModal').modal('show');
            var selection = chart.getSelection();

            for (var i = 0; i < selection.length; i++) {
                var item = selection[i];             
            }
                            
            if ((opcion.options[opcion.selectedIndex])) {
                var seleccionpersonal = opcion.options[opcion.selectedIndex].text;
                dataTable.setCell(item.row, 0, seleccionpersonal);        
                $("#listapersonal").val("0");
                chart.draw(dataTable, options);
                
            }
            
    
            opcion.addEventListener("change", function(){
                $('#exampleModal').modal('hide');
                selectHandler();
            });
            

        } 



        
    }

    

}
</script>