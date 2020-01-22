<?php

namespace App\Members\Controllers;

use App\Http\Controllers\Controller;
use App\Member;
use App\Members\Extensions\ECharts;
use App\Patent;
use App\PatentCase;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        Admin::script('$(".content-header").hide()');
        //Admin::script('$(".content").css("background", "rgb(245, 245, 245)")');
        return $content
            ->title(' ')
            ->description('  ')
            ->row(view('member.index.search'))
            ->row(function(Row $row){
                $addPatent = new Box('添加专利',view('member.index.add-patent'));
                $patentmanage = new Box('专利管理',view('member.index.add-patent',['type'=>'patent-list']));
                $row->column('3',ECharts::content('doughnut'));
                $row->column('6',$addPatent->style('warning')->solid());
                $row->column('3',$patentmanage->style('danger')->solid());
            })
            ->row((new Box('案件状态',$this->case()))->style('info')->solid());

    }
    protected function case()
    {
        $user = Member::user();
        $patentCases = PatentCase::get(['id','name']);
        $caseCount = Patent::select(DB::raw('count(*) as count, patent_case_id'))->where('user_id',$user->id)
            ->groupBy('patent_case_id')
            ->pluck('count','patent_case_id');
        return view('member.index.patent-case')->with(compact('patentCases','caseCount'));
    }
}
