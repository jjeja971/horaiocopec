@extends('layout')
@section('content')
<div class="card-header">
  <h3 class="card-title">Año 2021</h3>
</div>

<div id="accordion">
  <div class="card">
    @foreach ($mes as $item)
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$item->mes}}" aria-expanded="true" aria-controls="collapse{{$item->mes}}">
          {{$item->mes}}
        </button>
      </h5>
    </div>

    <div id="collapse{{$item->mes}}" class="collapse" aria-labelledby="heading{{$item->mes}}" data-parent="#accordion">
      
          
      
      <table class="table" >
        <thead>
          <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Cantidad de atendedores</th>
            <th scope="col">Horas Totales</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($turno as $item2)
          @if ($item->Nmes == $item2->mes)
          <tr>
            <th>{{$item2->fecha}}</th>
            <td>{{$item2->Cantidad_atendedor}}</td>
            <td>{{$item2->hora_total}}</td>
            <td><a href="#" class="btn btn-primary btn-sm">
              <i class="fas fa-edit"></i>Editar
            </a></td>
          </tr>
          @endif 
          @endforeach
        </tbody>
      </table>
      
    </div>
    @endforeach
  </div>

</div>

@endsection
