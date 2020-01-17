<?php

namespace App\Admin\Controllers;

use App\College;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CollegeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '高校专场';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new College);

        $grid->column('id', __('ID'));
        $grid->column('name', __('高校名称'));
        $grid->column('logo', __('Logo'))->image('',50,50);
        $grid->column('sort', __('排序'))->editable();
        $grid->column('desc', __('简介'))->limit(30);
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        Admin::script('$("td").css("vertical-align","middle")');

        $grid->disableFilter();
        $grid->disableExport();
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
        $show = new Show(College::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('logo', __('Logo'));
        $show->field('sort', __('Sort'));
        $show->field('desc', __('Desc'));
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
        $form = new Form(new College);

        $form->text('name', __('高校名称'))->required();
        $form->image('logo', __('Logo'));
        $form->number('sort', __('排序'))->default(0);
        $form->textarea('desc', __('简介'))->default('');
        $form->saving(function(){
           // $this->sort = $this->sort?:0;
            //$this->desc = $this->desc?:'';
        });
        return $form;
    }
}
