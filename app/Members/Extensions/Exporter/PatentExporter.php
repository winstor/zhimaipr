<?php


namespace App\Members\Extensions\Exporter;


use Encore\Admin\Grid\Exporters\ExcelExporter;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatentExporter extends ExcelExporter implements WithMapping
{
    protected $fileName = '专利列表.xlsx';

    protected $columns = [
        'patent_type_id'=>'专利类型',
        'patent_sn'   => '专利号',
        'patent_name' => '专利名称',
        'patent_person' => '第一申请人',
        'apply_date' => '申请日',
        'patent_case_id' => '案件状态',
        'monitor_state' =>'监控状态',
    ];
    public function map($row): array
    {
        return [
            $row->type->name??'',
            $row->patent_sn?:'',
            $row->patent_name?:'',
            $row->patent_person?:'',
            $row->apply_date??'',
            $row->case->name??'',
            data_get(['未监控','已监控'],$row->monitor_state,''),
        ];
    }

}
