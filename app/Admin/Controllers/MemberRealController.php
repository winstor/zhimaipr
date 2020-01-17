<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Grid\MemberRealAuditRow;
use App\MemberReal;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MemberRealController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '会员认证';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MemberReal());
        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('real_state', '认证状态', ['待审核','审核通过','审核未通过']);
        });
        $grid->model()->orderBy('id','desc');
        $grid->column('id', __('ID'));
        $grid->column('member.name', __('用户名称'));
        $grid->column('member.name', __('用户名称'));
        $grid->column('real_state', __('审核状态'))
            ->using(['待审核','审核通过','审核未通过'],'')
            ->dot(['warning','success','default'], '')->sortable();
        //$grid->column('real_type', __('Real type'));
        $grid->column('created_at', __('申请时间'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableFilter();
        $grid->disableCreateButton();
        $grid->disableColumnSelector();
        $grid->disableExport();
        $grid->disableBatchActions();

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            // 添加操作
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
            $actions->append('<a title="认证审核" href="'.route('member-reals.edit',$actions->getKey()).'" class="grid-row-edit"><i class="fa fa-paper-plane"></i></a>');
        });
        //使用旧版本
        $grid->setActionClass(Grid\Displayers\Actions::class);
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
        $show = new Show(MemberReal::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('id_card_front', __('Id card front'));
        $show->field('id_card_back', __('Id card back'));
        $show->field('license_picture', __('License picture'));
        $show->field('real_state', __('Real state'));
        $show->field('real_type', __('Real type'));
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
        $form = new Form(new MemberReal());

        $form->number('user_id', __('User id'));
        $form->image('id_card_front', __('Id card front'));
        $form->image('id_card_back', __('Id card back'));
        $form->image('license_picture', __('License picture'));
        //$form->switch('real_state', __('Real state'));
        //$form->switch('real_type', __('Real type'));
        $form->saved(function(){

        });
        return $form;
    }
}
