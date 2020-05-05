<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible">
  <link rel="stylesheet" href="{{ url('assets/relatorios/css/default.css') }}">
  <title>Relatório Entradas e Saída de Movimentações</title>
</head>
<body>
	<h1 style="text-align:center; margin:60px 0;">
		@if (isset($date))
		Relatório de entradas no mês: {{$date}}
		@else
		Relatório de entradas personalizado		
		@endif
	</h1>
	@if ($consultaEntrada->count() == 0)
		<h3 style="text-align:center">Nenhuma movimentação registrada nesse período!</h3>
	@else
		<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-center" style="width: 200px;">Nome do Contato</th>
					<th class="text-center" style="width: 180;">Condição de Pagamento</th>
					<th class="text-center" style="width: 100px;">Valor</th>
					<th class="text-center" style="width: 100px;">Valor Recebido</th>
					<th class="text-center" style="width: 100px;">Valor Restant</th>
					<th class="text-center" style="width: 180px;">Dt Movimentação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($consultaEntrada as $item)
				<tr role="row" class="odd">
					<td class="text-center">{{$item->contato->nome}}</td>
					<td class="text-center">{{$item->condicao_pagamento->nome}}</td>
					<td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
					<td class="text-center">{{Carbon\Carbon::parse($item->movimented_at)->format('d/m/Y H:i:s')}}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td class="text-center" colspan="2"></td>
					<td class="text-center" style="font-weight:600; border: 1px solid #ccc">Total R$ {{number_format($totalTEntrada, 2, ',', '.')}}</td>
					<td class="text-center" style="font-weight:600; border: 1px solid #ccc">Total R$ {{number_format($totalREntrada, 2, ',', '.')}}</td>
					<td class="text-center" style="font-weight:600; border: 1px solid #ccc">Total R$ {{number_format($totalPEntrada, 2, ',', '.')}}</td>
					<td class="text-center" colspan="1"></td>
				</tr>
			</tfoot>
		</table>
	@endif

	{{-- LISTAGEM DE SAÍDAS --}}
	<h1 style="text-align:center; margin:60px 0;">
		@if (isset($date))
		Relatório de saídas no mês: {{$date}}
		@else
		Relatório de Saídas personalizas	
		@endif
	</h1>
	@if ($consultaSaida->count() == 0)
		<h3 style="text-align:center">Nenhuma movimentação registrada nesse período!</h3>
	@else
		<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-center" style="width: 200px;" >Nome do Contato</th>
					<th class="text-center" style="width: 180;" >Condição de Pagamento</th>
					<th class="text-center" style="width: 100px;" >Valor</th>
					<th class="text-center" style="width: 100px;" >Valor Pago</th>
					<th class="text-center" style="width: 100px;" >Valor Restante</th>
					<th class="text-center" style="width: 180px;" >Dt Movimentação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($consultaSaida as $item)
				<tr role="row" class="odd">
					<td class="text-center">{{$item->contato->nome}}</td>
					<td class="text-center">{{$item->condicao_pagamento->nome}}</td>
					<td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
					<td class="text-center">{{Carbon\Carbon::parse($item->movimented_at)->format('d/m/Y H:i:s')}}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td class="text-center" colspan="2"></td>
					<td class="text-center" style="font-weight:600; border: 1px solid #ccc">R$ {{number_format($totalTSaida, 2, ',', '.')}}</td>
					<td class="text-center" style="font-weight:600; border: 1px solid #ccc">R$ {{number_format($totalRSaida, 2, ',', '.')}}</td>
					<td class="text-center" style="font-weight:600; border: 1px solid #ccc">R$ {{number_format($totalPSaida, 2, ',', '.')}}</td>
					<td class="text-center" colspan="1"></td>
				</tr>
			</tfoot>
		</table>
	@endif
</body>
</html>
