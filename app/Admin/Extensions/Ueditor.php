<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class Ueditor extends Field
{
    protected $view = 'admin.ueditor';

    protected static $css = [
        //'/vendor/ueditor/themes/iframe.css'
    ];

    protected static $js = [
        '/vendor/ueditor/ueditor.config.js',
        '/vendor/ueditor/ueditor.all.js',
    ];

    public function render()
    {
        $this->script = <<<EOT

UE.delEditor('{$this->id}');
var ue = UE.getEditor('{$this->id}', {
    initialFrameWidth: '100%',
    initialFrameHeight:500
});

EOT;

        return parent::render();
    }
}

//$name = $this->formatName($this->column);
//$this->token = csrf_token();

//$(document).on('pjax:start', function() {
//        UE.delEditor('{$this->id}');
//        var ue = UE.getEditor('{$this->id}', {
//            initialFrameWidth: '100%',
//            initialFrameHeight:500
//        });
//});