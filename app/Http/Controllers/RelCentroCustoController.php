<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;
use App\User;
use App\Models\CentroCusto;
use App\Models\Movimento;
use App\Models\AuxModuloEmpresa;
use App\Http\Requests\CentroCustoRequest;
use \PDF;


class RelCentroCustoController extends Controller
{
	public function relCentroCusto(){
    $consulta = Movimento::select('*')
                          ->where('empresa_id', Auth::user()->empresa_id)
                          ->groupBy('centrocusto_id')
													->orderBy('valortotal', 'desc')
													->get();

    return PDF::loadView('Admin.centrocusto.relatorios.geral', compact('consulta'))
      ->setPaper('a4', 'landscape')
      ->stream('relatorio-centrocusto.pdf');
		}
		
	public function AllMovimentos(){
		$empresa = Auth::user()->empresa_id;
		$consulta = Movimento::select('*')
																	->where('empresa_id', Auth::user()->empresa_id)


																	->get();
		$total = $consulta->sum('valortotal');															

		return PDF::loadView('Admin.centrocusto.relatorios.geralteste', compact('consulta', 'total'))
		->setPaper('a4', 'landscape')
		->stream('relatorio-centrocusto.pdf');
	}

	public function teste(){
		$empresa = Auth::user()->empresa_id;
		// $consulta = DB::table('movimentos')									
		$consulta = Movimento::select('movimentos.*', 'centro_custo.descricao')									
																	->leftjoin('centro_custo', 'movimentos.centrocusto_id', '=', 'centro_custo.id')
																	->leftjoin('contatos', 'movimentos.contato_id', '=', 'contatos.id')
																	->leftjoin('empresas', 'movimentos.empresa_id', '=', 'empresas.id')
																	->leftjoin('users', 'movimentos.user_id', '=', 'users.id')
																	
																	->where('empresas.id', Auth::user()->empresa_id)

																	->get();
		$total = $consulta->sum('valortotal');															

		return PDF::loadView('Admin.centrocusto.relatorios.geralteste', compact('consulta', 'total'))
		->setPaper('a4', 'landscape')
		->stream('relatorio-centrocusto.pdf');
	}
}




// SELECT 
// IF (
// 	CC.DESCRICAO IS NULL, 
//     'TOTAL GERAL',
//     IF (CONT.NOME IS NULL, CONCAT('SUBTOTAL - ', CC.DESCRICAO), CC.DESCRICAO) 
//     ) AS 'CENTRO DE CUSTO',
// 	CONT.NOME, CC.TIPO
// 	, SUM(MOV.VALORTOTAL) as TOTAL, SUM(MOV.VALORRECEBIDO) as RECEBIDO, SUM(VALORPENDENTE) as PENDENTE 
// FROM MOVIMENTOS AS MOV
// 	LEFT JOIN CONTATOS AS CONT ON MOV.CONTATO_ID = CONT.ID
// 	LEFT JOIN EMPRESAS AS EMP ON MOV.EMPRESA_ID = EMP.ID
// 	LEFT JOIN USERS AS US ON MOV.USER_ID = US.ID
// 	LEFT JOIN CENTRO_CUSTO AS CC ON MOV.CENTROCUSTO_ID = CC.ID
// WHERE MOV.EMPRESA_ID =1
// GROUP BY CC.DESCRICAO, CONT.NOME WITH ROLLUP;