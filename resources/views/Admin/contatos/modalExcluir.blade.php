<div id="delete" class="modal fade text-danger" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Confirmação de exclusão</h4>
			</div>
			<form method="post" action="{{route('contato.destroy', 'id')}}">
				{{method_field('delete')}}
				{{ csrf_field() }}
				<div class="modal-body">
					<p class="text-center">Você tem certeza que deseja excluir este contato?</p>
					<input type="hidden" name="contato_id" id="contid" value="">
				</div>
				<div class="modal-footer">
					<center>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-danger" >Sim, Excluir</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>
