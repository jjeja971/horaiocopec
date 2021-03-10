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
    
            var svg = jQuery('#draw-charts');
            svg.attr("xmlns", "http://www.w3.org/2000/svg");
            svg.css('overflow','visible');
       
            $("#draw-charts").append("<div id='draw-charts'></div>")

            google.charts.load('current',{
                callback: function(){
                    var data = new google.visualization.DataTable();
                    data.addColumn({ type: 'string', id: 'President' });
                    data.addColumn({ type: 'date', id: 'Start' });
                    data.addColumn({ type: 'date', id: 'End' });
                    data.addRows([
                
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

                    let chart_div = document.getElementById("draw-charts");
                    let chart = new google.visualization.Timeline(chart_div);

                   /*  google.visualization.events.addListener(chart, 'ready', function(){
                        chart_div.innerHTML = '<img src="'+chart.getImageURI() +'">';
                    }); */

                    chart.draw(data, options);
                    },
                packages: ['timeline']
            })
        

            setTimeout(function(){
                let chartsData = $("#draw-charts").html();
                $("#chartInputData").val(chartsData);
            }, 1000);


            var click="return xepOnline.Formatter.Format('JSFiddle', {render:'download', srctype:'svg'})";
            jQuery('#buttons').append('<button onclick="'+ click +'">PDF</button>');
            <!-- Convert the SVG to PNG@120dpi and open it -->
            click="return xepOnline.Formatter.Format('JSFiddle', {render:'newwin', mimeType:'image/png', resolution:'120', srctype:'svg'})";
            jQuery('#buttons').append('<button onclick="'+ click +'">PNG @120dpi</button>');
            <!-- Convert the SVG to JPG@300dpi and open it -->
            click="return xepOnline.Formatter.Format('JSFiddle', {render:'newwin', mimeType:'image/jpg', resolution:'300', srctype:'svg'})";
            jQuery('#buttons').append('<button onclick="'+ click +'">JPG @300dpi</button>');


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



