@extends('layouts.app')
@section('title', '专利申请|专利代理|版权登记|技术转移|高新技术企业郑州芝麻知识产权')
@section('content')
    <div class="banner">
        <ul></ul>
        <ol></ol>
        <i class="left"></i><i class="right"></i>
    </div>
    <!--焦点图-->
    <div class="container">
        <div class="banner_cover">
            <div class="search">
                <input id="txtsoso" class="input_text" type="text" width="470px" height="60px" />
                <input id="subsoso" class="input_btn" type="submit" value="专利搜索" name="submit" />
            </div>
            <div class="s_btn">
                <div class="s_btn1">
                    <a href="/members/monitors">年费监控</a></div>
                <div class="s_btn1">
                    <a href="/supply">我要求购</a></div>
                <div class="s_btn1">
                    <a href="#">我要出售</a></div>
            </div>
        </div>
    </div>
    <!--服务内容-->
    <div class="container">
        <div class="service">
            <div class="sv_text" style="top: 232px; left: 120px;">
                <p>
                    <span>专利代理</span></p>
                <p>发明专利、实用新型专利、外观设计专利</p>
            </div>
            <div class="sv_text" style="top: 232px; right: 26px;">
                <p>
                    <span>版权代理</span></p>
                <p>软件著作权登记、美术作品登记、影视作品登记等</p>
            </div>
            <div class="sv_text" style="top: 410px; left: 120px;">
                <p>
                    <span>信息检索</span></p>
                <p>检索分析、预警分析、评价报告、科技成果评价等</p>
            </div>
            <div class="sv_text" style="top: 410px; right: 26px;">
                <p>
                    <span>科技项目申报</span></p>
                <p>高新技术企业认定、科技型中小企业、研发费用后补助等</p>
            </div>
        </div>
    </div>
    <!--/服务内容-->
    <!--热门专利-->
    <div class="container">
        <div class="patent">
            <div class="pt_title">
            </div>
            <div class="pt_btn">
                <span class="select_btn1 se">特价专利</span> <span class="select_btn1">优质专利</span>
            </div>
            <div class="pt_box">

                <div class="box">
                    <div class="box_text">
                        <h3>一种物理光学试验装置</h3>
                        <p><span>专利号</span>：201821923489X</p>
                        <p><span>状态</span>：已下证</p>
                        <p><span>转让价格</span>：¥500</p>
                    </div>
                    <div class="box_more" >
                        <a href="/supply-53.html" >查看详情</a>
                    </div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>冷链物流保温箱</h3>
                        <p><span>专利号</span>：2018101426743</p>
                        <p><span>状态</span>：已下证</p>
                        <p><span>转让价格</span>：¥20000</p>
                    </div>
                    <div class="box_more" >
                        <a href="/supply-49.html" >查看详情</a>
                    </div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>大数据模拟样品观察展示系统</h3>
                        <p><span>专利号</span>：2018101430683</p>
                        <p><span>状态</span>：已下证</p>
                        <p><span>转让价格</span>：¥20000</p>
                    </div>
                    <div class="box_more" >
                        <a href="/supply-48.html" >查看详情</a>
                    </div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>一种用于控制降雨大厅面降雨强度的逻辑电路</h3>
                        <p><span>专利号</span>：2016102312740 </p>
                        <p><span>状态</span>：已下证</p>
                        <p><span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more" >
                        <a href="/supply-47.html" >查看详情</a>
                    </div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>一种机电设备减震装置</h3>
                        <p><span>专利号</span>：2017101116297</p>
                        <p><span>状态</span>：已下证</p>
                        <p><span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more" >
                        <a href="/supply-42.html" >查看详情</a>
                    </div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>一种超级电容器</h3>
                        <p><span>专利号</span>：201810202706.4</p>
                        <p><span>状态</span>：已下证</p>
                        <p><span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more" >
                        <a href="/supply-41.html" >查看详情</a>
                    </div>
                </div>

            </div>
            <div class="pt_box hide">

                <div class="box">
                    <div class="box_text">
                        <h3>
                            大数据模拟样品观察展示系统</h3>
                        <p>
                            <span>专利号</span>：2018101430683</p>
                        <p>
                            <span>状态</span>：已下证</p>
                        <p>
                            <span>转让价格</span>：¥20000</p>
                    </div>
                    <div class="box_more">
                        <a href="/supply-48.html">查看详情</a></div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>
                            一种用于控制降雨大厅面降雨强度的逻辑电路</h3>
                        <p>
                            <span>专利号</span>：2016102312740 </p>
                        <p>
                            <span>状态</span>：已下证</p>
                        <p>
                            <span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more">
                        <a href="/supply-47.html">查看详情</a></div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>
                            一种机电设备减震装置</h3>
                        <p>
                            <span>专利号</span>：2017101116297</p>
                        <p>
                            <span>状态</span>：已下证</p>
                        <p>
                            <span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more">
                        <a href="/supply-42.html">查看详情</a></div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>
                            一种超级电容器</h3>
                        <p>
                            <span>专利号</span>：201810202706.4</p>
                        <p>
                            <span>状态</span>：已下证</p>
                        <p>
                            <span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more">
                        <a href="/supply-41.html">查看详情</a></div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>
                            超级电容器</h3>
                        <p>
                            <span>专利号</span>：201810202685.6</p>
                        <p>
                            <span>状态</span>：已下证</p>
                        <p>
                            <span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more">
                        <a href="/supply-40.html">查看详情</a></div>
                </div>

                <div class="box">
                    <div class="box_text">
                        <h3>
                            一种机电一体化的防爆装置</h3>
                        <p>
                            <span>专利号</span>：2017101116314</p>
                        <p>
                            <span>状态</span>：已下证</p>
                        <p>
                            <span>转让价格</span>：¥15000</p>
                    </div>
                    <div class="box_more">
                        <a href="/supply-38.html">查看详情</a></div>
                </div>

            </div>
        </div>
    </div>

    <!--/热门专利-->
    <!--关于我们-->
    <div class="about">
        <div class="container">
            <div class="about_text">
                <a href="">
                    <p>
                        <span>郑州芝麻知识产权</span></p>
                    <p>
                        郑州芝麻知识产权代理事务所(普通合伙)是一家经国务院专利行政部门批准设立的综合性知识产权代理服务机构，机构代码：41173。
                        业务范围涵盖国内外专利申请、技术合同登记服务、产学研、专利检索/预警分析、专利无效诉讼等......</p>
                </a>
            </div>
        </div>
    </div>
    <!--/关于我们-->
    <!--宣传栏-->
    <div class="adv_bar">
    </div>
    <!--/宣传栏-->
    <!--新闻资讯-->
    <div class="news">
        <div class="container">
            <div class="news_title"></div>
            @foreach($news as $new)
            <div class="news_box">
                <div class="news_img">
                    <a href="{{route('article.show',[$new['id']])}}" target="_blank">
                        <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($new['logo'])}}" /></a>
                </div>
                <div class="news_text">
                            <span><a href="{{route('article.show',[$new['id']])}}" target="_blank">
                                {{$new['title']}}</a></span>
                    <p>
                        <img src="images/news_time.jpg" />&nbsp;&nbsp;{{date('Y-m-d',strtotime($new['updated_at']))}}</p>
                    <p>{{$new['content']}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#subsoso").click(function () {

            var inp = $("#txtsoso").val();
            if (inp.length > 0) {
                location = "/supply/?val=" + base64encode(utf16to8(inp)); ;
            }
            else { alert("请输入要搜索的关键词"); }
        })
        $(".patent .pt_btn span").mouseenter(function () {
            var id = $(this).index();
            $(".patent .pt_btn span").removeClass("se");
            $(this).addClass("se");
            $(".patent .pt_box").addClass("hide");
            $(".patent .pt_box").eq(id).removeClass("hide");
        })

        $(function () { //页面加载完毕才执行

            //=========设置参数==========
            //图片统一高度：
            var images_height = '600px';
            //图片路径/链接(数组形式):
            var images_url = [
                '/images/1.jpg',
                '/images/2.jpg',
                '/images/3.jpg'
            ];
            var images_count = images_url.length;

            //创建节点
            //图片列表节点
            for (var j = 0; j < images_count + 1; j++) {
                $('.banner ul').append('<li></li>')
            }
            //轮播圆点按钮节点
            for (var j = 0; j < images_count; j++) {
                if (j == 0) {
                    $('.banner ol').append('<li class="current"></li>')
                } else {
                    $('.banner ol').append('<li></li>')
                }
            }

            //载入图片
            $('.banner ul li').css('background-image', 'url(' + images_url[0] + ')');
            $.each(images_url, function (key, value) {
                $('.banner ul li').eq(key).css('background-image', 'url(' + value + ')');
            });

            $('.banner').css('height', images_height);

            $('.banner ul').css('width', (images_count + 1) * 100 + '%');

            $('.banner ol').css('width', images_count * 20 + 'px');
            $('.banner ol').css('margin-left', -images_count * 20 * 0.5 - 10 + 'px');

            //=========================

            var num = 0;
            //获取窗口宽度
            var window_width = $(window).width();
            $(window).resize(function () {
                window_width = $(window).width();
                $('.banner ul li').css({ width: window_width });
                clearInterval(timer);
                nextPlay();
                timer = setInterval(nextPlay, 4000);
            });
            //console.log(window_width);
            $('.banner ul li').width(window_width);
            //轮播圆点
            $('.banner ol li').mouseover(function () {//用hover的话会有两个事件(鼠标进入和离开)
                $(this).addClass('current').siblings().removeClass('current');
                //第一张图： 0 * window_width
                //第二张图： 1 * window_width
                //第三张图： 2 * window_width
                //获取当前编号
                var i = $(this).index();
                //console.log(i);
                $('.banner ul').stop().animate({ left: -i * window_width }, 500);
                num = i;
            });
            //自动播放
            var timer = null;
            function prevPlay() {
                num--;
                if (num < 0) {
                    //悄悄把图片跳到最后一张图(复制页,与第一张图相同),然后做出图片播放动画，left参数是定位而不是移动的长度
                    $('.banner ul').css({ left: -window_width * images_count }).stop().animate({ left: -window_width * (images_count - 1) }, 500);
                    num = images_count - 1;
                } else {
                    //console.log(num);
                    $('.banner ul').stop().animate({ left: -num * window_width }, 500);
                }
                if (num == images_count - 1) {
                    $('.banner ol li').eq(images_count - 1).addClass('current').siblings().removeClass('current');
                } else {
                    $('.banner ol li').eq(num).addClass('current').siblings().removeClass('current');
                }
            }
            function nextPlay() {
                num++;
                if (num > images_count) {
                    //播放到最后一张(复制页)后,悄悄地把图片跳到第一张,因为和第一张相同,所以难以发觉,
                    $('.banner ul').css({ left: 0 }).stop().animate({ left: -window_width }, 500);
                    //css({left:0})是直接悄悄改变位置，animate({left:-window_width},500)是做出移动动画
                    //随后要把指针指向第二张图片,表示已经播放至第二张了。
                    num = 1;
                } else {
                    //在最后面加入一张和第一张相同的图片，如果播放到最后一张，继续往下播，悄悄回到第一张(肉眼看不见)，从第一张播放到第二张
                    //console.log(num);
                    $('.banner ul').stop().animate({ left: -num * window_width }, 500);
                }
                if (num == images_count) {
                    $('.banner ol li').eq(0).addClass('current').siblings().removeClass('current');
                } else {
                    $('.banner ol li').eq(num).addClass('current').siblings().removeClass('current');
                }
            }
            timer = setInterval(nextPlay, 4000);
            //鼠标经过banner，停止定时器,离开则继续播放
            $('.banner').mouseenter(function () {
                clearInterval(timer);
                //左右箭头显示(淡入)
                $('.banner i').fadeIn();
            }).mouseleave(function () {
                timer = setInterval(nextPlay, 4000);
                //左右箭头隐藏(淡出)
                $('.banner i').fadeOut();
            });
            //播放下一张
            $('.banner .right').click(function () {
                nextPlay();
            });
            //返回上一张
            $('.banner .left').click(function () {
                prevPlay();
            });
        });
        $(".navBar .nav ul li").eq(0).addClass("cur");
    </script>
@endsection

