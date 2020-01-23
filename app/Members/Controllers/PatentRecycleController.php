<?php

namespace App\Members\Controllers;

use App\Admin\Actions\Patent\BatchAddGoods;
use App\Admin\Actions\Patent\BatchMonitor;
use App\Admin\Actions\Patent\BatchRealDelete;
use App\Admin\Actions\Patent\BatchRecovery;
use App\Member;
use App\Patent;
use App\PatentDomain;
use App\PatentType;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PatentRecycleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '回收站';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        config(['member.submit'=>'22']);
        $grid = new Grid(new Patent);
        $user = Member::user();
        $grid->column('id', __('序号'));
        $grid->model()->where('user_id',$user->id)->with(['type','case'])
            ->whereNotNull('deleted_at')->withTrashed();
        $grid->column('type.name', __('专利类型'));
        $grid->column('patent_sn', __('member.patent_sn'));
        $grid->column('patent_name', __('member.patent_name'));
        $grid->column('patent_person', __('member.patent_person'));
        $grid->column('apply_date', __('member.apply_date'));
        $grid->column('case.name', __('member.patent_case'));
        $grid->disableBatchActions(false);
        $grid->batchActions(function(Grid\Tools\BatchActions $batchActions){
            $batchActions->disableDeleteAndHodeSelectAll();
        });
        $grid->tools(function(Grid\Tools $tools){
            $tools->append(new BatchRecovery());
            $tools->append(new BatchRealDelete());
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
        $show->field('sale_remark', __('Sale remark'));
        $show->field('image', __('Image'));
        $show->field('price', __('Price'));
        $show->field('is_cheap', __('Is cheap'));
        $show->field('is_best', __('Is best'));
        $show->field('sale_state', __('Sale state'));
        $show->field('sale_add_time', __('Sale add time'));
        $show->field('monitor_state', __('Monitor state'));
        $show->field('monitor_add_time', __('Monitor add time'));
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
        $form->textarea('sale_remark', __('Sale remark'));
        $form->image('image', __('Image'));
        $form->decimal('price', __('Price'))->default(0.00);
        $form->switch('is_cheap', __('Is cheap'));
        $form->switch('is_best', __('Is best'));
        $form->switch('sale_state', __('Sale state'));
        $form->datetime('sale_add_time', __('Sale add time'))->default(date('Y-m-d H:i:s'));
        $form->switch('monitor_state', __('Monitor state'));
        $form->datetime('monitor_add_time', __('Monitor add time'))->default(date('Y-m-d H:i:s'));
        $form->datetime('monitor_end_time', __('Monitor end time'))->default(date('Y-m-d H:i:s'));
        $form->textarea('fee_remark', __('Fee remark'));

        return $form;
    }
}
