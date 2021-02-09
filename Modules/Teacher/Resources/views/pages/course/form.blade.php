<style>
    .text-wrap .example .form-group {
        margin-bottom: 1rem;
    }
    .tab-course-content .lists .item{
        border: 1px solid #dedede;
        margin-bottom: 10px;
        padding: 10px;
    }
    .tab-course-content .lists .item p{
        margin-bottom: 0.2rem;
    }
    .tab-course-content .lists .item p:last-child span{
        font-size: 13px;
        color: #031b4e;
        font-weight: 700;
    }
</style>
<form class="form-horizontal" autocomplete="off" method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-1">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Thông tin cơ bản</a></li>
                                        @if(isset($course))
                                            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Nội dung khoá học</a></li>
                                        @endif
                                        <li class="nav-item"><a href="#tab3" class="nav-link " data-toggle="tab">Giới thiệu</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="required">Name <span>(*)</span></label>
                                            <input type="text" class="form-control keypress-count" value="{{ old('c_name',$course->c_name ?? '') }}"
                                                   data-title-seo=".title_seo" data-slug=".slug" name="c_name" >
                                            @if($errors->first('c_name'))
                                                <span class="text-danger">{{ $errors->first('c_name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="required">Slug <span>(*)</span></label>
                                            <input type="text"  class="form-control slug"  name="c_slug" value="{{ old('c_slug',$course->c_slug ?? '') }}">
                                            @if($errors->first('c_slug'))
                                                <span class="text-danger">{{ $errors->first('c_slug') }}</span>
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

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="required">Price <span>(*)</span></label>
                                                    <input type="text"  class="form-control price"  name="c_price" value="{{ old('c_price',number_format($course->c_price ?? 0,0,'.',',')) }}">
                                                    @if($errors->first('c_price'))
                                                        <span class="text-danger">{{ $errors->first('c_price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="required">Sale <span>(*)</span></label>
                                                    <input type="number"  class="form-control "   name="c_sale" value="{{ old('c_sale',$course->c_sale ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="required">Category <span>(*)</span></label>
                                                    <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                                                        <select name="c_category_id" class="form-control SlectBox SumoUnder"  tabindex="-1">
                                                            @foreach($categories as $category)
                                                                <option title="{{ $category->c_name }}" value="{{ $category->id }}">{{ $category->c_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->first('c_category_id'))
                                                        <span class="text-danger">{{ $errors->first('c_category_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="required">Level <span>(*)</span></label>
                                                    <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                                                        <select name="c_level" class="form-control SlectBox SumoUnder"  tabindex="-1">
                                                            @foreach($level as $key => $item)
                                                                <option title="{{ $item }}" {{ ($course->c_level ?? 0) == $key ? "selected" : "" }} value="{{ $key }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="required">Total time <span>(*)</span></label>
                                            <input type="number"  class="form-control"   name="c_total_time" value="{{ old('c_total_time',$course->c_total_time ?? '') }}">
                                        </div>

                                    </div>
                                    @if(isset($course))
                                    <div class="tab-pane" id="tab2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="tab-course-content">
                                                    <div class="lists" id="tab-content-course">
                                                        @foreach($courseContent as $item)
                                                            <div class="item">
                                                                <p>{{ $item->cc_name }}</p>
                                                                <p>
                                                                    <span class="la la-video"> {{ $item->cc_total_video }} Bideo</span>
                                                                    <span class="fa fa-question-circle"> {{ $item->cc_total_question }} Bài tập</span>
                                                                </p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="required">Tiêu đề <span>(*)</span></label>
                                                            <input type="text" class="form-control" value="" name="cc_name" id="nameCourse">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="required">Tổng số video <span>(*)</span></label>
                                                            <input type="text" class="form-control" value="" name="cc_total_video" id="videoCourse">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="required">Bài tập <span>(*)</span></label>
                                                            <input type="text" class="form-control" value="" name="cc_total_question" id="questionCourse">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label for="exampleInputEmail1" class="required">Mô tả nội dung <span>(*)</span></label>
                                                <textarea name="cc_content" class="form-control" id="contentCourse" cols="30" rows="4"></textarea>
                                            </div>
                                            <div class="com-sm-12" style="margin-top: 20px;">
                                                <a href="{{ route('get_teacher.course_content.create', $course->id) }}" class="btn btn-primary js-course-content">Thêm mới</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="tab-pane" id="tab3">
                                        <textarea name="c_about" class="form-control" id="" cols="30" rows="10">{{ $course->c_about ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <label for="exampleInputEmail1"> Banner </label>
                        <input type="file" data-type="avatar" class="filepond" name="avatar">
                        <input type="hidden" name="c_avatar" id="avatar_uploads">
                    </div>
                    @if(isset($course->c_avatar))
                        <p>
                            <img src="{{ pare_url_file($course->c_avatar) }}" alt="" style="width: 100%;height: auto">
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
