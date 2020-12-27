<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        {!! SEO::generate() !!}
        <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/x-icon"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
        <meta name="google-signin-client_id" content="264409137001-t3k59t8fsgsie5pqag2to9emp9cion5i.apps.googleusercontent.com">
        @yield('style')
    </head>
    <body>
        @include('pages.components.header._inc_header_dt')
        @include('pages.components.header._inc_header_mb')
        @yield('content')
        @include('pages.components._inc_footer')
        @if(!get_data_user('web'))
            @include('pages.components.auth._inc_popup_auth')
        @endif
    </body>
    @yield('script')
</html>
