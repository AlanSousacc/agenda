<div class="modal fade" id="filtroagendamento" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document" style="min-width:500px">
		<div class="modal-content filtro">
			<div class="modal-header" style="text-align: center; display: inline;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Filtrar por Contato</h4>
			</div>
			<form action="{{route('search-relatorio-tempo')}}" autocomplete="off" method="POST">
				@csrf
				<div class="modal-body">
					
					<div class="form-group row">
						<label class="col-md-4 col-form-label">Contato</label>
						<div class="col-md-8">
							<select required class="form-control contato_id" autocomplete="off" id="contato_id" name="contato_id" {{old('contato_id')}}>
								@foreach ($contato as $item)
								<option value="{{$item->id}}">{{$item->nome}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Consultar</button>
				</div>
			</form>
		</div>
	</div>
</div>
