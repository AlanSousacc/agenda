<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;
use App\User;
use App\Models\Configuracao;

class ConfiguracaoController extends Controller
{
  public function index(){
		$user 		= Auth::user()->empresa_id;
		$config 	= Configuracao::where('empresa_id', $user)->first();
		
		return view('Admin.configuracao.configuracao', compact('config'));
	}

	public function update(Request $request, $id)
	{
		$data = $request->except('_token');
		$user = Auth::user()->empresa_id;
		try{
			$configuracao = Configuracao::where('empresa_id', $id)->get();
			if(count($configuracao) == 0){
				$configuracao 												= new Configuracao;
				$configuracao->empresa_id  						= $user;
				$configuracao->atendimentosimultaneo 	= 0;
				$saved																= $configuracao->save();
			}
			
			$config = Configuracao::where('empresa_id', $id)->first();
			$config->empresa_id = $user;
			if((isset($data['atendimentosimultaneo'])) && ($data['atendimentosimultaneo']) == "on"){
				$config->atendimentosimultaneo  = 1;
			} else {
				$config->atendimentosimultaneo  = 0;
			}
			
		} catch (Exception $e) {
			return redirect()->route('configuracao')->with('error', $e->getMessage());
			exit();
		}
		
		try{
			DB::beginTransaction();
			
			$saved = $config->save();
			if (!$saved) throw new Exception('Falha ao salvar as configurações!');
			
			DB::commit();
			return redirect()->route('configuracao')->with('success', 'Configurações salvas com sucesso!');
			
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('configuracao')->with('error', $e->getMessage());
		}
	}
}