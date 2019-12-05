<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="profile">Perfil de Acesso</label>
			<div class="input-group">
				<select class="form-control profile" id="profile" name="profile" value="{{old('profile')}}">
					<option value="Usuario Comum">Usuario Comum</option>
					<option value="Administrador">Administrador</option>
				</select>
			</div>
		</div>
	</div>
	
	<div class="col-md-5">
		<div class="form-group">
			<label for="nome">Ultima Atualização</label>
			<div class="input-group">
				<input type="text" class="form-control nome" id="nome" readonly  name="nome" >
			</div>
		</div>
  </div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="nome">Nome Completo</label>
			<div class="input-group">
				<input type="text" class="form-control name" id="name" placeholder="Digite o nome completo" value="{{old('name')}}" name="name" required autofocus minlength="5" maxlength="30">
			</div>
		</div>
  </div>

  <div class="col-md-6">
		<div class="form-group">
			<label for="nome">Email</label>
			<div class="input-group">
				<input type="email" class="form-control email" id="email" placeholder="Digite o email" value="{{old('email')}}" name="email" required autofocus>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="password">Senha</label>
			<div class="input-group">
				<input type="password" class="form-control password" id="password" placeholder="Digite senha" value="{{old('password')}}" name="password" required autofocus>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label for="password">Confirmação de Senha</label>
			<div class="input-group">
				<input type="password" class="form-control password" id="password" placeholder="Confirmação de senha" name="password_confirmation">
			</div>
		</div>
	</div>
</div>