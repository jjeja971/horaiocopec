<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
      <!-- PrimeraA columna -->
      <div class="col-lg-12">
        <div class="card elevation-5">
          <div class="card-body">
            <h5 class="card-title">PROMEDIO DE <b>TRANSACCIONES POR HORA</b> DE HASTA 5 SEMANAS ANTERIORES EN RELACION AL DIA ACTUAL</h5>

            <p class="card-text">
              <canvas id="GraficoIni" width="400" height="70"></canvas>
            </p>

            <!-- <a href="#" class="card-link">Más detalles</a>
            <a href="#" class="card-link">Detalle recomendación de turnos</a> -->
          </div>
        </div>
      </div>

      <!-- SegundaA columna -->
      <div class="col-lg-12 mt-5">
        <div class="card elevation-5">
          <div class="card-body">
            <h5 class="card-title"><b>CANTIDAD DE TRANSACCIONES</b> DURANTE ESTE DIA DE LA SEMANA ANTERIOR</h5>

            <p class="card-text ">
              <canvas id="GraficoIni2" width="400"  height="70"></canvas>
            </p>
          </div>
        </div>
      </div>

     <!-- <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><b>DIFERENCIA DE TRANSACCIONES</b> ENTRE EL PRIMER GRAFICO Y EL SEGUNDO </h5>

            <p class="card-text">
              <canvas id="GraficoIni3" width="400" height="70"></canvas>
            </p>
          </div>
        </div>
      </div>

    -->

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

    @foreach($promedioHrsDiaCincoSemanasAnteriores as $item)
      graficoDia("GraficoIni",{{$item->h00}}, {{$item->h01}}, {{$item->h02}}, {{$item->h03}}, {{$item->h04}}, {{$item->h05}},
                              {{$item->h06}}, {{$item->h07}}, {{$item->h08}}, {{$item->h09}}, {{$item->h10}}, {{$item->h11}},
                              {{$item->h12}}, {{$item->h13}}, {{$item->h14}}, {{$item->h15}}, {{$item->h16}}, {{$item->h17}},
                              {{$item->h18}}, {{$item->h19}}, {{$item->h20}}, {{$item->h21}}, {{$item->h22}}, {{$item->h23}});
    @endforeach

    @foreach($promedioHrsDiaSemanaAnterior as $item)
      graficoDia("GraficoIni2",{{$item->h00}}, {{$item->h01}}, {{$item->h02}}, {{$item->h03}}, {{$item->h04}}, {{$item->h05}},
                              {{$item->h06}}, {{$item->h07}}, {{$item->h08}}, {{$item->h09}}, {{$item->h10}}, {{$item->h11}},
                              {{$item->h12}}, {{$item->h13}}, {{$item->h14}}, {{$item->h15}}, {{$item->h16}}, {{$item->h17}},
                              {{$item->h18}}, {{$item->h19}}, {{$item->h20}}, {{$item->h21}}, {{$item->h22}}, {{$item->h23}});                      
    @endforeach

    

    
    
  
  
  </script>
@endsection








