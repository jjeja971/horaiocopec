<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    

</head>
<body style="text-align:center; align-items: center;">
    <div><h1>Horario del dia {{session('fecha_horario_m')}}</h1>
    <div id="draw-charts" {{-- style="height: 1500px; width:50%; position: relative;" --}}></div>
    <form action="/print_chart" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="chartData" id="chartInputData">
        <input type="submit" value="Print Chart">
    </form>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">   

$(function(){
        let weekOne = [
            ['Week', 1],
            ['Sunday', 800],
            ['Monday', 500],
            ['Tuesday', 690],
            ['Wednesday', 467],
            ['Friday', 890]
        ];
       
        let weeksData = [weekOne]

     
            $("#draw-charts").append("<div id='draw-charts'></div>")

            google.charts.load('current',{
                callback: function(){
                    var data = new google.visualization.DataTable();
                    data.addColumn('string','Days');
                    data.addColumn('number','Income');
                    data.addRows(weeksData[0]);

                    var options = {
                        title:"asdkasd",
                        width:300,
                        height:200
                    };

                    let chart_div = document.getElementById("draw-charts");
                    let chart = new google.visualization.PieChart(chart_div);

                    google.visualization.events.addListener(chart, 'ready', function(){
                        chart_div.innerHTML = '<img src="'+chart.getImageURI() +'">';
                    });

                    chart.draw(data, options);
                    },
                packages: ['corechart']
            })
        

            setTimeout(function(){
                let chartsData = $("#draw-charts").html();
                $("#chartInputData").val(chartsData);
            }, 1000);

    });
            /* google.load('visualization', '1.1', {
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
            }  */
        </script> 

    </body>
</html>



