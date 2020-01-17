<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;//集合形式
use Maatwebsite\Excel\Concerns\FromArray;//数组形式
class TestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([[1,2,3],[4,5,6],[7,8,9]]);
    }
    //导出数据，需基础相关接口
    public function array(): array
    {
        // TODO: Implement array() method.
    }

}
