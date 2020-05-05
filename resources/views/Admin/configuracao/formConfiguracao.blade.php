{{-- Configurações de Agendamento --}}
<div class="card-header">Configurações de Agendamento</div>
<div class="card-body">
	<h5 class="card-title">Disponível multiplos atendimentos</h5><br>
	<div class="form-group row">
		<div class="col-sm-12">
			<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
				<input type="checkbox" class="custom-control-input" id="atendimentosimultaneo" name="atendimentosimultaneo" 
					@if (($config != null) && ($config->atendimentosimultaneo == 1))
						checked		
					@endif
				>
				<label class="custom-control-label" for="atendimentosimultaneo" style="font-weight: 300;">Habilite esta opção para realizar atendimentos simultaneos, dentro da sala de espera.</label>
			</div>
		</div>
	</div>
</div>
{{-- End Configurações de Agendamento --}}