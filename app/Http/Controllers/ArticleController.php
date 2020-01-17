<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleType;
use App\Config;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $configs;
    protected $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
        $this->configs['configs'] = Config::getConfig();
    }
    //公司简介
    public function about()
    {
        return view('about',[
            'lists'=>$this->articleService->getAll(1,3,'asc')
        ])->with($this->configs);
    }
    //业务领域
    public function business()
    {
        return view('business',[
            'lists'=>$this->articleService->getAll(2,4,'asc')
        ])->with($this->configs);
    }
    //新闻中心
    public function news($type=null)
    {
        $type = $type?:3;
        $lists = $this->articleService->getPaginateNews($type,8);
        $types = ArticleType::whereIn('id',[3,4,5,6])->pluck('name','id');
        return view('news',compact('lists','types','type'))->with($this->configs);
    }
    //联系我们
    public function contact()
    {
        return view('contact',[])->with($this->configs);
    }
    public function detail($id)
    {
        $article = Article::find($id);
        if(!$article){
            return back();
        }
        $where[] = ['article_type_id',$article['article_type_id']];
        $pre_article = Article::where($where)->where('id','<',$id)->orderBy('id','desc')->first(['id','title']);
        $next_article = Article::where($where)->where('id','>',$id)->first(['id','title']);
        return view('article-detail',compact('article','pre_article','next_article'))->with($this->configs);
    }
}
