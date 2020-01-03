<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Empresa;
use App\Models\Movimento;
use App\Models\Contato;
use App\Models\Condicao_pagamento;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MovimentacaoRequest;
use Carbon\Carbon;
use \PDF;

class MovimentacaoController extends Controller
{
  public function index()
  {
    $user 		  = Auth::user()->empresa_id;
    $consulta   = Movimento::where('empresa_id', '=', $user)->paginate(10);
    $total      = $consulta->sum('valor');

    $contato    = Contato::where('empresa_id', '=', $user)->get();
    $pagamento  = Condicao_pagamento::all();

    return view('Admin.movimentacao.listagem', compact('consulta', 'contato', 'pagamento', 'total'));
  }

  public function create()
  {
    //
  }

  public function store(MovimentacaoRequest $request)
  {
    $user			 = Auth::user();
    $data      = $request->all();

    try{
      $moviment = new Movimento;

      $moviment->user_id        				= $user->id;
      $moviment->contato_id     				= $data['contato_id'];
      $moviment->empresa_id     				= $user->empresa_id;
      $moviment->condicao_pagamento_id  = $data['condicao_pagamento_id'];

      // if(!isset($data['event_id'])){
        // 	$moviment->event_id         		= $data['event_id'];
        // }

        $moviment->tipo      							= 'Entrada';
        $moviment->observacao         		= $data['observacao'];
        $moviment->valor          				= $data['valor'];
        $moviment->movimented_at 					= date('Y-m-d H:i:s');

      } catch (Exception $e) {
        return redirect('movimentacao')->with('error', $e->getMessage());
        exit();
      }

      // aqui inicia a gravação no bd
      try{
        DB::beginTransaction();

        $saved = $moviment->save();
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

    public function show($id)
    {
      //
    }

    public function edit($id)
    {
      //
    }

    public function update(Request $request, $id)
    {
      //
    }

    public function destroy($id)
    {
      //
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

			dd($mov);

      $user 		  = Auth::user()->empresa_id;
      $consulta   = Movimento::where('empresa_id', '=', $user)->whereMonth('movimented_at', date('m'))->paginate(10);
      $total      = $consulta->sum('valor');

      // setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      // date_default_timezone_set('America/Sao_Paulo');
      // $date = strftime('%B de %Y', strtotime('today'));

      // return PDF::loadView('Admin.movimentacao.relatorios.RME', compact('total', 'consulta', 'date'))
      // // Se quiser que fique no formato a4 retrato:
      //   ->setPaper('a4', 'landscape')
      //   ->stream('relatorio-entradas.pdf');
        // ->download('relatorio-entradas.pdf');
    }
  }
