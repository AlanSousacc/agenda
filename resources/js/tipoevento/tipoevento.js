$('#delete').on('show.bs.modal', function (event) {
  var button    = $(event.relatedTarget);
	var tipeveid  = button.data('tipeveid');
  var modal     = $(this);
  modal.find('.modal-body #tipeveid').val(tipeveid);

});
