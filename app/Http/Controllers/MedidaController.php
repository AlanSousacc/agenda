<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Exception;

// --------> Models
use App\Models\Medida;
use App\Models\Contato;
use App\Models\Empresa;
use App\Models\AuxModuloEmpresa;

class MedidaController extends Controller
{
	protected $empresa;

	public function __construct()
	{
		// verifica se a empresa tem permissão de acesso ao modulo de contato
		$this->middleware(function ($request, $next) {
			$this->empresa = Auth::user()->empresa_id;

			$permissao = AuxModuloEmpresa::where('empresa_id', $this->empresa)->where('modulo_id', 7)->first();
			if ($permissao->status != 1)
				return redirect()->route('unauthorized')->with('error', 'Acesso indisponível a esta empresa!');
				
    	return $next($request);
		});
	}

    public function index()
    {
			$empresa 	= Auth::user()->empresa_id;
			$contatos = Contato::where('empresa_id', $empresa);

			dd($contatos);
			$medidas  = Medida::wherein('contato_id', $contatos);
			// dd($medidas);
			// return view('Admin.medidas.listagem', compact('consulta'));
			return view('Admin.medidas.listagem', compact ('contatos', 'medidas'));

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
