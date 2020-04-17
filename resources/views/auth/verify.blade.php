@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #5271ff">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div>
				<img src="/uploads/logos/email.png" style="max-width:800px; width: 100%">
				@if (session('resent'))
				<div class="alert alert-success text-center" role="alert">
					{{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
				</div>
				@endif
				<h4 class="text-center text-white">{{ __('Se você ainda não recebeu um email') }}</h4>,
				<form class="text-center" method="POST" action="{{ route('verification.resend') }}">
					@csrf
					<button type="submit" class="btn btn-link pb-4 m-0 text-white ">{{ __('Clique aqui para reenviar') }}</button>.
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
