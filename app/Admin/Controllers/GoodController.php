<?php

namespace App\Admin\Controllers;

use App\Good;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商超管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Good());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('patent_id', __('Patent id'));
        $grid->column('patent_sn', __('Patent sn'));
        $grid->column('patent_name', __('Patent name'));
        $grid->column('patent_person', __('Patent person'));
        $grid->column('patent_domain_id', __('Patent domain id'));
        $grid->column('patent_type_id', __('Patent type id'));
        $grid->column('patent_case_id', __('Patent case id'));
        $grid->column('patent_cert_id', __('Patent cert id'));
        $grid->column('is_cheap', __('Is cheap'));
        $grid->column('is_best', __('Is best'));
        $grid->column('apply_date', __('Apply date'));
        $grid->column('price', __('Price'));
        $grid->column('state', __('State'));
        $grid->column('reserve_number', __('Reserve number'));
        $grid->column('remark', __('Remark'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->disableColumnSelector();
        $grid->disableCreateButton();
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
        $show = new Show(Good::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('patent_id', __('Patent id'));
        $show->field('patent_sn', __('Patent sn'));
        $show->field('patent_name', __('Patent name'));
        $show->field('patent_person', __('Patent person'));
        $show->field('patent_domain_id', __('Patent domain id'));
        $show->field('patent_type_id', __('Patent type id'));
        $show->field('patent_case_id', __('Patent case id'));
        $show->field('patent_cert_id', __('Patent cert id'));
        $show->field('is_cheap', __('Is cheap'));
        $show->field('is_best', __('Is best'));
        $show->field('apply_date', __('Apply date'));
        $show->field('price', __('Price'));
        $show->field('state', __('State'));
        $show->field('reserve_number', __('Reserve number'));
        $show->field('remark', __('Remark'));
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
        $form = new Form(new Good());

        $form->number('user_id', __('User id'));
        $form->number('patent_id', __('Patent id'));
        $form->text('patent_sn', __('Patent sn'));
        $form->text('patent_name', __('Patent name'));
        $form->text('patent_person', __('Patent person'));
        $form->number('patent_domain_id', __('Patent domain id'));
        $form->number('patent_type_id', __('Patent type id'));
        $form->number('patent_case_id', __('Patent case id'));
        $form->number('patent_cert_id', __('Patent cert id'));
        $form->switch('is_cheap', __('Is cheap'));
        $form->switch('is_best', __('Is best'));
        $form->datetime('apply_date', __('Apply date'))->default(date('Y-m-d H:i:s'));
        $form->decimal('price', __('Price'))->default(0.00);
        $form->switch('state', __('State'));
        $form->number('reserve_number', __('Reserve number'));
        $form->textarea('remark', __('Remark'));

        return $form;
    }
}
