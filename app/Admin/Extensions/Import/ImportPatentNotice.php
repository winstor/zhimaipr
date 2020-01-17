<?php


namespace App\Admin\Extensions\Import;


use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
class ImportPatentNotice extends Action
{
    protected $selector = '.import-post';
    public function handle(Request $request)
    {
        // $request ...

        return $this->response()->success('Success message...')->refresh();
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-post">导入数据</a>
HTML;
    }
}