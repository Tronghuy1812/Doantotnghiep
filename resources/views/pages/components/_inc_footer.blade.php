<footer>
    <div class="footer-top">
        <div class="container">
            <div class="lists lists-mb">
                <div class="item item-4">
                    <h4 class="title">KẾT NỐI VỚI KYNA</h4>
                    <p class="item-social">
                        <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="" class="google"><i class="fa fa-google"></i></a>
                    </p>
                    <p class="item-contact">
                        <span>Hotline</span>
                        <a href="">{{ $configuration->hotline ?? '0986.420.994' }}</a>
                    </p>
                    <p class="item-contact">
                        <span>Email</span>
                        <a href="">{{ $configuration->email ?? 'phupt.humg.94@gmail.com' }}</a>
                    </p>
                </div>
                <div class="item-4 item">
                    <h4 class="title">THÔNG TIN KYNA</h4>
                    <ul>
                        <li><a href="">Danh sách khoá học</a></li>
                        <li><a href="">Câu hỏi thường gặp</a></li>
                    </ul>
                </div>
                <div class="item-4 item">
                    <h4 class="title">VỀ KYNA</h4>
                    <ul>
                        <li><a href="">Danh sách khoá học</a></li>
                        <li><a href="">Câu hỏi thường gặp</a></li>
                    </ul>
                </div>
                <div class="item-4 item">
                    <h4 class="title">Page Facebook</h4>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
    <div class="footer-button">
        <span>Copyright © 2020 <a href="">Admin</a>. Designed by <a href="https://www.facebook.com/TrungPhuNA/">TrungPhuNA</a> </span>
        <p>Bạn nào muốn thuê code liên hệ với mình qua facebook <a href="https://www.facebook.com/TrungPhuNA/" target="_blank">tại đây</a> hoạc xem danh sách đồ án có sẵn
            <a href="https://previewcode.net/source-code.html" target="_blank">tại đây</a></p>
        <div class="container">{!! nl2br($configuration->footer_bottom ?? '') !!}</div>
    </div>
</footer>
