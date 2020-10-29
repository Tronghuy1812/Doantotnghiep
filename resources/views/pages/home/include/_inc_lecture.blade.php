<section class="lecture">
    <div class="container">
        <div class="section_title ">
            <h2 class="heading-h2 heading-before">Đội ngũ giảng viên</h2>
        </div>
        <div class="lists js-lists-lecture owl-carousel owl-theme">
            @foreach($teachers as $item)
                <div class="item">
                    <div class="item-header">
                        <a href="" title="{{ $item->t_name }}">
                            <img src="{{ pare_url_file($item->t_avatar) }}" alt="{{ $item->t_name }}">
                        </a>
                    </div>
                    <div class="info">
                        <h6>{{ $item->t_name }}</h6>
                        <p class="info-auth">
                            <span class="icon"><i class="fa fa-briefcase"></i></span>
                            <span class="name">{{ $item->t_job }}</span>
                        </p>
                    </div>
                    <div class="dashboard flex flex-jc-sb">
                        <div class="box-item flex flex-d-c">
                            <span class="mb10">Số <br> khoá học</span>
                            <span>{{ rand(1,10) }}</span>
                        </div>
                        <div class="box-item flex flex-d-c">
                            <span class="mb10">Tổng <br> giờ giảng</span>
                            <span>+99</span>
                        </div>
                        <div class="box-item flex flex-d-c">
                            <span class="mb10">Tổng <br> câu hỏi</span>
                            <span>5</span>
                        </div>
                    </div>
                    <a href="{{ route('get.teacher.course', $item->t_slug) }}" target="_blank" title="Xem thêm" class="btn btn-secondary">Xem thêm</a>
                </div>
            @endforeach
            <div class="clear"></div>
        </div>
    </div>
</section>
