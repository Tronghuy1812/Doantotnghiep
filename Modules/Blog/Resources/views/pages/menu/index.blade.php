@extends('blog::layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/blog_menu.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="box">
            <div class="box-70">
                <div class="articles mt20">
                    <h1 class="heading-h1">{{ $menu->m_name }}</h1>
                    @include('blog::components._inc_list_articles',['articles' => $articles])
                </div>
            </div>
            <div class="box-30 ml15">
                @include('blog::components._inc_sidebar')
            </div>
        </div>
    </div>
@endsection
