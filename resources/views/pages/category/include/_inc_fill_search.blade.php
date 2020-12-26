<div class="fill-search">
    <div class="container">
        <form action="{{ Request::fullUrl() }}" id="form-search" name="form-search">
            <a href="javascript:" class="btn-listing-filter"><i class="fa fa-filter"></i> Lọc kết quả</a>
            <a href="" class="checkbox active"> <span>Học qua video</span> </a>
            <select class="form-control" id="facet-time" name="time">
                <option value="">Theo thời lượng</option>
                <option value="1" {{ Request::get('time') == 1 ? "selected" : "" }}>Dưới 3 tiếng</option>
                <option value="2" {{ Request::get('time') == 2 ? "selected" : "" }}>3 - 24 tiếng</option>
            </select>
            <select class="form-control" id="facet-level" name="level">
                <option value="">Theo trình độ</option>
                @foreach($level as $key => $lev)
                    <option value="{{ $key }}" {{ Request::get('level') == $key ? "selected" : "" }}>{{ $lev }}</option>
                @endforeach
            </select>
            <div class="field-sort">
                <label>Sắp xếp:</label>
                <select class="form-control" id="sort" name="sort">
                    <option selected="" value="new">Mới nhất</option>
                    <option value="feature">Nổi bật</option>
                    <option value="promotion">% khuyến mãi</option>
                </select>
            </div>
        </form>
    </div>
</div>
