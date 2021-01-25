<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HorariosController extends Controller
{

    public function menuHorario(){
        if(session('usuario'))
            return view ('horario/horario');
        else
            return redirect ('/');
    }      
    

    public function horarioAutomatico(){    
        if(session('usuario')){
            $turnosRecomendados=DB::select('exec ultimaFaseSinDivision "2019-11-25",9');
            return view ('horario/horarioAutomatico', compact('turnosRecomendados'));
        }else
            return redirect ('/');
    }

    public function ITurnos(){   
        if(session('usuario')){ 
            $turno = DB::select('exec listar_turnos');
            return view ('horario/turnos', compact('turno'));
        }else
            return redirect ('/');
    }
    
    public function modTurno($id){   
        if(session('usuario')){  
            $turnos = DB::select('exec turno_porid ?;', [$id]);
            return view ('horario/modTurno', compact('turnos'));
        }else
            return redirect ('/');
    }

    public function horarioManual(){
        if(session('usuario')){
            $personalrec = DB::select('exec listar_atendedor');
            $turno = DB::select('exec listar_turnos');
            $verificarFecha = DB::select('exec listar_turnos_por_fecha ?', [session('fecha_horario_m')]);
           
            //dd($verificarFecha);
            return view ('horario/horarioManual', compact('turno','personalrec','verificarFecha'));
            
        }else
            return redirect ('/');
    }

    public function registrar_horario(Request $request){  
        if(session('usuario')){  
            $rut=$request->seleccionpersonal1;
            $turno=$request->seleccionturno;
            $fecha = $request->date;
            session()->flash('fecha_horario_m', $fecha);
            if($rut);
                $respuesta = DB::update('exec Agregar_horario ?, ?, ?, ?, ?;', [$rut,$fecha,$turno,'gasolina',session('EDS')]); 
            return redirect ('/horarioManual');
            //dd(session('fecha_horario_m'));    
        }else
            return redirect ('/');
    }

}
