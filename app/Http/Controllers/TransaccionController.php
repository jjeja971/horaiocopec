<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facade\Excel;

class TransaccionController extends Controller
{
    public function transacciones(){
        return view ('transacciones/cargartransacciones');
    }

    public function importexel(Request $re){
        $file = $re->file('file');
        Excel::import(new transaccionImport, $file);

        return back();
    }

}
