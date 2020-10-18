@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
    @include('pages.home.include._inc_banner')
    @for($i = 1 ; $i <= 5 ; $i++)
        @include('pages.home.include._inc_section_one')
    @endfor
@stop

@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
