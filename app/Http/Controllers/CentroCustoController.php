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



class CentroCustoController extends Controller
{
	// LISTAGEM DE MÓDULOS
	public function index(){
		$this->empresa = Auth::user()->empresa_id;
		$centroReceita   = CentroCusto::orderBy('id')
														->where('empresa_id', $this->empresa)
														->where('tipo', 'Receita')
														->paginate(10);

		$centroDespesa   = CentroCusto::orderBy('id')
														->where('empresa_id', $this->empresa)
														->where('tipo', 'Despesa')
														->paginate(10);
		return view('Admin.centrocusto.listagem', compact('centroReceita', 'centroDespesa'));
	}
	
	// CHAMA FORMULÁRIO PARA CRIAR UM NOVO CENTRO DE CUSTO
	public function create(){
		return view('Admin.centrocusto.novo');
	}
	
	// SALVA O NOVO CENTRO DE CUSTO
	public function store(CentroCustoRequest $request)
	{
		try{
			$centrocusto = new CentroCusto;
			
			$centrocusto->tipo  		  = $request['tipo'];
			$centrocusto->descricao   = $request['descricao'];
			$centrocusto->empresa_id  = Auth::user()->empresa_id;
			
		} catch (Exception $e) {
			return redirect()->route('cc.list')->with('error', $e->getMessage());
			exit();
		}
		
		try{
			DB::beginTransaction();
			
			$saved = $centrocusto->save();
			if (!$saved){
				throw new Exception('Falha ao salvar Centro de Custo!');
			}
			DB::commit();
			return redirect()->route('cc.list')->with('success', 'Centro de Custo criado com sucesso!');
			
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('cc.list')->with('error', $e->getMessage());
		}
	}
	
	public function edit($id)
	{
		$centro = CentroCusto::find($id);
		return view('Admin.centrocusto.editar',compact('centro'));
	}
	
	public function update(CentroCustoRequest $request, $id)
	{
		$cc = CentroCusto::find($id);
		$cc->tipo       = $request->tipo;
		$cc->descricao  = $request->descricao;
		$cc->save();
		
		return redirect()->route('cc.list')->with('success', 'Centro de Custo #' . $cc->id . ' atualizado com sucesso!');
	}
	
	// DELETA UM MÓDULO
	public function destroy(Request $request)
	{
		try{
			$cc = CentroCusto::find($request->centrocusto_id);
			if (!$cc)
			throw new Exception("Nenhum Centro de Custo encontrado");
			
			if(Auth::user()->profile != 'Administrador')
			throw new Exception("Este usuário não tem permissão para remover Centros de Custo!");
			
		} catch (Exception $e) {
			return redirect()->route('cc.list')->with('error', $e->getMessage());
			exit();
		}
		
		// aqui inicia a gravação no bd
		try{
			DB::beginTransaction();
			
			$saved = $cc->delete();
			if (!$saved){
				throw new Exception('Falha ao remover Centro de Custo!');
			}
			DB::commit();
			// se chegou aqui é pq deu tudo certo
			return redirect()->route('cc.list')->with('success', 'Centro de Custo #' . $cc->id . ' removido com sucesso!');
		} catch (Exception $e) {
			DB::rollBack();
			
			return redirect()->route('cc.list')->with('error', $e->getMessage());
		}
	}
	
	public function relatorio(){
		$consulta = Movimento::selectRaw('*, sum(valortotal) as valortotal')
		->where('empresa_id', Auth::user()->empresa_id)
		->groupBy('centrocusto_id')
		->orderBy('valortotal', 'desc')
		->get();
		
		return PDF::loadView('Admin.centrocusto.relatorios.geral', compact('consulta'))
		->setPaper('a4', 'landscape')
		->stream('relatorio-centrocusto.pdf');
	}
}
