$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
	var centroid = button.data('centroid');
  var modal = $(this);
  modal.find('.modal-body #centroid').val(centroid);

});
