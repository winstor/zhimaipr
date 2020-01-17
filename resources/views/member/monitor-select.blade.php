<form  action="/feeMonitor/search.html" method="get">
    <input type="hidden" id="default.page.nextPage" name="page.currentPage" value="1"/>
    <div class="row">
        <div class="col-md-4">
            <label>专利类型</label>
            <select  class="form-control" tabindex="1" name="patentType">
                <option value="">全部</option>
                <option  value="1">发明专利</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>案件状态</label>
            <select  class="form-control" tabindex="1" name="patentStatus">
                <option value="">全部</option>
                <option  value="1">等待申请费</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>监控状态</label>
            <select  class="form-control" tabindex="1" name="monitorStatus">
                <option value="" >全部</option>
                <option  value="2" >待维护</option>
                <option  value="3" >紧急滞纳</option>
                <option  value="4" >超期失效</option>
                <option  value="1" >年费正常</option>
                <option  value="0" >已放弃</option>
            </select>
        </div>
    </div>
    <div  class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <div class="col-md-2">
                <label>缴费截止日起</label>
                <input class="form-control"  type="text" onclick="WdatePicker({el:'startAppDateId'})" id="startAppDateId" name="startDeadline" placeholder="缴费截止日起" value="" readonly="readonly">
            </div>
            <div class="col-md-2">
                <label>缴费截止日止</label>
                <input class="lt-input form-control" style="" type="text" onclick="WdatePicker({el:'endAppDateId'})" id="endAppDateId" name="endDeadline" placeholder="缴费截止日止" value="" readonly="readonly">
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-2">
                <label>关键字</label>
                <input style="" name="keyword" id="keywordId" value="" placeholder="申请号/专利名称/申请人/年费备注" class="form-control spinner"/>
            </div>
            <div class="col-md-2">
                <label>&nbsp;</label>
                <button class="btn red" style="display:block;width:100%" type="submit" >查询</button>
            </div>
        </div>
    </div>
</form>