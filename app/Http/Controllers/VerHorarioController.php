<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerHorarioController extends Controller
{
    public function verhorario(){
        if(session('usuario')){
            $mes = DB::select('exec SelectMes');
            $turno = DB::select('exec SelectHorarioDia');
            return view ('horario/listaHorario', compact('mes','turno'));
        }else
            return redirect ('/');
    }
}
