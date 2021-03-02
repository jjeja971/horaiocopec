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
            $lugar = $request->seleccionlugar;
            session()->flash('fecha_horario_m', $fecha);
            if($rut){
                $respuesta = DB::update('exec Agregar_horario ?, ?, ?, ?, ?;', [$rut,$fecha,$turno,$lugar,session('EDS')]);
                session()->flash('alerta', 'El turno ha sido registrado exitosamente');
            } 
            return redirect ('/horarioManual');
            //dd(session('fecha_horario_m'));    
        }else
            return redirect ('/');
    }

    public function formturnohorario(Request $request){
        if(session('usuario')){  

            $rut=$request->personalmodal;
            $fecha = $request->date; 

            session()->flash('fecha_horario_m', $fecha);

            switch ($request->input('estado')) {
                case 'modificar':
                        
                        $rutnuevo=$request->modificarpersonal;
                        $lugarnuevo = $request->modlugar;
                        $respuesta = DB::update('exec modificar_horario ?, ?, ?, ?;', [$rut,$rutnuevo,$fecha,$lugarnuevo]); 
                        session()->flash('alerta', 'El turno ha sido modificado exitosamente');
                        //dd($respuesta);
                        if($respuesta==1)
                            return redirect ('/horarioManual');
                        else
                            return redirect ('/horarioManual');  
                        break;

                case 'eliminar':
                        $respuesta = DB::update('exec eliminar_turno_horario ?, ?;', [$rut,$fecha]);
                        session()->flash('alerta', 'El turno ha sido eliminado exitosamente');
                        if($respuesta==1)
                            return redirect ('/horarioManual');
                        else
                            return redirect ('/horarioManual');    
                        break;
            }
        }else
            return redirect ('/');
    }

}
