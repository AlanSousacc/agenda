<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function loadEvents()
  {
    $events = Event::all();

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
}
