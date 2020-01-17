<?php

namespace App\Admin\Controllers;

use App\PatentCategory;
use App\PatentDomain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PatentDomainController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '热门领域';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PatentDomain);
        $grid->model()->with('category');
        $grid->column('id', __('ID'));
        $grid->column('name', __('patent.domain_name'));
        $grid->column('cat_sn', __('patent.cat_sn'))->display(function($cat_sn){
            return $this->category?$cat_sn.'-'.$this->category->name:$cat_sn;
        });
        //$grid->column('sort', __('Sort'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableFilter();
        $grid->disableExport();
        //$grid->disableBatchActions();
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
        $show = new Show(PatentDomain::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('patent.domain_name'));
        $show->field('cat_sn', __('patent.cat_sn'));
        $show->field('created_at', __('admin.created_at'));
        $show->field('updated_at', __('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PatentDomain);

        $form->text('name', __('patent.domain_name'))->required();
        $form->select('cat_sn', __('patent.cat_sn'))->options(PatentCategory::pluck('name','cat_sn'))->required();
        //$form->number('sort', __('Sort'));
        return $form;
    }
}
