<div class="right-section" style="padding: 0">
    <img class="thumb" src="{{ pare_url_file($courseDetail->c_avatar) }}" alt="{{ $courseDetail->c_name }}">
    <div class="right-section-box">
        <p class="price"><i class="fa fa-tags"></i> <span>{{ number_format($courseDetail->c_price,0,',','.') }} đ</span></p>
        <a href="javascript:;void(0)" data-url="{{ route('get_user.pay') }}" title="Mua ngay" class="btn btn-success btn-radius js-buy-now">Mua ngay</a>
        <a href="javascript:;void(0)" title="Thêm giỏ hàng" data-url="{{ route('get_user.cart.add',['id' => $courseDetail->id,'type' => 'course']) }}"
           class="btn btn-pink btn-radius js-add-cart">Thêm giỏ hàng</a>
        <div class="footer">
            <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="" class="google"><i class="fa fa-google"></i></a>
            <a href="" class="twitch"><i class="fa fa-twitch"></i></a>
        </div>
    </div>
</div>
<div class="right-section">
    <h4 class="right-section-title">{{ $courseDetail->c_name }}</h4>
    <div class="list-course">
        <a href=""><i class="fa fa-play-circle"></i> Bài mở đầu</a>
        <a href=""><i class="fa fa-play-circle"></i> Bài 1. Nếu tăng giá</a>
        <a href=""><i class="fa fa-play-circle"></i> Bài 2. Nếu tăng tiền</a>
    </div>
</div>
