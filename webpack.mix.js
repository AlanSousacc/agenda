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

mix
  .js('resources/js/app.js', 'public/admin/js')
  .sass('resources/sass/app.scss', 'public/admin/css')
  .js('resources/js/jquery.js', 'public/admin/js')
  .js('resources/js/bootstrap/js/bootstrap.bundle.js', 'public/admin/js')
  .js('resources/js/adminlte.js', 'public/admin/js');
