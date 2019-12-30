<div class="modal fade" id="personalizado" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:600px">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Consultar por Período</h4>
      </div>
      <form action="{{route('relatorio.periodo.contato')}}" method="POST" class="form-inline float-md-right ">
				@csrf
        <div class="modal-body">
          <div class="col-12 mb-3">
            <h5 class="modal-title" style="text-align:center">Consultar por Período e/ou Contato</h5>
          </div>
          <div class="form-group row">
            <label for="start" class="col-sm-4 col-form-label">Contato</label>
            <div class="col-sm-8">
              <select id="contato_id" class="form-control">
                <option selected>Escolha um contato</option>
                @foreach ($contato as $item)
                <option value="{{$item->id}}" id="{{$item->id}}">{{$item->nome}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="start" class="col-sm-4 col-form-label">Data Inicio</label>
            <div class="col-sm-8">
              <input type="date" class="form-control date-time" id="start" placeholder="Data Inicio" name="start">
            </div>
          </div>
          <div class="form-group row">
            <label for="end" class="col-sm-4 col-form-label">Data Final</label>
            <div class="col-sm-8">
              <input type="date" class="form-control date-time" id="end" placeholder="Data Final" name="end">
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
