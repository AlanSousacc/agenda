$('#editar').on('show.bs.modal', function (event) {
  var button 						= $(event.relatedTarget);
  var userid 						= button.data('userid');
  var name 							= button.data('name');
  var email 						= button.data('email');
  var profile 					= button.data('profile');
  var email_verified_at = button.data('email_verified_at');
	var modal = $(this);
	
  modal.find('.modal-body #name').val(name);
  modal.find('.modal-body #email').val(email);
  modal.find('.modal-body #profile').val(profile);
  modal.find('.modal-body #email_verified_at').val(email_verified_at);
  modal.find('.modal-body #userid').val(userid);
}); // Função delete

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var userid = button.data('userid');
  var modal = $(this);
  modal.find('.modal-body #userid').val(userid);
});