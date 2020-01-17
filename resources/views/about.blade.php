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
            <p>公司简介</p>
            <div class="title_line"></div>
        </div>

        <div class="select_btn" style="width: 420px;">
            @foreach($lists as $key=>$article)
            <div class="s_btn @if($key==0) btn_cur @endif" data-id="m{{$key+1}}">{{$article['title']}}</div>
            @endforeach
        </div>
        @foreach($lists as $key=>$article)
            <div class="ab_contant ab_m{{$key+1}}">
               {!! $article['content'] !!}
                @if($article['title'] == "发展历程")
                    <div id="demo">
                        <div id="indemo">
                            <div id="demo1" class="imgStyle">
                                <a href="#"><img src="/images/img/1.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/2.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/3.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/4.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/5.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/6.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/7.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/8.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/9.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/10.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/11.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/12.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/13.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/14.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/15.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/16.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/17.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/18.jpg" border="0" /></a>
                                <a href="#"><img src="/images/img/19.jpg" border="0" /></a>
                            </div>
                            <div id="demo2"></div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

@endsection
@section('script')
    <script>
        <!--
        var speed = 10;
        var tab = document.getElementById("demo");
        var tab1 = document.getElementById("demo1");
        var tab2 = document.getElementById("demo2");
        tab2.innerHTML = tab1.innerHTML;
        function Marquee() {
            if (tab2.offsetWidth - tab.scrollLeft <= 0)
                tab.scrollLeft -= tab1.offsetWidth
            else {
                tab.scrollLeft++;
            }
        }
        var MyMar = setInterval(Marquee, speed);
        tab.onmouseover = function () { clearInterval(MyMar) };
        tab.onmouseout = function () { MyMar = setInterval(Marquee, speed) };
        -->
        $(".select_btn .s_btn").mouseenter(function () {
            $(".select_btn .s_btn").removeClass("btn_cur");
            $(this).addClass("btn_cur");
            var id = $(this).attr("data-id");
            $(".ab_contant").hide();
            $(".ab_" + id).show();
        })
        $(".navBar .nav ul li").eq(1).addClass("cur");
    </script>
@endsection
@section('style')
    <style type="text/css">
        <!--
        #demo {
            background: #FFF;
            overflow:hidden;
            border: 1px dashed #CCC;
            width: 1080px;height: 160px;
        }
        #demo img {
            border: 3px solid #F2F2F2;width: 150px;height: 150px;
        }
        #indemo {
            float: left;
            width: 800%;
        }
        #demo1 {
            float: left;
        }
        #demo2 {
            float: left;
        }
        -->
    </style>
@endsection
