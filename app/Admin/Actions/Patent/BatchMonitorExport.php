<?php

namespace App\Admin\Actions\Patent;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;

class BatchMonitorExport extends Action
{
    protected $selector = '.batch-monitor-export';

    public function handle(Request $request)
    {
        // $request ...

        return $this->response()->success('Success message...')->refresh();
    }

    public function html()
    {
        return view('member.col-md-test');
        return view('member.monitor-select');
    }
}