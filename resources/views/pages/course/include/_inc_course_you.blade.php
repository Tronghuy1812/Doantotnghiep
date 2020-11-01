<div class="box-section teacher-course">
    <h4 class="box-title">Khoá học phù hợp với bạn <a href="" title="Xem thêm">Xem thêm </a></h4>
    <div class="box-content">
        <div class="lists " style="margin: -10px;">
            @forelse($courses as $item)
                @include('pages.category.include._item_course',['course' => $item])
            @empty
                <p>Dữ liệu chưa được cập nhật</p>
            @endforelse
            <div class="clear"></div>
        </div>
    </div>
</div>
