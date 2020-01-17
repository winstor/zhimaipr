<?php

namespace App\Admin\Actions\Patent;

use App\Admin\Actions\BatchAction;
use App\Services\MemberServer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class BatchAddGoods extends BatchAction
{
    public $name = '批量发布交易';

    public function handle(Collection $collection)
    {
        $memberServer = new MemberServer();
        $user = $memberServer->getUser();
        foreach ($collection as $model) {
            if($model->user_id == $user->id && !$model->sale_state){
                $model->sale_state = 1;
                $model->sale_add_time = now();
                $model->save();
            }
        }
        return $this->response()->swal()->success('批量发布成功')->refresh();
    }

    public function rename()
    {
        return '<span class="btn btn-sm d_fabu" style="margin-right:10px;">'.$this->name().'</span>';
    }


}