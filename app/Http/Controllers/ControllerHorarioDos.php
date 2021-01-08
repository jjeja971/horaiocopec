<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControllerHorarioDos extends Controller
{
    
    public function listahorario(){
        $mes = DB::select('exec SelectMes');
        $turno = DB::select('exec SelectHorarioDia');
        return view ('horario/listaHorario', compact('mes','turno'));
    } 
    
    public function nuevohorario(){
        $atendedor = DB::select('select rut_atendedor,nombre_atendedor from atendedor');
        return view ('horario/horarioManual2', compact('atendedor'));
    }

    public function insertarhorario(Request $recuperar){

        $rut = $recuperar->rut;
        echo $rut;
          
    }
}
