<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    //删除操作执行删除
    public function delete()
    {
        if($this->getKey()>6){
            return parent::delete(); // TODO: Change the autogenerated stub
        }
        throw new \Exception('此文章类型不能删除');
    }
}
