<?php
namespace App\Http\Controllers;

use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\LicencaRequest;

use App\Models\Licenca;

class LicencaController extends Controller
{
	public function store(Request $request){
		$data 		= $request->except('_token');
		$dt			  = Carbon::now();
		$licencas = Licenca::where('empresa_id', $data['empresa_id'])->first();

		/**
		 * verifica se existe licença para a empresa.
		 * se não existir ele cria uma licença.
		 * se existir ele faz o update
		 */
		if ($licencas == null) {
			try {
				if($data['valstart'] > $dt->toDateString())
					throw new Exception('A data inicial da licença deve ser maior ou igual a data de hoje');
	
				/**
				 * se o status for == 0(inativo) ele define as propriedades da licença existente como vazias
				 * se o status for == 1(ativo) ele aplica as propriedades vindas do formulario
				 */
				if($data['status'] == 0){
					$licenca = new Licenca;
					$licenca->dtvalidade = null;
					$licenca->dtinicio 	 = null;
					$licenca->status     =  0;
					$licenca->hash     	 = $data['hash'];
					$licenca->empresa_id = $data['empresa_id'];
				} else {
					$licenca = new Licenca;
					$licenca->dtvalidade = $data['valend'];
					$licenca->dtinicio 	 = $data['valstart'];
					$licenca->status     = $data['status'];
					$licenca->hash     	 = $data['hash'];
					$licenca->empresa_id = $data['empresa_id'];
				}
	
			} catch (Exception $e) {
				return redirect()->route('empresa.index')->with('error', $e->getMessage());
				exit();
			}

		} else {
			// faz o update caso ja exista licença
			try {
				$licenca = Licenca::where('empresa_id', $data['empresa_id'])->firstOrFail();
				if ($data['valstart'] > $dt->toDateString())
					throw new Exception('A data inicial da licença deve ser maior ou igual a data de hoje');
	
				if($data['status'] == 0){
					$licenca->dtvalidade = null;
					$licenca->dtinicio 	 = null;
					$licenca->status     =  0;
					$licenca->hash     	 = $data['hash'];
					$licenca->empresa_id = $data['empresa_id'];
				} else {
					$licenca->dtvalidade = $data['valend'];
					$licenca->dtinicio 	 = $data['valstart'];
					$licenca->status     = $data['status'];
					$licenca->hash     	 = $data['hash'];
					$licenca->empresa_id = $data['empresa_id'];
				}
			
			} catch (Exception $e) {
				return redirect()->route('empresa.index')->with('error', $e->getMessage());
				exit();
			}
		}

		try{
			DB::beginTransaction();
			
			$saved = $licenca->save();
			if (!$saved){
				throw new Exception('Falha ao salvar esta licença com esta empresa');
			}
			
			DB::commit();
			return redirect()->route('empresa.index')->with('success', 'Licença salva com sucesso!');
			
		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('empresa.index')->with('error', $e->getMessage());
		}
	}

}
