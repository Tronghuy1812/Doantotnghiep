<div class="pay-right">
    <div class="pay-box-item">
         <h4 class="flex flex-jc-sb">
            <span><i class="fa fa-shopping-bag"></i> {{ \Cart::content()->count() }} Khoá học</span>
            <a href="{{ route('get_user.cart') }}" title="Thay đổi">Thay đổi</a>
        </h4>
        <ul class="pay-cart-lists">
            @foreach($listCarts as $item)
                <li>
                    <a class="name" href="" target="_blank" title="{{ $item->name }}">{{ $item->name }}</a>
                    <span class="price">{{ number_format($item->price,0,',','.') }} đ</span>
                </li>
            @endforeach
        </ul>
        <div class="line mb15"></div>
        <div class="pay-code mb15">
            <input type="text" class="form-control w-100" placeholder="Mã giảm giá">
        </div>
        <div class="pay-footer">
            <p>
                <span>Học phí gốc</span>
                <span>{{ \Cart::subtotal(0,0,'.') }}đ</span>
            </p>
            <p>
                <span>Tổng giảm</span>
                <span>0</span>
            </p>
            <p class="color-orange box-total-pay">
                <span>Thành tiền</span>
                <span>{{ \Cart::subtotal(0,0,'.') }}đ</span>
            </p>
        </div>
    </div>
</div>
