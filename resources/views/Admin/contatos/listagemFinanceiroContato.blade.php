@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>
<div class="col-md-12">
	<div class="card mt-3">

		{{-- dash --}}
		<div class="row p-3">
			<div class="col-lg-4 col-6">
				<div class="small-box bg-info">
					<div class="inner">
						<h3>
							R$ {{number_format(App\Models\Movimento::where('contato_id', $contato->id)->sum('valortotal'), 2, ',', '.')}}
							{{-- <i class="fa fa-calendar-check"></i> --}}
						</h3>									
						<p>Movimentação Total</p>
					</div>
					<div class="icon">
						<i class="fa fa-donate"></i>
					</div>
					{{-- <a href="#" class="small-box-footer">Visualizar agendamentos <i class="fas fa-arrow-circle-right"></i></a> --}}
				</div>
			</div>

			<div class="col-lg-4 col-6">
				<div class="small-box bg-success">
					<div class="inner">
						<h3>
							R$ {{number_format(App\Models\Movimento::where('contato_id', $contato->id)->sum('valorrecebido'), 2, ',', '.')}}
						</h3>									
						<p>Total de Receb. / Pag.</p>
					</div>
					<div class="icon">
						<i class="fa fa-check"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-6">
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>
							R$ {{number_format(App\Models\Movimento::where('contato_id', $contato->id)->sum('valorpendente'), 2, ',', '.')}}
							
						</h3>							
						<p>Restante</p>
					</div>
					<div class="icon">
						<i class="fa fa-exclamation-circle"></i>
					</div>
					{{-- <a href="#" class="small-box-footer">Visualizar próximas <i class="fas fa-arrow-circle-right"></i></a> --}}
				</div>
			</div>
		</div>
		{{-- end dash --}}

		<div class="card-header">
			<div class="com-md-12">
				<h3 class="card-title mt-md-2">Listagem de Movimentação por Contato</h3>
			</div>
		</div>
		<table class="table table-striped table-bordered table-md" width="100%">
			<thead>
				<tr>
					<th class="text-center">Cond Pag.</th>
					<th class="text-center">Tipo</th>
					<th class="text-center">Dt. de Movi.</th>
					<th class="text-center">Valor Total</th>
					<th class="text-center">Valor Pago</th>
					<th class="text-center">Valor Deb.</th>
					<th class="text-center">Status</th>
					<th class="text-center" >Opções</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($consulta as $item)
				<tr role="row" class="odd">
					<td class="text-center">{{$item->condicao_pagamento->nome}}</td>
					<td class="text-center">
						@if ($item->tipo == 'Entrada')
						<i class="fa fa-arrow-alt-circle-up text-success"></i>
						@else
						<i class="fa fa-arrow-alt-circle-down text-danger"></i>
						@endif
					</td>
					<td class="text-center">{{$item->movimented_at->format('d/m/Y')}}</td>
					<td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
					@if ($item->status == 0)
					<td class="text-center text-danger"><i class="fa fa-times-circle"></i></td>
					@else
					<td class="text-center text-success"><i class="fa fa-check-circle"></i></td>
					@endif
					<td class="text-center" style="padding: 0.45rem">
						<div class="btn-group dropleft">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Ação
							</button>
							
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="{{$item->id}}"
									data-tipo="{{$item->tipo}}"
									data-contato_id="{{$item->contato->id}}"
									data-user_id="{{$item->user->name}}"
									data-centrocusto_id="{{$item->centrocusto->id}}"
									data-condicao_pagamento_id="{{$item->condicao_pagamento->id}}"
									data-observacao="{{$item->observacao}}"
									data-valortotal="{{$item->valortotal}}"
									data-valorrecebido="{{$item->valorrecebido}}"
									data-valorpendente="{{$item->valorpendente}}"
									data-movimented_at="{{$item->movimented_at->format('d/m/Y')}}"
									data-status="{{$item->status == 0 ? 'Aberto' : 'Completo'}}"
									data-target="#visualizar"
									data-toggle="modal"> Visualizar <i class="fab fa-wpforms"></i></a>
									<div class="dropdown-divider"></div>
									@if ($item->status == 0)
									<a class="dropdown-item" href="{{$item->id}}"
										data-movid={{$item->id}}
										data-tipo="{{$item->tipo == 'Entrada' ? 'receber' : 'pagar' }}"
										data-valortotal="{{$item->valortotal}}"
										data-valorrecebido="{{$item->valorrecebido}}"
										data-valorpendente="{{$item->valorpendente}}"
										data-target="#fecharconta"
										data-toggle="modal">
										@if ($item->tipo == 'Entrada')
										Receber <i class="fa fa-money-bill-alt"></i>
										@else
										Pagar <i class="fa fa-money-bill-alt"></i>
										@endif
									</a>
									@else
									<p class="text-center">-</p>
									@endif
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td class="text-center" colspan="3"></td>
						<td class="text-center" style="font-weight:600">Total R$ {{number_format($total, 2, ',', '.')}}</td>
						<td class="text-center" style="font-weight:600">Total Pag. R$ {{number_format($totalpag, 2, ',', '.')}}</td>
						<td class="text-center" style="font-weight:600">Total Pend. R$ {{number_format($totaldeb, 2, ',', '.')}}</td>
						<td class="text-center" colspan="2"></td>
					</tr>
				</tfoot>
			</table>
			<div class="row">
				<div class="col-md-6 pl-4 mt-md-2"><p>Mostrando {{$consulta->count()}} usuários de um total de {{$consulta->total()}}</p></div>
				<div class="col-md-6 pr-4">{{$consulta->links()}}</div>
			</div>

			<!-- Modal visualizar-->
      @include('Admin.movimentacao.modalVisualizar')
			
			{{-- modal fechar conta--}}
			@include('Admin.movimentacao.modalFecharConta')
			
		</div>
	</div>
	<!-- /.card -->
	@push('scripts')
		<script src='{{asset('admin/js/movimentacao/movimentacao.js')}}'></script>
	@endpush
	@endsection
	