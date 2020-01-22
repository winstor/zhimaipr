<?php


namespace App\Members\Extensions\patent;


use App\Patent;
use App\PatentCase;
use App\PatentType;
use App\Services\MemberServer;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\DB;

class HeaderSearch
{
    public function html()
    {
        $filter = request()->all();
        $memberServer = new MemberServer();
        $user_id = $memberServer->getUserId();
        $patentCases = PatentCase::pluck('name','id');
        $patentNumber = Patent::select(DB::raw('count(*) as count,patent_case_id'))->where('user_id',$user_id)->groupBy('patent_case_id')->pluck('count','patent_case_id');
        $patentTypes = PatentType::get(['name','id']);
        $monitorStates = ['未监控','监控中'];
        $saleStates = ['未发布','待交易','已下架'];

        try {
            return view('member.patent.header-search',
                compact('patentCases', 'patentNumber', 'filter', 'patentTypes', 'monitorStates', 'saleStates'))->render();
        } catch (\Throwable $e) {
            return '';
        }
    }
    public function __toString()
    {
        return $this->html();
    }
}
