<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Event;
use App\Models\Configuracao;
use Auth;
use App\User;
use Carbon\Carbon;

class AtendimentoController extends Controller
{
	public function index(){
		$user 		 = Auth::user()->empresa_id;
		$eventDay  = Event::where('empresa_id', '=', $user)->whereRaw('date(start) = CURDATE()')->get();		
		$config 	= Configuracao::where('empresa_id', $user)->first();
		return view('Admin.atendimento.saladeespera', compact('eventDay', 'config'));
	}

	public function update(Request $request){
		try{
			// dd($request);
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
