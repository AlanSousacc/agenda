@extends('layouts.master-admin')

@section('master')
<div id='wrap'>
	@include('admin.fullcalendar.modal-calendar')
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
	
	<div id="sucesso" class="modal fade text-success" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success" style="text-align: center; display: inline;">
					<button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
					<h4 class="modal-title text-center">Sucesso!!!</h4>
				</div>
				<div class="modal-body">
					<p class="text-center">Operação realizada com sucesso!</p>
				</div>
				<div class="modal-footer">
					<center>
						<button type="button" class="btn btn-success" data-dismiss="modal">OK!</button>
					</center>
				</div>
			</div>
		</div>
	</div>	
	
</div>
@endsection
