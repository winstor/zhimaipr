<?php

namespace App\Members\Controllers;

use App\Admin\Actions\Patent\BatchCancelMonitor;
use App\Admin\Actions\Patent\BatchMonitorExport;
use App\Member;
use App\Members\Extensions\Exporter\MonitorExporter;
use App\Patent;
use App\PatentCase;
use App\PatentDomain;
use App\PatentType;
use Carbon\Carbon;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets;

class MonitorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '年费监控';


    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->row('<link rel="stylesheet" href="/css/d_newscss.css">')
            ->body($this->grid());
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Patent);
        $grid->filter(function(Grid\Filter $filter){
            $filter->disableIdFilter();
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->equal('patent_type_id','专利类型')->select(PatentType::pluck('name','id'));
                $filter->where(function ($query) {
                    $query->where('patent_sn', 'like', "%{$this->input}%")
                        ->orWhere('patent_name', 'like', "%{$this->input}%")
                        ->orWhere('patent_person', 'like', "%{$this->input}%")
                        ->orWhere('fee_remark', 'like', "%{$this->input}%");
                }, '关键字')->placeholder('申请号/专利名称/申请人/年费备注');

            });
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->equal('patent_case_id','案件状态')->select(PatentCase::pluck('name','id'));
                $filter->between('created_at', '缴费时间')->datetime();
            });
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->equal('monitor_state','监控状态')->select(['未监控','监控中','待审核']);
            });
        });
        $user = Member::user();
        $grid->model()->with(['payLogs']);
        $grid->model()->where('user_id',$user->id)->where('monitor_state',1);
        $grid->column('id', __('序号'));
        $grid->column('type.logo', __('专利信息'))->image('/','',30)
            ->display(function($logo){
            return $logo.$this->patent_sn.'<br/>'.$this->patent_name;
        });
        $grid->column('patent_person', __('第一申请人'));
        $grid->column('case.name', __('申请日/案件状态'))->display(function($case_name){
            return $this->apply_date.'<br/>'.$case_name;
        });
        $grid->column('monitor_state', __('监控状态'))->display(function($monitor_state){
                if(!$this->deadline){
                    return '<span class="label label-warning">待维护</span>';
                }
                if(Carbon::now()->gt($this->deadline)){
                    return '<span class="label label-danger">紧急滞纳</span>';
                }
                if($monitor_state == 1){
                    return '<span class="label label-success">年费正常</span>';
                }
                return '';
            });
        $grid->column('deadline','缴费时间')->editable('date');
        $grid->column('year_number','年费')->display(function(){
            $deadline =Carbon::parse($this->deadline);
            return  '第<span class="text-red">'.$deadline->diffInYears($this->apply_date).'</span>年';
        });
//        $grid->column('fee_message', __('年费信息'))->display(function(){
//            if(!$this->deadline){
//                return '<span class="label label-default">无</span>';
//            }
//            $deadline =Carbon::parse($this->deadline);
//            return  '<span class="text-red">'.$deadline->toDateString().'</span>前缴<br/>'.
//                '第<span class="text-red">'.$deadline->diffInYears($this->apply_date).'</span>年年费';
//        });
        $grid->column('pay_surplus_day', __('下次缴费'))->display(function(){
            return Carbon::now()->diffInDays($this->deadline);
        })->help('下次缴费剩余天数');
        $grid->column('fee_remark', __('年费备注'))->editable('textarea');
        $grid->disableBatchActions(false);
        $grid->batchActions(function(Grid\Tools\BatchActions $batchActions){
            $batchActions->disableDeleteAndHodeSelectAll();
        });
        $grid->tools(function(Grid\Tools $tools){
            //$tools->append(new BatchMonitorExport());
            $tools->append(new BatchCancelMonitor());
        });
        $grid->disableExport(false);
        $grid->disableFilter(false);
        $grid->actions(function(Grid\Displayers\Actions $actions){
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
        });
        //导出
        $grid->exporter(new MonitorExporter());
        Admin::script('$("td").css("vertical-align","middle")');
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
        $show = new Show(Patent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('patent_sn', __('Patent sn'));
        $show->field('patent_name', __('Patent name'));
        $show->field('patent_person', __('Patent person'));
        $show->field('apply_date', __('Apply date'));
        $show->field('patent_domain_id', __('Patent domain id'));
        $show->field('patent_type_id', __('Patent type id'));
        $show->field('patent_case_id', __('Patent case id'));
        $show->field('patent_cert_id', __('Patent cert id'));
        $show->field('electron_user_id', __('Electron user id'));
        $show->field('inventor', __('Inventor'));
        $show->field('remark', __('Remark'));
        $show->field('image', __('Image'));
        $show->field('price', __('Price'));
        $show->field('is_cheap', __('Is cheap'));
        $show->field('is_best', __('Is best'));
        $show->field('sale_state', __('Sale state'));
        $show->field('monitor_state', __('Monitor state'));
        $show->field('monitor_end_time', __('Monitor end time'));
        $show->field('fee_remark', __('Fee remark'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Patent());

        $form->number('user_id', __('User id'));
        $form->text('patent_sn', __('Patent sn'));
        $form->text('patent_name', __('Patent name'));
        $form->text('patent_person', __('Patent person'));
        $form->datetime('apply_date', __('Apply date'))->default(date('Y-m-d H:i:s'));
        $form->number('patent_domain_id', __('Patent domain id'));
        $form->number('patent_type_id', __('Patent type id'));
        $form->number('patent_case_id', __('Patent case id'));
        $form->number('patent_cert_id', __('Patent cert id'));
        $form->number('electron_user_id', __('Electron user id'));
        $form->text('inventor', __('Inventor'));
        $form->textarea('remark', __('Remark'));
        $form->image('image', __('Image'));
        $form->decimal('price', __('Price'))->default(0.00);
        $form->switch('is_cheap', __('Is cheap'));
        $form->switch('is_best', __('Is best'));
        $form->switch('sale_state', __('Sale state'));
        $form->switch('monitor_state', __('Monitor state'));
        $form->datetime('monitor_end_time', __('Monitor end time'))->default(date('Y-m-d H:i:s'));
        $form->textarea('fee_remark', __('Fee remark'));
        $form->date('deadline');
        return $form;
    }
}
