<?php

namespace App\Admin\Actions\Patent;

use Encore\Admin\Actions\Action;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DeadlineAction extends Action
{
    protected $selector = '.import-post';
    public function handle(Request $request)
    {
        return $this->response()->success('Success message...')->refresh();
    }
    public function form()
    {
        $this->date('add_date', '下次缴费时间')->required();
    }
    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-post"><i class="fa fa-upload"></i>导入数据</a>
HTML;
    }
}
