<?php
namespace App\Admin\Extensions\Export;

use Encore\Admin\Grid\Exporters\ExcelExporter;
use Maatwebsite\Excel\Concerns\WithMapping;//预处理

class ArticleExporter extends ExcelExporter implements WithMapping
{
    protected $fileName ='article.xlsx';
    protected $columns = [
        'id'                    => 'ID',
        'title'                  => '标题',
    ];
    //预处理
    public function map($row): array
    {
        return [
            $row->id,
            $row->title
            //$user->status ? 'yes' : 'no';           // 字段数据替换
            //data_get($user, 'profile.homepage'),    // 读取关联关系数据
        ];
    }


}