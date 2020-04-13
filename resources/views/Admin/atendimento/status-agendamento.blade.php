<div class="modal fade" id="definestatus" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document" style="min-width:600px">
		<div class="modal-content">
			<div class="modal-header" style="text-align: center; display: inline;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Aplicar Status</h4>
			</div>
			<form class="defstatus" action="{{route('saladeespera.update')}}" method="POST">
				{{method_field('patch')}}
				{{csrf_field()}}
				<div class="modal-body" style="text-align: center">
					<input type="hidden" name="event_id" id="eventid" value="">
					<input type="submit" value="Aguardando" name="btnstatus" class="btnstatus btn btn-secondary my-1 mx-1 btn-sm">
					@if (($config->atendimentosimultaneo != 1) && (count($eventDay->where('status', 'Em Atendimento')) >= 1))
					<input type="submit" style="display: none" value="Em Atendimento" name="btnstatus" class="btnstatus btn btn-info my-1 mx-1 btn-sm">
					@else
						<input type="submit" value="Em Atendimento" name="btnstatus" class="btnstatus btn btn-info my-1 mx-1 btn-sm">
					@endif
					<input type="submit" value="Finalizado" name="btnstatus" class="btnstatus btn btn-success my-1 mx-1 btn-sm">	
					<input type="submit" value="Ausente" name="btnstatus" class="btnstatus btn btn-danger my-1 mx-1 btn-sm">
					<input type="submit" value="Remarcado" name="btnstatus" class="btnstatus btn btn-warning my-1 text-dark btn-sm mx-1">
					{{-- <input type="submit" value="Remarcado" name="btnstatus" class="btnstatus btn btn-warning my-1 text-dark btn-sm mx-1" data-target="#modalCalendar" data-toggle="modal" data-eventid={{$item->id}}> --}}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
