<div class="modal fade" id="novo" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:600px">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lançar Entrada</h4>
      </div>
      <form action="{{route('movimentacao.store')}}" method="POST">
				{{csrf_field()}}
        <div class="modal-body">
          @include('Admin.movimentacao.entradas.formMovimentacaoEntrada')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar Entrada</button>
        </div>
      </form>
    </div>
  </div>
</div>
