@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<h3 class="navbar-brand">Configurações da Empresa</h3>
	<form action="{{route('configuracao.update', Auth::user()->empresa_id)}}" method="POST">
		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="empresa_id" value="{{Auth::user()->empresa_id}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="card bg-light mb-3" style="width: 100%">
			@include('Admin.configuracao.formConfiguracao')
		</div>
		<button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Configuração</button>
	</form>
</div>
</div>
@push('scripts')
{{-- <script src='{{asset('admin/js/atendimento/atendimento.js')}}'></script> --}}
@endpush
@endsection