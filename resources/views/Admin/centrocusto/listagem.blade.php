@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="com-md-6">
				<h3 class="card-title mt-md-2"> Listagem de Centro de Custo</h3>
			</div>
			
			<div class="com-md-6 float-md-right search">
				{{-- <form action="{{route('routeModuloSearch')}}" method="POST" class="form-inline"> --}}
					@csrf
					<div class="input-group input-group-sm">
						<input type="search" placeholder="Consultar" aria-label="Consultar" name="nome" class="form-control form-control-navbar">
						<div class="input-group-append">
							<button type="submit" class="btn btn-navbar"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-center" style="width: 50px;" >#ID</th>
					<th class="th-sm" style="width: 75px;" >Tipo</th>
					<th class="text-center" style="width: 50px;" >#</th>
					<th class="th-sm" style="width: 250px;" >Descrição</th>
					<th class="th-sm" style="width: 120px;" >Criado em</th>
					<th class="th-sm" style="width: 120px;" >Atualizado em</th>
					<th class="text-center" style="width: 120px;" >Opções</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($centro as $cc)
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
					<td class="text-center" style="padding: 0.45rem">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Ação
							</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="{{ route('cc.edit', $cc->id) }}"> Editar <i class="fa fa-edit"></i></a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{$cc->id}}" data-centroid={{$cc->id}} data-target="#delete" data-toggle="modal">Excluir <i class="fa fa-trash"></i></a>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			{{-- <!-- Paginator - Configurado com a consulta. -->
			<!-- <div class="row">
				<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$centro->count()}} contatos de um total de {{$centro->total()}}</p></div>
				@if (isset($modulo))
					<div class="col-md-6 pr-4">{{$centro->appends($modulo)->links()}}</div>
				@else
					<div class="col-md-6 pr-4">{{$centro->links()}}</div>
				@endif
			</div>  --> --}}

			{{-- modal Deletar --}}
			@include('Admin.centrocusto.modalExcluir')


			<div class="card-footer">
				<div class="col-md-6 offset-md-4 float-right">
					<a class="btn btn-primary float-right" href="{{ route('cc.novo') }}" role="button">Novo Centro de Custo</a>
				</div>
			</div>
		</div>
		


	</div>
	<!-- /.card -->
	@push('scripts')
		<script src='{{asset('admin/js/centrocusto/centrocusto.js')}}'></script>
	@endpush


	@endsection
	
	
	
	