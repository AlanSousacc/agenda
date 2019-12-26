{{-- <div class="row">
  <div class="col-md-3">
		<div class="form-group">
			<label for="tipo">Tipo Mov.</label>
			<div class="input-group">
				<input type="text" disabled="true" name="tipo" value="Entrada" class="form-control tipo" id="tipo">
			</div>
		</div>
  </div>
</div> --}}

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label for="contato">Escolha um Contato</label>
			<div class="input-group">
        <select class="form-control contato" id="contato" name="contato_id" value="{{old('contato')}}" required>
          @foreach ($contato as $item)
            <option id="{{$item->id}}" value="{{$item->nome}}">{{$item->nome}}</option>
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
            <option id="{{$item->id}}" value="{{$item->nome}}">{{$item->nome}}</option>
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

<div class="row">
  <div class="col-md-12">
  <label for="observacao" class="col-sm-4 col-form-label">Valor Total</label>
	<div class="input-group input-group-lg">
    <div class="input-group-prepend">
      <span class="input-group-text">R$</span>
    </div>
    <input type="text" name="valor" class="form-control valor" id="valor">
  </div>
  </div>
</div>
