<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Empresa;
use App\Models\Movimento;
use App\Models\Contato;
use App\Models\Condicao_pagamento;
use App\Models\CentroCusto;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MovimentacaoRequest;
use Carbon\Carbon;
use \PDF;

class MovimentacaoController extends Controller
{
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

	// gera tela de cadastro de movimentação de entrada
  public function createIn()
  {
    $user 		 = Auth::user()->empresa_id;
    $contatos  = Contato::where('empresa_id', '=', $user)->get();
    $centro  	 = CentroCusto::where('empresa_id', '=', $user )->where('tipo', '=', 'Receita')->get();
		$pagamento = Condicao_pagamento::all();

    return view('Admin.movimentacao.novaMovimentacao', compact('contatos', 'centro', 'pagamento'));
	}

	// gera tela de cadastro de movimentação de saída
	public function createOut()
  {
    $user 		 = Auth::user()->empresa_id;
    $contatos  = Contato::where('empresa_id', '=', $user)->get();
    $centro 	 = CentroCusto::where('empresa_id', '=', $user )->where('tipo', '=', 'Despesa')->get();
		$pagamento = Condicao_pagamento::all();

    return view('Admin.movimentacao.novaMovimentacao', compact('contatos', 'centro', 'pagamento'));
  }

  public function store(MovimentacaoRequest $request)
  {
    $user	= Auth::user();
		$data = $request->all();
		
		$dif  = str_replace(",",".", $data['valortotal']) - str_replace(",",".", $data['valorrecebido']);
    try{

			$mov 												= new Movimento;
      $mov->user_id        				= $user->id;
      $mov->contato_id     				= $data['contato_id'];
      $mov->empresa_id     				= $user->empresa_id;
      $mov->centrocusto_id 				= $data['centrocusto_id'];
      $mov->condicao_pagamento_id = $data['condicao_pagamento_id'];
			$mov->tipo      						= $data['tipo'];
			$mov->observacao         		= $data['observacao'];
			$mov->valortotal      			= str_replace(",",".", $data['valortotal']);
			$mov->valorrecebido      		= str_replace(",",".", $data['valorrecebido']);
			$mov->valorpendente					= $dif;
			$mov->movimented_at 				= date('Y-m-d H:i:s');
			if($dif == 0){
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
			// aqui faz todas as valições possiveis
			try{
				$mov = Movimento::find($data['movimentacao_id']);
				if (!$mov)
				throw new Exception("Nenhuma movimentação encontrada!");
	
				// dd($data['valorpendente']);
				$mov->user_id									= $mov->user_id;
				$mov->contato_id							= $mov->contato_id;
				$mov->condicao_pagamento_id		= $mov->condicao_pagamento_id;
				$mov->centrocusto_id					= $mov->centrocusto_id;
				$mov->valorpendente						= $data['valorpendente'];
				$mov->valorrecebido						= $mov->valorpendente + $mov->valorrecebido;
				if ($mov->valorrecebido == $mov->valortotal){
					$mov->valorpendente = 0;
					$mov->status = 1;
				} else {
					$mov->valorpendente = $mov->valortotal - $mov->valorrecebido;
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
					throw new Exception('Falha ao salvar movimentação!');
				}
				DB::commit();
				// se chegou aqui é pq deu tudo certo
				return redirect('movimentacao')->with('success', 'Movimentação #' . $mov->id . ' registrada com sucesso!');
			} catch (Exception $e) {
				// se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
				DB::rollBack();
				return redirect('movimentacao')->with('error', $e->getMessage());
			}
	
		}

    // RELATÓRIO
    public function listagemEntradas()
    {
      $user 		  = Auth::user()->empresa_id;
      $consulta   = Movimento::where('empresa_id', '=', $user)->whereMonth('movimented_at', date('m'))->paginate(10);
      $total      = $consulta->sum('valor');

      setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');
      $date = strftime('%B de %Y', strtotime('today'));

      return PDF::loadView('Admin.movimentacao.relatorios.RME', compact('total', 'consulta', 'date'))
      // Se quiser que fique no formato a4 retrato:
        ->setPaper('a4', 'landscape')
        ->stream('relatorio-entradas.pdf');
        // ->download('relatorio-entradas.pdf');
		}

    public function relPeriodo(Request $request, Movimento $rel)
    {
			$mov = $request->except('_token');
			if(!empty($mov['mstart']))
				$mov['mstart'] 	= Carbon::createFromFormat('d/m/Y', $mov['mstart'])->format('Y-m-d');
			if(!empty($mov['mend']))
				$mov['mend'] 		= Carbon::createFromFormat('d/m/Y', $mov['mend'])->format('Y-m-d');

			$consulta = $rel->personalizado($mov);

			// dd($consulta);

      // $user 		  = Auth::user()->empresa_id;
      // $consulta   = Movimento::where('empresa_id', '=', $user)->whereMonth('movimented_at', date('m'))->paginate(10);
      $total      = $consulta->sum('valor');

      return PDF::loadView('Admin.movimentacao.relatorios.RME', compact('total', 'consulta'))
      // Se quiser que fique no formato a4 retrato:
        ->setPaper('a4', 'landscape')
        ->stream('relatorio-personalizado.pdf');
        // ->download('relatorio-entradas.pdf');
    }
  }
