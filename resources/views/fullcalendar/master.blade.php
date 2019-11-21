@extends('layouts.master-admin')

@section('master')
<div id='wrap'>
  @include('fullcalendar.modal-calendar')
  <div id='external-events' style="width: 0; display:none; float: none;">
    <div id='external-events-list'>
    </div>
  </div>

  <div id='calendar' style="width: 100%"
  data-route-load-events="{{ route('routeLoadEvents') }}"
  data-route-event-update="{{ route('routeEventUpdate') }}"
  data-route-event-store="{{ route('routeEventStore') }}"
  data-route-event-delete="{{ route('routeEventDelete') }}"
  ></div>

  <div style='clear:both'></div>

</div>
@endsection
