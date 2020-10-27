<div class="header-course">
    <div class="container">
        <div class="info">
            <h1 class="mb15"><strong>{{ $courseDetail->c_name }}</strong></h1>
            <p class="desc">
                <span><i class="fa fa-user"></i> {{ $courseDetail->c_total_pay }} học viên</span>
                <span><i class="fa fa-play-circle"></i> {{ $courseDetail->c_total_time }} bài học</span>
                <span><i class="fa fa-clock"></i> {{ $courseDetail->c_total_time }} giờ</span>
                <span class="vote">
                    @for ($i = 1 ; $i<= 5; $i ++)
                        <i class="fa fa-star "></i>
                    @endfor
                    <b>(0 đánh giá )</b>
                </span>
            </p>
            <p class="flex flex-jc-sb">
                <span class="w-50"><i class="fa fa-link mr5" style="width: 15px"></i>Trình độ : Chuyên sâu</span>
                <span class="w-50"><i class="fa fa-usb mr5" style="width: 15px"></i> Sở hữu mãi</span>
            </p>
            <p class="flex flex-jc-sb">
                <span class="w-50" style="text-align: left"><i class="fa fa-windows mr5" style="width: 15px"></i>Xem được trên máy tính, điện thoại</span>
                <span class="w-50" style="text-align: left"><i class="fa fa-graduation-cap mr5" style="width: 15px"></i> Cấp chứng nhận hoàn thành</span>
            </p>
        </div>
    </div>
</div>
