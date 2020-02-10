<form id="formEvent">
  <div id="message"></div>
  <input type="hidden" name="id">
  <input type="hidden" name="title" id="title" class="title" value="Contato">

  <div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label">Tipo Agendamento</label>
    <div class="col-sm-8">
      <select id="tipo_evento_id" name="tipo_evento_id" required class="form-control">
        <option disabled>Tipo Agendamento</option>
        @foreach ($tipoevento as $item)
        <option value="{{$item->id}}" id="{{$item->id}}">{{$item->titulo}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="start" class="col-sm-4 col-form-label">Data/Hora Inicio</label>
    <div class="col-sm-8">
      <input type="text" class="form-control date-time" id="start" placeholder="Data/Hora Inicio" name="start">
    </div>
	</div>
	
  <div class="form-group row">
    <label for="end" class="col-sm-4 col-form-label">Data/Hora Final</label>
    <div class="col-sm-8">
      <input type="text" class="form-control date-time" id="end" placeholder="Data/Hora Final" name="end">
    </div>
	</div>
	
  <div class="form-group row">
    <label for="color" class="col-sm-4 col-form-label">Cor Agendamento</label>
    <div class="col-sm-8">
      <input type="color" class="form-control" id="color" placeholder="Data/Hora Final" name="color">
    </div>
	</div>
	
  <div class="form-group row">
    <label for="description" class="col-sm-4 col-form-label">Descrição</label>
    <div class="col-sm-8">
      <textarea name="description" placeholder="Descrição do evento" id="description" cols="50" rows="2" style="border: 1px solid #ced4da; resize: none;"></textarea>
    </div>
	</div>
	
  <div class="form-group row">
    <label for="geracobranca" class="col-sm-4 col-form-label">Gerar Cobrança</label>
    <div class="col-sm-8">
      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
				<input type="checkbox" class="custom-control-input" id="geracobranca" name="geracobranca">
				<label class="custom-control-label" for="geracobranca" style="font-weight: 300;">Habilite esta opção para realizar movimentação deste agendamento</label>
			</div>
    </div>
	</div>
	
	<div class="form-group row showvalorevento">
    <label for="valorevento" class="col-sm-4 col-form-label">Valor Agendamento</label>
    <div class="input-group input-group-md col-sm-8">
      <div class="input-group-prepend">
        <span class="input-group-text">R$</span>
      </div>
      <input type="text" name="valorevento" class="form-control valorevento" id="valorevento">
    </div>
	</div>
	
  <input type="hidden" name="empresa_id" id="empresa_id" value="{{Auth::user()->empresa_id}}">

  <div class="form-group row">
    <label for="contatos" class="col-sm-4 col-form-label">Contatos</label>
    <div class="col-sm-8">
      <select id="contato_id" required class="form-control">
        <option selected>Contatos</option>
        @foreach ($contato as $item)
        <option value="{{$item->id}}" id="{{$item->id}}">{{$item->nome}}</option>
        @endforeach
      </select>
    </div>
  </div>
</form>