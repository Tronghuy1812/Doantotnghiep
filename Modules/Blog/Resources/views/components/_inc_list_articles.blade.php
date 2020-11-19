@forelse($articles ?? [] as $item)
    <div class="item mb10">
        <div class="item-avatar">
            <a href="{{ route('get_blog.render',['slug' => $item->a_slug.'-a']) }}" title="{{ $item->a_name }}">
                <img src="{{ pare_url_file($item->a_avatar)  }}" alt="{{ $item->a_name }}">
            </a>
        </div>
        <div class="item-content">
            <h3>
                <a href="{{ route('get_blog.render',['slug' => $item->a_slug.'-a']) }}" title="{{ $item->a_name }}">{{ $item->a_name }}</a>
            </h3>
            <h5>{{ $item->a_description }}</h5>
        </div>
        <div class="clear"></div>
    </div>
@empty
    <p>Dữ liệu đang được cập nhật</p>
@endforelse
