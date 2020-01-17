<?php

namespace App\Http\Controllers;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function register()
    {
         $this->guard()->loginUsingId(1);
        return 3;
    }

    protected function guard()
    {
        return Admin::guard();
    }
}
