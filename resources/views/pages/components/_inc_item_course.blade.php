
    <div class="item list-course item-4-20 mr20 box-course mb20">
        <div class="avatar">
            <div class="img">
                <a href="{{ route('get.course.render',['slug' => $course->c_slug.'-cr']) }}" title="{{ $course->c_name }}">
                    <img src="{{ pare_url_file($course->c_avatar) }}" alt="{{ $course->c_name }}">
                </a>
                <div class="img_badget">
                    <p class="flex flex-jc-sb pl10 pr10">
                        <span><i class="fa fa-play-circle"></i> {{ $course->c_total_video ?? 0 }}</span>
                        <span><i class="fa fa-star"></i> 0</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="info">
            <h3 class="title">
                <a href="{{ route('get.course.render',['slug' => $course->c_slug.'-cr']) }}" title="{{ $course->c_name }}">{{ $course->c_name }}</a>
            </h3>
            <p class="info-auth">
                <span class="icon"><i class="fa fa-user-md"></i></span>
                <span class="name">{{ $course->teacher->t_name  ?? "[N\A]"  }}</span>
            </p>
            <p class="info-auth" style="min-height: 42px">
                <span class="icon"><i class="fa fa-briefcase"></i></span>
                <span class="name">{{ $course->teacher->t_job ?? "[N\A]" }}</span>
            </p>
            <p class="flex flex-jc-sb mt10">
                <a href="" class="video">
                    <i class="fa fa-play-circle"></i> Học thử
                </a>
                @if($course->c_price > 0)
                    <span class="price">{{ number_format($course->c_price,0,',','.') }} đ</span>
                @else
                    <span class="price">Miễn phí</span>
                @endif
            </p>
        </div>
    </div>
