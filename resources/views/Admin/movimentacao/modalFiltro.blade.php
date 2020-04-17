<div class="modal fade" id="filtromovimentacao" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:500px">
    <div class="modal-content filtro">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filtrar Movimentação</h4>
      </div>
      <form action="{{route('routeMovimentacaoSearch')}}" autocomplete="off" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group row">
						<label for="status" class="col-sm-4 col-form-label">Status</label>
						<div class="col-sm-8">
							<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
								<input type="checkbox" class="custom-control-input" id="status" name="status">
								<label class="custom-control-label" for="status" style="font-weight: 300;">Ao habilitar será listado somente faturas 100% pagas</label>
							</div>
						</div>
					</div>

          <div class="form-group row">
            <label class="col-md-4 col-form-label">Contatos</label>
            <div class="col-md-8">
              <select class="form-control contato_id" autocomplete="off" id="contato_id" name="contato_id" {{old('contato_id')}}>
                <option selected disabled>Selecione um contato para consultar</option>
                @foreach ($contatos as $item)
                <option value="{{$item->id}}">{{$item->nome}}</option>
                @endforeach
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Consultar</button>
        </div>
      </form>
    </div>
  </div>
</div>
