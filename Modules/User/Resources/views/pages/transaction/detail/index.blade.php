@extends('user::layouts.app_master_user')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop
@section('content')
    @include('user::components._inc_menu_user')
    <div class="container" id="pjax-pages-page">
        <div class="pages_user mt20">
            <div class="box-tab">
                @include('user::pages.transaction.detail.include._inc_tab_nav',['idTransaction' => $idTransaction,'idCourse' => $idCourse])
                <div class="tab-content" id="pjax-pages-page-tab">
                    Nội dung khoá học
                </div>
            </div>
        </div>
    </div>
@stop
