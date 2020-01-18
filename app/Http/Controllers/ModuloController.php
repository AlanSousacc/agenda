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
		try{
			if(Auth::user()->isAdmin == 0){
				throw new Exception("Este usuário não tem permissão para acessar esta página!");
			}

    $consulta   = Modulo::orderBy('id')->paginate(10);
			return view('Admin.modulos.listagem', compact('consulta'));

		} catch (Exception $e) {
			 return redirect()->back()->with('error', $e->getMessage());
			exit();
    }
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

	
	public function edit($id)
	{
			$consulta = Modulo::find($id);
			return view('Admin.modulos.editar',compact('consulta'));
	}

	public function update(ModuloRequest $request, $id)
	{
			$mod = Modulo::find($id);
			$mod->nome       = $request->nome;
			$mod->descricao  = $request->descricao;      
			$mod->save();
			return redirect()->route('modulos.list')->with('success', 'Módulo #' . $mod->id . ' atualizado com sucesso!');
	}
	
	// DELETA UM MÓDULO
	public function destroy(Request $request)
  {
    try{
			$modulo = Modulo::find($request->modulo_id);

      if (!$modulo)
        throw new Exception("Nenhum módulo encontrado");

      if(Auth::user()->isAdmin == 0)
        throw new Exception("Este usuário não tem permissão para remover Módulos!");

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
