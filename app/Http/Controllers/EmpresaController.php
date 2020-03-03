<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Exception;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmpresaRequest;
use App\Models\CentroCusto;
use App\Models\Configuracao;
use App\Models\Modulo;
use Image;
use File;

class EmpresaController extends Controller
{
	public function index(){
		$consultaAtivo 		= Empresa::Where('id', '!=', 1)->where('status', 1)->paginate(10);
		$consultaInativo 	= Empresa::Where('id', '!=', 1)->where('status', 0)->paginate(10);

		return view('Admin.empresa.listagem', compact('consultaAtivo', 'consultaInativo'));
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
				if (!File::exists(public_path('/uploads/logos/' . $fileName)))
				Image::make($logo)->resize(100,100)->save(public_path('/uploads/logos/' . $fileName));
			} else {
				$fileName = 'default.png';
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
			$empresa->logo 					= $fileName;
			$empresa->status    		= $data['status'];
			$empresa->tipo    			= $data['tipo'];

		} catch (Exception $e) {
			return redirect('empresa')->with('error', $e->getMessage());
			exit();
		}

		try{
			DB::beginTransaction();

			$saved = $empresa->save();

			if (!$saved){
				throw new Exception('Falha ao salvar empresa!');
			}

			// ADICIONA CONFIGURAÇÃO DEFAULT DA EMPRESA NO SEU CADASTRO
			$config 												= new Configuracao;
			$config->empresa_id  						= $empresa->id;
			$config->atendimentosimultaneo 	= 0;
			$saved													= $config->save();

			if (!$saved){
				throw new Exception('Falha ao criar configuração padrão da empresa');
			}

			// adiciona centro de custo ao cadastrar empresa
			$ccr 							= new CentroCusto;
			$ccr->tipo  		  = 'Receita';
			$ccr->descricao   = 'Receitas Gerais';
			$ccr->status      = 1;
			$ccr->empresa_id  = $empresa->id;
			$saved		 				= $ccr->save();

			if (!$saved){
				throw new Exception('Falha ao salvar Centro de Custo #Receitas#!');
			}

			$ccd 							= new CentroCusto;
			$ccd->tipo  		  = 'Despesa';
			$ccd->descricao   = 'Despesas Gerais';
			$ccd->status      = 1;
			$ccd->empresa_id  = $empresa->id;
			$saved						= $ccd->save();

			if (!$saved){
				throw new Exception('Falha ao salvar Centro de Custo #Despesas#!');
			}

			$zmodulos 				= Modulo::all();
			// Joga para um Array todos os ids dos módulos cadastrados
			$arr = array();
			foreach($zmodulos as $mod){
				$arr[] = $mod->id;
			}
			// Insere na tabela auxiliar, a empresa 1, e todos os ids de módulos
			$empresa->modulos()->attach($arr);
			if (!$empresa){
				throw new Exception('Falha ao salvar os módulos da Empresa!');
			}

			DB::commit();
			return redirect('empresa')->with('success', 'Empresa criada com sucesso!');

		} catch (Exception $e) {
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
				if (!File::exists(public_path('/uploads/logos/' . $fileName)))
				Image::make($logo)->resize(100,100)->save(public_path('/uploads/logos/' . $fileName));

				$empresa->logo  = $fileName;
			}
			if (!$empresa)
			throw new Exception("Nenhuma empresa encontrada");

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
			$empresa->status    		= $data['status'];
			$empresa->tipo    			= $data['tipo'];

		} catch (Exception $e) {
			return redirect('empresa')->with('error', $e->getMessage());
			exit();
		}

		try{
			DB::beginTransaction();

			$saved = $empresa->save();
			if (!$saved){
				throw new Exception('Falha ao salvar empresa!');
			}
			DB::commit();
			return redirect('empresa')->with('success', 'Empresa #' . $empresa->id . ' alterada com sucesso.');
		} catch (Exception $e) {
			DB::rollBack();
			return redirect('empresa')->with('error', $e->getMessage());
		}
	}

	public function destroy(Request $request)
	{
		try{
			$empresa = Empresa::find($request->empresa_id);

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

		try{
			DB::beginTransaction();

			$saved = $empresa->delete();
			if (!$saved){
				throw new Exception('Falha ao remover empresa!');
			}
			DB::commit();
			return redirect('empresa')->with('success', 'Empresa #' . $empresa->id . ' removida com sucesso!');
		} catch (Exception $e) {
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
				if (!File::exists(public_path('/uploads/logos/' . $fileName)))
				Image::make($logo)->resize(100,100)->save(public_path('/uploads/logos/' . $fileName));

				$empresa = Empresa::Where('id', '=', Auth::user()->empresa_id)->first();
				$empresa->logo = $fileName;
				$empresa->save();
			}

			return back()->with('success','Upload realizado com sucesso!');
		}

		public function show($id){
			if(Auth::user()->profile == 'Administrador'){
				$consulta = Empresa::Where('id', '=', $id)->first();
				return view('Admin.empresa.show', compact('consulta'));
			} else {
				return back()->with('error', 'Você não tem permissão para acessar esta rota');
			}
		}
	}
