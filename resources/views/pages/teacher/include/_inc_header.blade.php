<div class="teacher-header">
    <div class="container">
        <div class="info">
            <img class="info-avatar" src="https://media-kyna.cdn.vccloud.vn/uploads/user/307503/img/avatar-1595304319.crop-120x120.jpg" alt="">
            <h1 class="info-name">{{ $teacher->t_name }}</h1>
            <h4 class="info-job">{{ $teacher->t_job }}</h4>
            <a href="" class="btn btn-pink btn-radius mt10 mb10">Nhận tin mới của giảng viên</a>
            <div class="info-list mt20">
                @for($i =1 ; $i <= 3; $i ++)
                    <div class="item">
                        <p>Số khoá học</p>
                        <div class="img"></div>
                        <span>122</span>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
