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
      $tipoContato    = 'cliente';
    } else if($emp->tipo == 'clinica'){
      $tipoContato    = 'paciente';
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
    Event::create($request->all());

    return response()->json(true);
  }

  public function update(EventRequest $request)
  {
    $event = Event::where('id', $request->id)->first();
    $event->fill($request->all());
    $event->save();
    return response()->json(true);
  }

  public function destroy(EventRequest $request)
  {
    Event::where('id', $request->id)->delete();
    return response()->json(true);
  }

  public function delete(Request $request)
  {
    try{
			$event = Event::find($request->agenda_id);

      if (!$event)
        throw new Exception("Nenhum agendamento encontrado");

    } catch (Exception $e) {
      return redirect('list-event')->with('error', $e->getMessage());
      exit();
    }

    try{
      DB::beginTransaction();
      $saved = $event->delete();

      if (!$saved){
        throw new Exception('Falha ao remover agendamento!');
      }

      DB::commit();
      return redirect('list-event')->with('success', 'Agendamento #' . $event->id . ' removido com sucesso!');
    } catch (Exception $e) {
			DB::rollBack();

      return redirect('list-event')->with('error', $e->getMessage());
    }
  }

}
