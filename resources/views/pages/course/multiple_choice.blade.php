@extends('pages.layouts.app_master_frontend')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@stop
@section('content')
    @include('pages.course.include._inc_breadcrumb')
    @include('pages.course.include._inc_header_course',['courseDetail' => $courseDetail])
    <div class="container">
        <div class="box" style="position: relative">
            <div class="box-70 mr10">
                @if(isset($questions) && !$questions->isEmpty())
                    <div class="box-section quiz-main">
                        <h4 class="box-title">Một số bài mẫu trắc nghiệm <a
                                href="{{ route('get.course.multiple_choice',['slug' => $courseDetail->c_slug.'-cr']) }}">Làm
                                thử</a></h4>
                        <div class="box-content">
                            <form action="" method="POST" id="myForm">
                                @csrf
                                <ul>
                                    @foreach($questions as $key => $item)
                                        <li data-sectionid="457" class="quiz-section">
                                            <div class="quiz-section-title">Câu {{ $key + 1 }}
                                                . {{ $item->q_name }}</div>
                                            <div class="quiz-section-content">
                                                <div class="item item-question item-choices">
                                                    @if(isset($item->answers) && !$item->answers->isEmpty())
                                                        <ul class="list btn-group group-theme">
                                                            @foreach($item->answers as $answer)
                                                                <li class="list-item">
                                                                    <label class="overlabel">
                                                                        <input type="checkbox" class="hide"
                                                                               name="answers[{{ $answer->id }}]" value="1"> <span
                                                                            class="mark"></span> </label>
                                                                    <div class="boxcheck">
                                                                        <div class="answer-desc textview">
                                                                            <p>{{ $answer->a_name }}</p>
                                                                        </div>
{{--                                                                        <input type="hidden" name="questions[{{ $item->id }}]" value="{{ $answer->id }}">--}}
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <button type="submit" title="Mua ngay" class="btn btn-success btn-radius">Gửi bài
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            <div class="box-30" id="rightSidebar">
                @include('pages.course.include._inc_box_right',['courseDetail' => $courseDetail,'courseVideo' => $courseVideo ?? []])
            </div>
        </div>
    </div>
    @include('pages.course.include._inc_popup_view_course')
@stop

@section('script')
    <script src="{{ asset('js/course.js') }}"></script>
@stop
