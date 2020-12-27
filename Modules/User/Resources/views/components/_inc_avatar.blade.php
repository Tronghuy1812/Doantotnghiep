<div class="box-avatar">
    <a href="" class="avatar">
        <img src="{{ pare_url_file(get_data_user('web','avatar')) }}" alt="">
    </a>
    <p><b>{{ get_data_user('web','name') }}</b></p>
    <p><b>{{ get_data_user('web','job') }}</b></p>
    <p><a href="{{ route('get.logout') }}" title="Đăng xuất">Đăng xuất</a></p>
</div>
