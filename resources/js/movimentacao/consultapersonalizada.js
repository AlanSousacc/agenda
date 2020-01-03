// define o input como um calendario
$(function() {
  $('#mstart').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
		autoUpdateInput: true,
    "locale": {
      "format": "DD/MM/YYYY"
  },
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});

// define o input como um calendario
$(function() {
  $('#mend').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
		autoUpdateInput: true,
		maxYear: parseInt(moment().format('YYYY'),10),
    "locale": {
      "format": "DD/MM/YYYY"
		},
  });
});

// preenche os campos de data com vazio ao abrir o modal 
$('#personalizado').on('show.bs.modal', function () {
	var modal = $(this);
	modal.find('.modal-body #mstart').val('');
	modal.find('.modal-body #mend').val('');
});

// caso o campo de consulta data inicial estiver preenchido, o campo de data final também deve ser, caso contrario exibe erro
$(document).on('submit','form.personalizado', function(e){
  if(($('#mstart').val() != '') && ($('#mstart').val() == '')){
    e.preventDefault();
    $( "#mend" ).addClass( "is-invalid" );
    $( ".invalid-feedback" ).show();
  }
});
