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
				<th class="text-center">TIPO</th>
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
				<td colspan="3">============= SUBTOTAL ============</td>
				<td>R$ {{ number_format($item->where('centrocusto_id', $current_cc_id)->sum('valortotal'), 2, ',', '.') }}</td>
				<td>R$ {{ number_format($item->where('centrocusto_id', $current_cc_id)->sum('valorrecebido'), 2, ',', '.') }}</td>
				<td>R$ {{ number_format($item->where('centrocusto_id', $current_cc_id)->sum('valorpendente'), 2, ',', '.') }}</td>
			</tr>
			
			<tr>
				<td colspan="6"></td>
			</tr>
			@endif
			
			<tr role="row" class="odd">
				@if ($current_cc_id == $item->centrocusto->id)
				{{-- <td colspan="1"></td> --}}
				@else
				@php ($current_cc_id = $item->centrocusto->id)
				
				@endif
				<td class="text-center">{{$item->tipo}}</td>
				<td class="text-center">{{$item->centrocusto->descricao}}</td>
				<td class="text-center">{{$item->contato->nome}}</td>
				<td class="text-center">R$ {{number_format($item->valortotal, 2, ',', '.')}}</td>
				<td class="text-center">R$ {{number_format($item->valorrecebido, 2, ',', '.')}}</td>
				<td class="text-center">R$ {{number_format($item->valorpendente, 2, ',', '.')}}</td>
			</tr>
			
			@if ($loop->last)
			<tr>
				<td colspan="3">============= SUBTOTAL ============</td>
				<td>R$ {{ number_format($item->where('centrocusto_id', $current_cc_id)->sum('valortotal'), 2, ',', '.') }}</td>
				<td>R$ {{ number_format($item->where('centrocusto_id', $current_cc_id)->sum('valorrecebido'), 2, ',', '.') }}</td>
				<td>R$ {{ number_format($item->where('centrocusto_id', $current_cc_id)->sum('valorpendente'), 2, ',', '.') }}</td>
			</tr>			
			<tr>
				<td colspan="6"></td>
			</tr>
			
			<tr>
				<td colspan="3">RECEITAS TOTAIS</td>
				<td>R$ {{number_format($totalIn, 2, ',', '.') }}</td>
				<td>R$ {{number_format($totalRecebIn, 2, ',', '.') }}</td>
				<td>R$ {{number_format($totalPendIn, 2, ',', '.') }}</td>
			</tr>
			<tr>
				<td colspan="3">DESPESAS TOTAIS</td>
				<td>R$ {{number_format($totalOut, 2, ',', '.') }}</td>
				<td>R$ {{number_format($totalPagbOut, 2, ',', '.') }}</td>
				<td>R$ {{number_format($totalPendOut, 2, ',', '.') }}</td>
			</tr>
			<tr>
				<td colspan="3">TOTAL GERAL</td>
				<td>R$ {{number_format(($totalIn - $totalOut), 2, ',', '.') }}</td>
				<td>R$ {{number_format(($totalRecebIn - $totalPagbOut), 2, ',', '.') }}</td>
				<td>R$ {{number_format(($totalPendIn - $totalPendOut), 2, ',', '.') }}</td>
			</tr>
			@endif
			@endforeach
		</tbody>
		
	</table>
	
	<br>		
	<br>
</body>
</html>

{{-- 
	http://jquerydicas.blogspot.com/2015/01/mysql-sum-com-rollup-calcular-o.html
	
	SELECT 
	IF (
	CC.DESCRICAO IS NULL, 
	'TOTAL GERAL',
	IF (CONT.NOME IS NULL, CONCAT('SUBTOTAL - ', CC.DESCRICAO), CC.DESCRICAO) 
	) AS 'CENTRO DE CUSTO',
	CONT.NOME, CC.TIPO
	, SUM(MOV.VALORTOTAL) as TOTAL, SUM(MOV.VALORRECEBIDO) as RECEBIDO, SUM(VALORPENDENTE) as PENDENTE 
	FROM MOVIMENTOS AS MOV
	LEFT JOIN CONTATOS AS CONT ON MOV.CONTATO_ID = CONT.ID
	LEFT JOIN EMPRESAS AS EMP ON MOV.EMPRESA_ID = EMP.ID
	LEFT JOIN USERS AS US ON MOV.USER_ID = US.ID
	LEFT JOIN CENTRO_CUSTO AS CC ON MOV.CENTROCUSTO_ID = CC.ID
	WHERE MOV.EMPRESA_ID =1
	GROUP BY CC.DESCRICAO, CONT.NOME WITH ROLLUP; 
	--}}
	