<?php

namespace App\Admin\Controllers;

use App\FriendLink;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FriendLinkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '友情链接';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FriendLink);

        $grid->column('id', __('ID'));
        $grid->column('name', __('网站名称'));
        $grid->column('url', __('网站地址'));
        $grid->column('logo', __('Logo'))->image();
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableFilter();

        Admin::script('$("td").css("vertical-align","middle")');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(FriendLink::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('url', __('Url'));
        $show->field('logo', __('Logo'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FriendLink);

        $form->text('name', __('网站名称'))->required();
        $form->url('url', __('网站地址'))->required();
        $form->image('logo', __('网站Logo'))->required();

        return $form;
    }
}
