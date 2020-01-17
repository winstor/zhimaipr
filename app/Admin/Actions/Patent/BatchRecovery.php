<?php

namespace App\Admin\Actions\Patent;

use App\Admin\Actions\BatchAction;
use App\Services\MemberServer;
use Illuminate\Database\Eloquent\Collection;

class BatchRecovery extends BatchAction
{
    public $name = '还原';

    public function handle(Collection $collection)
    {
        $memberServer = new MemberServer();
        $user = $memberServer->getUser();
        $collection->filter(function($model)use($user){
            return $user->id == $model->user_id;
        })->each->restore();
        return $this->response()->swal()->success('还原操作成功')->refresh();
    }
    public function rename()
    {
        return <<<HTML
<span class="btn btn-sm btn-info"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;{$this->name}</span>
HTML;
    }
}