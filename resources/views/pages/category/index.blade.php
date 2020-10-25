@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@stop
@section('content')
    @include('pages.category.include._inc_breadcrumb')
    @include('pages.category.include._inc_fill_search')
    <div class="main-content">
        <div class="grid">
            <div class="grid-left">
                <h2>Left</h2>
            </div>
            <div class="grid-right">
                <h2>Right</h2>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/category.js') }}"></script>
@stop
