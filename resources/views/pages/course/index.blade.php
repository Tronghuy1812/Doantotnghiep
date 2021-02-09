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
                <div class="box-section">
                    <h4 class="box-title">Bạn sẽ học được gì?</h4>
                    <div class="box-content">
                        Hiểu về mô hình nến Nhật trong chứng khoán
                        Phân tích các loại mô hình nến trong giai đoạn tăng và giai đoạn giảm
                        Phân tích về các phản ứng của giá theo phương pháp Price Action
                    </div>
                </div>
                <div class="box-section">
                    <h4 class="box-title">Nội dung khoá học</h4>
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
                                    <div class="item-content">
                                        @foreach($item->videos as $key => $item)
                                            <p>Bài : {{ ($key + 1) }} {{ $item->cv_name }}</p>
                                        @endforeach
                                    </div>
                                    @endif
                                    <a href="" class="icon"><i class="fa fa-chevron-down"></i></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="box-section">
                    <h4 class="box-title">Giới thiệu khoá học</h4>
                    <div class="box-content">
                        Đang cập nhật
                    </div>
                </div>
                @if(isset($questions) && !$questions->isEmpty())
                <div class="box-section quiz-main">
                    <h4 class="box-title">Một số bài mẫu trắc nghiệm <a href="{{ route('get.course.multiple_choice',['slug' => $courseDetail->c_slug.'-cr']) }}">Làm thử</a></h4>
                    <div class="box-content">
                        <ul>
                            @foreach($questions as $key => $item)
                            <li data-sectionid="457" class="quiz-section">
                                <div class="quiz-section-title">Câu {{ $key + 1 }}. {{ $item->q_name }}</div>
                                <div class="quiz-section-content">
                                    <div class="item item-question item-choices">
                                        @if(isset($item->answers) && !$item->answers->isEmpty())
                                        <ul class="list btn-group group-theme">
                                            @foreach($item->answers as $item)
                                                <li class="list-item">
                                                    <label class="overlabel">
                                                        <input type="radio" class="hide" name="option-{{ $item->id }}" data-status="1" data-point="1"> <span class="mark"></span> </label>
                                                    <div class="boxcheck">
                                                        <div class="answer-desc textview">
                                                            <p>{{ $item->a_name }}</p>
                                                        </div>
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
                    </div>
                </div>
                @endif
                @if(isset($courseDetail->teacher))
                <div class="box-section teacher">
                    <h4 class="box-title">Thông tin giảng viên <a href="">Chi tiết <i class="fa fa-chevron-right"></i> </a></h4>
                    <div class="box-content">
                        <div class="box">
                            <div class="box-30">
                                <div class="info">
                                    <a href="">
                                        <img src="{{ pare_url_file($courseDetail->teacher->t_avatar) }}" alt="">
                                    </a>
                                    <p class="name"><strong>{{ $courseDetail->teacher->t_name }}</strong></p>
                                    <p class="job"><i class="fa fa-briefcase"></i> {{ $courseDetail->teacher->t_job }}</p>
                                </div>
                            </div>
                            <div class="box-70">
                                <div class="content">
                                    {!! $courseDetail->teacher->t_content !!}
{{--                                    <div class="item">--}}
{{--                                        <p>Chức vụ :</p>--}}
{{--                                        <p>Nguyên giám đốc Chiến lược Công ty Chứng khoán Mirea Asset (Hàn Quốc)</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="item">--}}
{{--                                        <p>Chức vụ :</p>--}}
{{--                                        <p>Nguyên giám đốc Chiến lược Công ty Chứng khoán Mirea Asset (Hàn Quốc)</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="item">--}}
{{--                                        <p>Chức vụ :</p>--}}
{{--                                        <p>Nguyên giám đốc Chiến lược Công ty Chứng khoán Mirea Asset (Hàn Quốc)</p>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="box-section teacher-course">
                    <h4 class="box-title">Khoá học của giảng viên
                        <b style="color: #50ad4e">{{ $courseDetail->teacher->t_name ?? "[N\A]" }}</b>
                        <a href="{{ route('get.teacher.course', $courseDetail->teacher->t_slug ?? '') }}" title="Xem thêm">Xem thêm </a></h4>
                    <div class="box-content">
                        <div class="lists " style="margin: -10px;">
                            @forelse($courses as $item)
                                @include('pages.category.include._item_course',['course' => $item])
                            @empty
                                <p>Dữ liệu chưa được cập nhật</p>
                            @endforelse
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                @include('pages.course.include._inc_course_you',['courses' => $courses])
                @include('pages.course.include._inc_vote',['courseDetail' => $courseDetail,'votes' => $votes,'votesDashboard' => $votesDashboard])
                @include('pages.course.include._inc_box_bottom')
            </div>
            <div class="box-30" id="rightSidebar">
                @include('pages.course.include._inc_box_right',['courseDetail' => $courseDetail,'courseVideo' => $courseVideo])
            </div>
        </div>
    </div>
    @include('pages.course.include._inc_popup_view_course')
@stop

@section('script')
    <script src="{{ asset('js/course.js') }}"></script>
@stop
