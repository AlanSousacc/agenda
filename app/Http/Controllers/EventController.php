<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use Auth;
use App\User;
use App\Models\Empresa;
use App\Models\AuxModuloEmpresa;
use App\Models\Contato;
use App\Models\TipoEvento;
use App\Models\Movimento;
use App\Http\Requests\MovimentacaoRequest;
use App\Models\Condicao_pagamento;
use App\Models\CentroCusto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
	protected $empresa;

	public function __construct()
	{
		// verifica se a empresa tem permissão de acesso ao modulo de agenda
		$this->middleware(function ($request, $next) {
			$this->empresa = Auth::user()->empresa_id;

			$permissao = AuxModuloEmpresa::where('empresa_id', $this->empresa)->where('modulo_id', 1)->first();
			if ($permissao->status != 1)
				return redirect()->route('unauthorized')->with('error', 'Acesso indisponível a esta empresa!');
				
    	return $next($request);
		});
	}

  public function index()
  {
    $user 		= Auth::user()->empresa_id;
    $consulta = Event::where('empresa_id', '=', $user)->paginate(10);

    $emp = Empresa::where('id', '=', $user)->first();
    if($emp->tipo == 'estetica'){
      $tipoContato = 'cliente';
    } else if($emp->tipo == 'clinica'){
      $tipoContato = 'paciente';
    }

    $tipoevento = TipoEvento::where('empresa_id', $user)->where('status', 1)->get();

    $contato = Contato::where('tipocontato', $tipoContato)
												->where('empresa_id', $user)->get();

    return view('Admin.fullcalendar.listagem', compact('consulta', 'contato', 'tipoevento'));
  }

  public function search(Request $request, Event $event)
  {
    $user 		= Auth::user()->empresa_id;
    $evento   = $request->except('_token');
    $consulta = $event->search($evento);

    $emp = Empresa::where('id', '=', $user)->first();
    if($emp->tipo == 'estetica'){
      $tipoContato = 'cliente';
    } else if($emp->tipo == 'clinica'){
      $tipoContato = 'paciente';
    }

    $tipoevento = TipoEvento::where('empresa_id', $user)->where('status', 1)->get();
    $contato = Contato::where('tipocontato', '=', $tipoContato)
                        ->where('empresa_id', '=', $user)->get();

    return view('Admin.fullcalendar.listagem', compact('consulta', 'evento', 'contato', 'tipoevento'));
  }

  public function loadEvents(){
    $user    = Auth::user()->empresa_id;
    $events  = Event::where('empresa_id', '=', $user)->get();

    return response()->json($events);
  }

  public function store(EventRequest $request)
  {
		$user							 = Auth::user();
		Event::create([
			'title' 				 => $request->title, 
			'start' 				 => $request->start,
			'end' 					 => $request->end,
			'description' 	 => $request->description,
			'tipo_evento_id' => $request->tipo_evento_id,
			'contato_id' 		 => $request->contato_id,
			'color' 				 => $request->color,
			'empresa_id' 		 => $request->empresa_id,
			'geracobranca' 	 => $request->geracobranca,
			'valorevento' 	 => str_replace (',', '.', str_replace ('.', '', $request->valorevento))
		]);

		// vai realizar movimentação exclusivamente se houver cobrança
		if($request->geracobranca == 1){
			$lastId 					 					= DB::getPdo()->lastInsertId(); //Pega o ultimo id de agendamento para inserir na movi.
			$mov 												= new Movimento;
			$mov->event_id	     				= $lastId;
			$mov->tipo      						= 'Entrada';
			$mov->contato_id     				= $request->contato_id;
			$mov->condicao_pagamento_id = 6;
			$mov->centrocusto_id 				= 1;
      $mov->user_id        				= $user->id;
			$mov->empresa_id     				= $user->empresa_id;
			$mov->observacao         		= 'Movimentação realizada pelo agendamento:. #' .$lastId;
      $mov->valortotal      			= str_replace (',', '.', str_replace ('.', '', $request->valorevento));
      $mov->valorrecebido         = str_replace (',', '.', str_replace ('.', '', 0));
			$mov->valorpendente					= $mov->valortotal - $mov->valorrecebido;
			$mov->movimented_at 				= date('Y-m-d H:i:s');
			$mov->status 								= 0;
			$saved 											= $mov->save();
		}
		return response()->json(true);

  }

  public function update(EventRequest $request)
  {
		$user	 = Auth::user();
		$event = Event::where('id', $request->id)
									->where('empresa_id', $user->empresa_id)
									->first(); //evento selecionado

		$event->fill([ // preenchimento dos campos do agendamento
			'title' 				 => $request->title, 
			'start' 				 => $request->start,
			'end' 					 => $request->end,
			'description' 	 => $request->description,
			'tipo_evento_id' => $request->tipo_evento_id,
			'contato_id' 		 => $request->contato_id,
			'color' 				 => $request->color,
			'empresa_id' 		 => $request->empresa_id,
			'geracobranca' 	 => $request->geracobranca,
			'valorevento' 	 => str_replace (',', '.', str_replace ('.', '', $request->valorevento))
		]);
		// verifica se a movimentação a ser alterada tem cobrança
		if($request->geracobranca == 1){

			$mov = Movimento::where('event_id', $event->id)
											->where('empresa_id', $user->empresa_id)
											->first(); //se houver cobrança consulta qual o id do agendamento
			if($mov){ //se houver movimentação nesse agendamento somente atualiza os valores, caso haja alteração
				$valortotal     = str_replace (',', '.', str_replace ('.', '', $request->valorevento));
				$valorrecebido  = str_replace (',', '.', str_replace ('.', '', $mov->valorrecebido));
				$valorpendente	= $valortotal - $valorrecebido;

				// atualiza os campos.
				$updated = Movimento::where('event_id', $event->id)
														->where('empresa_id', $user->empresa_id)
														->update(['valortotal' => $valortotal], ['valorrecebido' => $valorrecebido], ['valorpendente' => $valorpendente]);

			} else {
				// se houver cobrança habilitada mas não existir movimentação, realiza cadastro da movimentação
				$mov = new Movimento;
				$mov->event_id	     				= $event->id;
				$mov->tipo      						= 'Entrada';
				$mov->contato_id     				= $request->contato_id;
				$mov->condicao_pagamento_id = 6;
				$mov->centrocusto_id 				= 1;
				$mov->user_id        				= $user->id;
				$mov->empresa_id     				= $user->empresa_id;
				$mov->observacao         		= 'Movimentação realizada pelo agendamento:. #' .$event->id;
				$mov->valortotal      			= str_replace (',', '.', str_replace ('.', '', $request->valorevento));
				$mov->valorrecebido         = str_replace (',', '.', str_replace ('.', '', 0	));
				$mov->valorpendente					= $mov->valortotal - $mov->valorrecebido;
				$mov->movimented_at 				= date('Y-m-d H:i:s');
				$saved 											= $mov->save();
			}
		} else {
			// se não houver cobrança na alteração ele verifica se há movimentação com o id do agendamento, caso haja exclui a movimentação.

			$mov = Movimento::where('event_id', $event->id)
											->where('empresa_id', $user->empresa_id)
											->delete();
		}

		$event->save(); //Salva a edição da movimentação
		// dd($event);
		return response()->json(true);
	}

  public function destroy(EventRequest $request)
  {
		$user = Auth::user();
		if($request->geracobranca){
			$mov = Movimento::where('event_id', $request->id)
											->where('empresa_id', $user->empresa_id)
											->delete();
		}

    Event::where('id', $request->id)->delete();
    return response()->json(true);
  }

}
