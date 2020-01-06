<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible">
  <link rel="stylesheet" href="{{ url('assets/relatorios/css/default.css') }}">
  <title>Relatório de Entradas de Movimentações</title>
</head>
<body>
	<h1 style="text-align:center; margin:60px 0;">
		@if (isset($date))
		Relatório de entradas no mês: {{$date}}
		@else
		Relatório de entradas personalizado		
		@endif
	</h1>
	@if ($consulta->count() == 0)
		<h3 style="text-align:center">Nenhuma movimentação registrada nesse período!</h3>
	@else
		<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-center" style="width: 350px;" >Nome do Contato</th>
					<th class="text-center" style="width: 200px;" >Condição de Pagamento</th>
					<th class="text-center" style="width: 150px;" >Valor</th>
					<th class="text-center" style="width: 200px;" >Dt Movimentação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($consulta as $item)
				<tr role="row" class="odd">
					<td class="text-center">{{$item->contato->nome}}</td>
					<td class="text-center">{{$item->condicao_pagamento->nome}}</td>
					<td class="text-center">R$ {{number_format($item->valor, 2, ',', '.')}}</td>
					<td class="text-center">{{Carbon\Carbon::parse($item->movimented_at)->format('d/m/Y H:i:s')}}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td class="text-center" colspan="2"></td>
					<td class="text-center" style="font-weight:600; border: 1px solid #ccc">Total R$ {{number_format($total, 2, ',', '.')}}</td>
					<td class="text-center" colspan="1"></td>
				</tr>
			</tfoot>
		</table>
	@endif
</body>
</html>
