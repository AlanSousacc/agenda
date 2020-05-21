<div>
	
	<ul class="nav nav-treeview" style="display: block;">
		{{-- financeiro --}}
		<li class="nav-item has-treeview">
			<a href="#" class="nav-link">
				<i class="nav-icon fa fa-donate"></i>
				<p>
					Financeiro
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="relatorio.periodo.contato" data-target="#personalizado" data-toggle="modal" class="nav-link">
						<i class="fa fa-filter nav-icon"></i>
						<p>Personalizado</p>
					</a>
				</li>
				<li class="nav-item">
					<a target="_blank" href="{{route('relatorio.mes.atual')}}" class="nav-link">
						<i class="fa fa-chart-pie nav-icon"></i>
						<p>Mês Atual</p>
					</a>
				</li>
				<li class="nav-item">
					<a target="_blank" href="{{route('cc.relbycc')}}" class="nav-link">
						<i class="fa fa-poll-h nav-icon"></i>
						<p>Por Centro de Custo</p>
					</a>
				</li>
			</ul>
		</li>
		
		{{-- agendamentos --}}
		<li class="nav-item has-treeview">
			<a href="#" class="nav-link">
				<i class="nav-icon fa fa-calendar-alt"></i>
				<p>
					Agendamento
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="relatorio-tempo"class="nav-link">
						<img src="{{URL::asset('assets/master-admin/img/reltempo.png')}}" alt="icon relatorio de tempo" style="max-width:20px; margin-right: 5px;margin-left: 2px">
						<p>Relatorio de Tempo</p>
					</a>
				</li>
			</ul>
		</li>
	</ul>
</div>