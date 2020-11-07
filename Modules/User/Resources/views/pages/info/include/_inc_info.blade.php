<div class="box">
    <div class="box-15">
        @include('user::components._inc_avatar')
    </div>
    <div class="box-85 ml30">
        <form action="" method="POST" autocomplete="off" data-pjax>
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" {{ !isset($id) ? "disabled='disabled'" : '' }} name="name" class="form-control" value="{{ get_data_user('web','name') }}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" {{ !isset($id) ? "disabled='disabled'" : '' }} name="email" class="form-control" value="{{ get_data_user('web','email') }}">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" {{ !isset($id) ? "disabled='disabled'" : '' }} name="phone" class="form-control" value="{{ get_data_user('web','phone') }}">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" {{ !isset($id) ? "disabled='disabled'" : '' }} name="address" class="form-control" value="{{ get_data_user('web','address') }}">
            </div>
            <div class="form-group">
                <label for="">Job</label>
                <input type="text" {{ !isset($id) ? "disabled='disabled'" : '' }} name="job" class="form-control" value="{{ get_data_user('web','job') }}">
            </div>
            @if(isset($id))
                <div class="form-group">
                    <button type="submit" class="btn btn-pink"><i class="fa fa-save"></i> Cập nhật</button>
                </div>
            @endif
        </form>
    </div>
</div>
