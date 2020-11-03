<section class="section_one">
    <div class="container">
        <div class="section_title ">
            <h2 class="heading-h2 heading-before">Kỹ năng công việc cùng Kyna</h2>
            <p><span style="color: #50ad4e">Kyna</span> và <span style="color: #00b9f2">VietnamWorks</span> giúp bạn nâng tầm sự nghiệp cùng với các khóa học phát triển kỹ năng cho công việc.</p>
        </div>
        <div class="section_tags">
            <div class="lists js-tags owl-carousel owl-theme">
                @foreach($categories as $item)
                    <a href="{{ route('ajax_get.course.by_category', $item->id) }}" class="js-course-by-category" title="{{ $item->c_name }}">{{ $item->c_name }}</a>
                @endforeach
            </div>
        </div>
        <div class="lists lists-course-mb" id="coursesHtml">`
            @include('pages.home.include._inc_course_list',['courses' => $courses])
        </div>
    </div>
</section>
