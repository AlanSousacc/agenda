<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;

use Auth;
use App\User;
use App\Models\Event;
use App\Models\Contato;
use App\Models\Empresa;
use App\Models\TipoEvento;
use App\Models\Configuracao;
use App\Models\AuxModuloEmpresa;

class AtendimentoController extends Controller
{
	protected $empresa;

	public function __construct()
	{
		// verifica se a empresa tem permissão de acesso ao modulo Movimentação
		$this->middleware(function ($request, $next) {
			$this->empresa = Auth::user()->empresa_id;

			$permissao = AuxModuloEmpresa::where('empresa_id', $this->empresa)->where('modulo_id', 6)->first();
			if ($permissao->status != 1)
				return redirect()->route('unauthorized')->with('error', 'Acesso indisponível a esta empresa!');

    	return $next($request);
		});
	}

	public function index(){
		$user 		  = Auth::user()->empresa_id;
		$eventDay   = Event::where('empresa_id', '=', $user)->whereRaw('date(start) = CURDATE()')->get();		
		$config 	  = Configuracao::where('empresa_id', $user)->first();
		$tipoevento = TipoEvento::where('empresa_id', $user)->get();
		$contato		= Contato::where('empresa_id', $user)->get();
		return view('Admin.atendimento.saladeespera', compact('eventDay', 'config', 'tipoevento', 'contato'));
	}

	public function update(Request $request){
		try{
			$user 	 = Auth::user()->empresa_id;
			$eventDay = Event::where('empresa_id', '=', $user)->whereRaw('date(start) = CURDATE()')->get();
			$updated = Event::where('id', $request->event_id)
														->where('empresa_id', $user)
														->update(['status' => $request->btnstatus]);
			if (!$updated){
				throw new Exception('Falha ao atualizar status do agendamento!');
			} else{
				return redirect('saladeespera')->with('success', 'Status alterado para ' .$request->btnstatus);
			}
		} catch (Exception $e) {
			return redirect()->route('saladeespera')->with('error', $e->getMessage());
			exit();
		}
	}
}
