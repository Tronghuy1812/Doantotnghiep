@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@stop
@section('content')
    @include('pages.category.include._inc_breadcrumb',['category' => $category ?? []])
    @include('pages.components._inc_fill_search')
    <div class="main-content mt20 main-content-category">
        <div class="container">
            <div class="box box-mb">
                <div class="box-25 mr20 box-25-mb hide-mb">
                    @if(isset($category))
                    <section>
                        <div class="box-sidebar">
                            <h2 class="box-sidebar-title">{{ $category->c_name ?? "Tất cả khoá học"}}</h2>
                            <ul class="b-s-category">
                                @foreach($categoryChild ?? [] as $item)
                                    <li>
                                        <a href="{{ route('get.course.render',['slug' => $item->c_slug.'-c']) }}" title="{{ $item->c_name }}"><i class="{{ $category->c_icon }}"></i> {{ $item->c_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                    @endif
                    <section>
                        <div class="box-sidebar">
                            <h2 class="box-sidebar-title">Chủ đề hót</h2>
                            <ul class="b-s-tags">
                                @foreach($tags ?? [] as $item)
                                    <li><a href="{{ route('get.course.render',['slug' => $item->t_slug.'-t']) }}" target="_blank"
                                           title="{{ $item->t_name }}">{{ $item->t_name }}</a></li>
                                @endforeach
                                <div style="clear:both;"></div>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="box-75 box-content box-75-mb">
                    <div class="results mb10 mt10">
                        <b>{{ $courses->count() }}</b> khoá học
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
