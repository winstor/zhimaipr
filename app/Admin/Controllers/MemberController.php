<?php

namespace App\Admin\Controllers;

use App\Member;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MemberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '会员管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Member());
        $grid->model()->orderBy('id','desc');
        $grid->column('id', __('Id'));
        $grid->column('username', __('账号'));
        $grid->column('name', __('姓名'));
        $grid->column('mobile', __('电话'));
        $grid->column('email', __('邮箱'));
        $grid->column('real_state', __('是否认证'))
            ->using(['未认证','已认证','认证失败','待审核'],'')
            ->dot(['default','success','default','danger'])->sortable();
        $grid->column('created_at', __('注册时间'));
        Admin::script('$("td").css("vertical-align","middle")');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->disableRowSelector();
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
        $show = new Show(Member::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Member());

        $form->text('username', __('账户'));
        $form->password('password', trans('admin.password'))->rules('required|confirmed');
        $form->password('password_confirmation', trans('admin.password_confirmation'))->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });

        $form->ignore(['password_confirmation']);
        $form->text('name', __('姓名'));
        $form->mobile('mobile', __('手机号码'));
        $form->text('phone', __('公司电话'));
        $form->email('email', __('Email'));
        $form->text('qq', __('QQ'));
        $form->text('address', __('详细地址'));
        $form->radio('sex','性别')->options(['1' => '男', '2'=> '女'])->default('1');
        $form->datetime('birthday', __('生日'))->default(date('Y-m-d'));
        $form->hidden('real_state', __('Real state'))->default(0);
        $form->hidden('real_type', __('Real type'))->default(0);

        $form->saving(function(Form $form){
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });
        return $form;
    }
}
