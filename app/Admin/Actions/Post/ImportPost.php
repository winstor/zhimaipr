<?php

namespace App\Admin\Actions\Post;

use Chumper\Zipper\Zipper;
use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;

class ImportPost extends Action
{
    protected $selector = '.import-post';

    public function handle(Request $request)
    {
        $zipper = new Zipper();
        //glob(public_path('images')))
        $name = $request->file('file')->getPathname();
        $files =$zipper->make($name)->listFiles();
        foreach($files as $key){
            $str = $zipper->getFileContent($key);
            $path = iconv("utf-8", "gb2312//IGNORE", $key);
            $name = basename($path);
            $extension = pathinfo($path,PATHINFO_EXTENSION);
            if($extension == 'tif'){

                file_put_contents(public_path('111/') . $name, $str);
            }

        }
        exit;
        $files =$zipper->make(public_path('images').'/111.zip')->listFiles();
        foreach($files as $key){
            $str = $zipper->getFileContent($key);
            $path = iconv("utf-8", "gb2312//IGNORE", $key);
            $name = basename($path);
            if($name == 'list.xml'){
                var_dump($str);
            }
            //file_put_contents(public_path('111/') . $name, $str);
        }
        return $this->response()->success('Success message...')->refresh();
    }
    public function form()
    {
        $this->file('file', '请选择文件');
    }
    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-post"><i class="fa fa-upload"></i>导入数据</a>
HTML;
    }
}