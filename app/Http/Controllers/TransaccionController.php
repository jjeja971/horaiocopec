<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\transaccionImport;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
