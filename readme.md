
<!-- 
		ABRIR   APP >>> PROVIDERS >>> APPSERVICEPROVIDER.PHP
		// DESCOMENTAR AS LINHAS ABAIXO PARA CORRIGIR A FUNÇÃO DE ALTERAR LOGO NA HOSTINGER
		// $this->app->bind('path.public', function(){
		// 	return base_path().'/public_html';
		// });
 -->
 DOCUMENTAÇÃO DE MUDANÇAS BD
 Mudança de campos valortotal, valorrecebido e valorpendente para double(10,2)
 Nova Coluna tipo_evento_id na tabela evento com migration(add_tipo_evento_id_to_events)

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

