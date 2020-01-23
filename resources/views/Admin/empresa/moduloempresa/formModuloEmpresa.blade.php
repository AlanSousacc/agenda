@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="th-sm" style="width: 200px;" >Módulo</th>
			<th class="th-sm" style="width: 200px;" >Descrição</th>
			<th class="th-sm" style="width: 200px;" >Permissão</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($modulosempresa as $modemp)
		
		<tr role="row" class="odd">	
			<td>{{$modemp->nome}}</td>
			<td>{{$modemp->descricao}}</td>
			<td>
				@if ($modemp->pivot->status == '1')
				<input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger"
				data-size="sm" data-on="<i class='fa fa-check'></i> Sim" data-off="<i class='fa fa-times'></i> Não" checked> 
				@else
				<input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger"
				data-size="sm" data-on="<i class='fa fa-check'></i> Sim" data-off="<i class='fa fa-times'></i> Não" > 
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<br>
<br>
@push('scripts')
<script src='{{asset('admin/js/bootstrap4-toggle.min.js')}}'></script>

@endpush