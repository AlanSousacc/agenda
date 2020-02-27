@extends('layouts.master-admin')
@section('master')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-default">

				<form  method="POST" action="#">
					{{-- ADICIONAR AS 2 LINHAS SEGUINTES PARA TRATAR OS MÉTODOS QUE O HTML NÃO SUPORTA (PUT, PATCH, DELETE) --}}
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @csrf
					<div class="panel-body">
						<h1 class="text-center my-3">Alterar Permissões da Empresa</h1>
						@include('Admin.formularios.formFormulario')
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
