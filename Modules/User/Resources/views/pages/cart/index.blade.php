@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@stop
@section('content')
    <div class="container page-shopping-cart mt20">
        <div class="table-responsive pt20">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 100px;">Hình ảnh</th>
                    <th style="width: 30%;text-align: left">Sản phẩm</th>
                    <th style="text-align: left">Giá</th>
                    <th style="text-align: left">Thành tiền</th>
                    <th style="text-align: left">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($listCarts as $key => $item)
                        <tr>
                            <td>
                                <a href="" title="{{ $item->name }}" class="avatar image contain">
                                    <img alt="{{ $item->name }}"  onerror="this.onerror=null;this.src='/images/default.png';" src="{{ $item->options->avatar }}" class="lazyload">
                                </a>
                            </td>
                            <td>
                                <div style="" class="name-product"> <a href=""><strong>{{ $item->name }}</strong></a> </div>
                            </td>
                            <td>
                                <p><b>{{ number_format($item->price,0,',','.') }} đ</b></p>
{{--                                <p> <span style="text-decoration: line-through;">120.000 đ</span> <span class="sale">- 1 %</span> </p>--}}
                            </td>
                            <td> <span class="js-total-item">{{ number_format($item->price,0,',','.') }} đ</span> </td>
                            <td>
                                <a href="" class="btn btn-xs btn-pink btn-radius"><i class="fa fa-trash"></i> Huỷ bỏ</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="cart-footer mt20">
                <p style="">Tổng tiền : <b id="sub-total">{{ \Cart::subtotal(0,0,'.') }}đ</b></p>
                <div class="">
                    <a href="{{ route('get_user.pay') }}" class="btn btn-success" title="Thanh toán">Thanh toán</a>
                    <a href="{{ route('get.category.all') }}" title="Tất cả khoá học" class="btn btn-primary">Tiếp tục tìm khoá học</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
