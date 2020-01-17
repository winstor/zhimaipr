<?php


namespace App\Services\Request;


class CurlService
{
    private $user_agent = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36';
    private $header;
    private $cookie;
    private $cookie_dir;
    public $timeout = 30;
    public $connect_timeout =10;
    public $follow_location = true;
    public $fresh_connect = true;
    public function get($url,$header=[])
    {
        $header and $this->header = $header;
        $ch = $this->curlInit($url);
        $output = curl_exec($ch);   // 执行
        curl_close($ch);        // 关闭cURL
        return $output;
    }

    public function post($url, $post)
    {

        $ch = $this->curlInit($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要执行的信息
        curl_setopt($ch, CURLOPT_POST, 1); //以POST方式提交
        $output = curl_exec($ch); //执行CURL
        curl_close($ch);
        return $output;
    }

    private function curlInit($url)
    {
        $ch = curl_init();          // 初始化
        curl_setopt($ch, CURLOPT_URL, $url);       // 设置访问网页的URL
        if($this->user_agent){
            curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        }
        if($this->header){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        }
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);         // 执行之后不直接打印出来
        curl_setopt($ch, CURLOPT_HEADER, 0);  //1 $output 代码头部有头文件
        if ($this->cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        } elseif($this->cookie_dir){
            // 把COOKIE保存至cookie.txt
            curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_dir);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_dir);
        }
        //多线程调取，暂不知其意
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->follow_location);//true
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, $this->fresh_connect);//true;
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connect_timeout);//10
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);//30
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
}