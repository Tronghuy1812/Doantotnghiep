@extends('teacher::layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Course</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ View</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pr-1 mb-3 mb-xl-0">
                    <a href="{{ route('get_teacher.course_question.create', $id) }}" class="btn btn-info  mr-2">Thêm mới <i class="la la-plus-circle"></i></a>
                    <a href="{{ route('get_teacher.course.index') }}" class="btn btn-danger mr-2">Quay lại <i class="la la-undo"></i></a>
                </div>
            </div>
        </div>
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">
                <div class="panel panel-primary tabs-style-2">
                    <div class=" tab-menu-heading">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs main-nav-line">
                                <li><a href="{{ route('get_teacher.course_content.index',['id' => $id]) }}" class="nav-link" >Nội dung khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_video.index',['id' => $id]) }}"  class="nav-link">Video khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_vote.index', $id) }}"  class="nav-link ">Đánh giá khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_question.index', $id) }}"  class="nav-link active">Câu hỏi và trả lời</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body main-content-body-right border">
                        <div class="tab-content">
                            <div class="tab-pane js-tab-pane active">
                                <div class="tab-course-content">
                                    <div class="lists" id="tab-content-course">
                                        @foreach($questions as $item)
                                            <div class="item">
                                                <div class="item-icon"><i class="la la-bars"></i></div>
                                                <div class="item-content">
                                                    <p>{{ $item->q_name }}</p>
                                                </div>
                                                <div class="item-content" style="width: 50%">
                                                    <p>Danh sách đáp án</p>
                                                    @if(isset($item->answers) && !$item->answers->isEmpty())
                                                        @php
                                                            $correctsAnswers = isset($item->correctsAnswers) ? $item->correctsAnswers : [];
                                                            if($correctsAnswers && !$correctsAnswers->isEmpty())
                                                            {
                                                                $correctsAnswers = $correctsAnswers->pluck('ca_answer_id')->toArray();
                                                            }else{
                                                                $correctsAnswers = [];
                                                            }
                                                        @endphp
                                                        <ol style="padding-left: 0;">
                                                            @foreach($item->answers as $key => $answer)
                                                                <li style="list-style: none">
                                                                    <p style="display: flex;justify-content: space-between">
                                                                        <span style="width: 130px">Câu {{  $key + 1 }}: {{ $answer->a_name }}</span>
                                                                        <a style="text-align: right"  href="{{ route('get_teacher.course_question.success',
                                                                    ['id' => $id,'answerId' => $answer->id,'questId' => $item->id]) }}">
                                                                            <b class="{{ in_array($answer->id, $correctsAnswers ?? []) ? "text-danger" : "" }}">
                                                                                {!! in_array($answer->id, $correctsAnswers ?? []) ? "Đáp án đúng" : "Chọn đáp án đúng" !!}</b>
                                                                        </a>
                                                                    </p>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    @endif
                                                </div>
                                                <div class="item-action">
                                                    <a href="{{ route('get_teacher.course_question.edit', ['id' => $id,'questId' => $item->id]) }}" class="btn btn-xs"><i class="la la-edit"></i></a>
                                                    <a href="{{ route('get_teacher.course_question.delete', ['id' => $id,'questId' => $item->id]) }}" class="btn btn-xs js-delete"><i class="la la-trash"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
