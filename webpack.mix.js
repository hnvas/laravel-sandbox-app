const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as  well as bundling up all the JS files.
 |
 */

mix.sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/scripts/notify.js',
        'resources/js/scripts/datepicker.js',
        'resources/js/scripts/selectpicker.js',
        'resources/js/scripts/global.js',
    ], 'public/js/all.js')
    .copyDirectory('resources/img', 'public/img');

if (mix.inProduction()) {
    mix.version();
}