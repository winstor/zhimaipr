@extends('layouts.app')
@section('title', '专利申请|专利代理|版权登记|技术转移|高新技术企业郑州芝麻知识产权')
@section('content')
    <div class="s_banner">
        <img src="/images/s_banner.jpg" />
    </div>
    <div class="container">
        <a href="" name="tip"></a>
        <div class="product">
            <div class="pro_sort">
                <div class="sort_title">
                    <p>
                        热门领域：</p>
                    <p style="line-height: 17px;">
                        &nbsp;</p>
                    <p>
                        专利状态：</p>
                    <p>
                        交易状态：</p>
                </div>
                <div class="sort_name">
                    <p>
                        <a  class="@if(empty($filter['domain'])) cur @endif" href="/supply/0-{{$filter['cert']??0}}-{{$filter['saleState']??0}}.html">不限</a>
                        @foreach($domains as $domain_id=>$domain_name)
                            @if(isset($filter['domain']) && $filter['domain'] == $domain_id)
                                <a  class="cur"  class="">{{$domain_name}}</a>
                            @else
                                <a href="/supply/{{$domain_id}}-{{$filter['cert']??0}}-{{$filter['saleState']??0}}.html"  class="">{{$domain_name}}</a>
                            @endif

                        @endforeach
                    </p>
                    <p>
                        <a class="@if(empty($filter['cert'])) cur @endif" href="/supply/{{$filter['domain']??0}}-0-{{$filter['saleState']??0}}.html">不限 </a>
                        @foreach($certs as $cert_id=>$cert_name)
                            @if(isset($filter['cert']) && $filter['cert'] == $cert_id)
                                <a  class="cur"  class="">{{$cert_name}}</a>
                            @else
                                <a href="/supply/{{$filter['domain']??0}}-{{$cert_id}}-{{$filter['saleState']??0}}.html">{{$cert_name}}</a>
                            @endif
                        @endforeach
                    </p>
                    <p>
                        <a class="@if(empty($filter['saleState'])) cur @endif" href="/supply/{{$filter['domain']??0}}-{{$filter['cert']??0}}-0.html">不限 </a>
                        @foreach($saleStates as $sale_id=>$sale_name)
                            @if(isset($filter['saleState']) && $filter['saleState'] == $sale_id)
                                <a  class="cur">{{$sale_name}}</a>
                            @else
                                <a href="/supply/{{$filter['domain']??0}}-{{$filter['cert']??0}}-{{$sale_id}}.html">{{$sale_name}}</a>
                            @endif
                        @endforeach
                    </p>
                    <div class="search1">
                        <input id="sup_inp" class="input_text" type="text" placeholder="请输入专利名称" />
                        <input id="sup_sub" class="input_btn" type="submit" value="搜 索" name="submit" />
                    </div>
                </div>

            </div>
            <!--专利列表-->
            <div class="pro_list">
                <div class="list_left">
                    <a href="/supply/?nsort=1#tip"><span>综合排序</span></a><a href="/supply/?nsort=3#tip">发布时间↑</a><a href="/supply/?nsort=5#tip">价格排序↓</a>

                </div>
                <div class="list_right">
                    <div class="c_a_u_c3">
                        共有18条，每页显示：16条 &nbsp;&nbsp;&nbsp;
                        <span class="disabled">上一页</span><span class="current">1</span><a href="/supply/0-0-0-1.html">2</a><a href="/supply/0-0-0-1.html">下一页</a>
                    </div>
                </div>
            </div>
            <div class="pro_item">
                <dl>
                    <dt class="i1">序号</dt>
                    <dt class="i2">专利号/申请号</dt>
                    <dt class="i3">专利名称</dt>
                    <dt class="i4">专利状态</dt>
                    <dt class="i5">发布日</dt>
                    <dt class="i6">价格</dt>
                    <dt class="i7">说明</dt>
                    <dt class="i8">交易状态</dt>
                    <dt class="i9">操作</dt>
                </dl>

                <ul>
                    <li class="i1">
                        319</li>
                    <li class="i2">
                        <a href="/supply-319.html"><em class="e1">发明</em>2018113820562</a></li>
                    <li class="i3">
                        <a href="/supply-319.html">一种用于图书馆书籍书面外壳防旧抛光装置</a></li>
                    <li class="i4">已下证</li>
                    <li class="i5">2019-12-19</li>
                    <li class="i6">¥0.0</li>
                    <li class="i7">本发明公开了一种用于图书馆书籍书面外壳防旧抛光装置，涉及书籍加工领域，包括工作台，工作台的底端固定连接支撑腿，工作台的顶端固定连接支撑板，支撑板的顶端固定连接顶板，顶板的顶端固定设有两个进料台，两个进料台之间设有进料口，顶板的底端固定连接两个夹板，两个夹板之间为打磨通道，两个支撑板上分别固定连接第一驱动电机和第二驱动电机，第一驱动电机的输出轴固定连接第一转动杆，第一转动杆固定连接第一转动板，本发明通过设置第一驱动电机、第二驱动电机来带动第一抛光海绵、第二抛光海绵以及第三抛光海绵转动，从而实现对书籍外壳的三个面进行抛光打磨，打磨全面，打磨效果好，且能够实现书籍打磨后的自动排放，操作简单便捷。</li>
                    <li class="i8">待交易</li>
                    <li class="i9"><a href="javascript:;" class="ydsub" data-id="319">预定</a></li>
                </ul>

            </div>
            <!--/专利列表-->

            <div class="c_a_u_c3">
                共有18条，每页显示：16条 &nbsp;&nbsp;&nbsp;
                <span class="disabled">上一页</span><span class="current">1</span><a href="/supply/0-0-0-1.html">2</a><a href="/supply/0-0-0-1.html">下一页</a>
            </div>

        </div>

    </div>
    <script>
        $("a.ydsub").click(function () {
            var id = $.cookie("UserId");
            if (id > 0) {
                $.post("ydsub.ashx?" + Math.random(),
                    {
                        id: $(this).attr("data-id")
                    },
                    function (data, status) {
                        alert(data); history.go(0);
                    });

            }
            else { location = "/login"; }
        })


        $("#sup_sub").click(function () {

            var inp = $("#sup_inp").val();
            if (inp.length > 0) {
                location = "/supply/?val=" + base64encode(utf16to8(inp)); ;
            }
            else { alert("请输入要搜索的关键词"); }

        })

        $(".navBar .nav ul li").eq(3).addClass("cur");
    </script>
@endsection

