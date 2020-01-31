@extends('layouts.master-admin')
@section('master')
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
	<div class="col-md-10 offset-md-1">
		<form enctype="multipart/form-data" action="{{route('routeEmpresaLogo')}}" method="POST">
			{{csrf_field()}}
			<div class="panel-body">
				<h1 class="text-center">Minha Empresa</h1><br>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="razaosocial">Razão Social</label>
							<div class="input-group">
								<input type="text" readonly class="form-control razaosocial" id="razaosocial" placeholder="Digite razão social" value="{{$consulta->razaosocial}}" name="razaosocial" required autofocus minlength="5" maxlength="40">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="nomefantasia">Nome Fantasia</label>
							<div class="input-group">
								<input type="text" readonly class="form-control nomefantasia" id="nomefantasia" placeholder="Digite o nome fantasia" value="{{$consulta->nomefantasia}}" name="nomefantasia" required autofocus>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="apelido">Apelido</label>
							<div class="input-group">
								<input type="text" readonly class="form-control apelido" id="apelido" placeholder="Digite o apelido" value="{{$consulta->apelido}}" name="apelido" required autofocus>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="cnpj">CNPJ</label>
							<div class="input-group">
								<input type="text" readonly class="form-control cnpj" id="cnpj" placeholder="Digite o CNPJ" value="{{$consulta->cnpj}}" name="cnpj" required autofocus maxlength="18">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="ie">Inscrição Estadual</label>
							<div class="input-group">
								<input type="text" readonly class="form-control ie" id="ie" placeholder="Digite a Inscrição estadual" value="{{$consulta->ie}}" name="ie" required autofocus maxlength="14">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="im">Inscrição Municipal</label>
							<div class="input-group">
								<input type="text" readonly class="form-control im" id="im" placeholder="Digite a inscrição municipal" value="{{$consulta->im}}" name="im" required autofocus>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="telefone">Telefone</label>
							<div class="input-group">
								<input type="tel" readonly class="form-control telefone" id="telefone" placeholder="Telefone" value="{{$consulta->telefone}}" name="telefone" required autofocus min="16">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="email">E-mail</label>
							<div class="input-group">
								<input type="email" readonly class="form-control email" id="email" placeholder="Digite o email" value="{{$consulta->email}}" name="email" required autofocus>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="cidade">Cidade</label>
							<div class="input-group">
								<input type="text" readonly class="form-control cidade" id="cidade" placeholder="Digite a cidade" value="{{$consulta->cidade}}" name="cidade" required autofocus>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="endereco">Endereço</label>
							<div class="input-group">
								<input type="text" readonly class="form-control endereco" id="endereco" placeholder="Digite endereço" value="{{$consulta->endereco}}" name="endereco" required autofocus minlength="3" maxlength="30">
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="numero">Número</label>
							<div class="input-group">
								<input type="text" readonly class="form-control numero" id="numero" placeholder="Número" value="{{$consulta->numero}}" name="numero" required autofocus min="1" max="5">
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="cep">CEP</label>
							<div class="input-group">
								<input type="text" readonly class="form-control cep" id="cep" placeholder="CEP" value="{{$consulta->cep}}" name="cep" required autofocus min="9">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="bairro">Bairro</label>
							<div class="input-group">
								<input type="text" readonly class="form-control bairro" id="bairro" placeholder="Digite a bairro" value="{{$consulta->bairro}}" name="bairro" required autofocus>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="file" id="logo" name="logo">
					</div>
				</div>
				<br>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="submit" name="submit" class="btn-alt btn btn-success btn-sm mb-4" value="Atualizar Logo" />
			</div>
		</form>
	</div>
@endsection
