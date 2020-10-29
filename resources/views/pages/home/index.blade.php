@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
    @include('pages.home.include._inc_banner',['slides' => $slides])
    @include('pages.home.include._inc_section_one',['courses' => $coursesHotPositionOne,'categories' => $categoriesHotHome])
    @include('pages.home.include._inc_section_two',['courses' => $coursesFree])
    @include('pages.home.include._inc_tags_hot',['tags' => $tagsHot])
    @include('pages.home.include._inc_lecture',['teachers' => $teachers])
@stop

@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
