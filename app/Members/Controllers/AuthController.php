<?php

namespace App\Members\Controllers;

use App\Member;
use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseAuthController
{
    protected function loginValidator(array $data)
    {
        return Validator::make($data, [
            $this->username()   => 'required',
            'password'          => 'required',
        ],[
            'username.required'=>'账号不能为空',
            'password.required'=>'密码不能为空'
        ]);
    }
    //注册页面
    public function register()
    {
        return view('register');
    }
    //提交注册并登录
    public function postRegister(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'username' => 'required|string|max:100|unique:member_users',
            'email' => 'required|string|email|max:255|unique:member_users',
            'mobile'=> 'required|regex:/^1[345678]\d{9}$/',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation'=>'required|same:password',
            'qq'=>'nullable|regex:/^[1-9]\d{1,11}$/',
        ],[
            'username.required'=>'请输入账号',
            'username.unique'=>'用户名已存在',
            'email.required'=>'请输入邮箱',
            'email.email'=>'请输入有效邮箱',
            'email.unique'=>'邮箱已存在',
            'password.required'=>'密码不能为空',
            'password.confirmed'=>'两次输入的密码不一致',
            'mobile.required'=>'请输入手机号码',
            'mobile.regex'=>'手机号格式不正确',
            'qq.regex'=>'请输入有效的QQ',
        ])->validate();
        $this->create($data);
        $credentials = $request->only([$this->username(), 'password']);
        if ($this->guard()->attempt($credentials, false)) {
            return $this->sendLoginResponse($request);
        }
        return back()->withInput()->withErrors([
            $this->username() => $this->getFailedLoginMessage(),
        ]);
    }
    protected function create($data)
    {
        return Member::create([
            'username' => $data['username'],
            'name'     =>$data['name']??$data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile'=>$data['mobile']??'',
            'qq'=>$data['qq']??''
        ]);
    }
}
