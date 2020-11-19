<div class="blog_banner">
    <div class="container">
        <div class="box">
            <div class="box-50 first">
                @include('blog::pages.home.include._inc_item_banner',['article' => $articlesHotOne[0] ?? ''])
            </div>
            <div class="box-50">
                <div class="top">
                    @include('blog::pages.home.include._inc_item_banner',['article' => $articlesHotOne[1] ?? ''])
                </div>
                <div class="bottom">
                    <div class="box">
                        <div class="box-50">
                            @include('blog::pages.home.include._inc_item_banner',['article' => $articlesHotOne[2] ?? ''])
                        </div>
                        <div class="box-50">
                            @include('blog::pages.home.include._inc_item_banner',['article' => $articlesHotOne[3] ?? ''])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
