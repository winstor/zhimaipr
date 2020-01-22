<?php


namespace App\Members\Extensions\patent;


use Encore\Admin\Widgets\Box;

class PatentCaseShow
{
    public function html()
    {
        $box = new Box('案件状态监控',view('member.patent.header-search'));
        return $box->style('danger')->solid()->collapsable();
    }
    public function __toString()
    {
        return $this->html()->render();
    }
}
