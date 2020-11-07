<div class="menu_user">
    <div class="container">
        <ul>
            @foreach(config('user.menu') as $menu)
                <li>
                    <a data-pjax href="{{ route($menu['route']) }}" title="{{ $menu['title'] }}">
                        <i class="{{ $menu['icon'] }}"></i>
                        {{ $menu['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
