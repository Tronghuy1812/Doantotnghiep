@extends('blog::layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/blog_article.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="box">
            <div class="box-70">
                <div class="content-article mt20">
                    <h1 class="heading-h1">{{ $article->a_name }}</h1>
                    <div class="info-auth flex flex-jc-sb">
                        <p>By <b>TrungPhuNA</b></p>
                        @if(isset($article->menu))
                            <p class="info-by-category">
                                <a href="{{ route('get_blog.render',['slug' => $article->menu->m_slug.'-m']) }}" title="{{ $article->menu->m_name }}">{{ $article->menu->m_name }}</a>
                            </p>
                        @endif
                    </div>
                    <div class="content-text">{!! $article->a_content !!}</div>
                </div>
                <div class="articles mt10">
                    <h3 class="heading-h3">Bài viết liên quan</h3>
                    @include('blog::components._inc_list_articles',['articles' => $articlesRelate])
                </div>
            </div>
            <div class="box-30 ml15">
                @include('blog::components._inc_sidebar')
            </div>
        </div>
    </div>
@endsection
