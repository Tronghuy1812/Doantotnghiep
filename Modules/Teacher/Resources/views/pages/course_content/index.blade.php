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
                    <a href="{{ route('get_teacher.course_content.create', $id) }}" class="btn btn-info  mr-2">Thêm mới <i class="la la-plus-circle"></i></a>
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
                                <li><a href="{{ route('get_teacher.course_content.index',$id) }}" class="nav-link active">Nội dung khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_video.index', $id) }}"  class="nav-link ">Video khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_vote.index', $id) }}"  class="nav-link ">Đánh giá khoá học</a></li>
                                <li><a href="{{ route('get_teacher.course_question.index', $id) }}"  class="nav-link ">Câu hỏi và trả lời</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body main-content-body-right border">
                        <div class="tab-content">
                            <div class="tab-pane js-tab-pane active" id="tab4">
                                <div class="tab-course-content">
                                    <div class="lists" id="tab-content-course">
                                        @foreach($courseContent as $item)
                                            <div class="item">
                                                <div class="item-icon"><i class="la la-bars"></i></div>
                                                <div class="item-content">
                                                    <p>{{ $item->cc_name }}</p>
                                                    <p>
                                                        <span class="la la-video"> {{ $item->cc_total_video }} Bideo</span>
                                                        <span class="fa fa-question-circle"> {{ $item->cc_total_question }} Bài tập</span>
                                                    </p>
                                                </div>
                                                <div class="item-action">
                                                    <a href="{{ route('get_teacher.course_content.edit', ['id' => $id,'contentId' => $item->id]) }}" class="btn btn-xs btn-info"><i class="la la-edit"></i></a>
                                                    <a href="{{ route('get_teacher.course_content.delete', ['id' => $id,'contentId' => $item->id]) }}" class="btn btn-xs js-delete btn-danger"><i class="la la-trash"></i></a>
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
