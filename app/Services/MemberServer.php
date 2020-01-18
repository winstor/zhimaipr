<?php


namespace App\Services;


use App\Member;
use App\MemberReal;

class MemberServer
{
    public function getUser()
    {
        return Member::user();
    }
    public function getUserId()
    {
        return Member::user()->id;
    }
    public function realCount()
    {
        return MemberReal::where('real_state',0)->count();
    }
}
