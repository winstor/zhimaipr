<?php


namespace App\Admin\Extensions\Grid;
use Encore\Admin\Actions\RowAction;

class AuditRow extends RowAction
{
    public $name ='审核';
    public function href()
    {
        dump($this->getKey());
        return route('',$this->getKey());
    }
}