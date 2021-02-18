<?php

namespace App\Imports;

use App\transaccion;
use Maatwebsite\Excel\Concerns\ToModel;

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
            ''
        ]);
    }
}
