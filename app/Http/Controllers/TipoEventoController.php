<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\TipoEvento;
use App\Http\Requests\TipoEventoRequest;

class TipoEventoController extends Controller
{
  public function index()
  {
    try{
      $consulta = TipoEvento::orderBy('id')->paginate(10);
      return view('Admin.tipoevento.listagem', compact('consulta'));

    } catch (Exception $e) {
      return redirect()->back()->with('error', $e->getMessage());
      exit();
    }
  }

  // CHAMA FORMULÁRIO PARA CRIAR UM NOVO TIPO DE EVENTO
  public function create(){
    return view('Admin.tipoevento.novo');
  }

  // SALVA O NOVO TIPO DE EVENTO
  public function store(TipoEventoRequest $request)
  {
    try{
      $tipoevento = new TipoEvento;

      $tipoevento->titulo  		= $request['titulo'];
      $tipoevento->status     = $request['status'];
      $tipoevento->empresa_id = Auth::user()->empresa_id;

    } catch (Exception $e) {
      return redirect()->route('tipoevento.list')->with('error', $e->getMessage());
      exit();
    }

    try{
      DB::beginTransaction();

      $saved = $tipoevento->save();
      if (!$saved){
        throw new Exception('Falha ao salvar Tipo de Evento!');
      }
      DB::commit();
      return redirect()->route('tipoevento.list')->with('success', 'Tipo de Evento criado com sucesso!');

    } catch (Exception $e) {
      DB::rollBack();
      return redirect()->route('tipoevento.list')->with('error', $e->getMessage());
    }
  }

  public function edit($id)
  {
    $tipoevento = TipoEvento::find($id);
    return view('Admin.tipoevento.editar', compact('tipoevento'));
  }

  public function update(TipoEventoRequest $request, $id)
  {
    $tipoevento = TipoEvento::find($id);
    $tipoevento->titulo  		= $request['titulo'];
    $tipoevento->status     = $request['status'];
    $tipoevento->save();

    return redirect()->route('tipoevento.list')->with('success', 'Tipo de Evento #' . $tipoevento->id . ' atualizado com sucesso!');
  }

  // DELETA UM Tipo de Evento
  public function destroy(Request $request)
  {
    try{
      $tipoevento = TipoEvento::find($request->tipoevento_id);
      if (!$tipoevento)
      throw new Exception("Nenhum Tipo de Evento encontrado");

      if(Auth::user()->profile != 'Administrador')
      throw new Exception("Este usuário não tem permissão para remover este Tipo de Evento!");

    } catch (Exception $e) {
      return redirect()->route('tipoevento.list')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $tipoevento->delete();
      if (!$saved){
        throw new Exception('Falha ao remover Tipo de Evento!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect()->route('tipoevento.list')->with('success', 'Tipo de Evento #' . $tipoevento->id . ' removido com sucesso!');
    } catch (Exception $e) {
      DB::rollBack();

      return redirect()->route('tipoevento.list')->with('error', $e->getMessage());
    }
  }
}
