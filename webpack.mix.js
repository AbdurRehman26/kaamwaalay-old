let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')

mix.js('resources/assets/js/front-app.js', 'public/js')
   .sass('resources/assets/sass/front/app.scss', 'public/css/front/') //front sass file

mix.copyDirectory('resources/assets/images', 'public/images');
mix.copyDirectory('resources/assets/fonts', 'public/fonts');
mix.copyDirectory('resources/assets/images/dummy', 'public/images');
// Front
mix.copyDirectory('resources/assets/images/front', 'public/images/front');
mix.version();
