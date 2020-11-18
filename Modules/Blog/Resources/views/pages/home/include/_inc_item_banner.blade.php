@if(isset($article) && $article)
    <div class="item">
        <a href="{{ route('get_blog.render',['slug' => $article->a_slug.'-a']) }}" title="{{ $article->a_name }}" class="thumb">
            <img src="{{ pare_url_file($article->a_avatar) }}" alt="{{ $article->a_name }}">
        </a>
        <div class="info">
            @if(isset($article->menu))
                <h5><a href="{{ route('get_blog.render',['slug' => $article->menu->m_slug.'-m']) }}" title="{{ $article->menu->m_name }}">{{ $article->menu->m_name }}</a></h5>
            @endif
            <h4><a href="{{ route('get_blog.render',['slug' => $article->a_slug.'-a']) }}" title="{{ $article->a_name }}">{{ $article->a_name }}</a></h4>
            <p>{{ $article->created_at->format("d/m/Y") }}</p>
        </div>
    </div>
@endif
