<div id="update" class="modal fade text-danger" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger" style="text-align: center; display: inline;">
				<button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
				<h4 class="modal-title text-center">Confirmação de Alteração</h4>
			</div>
			<form action="{{route('form.update', 'id')}}" method="post">
				{{method_field('put')}}
				{{ csrf_field() }}
				<div class="modal-body">
					<p class="text-center">Você tem certeza que deseja desativar Formulário?</p>
					<input type="hidden" name="formulario_id" id="formularioid" value="">
				</div>
				<div class="modal-footer">
					<center>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-danger" >Sim, Desativar</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>
