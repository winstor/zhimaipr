<?php

namespace App\Admin\Controllers;

use App\Patent;
use App\PatentCase;
use App\PatentCert;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PatentCaseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '案件状态';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PatentCase());
        $certState = PatentCert::pluck('name','id');
        $grid->column('id', __('ID'));
        $grid->column('name', __('状态名称'));
        $grid->column('patent_cert_id', __('下证状态'))->display(function($cert_state)use($certState){
            return $certState->get($cert_state,'');
        });
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->disableFilter();
        $grid->disableExport();

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
        $show = new Show(PatentCase::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PatentCase());

        $form->text('name', __('专利状态'))->required();
        $form->select('patent_cert_id', __('下证状态'))->required()->options(PatentCert::pluck('name','id'))
            ->default(0)->help('采集专利时使用');
        return $form;
    }
}
