<section>
    <div class="box-sidebar">
        <h2 class="box-sidebar-title">Chủ đề hót</h2>
        <ul class="b-s-tags">
            <ul>
                @foreach($tagsHot  as $item)
                    <li><a href="{{ route('get.course.render',['slug' => $item->t_slug.'-t']) }}" title="{{ $item->t_name }}">{{ $item->t_name }}</a></li>
                @endforeach
            </ul>
            <div style="clear:both;"></div>
        </ul>
    </div>
</section>
