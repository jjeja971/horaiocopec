<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutomaticoController extends Controller
{
    public function horarioAutomatico(Request $request){    
        if(session('usuario')){
            
            $fecha = $request->date;
            $personalrec = DB::select('exec listar_atendedor');
            //$turnosRecomendados=DB::select("exec ultimaFaseSinDivision '2019-11-25',9");
            $turnosRecomendados=DB::select('exec ultimaFaseSinDivision ?,9', [$fecha]);
           
            if ($turnosRecomendados){
                return view ('horario/horarioAutomatico', compact('turnosRecomendados','personalrec'));
            } else {
                session()->flash('alerta', "No existen datos para generar Turnos para el día $fecha");
                return redirect ('/menuHorario');
            }

        }else
            return redirect ('/');
    }
}
