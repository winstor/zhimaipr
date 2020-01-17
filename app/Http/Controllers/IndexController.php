<?php

namespace App\Http\Controllers;

use App\Config;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $configs;
    protected $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
        $this->configs['configs'] = Config::getConfig();
    }

    //首页
    public function index()
    {
        $news = $this->articleService->getLists([3,4,5,6],3,['id','logo','title','content','updated_at'],80);
        return view('index',compact('news'))->with($this->configs);
    }

    //特价超市
    public function bargain()
    {
        return view('bargain',[])->with($this->configs);
    }
    //专利超市
    public function supply()
    {
        return view('supply',[])->with($this->configs);
    }


}
