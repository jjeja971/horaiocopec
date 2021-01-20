<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    function usuario(Request $request){
        $data = $request->input();
        $consultaexiste = DB::select('exec verificarUsuario ?, ?', [$data['usuario'], $data['contrasena']]);
        echo ((object) $consultaexiste[0]);

        /*if($consultaexiste=1)
            echo ("existe");
        else
            echo ($consultaexiste);*/
        
        /*$request->session()->put('usuario',$data['usuario']);
        $request->session()->put('EDS','asdasd');
        return redirect('/Inicio');*/

    }
}
