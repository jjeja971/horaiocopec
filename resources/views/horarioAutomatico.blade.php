<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="text-align: center"><h1>Ingreso automático de horario</h1></div>

        <div class="col-lg-3"></div>
        <div class="mb-5 mt-5 col-lg-6"  style="text-align: center">
            <div id="timeline" style="height: 180px;"></div>
        </div>
        <div class="col-lg-3"></div>


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
            var container = document.getElementById('timeline');
            var chart = new google.visualization.Timeline(container);
            var dataTable = new google.visualization.DataTable();

            dataTable.addColumn({ type: 'string', id: 'President' });
            dataTable.addColumn({ type: 'date', id: 'Start' });
            dataTable.addColumn({ type: 'date', id: 'End' });
            dataTable.addRows([
                [ 'Leche',       new Date(2020, 3, 1, 5), new Date(2020, 3, 1, 9) ],
                [ 'Lockus',      new Date(2020, 3, 1, 7),  new Date(2020, 3, 1, 12, 30) ],
                [ 'Nedd Stark',  new Date(2020, 3, 1, 12),  new Date(2020, 3, 1, 18) ]]);

                var options = {
                    height: 450,
                    timeline: {
                        groupByRowLabel: true
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
                    message = 'nothing';
                }
                alert('Seleccionaste ' + message);
                            }
                        }






    }
</script>