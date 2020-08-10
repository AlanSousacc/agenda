<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use App\User;
use App\Models\Empresa;
use App\Models\Movimento;
use App\Models\AuxModuloEmpresa;
use App\Models\Contato;
use App\Models\Condicao_pagamento;
use App\Models\CentroCusto;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MovimentacaoRequest;
use Carbon\Carbon;
use \PDF;

class MovimentacaoController extends Controller
{
	protected $empresa;

	public function __construct()
	{
		// verifica se a empresa tem permissão de acesso ao modulo Movimentação
		$this->middleware(function ($request, $next) {
			$this->empresa = Auth::user()->empresa_id;

			$permissao = AuxModuloEmpresa::where('empresa_id', $this->empresa)->where('modulo_id', 4)->first();
			
			if ($permissao->status != 1)
				return redirect()->route('unauthorized')->with('error', 'Acesso indisponível a esta empresa!');

    	return $next($request);
		});
	}

  public function index()
  {
    $user 		  		= Auth::user()->empresa_id;
    $movIn   				= Movimento::where('empresa_id', '=', $user)->where('tipo', '=', 'Entrada')->paginate(10);
    $movOut   			= Movimento::where('empresa_id', '=', $user)->where('tipo', '=', 'Saída')->paginate(10);
		$totalIn    		= $movIn->sum('valortotal'); //total de entrada
		$totalRecebIn   = $movIn->sum('valorrecebido'); //total de entrada recebida
		$totalPendIn    = $movIn->sum('valorpendente'); //total de entrada pendente
    $totalOut   		= $movOut->sum('valortotal'); //total de saida
    $totalPagbOut	  = $movOut->sum('valorrecebido'); //total de saida recebida
		$totalPendOut   = $movOut->sum('valorpendente'); //total de saida pendente

		$contatos   		= Contato::where('empresa_id', '=', $user)->get();
		$centro   			= CentroCusto::where('empresa_id', '=', $user)->get();
    $pagamento  		= Condicao_pagamento::all();

    return view('Admin.movimentacao.listagem', compact('movIn', 'movOut', 'contatos', 'centro', 'pagamento', 'totalIn', 'totalOut', 'totalPendOut', 'totalPagbOut', 'totalPendIn', 'totalRecebIn'));
	}

	public function show($id){
		$user 		 = Auth::user()->empresa_id;

		$consulta = Movimento::where('contato_id', $id)->paginate(10);
		$contato  = Contato::where('empresa_id', '=', $user)->where('id', $id)->first();

		$pagamento = Condicao_pagamento::all();
		$centro  	 = CentroCusto::where('empresa_id', '=', $user)->get();
		$contatos	 = Contato::where('empresa_id', '=', $user)->get();

		$total		 = $consulta->sum('valortotal');
		$totaldeb	 = $consulta->sum('valorpendente');
		$totalpag	 = $consulta->sum('valorrecebido');

    return view('Admin.contatos.listagemFinanceiroContato', compact('contato','totalpag', 'contatos', 'consulta', 'total', 'totaldeb', 'pagamento', 'centro'));
  }

	// gera tela de cadastro de movimentação de entrada
  public function createIn()
  {
    $user 		 = Auth::user()->empresa_id;
    $contatos  = Contato::where('empresa_id', '=', $user)->where('status', 1)->get();
    $centro  	 = CentroCusto::where('empresa_id', '=', $user )->where('tipo', '=', 'Receita')->where('status', 1)->get();
		$pagamento = Condicao_pagamento::all();

    return view('Admin.movimentacao.novaMovimentacao', compact('contatos', 'centro', 'pagamento'));
	}

	// gera tela de cadastro de movimentação de saída
	public function createOut()
  {
    $user 		 = Auth::user()->empresa_id;
    $contatos  = Contato::where('empresa_id', '=', $user)->where('status', 1)->get();
    $centro 	 = CentroCusto::where('empresa_id', '=', $user )->where('tipo', '=', 'Despesa')->get();
		$pagamento = Condicao_pagamento::all();

    return view('Admin.movimentacao.novaMovimentacao', compact('contatos', 'centro', 'pagamento'));
  }

  public function store(MovimentacaoRequest $request){
    $user	= Auth::user();
		$data = $request->all();
    try{

			$mov 												= new Movimento;
      $mov->user_id        				= $user->id;
      $mov->contato_id     				= $data['contato_id'];
      $mov->empresa_id     				= $user->empresa_id;
      $mov->centrocusto_id 				= $data['centrocusto_id'];
      $mov->condicao_pagamento_id = $data['condicao_pagamento_id'];
			$mov->tipo      						= $data['tipo'];
			$mov->observacao         		= $data['observacao'];
      $mov->valortotal      			= str_replace (',', '.', str_replace ('.', '', $data['valortotal']));
      $mov->valorrecebido         = str_replace (',', '.', str_replace ('.', '', $data['valorrecebido']));
			$mov->valorpendente					= $mov->valortotal - $mov->valorrecebido;
      $mov->movimented_at 				= date('Y-m-d H:i:s');

			if($mov->valorpendente == 0){
				$mov->status = 1;
			} else{
				$mov->status = 0;
			}

		} catch (Exception $e) {
			return redirect('movimentacao')->with('error', $e->getMessage());
			exit();
		}

		// aqui inicia a gravação no bd
		try{
			DB::beginTransaction();

			$saved = $mov->save();
			if (!$saved){
				throw new Exception('Falha ao salvar Movimentação!');
			}
			DB::commit();
			// se chegou aqui é pq deu tudo certo
			return redirect('movimentacao')->with('success', 'Movimentação realizada com sucesso!');

		} catch (Exception $e) {
			// se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
			DB::rollBack();
			return redirect('movimentacao')->with('error', $e->getMessage());
		}
	}

	public function update(Request $request){
		$data = $request->all();

		try{
			$mov = Movimento::find($data['movimentacao_id']);
			if (!$mov)
				throw new Exception("Nenhuma movimentação encontrada!");

			// verifica se valor não é maior que zero
			if ($data['valor'] <= 0)
				throw new Exception("Valor não pode ser negativo, ou 0 [ZERO]!");

			// verifica se valor é maior que o devido
			if ($data['valor'] > $mov->valorpendente)
				throw new Exception("Valor informado excedeu o valor restante de: R$" .number_format($mov->valorpendente, 2, ',', '.'));

			$mov->user_id									= $mov->user_id;
			$mov->contato_id							= $mov->contato_id;
			$mov->condicao_pagamento_id		= $mov->condicao_pagamento_id;
			$mov->centrocusto_id					= $mov->centrocusto_id;

			// atribui valores corretos ao valor pendente e valor recebido
			$valor 								= str_replace (',', '.', str_replace ('.', '', $data['valor']));
			$mov->valorpendente 	-= str_replace (',', '.', str_replace ('.', '', $valor)); //atualiza o valor pendete
			$mov->valorrecebido 	+= $valor; //atualiza o valor recebido

			// verufica se o valor recebido for igual ao total aplica como status "pago" e define o valor 0 no pendente
			if ($mov->valorrecebido == $mov->valortotal){
				$mov->valorpendente = 0;
				$mov->status = 1;
			} else {
				$mov->valorpendente = $mov->valortotal - $mov->valorrecebido;
				$mov->status = 0;
			}

		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
			exit();
		}

		try{
			DB::beginTransaction();

			$saved = $mov->save();
			if (!$saved){
				throw new Exception('Falha ao salvar movimentação!');
			}

			DB::commit();
			return redirect()->back()->with('success', 'Movimentação registrada com sucesso! ID:. #'.$mov->id);
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', $e->getMessage());
		}

	}

    // RELATÓRIO
	public function listagemEntradas(){
		$user 		  = Auth::user()->empresa_id;
		$consultaEntrada   = Movimento::where('empresa_id', '=', $user)
														->whereMonth('movimented_at', date('m'))
														->where('tipo', 'Entrada')
														->paginate(10);
		$totalEntrada      = $consultaEntrada->sum('valortotal');
		
		$consultaSaida   	= Movimento::where('empresa_id', '=', $user)
														->whereMonth('movimented_at', date('m'))
														->where('tipo', 'Saída')
														->paginate(10);
		$totalSaida      = $consultaSaida->sum('valortotal');

		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		$date = strftime('%B de %Y', strtotime('today'));

		return PDF::loadView('Admin.movimentacao.relatorios.RME', compact('totalEntrada', 'totalSaida', 'consultaEntrada', 'consultaSaida', 'date'))
			->setPaper('a4', 'landscape')
			->stream('relatorio-entradas.pdf');
	}

	public function relPeriodo(Request $request, Movimento $rel){
		$mov = $request->except('_token');
		if(!empty($mov['mstart']))
			$mov['mstart'] 	= Carbon::createFromFormat('d/m/Y', $mov['mstart'])->format('Y-m-d');
		if(!empty($mov['mend']))
			$mov['mend'] 		= Carbon::createFromFormat('d/m/Y', $mov['mend'])->format('Y-m-d');

		$consultaEntrada 	= $rel->personalizado($mov)->where('tipo', 'Entrada');
		$consultaSaida 		= $rel->personalizado($mov)->where('tipo', 'Saída');
		$totalTEntrada		= $consultaEntrada->sum('valortotal');
		$totalREntrada		= $consultaEntrada->sum('valorrecebido');
		$totalPEntrada		= $consultaEntrada->sum('valorpendente');
		$totalTSaida  		= $consultaSaida->sum('valortotal');
		$totalRSaida  		= $consultaSaida->sum('valorrecebido');
		$totalPSaida  		= $consultaSaida->sum('valorpendente');
		// dd($total);

		return PDF::loadView('Admin.movimentacao.relatorios.RME', compact('totalTEntrada', 'totalREntrada', 'totalPEntrada', 'totalTSaida', 'totalRSaida', 'totalPSaida', 'consultaEntrada', 'consultaSaida'))
		// Se quiser que fique no formato a4 retrato:
			->setPaper('a4', 'landscape')
			->stream('relatorio-personalizado.pdf');
			// ->download('relatorio-entradas.pdf');
	}
}	
