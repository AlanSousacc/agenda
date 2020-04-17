const mix = require('laravel-mix');
mix
  .js('resources/js/app.js', 'public/admin/js')
  .sass('resources/sass/app.scss', 'public/admin/css')
  .js('resources/js/jquery.js', 'public/admin/js')
  .js('resources/js/bootstrap/js/bootstrap.bundle.js', 'public/admin/js')
	.js('resources/js/adminlte.js', 'public/admin/js')
	.js('resources/js/contato/contato.js', 'public/admin/js/contato')
	.js('resources/js/empresa/empresa.js', 'public/admin/js/empresa')
	.js('resources/js/users/users.js', 'public/admin/js/users')
	.js('resources/js/movimentacao/movimentacao.js', 'public/admin/js/movimentacao')
	.js('resources/js/movimentacao/jquery.maskMoney.js', 'public/admin/js/movimentacao')
	.js('resources/js/movimentacao/consultapersonalizada.js', 'public/admin/js/movimentacao')
	.js('resources/js/modulo/modulo.js', 'public/admin/js/modulo')
	.js('resources/js/centrocusto/centrocusto.js', 'public/admin/js/centrocusto')
	.css('resources/css/bootstrap4-toggle.min.css', 'public/admin/css')
	.js('resources/js/bootstrap4-toggle.min.js', 'public/admin/js')
	.js('resources/js/tipoevento/tipoevento.js', 'public/admin/js/tipoevento')
	.js('resources/js/atendimento/atendimento.js', 'public/admin/js/atendimento');
