@extends('layouts.master-admin')
@section('css')
@endsection
@section('master')
<div class="col-md-4 offset-md-8 fixed-top mt-3" style="z-index: 9999;">
	@include('layouts.master-message')
</div>

<div class="card col-12 mt-2">
	<div class="card-header" style="font-size: 26px">Sala de Espera</div>
	<div class="card-body">
		
		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Agendados Hoje</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay as $item)
					@if ($item->status == 'Agendado')
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary my-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:i:s')}} - {{Carbon\Carbon::parse($item->end)->format('H:i:s')}}</button>	
							<button type="button" class="btn btn-outline-primary my-1 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{ url('notificar-contato', [$item->contato->id, $item->id]) }}"> <i class="fa fa-envelope"></i> Notificar por Email</a>
							</div>
						</div>
					@else
						<button type="button" disabled class="btn btn-outline-primary my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:i:s')}} - {{Carbon\Carbon::parse($item->end)->format('H:i:s')}}</button>
					@endif
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Aguardando Atendimento</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Aguardando') as $item)
					<button type="button" class="btn btn-outline-secondary my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:i:s')}} - {{Carbon\Carbon::parse($item->end)->format('H:i:s')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Em Atendimento</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Em Atendimento') as $item)
					<button type="button" class="btn btn-outline-info my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:i:s')}} - {{Carbon\Carbon::parse($item->end)->format('H:i:s')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Atendimento Finalizado</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Finalizado') as $item)
					<button type="button" disabled class="btn btn-success my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:i:s')}} - {{Carbon\Carbon::parse($item->end)->format('H:i:s')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Ausente</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Ausente') as $item)
					<button type="button" class="btn btn-outline-danger my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:i:s')}} - {{Carbon\Carbon::parse($item->end)->format('H:i:s')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Remarcado</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Remarcado') as $item)
					<button type="button" class="btn btn-outline-warning text-dark my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:i:s')}} - {{Carbon\Carbon::parse($item->end)->format('H:i:s')}}</button>
				@endforeach
			</div>
		</div>

	</div>
	@include('Admin.atendimento.status-agendamento')
	{{-- @include('Admin.fullcalendar.modal-calendar') --}}
</div>

@push('scripts')
<script src='{{asset('admin/js/atendimento/atendimento.js')}}'></script>

{{-- <script>
	$('#start').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 10,
    "autoApply": true,
    "maxSpan": {
      "days": 7
    },
    "locale": {
      "format": "MM/DD/YYYY hh:mm A",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
      "Dom",
      "Seg",
      "Ter",
      "Qua",
      "Qui",
      "Sex",
      "Sab"
      ],
      "monthNames": [
      "Janeiro",
      "Fevereiro",
      "Março",
      "Abril",
      "Maio",
      "Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro"
      ],
      "firstDay": 1
    },
    "linkedCalendars": false,
    "autoUpdateInput": false,
    // "startDate": "12/10/2019",
    // "endDate": "12/16/2019",
    "opens": "center",
    "applyButtonClasses": "btn-success"
  }, function(start, end, label) {
    $("#modalCalendar input[name='start']").val(start.format('DD/MM/YYYY HH:mm:00'));
    console.log('New date range selected: ' + start.format('YYYY-MM-DD HH:mm:00'));
    console.log(label);
  });

  $('#end').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "timePicker": true,
    "timePicker24Hour": true,
    "timePickerIncrement": 10,
    "autoApply": true,
    "maxSpan": {
      "days": 7
    },
    "locale": {
      "format": "MM/DD/YYYY hh:mm A",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
      "fromLabel": "From",
      "toLabel": "To",
      "customRangeLabel": "Custom",
      "weekLabel": "W",
      "daysOfWeek": [
      "Dom",
      "Seg",
      "Ter",
      "Qua",
      "Qui",
      "Sex",
      "Sab"
      ],
      "monthNames": [
      "Janeiro",
      "Fevereiro",
      "Março",
      "Abril",
      "Maio",
      "Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro"
      ],
      "firstDay": 1
    },
    "linkedCalendars": false,
    "autoUpdateInput": false,
    // "startDate": "12/10/2019",
    // "endDate": "12/16/2019",
    "opens": "center",
    "applyButtonClasses": "btn-success"
  }, function(start, end, label) {
    $("#modalCalendar input[name='end']").val(end.format('DD/MM/YYYY HH:mm:00'));
    console.log('New date range selected: ' + end.format('YYYY-MM-DD HH:mm:00'));
    console.log(label);
  });
</script> --}}
@endpush
@endsection