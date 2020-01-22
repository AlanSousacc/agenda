<div class="modal fade" id="fecharconta" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:300px">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Receber</h4>
      </div>
      <form>
        <div class="modal-body">
          <input type="hidden" name="movimentacao_id" id="movid" value="">
          @include('Admin.movimentacao.formFecharConta')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">Receber</button>
          <button type="button" class="btn btn-danger mr-4" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>