@extends('user::layouts.app_master_user')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop
@section('content')
    @include('user::components._inc_menu_user')
    <div class="container">
        <div class="pages_user">
            <div class="update_info">
                <div class="info_nav">
                    <a data-pjax href="{{ route('get_user.info') }}" title="Thông tin">Thông tin</a>
                    <a data-pjax href="{{ route('get_user.info.edit',['id' => get_data_user('web')]) }}" class="active" title="Cập nhật">Cập nhật</a>
                </div>
                <div class="info_content mt20">
                    @include('user::pages.info.include._inc_info')
                </div>
            </div>
        </div>
    </div>
@stop
