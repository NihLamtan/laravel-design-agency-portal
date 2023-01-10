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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        
    ]).sourceMaps();


mix.postCss('public/frontend-assets/src/css/new-style.css', 'public/frontend-assets/css');
mix.postCss('public/frontend-assets/src/css/slick.css', 'public/frontend-assets/css');

mix.minify(['public/frontend-assets/css/new-style.css', 'public/frontend-assets/css/slick.css']);

mix.js('resources/js/user-app.js', 'public/js')
mix.js('resources/js/global.js', 'public/js')
mix.js('resources/js/admin-app.js', 'public/js')

mix.minify(['public/js/global.js', 'public/js/app.js']);

mix.sass('resources/css/invoice.scss', 'public/css');

