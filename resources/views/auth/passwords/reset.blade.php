<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AgendaBETHA | Nova Senha</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='{{asset('admin/css/app.css')}}' rel='stylesheet' />
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
      <img src="{{URL::asset('assets/master-admin/img/AgendaBETHA.png')}}" class="brand-image" style="max-width:170px; max-height:170px">
    </div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Preencha os campos abaixo para redefinir uma nova senha!</p>
				
				
				<form method="POST" action="{{ route('password.update') }}">
					@csrf
					
					<input type="hidden" name="token" value="{{ $token }}">
					
					<div class="form-group row">						
						<div class="col-md-12">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Endereço de Email" required autocomplete="email" autofocus>
							
							@error('email')
							<span class="invalid-feedback" style="text-align: center;" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group row">						
						<div class="col-md-12">
							<input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
							
							@error('password')
							<span class="invalid-feedback" style="text-align: center;" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group row">						
						<div class="col-md-12">
							<input id="password-confirm" placeholder="Confrmação de Senha" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
					</div>
					
					<div class="form-group row mb-0">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-circle" style="width:100%">
								{{ __('ALTERAR SENHA') }}
							</button>
						</div>
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	
	<!-- jQuery -->
	<script src="{{ asset('admin/js/jquery.js')}}"></script>
	<!-- Bootstrap 4 -->
	
	<script src="{{ asset('admin/js/bootstrap.bundle.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('admin/js/adminlte.js')}}"></script>
</body>
</html>
