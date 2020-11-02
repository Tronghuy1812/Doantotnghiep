<div class="pay-left">
    <h3 class="pay-title">Chọn phương thức thanh toán</h3>
    <div class="lists lists-payments">
        @foreach(config('cart.pay_type') as $key => $item)
            <div class="item item-2">
                <label class="box-checkbox js-pay-type">
                    <input type="radio" name="type_pay"  {{ $key == 0 ? "checked" : ""}} value="{{ $item['type'] }}">
                    <b>{{ $item['name'] }}</b>
                    <span class="checkmark"></span>
                </label>
            </div>
        @endforeach
    </div>
    <div style="clear: both"></div>
    <h3 class="pay-title mt15">Thông tin mua hàng</h3>
    <div class="lists lists-info">
        <div class="item item-2">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Name" value="{{ get_data_user('web','name') }}">
            </div>
        </div>
        <div class="item item-2">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email  của bạn" value="{{ get_data_user('web','email') }}">
            </div>
        </div>
        <div class="item item-2">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Phone  của bạn" value="{{ get_data_user('web','phone') }}">
            </div>
        </div>
        <div class="item item-2">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Adress  của bạn" value="{{ get_data_user('web','address') }}">
            </div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>
