<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use PDF;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Collection;


class ReportePDFController extends Controller
{
    public function imprimirgrafi($fecha, Request $request)
    {
        $titulohtml = "Grafico horario $fecha";
        $nombrepdf = "horario fecha $fecha.pdf";
        //dd($request->chartData);
        $data = $request->chartData;
        $pdf = PDF::loadView('Reportes.impresion', compact('data','titulohtml'));
        ob_end_clean();
        return $pdf->stream($nombrepdf);
        
    }

    public function imprimirhorariosemana($fecha, Request $request)
    {
        $titulohtml = "Reporte de Horarios Semana";
        $nombrepdf = "Semana de $fecha.pdf";
        //dd($request->chartData);
        $data = $request->chartData;
        $pdf = PDF::loadView('Reportes.impresion', compact('data','titulohtml'));
        ob_end_clean();
        return $pdf->stream($nombrepdf);
        
    }

}
