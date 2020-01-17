@extends('layouts.app')
@section('title', '专利申请|专利代理|版权登记|技术转移|高新技术企业郑州芝麻知识产权')
@section('content')
    <!--小banner-->
    <div class="s_banner">
        <img src="/images/s_banner.jpg" />
    </div>
    <!--/小banner-->
    <div class="container">
        <div class="main zr_art">

            <div class="zr_art_t">
                <h1>{{$article['title']}}</h1>
            </div>
            <div class="zr_art_d">
                发布时间：{{date('Y-m-d',strtotime($article['updated_at']))}}
            </div>
            <div class="zr_art_c">
                {!! $article['content'] !!}
            <div class="main">
                <div class="zr_prev">
                    上一篇：@if(!empty($pre_article))<a href='{{route('article.show',[$pre_article['id']])}}'>{{$pre_article['title']}}</a>@else没有了@endif</div>
                <div class="zr_next">
                    下一篇：@if(!empty($next_article))<a href='{{route('article.show',[$next_article['id']])}}'>{{$next_article['title']}}</a>@else没有了@endif</div>
            </div>

        </div>
    </div>
@endsection