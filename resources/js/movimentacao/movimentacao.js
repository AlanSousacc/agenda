$('#visualizar').on('show.bs.modal', function (event) {

  var button        	      = $(event.relatedTarget);
  var movid         	      = button.data('movid');
  var tipo         	        = button.data('tipo');
  var contato_id     	      = button.data('contato_id');
  var centrocusto_id 	      = button.data('centrocusto_id');
  var user_id       	      = button.data('user_id');
  var condicao_pagamento_id = button.data('condicao_pagamento_id');
  var observacao    	      = button.data('observacao');
  var valortotal    	      = button.data('valortotal');
  var valorrecebido 	      = button.data('valorrecebido');
  var valorpendente 	      = button.data('valorpendente');
  var movimented_at 	      = button.data('movimented_at');
  var status			  	      = button.data('status');
  var modal         	      = $(this);

  modal.find('.modal-body #contato_id').val(contato_id).prop("disabled", true);
  modal.find('.modal-body #centrocusto_id').val(centrocusto_id).prop("disabled", true);
  modal.find('.modal-body #tipo').val(tipo).prop("disabled", true);
  modal.find('.modal-body #user_id').val(user_id).prop("disabled", true);
  modal.find('.modal-body #condicao_pagamento_id').val(condicao_pagamento_id).prop("disabled", true);
  modal.find('.modal-body #observacao').val(observacao).prop("disabled", true);
  modal.find('.modal-body #valortotal').val(valortotal).prop("disabled", true);
  modal.find('.modal-body #valorrecebido').val(valorrecebido).prop("disabled", true);
  modal.find('.modal-body #valorpendente').val(valorpendente).prop("disabled", true);
  modal.find('.modal-body #movimented_at').val(movimented_at).prop("disabled", true);
  modal.find('.modal-body #status').val(status).prop("disabled", true);
  modal.find('.modal-body #movid').val(movid);

});

$('#fecharconta').on('show.bs.modal', function (event) {

  var button        	      = $(event.relatedTarget);
  var movid         	      = button.data('movid');
  var valortotal    	      = button.data('valortotal');
  var valorrecebido 	      = button.data('valorrecebido');
  var valorpendente 	      = button.data('valorpendente');
  var modal         	      = $(this);

  modal.find('.modal-body #valortotal').val(valortotal).prop("disabled", true);
  modal.find('.modal-body #valorrecebido').val(valorrecebido).prop("disabled", true);
  modal.find('.modal-body #valorpendente').val(valorpendente);
  modal.find('.modal-body #movid').val(movid);

});

$(document).ready(function () {
	$('.valortotal').mask("#.##0,00", {reverse: true});
  $('.valorrecebido').mask("#.##0,00", {reverse: true});
  $('.valorpendente').mask("#.##0,00", {reverse: true});
});

// $(document).ready(function () {
// 	var total = $('.valortotal').val();
// 	var recebido = $('.valorrecebido').val()
// 	var pendente = $('.valorpendente').val()
// });

// $("input#valorrecebido").on('focus', function() {
// 	var total = $('#valortotal').val();
// 	var recebido = $('#valorrecebido').val()
// 	var pendente = $('#valorpendente').val()
// 	console.log(this.total);
// });