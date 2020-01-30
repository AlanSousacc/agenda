<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Event;
use App\Models\AuxModuloEmpresa;
use App\Models\Contato;
use App\Models\TipoEvento;
use Auth;
use App\User;

class FullCalendarController extends Controller
{
  protected $empresa;

	public function __construct()
	{
		$this->middleware(function ($request, $next) {
			$this->empresa = Auth::user()->empresa_id;

			$permissao = AuxModuloEmpresa::where('empresa_id', $this->empresa)->where('modulo_id', 1)->first();
			if ($permissao->status != 1)
				return redirect()->route('unauthorized')->with('error', 'Acesso indisponível a esta empresa!');
				
    	return $next($request);
		});
	}

  public function index(){
    $user    = Auth::user()->empresa_id;

    $events = Event::where('empresa_id', $user)->get();

    $tipoevento = TipoEvento::where('empresa_id', $user)->where('status', 1)->get();

    // define a listagem de contato baseado no tipo da empresa
    $emp = Empresa::where('id', '=', $user)->first();
    if($emp->tipo == 'estetica'){
      $tipoContato    = 'cliente';
    } else if($emp->tipo == 'clinica'){
      $tipoContato    = 'paciente';
    }

		$contato = Contato::where('tipocontato', $tipoContato)
												->where('empresa_id', $user)
												->where('status', 1)->get();

    return view('Admin.fullcalendar.master', compact('events', 'contato', 'tipoevento'));
  }
}
