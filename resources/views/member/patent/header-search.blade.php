<style>
    .qxjk-ul li {
        float: left;
        font-size: 14px;
        margin: 5px 20px 10px 20px;
        list-style: none;
    }
    .qxjk-ul li a {display:block; padding:5px 8px;}
    .qxjk-ul li a.hover { background:#C6E8FF;border-radius:12px !important;}
    .qxjk-ul {
        list-style: none;
        padding: 0px;
        margin: 0px;
        display: block;
        overflow: hidden;
    }

</style>
<div class="box box-danger box-solid">

    <div class="box-header with-border">
        <h3 class="box-title">案件状态监控</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div>
    <div class="box-body">
        <div class="tab-pane active" id="tab_5_1">
            <ul class="qxjk-ul">
                @foreach($patentCases as $key=>$caseName)
                <li>
                    <a class="@if(isset($filter['patent_case_id']) && isset($filter['defaultCode']) && $filter['patent_case_id'] == $key && $filter['defaultCode'] == 'top') hover @endif"  href="{{route('patents.index',['patent_case_id'=>$key,'defaultCode'=>'top'])}}">
                        {{$caseName}} ({{$patentNumber[$key]??0}})
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

<div class="box box-warning box-solid">
    <div class="box-body">
        <div class="col-md-12">
            <form action="{{route('patents.index')}}" method="get">
                <input type="hidden" id="default.page.nextPage" name="page.currentPage" value="1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3" style="">
                                <div class="form-group">
                                    <label>专利类型</label>
                                    <select class="form-control" tabindex="1" name="patent_type_id">
                                        <option value="">全部</option>
                                        @foreach($patentTypes as $patentType)
                                        <option @if(isset($filter['patent_type_id']) && $filter['patent_type_id'] == $patentType['id']) selected="selected" @endif value="{{$patentType['id']}}">{{$patentType['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="">
                                <div class="form-group">
                                    <label>案件状态</label>
                                    <select class="form-control" tabindex="1" name="patent_case_id">
                                        <option value="">全部</option>
                                        @foreach($patentCases as $key=>$vo)
                                            <option @if(isset($filter['patent_case_id']) && $filter['patent_case_id'] == $key && (empty($filter['defaultCode']) || $filter['defaultCode'] != 'top')) selected="selected" @endif value="{{$key}}">{{$vo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="">
                                <div class="form-group">
                                    <label>年费监控</label>
                                    <select class="form-control" tabindex="1" name="monitor_state">
                                        <option value="">全部</option>
                                        @foreach($monitorStates as $key=>$monitorState)
                                        <option @if(isset($filter['monitor_state']) && $filter['monitor_state'] == $key) selected @endif value="{{$key}}">{{$monitorState}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="">
                                <div class="form-group">
                                    <label>交易状态</label>
                                    <select class="form-control" tabindex="1" name="sale_state">
                                        <option value="">全部</option>
                                        @foreach($saleStates as $key=>$saleState)
                                            <option @if(isset($filter['sale_state']) && $filter['sale_state'] == $key) selected @endif value="{{$key}}">{{$saleState}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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
            </form>
        </div>

    </div>
</div>

