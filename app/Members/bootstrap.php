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

Encore\Admin\Form::forget(['map', 'editor']);
app('view')->prependNamespace('admin', resource_path('views/member'));


Encore\Admin\Grid::init(function(\Encore\Admin\Grid $grid){
    $grid->disableExport();
    $grid->disableCreateButton();
    $grid->disableColumnSelector();
    $grid->disableFilter();
    $grid->disableActions();
    $grid->disableBatchActions();
});
Encore\Admin\Facades\Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {

    $navbar->left(view('member.search-bar'));

    //$navbar->right('html...');

});
Encore\Admin\Form::init(function (Encore\Admin\Form $form) {

    $form->disableEditingCheck();
    $form->disableCreatingCheck();
    //$form->disableCreatingCheck();
    $form->tools(function (\Encore\Admin\Form\Tools $tools) {
        $tools->disableDelete();
        $tools->disableView();
        $tools->disableList();
    });
    $form->footer(function(\Encore\Admin\Form\Footer $footer){
        $footer->disableReset();
        $footer->disableViewCheck();
    });
});
