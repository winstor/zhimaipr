<?php

namespace App\Admin\Controllers;

use App\Keyword;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class KeywordController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '关键字';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Keyword);

        $grid->column('id', __('ID'));
        $grid->column('name', __('关键字'));
        $grid->column('url', __('跳转地址'))->copyable();
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));

        $grid->disableFilter();

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
        $show = new Show(Keyword::findOrFail($id));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Keyword);

        $form->text('name', __('关键字'));
        $form->url('url', __('跳转地址'));
        $form->hidden('type', __('Type'))->default(1);

        return $form;
    }
}
