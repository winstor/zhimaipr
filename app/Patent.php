<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patent extends Model
{
    use SoftDeletes;
    protected $dates = ['apply_date'];
    const SALE_STATE = [1=>'待交易',2=>'已预约',3=>'已交易'];
    //
    public function domain()
    {
        return $this->belongsTo(PatentDomain::class,'patent_domain_id');
    }
    public function type()
    {
        return $this->belongsTo(PatentType::class,'patent_type_id');
    }

    public function case()
    {
        return $this->belongsTo(PatentCase::class,'patent_case_id');
    }
    public function cert()
    {
        return $this->belongsTo(PatentCert::class,'patent_cert_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'user_id');
    }
    public function sale()
    {
        return $this->hasOne(Good::class,'patent_id');
    }
    public function monitor()
    {
        return $this->hasOne(PatentMonitor::class,'patent_id');
    }

    public function checkUser()
    {
         Member::user();

    }
}
