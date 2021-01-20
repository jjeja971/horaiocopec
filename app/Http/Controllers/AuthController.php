<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    function usuario(Request $request){
        $data = $request->input();
        $consultaexiste = DB::select('exec verificarUsuario ?, ?', [$data['usuario'], $data['contrasena']]);
       
        $datoveri = ($consultaexiste[0]->nombre_usuario);
        if($datoveri=='0')
            return view ('login/login');
        else
            echo ($consultaexiste[0]->nombre_usuario);
            echo ($consultaexiste[0]->contrasena);
            echo ($consultaexiste[0]->EDS);
        
        /*$request->session()->put('usuario',$data['usuario']);
        $request->session()->put('EDS','asdasd');
        return redirect('/Inicio');*/

    }
}
