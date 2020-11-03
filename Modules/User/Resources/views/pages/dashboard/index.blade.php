@extends('user::layouts.app_master_user')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop
@section('content')
    @include('user::components._inc_menu_user')
    <h2>Tổng quan</h2>
    <div class="container">
        <div class="pages_user">
            <div class="box">
                <div class="box-30">
                    <h2>30</h2>
                </div>
                <div class="box-70">
                    <h2>70</h2>
                </div>
            </div>
        </div>
    </div>
@stop
