<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="text-align: center"><h1>Ingreso automático de horario</h1></div>

        <div class="col-lg-3">

            

        </div>
        <div class="mb-5 mt-5 col-lg-6"  style="text-align: center">
            <div id="timeline" style="height: 180px;"></div>
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
                                <div class="col-md-3"></div>
                                <div class="col-md-4">
                                    <form name="formulario" class="mt-5">
                                        <!-- Lista de selección múltiple -->
                                        <select id="listapersonal" style="font-size: 1.6em; width:600px; color:#1d59a7" name="combo" multiple>
                                      
                                         
                                            <option value="1">Nedd Stark</option>
                                            <option value="2">Jon Snow</option>
                                            <option value="3">Sansa Stark</option>
           
                                   
                                        </select>
                                      </form>
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
            <a href="{{ URL::previous() }}" class="mt-4 btn btn-primary btn-lg btn-block">Volver</a>
        </div>
        <div class="col-lg-4"></div>
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