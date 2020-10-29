<section class="section_one">
    <div class="container">
        <div class="section_title ">
            <h2 class="heading-h2 heading-before">Kỹ năng công việc cùng Kyna</h2>
            <p><span style="color: #50ad4e">Kyna</span> và <span style="color: #00b9f2">VietnamWorks</span> giúp bạn nâng tầm sự nghiệp cùng với các khóa học phát triển kỹ năng cho công việc.</p>
        </div>
        <div class="section_tags">
            <div class="lists js-tags owl-carousel owl-theme">
                @foreach($categories as $item)
                    <a href="" data-id="{{ $item->id }}" class="js-course-by-category" title="{{ $item->c_name }}">{{ $item->c_name }}</a>
                @endforeach
            </div>
        </div>
        <div class="lists ">
            @foreach($courses as $course)
                @include('pages.components._inc_item_course',['course' => $course])
            @endforeach
            <div class="clear"></div>
        </div>
    </div>
</section>
