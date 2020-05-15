<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRequest;
use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\FormQuestions;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;
use App\User;
use \PDF;

class FormularioController extends Controller
{
	public function index(){
		$this->empresa = Auth::user()->empresa_id;
		$formAtivo   = Formulario::orderBy('id')
														->where('empresa_id', $this->empresa)
														->where('status', 1)
														->paginate(10);

    $formInativo   = Formulario::orderBy('id')
														->where('empresa_id', $this->empresa)
														->where('status', 0)
														->paginate(10);

		return view('Admin.formularios.listagem', compact('formAtivo', 'formInativo'));
	}


	// CHAMA FORMULÁRIO PARA CRIAR UM NOVO FORMULÁRIO
	public function create(){
		return view('Admin.formularios.novo');
	}

	// SALVA O NOVO FORMULÁRIO
	public function store(FormularioRequest $request)
	{
		try{
			$formulario = new Formulario;

			$formulario->descricao   = $request['descricao'];
			$formulario->status      = $request['status'];
			$formulario->empresa_id  = Auth::user()->empresa_id;
			$formulario->user_id  = Auth::user()->id;

		} catch (Exception $e) {
			return redirect()->route('form.list')->with('error', $e->getMessage());
			exit();
		}

		try{
			DB::beginTransaction();

			$saved = $formulario->save();
			if (!$saved){
				throw new Exception('Falha ao salvar Formulário!');
			}
			DB::commit();
			return redirect()->route('form.list')->with('success', 'Formulário criado com sucesso!');

		} catch (Exception $e) {
			DB::rollBack();
			return redirect()->route('form.list')->with('error', $e->getMessage());
		}
  }

  public function edit($id)
	{
		$formulario = Formulario::find($id);

		
		$question   = FormQuestions::orderBy('id')
																 ->where('formulario_id', $id);

		dd($question);													 
		return view('Admin.formularios.editar',compact('formulario', 'question'));
	}

	public function update(FormularioRequest $request)
	{
    dd($request->id);
    $form = Formulario::find($request->id);

		$form->status     = 0;
		$form->save();

		return redirect()->route('form.list')->with('success', 'Formulário #' . $form->id . ' atualizado com sucesso!');
	}


}
