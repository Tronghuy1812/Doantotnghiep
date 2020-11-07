<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Tiêu đề <span>(*)</span></label>
                        <input type="text" class="form-control" value="{{ old('cc_name',$courseContent->cc_name ?? '') }}" name="cc_name" id="nameCourse">
                        @if($errors->first('cc_name'))
                            <span class="text-danger">{{ $errors->first('cc_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Tổng số video <span>(*)</span></label>
                        <input type="text" class="form-control" value="{{ old('cc_total_video',$courseContent->cc_total_video ?? '') }}" name="cc_total_video" id="videoCourse">
                        @if($errors->first('cc_total_video'))
                            <span class="text-danger">{{ $errors->first('cc_total_video') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Bài tập <span>(*)</span></label>
                        <input type="text" class="form-control" value="{{ old('cc_total_question',$courseContent->cc_total_question ?? '') }}" name="cc_total_question" id="questionCourse">
                        @if($errors->first('cc_total_question'))
                            <span class="text-danger">{{ $errors->first('cc_total_question') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Mô tả nội dung <span>(*)</span></label>
                        <textarea name="cc_content" class="form-control" id="contentCourse" cols="30" rows="4">{{ old('cc_content',$courseContent->cc_content ?? '') }}</textarea>
                        @if($errors->first('cc_content'))
                            <span class="text-danger">{{ $errors->first('cc_content') }}</span>
                        @endif
                    </div>
                    <input type="hidden" name="cc_course_id" value="{{ $id }}">
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Action <span>(*)</span></label>
                        <div>
                            <button class="btn btn-info"><i class="la la-save"></i> Save</button>
                            <button class="btn btn-success"><i class="la la-check-circle"></i> Save & Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
