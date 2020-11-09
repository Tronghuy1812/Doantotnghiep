<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Blog</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('style')
    </head>
    <body>
        <div class="line" style="height: 20px;background-color: #f2f2f2"></div>
        @include('blog::components._inc_blog_header')
        @include('blog::components._inc_blog_menu')
        <div class="clear"></div>
        <div class="main_content">
            @yield('content')
        </div>
        @include('blog::components._inc_blog_footer')
        <div class="line" style="background: #121a21;color: #8d8e92;font-size: 13px;    padding: 14px 25px;overflow: hidden;"></div>
    </body>
</html>
