@extends('layouts.master-admin')
@section('master')
{{-- <head>
	<!-- Bootstrap Toogles -->
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
</head> --}}
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-default">
				{{-- <form  method="POST" action="{{route('modulosempresa.update', $empresa->id)}}"> --}}
				<form  method="POST" action="#">
					{{-- ADICIONAR AS 2 LINHAS SEGUINTES PARA TRATAR OS MÉTODOS QUE O HTML NÃO SUPORTA (PUT, PATCH, DELETE) --}}
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @csrf
					<div class="panel-body">
						<h1 class="text-center">Alterar Permissões de Acesso da Empresa</h1><br>
						@include('Admin.empresa.moduloempresa.formModuloEmpresa')
					</div>
					{{-- <button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Permissões</button> --}}
				</form>
			</div>
		</div>
	</div>
</div>
@endsection