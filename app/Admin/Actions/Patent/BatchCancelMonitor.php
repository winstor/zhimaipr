<?php

namespace App\Admin\Actions\Patent;

use App\Admin\Actions\BatchAction;
use App\Services\MemberServer;
use Illuminate\Database\Eloquent\Collection;

class BatchCancelMonitor extends BatchAction
{
    public $name = '放弃监控';

    public function handle(Collection $collection)
    {
        $memberServer = new MemberServer();
        $user = $memberServer->getUser();
        foreach ($collection as $model) {
            if($model->user_id == $user->id){
                $model->monitor_state = 0;
                $model->monitor_add_time = null;
                $model->monitor_end_time = null;
                $model->fee_remark = '';
                $model->save();
            }
        }

        return $this->response()->swal()->success('放弃监控成功')->refresh();
    }

    public function rename()
    {
        return '<span class="btn btn-sm btn-danger" style="margin-right:10px;"><i class="fa fa-reply"></i>放弃监控</span>';
    }

    public function dialog()
    {
        $this->confirm('确定要放弃监控?<br/><br/>');
    }

}