@extends('user::layouts.app_master_user')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop
@section('content')
    @include('user::components._inc_menu_user')
    <div class="container">
        <div class="pages_user mt20">

        </div>
    </div>
@stop
