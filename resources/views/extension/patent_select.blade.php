<div class="box-body table-responsive no-padding">
    <div class="col-md-4 col-sm-6" style="">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4" style="">
                <div class="form-group">
                    <label>专利类型</label>
                    <select class="form-control" tabindex="1" name="patentType">
                        <option value="">全部</option>

                        <option value="1">
                            发明专利
                        </option>

                        <option value="2">
                            实用新型
                        </option>

                        <option value="3">
                            外观设计
                        </option>

                        <option value="4">
                            PCT发明
                        </option>

                        <option value="5">
                            PCT实用
                        </option>

                        <option value="6">
                            复审
                        </option>

                        <option value="7">
                            无效
                        </option>

                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="">
                <div class="form-group">
                    <label>案件状态</label>
                    <select class="form-control" tabindex="1" name="patentStatus">
                        <option value="">全部</option>

                        <option value="1">
                            等待申请费
                        </option>

                        <option value="2">
                            补审待答复
                        </option>

                        <option value="3">
                            等年登印费
                        </option>

                        <option value="4">
                            视未视撤视弃
                        </option>

                        <option value="5">
                            已失效专利
                        </option>

                        <option value="6">
                            专利权维持
                        </option>

                        <option value="7">
                            其他
                        </option>

                        <option value="8">
                            驳回等复审
                        </option>

                        <option value="9">
                            等年滞纳金
                        </option>

                        <option value="10">
                            手续已合格
                        </option>

                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="">
                <div class="form-group">
                    <label>年费监控</label>
                    <select class="form-control" tabindex="1" name="annualFeeMonitorStatus">
                        <option value="">全部</option>
                        <option value="1">未监控</option>
                        <option value="2">监控中</option>
                        <option value="0">已放弃</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-4 col-sm-6 " style="">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4" style="">
                <div class="form-group">
                    <label>交易状态</label>
                    <select class="form-control" tabindex="1" name="transactionStatus">
                        <option value="">全部</option>

                        <option value="0">待发布</option>
                        <option value="6">已下架</option>
                        <option value="1">待交易</option>
                        <option value="2">已预订</option>
                        <option value="3">待提交变更</option>
                        <option value="4">已提交变更</option>
                        <option value="7">变更已合格</option>
                        <option value="8">已缴费待发证</option>
                        <option value="5">已完成|卖家变 </option>
                        <option value="9">已完成|买家变</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="">
                <div class="form-group">
                    <label>申请日开始</label>
                    <input class="form-control" type="text" onclick="WdatePicker({el:'startAppDateId'})" id="startAppDateId" name="startAppDate" placeholder="申请日开始" value="" readonly="readonly">
                </div>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="">
                <div class="form-group">
                    <label>申请日结束</label>
                    <input class="lt-input form-control" style="" type="text" onclick="WdatePicker({el:'endAppDateId'})" id="endAppDateId" name="endAppDate" placeholder="申请日结束" value="" readonly="readonly">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12" style="">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-9" style="padding-right:0px;">
                <div class="form-group">
                    <label>关键字</label>
                    <input style="" name="keyword" id="keywordId" value="" placeholder="备注/申请号/名称/申请人/内部编码/共享人/案件状态" class="form-control spinner">
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3" style="padding-left:0px;">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button class="btn d_baocun" style="display:block;width:100%" type="submit">查询</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12" style="margin-bottom: 5px;">
        <a href="javascript:void(0);" onclick="sharePatents();" style="text-decoration: none;">
            <button type="button" style="margin-right:10px;" class="btn d_fenxiang" title="可以把专利批量分享给好友哦！">分享给好友</button>
        </a>
        <a href="javascript:void(0)" onclick="batchAddGoods()" style="text-decoration: none;">
            <button type="button" style="margin-right:10px;" class="btn d_fabu" title="可以将您的专利发布到 www.lotut.com交易网买卖哦！我们不收取任何中间费用！您也可以去交易管理页面修改您的价格和类别哦！">批量发布交易</button>
        </a>
        <!-- <a href="javascript:void(0)" onclick="exportPatents()" style="text-decoration: none;">
            <button type="button" style="margin-right:10px;" class="btn d_daochu">表格导出</button>
        </a> -->
        <a href="javascript:void(0);" onclick="batchAddAnnualFeeMonitor2()" style="text-decoration: none;">
            <button type="button" style="margin-right:10px;" class="btn d_jiankong" title="可以加入年费监控，更快的管理专利哦！">加入年费监控</button>
        </a>
        <a href="javascript:void(0);" onclick="batchDownloadCertificate()" style="text-decoration: none;">
            <button type="button" style="margin-right:10px;" class="btn d_xiazai_certificate">批量下载证书</button>
        </a>
        <div class="btn-group" style="float: right;">
            <button style="width: 120px;" type="button" class="btn red dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true" aria-expanded="false">更多操作
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu" style="min-width: 120px;">
                <li>
                    <a href="javascript:void(0);" onclick="exportPatents()">批量表格导出</a>
                </li>
                <li>
                    <a href="/patent/listByCreateTime.html?currentPage=1">添加日降序</a>
                </li>

                <li>
                    <a href="javascript:void(0);" onclick="giveUpMonitor()">放弃年费监控</a>
                </li>

                <li>
                    <a href="javascript:void(0);" onclick="batchDelectPatents()">批量删除专利</a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="batchDelectShareUsers()">批量删除共享人</a>
                </li>
            </ul>
        </div>
    </div>
</div>