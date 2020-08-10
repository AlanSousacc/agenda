$('#definestatus').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
	var eventid = button.data('eventid');
  var modal = $(this);
  modal.find('.modal-body #eventid').val(eventid);
});

// $("input[name = 'btnstatusremarcado']").on('click', function(evt){
// 	evt.preventDefault();
// });

$("input[name = 'btnstatus']").on('click', function(){
	let valbtn = $(this).val()
	$('#status').val() == valbtn;
});

$('#iniciarSessao').on('show.bs.modal', function (event) {
  var button 	= $(event.relatedTarget);
  var eventid = button.data('eventid');
  var modal 	= $(this);
  modal.find('.modal-body #eventid').val(eventid);
});