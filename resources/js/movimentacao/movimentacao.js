// tabela com listagem de clientes
$('#visualizar').on('show.bs.modal', function (event) {

  var button        = $(event.relatedTarget);
  var movid         = button.data('movid');
  var contato       = button.data('contato');
  var pagamento     = button.data('pagamento');
  var observacao    = button.data('observacao');
  var valor         = button.data('valor');
  var modal         = $(this);

  modal.find('.modal-body #contato').val(contato).prop("disabled", true);
  modal.find('.modal-body #pagamento').val(pagamento).prop("disabled", true);
  modal.find('.modal-body #observacao').val(observacao).prop("disabled", true);
  modal.find('.modal-body #valor').val(valor).prop("disabled", true);
  modal.find('.modal-body #movid').val(movid);

});

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var movid = button.data('movid');
  var modal = $(this);
  modal.find('.modal-body #movid').val(movid);
});

