<?php


namespace App\Admin\Extensions\Nav;


use App\Services\MemberServer;

class Audit
{
    public function __toString()
    {
        $realServer = new MemberServer();
        $real_count = $realServer->realCount();
        return view('admin.nav.audit')->with(compact('real_count'))->render();
    }




}
