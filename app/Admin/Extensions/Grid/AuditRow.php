<?php


namespace App\Admin\Extensions\Grid;
use Encore\Admin\Actions\RowAction;

class AuditRow extends RowAction
{
    public $name ='审核';
    public function href()
    {
        return route('patent-monitors.index',$this->getKey());
    }
}
