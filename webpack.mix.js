const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
// FRONTEND =====
mix.sass('resources/assets/scss/pages/home/home.scss', 'public/css');
mix.sass('resources/assets/scss/pages/category/category.scss', 'public/css');
mix.sass('resources/assets/scss/pages/course/course.scss', 'public/css');
mix.sass('resources/assets/scss/pages/teacher/teacher.scss', 'public/css');
mix.sass('resources/assets/scss/pages/pay/pay.scss', 'public/css');
mix.sass('resources/assets/scss/pages/cart/cart.scss', 'public/css');
mix.sass('resources/assets/scss/pages/user/user.scss', 'public/css');
mix.sass('resources/assets/scss/pages/blog/blog_home.scss', 'public/css');
mix.sass('resources/assets/scss/pages/blog/blog_menu.scss', 'public/css');
mix.sass('resources/assets/scss/pages/blog/blog_article.scss', 'public/css');


// ADMIN
mix.sass('resources/assets/valex/scss/pages/admin_dashboard.scss', 'public/css_admin');


// FRONTEND =====
mix.js('resources/assets/js/pages/home/home.js', 'public/js');
mix.js('resources/assets/js/pages/category/category.js', 'public/js');
mix.js('resources/assets/js/pages/course/course.js', 'public/js');
mix.js('resources/assets/js/pages/teacher/teacher.js', 'public/js');
mix.js('resources/assets/js/pages/cart/cart.js', 'public/js');
mix.js('resources/assets/js/pages/user/user.js', 'public/js');

// ADMIN
mix.js('resources/assets/valex/js/pages/admin_dashboard.js', 'public/js_admin');


mix.autoload({
    jquery: ['$', 'jQuery', 'window.jQuery'],
});

