<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberReal extends Model
{
    //
    public function member()
    {
        return $this->belongsTo(Member::class,'user_id');
    }
}
