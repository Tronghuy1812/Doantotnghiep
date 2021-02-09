@extends('teacher::layouts.master')
@section('content')
    <style>
        .vote i {
            color: #eff0f5;
        }
        .vote i.active {
            color: #f57223;
        }
    </style>
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
                    <a href="{{ route('get_teacher.course_video.create', $id) }}" class="btn btn-info  mr-2">Thêm mới <i class="la la-plus-circle"></i></a>
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
                                <li><a href="{{ route('get_teacher.course_video.index',['id' => $id]) }}"  class="nav-link ">Video khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_vote.index', $id) }}"  class="nav-link active">Đánh giá khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_question.index', $id) }}"  class="nav-link ">Câu hỏi và trả lời</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body main-content-body-right border">
                        <div class="tab-content">
                            <div class="tab-pane js-tab-pane active">
                                <div class="tab-course-content">
                                    <div class="lists" id="tab-content-course">
                                        @foreach($votes as $item)
                                            <div class="item">
                                                <div class="item-icon"><i class="la la-bars"></i></div>
                                                <div class="item-content">
                                                    <p>
                                                        <span class="vote">
                                                            @for ($i = 1 ; $i <= 5 ; $i ++)
                                                                <i class="la la-star {{ $item->v_number >= $i ? 'active' : '' }}"></i>
                                                            @endfor
                                                        </span>
                                                    </p>
                                                    <p>{{ $item->v_content }}</p>
                                                </div>
                                                <div class="item-action">
                                                    <a href="{{ route('get_teacher.course_vote.delete', ['id' => $id,'voteId' => $item->id]) }}" class="btn btn-xs js-delete"><i class="la la-trash"></i></a>
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
