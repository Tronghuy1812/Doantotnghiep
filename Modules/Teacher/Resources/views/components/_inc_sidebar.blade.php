<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="/"><img src="{{ asset('img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="/"><img src="{{ asset('img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="/"><img src="{{ asset('img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="/"><img src="{{ asset('img/brand/favicon-white.png') }}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <ul class="side-menu">
            @foreach(config('setting_teacher.sidebar') as $menus)
                <li class="slide">
                    <a class="side-menu__item" {{ isset($menus['sub']) ? 'data-toggle=slide' : '' }}
                       href="{{  isset($menus['sub']) ? '#' : route($menus['route']) }}" title="{{ $menus['name'] }}">
                        <span class="side-menu__label"><i class="{{ $menus['class-icon'] }}"></i> {{ $menus['name'] }}</span>
                        @if(isset($menus['sub']))
                            <i class="fa fa-chevron-down"></i>
                        @endif
                    </a>
                    @if(isset($menus['sub']))
                        <ul class="slide-menu">
                            @foreach($menus['sub'] as $menu)
                                <li><a class="slide-item" href="{{ route($menu['route']) }}" title="{{ $menu['name'] }}"> {{ $menu['name'] }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>

{{--                <li class="slide">--}}
{{--                    <a class="side-menu__item" href="index">--}}
{{--                        <span class="side-menu__label"><i class="la la-tachometer-alt"></i> Tổng quan</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            @endforeach

{{--            <li class="slide">--}}
{{--                <a class="side-menu__item" data-toggle="slide" href="index.html#">--}}
{{--                    <span class="side-menu__label"><i class="la la-book-open"></i> Khoá học</span>--}}
{{--                    <i class="angle fa fa-chevron-down"></i>--}}
{{--                </a>--}}
{{--                --}}
{{--            </li>--}}

{{--            <li class="side-item side-item-category">WEB APPS</li>--}}
        </ul>
    </div>
</aside>
