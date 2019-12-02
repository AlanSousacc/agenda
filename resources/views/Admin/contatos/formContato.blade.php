@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="status">Status</label>
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
			<label for="tipocontato">Tipo de Contato</label>
			<div class="input-group">
				<select class="form-control tipocontato" id="tipocontato" name="tipocontato" {{old('tipocontato')}}>
          <option value="paciente">Paciente</option>
          <option value="profissional">Profissional</option>
				</select>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="endereco">Data de Nascimento</label>
			<div class="input-group">
				<input type="date" class="form-control datanascimento" id="datanascimento" placeholder="Data de nascimento" {{old('datanascimento')}} name="datanascimento" required>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="nome">Nome Completo</label>
			<div class="input-group">
				<input type="text" class="form-control nome" id="nome" placeholder="Digite o nome completo" {{old('nome')}} name="nome" required autofocus minlength="5" maxlength="30">
			</div>
		</div>
  </div>

  <div class="col-md-4">
		<div class="form-group">
			<label for="nome">Email</label>
			<div class="input-group">
				<input type="email" class="form-control email" id="email" placeholder="Digite o email completo" {{old('email')}} name="email" required autofocus>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="documento">CPF</label>
			<div class="input-group">
				<input type="text" class="form-control documento" id="documento" placeholder="Digite o CPF" {{old('documento')}} name="documento" required autofocus max="14">
			</div>
		</div>
	</div>


</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="endereco">Endereço</label>
			<div class="input-group">
				<input type="text" class="form-control endereco" id="endereco" placeholder="Digite endereço" {{old('endereco')}} name="endereco" required autofocus minlength="3" maxlength="30">
			</div>
		</div>
  </div>
  <div class="col-md-2">
		<div class="form-group">
			<label for="telefone">Telefone</label>
			<div class="input-group">
				<input type="tel" class="form-control telefone" id="telefone" placeholder="Telefone" {{old('telefone')}} name="telefone" required autofocus min="16">
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<label for="numero">Número</label>
			<div class="input-group">
				<input type="text" class="form-control numero" id="numero" placeholder="Número" {{old('numero')}} name="numero" required autofocus min="1" max="5">
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="cidade">Cidade</label>
			<div class="input-group">
				<input type="text" class="form-control cidade" id="cidade" placeholder="Digite a cidade" {{old('cidade')}} name="cidade" required autofocus minlength="5" maxlength="30">
			</div>
		</div>
	</div>
</div>
<br>
