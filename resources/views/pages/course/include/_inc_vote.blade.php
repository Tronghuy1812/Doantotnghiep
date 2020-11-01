<div class="box-section vote">
    <h4 class="box-title">Học viên nói gì</h4>
    <div class="box-content">
        <div class="box">
            <div class="box-30 dashboard">
                <div class="vote-total-age">0</div>
                <p class="vote-star">
                    @for ($i = 1 ;$i <= 5 ;$i++)
                        <span class="fa fa-star"></span>
                    @endfor
                </p>
                <p class="desc">(<span class="vote-total">0</span> Đánh giá)</p>
            </div>
            <div class="box-70">
                <div class="list-vote">
                    @for($i = 5 ; $i >0 ; $i --)
                        <div class="item flex flex-jc-sb">
                            <span class="first">{{ $i }} <i class="fa fa-star"></i></span>
                            <div style=""><div class="progress" style="width: 0%"></div></div>
                            <span class="last">5 %</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
