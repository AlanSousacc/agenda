@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>

<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-8">
				<h2 class="py-3 text-dark"> Balanço geral do mês</h2>
			</div>
		</div>
			{{-- caixas dash --}}
		<div class="row">
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>{{\App\Models\Evento_log::whereMonth('created_at', date('m'))->count('id')}} | <i class="fa fa-sort-numeric-up"></i></h3>
						{{-- <h3>{{$eventlog->count('id')}} | <i class="fa fa-sort-numeric-up"></i></h3> --}}
						
						<p>Total Agendamentos</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						@if ($eventlog->avg('duracaoespera') >= 15)
							<h3>
								{{ number_format(\App\Models\Evento_log::whereMonth('created_at', date('m'))->avg('duracaoespera'), 2, ',', '.')}}
								<i class="fa fa-thumbs-down text-danger" data-toggle="tooltip" data-placement="bottom" title="Média de espera acima de 15 minutos"></i>							
							</h3>							
						@else
							<h3>
								{{ number_format(\App\Models\Evento_log::whereMonth('created_at', date('m'))->avg('duracaoespera'), 2, ',', '.')}}
								<i class="fa fa-thumbs-up text-white" data-toggle="tooltip" data-placement="bottom" title="Média de espera abaixo de 15 minutos"></i>
							</h3>
						@endif						
						<p>Média de Espera </p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						@if ($eventlog->avg('duracaoatendimento') >= 60)
							<h3>
								{{ number_format(\App\Models\Evento_log::whereMonth('created_at', date('m'))->avg('duracaoatendimento'), 2, ',', '.')}}
								<i class="fa fa-thumbs-down text-danger" data-toggle="tooltip" data-placement="bottom" title="Média de atendimentos acima de 60 minutos"></i>							
							</h3>							
						@else
							<h3>
								{{ number_format(\App\Models\Evento_log::whereMonth('created_at', date('m'))->avg('duracaoatendimento'), 2, ',', '.')}}
								<i class="fa fa-thumbs-up text-success" data-toggle="tooltip" data-placement="bottom" title="Média de atendimentos abaixo de 60 minutos"></i>
							</h3>
						@endif
						<p>Média Duração Atendimento</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		{{-- end caixas dash --}}
			
			<div class="card mt-3">
				<div class="card-header">
					<div class="row">
						<div class="col-8">
							<h3 class="card-title mt-2"> Relatório de Tempo</h3>
						</div>
						<div class="col-4 search mt-1" style="text-align: center;">
							<a href="http://" data-target="#filtroagendamento" data-toggle="modal" class="btn btn-success btn-sm float-md-right">Filtrar <i class="fa fa-filter"></i></a>
						</div>
					</div>
				</div>
				
				<div class="table-responsive-sm">
					<table class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center" style="width:80px">Data</th>
								<th class="text-center" style="width:250px">Nome</th>
								<th class="text-center" style="width:150px">Hr Marcada</th>
								<th class="text-center" style="width:150px">Hr Chegada</th>
								<th class="text-center" style="width:100px">Ini Atend.</th>
								<th class="text-center" style="width:120px">Fim Atend.</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($eventlog as $item)
							<tr role="row" class="odd">
								<td class="text-center">{{Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
								<td>{{$item->event->contato->nome}}</td>
								<td class="text-center">{{Carbon\Carbon::parse($item->event->start)->format('H:i')}}</td>
								<td class="text-center">{{Carbon\Carbon::parse($item->dtchegada)->format('H:i')}}</td>
								<td class="text-center">{{Carbon\Carbon::parse($item->dtatendimento)->format('H:i')}}</td>
								<td class="text-center">{{Carbon\Carbon::parse($item->dtfimatendimento)->format('H:i')}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="row footer-modal">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$eventlog->count()}} registros(s) de um total de {{$eventlog->total()}}</p></div>
					<div class="col-md-6 pr-4">{{$eventlog->links()}}</div>
				</div>
			</div>
			{{-- modal filtro--}}
			{{-- @include('Admin.fullcalendar.modalFiltro') --}}
		</div>
	</div>
	
	@push('scripts')
	<script src='{{asset('admin/js/atendimento/atendimento.js')}}'></script>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	@endpush
	@endsection