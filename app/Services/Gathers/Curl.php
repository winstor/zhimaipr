<?php


namespace App\Services\Gathers;


class Curl
{
    private $user_agent = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36';
    private $header;
    private $cookie;
    private $cookie_dir;
    public function setConfig($header)
    {
        if($header){
            foreach($header as $key=>$value){
                $this->$key = $value;
            }
        }
    }
    public function get($url,$header=[])
    {
        $header and $this->setConfig($header);
        $ch = curl_init();          // 初始化
        curl_setopt($ch, CURLOPT_URL, $url);       // 设置访问网页的URL
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        if($this->cookie){
            curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);         // 执行之后不直接打印出来
        curl_setopt($ch, CURLOPT_HEADER, 0);  //1 $output 代码头部有头文件
        // 把COOKIE保存至cookie.txt
        if($this->cookie_dir){
            curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_dir);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_dir);
        }
        $output = curl_exec($ch);   // 执行
        curl_close($ch);        // 关闭cURL
        return $output;
    }

    public function post($url, $post)
    {
        $ch = curl_init(); //初始化curl模块
        curl_setopt($ch, CURLOPT_URL, $url); //登录提交的地址
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        if($this->cookie){
            curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        }
        curl_setopt($ch, CURLOPT_HEADER, 0); //是否显示头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0); //是否自动显示返回的信息
        curl_setopt($ch, CURLOPT_POST, 1); //以POST方式提交
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要执行的信息
        // 把COOKIE保存至cookie.txt
        if($this->cookie_dir){
            curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        $output = curl_exec($ch); //执行CURL
        curl_close($ch);
        return $output;

    }

    private function curlInit($url, $cookie = null)
    {
        $ch = curl_init();          // 初始化
        curl_setopt($ch, CURLOPT_URL, $url);       // 设置访问网页的URL
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);         // 执行之后不直接打印出来
        curl_setopt($ch, CURLOPT_HEADER, 0);  //1 $output 代码头部有头文件
        if ($cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        } else {
            // 把COOKIE保存至cookie.txt
            curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
        }
        //多线程调取，暂不知其意
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        return $ch;
    }


    public function getContent($url)
    {
        $this->setHeader();
        $cookie = $this->getCookie();
        $ch = $this->curlInit($url, $cookie);
        $output = curl_exec($ch); //执行CURL
        curl_close($ch);
        return $output;
    }

    public function getMultipleDocuments($nodes)
    {
        //set_time_limit(90);
        $node_count = count($nodes);
        $curl_arr = array();
        $master = curl_multi_init();
        $cookie = $this->getCookie();
        for ($i = 0; $i < $node_count; $i++) {
            $curl_arr[$i] = $this->curlInit($nodes[$i], $cookie);
            curl_multi_add_handle($master, $curl_arr[$i]);
        }
        $previousActive = -1;
        $finalresult = array();
        $returnedOrder = array();
        $num = 0;
        $j =0 ;
        $stime=microtime(true);
        do {
            $mrc = curl_multi_exec($master, $running);
            $num++;
            if ($running !== CURLM_CALL_MULTI_PERFORM) {
                $info = curl_multi_info_read($master);
                if ($info['handle']) {
                    $j++;
                    $finalresult[] = $tt = curl_multi_getcontent($info['handle']);
                    $returnedOrder[] = array_search($info['handle'], $curl_arr, true);
                    curl_multi_remove_handle($master, $info['handle']);
                    curl_close($curl_arr[end($returnedOrder)]);
                    //$error_msg =  'downloaded ' . $nodes[end($returnedOrder)] . '. We can process it further straight away, but for this example, we will not.'."\t\n\n\t";
                    ob_flush();
                    flush();
                }
            }
            $previousActive = $running;
        } while ($running > 0);
        curl_multi_close($master);
        $etime=microtime(true);//获取程序执行结束的时间
        $total=$etime-$stime;   //计算差值
        file_put_contents('3333333333333333333333222.txt',$num.'-------'.$j.'---'."<br />当前页面执行时间为：{$total} 秒");
        set_time_limit(30);
        return array_combine($returnedOrder, $finalresult);
    }

    public function getDetailUrls($data)
    {
        $data = is_string($data) ? array($data) : $data;
        $nodes = [];
        foreach ($data as $shenqingh) {
            $nodes[] = $this->getDetailUrl($shenqingh);
        }
        return $nodes;
    }

    public function getListUrls($data)
    {

    }

    private function setHeader1($type = 0)
    {
        $this->header = array(
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3",
            "Accept-Language: zh-CN,zh;q=0.9,en;q=0.8",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Host: cpquery.sipo.gov.cn",
            "Pragma: no-cache",
            "Upgrade-Insecure-Requests: 1",
            "Content-Type: text/html;charset=UTF-8",
        );
    }

    public function getDetailUrl($shenqingh)
    {
        return 'http://cpquery.sipo.gov.cn/txnQueryBibliographicData.do?select-key:shenqingh=' . $shenqingh . '&select-key:backPage=http%3A%2F%2Fcpquery.sipo.gov.cn%2FtxnQueryOrdinaryPatents.do%3Fselect-key%3Asortcol%3D%26select-key%3Asort%3D%26select-key%3Ashenqingh%3D%26select-key%3Azhuanlimc%3D%26select-key%3Ashenqingrxm%3D%26select-key%3Azhuanlilx%3D%26select-key%3Ashenqingr_from%3D%26select-key%3Ashenqingr_to%3D%26select-key%3Adailirxm%3D%26verycode%3D2%26inner-flag%3Aopen-type%3Dwindow%26inner-flag%3Aflowno%3D1577522741513&token=79140279773B445191D3460AB60B1798&inner-flag:open-type=window&inner-flag:flowno=1577522779563';
    }
    public function getListUrl()
    {
        return '';
    }

    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }
    public function setCookieDir($dir)
    {
        $this->cookie_dir = $dir;
        return $this;
    }
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }
    public function setUserAgent($userAgent)
    {
        $this->user_agent = $userAgent;
        return $this;
    }

}