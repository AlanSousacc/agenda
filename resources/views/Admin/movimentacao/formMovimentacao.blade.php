<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label for="tipo">Tipo Mov.</label>
      <div class="input-group">
        <select class="form-control contato" id="tipo" name="tipo" value="{{old('tipo')}}" required>
          <option value="Entrada" selected disabled>Entrada</option>
          {{-- <option value="Saida">Saida</option> --}}
        </select>
      </div>
    </div>
	</div>
	@if (\Request::route()->getName() == "contato.show")
		<div class="col-md-9">
			<div class="form-group">
				<label for="usuario">Usuário: </label>
				<div class="input-group">
					<input type="text" class="form-control usuario" id="usuario" value="{{old('usuario')}}" name="usuario">
				</div>
			</div>
		</div>		
	@endif
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="contato">Escolha um Contato</label>
      <div class="input-group">
        <select class="form-control contato" id="contato" name="contato_id" value="{{old('contato')}}" required>
          @foreach ($contatos as $item)
          <option id="{{$item->id}}" value="{{$item->id}}">{{$item->nome}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="pagamento">Forma de pagamento</label>
      <div class="input-group">
        <select class="form-control pagamento" id="pagamento" name="condicao_pagamento_id" value="{{old('condicao_pagamento_id')}}" required>
          @foreach ($pagamento as $item)
          <option id="{{$item->id}}" value="{{$item->id}}">{{$item->nome}}</option>
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
      <textarea class="form-control" name="observacao" id="observacao" rows="3"></textarea>
    </div>
  </div>
</div>

<div class="row pb-4">
  <div class="col-md-6">
    <label for="valortotal" class="col-sm-12 col-form-label">Valor Total</label>
    <div class="input-group input-group-lg">
      <div class="input-group-prepend">
        <span class="input-group-text">R$</span>
      </div>
      <input type="text" name="valortotal" class="form-control valortotal" id="valortotal">
    </div>
  </div>

  <div class="col-md-6">
    <label for="valorrecebido" class="col-sm-12 col-form-label">Valor Recebido</label>
    <div class="input-group input-group-lg">
      <div class="input-group-prepend">
        <span class="input-group-text">R$</span>
      </div>
      <input type="text" name="valorrecebido" class="form-control valorrecebido" id="valorrecebido">
    </div>
  </div>
</div>
