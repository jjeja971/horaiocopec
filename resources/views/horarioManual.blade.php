<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="mb-4 col-lg-12" style="text-align: center"><h1>Ingreso manual de horario</h1></div>
        
        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <div id="timeline" style="height: 180px;"></div>
        </div>
        <div class="col-lg-4"></div>

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
    document.getElementById("nombrePag").textContent="Horario Manual";
    }
</script>
<script type="text/javascript">
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
        [ 'persona1', new Date(2020, 3, 1), new Date(2020, 3, 2) ],
        [ 'persona2',      new Date(2020, 3, 2),  new Date(2020, 3, 4) ],
        [ 'persona3',  new Date(2020, 3, 3),  new Date(2020, 3, 5) ]]);

      chart.draw(dataTable);
    }
  </script>