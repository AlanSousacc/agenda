// tabela com listagem de clientes
$('#editar').on('show.bs.modal', function (event) {
  var button      = $(event.relatedTarget);
  var agenid      = button.data('agenid');
  var title       = button.data('title');
  var start       = button.data('start');
  var end         = button.data('end');
  var description = button.data('description');
  var contato_id  = button.data('contato_id');
  var modal       = $(this);

  modal.find('.modal-body #status').val(status);
  modal.find('.modal-body #agenid').val(agenid);
  modal.find('.modal-body #title').val(title);
  modal.find('.modal-body #start').val(start);
  modal.find('.modal-body #end').val(end);
  modal.find('.modal-body #description').val(description);
  modal.find('.modal-body #contato_id').val(contato_id);
}); // Função delete

$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var agenid = button.data('agenid');
  var modal = $(this);
  modal.find('.modal-body #agenid').val(agenid);
});
