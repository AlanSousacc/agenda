<div class="modal fade" id="editar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:800px">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar agendamento</h4>
      </div>
      <form enctype="multipart/form-data" action="{{route('empresa.update','id')}}" method="post">
				{{method_field('patch')}}
				{{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="empresa_id" id="agenid" value="">
          @include('Admin.fullcalendar.modal-calendar')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Savar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>
