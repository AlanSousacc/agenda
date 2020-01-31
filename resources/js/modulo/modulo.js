$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var moduloid = button.data('moduloid');
  var modal = $(this);
  modal.find('.modal-body #moduloid').val(moduloid);

});
