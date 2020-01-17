<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectronUser extends Model
{
    //
    public function member()
    {
        return $this->belongsTo(Member::class,'user_id');
    }
}
