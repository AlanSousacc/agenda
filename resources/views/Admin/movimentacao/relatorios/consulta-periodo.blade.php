<div class="modal fade" id="personalizado" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:600px">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Consultar por Período</h4>
      </div>
      <form autocomplete="off" class="personalizado" action="{{route('relatorio.periodo.contato')}}" method="POST">
				@csrf
        <div class="modal-body">
          <div class="col-12 mb-3">
            <h5 class="modal-title" style="text-align:center">Consultar por Período e/ou Contato</h5>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Contato</label>
            <div class="col-sm-8">
              <select id="contato_id" name="contato_id" class="form-control">
                <option value="">Escolha um contato</option>
                @foreach ($contato as $item)
                <option value="{{$item->id}}" id="{{$item->id}}">{{$item->nome}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="mstart" class="col-sm-4 col-form-label">Data Inicio</label>
            <div class="col-sm-8">
							<input type="text" class="form-control date-time" autocomplete="off" id="mstart" placeholder="Data/Hora Inicio" name="mstart">
            </div>
          </div>
          <div class="form-group row">
            <label for="mend" class="col-sm-4 col-form-label">Data Final</label>
            <div class="col-sm-8">
							<input type="text" class="form-control date-time" autocomplete="off" id="mend" placeholder="Data/Hora Final" name="mend">
							<div class="invalid-feedback">
								Por favor informe uma data final quando informado uma data inicial!
							</div>
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
