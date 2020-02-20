<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;

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
}
