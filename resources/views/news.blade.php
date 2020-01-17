@extends('layouts.app')
@section('title', '专利申请|专利代理|版权登记|技术转移|高新技术企业郑州芝麻知识产权')
@section('content')
    <!--小banner-->
    <div class="s_banner">
        <img src="/images/s_banner.jpg" />
    </div>
    <!--/小banner-->
    <!--公司新闻-->
    <div class="container">
        <div class="bigTitle">
            <p>新闻中心</p>
            <div class="title_line"></div>
        </div>
        <div class="select_btn" style="width: 560px;">
            @foreach($types as $key=>$name)
                <div class="s_btn @if($key == $type) btn_cur @endif">
                    <a href="{{route('news',['type'=>$key])}}">{{$name}}</a>
                </div>
            @endforeach

        </div>
        @foreach($lists as $key=>$list)
        <div class="news_contant">
            <div class="news_img">
                <a href="{{route('article.show',[$list['id']])}}">
                    <img src="{{url()->asset($list['logo'])}}" /></a>
            </div>
            <div class="news_text">
                <p>
                    <span>
                      <a href="{{route('article.show',[$list['id']])}}" style="">{{$list['title']}}</a>
                    </span>
                </p>
                <hr/>
                <p>{!! $list['content'] !!}</p>
                <p>{{date('Y-m-d',strtotime($list['updated_at']))}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <!--/公司新闻-->
    <!--分页-->
    <style type="text/css">
        #pull_right{
            text-align:center;
        }
        .pull-right {
            /*float: left!important;*/
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }

        .total {
            margin: 20px 0;
            border-radius: 4px;
            display: inline;
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            text-decoration: none;
            background-color: #fff;
        }

        .clear{
            clear: both;
        }
    </style>
    <div class="container">
        <div style="float: right">
            <span class="total">共有{{$lists->total()}}条，每页显示：{{$lists->perPage()}}条 &nbsp;&nbsp;&nbsp;</span>
            {!! $lists->render() !!}
        </div>


    </div>
    <!--/分页-->
@endsection