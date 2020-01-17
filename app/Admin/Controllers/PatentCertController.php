<?php

namespace App\Admin\Controllers;

use App\PatentCert;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PatentCertController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '专利状态';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PatentCert());

        $grid->column('id', __('ID'));
        $grid->column('name', __('状态名称'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableColumnSelector();
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->actions(function(Grid\Displayers\Actions $actions){
            $actions->disableDelete();
            $actions->disableView();
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
        $show = new Show(PatentCert::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PatentCert());

        $form->text('name', __('状态名称'));

        return $form;
    }
}
