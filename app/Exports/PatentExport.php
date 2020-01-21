<?php

namespace App\Exports;

use App\Patent;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Patent::all();
    }
}
