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
        <script>
            var URL_SOCIAL = '{{ route("post.social") }}'
        </script>
        <meta property="og:image" content="https://123code.net/images/social.png" />
        <meta property="og:image:height" content="315" />
        <meta property="og:image:width" content="600" />
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
    <script>
        var URL_PAY = '{{ route('get_user.pay') }}'
    </script>
    @yield('script')
</html>
