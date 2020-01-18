<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;

use App\User;
use App\Models\Modulo;
use App\Http\Requests\ModuloRequest;



class ModuloController extends Controller
{

	// LISTAGEM DE MÓDULOS
	public function index()
  {
		
		//  $user 		  = Auth::user()->empresa_id;
    //  $consulta   = Modulo::where('empresa_id', '=', $user)->paginate(10);
    $consulta   = Modulo::orderBy('id')->paginate(10);
    // $total      = $consulta->sum('valor');

    return view('Admin.modulos.listagem', compact('consulta'));
	}

	// CHAMA FORMULÁRIO PARA CRIAR UM NOVO MÓDULO
	public function create(){
    return view('Admin.modulos.novo');
	}
	

	// SALVA O NOVO MÓDULO
	public function store(ModuloRequest $request)
  {
		
    try{
			$modulo = new Modulo;

      $modulo->nome  		  = $request['nome'];
      $modulo->descricao  = $request['descricao'];


    } catch (Exception $e) {
      return redirect()->route('modulos.list')->with('error', $e->getMessage());
      exit();
    }

    try{
      DB::beginTransaction();

      $saved = $modulo->save();
      if (!$saved){
        throw new Exception('Falha ao salvar módulo!');
      }
      DB::commit();
			return redirect()->route('modulos.list')->with('success', 'Módulo criado com sucesso!');

    } catch (Exception $e) {
      DB::rollBack();
      return redirect()->route('modulos.list')->with('error', $e->getMessage());
    }
	}
	
	// DELETA UM MÓDULO
	public function destroy(Request $request)
  {
    try{
			$modulo = Modulo::find($request->modulo_id);

      // verifica se este modulo esta vinculado a algo
      // $event = DB::table('modulos')
      // ->join('events', 'contatos.id', '=', 'events.contato_id')->whereRaw('events.contato_id = '. $request->contato_id)->get();

      if (!$modulo)
        throw new Exception("Nenhum módulo encontrado");

      if(Auth::user()->isadmin != 1)
        throw new Exception("Este usuário não tem permissão para remover contatos!");

      // if (count($event) > 0)
      //   throw new Exception("Este módulo está vinculado a um perfil!");

    } catch (Exception $e) {
      return redirect('modulos')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $modulo->delete();
      if (!$saved){
        throw new Exception('Falha ao remover módulo!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect('modulos')->with('success', 'Módulo #' . $modulo->id . ' removido com sucesso!');
    } catch (Exception $e) {
			DB::rollBack();

      return redirect('modulos')->with('error', $e->getMessage());
    }
  }


}
