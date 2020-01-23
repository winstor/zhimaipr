<div class="row">
    @foreach($patentCases as $key=>$case)
    <div class="file-box left">
        <div class="file-box-left">
            <a style="text-decoration:none" target="_blank" href="{{route('patents.index',['patent_case_id'=>$case['id']])}}">
                <h1 id="patentStatusCount{{$case['id']}}">{{$caseCount[$case['id']]??0}}</h1>
                <h2>{{$case['name']}}</h2>
                <h3>查看</h3></a>
        </div>
        <div class="file-box-right">
            <img src="/new_temp/images/arrow2.png">
        </div>
    </div>
    @endforeach
</div>

