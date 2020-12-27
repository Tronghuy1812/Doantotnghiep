<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card  box-shadow-0">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Name <span>(*)</span></label>
                        <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" value="{{ old('t_name', $teacher->t_name ?? "") }}"
                               data-slug=".slug" name="t_name">
                        @if($errors->first('t_name'))
                            <span class="text-danger">{{ $errors->first('t_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Slug <span>(*)</span></label>
                        <input type="text"  class="form-control slug" id="inputEmail3"  name="t_slug" value="{{ old('t_slug', $teacher->t_slug ?? "") }}">
                        @if($errors->first('t_slug'))
                            <span class="text-danger">{{ $errors->first('t_slug') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Job <span>(*)</span></label>
                        <input type="text"  class="form-control" id="inputEmail3"  name="t_job" value="{{ old('t_job', $teacher->t_job ?? "") }}">
                        @if($errors->first('t_job'))
                            <span class="text-danger">{{ $errors->first('t_job') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Phone <span>(*)</span></label>
                        <input type="text"  class="form-control" id="inputEmail3" name="t_phone" value="{{ old('t_phone', $teacher->t_phone ?? "") }}">
                        @if($errors->first('t_phone'))
                            <span class="text-danger">{{ $errors->first('t_phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tag </label>
                        <select name="tags[]" class="form-control js-select2" tabindex="-1" multiple>
                            @foreach($tags as $tag)
                                <option title="{{ $tag->t_name }}" {{ in_array($tag->id, $tagOld) ? "selected" : "" }} value="{{ $tag->id }}">{{ $tag->t_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Email <span>(*)</span></label>
                        <input type="email"  class="form-control" id="inputEmail3" name="t_email" value="{{ old('t_email', $teacher->t_email ?? "") }}">
                        @if($errors->first('t_email'))
                            <span class="text-danger">{{ $errors->first('t_email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="required">Nội dung <span>(*)</span></label>
                        <textarea name="t_content" id="content" cols="30" rows="5">{!! old('t_content',$teacher->t_content ?? '') !!}</textarea>
                    </div>
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
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Avatar </label>
                        <input type="file" data-type="avatar" class="filepond" name="avatar">
                        <input type="hidden" name="t_avatar" id="avatar_uploads">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
