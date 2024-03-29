@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.master-message')
</div>
<div class="container">
	<div class="col-md-12">
		<div class="card mt-3">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h3 class="card-title mt-2"> Listagem de Agendamentos</h3>
					</div>
					<div class="col-4 search mt-1" style="text-align: center;">
						<a href="http://" data-target="#filtroagendamento" data-toggle="modal" class="btn btn-success btn-sm float-md-right">Filtrar <i class="fa fa-filter"></i></a>
					</div>
				</div>
	
			</div>
	
			<div class="table-responsive-sm">
				<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="text-center">Contato</th>
							<th class="text-center">Tipo Agendamento</th>
							<th class="text-center">Data/Hora inicio</th>
							<th class="text-center">Data/Hora Final</th>
							<th class="text-center">Descrição</th>
							<th class="text-center"><i class="fa fa-dollar-sign"></i></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($consulta as $item)
						<tr role="row" class="odd">
							<td class="text-center">{{$item->contato->nome}}</td>
							<td class="text-center">{{$item->title}}</td>
							<td class="text-center">{{Carbon\Carbon::parse($item->start)->format('d/m/Y H:i:s')}}</td>
							<td class="text-center">{{Carbon\Carbon::parse($item->end)->format('d/m/Y H:i:s')}}</td>
							<td class="text-center">{{$item->description}}</td>
							<td class="text-center">
								@if ($item->geracobranca)
									<i class="fa fa-donate" style="color: #3fb359" data-toggle="tooltip" data-placement="bottom" title="Este agendamento tem fatura!"></i>
								@else
									<i class="fa fa-donate" style="color: #ff5656" data-toggle="tooltip" data-placement="bottom" title="Este agendamento não tem fatura!"></i>
								@endif
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
			</div>
				<div class="row footer-modal">
					<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} agendamento(s) de um total de {{$consulta->total()}}</p></div>
					@if (isset($evento))
					<div class="col-md-6 pr-4">{{$consulta->appends($evento)->links()}}</div>
					@else
					<div class="col-md-6 pr-4">{{$consulta->links()}}</div>
					@endif
				</div>
			</div>
			{{-- modal filtro--}}
			@include('Admin.fullcalendar.modalFiltro')
		</div>
</div>

  <!-- /.card -->
  @push('scripts')
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
  @endpush
  @endsection



