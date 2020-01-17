<?php


namespace App\Members\Forms\Settings\User;


use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Detail extends Form
{
    public $title = '用户信息中心';

    public function handle(Request $request)
    {
        //dump($request->all());
        admin_success('Processed successfully.');
        return back();
    }
    public function form()
    {
        $this->text('name', __('真实姓名'))->required();
        $this->mobile('mobile', __('电话号码'))->required();
        $this->email('email', __('电子邮件'))->required();
        $this->text('qq', __('QQ'));
        $this->image('avatar', __('个人头像'));
    }
    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
        ];
    }
}