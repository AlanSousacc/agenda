<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Route;

class ContatoController extends Controller
{
  public function index()
  {
    $consulta = Contato::paginate(10);

    return view('Admin.contatos.listagem', compact('consulta'));
  }

  public function search(Request $request, Contato $cont){
		$contato = $request->except('_token');

    $consulta = $cont->search($contato);

    // dd($contato);

    return view('Admin.contatos.listagem', compact('consulta', 'contato'));
  }

  public function create(){
    return view('Admin.contatos.novo');
  }

  public function store(ContatoRequest $request)
  {
    $data = $request->all();
    try{
      $contato = new Contato;

      // dd($data->nome);

      $contato->nome           = $data['nome'];
      $contato->endereco       = $data['endereco'];
      $contato->telefone       = $data['telefone'];
      $contato->numero         = $data['numero'];
      $contato->cidade         = $data['cidade'];
      $contato->documento      = $data['documento'];
      $contato->status         = $data['status'];
      $contato->email          = $data['email'];
      $contato->datanascimento = $data['datanascimento'];
      $contato->tipocontato    = $data['tipocontato'];

    } catch (Exception $e) {
      return redirect('contato')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $contato->save();
      if (!$saved){
        throw new Exception('Falha ao salvar contatos!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect('list-contato')->with('success', 'Contato criado com sucesso!');
    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
      DB::rollBack();
      return redirect('cliente')->with('error', $e->getMessage());
    }
  }

  public function update(ContatoRequest $request)
  {
    $data = $request->all();
    // aqui faz todas as valições possiveis
    try{
      $contato = Contato::find($data->id);
      if (!$contato)
        throw new Exception("Nenhum contato encontrado");

      // aqui então faz todo o tratamento e seta o que foi alterado;
      $contato->nome           = $data['nome'];
      $contato->endereco       = $data['endereco'];
      $contato->telefone       = $data['telefone'];
      $contato->numero         = $data['numero'];
      $contato->cidade         = $data['cidade'];
      $contato->documento      = $data['documento'];
      $contato->status         = $data['status'];
      $contato->email          = $data['email'];
      $contato->datanascimento = $data['datanascimento'];
      $contato->tipocontato    = $data['tipocontato'];

    } catch (Exception $e) {
      return redirect('contato')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $contato->save();
      if (!$saved){
          throw new Exception('Falha ao salvar contato!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect('list-contato')->with('success', 'Contato #' . $contato->id . ' alterado com sucesso.');
    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
      DB::rollBack();
      return redirect('contato')->with('error', $e->getMessage());
    }
  }

  public function destroy(ContatoRequest $request)
  {
    try{
      $contato = Contato::findOrFail($request->id);

      // verifica se este usuário esta vinculado a uma agenda
      $event = DB::table('contato')
      ->join('events', 'contato.id', '=', 'events.contato_id')->whereRaw('events.contato_id = '. $request->contato_id)->get();

      if (!$contato)
        throw new Exception("Nenhum paciênte encontrado");

      if(Auth::user()->perfile != 'Administrador')
        throw new Exception("Este usuário não tem permissão para remover contatos!");

      if (count($event) > 0)
        throw new Exception("Este paciênte está vinculado a um agendamento!");

    } catch (Exception $e) {
      return redirect('contato')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $contato->delete();
      if (!$saved){
        throw new Exception('Falha ao remover contato!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect('list-contato')->with('success', 'Contato #' . $contato->id . ' removido com sucesso!');
    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
      DB::rollBack();
      return redirect('contato')->with('error', $e->getMessage());
    }
  }

}
