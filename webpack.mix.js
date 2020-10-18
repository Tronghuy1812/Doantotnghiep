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
mix.sass('resources/assets/scss/pages/home/home.scss', 'public/css');
mix.js('resources/assets/js/pages/home/home.js', 'public/js');
mix.autoload({
    jquery: ['$', 'jQuery', 'window.jQuery'],
});

