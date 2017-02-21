const { mix } = require('laravel-mix');

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
   .sass('resources/assets/sass/estilos.scss', 'public/css');

mix.copy('resources/assets/sass/dashboard/sb-admin.css', 'public/css/dashboard/sb-admin.css')
   .copy('resources/assets/sass/dashboard/plugins/morris.css', 'public/css/plugins/morris.css')
   .copy('resources/assets/sass/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome/css/font-awesome.min.css');

mix.copy('resources/assets/js/plugins/morris/raphael.min.js', 'public/js/plugins/morris/raphael.min.js')
   .copy('resources/assets/js/plugins/morris/morris.min.js', 'public/js/plugins/morris/morris.min.js')
   .copy('resources/assets/js/plugins/morris/morris-data.js', 'public/js/plugins/morris/morris-data.js');
