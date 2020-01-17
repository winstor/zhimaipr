<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatentDomain extends Model
{
    //领域-分类 一对一关联
    public function category()
    {
        return $this->belongsTo(PatentCategory::class,'cat_sn','cat_sn');
    }
}
