<div class="teacher-content">
    <div class="container">
        <div class="box">
            <div class="box-70 mr20">
                <h4 class="g-title">Thông tin giảng viên</h4>
                <div class="content-text mt20">{!! $teacher->t_content !!}</div>
            </div>
            <div class="box-30">
                <h4 class="g-title">Chuyên gia về</h4>
                <ul class="teacher-tag mt20">
                    @foreach($tags as $tag)
                        <li><a href="{{ route('get.course.render',['slug' => $tag->t_slug.'-t']) }}" target="_blank" title="{{ $tag->t_name }}">{{ $tag->t_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
