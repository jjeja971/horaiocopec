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
            $turno = DB::select('exec listar_turnos');
            $verificarFecha = DB::select('exec listar_turnos_por_fecha ?', [$fecha]);
            
            if($verificarFecha){
                session()->flash('alerta', "No hay datos cargados para generar el horario");
                return redirect ('/menuHorario');
            }else{
                DB::update('exec ultimaFaseSinDivision ?,?', [$fecha, 9]);
                session()->flash('fecha_horario_m', $fecha);
                return redirect()->action([HorariosController::class, 'horarioManual']);
            }
           
            /* session()->flash('alerta', "No existen datos para generar Turnos para el día $fecha");
            return redirect ('/menuHorario'); */
            
        }else
            return redirect ('/');
    }
    
   
}
