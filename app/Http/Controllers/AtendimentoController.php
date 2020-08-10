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
use App\Models\Evento_log;
use App\Models\Configuracao;
use App\Models\AuxModuloEmpresa;
use Illuminate\Support\Facades\DB;
use \DateTime;

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

	// public function sessoes(){
	// 	$user 		  = Auth::user()->empresa_id;
	// 	$eventDay   = Event::where('empresa_id', '=', $user)->whereRaw('date(start) = CURDATE()')->get();		

	// 	return view('Admin.atendimento.sessao.listagem-sessoes', compact('eventDay'));
	// }

	public function update(Request $request){
		try{
			$dt					= Carbon::now();
			$user 	 		= Auth::user()->empresa_id;
			$eventDay 	= Event::where('empresa_id', '=', $user)->whereRaw('date(start) = CURDATE()')->get();
			$eventoLog 	= Evento_log::where('event_id', $request->event_id)->where('empresa_id', $user)->first();
			$updated 		= Event::where('id', $request->event_id)->where('empresa_id', $user)->update(['status' => $request->btnstatus]);
			
			if($eventoLog == null){
				$eventoLog 											= new Evento_log;
				$eventoLog->dtchegada 					= new DateTime(now());
				$eventoLog->duracaoespera 			= 0.0;
				$eventoLog->duracaoatendimento 	= 0.0;
				$eventoLog->dtatendimento				= null;
				$eventoLog->dtfimAtendimento		= null;
				$eventoLog->event_id 						= $request->event_id;
				$eventoLog->empresa_id 					= $user;
				
			} else {
				if ($request->btnstatus == 'Em Atendimento'){
					$eventoLog = Evento_log::where('event_id', $request->event_id)->where('empresa_id', Auth::user()->empresa_id)->firstOrFail();
	
					$hrchega 	= Carbon::createMidnightDate($eventoLog->dtchegada); //captura a hr de chegada do contato
					$iniAtend = $dt; //define a hora em que o contato inicia o atendimento 
					$difTime 	= $hrchega->diffInRealMinutes($iniAtend, false); //faz a diferença da hr de chegada com a hora de inicio do atendimento
					$eventoLog->dtatendimento 			= $iniAtend;
					$eventoLog->duracaoespera 			= $difTime;

				} else if($request->btnstatus == 'Finalizado'){	
					$iniAtend = Carbon::createMidnightDate($eventoLog->dtatendimento); //captura a hr de chegada do contato
					$fimAtend = $dt; //define a hora em que o contato inicia o atendimento 
					$difTime 	= $iniAtend->diffInRealMinutes($fimAtend, false); //pega a diferença da hr de chegada c a hora inicio do atendimento
					$eventoLog->dtfimAtendimento 		= $fimAtend;
					$eventoLog->duracaoatendimento 	= $difTime;
				}
			}

			$saved = $eventoLog->save();

			if(!$saved)
				throw new Exception('Falha salvar log!');

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

	public function relatorio_tempo(){
		$dt				= Carbon::now();
		$user 	 	= Auth::user()->empresa_id;
		$eventlog = Evento_log::paginate(10);
		$contato 	= Contato::where('empresa_id', $user)->get();

		return view('Admin.atendimento.relatorio.relatorio_tempo', compact('eventlog', 'avg', 'contato'));
	}

	public function search(Request $request)
  {
		$dt				= Carbon::now();
		$user 	 	= Auth::user()->empresa_id;
		$contato 	= Contato::where('empresa_id', $user)->get();
		$evento   = $request->except('_token');

		$eventlog = Evento_log::join('events', 'evento_log.event_id', '=', 'events.id')
			->join('contatos', 'events.contato_id', '=', 'contatos.id')
			->where('contatos.id', $evento['contato_id'])
			->where('evento_log.empresa_id', $user)
			->paginate(10);

		$mediaespera = Evento_log::join('events', 'evento_log.event_id', '=', 'events.id')
			->join('contatos', 'events.contato_id', '=', 'contatos.id')
			->where('contatos.id', $evento['contato_id'])
			->where('evento_log.empresa_id', $user)
			->whereMonth('evento_log.created_at', date('m'))
			->avg('duracaoespera');

		$mediaatendim = Evento_log::join('events', 'evento_log.event_id', '=', 'events.id')
			->join('contatos', 'events.contato_id', '=', 'contatos.id')
			->where('contatos.id', $evento['contato_id'])
			->where('evento_log.empresa_id', $user)
			->whereMonth('evento_log.created_at', date('m'))
			->avg('duracaoatendimento');

		$totalagend = Evento_log::join('events', 'evento_log.event_id', '=', 'events.id')
			->join('contatos', 'events.contato_id', '=', 'contatos.id')
			->where('contatos.id', $evento['contato_id'])
			->where('evento_log.empresa_id', $user)
			->whereMonth('evento_log.created_at', date('m'))
			->count('evento_log.id');

		$cont = Evento_log::join('events', 'evento_log.event_id', '=', 'events.id')
			->join('contatos', 'events.contato_id', '=', 'contatos.id')
			->where('contatos.id', $evento['contato_id'])
			->where('evento_log.empresa_id', $user)->first();

    return view('Admin.atendimento.relatorio.relatorio_tempo', compact('eventlog', 'contato', 'cont', 'mediaatendim', 'totalagend', 'mediaespera'));
  }
}
