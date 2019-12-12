<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Event;
use App\Models\Contato;
use Auth;
class FullCalendarController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(){
    $events  = Event::all();
    $contato = Contato::all();

    return view('Admin.fullcalendar.master', compact('events', 'contato'));
  }
}
