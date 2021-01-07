<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControllerHorarioDos extends Controller
{
    public function horarioManual2(){
        return view ('horario/horarioManual2');
    }

    public function listahorario(){
        $mes = DB::select('exec SelectMes');
        $turno = DB::select('exec SelectHorarioDia');
        return view ('horario/listaHorario', compact('mes','turno'));
    }  
}
