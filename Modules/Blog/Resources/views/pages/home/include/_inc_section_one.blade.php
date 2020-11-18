@if(isset($menuPosition))
<div class="section mt20">
    <div class="box-heading">
        <h3 class="heading-h3">
            <a href="{{ route('get_blog.render',['slug' => $menuPosition->m_slug.'-m']) }}" title="{{ $menuPosition->m_name }}">{{ $menuPosition->m_name }}</a>
        </h3>
    </div>
    <div class="box-content mr10">
        <div class="lists">
            @if(isset($menuPosition->articles) && !$menuPosition->articles->isEmpty() && $articles = $menuPosition->articles)
                @foreach($articles as $item)
                    <div class="item item-3-10">
                        <a href="{{ route('get_blog.render',['slug' => $item->a_slug.'-a']) }}" title="{{ $item->a_name }}" class="post-avatar">
                            <img src="{{ pare_url_file($item->a_avatar) }}" alt="{{ $item->a_name }}">
                        </a>
                        <h2 class="post-title">
                            <a href="{{ route('get_blog.render',['slug' => $item->a_slug.'-a']) }}" title="{{ $item->a_name }}">{{ $item->a_name }}</a>
                        </h2>
                        <h6 class="post-desc">{{ $item->a_description }}</h6>
                    </div>
                @endforeach
            @endif
            <div class="clear"></div>
        </div>
    </div>
</div>
@endif
