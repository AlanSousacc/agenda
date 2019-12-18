<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use Auth;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function loadEvents()
  {
    $user    = Auth::user()->empresa_id;
    $events = Event::where('empresa_id', '=', $user)->get();
    // dd($events);

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

  public function search(Request $request, Event $event){
		$evento   = $request->except('_token');
    $consulta = $event->search($contato);

    return view('Admin.fullcalendar.listagem', compact('consulta', 'evento'));
  }

  public function index(){
    $user 		= Auth::user()->empresa_id;
    // $consulta = Event::where('empresa_id', '=', $user)->paginate(10);

    $event = Event::all();
    $consulta = $event;
    // ->with('user') // bring along details of the friend
    // ->join('votes', 'votes.user_id', '=', 'friends.friend_id')
    // ->get(['votes.*']); // exclude extra details from friends table
    dd($consulta);

    return view('Admin.fullcalendar.listagem', compact('consulta'));
  }

}
