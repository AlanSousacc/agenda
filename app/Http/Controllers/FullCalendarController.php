<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Event;
use App\Models\Contato;
use Auth;
use App\User;

class FullCalendarController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(){
    $user    = Auth::user()->empresa_id;

    $events = Event::where('empresa_id', '=', $user)->get();

    // define a listagem de contato baseado no tipo da empresa
    $emp = Empresa::where('id', '=', $user)->first();
    if($emp->tipo == 'estetica'){
      $tipoContato    = 'cliente';
    } else if($emp->tipo == 'clinica'){
      $tipoContato    = 'paciente';
    }

		$contato = Contato::where('tipocontato', '=', $tipoContato)
												->where('empresa_id', '=', $user)->get();

    return view('Admin.fullcalendar.master', compact('events', 'contato'));
  }
}
