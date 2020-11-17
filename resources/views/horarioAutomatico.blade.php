<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="text-align: center"><h1>Ingreso automático de horario</h1></div>

        <div class="col-lg-3">

            <form name="formulario" style="text-align: center;" class="mt-5">
                <!-- Lista de selección múltiple -->
                <select id="listaper" name="combo" multiple>
                  <!-- Formato alternativo con atributo label -->
                  <optgroup label="Seleccione nombre a asignar turno">
                    <option value="1">Nedd Stark</option>
                    <option value="2">Jon Snow</option>
                    <option value="3">Sansa Stark</option>
                  </optgroup>
                </select>
              </form>

        </div>
        <div class="mb-5 mt-5 col-lg-6"  style="text-align: center">
            <div id="timeline" style="height: 180px;"></div>
        </div>
        <div class="col-lg-3"></div>

        <div class="col-lg-4"></div>
        <div class="col-lg-4 mt-5"  style="text-align: center">
            <button class="btn btn-success btn-lg btn-block" type="submit" data-toggle="modal" data-target="#exampleModal" id="boton_arriendo">Probando</button>

        </div>
        <div class="col-lg-4"></div>

        <!-- Modal -->
                                        
        <div class="modal fade" id="exampleModal" tabindex="-1" style="background: rgba(9, 20, 36, 0.5)" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            
            <div class="modal-dialog modal-xl">
                
              <div class="modal-content">
                
                <div class="modal-header" style="z-index:90;background: #30acb8">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke">Lista de personal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="background: rgba(203, 227, 255, 0.295); width:48%; height:100%; position:absolute;"></div>
                <div class="modal-body">
                    <div class="container-fluid" style="text-align: center">
                        <h3> Seleccione el personal a asignar al turno elegido</h3>                              
                        <div class="col-md-12 order-md-1">
                            
                            <div class="row" >
                                <div class="col-md-4"></div>
                                <div class="col-md-4" style="text-align: center">
                                    <form name="formulario" style="text-align: center;" class="mt-5">
                                        <!-- Lista de selección múltiple -->
                                        <select id="listaper" name="combo" multiple>
                                          <!-- Formato alternativo con atributo label -->
                                         
                                            <option value="1">Nedd Stark</option>
                                            <option value="2">Jon Snow</option>
                                            <option value="3">Sansa Stark</option>
                                   
                                        </select>
                                      </form>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>



        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <a href="{{ URL::previous() }}" class="mt-4 btn btn-primary btn-lg btn-block">Volver</a>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>


@endsection

<script>
    
    window.onload = function() {
    document.getElementById("nombrePag").textContent="Horario Automático";

    google.charts.load('current', {'packages':['timeline']});
        google.charts.setOnLoadCallback(drawChart);
        

        function drawChart() {
            
            var chart = new google.visualization.Timeline(document.getElementById('timeline'));
            var dataTable = new google.visualization.DataTable();

            dataTable.addColumn({ type: 'string', id: 'President' });
            dataTable.addColumn({ type: 'date', id: 'Start' });
            dataTable.addColumn({ type: 'date', id: 'End' });
            dataTable.addRows([
                [ 'Sin asignar',       new Date(2020, 3, 1, 5), new Date(2020, 3, 1, 9) ],
                [ 'Sin asignar 2',      new Date(2020, 3, 1, 7),  new Date(2020, 3, 1, 12, 30) ],
                [ 'Sin asignar 3',  new Date(2020, 3, 1, 12),  new Date(2020, 3, 1, 18) ]]);

                var options = {
                    height: 450,
                    timeline: {
                        legend: 'none'
                    },
                    tooltip: {
                        trigger: 'selection'
                    }
                  
                };

            
            chart.draw(dataTable, options); 
                google.visualization.events.addListener(chart, 'select', selectHandler);

            function selectHandler() {
                var selection = chart.getSelection();
                var message = '';

                for (var i = 0; i < selection.length; i++) {
                    var item = selection[i];
                    if (item.row != null && item.column != null) {
                        message += 'fila: ' + item.row + ' , columna: ' + item.column;
                    } else if (item.row != null) {
                        message += 'fila: ' + item.row;
                    } else if (item.column != null) {
                        message += 'columna: ' + item.column;
                    }
                }
                if (message == '') {
                    message = 'nada';
                }
                var opcion = document.getElementById("listaper");
                var seleccionper = opcion.options[opcion.selectedIndex].text;

                dataTable.setCell(item.row, 0, seleccionper);
            
                chart.draw(dataTable, options); 
                  
            }
            
        }

        






    }
</script>