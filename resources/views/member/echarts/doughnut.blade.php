<div class="row" style="background:#FFFFFF; height:258px; margin:0; border-radius: 4px !important;">
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

<script>
    $(function () {
        var myChart_{{$chart}} = echarts.init(document.getElementById('{{$chart}}'));
        myChart_{{$chart}}.setOption({
            title: {
                text: '专利总量：0',
                textStyle:{
                    //文字颜色
                    //字体风格,'normal','italic','oblique'
                    fontStyle:'normal',
                    //字体粗细 'normal','bold','bolder','lighter',100 | 200 | 300 | 400...
                    //字体大小
                    fontSize:14
                },
                link:'/members/patents',//主标题超链接
                target:'blank',//主标题超链接打开方式
                left:'center',
                bottom:'left'
            },
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
