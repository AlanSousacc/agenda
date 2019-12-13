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
    // $events  = Event::where('empresa_id', '=', $user)->get();
    $events = Event::where('empresa_id', '=', $user)->get();
    // dd($events);
    $contato = Contato::where('tipocontato', '=', 'paciente')->get();

    return view('Admin.fullcalendar.master', compact('events', 'contato'));
  }
}
