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
mix.styles([
    'resources/css/app.css',
], 'public/assets/css/app.css');
mix.js(['resources/js/init-alpine',
    'resources/js/charts-bars.js',
    'resources/js/charts-pie.js',
    'resources/js/charts-lines.js',
    'resources/js/focus-trap.js',
], 'public/assets/js/app.js')
