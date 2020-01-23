<?php


namespace App\Members\Extensions\patent;


use App\Members\Extensions\ECharts;
use App\Patent;
use App\PatentType;
use App\Services\MemberServer;
use Illuminate\Support\Facades\DB;

class TypeEChart extends ECharts
{
    static public function content($option = ''){
        $time= 'patent_type_'.time();
        $html=<<<EOF
		<div id="{$time}" style="width: 100%;height:100%;">加载中....</div>
EOF;
        $member = new MemberServer();
        $user_id = $member->getUserId();
        $types = PatentType::pluck('name','id');
        $counts = Patent::select(DB::raw('count(*) as count,patent_type_id'))->where('user_id',$user_id)->groupBy('patent_type_id')->pluck('count','patent_type_id');
        return view('member.index.'.$option,[
            'chart'=>$time,
            'chart_html'=>$html,
            'types'=>$types,
            'counts'=>$counts,
            'total'=>Patent::where('user_id',$user_id)->count(),
        ]);
    }
}
