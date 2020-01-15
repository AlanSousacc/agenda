// tabela com listagem de clientes
$('#visualizar').on('show.bs.modal', function (event) {
  var button        = $(event.relatedTarget);
  var movid         = button.data('movid');
  var contato       = button.data('contato');
  var pagamento     = button.data('pagamento');
  var observacao    = button.data('observacao');
  var valortotal    = button.data('valortotal');
  var valorrecebido = button.data('valorrecebido');
  var valorpendente = button.data('valorpendente');
  var status    		= button.data('status');
  var modal         = $(this);

  modal.find('.modal-body #contato').val(contato).prop("disabled", true);
  modal.find('.modal-body #pagamento').val(pagamento).prop("disabled", true);
  modal.find('.modal-body #observacao').val(observacao).prop("disabled", true);
  modal.find('.modal-body #valortotal').val(valortotal).prop("disabled", true);
  modal.find('.modal-body #valorrecebido').val(valorrecebido).prop("disabled", true);
  modal.find('.modal-body #valorpendente').val(valorpendente).prop("disabled", true);
  modal.find('.modal-body #status').val(status).prop("disabled", true);
  modal.find('.modal-body #movid').val(movid);

});

$(document).ready(function () {
	$('#valorpendente').mask('000.000.000.000.000,00');
	$('#valortotal').mask('000.000.000.000.000,00');
	$('#valorrecebido').mask('000.000.000.000.000,00');
});
