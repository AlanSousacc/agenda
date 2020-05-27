@extends('layouts.master-admin')
@section('master')
<div class="container">
	<div class="row">
		<div class="col-md-12 mb-3">
			<div class="panel-default">
				<form action="{{route('contato.update', $contato->id)}}" method="post">
					{{method_field('patch')}}
					{{csrf_field()}}
					<div class="panel-body">
						<input type="hidden" name="contato_id" id="contid" value="{{$contato->id}}">

						{{-- dash --}}
						<div class="row p-3">
							<div class="col-lg-4 col-6">
								<div class="small-box bg-info">
									<div class="inner">
										<h3>
											{{$events->where('contato_id', $contato->id)->count('id')}}
											<i class="fa fa-calendar-check"></i>
										</h3>									
										<p>Total de Agendamentos</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="{{route('agendamento.show', $contato->id)}}" class="small-box-footer">Visualizar agendamentos <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>

							<div class="col-lg-4 col-6">
								<div class="small-box bg-success">
									<div class="inner">
										<h3>
											R$ {{number_format($consulta->where('contato_id', $contato->id)->sum('valorrecebido'), 2, ',', '.')}}
										</h3>									
										<p>Total de Recebidos</p>
									</div>
									<div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
									<a href="#" class="small-box-footer">Visualizar recebidos <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>

							<div class="col-lg-4 col-6">
								<div class="small-box bg-secondary">
									<div class="inner">
										<h3>
											@if (App\Models\Event::where('contato_id', $contato->id)->whereRaw('date(start) >= CURDATE()')->first())
											<i class="fa fa-calendar-alt"></i> {{Carbon\Carbon::parse(App\Models\Event::where('contato_id', $contato->id)->whereRaw('date(start) >= CURDATE()')->first()->start)->format('d/m/Y')}}
											@else
											<i class="fa fa-calendar-alt"></i> -
											@endif
										</h3>							
										<p>Próxima Sessão</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
									<a href="#" class="small-box-footer">Visualizar próximas <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						{{-- end dash --}}
						@include('Admin.contatos.formContato')
					</div>
					<button type="submit" class="btn btn-primary ml-3" >Salvar Alterações</button>
				</form>
			</div>
		</div>
	</div>
	{{-- Detalhar --}}
	@include('Admin.movimentacao.modalVisualizar')
</div>
@push('scripts')
<script src='{{asset('admin/js/contato/contato.js')}}'></script>
<script src='{{asset('admin/js/movimentacao/movimentacao.js')}}'></script>
@endpush
@endsection
