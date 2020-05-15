$('#put').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
	var formularioid = button.data('formularioid');
  var modal = $(this);
  modal.find('.modal-body #formularioid').val(formularioid);
});
