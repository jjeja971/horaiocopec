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
        return view('atendedores/agregaratendedor');
    }

    public function matendedor($rut){
        $dato = DB::select('exec select_atendedor_rut ?;', [$rut]);
        $dato2 = DB::select('exec select_jornada');
        return view('atendedores/modificar_atendedor', compact('dato','dato2'));
    }


    public function listaratendedores(){
        $lista = DB::select('exec listar_atendedor');
        return view('atendedores/list_atendedores',compact('lista'));
    }

    public function creaatendedor(Request $recuperar){

        $rut = preg_replace('/[^k0-9]/i', '', $recuperar->rut);
        $nombre = $recuperar->nombre;
        $numero = $recuperar->numero;
        $email=$recuperar->email;
        $eds = 20012;
        $estado = 'Activo';
        $direccion = $recuperar->direccion;
        $jornada = $recuperar->jornada;

        if($this->valida_rut($rut) == true){
            $dato = DB::update('exec NuevoAtendedor ?,?,?,?,?,?,?,?;', [$rut,$nombre,$numero,$email,$direccion,$jornada,$estado,$eds]);
            
            return back();
        }else{
            return back()->with('error','Por favor ingrese un rut valido');  
        }

                        
    }

    public function modicaratendedor(Request $rec){

        $rut = preg_replace('/[^k0-9]/i', '', $rec->rut);
        $nombre = $rec->nombre;
        $numero = $rec->numero;
        $email=$rec->email;
        $estado = 'Activo';
        $direccion = $rec->direccion;
        $jornada = $rec->jornada;

            //DB::select ('exec modificar_atendedor ?,?,?,?,?,?,?;', [$rut,$nombre,$numero,$email,$direccion,$jornada,$estado]);
            return back();              
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

    


    public function probando(){
            $dato = DB::select('select nombre_atendedor
                                from atendedor
                                where rut_atendedor = 2');
            return view ('proban2', compact('dato'));
    }

    

}
