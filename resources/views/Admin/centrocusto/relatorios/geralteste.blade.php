<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible">
	<link rel="stylesheet" href="{{ url('assets/relatorios/css/default.css') }}">
	<title>Relatório de Movimentações por Centro de Custo</title>
</head>
<body>
	<h1 style="text-align:center; margin:60px 0;">
		Relatório de Movimentações por Centro de Custo
	</h1>
	<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th class="text-center">ID</th>
				<th class="text-center">Descrição do Centro de Custo</th>
				<th class="text-center">campoqualquer</th>
				<th class="text-center">Valor Total</th>
				<th class="text-center">Valor Recebido</th>
				<th class="text-center">Valor Pendente</th>
			</tr>
		</thead>
		<tbody>
			@php ($current_cc_id = null)

			@foreach ($consulta as $item)

			@if ($loop->index > 0 && $current_cc_id != $item->centrocusto->id)

													<tr>
														<td colspan="2"></td>
														<td>SUBTOTAL</td>
														<td>{{ $item->where('centrocusto_id', $current_cc_id)->sum('valortotal') }}</td>
														<td>{{ $item->where('centrocusto_id', $current_cc_id)->sum('valorrecebido') }}</td>
														<td>{{ $item->where('centrocusto_id', $current_cc_id)->sum('valorpendente') }}</td>
													</tr>
													<tr>
														<td colspan="5"></td>
													</tr>
			@endif

			<tr role="row" class="odd">
				@if ($current_cc_id == $item->centrocusto->id)
				<td colspan="2"></td>
				@else
				@php ($current_cc_id = $item->centrocusto->id)
				<td>{{ $item->centrocusto->descricao }}</td>
				<td>{{ $item->contato->nome }}</td>
				@endif
				<td class="text-center">{{$item->id}}</td>
				{{-- <td class="text-center">{{$item->centrocusto->descricao}}</td>
				<td class="text-center">{{$item->contato->nome}}</td> --}}
				<td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
				<td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
				<td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
			</tr>
			
			@if ($loop->last)

										<tr>
											<td colspan="2"></td>
											<td>SUBTOTAL</td>
											<td>{{ $item->where('centrocusto_id', $current_cc_id)->sum('valortotal') }}</td>
											<td>{{ $item->where('centrocusto_id', $current_cc_id)->sum('valorrecebido') }}</td>
											<td>{{ $item->where('centrocusto_id', $current_cc_id)->sum('valorpendente') }}</td>
										</tr>
										<tr>
											<td colspan="5"></td>
										</tr>

																<tr>
																	<td colspan="2"></td>
																	<td>TOTAL</td>
																	<td>{{ $item->sum('valortotal') }}</td>
																	<td>{{ $item->sum('valorrecebido') }}</td>
																	<td>{{ $item->sum('valorpendente') }}</td>
																</tr>
			@endif
			@endforeach
		</tbody>
		
	</table>
	
	<br>
</body>
</html>
