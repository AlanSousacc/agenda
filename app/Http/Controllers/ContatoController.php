<?php
namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Empresa;
use App\Models\Movimento;
use App\Models\AuxModuloEmpresa;
use App\Models\CentroCusto;
use App\Models\Condicao_pagamento;
use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Exception;

class ContatoController extends Controller
{
	protected $empresa;

	public function __construct()
	{
		// verifica se a empresa tem permissão de acesso ao modulo de contato
		$this->middleware(function ($request, $next) {
			$this->empresa = Auth::user()->empresa_id;

			$permissao = AuxModuloEmpresa::where('empresa_id', $this->empresa)->where('modulo_id', 2)->first();
			if ($permissao->status != 1)
				return redirect()->route('unauthorized')->with('error', 'Acesso indisponível a esta empresa!');
				
    	return $next($request);
		});
	}
	
  public function index()
  {
    $user 		= Auth::user()->empresa_id;
    $consulta = Contato::where('empresa_id', $user)->paginate(10);

    return view('Admin.contatos.listagem', compact('consulta'));
  }

  public function search(Request $request, Contato $cont){
		$contato  = $request->except('_token');
		$consulta = $cont->search($contato);

    return view('Admin.contatos.listagem', compact('consulta', 'contato'));
  }

  public function create(){
		$user 		 = Auth::user()->empresa_id;
		$consulta  = Movimento::where('empresa_id', $user);

    return view('Admin.contatos.novo', compact('consulta'));
  }

  public function show($id){
		$contato = Contato::find($id);

		$user 		 = Auth::user()->empresa_id;
		$pagamento = Condicao_pagamento::all();
		$contatos  = Contato::where('empresa_id',$user)->get();
		$centro  = CentroCusto::where('empresa_id', $user)->get();

		$consulta  = Movimento::where('empresa_id', $user)->where('contato_id', $contato->id)->paginate(10);
		$total		 = $consulta->sum('valortotal');
		$totaldeb	 = $consulta->sum('valorpendente');

    return view('Admin.contatos.editar', compact('contato', 'consulta', 'total', 'totaldeb', 'pagamento', 'contatos', 'centro'));
  }

	// Salva os dados do contato
  public function store(ContatoRequest $request)
  {
    $data = $request->all();
    try{
      $contato 									= new Contato;
      $contato->nome            = $data['nome'];
      $contato->endereco        = $data['endereco'];
      $contato->telefone        = $data['telefone'];
      $contato->numero          = $data['numero'];
      $contato->cidade          = $data['cidade'];
      $contato->documento       = $data['documento'];
      $contato->status          = $data['status'];
			$contato->email           = $data['email'];
			$contato->datanascimento  = $data['datanascimento'];
      // $contato->valorsessao     = $data['valorsessao'];
      $contato->sexo            = $data['sexo'];
      $contato->escolaridade    = $data['escolaridade'];
      $contato->profissao       = $data['profissao'];
      $contato->nomeresponsavel = $data['nomeresponsavel'];
      $contato->cpfresponsavel  = $data['cpfresponsavel'];
      $contato->nomeparente     = $data['nomeparente'];
      $contato->telefoneparente = $data['telefoneparente'];
      $contato->observacao      = $data['observacao'];
      $contato->grupo_id        = $data['grupo_id'];
      $contato->tipocontato     = $data['tipocontato'];
			$contato->empresa_id      = Auth::user()->empresa_id;

    } catch (Exception $e) {
      return redirect('contato')->with('error', $e->getMessage());
      exit();
    }

    try{

      DB::beginTransaction();
      $saved = $contato->save();
      if (!$saved)
        throw new Exception('Falha ao salvar contatos!');

			DB::commit();
			return redirect('contato')->with('success', 'Contato criado com sucesso!');

    } catch (Exception $e) {

      DB::rollBack();
      return redirect('contato')->with('error', $e->getMessage());
    }
  }

  public function update(ContatoRequest $request)
  {
    $data = $request->all();

    try{

      $contato = Contato::find($data['contato_id']);
      if (!$contato)
        throw new Exception("Nenhum contato encontrado");

			$contato->nome            = $data['nome'];
      $contato->endereco        = $data['endereco'];
      $contato->telefone        = $data['telefone'];
      $contato->numero          = $data['numero'];
      $contato->cidade          = $data['cidade'];
      $contato->documento       = $data['documento'];
      $contato->status          = $data['status'];
			$contato->email           = $data['email'];
			$contato->datanascimento  = $data['datanascimento'];
      // $contato->valorsessao     = $data['valorsessao'];
      $contato->sexo            = $data['sexo'];
      $contato->escolaridade    = $data['escolaridade'];
      $contato->profissao       = $data['profissao'];
      $contato->nomeresponsavel = $data['nomeresponsavel'];
      $contato->cpfresponsavel  = $data['cpfresponsavel'];
      $contato->nomeparente     = $data['nomeparente'];
      $contato->telefoneparente = $data['telefoneparente'];
      $contato->observacao      = $data['observacao'];
      $contato->grupo_id        = $data['grupo_id'];
      $contato->tipocontato     = $data['tipocontato'];
			$contato->empresa_id      = Auth::user()->empresa_id;

    } catch (Exception $e) {
      return redirect('contato')->with('error', $e->getMessage());
      exit();
    }

    try{

      DB::beginTransaction();
			$saved = $contato->save();
      if (!$saved)
				throw new Exception('Falha ao salvar contato!');


      DB::commit();
      return redirect('contato')->with('success', 'Contato #' . $contato->id . ' alterado com sucesso.');
    } catch (Exception $e) {

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

      $movi = Movimento::where('contato_id', $request->contato_id)->get();

      if (count($movi) >= 1)
        throw new Exception("Não é possível remover contatos que contém movimentação registrada!");

      if (!$contato)
        throw new Exception("Nenhum contato encontrado!");

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
