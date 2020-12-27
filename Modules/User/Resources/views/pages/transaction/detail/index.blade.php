@extends('user::layouts.app_master_user')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop
@section('content')
    @include('user::components._inc_menu_user')
    <div class="container" id="pjax-pages-page">
        <div class="pages_user mt20">
            <div class="box-tab">
                @include('user::pages.transaction.detail.include._inc_tab_nav',['idTransaction' => $idTransaction,'idCourse' => $idCourse])
                <div class="tab-content" id="pjax-pages-page-tab">
                    <div class="box-content course-content">
                        <div class="lists">
                            @foreach($courseContent as $item)
                                <div class="item js-load-content-course">
                                    <div class="item-info">
                                        <h6>{{ $item->cc_name }}</h6>
                                        <p>
                                            <span><i class="fa fa-play-circle"></i> {{ count($item->videos ?? [])  }} Video</span>
                                            <span><i class="fa fa-question-circle"></i> {{ $item->cc_total_question }} Bài tập</span>
                                        </p>
                                    </div>
                                    @if(isset($item->videos) && !$item->videos->isEmpty())
                                        <div class="item-content" style="display: block">
                                            @foreach($item->videos as $key => $item)
                                                <p>Bài : {{ ($key + 1) }} {{ $item->cv_name }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
