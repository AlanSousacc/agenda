<input type="hidden" name="event_id" value="{{$event->id}}">
<input type="hidden" name="tipo" value="entrada">

<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="contato_id">Nome do Contato:</label>
      <div class="input-group">
				<select class="form-control contato_id" id="condicao_pagamento_id" name="contato_id" value="{{old('contato_id')}}">
          <option id="{{$event->contato->id}}" value="{{$event->contato->id}}">{{$event->contato->nome}}</option>
        </select>
				{{-- <input type="text" name="contato_id" class="form-control contato_id" readonly value="{{$event->contato->id}}" id="contato_id"> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="condicao_pagamento_id">Forma de Pagamento:</label>
      <div class="input-group">
        <select class="form-control condicao_pagamento_id" id="condicao_pagamento_id" name="condicao_pagamento_id" value="{{old('condicao_pagamento_id')}}" required>
          <option value="">Condição de Pagamento</option>
          @foreach ($cp as $item)
          <option id="{{$item->id}}" value="{{$item->id}}">{{$item->nome}}</option>
          @endforeach
        </select>
      </div>
    </div>
	</div>

	<div class="col-md-4">
    <div class="form-group">
      <label for="centrocusto_id">Centro de Custo:</label>
      <div class="input-group">
        <select class="form-control centrocusto_id" id="centrocusto_id" name="centrocusto_id" value="{{old('centrocusto_id')}}" required>
          @foreach ($cc as $item)
          	<option id="{{$item->id}}" value="{{$item->id}}">{{$item->descricao}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Observação de Recebimento</label>
      <textarea class="form-control" name="observacao" id="observacao" rows="2"></textarea>
    </div>
  </div>
</div>

<div class="row pb-4">
  <div class="col-md-3">
    <label for="valortotal" class="col-sm-12 col-form-label">Valor Total</label>
    <div class="input-group input-group-md">
      <div class="input-group-prepend">
        <span class="input-group-text">R$</span>
      </div>
      <input type="text" name="valortotal" class="form-control valortotal" id="valortotal">
    </div>
  </div>

  <div class="col-md-3">
    <label for="valorrecebido" class="col-sm-12 col-form-label">Valor Recebido</label>
    <div class="input-group input-group-md">
      <div class="input-group-prepend">
        <span class="input-group-text">R$</span>
      </div>
      <input type="text" name="valorrecebido" autocomplete="off" class="form-control valorrecebido" id="valorrecebido">
    </div>
  </div>
</div>
