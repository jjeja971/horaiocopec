<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    function iniciar_sesion(Request $request){
        $data = $request->input();
        $consultaexiste = DB::select('exec verificarUsuario ?, ?', [$data['usuario'], $data['contrasena']]);
       
        $datoveri = ($consultaexiste[0]->nombre_usuario);
        if($datoveri=='0')
            return redirect('/')->with('status','No hay registro de esta cuenta, por favor revise sus datos nuevamente');
        else
        
        $request->session()->put('usuario',($consultaexiste[0]->nombre_usuario));
        $request->session()->put('EDS',($consultaexiste[0]->EDS));
        return redirect('/Inicio');

    }

    function cerrar_sesion(){
        session()->pull('usuario');
        return redirect('/');
    }
}
