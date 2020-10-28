<div class="teacher-course">
    <div class="container">
        <h4 class="g-title mt20">Các khoá học giảng dạy</h4>
        <div class="box-content">
            <div class="lists mt20" style="margin: -10px">
                @for ($i = 1 ; $i <= 12 ; $i++)
                    <div class="item list-course item-4-0  mb20">
                        <div class="box-course" style="margin: 10px">
                            <div class="avatar">
                                <div class="img">
                                    <a href="">
                                        <img src="{{ asset('images/thumb.jpg') }}" alt="">
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
                                    <a href="">1212112121</a>
                                </h3>
                                <p class="info-auth">
                                    <span class="icon"><i class="fa fa-user-md"></i></span> <span class="name">Name</span>
                                </p>
                                <p class="info-auth">
                                    <span class="icon"><i class="fa fa-briefcase"></i></span> <span class="name">Job</span>
                                </p>
                                <p class="flex flex-jc-sb mt10">
                                    <a href="" class="video">
                                        <i class="fa fa-play-circle"></i> Học thử
                                    </a>
                                    <span class="price">Miễn phí</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endfor

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
