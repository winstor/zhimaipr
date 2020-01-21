<?php

namespace App\Imports;

use App\Config;
use App\Patent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PatentImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $importNumber = Config::getValue('import-number','member')?:10;
        dump($rows);exit;

        unset($rows[0]);
        $data = [];
        foreach($rows as $row){

        }
        $this->createData($rows);
    }

    public function createData($rows)
    {
        //todo
    }

}
