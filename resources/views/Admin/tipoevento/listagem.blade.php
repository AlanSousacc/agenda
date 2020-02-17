@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<nav class="navbar navbar-light bg-light">
		<h3 class="navbar-brand">Listagem de Tipos de Agendamento</h3>
		<div class="col-md-6 float-md-right search">
			<a class="btn btn-primary float-right mr-3" href="{{route('tipoevento.novo')}}" role="button" style="margin-top: 1px;"> <i class="fa fa-plus-circle"></i> Novo Tipo de Agendamento</a>
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
					<table class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width:50px">#ID</th>
								<th class="text-center" style="width:50px">Status</th>
								<th class="text-center" style="width:250px">Descrição</th>
								<th class="text-center" style="width:50px">Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($consultaAtivo as $item)
							<tr role="row" class="odd">
								<td class="text-center">{{$item->id}}</td>
								<td class="text-center">
									@if ( $item->status == 1)
									<i class="fa fa-check-circle" style="color:green"></i>
									@else
									<i class="fa fa-times-circle" style="color:red"></i>
									@endif
								</td>
								<td>{{$item->titulo}}</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{route('tipoevento.edit', $item->id)}}"><i class="fa fa-edit"></i> Editar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$item->id}}" data-tipeveid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consultaAtivo->count()}} contatos de um total de {{$consultaAtivo->total()}}</p></div>
					@if (isset($contato))
					<div class="col-md-6 pr-4">{{$consultaAtivo->appends($contato)->links()}}</div>
					@else
					<div class="col-md-6 pr-4">{{$consultaAtivo->links()}}</div>
					@endif
				</div>
			</div>
			{{-- Fim Contato Ativos --}}
			
			{{-- Contatos Inativos --}}
			<div class="tab-pane fade" id="custom-tabs-three-contatosinativos" role="tabpanel" aria-labelledby="custom-tabs-three-contatosinativos-tab">
				<div class="table-responsive-sm">
					<table class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width:50px">#ID</th>
								<th class="text-center" style="width:50px">Status</th>
								<th class="text-center" style="width:250px">Descrição</th>
								<th class="text-center" style="width:50px">Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($consultaInativo as $item)
							<tr role="row" class="odd">
								<td class="text-center">{{$item->id}}</td>
								<td class="text-center">
									@if ( $item->status == 1)
									<i class="fa fa-check-circle" style="color:green"></i>
									@else
									<i class="fa fa-times-circle" style="color:red"></i>
									@endif
								</td>
								<td>{{$item->titulo}}</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{route('tipoevento.edit', $item->id)}}"><i class="fa fa-edit"></i> Editar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$item->id}}" data-tipeveid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consultaInativo->count()}} contatos de um total de {{$consultaInativo->total()}}</p></div>
					@if (isset($contato))
					<div class="col-md-6 pr-4">{{$consultaInativo->appends($contato)->links()}}</div>
					@else
					<div class="col-md-6 pr-4">{{$consultaInativo->links()}}</div>
					@endif
				</div>
			</div>
			{{-- Fim Contatos Inativos --}}
		</div>
	</div>
	{{-- modal Deletar --}}
	@include('Admin.tipoevento.modalExcluir')
	
</div>
<!-- /.card -->
@push('scripts')
<script src='{{asset('admin/js/tipoevento/tipoevento.js')}}'></script>
@endpush
@endsection