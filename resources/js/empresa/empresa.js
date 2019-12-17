// tabela com listagem de clientes
$('#editar').on('show.bs.modal', function (event) {
  var button       = $(event.relatedTarget);
  var emprid       = button.data('emprid');
  var razaosocial  = button.data('razaosocial');
  var nomefantasia = button.data('nomefantasia');
  var apelido      = button.data('apelido');
  var cnpj       	 = button.data('cnpj');
  var ie           = button.data('ie');
  var im           = button.data('im');
  var telefone     = button.data('telefone');
  var email  		   = button.data('email');
  var cidade       = button.data('cidade');
  var endereco     = button.data('endereco');
  var numero       = button.data('numero');
  var cep          = button.data('cep');
  var bairro       = button.data('bairro');
  var tipo       	 = button.data('tipo');
  var modal        = $(this);

  modal.find('.modal-body #cidade').val(cidade);
  modal.find('.modal-body #razaosocial').val(razaosocial);
  modal.find('.modal-body #nomefantasia').val(nomefantasia);
  modal.find('.modal-body #apelido').val(apelido);
  modal.find('.modal-body #cnpj').val(cnpj);
  modal.find('.modal-body #cnpj').prop("readonly", true);
  modal.find('.modal-body #ie').val(ie);
  modal.find('.modal-body #im').val(im);
  modal.find('.modal-body #telefone').val(telefone);
  modal.find('.modal-body #email').val(email);
  modal.find('.modal-body #endereco').val(endereco);
  modal.find('.modal-body #numero').val(numero);
  modal.find('.modal-body #cep').val(cep);
  modal.find('.modal-body #bairro').val(bairro);
  modal.find('.modal-body #tipo').val(tipo);
  modal.find('.modal-body #emprid').val(emprid);
}); // Função delete

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var emprid = button.data('emprid');
  var modal = $(this);
  modal.find('.modal-body #emprid').val(emprid);
});
$(document).ready(function () {
  $('.telefone').mask('(00) 00000-0000');
  $('.cep').mask('00000-000');
  $('.cnpj').mask('00.000.000/0000-00', {
    reverse: true
  });
});
