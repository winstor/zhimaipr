<?php

namespace App\Admin\Actions\Patent;

use Carbon\Carbon;
use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BatchMonitorAddTime extends BatchAction
{
    protected $selector = '.add-time-posts';
    public static $date= [
        6=>'半年',
        12=>'一年',
        24=>'二年',
        60=>'五年',
        120=>'十年',
    ];
    public function handle(Collection $collection,Request $request)
    {
        $month = $request->get('month');
        if(isset(self::$date[$month])){
            foreach ($collection as $model) {
                if(Carbon::now()->gt($model->monitor_end_time)){
                    $model->monitor_end_time = Carbon::now();
                }elseif(!($model->monitor_end_time instanceof Carbon)){
                    $model->monitor_end_time = Carbon::parse($model->monitor_end_time);
                }
                $model->monitor_end_time->addMonths($month);
                $model->monitor_state = 1;
                $model->save();
            }
            return $this->response()->success('监控续期成功！')->refresh();
        }
        return $this->response()->swal()->error('监控续期失败！')->refresh();
    }
    public function form()
    {
        $this->select('month','续期时间')->options(self::$date)->required();
    }
    public function html()
    {
        return "<a class='add-time-posts btn btn-sm btn-danger'><i class='fa fa-cart-plus'></i>监控续期</a>";
    }
    public function actionScript()
    {
        $warning = __('请选择数据!');

        return <<<SCRIPT
        var key = $.admin.grid.selected();

        if (key.length === 0) {
            $.admin.toastr.warning('{$warning}', '', {positionClass: 'toast-top-center'});
            return ;
        }

        Object.assign(data, {_key:key});
SCRIPT;
    }

}
