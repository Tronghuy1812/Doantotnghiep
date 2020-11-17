@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
@stop
@section('content')
    @include('pages.teacher.include._inc_breadcrumb')
    @include('pages.teacher.include._inc_header',['teacher' => $teacher])
    @include('pages.teacher.include._inc_content',['teacher' => $teacher,'tags' => $tags ?? []])
    @include('pages.teacher.include._inc_course',['courses' => $courses])
@stop

@section('script')
    <script src="{{ asset('js/teacher.js') }}"></script>
@stop
