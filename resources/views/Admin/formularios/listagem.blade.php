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
					<a class="nav-link active" id="custom-tabs-three-ativos-tab" data-toggle="pill" href="#custom-tabs-three-Formulariosativos" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Ativos</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-inativos-tab" data-toggle="pill" href="#custom-tabs-three-inativos" role="tab" aria-controls="custom-tabs-three-inativos" aria-selected="false">Inativos</a>
				</li>

			</ul>
		</div>
		<div class="tab-content" id="custom-tabs-three-tabContent">
			{{-- FORMULÁRIOS ATIVOS --}}
			<div class="tab-pane fade show active" id="custom-tabs-three-Formulariosativos" role="tabpanel" aria-labelledby="custom-tabs-three-ativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width: 20px;" >#ID</th>
								<th class="th-sm" style="width: 250px;" >Descrição</th>
								<th class="text-center th-sm" style="width: 100px;" >Criado em</th>
								<th class="text-center th-sm" style="width: 100px;" >Atualizado em</th>
								<th class="text-center th-sm" style="width: 50px;" >Status</th>
								<th class="text-center th-sm" style="width: 50px;" >Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($formAtivo as $form)
							<tr role="row" class="odd">
								<td class="text-center">{{$form->id}}</td>
								<td>{{$form->descricao}}</td>
								<td class="text-center">{{ date('d/m/Y H:m', strtotime($form->created_at)) }}</td>
								<td class="text-center">{{ date('d/m/Y H:m', strtotime($form->updated_at)) }}</td>
								<td class="text-center">
									@if ( $form->status == 1)
									<i class="fa fa-check-circle fa-lg" style="color:green"></i>
									@else
									<i class="fa fa-times-circle fa-lg" style="color:red"></i>
									@endif
								</td>
								<td class="text-center" style="padding: 0.45rem">
									<div class="btn-group dropleft">
										<a class="btn btn-outline-secondary btn-sm btn-block" href="{{ route('form.edit', $form->id) }}"><i class="fa fa-edit"></i> Editar</a>
								 </div>
									</div>
								</td>
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
			<div class="tab-pane fade" id="custom-tabs-three-inativos" role="tabpanel" aria-labelledby="custom-tabs-three-inativos-tab">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
								<tr>
										<th class="text-center" style="width: 20px;" >#ID</th>
										<th class="th-sm" style="width: 250px;" >Descrição</th>
										<th class="text-center th-sm" style="width: 100px;" >Criado em</th>
										<th class="text-center th-sm" style="width: 100px;" >Atualizado em</th>
										<th class="text-center th-sm" style="width: 50px;" >Status</th>
										<th class="text-center th-sm" style="width: 50px;" >Opções</th>
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
								<td class="text-center" style="padding: 0.45rem">
										<div class="btn-group dropleft">
                        <a class="btn btn-outline-secondary btn-sm btn-block" href="{{ route('form.edit', $form->id) }}"><i class="fa fa-edit"></i> Editar</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando  {{$formInativo->count()}}  Formulários inativos de um total de  {{$formInativo->total()}}</p></div>
					<div class="col-md-6 pr-4">{{$formInativo->links()}}</div>
				</div>
			</div>
			{{-- Fim FORMULÁRIOS INATIVOS --}}

		</div>
	</div>
	{{-- modal Desativar Formulário --}}
	{{-- @include('Admin.formularios.modalExcluir') --}}

</div>
<!-- /.card -->
@push('scripts')
<script src='{{asset('admin/js/formualario/formulario.js')}}'></script>
@endpush
@endsection

{{-- 
EXEMPLO DE TOGGLE BUTTON
<div class="form-group">
		<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
			<input type="checkbox" class="custom-control-input" id="customSwitch3">
			<label class="custom-control-label" for="customSwitch3">Este é só um exemplo de Toggle para ficar guardado kkkkkk</label>
		</div>
	</div> --}}
