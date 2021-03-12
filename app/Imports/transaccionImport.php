<?php

namespace App\Imports;

use App\transaccion;
use Maatwebsite\Excel\Concerns\{WithHeadingRow,ToModel,WithValidation};
use Illuminate\Support\Facades\DB;

class transaccionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row[0]);
        if($row['fecha_td'] && $row["hora_td"] && $row['txh']){
            $fechaf=str_replace('"',"",$row['fecha_td']);
            $horaf=str_replace('"',"",$row['hora_td']);
            $txhf=str_replace('"',"",$row['txh']);
            session()->flash('alerta', 'El archivo excel ha sido registrado exitosamente');
            DB::insert("exec agregar_transacciones ?,?,?,20012;",["$fechaf", "$horaf", $txhf]);
        }
        
    }

}
