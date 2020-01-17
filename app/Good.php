<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    const SALE_STATE = [1=>'待交易',2=>'已预约',3=>'已交易'];
    const SALE_STATE_LABEL = [
        '<span class="label label-default">未发布</span>',
        '<span class="label label-danger">待交易</span>',
        '<span class="label label-info">已预约</span>',
        '<span class="label label-success">已交易</span>',
    ];
    //
}
