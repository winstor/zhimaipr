<?php


namespace App\Services;


use App\Services\Gathers\GatherDetail;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class GatherService
{
    public $gatherDetail;
    public $base_url = '';
    public function __construct(GatherDetail $gatherDetail)
    {
        $this->gatherDetail = $gatherDetail;
    }

    public function detail()
    {
        try{
            $cookie = $this->getFileCookie();
            $cookieJar = CookieJar::fromArray($cookie,'www.elephant-mall.cn');
            $client = new Client(['cookies' => $cookieJar]);
            $r = $client->get('http://www.elephant-mall.cn/user.php');
            dump($r->getHeader());exit;
            return $r->getBody();
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
        return $this->gatherDetail->get();
    }
    //
    public function getFileCookie()
    {
        $path = storage_path('app/gathers/cookie.txt');
        $content = file_get_contents($path);
        $arr = explode(';',$content);
        $cookie = [];
        foreach($arr as $item){
            list($key,$value) =  explode('=',trim($item));
            $cookie[$key] = $value;
        }
        return $cookie;
    }
}