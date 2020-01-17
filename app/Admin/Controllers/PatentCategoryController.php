<?php

namespace App\Admin\Controllers;

use App\PatentCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PatentCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '专利分类';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PatentCategory);

        $grid->column('id', __('ID'));
        $grid->column('name', __('patent.cat_name'));
        $grid->column('cat_sn', __('patent.cat_sn'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableFilter();
        $grid->disableExport();
        //$grid->disableBatchActions();
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
        $show = new Show(PatentCategory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cat_name', __('Cat name'));
        $show->field('cat_number', __('Cat number'));
        $show->field('logo', __('Logo'));
        $show->field('sort', __('Sort'));
        $show->field('full_name', __('Full name'));
        $show->field('cat_sn', __('Cat sn'));
        $show->field('pid', __('Pid'));
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
        $form = new Form(new PatentCategory);
        $form->text('cat_name', __('patent.cat_name'))->required();
        $form->text('cat_sn', __('patent.cat_sn'))->required();


        //$form->hidden('cat_number', __('patent.cat_number'));
        //$form->image('logo', __('Logo'));
        //$form->number('sort', __('patent.Sort'))->default(0);
        //$form->text('full_name', __('Full name'));

        //$form->number('pid', __('Pid'));

        return $form;
    }
}
