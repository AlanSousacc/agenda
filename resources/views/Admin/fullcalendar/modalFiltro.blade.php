<div class="modal fade" id="filtroagendamento" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="min-width:500px">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; display: inline;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filtrar Agendamentos</h4>
      </div>
      <form action="{{route('routeEventSearch')}}" autocomplete="off" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-4 col-form-label">Dt. Inicial</label>
            <div class="col-md-8">
              <input type="date" class="form-control start" autocomplete="off" id="start" value="{{old('start')}}" name="start">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-4 col-form-label">Dt. Final</label>
            <div class="col-md-8">
              <input type="date" class="form-control end" autocomplete="off" id="end" value="{{old('end')}}" name="end">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-4 col-form-label">Contato</label>
            <div class="col-md-8">
              <select class="form-control contato_id" autocomplete="off" id="contato_id" name="contato_id" {{old('contato_id')}}>
                <option selected disabled>Selecione um contato para consultar</option>
                @foreach ($contato as $item)
                <option value="{{$item->id}}">{{$item->nome}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-4 col-form-label">Tipo Agendamento</label>
            <div class="col-md-8">
              <select class="form-control title" autocomplete="off" id="title" name="title" {{old('tipoevento_id')}}>
                <option selected disabled>Selecione um tipo de agendamento</option>
                @foreach ($tipoevento as $item)
                <option value="{{$item->titulo}}">{{$item->titulo}}</option>
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
