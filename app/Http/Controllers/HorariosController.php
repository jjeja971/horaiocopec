<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HorariosController extends Controller
{

    
    public function registrarHorario(){
        return back()->with('message','You added new items, follow next step!');
    }

    public function menuHorario(){
        if(session('usuario'))
            return view ('horario/horario');
        else
            return redirect ('/');
    }      
    
    public function horarioManual(){
        if(session('usuario')){
            $personalrec = DB::select('exec listar_atendedor');
            $turno = DB::select('exec listar_turnos');
            $fechaHorario = session('usuario');
            return view ('horario/horarioManual', compact('turno','personalrec'));
        }else
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

    public function registrar_horario(Request $request){  
        if(session('usuario')){  
            $rut=$request->seleccionpersonal1;
            $turno=$request->seleccionturno;
            $fecha = $request->date;
            session()->flash('fecha_horario_m', $fecha);
            //$respuesta = DB::update('exec Agregar_horario ?, ?, ?, ?, ?;', [$rut,$fecha,$turno,'gasolina',session('EDS')]); 
            return redirect ('/horarioManual');
            //dd(session('fecha_horario_m'));    
        }else
            return redirect ('/');
    }

}
