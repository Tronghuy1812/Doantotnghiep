@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/pay.css') }}">
@stop
@section('content')
    @include('user::pages.pay.include._inc_process')
    <div class="container">
        <form action="" method="POST" id="formTransaction">
            <div class="box mb20">
                <div class="box-70">
                    @include('user::pages.pay.include._inc_pay_left')
                </div>
                <div class="box-30">
                    @include('user::pages.pay.include._inc_pay_right',['listCarts' => $listCarts])
                </div>
            </div>
            <div class="box-fix">
                <div class="container flex">
                    <div class="item">
                        <span>Phương thức thanh toán</span><br>
                        <span class="js-pay-type-preview">Chuyển khoản</span>
                    </div>
                    <div class="item">
                        <span>Tổng tiền thanh toán</span><br>
                        <span><b>{{ \Cart::subtotal(0,0,'.') }} đ</b></span>
                    </div>
                    <div class="item">
                        <span>Email tài khoản</span>
                        <span>{{ get_data_user('web','email') }}</span>
                    </div>
                    <div class="item">
                        <button type="submit" class="checkout-button btn js-save-cart" data-url="{{ route('post_user.cart.pay',['type' => 'course']) }}">Hoàn tất đơn hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/cart.js') }}"></script>
@stop
