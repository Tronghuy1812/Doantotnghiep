<section class="tags_hot">
    <div class="container">
        <div class="section_title ">
            <h2 class="heading-h2 heading-before">Từ khoá nổi bật</h2>
        </div>
        <div class="lists js-tags-home owl-carousel owl-theme">
            @foreach($tags as $item)
                <a href="{{ route('get.course.render',['slug' => $item->t_slug.'-t']) }}" target="_blank" title="{{ $item->t_name }}">{{ $item->t_name }}</a>
            @endforeach
            <div class="clear"></div>
        </div>
    </div>
</section>
