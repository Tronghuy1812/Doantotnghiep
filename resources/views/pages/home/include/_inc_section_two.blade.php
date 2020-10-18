<section class="section_two">
    <div class="container">
        <div class="section_title ">
            <h2 class="heading-h2 heading-before">Khóa học <span style="color: #ff7818;">0 đồng</span></h2>
        </div>
        <div class="lists js-lists-course-home owl-carousel owl-theme">
            @for($i = 1 ; $i <= 8 ; $i++)
                <div class="item  mr20 box-course mb20">
                    <div class="avatar">
                        <div class="img">
                            <a href="">
                                <img src="{{ asset('images/thumb.jpg') }}" alt="">
                            </a>
                            <div class="img_badget">
                                <p class="flex flex-jc-sb pl10 pr10">
                                    <span><i class="fa fa-play-circle"></i> 25</span>
                                    <span><i class="fa fa-star"></i>4.8</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <h3 class="title">
                            <a href="">Kỷ Nguyên Bán Hàng Mới - Biến Khách Hàng Thành Bạn</a>
                        </h3>
                        <p class="info-auth"><span class="icon"><i class="fa fa-user-md"></i></span> <span class="name">TrungPhuNA</span></p>
                        <p class="info-auth"><span class="icon"><i class="fa fa-briefcase"></i></span> <span class="name">
                      Tổng thư ký Hội đồng Liên hiệp Khoa học Doanh nhân Việt Nam</span></p>
                        <p class="flex flex-jc-sb mt10">
                            <a href="" class="video">
                                <i class="fa fa-play-circle"></i> Học thử
                            </a>
                            <span class="price">Miễn phí</span>
                        </p>
                    </div>
                </div>

            @endfor
            <div class="clear"></div>
        </div>
    </div>
</section>
