<div class="box-avatar">
    <a href="" class="avatar">
        @if(get_data_user('web','avatar_social'))
            <img src="{{ get_data_user('web','avatar_social') }}" alt="">
        @else
            <img src="{{ pare_url_file(get_data_user('web','avatar')) }}" alt="">
        @endif
    </a>
    <p><b>{{ get_data_user('web','name') }}</b></p>
    <p><b>{{ get_data_user('web','job') }}</b></p>
    <p><a href="{{ route('get.logout') }}" title="Đăng xuất">Đăng xuất</a></p>
</div>
