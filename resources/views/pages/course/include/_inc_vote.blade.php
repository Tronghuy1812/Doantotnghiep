<div class="box-section vote">
    <h4 class="box-title">Học viên nói gì</h4>
    <div class="box-content">
        <div class="box">
            <div class="box-30 dashboard">
                @php
                    $age = 0;
                    if ($courseDetail->c_total_evaluate > 0)
                    {
                        $age = round($courseDetail->c_total_star / $courseDetail->c_total_evaluate,2);
                    }
                @endphp
                <div class="vote-total-age">{{ $age }}</div>
                <p class="vote-star">
                    @for ($i = 1 ;$i <= 5 ;$i++)
                        <span class="fa fa-star {{ $age >= $i ? 'active' : '' }}"></span>
                    @endfor
                </p>
                <p class="desc">(<span class="vote-total">{{ $courseDetail->c_total_evaluate }}</span> Đánh giá)</p>
            </div>
            <div class="box-70">
                <div class="list-vote">
                    @foreach($votesDashboard as $key => $item)
                        @php
                            $ageItem = 0;
                            if ($courseDetail->c_total_evaluate)
                                $ageItem = round(($item['count_number'] / $courseDetail->c_total_evaluate) * 100,2) ;
                        @endphp
                        <div class="item flex flex-jc-sb">
                            <span class="first">{{ $key }} <i class="fa fa-star"></i></span>
                            <div style=""><div class="progress" style="width: {{ $ageItem }}%"></div></div>
                            <span class="last"><b>{{ $item['count_number'] }} Vote</b></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-reviews mb20">
    <div class="lists-vote mt10 mb10">
        <div class="lists">
            @foreach($votes as $item)
                <div class="item-1 item flex">
                    <div class="item-avatar">
                        <a href="">
                            <img src="{{ pare_url_file($item->user->avatar ?? '') }}" alt="">
                        </a>
                        @if($item->created_at)
                            <p>{{ $item->created_at->format('d/m/Y') ?? "[N\A]" }}</p>
                        @else
                            <p>"[N\A]"</p>
                        @endif
                    </div>
                    <div class="item-info">
                        <p>
                            <span><b>{{ $item->user->name ?? "[N\A]" }}</b></span>
                            <span>
                                                    @for($i = 1 ; $i <= 5; $i ++)
                                    <i class="fa fa-star {{ $item->v_number >= $i  ? 'active' : '' }}"></i>
                                @endfor
                                                </span>
                        </p>
                        <p>{{ $item->v_content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
