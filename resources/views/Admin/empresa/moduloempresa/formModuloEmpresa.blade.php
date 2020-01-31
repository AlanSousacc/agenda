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
			<th class="text-center th-sm" style="width: 25px;" >#</th>
			<th class="th-sm" style="width: 150px;" >Módulo</th>
			<th class="th-sm" style="width: 250px;" >Descrição</th>
			<th class="text-center th-sm" style="width: 50px;" >Permissão</th>
			<th class="text-center th-sm" style="width: 50px;" >Ações</th>
		</tr>
	</thead>
	<tbody>	
		@foreach ($modulosempresa as $modemp)
			{{-- <input type="hidden" name="hidden_status" id="hidden_status" value="{{$modemp->pivot->status}}">
			<input type="hidden" name="hidden_emp" id="hidden_emp" value="{{$modemp->pivot->empresa_id}}"> --}}
		<tr role="row" class="odd">	
			<td class="text-center">{{$modemp->id}}</td>
			<td>{{$modemp->nome}}</td>
			<td>{{$modemp->descricao}}</td>
			<td class="text-center">
				@if ($modemp->pivot->status == 1)
				<i class="fa fa-check text-success fa-lg"></i>
				@else
				<i class="fa fa-times text-danger fa-lg"></i>
				@endif
			</td>
			<td class="text-center">
				{{-- <input type="hidden" name="hidden_id" id="hidden_id" value={{$modemp->id}}> --}}
				@if ($modemp->pivot->status == 1)
				<input type="hidden" name="hidden_status" id="hidden_status" value=1>
				<a  role="button" href="{{ route('modulosempresa.update',array($modemp->id, $modemp->pivot->empresa_id, 0)) }}" 
					class="btn btn-outline-danger btn-sm	 btn-block">Bloquear
				</a>
				@else
				<input type="hidden" name="hidden_status" id="hidden_status" value=0>
				<a  role="button" href="{{ route('modulosempresa.update',array($modemp->id, $modemp->pivot->empresa_id, 1)) }}" 
					class="btn btn-outline-success btn-sm	 btn-block">Permitir
				</a>
				@endif
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>



{{-- EXEMPLO DE CHECKBOX TOGGLE --}}
{{-- <input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm" 
data-on="<i class='fa fa-check'></i> Sim" {{$modemp->pivot->status ? 'checked' : ''}}
data-off="<i class='fa fa-times'></i> Não" 
name="status" id="status" data-id={{$modemp->id}} class="toggle-class"
> --}}

{{-- JAVA SCRIPT PARA O TOGGLE --}}
{{-- @push('scripts')
<script src='{{asset('admin/js/bootstrap4-toggle.min.js')}}'></script>
@endpush --}}


