<div class="tab-nav">
    <a data-pjax-nav href="{{ route('get_user.transaction.view_course', ['idTransaction' => $idTransaction,'idCourse' => $idCourse]) }}"
       data-class-element=".tab-nav-item" class="tab-nav-item js-tab-nav-item {{ \Request::route()->getName() == 'get_user.transaction.view_course' ? 'active' : '' }}" >Dàn bài khoá học</a>
{{--    <a  data-pjax-nav href="{{ route('get_user.transaction.view', $idTransaction) }}"--}}
{{--       data-class-element=".tab-nav-item" class="tab-nav-item js-tab-nav-item">Tài liệu</a>--}}
    <a data-pjax-nav href="{{ route('get_user.transaction.vote', ['idTransaction' => $idTransaction,'idCourse' => $idCourse]) }}"
       data-class-element=".tab-nav-item"class="tab-nav-item js-tab-nav-item {{ \Request::route()->getName() == 'get_user.transaction.vote' ? 'active' : '' }}">Nhận xét khoá học</a>
</div>
