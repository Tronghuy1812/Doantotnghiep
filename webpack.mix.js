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


// ADMIN
mix.sass('resources/assets/valex/scss/pages/admin_dashboard.scss', 'public/css_admin');


// FRONTEND =====
mix.js('resources/assets/js/pages/home/home.js', 'public/js');
mix.js('resources/assets/js/pages/category/category.js', 'public/js');

// ADMIN
mix.js('resources/assets/valex/js/pages/admin_dashboard.js', 'public/js_admin');


mix.autoload({
    jquery: ['$', 'jQuery', 'window.jQuery'],
});

