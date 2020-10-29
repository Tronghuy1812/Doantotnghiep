@include('pages.components.loading._inc_loading_1')
@foreach($courses as $course)
    @include('pages.components._inc_item_course',['course' => $course])
@endforeach
<div class="clear"></div>
