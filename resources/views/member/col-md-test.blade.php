<form action="/feeMonitor/search.html" method="get">
    <input type="hidden" id="default.page.nextPage" name="page.currentPage" value="1">
    <div class="row">
        <div class="col-md-4 col-sm-5" style="">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3" style="width: 33% !important;">
                    <div class="form-group" style="min-width: 100px;">
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
                <div class="col-md-3 col-sm-3 col-xs-3" style="width: 33% !important;">
                    <div class="form-group" style="min-width: 100px;">
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
                <div class="col-md-3 col-sm-3 col-xs-3" style="width: 33% !important;">
                    <div class="form-group" style="min-width: 100px;">
                        <label>监控状态</label>
                        <select class="form-control" tabindex="1" name="monitorStatus">
                            <option value="">全部</option>
                            <option value="2">待维护</option>
                            <option value="3">紧急滞纳</option>
                            <option value="4">超期失效</option>
                            <option value="1">年费正常</option>
                            <option value="0">已放弃</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-3 " style="">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6" style="">
                    <div class="form-group">
                        <label>缴费截止日起</label>
                        <input class="form-control" type="text" onclick="WdatePicker({el:'startAppDateId'})" id="startAppDateId" name="startDeadline" placeholder="缴费截止日起" value="" readonly="readonly">
                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-6" style="">
                    <div class="form-group">
                        <label>缴费截止日止</label>
                        <input class="lt-input form-control" style="" type="text" onclick="WdatePicker({el:'endAppDateId'})" id="endAppDateId" name="endDeadline" placeholder="缴费截止日止" value="" readonly="readonly">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4" style="">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-9" style="padding-right:0px;">
                    <div class="form-group">
                        <label>关键字</label>
                        <input style="" name="keyword" id="keywordId" value="" placeholder="申请号/专利名称/申请人/年费备注" class="form-control spinner">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn red" style="display:block;width:100%" type="submit">查询</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>