<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://www.gstatic.com/charts/loader.js"></script>

    
    
</head>
<body style="text-align:center; align-items: center;">
    <div><h1>Ingreso automático de horario</h1>
    <div id="timeline" style="height: 1500px; width:50%; position: relative;"></div>
</body>

<script>
    
    window.print = function {
            window.print();
        }
</script>
<script>   
        google.load('visualization', '1.1', {
            packages: 'timeline',
            callback: 'drawChart'
        }); 
 
    
        function drawChart() {
                    
            var chart = new google.visualization.Timeline(document.getElementById('timeline'));
            var dataTable = new google.visualization.DataTable();
            var view = new google.visualization.DataView(dataTable);

            dataTable.addColumn({ type: 'string', id: 'President' });
            dataTable.addColumn({ type: 'date', id: 'Start' });
            dataTable.addColumn({ type: 'date', id: 'End' });
            dataTable.addRows([
        
                @foreach($turnosRecomendados as $item)
                [ 'Sin asignar {{$item->id}}',       new Date(0,0,0,{{$item->hora}}), new Date(0,0,0,{{$item->hora}}+{{$item->cantidadHoras_recomendadas}})],
                @endforeach
                ]);

                var options = {
                    height: "100%",
                    width: "100%",
                    timeline: {
                        legend: 'none'
                    },
                    tooltip: {
                        trigger: 'selection'
                    }                
                };
        
            chart.draw(dataTable, options); 
        } 
    </script> 
</html>



