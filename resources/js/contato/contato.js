// tabela com listagem de clientes
$('#editar').on('show.bs.modal', function (event) {
  var button          = $(event.relatedTarget);
  var contid          = button.data('contid');
  var nome            = button.data('nome');
  var documento       = button.data('documento');
  var endereco        = button.data('endereco');
  var telefone        = button.data('telefone');
  var status          = button.data('status');
  var email           = button.data('email');
  var tipocontato     = button.data('tipocontato');
  var datanascimento  = button.data('datanascimento');
  var numero          = button.data('numero');
  var cidade          = button.data('cidade');
  var modal           = $(this);
  var nascimento      = moment(datanascimento).format('YYYY-MM-DD')

  modal.find('.modal-body #status').val(status);
  modal.find('.modal-body #nome').val(nome);
  modal.find('.modal-body #documento').val(documento);
  modal.find('.modal-body #telefone').val(telefone);
  modal.find('.modal-body #endereco').val(endereco);
  modal.find('.modal-body #numero').val(numero);
  modal.find('.modal-body #email').val(email);
  modal.find('.modal-body #tipocontato').val(tipocontato);
  modal.find('.modal-body #datanascimento').val(nascimento);
  modal.find('.modal-body #cidade').val(cidade);
  modal.find('.modal-body #contid').val(contid);
}); // Função delete

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var contid = button.data('contid');
  var modal = $(this);
  modal.find('.modal-body #contid').val(contid);
});
$(document).ready(function () {
  $('.telefone').mask('(00) 00000-0000');
  $('.documento').mask('000.000.000-00', {
    reverse: true
  });
});
