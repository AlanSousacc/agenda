$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var contid = button.data('contid');
  var modal = $(this);
  modal.find('.modal-body #contid').val(contid);
});

$(document).ready(function () {
	$('#valorsessao').mask('000.000.000.000.000,00');
});

$(document).ready(function () {
	$('.telefone').mask('(00) 00000-0000');
	
	$('.telefoneparente').mask('(00) 00000-0000');
	
  $('.documento').mask('000.000.000-00', {
    reverse: true
	});
	
  $('.cpfresponsavel').mask('000.000.000-00', {
    reverse: true
	});
});
