<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" href="/">
                    <span itemprop="name"><i class="fa fa-home"></i> Trang chủ</span>
                    <meta itemprop="url" content="">
                </a>
                <meta itemprop="position" content="1">
            </li>
            @if (isset($category) && $category)
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="active">
                <span itemprop="name">{{ $category->c_name }}</span>
                <meta itemprop="url" content="">
                <meta itemprop="position" content="2">
            </li>
            @endif
            <div style="clear: both"></div>
        </ul>
    </div>
</div>
