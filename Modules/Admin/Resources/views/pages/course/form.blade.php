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
                                                    <input type="number"  class="form-control"   name="c_price" value="{{ old('c_price',$course->c_price ?? '') }}">
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
                                                    <label for="exampleInputEmail1" class="required">Teacher <span>(*)</span></label>
                                                    <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                                                        <select name="c_teacher_id" class="form-control SlectBox SumoUnder" tabindex="-1">
                                                            @foreach($teachers as $teacher)
                                                                <option title="{{ $teacher->t_name }}" value="{{ $teacher->id }}">{{ $teacher->t_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->first('c_teacher_id'))
                                                        <span class="text-danger">{{ $errors->first('c_teacher_id') }}</span>
                                                    @endif
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
                                                <a href="{{ route('get_admin.course_content.create', $course->id) }}" class="btn btn-primary js-course-content">Thêm mới</a>
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
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">SEO <a href="" class="js-action-seo" style="float: right"><i class="la la-edit"></i> Edit</a></h4>
                    <div class="view-seo">
                        <a href="" class="view-seo-title title_seo">It is Very Easy to Customize and it uses in your website apllication.</a>
                        <p class="view-seo-slug">It is Very Easy to Customize and it uses in your website apllication. <span class="slug">121212121</span></p>
                        <p class="mb-2 view-seo-description">It is Very Easy to Customize and it uses in your website apllication.</p>
                    </div>
                </div>
                <div class="card-body pt-3 box-seo hide">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title SEO <span>(*)</span></label>
                        <input type="text" class="form-control title_seo"  value="{{ old('c_title_seo', $course->c_title_seo ?? '') }}" name="c_title_seo" id="inputName" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description SEO <span>(*)</span></label>
                        <input type="text" class="form-control" name="c_description_seo" value="{{ old('c_description_seo', $course->c_description_seo ?? '') }}" id="inputName" placeholder="">
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
                        <label for="exampleInputEmail1"> Status <span>(*)</span></label>
                        <div class="SumoSelect js-sumo-select sumo_somename" tabindex="0" role="button" aria-expanded="true">
                            <select name="c_status" class="form-control SlectBox SumoUnder"  tabindex="-1">
                                <option title="Public" value="1">Public</option>
                                <option title="hide" value="0">Hide</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="" for="exampleInputEmail1"> Hot </label>
                        <div class="form-group">
                            <label class="box-checkbox"> Nổi bật
                                <input type="radio" name="c_hot" {{ ($course->c_hot ?? 0) == 1 ? 'checked' : '' }}  value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="box-checkbox"> Không nổi bật
                                <input type="radio" name="c_hot" {{ ($course->c_hot ?? 0) ==  0 ? 'checked' : '' }} value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label class="" for="exampleInputEmail1"> Position </label>
                        <div class="form-group">
                            <label class="box-checkbox"> Nổi bật trang chủ
                                <input type="checkbox" name="c_position_1" {{ ($course->c_position_1 ?? 0) == 1 ? 'checked' : '' }} value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  box-shadow-0 ">
                <div class="card-body pt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Avatar </label>
                        <input type="file" class="filepond" name="avatar">
                        <input type="hidden" name="c_avatar" value="{{ $course->c_avatar ?? '' }}" id="avatar_uploads">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
