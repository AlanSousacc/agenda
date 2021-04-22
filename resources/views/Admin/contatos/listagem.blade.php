@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>

<div class="col-12 col-sm-6 col-lg-12">
	<nav class="navbar navbar-light bg-light">
		<h3 class="navbar-brand">Listagem de Contatos</h3>
		<div class="col-md-6 float-md-right search">
			<form action="{{route('routeContatoSearch')}}" method="POST" class="form-inline float-right">
				@csrf
				<div class="input-group input-group-sm">
					<input type="search" placeholder="Consultar" aria-label="Consultar" name="nome" class="form-control form-control-navbar">
					<div class="input-group-append">
						<button type="submit" class="btn btn-navbar"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		<a class="btn btn-primary btn-sm float-right mr-3" href="{{route('contato.create')}}" role="button" style="margin-top: 1px;"> <i class="fa fa-plus-circle"></i> Novo Contato</a>
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
			{{-- Contato Ativos --}}
			<div class="tab-pane fade show active" id="custom-tabs-three-contatosativos" role="tabpanel" aria-labelledby="custom-tabs-three-contatosativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;" >#ID</th>
								<th class="th-sm" style="width: 200px;" >Nome Completo</th>
								<th class="th-sm" style="width: 120px;" >Documento</th>
								<th class="th-sm" style="width: 150px;" >Telefone</th>
								<th class="th-sm" style="width: 161px;" >Email</th>
								<th class="text-center" style="width: 120px;" >Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($consulta->where('status', 1) as $item)
							<tr role="row" class="odd">
								<td class="text-center">{{$item->id}}</td>
								<td class="sorting_1">{{$item->nome}}</td>
								<td>{{$item->documento}}</td>
								<td>{{$item->telefone}}</td>
								<td>{{$item->email}}</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{route('contato.show', $item->id)}}"><i class="fab fa-wpforms"></i> Detalhar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{route('movimentacao.contato', $item->id)}}"><i class="fa fa-money-check-alt"></i> Financeiro</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} contatos de um total de {{$consulta->total()}} #ATIVOS#</p></div>
					@if (isset($contato))
					<div class="col-md-6 pr-4">{{$consulta->appends($contato)->links()}}</div>
					@else
					<div class="col-md-6 pr-4">{{$consulta->links()}}</div>
					@endif
				</div>
			</div>
			{{-- Fim Contato Ativos --}}
			
			{{-- Contatos Inativos --}}
			<div class="tab-pane fade" id="custom-tabs-three-contatosinativos" role="tabpanel" aria-labelledby="custom-tabs-three-contatosinativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;" >#ID</th>
								<th class="th-sm" style="width: 200px;" >Nome Completo</th>
								<th class="th-sm" style="width: 120px;" >Documento</th>
								<th class="th-sm" style="width: 150px;" >Telefone</th>
								<th class="th-sm" style="width: 161px;" >Email</th>
								<th class="text-center" style="width: 120px;" >Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($consulta->where('status', 0) as $item)
							<tr role="row" class="odd">
								<td class="text-center">{{$item->id}}</td>
								<td class="sorting_1">{{$item->nome}}</td>
								<td>{{$item->documento}}</td>
								<td>{{$item->telefone}}</td>
								<td>{{$item->email}}</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="dropdown">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{route('contato.show', $item->id)}}"><i class="fab fa-wpforms"></i> Detalhar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{route('movimentacao.contato', $item->id)}}"><i class="fa fa-money-check-alt"></i> Financeiro</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} contatos de um total de {{$consulta->total()}}  #INATIVOS#</p></div>
					@if (isset($contato))
					<div class="col-md-6 pr-4">{{$consulta->appends($contato)->links()}}</div>
					@else
					<div class="col-md-6 pr-4">{{$consulta->links()}}</div>
					@endif
				</div>
			</div>
			{{-- Fim Contatos Inativos --}}
		</div>
	</div>
	{{-- modal Deletar--}}
	@include('Admin.contatos.modalExcluir')
</div>

<!-- /.card -->
@push('scripts')
<script src='{{asset('js/contato/contato.js')}}'></script>
@endpush
@endsection



