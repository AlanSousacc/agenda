<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AgendaBETHA | Recuperar Senha</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='{{asset('admin/css/app.css')}}' rel='stylesheet' />
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a><b>Agenda</b>BETHA</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Esqueceu sua senha? Aqui você pode recuperar facilmente uma nova senha.</p>
				
				
				<form method="POST" action="{{ route('password.email') }}">
					@csrf
					
					<div class="form-group row">
						<div class="col-md-12">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
							
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					
					<div class="form-group row mb-0">
						<div class="col-md-12">
							<button type="submit" style="width: 100%" class="btn btn-primary">
								{{ __('Enviar link de redefinição de senha') }}
							</button>
						</div>
					</div>
					<p class="col-md-12 mt-3 mb-1">
						<a href="/login">Login</a>
					</p>
				</form>
				@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
				@endif
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