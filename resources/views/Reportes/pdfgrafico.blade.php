
<link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3" style="text-align: center"></div>
        <div class="col-lg-6" style="text-align: center"><h1>Ingreso automático de horario</h1></div>
        <div class="col-lg-3" style="text-align: center"></div>

        <div class="col-lg-1">
        </div>
        <div class="mb-5 mt-5 col-lg-10"  style="text-align: center">
            <div id="timeline" style="height: 180px;"></div>
        </div>
        <div class="col-lg-1"></div>
  
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    
window.onload = function() {
    
   
    

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
            [ 'Sin asignar {{$item->id}}',       new Date({{$item->hora}}), new Date({{$item->hora}}+{{$item->cantidadHoras_recomendadas}})],
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
    
            
    
    }

    

}
</script>
