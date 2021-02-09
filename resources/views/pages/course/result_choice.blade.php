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
                    <h4 class="box-title">Kết quả bài làm của bạn</h4>
                    <div class="box-content">
                        Hiểu về mô hình nến Nhật trong chứng khoán
                        Phân tích các loại mô hình nến trong giai đoạn tăng và giai đoạn giảm
                        Phân tích về các phản ứng của giá theo phương pháp Price Action
                    </div>
                </div>
                <div class="box-section">
                    <h4 class="box-title">Xem lại các kết quả trước dó</h4>
                    <div class="box-content">
                        @if(!$resultsAnswerDashboard->isEmpty())
                            <ul>
                                @foreach($resultsAnswerDashboard as $key => $item)
                                    <li>
                                        <a href="{{ route('get.course.multiple_choice.result_position',[
                                'slug' => $courseDetail->c_slug.'-cr',
                                'position' => $item->id
                                    ]) }}" style="color: {{ $position == $item->id ? '#fb236a' : '#007bff' }}">Lần: <b>{{ $key + 1 }}</b> - Vào
                                            lúc {{ $item->created_at }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Bạn chưa có kết quả nào?</p>
                        @endif
                    </div>
                </div>
                <div class="box-section">
                    <h4 class="box-title">Chú thích kết quả</h4>
                    <div class="box-content">
                        <p style="display: flex;align-items: center">
                            <span
                                style="width: 100px;height: 15px;display: inline-block;border: 1px solid rgb(76, 175, 80);border-radius: 10px;margin-right: 10px"></span>
                            <span>Đáp án đúng</span>
                        </p>
                        <p style="display: flex;align-items: center">
                            <span
                                style="width: 100px;height: 15px;display: inline-block;border: 1px solid red;border-radius: 10px;margin-right: 10px"></span>
                            <span>Đáp án bạn chọn sai</span>
                        </p>
                    </div>
                </div>
                @if(isset($questions) && !$questions->isEmpty())
                    <div class="box-section quiz-main">
                        <h4 class="box-title">Một số bài mẫu trắc nghiệm <a
                                href="{{ route('get.course.multiple_choice',['slug' => $courseDetail->c_slug.'-cr']) }}">Làm
                                thử</a></h4>
                        <div class="box-content">
                            {{--                            {{ print_r($resultsQuestion) }}--}}
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
                                                                    <label class="overlabel
                    {{ array_key_exists($answer->id,$resultsQuestion)  ? 'checked-result-'.$resultsQuestion[$answer->id] : '' }}">
                                                                        <input type="checkbox" class="hide"
                                                                               name="answers[{{ $answer->id }}]"
                                                                               {{ array_key_exists($answer->id,$resultsQuestion) && $resultsQuestion[$answer->id] != 0 ? "checked" : "" }}
                                                                               value="1"> <span
                                                                            class="mark"></span> </label>
                                                                    <div class="boxcheck">
                                                                        <div class="answer-desc textview">
                                                                            <p>{{ $answer->a_name }}</p>
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
