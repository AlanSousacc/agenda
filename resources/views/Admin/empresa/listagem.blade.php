@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<nav class="navbar navbar-light bg-light">
		<h3 class="navbar-brand">Listagem de empresas</h3>
		<div class="col-md-6 float-md-right search">
			<a class="btn btn-primary btn-sm float-right mr-3" href="{{route('empresa.create')}}" role="button" style="margin-top: 1px;"> <i class="fa fa-plus-circle"></i> Nova Empresa</a>
		</div>
	</nav>
	
	<div class="card card-primary card-outline card-outline-tabs" style="border-top: 0px solid #007bff;">
		<div class="card-header p-0 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="custom-tabs-three-contatosativos-tab" data-toggle="pill" href="#custom-tabs-three-contatosativos" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Ativos</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-contatosinativos-tab" data-toggle="pill" href="#custom-tabs-three-contatosinativos" role="tab" aria-controls="custom-tabs-three-contatosinativos" aria-selected="false">Inativos</a>
				</li>
			</ul>
		</div>
		<div class="tab-content" id="custom-tabs-three-tabContent">
			{{-- Empresas Ativos --}}
			<div class="tab-pane fade show active" id="custom-tabs-three-contatosativos" role="tabpanel" aria-labelledby="custom-tabs-three-contatosativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center">#ID</th>
								<th class="text-center">Razão Social</th>
								<th class="text-center">Nome Fantasia</th>
								<th class="text-center">CNPJ</th>
								<th class="text-center">Telefone</th>
								<th class="text-center">Email</th>
								<th class="text-center">Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($consulta->where('status', 1) as $item)
							<tr role="row" class="odd">
								<td class="text-center">{{$item->id}}</td>
								<td class="sorting_1">{{$item->razaosocial}}</td>
								<td>{{$item->nomefantasia}}</td>
								<td>{{$item->cnpj}}</td>
								<td>{{$item->telefone}}</td>
								<td>{{$item->email}}</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											@if (Auth::user()->profile == 'Administrador' )
											<a class="dropdown-item" href="{{$item->id}}"
												data-emprid="{{$item->id}}"
												data-razaosocial="{{$item->razaosocial}}"
												data-nomefantasia="{{$item->nomefantasia}}"
												data-apelido="{{$item->apelido}}"
												data-cnpj="{{$item->cnpj}}"
												data-ie="{{$item->ie}}"
												data-im="{{$item->im}}"
												data-telefone="{{$item->telefone}}"
												data-email="{{$item->email}}"
												data-cidade="{{$item->cidade}}"
												data-endereco="{{$item->endereco}}"
												data-numero="{{$item->numero}}"
												data-cep="{{$item->cep}}"
												data-logo="{{$item->logo}}"
												data-bairro="{{$item->bairro}}"
												data-tipo="{{$item->tipo}}"
												data-target="#editar"
												data-toggle="modal"><i class="fa fa-edit"></i> Editar</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="{{$item->id}}" data-emprid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
												<div class="dropdown-divider"></div>
												{{-- <a href="{{$item->id}}" data-target="#licenca" data-toggle="modal" class="dropdown-item">
													<img src="{{URL::asset('assets/master-admin/img/license.png')}}" style="max-width:20px;">
													Licença
												</a> --}}
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="{{ route('modulosempresa.edit', $item->id) }}" ><i class="fa fa-lock"></i> Permissões</a>
												@endif
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} empresas de um total de {{$consulta->total()}} #ATIVAS#</p></div>
						@if (isset($empresas))
						<div class="col-md-6 pr-4">{{$consulta->appends($empresas)->links()}}</div>
						@else
						<div class="col-md-6 pr-4">{{$consulta->links()}}</div>
						@endif
					</div>
				</div>
				{{-- Fim Empresas Ativos --}}
				
				{{-- Empresas Inativos --}}
				<div class="tab-pane fade" id="custom-tabs-three-contatosinativos" role="tabpanel" aria-labelledby="custom-tabs-three-contatosinativos-tab">
					<div class="table-responsive-sm">
						<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">#ID</th>
									<th class="text-center">Razão Social</th>
									<th class="text-center">Nome Fantasia</th>
									<th class="text-center">CNPJ</th>
									<th class="text-center">Telefone</th>
									<th class="text-center">Email</th>
									<th class="text-center">Opções</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($consulta->where('status', 0) as $item)
								<tr role="row" class="odd">
									<td class="text-center">{{$item->id}}</td>
									<td class="sorting_1">{{$item->razaosocial}}</td>
									<td>{{$item->nomefantasia}}</td>
									<td>{{$item->cnpj}}</td>
									<td>{{$item->telefone}}</td>
									<td>{{$item->email}}</td>
									<td class="text-center" style="padding: 0.45rem">
										<div class="btn-group dropleft">
											<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Ação
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												@if (Auth::user()->profile == 'Administrador' )
												<a class="dropdown-item" href="{{$item->id}}"
													data-emprid="{{$item->id}}"
													data-razaosocial="{{$item->razaosocial}}"
													data-nomefantasia="{{$item->nomefantasia}}"
													data-apelido="{{$item->apelido}}"
													data-cnpj="{{$item->cnpj}}"
													data-ie="{{$item->ie}}"
													data-im="{{$item->im}}"
													data-telefone="{{$item->telefone}}"
													data-email="{{$item->email}}"
													data-cidade="{{$item->cidade}}"
													data-endereco="{{$item->endereco}}"
													data-numero="{{$item->numero}}"
													data-cep="{{$item->cep}}"
													data-logo="{{$item->logo}}"
													data-bairro="{{$item->bairro}}"
													data-tipo="{{$item->tipo}}"
													data-target="#editar"
													data-toggle="modal"><i class="fa fa-edit"></i> Editar</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="{{$item->id}}" data-emprid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
													<div class="dropdown-divider"></div>
													{{-- <a href="{{$item->id}}" data-target="#licenca" data-toggle="modal" class="dropdown-item">
														<img src="{{URL::asset('assets/master-admin/img/license.png')}}" style="max-width:20px;">
														Licença
													</a> --}}
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="{{ route('modulosempresa.edit', $item->id) }}" ><i class="fa fa-lock"></i> Permissões</a>
													@endif
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} empresas de um total de {{$consulta->total()}} #INATIVAS#</p></div>
							@if (isset($empresas))
							<div class="col-md-6 pr-4">{{$consulta->appends($empresas)->links()}}</div>
							@else
							<div class="col-md-6 pr-4">{{$consulta->links()}}</div>
							@endif
						</div>
						{{-- Fim empresas Inativos --}}
					</div>
				</div>
				
				{{-- <!-- Modal editar-->
				@include('Admin.empresa.modalEditar') --}}

				<!-- Modal licença-->
				@include('Admin.empresa.modalLicenca')
				
				{{-- modal Deletar--}}
				@include('Admin.empresa.modalExcluir')
				{{-- Modal --}}
			</div>
		</div>
		<!-- /.card -->
		@push('scripts')
		<script src='{{asset('admin/js/empresa/empresa.js')}}'></script>
		@endpush
		@endsection