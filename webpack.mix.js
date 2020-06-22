const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/alerts.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/profile.js', 'public/js')
    .js('resources/js/ajax.js', 'public/js')
    .js('resources/js/category.js', 'public/js')
    .js('resources/js/post.js', 'public/js')
    .js('resources/js/functions.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .copyDirectory('resources/views/admin/metronic', 'public/metronic');
