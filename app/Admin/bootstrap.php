<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
use Encore\Admin\Grid;
use Encore\Admin\Form;

Encore\Admin\Form::forget(['map', 'editor']);
Encore\Admin\Form::extend('editor', App\Admin\Extensions\Ueditor::class);
Encore\Admin\Form::extend('ckeditor', App\Admin\Extensions\Form\CKEditor::class);

Grid::init(function(Grid $grid){
    $grid->actions(function (Grid\Displayers\Actions $actions) {
        $actions->disableView();
    });
});
Form::init(function (Form $form) {

    $form->disableEditingCheck();

    $form->disableCreatingCheck();

    $form->disableViewCheck();
    $form->disableReset();
    $form->tools(function (\Encore\Admin\Form\Tools $tools) {
        $tools->disableDelete();
        $tools->disableView();
        //$tools->disableList();
    });
});
