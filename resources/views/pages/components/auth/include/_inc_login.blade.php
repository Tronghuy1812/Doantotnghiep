<div class="auth-form" data-type="login">
    <h4>Đăng nhập</h4>
    <div class="right-content">
{{--        <div class="social flex flex-column">--}}
{{--            <a href="" class="facebook"><i class="fa fa-facebook"></i> Facebook</a>--}}
{{--            <a href="" class="google"><i class="fa fa-google"></i> Google</a>--}}
{{--        </div>--}}
        <p class="mb10">- Hoặc đăng nhập bằng tài khoản Kyna -</p>
        <form action="{{ route('get.login') }}" method="POST" id="formLogin">
            @csrf
            <div class="form-group">
                <span class="icon icon-mail"></span>
                <input type="email" name="email" class="form-control" placeholder="Email  của bạn">
            </div>
            <div class="form-group">
                <span class="icon icon-lock"></span>
                <input type="password" name="password" class="form-control" placeholder="******">
                <div class="password-show js-show-password"><i class="fa fa-eye"></i></div>
            </div>
            <div class="remember-login flex flex-jc-sb">
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ghi nhớ đăng nhập</label>
                </div>
                <a href="" class="forgot-psswrd" data-target="#k-popup-account-reset" data-toggle="modal" data-ajax="" data-push-state="false">Quên mật khẩu?</a>
            </div>
            <div class="form-group mt15">
                <button type="submit" class="btn btn-success js-login w-100" style="border-radius: 5px;">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
