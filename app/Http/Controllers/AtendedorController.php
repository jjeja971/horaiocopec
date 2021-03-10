<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use PDF;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Collection;

class AtendedorController extends Controller
{

    public function natendedor(){
        if(session('usuario')){
            return view('atendedores/agregaratendedor');
        }else
            return redirect ('/');
    }

    public function matendedor($rut){
        if(session('usuario')){
            $dato = DB::select('exec select_atendedor_rut ?;', [$rut]);
            $dato2 = DB::select('exec select_jornada');
            return view('atendedores/modificar_atendedor', compact('dato','dato2'));
        }else
            return redirect ('/');
    }


    public function listaratendedores(){
        if(session('usuario')){
            $lista = DB::select('exec listar_atendedor');
            return view('atendedores/list_atendedores',compact('lista'));
        }else
            return redirect ('/');
    }

    public function creaatendedor(Request $recuperar){
        if(session('usuario')){
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
                session()->flash('alerta', 'Agregado con éxito');
                return redirect('/listaratendedores');  
            }else{
                return back()->with('error','Por favor ingrese un rut valido');  
            }

        }else
            return redirect ('/');             
    }

    public function modicaratendedor(Request $request){
        if(session('usuario')){
            //dd($request);
            $rut = preg_replace('/[^k0-9]/i', '', $request->rut);
            $nombre = $request->nombre;
            $numero = $request->numero;
            $email=$request->email;
            $direccion = $request->direccion;
            $jornada = $request->jornada;
            $estado = 'Activo';

            DB::update('exec [modificar_atendedor] ?,?,?,?,?,?,?;', [$rut,$nombre,$numero,$email,$direccion,$jornada,$estado]);
            session()->flash('alerta', 'Modificado con éxito');
            return redirect('/listaratendedores');  
        }else
            return redirect ('/');            
    }

    private function valida_rut($rut){

        if(session('usuario')){
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
        }else
            return redirect ('/');
    }

    


    public function probando(){
        if(session('usuario')){
            $dato = DB::select('select nombre_atendedor
                                from atendedor
                                where rut_atendedor = 2');
            return view ('proban2', compact('dato'));
        }else
            return redirect ('/');
    }

    public function exportate(){
        $lista = DB::select('exec listar_atendedor');
        //$pdf = \PDF::loadView('Reportes/reporteatendedores',compact('lista'));
        //$view =  \View::make('Reportes.reporteatendedores', compact('lista'))->render();
        
        $pdf = \PDF::loadView("Reportes.reporteatendedores", compact('lista'));
        
        ob_end_clean();
        return $pdf->stream('login.pdf');
    }

    public function exportgraf($fecha, Request $request){
        session()->flash('fecha_horario_m', $fecha);
        $personalrec = DB::select('exec listar_atendedor');
        $turnosRecomendados=DB::select("exec ultimaFaseSinDivision '2019-11-24',9");
        $data = $request->chartData;
        $pdf = PDF::loadView('Reportes.impresion', compact('data','personalrec','turnosRecomendados'));
        ob_end_clean();
        return $pdf->download("charts.pdf");

       // return view("Reportes/pdfgrafico",compact('personalrec', 'turnosRecomendados'));

/*         $view =  \View::make('Reportes.pdfgrafico', compact('personalrec', 'turnosRecomendados'))->render();  
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view); */
        
    }

    public function imprimirgraf(Request $request)
    {
        //dd($request->chartData);
        $data = $request->chartData;
        $pdf = PDF::loadView('Reportes.impresion', compact('data'));
        ob_end_clean();
        return $pdf->download("charts.pdf");
        
    }
    
}
