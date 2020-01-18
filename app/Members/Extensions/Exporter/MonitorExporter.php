<?php


namespace App\Members\Extensions\Exporter;


use Encore\Admin\Grid;
use Encore\Admin\Grid\Exporters\ExcelExporter;
use Maatwebsite\Excel\Concerns\WithMapping;

class MonitorExporter extends ExcelExporter implements WithMapping
{
    protected $fileName = '年费监控清单.xlsx';

    protected $columns = [
        'patent_type_id'=>'专利类型',
        'patent_sn'   => '申请号/专利号',
        'patent_name' => '专利名称',
        'patent_person' => '第一申请人',
        'apply_date' => '申请日',
        'patent_case_id' => '案件状态',
        'patent_cert_id' => '下证状态',
        'monitor_state' =>'监控状态',
        'fee_remark' => '年费备注',
    ];
    public function __construct(Grid $grid = null)
    {
        $this->fileName = '年费监控清单-'.time().'.xlsx';
        parent::__construct($grid);
    }

    public function map($row): array
    {
        return [
            $row->type->name??'',
            "'".$row->patent_sn?:'',
            $row->patent_name?:'',
            $row->patent_person?:'',
            $row->apply_date?$row->apply_date->toDateString():'',
            $row->case->name??'',
            $row->cert->name??'',
            data_get(['未监控','已监控','待审核'],$row->monitor_state,'未知'),
            $row->fee_remark?:''
        ];
    }

}
