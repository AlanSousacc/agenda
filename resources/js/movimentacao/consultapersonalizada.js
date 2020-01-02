// define o input como um calendario
$(function() {
  $('input[name="mstart"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    minYear: 2020,
    "locale": {
      "format": "DD/MM/YYYY"
  },
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});

// define o input como um calendario
$(function() {
  $('input[name="mend"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    minYear: 2020,
    "locale": {
      "format": "DD/MM/YYYY"
  },
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});

// caso o campo de consulta data inicial estiver preenchido, o campo de data final também deve ser, caso contrario exibe erro
$(document).on('submit','form.personalizado', function(e){
  if(($('#mstart').val() != '') && ($('$mend' == ''))){
    e.preventDefault();
    $( "#mend" ).addClass( "is-invalid" );
    $( ".invalid-feedback" ).show();
  }
})
