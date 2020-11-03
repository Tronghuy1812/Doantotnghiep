<div class="menu_user">
    <ul>
        @foreach(config('user.menu') as $menu)
            <li>
                <a href="{{ route($menu['route']) }}" title="{{ $menu['title'] }}">{{ $menu['title'] }}</a>
            </li>
        @endforeach
    </ul>
</div>
