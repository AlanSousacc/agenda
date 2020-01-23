@extends('layouts.master-admin')
@section('master')
<head>
	<!-- DataTables -->
	<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.css">
</head>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-default">
        <form action="{{route('modulosempresa.list', 'id')}}" method="POST">
					{{-- ADICIONAR AS 2 LINHAS SEGUINTES PARA TRATAR OS MÉTODOS QUE O HTML NÃO SUPORTA (PUT, PATCH, DELETE) --}}
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @csrf
          <div class="panel-body">
            <h1 class="text-center">Alterar Permissões de Acesso da Empresa</h1><br>
						@include('Admin.empresa.moduloempresa.formModuloEmpresa')
					</div>
						{{-- <button type="submit" class="btn btn-primary" style="margin-left: 7px;">Salvar Cadastro</button> --}}
				</form>
      </div>
    </div>
  </div>
</div>
@endsection