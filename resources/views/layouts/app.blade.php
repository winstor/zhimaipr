<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/css/index.css" type="text/css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    <title>郑州芝麻知识产权-@yield('title')</title><meta name="Keywords" content="专利申请,专利代理,信息检索,专利预警分析,专利无效诉讼,高价值专利培育挖掘,版权登记,高新技术企业申报,技术转移,知识产权服务"><meta name="Description" content="郑州芝麻知识产权代理事务所专注于知识产权领域，包括专利、商标、版权、科技项目申报、专利信息检索、专利预警分析、专利无效诉讼等各类知识产权服务.">
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/js/jquery.cookie.js"></script>
    @yield('style')
</head>
<body>
<header>
    <div class="top">
        <!--顶部信息条-->
        <div class="topBar">
            <div class="container">
                <div class="topBar">
                    <div class="top_left">
                        您好，jiaowb123，欢迎来到芝麻知识产权服务平台  &nbsp; |   &nbsp;<a href="/members/">个人中心</a> &nbsp;  <a href="/members/LogOut.html">退出</a>
                    </div>
                    <div class="top_right">
                        <a href="/contact/">&nbsp;企业位置 &nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/顶部信息条-->
        <!--导航栏-->
        <div class="navBar">
            <div class="container">
                <div class="logo">
                    <a href="/"><img src="/images/site-logo.png"alt="郑州芝麻知识产权"></a>
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="/">网站首页</a></li>
                        <li><a href="/about">公司简介</a></li>
                        <li><a href="/bargain">特价专利</a></li>
                        <li><a href="/supply">专利超市</a></li>
                        <li><a href="/business">业务领域</a></li>
                        <li><a href="/news">新闻中心</a></li>
                        <li><a href="/contact">联系我们</a></li>
                        <li><a href="/members">会员中心</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--导航栏-->
    </div>
</header>
@yield('content')
<!--底部-->
<footer>
    <div class="foot">
        <div class="container foot_bg">
            <div class="foot_nav">
                <a href="/">网站首页</a>
                <a href="/about">公司简介</a>
                <a href="/bargain">特价专利</a>
                <a href="/supply">专利超市</a>
                <a href="/news">新闻中心</a>
                <a href="/contact">联系我们</a>
            </div>
            <div class="xinxi">
                <p style="top: 130px; left: 130px;">{{$configs['contact-tel']??''}}</p>
                <p style="top: 130px; left: 535px;">{{$configs['contact-address']??''}} </p>
                <p style="top: 130px; right: 5px;">{{$configs['contact-email']??''}}</p>
            </div>
        </div>
    </div>
</footer>
<!--/底部-->
@yield('script')
</body>
</html>

