<?php

namespace App\Admin\Actions\Patent;

use App\Admin\Actions\BatchAction;
use App\Services\MemberServer;
use Illuminate\Database\Eloquent\Collection;

class BatchRealDelete extends BatchAction
{
    public $name = '永久删除';

    public function handle(Collection $collection)
    {
        $memberServer = new MemberServer();
        $user = $memberServer->getUser();
        $collection->filter(function($model)use($user){
            return $user->id == $model->user_id && $model->deleted_at;
        })->each->forceDelete();
        return $this->response()->swal()->success('删除成功')->refresh();
    }
    public function rename()
    {
        return <<<HTML
<span class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>{$this->name}</span>
HTML;
    }

    public function dialog()
    {
        $this->confirm('<span>是否永久删除？<br/><br/><h5>永久删除当前专利将不可恢复！</h5><br/><br/></span>');
    }

}