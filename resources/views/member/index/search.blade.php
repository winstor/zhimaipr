<style>
    ul li {
        list-style:none;
    }
    h1,h2,h3{
        margin-top:0px;
        margin-bottom:0px;
    }
    ul, li, dl, dt, dd, img, input, h3, h4 {
        margin: 0;
        padding: 0;
    }
    .d-sousuo {background: linear-gradient(to right, #638AD2 , #C27FF5); height:80px; padding:16px 20px;box-shadow:0px 5px 8px 0px rgba(56,73,199,0.44);}
    .d-inputs { width:100%; padding:0 24px; height:44px; line-height:44px; border:none;border-radius:4px 0 0 4px !important;}
    .d-sou {width:100%; text-align:center;height:44px; line-height:44px; background:#E7505A; color:#FFFFFF; display:inline-block;border-radius:0 4px 4px 0 !important;}
    .d-sou1 {background:#145DE4;}
    .d-sou:hover {color:#FFFFFF;}
    .d-sour {color:#FFFFFF;display:inline-block;padding-top:25px;}
    .d-sour:hover {color:#f9fe69;text-decoration:underline;}

    .d-mimi {padding-top:24px;}
    .d-mimi li {cursor: pointer; height:63px; padding-top:10px;background:url("../images/d-tuo1.png") no-repeat 10px 13px; padding-left:35px;}
    .d-mimi li span {text-align:left;display:block;}
    .d-mimi li b {text-align:left;display:block;font-size:20px;}
    .d-mimi li.d-li1 {background-image:url("../images/d-tuo1.png");}
    .d-mimi li.d-li2 {background-image:url("../images/d-tuo2.png");}
    .d-mimi li.d-li3 {background-image:url("../images/d-tuo3.png");}
    .d-mimi li:hover {background-color:#FAE9E6; color:#E7505A;}

    .d-row {padding-bottom:35px;}
    .d-row li {text-align:center;padding:0 5px;}
    .d-row li:hover a{
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .d-row li a {-webkit-transition: all 0.2s;
        transition: all 0.2s;
        border-radius: 5px;
        position: relative;border:solid 1px #DDDDDD;padding:22px 0 17px 0;display:block;box-shadow:0px 3px 8px 1px rgba(70,70,70,0.16);border-radius:4px !important;}
    .d-row li a span {display:block;padding-top:20px; font-size:14px; color:#333333;}

    .d-file{margin-top:8px; position:relative;}
    .d-filett {position:;}
    .d-file .file-list{background:#ffffff;margin-bottom:1px;width:100%;height:132px;}
    .file-list .img-box{width:150px;height:132px;}

    .file-box-left{float:left;height:132px;text-align:center;}
    .file-box-right{width:61px;float:left;}
    .left{float:left;}
    .file-box-left h1{
        font-size:36px;
        line-height:36px;
        font-weight:400;
        margin-top:37px;
    }
    .file-box-left h2{
        font-size:16px;
        line-height:26px;

    }
    .file-box-left a {color:#333333;}
    .file-box-left h2 {font-weight:400;}
    .file-box-left h3{
        display:none;
        width:65px;
        color:#ffffff;
        background:rgba(231,80,90,1);
        font-size:14px;
        height:22px;
        line-height:22px;
        border-radius:2px !important;
        margin:0 auto;
    }
    .file-box:hover .file-box-left h3{
        display:block;
    }
    .file-box-left:hover{
        background:rgba(250,233,230,1);
    }
    .file-box-left:hover a{
        color:rgba(231,80,90,1);
    }
    .file-two .file-box-left h3{
        background:rgba(63,112,234,1);
    }
    .file-two .file-box-left:hover{
        background:rgba(238,243,255,1);
    }
    .file-two .file-box-left:hover a{
        color:rgba(63,112,234,1);
    }

    .file-box-right{
        margin-top:52px;
        width:22px;
    }
    .dropdown-menu li {text-align:left;}
    .file-box{width:10.9%;}
    .file-box-left h1{
        font-size:30px;
    }
    .file-box-left{
        width:84%;
    }
    .file-box-left h2{
        font-size:14px;
    }


</style>
<div class="d-sousuo" style="margin-bottom: 20px;">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8" style="padding-right:0;"><input type="text" id="d-zhuanli" placeholder="申请号/名称/申请人" class="d-inputs"/></div>
                <div class="col-md-2 col-sm-2 col-xs-2" style="padding:0;"><a style="text-decoration:none" href="javascript:;" class="d-sou" id="d-zhuanlis">搜专利</a></div>
                <div class="col-md-2 col-sm-2 col-xs-2"><a style="text-decoration:none" href="{{route('patents.index')}}" class="d-sour" target="_blank">专利总览</a></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-7" style="padding-right:0;"><input type="text" id="d-tongzhi" placeholder="申请号/名称/申请人" class="d-inputs"/></div>
                <div class="col-md-2 col-sm-2 col-xs-2" style="padding:0;"><a style="text-decoration:none" href="javascript:;" class="d-sou d-sou1" id="d-tongzhis">搜通知书</a></div>
                <div class="col-md-3 col-sm-3 col-xs-3"><a style="text-decoration:none" href="{{route('notices.index')}}" class="d-sour" target="_blank">通知书总览</a></div>
            </div>

        </div>
    </div>
</div>
<script>
    $("#d-zhuanlis").on("click",function()
    {
        var keyword = $("#d-zhuanli").val();
        var url = "{{route('patents.index')}}";
        window.open(url + "?keyword=" + encodeURI(keyword) + "");
    })
    $("#d-tongzhis").on("click",function()
    {
        var keyword = $("#d-tongzhi").val();
        window.open("{{route('notices.index')}}?&keyword=" + encodeURI(keyword) + "");
    })
</script>
