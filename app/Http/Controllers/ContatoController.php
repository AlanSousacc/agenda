<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Exception;

class ContatoController extends Controller
{
  public function index()
  {
    $user 		= Auth::user()->empresa_id;
    $consulta = Contato::where('empresa_id', '=', $user)->paginate(10);

    return view('Admin.contatos.listagem', compact('consulta'));
  }

  public function search(Request $request, Contato $cont){
		$contato  = $request->except('_token');
    $consulta = $cont->search($contato);

    return view('Admin.contatos.listagem', compact('consulta', 'contato'));
  }

  public function create(){
    return view('Admin.contatos.novo');
  }

  public function store(ContatoRequest $request)
  {
    $data      = $request->all();
    try{
      $contato = new Contato;

      $contato->nome           = $data['nome'];
      $contato->endereco       = $data['endereco'];
      $contato->telefone       = $data['telefone'];
      $contato->numero         = $data['numero'];
      $contato->cidade         = $data['cidade'];
      $contato->documento      = $data['documento'];
      $contato->status         = $data['status'];
      $contato->email          = $data['email'];
			$contato->datanascimento = $data['datanascimento'];
      // $contato->tipocontato    = $data['tipocontato'];
      $contato->empresa_id     = Auth::user()->empresa_id;

      // define o tipo do contato baseado no tipo da empresa do usuário
      $emp = Empresa::where('id', '=', $contato->empresa_id)->first();
      // dd($emp->tipo);
      if($emp->tipo == 'estetica'){
        $contato->tipocontato    = 'cliente';
      } else if($emp->tipo == 'clinica'){
        $contato->tipocontato    = 'paciente';
      }

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
			return redirect('contato')->with('success', 'Contato criado com sucesso!');

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
			// dd($data['contato_id']);
      $contato = Contato::find($data['contato_id']);
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
      $contato->empresa_id     = Auth::user()->empresa_id;

      // define o tipo do contato baseado no tipo da empresa do usuário
      $emp = Empresa::where('id', '=', $contato->empresa_id)->first();
      // dd($emp->tipo);
      if($emp->tipo == 'estetica'){
        $contato->tipocontato    = 'cliente';
      } else if($emp->tipo == 'clinica'){
        $contato->tipocontato    = 'paciente';
      }

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
      return redirect('contato')->with('success', 'Contato #' . $contato->id . ' alterado com sucesso.');
    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
      DB::rollBack();
      return redirect('contato')->with('error', $e->getMessage());
    }
  }

  public function destroy(Request $request)
  {
    try{
			$contato = Contato::find($request->contato_id);

      // verifica se este usuário esta vinculado a uma agenda
      $event = DB::table('contatos')
      ->join('events', 'contatos.id', '=', 'events.contato_id')->whereRaw('events.contato_id = '. $request->contato_id)->get();

      if (!$contato)
        throw new Exception("Nenhum contato encontrado");

      if(Auth::user()->profile != 'Administrador')
        throw new Exception("Este usuário não tem permissão para remover contatos!");

      if (count($event) > 0)
        throw new Exception("Este contato está vinculado a um agendamento!");

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
      return redirect('contato')->with('success', 'Contato #' . $contato->id . ' removido com sucesso!');
    } catch (Exception $e) {
			DB::rollBack();

      return redirect('contato')->with('error', $e->getMessage());
    }
  }

}
