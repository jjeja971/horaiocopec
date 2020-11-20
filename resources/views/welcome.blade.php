<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
      <!-- PrimeraA columna -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gráfico dia Sabado 1 de Noviembre 2020</h5>

            <p class="card-text">
              <canvas id="GraficoIni" width="400" height="50"></canvas>
            </p>

            <!-- <a href="#" class="card-link">Más detalles</a>
            <a href="#" class="card-link">Detalle recomendación de turnos</a> -->
          </div>
        </div>
      </div>

      <!-- SegundaA columna -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gráfico Sabado 8 de Noviembre 2020</h5>

            <p class="card-text">
              <canvas id="GraficoIni2" width="400" height="60"></canvas>
            </p>
          </div>
        </div>
      </div>

      <!-- TerceraA columna -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gráfico Sabado 15 de Noviembre 2020</h5>

            <p class="card-text">
              <canvas id="GraficoIni3" width="400" height="60"></canvas>
            </p>

          </div>
        </div>
      </div>

      <!-- PrimeraB columna -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gráfico Sabado 22 de Noviembre 2020</h5>

            <p class="card-text">
              <canvas id="GraficoIni4" width="400" height="60"></canvas>
            </p>

          </div>
        </div>
      </div>

      <!-- SegundaB columna -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gráfico Sabado 29 de Noviembre 2020</h5>

            <p class="card-text">
              <canvas id="GraficoIni5" width="400" height="60"></canvas>
            </p>

          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
  
  function graficoDia(nombre,hora, hora1, hora2, hora3, hora4, hora5, hora6, hora7, hora8, hora9, hora10, hora11, hora12, hora13, hora14, hora15, hora16, hora17, hora18, hora19, hora20, hora21, hora22, hora23){
    
    var ctx = document.getElementById(nombre).getContext('2d');
    var GraficoIni = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00','07:00','08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00','20:00','21:00', '22:00', '23:00'],
            datasets: [{
                label: '',
                data: [hora, hora1, hora2, hora3, hora4, hora5, hora6, hora7, hora8, hora9, hora10, hora11, hora12, hora13, hora14, hora15, hora16, hora17, hora18, hora19, hora20, hora21, hora22, hora23],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(3, 159, 64, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(3, 159, 64, 0.7)',
                    'rgba(75, 192, 192, 0.7)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(3, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(3, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    }


    graficoDia("GraficoIni",2, 6, 8, 2, 12, 9, 2, 6, 2, 9, 8, 2, 2, 6, 8, 2, 12, 9, 2, 6, 2, 9, 8, 2);
    graficoDia("GraficoIni2",6, 2, 9, 8, 2, 3, 8, 9, 8, 2, 2, 6, 8, 2, 12, 9, 2, 6, 2, 2, 2, 6, 8, 11);
    graficoDia("GraficoIni3",8, 9, 3, 7, 8, 6, 6, 8, 2, 3, 8, 9, 8, 2, 2, 6, 8, 2, 12, 9, 2, 6, 2, 6);
    graficoDia("GraficoIni4",6, 7, 4, 9, 6, 7, 1, 12, 9, 2, 6, 2, 9, 8, 2, 2, 6, 8, 28, 2, 3, 8, 9, 8);
    graficoDia("GraficoIni5",7, 2, 8, 2, 6, 1, 8, 7, 1, 12, 9, 2, 6, 2, 8, 2, 2, 6, 3, 7, 8, 6, 3, 5);
  
  
  </script>
@endsection








