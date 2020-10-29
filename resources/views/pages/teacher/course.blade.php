@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
@stop
@section('content')
    @include('pages.teacher.include._inc_breadcrumb')
    @include('pages.teacher.include._inc_header')
    @include('pages.teacher.include._inc_content')
    @include('pages.teacher.include._inc_course')
@stop

@section('script')
    <script src="{{ asset('js/teacher.js') }}"></script>
@stop
