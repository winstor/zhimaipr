<?php


namespace App\Admin\Forms\Settings;

use App\Config;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\Form;

class Site extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '基本设置';
    /**
     * 配置类型
     * @var string
     */
    public $type ='site';

    /**
     * 提交处理数据
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request)
    {
        Config::createOrUpdate(collect($request->all()),$this->type);
        admin_toastr('设置成功','success');
        return back();
    }

    /**
     *表单
     */
    public function form()
    {
        $this->text('site-title','名称')->rules('required');
        $this->text('site-keywords','关键字')->rules('required');
        $this->text('site-description','描述')->rules('required');
        $this->image('site-logo','logo');
        $this->text('site-copyright','底部版权信息');
        $this->text('site-icp','备案号');
        //$this->textarea('site-statistics','统计代码');
        $this->setData();
        $this->disableReset();
    }

    /**
     *写入已有数据
     */
    protected function setData()
    {
        if(request()->getMethod() == 'GET'){
            $this->data =Config::getConfig($this->type)->toArray();
        }
    }
}