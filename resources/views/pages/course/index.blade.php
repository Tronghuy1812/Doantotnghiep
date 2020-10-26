@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@stop
@section('content')
    @include('pages.course.include._inc_breadcrumb')
    @include('pages.course.include._inc_header_course')
    <div class="container">
        <div class="box">
            <div class="box-70 mr10">
                @for ($i = 1 ; $i <= 3 ; $i ++)
                    <div class="box-section">
                        <h4 class="box-title">Bạn sẽ học được gì?</h4>
                        <div class="box-content">
                            Hiểu về mô hình nến Nhật trong chứng khoán
                            Phân tích các loại mô hình nến trong giai đoạn tăng và giai đoạn giảm
                            Phân tích về các phản ứng của giá theo phương pháp Price Action
                        </div>
                    </div>
                @endfor
            </div>
            <div class="box-30" >
                <div class="right-section">
                    <div >
                        <img class="thumb" src="http://127.0.0.1:8888/images/thumb.jpg" alt="">
                        <p class="price"><i class="fa fa-tags"></i> <span>390.000 đ</span></p>
                        <a href="" class="btn btn-success btn-radius">Mua ngay</a>
                        <a href="" class="btn btn-pink btn-radius">Thêm giỏ hàng</a>
                        <div class="footer">
                            <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="" class="google"><i class="fa fa-google"></i></a>
                            <a href="" class="twitch"><i class="fa fa-twitch"></i></a>
                        </div>
                    </div>
                </div>
                <div class="right-section">
                    <h4 class="right-section-title">Mô hình nến và các động thái về giá trong chứng khoán</h4>
                    <div class="list-course">
                        <a href=""><i class="fa fa-play-circle"></i> Bài mở đầu</a>
                        <a href=""><i class="fa fa-play-circle"></i> Bài 1. Nếu tăng giá</a>
                        <a href=""><i class="fa fa-play-circle"></i> Bài 2. Nếu tăng tiền</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/course.js') }}"></script>
@stop
