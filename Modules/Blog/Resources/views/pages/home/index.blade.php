@extends('blog::layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/blog_home.css') }}">
@stop
@section('content')
    @include('blog::pages.home.include.inc_blog_banner',['articlesHotOne' => $articlesHotOne])
    <div class="container">
        <div class="box">
            <div class="box-70">
                @include('blog::pages.home.include._inc_section_one',['menuPosition' => $menuPositionOne])
                @include('blog::pages.home.include._inc_section_one',['menuPosition' => $menuPositionTwo])
                @include('blog::pages.home.include._inc_section_two',['title' => 'Học ngoại ngữ'])
            </div>
            <div class="box-30 ml15">
                @include('blog::components._inc_sidebar')
            </div>
        </div>
    </div>
@endsection
