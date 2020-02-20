@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<nav class="navbar navbar-light bg-light">
		<h3 class="navbar-brand">Listagem de Formulários</h3>
		<div class="col-md-6 float-md-right search">
			<a class="btn btn-primary float-right" href="{{route('form.novo')}}" role="button" style="margin-top: 1px;"> <i class="fa fa-plus-circle"></i> Novo Formulário</a>
		</div>
	</nav>
	<div class="card card-primary card-outline card-outline-tabs" style="border-top: 0px solid #007bff;">
		<div class="card-header p-0 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="custom-tabs-three-ativos-tab" data-toggle="pill" href="#custom-tabs-three-ativos" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Ativos</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-inativos-tab" data-toggle="pill" href="#custom-tabs-three-inativos" role="tab" aria-controls="custom-tabs-three-inativos" aria-selected="false">Inativos</a>
				</li>
			</ul>
		</div>
		<div class="tab-content" id="custom-tabs-three-tabContent">
			{{-- FORMULÁRIOS ATIVOS --}}
			<div class="tab-pane fade show active" id="custom-tabs-three-ativos" role="tabpanel" aria-labelledby="custom-tabs-three-ativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;" >#ID</th>
								<th class="th-sm" style="width: 250px;" >Descrição</th>
								<th class="th-sm" style="width: 120px;" >Criado em</th>
								<th class="th-sm" style="width: 120px;" >Atualizado em</th>
								<th class="text-center" style="width: 50px;" >Status</th>
								{{-- <th class="text-center" style="width: 120px;" >Opções</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach ($formAtivo as $form)
							<tr role="row" class="odd">
								<td class="text-center">{{$form->id}}</td>
								<td>{{$form->descricao}}</td>
								<td>{{ date('d/m/Y H:m', strtotime($form->created_at)) }}</td>
								<td>{{ date('d/m/Y H:m', strtotime($form->updated_at)) }}</td>
								<td class="text-center">
									@if ( $form->status == 1)
									<i class="fa fa-check-circle fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-times-circle fa-lg" style="color:red"></i>
									@endif
								</td>
								{{-- <td class="text-center" style="padding: 0.45rem">
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
								</td> --}}
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$formAtivo->count()}} Formulários de um total de {{$formAtivo->total()}}</p></div>
					<div class="col-md-6 pr-4">{{$formAtivo->links()}}</div>
				</div>
			</div>
			{{-- Fim FORMULÁRIOS ATIVOS --}}
			
			{{-- FORMULÁRIOS INATIVOS --}}
			<div class="tab-pane fade show active" id="custom-tabs-three-inativos" role="tabpanel" aria-labelledby="custom-tabs-three-inativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 50px;" >#ID</th>
								<th class="th-sm" style="width: 250px;" >Descrição</th>
								<th class="th-sm" style="width: 120px;" >Criado em</th>
								<th class="th-sm" style="width: 120px;" >Atualizado em</th>
								<th class="text-center" style="width: 50px;" >Status</th>
								{{-- <th class="text-center" style="width: 120px;" >Opções</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach ($formInativo as $form)
							<tr role="row" class="odd">
								<td class="text-center">{{$form->id}}</td>
								<td>{{$form->descricao}}</td>
								<td>{{ date('d/m/Y H:m', strtotime($form->created_at)) }}</td>
								<td>{{ date('d/m/Y H:m', strtotime($form->updated_at)) }}</td>
								<td class="text-center">
									@if ( $form->status == 1)
									<i class="fa fa-check-circle fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-times-circle fa-lg" style="color:red"></i>
									@endif
								</td>
								{{-- <td class="text-center" style="padding: 0.45rem">
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
								</td> --}}
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$formInativo->count()}} Formulários de um total de {{$formInativo->total()}}</p></div>
					<div class="col-md-6 pr-4">{{$formInativo->links()}}</div>
				</div>
			</div>
			{{-- Fim FORMULÁRIOS INATIVOS --}}
			
		</div>
	</div>
	{{-- modal Deletar --}}
	{{-- @include('Admin.formularios.modalExcluir') --}}
	
</div>
<!-- /.card -->
@push('scripts')
<script src='{{asset('admin/js/formualario/formulario.js')}}'></script>
@endpush
@endsection