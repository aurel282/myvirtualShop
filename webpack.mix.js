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
    .sass('resources/sass/app.scss', 'public/css');

//semantic css
mix.styles([
    'resources/less/package_css/main.css',
    'resources/less/package_css/daterangepicker.css'
], 'public/css/main.css');

//specific
mix.scripts([
    // 'resources/js/scripts/daterangepicker.min.js',
    'resources/js/scripts/setDates.js',
    'resources/js/scripts/daterange.js',
], 'public/js/allDates.js');

//global
mix.scripts([
    'resources/js/scripts/sortable_list.js',
    'resources/js/scripts/main-menu.js',
    'resources/js/scripts/timetableEdit.js',
], 'public/js/global.js');
