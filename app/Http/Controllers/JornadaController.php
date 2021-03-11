<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JornadaController extends Controller
{
    public function verjornada(){
        if(session('usuario')){
            $lista = DB::select('exec listar_jornada');
            return view('jornada/listarjornada',compact('lista'));
        }else
            return redirect ('/');
    }

    public function agregarjornada(){
        if(session('usuario')){
            return view('jornada/agregarjornada');
        }else
            return redirect ('/');
    }

    public function registrarjornada(Request $request){  
        if(session('usuario')){  
            $idjornada=$request->idjornada;
            $horasjornada=$request->horasjornada;
            
            $respuesta = DB::update('exec agregar_jornada ?, ?;', [$idjornada,$horasjornada]);
            session()->flash('alerta', 'La Jornada ha sido registrado exitosamente');
            return redirect('/verjornada');

        }else
            return redirect ('/');
    }
}
