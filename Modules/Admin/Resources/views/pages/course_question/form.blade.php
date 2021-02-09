<form class="form-horizontal" autocomplete="off" method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Câu hỏi <span>(*)</span></label>
                        <input type="text" class="form-control" value="{{ old('q_name',$question->q_name ?? '') }}"
                               name="q_name" id="nameCourse">
                        @if($errors->first('q_name'))
                            <span class="text-danger">{{ $errors->first('q_name') }}</span>
                        @endif
                    </div>
                    <input type="hidden" name="q_course_id" value="{{ $id }}">
                </div>
            </div>
            <div class="card  box-shadow-0">
                <div class="card-body pt-3" id="js-box-question">
                    <h4>Câu trả lời và đáp án</h4>
                    @if(isset($answers) && !$answers->isEmpty())
                        @foreach($answers as $key => $item)
                        <div class="row {{ $key == 0 ? 'clone' : '' }}" style="display: flex;align-items: center">
                            <div class="form-group col-sm-8">
                                <textarea type="text" class="form-control" name="a_name[]"
                                          placeholder="Nhập câu trả lời">{{ $item->a_name }}</textarea>
                            </div>
                            <div class="form-group col-sm-4" style="display: flex;align-items: center">
                                <a href="" class="js-remove-question" style="margin-left: 10px">Remove</a>
                            </div>
                            <input type="hidden" name="answersCorrect[]" value="{{ $item->id }}">
                        </div>
                        @endforeach
                    @else
                        <div class="row clone" style="display: flex;align-items: center">
                            <div class="form-group col-sm-8">
                                <textarea type="text" class="form-control" name="a_name[]"
                                          placeholder="Nhập câu trả lời"></textarea>
                            </div>
                            <div class="form-group col-sm-4" style="display: flex;align-items: center">
                                <a href="" class="js-remove-question" style="margin-left: 10px">Remove</a>
                            </div>
                            <input type="hidden" name="answersCorrect[]" value="">
                        </div>
                    @endif
                    <a href="" class="js-add-question">Thêm mới câu trả lời</a>
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
