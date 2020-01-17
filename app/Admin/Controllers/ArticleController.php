<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Export\ArticleExporter;
use App\Article;
use App\ArticleType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);
        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('article_type_id', '文章类型', ArticleType::pluck('name','id'));
        });
        $grid->model()->with('type')->orderBy('id','desc');
        $grid->column('id', __('ID'));
        $grid->column('title', __('文章标题'));
        $grid->column('type.name', __('类型'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));
        $grid->exporter(new ArticleExporter());
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
        $show = new Show(Article::findOrFail($id));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->text('title', __('标题'))->required();
        $form->select('article_type_id', __('类型'))->options(ArticleType::pluck('name','id'))->required();
        $form->image('logo', __('Logo'));
        $form->editor('content', __('内容'));
        $form->saved(function($form){
            if($form->logo){
                $image = ImageManagerStatic::make($form->logo)->resize(350,245);
                Storage::disk('public')->put($form->model()->logo,$image->encode());
            }
        });
        return $form;
    }
}
