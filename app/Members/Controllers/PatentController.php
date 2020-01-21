<?php

namespace App\Members\Controllers;
use App\Admin\Actions\Patent\BatchAddGoods;
use App\Admin\Actions\Patent\BatchMonitor;
use App\Exceptions\FailMsgException;
use App\Exceptions\ResponseMessageException;
use App\Exports\InvoiceExport;
use App\Exports\PatentExport;
use App\Imports\PatentImport;
use App\Member;
use App\Patent;
use App\PatentCase;
use App\PatentCert;
use App\PatentDomain;
use App\PatentType;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PatentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '专利';
    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->row('<link rel="stylesheet" href="/css/d_newscss.css">')
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Patent);

        $grid->filter(function(Grid\Filter $filter){
            $filter->disableIdFilter();
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->equal('patent_sn','专利号');
                $filter->equal('patent_type_id','专利类型')->select(PatentType::pluck('name','id'));
            });
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->equal('is_monitor','监控状态')->select(['未监控','监控中']);
            });
            $filter->column(1/3, function (Grid\Filter $filter) {
                $filter->equal('patent_domain_id','热门领域')->select(PatentDomain::pluck('name','id'));
            });
        });
        $user = Member::user();
        $grid->column('id', __('序号'));
        $grid->model()->where('user_id',$user->id)->with(['type','domain','college','member','case','cert','monitor']);
        $grid->column('type.logo_url', __('专利信息'))->image()->display(function($logo_url){
            return $logo_url.$this->patent_sn.'<br/>'.$this->patent_name;
        });
        $grid->column('patent_person', __('申请（人/日期）'))->display(function($patent_person){
                return $patent_person.'<br/>'.$this->apply_date;
        });

        $grid->column('apply_date', __('申请日'));
        $grid->column('case.name','案件状态');
        $grid->column('monitor_state','监控状态')->using(['未监控','已监控','待审核'])
            ->label(['success','danger','warning']);

        $grid->column('sale_state','售卖状态')->using(Patent::SALE_STATE,'未发布')
            ->label(['success','danger','warning','default']);
        $grid->disableCreateButton();
        Admin::script('$("td").css("vertical-align","middle")');

        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->disableBatchActions(false);
        $grid->batchActions(function(Grid\Tools\BatchActions $batchActions){
            //$batchActions->disableDeleteAndHodeSelectAll();
        });
        $grid->tools(function(Grid\Tools $tools){
            $tools->append(new BatchAddGoods());
            $tools->append(new BatchMonitor());
        });
        $grid->actions(function(Grid\Displayers\Actions $actions){
            $actions->disableView();
        });
        return $grid;
    }

    public function showUpload(Content $content)
    {
        return $content->header('添加专利')
            ->description('上传专利表格')
            ->body($this->uploadForm());
    }

    public function import(Request $request)
    {
        if(!$request->has('file')){
            admin_toastr('导入失败','error');
        }else{
            try{
                Excel::import(new PatentImport(),$request->file('file')->getRealPath());
                admin_toastr('导入成功');
            }catch (FailMsgException $failMsgException){
                admin_toastr($failMsgException->getMessage(),'error');
            }catch (\Exception $exception){
                admin_toastr('导入失败','error');
            }
        }
        return back();
    }
    //
    public function download()
    {
        return Excel::download(new InvoiceExport([
            [
                '申请号/专利号',
                '发明名称',
                '申请人',
                '申请日',
                '专利类型',
                '申请方式',
                '案件状态'
        ]]),'专利模板.xlsx');
    }
    protected function uploadForm()
    {
        $form = new Form(new Patent());
        $form->setTitle(' ');
        $form->setAction(admin_url('uploadPatent'));
        $form->file('file','选择文件')->required()
        ->help('文件格式：从专利局网站http://cpquery.cnipa.gov.cn/下载的表格或者与其格式相同的自制表格。<a target="_blank" href="'.route('downloadPatent').'">下载模板</a>');
        $form->saving(function(Form $form){
            admin_toastr('导入失败','error');
            return back();
        });

        return $form;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Patent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('electron_user_id', __('Electron user id'));
        $show->field('patent_sn', __('Patent sn'));
        $show->field('patent_name', __('Patent name'));
        $show->field('college_id', __('College id'));
        $show->field('Patent_person', __('Patent person'));
        $show->field('inventor', __('Inventor'));
        $show->field('patent_domain_id', __('Patent domain id'));
        $show->field('patent_type_id', __('Patent type id'));
        $show->field('patent_state_id', __('Patent state id'));
        $show->field('cert_state_id', __('Cert state id'));
        $show->field('apply_date', __('Apply date'));
        $show->field('patent_remark', __('Patent remark'));
        $show->field('image', __('Image'));
        $show->field('is_monitor', __('Is monitor'));
        $show->field('monitor_state', __('Monitor state'));
        $show->field('monitor_date', __('Monitor date'));
        $show->field('fee_remark', __('Fee remark'));
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
        $form = new Form(new Patent);
        $form->text('patent_sn', __('专利号'))->required();
        $form->text('patent_name', __('专利名称'))->required();
        $form->text('patent_person', __('专利权人'))->required();
        $form->select('patent_domain_id', __('技术领域'))->options(PatentDomain::pluck('name','id'))->required();
        $form->select('patent_type_id', __('专利类型'))->options(PatentType::pluck('name','id'))->required();
        $form->select('patent_case_id', __('案件状态'))->options(PatentCase::pluck('name','id'))->required();
        $form->select('patent_cert_id', __('专利状态'))->options(PatentCert::pluck('name','id'))->required();
        $form->datetime('apply_date', __('申请日期'))->format('YYYY-MM-DD')->required();
        $form->hidden('user_id');
        $form->saving(function(Form $form){
            $user = Member::user();
            if($form->model()->user_id && $form->model()->user_id != $user->id){
                return back();
            }
            $form->user_id = $user->id;
        });
        return $form;
    }
}
