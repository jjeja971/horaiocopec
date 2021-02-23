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
        if($row["idturno"] && $row['horaentrada'] && $row['horasalida']){
            DB::insert("insert into transacciones values (?,?,?)",[$row["idturno"], $row['horaentrada'], $row['horasalida']]);
        }
        
    }

}
