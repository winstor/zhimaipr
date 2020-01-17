<?php

namespace App\Members\Controllers;

use App\ElectronUser;
use App\Member;
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
        $grid->model()->where('user_id',Member::user()->id)->with('member');
        $grid->column('id', __('ID'));
        $grid->column('username', __('账户'));
        $grid->column('password', __('密码'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableFilter();
        //$grid->disableActions();
        //$grid->disableBatchActions();
        $grid->actions(function ($actions) {
            // 去掉删除
            $actions->disableDelete(false);
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

        $form->text('username', __('账号'))->required();
        $form->password('password', __('密码'))->required();
        $form->textarea('remark', __('备注'));
        $form->hidden('user_id');
        $form->saving(function(Form $form){
            $user = Member::user();
            if(!$form->model()->id){
                $form->user_id = $user->id;
            }elseif($form->model()->user_id != $user->id){
                return back();
            }
        });
        return $form;
    }
}
