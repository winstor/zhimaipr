<?php

namespace App\Members\Controllers;

use App\Http\Controllers\Controller;
use App\Member;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Members\Forms\Settings;
use Encore\Admin\Widgets;
use Encore\Admin\Facades\Admin;

class MemberController extends AdminController
{

    public function index(Content $content)
    {
        return $content
            ->title('个人中心')
            ->body($this->form()->edit(Admin::user()->id));
    }
    //修改用户信息post
    public function modify()
    {
        return $this->form()->update(Admin::user()->id);
    }
    protected function form()
    {
        $form = new Form(new Member());
        $form->text('name', __('姓名'))->required();
        $form->mobile('mobile', __('手机号码'))->required();
        $form->email('email', __('电子邮件'))->required();
        $form->text('qq', __('QQ'));
        $form->image('avatar',trans('admin.avatar'));
        $form->setAction(admin_url('userDetail'));
        $form->saved(function($form){
            admin_toastr('修改完成');
            return back();
        });
        return $form;
    }

    /**
     * User setting page.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function changePassword(Content $content)
    {
        $form = $this->settingForm();
        $form->tools(
            function (Form\Tools $tools) {
                $tools->disableList();
                $tools->disableDelete();
                $tools->disableView();
            }
        );
        return $content
            ->title(trans('admin.user_setting'))
            ->body($form);
    }
    /**
     * Update user setting.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putPassword()
    {
        return $this->settingForm()->update(Admin::user()->id);
    }
    /**
     * Model-form for user setting.
     *
     * @return Form
     */
    protected function settingForm()
    {
        $form = new Form(new Member());
        $form->password('old_password', '原密码')->required();
        $form->password('password', '新密码')->rules('confirmed|required',[
            'required'=>'新密码不能为空',
            'confirmed'=>'新密码不一致',
        ]);
        $form->password('password_confirmation', '确认新密码')->rules('required');
        $form->setAction(admin_url('changePassword'));
        $form->ignore(['password_confirmation']);
        $form->saving(function (Form $form) {
            $user = Admin::user();
            if(Hash::check($form->old_password,$user->password)){
                $user->password =  bcrypt($form->password);
                $user->save();
                admin_toastr('修改完成');
            }else{
                admin_toastr('原密码输入错误!!','error');
            }
            return back();
        });
        return $form;
    }
}
