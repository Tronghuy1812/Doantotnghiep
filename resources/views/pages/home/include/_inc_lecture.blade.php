<section class="lecture">
    <div class="container">
        <div class="section_title ">
            <h2 class="heading-h2 heading-before">Đội ngũ giảng viên</h2>
        </div>
        <div class="lists js-lists-lecture owl-carousel owl-theme">
            @for($i = 1 ; $i <= 8 ; $i++)
                <div class="item">
                    <div class="item-header">
                        <a href="">
                            <img src="{{ asset('images/avatar.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="info">
                        <h6>Phan Trung Phú</h6>
                        <p class="info-auth"><span class="icon"><i class="fa fa-briefcase"></i></span> <span class="name">
                      Tổng thư ký Hội đồng Liên hiệp Khoa học Doanh nhân Việt Nam</span></p>
                    </div>
                    <div class="dashboard flex flex-jc-sb">
                        @for ($j = 1 ; $j <= 3 ;$j++)
                            <div class="box-item flex flex-d-c">
                                <span class="mb10">Nôi dung</span>
                                <span>100</span>
                            </div>
                        @endfor
                    </div>
                    <a href="" title="Xem thêm" class="btn btn-secondary">Xem thêm</a>
                </div>
            @endfor
            <div class="clear"></div>
        </div>
    </div>
</section>
