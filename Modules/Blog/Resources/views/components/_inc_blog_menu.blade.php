<div class="blog_menu">
    <div class="container">
        <ul>
            <li class="{{ \Request::route()->getName() == 'get_blog.home' ? 'active' : '' }}"><a href="{{ route('get_blog.home') }}" title="Home Blog">Home</a></li>
            @foreach($menuBlog as $item)
                <li class="{{ \Request::segment(2) == $item->m_slug.'-m' ? 'active' : '' }}"><a href="{{ route('get_blog.render',['slug' => $item->m_slug.'-m']) }}" title="{{ $item->m_name }}">{{ $item->m_name }}</a></li>
            @endforeach
            <div class="clear"></div>
        </ul>
    </div>
</div>
