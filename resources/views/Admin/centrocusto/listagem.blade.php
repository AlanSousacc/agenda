@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<nav class="navbar navbar-light bg-light">
		<h3 class="navbar-brand">Listagem de Centros de Custo</h3>
		<div class="col-md-6 float-md-right search">
			<a class="btn btn-primary btn-sm float-right" href="{{route('cc.novo')}}" role="button" style="margin-top: 1px;"> <i class="fa fa-plus-circle"></i> Novo Centro de Custo</a>
		</div>
	</nav>
	<div class="card card-primary card-outline card-outline-tabs" style="border-top: 0px solid #007bff;">
		<div class="card-header p-0 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="custom-tabs-three-centroreceitas-tab" data-toggle="pill" href="#custom-tabs-three-centroreceitas" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Receitas</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-centrodespesas-tab" data-toggle="pill" href="#custom-tabs-three-centrodespesas" role="tab" aria-controls="custom-tabs-three-centrodespesas" aria-selected="false">Despesas</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-centroinativos-tab" data-toggle="pill" href="#custom-tabs-three-centroinativos" role="tab" aria-controls="custom-tabs-three-centroinativos" aria-selected="false">Inativos</a>
				</li>
			</ul>
		</div>
		<div class="tab-content" id="custom-tabs-three-tabContent">
			{{-- CC Ativos --}}
			<div class="tab-pane fade show active" id="custom-tabs-three-centroreceitas" role="tabpanel" aria-labelledby="custom-tabs-three-centroreceitas-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;" >#ID</th>
								<th class="th-sm" style="width: 75px;" >Tipo</th>
								<th class="text-center" style="width: 50px;" >#</th>
								<th class="th-sm" style="width: 250px;" >Descrição</th>
								<th class="th-sm" style="width: 120px;" >Criado em</th>
								<th class="th-sm" style="width: 120px;" >Atualizado em</th>
								<th class="text-center" style="width: 50px;" >Status</th>
								<th class="text-center" style="width: 120px;" >Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($centroReceita as $cc)
							<tr role="row" class="odd">
								<td class="text-center">{{$cc->id}}</td>
								<td class="sorting_1">{{$cc->tipo}}</td>
								<td class="text-center">
									@if ( $cc->tipo == 'Receita')
									<i class="fa fa-arrow-alt-circle-up fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-arrow-alt-circle-down fa-lg" style="color:red"></i>
									@endif
								</td>
								<td>{{$cc->descricao}}</td>
								<td>{{ date('d/m/Y H:m', strtotime($cc->created_at)) }}</td>
								<td>{{ date('d/m/Y H:m', strtotime($cc->updated_at)) }}</td>
								<td class="text-center">
									@if ( $cc->status == 1)
									<i class="fa fa-check-circle fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-times-circle fa-lg" style="color:red"></i>
									@endif
								</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{ route('cc.edit', $cc->id) }}"><i class="fa fa-edit"></i> Editar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$cc->id}}" data-centroid={{$cc->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$centroReceita->count()}} centros de custo #RECEITAS# de um total de {{$centroReceita->total()}}</p></div>
					<div class="col-md-6 pr-4">{{$centroReceita->links()}}</div>
				</div>
			</div>
			{{-- Fim CC receitas --}}
			
			{{-- CC Despesas --}}
			<div class="tab-pane fade" id="custom-tabs-three-centrodespesas" role="tabpanel" aria-labelledby="custom-tabs-three-centrodespesas-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;" >#ID</th>
								<th class="th-sm" style="width: 75px;" >Tipo</th>
								<th class="text-center" style="width: 50px;" >#</th>
								<th class="th-sm" style="width: 250px;" >Descrição</th>
								<th class="th-sm" style="width: 120px;" >Criado em</th>
								<th class="th-sm" style="width: 120px;" >Atualizado em</th>
								<th class="text-center" style="width: 50px;" >Status</th>
								<th class="text-center" style="width: 120px;" >Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($centroDespesa as $cc)
							<tr role="row" class="odd">
								<td class="text-center">{{$cc->id}}</td>
								<td class="sorting_1">{{$cc->tipo}}</td>
								<td class="text-center">
									@if ( $cc->tipo == 'Receita')
									<i class="fa fa-arrow-alt-circle-up fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-arrow-alt-circle-down fa-lg" style="color:red"></i>
									@endif
								</td>
								<td>{{$cc->descricao}}</td>
								<td>{{ date('d/m/Y H:m', strtotime($cc->created_at)) }}</td>
								<td>{{ date('d/m/Y H:m', strtotime($cc->updated_at)) }}</td>
								<td class="text-center">
									@if ( $cc->status == 1)
									<i class="fa fa-check-circle fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-times-circle fa-lg" style="color:red"></i>
									@endif
								</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{ route('cc.edit', $cc->id) }}"><i class="fa fa-edit"></i> Editar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$cc->id}}" data-centroid={{$cc->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$centroDespesa->count()}} centros de custo #DESPESAS# de um total de {{$centroDespesa->total()}}</p></div>
					<div class="col-md-6 pr-4">{{$centroDespesa->links()}}</div>
				</div>
			</div>
			{{-- Fim CC Despesas --}}

			{{-- CC INATIVOS --}}
			<div class="tab-pane fade" id="custom-tabs-three-centroinativos" role="tabpanel" aria-labelledby="custom-tabs-three-centroinativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;" >#ID</th>
								<th class="th-sm" style="width: 75px;" >Tipo</th>
								<th class="text-center" style="width: 50px;" >#</th>
								<th class="th-sm" style="width: 250px;" >Descrição</th>
								<th class="th-sm" style="width: 120px;" >Criado em</th>
								<th class="th-sm" style="width: 120px;" >Atualizado em</th>
								<th class="text-center" style="width: 50px;" >Status</th>
								<th class="text-center" style="width: 120px;" >Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($centroInativo as $cc)
							<tr role="row" class="odd">
								<td class="text-center">{{$cc->id}}</td>
								<td class="sorting_1">{{$cc->tipo}}</td>
								<td class="text-center">
									@if ( $cc->tipo == 'Receita')
									<i class="fa fa-arrow-alt-circle-up fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-arrow-alt-circle-down fa-lg" style="color:red"></i>
									@endif
								</td>
								<td>{{$cc->descricao}}</td>
								<td>{{ date('d/m/Y H:m', strtotime($cc->created_at)) }}</td>
								<td>{{ date('d/m/Y H:m', strtotime($cc->updated_at)) }}</td>
								<td class="text-center">
									@if ( $cc->status == 1)
									<i class="fa fa-check-circle fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-times-circle fa-lg" style="color:red"></i>
									@endif
								</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Ação
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{ route('cc.edit', $cc->id) }}"><i class="fa fa-edit"></i> Editar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{$cc->id}}" data-centroid={{$cc->id}} data-target="#delete" data-toggle="modal"><i class="fa fa-trash"></i> Excluir</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$centroInativo->count()}} centros de custo #INATIVOS# de um total de {{$centroInativo->total()}}</p></div>
					<div class="col-md-6 pr-4">{{$centroInativo->links()}}</div>
				</div>
			</div>
			{{-- Fim CC INATIVOS --}}
		</div>
	</div>
	{{-- modal Deletar --}}
	@include('Admin.centrocusto.modalExcluir')
	
</div>
<!-- /.card -->
@push('scripts')
<script src='{{asset('admin/js/centrocusto/centrocusto.js')}}'></script>
@endpush
@endsection