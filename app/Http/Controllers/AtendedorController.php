<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Collection;

class AtendedorController extends Controller
{

    public function natendedor(){
        return view('nuevoatendedor');
    }

    public function listaratendedores(){

        $lista = DB::select('select * from atendedor');
        
        return view('atendedores/list_atendedores',compact('lista'));
    }

    public function creaatendedor(Request $recuperar){

        $rut = preg_replace('/[^k0-9]/i', '', $recuperar->rut);

        if($this->valida_rut($rut) == true){
            $valido = 1;
        }else{
            $valido = 0;
        }

        $nombre = $recuperar->nombre;

        $numero = $recuperar->numero;

        $email=$recuperar->email;

        $eds = 20012;
        
        $estado = 'Activo';
    
        $direccion = $recuperar->direccion;
    
        $jornada = $recuperar->jornada;

            if ($valido == 0){
                return back()->with('error','Por favor ingrese un rut valido');
                
            }

            if ($valido == 1){

            //$dato = DB::select('call agregar_usuario(?,?,?,?,?,?,?)', [$rut,$nombre,md5($pass1),$tipo,$estado,$telefono,$email]);
            //$dato = DB::select('exec NuevoAtendedor ?,?,?,?,?,?,?,?;', [$rut,$nombre,$numero,$email,$direccion,$jornada,$estado,$eds]);
            
            $dato = DB::select('select * from atendedor');
            return back()->with('mensaje','Agregado con exito' );
                
            }              
    }

    public function valida_rut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v)
        {
            if($i==8)
                $i = 2;
    
            $suma += $v * $i;
            ++$i;
        }
    
        $dvr = 11 - ($suma % 11);
        
        if($dvr == 11)
            $dvr = 0;
        if($dvr == 10)
            $dvr = 'K';
    
        if($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }




    public function login(){
        return view ('login');
    }

    public function probando(){
        $dato = DB::select('select nombre_atendedor
                            from atendedor
                            where rut_atendedor = 2');
            
        return view ('proban2', compact('dato'));
    }

    public function menuHorario(){
          
        return view ('horario');
    }

    public function horarioManual(){
          
        return view ('horarioManual');
    }
    
    public function horarioAutomatico(){
          
        return view ('horarioAutomatico');
    }

}
