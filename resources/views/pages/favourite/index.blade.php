@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@stop
@section('content')
    @include('pages.category.include._inc_breadcrumb')
    @include('pages.components._inc_fill_search')
    <div class="main-content mt20">
        <div class="container">
            <div class="box">
                <div class="box-25 mr20">
                    <section>
                        <div class="box-sidebar">
                            <h2 class="box-sidebar-title">{{ $category->c_name ?? "Tất cả khoá học"}}</h2>
                            <ul class="b-s-category">

                            </ul>
                        </div>
                    </section>
                    @include('pages.components._inc_tags_hot')
                </div>
                <div class="box-75 box-content">
                    <div class="results mb10 mt10">
                        <b>20</b> khoá học <b>Con người</b>
                    </div>
                    <div class="lists ">
                        @forelse($courses as $item)
                            @include('pages.category.include._item_course',['course' => $item])
                        @empty
                            <p>Dữ liệu chưa được cập nhật</p>
                        @endforelse
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/category.js') }}"></script>
@stop
