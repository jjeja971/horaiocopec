<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@extends('layout')
@section('content')
<a href="agregarjornada" type="buttom" class="btn btn-success btn-lg">Nueva Jornada</a>
<hr>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Lista de atendedores</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Tipo</th>
        <th>N° de horas</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($lista as $item)
          <tr>
            <td>{{$item->tipo}}</td>
            <td>{{$item->horas}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
      <!-- /.card-body -->
</div>
  
@endsection

  <script>
      window.onload = function() { 

          if("{{session('alerta')}}"){
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: `{{session('alerta')}}`,
              html: '',
              showConfirmButton: false,
              timer: 1000,
          })
      }

      }
  </script>
  
 
 



  
