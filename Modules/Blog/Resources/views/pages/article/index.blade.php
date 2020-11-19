@extends('blog::layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/blog_article.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="box">
            <div class="box-70">
                <div class="content-article mt20">
                    <h1 class="heading-h1">Tổng hợp kinh nghiệm tự học photoshop online cực đơn giản</h1>
                    <div class="info-auth flex flex-jc-sb">
                        <p>By <b>TrungPhuNA</b></p>
                        <p class="info-by-category"><a href="">Kiến thức lập trình</a></p>
                    </div>
                </div>
                <div class="articles mt10">
                    <h3 class="heading-h3">Bài viết liên quan</h3>
                    @for ($i =1 ; $i <= 10 ; $i ++)
                        <div class="item mb10">
                            <div class="item-avatar">
                                <a href="">
                                    <img src="/uploads/2020/11/18/2020-11-18__anh2.jpg" alt="">
                                </a>
                            </div>
                            <div class="item-content">
                                <h3>
                                    <a href="">Một bài viết chuẩn SEO cần lưu ý những gì?</a>
                                </h3>
                                <h5>SEO từ khóa là khái niệm hết sức quen thuộc với bất kỳ ai quan tâm đến lĩnh vực Marketing Online, Digital…</h5>
                            </div>
                            <div class="clear"></div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="box-30 ml15">
                @include('blog::components._inc_sidebar')
            </div>
        </div>
    </div>
@endsection
