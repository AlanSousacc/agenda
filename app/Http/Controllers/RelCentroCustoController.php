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
}
