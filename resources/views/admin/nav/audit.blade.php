<li>
<li>
    <a href="{{route('patent-monitors.index')}}">年费监控</a>
</li>

<li>
    <a href="{{route('member-reals.index')}}">用户认证
        @if($real_count)
        <span class="label label-danger">{{$real_count}}</span>
        @endif
    </a>
</li>
