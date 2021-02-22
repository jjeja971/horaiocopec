<?php

namespace App\Imports;

use App\transaccion;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class transaccionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new transaccion([
            DB::select('insert into turnos values (?,?,?)', [$row[0],$row[1],$row[2]])
        ]);
    }
}
