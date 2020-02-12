<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible">
	<link rel="stylesheet" href="{{ url('assets/relatorios/css/default.css') }}">
	<title>MOVIMENTAÇÕES POR CENTRO DE CUSTO</title>
</head>
<body>
	<h1 style="text-align:center; margin:60px 0;">
		MOVIMENTAÇÕES POR CENTRO DE CUSTO
	</h1>
	<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th class="text-center">CENTRO DE CUSTO</th>
				<th class="text-center">NOME DO CLIENTE</th>
				<th class="text-center">VALOR TOTAL</th>
				<th class="text-center">VALOR RECEBIDO</th>
				<th class="text-center">VALOR PENDENTE</th>
			</tr>
		</thead>
		<tbody>
			@php ($current_cc_id = null)
			
			@foreach ($consulta as $item)
			
			@if ($loop->index > 0 && $current_cc_id != $item->centrocusto->id)
			
			<tr>
				<td colspan="2">SUBTOTAL</td>
				<td>R$ {{number_format($item->valortotal) }}</td>
				<td>R$ {{number_format($item->valorrecebido)}}</td>
				<td>R$ {{number_format($item->valorpendente) }}</td>
			</tr>
			<tr>
				<td colspan="5"></td>
			</tr>
			@endif
			
			<tr role="row" class="odd">
				@if ($current_cc_id == $item->centrocusto->id)
					{{-- <td colspan="1"></td> --}}
				@else
				@php ($current_cc_id = $item->centrocusto->id)

				@endif
				<td class="text-center">{{$item->centrocusto->descricao}}</td>
				<td class="text-center">{{$item->contato->nome}}</td>
					<td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
					<td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
			</tr>
			
			@if ($loop->last)
			
			<tr>
				<td colspan="2">SUBTOTAL</td>
				<td>R$ {{number_format($item->valortotal) }}</td>
				<td>R$ {{number_format($item->valorrecebido) }}</td>
				<td>R$ {{number_format($item->valorpendente) }}</td>
			</tr>
			<tr>
				<td colspan="5"></td>
			</tr>
			
			<tr>
				<td colspan="2">TOTAL</td>
				{{-- <td>R$ {{number_format($item->sum('valortotal'), 2, ',', '.') }}</td>
				<td>R$ {{number_format($item->sum('valorrecebido'), 2, ',', '.') }}</td>
				<td>R$ {{number_format($item->sum('valorpendente'), 2, ',', '.') }}</td> --}}
				<td>R$ {{number_format($total, 2, ',', '.') }}</td>
				<td>R$ {{number_format($recebido, 2, ',', '.') }}</td>
				<td>R$ {{number_format($pendente, 2, ',', '.') }}</td>
			</tr>
			@endif
			@endforeach
		</tbody>
		
	</table>
	
	<br>
</body>
</html>
