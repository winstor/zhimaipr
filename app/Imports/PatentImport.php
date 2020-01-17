<?php

namespace App\Imports;

use App\Patent;
use Maatwebsite\Excel\Concerns\ToModel;

class PatentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Patent([
            //
        ]);
    }
}
