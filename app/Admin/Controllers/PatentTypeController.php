<?php

namespace App\Admin\Controllers;

use App\PatentType;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PatentTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '专利类型';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PatentType);

        $grid->column('id', __('ID'));
        $grid->column('name', __('专利类型'));
        $grid->column('logo', __('Logo'))->image('/',40,20);
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        Admin::script('$("td").css("vertical-align","middle")');
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
        $show = new Show(PatentType::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PatentType);

        $form->text('name', __('类型名称'))->required();
        $form->image('logo', __('Logo'));
        $form->disableCreatingCheck(false);
        return $form;
    }
}
