<div class="section mt20">
    <div class="box-heading">
        <h3 class="heading-h3"><a href=""></a>{{ $title }}</h3>
        <ul>
            <li><a href="">All</a></li>
            <li><a href="">Học tiếng anh</a></li>
            <li><a href="">Học tiếng hàn</a></li>
            <li><a href="">Học tiếng trung</a></li>
        </ul>
    </div>
    <div class="box-content mr10">
        <div class="box">
            @for ($j = 1 ; $j <= 2 ; $j ++)
                <div class="box-50">
                    <div class="item item-3-10 mb10">
                        <a href="" class="post-avatar">
                            <img src="/uploads/2020/11/03/2020-11-03__27.jpg" alt="">
                        </a>
                        <h2 class="post-title">
                            <a href="">Học hỏi bí quyết bán hàng từ bậc thầy Tony Robbins</a>
                        </h2>
                        <h6 class="post-desc">Biết rõ mục đích của mình, hiểu rằng mọi người, cả khách hàng và đối…</h6>
                    </div>
                    @for ($i = 1 ; $i <= 3 ; $i ++)
                        <div class="item flex item-flex">
                            <a href="" class="post-avatar">
                                <img src="/uploads/2020/11/03/2020-11-03__27.jpg" alt="">
                            </a>
                            <div class="info">
                                <span>JULY 25, 2019</span>
                                <h2 class="post-title"><a href="">
                                        Những câu đơn giản giới thiệu bản thân bằng tiếng pháp</a></h2>
                            </div>
                        </div>
                    @endfor
                </div>

            @endfor
        </div>
    </div>
</div>
