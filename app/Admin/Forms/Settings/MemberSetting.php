<?php


namespace App\Admin\Forms\Settings;

use App\Config;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\Form;

class MemberSetting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '会员设置';
    /**
     * 配置类型
     * @var string
     */
    public $type ='member';

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
        $this->number('import-number','专利导入数量/次')->default(10)
            ->rules('required')->help('会员每次可导入专利数量');
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
