@extends('layouts.master-admin')

@section('master')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h1 class="text-center header-text my-3">Novo usuário</h1>
			<form method="POST" action="{{ route('register') }}">
				@csrf

				<div class="form-group row">
					<div class="col-md-3 offset-md-1">
						<select required name="profile" id="profile" class="form-control ">
							<option value="" selected disabled>Escolha um perfil</option>
							<option value="Usuário Comum">Usuário Comum</option>
							<option value="Administrador">Administrador</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-5 offset-md-1 pb-3">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Nome Completo" autofocus>

						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-md-5">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Endereço de email">

						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-5 offset-md-1 pb-3">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Senha">

						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-md-5">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme a senha">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-10 offset-md-1">
						<select id="empresa_id" name="empresa_id" class="form-control">
              <option selected disabled>Empresa</option>
              @if (\Auth::user()->isAdmin == 1)
                @foreach (App\Models\Empresa::all() as $item)
                  <option value="{{$item->id}}">{{$item->razaosocial}}</option>
                @endforeach
              @elseif(\Auth::user()->isAdmin == 0)
								<option value="{{\Auth::user()->empresa_id}}">{{\Auth::user()->empresa->nomefantasia}}</option>
              @endif
						</select>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-1">
						<button type="submit" class="btn btn-primary">
							{{ __('Registrar') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
