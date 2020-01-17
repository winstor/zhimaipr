<?php


namespace App\Services;


use App\Article;

class ArticleService
{
    public function getAll($type_id,$number=0,$order='desc')
    {
        $type_id = is_array($type_id)?$type_id:[$type_id];
        if($number){
            return Article::whereIn('article_type_id',$type_id)->take($number)->orderBy('id',$order)->get();
        }
        return Article::whereIn('article_type_id',$type_id)->orderBy('id',$order)->get();
    }
    public function getLists($type_id,$number,$column=['*'],$content_number=50)
    {
        $type_id = is_array($type_id)?$type_id:[$type_id];
        $lists =  Article::whereIn('article_type_id',$type_id)->take($number)->orderBy('id','DESC')->get($column);
        if(isset($lists[0]['content']) && $content_number>0){
            foreach($lists as $key=>$list){
                $list['content'] = str_limit(strip_tags($list['content']),$content_number,'...');
                $lists[$key] = $list;
            }
        }
        return $lists;
    }

    public function getArticleLimit($article_type_id,$limit,$order='DESC')
    {
        return Article::where('article_type_id',$article_type_id)->take($limit)->orderBy('id',$order)->get();
    }
    public function getIndexnews($number=3,$str_limit=50)
    {
        $lists =  Article::whereIn('article_type_id',[3,4,5,6])->take($number)->orderBy('id','DESC')->get(['id','logo','title','content','updated_at']);
        foreach($lists as $key=>$list){
            $list['content'] = str_limit(strip_tags($list['content']),$str_limit,'...');
            $lists[$key] = $list;
        }
        return $lists;
    }
    public function getPaginateNews($type,$number)
    {
        $lists =  Article::select(['id','logo','title','content','updated_at'])->where('article_type_id',$type)->orderBy('id','DESC')->paginate($number);
        foreach($lists as $key=>$list){
            $list['content'] = str_limit(strip_tags($list['content']),170,'...');
            $lists[$key] = $list;
        }
        return $lists;
    }

}