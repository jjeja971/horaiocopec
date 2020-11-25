<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="text-align: center; color:rgb(102, 102, 245)"><h1>Ingreso manual de Turnos</h1></div>

        <div class="col-lg-2"><p id="hora1p">Hora1</p><p id="hora2p">Hora2</p></div>
        <div class="mb-5 mt-5 col-lg-8"  style="text-align: center">
            <div id="timeline" style="height: 180px;"><h1 style="color: rgb(245, 69, 38)"><b>No hay Turnos agregados</b></h1></div>
        </div>
        <div class="col-lg-2"></div>

        <div class="col-lg-3"></div>
        <div class="mb-5 mt-5 col-lg-6"  style="text-align: center">
            <a id="btnagregarTurno" class="mr-5 btn btn-primary btn-lg" style="color: aliceblue">Agregar turno</a>
            
            <select id="seleccionturno" name="seleccionturno" style="font-size: 1.6em; width:400px; color:#1d59a7" name="combo"> 
                @foreach ($turno as $item) 
                    <option value="{{ $item->id_turno }}">{{ $item->hora_entrada }} - {{ $item->hora_salida }}</option>   
                @endforeach  
            </select>      
        </div>
        <div class="col-lg-3"></div>

        <!-- Modal -->
                                        
        <div class="modal fade" id="exampleModal" tabindex="-1" style="background: rgba(9, 20, 36, 0.5)" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">                                      
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
                            <div class="col-md-12 order-md-1">
                            
                                <div class="row" >
                                    <div class="col-md-3">
                                        <a href="#" id="btnRemoverTurno" class="btn btn-warning btn-lg"><b>Remover este turno</b></a>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <select id="listapersonal" style="font-size: 1.6em; width:600px; color:#1d59a7" name="combo" multiple>                                                     
                                            <option value="1">Nedd Stark</option>
                                            <option value="2">Jon Snow</option>
                                            <option value="3">Sansa Stark</option>
                                        </select>
                                                   
                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <a href="{{ URL::previous() }}" style="margin-top: 7em" class="btn btn-primary btn-lg btn-block">Volver</a>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>

@endsection

<script>
    
window.onload = function() {

    var hr1 = document.getElementById("hora1p");
    var hr2 = document.getElementById("hora2p");
    

    //se mantiene siempre lista deseleccionada para evitar errores
    var divGraf = document.getElementById("timeline");
    divGraf.addEventListener("mousemove", function(){
        $("#listapersonal").val([]);     
    });
    
    document.getElementById("nombrePag").textContent="Horario Automático";
    var agregarTurno = document.getElementById("btnagregarTurno");
    var turnoseleccionado = document.getElementById("seleccionturno");
    
     
    google.charts.load('current', {'packages':['timeline']});
    google.charts.setOnLoadCallback(drawChart);

    //dibujar graf
    function drawChart() {
     
        var chart = new google.visualization.Timeline(document.getElementById('timeline'));
        var dataTable = new google.visualization.DataTable();
        var view = new google.visualization.DataView(dataTable);
        
        dataTable.addColumn({ type: 'string', id: 'id' });
        dataTable.addColumn({ type: 'string', id: 'President' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
        
        var formatter_short = new google.visualization.DateFormat({formatType: 'short'});
        formatter_short.format(dataTable, 3);
        
            var options = {
                height: 450,
                timeline: { legend: 'none' },
                tooltip: { trigger: 'selection' },              
            };
    
        //escuchar selección barra gráfico
        google.visualization.events.addListener(chart, 'select', selectHandler);
        var opcion = document.getElementById("listapersonal");
        function selectHandler() {
           
            $('#exampleModal').modal('show');
            var selection = chart.getSelection();
            
            for (var i = 0; i < selection.length; i++) {
                var item = selection[i];             
            }
                              
            if (opcion.options[opcion.selectedIndex]) {   
                var idpersonal = $('select[id="listapersonal"] option:selected').val();   
                var seleccionpersonal = opcion.options[opcion.selectedIndex].text; 
                
                dataTable.setCell(item.row, 0, idpersonal)
                dataTable.setCell(item.row, 1, seleccionpersonal);  
            
                view.setColumns([1,2,3]);       
                chart.draw(view, options);  
                $("#listapersonal").val([]);         
            }
        } 

        opcion.addEventListener("change", function(){            
                selectHandler();     
                $('#exampleModal').modal('hide');
                hr1.innerHTML = dataTable.getValue(0,2);
                hr2.innerHTML = dataTable.getValue(0,3);
        });    
        
        //agregar turno
        agregarTurno.addEventListener("click", function(){
                var idx = "Sin asignar"; 
                var nom = "Sin asignar"; 
                var x = $('select[name="seleccionturno"] option:selected').text();               
                
                var HorIni = x.substr(0,2);
                var MinIni = x.substr(3,2);

                var HorFin = x.substr(8,2);
                var MinFin = x.substr(11,2);

                var Dia = 0;
                if(HorIni>HorFin){
                    Dia = 1;
                }

                dataTable.addRows([
                [idx, nom, new Date(0, 0, 0, HorIni, MinIni), new Date(0, 0, Dia, HorFin, MinFin) ]]);
                view.setColumns([1,2,3]); 
                chart.draw(view, options);       
        });
             
        //quitar turno
        var removerTurno = document.getElementById("btnRemoverTurno");
        removerTurno.addEventListener("click", function(){
            
            var seleccion = chart.getSelection();
            for (var i = 0; i < seleccion.length; i++) {       
                var seleccionfila = seleccion[i];      
            }
              
            if(seleccionfila){             
                dataTable.removeRow(seleccionfila.row);
                view.setColumns([1,2,3]); 
                chart.draw(view, options);
                
                if((dataTable.getNumberOfRows()) == 0){
                    location.reload();
                }
                $('#exampleModal').modal('hide');        
            }          
        });

    } //final dibujar graf
}//final window onload
</script>