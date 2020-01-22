
<div class="d-mine">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
            <div class="row" style="background:#FFFFFF; height:243px; margin:0; border-radius: 4px !important;">
                <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0;">
                    <div id="{{$chart}}" style="height: 220px; width:100%;"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <ul class="d-mimi">
                        <li class="d-li1"><a style="text-decoration:none" target="_blank" href="/patent/search.html?page.currentPage=1&patentType=1"><span>发明专利</span><b id="patentType1">0</b></a></li>
                        <li class="d-li2"><a style="text-decoration:none" target="_blank" href="/patent/search.html?page.currentPage=1&patentType=2"><span>实用新型</span><b id="patentType2">0</b></a></li>
                        <li class="d-li3"><a style="text-decoration:none" target="_blank" href="/patent/search.html?page.currentPage=1&patentType=3"><span>外观设计</span><b id="patentType3">0</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 d-min1">
            <h3>添加专利</h3>
            <ul class="row d-row">
                <li class="col-md-2 col-sm-2 col-xs-2">
                    <a style="text-decoration:none" target="_blank" style="" href="/notice/showUploadForm.html">
                        <img src="/new_temp/images/sune1.png" />
                        <span>上传通知书</span>
                    </a>
                </li>
                <li class="col-md-2 col-sm-2 col-xs-2">
                    <a style="text-decoration:none" target="_blank" href="/patent/showUploadForm.html">
                        <img src="/new_temp/images/sune2.png" />
                        <span>上传专利表格</span>
                    </a>
                </li>
                <li class="col-md-2 col-sm-2 col-xs-2">
                    <a style="text-decoration:none" target="_blank" href="/patent/searchPatent.html?q=">
                        <img src="/new_temp/images/sune3.png" />
                        <span>搜索专利添加</span>
                    </a>
                </li>
                <li class="col-md-2 col-sm-2 col-xs-2">
                    <a style="text-decoration:none" target="_blank" href="/patent/addPatentFrom.html">
                        <img src="/new_temp/images/sune4.png" />
                        <span>输入专利添加</span>
                    </a>
                </li>
                <li class="col-md-2 col-sm-2 col-xs-2">
                    <a style="text-decoration:none" target="_blank" href="/patentOfficeAccount/list.html?currentPage=1">
                        <img src="/new_temp/images/sune5.png" />
                        <span>数字证书维护</span>
                    </a>
                </li>
                <li class="col-md-2 col-sm-2 col-xs-2">
                    <a style="text-decoration:none" target="_blank" href="/certificate/certificateUploadForm.html">
                        <img src="/new_temp/images/sune6.png" />
                        <span>上传证书图片</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-3">
            <div class="d-min1">
                <h3 style="margin-left: 10px;">专利管理</h3>
                <ul class="row  d-row">
                    <li class="col-md-1"></li>
                    <li class="col-md-4">
                        <a style="text-decoration:none" target="_blank" style="" href="/notice/showUploadForm.html">
                            <img src="/new_temp/images/sune1.png" />
                            <span>我的通知书</span>
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a style="text-decoration:none" target="_blank" href="/patent/showUploadForm.html">
                            <img src="/new_temp/images/sune2.png" />
                            <span>年费健康</span>
                        </a>
                    </li>
                    <li class="col-md-1"></li>
                </ul>
            </div>
        </div>

    </div>

</div>

<script>
    $(function () {
        var myChart_{{$chart}} = echarts.init(document.getElementById('{{$chart}}'));
        myChart_{{$chart}}.setOption({
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: {c} ({d}%)'
            },
            series: [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius: ['45%', '85%'],
                    avoidLabelOverlap: false,
                    color:['#E97E9F','#90DBC0','#87A6E9'],
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: false,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data: [
                        {value: 335, name: '直接访问'},
                        {value: 310, name: '邮件营销'},
                        {value: 234, name: '联盟广告'},
                    ]
                }
            ]
        }, true);
    });

</script>
