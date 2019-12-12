<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Exception;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmpresaRequest;
use Image;

class EmpresaController extends Controller
{
  public function index()
  {
    $consulta = Empresa::Where('id', '!=', 1)->paginate(10);

    return view('Admin.empresa.listagem', compact('consulta'));
	}

	public function search(Request $request, Empresa $empr){
		$empresas = $request->except('_token');

    $consulta = $empr->search($empresas);

    return view('Admin.empresa.listagem', compact('consulta', 'empresas'));
	}

  public function create()
  {
    return view('Admin.empresa.novo');
  }

  public function store(EmpresaRequest $request)
  {
    $data = $request->all();
    try{
      if($request->hasFile('logo')){
        $logo     = $request->file('logo');
        $fileName = $logo->getClientOriginalName();
        Image::make($logo)->resize(100,100)->save(public_path('/uploads/logos/' . $fileName));

        $empresa = Empresa::Where('id', '=', Auth::user()->empresa_id)->first();
        $empresa->logo = $fileName;
      }

			$empresa = new Empresa;

      $empresa->razaosocial   = $data['razaosocial'];
      $empresa->nomefantasia  = $data['nomefantasia'];
      $empresa->apelido       = $data['apelido'];
      $empresa->cnpj         	= $data['cnpj'];
      $empresa->ie         		= $data['ie'];
      $empresa->im      			= $data['im'];
      $empresa->telefone      = $data['telefone'];
      $empresa->email         = $data['email'];
			$empresa->cidade 				= $data['cidade'];
      $empresa->endereco    	= $data['endereco'];
      $empresa->numero    		= $data['numero'];
      $empresa->cep    				= $data['cep'];
      $empresa->bairro    		= $data['bairro'];
			$empresa->status    		= $data['status'];

    } catch (Exception $e) {
      return redirect('empresa')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $empresa->save();
      if (!$saved){
        throw new Exception('Falha ao salvar empresa!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
			return redirect('empresa')->with('success', 'Empresa criada com sucesso!');

    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
      DB::rollBack();
      return redirect('empresa')->with('error', $e->getMessage());
    }
  }

  public function update(EmpresaRequest $request)
  {
    $data = $request->all();
    try{
      $empresa = Empresa::find($data['empresa_id']);

      if($request->hasFile('logo')){
        $logo     = $request->file('logo');
        $fileName = $logo->getClientOriginalName();
        Image::make($logo)->resize(100,100)->save(public_path('/uploads/logos/' . $fileName));

        $empresa->logo  = $fileName;
      }
      if (!$empresa)
        throw new Exception("Nenhuma empresa encontrada");

      // aqui então faz todo o tratamento e seta o que foi alterado;
			$empresa->razaosocial   = $data['razaosocial'];
      $empresa->nomefantasia  = $data['nomefantasia'];
      $empresa->apelido       = $data['apelido'];
      $empresa->ie         		= $data['ie'];
      $empresa->im      			= $data['im'];
      $empresa->telefone      = $data['telefone'];
      $empresa->email         = $data['email'];
			$empresa->cidade 				= $data['cidade'];
      $empresa->endereco    	= $data['endereco'];
      $empresa->numero    		= $data['numero'];
      $empresa->cep    				= $data['cep'];
      $empresa->bairro    		= $data['bairro'];
			$empresa->logo    			= $data['logo'];
			$empresa->status    		= $data['status'];

    } catch (Exception $e) {
      return redirect('empresa')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $empresa->save();
      if (!$saved){
          throw new Exception('Falha ao salvar empresa!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect('empresa')->with('success', 'Empresa #' . $empresa->id . ' alterada com sucesso.');
    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
      DB::rollBack();
      return redirect('empresa')->with('error', $e->getMessage());
    }
  }

  public function destroy(Request $request)
  {
    try{
			$empresa = Empresa::find($request->empresa_id);

      // verifica se esta empresa esta vinculado a um usuario
      $event = DB::table('empresas')
			->join('users', 'empresas.id', '=', 'users.empresa_id')->whereRaw('users.empresa_id = '. $request->empresa_id)->get();

			if ($request->empresa_id == 1);
				throw new Exception("Esta empresa não pode ser removida, empresa padrão do sistema");

      if (!$empresa)
        throw new Exception("Nenhuma empresa encontrada");

      if (count($event) > 0)
				throw new Exception("Esta empresa está vinculada a um usuario!");

			if (Auth::user()->isAdmin != 1)
        throw new Exception("Este usuário não é Administrador do sistema, contate-o para obter informações");



    } catch (Exception $e) {
      return redirect('empresa')->with('error', $e->getMessage());
      exit();
    }

    // aqui inicia a gravação no bd
    try{
      DB::beginTransaction();

      $saved = $empresa->delete();
      if (!$saved){
        throw new Exception('Falha ao remover empresa!');
      }
      DB::commit();
      // se chegou aqui é pq deu tudo certo
      return redirect('empresa')->with('success', 'Empresa #' . $empresa->id . ' removida com sucesso!');
    } catch (Exception $e) {
      // se deu pau ao salvar no banco de dados, faz rollback de tudo e retorna erro
			DB::rollBack();

      return redirect('empresa')->with('error', $e->getMessage());
    }
  }

  public function logoUploadPost(Request $request)
  {
		$request->validate([
      'logo'          => 'mimes:jpg,png,jpeg|max:2048',
      'logo.mimes'    => 'Formatos suportados: jpg, png, jpeg',
			'logo.max'      => 'Tamanho máximo permitido do arquivo: 2048Mb',
		]);

		if($request->hasFile('logo')){
			$logo = $request->file('logo');
			$fileName = $logo->getClientOriginalName();
			Image::make($logo)->resize(100,100)->save(public_path('/uploads/logos/' . $fileName));

			$empresa = Empresa::Where('id', '=', Auth::user()->empresa_id)->first();
			$empresa->logo = $fileName;
			$empresa->save();
		}

		return back()->with('success','Upload realizado com sucesso!');
	}

	public function show($id){
		$consulta = Empresa::Where('id', '=', $id)->first();
		// dd($consulta->razaosocial);
    return view('Admin.empresa.show', compact('consulta'));
	}
}
