@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">

	<nav class="navbar navbar-light bg-light">
		<h3 class="navbar-brand">Listagem de Usuários</h3>
		<div class="col-md-6 float-md-right search">
			<form action="{{route('routeUserSearch')}}" method="POST" class="form-inline float-right">
				@csrf
				<div class="input-group input-group-sm">
					<input type="search" placeholder="Consultar" aria-label="Consultar" name="name" class="form-control form-control-navbar">
					<div class="input-group-append">
						<button type="submit" class="btn btn-navbar"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
			<a class="btn btn-primary btn-sm float-right mr-3" href="{{ route('register') }}" role="button" style="margin-top: 1px;"> <i class="fa fa-plus-circle"></i> Novo Usuário</a>
		</div>
	</nav>


	<div class="card">
		{{-- <div class="card-header">
		<div class="col-md-6">
				<h3 class="card-title mt-md-2"> Listagem de Usuários</h3>
			</div>
			
			<div class="col-md-6 float-md-right search">
				<form action="{{route('routeUserSearch')}}" method="POST" class="form-inline float-right">
					@csrf
					<div class="input-group input-group-sm">
						<input type="search" placeholder="Consultar" aria-label="Consultar" name="name" class="form-control form-control-navbar">
						<div class="input-group-append">
							<button type="submit" class="btn btn-navbar"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</form>
				<a class="btn btn-primary float-right mr-3" href="{{ route('register') }}" role="button" style="margin-top: 1px;"> <i class="fa fa-plus-circle"></i> Novo Usuário</a>
			</div>
		</div> --}}
		<div class="table-responsive-sm">
			<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th-sm text-center" style="width: 50px;">#ID</th>
						<th class="th-sm" style="width: 150px;">Nome Completo</th>
						<th class="th-sm" style="width: 150px;">Email
							<th class="th-sm" style="width: 120px;">Ultima Atualização</th>
							<th class="th-sm" style="width: 120px;">Perfil</th>
							<th class="th-sm" style="width: 120px;">Opções</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($consulta as $item)
						<tr role="row" class="odd">
							<td class="text-center">{{$item->id}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->email}}</td>
							<td>{{Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i:s')}}</td>
							<td>{{$item->profile}}</td>
							<td class="text-center" style="padding: 0.45rem">
								<div class="btn-group dropleft">
									<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Ação
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="{{$item->id}}"
											data-userid="{{$item->id}}"
											data-name="{{$item->name}}"
											data-email="{{$item->email}}"
											data-updated_at="{{Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i:s')}}"
											data-password="{{$item->password}}"
											data-profile="{{$item->profile}}"
											data-target="#editar"
											data-toggle="modal"> Editar <i class="fa fa-edit"></i></a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$item->id}}" data-userid={{$item->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} usuários de um total de {{$consulta->total()}}  #ATIVOS#</p></div>
					@if (isset($dataForm))
					<div class="col-md-6 pr-4">{{$consulta->appends($dataForm)->links()}}</div>
					@else
					<div class="col-md-6 pr-4">{{$consulta->links()}}</div>
					@endif
				</div>
				
				<!-- Modal editar-->
				@include('Admin.users.modalEditar')
				
				{{-- modal Deletar--}}
				@include('Admin.users.modalExcluir')
				{{-- Modal --}}
				
			</div>
		</div>
		<!-- /.card -->
		@push('scripts')
		<script src='{{asset('admin/js/users/users.js')}}'></script>
		<script>
			$('.alert').alert()
		</script>
		@endpush
		@endsection
		
		
		