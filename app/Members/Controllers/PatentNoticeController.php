<?php

namespace App\Members\Controllers;

use App\Admin\Actions\Post\ImportPost;
use App\Member;
use App\PatentNotice;
use App\Services\NoticeServer;
use Carbon\Carbon;
use Chumper\Zipper\Zipper;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Storage;

class PatentNoticeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '通知书';
    protected $noticeServer;
    public function __construct(NoticeServer $noticeServer)
    {
        $this->noticeServer = $noticeServer;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PatentNotice());
        $grid->model()->with(['patent.type','patent.case']);
        $grid->column('id', __('ID'));
        $grid->column('patent.type', __('专利信息'))->display(function($type){
            return $type['logo_url'];
        })->image()->display(function($img){
            if(!$this->patent){
                return $img;
            }
            $patent_sn = $this->patent->patent_sn;
            $patent_name = $this->patent->patent_name;
            return $img.$patent_sn.'<br/>'.$patent_name;
        });
        $grid->column('patent.patent_person', __('第一申请人'));
        $grid->column('patent.apply_date', __('申请日/专利状态'))->display(function($apply_date){
            $case_state = $this->patent->case->name??'';
            return $apply_date.'<br/>'.$case_state;
        });
        $grid->column('notice_name', __('通知书'))->display(function($notice_name){
                return $this->notice_date.$notice_name;
        });
        $grid->column('notice_date', __('我的处理'))->display(function($notice_date){
            if(Carbon::now()->lte($notice_date)){
                return '今天发文';
            }
            return '发文<span class="text-red">'.Carbon::now()->diffInDays($notice_date).'</span>天';
        });
        $grid->tools(function(Grid\Tools $tools){
            //$tools->append(new ImportPost());
        });
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
        $show = new Show(PatentNotice::findOrFail($id));
        return $show;
    }

    public function create(Content $content)
    {
        return $content
            ->title('添加专利')
            ->description('上传通知书')
            ->body($this->form());
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
//        $zipper = new Zipper();
//        $files = glob('1/GA000196188357/*');
//        $zipper->make('1/GA000196188357.zip')->add($files)->close();
//        dump($files);
//        exit;
        $form = new Form(new PatentNotice());
        $form->setTitle('请选择文件');
        $form->file('file', __('文件'))->rules('mimes:zip',['mimes'=>'请上传ZIP格式文件'])->required()
                ->help('文件格式：从CPC客户端批量导出且未经任何处理的通知书压缩包。');
        $form->saving(function(Form $form){
            $file = request()->file('file');
            $size = $file?$file->getSize():0;
            if($size > 6000000 || !$size){
                admin_toastr('上传文件过大','error');
                return back();
            }
            $user  = Member::user();
            try{
               $this->noticeServer->importNoticeFile($file,$user->id);
            }catch (\Exception $exception){
                admin_toastr('导入失败，请使用从CPC客户端批量导出且未经任何处理的通知书压缩包。','error');
                return back();
            }
            admin_toastr('导出成功','success');
            return back();
        });
        return $form;
    }
}
