<?php


namespace App\Admin\Forms\Settings;

use App\Config;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\Form;
use Illuminate\Support\Facades\Storage;

class Email extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '邮件设置';
    public $type ='email';
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

    public function form()
    {
        $this->text('email-name','邮箱账户');
        $this->text('email-password','邮箱密码');
        $this->text('email-server','SMTP服务器');
        $this->text('email-port','SMTP端口');
        $this->disableReset();
        if(request()->getMethod() == 'GET'){
            $this->setData();
        }
    }
    protected function setData()
    {
        $this->data =Config::getConfig($this->type)->toArray();
    }
}