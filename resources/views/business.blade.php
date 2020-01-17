@extends('layouts.app')
@section('title', '专利申请|专利代理|版权登记|技术转移|高新技术企业郑州芝麻知识产权')
@section('content')

<!--小banner-->
<div class="s_banner">
    <img src="/images/s_banner.jpg" />
</div>
<!--/小banner-->
<div class="container">
    <div class="bigTitle">
        <p>
            业务领域</p>
        <div class="title_line">
        </div>
    </div>
    <div class="select_btn" style="width:560px;">
        @foreach($lists as $key=>$article)
        <div class="s_btn @if(!$key) btn_cur @endif" data-id="m{{$key}}">{{$article['title']}}</div>
        @endforeach
    </div>
    @foreach($lists as $key=>$article)
    <div class="ab_contant ab_m{{$key}}">
{!! $article['content'] !!}
    </div>
    @endforeach
</div>
@endsection
@section('script')
    <script>
        $(".select_btn .s_btn").mouseenter(function () {
            $(".select_btn .s_btn").removeClass("btn_cur");
            $(this).addClass("btn_cur");
            var id = $(this).attr("data-id");
            $(".ab_contant").hide();
            $(".ab_" + id).show();
        })
        $(".navBar .nav ul li").eq(4).addClass("cur");
    </script>
@endsection