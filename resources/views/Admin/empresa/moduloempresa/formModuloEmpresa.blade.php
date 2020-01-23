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
			<th class="th-sm" style="width: 200px;" >Permissão</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($consulta as $item)
		<tr role="row" class="odd">
			<td>{{$item->nomefantasia}}</td>
			<td>{{$item->cnpj}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<br>
<br>
