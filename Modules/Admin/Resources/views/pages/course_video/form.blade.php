<form class="form-horizontal" autocomplete="off" method="POST" action="" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Tiêu đề <span>(*)</span></label>
                        <input type="text" class="form-control" value="{{ old('cv_name',$courseVideo->cv_name ?? '') }}" name="cv_name" id="nameCourse">
                        @if($errors->first('cv_name'))
                            <span class="text-danger">{{ $errors->first('cv_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Content Course <span>(*)</span></label>
                        <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                            <select name="cv_course_content_id" class="form-control SlectBox SumoUnder"  tabindex="-1">
                                <option title="ROOT" value="">__Chọn__</option>
                                @foreach($courseContent as $item)
                                    <option value="{{ $item->id }}" {{ ($courseVideo->cv_course_content_id ?? 0) == $item->id ? "selected" : "" }} >{{ $item->cc_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->first('cv_course_content_id'))
                            <span class="text-danger">{{ $errors->first('cv_course_content_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Link<span>(Nếu có)</span></label>
                        <input type="text" class="form-control" value="{{ old('cv_link',$courseVideo->cv_link ?? '') }}" name="cv_link" id="nameCourse">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">File Video <span>(*)</span></label>
                        <input type="file" class="form-control" name="video">
                        @if(isset($courseVideo) && $courseVideo->cv_path)
                            <p><a href="{{ pare_url_file($courseVideo->cv_path,'uploads_video') }}" download="">{{ $courseVideo->cv_path }}</a></p>
                        @endif
                    </div>
                    <input type="hidden" name="cv_course_id" value="{{ $id }}">
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
