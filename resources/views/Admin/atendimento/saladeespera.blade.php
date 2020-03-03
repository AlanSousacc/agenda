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
			<div class="card-body" >
				@foreach ($eventDay as $item)
					@if ($item->status == 'Agendado')
						<button type="button" class="btn btn-outline-primary my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:m:i')}} - {{Carbon\Carbon::parse($item->end)->format('H:m:i')}}</button>	
					@else
						<button type="button" disabled class="btn btn-outline-primary my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:m:i')}} - {{Carbon\Carbon::parse($item->end)->format('H:m:i')}}</button>
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
					<button type="button" class="btn btn-outline-secondary my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:m:i')}} - {{Carbon\Carbon::parse($item->end)->format('H:m:i')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Em Atendimento</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Em Atendimento') as $item)
					<button type="button" class="btn btn-outline-info my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:m:i')}} - {{Carbon\Carbon::parse($item->end)->format('H:m:i')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Atendimento Finalizado</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Finalizado') as $item)
					<button type="button" disabled class="btn btn-success my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:m:i')}} - {{Carbon\Carbon::parse($item->end)->format('H:m:i')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Ausente</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Ausente') as $item)
					<button type="button" class="btn btn-outline-danger my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:m:i')}} - {{Carbon\Carbon::parse($item->end)->format('H:m:i')}}</button>
				@endforeach
			</div>
		</div>

		<div class="card col-12 px-0">
			<div class="card-header bg-dark">
				<h5>Remarcado</h5>
			</div>
			<div class="card-body">
				@foreach ($eventDay->where('status', 'Remarcado') as $item)
					<button type="button" class="btn btn-outline-warning text-dark my-1 mx-1" data-target="#definestatus" data-toggle="modal" data-eventid={{$item->id}}>{{$item->contato->nome}} <br> {{Carbon\Carbon::parse($item->start)->format('H:m:i')}} - {{Carbon\Carbon::parse($item->end)->format('H:m:i')}}</button>
				@endforeach
			</div>
		</div>

	</div>
	@include('Admin.atendimento.status-agendamento')
</div>

@push('scripts')
<script src='{{asset('admin/js/atendimento/atendimento.js')}}'></script>
@endpush
@endsection