<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="tipo">Tipo Mov.</label>
      <div class="input-group">
        <select readonly class="form-control tipo" id="tipo" name="tipo" required value="{{old('tipo')}}">
          <option value="Entrada">Entrada</option>
        </select>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="movimented_at">Data Movimentação: </label>
      <div class="input-group">
        <input type="text" readonly class="form-control movimented_at" id="movimented_at" value="{{old('movimented_at')}}" name="movimented_at">
      </div>
    </div>
	</div>
</div>

<input type="hidden" name="event_id" value="{{$item->id}}">

<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="contato_id">Nome do Contato:</label>
      <div class="input-group">
        <select class="form-control contato_id" id="contato_id" name="contato_id" value="{{old('contato_id')}}" required>
          <option value="">Escolha um Contato</option>
          @foreach ($contatos as $item)
          <option id="{{$item->id}}" value="{{$item->id}}">{{$item->nome}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="condicao_pagamento_id">Forma de Pagamento:</label>
      <div class="input-group">
        <select class="form-control condicao_pagamento_id" id="condicao_pagamento_id" name="condicao_pagamento_id" value="{{old('condicao_pagamento_id')}}" required>
          <option value="">Condição de Pagamento</option>
          @foreach ($pagamento as $item)
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
          @foreach ($centro as $cc)
          	<option id="{{$cc->id}}" value="{{$cc->id}}">{{$cc->descricao}}</option>
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
