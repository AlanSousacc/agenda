<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible">
	<title>Agendamento do dia</title>
	<style>
		p {
			text-align: center;
			font-size: 25px;
			font-weight: 100;
			color: #212529;
			width: 100%;
			max-width: 600px;
			margin: 5px auto;
		}
		p span {
			color: #004aad;
			font-size: 23px;
			font-weight: 500;
		}
		h1 {
			text-align: center;
			font-size: 25px;
			font-weight: 100;
			color: #212529;
			width: 100%;
			max-width: 600px;
			margin: 5px auto;
		}
		h4 {
			text-align: center;
			font-size: 25px;
			font-weight: 100;
			color: #212529;
			width: 100%;
			max-width: 600px;
			margin: 5px auto;
		}
		h4 span {
			color: #004aad;
			font-size: 36px;
			font-weight: 500;
		}
		img {
			width: 100%;
			max-width: 600px;
		}
		div {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="imagem-resp">
		<img src="http://sacolaapp.com.br/wp-content/uploads/2020/04/sessao.png" alt="cabeçalho do email">
	</div>
	<p>Olá, {{$contato}} sua sessão é hoje das <span>{{$hi}}</span> às <span>{{$hf}}</span>, aguardamos a sua presença!</p>
	<p>Atenciosamente, {{$empresa}}.</p>
	<br>
	<h4>Caso não compareça à sua sessão hoje, por favor, não deixe de nos comunicar, pelo telefone: <span>{{$telemp}}</span></h4>
</body>
</html>
