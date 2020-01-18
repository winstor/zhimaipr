<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatentNotice extends Model
{
    //
    protected $fillable = ['notice_serial','notice_sid','notice_name','notice_date','notice_file','notice_type','user_id','patent_id'];
}
