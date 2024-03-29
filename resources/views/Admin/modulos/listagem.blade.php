@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<nav class="navbar navbar-light bg-light">
		<h3 class="navbar-brand">Listagem de Módulos do Sistema</h3>
		<div class="col-md-6 float-md-right search">
			<a class="btn btn-primary btn-sm float-right" href="{{ route('modulos.novo') }}" role="button">Novo Módulo</a>
	</div>
	</nav>
		<div class="table-responsive-sm">
			<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="text-center" style="width: 50px;" >#ID</th>
						<th class="th-sm" style="width: 200px;" >Nome</th>
						<th class="th-sm" style="width: 120px;" >Descrição</th>
						<th class="text-center" style="width: 120px;" >Opções</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($zmodulos as $modulo)
					<tr role="row" class="odd">
						<td class="text-center">{{$modulo->id}}</td>
						<td class="sorting_1">{{$modulo->nome}}</td>
						<td>{{$modulo->descricao}}</td>
						<td class="text-center" style="padding: 0.45rem">
							<div class="btn-group dropleft">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Ação
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="{{ route('modulos.edit', $modulo->id) }}"><i class="fa fa-edit"></i> Editar</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{$modulo->id}}" data-moduloid={{$modulo->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>		
		{{-- modal Deletar--}}
		@include('Admin.modulos.modalExcluir')
</div>
<!-- /.card -->
@push('scripts')
<script src='{{asset('admin/js/modulo/modulo.js')}}'></script>
@endpush
@endsection