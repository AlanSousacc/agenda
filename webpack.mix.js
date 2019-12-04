const mix = require('laravel-mix');
mix
  .js('resources/js/app.js', 'public/admin/js')
  .sass('resources/sass/app.scss', 'public/admin/css')
  .js('resources/js/jquery.js', 'public/admin/js')
  .js('resources/js/bootstrap/js/bootstrap.bundle.js', 'public/admin/js')
	.js('resources/js/adminlte.js', 'public/admin/js')
	.js('resources/js/contato/contato.js', 'public/admin/js/contato');
