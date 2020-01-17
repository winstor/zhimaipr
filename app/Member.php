<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member_users';
    protected $fillable = ['username','name','email','password','mobile','qq'];

    public static function user()
    {
        return \Encore\Admin\Facades\Admin::user();
    }
}
