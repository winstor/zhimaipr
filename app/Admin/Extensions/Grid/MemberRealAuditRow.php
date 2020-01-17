<?php


namespace App\Admin\Extensions\Grid;


use Encore\Admin\Actions\RowAction;

class MemberRealAuditRow extends RowAction
{
    public $name ='认证审核';
    public function href()
    {
        return route('member-reals.edit',$this->getKey());
    }
}