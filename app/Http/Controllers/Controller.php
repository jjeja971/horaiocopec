<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login(){
        return view ('login/login');
    }

    public function Inicio(){
        if(session('usuario')){
            $tiempoactual = date("Y-m-d");
            //dd($tiempoactual);
            //$promedioHrsDiaCincoSemanasAnteriores = DB::select('exec CrearPromedioDeDiasAnteriores ?;',[$tiempoactual]);
            $promedioHrsDiaCincoSemanasAnteriores = DB::select('exec CrearPromedioDeDiasAnteriores "2019-11-25"');
            $promedioHrsDiaSemanaAnterior = DB::select('exec listar_transasccionesxhora_semana_anterior "2019-11-25"');
        
            return view('welcome', compact('promedioHrsDiaCincoSemanasAnteriores',
                                        'promedioHrsDiaSemanaAnterior'));
        }else
        return redirect ('/');
    }

    

    
}
