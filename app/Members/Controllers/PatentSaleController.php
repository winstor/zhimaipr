<?php

namespace App\Members\Controllers;

use App\Good;
use App\Patent;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PatentSaleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '我发布的专利';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Patent());
        $grid->column('id', __('序号'));
        $grid->column('type.logo', __('专利信息'))->image('/','',30)
            ->display(function($logo){
                return $logo.$this->patent_sn.'<br/>'.$this->patent_name;
            });

        $grid->column('patent_person', __('member.patent_person'));
        $grid->column('apply_date', __('member.apply_date'));
        $grid->column('domain.name', __('member.domain_name'));
        $grid->column('case.name', __('member.patent_case').'/'.__('member.patent_cert'))
        ->display(function($case_name){
            $cert_name = $this->cert?$this->cert->name:'';
            return $case_name.'<br/>'.$cert_name;
        });
        $sale_state = Good::SALE_STATE;
        unset($sale_state[0]);
        $grid->column('sale_state', __('member.state'))->width(150)->editable('select', $sale_state);
        $grid->column('price', __('member.parent_price'))->width(150)->editable();
        $grid->column('sale_remark', __('member.sale_remark'))
            ->display(function($sale_remark){return $sale_remark?:'';})->width(200)->editable('textarea');
        $grid->disableBatchActions(false);

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
        $form->textarea('remark', __('Remark'));
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
