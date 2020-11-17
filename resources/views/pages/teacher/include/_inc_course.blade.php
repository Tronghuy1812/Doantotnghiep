<div class="teacher-course">
    <div class="container">
        <h4 class="g-title mt20">Các khoá học giảng dạy</h4>
        <div class="box-content">
            <div class="lists mt20" style="margin: -10px">
                @foreach($courses as $item)
                    <div class="item list-course item-4-0  mb20">
                        <div class="box-course" style="margin: 10px">
                            <div class="avatar">
                                <div class="img">
                                    <a href="{{ route('get.course.render',['slug' => $item->c_slug.'-cr']) }}" title="{{ $item->c_name }}">
                                        <img src="{{ pare_url_file($item->c_avatar) }}" alt="{{ $item->c_name }}">
                                    </a>
                                    <div class="img_badget">
                                        <p class="flex flex-jc-sb pl10 pr10">
                                            <span><i class="fa fa-star"></i>4.8 (4)</span>
                                            <span><i class="fa fa-play-circle"></i> 25 học viên</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <h3 class="title">
                                    <a href="{{ route('get.course.render',['slug' => $item->c_slug.'-cr']) }}" title="{{ $item->c_name }}">{{ $item->c_name }}</a>
                                </h3>
                                <p class="info-auth">
                                    <span class="icon"><i class="fa fa-user-md"></i></span> <span class="name">{{ $teacher->t_name }}</span>
                                </p>
                                <p class="info-auth">
                                    <span class="icon"><i class="fa fa-briefcase"></i></span> <span class="name">{{ $teacher->t_job }}</span>
                                </p>
                                <p class="flex flex-jc-sb mt10">
                                    <a href="" class="video">
                                        <i class="fa fa-play-circle"></i> Học thử
                                    </a>
                                    @if($item->c_price)
                                        <span class="price">{{ number_format($item->c_price,0,',','.') }}đ</span>
                                    @else
                                        <span class="price">Miễn phí</span>
                                    @endif

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
