@extends('layouts.app')
@section('title', '专利申请|专利代理|版权登记|技术转移|高新技术企业郑州芝麻知识产权')
@section('content')
<!--小banner-->
<div class="s_banner">
    <img src="/images/s_banner.jpg" />
</div>

<div class="container">

    <div class="bigTitle">
        <p>
            联系我们</p>
        <div class="title_line">
        </div>
    </div>
    <div class="cont-rc">

        <div id="allmap" style="width: 100%; height: 600px; margin: 20px 0px;">
        </div>
    </div>

</div>
@endsection
@section('script')
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=rsZsKDE5UFNUGcGdPwKSiZhMZfvILhyE"></script>
    <script>
// 百度地图API功能
var map = new BMap.Map("allmap");
var point = new BMap.Point("{{$configs['longitude']}}","{{$configs['latitude']}}");
var top_left_control = new BMap.ScaleControl({ anchor: BMAP_ANCHOR_TOP_LEFT }); // 左上角，添加比例尺
var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
var top_right_navigation = new BMap.NavigationControl({ anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL }); //右上角，仅包含平移和缩放按钮
map.centerAndZoom(point, 15);
map.enableScrollWheelZoom(); //
var marker = new BMap.Marker(point);  // 创建标注

var opts = {
    width: 380,     // 信息窗口宽度
    height: 100,     // 信息窗口高度
    title: "郑州芝麻知识产权 "  // 信息窗口标题
}
var infoWindow = new BMap.InfoWindow("电话：{{$configs['contact-tel']}}   <br /> 院址：{{$configs['contact-address']}}", opts);  // 创建信息窗口对象
map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口

map.addOverlay(marker);               // 将标注添加到地图中
marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

map.addControl(top_left_control);
map.addControl(top_left_navigation);
map.addControl(top_right_navigation);

$(".navBar .nav ul li").eq(6).addClass("cur");
    </script>
@endsection
