const mix = require('laravel-mix');
mix
  .js('resources/js/app.js', 'public/admin/js')
  .sass('resources/sass/app.scss', 'public/admin/css')
  .js('resources/js/jquery.js', 'public/admin/js')
  .js('resources/js/bootstrap/js/bootstrap.bundle.js', 'public/admin/js')
	.js('resources/js/adminlte.js', 'public/admin/js')
	.js('resources/js/contato/contato.js', 'public/admin/js/contato')
	.js('resources/js/contato/contatomovimentos.js', 'public/admin/js/contato')
	.js('resources/js/empresa/empresa.js', 'public/admin/js/empresa')
	.js('resources/js/users/users.js', 'public/admin/js/users')
	.js('resources/js/movimentacao/movimentacao.js', 'public/admin/js/movimentacao')
	.js('resources/js/movimentacao/jquery.maskMoney.js', 'public/admin/js/movimentacao')
	.js('resources/js/movimentacao/consultapersonalizada.js', 'public/admin/js/movimentacao');
