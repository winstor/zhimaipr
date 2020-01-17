<?php

namespace App\Admin\Controllers;

use App\ElectronUser;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ElectronUserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '电子账户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ElectronUser);
        $grid->model()->with('member');
        $grid->column('id', __('ID'));
        $grid->column('username', __('账户'));
        $grid->column('password', __('密码'));
        $grid->column('member.name', __('所属会员'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableFilter();
        $grid->disableCreateButton();
        //$grid->disableActions();
        $grid->disableBatchActions();
        $grid->actions(function ($actions) {
            // 去掉删除
            $actions->disableDelete(false);
            // 去掉编辑
            $actions->disableEdit();

            // 去掉查看
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
        $show = new Show(ElectronUser::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('state', __('State'));
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
        $form = new Form(new ElectronUser);

        $form->number('user_id', __('User id'));
        $form->text('username', __('Username'));
        $form->password('password', __('Password'));
        $form->switch('state', __('State'))->default(1);
        $form->textarea('remark', __('Remark'));

        return $form;
    }
}
