<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
      <!-- Primera columna -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gráfico semana 1 de Noviembre 2020</h5>

            <p class="card-text">
              <canvas id="GraficoIni" width="400" height="150"></canvas>
            </p>

            <a href="#" class="card-link">Más detalles</a>
            <a href="#" class="card-link">Detalle recomendación de turnos</a>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gráfico semana 2 de Noviembre 2020</h5>

            <p class="card-text">
              <canvas id="GraficoIni2" width="400" height="150"></canvas>
            </p>

            <a href="#" class="card-link">Más detalles</a>
            <a href="#" class="card-link">Detalle recomendación de turnos</a>
          </div>
        </div>
      </div>

      <!-- Primera columna -->
      <div class="col-lg-6">
        
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Titulo</h5>
            
            <p class="card-text">
             
            </p>
            <a href="probando" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div><!-- /.card -->
      </div>
    </div>
  </div>


  <script>
    var ctx = document.getElementById('GraficoIni').getContext('2d');
    var GraficoIni = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
            datasets: [{
                label: '',
                data: [12, 19, 3, 5, 2, 3, 9],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(3, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(3, 159, 64, 1)'
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
    </script>

<script>
  var ctx = document.getElementById('GraficoIni2').getContext('2d');
  var GraficoIni = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
          datasets: [{
              label: '',
              data: [2, 6, 8, 2, 12, 9, 2],
              backgroundColor: [
                  'rgba(54, 162, 235, 0.7)',
                  'rgba(255, 99, 132, 0.7)',
                  'rgba(255, 206, 86, 0.7)',
                  'rgba(75, 192, 192, 0.7)',
                  'rgba(153, 102, 255, 0.7)',
                  'rgba(255, 159, 64, 0.7)',
                  'rgba(3, 159, 64, 0.7)'
              ],
              borderColor: [
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(3, 159, 64, 1)'
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
  </script>
@endsection








