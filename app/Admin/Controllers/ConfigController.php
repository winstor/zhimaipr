<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;

class ConfigController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->title('网站设置')
            ->body(Tab::forms([
                'site' => Settings\Site::class,
                'address'=>Settings\Address::class,
                'email'=>Settings\Email::class,
            ]));
    }
}
