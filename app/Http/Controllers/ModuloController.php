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
	public function index()
  {
		
		//  $user 		  = Auth::user()->empresa_id;
    //  $consulta   = Modulo::where('empresa_id', '=', $user)->paginate(10);
    $consulta   = Modulo::orderBy('id')->paginate(10);
    // $total      = $consulta->sum('valor');

    return view('Admin.modulos.listagem', compact('consulta'));
	}

	public function create(){
    return view('Admin.modulos.novo');
	}
	
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
}
