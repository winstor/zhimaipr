<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    const IMAGE_TYPE= ['png','jpg','jpeg','gif','ico'];
    /**
     * 创建或更新配置项
     * @param Collection $collection
     * @param $type
     */
    public static function createOrUpdate(Collection $collection, $type)
    {
        //获取已有配置名称
        $oldNames = self::where('type',$type)->pluck('name','name');
        //配置项更新
        $createData = $collection->map(function($value,$name)use($type,$oldNames){
            //如果是文件，保存文件，返回地址
            if($value instanceof UploadedFile){
                $extension = $value->guessExtension();
                if(in_array($extension,self::IMAGE_TYPE)){
                    $extension = 'png';
                }
                $filename = $name.'.'.$extension;
                $value =  $value->storeAs('images/'.$type,$filename,'public');
            }
            if(!$oldNames->has($name)){
                return [
                    'type'=>$type,
                    'name'=>$name,
                    'value'=>$value,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ];
            }
            self::where([['type',$type],['name',$name]])->update(['value'=>$value]);
            return null;
        })->filter()->all();
        if($createData){
            DB::table('configs')->insert($createData);
        }
    }
    /**
     * 获取配置项
     * @param null $type
     * @return mixed
     */
    public static function getConfig($type = null)
    {
        if($type){
            return self::where('type',$type)->pluck('value','name');
        }
        return self::pluck('value','name');
    }
    public static function getValue($name,$type=null)
    {
        $where[] = ['name',$name];
        if($type){
            $where[] = ['type',$type];
        }
        return self::where($where)->value('value');
    }
}
