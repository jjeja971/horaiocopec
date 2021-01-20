<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControllerHorarioDos extends Controller
{
    
    public function listahorario(){
        if(session('usuario')){
            $mes = DB::select('exec SelectMes');
            $turno = DB::select('exec SelectHorarioDia');
            return view ('horario/listaHorario', compact('mes','turno'));
        }else
            return redirect ('/');
    } 
    
    public function nuevohorario(){
        if(session('usuario')){
            $atendedor = DB::select('select rut_atendedor,nombre_atendedor from atendedor');
            return view ('horario/horarioManual2', compact('atendedor'));
        }else
        return redirect ('/');
    }

    public function insertarhorario(Request $recuperar){
        if(session('usuario')){
            $rut = $recuperar->rut;
            echo $rut;
        }else
        return redirect ('/');
    }
}
