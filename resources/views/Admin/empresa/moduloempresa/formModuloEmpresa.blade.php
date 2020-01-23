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
			<td>{{$modemp->pivot->status}}
				<div class="custom-control custom-checkbox mb-4" style="padding-top:30px">
					<input type="checkbox" class="custom-control-input" id="{{$modemp->nome}}" required>
						<label class="custom-control-label" for="{{$modemp->nome}}">{{$modemp->nome}}</label>
					<div class="invalid-feedback">Atualmente desativada!</div>
					<div class="valid-feedback">Permissão ativa!</div>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<br>
<br>
