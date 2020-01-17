<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        //$image = ImageManagerStatic::make(public_path('images/000001.tif'))->encode('jpg');
        //$image->save(public_path('images/000002.jpg'));
        return $content
            ->title('欢迎进入')
            ->description('知识产权后台管理系统')
            ->row(Dashboard::title());

    }
}
