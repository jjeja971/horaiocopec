@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="text-align: center"><h1>Menú Horarios</h1></div>

        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="text-align: center">
            <a href="#" class="mt-5 btn btn-primary btn-lg btn-block">Ingresar horario manual</a>
        </div>
        <div class="col-lg-4"></div>

        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <a href="#" class="mt-4 btn btn-primary btn-lg btn-block">Ingresar horario automático</a>
        </div>
        <div class="col-lg-4"></div>

        <div class="col-lg-4"></div>
        <div class="col-lg-4"  style="text-align: center">
            <a href="." class="mt-4 btn btn-primary btn-lg btn-block">Volver</a>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>


@endsection