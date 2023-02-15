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

const path = require('path'); mix.alias({ ziggy: path.resolve('vendor/tightenco/ziggy/dist.vue') });

mix.js('resources/js/app.js', 'public/js')
    .extract()
    .vue({ version: 3 })
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .version();
