<?php


namespace App\Services;


use App\Member;

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
}