<div class="blog_menu">
    <div class="container">
        <ul>
            <li class="active"><a href="">Home</a></li>
            @foreach($menuBlog as $item)
                <li class=""><a href="{{ route('get_blog.render',['slug' => $item->m_slug.'-m']) }}" title="{{ $item->m_name }}">{{ $item->m_name }}</a></li>
            @endforeach
            <div class="clear"></div>
        </ul>
    </div>
</div>
