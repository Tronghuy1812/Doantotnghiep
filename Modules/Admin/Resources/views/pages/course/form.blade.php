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
                                        <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Nội dung khoá học</a></li>
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
                                            <label for="exampleInputEmail1" class="required">Total time <span>(*)</span></label>
                                            <input type="number"  class="form-control"   name="c_total_time" value="{{ old('c_total_time',$course->c_total_time ?? '') }}">
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
                                                    <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="true">
                                                        <select name="c_teacher_id" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                                            <option title="Public" value="1">Public</option>
                                                            <option title="hide" value="0">Hide</option>
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
                                                    <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="true">
                                                        <select name="c_category_id" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                                            <option title="Public" value="1">Public</option>
                                                            <option title="hide" value="0">Hide</option>
                                                        </select>
                                                    </div>
                                                    @if($errors->first('c_category_id'))
                                                        <span class="text-danger">{{ $errors->first('c_category_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <p>dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                        <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime</p>
                                        <p class="mb-0">placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <p>praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,</p>
                                        <p class="mb-0">similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
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
                        <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="true">
                            <select name="c_status" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
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
                        <label for="exampleInputEmail1"> Avatar </label>
                        <input type="file" class="filepond" name="avatar">
                        <input type="hidden" name="c_avatar" id="avatar_uploads">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
