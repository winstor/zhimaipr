<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Patent\BatchMonitorAddTime;
use App\Patent;
use App\PatentType;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PatentMonitorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '监控管理';

    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $patentType = PatentType::pluck('name','id')->toArray();
        $grid = new Grid(new Patent());
        $grid->filter(function(Grid\Filter $filter){
            $filter->disableIdFilter();
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->equal('patent_sn','专利号');
            });
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->where(function ($query) {
                    $query->whereHas('member', function ($query) {
                        $query->where('username','like', "%{$this->input}%")
                            ->orWhere('name','like', "%{$this->input}%")
                            ->orWhere('mobile',"{$this->input}")
                            ->orWhere('email',"{$this->input}");
                    });
                }, '会员')->placeholder('会员账户/名称/电话/邮件');
            });
        });
        $grid->model()->where('monitor_state','>',0)->orderBy('id','desc');
        $grid->column('id', __('ID'));
        $grid->column('patent_type_id', __('member.patent_type'))->using($patentType)->filter($patentType);
        $grid->column('patent_sn', __('专利信息'))
            ->display(function($patent_sn){
            return $patent_sn.'<br/>'.$this->patent_name;
        });
        $grid->column('patent_person', __('member.patent_person'));
        $grid->column('apply_date', __('member.apply_date'))->filter('range', 'date');
        $grid->column('monitor_state', __('监控状态'))->display(function($monitor_state){
            if(Carbon::now()->gt($this->monitor_end_time)){
                return '<span class="label label-default">已过期</span>';
            }
            return '<span class="label label-success">监控中</span>';
        });
        $grid->column('monitor_end_time', __('监控到期时间'));
        $grid->disableCreateButton();
        $grid->batchActions(function(Grid\Tools\BatchActions $batchActions){
            $batchActions->disableDeleteAndHodeSelectAll();
        });
        $grid->tools(function(Grid\Tools $tools){
            //$tools->append(new BatchMonitorExport());
            $tools->append(new BatchMonitorAddTime());
        });
        return $grid;
    }


    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(PatentMonitor::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('patent_id', __('Patent id'));
        $show->field('patent_sn', __('Patent sn'));
        $show->field('patent_name', __('Patent name'));
        $show->field('apply_date', __('Apply date'));
        $show->field('state', __('State'));
        $show->field('monitor_date', __('Monitor date'));
        $show->field('fee_remark', __('Fee remark'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PatentMonitor());

        $form->number('patent_id', __('Patent id'));
        $form->text('patent_sn', __('Patent sn'));
        $form->text('patent_name', __('Patent name'));
        $form->datetime('apply_date', __('Apply date'))->default(date('Y-m-d H:i:s'));
        $form->switch('state', __('State'));
        $form->datetime('monitor_date', __('Monitor date'))->default(date('Y-m-d H:i:s'));
        $form->textarea('fee_remark', __('Fee remark'));

        return $form;
    }
}
