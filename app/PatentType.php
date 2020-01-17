<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PatentType extends Model
{
    //
    protected $appends = ['logo_url'];
    public function getLogoUrlAttribute()
    {
        return Storage::disk('public')->url($this->attributes['logo']);
    }
}
