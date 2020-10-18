<div class="banners">
    <div class="container">
        <div class="box">
            <div class="box-categories">
                <div class="categories">
                    <ul>
                        <li><a href=""><i class="fa fa-credit-card"></i><span>Tất cả khoá học</span></a></li>
                        <li><a href=""><i class="fa fa-credit-card"></i><span>KHoá học combo</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="box-banner">
                <div class="banner_top">
                    <div class="lists js-banner owl-carousel owl-theme">
                        @for ($i = 1 ; $i<= 5 ; $i ++)
                            <a href="">
                                <img src="{{ asset('images/bn2.png') }}" alt="">
                            </a>
                        @endfor
                    </div>
                </div>
                <div class="banner_bottom">
                    <div class="lists">
                        @for ($i = 1 ;$i <= 3 ; $i ++)
                            <div class="item item-3">
                                <a href="">
                                    <img src="https://media-kyna.cdn.vccloud.vn/uploads/banners/906/img/mobile_image_url-1600328736.jpg" alt="">
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
