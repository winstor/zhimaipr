<?php


namespace App\Services\Gathers;
use QL\QueryList;
use App\Services\Gathers\Curl;

class GatherDetail
{
    public $curl;
    public $header = array(
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3",
        "Accept-Language: zh-CN,zh;q=0.9,en;q=0.8",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Host: cpquery.sipo.gov.cn",
        "Pragma: no-cache",
        "Upgrade-Insecure-Requests: 1",
        "Content-Type: text/html;charset=UTF-8",
    );
    public $userAgent = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36';
    public $cookie;
    public $htmlData;
    public function __construct(\App\Services\Gathers\Curl $curl)
    {
        $this->curl = $curl;
    }
    //获取文件的cookie
    private function getFileCookie($t = null)
    {
        $file_path = storage_path('app/gathers/cookie.txt');
        if (file_exists($file_path)) {
            $str = file_get_contents($file_path);//将整个文件内容读入到一个字符串中
            $str = str_replace("\r\n", "<br />", $str);
            return $str;
        }else{
            file_put_contents(storage_path($file_path),'');
        }
        if (!$t) return null;
        return '';
    }
    public function get()
    {
        return $this->curl->get('http://cpquery.sipo.gov.cn/',[
            'header'=>$this->header,
            'cookie'=>$this->getFileCookie(),
            'user_agent'=>$this->userAgent
        ]);
    }
}