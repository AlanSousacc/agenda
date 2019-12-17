<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="status">Status*</label>
			<div class="input-group">
				<select class="form-control status" id="status" name="status" {{old('tipocontato')}}>
					<option value="1">Ativo</option>
					<option value="0">Inativo</option>
				</select>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="tipocontato">Tipo de Contato*</label>
			<div class="input-group">
				<select class="form-control tipocontato" id="tipocontato" name="tipocontato" value="{{old('tipocontato')}}">
          <option value="paciente" selected>Paciente</option>
          <option value="profissional">Profissional</option>
				</select>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="datanascimento">Data de Nascimento</label>
			<div class="input-group">
				<input type="date" class="form-control datanascimento" id="datanascimento" placeholder="Data de nascimento" value="{{old('datanascimento')}}" name="datanascimento">
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="nome">Nome Completo*</label>
			<div class="input-group">
				<input type="text" class="form-control nome" id="nome" placeholder="Digite o nome completo" value="{{old('nome')}}" name="nome" required autofocus minlength="5" maxlength="30">
			</div>
		</div>
  </div>

  <div class="col-md-4">
		<div class="form-group">
			<label for="nome">Email*</label>
			<div class="input-group">
				<input type="email" class="form-control email" id="email" placeholder="Digite o email completo" value="{{old('email')}}" name="email" required autofocus>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="documento">CPF</label>
			<div class="input-group">
				<input type="text" class="form-control documento" id="documento" placeholder="Digite o CPF" value="{{old('documento')}}" name="documento" autofocus max="14">
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="endereco">Endereço</label>
			<div class="input-group">
				<input type="text" class="form-control endereco" id="endereco" placeholder="Digite endereço" value="{{old('endereco')}}" name="endereco" autofocus minlength="3" maxlength="30">
			</div>
		</div>
  </div>
  <div class="col-md-2">
		<div class="form-group">
			<label for="telefone">Telefone*</label>
			<div class="input-group">
				<input type="tel" class="form-control telefone" id="telefone" placeholder="Telefone" value="{{old('telefone')}}" name="telefone" required autofocus min="16">
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<label for="numero">Número</label>
			<div class="input-group">
				<input type="text" class="form-control numero" id="numero" placeholder="Número" value="{{old('numero')}}" name="numero" autofocus min="1" max="5">
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="cidade">Cidade</label>
			<div class="input-group">
				<input type="text" class="form-control cidade" id="cidade" placeholder="Digite a cidade" value="{{old('cidade')}}" name="cidade" autofocus minlength="5" maxlength="30">
			</div>
		</div>
	</div>
</div>
<br>
