<?php

namespace App\Admin\Actions\Patent;

use App\Member;
use App\Services\MemberServer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Admin\Actions\BatchAction;
class BatchMonitor extends BatchAction
{
    public function handle(Collection $collection)
    {
        $memberServer = new MemberServer();
        $user = $memberServer->getUser();
        foreach ($collection as $model) {
            if($model->user_id == $user->id && !$model->monitor_state){
                $model->monitor_add_time = now();
                if(Carbon::now()->lt($user->monitor_end_time)){
                    $model->monitor_end_time = $user->monitor_end_time;
                    $model->monitor_state = 1;
                }else{
                    $model->monitor_end_time = null;
                    $model->monitor_state = 2;
                }
                $model->save();
            }
        }
        return $this->response()->swal()->success('加入监控成功')->refresh();
    }

    public function rename()
    {
        return '<span class="btn btn-sm d_jiankong" style="margin-right:10px;">加入年费监控</span>';
    }
}