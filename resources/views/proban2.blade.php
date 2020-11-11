@extends('layout')
@section('content')

<div class="container-fluid">
  @foreach ($dato as $item) @endforeach
  <p><b>Nombre: </b>{{$item->nombre_atendedor}}</p>
</div>


@endsection

